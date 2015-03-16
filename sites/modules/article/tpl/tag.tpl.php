<style>
	h2{background:#eee;font-size:12px;padding:5px;margin:10px 0px;}
	.video{height:100%;overflow:hidden;}
	.video li{width:48%;float:left;margin-left:1%;min-height:150px;margin-bottom:5px;}
	.video li img{width:100%;height:130px;}
	.video .tit{height:20px;overflow:hidden;margin-top:5px;}
</style>
导语：<?php
echo $tag->description;
?>
<?php $fetch = pager_query("SELECT DISTINCT n.nid FROM {article} n LEFT JOIN {fields_term_node} ftn ON n.nid = ftn.nid LEFT JOIN {fields_term_node} ftn1 ON n.nid = ftn1.nid WHERE ftn1.tid = ? AND n.status = 1 ORDER BY n.nid DESC", 40, 0, NULL, array($tag->tid));if($fetch){;?>
<h2><?php echo $tag->name;?>资讯</h2>
<div class="news">
	<?php foreach($fetch as $key => $val){;$val = article_load($val->nid);?>
		<li>
			<div class="tit"><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a></div>
		</li>
	<?php };?>
</div>
<div class="pagers">
	<?php echo pager_view();?>
</div>
<?php };?>
<?php $fetch = pager_query("SELECT DISTINCT n.nid FROM {article} n LEFT JOIN {fields_term_node} ftn ON n.nid = ftn.nid LEFT JOIN {fields_term_node} ftn1 ON n.nid = ftn1.nid WHERE ftn.tid = ? AND ftn1.tid = ? ORDER BY n.nid DESC", 10, 0, NULL, array(2, $tag->tid));if($fetch){;?>
<h2><?php echo $tag->name;?>二人转资讯</h2>
<div class="news">
	<?php foreach($fetch as $key => $val){;$val = article_load($val->nid);?>
		<li>
			<div class="tit"><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a></div>
		</li>
	<?php };?>
</div>
<div class="pagers">
	<?php echo pager_view();?>
</div>
<?php };?>

<?php $fetch = pager_query("SELECT DISTINCT n.nid FROM {article} n LEFT JOIN {fields_term_node} ftn ON n.nid = ftn.nid LEFT JOIN {fields_term_node} ftn1 ON n.nid = ftn1.nid WHERE ftn.tid = ? AND ftn1.tid = ? AND n.status = 1 ORDER BY n.nid DESC", 4, 0, NULL, array(5, $tag->tid));if($fetch){;?>
<h2><?php echo $tag->name;?>影视娱乐</h2>
<div class="video">
	<?php foreach($fetch as $key => $val){;$val = article_load($val->nid);?>
		<li>
			<div class="litpic"><a href="<?php echo $val->url;?>"><img src="<?php echo get_litpic($val, '200x180');?>" /></a></div>
			<div class="tit"><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a></div>
		</li>
	<?php };?>
</div>
<div class="pagers">
	<?php echo pager_view();?>
</div>
<?php };?>

<!-- JiaThis Button BEGIN --> 
				<br /><br />
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
				<br /><br />
				<!-- JiaThis Button END -->


	<!-- 多说评论框 start -->
	<div class="ds-thread" data-thread-key="tag<?php echo $tag->tid;?>" data-title="<?php echo $tag->name;?>" data-url="http://www.errenzhuan.org/tag/<?php echo $tag->tid;?>"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"097633"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- 多说公共JS代码 end -->