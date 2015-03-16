<?php global $user;$unmsg = message_count($user->uid);if(arg(2) == '' && $user->uid == $account->uid){dd_goto('user/'.$user->uid.'/cang');}if(arg(2) == '' && $user->uid != $account->uid){dd_goto('user/'.$account->uid.'/article');}
	unset($account->nid);
	//$oauth_sina = db_query("SELECT * FROM {user_ext} WHERE uid = ? AND type = ? ORDER BY aid DESC", array($account->uid, 'sina'), array('return' => 'one'));
	//$oauth_qq = db_query("SELECT * FROM {user_ext} WHERE uid = ? AND type = ? ORDER BY aid DESC", array($account->uid, 'qq'), array('return' => 'one'));
;?>
<div class="userleft">
	<div class="block uinfo">
		<a href="<?php echo url('user/'.$account->uid);?>"><img src="/<?php echo get_litpic($account, '90x90');?>" /></a>
		<h2><?php echo $account->name;?></h2>
		<div class="contact">
		<?php if($account->ext->sina){;?>
				<a class="tsinaed ctbl" href="http://www.weibo.com/u/<?php echo current($account->ext->sina)->ext_name;?>" target="_blank"></a>
		<?php }else{;?>
				<span class="tsina ctbl"></span>
		<?php };?>
		<?php if($account->ext->qq){;?>
				<a class="tqqed ctbl" href="http://t.qq.com/<?php echo current($account->ext->qq)->ext_type;?>" target="_blank"></a>
		<?php }else{;?>
				<span class="tqq ctbl"></span>
		<?php };?>
		<?php if($account->ext->sina){;?>
		
		<?php }elseif($account->ext->qq){;?>

		<?php }else{;?>
		<a class="mail ctbl" href="mailto:<?php echo $account->mail;?>"></a>
		<?php };?>
		</div>
	</div>
	<div class="block jieshao">
		<?php if($account->fields['jieshao']->text != ''){;?>
			<?php echo $account->fields['jieshao']->text;?>
		<?php }else{;?>
			<?php if($user->uid == $account->uid){;?>
				<a href="/user/center/edit#user_edit_form_type_fields_jieshao">一句话介绍下自己吧</a>
			<?php }else{;?>
				他还没有个人介绍
			<?php };?>
		<?php };?>
	</div>
	
	<div class="block user_menu">
		<ul>	
			<?php if($user->uid != $account->uid){;?>
			<li <?php if(arg(2) == 'article'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$account->uid.'/article');?>">他的文章</a></li>
			<li <?php if(arg(2) == 'comment'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$account->uid.'/comment');?>">他的评论</a></li>
			<li <?php if(arg(2) == 'msgbox'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$account->uid.'/msgbox?uid='.$account->uid);?>">发私信</a></li>
			<?php }else{;?>
			<li <?php if(arg(2) == 'cang'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$user->uid.'/cang');?>">我的收藏</a></li>
			<li <?php if(arg(2) == 'dingyue'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$user->uid.'/dingyue');?>">我的订阅</a></li>
			<li <?php if(arg(2) == 'article'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$user->uid.'/article');?>">我的文章</a></li>
			<li <?php if(arg(2) == 'comment'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$user->uid.'/comment');?>">我的评论</a></li>
			<li <?php if(arg(2) == 'message'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$user->uid.'/message');?>">消息中心(<?php echo $unmsg;?>)</a></li>
			<li <?php if(arg(2) == 'newpass'){;?>class="active"<?php };?>><a href="<?php echo url('user/center/newpass');?>">修改密码</a></li>
			<li <?php if(arg(2) == 'edit'){;?>class="active"<?php };?>><a href="<?php echo url('user/center/edit');?>">个人资料</a></li>
			<li <?php if(arg(2) == 'oauth'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$user->uid.'/oauth');?>">绑定外部登录账号</a></li>
			<?php };?>
		</ul>
	</div>
