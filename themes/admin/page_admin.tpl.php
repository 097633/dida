<?php 
global $user;
if(user_access('system view admin')){
	if($user->isadmin == ''){
		$user->isadmin = 1;
		echo theme('error', dd_get_form('user_login_form'));
		exit();
	}
}else{
	dd_goto('/');
};?>
<?php $menus = _module_invoke_all('system_admin_menus');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $head_title; ?></title>
  <?php echo $heads; ?>
  <?php echo $styles; ?>
  <?php echo $scripts; ?>
  <script>
$(document).ready(function(){ 
                <?php if(arg(2) == 'add' || arg(3) == 'edit'){;?>
                        $("#article_node_form_type_submit").click(function(){
                                if($(".field_option_children_append").val() == ''){
                                        //alert('子栏目不能为空');
                                        //return false;
                                }
                        });
                <?php };?>
                $(function(){ 
                        $("#bigtab_container>ul>li").click(function(i){ 
                                $(this).addClass("bigtab_1_all").removeClass("bigtab_0_all"); 
                                $(this).siblings().addClass("bigtab_0_all").removeClass("bigtab_1_all"); 
                                $("#menu ul").eq($("li").index(this)).show().siblings("ul").hide(); 
                                return false; 
                        }) 
                }) 
                $("#menu a").each(function(){
      <?php 
                                global $conf;
                                if($conf['clean_url'] == 0){
                                        $u = '/?q=';
                                }else{
                                        $u = '/';
                                }
                                $tmp = $_GET['q'];
                                $temp = explode('/',$tmp);
                                foreach($temp as $key=>$val){
                                        if(is_numeric($val)){
                                                $num = $val;    
                                        }
                                }
                                $n=strpos($tmp,$num);//寻找位置
                                if ($n){ 
                                        $mm = $u.substr($tmp,0,$n-1);//删除后面
                                }else{
                                        $mm = $u.$tmp;
                                }
                        ?>
                        var url = '<?php echo $mm;?>';

                                                $(this).parent("li").removeClass("left_2");
                                                if($(this).attr("href") == url){
                                                                $(this).parent("li").addClass("left_2");
                                                                $(this).parent().parent('ul').show();
                                                                $(this).parent().parent('ul').siblings().hide();

                                                                $("#tab_"+$(this).parent().parent().attr("id")).addClass('bigtab_1_all').removeClass('bigtab_0_all');
                                                                $("#tab_"+$(this).parent().parent().attr("id")).siblings().addClass('bigtab_0_all').removeClass('bigtab_1_all');
                                                }
                        })
                        var show = $(".left_2");
                        if(show.html()){

                        }else{
                        $("#menu ul").hide();
                        }
})
  </script>
