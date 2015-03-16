<?php
// $Id$
function one_node_form($one = NULL){
  /**
   * 表单与drupal略有不同
   * $form['settings'] 下是是表单的一些参数
   * $form['fields'] 则为表单字段
   */
  $tuijian = array(''=>'请选择','s'=>'首页推荐','p'=>'频道推荐');
  $form['settings'] = array(
    '#ajax_validate' => 1, // 是否ajax验证基本内容，即非必填内容等
    '#validate' => array('one_node_form_validate'), // 调用验证函数
    '#redirect' => url('admin/one'), // 提交成功后跳转地址
  );
  $form['fields']['nid'] = array(
    '#type' => 'hidden',
    '#default_value' => $one->nid,
    '#constant' => 1
  );  
  $form['fields']['title'] = array(
    '#title' => t('one', '标题'),
    '#type' => 'textfield',
    '#default_value' => $one->title,
    '#required' => 1,
    '#weight' => -10,
    '#attributes' => array('size' => 100)
  );
  $form['fields']['flag'] = array(
    '#title' => t('flag', '推荐位'),
    '#type' => 'select',
    '#default_value' => $one->flag,
    '#options' => $tuijian,
    '#weight' => 0,
  );  
  $form['fields']['litpic'] = array(
    '#title' => t('litpic', '缩略图'),
    '#type' => 'file',
		'#description' => isset($one->litpic) ? '<img src="/'.image_get_thumb($one->nid,$one->litpic,'60x60','scale_and_crop').'" /><a href="/files/'.$one->fid.'/delete" class="confirmajax" level="parent" target="_blank">删除</a>' : '',
    '#filesave' => false,// 系统处理上传文件
    '#validate' => array(
      'savepath' => 'one',
      'no_insert' => true,
      'title' => '缩略图',
      'filename' => 'image',
      'image' => array(
        'type' => array('jpg', 'png', 'gif'),
      ),
    ),
  );  
  $form['fields']['description'] = array(
    '#title' => t('descripiton', '摘要'),
    '#type' => 'textarea',
    '#default_value' => $one->description,
    '#attributes' => array(
      'cols' => 100,
      'rows' => 5,
      'id' => 'description'
    ),
  );
  $form['fields']['body'] = array(
    '#title' => t('blog', '内容'),
    '#type' => 'textarea',
    '#default_value' => $one->body,
    '#attributes' => array(
      'cols' => 80,
      'rows' => 20,
      'id' => 'body'
    ),
  );
  
  // filter_form_field 函数会返回当前用户允许的输入格式列表
  $form['fields']['format'] = filter_form_field((isset($one->format) ? $one->format : 2));
  
  // 调用一个字段组
  field_get_node_form('one', 'my_field', $one, $form, 0);
  
  $form['fields']['submit'] = array(
    '#type' => 'submit',
    '#submit' => 'one_node_form_submit', // 提交时回调函数
    '#weight' => 100
  );
  //$form['fields']['seo'] = dd_get_form_meta('','','');
  //serialize($v['seo']);
  //dd_set_meta($seo);
  
  dd_get_baidueditor('body', array(
    'toolbar' => 'full', // 编辑器按钮，可选参数:full small
    'upload_image' => 1, // 是否允许上传图片
    'height' => 300, // 高度
		'swfupload' => 1,
  ));
  
  return $form;
}

/**
 * 验证函数
 * @param $form
 *  上面定义的表单
 * @param $v
 *  用户输入的参数，即 $_POST
 */
function one_node_form_validate($form, $v){
  // 下面回调字段验证函数，必须正确指定模块名称和字段组名字
  // 必须传递一个对象
  //$value = (object) $v;
  // $one 如果单页面在编辑状态，应该有 $one
  // 返回错误信息 或 flase
  //$error = field_get_node_validate('one', 'my_field', $value, $one);
    

  //return $error;
}

// 表单提交回调函数
function one_node_form_submit($form, $v){
	$f = file_save_upload($_FILES['litpic']);
	$v['fid'] = $f->fid;
	one_save($v);
}
