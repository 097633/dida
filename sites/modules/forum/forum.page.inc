<?php
// $Id$

/**
 * 论坛或分区首页
 */
function forum_view($term = NULL) {
	if($_REQUEST['title']){
		$header = array(
			array('data' => t('forum', '主题'), 'field' => 'f.fid'),
			array('data' => t('forum', '作者'), 'field' => 'f.uid'),
			array('data' => t('forum', '回复'), 'field' => 'f.comment_count'),
			array('data' => t('forum', '更新时间'), 'field' => 'f.updated', 'sort' => 'desc'),
		);
		
		if ($fetch = pager_query('SELECT f.fid, f.title, f.created, f.updated, f.uid, f.comment_count, f.status, u.name, 
		f.last_name, f.top FROM {forum} f INNER JOIN {users} u ON f.uid = u.uid WHERE f.title like ? AND f.status > 0'
		.table_sql($header, ' f.top DESC, '), 20, 0, NULL, array('%'.$_REQUEST['title'].'%'))) {
			foreach ($fetch as $o) {
				if ($o->last_name) {
					$last = explode('|', $o->last_name, 4);
					if ($last[1] > 0) {
						
						$update_go = l($last[3], 'forum/node/'.$o->fid, 
						array('query' => 'page='.$last[1], 'fragment' => 'comment_forum_'.$last[0]));
						
					} else {
						$update_go = l($last[3], 'forum/node/'.$o->fid, array('fragment' => 'comment_forum_'.$last[0]));
					}
					
					$last_name = '<span class="forum_node_list_last_name">' . $update_go.'</span>';
					
				} else {
					$last_name = '';
				}
				
				$table[] = array(
					array(
						'data' => l($o->title, 'forum/node/'.$o->fid),
						'class' => 'forum_node_list_title forum_node_list_top_'.$o->top.' forum_node_list_status_'.$o->status
					),
					array(
						'data' => theme('username', $o).'<span class="forum_node_list_created">'.format_date($o->created).'</span>',
						'class' => 'forum_node_list_time'
					),
					array('data' => $o->comment_count, 'class' => 'forum_node_list_comment'),
					array(
						'data' => t('forum', '!time前', array('!time' => format_interval($_SERVER['REQUEST_TIME'] - $o->updated, 3)))
							.$last_name,
						
						'class' => 'forum_node_list_updated'
					)
				);
			}
			
			$term->nodes = theme('table', $header, $table,
			array('id' => 'forum_node_list', 'class' => 'forum_node_list'));
			
			$term->pager = pager_view();
			
		} else {
			$term->nodes = $term->pager = '';
		}
		
		dd_set_title(array(t('forum', '论坛')));
		dd_set_breadcrumb(array(l(t('forum', '论坛'), 'forum')));
		dd_add_css(dd_get_path('module', 'forum').'/forum.css');
		return theme('forum_term', $term);
	}
  if ($term->tid) {
    $fetch = db_query('SELECT * FROM {forum_term} WHERE pid = ? ORDER BY weight ASC', array($term->tid));
    $obj->parents[$term->tid] = $term;
    
  } else {
    $fetch = db_query('SELECT * FROM {forum_term} ORDER BY pid ASC, weight ASC');
  }
  
  if ($fetch) {
    $pid = 0;
    foreach ($fetch as $o) {

      if ($o->data) {
        $o->data = unserialize($o->data);
      } else {
        $o->data = array();
      }
      
      if ($o->pid == 0) {
        $obj->parents[$o->tid] = $o;
        continue;
      }
      
      if ($pid != $o->pid) {
        $pid = $o->pid;
        
        // 分区
        
        $parent = '<div class="forum_view_term_name">'.l($obj->parents[$pid]->name, 'forum/'.$pid).'</div>';
        if ($obj->parents[$pid]->data['description']) {
          $parent .= '<div class="forum_view_term_description">'.$obj->parents[$pid]->data['description'].'</div>';
        }
        
        $tables[] = array(
          'data' => array(array('data' => $parent, 'colspan' => 3)),
          'class' => 'forum_view_parent',
          'id' => 'forum_view_term_id_'.$o->tid
        );
        
      }
      
      if ($o->new) {
        $o->new = unserialize($o->new);
      } else {
        $o->new = array();
      }
      
      if ($o->data['logo']) { 
        $logo = '<div class="forum_view_term_logo">'.img($o->data['logo'], $o->name, $o->name).'</div>';
      } else {
        $logo = '';
      }
      
      $items = array(
        array('data' => l($o->name, 'forum/'.$o->tid), 'class' => 'forum_view_term_name'),
        array('data' => $o->data['description'], 'class' => 'forum_view_term_description')
      );
      
      if ($o->type == 1) {
        if ($o->new['title']) {
          $items[] = array(
            'data' => l($o->new['title'], $o->new['url']) 
              .'<span class="forum_view_term_new_time">作者：</span>'. theme('username', $o->new['user']),
             
            'class' => 'forum_view_term_new'
          );
        }
      } else {
        
        $items[] = array(
          'data' => ($o->type == 0 ? t('forum', '私密版块') : t('forum', '外部链接')),
          'class' => 'forum_view_term_status forum_view_term_type_'.$o->type
        );
        
      }
      
      $rows = array(array('data' => $logo . theme('item_list', $items), 'class' => 'forum_view_term_info'));
      
      $items = array(
        dd_get_strong(t('forum', '总主题')) . $o->node_count,
        dd_get_strong(t('forum', '总回复')) . $o->comment_count,
      );
      
      if ($o->new['node_count']) {
        $items[] = array(
          'data' => dd_get_strong(t('forum', '今日主题')) . $o->new['node_count'],
          'class' => 'forum_view_count_current_node'
        );
      }
      if ($o->new['reply_count']) {
        $items[] = array(
          'data' => dd_get_strong(t('forum', '今日回复')) . $o->new['reply_count'],
          'class' => 'forum_view_count_current_reply'
        );
      }
      
      $rows[] = array('data' => theme('item_list', $items), 'class' => 'forum_view_term_count');
      
      $admin = '';
      if ($o->data['admins']) {
        $admins = array();
        foreach ($o->data['admins'] as $ac) {
          $admins[] .= theme('username', $ac); 
        }
        $admin = theme('item_list', $admins);
        unset($admins);
      } else {
        $admin = t('forum', '无');
      }
      
      $rows[] = array('data' => dd_get_strong(t('forum', '版主'), '') . $admin, 'class' => 'forum_view_term_admins');
      
      $tables[] = array('data' => $rows, 'id' => 'forum_view_term_id_'.$o->tid); 
      $obj->terms[$o->pid][$o->tid] = $o;
      
    }
    
    if ($tables) {
      $obj->contents = theme('table', array(), $tables,array('id' => 'forum_view_front'));
    }
    
  }
  
  dd_set_breadcrumb(array(t('forum', '论坛')));
  dd_add_css(dd_get_path('module', 'forum').'/forum.css');
  return theme('forum_front', $obj);
}

