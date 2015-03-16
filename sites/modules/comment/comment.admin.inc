<?php
// $Id: comment.admin.inc 2 2011-12-03 08:51:48Z east $

function comment_admin_page() {
  
  if (!empty($_GET['op']) && $_GET['op'] == 'delete' && $_GET['cid']) {
    if (comment_delete($_GET['cid'])) {
      echo 'tr';
    }
    exit;
  }
  
  if ($fetch = pager_query('SELECT c.title, c.body, c.ext_id, c.ext_type, c.cid, c.host, c.site, c.created, u.name FROM {comment} c INNER JOIN {users} u 
  ON c.uid = u.uid ORDER BY cid DESC', 20)) {
    
    foreach ($fetch as $o) {
      $table[] = array(
        l($o->body, 'article/'.$o->ext_id.'#comment_'.$o->ext_type.'_'.$o->cid, array('attributes' => array('target' => '_blank','class' => 'atitle'))),
        $o->name, $o->host, format_date($o->created),array('data' =>dd_form_select(array(
					'#value' => $o->site,
					'#options' => array('' => '不推荐', 's' => '推荐首页'),
					'#size' => 8,
					'#attributes' => array(
						'class' => 'changeconfirm dd_form_ajax_field',
						'href' => url('admin/comment/change/status', array('query' => 'op=status&cid='.$o->cid))),   
					'#name' => 'status'.$o->nid)), 'class' => 'center_table'),array('data' =>dd_form_select(array(
					'#value' => $o->status,
					'#options' => array('1' => '审核通过', '0' => '审核不通过'),
					'#size' => 8,
					'#attributes' => array(
						'class' => 'changeconfirm dd_form_ajax_field',
						'href' => url('admin/comment/change/status', array('query' => 'op=check&cid='.$o->cid))),   
					'#name' => 'status'.$o->nid)), 'class' => 'center_table'),l('删除', 'admin/comment', array('query' => 'op=delete&cid=' . $o->cid, 'attributes' => array('class' => 'confirmajax')))
      );
    }
    
    $output = theme('table', array('主题', '发布人', '发布者 IP', '发布时间', '推荐', '审核', '操作'), $table, array('class' => 'center_table'));
    $output .= pager_view();
  }
  
  return $output;
}

function comment_tuijian(){
	if($_GET['op'] == 'status'){
		if($_REQUEST['cid'] != '' && $_REQUEST['value'] != ''){
			db_query("UPDATE {comment} set site = ? WHERE cid = ?", array($_REQUEST['value'], $_REQUEST['cid']));
		}
	}elseif($_GET['op'] == 'check'){
		if($_REQUEST['cid'] != ''){
			if(!$_REQUEST['value']){
				$_REQUEST['value'] = 0;
			}
			db_query("UPDATE {comment} set status = ? WHERE cid = ?", array($_REQUEST['value'], $_REQUEST['cid']));
		}
	}
	exit();
}