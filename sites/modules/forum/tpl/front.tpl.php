<?php
// $Id$

/**
 * @template 论坛首页模板
 * 默认布局，使用 $forum->contents
 * 自定义布局，使用 $forum->terms，所有版块数据均在其中，所有分区信息在 $forum->parents 之中
 */

?>

<?php //print_r($forum->parents); // 所有分区数据?>

<?php //print_r($forum->terms); // 所有版块数据?>

<?php echo $forum->contents // 默认布局 ?>