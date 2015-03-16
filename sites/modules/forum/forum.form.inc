<?php
// $Id$

function forum_node_form($term = NULL, $node = NULL) {
  
  if (!$term->tid && $node->tid) {
    if ($node->term) {
      $term = $node->term;
    } else {
      $term = forum_term_load($node->tid);
    }
  }
  
  if (!$term->tid) {
    return;
  }
  
  $breadcrumb = array(
    l(t('forum', '论坛'), 'forum'),
    l($term->parent->name, 'forum/'.$term->pid),
    l($term->name, 'forum/'.$term->tid),
  );
  
  if (!isset($node->fid)) {
    $breadcrumb[] = t('forum', '发布新主题');
    dd_set_title(array(t('forum', '发布新主题'), $term->name, $term->parent->name, t('forum', '论坛')));
  } else {
    $breadcrumb[] = l($node->title, 'forum/node/'.$node->fid);
    $breadcrumb[] = t('forum', '编辑');
    dd_set_title(array(t('forum', '编辑'), $term->name, $term->parent->name, t('forum', '论坛')));
  }
  
  dd_set_breadcrumb($breadcrumb);
  dd_add_css(dd_get_path('module', 'forum').'/forum.css');
  
  $form['fields']['title'] = array(
    '#type' => 'textfield',
    '#title' => t('forum', '标题'),
    '#default_value' => $node->title,
    '#required' => 1,
    '#weight' => -100,
    '#attributes' => array(
      'class' => '{rangelength: [1, 250]}'
    ),
  );
	$terms = forum_get_cache_term(NULL, true);
	foreach($terms as $key=>$val){
		$option[$key] = $val->name;
	}
	if ($node->fid) {
		$form['fields']['tid'] = array(
			'#title' => t('tid', '板块'),
			'#type' => 'select',
			'#default_value' => $node->tid,
			'#options' => $option,
			'#weight' => -99,
		);  
	}else{
	  $form['fields']['tid'] = array(
			'#type' => 'hidden',
			'#default_value' => isset($node->tid) ? $node->tid : $term->tid,
			'#constant' => 1
		);
	}
  $form['fields']['body'] = array(
    '#type' => 'textarea',
    '#title' => t('comment', '内容'),
    '#weight' => -70,
    '#default_value' => $node->body,
    //'#required' => 1,
    '#attributes' => array(
      'class' => '{rangelength: [1, 500000]}'
    ),
  );

  dd_get_editor('forum_node_form_type_body', array(
    'toolbar' => 'small',
    'upload_image' => 1,
		'swfupload' => 1,
    'height' => 300,
  ));
  
  
  $form['fields']['format'] = filter_form_field($node->format, 1);
  
  $form['fields']['button'] = array(
    '#type' => 'submit',
    '#weight' => 100,
    '#submit' => 'forum_node_form_submit'
  );
  
  $form['settings'] = array(
    '#ajax_validate' => 1,
    '#values_object' => 1,
    '#validate' => array('forum_node_form_validate'),
  );
  $form['fields']['fid'] = array(
    '#type' => 'hidden',
    '#default_value' => $node->fid,
    '#constant' => 1
  );
  $form['fields']['status'] = array(
    '#type' => 'hidden',
    '#default_value' => isset($node->status) ? $node->status : 1,
    '#constant' => 1
  );
  return $form;
}

function forum_node_form_validate(&$form, &$v) {
  
  if (mb_strlen($v['title']) > 250) {
    $t['title']['#error'][] = t('forum', '长度不超过 %length 字符', array('%length' => 250));
  }
  
  return $t;
}

function forum_node_form_submit(&$form, &$v) {
  if (forum_node_save($v['_dida_values'])) {
    if (!isset($form['settings']['#redirect'])) {
      if ($v['fid']) {
        $form['settings']['#redirect'] = url('forum/node/'. $v['fid']);
      } else {
        $form['settings']['#redirect'] = url('forum/'. $v['_dida_values']->tid);
      }
    }
  }
}