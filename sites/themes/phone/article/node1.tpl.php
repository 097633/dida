<?php
// $Id: content.tpl.php 6 2013-02-25 20:49:15Z east $

/**
 * @file 内容浏览页面默认模板文件
 * @param object $article 内容对象
 *
 * 模板文件加载优化级：
 *  content_ext_{$article->type}_{$article->nid}.tpl.php
 *  content_ext_{$article->type}.tpl.php
 *  content.tpl.php
 */
if($_GET['show'] != 1){
	$fenye = get_article_content($article->body);
	$article->body = $fenye['body'];
	$article->page = $fenye['page'];
}
$ding = db_query("SELECT value FROM {voteapi} WHERE type = ? AND tags = ? AND nid = ?", array('ding', 'count', $article->nid), array('return' => 'column'));
$ding = intval($ding);
$dstyle = 'ding';
$cstyle = 'cai';
$castyle = 'cang';
if($ding != 0){
	$dstyle = 'dinged';
}
$cai = db_query("SELECT value FROM {voteapi} WHERE type = ? AND tags = ? AND nid = ?", array('cai', 'count', $article->nid), array('return' => 'column'));
$cai = intval($cai);
if($cai != 0){
	$cstyle = 'caied';
}
$iid = db_query("SELECT iid FROM {voteapi_info} WHERE type = ? AND uid = ? AND nid = ?", array('cang', $GLOBALS['user']->uid, $article->nid), array('return' => 'column'));
if($iid != ''){
	$castyle = 'canged';
}
?>
<div class="span-19">
	<div class="content_view" id="content_view_<?php echo $article->nid?>">

		<h2 class="content_title"><?php echo $article->title?></h2>

		<div class="content_view_content">
			<div class="content_view_content_header">
				<span class="author"><a href="<?php echo $article->lyurl;?>" rel="<?php echo $article->nofollow;?>" target="_blank"><?php echo $article->name;?></a></span>
				<?php if($article->fields['lanmu']->tid == 23){;?>
					<?php if($uid = db_query("SELECT uid FROM {user_roles} WHERE uid = ? AND rid = ?", array($article->uid, 4), array('return' => 'column'))){;?>
						<span class="author"><a href="<?php echo url('user/'.$article->uid);?>"><?php echo $article->fields['zuozhe']->text;?></a></span>
					<?php }else{;?>
						<span class="author"><?php echo $article->fields['zuozhe']->text;?></span>
					<?php };?>
				<?php  }else{;?>
					<span class="author"><?php echo $article->fields['zuozhe']->text;?></span>
				<?php };?>
				<span class="time"><?php echo t('content', '发表于 !time', array('!time' => format_date($article->created)))?></span>
				<span class="ftags">
					<?php if($article->fields['tags'] != ''){foreach($article->fields['tags'] as $tag){;?>
						<li><a href="<?php echo url('tag/'.$tag->name);?>"><?php echo $tag->name;?></a></li>
					<?php }};?>
				</span>
				</div>
			</div>
			<div class="content_view_content_des">
				<?php echo $article->description;?>
			</div>
			<div class="content_view_content_body clearfix" id="content_view_content_body">
				<?php echo $article->body?>
			</div>
			<div class="fenye">
				<?php echo $article->page?>
			</div>
			<div class="fenxiang">
					<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" style="height:100%;overflow:hidden;margin:20px 0px;">
							<script "text/javascript"> 
									var jiathis_config = { 
										appkey:{"tsina":"1745591203",
									}} 
									</script> 
									<!-- JiaThis Button BEGIN -->
									<div class="jiathis_style_32x32">
										<a class="jiathis_button_qzone"></a>
										<a class="jiathis_button_tsina"></a>
										<a class="jiathis_button_tqq"></a>
										<a class="jiathis_button_cqq"></a>
										<a class="jiathis_button_tieba"></a>
										<a class="jiathis_button_weixin"></a>
										<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
										<a class="jiathis_counter_style"></a>
									</div>
									<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1369619290323384" charset="utf-8"></script>

					</div>
			</div>

			<div class="similar">
				<h1>相关阅读</h1>
				<div class="similar_list">
					<?php $data = article_list($article->fields['lanmu']->tid, 0, 5);if($data){foreach($data as $val){
						$items[] = '<div><a href="'.$val->url.'" target="_blank"><img src="/'.get_litpic($val, '110x80').'" width="110" height="80" title="'.$val->title.'"></a><div class="l_title">'.l($val->title, $val->url) .'</div></div>';
						}}
							$output .= theme('item_list', $items, NULL, 'ul', array('id' => 'similar_list'));
							echo $output;
						;?>
				</div>
			</div>

		</div>

		


	</div>
</div>