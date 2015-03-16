<?php include "header.tpl.php";?>    
    <div id="main"> 
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
      <div id="content">   
				<div class="login_box">
					<?php echo $messages; ?>
					<?php echo $content; ?>
				</div>
      </div>
			
		</div>
	</div>
</div>
<?php include "footer.tpl.php";?>
</body>
</html>