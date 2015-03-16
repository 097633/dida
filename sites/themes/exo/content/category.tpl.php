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
if(arg(1) == '观点'){
	dd_goto('guandian');
}
if(arg(0) == 'category' && arg(1) == '23'){
	include 'category_guandian.tpl.php';
}elseif($sdata['term']->field_id == 41){
	include 'category_line.tpl.php';
}else{
?>

	<div class="content_type_view span-19">

	 <!-- <h1 class="content_type_title"><?php echo $type->name?></h1>-->

		<div class="content_type_view_content">
		 <div class="fcon">
		 <?php if(arg(0) == 'tags'){;?>
				<h2><?php echo arg(1);?></h2>
		 <?php };?>
								<div class="item-list">
	<?php
	if (!empty($sdata)) {
		$items = array();
		foreach ($sdata['list'] as $key=>$val) {
			
	;?>
			<div class="front_term_list ft<?php echo $key;?>">
				<div class="litpic"><a href="<?php echo $val->url;?>" target="_blank"><img src="/<?php echo get_litpic($val, '200x150');?>" title="<?php echo $val->title;?>" width="200" height="150" /></a>
				</div>
				<div class="fcon_right">
					<h3><a href="<?php echo $val->url;?>" target="_blank"><?php echo $val->title;?></a><?php if($key < 2){;?><!--<span class="hot"><img src="<?php echo path_to_theme();?>/images/hot.jpg" /></span>--><?php };?></h3>
					<div class="submit"><span class="author"><a href="<?php echo $val->lyurl;?>" rel="<?php echo $val->nofollow;?>" target="_blank"><?php echo $val->name;?></a></span>发表于&nbsp;&nbsp;<?php echo date('Y-m-d H:i', $val->created);?></div>
					<div class="des"><a href="<?php echo $val->url;?>"><?php echo $val->description;?><span class="fmore"></span></a></div>
					<div class="fcon_bottom">
						<div class="ftags">
							<?php if($val->fields['tags'] != ''){foreach($val->fields['tags'] as $tag){;?>
								<li><a href="<?php echo url('tag/'.$tag->name);?>" target="_blank"><?php echo $tag->name;?></a></li>
							<?php }};?>
						</div>
						<div class="fshare">
							<span class="qq"><a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title=<?php echo '【'.$val->title.'】'.mb_substr(strip_tags($val->description), 0, 120, 'utf-8');?>&url=http://<?php echo $_SERVER['HTTP_HOST'].$val->url;?>" target="_blank"></a></span>
							<span class="sina"><a href="http://service.weibo.com/share/share.php?title=<?php echo '【'.$val->title.'】'.mb_substr(strip_tags($val->description), 0, 120, 'utf-8');?>&url=http://<?php echo $_SERVER['HTTP_HOST'].$val->url;?>" target="_blank"></a></span>
							<span class="cnum"><a href="<?php echo $val->url;?>#comment_form" target="_blank"><?php echo $val->comment_count;?></a></span>
						</div>
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
	<div id="sidebar-right">
		<?php include DIDA_ROOT.path_to_theme()."/content/right.tpl.php";?>
	</div>
<?php };?>