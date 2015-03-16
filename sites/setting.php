<?php 
 //$Id: bootstrap.inc 46 2012-03-25 15:29:09Z east $

$database['default'] = array (
  'driver' => 'mysql',
  'dbname' => 'exocom',
  'dbuser' => 'exocom_f',
  'dbpass' => '097633',
  'host' => 'localhost',
  'port' => '3306',
  'prefix' => '',
);


$installed = true; // 不允许运行 install.php 
define('DD_ADMIN_PATH', 'admin'); // 管理路径 
ini_set('arg_separator.output', "&amp;");
ini_set('magic_quotes_runtime', 0);
ini_set('magic_quotes_sybase', 0);
ini_set('session.cache_expire', 2592000);
ini_set('session.cache_limiter', "none");
ini_set('session.cookie_lifetime', 31536000);
ini_set('session.gc_maxlifetime', 2592000);
ini_set('session.use_only_cookies', 1);
ini_set('session.use_trans_sid', 0);
ini_set('url_rewriter.tags', '');

?>
