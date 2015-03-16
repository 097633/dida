<?php include "header.tpl.php";?>
		<div id="main"> 
				<div id="center">
					<div class="frontleft">
						
            <div class="fcon">		
							<div class="item-list">
								<?php $data = pager_query('SELECT nid FROM `article` WHERE  status = 1 ORDER BY nid DESC', 10, 0, NULL);if($data){foreach($data as $val){$val = article_load($val->nid);?>
									<div class="front_term_list">
										<div class="litpic"><a href="<?php echo $val->url;?>" target="_blank"><img src="<?php echo get_litpic($val, '200x150');?>" title="<?php echo $val->title;?>" width="200" height="150" /></a>
										</div>
										<div class="fcon_right">
											<h3><a href="<?php echo $val->url;?>" target="_blank"><?php echo $val->title;?></a><?php if($key < 2){;?><!--<span class="hot"><img src="<?php echo path_to_theme();?>/images/hot.png" /></span>--><?php };?></h3>
											<div class="submit"><span class="author"><a href="/user/<?php echo $val->uid;?>" target="_blank"><?php echo $val->name;?></a></span>发表于&nbsp;&nbsp;<?php echo date('Y-m-d H:i', $val->created);?></div>
											<div class="des"><a href="<?php echo $val->url;?>" target="_blank"><?php echo mb_substr(strip_tags($val->description), 0, 160, 'utf-8');?><span class="fmore"></span></a></div>
											<div class="fcon_bottom">
												<div class="ftags">
													<?php if($val->fields['tags'] != ''){foreach($val->fields['tags'] as $tag){;?>
														<li><a href="<?php echo url('tag/'.$tag->name);?>" target="_blank"><?php echo $tag->name;?></a></li>
													<?php }};?>
												</div>
												<div class="fshare">
													<span class="qq"><a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title=<?php echo '【'.$val->title.'】'.mb_substr(strip_tags($val->description), 0, 120, 'utf-8');?>&url=http://<?php echo $_SERVER['HTTP_HOST'].$val->url;?>" target="_blank"></a></span>
													<span class="sina"><a href="http://service.weibo.com/share/share.php?title=<?php echo '【'.$val->title.'】'.mb_substr(strip_tags($val->description), 0, 120, 'utf-8');?>&url=http://<?php echo $_SERVER['HTTP_HOST'].$val->url;?>" target="_blank"></a></span>
												</div>
											</div>
										</div>
									</div>
								<?php }};?>
							</div>
							<?php echo pager_view();?>
						</div>
					</div>
					<div class="frontright">
						<?php include DIDA_ROOT.path_to_theme()."/content/huati.tpl.php";?>
					</div>
				</div>
				
		</div>
	</div>
	</div>
		<div id="footer">
		<div class="hzhb">
			 <div class="link_title">友情链接</div>
			 <div class="link_con">
				<?php $data = link_list('', 0, 100);if($data){foreach($data as $val){?>
				<li><a href="<?php echo $val->url;?>" target="_blank"><?php echo $val->title;?></a></li>
				<?php }};?>
			</div>
		</div>
	</div>	
<?php include "footer.tpl.php";?>
</body>
</html>