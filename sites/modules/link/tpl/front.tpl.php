<div id="hzmt">
	<?php $data = get_term_byvname('lanmu', 'link');if($data){foreach($data as $key=>$val){;?>
		<div class="hzhb">
			 <div class="link_title"><?php echo $val->name;?></div>
			 <div class="link_con">
					<?php $mdata = link_list($val->tid, 0, 100);if($mdata){foreach($mdata as $mval){;?>
								<li><a href="<?php echo $mval->url;?>" target="_blank"><?php echo $mval->title;?></a></li>
					<?php }};?>
				</div>
		</div>
	<?php }};?>
</div>