<?php
// $Id: content_type.tpl.php 6 2013-02-25 20:49:15Z east $

/**
 * @file 内容类型列表页面默认模板文件
 * @param object $type 内容类型对象
 *
 * 模板文件加载优化级：
 *  content_type_{$type->type}.tpl.php
 *  content_type.tpl.php
 */

?>


<div class="content_type_view dutu">
 <!-- <h1 class="content_type_title"><?php echo $type->name?></h1>-->

  <div class="content_type_view_content">
	<!--
	<div id="banner">
				<div id="play">
					<div id="play_bg"></div>
				 
				 <?php $nid = db_query("SELECT n.nid FROM {content_ext_dutu} n WHERE n.flag = 's' ORDER BY n.updated DESC", array(), array('return' => 'column'));$val = content_load($nid, 'dutu');if($val){?>
					<div id="play_list">
					 <a rel="example_group" data-fancybox-group="button" class="fancybox-buttons1" href="<?php echo $val->url;?>" target="_blank" title="<h3><?php echo $val->title;?></h3><?php echo strip_tags(mb_substr($val->body, 0, 125, 'utf-8'));?>">
						<img src="/<?php echo get_litpic($val, '700x250');?>" title="<?php echo $val->title;?>" alt="<?php echo $val->title;?>" width="700" height="250" /> </a>
					</div>
					<div id="play_info">
						<h1><a rel="example_group" data-fancybox-group="button" class="fancybox-buttons" href="<?php echo $val->url;?>" target="_blank" title="<h3><?php echo $val->title;?></h3><?php echo strip_tags(mb_substr($val->body, 0, 125, 'utf-8'));?>"><?php echo $val->title;?></a></h1>
						<div class="fdes"><?php echo strip_tags(mb_substr($val->body, 0, 80, 'utf-8'));?>.......<span class="fmore"></span></div>
						<div class="dutubom author"><?php echo date('Y-m-d', $val->created);?></div>
					</div>
					<?php };?>
				</div>
		</div>
		-->
		<div class="item-list">
<?php
if (!empty($type->fetch)) {
  $items = array();
  foreach ($type->fetch as $key=>$o) {$key = $key;$class = '';$val = content_load($o->nid, $type->type); if($key % 3 == 2){$class = 'last';};
;?>
									<div class="dutu_term_list <?php echo $class;?>">
										<div class="litpic"><a rel="example_group" data-fancybox-group="button" class="fancybox-buttons" href="<?php echo $val->url;?>" target="_blank" title="<h3><?php echo $val->title;?></h3><?php echo strip_tags(mb_substr($val->body, 0, 125, 'utf-8'));?>"><img src="/<?php echo get_litpic($val, '300x180');?>" title="<?php echo $val->title;?>" height="180" width="300" /></a>
										</div>
										<div class="title"><h4><a rel="example_group" data-fancybox-group="button" class="fancybox-buttons1" href="<?php echo $val->url;?>" target="_blank" title="<?php echo $val->title;?>"><?php echo $val->title;?></a><h4></div>
									</div>
<?php };?>
	</div>
<?php
  echo $type->pager;
} else {
  echo system_no_content();
}
?>
		
  </div>

</div>
