<?php
// $Id: pass.inc 112 2011-08-26 14:21:32Z yd2004 $

// dida 工作目录
define('DIDA_ROOT', dirname(dirname(__FILE__)));
require_once DIDA_ROOT . '/scripts/common.inc';
bootstrap('full');
echo $GLOBALS['conf_dir'];
