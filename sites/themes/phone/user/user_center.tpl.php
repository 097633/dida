<?php global $user;
unset($user->nid);
$oauth_sina = db_query("SELECT * FROM {user_ext} WHERE uid = ? AND type = ? ORDER BY aid DESC", array($user->uid, 'sina'), array('return' => 'one'));
$oauth_qq = db_query("SELECT * FROM {user_ext} WHERE uid = ? AND type = ? ORDER BY aid DESC", array($user->uid, 'qq'), array('return' => 'one'));
$unmsg = message_count($user->uid);if(arg(2) == ''){dd_goto('user/'.$user->uid.'/cang');}?>
<div class="userleft">
	<div class="block uinfo">
		<a href="<?php echo url('user/'.$user->uid);?>"><img src="/<?php echo get_litpic($user, '90x90');?>" /></a>
		<h2><?php echo $user->name;?></h2>
		<div class="contact">
		<?php if($user->ext->sina){;?>
				<a class="tsinaed ctbl" href="http://www.weibo.com/u/<?php echo current($user->ext->sina)->ext_name;?>" target="_blank"></a>
		<?php }else{;?>
				<span class="tsina ctbl"></span>
		<?php };?>
		<?php if($user->ext->qq){;?>
				<a class="tqqed ctbl" href="http://t.qq.com/<?php echo current($user->ext->qq)->ext_type;?>" target="_blank"></a>
		<?php }else{;?>
				<span class="tqq ctbl"></span>
		<?php };?>
		<?php if($user->ext->sina){;?>
		
		<?php }elseif($user->ext->qq){;?>

		<?php }else{;?>
		<a class="mail ctbl" href="mailto:<?php echo $user->mail;?>"></a>
		<?php };?>
		</div>
	</div>
	<div class="block jieshao">
		<?php if($user->fields['jieshao']->text != ''){;?>
			<?php echo $user->fields['jieshao']->text;?>
		<?php }else{;?>
			<a href="/user/center/edit#user_edit_form_type_fields_jieshao">一句话介绍下自己吧</a>
		<?php };?>
	</div>
	<div class="block user_menu">
		<ul>
			<li <?php if(arg(2) == 'cang'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$user->uid.'/cang');?>">我的收藏</a></li>
			<li <?php if(arg(2) == 'article'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$user->uid.'/article');?>">我的文章</a></li>
			<li <?php if(arg(2) == 'comment'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$user->uid.'/comment');?>">我的评论</a></li>
			<li <?php if(arg(2) == 'message'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$user->uid.'/message');?>">消息中心(<?php echo $unmsg;?>)</a></li>
			<li <?php if(arg(2) == 'newpass'){;?>class="active"<?php };?>><a href="<?php echo url('user/center/newpass');?>">修改密码</a></li>
			<li <?php if(arg(2) == 'edit'){;?>class="active"<?php };?>><a href="<?php echo url('user/center/edit');?>">个人资料</a></li>
			<li <?php if(arg(2) == 'oauth'){;?>class="active"<?php };?>><a href="<?php echo url('user/'.$user->uid.'/oauth');?>">绑定外部登录账号</a></li>
		</ul>
	</div>
</div>
<div class="userright">
	<?php echo theme('item_list', $center->tabs, NULL, 'ul', array('class' => 'tabs')); ?>
  <?php echo $center->body;?>
</div>