<head>
<title><?php echo $content->title;?></title>
<style>
.share-cwb {
	position: fixed;
	margin-left: 310px;
	left: 50%;
	top: 70px;
	cursor: pointer;
	z-index: 2;
	width: 142px;
	padding: 40px;
	background: #efefef;
	border-radius: 5px;
	box-shadow: 0 2px 8px #ddd;
}
#wrapper {
	margin: 20px auto;
	width: 440px;
	border: 1px solid #ddd;
	padding: 20px 50px;
	background-color: #fbfbfb;
	border-radius: 5px;
}
.a_demo_one {
	background-color:#3bb3e0;
	padding:10px;
	position:relative;
	font-family: 'Open Sans', sans-serif;
	font-size:12px;
	text-decoration:none;
	color:#fff;
	border: solid 1px #186f8f;
	background-image: linear-gradient(bottom, rgb(44,160,202) 0%, rgb(62,184,229) 100%);
	background-image: -o-linear-gradient(bottom, rgb(44,160,202) 0%, rgb(62,184,229) 100%);
	background-image: -moz-linear-gradient(bottom, rgb(44,160,202) 0%, rgb(62,184,229) 100%);
	background-image: -webkit-linear-gradient(bottom, rgb(44,160,202) 0%, rgb(62,184,229) 100%);
	background-image: -ms-linear-gradient(bottom, rgb(44,160,202) 0%, rgb(62,184,229) 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, rgb(44,160,202)),
	color-stop(1, rgb(62,184,229))
	);
	-webkit-box-shadow: inset 0px 1px 0px #7fd2f1, 0px 1px 0px #fff;
	-moz-box-shadow: inset 0px 1px 0px #7fd2f1, 0px 1px 0px #fff;
	box-shadow: inset 0px 1px 0px #7fd2f1, 0px 1px 0px #fff;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
}

.a_demo_one::before {
	content:"";
	display:block;
	position:absolute;
	width:100%;
	height:100%;
	left:-8px;
	top:-8px;
	z-index:-1;
}

.a_demo_one:active {
	padding-bottom:9px;
	padding-left:10px;
	padding-right:10px;
	padding-top:11px;
	top:1px;
	background-image: linear-gradient(bottom, rgb(62,184,229) 0%, rgb(44,160,202) 100%);
	background-image: -o-linear-gradient(bottom, rgb(62,184,229) 0%, rgb(44,160,202) 100%);
	background-image: -moz-linear-gradient(bottom, rgb(62,184,229) 0%, rgb(44,160,202) 100%);
	background-image: -webkit-linear-gradient(bottom, rgb(62,184,229) 0%, rgb(44,160,202) 100%);
	background-image: -ms-linear-gradient(bottom, rgb(62,184,229) 0%, rgb(44,160,202) 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, rgb(62,184,229)),
	color-stop(1, rgb(44,160,202))
	);
}
#J_SahreTencentWeibo{
	margin-bottom:30px;
}
</style>
<script src="http://mat1.gtimg.com/app/openjs/openjs.js#autoboot=no&debug=no"></script>
</head>
<body style="background:#ddd;">
<div id="wrapper">
	<div class="">
		<img src="/<?php echo $content->fields['pweibo_image']->text;?>" alt="<?php echo $content->title;?>" />
	</div>
	<aside id="J_ShareCwb" class="share-cwb">
			<span class="arrow arrow-right"></span>
			<div id="J_SinawbShareBtn"><iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://hits.sinajs.cn/A1/weiboshare.html?url=<?php echo url('content/news/'.$content->nid, array('absolute' => 1));?>&pic=<?php echo url($content->fields['pweibo_image']->text, array('absolute' => 1));?>&type=4&count=0&appkey=2772204160&title=<?php echo urlencode('【'.$content->title.'】'.$content->description);?>&ralateUid=3238494402&language=zh_cn&rnd=<?php echo time();?>" width="142" height="36"></iframe></div>
			<br>
			<div id="J_SahreTencentWeibo" class="hide" style="display: block;">
					<div id="qqwb_share__" data-appkey="801341757" data-icon="0" data-
			counter="1" data-counter_pos="right" data-content="<?php echo '【'.$content->title.'】'.$content->description.'(分享自 @车云网)';?>" data-pic="<?php echo url($content->fields['pweibo_image']->text, array('absolute' => 1));?>"><span style="float:right;width:100px;text-align:left;font-size:12px;padding-top: 10px;">转播给听众</a></div>
			</div>

			<div id="J_ViewPost" class="hide m-t-20 clearfix" style="display: block;">
					<a href="<?php echo url('content/news/'.$content->nid);?>" target="_blank" class="a_demo_one f-12"><span>查看原文</span></a>
					<a href="<?php echo url('content/news/'.$content->nid);?>#comment_form" target="_blank" class="a_demo_one m-t-20"><span><?php echo $content->comment_count;?>个评论</span></a>
			</div>
	</aside>
</div>
</body>
<?php exit();?>