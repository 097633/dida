<?php
// $Id: index.php 56 2010-09-20 05:32:35Z yd2004 $

/**
 * 工作目录
 * 建议包含文件，使用绝对路径。
 */
 define('DIDA_ROOT', getcwd());

 $arr = explode('/', $_REQUEST['url']);
 $media = DIDA_ROOT.'/sites/files/'.$arr[0];
 if(!is_dir($media)){
	mkdir($media);
	chmod($media, 0777);
 }
$picdir = $media.'/'.$arr[1];
 if(!is_dir($picdir)){
	mkdir($picdir);
	chmod($picdir, 0777);
 }
 $file = $picdir. '/'. $arr[2];
 if(!is_file($file)){
	$url = 'http://chuaizhe.com/'.$_REQUEST['url'];
	$header .= "Content-type: application/x-www-form-urlencoded\r\n"; // 普通的POST GET请求，如果type=file，用multipart/form-data
    $header .= "Referer: " . $referer . "\r\n"; // Referer信息,如果提交到的地址和当前不在一个域内,并且远程主机起用了防盗链,此值就很重要,必须为远程主机的域名
    $header .= "Cookie: " . $cookie . "\r\n";
    $header .= "User-Agent: " . $_SERVER['HTTP_USER_AGENT'] . "\r\n\r\n";
 
    $context['http'] = array ( 
        'method' => "GET" ,  
        'header' => $header,
    );   
	$content = file_get_contents($url, false, stream_context_create( $context ));
	if(!empty($content)){
		file_put_contents($file,$content);
	}
	echo $content;
 }else{
	echo file_get_contents($file);
 }
