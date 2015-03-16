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
            <div class="container">
                <div class="slider-controls" data-snap-ignore="true">                
                    <div>
                        <img src="<?php echo path_to_theme();?>/images/general-nature/3.jpg" class="responsive-image" alt="img">
                        <p class="title-slider-caption">
                            <strong>Welcome</strong>
                            <em>We make your mobile and tablet rock!</em>
                        </p>
                    </div>
                
                    <div>
                        <img src="<?php echo path_to_theme();?>/images/general-nature/2.jpg" class="responsive-image" alt="img">
                        <p class="small-slider-caption">A small caption</p>
                    </div>

                    <div>
                        <img src="<?php echo path_to_theme();?>/images/general-nature/1.jpg" class="responsive-image" alt="img">
                        <p class="title-slider-caption">
                            <strong>A caption title</strong>
                            <em>A caption text and what not!</em>
                        </p>
                    </div>
                </div>
                <a href="#" class="next-slider"></a>
                <a href="#" class="prev-slider"></a>
            </div>
            <div class="decoration"></div>           
	<div class="content_type_view span-19">
	<?php
	$where = ' n.nid > 0';
  if($data = pager_query('SELECT n.nid FROM {article} n WHERE '.$where.' AND n.status = 1 ORDER BY n.nid DESC', 10, 0, NULL, array())){
		$items = array();
		foreach ($data as $key=>$val) {
			$val = article_load($val->nid);
	;?>
			<article id="article" class="classic-list clearfix">
    <div class=" ">
        <h3 class="classic-list-title classic-list-title-1">
            <a href="<?php echo $val->url;?>"><?php echo $val->title;?></a>
        </h3>
        <div class="classic-list-left ">
            <a href="<?php echo $val->url;?>" title="<?php echo $val->title;?>">
                <img width="400" height="300" src="/<?php echo get_litpic($val, '400x300');?>" class="attachment-600x335 wp-post-image" alt="GalaxyDash_logo_conew1">            </a>
            	</div>
    
    <!-- 手机端显示 -->
    </article>
	<?php };?>
							<?php echo pager_view();}?>
		</div>
