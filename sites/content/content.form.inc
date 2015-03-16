<?php
// $Id: content.form.inc 2 2013-01-31 18:02:23Z east $

// public content_form($content = NULL, $type = NULL) {{{ 
/**
 * content_form
 *  内容表单
 * 
 * @param object $content 
 *  一条内容记录，若有，则编辑该内容
 * @param object $type 
 *  一个内容类型对象，在新增内容时，必需传递此值
 * @access public
 * @return array
 */
function content_form($type, $content = NULL) {
  if (empty($type) && empty($content->type)) {
    dd_set_message(t('content', '无法添加内容，请先选择内容类型'), 'error');
    return false;
  }

  if (empty($content->type)) $content->type = $type->type;

  if (!$data = content_type_load($content->type)) {
    dd_set_message(t('content', '不正确的内容类型'), 'error');
    return false;
  }
  
  // 隐藏其它内容类型的编辑器实例
  global $editor_disabled;

  foreach (content_get_type_by_type() as $key => $_v) {
    if ($key != $content->type) {
      $editor_disabled['content_' . $key] = true;
    }
  }
  
  $tabs = array();

  if (user_access('admin content view')) {
    $tabs[] = l(t('content', '!name管理', array('!name' => $data->name)), 'admin/content/list/' . $data->type);
  }

  if (empty($content->nid)) {
    $tabs[] = l(t('content', '添加内容'), 'content/add/' . $content->type);
  } else {
    $tabs[] = l(t('content', '编辑内容'), 'content/' . $content->type . '/' . $content->nid . '/edit');
    $tabs[] = l(t('content', '浏览内容'), 'content/' . $content->type . '/' . $content->nid);
  }

  dd_set_tabs($tabs);
	
	$tuijian = array(''=>'请选择','t' => '头条推荐','s' => '首页推荐','p' => '频道推荐');
  $form = array(
    'fields' => array(),
    'settings' => array(
      '#ajax_validate' => 1,
      '#attributes' => array('class' => 'content_form_type_' . $data->type),
      '#validate' => array('content_form_validate'),
      '#redirect' => !empty($content->redirect) ? $content->redirect : NULL
    )
  );
	
  $form['fields']['title'] = array(
    '#title' => $type->data['title'],
    '#type' => 'textfield',
    '#weight' => -100,
    '#default_value' => $content->title,
    '#required' => 1,
  );
   
  $form['fields']['type'] = array(
    '#type' => 'hidden',
    '#default_value' => $content->type,
    '#constant' => 1,
  );
	$form['fields']['xgyd'] = array(
    '#type' => 'hidden',
    '#default_value' => '',
    '#constant' => 1,
  );
	if(arg(3) != 'wxx'){
		$form['fields']['litpic'] = array(
			'#title' => t('litpic', '缩略图'),
			'#type' => 'file',
			'#description' => isset($content->litpic) ? '<img src="/'.image_get_thumb($content->fid,$content->litpic,'60x60','scale_and_crop').'" /><a href="/files/'.$content->fid.'/delete" class="confirmajax" level="parent" target="_blank">删除</a>' : '',
			'#filesave' => false,// 系统处理上传文件
			'#validate' => array(
				'savepath' => 'article',
				'no_insert' => true,
				'title' => '缩略图',
				'filename' => 'image',
				'image' => array(
					'type' => array('jpg', 'png', 'gif'),
				),
			),
		); 
	}
	$form['fields']['flag'] = array(
		'#title' => t('flag', '推荐位'),
		'#type' => 'select',
		'#default_value' => $content->flag,
		'#options' => $tuijian,
		'#weight' => 0,
	); 
	if(arg(3) == 'news' || $content->type == 'news'){
		$form['fields']['alias'] = array(
			'#title' => t('alias', '别名'),
			'#type' => 'textfield',
			'#weight' => 100,
			'#default_value' => $content->alias,
		);
		$form['fields']['description'] = array(
			'#title' => t('descripiton', '摘要'),
			'#type' => 'textarea',
			'#default_value' => $content->description,
			'#attributes' => array(
				'cols' => 100,
				'rows' => 5,
				'id' => 'description'
			),
		);
	 $form['fields']['diyitu'] = array(
			'#type' => 'radio',
			'#title' => '第一张为缩略图',
			'#default_value' => !empty($content->nid) ? 0 : 1,
			'#required' => 0,
			'#weight' => 10,
			'#options' => array('不是', '是')
		);
	}
  $form['fields']['nid'] = array(
    '#type' => 'hidden',
    '#default_value' => !empty($content->nid) ? $content->nid : 0,
    '#constant' => 1,
  );
   
  $form['fields']['uid'] = array(
    '#type' => 'hidden',
    '#default_value' => !empty($content->uid) ? $content->uid : $GLOBALS['user']->uid,
    '#constant' => 1,
  );
  if(arg(1) != 'dutu' && arg(2) != 'dutu'){
		$form['fields']['body'] = array(
			'#title' => $type->data['body'],
			'#type' => 'textarea',
			'#default_value' => $content->body,
			'#required' => 0,
			'#weight' => 100,
			'#attributes' => array(
				'id' => 'content_form_type_body',
			)
		);
	}else{
		$form['fields']['body'] = array(
			'#title' => $type->data['body'],
			'#type' => 'textarea',
			'#default_value' => $content->body,
			'#required' => 0,
			'#weight' => 100,
			'#attributes' => array(
				'id' => 'content_form_type_body',
				'class' => '{rangelength: [0, 140]}'
			)
		);
	}
   
  $form['fields']['format'] = filter_form_field($content->format, 1);
  $form['fields']['format']['#weight'] = 105;

  $form['fields']['status'] = array(
    '#type' => 'radio',
    '#title' => t('content', '状态'),
    '#default_value' => isset($content->status) ? $content->status : 1,
    '#required' => 1,
    '#weight' => 110,
    '#options' => array(t('content', '存为草稿'), t('content', '立即发布'))
  );
  
  field_get_node_form('content', 'ext_' . $content->type, $content, $form);

  module_alter_all('content_form', $form, $content);
  
  $form['fields']['button'] = array(
    '#type' => 'submit',
    '#weight' => 150,
    '#submit' => 'content_form_submit'
  );
	if(arg(1) != 'dutu' && arg(2) != 'dutu'){
		dd_get_baidueditor('content_form_type_body', array(
			'toolbar' => 'full', // 编辑器按钮，可选参数:full small  medium
			'upload_image' => 1, // 是否允许上传图片
			'height' => 300, // 高度
			'swfupload' => 1,
		));
	}

  return $form;
}
// }}}

