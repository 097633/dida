<?php
// $Id: content.tpl.php 6 2013-02-25 20:49:15Z east $

/**
 * @file 内容浏览页面默认模板文件
 * @param object $content 内容对象
 *
 * 模板文件加载优化级：
 *  content_ext_{$content->type}_{$content->nid}.tpl.php
 *  content_ext_{$content->type}.tpl.php
 *  content.tpl.php
 */
?>

<div class="content_view" id="content_view_<?php echo $content->nid?>">

  <h1 class="content_title"><?php echo $content->title?></h1>

  <div class="content_view_content">
    <div class="content_view_content_body clearfix" id="content_view_content_body"><div class="litpic"><img src="/<?php echo get_litpic($content, '240x240');?>" /></div><?php echo $content->body?></div>
  </div>

  <div class="content_view_links">
    <?php if ($content->comment_count) : ?>
    <?php echo '<a href="#content_view_comment_wrapper">' . t('content', '共 !count 条评论', array('!count' => $content->comment_count)) . '</a>'; ?>
    <?php endif?>
    
    <?php if ($content->is_update) : ?>
    <?php echo l(t('content', '编辑'), 'content/' . $content->type . '/' . $content->nid . '/edit', dd_get_redirect()); ?>
    <?php endif?>

    <?php if ($content->is_delete) : ?>
    <?php echo l(t('content', '删除'), 'content/' . $content->type . '/' . $content->nid . '/delete'); ?>
    <?php endif?>
  </div>

</div>