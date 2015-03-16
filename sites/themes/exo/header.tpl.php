<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $head_title; ?></title>
	<meta property="qc:admins" content="156240600666375" />
  <?php echo $heads; ?>
  <?php echo $styles; ?>
	<!--[if IE 6]>  <link rel="stylesheet" type="text/css" href="/sites/themes/che1/css/ie6.css"/> <![endif]-->
  <?php echo $scripts; ?>

</head>
<body<?php echo $sidebars_class;?> id="mbody">
	<div id="top"></div>
	<div id="wapp">
	<div id="wrapper"><div class="<?php echo $args_id;?>">
		<div id="header">
			<div class="top_right">
				<div class="top_user">
				
				</div>
			</div>
			<div class="banico">
				<?php if($GLOBALS['user']->uid == ''){;?>
					<span class="login"><a href="<?php echo url('user/login');?>">登录</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span><a href="<?php echo url('user/register');?>">注册</a></span>
				<?php }else{;?>
					<span class="login"><a href="<?php echo url('user/center');?>">个人中心</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span><a href="<?php echo url('user/logout');?>">登出</a></span>
				<?php };?>
				<?php if(arg(0) == 'category'){;?>
					<a href="/custom.php?module=article&op=feed&type=node&tid=<?php echo arg(1);?>" target="_blank">rss</a>
				<?php };?>
			</div>
			<a href="<?php echo $base_path?>" title="回到 <?php echo $site_global->name; ?> 首页" class="logo" alt="<?php echo $site_global->name; ?>">
        <img src="<?php echo $site_global->logo; ?>" alt="<?php echo $site_global->name?>" />
      </a>
			<div style="position: absolute;right:70px;">
				<form id="searchForm" name="searchForm" method="get" action="/search" onsubmit="return checkSearchForm()">
				<input class="fltext" id="txtKeyWord" onclick="if(this.value=='请输入关键字') this.value=''" value="请输入关键字" name="keyword">
				<input type="hidden" name="s" value="relevance" />
				<input type="hidden" name="m" value="yes" />
				<input type="hidden" name="f" value="_all" />
				&nbsp;&nbsp;<input type="submit" value="搜索一下">
				</form>
				<div class="breci">
					热门搜索 ：<?php $hot = block_title_load('hot');$tmp = explode("\r\n", $hot->body);if($tmp){foreach($tmp as $val){;?>
						<a href="/search?keyword=<?php echo $val;?>"><?php echo $val;?></a>
					<?php }};?>
					</div>
			</div>
			<div class="menu"><?php echo $menu; ?></div>
    </div>