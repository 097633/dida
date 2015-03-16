<?php
// $Id$

function oauth_get_validate($user_from) {
	global $user;

	if ($_GET['op'] == 'validate') {
		if ($tok = oauth_access_token($user_from)) {
			_oauth_validate($tok, $user_from);
		} else {
			dd_set_message(t('oauth', '授权未通过验证'), 'error');
			dd_goto('user');
		}
		exit;
	}

	if ($to_url = oauth_login_url($user_from)) {
		dd_goto($to_url);
	} else {
		dd_set_message(t('oauth', $user_from.'服务器未响应，无法验证'), 'error');
		dd_goto('user');
	}
}

/**
 * 新浪微博帐号并验证授权，获得访问令牌
 */
function oauth_sina_validate() {
	$user_from = 'sina';
	oauth_get_validate($user_from);
}

/**
 * 人人帐号
 */
function oauth_renren_validate() {
	$user_from = 'renren';
	oauth_get_validate($user_from);
}

/**
 * qq帐号
 */
function oauth_qq_validate() {
	$user_from = 'qq';
	oauth_get_validate($user_from);
}

/**
 * 让用户登录，若用户不存在，则创建新用户并登录
 * 若用户已登录，则将新浪微博帐号绑定
 * 若用户已登录，且已绑定新浪微博帐号，则不允许再绑定另一个，必须先解除绑定
 * 必须先获取访问令牌
 * @param (object) $tok
 *  访问令牌
 */
