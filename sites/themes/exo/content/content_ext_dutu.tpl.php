<?php
// $Id: content.tpl.php 6 2013-02-25 20:49:15Z east $

/**
 * @file 内容浏览页面默认模板文件
 * @param object $content 内容对象
 *
 * 模板文件加载优化级：
 *  content_ext_{$content->type}_{$content->nid}.tpl.php
 *  content_ext_{$content->type}.tpl.php
 *  content.tpl.php
 */
?>
<script type="text/javascript" src="<?php echo path_to_theme();?>/fancy/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/fancy/helpers/jquery.fancybox-buttons.js"></script>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo path_to_theme();?>/fancy/jquery.fancybox.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo path_to_theme();?>/fancy/helpers/jquery.fancybox-buttons.css" />
<div class="content_view" id="content_view_<?php echo $content->nid?>">

  <h1 class="content_title"><?php echo $content->title?></h1>

  <div class="content_view_content" id="content_view_content">
    <div class="content_view_content_fields">
			<ul>
				<?php if($content->fields['litpic']){foreach($content->fields['litpic'] as $val){;?>
					<li style="float:left;margin-right:40px;height:150px;overflow:hidden;margin-bottom:10px;"><a href="/<?php echo $val->filepath;?>" class="fancybox-buttons" rel="example_group" title="<?php echo $val->filebody;?>"><img src="/<?php echo $val->filepath;?>" width="200" /></a></li>
				<?php }};?>
			</ul>
		</div>
    <div class="content_view_content_body clearfix"><?php echo $content->body?></div>
  </div>

</div>
<script>
$(function(){
	
	$('.fancybox-buttons').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',

		prevEffect : 'none',
		nextEffect : 'none',
		
		helpers : {
			title : {
				type : 'inside'
			},
		},

		closeBtn  : true,

		afterLoad : function() {
			this.title = (this.title ? '' + this.title : '');
		}
	});
});
</script>