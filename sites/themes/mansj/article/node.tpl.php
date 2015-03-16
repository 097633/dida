	<div class="new_content">
				<h1><?php echo $article->title;?></h1>
							<div class="source">
																	<span><?php echo date('Y-m-d', $article->timestamp);?>&nbsp;&nbsp;<?php echo $article->name;?></span>
							</div>
							<?php echo $article->body;?>
							<div class="botton">
									<ul>
											
											<li class="loves"><a href="javascript:void(0);" class="favourite <?php if($article->favourite){echo 'favourited';};?>" id="favourite_<?echo $article->nid;?>" title="<?php echo $article->nid;?>"><?php if($article->favourite){echo '已收藏';}else{echo '收藏';};?></a></li>
											<li class="mainlevel shars" id="mainlevel">
													<a href="javascript:void(0);">分享</a>
													<ul id="sub_06" style="display:none; position:relative; z-index:1000">
															<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" style=" background:#ffffff; border:#f2f2f2 solid 1px; ">
																	<li><a class="bds_qzone"><span style="position:relative;top:-6px;">QQ空间</span></a></li>
																	<li><a class="bds_tsina"><span style="position:relative;top:-6px;">新浪微博</span></a></li>
																	<li><a class="bds_tqq"><span style="position:relative;top:-6px;">腾讯微博</span></a></li>
																	<li><a class="bds_renren"><span style="position:relative;top:-6px;">人人网</span></a></li>
															</div>
													</ul>
											</li>
									</ul>
							</div>
							<div class="clear"></div>
													<?php if($article->fields['tags']){;?>
													<div class="label">标签：
															<?php foreach ($article->fields['tags'] as $tag){;?> 
															<a href="/category/<?php echo $tag->tid;?>" title="<?php echo $tag->name;?>"><?php echo $tag->name;?></a>    
															<?php };?>
													</div>
													<?php };?>
			</div>
			<!--评论-->
					<?php echo article_comment($article);?>
        <div class="clear"></div>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->