function forum_term_view($term) {
  
  // 外部链接版块，重定向到指定链接
  if ($term->type == -1) {
    dd_goto($term->data['target_url']);
  }
  
  // 分区
  if ($term->pid == 0) {
    
    $output = forum_view($term);
    dd_set_title(array($term->name, t('forum', '论坛')));
    dd_set_breadcrumb(array(l(t('forum', '论坛'), 'forum'), $term->name));
    
    return $output;
  }
  
  $term->add_url = '';
  $term->add_url = url('forum/add/'.$term->tid);
  $term->is_created = user_access('forum add');
  
  $header = array(
    array('data' => t('forum', '主题'), 'field' => 'f.fid'),
    array('data' => t('forum', '作者'), 'field' => 'f.uid'),
    array('data' => t('forum', '回复'), 'field' => 'f.comment_count'),
    array('data' => t('forum', '更新时间'), 'field' => 'f.updated', 'sort' => 'desc'),
  );
  
  if ($fetch = pager_query('SELECT f.fid, f.title, f.created, f.updated, f.uid, f.comment_count, f.status, u.name, 
  f.last_name, f.top FROM {forum} f INNER JOIN {users} u ON f.uid = u.uid WHERE f.tid = ? AND f.status > 0'
  .table_sql($header, ' f.top DESC, '), 20, 0, NULL, array($term->tid))) {
    foreach ($fetch as $o) {
      if ($o->last_name) {
        $last = explode('|', $o->last_name, 4);
        if ($last[1] > 0) {
          
          $update_go = l($last[3], 'forum/node/'.$o->fid, 
          array('query' => 'page='.$last[1], 'fragment' => 'comment_forum_'.$last[0]));
          
        } else {
          $update_go = l($last[3], 'forum/node/'.$o->fid, array('fragment' => 'comment_forum_'.$last[0]));
        }
        
        $last_name = '<span class="forum_node_list_last_name">' . $update_go.'</span>';
        
      } else {
        $last_name = '';
      }
      
      $table[] = array(
        array(
          'data' => l($o->title, 'forum/node/'.$o->fid),
          'class' => 'forum_node_list_title forum_node_list_top_'.$o->top.' forum_node_list_status_'.$o->status
        ),
        array(
          'data' => theme('username', $o).'<span class="forum_node_list_created">'.format_date($o->created).'</span>',
          'class' => 'forum_node_list_time'
        ),
        array('data' => $o->comment_count, 'class' => 'forum_node_list_comment'),
        array(
          'data' => t('forum', '!time前', array('!time' => format_interval($_SERVER['REQUEST_TIME'] - $o->updated, 3)))
            .$last_name,
          
          'class' => 'forum_node_list_updated'
        )
      );
    }
    
    $term->nodes = theme('table', $header, $table,
    array('id' => 'forum_node_list_'.$term->tid, 'class' => 'forum_node_list'));
    
    $term->pager = pager_view();
    
  } else {
    $term->nodes = $term->pager = '';
  }
  
  if ($term->data['admins']) {
    foreach ($term->data['admins'] as $admin) {
      $term->admins .= theme('username', $admin);
    }
  }
  
  dd_set_title(array($term->name, $term->parent->name, t('forum', '论坛')));
  dd_set_breadcrumb(array(l(t('forum', '论坛'), 'forum'),  $term->name));
  dd_add_css(dd_get_path('module', 'forum').'/forum.css');
  return theme('forum_term', $term);
}

