<?PHP
define('DIDA_ROOT', getcwd());
require_once DIDA_ROOT . '/includes/bootstrap.inc';
bootstrap('full');

if($_REQUEST['field_id'] != ''){
	echo '<option value="">请选择</option>';
	$fetch = db_query("select * from {fields_term} where field_id = ? and pid = 0",array($_REQUEST['field_id']));
	foreach($fetch as $key=>$val){
		echo '<option value="'.$val->tid.'">'.$val->name.'</option>';
	}
}elseif($_REQUEST['pid'] != ''){
	echo '<option value="">请选择</option>';
	$fetch = db_query("select * from {fields_term} where pid = ?",array($_REQUEST['pid']));
	foreach($fetch as $key=>$val){
		echo '<option value="'.$val->tid.'">'.$val->name.'</option>';
	}
}else{
	echo '<option value="">请选择</option>';
	$fetch = db_query("select * from {fields} where field_key = ?",array('lanmu'));
	foreach($fetch as $key=>$val){
		echo '<option value="'.$val->field_id.'">'.$val->name.'</option>';
	}
}
?>