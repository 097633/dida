<?php
// $Id$

/**
 * 论坛设置
 */
function forum_admin_settings() {
  
  dd_set_breadcrumb(array(l(t('forum', '论坛设置'), 'admin/forum/settings')));
  return $form; 
}

function forum_admin_settings_validate($form, $v) {
  if (!is_numeric($v['og']['name_max'])) {
    $t['og']['name_max']['#error'][] = t('og', '只能是数字');
  } else if (!is_numeric($v['og']['des_max'])) {
    $t['og']['des_max']['#error'][] = t('og', '只能是数字');
  } else if ($v['og']['role_limit']) {
    foreach ($v['og']['role_limit'] as $rid => $value) {
      if ($value && !is_numeric($value)) {
        $t['og']['role_limit'][$rid]['#error'][] = t('og', '只能是数字');
      }
    }
  }
  return $t;
}

function forum_admin_settings_submit($form, $v) {
  var_set('forum', $v['forum']);
}

/**
 * 版块管理
 */
function forum_admin_term() {
  
  if ($_GET['op'] == 'delete' && $_GET['id']) {
    if (forum_term_delete($_GET['id'])) {
      dd_set_message(t('forum', '删除成功'));
      dd_goto('admin/forum/term');
    }
  }
  
  dd_set_tabs(array(
    l(t('forum', '论坛版块'), 'admin/forum/term'),
    l(t('forum', '添加版块'), 'admin/forum/term/add'),
    l(t('forum', '添加分区'), 'admin/forum/term/parent'),
  ));
  
  $header = array(
    t('forum', '版块名称'),
    t('forum', '主题'),
    t('forum', '回复'),
    t('forum', '版主'),
    t('forum', '操作')
  );
  
  if ($fetch = db_query('SELECT * FROM {forum_term} WHERE pid > 0 ORDER BY pid ASC, weight ASC')) {
    $terms = var_get('forum_term_parent');
    
    $pid = 0;
    
    foreach ($fetch as $o) {
      
      if ($pid != $o->pid) {
        $pid = $o->pid;
        
        $table[] = array(
          'data' => array(
            array('data' => $terms[$o->pid], 'colspan' => 4, 'class' => 'forum_admin_term_parent_name'),
            dd_imp(array(
              l(t('forum', '编辑'), 'admin/forum/term/edit/'.$o->pid), 
              l(t('forum', '删除'), 'admin/forum/term', array(
                'query' => 'op=delete&id='.$o->pid,
                'attributes' => array(
                  'class' => 'confirm',
                  'alt' => t('forum', '此操作不可恢复，子版块以及版块内的主题回帖都将被删除！')
                )
              ))
            ))
          ),
          'class' => 'forum_admin_term_parent'
        );
        
        unset($terms[$o->pid]);
      }
      
      $data = unserialize($o->data);
      
      $admins = '';
      
      if ($data['admins']) {
        foreach ($data['admins'] as $u) {
          $admins .= theme('username', $u); 
        }
      }
      
      $table[] = array(
        l($o->name, 'forum/'.$o->tid),
        
        $o->node_count, $o->comment_count,
        
        $admins,
        //$admins .'('.l(t('forum', '管理'), 'admin/forum/admin/add/'.$o->tid).')',
        
        dd_imp(array(
          l(t('forum', '编辑'), 'admin/forum/term/edit/'.$o->tid),
          l(t('forum', '删除'), 'admin/forum/term', array(
            'query' => 'op=delete&id='.$o->tid,
            'attributes' => array(
              'class' => 'confirm',
              'alt' => t('forum', '此操作不可恢复，版块内的主题及回帖都将被删除！')
            )
          ))
        ))
        
      );
    }
    
    if ($terms) {
      foreach ($terms as $tid => $name) {
        $table[] = array(
          'data' => array(
            array('data' => $name, 'colspan' => 4, 'class' => 'forum_admin_term_parent_name'),
            dd_imp(array(
              l(t('forum', '编辑'), 'admin/forum/term/edit/'.$tid), 
              l(t('forum', '删除'), 'admin/forum/term', array(
                'query' => 'op=delete&id='.$tid,
                'attributes' => array(
                  'class' => 'confirm',
                  'alt' => t('forum', '此操作不可恢复，子版块以及版块内的主题回帖都将被删除！')
                )
              ))
            ))
          ),
          'class' => 'forum_admin_term_parent'
        );
      }
    }
    
    $output = theme('table', $header, $table, array('class' => 'center_table forum_admin_term'));
    $output .= pager_view();
    
  }
  
  dd_add_css(dd_get_path('module', 'forum').'/forum.admin.css');
  return $output;
}

/**
 * 版块、分区表单
 * @param (object) $o
 *  版块对象
 * @param (string) $op
 *  term：添加版块，parent：添加分区，若 $o->pid 有值，则 $o->pid == 0 为分区
 */
