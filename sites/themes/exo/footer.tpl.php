</div>
<div id="copy">
<?php $dibu = block_title_load('底部链接');echo $dibu->body;?>
<?php echo $site_global->footer; ?><?php echo $closure; ?>
<?php echo $debug;?>
</div>
<div class="go">
	<a title="返回顶部" class="gotop" href="javascript:"></a>
	<a title="欢迎您给我留言！" class="feedback" href="<?php echo url('guestbook');?>"></a>
	<a title="前往底部" class="gobottom" href="javacript:"></a>
</div>
<script>
$('.gotop').click(function(){
	$('html, body').animate({scrollTop: $('#mbody').offset().top}, 500);
	return false;
});
$('.gobottom').click(function(){
	$('html, body').animate({scrollTop: $('#copy').offset().top}, 500);
	return false;
});
</script>