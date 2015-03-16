<?php include "head.tpl.php";?>
<?php echo $breadcrumb;?>
<div class="body_main nobackground">
<div class="register">
    <h1>欢迎加入<span class="green_color">慢时间</span><span style=" float:right; font-size:14px; padding-right:25px;">已经拥有慢时间帐号？<a href="<?php echo url('user/login');?>" class="green">直接登录</a></span></h1>
	<div class="form">
		<?php echo $content;?>
						<div class="other-list">
            <span>使用合作网站帐号登录:</span>
            <a onclick="window.location='<?php echo url('oauth/sina');?>';return false;" href="javascript:void(0)" class="sina"></a>
            <a onclick="window.location='<?php echo url('oauth/qq');?>';return false;" href="javascript:void(0)" class="qq"></a>
        </div>
	</div>
</div>
</div>
<?php include "foot.tpl.php";?>
</body>
</html>
