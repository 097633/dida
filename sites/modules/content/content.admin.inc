<?php
// $Id: content.admin.inc 2 2013-01-31 18:02:23Z east $

// public content_admin_list() {{{ 
/**
 * content_admin_list
 *  按类型管理内容
 * @param object $type
 *  一条类型记录
 * @access public
 * @return string
 */
function content_admin_list($type) {
  dd_set_tabs(array(
    l(t('content', '!name管理', array('!name' => $type->name)), 'admin/content/list/' . $type->type),
    l(t('content', '添加内容'), 'content/add/' . $type->type, dd_get_redirect()),
  ));
  
  if (user_access('admin content type')) {
    dd_set_tabs(array(l(t('content', '!name属性', array('!name' => $type->name)), 'admin/content/type/fields/' . $type->type)));
  }

  if (!empty($_GET['op']) && $_GET['op'] == 'delete') {
    if (user_access('content ' . $type->type . ' delete') && content_delete($type->type, $_GET['id'])) {
      echo 'tr';
    } else {
      echo t('content', '您没有删除内容的权限');
    }
    exit;
  }
 
  $args = NULL;

  //$query = 'SELECT n.title, n.nid, n.uid, n.visit, n.comment_count, n.status, n.created, u.name, n.check_user, n.check_status FROM {content_ext_' . $type->type . '} n INNER JOIN {users} u ON n.uid = u.uid';
  
  $query = 'SELECT n.*, n.created, u.name FROM {content_ext_' . $type->type . '} n INNER JOIN {users} u ON n.uid = u.uid';

  if (!empty($_GET['keyword'])) {
    $args[] = '%' . urldecode($_GET['keyword']) . '%';
    $query .= ' WHERE n.title LIKE ?';
  }
  
  $output = dd_get_form('form_admin_search');
  
	if(arg(3) == 'news'){
		$header = array(
			array('data' => t('content', '标题'), 'field' => 'n.nid', 'sort' => 'desc'),
			array('data' => t('content', '作者'), 'field' => 'n.uid'),
			array('data' => t('content', '评论'), 'field' => 'n.comment_count'),
			array('data' => t('content', '访问'), 'field' => 'n.visit'),
			array('data' => t('content', '状态'), 'field' => 'n.status'),
			array('data' => t('content', '审核'), 'field' => 'n.check_status'),
			array('data' => t('content', '栏目')),
			array('data' => t('content', '推荐'), 'field' => 'n.flag'),
			array('data' => t('content', '发布'), 'field' => 'n.created'),
			array('data' => t('content', '更新'), 'field' => 'n.updated'),
			array('data' => t('content', '审核时间'), 'field' => 'n.check_time'),
			t('content', '操作')
		);
		
		if ($fetch = pager_query($query . table_sql($header), 20, 0, NULL, $args)) {
			$delete_url = url('admin/content/list/' . $type->type, array('query' => 'op=delete'));
			foreach ($fetch as $o) {
				$term = get_term_bynid($o->nid, 'lanmu', 'content');
				if(user_access('content news update')){
					$o->check_status = array('data' =>dd_form_select(array(
						'#value' => $o->check_status,
						'#options' => array('未审核','审核通过','审核不通过'),
						'#size' => 8,
						'#attributes' => array(
							'class' => 'changeconfirm dd_form_ajax_field',
							'href' => url('admin/content/change/status', array('query' => 'op=status&nid='.$o->nid))),   
						'#name' => 'status'.$o->nid)), 'class' => 'center_table');
				}else{
					if($o->check_status == 0){
						$o->check_status = '未审核';
					}elseif($o->check_status == 1){
						$o->check_status = '审核通过';
					}elseif($o->check_status == 2){
						$o->check_status = '审核不通过';
					}
				}
				if($o->check_user == 0){
					$o->check_user = '';
				}else{
					$o->check_user = db_query("SELECT name FROM {users} WHERE uid = ?", array($o->check_user), array('return' => 'column'));
				}
				if($o->flag == 't'){
					$o->tuijian = '头条';
				}elseif($o->flag == 's'){
					$o->tuijian = '首页';
				}elseif($o->flag == 'p'){
					$o->tuijian = '频道';
				}else{
					$o->tuijian = '';
				}
				$table[] = array(
					l($o->title, 'content/' . $type->type . '/' . $o->nid, array('attributes' => array('target' => '_blank', 'class' => 'atitle'))),
					$o->name,
					$o->comment_count,
					$o->visit,
					$o->status ? t('content', '已发布') : t('content', '草稿'),
					$o->check_status,
					$term->name,
					$o->tuijian,
					date('Y-m-d H:i', $o->created),
					date('m-d', $o->updated),
					date('m-d', $o->check_time),
					dd_imp(array(
						l(t('content', '编辑'), 'content/' . $type->type . '/' .  $o->nid . '/edit', dd_get_redirect()),
						'<a href="' . $delete_url . '&id=' . $o->nid . '" class="confirmajax">' . t('content', '删除') . '</a>'
					))
				);
			}
			$output .= theme('table', $header, $table, array('class' => 'center_table'));
			$output .= pager_view();
		} else {
			$output .= system_no_content();
		}
	}else{
		$header = array(
			array('data' => t('content', '标题'), 'field' => 'n.nid', 'sort' => 'desc'),
			array('data' => t('content', '创建人'), 'field' => 'n.uid'),
			array('data' => t('content', '评论数量'), 'field' => 'n.comment_count'),
			array('data' => t('content', '访问次数'), 'field' => 'n.visit'),
			array('data' => t('content', '状态'), 'field' => 'n.status'),
			array('data' => t('content', '推荐位'), 'field' => 'n.flag'),
			array('data' => t('content', '发布时间'), 'field' => 'n.created'),
			array('data' => t('content', '更新时间'), 'field' => 'n.updated'),
			t('content', '操作')
		);
		
		if ($fetch = pager_query($query . table_sql($header), 20, 0, NULL, $args)) {
			$delete_url = url('admin/content/list/' . $type->type, array('query' => 'op=delete'));
			foreach ($fetch as $o) {
				if(user_access('content news update')){
					$o->check_status = array('data' =>dd_form_select(array(
						'#value' => $o->check_status,
						'#options' => array('未审核','审核通过','审核不通过'),
						'#size' => 8,
						'#attributes' => array(
							'class' => 'changeconfirm dd_form_ajax_field',
							'href' => url('admin/content/change/status', array('query' => 'op=status&nid='.$o->nid))),   
						'#name' => 'status'.$o->nid)), 'class' => 'center_table');
				}else{
					if($o->check_status == 0){
						$o->check_status = '未审核';
					}elseif($o->check_status == 1){
						$o->check_status = '审核通过';
					}elseif($o->check_status == 2){
						$o->check_status = '审核不通过';
					}
				}
				if($o->check_user == 0){
					$o->check_user = '';
				}else{
					$o->check_user = db_query("SELECT name FROM {users} WHERE uid = ?", array($o->check_user), array('return' => 'column'));
				}
				if($o->flag == 't'){
					$o->tuijian = '头条';
				}elseif($o->flag == 's'){
					$o->tuijian = '首页';
				}elseif($o->flag == 'p'){
					$o->tuijian = '频道';
				}else{
					$o->tuijian = '';
				}
				$table[] = array(
					l($o->title, 'content/' . $type->type . '/' . $o->nid, array('attributes' => array('target' => '_blank', 'class' => 'atitle'))),
					$o->name,
					$o->comment_count,
					$o->visit,
					$o->status ? t('content', '已发布') : t('content', '草稿'),
					$o->tuijian,
					format_date($o->created, 'small'),
					format_date($o->updated, 'small'),
					dd_imp(array(
						l(t('content', '编辑'), 'content/' . $type->type . '/' .  $o->nid . '/edit', dd_get_redirect()),
						'<a href="' . $delete_url . '&id=' . $o->nid . '" class="confirmajax">' . t('content', '删除') . '</a>'
					))
				);
			}
			$output .= theme('table', $header, $table, array('class' => 'center_table'));
			$output .= pager_view();
		} else {
			$output .= system_no_content();
		}
	}

  return $output;
}
// }}}
