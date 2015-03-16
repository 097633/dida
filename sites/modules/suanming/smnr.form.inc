<?php
// $Id$
function smnr_node_form($smnr = NULL){
	/**
	 * 表单与drupal略有不同
	 * $form['settings'] 下是是表单的一些参数
	 * $form['fields'] 则为表单字段
	 */
	if(arg(0) == 'admin'){
		$redirect = '/admin/smnr';
	}else{
		$redirect = '/user';
	}
	dd_set_cookie('redirect',dd_get_history());
	$tuijian = array(''=>'请选择','s'=>'首页推荐','p'=>'频道推荐');
	$form['settings'] = array(
		'#ajax_validate' => 1, // 是否ajax验证基本内容，即非必填内容等
		'#redirect' => $redirect,
		'#validate' => array('smnr_node_form_validate'), // 调用验证函数
	);
	$form['fields']['nid'] = array(
		'#type' => 'hidden',
		'#default_value' => $smnr->nid,
		'#constant' => 1
	);  
	$form['fields']['title'] = array(
		'#title' => t('smnr', '算命歇语'),
		'#type' => 'textfield',
		'#default_value' => $smnr->title,
		'#required' => 1,
		'#weight' => -10,
		'#attributes' => array('size' => 100)
	);
	$form['fields']['jixiong'] = array(
    '#title' => t('jixiong', '吉凶'),
    '#type' => 'select',
    '#default_value' => $smnr->jixiong,
    '#options' => array('大吉' => '大吉', '吉' => '吉', '中' => '中', '凶' => '凶', '大凶' => '大凶'),
    '#weight' => 0,
  );  
	$form['fields']['fenlei'] = array(
    '#title' => t('fenlei', '分类'),
    '#type' => 'select',
    '#default_value' => $smnr->fenlei,
    '#options' => array('家庭' => '家庭','事业' => '事业','爱情' => '爱情','运势' => '运势','财运' => '财运','升迁' => '升迁','考试' => '考试','健康' => '健康','远行' => '远行','诉讼' => '诉讼','失物' => '失物'),
    '#weight' => 0,
  );  
	$form['fields']['body'] = array(
		'#title' => t('blog', '内容详情'),
		'#type' => 'textarea',
		'#default_value' => $smnr->body,
		'#attributes' => array(
			'cols' => 80,
			'rows' => 20,
			'id' => 'body'
		),
	);
	
	$form['fields']['submit'] = array(
		'#type' => 'submit',
		'#submit' => 'smnr_node_form_submit', // 提交时回调函数
		'#weight' => 100
	);
	
	dd_get_baidueditor('body', array(
		'toolbar' => 'small', // 编辑器按钮，可选参数:full small
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
function smnr_node_form_validate($form, $v){
  // 下面回调字段验证函数，必须正确指定模块名称和字段组名字
  // 必须传递一个对象
  //$value = (object) $v;
  // $smnr 如果算命在编辑状态，应该有 $smnr
  // 返回错误信息 或 flase
  //$error = field_get_node_validate('smnr', 'my_field', $value, $smnr);
    

  //return $error;
}

// 表单提交回调函数
function smnr_node_form_submit($form, $v){
	smnr_save($v);
}
