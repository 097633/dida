<?php 
global $user;
if(user_access('system view admin')){
	
}else{
	dd_goto('/');
};?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0033)http://ec-project.ecp.ishopex.cn/ -->
<html xmlns="http://www.w3.org/1999/xhtml" slick-uniqueid="1"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title><?php echo dd_get_title(); ?></title>
            <meta name="generator" content="ecos.prjmgr">
<link rel="stylesheet" type="text/css" href="<?php echo path_to_theme('admin');?>/system/images/css.css">
<style>
.user_login_form {
position: absolute;
top: 150px;
left: 295px;
color: #6c6c6c;
}
.form_value_submit{
width: 100px;
height: 30px;
margin-left: 50px;
}
.form_item {
margin-bottom:5px;
}
.form_error{
color:red;
top:-20px;
left:60px;
position:absolute;
}
</style>
</head><body>


<div id="AllWrap">
	
   	
    
    <div id="InnerSide">
    	    </div>
    
    <div id="InnerMain">
    	<link href="<?php echo path_to_theme('admin');?>/system/images/login.css" rel="stylesheet" type="text/css">
<div class="main_login">
<span class="m_text">
<h3>Ecp</h3>
网站管理系统</span> 
	<?php echo $content;?>
</div>

        
    </div>
    
    <div class="clear"></div>
	
</div>

<div class="themefootText textcenter"><br></div><div style="color:#333;font-family:Verdana;font-size:11px;line-height:20px!important;overflow:visible!important;display:block!important;visibility:visible!important;position:relative;z-Index:65535!important;text-align:center;">
Powered By <b style="color: rgb(92, 113, 158);">Dida</b> 
</div>


<div></div></body></html>