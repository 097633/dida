<div class="block about">
	<h1 class="newst">关于本站</h1>
	<div class="content">
		<?php echo $GLOBALS['conf']['site_global']['description'];?>
	</div>
</div>
<div class="block shijie">
	<h1 class="newst">创业日记</h1>
	<div class="content">
	<?php $fetch = haotie_list('', 0, 10, 's');if($fetch){foreach($fetch as $val){?>
			<li class="zlmore_list"><a href="/haotie/<?php echo $val->nid;?>"><?php echo $val->title;?></a></li>
		<?php }};?>
	</div>
</div>
<div class="block tags">
	<h1 class="newst"><a href="/tags">热门标签</a></h1>
	<div class="content">
		<?php $data = get_term_byvname('tags', 'article', 20);
			if($data){foreach($data as $key=>$val){
			if($key < 2){
				$class = 'tag1';
			}
			if($key >= 2 && $key < 6){
				$class = 'tag2';
			}
			if($key >= 6){
				$class = 'tag3';
			}
		;?>
		<li class="<?php echo $class;?>"><a href="<?php echo url('tag/'.$val->name);?>"><?php echo $val->name;?></a></li>
		<?php }};?>
	</div>
</div>


<?php include "remen.tpl.php";?>

<?php if(arg(0) == ''){;?>
<div class="block wangping">
	<h1 class="newst">精彩网评</h1>
	<div class="content">
	<?php $data = comment_list(0, 6);if($data){foreach($data as $key=>$val){;?>
		<div class="wp_list">
			<div class="submit"><span class="name"><a href="<?php echo $val->url;?>#comment_article_<?php echo $val->cid;?>" target="_blank"><?php echo $val->name;?>：</a></span></div>
			<div class="des"><a href="<?php echo $val->url;?>#comment_article_<?php echo $val->cid;?>" target="_blank"><?php echo $val->body;?></a></div>
		</div>
		<?php }};?>
	</div>
</div>
<?php };?>