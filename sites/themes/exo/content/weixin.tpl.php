<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>

<meta name="author" content="Tomiezhang"/>
<meta name="copyright" content="Copyright (c) 1998-2012 Cheyun." />
<meta http-equiv="pragma" content="no-cache" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-capable"content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style"content="black"/>
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="HandheldFriendly"content="true"/>
<meta http-equiv="x-rim-auto-match"content="none"/>
<meta name="format-detection"content="telephone=no">
<title><?php echo $content->title;?></title>
<link href="/sites/themes/che1/css/content2.1.0.css" rel="stylesheet" type="text/css">
<script src="/misc/jquery.js"></script>
<script>
$(document).ready(function() {  
     $("#content img").each(function() {  
		 var maxWidth = document.body.clientWidth - 30; // 图片最大宽度 
		 var ratio = 0;  // 缩放比例  
		 var width = $(this).width();    // 图片实际宽度  
		 var height = $(this).height();  // 图片实际高度 
		 //$(this).css("height", width * 3 / 4);  // 设定等比例缩放后的高度  
		 // 检查图片是否超宽  
		 if(width > maxWidth){  
			 ratio = width / maxWidth;   // 计算缩放比例  
			 $(this).css("width", maxWidth); // 设定实际显示宽度  
			 height = height / ratio;    // 计算等比例缩放后的高度   
			 $(this).css("height", height);  // 设定等比例缩放后的高度  
		 }  

	 });   
	 $("blockquote").each(function(){
		var yinyong = "<div class=yytop></div><div id=yinyongcon>"+$(this).html()+"</div><div class=yybom></div>";
		$(this).html(yinyong);
	})
});

</script>
<style>
blockquote{
	position:relative;
	padding-left:30px;
	margin:0px;
}
.yytop{
	background:url(/sites/themes/che1/images/yytop.png) no-repeat;
	width:20px;
	height:20px;
	position:absolute;
	top:0px;
	left:0px;
}
.yybom{
	background:url(/sites/themes/che1/images/yybom.png) no-repeat;
	width:20px;
	height:20px;
	position:absolute;
	right:0px;
	bottom:0px;
}
#yinyongcon{
	width:80%;
}
</style>
</head>
<body>
<div class="page1" id="TencentContent">
<div class="content ui-content">
<h1><?php echo $content->title;?></h1>
<div class="content-info"><span class="content-info-time"><?php echo date('Y-m-d', $content->check_time);?></span><span class="content-info-source">车云网</span></div>
<div class="content-main" id="content">
	<?php echo $content->body;?>
</div>
<div id="relatedNews" class="relatednews">
	<div class="relatednews-tit"><span>其他热点</span></div>
	<ul>
	<?php if($content->fields['tags'] != ''){foreach($content->fields['tags'] as $val){$tids .= $val->tid.',';};$tids = substr($tids, 0, -1);}if($tids != ''){$data = db_query("SELECT DISTINCT n.nid,n.title FROM {content_ext_news} n INNER JOIN {fields_term_node} ftn ON n.nid = ftn.nid WHERE n.nid > 0 AND n.check_status = 1 AND ftn.tid > 0 AND n.flag = ? AND ftn.tid in (".$tids.") AND n.nid != ?", array('s', $content->nid), array('limit' => array(0,5)));if($data){foreach($data as $val){;?>
	<li><a href="/weixin/news/<?php echo $val->nid;?>"><?php echo $val->title;?></a>
	<?php }}};?>
	</ul>
</div>
<!--
<div class="main-ad"><a href="http://ifzq.gtimg.cn/appstock/app/appd/?source=wap_newspage" target="_blank"><img src="http://mat1.gtimg.com/joke/mobile/ad2.png" class="download"/></a></div>
-->
</div>
<div style="display:none">
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F216b3f18a81a13bab2862cf9dccd587e' type='text/javascript'%3E%3C/script%3E"));
</script>
</div>
</body>
</html>