<?php
// $Id$
/**
 * 字段管理
 */
function link_admin_fields(){
  /**
   * 注册 tabs
   */
  dd_set_tabs(array(
    l(t('link', '字段管理'), 'admin/link/fields'),
    l(t('link', '添加字段'), 'admin/link/fields/add'),
    l(t('link', '合作伙伴管理'), 'admin/link'),
  ));
  
  $args = arg();
  switch($args[3]){
    case 'add':
      /**
       * 在这里根据注册的字段组信息回调表单，完成字段的添加/编辑
       */
      $field->type = 'my_field'; // 字段组系统名称，必须与注册一致
      $field->module = 'link'; // 模块名，必须
      $field->redirect = url('admin/link/fields'); // 添加/编辑后完返回的地址
      $output = dd_get_form('field_form', $field); // 回调字段表单
    break;
    default:
      // 这里即回调由 link 模块定义的 my_field 字段组
      $output = field_lists('link', 'my_field');
  }
  
  
  return $output;
}
/**
 * 合作伙伴管理
 */
function link_admin_page(){                  //$vid是搜索表单需要的，当合作伙伴模块开启添加自定义字段后填写
  $args = array();
  $where = ' n.nid>0';
	if($_GET['title']){
	  $where .= ' and n.title LIKE ?';
	  $args[] = '%'.$_GET['title'].'%';
	}
	if($_GET['url']){
	  $where .= ' and n.url LIKE ?';
	  $args[] = '%'.$_GET['url'].'%';
	}
  $output = dd_get_form('link_search_form');
  if($fetch = pager_query('SELECT n.* FROM {link} n WHERE '.$where.' ORDER BY n.nid DESC', 30, 0, NULL, $args)){  
		$output .= '<form name="oform" id="oform" accept-charset="UTF-8" action="link/duoxuan" method="post">';
		foreach($fetch as $o){
			$table[] = array('<input name="id[]" type="checkbox" value="'.$o->nid.'" />'.$o->nid,$o->title,l($o->url,$o->url,array('attributes' => array('target' => '_blank'))), date('Y-m-d',$o->created),l('编辑','admin/link/'.$o->nid.'/edit').' | '.l('删除','link/'.$o->nid.'/delete', array('attributes' => array('class' => 'confirm'))));
		}
		$output .= theme('table', array('序号','标题', 'url', '时间','操作'), $table);
		$output .= '</form>';
		$output .= pager_view(); // 调用分页
  }

  return $output;
}