function content_form_validate(&$form, &$v) {
  return content_validate($v['_dida_values'], $form);
}

function content_form_submit(&$form, &$v) {
	$v['_dida_values']->body = file_down_image($v['_dida_values']->body);
	if($v['diyitu'] != 1){
		$f = file_save_upload($_FILES['litpic']);
		$v['_dida_values']->fid = $f->fid;
	}else{
		preg_match('/(<img.*?src=)(["|\'])(.*?)["|\']/i', $v['_dida_values']->body, $mat);
		if($mat[3] != '' && strpos('%'.$mat[3], 'http://') == false){
			$filepath = $mat[3];
			$filepath = substr($filepath, 1);
			db_query("UPDATE {content_ext_".$v['type']."} SET fid = (SELECT fid FROM {files} WHERE md5(filepath) = ? limit 0,1) WHERE nid = ?", array(md5($filepath), $v['nid']));
		}
	}
  if (content_save($v['_dida_values'], 0)) {
		/*
		if($v['_dida_values']->fields['xiangguan'] != '' && $v['_dida_values']->xiangguan != ''){
			db_query("DELETE FROM {storage} WHERE ext_id =? AND ext_type = ?", array($v['_dida_values']->nid, $v['_dida_values']->fields['xiangguan']));
			db_query("INSERT INTO {storage} (`ext_id`, `ext_type`, `ext_type2`, `data`) VALUES (?, ?, ?, ?)", array($v['_dida_values']->nid, $v['_dida_values']->fields['xiangguan'], $v['_dida_values']->xiangguan, $v['_dida_values']->type));
		}
		*/
    if (empty($v['_dida_values']->_db_write_record_is_update)) {
      // 将文件关联到内容
      db_exec('UPDATE {files} SET ext_type = ?, ext_id = ?, status = 1 WHERE ext_type = ?', 
      array('content_' . $v['_dida_values']->type, $v['_dida_values']->nid, $form['#form_token']));
    }
    dd_set_message(t('content', '操作成功'));
  } else {
    dd_set_message(t('content', '抱歉，出现异常，无法保存'), 'error');
  }
}

// public content_delete_form($content) {{{ 
/**
 * content_delete_form
 * 删除内容表单
 * 
 * @param object $content 
 * @access public
 * @return array
 */
function content_delete_form($content) {

}
// }}}