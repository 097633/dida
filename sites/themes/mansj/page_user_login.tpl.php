<?php include "head.tpl.php";?>
<?php echo $breadcrumb;?>
<div class="body_main nobackground">
    <div class="register">
        <h1>欢迎登录<span class="green_color">慢时间</span></h1>
    	<div class="form">
    	<?php echo $content;?>	
			<div class="other-list">
                <span>使用合作网站帐号登录:</span>
                <a onclick="window.location='<?php echo url('oauth/sina');?>';return false;" href="javascript:void(0)" class="sina"></a>
                <a onclick="window.location='<?php echo url('oauth/qq');?>';return false;" href="javascript:void(0)" class="qq"></a>
            </div>
    	</div>
    	<div class="register_login">
    		<p>还没有<span class="green_color">慢时间</span>的帐号？</p>
    		<p><a href="<?php echo url('user/register');?>"><input name="button" type="button" value="立即注册"/></a></p>
    	</div>
    </div>
</div>
<?php include "foot.tpl.php";?>
</body>
</html>