/**
 * 主题浏览
 * @param (object) $node
 *  主题对象
 */
function forum_node_view($node) {
  dd_set_title(array($node->title, $node->term->name, t('forum', '论坛')));
  
  dd_set_breadcrumb(array(
    l(t('forum', '论坛'), 'forum'),
    l($node->term->parent->name, 'forum/'.$node->term->pid),
    l($node->term->name, 'forum/'.$node->term->tid),
    $node->title
  ));
  
  $node->body = filter_view($node->body, $node->format);
  
  $node->comment = new stdClass;
  if ($node->is_reply = user_access('forum reply add')) {
    $comment = new stdClass;
    $comment->ext_type = 'forum';
    $comment->ext_id = $node->fid;
    $comment->ext_id2 = $node->term->tid;
    $comment->title = t('forum', '回复：!title', array('!title' => $node->title));
    
    $node->comment->form = dd_get_form('comment_form', $comment);
  }
  
  $node->delete_url = $node->update_url= '';
  
  if (forum_is_node_delete($node)) {
    $node->delete_url = url('forum/node/'.$node->fid.'/delete');
  }
  
  if (forum_is_node_update($node)) {
    $node->update_url = url('forum/node/'.$node->fid.'/edit');
  }
  
  if (forum_is_node_admin($node)) {
    $node->top_url = url('forum/node/'.$node->fid.'/top');
    $node->essence_url = url('forum/node/'.$node->fid.'/essence');
  }
  
  if ($node->comment_count) {
    if ($data = comment_ext_view('forum', $node->fid)) {
      $node->comment->view = $data->view;
      $node->comment->pager = $data->pager;
    }
  }
   
  dd_add_css(dd_get_path('module', 'forum').'/forum.css');
  return theme('forum_node', $node);
}

/**
 * 删除主题
 * @param (object) $node
 */
