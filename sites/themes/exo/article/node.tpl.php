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
<script type="text/javascript" src="/<?php echo dd_get_path('module', 'article');?>/c.js"></script>
<style>
#showpagephoto{height:300px;}
#showpagephoto iframe {
width: 96%;
height:250px;
z-index: 200;
}
.content_view_content_body img{width:60%;text-align:center;}
</style>
<script>
$(function(){
	$("#csda").click(function(){
		$('#csdab').show();
	});
});
</script>
<div class="span-19">
	<div class="content_view" id="content_view_<?php echo $article->nid?>">

		<h1 class="content_title"><?php echo $article->title?></h1>

		<div class="content_view_content">
			<div class="content_view_content_header">
				<span class="author"><a href="/user/<?php echo $article->uid;?>"  target="_blank"><?php echo $article->name;?></a> 来源:互联网</span>
				<span class="time"><?php echo t('content', '发表于 !time', array('!time' => format_date($article->updated)))?></span>
				<span class="ftags">
					<?php if($article->fields['tags'] != ''){foreach($article->fields['tags'] as $tag){;?>
						<li><a href="<?php echo url('tag/'.$tag->name);?>"><?php echo $tag->name;?></a></li>
					<?php }};?>
				</span>
				<span class="cnum fcomment"><a href="<?php echo $article->url;?>#comment_form">评论</a></span>
				<div class="szs span-2"><small class="xs xs1"><a href="javascript:SetFont(14)">小</a></small><span class="xs xs2"><a href="javascript:SetFont(16)">中</a></span><big class="xs xs3"><a href="javascript:SetFont(18)">大</a></big>
				</div>
			</div>
			<div class="content_view_content_des">
				<?php echo $article->description;?>
			</div>
			<div class="content_view_content_body clearfix" id="content_view_content_body">
				<?php if(strpos($article->referer, 'youku') != ''){;?>
			<?php $vid = str_replace('http://player.youku.com/player.php/sid/', '', $article->referer);$vid = str_replace('/v.swf', '', $vid);?>
				<p id="showpagephoto" style="width:100%;"><script type="text/javascript">newplayer('youku','<?php echo $vid;?>','');</script></p>
			<?php };?>
			<?php if(strpos($article->referer, 'sohu') != ''){;?>
			<?php $vid = str_replace('http://tv.sohu.com/upload/static/share/share_play.html#', '', $article->referer);?>
				<p id="showpagephoto" style="width:100%;"><script type="text/javascript">newplayer('sohu','<?php echo $vid;?>','');</script></p>
			<?php };?>
			<?php if(strpos($article->referer, 'tudou') != ''){;?>
			<?php $article->referer = str_replace('?resourceId', '&resourceId', $article->referer);$vid = str_replace('http://www.tudou.com/v/', '', $article->referer);$vid = preg_replace('/\/\&resourceId(.*)$/i', '', $vid);?>
				<p id="showpagephoto" style="width:100%;"><script type="text/javascript">newplayer('tudou','<?php echo $vid;?>','');</script></p>
			<?php };?>
			<?php if(strpos($article->referer, 'qiyi') != ''){;?>
				<p id="showpagephoto" style="width:100%;"><script type="text/javascript">newplayer('iqiyi','<?php echo $article->referer;?>','');</script></p>
			<?php };?>
			<?php if(strpos($article->referer, 'qq') != ''){;?>
				<?php preg_match('/vid=(.*?)\&/i', $article->referer, $tmp);?>
				<p id="showpagephoto" style="width:100%;"><script type="text/javascript">newplayer('qq','<?php echo $tmp[1];?>','');</script></p>
			<?php };?>
				<?php echo $article->body?>
			</div>
			<div class="fenye">
				<?php echo $article->page?>
				<?php echo get_next_node($article->nid, $article->fields['lanmu']->tid);?>
			</div>
			<div class="fenxiang">
					<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
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
					<div id="ding">
						<a href="javascript:" class="<?php echo $dstyle;?>" alt="<?php echo url('voteapi/article/ding', array('query' => array('ext_id' => 1, 'nid' => $article->nid, 'value' => 1)));?>"><?php echo $ding;?></a>
						<a href="javascript:" class="<?php echo $cstyle;?>" alt="<?php echo url('voteapi/article/cai', array('query' => array('ext_id' => 1, 'nid' => $article->nid, 'value' => 1)));?>"><?php echo $cai;?></a>
						<a href="javascript:" class="<?php echo $castyle;?> shouc <?php if($GLOBALS['user']->uid == 0){;?>need_login<?php };?>" alt="<?php echo url('voteapi/article/cang', array('query' => array('ext_id' => 1, 'nid' => $article->nid, 'value' => 1)));?>" iid="<?php echo $iid;?>"></a>
					</div>
			</div>

			<div class="similar">
				<h1>相关阅读</h1>
				<div class="similar_list">
					<?php $data = article_list($article->fields['lanmu']->tid, 0, 5);if($data){foreach($data as $val){
						$items[] = '<div><a href="'.$val->url.'" target="_blank"><img src="/'.get_litpic($val, '90x80').'" width="90" height="80" title="'.$val->title.'"></a><div class="l_title">'.l($val->title, $val->url) .'</div></div>';
						}}
							$output .= theme('item_list', $items, NULL, 'ul', array('id' => 'similar_list'));
							echo $output;
						;?>
				</div>
			</div>

		</div>

		

		<div id="content_view_comment_wrapper">
				<?php echo article_comment($article);?>
		</div>

	</div>
</div>
<?php include "right.tpl.php";?>