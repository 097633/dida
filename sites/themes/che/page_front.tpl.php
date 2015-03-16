<?php include "header.tpl.php";?>
		<div id="banner">
				<div id="play">
					<div id="play_bg"></div>
				 
					<div id="play_list">
					<?php $data = article_list('',0,5,'s');if($data){foreach($data as $val){?>
					 <a href="<?php echo $val->url;?>" target="_blank">
						<img src="<?php echo get_litpic($val,'960x430');?>" title="<?php echo $val->title;?>" alt="<?php echo $val->description;?>" /> </a>
					<?php }};?>
					</div>
					<div id="play_info"></div>
					<div id="playbom">
					<div id="play_text">
						<ul>
						<?php if($data){foreach($data as $val){?>
						 <li><img src="<?php echo get_litpic($val,'120x54');?>" title="<?php echo $val->title;?>" alt="<?php echo $val->title;?>" /></li>
						<?php }};?>
						</ul>
					 </div>
				  </div>
				</div>
				<div id="kuaixun">
					<div class="kxtitle">
						<h1>业界快讯<span class="more">更多>></span></h1>
					</div>
					<div class="kxcon">
						<ul>
							<?php $data = article_list('', 10, 7);if($data){foreach($data as $val){;?>
							<li><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a><p><?php echo $val->name;?> <?php echo date('Y-m-d', $val->timestamp);?></p></li>
							<?php }};?>
						</ul>
					</div>
				</div>
		</div>
		<div id="main"> 
				<div id="center">
					<div class="frontleft">
						<div class="fcontop">
							<?php $data = article_list('', 20, 3);if($data){foreach($data as $key=>$val){$middle = '';if($key == 1){$middle = 'middle';};?>
								<div class="rwblock <?php echo $middle;?>">
									<div class="rwtitle">
										<div class="rwpic"><a href="<?php echo $val->url;?>"><img src="<?php echo get_litpic($val);?>" width="77" height="77" /></a></div>
										<h1><?php echo $val->name;?></h1>
										<h3><?php echo $val->title;?></h3>
									</div>
									<div class="rwcon">
										<a href="<?php echo $val->url;?>"><?php echo $val->description;?></a>
									</div>
									<div class="rwmore">
										<a href="<?php echo $val->url;?>">详细>></a>
									</div>
								</div>
							<?php }};?>
						</div>
            <div class="fcon">
							<h1 class="newst">最新发布</h1>
							<div class="item-list">
								<ul id="front_term_list">
								<?php $data = article_list('', 16, 4);if($data){foreach($data as $key=>$val){;?>
									<li><div class="litpic"><a href="<?php echo $val->url;?>"><img src="<?php echo get_litpic($val, '260x180');?>" title="<?php echo $val->title;?>" width="260" height="180" /></a></div><h3><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a><div class="entitle"><?php echo $val->ename;?></div></h3><div class="des"><?php echo $val->description;?></div></li>
								<?php }};?>
								<ul>
							</div>
						</div>
					</div>
					<div class="frontright">
						<div class="block huati">
							<h1 class="newst">大家正在聊的话题</h1>
							<div class="item-list">
								<ul id="front_term_list">
								<?php foreach($data as $val){;?>
									<li>
										<div class="htdate"><?php echo date('Y-m-d', $val->timestamp);?></div>
										<h3><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a><div class="entitle"><?php echo $val->ename;?></div></h3>
										<div class="des"><?php echo $val->description;?></div>
								<?php };?></li>
								<ul>
							</div>
							<div class="htmore"><a href="#">更多话题>></a></div>
						</div>
						<div class="block tags">
							<h1 class="newst">热聊关键词</h1>
							<?php $data = get_term_byvname('tags', 'article', 15);if($data){foreach($data as $val){;?>
							<li><a href="<?php echo url('tags/'.$val->name);?>"><?php echo $val->name;?></a></li>
							<?php }};?>
						</div>
					</div>
				</div>
				
		</div>
	</div>
	</div>
<?php include "footer.tpl.php";?>
<div class="go">
	<a title="返回顶部" class="top" href="javascript:"></a>
	<a title="欢迎您给我留言！" class="feedback" href="<?php echo url('guestbook');?>"></a>
	<a title="返回底部" class="bottom" href="javacript:"></a>
</div>
<script>
$('.top').click(function(){
	$("body").animate({scrollTop: $('#header').offset().top}, 500);
	return false;
});
$('.bottom').click(function(){
	$("body").animate({scrollTop: $('#footer').offset().top}, 500);
	return false;
});
</script>
<script type="text/javascript">
var t = n = 0, count = $("#play_list a").size();
$(function(){
 $("#play_list a:not(:first-child)").hide();
 $("#play_info").html('<h1>'+$("#play_list a:first-child").find("img").attr('title')+'</h1><div>'+$("#play_list a:first-child").find("img").attr('alt')+'</div>');
 $("#play_info").unbind().click(function(){window.open($("#play_list a:first-child").attr('href'), "_blank")})
 $("#play_text li").click(function() {
	$(this).addClass('active').siblings().removeClass("active"); ;
  var i = $(this).index();
  n = i;
  if (i >= count) return;
  $("#play_info").html('<h1>'+$("#play_list a").eq(i).find("img").attr('title')+'</h1><div>'+$("#play_list a").eq(i).find("img").attr('alt')+'</div>');
  $("#play_info").unbind().click(function(){window.open($("#play_list a").eq(i).attr('href'), "_blank")})
  $("#play_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
  //$(this).css({"background":"#fff",'color':'#000'}).siblings().css({"background":"#000",'color':'#fff'});
 });
 t = setInterval("showAuto()", 5000);
 $("#play").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 5000);});
})
function showAuto()
{
 n = n >= (count - 1) ? 0 : ++n;
 $("#play_text li").eq(n).trigger('click');
}
</script>
</body>
</html>