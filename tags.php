<?php
// $Id: index.php 56 2010-09-20 05:32:35Z yd2004 $

/**
 * 工作目录
 * 建议包含文件，使用绝对路径。
 */
define('DIDA_ROOT', getcwd());

require_once DIDA_ROOT . '/includes/bootstrap.inc';
bootstrap('full');// 程序初始化

header('Content-Type: text/plain; charset=utf-8');
set_time_limit(0);

dd_set_mail('097633@163.com', 'aaaa', 'bbbb');
exit();
