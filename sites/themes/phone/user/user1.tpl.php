<style>
.fcon{
	line-height:1.2em;
	padding:0px;
}
.fcon h2{
	padding:10px;
	border-bottom:1px dashed #ccc;
}
.fcon h2 span{
	color:#a5a5a5;
	margin-right:5px;
}
.fcon .front_term_list {
padding: 15px 10px 5px 10px;
overflow: hidden;
position:relative;
}
.fcon .front_term_list .submit {
margin: 15px 0px 10px 0px;
height:20px;
}
.fcon .front_term_list .des {
margin-bottom: 5px;
height: 60px;
line-height:150%;
overflow: hidden;
}
.fcon .front_term_list .des a{
	color:#000;
}
.fcon .fcon_right .tit{
	line-height:1.5em;
	padding-bottom: 10px;
}
.fcon .fcon_right .tit a{
	color:#000;
}
.fcon_right .fcon_bottom {
position: absolute;
width: 100%;
bottom: 0px;
height:20px;
overflow:hidden;
}
.litpic{
	float:left;
	margin-right:10px;
}
</style>
<?php global $user;$unmsg = message_count($user->uid);if(arg(2) == '' && $user->uid == $account->uid){dd_goto('user/'.$user->uid.'/cang');}if(arg(2) == '' && $user->uid != $account->uid){dd_goto('user/'.$account->uid.'/article');}
		$fetch = pager_query("SELECT n.*,u.name FROM {content_ext_news} n INNER JOIN {users} u ON n.uid = u.uid LEFT JOIN {fields_small} fs ON n.nid = fs.nid WHERE fs.text = ? AND fs.field_id = ? AND n.check_status = 1 ORDER BY n.nid DESC", 10, 0, NULL, array($account->name, 32));
		if($fetch){
			foreach($fetch as $key=>$val){
				$tagstr = '';
				$val = content_load($val->nid, 'news');
;?>
			<div class="front_term_list ft<?php echo $key;?>">
				<div class="fcon_right">
					<div class="tit"><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a></div>
					<div class="des"><div class="litpic"><img src="/<?php echo get_litpic($val, '85x64');?>" width="85" height="64" /></div><a href="<?php echo $val->url;?>"><?php echo $val->description;?></a></div>
					<div class="submit"><span><a href="<?php echo $val->url;?>"><?php echo $val->name;?></a></span><span><?php echo date('Y-m-d', $val->check_time);?></span><span class="cnum"><a href="<?php echo $val->url;?>#comment_form"><?php echo $val->comment_count;?></a></span></div>
				</div>
			</div>
	<?php };?>
		
	<?php echo pager_view();}?>
								<ul>
								</div>
							</div>
		</div>
