<h1 class="newst">注册</h1>
<div id="user_register_form_mail" class="form_item form_item_textfield">
<label class="dd_label" for="mail">邮箱：<span class="form_required" title="此项不能为空。">*</span></label>
<input type="text" name="mail" value="" class="{email:true} form_text form_value_textfield form_textfield_name_mail inputhover" id="user_register_form_type_mail">
</div>
<div id="user_register_form_name" class="form_item form_item_textfield">
<label class="dd_label" for="name">昵称：<span class="form_required" title="此项不能为空。">*</span></label>
<input type="text" name="name" value="" class="form_text form_value_textfield  form_textfield_name_name" id="user_register_form_type_name">
</div>
<div id="user_register_form_pass" class="form_item form_item_password">
<label class="dd_label" for="pass">密码：<span class="form_required" title="此项不能为空。">*</span></label>
<input type="password" name="pass" value="" id="password" class="form_text form_value_password">
</div>
<div id="user_register_form_pass2" class="form_item form_item_password">
<label class="dd_label" for="pass2">确认：<span class="form_required" title="此项不能为空。">*</span></label>
<input type="password" name="pass2" value="" class="{equalTo:'#password'} form_text form_value_password" id="user_register_form_type_pass2">
</div>
<div id="user_login_form_submit" class="form_item form_item_submit" style="text-align:center;"><input type="image" name="submit" src="<?php echo path_to_theme();?>/images/regbtnl.jpg"  id="user_login_form_type_submit" class="form_value_submit">
</div>