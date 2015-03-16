<?php include "header.tpl.php";?>    
    <div id="main"> 
			<?php echo $breadcrumb; ?>
      <?php if ($left) : ?>
				<div id="sidebar-left" class="sidebar span-5">
          <?php echo $left; ?>
        </div>
			<?php endif; ?>

      <?php
        if ($left && $right) {
          $content_class = 'span-14';
        } else if ($left) {
          $content_class = 'span-19 last';
        } else if ($right) {
          $content_class = 'span-19';
        } else {
          $content_class = '';
        }
      ?>
      <div id="content" class="<?php echo $content_class;?>">      
        <?php echo $tabs; ?>
        <?php echo $sub_tabs; ?>
        <?php echo $messages; ?>
        <?php echo $help; ?>
        <?php echo $content; ?>
      </div>
      
      <?php if ($right) : ?>
        <div id="sidebar-right" class="sidebar span-5 last">
          <?php echo $right; ?>
        </div>
      <?php endif; ?>
			
		</div>
<?php include "footer.tpl.php";?>
	</div></div>
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