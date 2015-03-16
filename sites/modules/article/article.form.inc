<?php
// $Id$
function article_node_form($article = NULL){
	dd_set_cookie('redirect',dd_get_history());

	if($article->nid != '' && user_access('article add') && $article->uid != $GLOBALS['user']->uid && !user_access('article admin')){
		dd_get_access();
	}
  /**
   * 表单与drupal略有不同
   * $form['settings'] 下是是表单的一些参数
   * $form['fields'] 则为表单字段
   */
  $tuijian = array(''=>'请选择','s'=>'首页推荐','p'=>'频道推荐','t'=>'头条推荐');
  $form['settings'] = array(
    '#ajax_validate' => 1, // 是否ajax验证基本内容，即非必填内容等
    '#validate' => array('article_node_form_validate'), // 调用验证函数
    '#redirect' => url('admin/article'), // 提交成功后跳转地址
  );
  $form['fields']['nid'] = array(
    '#type' => 'hidden',
    '#default_value' => $article->nid,
    '#constant' => 1
  );  
	$form['fields']['created'] = array(
    '#type' => 'hidden',
    '#default_value' => $article->created,
    '#constant' => 1
  );  
  $form['fields']['title'] = array(
    '#title' => t('article', '标题'),
    '#type' => 'textfield',
    '#default_value' => $article->title,
    '#required' => 1,
    '#weight' => -10,
    '#attributes' => array('size' => 100)
  );
  $form['fields']['flag'] = array(
    '#title' => t('flag', '推荐位'),
    '#type' => 'select',
    '#default_value' => $article->flag,
    '#options' => $tuijian,
    '#weight' => 0,
  );  
	$form['fields']['referer'] = array(
    '#title' => t('article', '来源'),
    '#type' => 'textfield',
    '#default_value' => $article->referer,
    '#weight' => 0,
    '#attributes' => array('size' => 100)
  );
  $form['fields']['litpic'] = array(
    '#title' => t('litpic', '缩略图'),
    '#type' => 'file',
		'#description' => isset($article->litpic) ? '<img src="/'.image_get_thumb($article->nid,$article->litpic,'60x60','scale_and_crop').'" /><a href="/files/'.$article->fid.'/delete" class="confirmajax" level="parent" target="_blank">删除</a>' : '',
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
  $form['fields']['description'] = array(
    '#title' => t('descripiton', '摘要'),
    '#type' => 'textarea',
    '#default_value' => $article->description,
    '#attributes' => array(
      'cols' => 100,
      'rows' => 5,
      'id' => 'description'
    ),
  );
  $form['fields']['body'] = array(
    '#title' => t('blog', '内容'),
    '#type' => 'textarea',
    '#default_value' => $article->body,
    '#attributes' => array(
      'cols' => 80,
      'rows' => 20,
      'id' => 'body'
    ),
  );
  
  // filter_form_field 函数会返回当前用户允许的输入格式列表
  $form['fields']['format'] = filter_form_field((isset($article->format) ? $article->format : 2));
  
  // 调用一个字段组
  field_get_node_form('article', 'my_field', $article, $form, 0);
  
  $form['fields']['submit'] = array(
    '#type' => 'submit',
    '#submit' => 'article_node_form_submit', // 提交时回调函数
    '#weight' => 100
  );
  //$form['fields']['seo'] = dd_get_form_meta('','','');
  //serialize($v['seo']);
  //dd_set_meta($seo);
  $form['fields']['status'] = array(
    '#type' => 'radio',
    '#title' => '立即发布',
    '#default_value' => $article->status,
    '#options' => array('否', '是'),
  );
  dd_get_baidueditor('body', array(
    'toolbar' => 'full', // 编辑器按钮，可选参数:full small
    'upload_image' => 1, // 是否允许上传图片
    'height' => 300, // 高度
		'swfupload' => 1,
  ));
  dd_add_js(array('uidata' => array(array(
    'dom' => '#article_node_form_type_timestamp',
    //'showTime' => true,
    'changeYear' => true,
    'changeMonth' => true
  ))), 'setting');

  return $form;
}

/**
 * 验证函数
 * @param $form
 *  上面定义的表单
 * @param $v
 *  用户输入的参数，即 $_POST
 */
function article_node_form_validate($form, $v){
  // 下面回调字段验证函数，必须正确指定模块名称和字段组名字
  // 必须传递一个对象
  //$value = (object) $v;
  // $article 如果文章在编辑状态，应该有 $article
  // 返回错误信息 或 flase
  //$error = field_get_node_validate('article', 'my_field', $value, $article);
    

  //return $error;
}

// 表单提交回调函数
function article_node_form_submit($form, $v){
	$f = file_save_upload($_FILES['litpic']);
	$v['fid'] = $f->fid;
	$validate['no_insert'] = 1;
	$validate['savepath'] = 'article';
	$validate['watermark'] = 1;
	if(strpos($v['body'], 'http://mmbiz.qpic.cn') != ''){
		$v['body'] = preg_replace('/http:\/\/mmbiz.qpic.cn(.*?)\/0/i', "http://mmbiz.qpic.cn$1/0.jpg", $v['body']);
	}
	$v['body'] = file_down_image($v['body'], $validate);
	article_save($v);
}
