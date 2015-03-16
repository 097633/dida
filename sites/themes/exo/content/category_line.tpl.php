<div class="content_type_view">

	 <!-- <h1 class="content_type_title"><?php echo $type->name?></h1>-->

		<div class="content_type_view_content">
		 <div class="category_line">
		 <?php if(arg(0) == 'tags'){;?>
				<h2><?php echo arg(1);?></h2>
		 <?php };?>
								<div class="item-list">
	<?php
	if (!empty($sdata)) {
		$items = array();
		foreach ($sdata['list'] as $key=>$val) {
			
	;?>
			<div class="dutu_term_list <?php echo $class;?>">
				<div class="litpic"><a href="<?php echo $val->url;?>" alt="<?php echo $val->title;?>"><img src="/<?php echo get_litpic($val, '300x150');?>" title="<?php echo $val->title;?>" /></a></div>
				<div class="title"><h4><a href="<?php echo $val->url;?>" title="<?php echo $val->title;?>"><?php echo $val->title;?></a><h4></div>
			</div>
	<?php };?>
		
	<?php echo pager_view();}?>
								<ul>
								</div>
							</div>
		</div>

	</div>