<?php include "header.tpl.php";?>
		<div id="main"> 
		 <?php if ($sidebars_class) : ?><div id="content"><?php endif; ?>
				<div id="center">
					<div class="column">
            <?php echo $breadcrumb; ?>
            <?php echo $tabs; ?>
            <?php echo $sub_tabs; ?>
            <?php echo $messages; ?>
            <?php echo $help; ?>
            <?php echo $content; ?>
					</div>
					<div class="column">
					  <?php if ($contop) : ?>
							<?php echo $contop; ?>
						<?php endif;?>
					</div>
				</div>
				<?php if ($right) : ?>
					<div id="sidebar-right" class="sidebar">
						<div class="column">
							<?php echo $right; ?>
						</div>
					</div>
				<?php endif; ?>
			<?php if ($sidebars_class) : ?></div><?php endif; ?>
			
			<?php if ($left) : ?>
				<div id="sidebar-left" class="sidebar">
					<div class="column">
						<?php echo $left; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div></div>
<?php include "footer.tpl.php";?>
<div class="go">
	<a title="返回顶部" class="top" href="javascript:"></a>
	<a title="欢迎您给我留言！" class="feedback" href="<?php echo url('guestbook');?>"></a>
	<a title="返回底部" class="bottom" href="javacript:"></a>
</div>
<script>
$('.top').click(function(){
	$("body").animate({scrollTop: $('#header').offset().top}, 500);
	return false;
});
$('.bottom').click(function(){
	$("body").animate({scrollTop: $('#footer').offset().top}, 500);
	return false;
});
</script>
</body>
</html>