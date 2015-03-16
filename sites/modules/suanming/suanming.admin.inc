<?php
// $Id$

/**
 * 字段管理
 */
function suanming_admin_fields(){
  /**
   * 注册 tabs
   */
  dd_set_tabs(array(
    l(t('suanming', '算命字段管理'), 'admin/suanming/fields'),
    l(t('suanming', '算命字段添加'), 'admin/suanming/fields/add'),
    l(t('suanming', '算命管理'), 'admin/suanming'),
  ));
  
  $args = arg();
  switch($args[3]){
    case 'add':
      /**
       * 在这里根据注册的字段组信息回调表单，完成字段的添加/编辑
       */
			$field->type = 'my_field'; // 字段组系统名称，必须与注册一致
			$field->module = 'suanming'; // 模块名，必须
			$field->redirect = url('admin/suanming/fields'); // 添加/编辑后完返回的地址
			$output = dd_get_form('field_form', $field); // 回调字段表单
    break;
    default:
      // 这里即回调由 suanming 模块定义的 my_field 字段组
			$output = field_lists('suanming', 'my_field');
  }
  
  
  return $output;
}
/**
 * 算命管理
 */
function suanming_admin_page(){                  
 // $args = NULL;
  $where = ' n.nid>0';
	if($_GET['title']){
	  $where .= ' and n.title LIKE ?';
	  $args[] = '%'.$_GET['title'].'%';
	}
	if($_GET['username']){
		$where .=' and u.name like '."'%".$_GET['username']."%'";
	}

  $output = dd_get_form('search_form',$vid,'suanming');
  if($fetch = pager_query('SELECT n.nid,u.name FROM {suanming} n left join {suanming_neirong} sn on n.sid = sn.nid left join {users} u on n.uid = u.uid WHERE '.$where.' ORDER BY n.nid DESC',10,0,NULL,$args)){  
  $output .= '<form name="oform" id="oform" accept-charset="UTF-8" action="suanming/duoxuan" method="post">';
	foreach($fetch as $o){
		$o = suanming_load($o->nid);
		$table[] = array('<input name="nid[]" type="checkbox" value="'.$o->nid.'" class="suanmingid" />'.$o->nid,l($o->title, $o->url,array('attributes' => array('target' => '_blank'))),$o->name, format_date($o->timestamp,'small'),$term->name,l('添加内容','admin/smnr/add/'.$o->nid).' | '.l('管理算命','admin/smnr',array('query' => 'suanming='.$o->nid)).' | '.l('编辑','admin/suanming/'.$o->nid.'/edit').' | '.l('删除','suanming/'.$o->nid.'/delete', array('attributes' => array('class' => 'confirm'))));
	}
  $output .= theme('table', array('序号','标题', '作者', '时间','所属栏目','操作'), $table);
  $output .= '<div id="duoxuan"><input type="checkbox" value="" name="admin_check_all[]" alt="suanmingid" class="form_all_check" />全选<input type="submit" name="submit" value="删除" id="delete"/></div>
</form>';
    $output .= pager_view(); // 调用分页
  }

  return $output;
}