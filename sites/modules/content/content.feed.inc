<?php
// $Id: content.feed.inc 1 2010-04-13 13:59:57Z east $

/**
 * 全站或用户或分类最新文章 rss
 */
function content_get_feed_node($uid = NULL, $type = NULL, $tid = NULL){
  global $conf,$base_url;
  $title = '';
	
	if(strpos($type, '"') != ''){
		echo 'error';
		exit();
	}
	if($tid){
    $fetch = db_query('SELECT n.*, u.uid, u.name FROM {content_ext_'.$type.'} n INNER JOIN {users} u ON n.uid = u.uid INNER JOIN {fields_term_node} t ON n.nid = t.nid WHERE n.status > 0 AND n.check_status = 1 AND t.tid = ? ORDER BY n.nid DESC', array($tid), array('limit' => 100));
  }else{
		if($type == 'news'){
			$fetch = db_query('SELECT n.*, u.uid, u.name FROM {content_ext_'.$type.'} n INNER JOIN {users} u ON n.uid = u.uid WHERE n.status > 0 AND n.check_status = 1 ORDER BY n.nid DESC', array(''), array('limit' => 100));
		}else{
			$fetch = db_query('SELECT n.*, u.uid, u.name FROM {content_ext_'.$type.'} n INNER JOIN {users} u ON n.uid = u.uid WHERE n.status > 0 ORDER BY n.nid DESC', array(''), array('limit' => 100));
		}
	}
  if($fetch){
    foreach($fetch as $content){
      if(!$title){
        if($tid){
          $term = db_query('SELECT * FROM {fields_term} WHERE tid = ?', array($tid), array('return' => 'one'));
          $title = $term->name;
        }else{
          $link = $base_url;
					if($type == 'news'){
						$title = '整站最新文章';
					}elseif($type == 'dutu'){
						$title = '读图最新文章';
					}
        }
      }
      
      $body = $content->description;
      
      $items .= dd_rss_item(
        array(
          'title' => check_plain($content->title),
          'description' => $body,
          'link' => url($base_url.'/content/'.$type.'/'.$content->nid.'.html'),
        ), 'item',
        array(
            array('key' => 'pubDate', 'value' => gmdate('r', $content->created)),
            array('key' => 'dc:creator', 'value' => $content->name),
            array('key' => 'guid', 'value' => $content->nid . ' at ' . $base_url, 'attributes' => array('isPermaLink' => 'false'))
         )
      );
    }
  }else{
    $items = t('content', '没有数据');
  }
  
  return content_get_feed($items, $title, $link);
}

function content_get_feed($items, $title, $link = NULL, $des = NULL){
  global $conf, $base_url;
  
  if(strpos($conf['site_global']['logo'], 'http') === false){
    $logo = $base_url . $conf['site_global']['logo'];
  }else{
    $logo = $conf['site_global']['logo'];
  }
  
  return dd_rss_feed($items, NULL, array(
    'title' => $title .'_'. $conf['site_global']['name'],
    'description' => ($des ? $des :$conf['site_global']['description']),
    'link' => ($link ? $link : $base_url),
    'image' => array(
      'url' => $logo,
      'title' => $conf['site_global']['name'],
      'link' => $base_url,
    ),
  ));
}