</div>
<div class="userright">
	<?php 
	if(arg(2) == 'guanzhu'){
		$output = '<div class="ntabs"><ul class="tabul">
			<li class="first">
				<a href="javascript:">
					作者文章
				</a>
			</li>
			<li>
				<a href="javascript:">
					关注作者
				</a>
			</li>
		</ul>';
		$fetch = pager_query("SELECT nid FROM {voteapi_info} WHERE type = ? AND uid = ? ORDER BY nid DESC", 10, 0, NULL, array('guanzhu', $account->uid));
		if(!empty($fetch)){
			foreach($fetch as $val){
				$gzuids .= $val->nid.',';
			}
			$gzuids = substr($gzuids, 0, -1);
		}
		$output .= '<div class="content stab">';
			if($gzuids != ''){
				$articles = pager_query("SELECT nid FROM {content_ext_news} WHERE uid in ($gzuids) ORDER BY nid DESC", 10, 0, NULL, array());
				if($articles){
					foreach($articles as $val){
						$val = content_load($val->nid, 'news');
						$sitems[] = '<h3>'.l($val->title, $val->url).'</h3><div class="des">'.l($val->description, $val->url).'</div><div class="submit"><span class="name"><a href="'.url('user/'.$val->uid).'">'.$val->name.'</a></span><span class="date">'.date('Y-m-d H:i', $val->created).'</span><span class="fcomment cnum"><a href="'.$val->url.'#comment_form">'.$val->comment_count.'</a></span></div>';
					}
				}
				$output .= theme('item_list', $sitems, NULL, 'ul', array('class' => 'gzusers articles'));
				$output .= pager_view();
			}else{
				$output .= '<div class="wgz">没有数据</div>';
			}
		$output .= '</div>';
		$output .= '<div class="content stab">';
			if(!empty($fetch)){
				foreach($fetch as $val){
					$val = user_load($val->nid);
					if($val->fields['tags'] != ''){foreach($val->fields['tags'] as $tag){
						$tagstr .= '<span class="blue"><a href="'.url('category/'.$tag->tid).'">'.$tag->name.'</a></span>.';
					}}
					$items[] = '<div class="litpic"><a href="<?php echo $val->url;?>"><img src="/'.get_litpic($val, '50x50').'" title="'.$val->title.'" width="50" height="50" /></a>
											</div>
										<h3 class="blue"><a href="'.url('user/'.$val->uid).'">'.$val->name.'</a></h3>
										<div class="zhiwei">'.$val->fields['jieshao']->text.'</div>
										<div class="ftags">
											<span class="fl">标签:</span>'.$tagstr.'</div>';
				}
				$gzuids = substr($gzuids, 0, -1);
				$output .= theme('item_list', $items, NULL, 'ul', array('class' => 'gzusers'));
				$output .= pager_view();
			}else{
				$output .= '<div class="wgz">抱歉，您还没有关注任何人</div>';
			}
		$output .= '</div>';
		$output .= '</div><script language="javascript" type="text/javascript"> 
$(function(){ 
	tabs("ntabs");
}) 
</script> 
';
	}elseif(arg(2) == 'cang'){
		$fetch = pager_query("SELECT n.nid FROM {voteapi_info} vi LEFT JOIN {content_ext_news} n ON vi.nid = n.nid WHERE vi.type = ? AND vi.uid = ? AND n.check_status = 1 ORDER BY n.check_time DESC", 10, 0, NULL, array('cang', $account->uid));
		if($fetch){
			foreach($fetch as $val){
				$tagstr = '';
				$val = content_load($val->nid, 'news');
				if($val->fields['tags'] != ''){foreach($val->fields['tags'] as $tag){;
						$tagstr .= '<a href="'.url('tags/'.$tag->name).'">'.$tag->name.'</a>';
				}}
				$items[] = '<h3>'.l($val->title, $val->url).'</h3><div class="des">'.l($val->description, $val->url).'</div><div class="submit"><span class="author"><a href="'.$val->lyurl.'">'.$val->name.'</a></span><span class="date">'.date('Y-m-d', $val->created).'</span><span class="ftags blue">'.$tagstr.'</span><span class="fcomment cnum"><a href="'.$val->url.'#comment_form">'.$val->comment_count.'</a></span></div>';
			}
		}
		$output = '<h2>'.$account->name.'的收藏</h2>';
		$output .= theme('item_list', $items, NULL, 'ul', array('class' => 'cang articles'));
		$output .= pager_view();
	}elseif(arg(2) == 'dingyue'){
		$output = '<h2>'.$account->name.'的订阅<span class="more"><a href="/category/259">添加订阅</a></span></h2>';
		$fetch = pager_query("SELECT vi.nid,vi.iid FROM {voteapi_info} vi WHERE vi.type = ? AND vi.uid = ?", 10, 0, NULL, array('dingyue', $account->uid));
		$output .= '<div style="height:100%;overflow:hidden;padding-top:10px;">';
		if($fetch){
			foreach($fetch as $val){
				$term = get_term_bytid($val->nid);
				$output .= '<li style="background:#008BDA;float:left;margin-right:10px;padding-top:5px;width:80px;height:25px;overflow:hidden;text-align:center;"><a href="javascript:" style="color:#FFF;" class="dy" iid="'.$val->iid.'">'.$term->name.' X</a></li>';
				$tids .= $val->nid.',';
			}
			$tids = substr($tids, 0, -1);
		}
		$output .= '</div>';
		if($tids){
			$fetch = pager_query("SELECT DISTINCT ftn.nid FROM {fields_term_node} ftn LEFT JOIN {content_ext_news} n ON ftn.nid = n.nid WHERE ftn.tid in ($tids) AND n.check_status = 1");
			if($fetch){
				foreach($fetch as $val){
					$tagstr = '';
					$val = content_load($val->nid, 'news');
					if($val->fields['tags'] != ''){foreach($val->fields['tags'] as $tag){;
							$tagstr .= '<a href="'.url('tags/'.$tag->name).'">'.$tag->name.'</a>';
					}}
					$items[] = '<h3>'.l($val->title, $val->url).'</h3><div class="des">'.l($val->description, $val->url).'</div><div class="submit"><span class="author"><a href="'.$val->lyurl.'">'.$val->name.'</a></span><span class="date">'.date('Y-m-d', $val->created).'</span><span class="ftags blue">'.$tagstr.'</span><span class="fcomment cnum"><a href="'.$val->url.'#comment_form">'.$val->comment_count.'</a></span></div>';
				}
			}
			$output .= theme('item_list', $items, NULL, 'ul', array('class' => 'dingyue articles'));
			$output .= pager_view();
			$output .= '<script>
									$(".dy").click(function(){
										$.getJSON("/?q=voteapi/delete/"+$(this).attr("iid"),function(data){
											window.location.reload();
										});
									});
									</script>';
		}else{
			$output .= system_no_content();
		}
	}elseif(arg(2) == 'article'){
		if($user->uid == $account->uid){
			$output = '<h2 class="uartitle">'.$account->name.'的文章</h2>';
			$header = array(
				array('data' => t('content', '标题'), 'sort' => 'desc'),
				array('data' => t('content', '作者')),
				array('data' => t('content', '评论')),
				array('data' => t('content', '状态')),
				array('data' => t('content', '投稿时间')),
				array('data' => t('content', '审核时间')),
			);
			$fetch = pager_query("SELECT n.*,u.name FROM {content_ext_news} n INNER JOIN {users} u ON n.uid = u.uid WHERE n.uid = ? ORDER BY n.nid DESC", 10, 0, NULL, array($account->uid));
			if($fetch){
				foreach($fetch as $key => $o){
					if($o->status == 0){
						$o->status = '未审核';
					}elseif($o->check_status == 1 && $o->status == 1){
						$o->status = '已审核发布';
					}elseif($o->check_status == 2){
						$o->status = '审核不通过';
					}
					$table[] = array(
						l($o->title, 'content/news/' . $o->nid, array('attributes' => array('target' => '_blank', 'class' => 'atitle'))),
						$o->name,
						$o->comment_count,
						$o->status,
						date('Y-m-d', $o->created),
						date('Y-m-d', $o->updated),
					);
				}
				$output .= theme('table', $header, $table, array('class' => 'center_table'));
				$output .= pager_view();
			}else{
				$output .= system_no_content();
			}
		}else{
			$fetch = pager_query("SELECT n.*,u.name FROM {content_ext_news} n INNER JOIN {users} u ON n.uid = u.uid LEFT JOIN {fields_small} fs ON n.nid = fs.nid WHERE fs.text = ? AND fs.field_id = ? AND n.check_status = 1 ORDER BY n.check_time DESC", 10, 0, NULL, array($account->name, 32));
			if($fetch){
				foreach($fetch as $val){
					$tagstr = '';
					$val = content_load($val->nid, 'news');
					if($val->fields['tags'] != ''){foreach($val->fields['tags'] as $tag){;
							$tagstr .= '<a href="'.url('tags/'.$tag->name).'">'.$tag->name.'</a>';
					}}
					$items[] = '<h3>'.l($val->title, $val->url).'</h3><div class="des">'.l($val->description, $val->url).'</div><div class="submit"><span class="author"><a href="'.$val->lyurl.'">'.$val->name.'</a></span><span class="date">'.date('Y-m-d', $val->created).'</span><span class="ftags blue">'.$tagstr.'</span><span class="fcomment cnum"><a href="'.$val->url.'#comment_form">'.$val->comment_count.'</a></span></div>';
				}
			}
			$output = '<h2 class="">'.$account->name.'的文章</h2>';
			$output .= theme('item_list', $items, NULL, 'ul', array('class' => 'cang articles'));
			$output .= pager_view();
		}
	}elseif(arg(2) == 'comment'){
		$fetch = pager_query("SELECT * FROM {comment} WHERE uid = ? ORDER BY cid DESC", 10, 0, NULL, array($account->uid));
		if($fetch){
			foreach($fetch as $val){
				$article = content_load($val->ext_id, 'news');
				$items[] = l(filter_view($val->body, $o->format), $article->url.'#comment_'.$val->ext_type.'_'.$val->cid);
			}
		}
		$output = '<h2>'.$account->name.'的评论</h2>';
		$output .= theme('item_list', $items, NULL, 'ul', array('class' => 'comment'));
		$output .= pager_view();
	}elseif(arg(2) == 'message'){
		dd_jqui();
		set_message_status(1, $user->uid);
		$output = '<h2>站内信</h2>';
		$fetch = pager_query("SELECT * FROM {message} WHERE uid = ? or touid = ? ORDER BY id DESC", 10, 0, NULL, array($user->uid, $user->uid));
		if($fetch){
			foreach($fetch as $key=>$val){
				if($val->type == 5){
					$str = '<div class="msg">
															系统消息：'.$val->body.'
									</div>';
				}elseif($val->touid == $user->uid){
					$touser = user_load($val->uid);
					$str = '<table class="ostable">
			<tbody><tr>
			<td class="user"><a href="'.url('user/'.$user->uid).'" target="_blank"><img src="/'.get_litpic($touser, '50x50').'" /></a></td>
			<td>
			<div class="msg">
								收到 <a href="'.url('user/'.$touser->uid).'" target="_blank">'.$touser->name.'</a>：'.$val->body.'
							</div>
			<div class="bottom">
    			<span class="date">
    				'.date('Y-m-d', $val->created).'
    			</span>
    			<span class="opts">
    				<a href="'.url('user/'.$touser->uid.'/msgbox').'">回复</a>
    			</span>
			</div>
			</td>
			</tr>
			</tbody></table>';
				}else{
					$touser = user_load($val->touid);
					$str = '<table class="ostable">
			<tbody><tr>
			<td class="user"><a href="'.url('user/'.$user->uid).'" target="_blank"><img src="/'.get_litpic($touser, '50x50').'" /></a></td>
			<td>
			<div class="msg">
								发给 <a href="'.url('user/'.$touser->uid).'" target="_blank">'.$touser->name.'</a>：'.$val->body.'
							</div>
			<div class="bottom">
    			<span class="date">
    				'.date('Y-m-d', $val->created).'
    			</span>
    			<span class="opts">';
					if($val->status == 0){
    				$str .= '<a href="javascript:">对方未查看</a>';
					}else{
						$str .= '<a href="javascript:">对方已查看</a>';
					}
    $str.= '</span>
			</div>
			</td>
			</tr>
			</tbody></table>';
				}
				$item[] = $str;
			}
			$output .= theme('item_list', $item);
		}else{
			$output = '暂无内容';
		}
	}elseif(arg(2) == 'msgbox'){
		$output = '<h2>发送站内信</h2>';
		$output .= dd_get_form('message_node_form', $account);
	}elseif(arg(2) == 'oauth'){
		$output = '<h2>绑定外部登录账号</h2>';
		$output .= '<div class="oauth_page">';
		if($account->ext->sina){
			if(strpos('%'.$account->mail, 'sina-') != ''){
				$output .= '<div class="oauth"><img src="/sites/themes/che1/images/tsina.jpg" width="80"><div style="padding-top:20px;"><span>已绑定</span></div></div>';
			}else{
				$output .= '<div class="oauth"><img src="/sites/themes/che1/images/tsina.jpg" width="80"><div style="padding-top:20px;"><span><a href="/oauth/1/sina/delete">解除绑定</a></span></div></div>';
			}
		}else{
			$output .= '<div class="oauth"><img src="/sites/themes/che1/images/tsina1.jpg" width="80"><div style="padding-top:20px;"><span><a href="/oauth/sina">绑定新浪微博</a></span></div></div>';
		}
		if($account->ext->qq){
			if(strpos('%'.$account->mail, 'qq-') != ''){
				$output .= '<div class="oauth"><img src="/sites/themes/che1/images/tqq.jpg" width="80"><div style="padding-top:20px;"><span>已绑定</span></div></div>';
			}else{
				$output .= '<div class="oauth"><img src="/sites/themes/che1/images/tqq.jpg" width="80"><div style="padding-top:20px;"><span><a href="/oauth/1/qq/delete">解除绑定</a></span></div></div>';
			}
		}else{
			$output .= '<div class="oauth"><img src="/sites/themes/che1/images/tqq1.jpg" width="80"><div style="padding-top:20px;"><span><a href="/oauth/qq">绑定腾讯微博</a></span></div></div>';
		}
		$output .= '</div>';
	}
	;?>

	<?php echo $output;?>
	<?php if(arg(2) == 'guanzhu' && $gzuids == ''){;?>
<div class="tips">不如先看看车云网为您推荐的作者吧</div>
<div class="utuijian">
			<?php $data = db_query("SELECT uid FROM {user_roles} WHERE rid = ? ORDER BY uid DESC LIMIT 0, 4", array(4));
			foreach ($data as $key=>$val) {$val = user_load($val->uid);$isgz = db_query("SELECT iid FROM {voteapi_info} WHERE nid = ? AND uid = ?", array($val->uid, $GLOBALS['user']->uid), array('return' => 'column'));if($key % 2 != 0){$class = 'odd';}else{ $class = '';}if($val->fields['litpic'] !=''){$litpic = reset($val->fields['litpic']);}else{$litpic = '';};	;?>
	<div class="puser">
		<div class="front_term_list <?php echo $class;?>">
			<h3 class="name"><a href="<?php echo url('user/'.$val->uid);?>"><?php echo $val->name;?></a><span class="zhiwei"><?php echo $val->fields['zhiwei']->text;?></span></h3>
			<div class="litpic"><a href="<?php echo url('user/'.$val->uid);?>""><img src="/<?php echo get_litpic($litpic, '85x85');?>" title="<?php echo $val->name;?>" width="85" height="85" /></a>
			</div>
			<div class="fcon_right">
				<div class="jieshao"><?php $art = db_query("SELECT nid,title FROM {content_ext_news} WHERE uid = ?", array($val->uid), array('return' => 'one'));if($art){;?><a href="<?php echo url('content/news/'.$art->nid);?>"><?php echo $art->title;?></a><?php };?></div>
				<!--
				<div class="ftags">
					<span class="fl">标签:</span>
					<?php if($val->fields['tags'] != ''){foreach($val->fields['tags'] as $tag){;?>
						<li><a href="<?php echo url('tags/'.$tag->name);?>"><?php echo $tag->name;?></a></li>
					<?php }};?>
				</div>
				-->
				<?php if($isgz == ''){;?>
				<div class="sgz guanzhu user<?php echo $val->uid;?>"><a href="javascript:" alt="<?php echo url('voteapi/content/guanzhu', array('query' => array('ext_id' => 1, 'nid' => $val->uid, 'value' => 1)));?>">关注+</a></div>
				<?php }else{;?>
				<div class="sgz gzed">已关注</div>
				<?php };?>
			</div>
		</div>
	</div>
	<?php };?>
</div>	
<div class="umore">
	<a href="/zlzz"><img src="<?php echo path_to_theme();?>/images/uzlzz.jpg" /></a>
</div>
<script>
	$(function(){
		$(".guanzhu").click(function(){
			$.getJSON($(this).children("a").attr('alt'),function(data){
				if(typeof data.iid != "undefined"){
					$('.user'+data.nid).addClass('gzed');
					$('.user'+data.nid).text('已关注');
				}
				if(typeof data.text != "undefined"){
					alert('您已经关注过该作者');
				}
			})
		})
	})
</script>
<?php };?>
</div>