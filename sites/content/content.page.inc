<?php
// $Id: content.page.inc 6 2013-02-25 20:49:15Z east $

// public content_page($type, $content) {{{ 
/**
 * content_page
 * 内容浏览页面
 * 
 * @param object $type 
 * @param object $content 
 * @access public
 * @return string
 */
function content_page($type, $content) {
  global $user;
	
	if($content->fields['lanmu']->tid == 21){
		$stype = 'news';
	}elseif($content->fields['lanmu']->tid == 22){
		$stype = 'keji';
	}elseif($content->fields['lanmu']->tid == 23){
		$stype = 'guandian';
	}
	dd_add_js(array('stype' => array($stype)), 'setting');
	dd_jqui();
  // 浏览计数
  if (!empty($type->data['visit'])) {
    db_exec('UPDATE {' . $content->table . '} SET visit = visit+1 WHERE nid = ?', array($content->nid));
  }

  dd_set_title(array($content->title));
	dd_set_breadcrumb(array(l($type->name, 'content/type/'.$type->type), l($content->title, $content->url)));
	if($content->fields['tags']){
		foreach($content->fields['tags'] as $val){
			$keywords .= $val->name.',';
		}
		$keywords = $keywords.$content->title;
	}
	dd_set_html_head('<meta name="keywords" content="'.$keywords.'" />');
	dd_set_html_head('<meta name="description" content="'.strip_tags($content->description).'" />');

  $content->body = filter_view($content->body, $content->format);

  if (!empty($content->fields)) {
    field_get_node_view('content', 'ext_' . $content->type, $content, 2);
    $content->field_html = field_get_node_html('content', $content);
  }

  // 编辑权限
  $content->is_update = content_is_update($type, $content);
  // 删除权限
  $content->is_delete = content_is_delete($type, $content);

  if (!empty($type->data['comment'])) {
    // 允许评论
    $content->is_comment = true;
    if ($content->comment_count) {
      if (user_access('content ' . $type->type . ' comment view')) {
        if ($data = comment_ext_view(
          'content_' . $type->type,
          $content->nid,
          !empty($type->data['comment_page_count']) ? $type->data['comment_page_count'] : 20,
          true,
					'DESC'
        )) {
          $content->comment_view = $data->view;
          $content->comment_pager = $data->pager;
        } else if (!empty($_GET['filter_comment'])) {
          $content->comment_view = system_no_content(
            l(t('content', '该用户没有发布评论，返回全部评论'), 'content/' . $type->type . '/' . $content->nid)
          );
        }
        $content->filter_comment = url('content/' . $type->type . '/' . $content->nid, array('query' => 'filter_comment=' . $content->uid));
      } else {
        $content->comment_view = system_no_content(t('content', '你没有查看评论的权限'));
      }
    }
    
    // 允许发布评论
    if (user_access('content ' . $type->type . ' comment create')) {
      $comment = new stdClass;
      $comment->ext_type = 'content_' . $type->type;
      $comment->ext_id = $content->nid;
      $comment->ext_id2 = 0;
      $comment->title = t('content', '回复：!title', array('!title' => $content->title));
      $content->comment_form = dd_get_form('comment_form', $comment);
    } else if (!empty($user->uid)) {
      $content->comment_form = t('content', '根据权限设定，你不能发布评论');
    } else {
      $content->comment_form = l(t('content', '你需要登录才能发布评论'), 'user/login', dd_redirect());
    }
  }
 
  module_invoke_all('content_view', $content);

  dd_add_css(dd_get_path('module', 'content') . '/content.css');

  return theme('content', $content);
}
// }}}

// public content_page_type($type) {{{ 
/**
 * content_page_type
 * 内容类型列表浏览页面
 * 
 * @param object $type 
 * @access public
 * @return string
 */
function content_page_type($type) {
  dd_set_title(array($type->name));
	if($type->type == 'dutu'){
		$num = '12';
	}else{
		$num = 10;
	}
	dd_set_html_head('<link rel="alternate" type="application/rss+xml" title="'.t('article', '订阅最新新闻').'" href="/custom.php?module=content&op=feed&type=node&stype='.$type->type.'" />');
	
	if($type->type == 'news'){
		$type->fetch = pager_query('SELECT nid FROM {content_ext_' . $type->type . '} WHERE status > 0 ORDER BY check_time DESC', $num);
	}else{
		$type->fetch = pager_query('SELECT nid FROM {content_ext_' . $type->type . '} WHERE status > 0 ORDER BY nid DESC', $num);
	}

	$type->pager = pager_view();

  return theme('content_type', $type);
}
// }}}