function forum_admin_term_form($o = NULL, $op = 'term') {
  
  if (isset($o->pid)) {
    $op = $o->pid > 0 ? 'term' : 'parent';
  }
  
  dd_set_tabs(array(
    l(t('forum', '论坛版块'), 'admin/forum/term'),
    l(t('forum', '添加版块'), 'admin/forum/term/add'),
    l(t('forum', '添加专区'), 'admin/forum/term/parent'),
  ));
  
  $form['fields']['tid'] = array(
    '#type' => 'hidden',
    '#default_value' => $o->tid,
    '#constant' => 1
  );
  
  if ($op == 'term') {
    if (!$options = var_get('forum_term_parent')) {
      dd_set_message(t('forum', '请先添加一个分区'));
      dd_goto('admin/forum/term/parent');
    }
    
    $form['fields']['pid'] = array(
      '#type' => 'select',
      '#title' => t('forum', '分区'),
      '#required' => 1,
      '#weight' => -100,
      '#options' => $options,
      '#default_value' => $o->pid
    );
    
    $form['fields']['data']['logo'] = array(
      '#type' => 'textfield',
      '#title' => t('forum', '图标'),
      '#description' => t('forum', '版块标志，站内、站外链接均可'),
      '#default_value' => $o->data['logo']
    );
    
    $form['fields']['data']['_logo'] = array(
      '#type' => 'file',
      '#title' => t('forum', '上传'),
      '#description' => t('forum', '或上传图标，图片格式：jpg、png、gif，最佳比例：1:1'),
    );
    
    $form['fields']['data']['__logo'] = array(
      '#type' => 'hidden',
      '#default_value' => $o->data['__logo'],
      '#constant' => 1
    );
    
    $form['fields']['data']['admins_first'] = array(
      '#type' => 'textfield',
      '#title' => t('forum', '版主'),
      '#description' => t('forum', '输入用户昵称'),
      '#default_value' => $o->data['admins_first'],
      '#attributes' => array('class' => 'ui_field_autocomplete'),
      '#autocomplete' => array(
        'url' => url('ajax', array('query' => 'op=auto&module=user')),
        'dom' => '.ui_field_autocomplete',
        'range' => true
      ),  
    );
    
    $form['fields']['data']['access'] = array(
      '#fieldset_prefix' => 'asc',
      '#fieldset_legend' => t('forum', '主题权限'),
      '#fieldset_suffix' => 1,
      '#description' => t('forum', '只有私密版块才能设置权限'),
    );
    $roles = user_roles_opt();
    $form['fields']['data']['access']['view'] = array(
      '#type' => 'checkbox',
      '#title' => t('forum', '浏览'),
      '#default_value' => $o->data['access']['view'],
      '#options' => $roles
    );
    $form['fields']['data']['access']['create'] = array(
      '#type' => 'checkbox',
      '#title' => t('forum', '发布'),
      '#default_value' => $o->data['access']['create'],
      '#options' => $roles
    );
    
    $form['fields']['data']['body'] = array(
      '#type' => 'textarea',
      '#title' => t('forum', '版规'),
      '#weight' => 10,
      '#attributes' => array('cols' => 60, 'rows' => 10),
      '#default_value' => $o->data['body'],
      '#description' => t('forum', '支持 HTML')
    );
  }
  
  $form['fields']['name'] = array(
    '#type' => 'textfield',
    '#title' => t('forum', '名称'),
    '#required' => 1,
    '#weight' => -90,
    '#default_value' => $o->name
  );
  
  $form['fields']['type'] = array(
    '#type' => 'select',
    '#title' => t('forum', '类型'),
    '#required' => 1,
    '#weight' => -80,
    '#default_value' => $o->type,
    '#options' => forum_get_term_types()
  );
  
  $form['fields']['weight'] = array(
    '#type' => 'weight',
    '#title' => t('forum', '排序'),
    '#required' => 1,
    '#start' => -30,
    '#end' => 30,
    '#weight' => -70,
    '#default_value' => $o->weight
  );
  $form['fields']['data']['description'] = array(
    '#type' => 'textarea',
    '#title' => t('forum', '简介'),
    '#attributes' => array('cols' => 60, 'rows' => 4),
    '#default_value' => $o->data['description'],
    '#description' => t('forum', '支持 HTML')
  );
  
  $form['fields']['button']['#type'] = 'submit';
  $form['settings'] = array(
    '#ajax_validate' => 1,
    '#values_object' => 1,
    '#validate' => array('forum_admin_term_form_validate'),
  );
  return $form;
}

function forum_admin_term_form_validate(&$form, &$v) {
  
  unset($v['_dida_values']->data['_logo']);
  if ($data = _file_get_array_data($_FILES['data'])) {
    if ($data['_logo'] && $file = file_save_upload($data['_logo'], 
    array('no_insert' => 1, 'savepath' => 'forum/logo', 'image' => 1))) {
      if ($v['_dida_values']->data['__logo']) {
        @unlink($v['_dida_values']->data['__logo']);
      }
      $v['_dida_values']->data['__logo'] = $v['_dida_values']->data['logo'] = $v['_dida_values']->data['_logo'] = $file->filepath;
    }
  }
  
  if (!$t = forum_term_validate($v['_dida_values'])) {
    if (forum_term_save($v['_dida_values'])) {
      dd_set_message(t('forum', '操作成功'));
      if (!isset($form['settings']['#redirect'])) {
        $form['settings']['#redirect'] = url('admin/forum/term');
      }
    }
  } else {
    if ($v['_dida_values']->data['_logo']) {
      @unlink($v['_dida_values']->data['_logo']);
    }
  }
  
  return $t;
}

/**
 * 回复管理
 */
function forum_admin_reply() {
  
}

/**
 * 主题管理
 */
function forum_admin_node() {
  
}