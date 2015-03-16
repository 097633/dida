<!DOCTYPE html PUBliC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $styles;?>
<?php echo $scripts;?>
<title><?php echo $head_title;?></title>
</head>

<body>
<a name="gotop">&nbsp;</a>
<div class="search">
    <div class="logo"><a href="<?php echo $base_path?>"><img src="<?php echo path_to_theme();?>/images/sitelogo.png"/></a></div>
    <form action="" method="get" accept-charset="utf-8" id="article_search" class="sns-form" enctype="multipart/form-data">    <div class="searcher">
        <ul>
						<input name="q" value="search" type="hidden" class="text"/>
            <li><input name="keyword" type="text" class="text"/></li>
            <li><input name="articles_search_button" type="submit" class="botton" value=""/></li>
        </ul>
    </div>
    </form></div>
<div class="menu_bg">
    <div id="menu">
        <ul id="nav">
								<?php $data = dd_get_menu_data();foreach($data as $key=>$val){;?>
                        <li class="mainlevel" id="mainlevel_<?php echo $key;?>">
                <?php echo $val['#data'];?>
								<?php if($val['#childrens']){;?>
                <ul id="sub_0<?php echo $key;?>">
										<?php foreach($val['#childrens'] as $mval){;?>
											<li><?php echo $mval;?></li>
										<?php };?>
                </ul>
								<?php };?>
            </li>
            <?php };?>       
        </ul>    
            
										<?php if($GLOBALS['user']->uid == 0){;?>
										<div class="login">
										<ul>
                    <li><a href="<?php echo url('user/register');?>">注册</a></li>
                    <li><a href="<?php echo url('user/login');?>">登录</a></li>
                    <li class="mainlevel other" id="mainlevel">
                        <a href="javascript:void(0);">合作网站登录</a>
                        <ul id="sub_06" style="display:none">
                            <li class="qq"><a onclick="window.location='<?php echo url('oauth/qq');?>';return false;" href="javascript:void(0)" target="_blank">QQ登录</a></li>
                            <li class="sina"><a onclick="window.location='<?php echo url('oauth/sina');?>';return false;" href="javascript:void(0)" target="_blank">新浪微博</a></li>
                        </ul>
                    </li>
										</ul>
										</div>
										<?php }else{;?>
										<div class="top-user">
											<ul>
												<li><a href="javascript:void(0);" class="user"><?php echo $GLOBALS['user']->name;?></a></li>
												<li><a href="<?php echo url('user');?>" class="key">用户中心</a></li>
												<li class="mainlevel menu_share" id="mainlevel"><a href="#" class="share">发布</a>
														<ul id="sub_07" style="display:none; position:absolute; padding-top:7px;">
																<li><a href="<?php echo url('article/add');?>">文章发布</a></li>
																<li><a href="<?php echo url('party/add');?>">活动发布</a></li>
														</ul>
												</li>
											</ul>
										</div>
										<?php };?>
    </div>
</div>