function psweibo_page($type, $content){
	header('Content-Type: text/html; charset=utf-8');
	$str .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><style>body{margin:0px}.psweibo{width:440px;margin:0 auto;line-height:180%;font-size:14px;padding:0px 0px 0px 0px;margin-bottom:30px;background:#F5F5F5;font-family: "Microsoft YaHei","Microsoft JhengHei",Helvetica,Arial,sans-serif;}.con img{margin:10px;}.con{padding:0px 10px;}
blockquote{
	position:relative;
	padding-left:30px;
	margin:0px;
}
.yytop{
	background:url(/sites/themes/'.$GLOBALS['conf']['default_theme'].'/images/yytop.png) no-repeat;
	width:20px;
	height:20px;
	position:absolute;
	top:0px;
	left:0px;
}
.yybom{
	background:url(/sites/themes/'.$GLOBALS['conf']['default_theme'].'/images/yybom.png) no-repeat;
	width:20px;
	height:20px;
	position:absolute;
	right:0px;
	bottom:0px;
}
#yinyongcon{
	width:360px;
}
</style>
<script src="/misc/jquery.js"></script>
<script>
$(document).ready(function() {  
     $(".con img").each(function() {  
		 var maxWidth = 380; // 图片最大宽度  
		 var maxHeight = 400;    // 图片最大高度  
		 var ratio = 0;  // 缩放比例  
		 var width = $(this).width();    // 图片实际宽度  
		 var height = $(this).height();  // 图片实际高度  
		
		 // 检查图片是否超宽  
		 if(width > maxWidth){  
			 ratio = maxWidth / width;   // 计算缩放比例  
			 $(this).css("width", maxWidth); // 设定实际显示宽度  
			 height = height * ratio;    // 计算等比例缩放后的高度   
			 $(this).css("height", height);  // 设定等比例缩放后的高度  
		 }  
		
		 // 检查图片是否超高  
		 if(height > maxHeight){  
			 ratio = maxHeight / height; // 计算缩放比例  
			 $(this).css("height", maxHeight);   // 设定实际显示高度  
			 width = width * ratio;    // 计算等比例缩放后的高度  
			 $(this).css("width", width * ratio);    // 设定等比例缩放后的高度  
		 }  

	 });   
	 $("blockquote").each(function(){
		var yinyong = "<div class=yytop></div><div id=yinyongcon>"+$(this).html()+"</div><div class=yybom></div>";
		$(this).html(yinyong);
	})
});

</script><body><div class="psweibo"><div class="con">';
	$str .= '<h1 style="border-bottom:1px dashed #ccc;margin-top:15px;padding-bottom:10px;font-size:18px;margin-bottom:10px;line-height:150%;">'.$content->title.'</h1>';
	$str .= $content->body;
	$str .= '</div></div></body>';
	echo $str;
	exit();
}

