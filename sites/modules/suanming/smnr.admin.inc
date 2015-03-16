<?php
// $Id$

/**
 * 字段管理
 */
function smnr_admin_fields(){
  /**
   * 注册 tabs
   */
  dd_set_tabs(array(
    l(t('smnr', '算命字段管理'), 'admin/smnr/fields'),
    l(t('smnr', '算命字段添加'), 'admin/smnr/fields/add'),
    l(t('smnr', '算命管理'), 'admin/smnr'),
  ));
  
  $args = arg();
  switch($args[3]){
    case 'add':
      /**
       * 在这里根据注册的字段组信息回调表单，完成字段的添加/编辑
       */
			$field->type = 'my_field'; // 字段组系统名称，必须与注册一致
			$field->module = 'smnr'; // 模块名，必须
			$field->redirect = url('admin/smnr/fields'); // 添加/编辑后完返回的地址
			$output = dd_get_form('field_form', $field); // 回调字段表单
    break;
    default:
      // 这里即回调由 smnr 模块定义的 my_field 字段组
			$output = field_lists('smnr', 'my_field');
  }
  
  
  return $output;
}
/**
 * 算命管理
 */
function smnr_admin_page(){                  
  $where = ' n.nid>0';
	if($_GET['title']){
	  $where .= ' and n.title LIKE ?';
	  $args[] = '%'.$_GET['title'].'%';
	}

  $output = dd_get_form('search_form',$vid,'smnr');
  if($fetch = pager_query('SELECT n.* FROM {suanming_neirong} n left join {users} u on n.uid = u.uid WHERE '.$where.' ORDER BY n.nid DESC',10,0,NULL,$args)){  
  $output .= '<form name="oform" id="oform" accept-charset="UTF-8" action="smnr/duoxuan" method="post">';
	foreach($fetch as $o){
		$o = smnr_load($o->nid);
		$table[] = array('<input name="nid[]" type="checkbox" value="'.$o->nid.'" class="smnrid" />'.$o->nid,$o->title,$o->name, format_date($o->created,'small'), l('编辑','admin/smnr/'.$o->nid.'/edit').' | '.l('删除','smnr/'.$o->nid.'/delete', array('attributes' => array('class' => 'confirm'))));
	}
  $output .= theme('table', array('序号','标题', '作者', '时间','操作'), $table);
  $output .= '<div id="duoxuan"><input type="checkbox" value="" name="admin_check_all[]" alt="smnrid" class="form_all_check" />全选<input type="submit" name="submit" value="删除" id="delete"/></div>
</form>';
    $output .= pager_view(); // 调用分页
  }

  return $output;
}

function smnr_admin_duoxuan(){
	if($_POST['nid']){
		foreach($_POST['nid'] as $val){
			$smnr = smnr_load($val);
      if(db_exec('DELETE FROM {smnr} WHERE nid = ?', array($smnr->nid))){
        field_get_node_delete('smnr','my_field',$smnr);             //删除算命自定义字段
      }
		}
		dd_goto(dd_get_history());
	}else{
		dd_goto(dd_get_history());
	}
}

function fuwu_admin_page(){
	if($fetch = pager_query('SELECT * FROM {comment} WHERE ext_type=? or ext_type=? ORDER BY cid DESC',10,0,NULL,array('smnr','xianlu'))){   
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