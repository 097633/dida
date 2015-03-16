<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $head_title; ?></title>
  <?php echo $heads; ?>
  <?php echo $styles; ?>
  <?php echo $scripts; ?>
</head>
<body<?php echo $sidebars_class;?>>
	<div id="top"></div>
	<div id="wrapper"><div class="<?php echo $args_id;?>">
		<div id="header">
			<div class="fsearch">
				<?php $data = block_box_load(2);echo $data->body;?>
				<div class="searchbox">
					<input type="text" name="">
				</div>
			</div>
      <div class="menu"><?php echo $menu; ?></div>
      <a href="<?php echo $base_path?>" title="回到 <?php echo $site_global->name; ?> 首页" class="logo" alt="<?php echo $site_global->name; ?>">
        <img src="<?php echo path_to_theme();?>/images/logo.jpg" width="238" />
      </a>
    </div>