function pweibo_page($type, $content){
	header('Content-Type: text/html; charset=utf-8');
	if($content->fields['pweibo_image']->text != '' && strpos($content->fields['pweibo_image']->text, 'png') != ''){
		return theme('changweibo', $content);
	}else{
		$url = 'http://'.$_SERVER['HTTP_HOST'].'/psweibo/'.$content->type.'/'.$content->nid;
		dd_http_request("http://42.121.5.46/jietu/ddd.php?pass=abcd1234&url=".$url, NULL, 'GET');
		sleep(2);
		$filename = md5($url).'.png';
		$file = @file_get_contents('http://42.121.5.46/jietu/images/'.$filename);
		$image = file_mkdir(file_directory_path() . '/weibo/chang') . '/' . $filename;
		file_put_contents($image, $file);
		//$content->fields['pweibo_image'] = $image;
		//$content->body = str_replace('http://che.tubage.org/sites/files', '/sites/files', $str);
		$nid = db_query("SELECT nid FROM {fields_small} WHERE nid = ? AND field_id = ? AND text != ''", array($content->nid, 24), array('return' => 'column'));
		if(!$nid){
			db_query("INSERT INTO  {fields_small} (`nid` ,`field_id` ,`text`) VALUES ( ?, ?, ?);",array($content->nid, 24, $image));
			cache_del('cid', 'contentext_news'.$content->nid, 'cache_field');
		}
		$content->fields['pweibo_image']->text = $image;
		return theme('changweibo', $content);

		$str= preg_replace('/&(.*?);/i', '', $content->body);
		$str = preg_replace("/<br[^>]*>/", "\r\n", $str);
		//Take care of <div>s
		$str = preg_replace("/<div[^>]*>/", "<p>", $str);
		$str = preg_replace("/<\/div[^>]*>/", "</p>", $str);
		//Take care of <p>s
		//$str = preg_replace("/<p[^>]*>/", "  \r\n", $str);
		//$str = preg_replace("/<\/p[^>]*>/", "\r\n ", $str);
		//Take care of <hr>s
		$str = preg_replace("/<hr[^>]*>/", "\r\n<hr> \r\n", $str);
		//$v['text'] = strip_tags($content->body);
		//$v['padding'] = 1;
		//$v['size'] = 12;
		//$v['br'] = 1;
		//$con = wb_text_to_image($v);
		$content->body = str_replace('/sites/files', 'http://che.tubage.org/sites/files', $str);
		//$content->body = trim(strip_tags($content->body));
		$url = 'http://www.changweibo.com/convert_changweibo_com.php';
		$data = 'text='.$content->body;
		$header = array('referer' => 'http://www.changweibo.com/?type=advanced');
		$result = dd_http_request($url, $data, 'POST', $header);
		$data = json_decode($result->data);
		$filepath = $data->image_url;
		$tmp = explode('/', $filepath);
		$filename = end($tmp);
		$file = @file_get_contents($filepath);
		$image = file_mkdir(file_directory_path() . '/weibo/chang') . '/' . $filename;
		file_put_contents($image, $file);
		/*
		$im=imagecreatefrompng($image);
		//print_r($im);exit();
		$in=imagecreatefromjpeg('http://che.tubage.org/sites/themes/che1/images/p_logo.jpg'); 
		$ground_info = getimagesize($filepath); 
		$ground_w = $ground_info[0];//取得背景图片的宽 
		$ground_h = $ground_info[1];//取得背景图片的高 
		$ground_h = $ground_h - 70;
		imagecopy($im,$in,0,$ground_h,0,0,440,70); 
		imagepng($im,$image); //水印完成后生成新图片
		*/
		$content->fields['pweibo_image'] = $image;
		$content->body = str_replace('http://che.tubage.org/sites/files', '/sites/files', $str);
		$nid = db_query("SELECT nid FROM {fields_small} WHERE nid = ? AND field_id = ? AND text != ''", array($content->nid, 24), array('return' => 'column'));
		if(!$nid){
			db_query("INSERT INTO  {fields_small} (`nid` ,`field_id` ,`text`) VALUES ( ?, ?, ?);",array($content->nid, 24, $image));
			cache_del('cid', 'contentext_news'.$content->nid, 'cache_field');
		}
		$con .= '<a href="http://service.weibo.com/share/share.php?title=' . urlencode($content->title) . '&';
		$con .= 'pic=' . url($image, array('absolute' => 1)) . '" target="_blank">一键分享到新浪微博</a></p>';
		$con .= '<img src="/'.$image.'" />';
	}
}

