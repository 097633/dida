<?php 
header('Content-Type: text/html; charset=utf-8');
define('DIDA_ROOT', dirname(dirname(__FILE__)));
require_once DIDA_ROOT . '/includes/bootstrap.inc';
bootstrap('full');// 程序初始化


include "getcontent.php";

if(strpos($_REQUEST['url'], 'v.ifeng') != ''){
	preg_match('/\"id\": \"(.*?)\"/i', $content['html'], $mat);
	$vurl = 'http://v.ifeng.com/include/exterior.swf?guid='.$mat[1].'&AutoPlay=false';
	$content['body'] = '<embed type="application/x-shockwave-flash" class="edui-faked-video" pluginspage="http://www.macromedia.com/go/getflashplayer" src="'.$vurl.'" width="610" height="450" align="none" wmode="transparent" play="true" loop="false" menu="false" allowscriptaccess="never" allowfullscreen="true" />';
}elseif(strpos($_REQUEST['url'], 'photoview') != ''){
	preg_match_all('/hidefocus=\"true\"><img src=\"(.*?)\"(.*?)alt=\"(.*?)\"/ims', $content['html'], $match);
	foreach($match[1] as $key=>$val){
		$pics .= $val.'='.$match[3][$key].'|||';
	}
}elseif(strpos($_REQUEST['url'], 'shion.ifeng.com') != ''){
	preg_match('/<meta http-equiv=\"mobile-agent\" content=\"format=html5;url=(.*?)\"/i', $content['html'], $match);
	$con = file_get_contents($match[1]);
	print_r($con);exit();
}elseif(strpos($_REQUEST['url'], 'youku') != ''){
	preg_match('/id_(.*?)\.html/i', $_REQUEST['url'], $mat);
	$content['body'] = '<embed src="http://player.youku.com/player.php/sid/'.$mat[1].'/v.swf" allowFullScreen="true" quality="high" width="610" height="450" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>';
}elseif(strpos($_REQUEST['url'], 'usic.baidu.com') != ''){
	preg_match('/vid: \'(.*?)\',/i', $content['html'], $mat);
	$content['body'] = '<embed src="http://dispatcher.video.qiyi.com/disp/shareplayer.swf?vid='.$mat[1].'&amp;autoPlay=1&amp;autoChainPlay=1&amp;showSearch=0&amp;showSearchBox=0&amp;autoHideControl=1&amp;showFocus=0&amp;showShare=0&amp;showLogo=0&amp;coop=coop_baidump3&amp;cid=qc_100001_300089&amp;bd=1" allowFullScreen="true" quality="high" width="610" height="450" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>';
}else{

}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link type="text/css" rel="stylesheet" href="css/jquery.rte.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
<link type="text/css" rel="stylesheet" media="all" href="/misc/ui/themes/base/jquery.ui.css" />
<script type="text/javascript" src="/misc/ui/jquery.ui.js"></script>
<script type="text/javascript" src="js/jquery.rte.js"></script>
<script type="text/javascript" src="js/jquery.rte.tb.js"></script>
<script type="text/javascript" src="js/jquery.ocupload-1.1.4.js"></script>
<script>  
$(document).ready(function() {

	var arr = $('.rte1').rte({
					css: ['default.css'],
					controls_rte: rte_toolbar,
					controls_html: html_toolbar
	});

	$.get('/chromecat.php', function(data) {
		$("#field_id").html(data);
	});
	$("#field_id").change(function(){ 
		$("#pid").load("/chromecat.php?field_id="+$("#field_id").val()); 
	});
	$("#pid").change(function(){ 
		$("#tid").load("/chromecat.php?pid="+$("#pid").val()); 
	});
	$( "#created" ).datepicker({     });
});
</script>
<head>
<body>
<div style="width:100%;margin:0 auto;">
<form method="post" name="form1" style="width:500px;" action="/fabu.php" target="_blank">
 				<label for="title">标题</label>
                <input id="title" type="text" class="text" name="title" value="<?php echo $content['title'];?>" style="width:500px">

<br />
				<label for="term">类型</label>
				<select id="type" name="type">
					<?php $fetch = db_query("SELECT * FROM {content_type}");if($fetch){foreach($fetch as $val){;?>
						<option value="<?php echo $val->type;?>"><?php echo $val->name;?></option>
					<?php }};?>
				</select>
<br />
				<label for="term">栏目</label>
				<select id="field_id" name="field_id">
				</select>
				<select id="pid" name="pid">

				</select>
				<select id="tid" name="tid">

				</select>
<br />
                <label for="tags">标签</label>
                <input id="tags" type="text" class="tags" name="tags" value="" style="width:100%">

<br />
								<label for="created">发布日期</label>
                <input id="created" type="text" class="created" name="created" value="" style="width:100%">

<br />
<?php if($pics != ''){;?>
								<label for="description">图集</label>
                <textarea id="pics" name="pics" cols="100" rows="3"><?php echo $pics;?></textarea>
<?php }else{;?>
								<label for="description">摘要</label>
                <textarea id="description" name="description" cols="100" rows="3"></textarea>
<?php };?>
<br />
                <label for="body">内容</label>
                <textarea id="body" class="rte1"  name="body" cols="100" rows="22"><?php echo $content['body'];?></textarea>

<input id="diyitu" type="hidden" class="diyitu" name="diyitu" value="1">
<input id="save" name="submit" type="submit" value="Save">

<a id="cancel" href="#" onclick="window.close();">取消</a>
  
</form>

</body>

</html>
