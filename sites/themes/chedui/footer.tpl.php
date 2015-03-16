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
		</div>
		<div class="femail"><?php echo $closure; ?>
			北京车队网络技术有限公司<br />
			京ICP-345234号<br/>
			Copyright@1996-2013 CHEDUI.COM
		</div>
	</div>
</div>	