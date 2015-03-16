<?php
// $Id: install.php 35 2012-02-16 14:12:22Z east $

error_reporting(E_ALL ^ E_NOTICE);

$log_dir = DIDA_ROOT . '/sites/logs';

$title = '检查安装环境';
$is_env_ok = false;

if (!$error = dida_is_setup()) { // 检查安装环境
  $is_env_ok = true; // 安装环境检查结束

  if (empty($_GET['setup'])) {
    dd_goto(f('install.php?setup=1'));
  } else {
  	switch ($_GET['setup']) {
  	  case 1:
        $title = '选择数据库';
  	    $database_type = dida_setup_data_select(); // 选择数据库
  	  break;
  	  case 2:
        $title = '填写数据库信息';
  	    $database_form = dida_setup_data_form(); // 填写数据库信息
  	  break;
  	  case 3:
        $title = '测试数据库权限';
  	    $body = dida_setup_data_test(); // 测试数据库
  	  break;
  	  case 4:
        $title = '填写管理员信息';
			  if($_POST['md'] == 1){
  				$body = my_dida_setup(); // 安装程序
				}
  	  break;
  	  default:
  	  	dd_goto(f('install.php?setup=1'));
  	}
  }
}

function my_dida_setup(){
	global $base_path, $error, $setting_file, $conf_dir;
  
  if ($_POST) {
    if (empty($_POST['admin'])) {
      $error[] = '管理员帐号不能为空。';
    } else if (empty($_POST['mail'])) {
      $error[] = '邮箱不能为空。';
    } else if (empty($_POST['adminpass'])) {
      $error[] = '管理员帐号密码不能为空。';
    } else if ($_POST['adminpass'] != $_POST['adminpass2']) {
      $error[] = '两次输入的密码不一致。';
    } else if (empty($_POST['site_name'])) {
      $error[] = '网站名称不能为空。';
    } else if (empty($_POST['site_mail'])) {
      $error[] = '站长邮箱不能为空。';
    } else if (empty($_POST['status'])) {
      $error[] = '请设置网站访问状态。';
    } else if (db_connect('default')) {
      // 根据用户选择的站点类型，导入数据
			$target = 'default';
			require_once DIDA_ROOT . '/includes/database.inc';
			require_once DIDA_ROOT . '/includes/module.inc';
			require_once DIDA_ROOT . '/sites/setting.php';

			$file = DIDA_ROOT . '/install/install.sql';

			global $db,$database;
			
			if (!is_file($file)) {
				dd_set_message('数据文件不存在，无法完成安装', 'error');
				return;
			}

			if (!$data = file_get_contents($file)) {
				dd_set_message('无法读取数据文件', 'error');
				return;
			}
			$data = str_replace('CREATE TABLE IF NOT EXISTS `', 'CREATE TABLE IF NOT EXISTS `'.$database['default']['prefix'], $data);
			$data = str_replace('INSERT INTO `', 'INSERT INTO `'.$database['default']['prefix'], $data);
			$data = str_replace('ALTER TABLE `', 'ALTER TABLE `'.$database['default']['prefix'], $data);
			$data = str_replace('REFERENCES `', 'REFERENCES `'.$database['default']['prefix'], $data);
			$array = preg_split('/$/ms', $data);
			$query = array();

			foreach ($array as $value) {
				$value = trim($value);
				
				if (empty($query_string)){
					$query_string = '';
				}

				if (!empty($value)) {
					$prefix = substr($value, 0, 2);
					// 去除注释
					if ($prefix == '--' || $prefix == '/*') {
						continue;
					}

					if (substr($value, -1) == ';') {
						if (empty($query_string)) {
							$query[] = $value;
						} else {
							$query[] = $query_string . $value . "\n";
							$query_string = '';
						}
					} else {
						$query_string .= $value . "\n";
					}
				}
			}
			db_exec('SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT',  NULL, array('target' => $target));
			db_exec('SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS',  NULL, array('target' => $target));
			db_exec('SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION',  NULL, array('target' => $target));
			db_exec('SET @OLD_TIME_ZONE=@@TIME_ZONE',  NULL, array('target' => $target));
			db_exec("SET TIME_ZONE='+00:00'");
			db_exec('SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0',  NULL, array('target' => $target));
			db_exec('SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0',  NULL, array('target' => $target));
			db_exec("SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO'");
			db_exec('SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0',  NULL, array('target' => $target));
			// 事务开始
			$db[$target]->beginTransaction();

			$db[$target]->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
			$db[$target]->query('USE ' . $site->dbname);
			foreach ($query as $sql) {
				$db[$target]->query($sql);
				// 执行失败，回滚，并结束操作  
				if (db_error($db[$target]->errorCode(), $db[$target]->errorInfo())) {
					$db[$target]->rollBack();
					dd_set_message('数据导入失败了', 'error');
					return;
				}
			}

			// 事务结束，提交
			$db[$target]->commit();
			db_exec('SET TIME_ZONE=@OLD_TIME_ZONE',  NULL, array('target' => $target));
			db_exec('SET SQL_MODE=@OLD_SQL_MODE',  NULL, array('target' => $target));
			db_exec('SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS',  NULL, array('target' => $target));
			db_exec('SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS',  NULL, array('target' => $target));
			db_exec('SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT',  NULL, array('target' => $target));
			db_exec('SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS',  NULL, array('target' => $target));
			db_exec('SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION',  NULL, array('target' => $target));
			db_exec('SET SQL_NOTES=@OLD_SQL_NOTES',  NULL, array('target' => $target));

			_install_setting_chmod(); // 锁定安装文件，修改配置文件权限
			_install_bootstrap(); // 载入模块

			$admin = check_plain($_POST['admin']);
			
			$pass = my_user_get_salt_pass($_POST['adminpass']);

			//写入第一个用户
      db_query('INSERT INTO {users} (uid, name, pass, salt, mail, created, status) VALUES(1, ?, ?, ?, ?, ?, 1)', array($admin, $pass['pass'], $pass['salt'], $_POST['mail'], $_SERVER['REQUEST_TIME']));
			
			//测试简洁链接
			$clean_url = 0;
			$goto = '?q=user/login';

			user_login(user_load(1));
			dd_goto('user/login');

			$error[] = dd_get_message();

		}
	}
}


