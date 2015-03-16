<?php
// $Id: index.php 56 2010-09-20 05:32:35Z yd2004 $

$content = file_get_contents($_REQUEST['url']);
print_r($content);exit();
preg_match_all('/class="play_time".*?id="(.*?)"/i', $content, $match);
$str = '';
foreach($match[1] as $key=>$val){
	$str .= '%7C'.$val;
}
$url = 'http://sns.video.qq.com/tvideo/fcgi-bin/batchgetplaymount?id='.$str.'&otype=json&callback=jsonp'.time().'&_='.time();
$fetch = file_get_contents($url);
print_r($fetch);exit();