function wb_text_to_image($v) {
  $text = $v['text'] = str_replace("\r\n", "\n", $v['text']);
  
  $v['text_key'] = md5($v['text']);

  $filepath = file_mkdir(file_directory_path() . '/weibo/chang') . '/' . $v['text_key'] . '.png';

  $strlen = mb_strlen($v['text']);

  $line = array();
  $i = 0;
  $data = '';
  $count = 0;

  // 边距
  $padding = 4-$v['padding'];
  
  // 字号
  $array = array(10 => 28, 12 => 22, 14 => 18, 16 => 15);

  // 每行字数
  $line_count = $array[$v['size']];

  if (is_numeric($padding)) {
    $line_count += $padding;
  }

  while ($strlen > $i) {
    $string = mb_substr($v['text'], $i, 1);

    if ($count > $line_count) {
      $line[] = $data;
      $data = '';
      $count = 0;
    }

    if (!preg_match('/^[\x80-\xff]*$/', $string)) {
      // 英文字母
      $count -= 0.4;
    }

    if ($string == "\n") {
      $count = $line_count;

      if ($v['br']) $data .= "\n";
      
    } else {
      $data .= $string;
    }

    ++$count;
    ++$i;
  }
  $line[] = $data;

  $v['text'] = implode("\n", $line);
  
  $i_width  = 440; // 图片宽度
  $i_height = 120; // 图片总高度
  $margin_top = 40; // 正文离图片上边距离

  $pointsize = 12;

  $fontfile = DIDA_ROOT . '/tools/simsun.ttf';

  if (!is_file($fontfile)) {
    return '抱歉，所选字体不存在';
  }

  if ($v['title']) {
    $t_size = imageftbbox(16, 0, $fontfile, $v['title'], array('linespacing' => 1));
    $i_height += $t_size[3]+60;
    $margin_top += $t_size[3]+60;
  }

  if ($v['name']) {
    $n_size = imageftbbox(12, 0, $fontfile, $v['name'], array('linespacing' => 1));
    $i_height += $n_size[3]+40;
    $margin_top += $n_size[3]+40;
  }

  $string_size = imageftbbox($v['size'], 0, $fontfile, $v['text'], array('linespacing' => 1.1));
  
  $s_width  = $string_size[4];
  $i_height += $string_size[3];

  $im = imagecreate($i_width, $i_height);
  $black = imagecolorallocate($im, 255, 255, 255);
  $white = imagecolorallocate($im, 0, 0, 0);

  // 写入标题
  if ($v['title']) {
    imagefttext($im, 16, 0, ($i_width - $t_size[4])/2, 40, $white, $fontfile, $v['title'], array('linespacing' => 1));
    imageline($im, 0, (60+$t_size[3]), $i_width, (60+$t_size[3]), $white);
  }

  // 写入作者
  if ($v['name']) {
    imagefttext($im, 12, 0, ($i_width - $n_size[4])/2, $margin_top-$n_size[3]-40, $white, $fontfile, $v['name'], array('linespacing' => 1));
  }

  // 写入正文
  imagefttext($im, $v['size'], 0, ($i_width - $s_width)/2, $margin_top, $white, $fontfile, $v['text'], array('linespacing' => 1.1));
  
  $file = f($filepath, array('absolute' => 1));

  $output = '<p class="red">长微博转换成功！</p>';
  $output .= '<p>图片地址：' . $file . '</p>';
  $output .= '<p><a href="' . $file . '?' . time() . '" target="_blank">浏览或下载图片</a> | ';
  $output .= '<a href="http://service.weibo.com/share/share.php?title=' . urlencode('长微博分享') . '&';

  if ($v['save']) {
    if ($id = db_query('SELECT id FROM {wb_chang} WHERE text_key = ?',
    array($v['text_key']), array('return' => 'column'))) {
      $v['id'] = $id;
    } else {
      $v['uid'] = $GLOBALS['user']->uid ? $GLOBALS['user']->uid : 0;
      $v['timestamp'] = time();
      $v['text'] = $text;
      $v['host'] = ip_address();
      db_write_record('wb_chang', $v);
    }

    if (!empty($v['id'])) {
      $link = url('c/' . $v['id'], array('absolute' => true));
      $output .= 'url=' . urlencode($link) . '&pic=' . urlencode($file) . '" target="_blank">一键分享到新浪微博</a></p>';
      $output .= '<p>文字地址：<a href="' . $link . '" target="_blank">' . $link . '</a>(<span class="form_description">注意：违规内容将被删除</span>)</p>';
      $link = '访问文字版：' . $link;
      $l_size = imageftbbox(12, 0, $fontfile, $link, array('linespacing' => 1));
      imagefttext($im, 12, 0, ($i_width - $l_size[4])/2, $i_height-40, imagecolorallocate($im, 218, 73, 57), $fontfile, $link, array('linespacing' => 1.1));
    }
  } else {
    $output .= 'pic=' . urlencode($file) . '" target="_blank">一键分享到新浪微博</a></p>';
  }
  
  imagepng($im, $filepath);

  imagedestroy ($im); 

  return $output;
}