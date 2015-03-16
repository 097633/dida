<div class="left_body">
            <div class="title">
                <h1><?php echo $_GET['keyword'];?></h1>
            </div>
	<?php if($data){foreach($data as $val){;?>
	<div class="W_linka" date="<?php echo date('Y-m-d', $val->timestamp);?>">
			<div class="home_pic"><a href="<?php echo $val->url;?>"><img src="<?php echo get_litpic($val);?>" width="160" height="120"/></a></div>
					
			<div class="home_text" time="<?php echo $val->timestamp;?>">
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
	<?php //echo pager_view();?>
</div>
<!---
<script src="/sites/themes/jiaju/jquery.scrollajax.js"></script>
<script type="text/javascript">
$(function(){
	$('#content').scrollAjax({
		loadIimage: '',
		firstUrl: '/?q=getday&day=<?php echo $year.'-'.$month.'-'.$day;?>' // 第一页 url
	  });		   
});
</script>
-->
<script src="/sites/themes/jiaju/dimensions.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    	
	function lastAddedLiveFunc() 
	{ 
		//$('div#lastPostsLoader').html('<img src="/sites/themes/jiaju/bigLoader.gif">');
		$.get("getday?act=ajax&day="+$("#center .W_linka:last").attr("date"),

		function(data){
			//alert($(".W_linka").size());
			if (data != "") {
			$("#center .W_linka:last").after(data);			
			}
			//$('div#lastPostsLoader').empty();
		});

	};  
	
	$(window).scroll(function(){
		if  ($(window).scrollTop() == $(document).height() - $(window).height()){
		   lastAddedLiveFunc();
		}
	}); 
	




});
</script>
<!--


function getday(){
	if($_GET['day'] != ''){
		$stime = strtotime($_GET['day']);
		$etime = $stime + 86400;
		$fetch = db_query("SELECT * FROM {article} WHERE 1 ORDER BY rand()", array());
		foreach($fetch as $key=>$val){
			$str .= '<div class="W_linka" date="'.date('Y-m-d', $val->timestamp).'">';
			$str .= '<h1>'.$val->title.'</h1>';
			$str .= '</div>';
			$arr['data'][] = $str;
			
		}
		$arr['nextUrl'] = '/?q=getday&day='.$val->nid;
		echo json_encode($arr);exit();
	}
}

function getday(){
	if($_GET['day'] != ''){
		$stime = strtotime($_GET['day']);
		$etime = $stime + 86400;
		$fetch = db_query("SELECT * FROM {article} WHERE 1 ORDER BY rand()", array());
		foreach($fetch as $key=>$val){
			$str .= '<div class="W_linka" date="'.date('Y-m-d', $val->timestamp).'">';
			$str .= '<h1>'.$val->title.'</h1>';
			$str .= '</div>';
		}

		echo $str;exit();
	}
}
-->