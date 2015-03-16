<?php
// $Id: sina_open.admin.inc,v 1.3 2010/09/16 08:40:43 eastcn Exp $

/**
 * 管理设置
 */
function oauth_admin_settings(){
  
  dd_set_tabs(array(
    l(t('oauth', '开发平台设置'), 'admin/oauth/settings'),
    l(t('oauth', '开发平台用户'), 'admin/oauth/users')
  ));
  
  $form['fields']['oauth']['is_login'] = array(
    '#type' => 'radio',
    '#title' => t('oauth', '允许使用开放平台帐号登录'),
    '#default_value' => var_get_key('oauth', 'is_login', 0),
    '#options' => array(t('oauth', '不允许'), t('oauth', '允许')),
    '#required' => 1,
    '#description' => t('oauth', '将自动创建一个新用户')
  );
  
  $form['fields']['oauth']['sina_oauth_consumer_key'] = array(
    '#type' => 'textfield',
    '#title' => t('oauth', '新浪微博 App Key'),
    '#default_value' => var_get_key('oauth', 'sina_oauth_consumer_key', NULL),
    '#required' => 1,
    '#description' => t('oauth', '你可以到 http://open.t.sina.com.cn/wiki/index.php 申请.')
  );
  
  $form['fields']['oauth']['sina_oauth_consumer_secret'] = array(
    '#type' => 'textfield',
    '#title' => t('oauth', '新浪微博 APP Secret'),
    '#default_value' => var_get_key('oauth', 'sina_oauth_consumer_secret', NULL),
    '#required' => 1,
  );

  $form['fields']['oauth']['renren_oauth_consumer_key'] = array(
    '#type' => 'textfield',
    '#title' => t('oauth', '人人 API key'),
    '#default_value' => var_get_key('oauth', 'renren_oauth_consumer_key', NULL),
    '#required' => 1,
    '#description' => t('oauth', '你可以到 http://app.renren.com/developers/createapp 申请.')
  );
  
  $form['fields']['oauth']['renren_oauth_consumer_secret'] = array(
    '#type' => 'textfield',
    '#title' => t('oauth', '人人 API Secret'),
    '#default_value' => var_get_key('oauth', 'renren_oauth_consumer_secret', NULL),
    '#required' => 1,
  );
  
  $form['fields']['oauth']['renren_oauth_consumer_redirect_uri'] = array(
    '#type' => 'textfield',
    '#title' => t('oauth', '重定向网址'),
    '#default_value' => var_get_key('oauth', 'renren_oauth_consumer_redirect_uri', NULL),
    '#required' => 1,
    '#description' => t('oauth', '重定向网址')
  );

  $form['fields']['oauth']['qq_oauth_consumer_key'] = array(
    '#type' => 'textfield',
    '#title' => t('oauth', 'qq Appid'),
    '#default_value' => var_get_key('oauth', 'qq_oauth_consumer_key', NULL),
    '#required' => 1,
    '#description' => t('oauth', '你可以到http://connect.opensns.qq.com/apply申请.')
  );
  
  $form['fields']['oauth']['qq_oauth_consumer_secret'] = array(
    '#type' => 'textfield',
    '#title' => t('oauth', 'qq Appkey'),
    '#default_value' => var_get_key('oauth', 'qq_oauth_consumer_secret', NULL),
    '#required' => 1,
  );
  
 // if ($infos = module_invoke_all('comment_info')) {
 //   foreach ($infos as $key => $info) {
 //     $form['fields']['sina_open']['comment_'.$key] = array(
 //       '#title' => t('sina_open', '在 [%name] 中启用', array('%name' => $key . $info['name'])),
 //       '#default_value' => var_get_key('sina_open', 'comment_'.$key, 1),
 //       '#type' => 'radio',
 //       '#options' => array(t('sina_open', '不启用'), t('sina_open', '启用')),
 //     );
 //   }
 // }
  
  return system_setting_form($form);
}

/**
 * 绑定了新浪微博帐号或通过新浪微博帐号注册的用户
 */
function oauth_admin_users() {
  
  dd_set_tabs(array(
    l(t('oauth', '开放平台设置'), 'admin/oauth/settings'),
    l(t('oauth', '开放平台用户'), 'admin/oauth/users')
  ));
  
  if ($fetch = pager_query('SELECT o.oauth_uid, u.uid, u.name FROM {oauth_user} o
  INNER JOIN {users} u ON o.uid = u.uid ORDER BY u.uid DESC', 50)) {

    foreach ($fetch as $o) {
      $table[] = array(
        theme('username', $o),
       // l(t('oauth', '解除绑定'), 'admin/oauth/users', array(
       //   'query' => 'op=remove&uid='.$o->uid,
       //   'attributes' => array('class' => 'confirmajax')
       // )),
      );
    }
    
    $output =  theme('table', array(), $table);
    //$output .= theme('pager');
    
  } else {
    $output = system_no_content(t('oauth', '没有数据'));
  }
  
  return $output;
}
