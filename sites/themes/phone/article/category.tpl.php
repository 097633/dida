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

	<div class="content_type_view span-19">

	 <!-- <h1 class="content_type_title"><?php echo $type->name?></h1>-->

		<div class="content_type_view_content">
		 <div class="article_term_list">
		 <?php if(arg(0) == 'tags'){;?>
				<h2><?php echo arg(1);?></h2>
		 <?php };?>
								<div class="item-list">
	<?php
	if (!empty($data['list'])) {
		$items = array();
		foreach ($data['list'] as $key=>$val) {
			
	;?>
			<li class="first"><div><span class="more">(<?php echo date('m/d/Y', $val->created);?>)</span><span class="l_title">[<a href="/category/<?php echo $val->fields['lanmu']->tid;?>"><?php echo $val->fields['lanmu']->name;?></a>]<a href="<?php echo $val->url;?>" title="<?php echo $val->title;?>"><?php echo $val->title;?></a></span></div></li>
	<?php };?>
										<ul>
								</div>
							</div>
							<?php echo pager_view();}?>
		</div>

	</div>
	<div id="sidebar-right">		
		<?php 
		$terms = get_sonterm_bytid(arg(1));
		if($terms){
			
		}else{
			$terms = get_sonterm_bytid($data['term']->pid);
		};?>

		<?php if($terms){;?>
			<div class="block tags">
				<div class="content">
				<?php foreach($terms as $term){;?>
					<li><a href="<?php echo $term->url;?>"><?php echo $term->name;?></a></li>
				<?php };?>
					</div>
			</div>
		<?php };?>
		<?php include DIDA_ROOT.path_to_theme()."/content/right.tpl.php";?>
	</div>