<?php 
if($conf['clean_url'] == '1'){
	$cssf = '/'.dd_get_path('theme', 'admin');;
}else{
	$cssf = dd_get_path('theme', 'admin');;
}
;?>
<style>
        #bigtab_container{height:39px;clear:both; overflow:hidden;}
        .top_1{height:64px;background:url('<?php echo $cssf?>/images/bg_1.gif') 0px -264px;}
        .top_2{height:33px;background:url('<?php echo $cssf?>/images/bg_1.gif') 0px -328px; color:#128CB2;}
        .top_1 .right{text-align:right; color:#f5f5f5; }
        .top_1 .right a:link, .top_1 .right a:hover, .top_1 .right a:visited, .top_1 .right a:active{color:#FFF;} 
        .left_1{width:168px;background:#E2F4FC; }
        .left_1 ul a{display:block;width:168px;height:24px;line-height:24px;color:#128CB2;background:url('<?php echo $cssf?>/images/ico_p1.gif') no-repeat; text-indent:30px;outline:none;}
        .left_1 ul a:hover{text-decoration:none;}
        .left_2{background-color:#FFFFFF;}
				td {padding: 0px;text-align:left;}
				.column{margin:0px;float:none;}
</style>
</head>
<body>
<?php
  if (!user_access('system view admin')) return false;
  
  global $user;
  $language = $user->language ? $user->language : $GLOBALS['conf']['default_language'];
  
  if ($data = cache_get('admin_menus_' . $user->uid .'_'. $language)) {
    $mymenu = $data->data;
  } else {
    
    if ($value = _module_invoke_all('system_admin_menus')) {
      $table = cache_get('_admin_menu_list_'.$user->uid);
      foreach ($value as $module => $infos) {
        $menus = $infos[0];
        module_alter_all('alter_admin_menus', $module, $menus);
                                if($menus){
                                        foreach ($menus as $menu) {
                                                if (_l_external($menu[1]) || menu_get_item($menu[1]) == 5) {
                                                        $mymenu[$module][0][] = $menu;
                                                }
                                        }
                                }
        if ($mymenu[$module]) {
          $mymenu[$module][1] = $infos[1];
        }
      }
    }
    cache_set('admin_menus_' . $user->uid.'_' . $language, ($mymenu ? $mymenu : true));
  }

  if (is_array($mymenu)) {
    if (var_get('admin_custom_links', 1)) {
      $custom_path = $custom_title = true;
      
      if ($mymenu['didaSystemCustom'][0]) {
        foreach ($mymenu['didaSystemCustom'][0] as $c) {
          if (is_array($c) && $c[1] == $_GET['q']) {
            $custom_path = $custom_title = false;
          }
        }
      }
      
      if ($custom_path) {
        $custom_path = $_GET['q'];
      }
      if ($custom_title) {
        if ($custom_title = dd_get_title()) {
          if (strpos($custom_title, '-') !== false) {
            $custom_title = trim(current(explode('-', $custom_title)));
          }
        }
      }
    }
  }

?>
<table width="100%" height="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
<tr>
        <td class="top_1" style="witdh:168px;"><a href="<?php echo url('admin');?>"><img src="<?php echo $cssf?>/images/img_adminlogo.gif" border="0" /></a></td>
        <td class="top_1">
                <div class="div_clear" style="height:25px;"></div>
                <table cellspacing="0" cellpadding="0" style="border-collapse:collapse;" width="100%"><tr><td>
                
<div id="bigtab_container">
        <ul>
        <?php $i=1;foreach($mymenu as $key=>$val){?>
                <?php if($i==1){;?>
                        <li id="tab_bbsmenu_<?php echo $i;?>" class="bigtab_1_all"><span><?php echo $val[1];?></span></li>
                <?php }else{;?>
                        <li id="tab_bbsmenu_<?php echo $i;?>" class="bigtab_0_all"><span><?php echo $val[1];?></span></li>
                <?php };?>
        <?php $i++;};?>
        </ul>
</div>

                </td><td class="right"><a href="<?php echo $GLOBALS['base_url'];?>" target="_blank">网站首页</a> | <a href="<?php echo url('user/logout');?>" target="_top">退出管理</a>&nbsp; &nbsp;</td></tr></table>
        </td>
</tr>
<tr>
        <td class="top_2"></td>
        <td class="top_2"><img src="<?php echo $cssf?>/images/ico_home.gif" border="0" style="margin-right:5px;float:left;margin-top:8px;" /> <?php echo $breadcrumb; ?></td>
</tr>
<tr>
        <td class="left_1" valign="top" id="menu">
                <div class="div_clear" style="height:15px;"></div>
        <?php $i=1;foreach($mymenu as $key=>$val){?>
                <ul id="bbsmenu_<?php echo $i;?>">
            <?php $j=1;foreach($val[0] as $value){;?>
                        <li<?php if($j==1){echo ' id="bbsmenu_'.$i.'_default"';};?>><?php echo l($value[0],$value[1]) ;?></li>
            <?php $j++;};?>
                </ul>
        <?php $i++;};?>
        </td>
        <td valign="top" height="100%">
                                <div id="center">
                                        <div class="column">
            <?php echo $tabs; ?>
            <?php echo $sub_tabs; ?>
            <?php echo $messages; ?>
            <?php echo $help; ?>
            <?php echo $content; ?>
                                        </div>
                                </div>
        </td>
</tr>
</table>
<?php echo $closure; ?>
<?php echo $debug;?>
</body>
</html>