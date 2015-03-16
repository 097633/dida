<?php
// $Id: article.feed.inc 1 2010-04-13 13:59:57Z east $

/**
 * 全站或用户或分类最新文章 rss
 */
function article_get_feed_node($uid = NULL, $tid = NULL){
  global $conf,$base_url;
  $title = '';

  if($uid){
    $fetch = db_query('SELECT n.nid FROM {article} n INNER JOIN {users} u ON n.uid = u.uid WHERE n.uid = ? ORDER BY n.nid DESC', array($uid), array('limit' => 100));
    $link = $base_url;
    $title = t('article', '最新文章');
  }elseif($tid){
		$where = 'n.status = 1';
		$tids = get_allterm_bytid($tid);
		$where .= " and ftn.tid in (".implode(',',$tids).")";
    $fetch = db_query('SELECT n.nid FROM {article} n INNER JOIN {users} u ON n.uid = u.uid INNER JOIN {fields_term_node} ftn ON n.nid = ftn.nid WHERE ' .$where. ' ORDER BY n.nid DESC', array(), array('limit' => 100));
  }else{
    $fetch = db_query('SELECT n.nid FROM {article} n INNER JOIN {users} u ON n.uid = u.uid ORDER BY n.nid DESC', array(''), array('limit' => 100));
  }
  
  if($fetch){
    foreach($fetch as $val){
			$article = article_load($val->nid);
      if(!$title){
        if($tid){
          $term = get_term_bytid($tid);
          $title = $term->name;
        }else{
          $link = $base_url;
          $title = t('article', '!string 的最新文章', array('!string' => $article->name));
        }
      }
      
      if($conf['article_rss_node'] == 1){
        $body = $term->description;
      }else{
        $body = $article->body;
      }
      
      $items .= dd_rss_item(
        array(
          'title' => check_plain($article->title),
          'description' => $body,
          'link' => url($base_url.$article->url, array('absolute' => true)),
        ), 'item',
        array(
            array('key' => 'pubDate', 'value' => gmdate('r', $article->created)),
            array('key' => 'dc:creator', 'value' => $article->name),
            array('key' => 'guid', 'value' => $article->nid . ' at ' . $base_url, 'attributes' => array('isPermaLink' => 'false'))
         )
      );
    }
  }else{
    $items = t('article', '没有数据');
  }
  
  return article_get_feed($items, $title, $link);
}

function article_get_feed($items, $title, $link = NULL, $des = NULL){
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
  ));
}