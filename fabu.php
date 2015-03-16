<?php
// $Id: index.php 56 2010-09-20 05:32:35Z yd2004 $

/**
 * 工作目录
 * 建议包含文件，使用绝对路径。
 */
define('DIDA_ROOT', getcwd());

require_once DIDA_ROOT . '/includes/bootstrap.inc';
bootstrap('full');// 程序初始化
/* * 
 *  ?tid=tid&title=title&body=body&tags=aaa,bbb,ccc  
*/
if(!$_REQUEST['tid']){
	$tid = $_REQUEST['pid'];
}else{
	$tid = $_REQUEST['tid'];
}
$type = $_REQUEST['type'];

$tags = str_replace('|||',',',$_REQUEST['tags']);
if($_REQUEST['title'] != '' && $type != ''){
	$module = 'content';
	$article = new stdClass;
	$article->title = $_REQUEST['title'];
	$article->body = file_down_image($_REQUEST['body']);
	if(!$_REQUEST['description']){
		$article->description = mb_substr($_REQUEST['body'], 0, 120, 'UTF-8');
	}else{
		$article->description = $_REQUEST['description'];
	}
	$article->format = 2;
	$article->type = $type;
	$article->uid = 1;
	$article->flag = '';
	$article->created = $_REQUEST['created'];
	$article->visit = rand(100,500);

	$article->fields = array('lanmu'=>$tid,'tags'=>$tags,'litpic'=>$_REQUEST['litpic']);
	$function = $module.'_save';
	$count = db_query('SELECT COUNT(*) FROM {content_ext_'.$type.'} WHERE title = ?', array($article->title), array('return' => 'column'));
	if(!$count){
		$article = call_user_func($function,$article);
	}else{
		echo '重复';
	}

	if($article->nid){
		preg_match('/(<img.*?src=)(["|\'])(.*?)["|\']/i', $article->body, $mat);
		if($mat[3] != '' && strpos('%'.$mat[3], 'http://') == false){
			$filepath = $mat[3];
			$filepath = substr($filepath, 1);
			db_query("UPDATE {content_ext_".$type."} SET fid = (SELECT fid FROM {files} WHERE md5(filepath) = ? limit 0,1) WHERE nid = ?", array(md5($filepath), $article->nid));
		}
		
		echo '<script>window.close();</script>';}
}else{
	echo '没有选择栏目';
}

