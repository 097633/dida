<div id="footer">
	<div class="wrapper">
		<div class="fabout">
			<div class="fatop">
				<li><a href="<?php echo $base_path?>"><?php echo $site_global->name; ?></a></li>
				<?php $data = article_list('136');if($data){foreach($data as $val){;?>
					<li><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a></li>
				<?php }};?>
				<li class="last"><a href="/sitemap.xml">网站地图</a>
			</div>
			<div class="fabottom">
				<?php echo $site_global->footer; ?><?php echo $footer; ?><?php echo $closure; ?><?php echo $debug;?>
			</div>
		</div>
		<div class="femail">

		</div>
	</div>
</div>	