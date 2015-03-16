<?php include "head.tpl.php";?>
<link rel="stylesheet" href="<?php echo path_to_theme();?>/css/iview/iview.css" />
<link rel="stylesheet" href="<?php echo path_to_theme();?>/css/iview/skin/style.css" />
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/iview.js"></script>
<script>
    $(document).ready(function(){
        $('#iview2').iView({
            pauseTime: 12000,
            pauseOnHover: true,
            directionNavHoverOpacity: 0,
            controlNav: true,
            controlNavNextPrev: false,
            controlNavTooltip: false,
            timer: "360Bar",
            timerDiameter: 30,
            timerPadding: 3,
            timerStroke: 4,
            timerBarStroke: 0,
            timerColor: "#0F0",
            timerPosition: "top-right"
        });
    });
</script>
<div id="iview2" class="iview">
    <div data-iview:image="http://www.manshijian.com/images/banner_home_1.jpg"></div>
    <div data-iview:image="http://www.manshijian.com/images/banner_home_2.jpg"></div>
    <div data-iview:image="http://www.manshijian.com/images/banner_home_3.jpg"></div>
</div><div class="body_main">
    <div class="left">
        <div class="title">
            <h1>慢活动</h1>
        </div>
  <?php $data = party_list('', 2, 3);if($data){foreach($data as $key=>$val){;?>      
        <div class="about_box <?php if($key == 1){echo 'left_right';};?>">
    <div class="box-img"><a href="<?php echo $val->url;?>"><img src="<?php echo get_litpic($val);?>" width="210" height="150" /></a>
        <div class="text">
            <a href="<?php echo $val->url;?>">
                <span class="yellows"><?php echo $val->title;?></span>
                
	
		<?php echo $val->description;?>...            </a>
        </div>
        <p align="right" class="more"><a href="<?php echo $val->url;?>">详细...</a></p>
        <p>
            <a href="<?php echo $val->url;?>" class="share">分享</a>
            <a href="<?php echo $val->url;?>#comment" class="review">
                                评论(4)
                            </a>
            <a href="javascript:void(0)" class="love" id="party_like_2">赞<span>(20)</span></a>
        </p>
        <div class="clear"></div>
    </div>
</div>
<?php }};?>
        
        <div class="left_body">
            <div class="title">
                <h1>慢资讯</h1>
            </div>
            	<?php $data = article_category_list();if($data){foreach($data as $val){;?>
	<div class="W_linka">
			<div class="home_pic"><a href="<?php echo $val->url;?>"><img src="<?php echo get_litpic($val);?>" width="160" height="120"/></a></div>
					
			<div class="home_text">
					<dl class="feed_list W_linecolor">
							<dd class="content">
									<h1><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a></h1>
									<dl class="comment"><?php echo $val->description;?></dl>
									<p class="info W_linkb W_textb">
											<span>
													<a href="javascript:void(0)" class="favourite <?php if($val->favourite){echo 'favourited';};?>" id="favourite_<?echo $val->nid;?>" title="<?echo $val->nid;?>"><?php if($val->favourite){echo '已收藏';}else{echo '收藏';};?></a>
																									<a href="<?php echo $val->url;?>#comment_form" class="review_2">评论(<?php echo $val->comment_num;?>)</a>
											</span>
											2012-12-29 15:21:03<a href="<?php echo url('category/'.$val->fields['lanmu']->tid);?>" class="list"><?php echo $val->fields['lanmu']->name;?></a>
									</p>
							</dd>
					</dl>
			</div>
			<div class="clear"></div>
	</div>
	<?php }};?>
            
            <div class="list_p4">
                <?php echo pager_view();?>
            </div>
        </div>
        <div class="clear"></div>
        
        
    </div>
    
	<?php include "article/right.tpl.php";?>
</div>
<?php include "foot.tpl.php";?>

<script type="text/javascript">
    $(document).ready(function(){

    });
</script>
</body>
</html>