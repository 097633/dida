<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>车云网 - 链接汽车未来</title>
<meta name="robots" content="noarchive">
<meta name="keywords" content="车云,汽车,auto" />
<meta name="description" content="车云（http://www.cheyun.com）是中国第一个汽车科技媒体。车是指汽车，云则象征着科技。我们专注于汽车及相关TMT领域（科技，媒体，通信）的报道，注重探索在移动互联网时代的汽车产业未来。" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript"> 
 var SysSecond; 
 var InterValObj; 
  
 $(document).ready(function() { 
  SysSecond = parseInt(<?php echo 1365985200 - time();?>); //这里获取倒计时的起始时间 
  InterValObj = window.setInterval(SetRemainTime, 1000); //间隔函数，1秒执行 
 }); 
 
 //将时间减去1秒，计算天、时、分、秒 
 function SetRemainTime() { 
  if (SysSecond > 0) { 
   SysSecond = SysSecond - 1; 
   var second = Math.floor(SysSecond % 60);             // 计算秒     
   var minite = Math.floor((SysSecond / 60) % 60);      //计算分 
   var hour = Math.floor((SysSecond / 3600) % 24);      //计算小时 
   var day = Math.floor((SysSecond / 3600) / 24);        //计算天 
 
   $("#remainTime").html(day + "天" + hour + "小时" + minite + "分" + second + "秒"); 
  } else {//剩余时间小于或等于0的时候，就停止间隔函数 
   window.clearInterval(InterValObj); 
   //这里可以添加倒计时时间为0后需要执行的事件 
  } 
 } 
</script> 
 <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
 </head>
 <body style="font-family:Microsoft YaHei,Microsoft JhengHei,Helvetica,Arial,sans-serif;height: 100%;padding-top:60px;text-align:center;background:#EBEBEB;">
<div style="width:523px;height:352px;margin:0 auto;background:#EBEBEB url('/sites/themes/che1/images/start.jpg') center center no-repeat;position:relative;">
	<div id="remainTime" style="font-size:20px;font-weight:800;color:#FF9900;position:absolute;bottom:70px;text-align:center;width:100%;"></div> 
	<div style="width:125px;height:27px;position:absolute;bottom:15px;left:255px;"><iframe src="http://follow.v.t.qq.com/index.php?c=follow&a=quick&name=cheyunwang&style=5&t=1365929390599&f=0" frameborder="0" scrolling="auto" width="125" height="24" marginwidth="0" marginheight="0" allowtransparency="true"></iframe></div>
	<div style="width:125px;height:27px;position:absolute;bottom:15px;left:330px;"><wb:follow-button uid="3238494402" type="red_1" width="67" height="24" ></wb:follow-button></div>
</div>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F216b3f18a81a13bab2862cf9dccd587e' type='text/javascript'%3E%3C/script%3E"));
</script>
 </body>
</html>
