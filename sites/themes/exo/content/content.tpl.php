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
if($_GET['show'] != 1){
	$fenye = get_article_content($content->body);
	$content->body = $fenye['body'];
	$content->page = $fenye['page'];
}
$ding = db_query("SELECT value FROM {voteapi} WHERE type = ? AND tags = ? AND nid = ?", array('ding', 'count', $content->nid), array('return' => 'column'));
$ding = intval($ding);
$dstyle = 'ding';
$cstyle = 'cai';
$castyle = 'cang';
if($ding != 0){
	$dstyle = 'dinged';
}
$cai = db_query("SELECT value FROM {voteapi} WHERE type = ? AND tags = ? AND nid = ?", array('cai', 'count', $content->nid), array('return' => 'column'));
$cai = intval($cai);
if($cai != 0){
	$cstyle = 'caied';
}
$iid = db_query("SELECT iid FROM {voteapi_info} WHERE type = ? AND uid = ? AND nid = ?", array('cang', $GLOBALS['user']->uid, $content->nid), array('return' => 'column'));
if($iid != ''){
	$castyle = 'canged';
}
?>
<div class="span-19">
	<div class="content_view" id="content_view_<?php echo $content->nid?>">

		<h1 class="content_title"><?php echo $content->title?></h1>

		<div class="content_view_content">
			<div class="content_view_content_header">
				<span class="author"><a href="<?php echo $content->lyurl;?>" rel="<?php echo $content->nofollow;?>" target="_blank"><?php echo $content->name;?></a></span>
				<?php if($content->fields['lanmu']->tid == 23){;?>
					<?php if($uid = db_query("SELECT uid FROM {user_roles} WHERE uid = ? AND rid = ?", array($content->uid, 4), array('return' => 'column'))){;?>
						<span class="author"><a href="<?php echo url('user/'.$content->uid);?>"><?php echo $content->fields['zuozhe']->text;?></a></span>
					<?php }else{;?>
						<span class="author"><?php echo $content->fields['zuozhe']->text;?></span>
					<?php };?>
				<?php  }else{;?>
					<span class="author"><?php echo $content->fields['zuozhe']->text;?></span>
				<?php };?>
				<span class="time"><?php echo t('content', '发表于 !time', array('!time' => format_date($content->created)))?></span>
				<span class="ftags">
					<?php if($content->fields['tags'] != ''){foreach($content->fields['tags'] as $tag){;?>
						<li><a href="<?php echo url('tag/'.$tag->name);?>"><?php echo $tag->name;?></a></li>
					<?php }};?>
				</span>
				<span class="cnum fcomment"><a href="<?php echo $content->url;?>#comment_form"><?php echo $content->comment_count;?></a></span>
				<!--
				<div class="szs span-2"><small class="xs xs1"><a href="javascript:SetFont(14)">小</a></small><span class="xs xs2"><a href="javascript:SetFont(16)">中</a></span><big class="xs xs3"><a href="javascript:SetFont(18)">大</a></big>
				</div>
				-->
			</div>
			<!--
			<div class="content_view_content_des">
				<?php echo $content->description;?>
			</div>
			-->
			<div class="content_view_content_body clearfix" id="content_view_content_body">
				<?php echo $content->body?>
			</div>
			<div class="fenye">
				<?php echo $content->page?>
			</div>
			<!--
			<div class="fenxiang">
					<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
							<span class="bds_more">分享到：</span>
							<a class="bds_tsina"></a>
							<a class="bds_tqq"></a>
							<a class="shareCount"></a>
					</div>
					<div id="ding">
						<a href="javascript:" class="<?php echo $dstyle;?>" alt="<?php echo url('voteapi/content/ding', array('query' => array('ext_id' => 1, 'nid' => $content->nid, 'value' => 1)));?>"><?php echo $ding;?></a>
						<a href="javascript:" class="<?php echo $cstyle;?>" alt="<?php echo url('voteapi/content/cai', array('query' => array('ext_id' => 1, 'nid' => $content->nid, 'value' => 1)));?>"><?php echo $cai;?></a>
						<a href="javascript:" class="<?php echo $castyle;?> shouc <?php if($GLOBALS['user']->uid == 0){;?>need_login<?php };?>" alt="<?php echo url('voteapi/content/cang', array('query' => array('ext_id' => 1, 'nid' => $content->nid, 'value' => 1)));?>" iid="<?php echo $iid;?>"></a>
					</div>
					<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=591810" ></script>
					<script type="text/javascript" id="bdshell_js"></script>
					<script type="text/javascript">
						document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
					</script>
			</div>
			-->
			<?php if(arg(1) == 'news'){;?>
			<div class="similar">
				<h1>相关阅读</h1>
				<div class="similar_list">
					<?php if($content->fields['tags'] != ''){foreach($content->fields['tags'] as $val){$tids .= $val->tid.',';};$tids = substr($tids, 0, -1);}if($tids != ''){$data = db_query("SELECT DISTINCT n.nid FROM {content_ext_news} n INNER JOIN {fields_term_node} ftn ON n.nid = ftn.nid WHERE n.nid > 0 AND ftn.tid > 0 AND ftn.tid in (".$tids.") AND n.nid != ?", array($content->nid), array('limit' => array(0,5)));if($data){foreach($data as $val){$val = content_load($val->nid, 'news');
						$items[] = '<div><a href="'.$val->url.'" target="_blank"><img src="/'.get_litpic($val, '110x80').'" width="110" height="80" title="'.$val->title.'"></a><div class="l_title">'.l($val->title, $val->url) .'</div></div>';
						}}
							$output .= theme('item_list', $items, NULL, 'ul', array('id' => 'similar_list'));
							echo $output;
						};?>
				</div>
			</div>
			<?php };?>
		</div>

		<div class="content_view_links">
			<?php if ($content->comment_count) : ?>
			<?php echo '<a href="#content_view_comment_wrapper">' . t('content', '共 !count 条评论', array('!count' => $content->comment_count)) . '</a>'; ?>
			<?php endif?>
			
			<?php if ($content->is_update) : ?>
			<?php echo l(t('content', '编辑'), 'content/' . $content->type . '/' . $content->nid . '/edit', dd_get_redirect()); ?>
			<?php endif?>

			<?php if ($content->is_delete) : ?>
			<?php echo l(t('content', '删除'), 'content/' . $content->type . '/' . $content->nid . '/delete'); ?>
			<?php endif?>
		</div>

		<?php if (!empty($content->is_comment)) : ?>
		<div id="content_view_comment_wrapper">
				<?php if ($content->comment_form) { ?>
					<?php echo $content->comment_form?>
				<?php }?>
				<?php if ($content->comment_view): ?>
					<h1>全部评论</h1>
					<?php echo $content->comment_view?>
					<?php echo $content->comment_pager?>
				<?php endif?>
				<div class="bdshare_t bds_tools get-codes-bdshare comment_baidu_share">
						<li><a class="bds_qzone"><span style="position:relative;top:-6px;">QQ空间</span></a></li>
						<li><a class="bds_tsina"><span style="position:relative;top:-6px;">新浪微博</span></a></li>
						<li><a class="bds_tqq"><span style="position:relative;top:-6px;">腾讯微博</span></a></li>
						<li><a class="bds_renren"><span style="position:relative;top:-6px;">人人网</span></a></li>
				</div>
		</div>
		<?php endif ;?>

	</div>
</div>
<?php include "right.tpl.php";?>