function forum_page_node_delete($node) {
  if (forum_node_delete($node)) {
    dd_set_message(t('forum', '%title 已删除', array('%title' => $node->title)));
    if ($_GET['redirect']) {
      dd_goto($_GET['redirect']);
    } else {
      dd_goto('forum/'.$node->tid);
    }
  }
}

/**
 * 设置或取消置顶
 * @param (object) $node
 */
function forum_page_node_top($node) {
  if ($node->top > 0) {
    $node->top = 0;
    $text = t('forum', '取消置顶：!title', array('!title' => $node->title));
  } else {
    $node->top = 1;
    $text = t('forum', '设为置顶：!title', array('!title' => $node->title));
  }
  
  if (db_exec('UPDATE {forum} SET top = ? WHERE fid = ?', array($node->top, $node->fid))) {
    module_invoke_all('forum_node_top', $node);
    dd_log('forum_node', $text, $node->fid);
    dd_set_message($text);
    if ($_GET['redirect']) {
      dd_goto($_GET['redirect']);
    } else {
      dd_goto('forum/node/'.$node->fid);
    }
  }
}

/**
 * 设置或取消精华
 * @param (object) $node
 */
function forum_page_node_essence($node) {
  if ($node->essence > 0) {
    $node->essence = 0;
    $text = t('forum', '取消精华：!title', array('!title' => $node->title));
  } else {
    $node->essence = 1;
    $text = t('forum', '设为精华：!title', array('!title' => $node->title));
  }
  
  if (db_exec('UPDATE {forum} SET essence = ? WHERE fid = ?', array($node->essence, $node->fid))) {
    module_invoke_all('forum_node_essence', $node);
    dd_log('forum_node', $text, $node->fid);
    dd_set_message($text);
    if ($_GET['redirect']) {
      dd_goto($_GET['redirect']);
    } else {
      dd_goto('forum/node/'.$node->fid);
    }
  }
}

/**
 * 用户的主题
 * @param (object) $ac
 */
function forum_user_view($ac) {
  dd_set_tabs(array(
    l(t('forum', '!title的主页', array('!title' => $ac->title)), $ac->path),
    l(t('forum', '!title的论坛主题', array('!title' => $ac->title)), $ac->path.'/forum'),
    //l(t('forum', '!title的论坛回复', array('!title' => $ac->title)), $ac->path.'/forum/reply'),
  ));
  
  $header = array(
    array('data' => t('forum', '主题'), 'field' => 'f.fid'),
    array('data' => t('forum', '回复'), 'field' => 'f.comment_count'),
    array('data' => t('forum', '发表时间'), 'field' => 'f.created'),
    array('data' => t('forum', '更新时间'), 'field' => 'f.updated', 'sort' => 'desc'),
  );
  
  if ($fetch = pager_query('SELECT f.fid, f.title, f.created, f.updated, f.uid, f.comment_count, f.status, 
  f.last_name, f.top FROM {forum} f WHERE f.uid = ? AND f.status > 0'
  .table_sql($header), 20, 0, NULL, array($ac->uid))) {
    foreach ($fetch as $o) {
      if ($o->last_name) {
        $last = explode('|', $o->last_name, 4);
        if ($last[1] > 0) {
          
          $update_go = l($last[3], 'forum/node/'.$o->fid, 
          array('query' => 'page='.$last[1], 'fragment' => 'comment_forum_'.$last[0]));
          
        } else {
          $update_go = l($last[3], 'forum/node/'.$o->fid, array('fragment' => 'comment_forum_'.$last[0]));
        }
        
        $last_name = '<span class="forum_node_list_last_name">' . $update_go.'</span>';
        
      } else {
        $last_name = '';
      }
      
      $table[] = array(
        array(
          'data' => l($o->title, 'forum/node/'.$o->fid),
          'class' => 'forum_node_list_title forum_node_list_top_'.$o->top.' forum_node_list_status_'.$o->status
        ),
        array('data' => $o->comment_count, 'class' => 'forum_node_list_comment'),
        array(
          'data' => format_date($o->created),
          'class' => 'forum_node_list_time'
        ),
        array(
          'data' => t('forum', '!time前', array('!time' => format_interval($_SERVER['REQUEST_TIME'] - $o->updated, 3)))
            .$last_name,
          
          'class' => 'forum_node_list_updated'
        )
      );
    }
    
    $output = theme('table', $header, $table,
    array('id' => 'forum_node_list_'.$term->tid, 'class' => 'forum_node_list'));
    
    $output .= pager_view();
    
  } else if ($GLOBALS['user']->uid == $ac->uid) {
    $output = system_no_content(l(t('forum', '立即发布'), 'forum'));
  } else {
    $output = system_no_content();
  }
  
  dd_set_breadcrumb(array(
    l(t('forum', '论坛'), 'forum'),
    t('forum', '!title的主题', array('!title' => $ac->title))
  ));
  
  dd_set_title(array(t('forum', '!title的论坛主题', array('!title' => $ac->title))));
  dd_add_css(dd_get_path('module', 'forum').'/forum.css');
  
  return $output;
}

