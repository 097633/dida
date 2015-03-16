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
								<div class="item-list fcon">
	<?php
	if (!empty($data['list'])) {
		$items = array();
		foreach ($data['list'] as $key=>$val) {
			
	;?>
			<div class="front_term_list">
				<div class="litpic"><a href="<?php echo $val->url;?>" target="_blank"><img src="/<?php echo get_litpic($val, '200x150');?>" title="<?php echo $val->title;?>" width="200" height="150" /></a>
				</div>
				<div class="fcon_right">
					<h3><a href="<?php echo $val->url;?>" target="_blank"><?php echo $val->title;?></a><?php if($key < 2){;?><!--<span class="hot"><img src="<?php echo path_to_theme();?>/images/hot.png" /></span>--><?php };?></h3>
					<div class="submit"><span class="author"><a href="/user/<?php echo $val->uid;?>" target="_blank"><?php echo $val->name;?></a></span>发表于&nbsp;&nbsp;<?php echo date('Y-m-d H:i', $val->created);?></div>
					<div class="des"><a href="<?php echo $val->url;?>" target="_blank"><?php echo mb_substr(strip_tags($val->description), 0, 160, 'utf-8');?><span class="fmore"></span></a></div>
					<div class="fcon_bottom">
						<div class="ftags">
							<?php if($val->fields['tags'] != ''){foreach($val->fields['tags'] as $tag){;?>
								<li><a href="<?php echo url('tag/'.$tag->name);?>" target="_blank"><?php echo $tag->name;?></a></li>
							<?php }};?>
						</div>
						<div class="fshare">
							<span class="qq"><a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title=<?php echo '【'.$val->title.'】'.mb_substr(strip_tags($val->description), 0, 120, 'utf-8');?>&url=http://<?php echo $_SERVER['HTTP_HOST'].$val->url;?>" target="_blank"></a></span>
							<span class="sina"><a href="http://service.weibo.com/share/share.php?title=<?php echo '【'.$val->title.'】'.mb_substr(strip_tags($val->description), 0, 120, 'utf-8');?>&url=http://<?php echo $_SERVER['HTTP_HOST'].$val->url;?>" target="_blank"></a></span>
						</div>
					</div>
				</div>
			</div>
	<?php };?>
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
		<?php include DIDA_ROOT.path_to_theme()."/content/huati.tpl.php";?>
	</div>