function _oauth_validate($tok = NULL, $user_from) {
	global $user;
	if ($user_from == 'sina') {
		$tok = json_decode($tok);
		$values = array();
		if (isset($tok)) {
			$url = 'https://api.weibo.com/2/users/show.json?';
			$url .= 'source='.var_get_key('oauth','sina_oauth_consumer_key',false);;
			$url .= '&access_token='.$tok->access_token;
			$url .= '&uid='.$tok->uid;
			$result = @file_get_contents($url);
			$json = json_decode($result);
			$oauth->uid  = $json->id;
			$oauth->name = $json->screen_name;
		}
	}
	if ($user_from == 'qq') { 
		$values = array();
		parse_str($tok);
		if ($access_token) {
			$url = 'https://graph.qq.com/oauth2.0/me?access_token='.$access_token;
			$result = dd_http_request($url, NULL, 'GET');
			$str = $result->data;
			if (strpos($str, "callback") !== false)
			{
				$lpos = strpos($str, "(");
				$rpos = strrpos($str, ")");
				$str  = substr($str, $lpos + 1, $rpos - $lpos -1);
			}
			$muser = json_decode($str);
			$openid = $muser->openid;
			
			$uri    = 'https://graph.qq.com/user/get_user_info';
			$appid 	= var_get_key('oauth',$user_from.'_oauth_consumer_key', false);
			$appkey = var_get_key('oauth',$user_from.'_oauth_consumer_secret', false);
			
			$con = file_get_contents('https://graph.qq.com/user/get_info?access_token='.$access_token.'&oauth_consumer_key='.$appid.'&openid='.$openid.'&format=json');
			$qq = json_decode($con);
			if($qq->data->nick == ''){
				$qq = qq_get_user_info($uri, $appid, $access_token, $openid);
				$qq = json_decode($qq);
				$qq->data->nick = $qq->nickname;
			}

			if ($qq->ret == 0) {
				$oauth->uid = $openid;
				if($uid = db_query("SELECT uid FROM {users} WHERE name = ?", array($qq->data->nick), array('return' => 'column'))) { 
					$oauth->name = $qq->data->nick.$_SERVER['REQUEST_TIME'];
				} else {
					$oauth->name = $qq->data->nick;
				}
				$oauth->ext_type = $qq->data->name;
			} else {
				dd_set_message($qq->msg);
				dd_goto('user/login');
			}
		}
	}
	if($oauth->ext_type == ''){
		$oauth->ext_type = $oauth->name;
	}
	// 该帐号已经存在登录过
	if ($oauth->uid) {
		if ($uid = db_query('SELECT uid FROM {user_ext} WHERE ext_name = ?',
		array($oauth->uid), array('return' => 'column'))) {
			if ($account = user_load($uid)) {
				if (user_login($account)) {
					//dd_set_message(t('oauth', '登录成功'));
				}
			} else {
				dd_set_message(t('oauth', '错误的访问,请重新尝试'), 'error');
				dd_goto('user/login');
			}

			db_query('UPDATE {user_ext} SET data = ?, timestamp = ? WHERE uid = ?',
				array(serialize($tok), $_SERVER['REQUEST_TIME'], $uid));

			$user->oauth = $_SESSION['user']->oauth = oauth_get_user_info($user->uid, 1);
			if($_REQUEST['redirect'] != ''){
				dd_goto($_REQUEST['redirect']);
			}else{
				dd_goto('user');
			}
			exit;
		}

		// 未登录用户，注册一个新帐号
		if (!$user->uid) {
			$ac = new stdClass;
			$ac->name = $oauth->name;
			$i = 1;
			while ($uid = db_query('SELECT uid FROM {users} WHERE name = ?',
				array($ac->name), array('return' => 'column'))) {
					$ac->name = $oauth->name .'_'. $i;
					++$i;
				}
			$ac->pass = $pass = dd_range_str();
			//邮箱
			if ($user_from == 'sina') {
				$ac->mail = 'sina-'  	. $oauth->uid . '@t.sina.com.cn';
			} else if ($user_from == 'renren') {
				$ac->mail = 'renren-' . $oauth->uid . '@renren.com';
			} else if ($user_from == 'qq') {
				$ac->mail = 'qq-' 		. $oauth->uid . '@qq.com';
			}
			$ac->status = var_get_key('user', 'status', 1) == 1 ? 1 : 0;

			$error = array();
			if ($user = user_save($ac, NULL, $error)) {
				if($user_from == 'sina'){
					$file = my_file_down_image($json->avatar_large.'.jpg');
					db_query("UPDATE {files} SET uid = ?, ext_id = ?, ext_id2 = ?, ext_type = ? WHERE fid = ?", array($user->uid, 5, $user->uid, 'field_file', $file->fid));
				}
				user_login($user);
				user_clear_session($user->uid);
				$msg = new stdClass();
				$msg->uid = 3;
				$msg->touid = $user->uid;
				$msg->body = t('oauth', '感谢您的注册，已为您成功创建帐号：!name，随机密码：!pass', array('!name' => $user->name, '!pass' => $pass, '!site' => var_get_key('site_global', 'name')));
				$msg->type = 5;
				message_save($msg);
			} else {
				dd_set_message('无法为您创建帐号'.dd_array_to_string($error), 'error');
				dd_goto('user/login');
			}
		} 

		if ($user->uid) {
			// 将该微博帐号与用户绑定
			db_exec('INSERT INTO {user_ext} (uid, ext_name, ext_type, data, timestamp, type) 
				VALUES (?, ?, ?, ?, ?, ?)', array($user->uid, $oauth->uid , $oauth->ext_type, serialize($tok), $_SERVER['REQUEST_TIME'], $user_from));
			// 更新信息
			$user->oauth = $_SESSION['user']->oauth = oauth_get_user_info($user->uid, 1);
		}
		if($_REQUEST['redirect'] != ''){
			dd_goto($_REQUEST['redirect']);
		}else{
			dd_goto('user');
		}

	}
	dd_set_message(t('oauth', '无法通过' . $user_from . '接口验证，请重试'), 'error');
	dd_goto_redirect('user/login');
}

/**
 * renren生成一个sig，md5(k1=v1k2=v2.secret_key)
 * @param ()
 * @
 */
function generate_sig($params_array, $secret_key) {
	$str = '';

	ksort($params_array);
	foreach ($params_array as $k=>$v) {
		$str .= "$k=$v";
	}   
	$str .= $secret_key;

	return md5($str);
}

/**
 * @brief get a normalized string
 *
 * @param $params
 *
 * @return a normalized string
 */
function get_normalized_string($params)
{
	ksort($params);
	$normalized = array();
	foreach($params as $key => $val)
	{
		$normalized[] = $key."=".$val;
	}

	return implode("&", $normalized);
}

/**
 * @brief get a urlencode string
 *        rfc1738 urlencode
 * @param $params
 *
 * @return a urlencode string
 */
function get_urlencode_string($params)
{
	ksort($params);
	$normalized = array();
	foreach($params as $key => $val)
	{
		$normalized[] = $key."=".rawurlencode($val);
	}

	return implode("&", $normalized);
}

/**
 * @brief check the openid is valid or not
 *
 * @param $openid
 * @param $timestamp
 * @param $sig
 *
 * @return true or false
 */
function is_valid_openid($openid, $timestamp, $sig)
{
	$str = base64_encode(hash_hmac("sha1", $openid.$timestamp, $_SESSION["appkey"], true));

	//echo "sig:$sig\n";
	//echo "str:$str\n";

	return $sig == $str; 
}

/**
 * @brief all get request will call this function
 *
 * @param $url
 * @param $appid
 * @param $appkey
 * @param $access_token
 * @param $access_token_secret
 * @param $openid
 *
 */
function qq_get_user_info($url, $appid, $access_token, $openid)
{
	$url = $url.'?';
	$url .= 'oauth_consumer_key='.$appid.'&';
	$url .= 'access_token='.$access_token.'&';
	$url .= 'openid='.$openid;
	
	return @file_get_contents($url);
}

function my_file_down_image($picurl){
	if ($data = @file_get_contents($picurl)) {
		
		if (!$__file_down_image['validate']['filename']) {
			$__file_down_image['validate']['filename'] = end(explode('/', $picurl));
		} else if (!$__file_down_image['validate']['extension']) {
			$__file_down_image['validate']['extension'] = end(explode('.', $picurl));
		}
		$__file_down_image['validate']['image']['size'] = '100x100';
		
		if ($file = file_save_data($data, $__file_down_image['validate'], $__file_down_image['rename'])) {
			return $file;
		}
	}
}
