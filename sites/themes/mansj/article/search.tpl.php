<div class="title">
							<h1>关键词:<?php echo $_GET['keyword'];?></h1>
					</div>
	<?php if($data){foreach($data as $val){;?>
	<div class="W_linka">
			<div class="home_pic"><a href="<?php echo $val->url;?>"><img src="<?php echo get_litpic($val);?>" width="160" height="120"/></a></div>
					
			<div class="home_text">
					<dl class="feed_list W_linecolor">
							<dd class="content">
									<h1><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a></h1>
									<dl class="comment"><?php echo $val->description;?></dl>
									<p class="info W_linkb W_textb">
											<span>
													<a href="javascript:void(0)" class="love_2" id="article_like_516">浏览量(<?php echo $val->click;?>)</a>
																											<a href="javascript:void(0)" class="favourite" id="favourite_516">收藏(0)</a>
																									<a href="<?php echo $val->url;?>#comment" class="review_2">评论(0)</a>
											</span>
											2012-12-29 15:21:03<a href="<?php echo url('category/'.$val->fields['lanmu']->tid);?>" class="list"><?php echo $val->fields['lanmu']->name;?></a>
									</p>
							</dd>
					</dl>
			</div>
			<div class="clear"></div>
	</div>
	<?php }};?>
	<?php echo pager_view();?>