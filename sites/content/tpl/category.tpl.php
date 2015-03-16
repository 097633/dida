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

<div class="content_type_view">

 <!-- <h1 class="content_type_title"><?php echo $type->name?></h1>-->

  <div class="content_type_view_content">
	 <div class="fcon">
							<div class="item-list">
<?php
if (!empty($sdata)) {
  $items = array();
  foreach ($sdata as $key=>$val) {
		
;?>
		<div class="front_term_list">
			<h3><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a><?php if($key < 2){;?><span class="hot"><img src="<?php echo path_to_theme();?>/images/hot.jpg" /></span><?php };?></h3>
			<div class="submit"><span class="author"><a href="<?php echo ('user/'.$val->uid);?>"><?php echo $val->name;?></a></span>发表于&nbsp;&nbsp;<?php echo date('Y-m-d H:i', $val->timestamp);?></div>
			<div class="litpic"><a href="<?php echo $val->url;?>"><img src="/<?php echo get_litpic($val, '200x150');?>" title="<?php echo $val->title;?>" width="200" height="150" /></a>
			</div>
			<div class="fcon_right">
				<div class="des"><a href="<?php echo $val->url;?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo mb_substr(strip_tags($val->body), 0, 160, 'utf-8');?><span class="fmore">[...]</span></a></div>
				<div class="ftags">
					<?php if($val->fields['tags'] != ''){foreach($val->fields['tags'] as $tag){;?>
						<li><a href="<?php echo url('tags/'.$tag->name);?>"><?php echo $tag->name;?></a></li>
					<?php }};?>
				</div>
				<div class="fshare">
					<span class="qq"><a href="#"></a></span>
					<span class="sina"><a href="#"></a></span>
					<span class="cnum"><a href="<?php echo $val->url;?>#comment_form"><?php echo $val->comment_count;?></a></span>
				</div>
			</div>
		</div>
<?php };?>
  
<?php echo pager_view();}?>
							<ul>
							</div>
						</div>
  </div>

</div>