function my_user_get_salt_pass($pass) {
  $arr = array('salt' => dd_get_rand_string(6));
  $arr['pass'] = md5(md5($pass) . $arr['salt']);
  return $arr;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $title; ?> | <?php echo $conf['site_name']; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    body {
      color:#474747;
      font-size:14px;
      line-height:1.6;
    }
    a{
      color: #1A4686
    }
    .form_item{
      margin: 4px 0;
    }
    input.form_text{
      font-size: 14px;
      padding:2px 3px;
      font-style: normal;
    }
    span.form_required {
      color:#FFAE00;
    }
    #install_form{
      margin: 10px auto;
      border: 1px solid #ccc;
      padding: 0 12px;
      width: 700px;
    }
    #header{
      margin: 5px auto;
      border: 1px solid #ccc;
      padding: 12px;
      width: 700px;
      color: #3E5803
    }
    #error{
      width:700px;
      margin: 5px auto;
      background:#FFCCCC;
      color:#A30000;
      border:1px solid #DD7777;
      padding: 5px 12px;
    }
    label{
      text-align: right;
      display:-moz-inline-box;
      display:inline-block;
      width:120px;
      font-weight: bold;
      padding-right:6px;
    }
  </style>
</head>
<body>
  <h2 id="header"><?php echo $title; ?></h2>
	<?php if ($error) : ?>
    <div id="error"><?php print implode('<br />', $error); ?></div>
  <?php endif; ?>
  <?php global $error;if ($error) : ?>
    <div id="error"><?php print implode('<br />', $error); ?><?php echo dd_get_message(); ?></div>
  <?php endif; ?>
  <?php if ($is_env_ok) : ?>
  <form accept-charset="UTF-8" id="install_form" action="" method="post">
    <?php if ($_GET['setup'] == 1) { ?>
      <div class="form_item">
        <?php 
          echo dd_form_select(array(
          '#title' => '请选择数据库',
          '#name' => 'driver',
          '#required' => 1,
          '#options' => $database_type));
        ?>
        <input type="submit" value="确定" />
      </div>
    <?php } else if ($_GET['setup'] == 2) { ?>
      <h2>数据库信息：</h2>
      <div class="form_item">
        <label class="dd_label">数据库类型：<span title="此项不能为空。" class="form_required">*</span></label><?php echo $database['default']['driver']; ?>
        (<a href="install.php?setup=1&clear=1">重新选择</a>)
      </div>
      <?php echo $database_form; ?>
      <div class="form_item">
        <input type="submit" value="测试数据库" />
      </div>
    <?php } else if ($_GET['setup'] == 3) { ?>
        <a href="install.php?setup=2">返回重新填写数据库信息</a>
    <?php } else if ($_GET['setup'] == 4) { ?>
      <h2>注册第一个用户（超级管理员）：</h2>
      <div class="form_item">
        <label class="dd_label">邮箱：<span title="此项不能为空。" class="form_required">*</span></label>
        <input type="text" class="required form_text" size="50" value="<?php echo $_POST['mail'];?>" name="mail"/>
      </div>
      <div class="form_item">
        <label class="dd_label">昵称：<span title="此项不能为空。" class="form_required">*</span></label>
        <input type="text" class="form_text" size="50" value="<?php echo $_POST['admin'];?>" name="admin"/>
      </div>
      <div class="form_item">
        <label class="dd_label">密码：<span title="此项不能为空。" class="form_required">*</span></label>
        <input type="password" class="form_text" size="50" value="<?php echo $_POST['adminpass'];?>" name="adminpass"/>
      </div>
      <div class="form_item">
        <label class="dd_label">重复密码：<span title="此项不能为空。" class="form_required">*</span></label>
        <input type="password" class="required form_text" size="50" value="<?php echo $_POST['adminpass2'];?>" name="adminpass2"/>
      </div>
      <div class="form_item">
			  <input type="hidden" value="1" name="site_name"/>
				<input type="hidden" value="a@a.com" name="site_mail"/>
			  <input type="hidden" name="status" value="1" />
				<input type="hidden" name="md" value="1" />
        <input type="submit" value="开始安装" />
      </div>
    <?php }; ?>
  </form>
  <?php endif; ?>
</body>
</html>
