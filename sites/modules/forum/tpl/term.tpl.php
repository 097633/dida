<?php
// $Id$
?>

<div class="forum_term_view_header">

  <?php if($term->data['body']) : ?>
  <div class="forum_term_view_description">
    <?php echo $term->data['body']?>
  </div>
  <?php endif?>
  
  <div class="forum_term_view_links">
    <?php if ($term->is_created) { ?>
    <a href="<?php echo $term->add_url ?>" class="forum_term_view_link_add">发布新主题</a>
    <?php } else {?>
    <a href="/user/login/ajax?width=350&height=200&iframe=true&modal=true&redirect=<?php echo $term->add_url;?>" class="forum_term_view_link_add dialog">发布新主题</a>
    <?php }?>
    
    <?php if($term->admins) : ?>
    <span class="forum_term_view_link_admin"><strong>版主：</strong><?php echo $term->admins; ?></span>
    <?php endif?>
  </div>
  
</div>

<?php echo $term->nodes ?>
<?php echo $term->pager ?>