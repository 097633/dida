<h1 class="newst">登录</h1>
<div id="user_login_form_mail" class="form_item form_item_textfield">
<label class="dd_label" for="mail">邮箱：<span class="form_required" title="此项不能为空。">*</span></label>
<input type="text" name="mail" value="" id="user_login" size="20" class="form_text form_value_textfield form_textfield_name_mail"><span class="description form_description"><a href="/user/register" target="_parent" title="未注册？">未注册？</a></span>
</div>
<div id="user_login_form_pass" class="form_item form_item_password">
<label class="dd_label" for="pass">密码：<span class="form_required" title="此项不能为空。">*</span></label>
<input type="password" name="pass" value="" size="20" class="form_text form_value_password" id="user_login_form_type_pass"><span class="description form_description"><a href="/user/pass" target="_parent" title="忘记密码？">忘记密码？</a></span>
</div>
<div style="text-align:center;">
<span class="form_checkbox_option" alt="user_login_form_type_his"><input value="1" name="his[1]" type="checkbox" id="user_login_form_type_his_1" class="form_value_checkbox user_login_form_type_his"><span class="option_label">记住我</span></span><span style="padding-left:20px;"><input value="1" name="his[1]" type="checkbox" id="user_login_form_type_his_1" class="form_value_checkbox user_login_form_type_his"><span class="option_label">自动登录</span></span>
</div>
<div id="user_login_form_submit" class="form_item form_item_submit" style="text-align:center;"><input type="image" name="submit" src="<?php echo path_to_theme();?>/images/loginbtn.jpg"  id="user_login_form_type_submit" class="form_value_submit"><a style="margin-left:20px;" href="<?php echo url('user/register');?>" target="_parent"><img src="<?php echo path_to_theme();?>/images/regbtn.jpg" /></a>
</div>
<div class="wb_login">
	<span><label>快捷登录:</label></span><span><a style="margin-left:20px;" href="<?php echo url('oauth/qq');?>&redirect=<?php echo $_REQUEST['redirect'];?>"" target="_parent"><img src="<?php echo path_to_theme();?>/images/qwlogin.jpg" /></a></span><span><a style="margin-left:10px;" href="<?php echo url('oauth/sina');?>&redirect=<?php echo $_REQUEST['redirect'];?>"" target="_parent"><img src="<?php echo path_to_theme();?>/images/swlogin.jpg" /></a></span>
</div>