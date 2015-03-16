<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title><?php echo $head_title;?></title>
<link href="<?php echo path_to_theme();?>/styles/style.css"     		rel="stylesheet" type="text/css">
<link href="<?php echo path_to_theme();?>/styles/colors/default.css"   rel="stylesheet" type="text/css" id="pagestyle">
<link href="<?php echo path_to_theme();?>/styles/framework.css" 		rel="stylesheet" type="text/css">
<link href="<?php echo path_to_theme();?>/styles/owl.carousel.css" 	 rel="stylesheet" type="text/css">
<link href="<?php echo path_to_theme();?>/styles/owl.theme.css" 		rel="stylesheet" type="text/css">
<link href="<?php echo path_to_theme();?>/styles/swipebox.css"		 rel="stylesheet" type="text/css">
<link href="<?php echo path_to_theme();?>/styles/colorbox.css"		 rel="stylesheet" type="text/css">

<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/jqueryui.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/jquery.swipebox.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/colorbox.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/snap.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/contact.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/custom.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/framework.js"></script>
<script type="text/javascript" src="<?php echo path_to_theme();?>/scripts/framework.launcher.js"></script>

<script type="text/javascript">
function swapStyleSheet(sheet){
	document.getElementById('pagestyle').setAttribute('href', sheet);
}
</script>

</head>
<body>

<div class="all-elements">
    <div id="sidebar" class="page-sidebar">
        <div class="page-sidebar-scroll">
			<div class="sidebar-content-background">
            	<div class="sidebar-section">
                	<a href="#" class="sidebar-close"></a>
                	<em>Navigation</em>
                </div>
                <div class="sidebar-decoration"></div>         
            	<a href="#" class="sidebar-logo"></a>              
                <div class="sidebar-decoration"></div>                   
                
                <div class="sidebar-navigation">       
                    <?php echo $menu;?> 
                </div>
                
           
                
                <div class="sidebar-decoration"></div>
                
            	<p class="sidebar-copyright">Copyright 2013. All rights reserved</p>
                
            </div>
        </div>
    </div>

    <div id="content" class="page-content">   
    
        <div class="content-controls">
        	<a href="#" class="deploy-sidebar"></a>
            <em><a href="/">首页</a></em>
        </div>
         
        <div class="content">
			<div class="decoration"></div>
            <div class="content-header">
            	<a href="#" class="content-logo"></a>
                <a href="#" class="content-twitter"></a>
                <a href="#" class="content-facebook"></a>       
            </div>

            
            
    		<div class="container">
            <?php echo $content;?> 
         </div>   
        	<div class="container">
                <div class="footer-socials">
                    <a href="#" class="facebook-footer"></a>
                    <a href="#" class="goup-footer"></a>
                    <a href="#" class="twitter-footer"></a>
                </div>
                <p class="copyright uppercase center-text no-bottom">Copyright 2013<br> All rights reserved</p>        
			</div>
		</div> 
        
        </div>           
    </div>  
</div>

</body>
</html>
























