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

<div class="content_type_view span-19 puser">

 <!-- <h1 class="content_type_title"><?php echo $type->name?></h1>-->

  <div class="content_type_view_content">
			<div class="item-list">
<?php
	$class = '';
  foreach ($data as $key=>$val) {$val = user_load($val->uid);$isgz = db_query("SELECT iid FROM {voteapi_info} WHERE nid = ? AND uid = ?", array($val->uid, $GLOBALS['user']->uid), array('return' => 'column'));if($key % 2 != 0){$class = 'odd';}else{ $class = '';}if($val->fields['litpic'] !=''){$litpic = reset($val->fields['litpic']);}else{$litpic = '';};	
;?>
		<div class="front_term_list <?php echo $class;?>">
			<h3 class="name"><a href="<?php echo url('user/'.$val->uid);?>"><?php echo $val->name;?></a><span class="zhiwei"><?php echo $val->fields['zhiwei']->text;?></span></h3>
			<div class="litpic"><a href="<?php echo url('user/'.$val->uid);?>""><img src="/<?php echo get_litpic($litpic, '85x85');?>" title="<?php echo $val->name;?>" width="85" height="85" /></a>
			</div>
			<div class="fcon_right">
				<div class="jieshao"><?php $art = db_query("SELECT nid,title FROM {content_ext_news} WHERE uid = ?", array($val->uid), array('return' => 'one'));if($art){;?><a href="<?php echo url('content/news/'.$art->nid);?>"><?php echo $art->title;?></a><?php };?></div>
				<!--
				<div class="ftags">
					<span class="fl">标签:</span>
					<?php if($val->fields['tags'] != ''){foreach($val->fields['tags'] as $tag){;?>
						<li><a href="<?php echo url('tags/'.$tag->name);?>"><?php echo $tag->name;?></a></li>
					<?php }};?>
				</div>
				<?php if($isgz == ''){;?>
				<div class="sgz guanzhu user<?php echo $val->uid;?>"><a href="javascript:" alt="<?php echo url('voteapi/content/guanzhu', array('query' => array('ext_id' => 1, 'nid' => $val->uid, 'value' => 1)));?>">关注+</a></div>
				<?php }else{;?>
				<div class="sgz gzed">已关注</div>
				<?php };?>
				-->
			</div>
		</div>
<?php };?>
  
<?php echo pager_view();?>
							<ul>
			</div>
  </div>

</div>
<div class="pguandian_right">
							<h1 class="newstt"><a href="/guandian">最近更新</a><a href="/guandian" class="more"></a></h1>
						<div class="block remen">
							<div class="content stab">
							<?php $data = content_list('news','23', 0, 5);if($data){foreach($data as $key=>$val){;?>
								<div class="remen_list remen_list<?php echo $key;?>">
									<div class="litpic"><a href="<?php echo $val->url;?>"><img src="/<?php echo get_litpic($val, '80x60');?>" title="<?php echo $val->title;?>" width="80" height="60" /></a>
										</div>
									<div class="title"><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a></div>
									<div class="submit"><span><?php echo date('Y-m-d', $val->created);?></span></div>
								</div>
								<?php }};?>
							</div>
						</div>
<!--
<div class="block wangping">
							<h1 class="newst">最近更新</h1>
							<div class="content">
							<?php $data = content_list('news', '23', 0, 6);if($data){foreach($data as $key=>$val){
								$user = user_load($val->uid);
								if($user->roles[4] == ''){
									$user->name = $val->fields['zuozhe']->text;
									$val->userurl = $val->url;
								}else{
									$val->userurl = url('user/'.$user->uid);
								}	
							;?>
								<div class="remen_list">
									
									<div class="litpic"><a href="<?php echo $val->url;?>"><img src="/<?php echo get_litpic($user, '50x50');?>" title="<?php echo $val->title;?>" width="50" height="50" /></a>
										</div>
									<div><div class="submit"><span class="blue"><a href="<?php echo $val->userurl;?>"><?php echo $user->name;?></a></span></div><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a><div class="entitle"><?php echo $val->ename;?></div></div>
								</div>
								<?php }};?>
							</div>
						</div>
-->
</div>

<script>
	$(function(){
		$(".guanzhu").click(function(){
			$.getJSON($(this).children("a").attr('alt'),function(data){
				if(typeof data.iid != "undefined"){
					$('.user'+data.nid).addClass('gzed');
					$('.user'+data.nid).text('已关注');
				}
				if(typeof data.text != "undefined"){
					alert('您已经关注过该作者');
				}
			})
		})
	})
</script>