/**
 * 用户的回复
 * @param (object) $ac
 */
function forum_user_reply($ac) {
  dd_set_tabs(array(
    l(t('forum', '!title的主页', array('!title' => $ac->title)), $ac->path),
    l(t('forum', '!title的论坛主题', array('!title' => $ac->title)), $ac->path.'/forum'),
    l(t('forum', '!title的论坛回复', array('!title' => $ac->title)), $ac->path.'/forum/reply'),
  ));
  
  $header = array(
    array('data' => t('forum', '主题'), 'field' => 'f.fid'),
    array('data' => t('forum', '回复'), 'field' => 'f.comment_count'),
    array('data' => t('forum', '发表时间'), 'field' => 'f.created'),
    array('data' => t('forum', '更新时间'), 'field' => 'f.updated', 'sort' => 'desc'),
  );
  
  if ($fetch = pager_query('SELECT f.fid, f.title, f.created, f.updated, f.uid, f.comment_count, f.status, 
  f.last_name, f.top FROM {forum} f WHERE f.uid = ? AND f.status > 0'
  .table_sql($header), 20, 0, NULL, array($ac->uid))) {
    foreach ($fetch as $o) {
      if ($o->last_name) {
        $last = explode('|', $o->last_name, 4);
        if ($last[1] > 0) {
          
          $update_go = l($last[3], 'forum/node/'.$o->fid, 
          array('query' => 'page='.$last[1], 'fragment' => 'comment_forum_'.$last[0]));
          
        } else {
          $update_go = l($last[3], 'forum/node/'.$o->fid, array('fragment' => 'comment_forum_'.$last[0]));
        }
        
        $last_name = '<span class="forum_node_list_last_name">' . $update_go.'</span>';
        
      } else {
        $last_name = '';
      }
      
      $table[] = array(
        array(
          'data' => l($o->title, 'forum/node/'.$o->fid),
          'class' => 'forum_node_list_title forum_node_list_top_'.$o->top.' forum_node_list_status_'.$o->status
        ),
        array('data' => $o->comment_count, 'class' => 'forum_node_list_comment'),
        array(
          'data' => format_date($o->created),
          'class' => 'forum_node_list_time'
        ),
        array(
          'data' => t('forum', '!time前', array('!time' => format_interval($_SERVER['REQUEST_TIME'] - $o->updated, 3)))
            .$last_name,
          
          'class' => 'forum_node_list_updated'
        )
      );
    }
    
    $output = theme('table', $header, $table,
    array('id' => 'forum_node_list_'.$term->tid, 'class' => 'forum_node_list'));
    
    $output .= pager_view();
    
  } else if ($GLOBALS['user']->uid == $ac->uid) {
    $output = system_no_content(l(t('forum', '立即发布'), 'forum'));
  } else {
    $output = system_no_content();
  }
  
  dd_set_breadcrumb(array(
    l(t('forum', '论坛'), 'forum'),
    t('forum', '!title的回复', array('!title' => $ac->title))
  ));
  
  dd_set_title(array(t('forum', '!title的论坛回复', array('!title' => $ac->title))));
  dd_add_css(dd_get_path('module', 'forum').'/forum.css');
  
  return $output;
}