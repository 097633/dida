<?php 
 //$Id: bootstrap.inc 92 2011-03-24 07:12:48Z yd2004 $

$conf = array (
  'admin_custom_links' => '0',
  'alias' => '0',
  'cache_css_and_js' => '0',
  'cache_css_and_js_timestamp' => 1410012093,
  'cache_memcache_host' => 'localhost',
  'cache_memcache_port' => '11211',
  'cache_memcache_prefix' => 'wwwxingzuocom',
  'clean_url' => '1',
  'cron_last_time' => 1400868213,
  'cron_min_time' => '3600',
  'cron_pass' => '',
  'crypt_default_key' => 'xingzuo',
  'custom_view' => '0',
  'dd_cache_file' => '/includes/cache/cache.memcache.inc',
  'debug' => 1,
  'default_format' => '2',
  'default_language' => 'zh-hans',
  'default_theme' => 'exo',
  'field_count' => 
  array (
    'articlemy_field' => 1,
    'userfield' => 1,
    'linkmy_field' => 1,
  ),
  'field_data' => 
  array (
    1 => 
    (object)(array(
       'field_id' => '1',
       'field_type' => 'select',
       'field_key' => 'lanmu',
       'field_func' => '',
       'type' => 'my_field',
       'module' => 'article',
       'name' => '栏目分类',
       'weight' => '0',
       'required' => '1',
       'access' => NULL,
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
    4 => 
    (object)(array(
       'field_id' => '4',
       'field_type' => 'tags',
       'field_key' => 'tags',
       'field_func' => '',
       'type' => 'my_field',
       'module' => 'article',
       'name' => 'tags',
       'weight' => '0',
       'required' => '0',
       'access' => NULL,
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
        'validate' => 
        array (
          'autocomplete' => '1',
          'maxsize' => '',
          'minsize' => '',
          'type' => '0',
          'settings' => 
          array (
            'custom_ok' => 
            array (
              'values' => '',
            ),
            'custom_not' => 
            array (
              'values' => '',
            ),
          ),
        ),
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
    5 => 
    (object)(array(
       'field_id' => '5',
       'field_type' => 'file',
       'field_key' => 'litpic',
       'field_func' => '',
       'type' => 'field',
       'module' => 'user',
       'name' => '头像',
       'weight' => '0',
       'required' => '0',
       'access' => 
      array (
      ),
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
        'access' => 
        array (
          'input' => 
          array (
            1 => '1',
            2 => '2',
          ),
          'display' => '0',
        ),
        'multi' => '1',
        'filetype' => '',
        'filesize' => '',
        'filename' => '',
        'extension' => '',
        'thumbs' => 
        array (
          'thumb' => '85x85',
          'medium' => '200x200',
        ),
        'savepath' => '',
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
    21 => 
    (object)(array(
       'field_id' => '21',
       'field_type' => 'tags',
       'field_key' => 'tags',
       'field_func' => '',
       'type' => 'field',
       'module' => 'user',
       'name' => '标签',
       'weight' => '0',
       'required' => '0',
       'access' => 
      array (
      ),
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
        'access' => 
        array (
          'input' => 
          array (
            2 => '2',
          ),
        ),
        'validate' => 
        array (
          'maxsize' => '',
          'minsize' => '',
          'type' => '0',
          'settings' => 
          array (
            'custom_ok' => 
            array (
              'values' => '',
            ),
            'custom_not' => 
            array (
              'values' => '',
            ),
          ),
        ),
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
    27 => 
    (object)(array(
       'field_id' => '27',
       'field_type' => 'textfield',
       'field_key' => 'tsina',
       'field_func' => '',
       'type' => 'field',
       'module' => 'user',
       'name' => '新浪微博',
       'weight' => '0',
       'required' => '0',
       'access' => 
      array (
      ),
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
        'validate' => 
        array (
          'maxsize' => '',
          'minsize' => '',
          'type' => '0',
          'settings' => 
          array (
            'date' => 
            array (
              'value_type' => 'yy-mm-dd',
              'datepicker' => '1',
              'yearRange' => '',
              'maxDate' => '',
              'minDate' => '',
              'start_or_end' => '0',
              'field_key' => '',
            ),
            'date_time' => 
            array (
              'value_type' => 'yy-mm-dd',
              'datepicker' => '1',
              'yearRange' => '',
              'maxDate' => '',
              'minDate' => '',
              'start_or_end' => '0',
              'field_key' => '',
            ),
            'custom_ok' => 
            array (
              'values' => '',
            ),
            'custom_not' => 
            array (
              'values' => '',
            ),
          ),
        ),
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
    28 => 
    (object)(array(
       'field_id' => '28',
       'field_type' => 'textfield',
       'field_key' => 'tqq',
       'field_func' => '',
       'type' => 'field',
       'module' => 'user',
       'name' => '腾讯微博',
       'weight' => '0',
       'required' => '0',
       'access' => 
      array (
      ),
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
        'validate' => 
        array (
          'maxsize' => '',
          'minsize' => '',
          'type' => '0',
          'settings' => 
          array (
            'date' => 
            array (
              'value_type' => 'yy-mm-dd',
              'datepicker' => '1',
              'yearRange' => '',
              'maxDate' => '',
              'minDate' => '',
              'start_or_end' => '0',
              'field_key' => '',
            ),
            'date_time' => 
            array (
              'value_type' => 'yy-mm-dd',
              'datepicker' => '1',
              'yearRange' => '',
              'maxDate' => '',
              'minDate' => '',
              'start_or_end' => '0',
              'field_key' => '',
            ),
            'custom_ok' => 
            array (
              'values' => '',
            ),
            'custom_not' => 
            array (
              'values' => '',
            ),
          ),
        ),
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
    30 => 
    (object)(array(
       'field_id' => '30',
       'field_type' => 'select',
       'field_key' => 'flag',
       'field_func' => '',
       'type' => 'field',
       'module' => 'user',
       'name' => '推荐',
       'weight' => '0',
       'required' => '0',
       'access' => 
      array (
      ),
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
        'access' => 
        array (
          'input' => 
          array (
            3 => '3',
          ),
          'display' => '0',
        ),
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
    36 => 
    (object)(array(
       'field_id' => '36',
       'field_type' => 'select',
       'field_key' => 'weight',
       'field_func' => '',
       'type' => 'field',
       'module' => 'user',
       'name' => '排序',
       'weight' => '0',
       'required' => '0',
       'access' => 
      array (
      ),
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
        'access' => 
        array (
          'input' => 
          array (
            3 => '3',
          ),
          'display' => '0',
        ),
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
    37 => 
    (object)(array(
       'field_id' => '37',
       'field_type' => 'select',
       'field_key' => 'lanmu',
       'field_func' => '',
       'type' => 'my_field',
       'module' => 'link',
       'name' => '链接分类',
       'weight' => '0',
       'required' => '1',
       'access' => 
      array (
      ),
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
    34 => 
    (object)(array(
       'field_id' => '34',
       'field_type' => 'textfield',
       'field_key' => 'gongsi',
       'field_func' => '',
       'type' => 'field',
       'module' => 'user',
       'name' => '公司',
       'weight' => '1',
       'required' => '0',
       'access' => 
      array (
      ),
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
        'validate' => 
        array (
          'maxsize' => '',
          'minsize' => '',
          'type' => '0',
          'settings' => 
          array (
            'date' => 
            array (
              'value_type' => 'yy-mm-dd',
              'datepicker' => '1',
              'yearRange' => '',
              'maxDate' => '',
              'minDate' => '',
              'start_or_end' => '0',
              'field_key' => '',
            ),
            'date_time' => 
            array (
              'value_type' => 'yy-mm-dd',
              'datepicker' => '1',
              'yearRange' => '',
              'maxDate' => '',
              'minDate' => '',
              'start_or_end' => '0',
              'field_key' => '',
            ),
            'custom_ok' => 
            array (
              'values' => '',
            ),
            'custom_not' => 
            array (
              'values' => '',
            ),
          ),
        ),
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
    20 => 
    (object)(array(
       'field_id' => '20',
       'field_type' => 'textfield',
       'field_key' => 'zhiwei',
       'field_func' => '',
       'type' => 'field',
       'module' => 'user',
       'name' => '职位',
       'weight' => '2',
       'required' => '0',
       'access' => 
      array (
      ),
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
        'access' => 
        array (
          'input' => 
          array (
            2 => '2',
          ),
        ),
        'validate' => 
        array (
          'maxsize' => '',
          'minsize' => '',
          'type' => '0',
          'settings' => 
          array (
            'date' => 
            array (
              'value_type' => 'yy-mm-dd',
              'datepicker' => '1',
              'yearRange' => '',
              'maxDate' => '',
              'minDate' => '',
              'start_or_end' => '0',
              'field_key' => '',
            ),
            'date_time' => 
            array (
              'value_type' => 'yy-mm-dd',
              'datepicker' => '1',
              'yearRange' => '',
              'maxDate' => '',
              'minDate' => '',
              'start_or_end' => '0',
              'field_key' => '',
            ),
            'custom_ok' => 
            array (
              'values' => '',
            ),
            'custom_not' => 
            array (
              'values' => '',
            ),
          ),
        ),
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
    29 => 
    (object)(array(
       'field_id' => '29',
       'field_type' => 'textarea',
       'field_key' => 'jieshao',
       'field_func' => '',
       'type' => 'field',
       'module' => 'user',
       'name' => '个人介绍',
       'weight' => '17',
       'required' => '0',
       'access' => 
      array (
      ),
       'deleted' => '1',
       'locked' => '0',
       'data' => 
      array (
        'input_description' => '',
        'description' => '',
        'format' => '2',
        'validate' => 
        array (
          'maxsize' => '',
          'minsize' => '',
        ),
      ),
       'groups' => '',
       'field_module' => 'field',
    )),
  ),
  'field_term_children' => 
  array (
    1 => 1,
  ),
  'file_directory_path' => 'sites/files',
  'file_image_quality' => '100',
  'file_image_watermark' => 
  array (
    'default' => '0',
    'file' => '0',
    'garble' => '0',
    'garble_file' => '0',
    'min_width' => '150',
    'min_height' => '150',
  ),
  'file_upload_rename' => '0',
  'file_user_directory' => 'user-[uid]/[date_Y]-[date_m]',
  'filters' => 
  array (
    2 => 
    array (
      0 => 
      array (
        'filter' => '1',
        'format' => '2',
        'delta' => '0',
        'module' => 'comment',
      ),
      1 => 
      array (
        'filter' => '1',
        'format' => '2',
        'delta' => '1',
        'module' => 'system',
      ),
      2 => 
      array (
        'filter' => '1',
        'format' => '2',
        'delta' => 'smiley',
        'module' => 'system',
      ),
      3 => 
      array (
        'filter' => '1',
        'format' => '2',
        'delta' => 'br',
        'module' => 'system',
      ),
    ),
  ),
  'filter_cache' => '0',
  'filter_system_type_1' => NULL,
  'format' => 
  array (
    '' => 
    array (
      0 => 
      array (
        'format' => '1',
        'name' => '纯文本',
        'description' => '不允许任何 HTML 标签，仅将换行符转换为 <br />',
        'delta' => '0',
        'module' => 'system',
      ),
      1 => 
      array (
        'format' => '3',
        'name' => 'PHP 代码',
        'description' => '将内容解析为 PHP 代码',
        'delta' => '2',
        'module' => 'system',
      ),
      2 => 
      array (
        'format' => '1',
        'name' => '纯文本',
        'description' => '不允许任何 HTML 标签，仅将换行符转换为 <br />',
        'delta' => '1',
        'module' => 'system',
      ),
    ),
  ),
  'formats' => 
  array (
    2 => 
    array (
      'roles' => NULL,
      'format' => '2',
      'name' => '完整 HTML',
      'description' => '允许任何 HTML 标签',
    ),
  ),
  'format_roles' => 
  array (
  ),
  'form_id' => 'system_site_settings',
  'form_token' => 'd53e879b6f935ee46e827e0e11e73d66',
  'front_view_module' => '0',
  'front_view_type' => '0',
  'history_enabled' => '0',
  'history_enabled_limit' => '100000',
  'hook_cache' => 
  array (
    'menu_alter' => false,
    'theme' => 
    array (
      'system' => 'system_theme',
      'user' => 'user_theme',
      'block' => 'block_theme',
      'link' => 'link_theme',
      'guestbook' => 'guestbook_theme',
      'field' => 'field_theme',
      'comment' => 'comment_theme',
      'one' => 'one_theme',
      'article' => 'article_theme',
    ),
    'module_core_module' => 
    array (
      'system' => 'system_module_core_module',
      'oauth' => 'oauth_module_core_module',
    ),
    'form_alter' => 
    array (
      'article' => 'article_form_alter',
    ),
    'form_type_info' => false,
    'template_preprocess_page' => false,
    'site_menu' => 
    array (
      'user' => 'user_site_menu',
      'one' => 'one_site_menu',
      'article' => 'article_site_menu',
    ),
    'system_admin_menus' => 
    array (
      'system' => 'system_system_admin_menus',
      'user' => 'user_system_admin_menus',
      'block' => 'block_system_admin_menus',
      'oauth' => 'oauth_system_admin_menus',
      'link' => 'link_system_admin_menus',
      'guestbook' => 'guestbook_system_admin_menus',
      'comment' => 'comment_system_admin_menus',
      'one' => 'one_system_admin_menus',
      'article' => 'article_system_admin_menus',
    ),
    'alter_admin_menus' => false,
    'field_node_form' => false,
    'field_node_load' => false,
    'field_get_node_access' => 
    array (
      'user' => 'user_field_get_node_access',
    ),
    'field_node_save' => false,
    'article_save' => false,
    'article_load' => 
    array (
      'one' => 'one_article_load',
    ),
    'field_call_term_load' => false,
    'front_view' => false,
    'front_page' => false,
    'user_login_form' => false,
    'field_node_delete' => false,
    'field_call_list' => 
    array (
      'field' => 'field_field_call_list',
    ),
    'field_call_links' => 
    array (
      'field' => 'field_field_call_links',
    ),
    'field_call_term_form' => false,
    'user_center_info' => 
    array (
      'user' => 'user_user_center_info',
    ),
    'user_center_view' => 
    array (
      'user' => 'user_user_center_view',
    ),
    'user_center_default' => 
    array (
      'user' => 'user_user_center_default',
    ),
    'user_load' => 
    array (
      'oauth' => 'oauth_user_load',
    ),
    'user_view' => false,
    'user_page' => 
    array (
      'user' => 'user_user_page',
    ),
    'user_edit_form' => false,
    'system_site_global' => false,
  ),
  'languages' => 
  array (
    'zh-hans' => '简体中文',
    'zh-hant' => '繁體中文',
  ),
  'logs_enabled_limit' => '100000',
  'menu_masks' => 
  array (
    0 => 30,
    1 => 28,
    2 => 15,
    3 => 14,
    4 => 13,
    5 => 7,
    6 => 6,
    7 => 5,
    8 => 4,
    9 => 3,
    10 => 2,
    11 => 1,
  ),
  'modules' => 
  array (
    'system' => 
    array (
      'filename' => 'system',
      'path' => 'modules/system',
      'name' => '系统管理',
      'language' => 'zh-hans',
    ),
    'user' => 
    array (
      'filename' => 'user',
      'path' => 'modules/user',
      'name' => '用户管理',
      'language' => 'zh-hans',
    ),
    'block' => 
    array (
      'filename' => 'block',
      'path' => 'modules/block',
      'name' => '区块',
      'language' => 'zh-hans',
    ),
    'voteapi' => 
    array (
      'filename' => 'voteapi',
      'path' => 'sites/modules/voteapi',
      'name' => 'voteapi',
      'language' => 'zh-hans',
    ),
    'oauth' => 
    array (
      'filename' => 'oauth',
      'path' => 'sites/modules/oauth',
      'name' => '新浪开放平台接口',
      'language' => 'zh-hans',
    ),
    'message' => 
    array (
      'filename' => 'message',
      'path' => 'sites/modules/message',
      'name' => 'message',
      'language' => 'zh-hans',
    ),
    'link' => 
    array (
      'filename' => 'link',
      'path' => 'sites/modules/link',
      'name' => 'link',
      'language' => 'zh-hans',
    ),
    'highcharts' => 
    array (
      'filename' => 'highcharts',
      'path' => 'sites/modules/highcharts',
      'name' => 'High Charts',
      'language' => 'zh-hans',
    ),
    'guestbook' => 
    array (
      'filename' => 'guestbook',
      'path' => 'sites/modules/guestbook',
      'name' => 'guestbook',
      'language' => 'zh-hans',
    ),
    'field' => 
    array (
      'filename' => 'field',
      'path' => 'modules/field',
      'name' => '字段',
      'language' => 'zh-hans',
    ),
    'comment' => 
    array (
      'filename' => 'comment',
      'path' => 'sites/modules/comment',
      'name' => '评论接口',
      'language' => 'zh-hans',
    ),
    'baidueditor' => 
    array (
      'filename' => 'baidueditor',
      'path' => 'sites/modules/baidueditor',
      'name' => '百度编辑器',
      'language' => 'zh-hans',
    ),
    'one' => 
    array (
      'filename' => 'one',
      'path' => 'sites/modules/one',
      'name' => 'one',
      'language' => 'zh-hans',
    ),
    'article' => 
    array (
      'filename' => 'article',
      'path' => 'sites/modules/article',
      'name' => 'article',
      'language' => 'zh-hans',
    ),
  ),
  'oauth' => 
  array (
    'is_login' => '0',
    'sina_oauth_consumer_key' => '2772204160',
    'sina_oauth_consumer_secret' => 'c4a2c8d5d25e6f7c58b86204fd0502ec',
    'renren_oauth_consumer_key' => 'aaa',
    'renren_oauth_consumer_secret' => 'bbb',
    'renren_oauth_consumer_redirect_uri' => 'ccc',
    'qq_oauth_consumer_key' => '100414565',
    'qq_oauth_consumer_secret' => 'd6346bfdaa9ef2b1c06bce56500d59bf',
  ),
  'php_info' => '0',
  'roles_perm_cache' => 
  array (
    1 => 
    array (
      'user view user info' => 0,
      'message add' => 1,
      'guestbook add' => 2,
      'content news view' => 3,
      'content news comment view' => 4,
      'content news comment create' => 5,
      'content wxx view' => 6,
      'content wxx comment view' => 7,
      'content wxx comment create' => 8,
      'content dutu view' => 9,
      'content csdt view' => 10,
      'content csdt comment view' => 11,
      'content csdt comment create' => 12,
      'content zt view' => 13,
      'content plan view' => 14,
      'content toutiao view' => 15,
    ),
    2 => 
    array (
      'file upload' => 0,
      'file one view' => 1,
      'file one delete' => 2,
      'file one update' => 3,
      'user view user info' => 4,
      'user change name' => 5,
      'message add' => 6,
      'guestbook add' => 7,
      'content news view' => 8,
      'content news comment view' => 9,
      'content news comment create' => 10,
      'content news comment update own' => 11,
      'content news comment delete own' => 12,
      'content wxx view' => 13,
      'content wxx comment view' => 14,
      'content wxx comment create' => 15,
      'content wxx comment update own' => 16,
      'content wxx comment delete own' => 17,
      'content dutu view' => 18,
      'content csdt view' => 19,
      'content csdt comment view' => 20,
      'content csdt comment create' => 21,
      'content csdt comment update own' => 22,
      'content csdt comment delete own' => 23,
      'content zt view' => 24,
      'content plan view' => 25,
      'content toutiao view' => 26,
    ),
    3 => 
    array (
      'system view admin' => 0,
      'file upload' => 1,
      'file one view' => 2,
      'file one delete' => 3,
      'file one update' => 4,
      'user view user info' => 5,
      'user use search user' => 6,
      'admin user view' => 7,
      'admin user add' => 8,
      'admin user change name' => 9,
      'user change own' => 10,
      'user change mail' => 11,
      'user change name' => 12,
      'admin block' => 13,
      'message add' => 14,
      'link add' => 15,
      'admin link list' => 16,
      'guestbook add' => 17,
      'admin guestbook list' => 18,
      'crm add' => 19,
      'admin crm list' => 20,
      'admin content view' => 21,
      'content news view' => 22,
      'content news create' => 23,
      'content news update own' => 24,
      'content news update' => 25,
      'content news delete own' => 26,
      'content news delete' => 27,
      'content news comment view' => 28,
      'content news comment create' => 29,
      'content news comment update' => 30,
      'content news comment update own' => 31,
      'content news comment delete' => 32,
      'content news comment delete own' => 33,
      'content wxx view' => 34,
      'content wxx create' => 35,
      'content wxx update own' => 36,
      'content wxx update' => 37,
      'content wxx delete own' => 38,
      'content wxx delete' => 39,
      'content wxx comment view' => 40,
      'content wxx comment create' => 41,
      'content wxx comment update own' => 42,
      'content wxx comment delete own' => 43,
      'content dutu view' => 44,
      'content dutu create' => 45,
      'content dutu update own' => 46,
      'content dutu update' => 47,
      'content dutu delete own' => 48,
      'content dutu delete' => 49,
      'content csdt view' => 50,
      'content csdt create' => 51,
      'content csdt update own' => 52,
      'content csdt update' => 53,
      'content csdt delete own' => 54,
      'content csdt delete' => 55,
      'content csdt comment view' => 56,
      'content csdt comment create' => 57,
      'content csdt comment update' => 58,
      'content csdt comment update own' => 59,
      'content csdt comment delete' => 60,
      'content csdt comment delete own' => 61,
      'content zt view' => 62,
      'content zt create' => 63,
      'content zt update own' => 64,
      'content zt update' => 65,
      'content zt delete own' => 66,
      'content zt delete' => 67,
      'content wxdt view' => 68,
      'content wxdt create' => 69,
      'content wxdt update own' => 70,
      'content wxdt update' => 71,
      'content wxdt delete own' => 72,
      'content wxdt delete' => 73,
      'content plan view' => 74,
      'content plan create' => 75,
      'content plan update own' => 76,
      'content plan update' => 77,
      'content toutiao view' => 78,
      'content toutiao create' => 79,
      'content toutiao update own' => 80,
      'content toutiao update' => 81,
      'content toutiao delete own' => 82,
      'content toutiao delete' => 83,
      'content toutiao comment view' => 84,
      'content toutiao comment create' => 85,
      'content toutiao comment update' => 86,
      'content toutiao comment update own' => 87,
      'content toutiao comment delete' => 88,
      'content toutiao comment delete own' => 89,
      'comment admin view' => 90,
      'admin cheyunhui list' => 91,
      'ttags add' => 92,
      'admin ttags list' => 93,
      'one add' => 94,
      'admin one list' => 95,
      'cheyunclub add' => 96,
      'cheyunclub admin' => 97,
      'xcnr add' => 98,
      'xcnr admin' => 99,
      'article add' => 100,
      'article admin' => 101,
    ),
    4 => 
    array (
      'file upload' => 0,
      'file one view' => 1,
      'file one delete' => 2,
      'file one update' => 3,
      'user view user info' => 4,
      'user change name' => 5,
      'message add' => 6,
      'guestbook add' => 7,
      'admin content view' => 8,
      'content news view' => 9,
      'content news create' => 10,
      'content news update own' => 11,
      'content news delete own' => 12,
      'content news comment view' => 13,
      'content news comment create' => 14,
      'content news comment update' => 15,
      'content news comment update own' => 16,
      'content news comment delete' => 17,
      'content news comment delete own' => 18,
      'content wxx view' => 19,
      'content dutu view' => 20,
      'content dutu create' => 21,
      'content dutu update own' => 22,
      'content dutu delete own' => 23,
      'content csdt comment view' => 24,
      'content csdt comment create' => 25,
      'content csdt comment update own' => 26,
      'content csdt comment delete own' => 27,
      'content plan view' => 28,
      'content toutiao view' => 29,
      'comment admin view' => 30,
    ),
    5 => 
    array (
      'system view admin' => 0,
      'file upload' => 1,
      'file all view' => 2,
      'file one view' => 3,
      'file all delete' => 4,
      'file one delete' => 5,
      'file all update' => 6,
      'file one update' => 7,
      'user view user info' => 8,
      'user use search user' => 9,
      'admin user view' => 10,
      'admin user add' => 11,
      'admin user edit all' => 12,
      'admin user change mail' => 13,
      'admin user change name' => 14,
      'user change own' => 15,
      'user change mail' => 16,
      'user change name' => 17,
      'admin block' => 18,
      'message add' => 19,
      'link add' => 20,
      'admin link list' => 21,
      'guestbook add' => 22,
      'admin guestbook list' => 23,
      'crm add' => 24,
      'admin crm list' => 25,
      'admin content view' => 26,
      'admin content type' => 27,
      'content news view' => 28,
      'content news create' => 29,
      'content news update own' => 30,
      'content news update' => 31,
      'content news delete own' => 32,
      'content news delete' => 33,
      'content news comment view' => 34,
      'content news comment create' => 35,
      'content news comment update' => 36,
      'content news comment update own' => 37,
      'content news comment delete' => 38,
      'content news comment delete own' => 39,
      'content wxx view' => 40,
      'content wxx create' => 41,
      'content wxx update own' => 42,
      'content wxx update' => 43,
      'content wxx delete own' => 44,
      'content wxx delete' => 45,
      'content wxx comment view' => 46,
      'content wxx comment create' => 47,
      'content wxx comment update own' => 48,
      'content wxx comment delete own' => 49,
      'content dutu view' => 50,
      'content dutu create' => 51,
      'content dutu update own' => 52,
      'content dutu update' => 53,
      'content dutu delete own' => 54,
      'content dutu delete' => 55,
      'content csdt view' => 56,
      'content csdt create' => 57,
      'content csdt update own' => 58,
      'content csdt update' => 59,
      'content csdt delete own' => 60,
      'content csdt delete' => 61,
      'content csdt comment view' => 62,
      'content csdt comment create' => 63,
      'content csdt comment update' => 64,
      'content csdt comment update own' => 65,
      'content csdt comment delete' => 66,
      'content csdt comment delete own' => 67,
      'content zt view' => 68,
      'content zt create' => 69,
      'content zt update own' => 70,
      'content zt update' => 71,
      'content zt delete own' => 72,
      'content zt delete' => 73,
      'content wxdt view' => 74,
      'content wxdt create' => 75,
      'content wxdt update own' => 76,
      'content wxdt update' => 77,
      'content wxdt delete own' => 78,
      'content wxdt delete' => 79,
      'content plan view' => 80,
      'content plan create' => 81,
      'content plan update own' => 82,
      'content plan update' => 83,
      'content plan delete own' => 84,
      'content plan delete' => 85,
      'content toutiao view' => 86,
      'content toutiao create' => 87,
      'content toutiao update own' => 88,
      'content toutiao update' => 89,
      'content toutiao delete own' => 90,
      'content toutiao delete' => 91,
      'content toutiao comment view' => 92,
      'content toutiao comment create' => 93,
      'content toutiao comment update' => 94,
      'content toutiao comment update own' => 95,
      'content toutiao comment delete' => 96,
      'content toutiao comment delete own' => 97,
      'comment admin view' => 98,
      'admin cheyunhui list' => 99,
      'ad add' => 100,
      'admin ad list' => 101,
      'ttags add' => 102,
      'admin ttags list' => 103,
      'one add' => 104,
      'admin one list' => 105,
      'cheyunclub add' => 106,
      'cheyunclub admin' => 107,
      'xcnr add' => 108,
      'xcnr admin' => 109,
      'article add' => 110,
      'article admin' => 111,
    ),
    6 => 
    array (
      'system view admin' => 0,
      'system admin cache' => 1,
      'file upload' => 2,
      'file all view' => 3,
      'file one view' => 4,
      'file all delete' => 5,
      'file one delete' => 6,
      'file all update' => 7,
      'file one update' => 8,
      'user view user info' => 9,
      'user use search user' => 10,
      'admin user view' => 11,
      'admin user add' => 12,
      'admin user edit all' => 13,
      'admin user change mail' => 14,
      'admin user change name' => 15,
      'user change own' => 16,
      'user change mail' => 17,
      'user change name' => 18,
      'admin block' => 19,
      'message add' => 20,
      'admin message list' => 21,
      'link add' => 22,
      'admin link list' => 23,
      'guestbook add' => 24,
      'admin guestbook list' => 25,
      'admin content view' => 26,
      'admin content type' => 27,
      'content news view' => 28,
      'content news create' => 29,
      'content news update own' => 30,
      'content news update' => 31,
      'content news delete own' => 32,
      'content news delete' => 33,
      'content news comment view' => 34,
      'content news comment create' => 35,
      'content news comment update' => 36,
      'content news comment update own' => 37,
      'content news comment delete' => 38,
      'content news comment delete own' => 39,
      'content wxx view' => 40,
      'content wxx create' => 41,
      'content wxx update own' => 42,
      'content wxx update' => 43,
      'content wxx delete own' => 44,
      'content wxx delete' => 45,
      'content wxx comment view' => 46,
      'content wxx comment create' => 47,
      'content wxx comment update own' => 48,
      'content wxx comment delete own' => 49,
      'content dutu view' => 50,
      'content dutu create' => 51,
      'content dutu update own' => 52,
      'content dutu update' => 53,
      'content dutu delete own' => 54,
      'content dutu delete' => 55,
      'content csdt view' => 56,
      'content csdt create' => 57,
      'content csdt update own' => 58,
      'content csdt update' => 59,
      'content csdt delete own' => 60,
      'content csdt delete' => 61,
      'content csdt comment view' => 62,
      'content csdt comment create' => 63,
      'content csdt comment update' => 64,
      'content csdt comment update own' => 65,
      'content csdt comment delete' => 66,
      'content csdt comment delete own' => 67,
      'content zt view' => 68,
      'content zt create' => 69,
      'content zt update own' => 70,
      'content zt update' => 71,
      'content zt delete own' => 72,
      'content zt delete' => 73,
      'content wxdt view' => 74,
      'content wxdt create' => 75,
      'content wxdt update own' => 76,
      'content wxdt update' => 77,
      'content wxdt delete own' => 78,
      'content wxdt delete' => 79,
      'content plan view' => 80,
      'content plan create' => 81,
      'content plan update own' => 82,
      'content plan update' => 83,
      'content plan delete own' => 84,
      'content plan delete' => 85,
      'content toutiao view' => 86,
      'content toutiao create' => 87,
      'content toutiao update own' => 88,
      'content toutiao update' => 89,
      'content toutiao delete own' => 90,
      'content toutiao delete' => 91,
      'content toutiao comment view' => 92,
      'content toutiao comment create' => 93,
      'content toutiao comment update' => 94,
      'content toutiao comment update own' => 95,
      'content toutiao comment delete' => 96,
      'content toutiao comment delete own' => 97,
      'comment admin view' => 98,
      'admin cheyunhui list' => 99,
      'ad add' => 100,
      'admin ad list' => 101,
      'ttags add' => 102,
      'admin ttags list' => 103,
      'one add' => 104,
      'admin one list' => 105,
      'cheyunclub add' => 106,
      'cheyunclub admin' => 107,
      'xcnr add' => 108,
      'xcnr admin' => 109,
      'article add' => 110,
      'article admin' => 111,
    ),
  ),
  'site_created' => 1314077726,
  'site_global' => 
  array (
    'name' => '兔八哥算命网',
    'mail' => 'a@a.com',
    'send_mail' => 'a@a.com',
    'slogan' => '星座,运势,起名,风水,八字',
    'description' => '',
    'footer' => '',
  ),
  'site_mode' => '0',
  'sql_info' => '0',
  'status' => '1',
  'themes' => 
  array (
    'exo' => 
    array (
      'filename' => 'exo',
      'path' => 'sites/themes/exo',
      'region' => 
      array (
        'left' => '左栏',
        'right' => '右栏',
        'contop' => '内容上部',
        'bottom' => '底部',
      ),
      'styles' => NULL,
      'scripts' => 
      array (
        0 => 'my.js',
      ),
      'name' => 'exo',
      'styles_remove' => 
      array (
      ),
      'language' => 'zh-hans',
    ),
    'admin' => 
    array (
      'filename' => 'admin',
      'path' => 'themes/admin',
      'region' => NULL,
      'styles' => NULL,
      'scripts' => NULL,
      'name' => 'admin',
      'styles_remove' => 
      array (
      ),
      'language' => 'zh-hans',
    ),
  ),
  'theme_admin' => 'admin',
  'theme_admin_view' => NULL,
  'theme_cache' => 
  array (
    'print' => 
    array (
      'tpl' => 'print.tpl.php',
      'args' => 
      array (
        0 => 'content',
      ),
      'module' => 'system',
    ),
    'error' => 
    array (
      'tpl' => 'error.tpl.php',
      'args' => 
      array (
        0 => 'content',
        1 => 'code',
      ),
      'module' => 'system',
    ),
    'front' => 
    array (
      'tpl' => 'front.tpl.php',
      'args' => 
      array (
        0 => 'front',
      ),
      'module' => 'system',
    ),
    'page' => 
    array (
      'tpl' => 'page.tpl.php',
      'args' => 
      array (
        0 => 'content',
      ),
      'module' => 'system',
    ),
    'item_list' => 
    array (
      'fun' => 'theme_item_list',
      'args' => 
      array (
        0 => 'items',
        1 => 'title',
        2 => 'type',
        3 => 'attributes',
      ),
      'module' => 'system',
    ),
    'breadcrumb' => 
    array (
      'fun' => 'theme_breadcrumb',
      'args' => 
      array (
        0 => 'breadcrumb',
      ),
      'module' => 'system',
    ),
    'help' => 
    array (
      'fun' => 'theme_help',
      'args' => 
      array (
        0 => 'help',
      ),
      'module' => 'system',
    ),
    'table' => 
    array (
      'fun' => 'theme_table',
      'args' => 
      array (
        0 => 'header',
        1 => 'rows',
        2 => 'attributes',
      ),
      'module' => 'system',
    ),
    'username' => 
    array (
      'fun' => 'theme_username',
      'args' => 
      array (
        0 => 'account',
        1 => 'link',
      ),
      'module' => 'user',
    ),
    'user' => 
    array (
      'tpl' => 'user.tpl.php',
      'args' => 
      array (
        0 => 'account',
      ),
      'module' => 'user',
    ),
    'user_center' => 
    array (
      'tpl' => 'user_center.tpl.php',
      'args' => 
      array (
        0 => 'center',
      ),
      'module' => 'user',
    ),
    'user_category' => 
    array (
      'tpl' => 'user_category.tpl.php',
      'args' => 
      array (
        0 => 'data',
      ),
      'module' => 'user',
    ),
    'block' => 
    array (
      'tpl' => 'block.tpl.php',
      'args' => 
      array (
        0 => 'block',
      ),
      'module' => 'block',
    ),
    'linkfront' => 
    array (
      'tpl' => 'front.tpl.php',
      'module' => 'link',
    ),
    'guestbook_front' => 
    array (
      'tpl' => 'front.tpl.php',
      'description' => '留言首页',
      'module' => 'guestbook',
    ),
    'fields' => 
    array (
      'tpl' => 'fields.tpl.php',
      'description' => '节点字段组输出模板',
      'args' => 
      array (
        0 => 'module',
        1 => 'node',
        2 => 'type',
      ),
      'module' => 'field',
    ),
    'field_node_list' => 
    array (
      'tpl' => 'field_node_list.tpl.php',
      'description' => '字段或类别所属节点列表浏览页模板',
      'args' => 
      array (
        0 => 'content',
        1 => 'data',
        2 => 'type',
      ),
      'module' => 'field',
    ),
    'comment' => 
    array (
      'tpl' => 'comment.tpl.php',
      'title' => '评论模块',
      'args' => 
      array (
        0 => 'comment',
      ),
      'module' => 'comment',
    ),
    'one' => 
    array (
      'tpl' => 'node.tpl.php',
      'args' => 
      array (
        0 => 'one',
      ),
      'module' => 'one',
    ),
    'onefront' => 
    array (
      'tpl' => 'category.tpl.php',
      'args' => 
      array (
        0 => 'data',
      ),
      'module' => 'one',
    ),
    'article' => 
    array (
      'tpl' => 'node.tpl.php',
      'args' => 
      array (
        0 => 'article',
      ),
      'module' => 'article',
    ),
    'tag' => 
    array (
      'tpl' => 'tag.tpl.php',
      'args' => 
      array (
        0 => 'tag',
      ),
      'module' => 'article',
    ),
    'articlecategory' => 
    array (
      'tpl' => 'category.tpl.php',
      'args' => 
      array (
        0 => 'data',
      ),
      'module' => 'article',
    ),
    'search' => 
    array (
      'tpl' => 'search.tpl.php',
      'args' => 
      array (
        0 => 'data',
      ),
      'module' => 'article',
    ),
  ),
  'theme_canting_view' => 
  array (
    'left' => 
    array (
      'user' => 
      array (
        'login' => 
        (object)(array(
           'bid' => '16',
           'module' => 'user',
           'theme' => 'canting',
           'region' => 'left',
           'delta' => 'login',
           'title' => '用户登录',
           'weight' => '-30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
      ),
      'system' => 
      array (
        'adminLink' => 
        (object)(array(
           'bid' => '15',
           'module' => 'system',
           'theme' => 'canting',
           'region' => 'left',
           'delta' => 'adminLink',
           'title' => '网站管理',
           'weight' => '-30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
      ),
    ),
  ),
  'theme_che1_view' => NULL,
  'theme_chedui_view' => 
  array (
    'right' => 
    array (
      'article' => 
      array (
        'tags_article' => 
        (object)(array(
           'bid' => '44',
           'module' => 'article',
           'theme' => 'chedui',
           'region' => 'right',
           'delta' => 'tags_article',
           'title' => '文章标签',
           'weight' => '-30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
        'guidang_article' => 
        (object)(array(
           'bid' => '43',
           'module' => 'article',
           'theme' => 'chedui',
           'region' => 'right',
           'delta' => 'guidang_article',
           'title' => '文章归档',
           'weight' => '-30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
        'rand_article' => 
        (object)(array(
           'bid' => '42',
           'module' => 'article',
           'theme' => 'chedui',
           'region' => 'right',
           'delta' => 'rand_article',
           'title' => '随机文章',
           'weight' => '-30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
        'top_article' => 
        (object)(array(
           'bid' => '41',
           'module' => 'article',
           'theme' => 'chedui',
           'region' => 'right',
           'delta' => 'top_article',
           'title' => '热点文章',
           'weight' => '-30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
        'theme_select' => 
        (object)(array(
           'bid' => '46',
           'module' => 'article',
           'theme' => 'chedui',
           'region' => 'right',
           'delta' => 'theme_select',
           'title' => '主题选择',
           'weight' => '30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
        'links' => 
        (object)(array(
           'bid' => '45',
           'module' => 'article',
           'theme' => 'chedui',
           'region' => 'right',
           'delta' => 'links',
           'title' => '友情链接',
           'weight' => '30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
      ),
    ),
  ),
  'theme_che_view' => NULL,
  'theme_default_view' => 
  array (
    'bottom' => 
    array (
      'block' => 
      array (
        'boxes_3' => 
        (object)(array(
           'bid' => '5',
           'module' => 'block',
           'theme' => 'default',
           'region' => 'bottom',
           'delta' => 'boxes_3',
           'title' => '',
           'weight' => '0',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'display' => 
            array (
              'body' => '',
            ),
            'custom' => 
            array (
            ),
          ),
        )),
      ),
    ),
    'left' => 
    array (
      'block' => 
      array (
        'boxes_2' => 
        (object)(array(
           'bid' => '4',
           'module' => 'block',
           'theme' => 'default',
           'region' => 'left',
           'delta' => 'boxes_2',
           'title' => '联系我们',
           'weight' => '0',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
      ),
    ),
  ),
  'theme_exo_view' => NULL,
  'theme_jiaju_view' => 
  array (
    'left' => 
    array (
      'user' => 
      array (
        'login' => 
        (object)(array(
           'bid' => '20',
           'module' => 'user',
           'theme' => 'jiaju',
           'region' => 'left',
           'delta' => 'login',
           'title' => '用户登录',
           'weight' => '-30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
      ),
      'system' => 
      array (
        'adminLink' => 
        (object)(array(
           'bid' => '19',
           'module' => 'system',
           'theme' => 'jiaju',
           'region' => 'left',
           'delta' => 'adminLink',
           'title' => '网站管理',
           'weight' => '-30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
      ),
    ),
  ),
  'theme_mansj_view' => 
  array (
    'left' => 
    array (
      'user' => 
      array (
        'login' => 
        (object)(array(
           'bid' => '24',
           'module' => 'user',
           'theme' => 'mansj',
           'region' => 'left',
           'delta' => 'login',
           'title' => '用户登录',
           'weight' => '-30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
      ),
      'system' => 
      array (
        'adminLink' => 
        (object)(array(
           'bid' => '23',
           'module' => 'system',
           'theme' => 'mansj',
           'region' => 'left',
           'delta' => 'adminLink',
           'title' => '网站管理',
           'weight' => '-30',
           'visibility' => '1',
           'cache' => '1',
           'settings' => 
          array (
            'custom' => 
            array (
            ),
          ),
        )),
      ),
    ),
  ),
  'theme_phone1_view' => NULL,
  'theme_real_view' => NULL,
  'user' => 
  array (
    'register' => '1',
    'status' => '1',
    'anonymous' => '游客',
    'select_theme' => '0',
    'select_lang' => '0',
    'redirect' => 'user/[uid]',
    'default_avatar' => 'misc/images/avatar.gif',
    'default_role' => '2',
    'anonymous_role' => '1',
    'custom_view' => '0',
    'custom_view_module' => '0',
  ),
  'user_file_size' => '300',
  'user_file_size_role_2' => '0',
  'user_file_size_role_3' => '0',
  'user_file_size_role_4' => '0',
  'user_file_size_role_5' => '0',
  'user_roles' => 
  array (
    1 => 
    (object)(array(
       'rid' => '1',
       'name' => '游客',
       'perm' => 'a:3:{s:4:"user";a:1:{s:19:"user view user info";i:26;}s:9:"guestbook";a:1:{s:13:"guestbook add";i:55;}s:7:"content";a:10:{s:17:"content news view";i:66;s:25:"content news comment view";i:84;s:27:"content news comment create";i:89;s:16:"content wxx view";i:108;s:17:"content dutu view";i:123;s:17:"content csdt view";i:140;s:25:"content csdt comment view";i:155;s:27:"content csdt comment create";i:160;s:15:"content zt view";i:176;s:17:"content plan view";i:203;}}',
       'count' => '0',
    )),
    2 => 
    (object)(array(
       'rid' => '2',
       'name' => '登录用户',
       'perm' => 'a:4:{s:6:"system";a:4:{s:11:"file upload";i:6;s:13:"file one view";i:11;s:15:"file one delete";i:16;s:15:"file one update";i:21;}s:4:"user";a:2:{s:19:"user view user info";i:25;s:16:"user change name";i:44;}s:9:"guestbook";a:1:{s:13:"guestbook add";i:54;}s:7:"content";a:14:{s:17:"content news view";i:65;s:25:"content news comment view";i:83;s:27:"content news comment create";i:88;s:31:"content news comment update own";i:96;s:31:"content news comment delete own";i:103;s:16:"content wxx view";i:107;s:17:"content dutu view";i:122;s:17:"content csdt view";i:139;s:25:"content csdt comment view";i:154;s:27:"content csdt comment create";i:159;s:31:"content csdt comment update own";i:166;s:31:"content csdt comment delete own";i:172;s:15:"content zt view";i:175;s:17:"content plan view";i:202;}}',
       'count' => '40',
    )),
    3 => 
    (object)(array(
       'rid' => '3',
       'name' => '网站编辑',
       'perm' => 'a:10:{s:6:"system";a:5:{s:17:"system view admin";i:2;s:11:"file upload";i:5;s:13:"file one view";i:10;s:15:"file one delete";i:15;s:15:"file one update";i:20;}s:4:"user";a:8:{s:19:"user view user info";i:24;s:20:"user use search user";i:28;s:15:"admin user view";i:30;s:14:"admin user add";i:32;s:22:"admin user change name";i:36;s:15:"user change own";i:38;s:16:"user change mail";i:40;s:16:"user change name";i:43;}s:5:"block";a:1:{s:11:"admin block";i:46;}s:4:"link";a:2:{s:8:"link add";i:48;s:15:"admin link list";i:50;}s:9:"guestbook";a:2:{s:13:"guestbook add";i:53;s:20:"admin guestbook list";i:57;}s:7:"content";a:53:{s:18:"admin content view";i:60;s:17:"content news view";i:64;s:19:"content news create";i:69;s:23:"content news update own";i:72;s:19:"content news update";i:74;s:23:"content news delete own";i:77;s:19:"content news delete";i:79;s:25:"content news comment view";i:82;s:27:"content news comment create";i:87;s:27:"content news comment update";i:92;s:31:"content news comment update own";i:95;s:27:"content news comment delete";i:99;s:31:"content news comment delete own";i:102;s:16:"content wxx view";i:106;s:18:"content wxx create";i:110;s:22:"content wxx update own";i:112;s:18:"content wxx update";i:114;s:22:"content wxx delete own";i:116;s:18:"content wxx delete";i:118;s:17:"content dutu view";i:121;s:19:"content dutu create";i:126;s:23:"content dutu update own";i:129;s:19:"content dutu update";i:131;s:23:"content dutu delete own";i:134;s:19:"content dutu delete";i:136;s:17:"content csdt view";i:138;s:19:"content csdt create";i:142;s:23:"content csdt update own";i:144;s:19:"content csdt update";i:146;s:23:"content csdt delete own";i:148;s:19:"content csdt delete";i:150;s:25:"content csdt comment view";i:153;s:27:"content csdt comment create";i:158;s:27:"content csdt comment update";i:162;s:31:"content csdt comment update own";i:165;s:27:"content csdt comment delete";i:168;s:31:"content csdt comment delete own";i:171;s:15:"content zt view";i:174;s:17:"content zt create";i:178;s:21:"content zt update own";i:180;s:17:"content zt update";i:182;s:21:"content zt delete own";i:184;s:17:"content zt delete";i:186;s:17:"content wxdt view";i:188;s:19:"content wxdt create";i:190;s:23:"content wxdt update own";i:192;s:19:"content wxdt update";i:194;s:23:"content wxdt delete own";i:196;s:19:"content wxdt delete";i:198;s:17:"content plan view";i:201;s:19:"content plan create";i:205;s:23:"content plan update own";i:207;s:19:"content plan update";i:209;}s:7:"comment";a:1:{s:18:"comment admin view";i:213;}s:9:"cheyunhui";a:1:{s:20:"admin cheyunhui list";i:215;}s:5:"ttags";a:2:{s:9:"ttags add";i:219;s:16:"admin ttags list";i:221;}s:3:"one";a:2:{s:7:"one add";i:223;s:14:"admin one list";i:225;}}',
       'count' => '10',
    )),
    4 => 
    (object)(array(
       'rid' => '4',
       'name' => '专栏作者',
       'perm' => 'a:5:{s:6:"system";a:4:{s:11:"file upload";i:4;s:13:"file one view";i:9;s:15:"file one delete";i:14;s:15:"file one update";i:19;}s:4:"user";a:2:{s:19:"user view user info";i:23;s:16:"user change name";i:42;}s:9:"guestbook";a:1:{s:13:"guestbook add";i:52;}s:7:"content";a:21:{s:18:"admin content view";i:59;s:17:"content news view";i:63;s:19:"content news create";i:68;s:23:"content news update own";i:71;s:23:"content news delete own";i:76;s:25:"content news comment view";i:81;s:27:"content news comment create";i:86;s:27:"content news comment update";i:91;s:31:"content news comment update own";i:94;s:27:"content news comment delete";i:98;s:31:"content news comment delete own";i:101;s:16:"content wxx view";i:105;s:17:"content dutu view";i:120;s:19:"content dutu create";i:125;s:23:"content dutu update own";i:128;s:23:"content dutu delete own";i:133;s:25:"content csdt comment view";i:152;s:27:"content csdt comment create";i:157;s:31:"content csdt comment update own";i:164;s:31:"content csdt comment delete own";i:170;s:17:"content plan view";i:200;}s:7:"comment";a:1:{s:18:"comment admin view";i:212;}}',
       'count' => '34',
    )),
    5 => 
    (object)(array(
       'rid' => '5',
       'name' => '审核编辑',
       'perm' => 'a:12:{s:6:"system";a:8:{s:17:"system view admin";i:1;s:11:"file upload";i:3;s:13:"file all view";i:7;s:13:"file one view";i:8;s:15:"file all delete";i:12;s:15:"file one delete";i:13;s:15:"file all update";i:17;s:15:"file one update";i:18;}s:4:"user";a:10:{s:19:"user view user info";i:22;s:20:"user use search user";i:27;s:15:"admin user view";i:29;s:14:"admin user add";i:31;s:19:"admin user edit all";i:33;s:22:"admin user change mail";i:34;s:22:"admin user change name";i:35;s:15:"user change own";i:37;s:16:"user change mail";i:39;s:16:"user change name";i:41;}s:5:"block";a:1:{s:11:"admin block";i:45;}s:4:"link";a:2:{s:8:"link add";i:47;s:15:"admin link list";i:49;}s:9:"guestbook";a:2:{s:13:"guestbook add";i:51;s:20:"admin guestbook list";i:56;}s:7:"content";a:55:{s:18:"admin content view";i:58;s:18:"admin content type";i:61;s:17:"content news view";i:62;s:19:"content news create";i:67;s:23:"content news update own";i:70;s:19:"content news update";i:73;s:23:"content news delete own";i:75;s:19:"content news delete";i:78;s:25:"content news comment view";i:80;s:27:"content news comment create";i:85;s:27:"content news comment update";i:90;s:31:"content news comment update own";i:93;s:27:"content news comment delete";i:97;s:31:"content news comment delete own";i:100;s:16:"content wxx view";i:104;s:18:"content wxx create";i:109;s:22:"content wxx update own";i:111;s:18:"content wxx update";i:113;s:22:"content wxx delete own";i:115;s:18:"content wxx delete";i:117;s:17:"content dutu view";i:119;s:19:"content dutu create";i:124;s:23:"content dutu update own";i:127;s:19:"content dutu update";i:130;s:23:"content dutu delete own";i:132;s:19:"content dutu delete";i:135;s:17:"content csdt view";i:137;s:19:"content csdt create";i:141;s:23:"content csdt update own";i:143;s:19:"content csdt update";i:145;s:23:"content csdt delete own";i:147;s:19:"content csdt delete";i:149;s:25:"content csdt comment view";i:151;s:27:"content csdt comment create";i:156;s:27:"content csdt comment update";i:161;s:31:"content csdt comment update own";i:163;s:27:"content csdt comment delete";i:167;s:31:"content csdt comment delete own";i:169;s:15:"content zt view";i:173;s:17:"content zt create";i:177;s:21:"content zt update own";i:179;s:17:"content zt update";i:181;s:21:"content zt delete own";i:183;s:17:"content zt delete";i:185;s:17:"content wxdt view";i:187;s:19:"content wxdt create";i:189;s:23:"content wxdt update own";i:191;s:19:"content wxdt update";i:193;s:23:"content wxdt delete own";i:195;s:19:"content wxdt delete";i:197;s:17:"content plan view";i:199;s:19:"content plan create";i:204;s:23:"content plan update own";i:206;s:19:"content plan update";i:208;s:19:"content plan delete";i:210;}s:7:"comment";a:1:{s:18:"comment admin view";i:211;}s:9:"cheyunhui";a:1:{s:20:"admin cheyunhui list";i:214;}s:2:"ad";a:2:{s:6:"ad add";i:216;s:13:"admin ad list";i:217;}s:5:"ttags";a:2:{s:9:"ttags add";i:218;s:16:"admin ttags list";i:220;}s:3:"one";a:2:{s:7:"one add";i:222;s:14:"admin one list";i:224;}s:7:"article";a:1:{s:13:"article admin";i:226;}}',
       'count' => '7',
    )),
    6 => 
    (object)(array(
       'rid' => '6',
       'name' => '管理员',
       'perm' => NULL,
       'count' => '0',
    )),
  ),
  '_dida_values' => 
  (object)(array(
     'status' => '1',
     'default_language' => 'zh-hans',
     'clean_url' => '1',
     'sql_info' => '0',
     'php_info' => '0',
     'history_enabled' => '0',
     'history_enabled_limit' => '100000',
     'logs_enabled_limit' => '100000',
     'site_mode' => '0',
     'admin_custom_links' => '0',
     'cache_css_and_js' => '0',
     'filter_cache' => '0',
     'alias' => '0',
     'cron_min_time' => '3600',
     'cron_pass' => '',
     'crypt_default_key' => 'xingzuo',
     'front_view_type' => '0',
     'front_view_module' => '0',
     'submit' => '确认提交',
     'form_id' => 'system_site_settings',
     'form_token' => 'd53e879b6f935ee46e827e0e11e73d66',
  )),
);

?>