	<h1 class="newst">热门文章</h1>
	<div class="block remen">
		<div class="content stab">
		<?php $stime = strtotime(date('Y-m-d 00:00:00', strtotime("-2 day")));$data = article_list('', 0, 5, '', 'n.click DESC');if($data){foreach($data as $key=>$val){;?>
			<div class="remen_list remen_list<?php echo $key;?>">
				<div class="litpic"><a href="<?php echo $val->url;?>" target="_blank"><img src="/<?php echo get_litpic($val, '80x60');?>" title="<?php echo $val->title;?>" width="80" height="60" /></a>
					</div>
				<div class="title"><a href="<?php echo $val->url;?>" target="_blank"><?php echo $val->title;?></a></div>
				<div class="submit"><span><?php echo date('Y-m-d', $val->created);?></span></div>
			</div>
			<?php }};?>
		</div>
	</div>