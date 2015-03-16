<?php
// $Id$

/**
 * 字段管理
 */
function one_admin_fields(){
  /**
   * 注册 tabs
   */
  dd_set_tabs(array(
    l(t('one', '字段管理'), 'admin/one/fields'),
    l(t('one', '添加字段'), 'admin/one/fields/add'),
    l(t('one', '单页面管理'), 'admin/one'),
  ));
  
  $args = arg();
  switch($args[3]){
    case 'add':
      /**
       * 在这里根据注册的字段组信息回调表单，完成字段的添加/编辑
       */
      $field->type = 'my_field'; // 字段组系统名称，必须与注册一致
      $field->module = 'one'; // 模块名，必须
      $field->redirect = url('admin/one/fields'); // 添加/编辑后完返回的地址
      $output = dd_get_form('field_form', $field); // 回调字段表单
    break;
    default:
      // 这里即回调由 one 模块定义的 my_field 字段组
      $output = field_lists('one', 'my_field');
  }
  
  
  return $output;
}
/**
 * 单页面管理
 */
function one_admin_page(){                  
 // $args = NULL;
 $vid = db_query('SELECT field_id FROM {fields} WHERE module = ? and field_key = ?', array('one','lanmu'), array('return'=>'column'));
  $where = ' n.nid>0';
	if($_GET['title']){
	  $where .= ' and n.title LIKE ?';
	  $args[] = '%'.$_GET['title'].'%';
	}
	if($_GET['tid']){
		$tids = get_allterm_bytid($_GET['tid']);
    $args[] = $tids;
	  $where .= " and ftn.tid in (".implode(',',$tids).")";
	}
	if($_GET['username']){
		$where .=' and u.name like '."'%".$_GET['username']."%'";
	}

  $output = dd_get_form('search_form',$vid,'one');
  if($fetch = pager_query('SELECT n.*,u.name FROM {one} n LEFT JOIN {users} u ON n.uid = u.uid WHERE '.$where.'',10,0,NULL,$args)){  
  $output .= '<form name="oform" id="oform" accept-charset="UTF-8" action="one/duoxuan" method="post">';
	foreach($fetch as $o){
		$term = get_term_bynid($o->nid, 'one');
		$table[] = array('<input name="nid[]" type="checkbox" value="'.$o->nid.'" class="oneid" />'.$o->nid,l($o->title, 'one/'.$o->nid,array('attributes' => array('target' => '_blank'))),$o->name, format_date($o->timestamp,'small'),l('编辑','admin/one/'.$o->nid.'/edit').' | '.l('删除','one/'.$o->nid.'/delete', array('attributes' => array('class' => 'confirm'))));
	}
  $output .= theme('table', array('序号','标题', '作者', '时间','操作'), $table);
  $output .= '<div id="duoxuan"><input type="checkbox" value="" name="admin_check_all[]" alt="oneid" class="form_all_check" />全选<input type="submit" name="submit" value="删除" id="delete"/></div>
</form>';
    $output .= pager_view(); // 调用分页
  }

  return $output;
}

function one_admin_duoxuan(){
	if($_POST['nid']){
		foreach($_POST['nid'] as $val){
			$one = one_load($val);
      if(db_exec('DELETE FROM {one} WHERE nid = ?', array($one->nid))){
        field_get_node_delete('one','my_field',$one);             //删除单页面自定义字段
      }
		}
		dd_goto(dd_get_history());
	}else{
		dd_goto(dd_get_history());
	}
}

function fuwu_admin_page(){
	if($fetch = pager_query('SELECT * FROM {comment} WHERE ext_type=? or ext_type=? ORDER BY cid DESC',10,0,NULL,array('one','xianlu'))){   
		foreach($fetch as $o){
			$user = user_load($o->uid);
			//$ext = '';
			//$ext = unserialize($o->data);
			//$term = get_term_bynid($o->nid);
			$table[] = array($user->name,$o->title, format_date($o->timestamp,'small'),$o->site,$o->mail,$o->host,$o->body);
		}
		$output .= theme('table', array('昵称','标题', '时间','电话','邮箱','qq或msn','备注'), $table);

    $output .= pager_view(); // 调用分页
  }

  return $output;	
}