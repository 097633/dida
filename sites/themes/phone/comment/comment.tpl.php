<?php
// $Id: comment.tpl.php 4 2012-10-14 09:09:11Z east $

/**
 * @template 评论默认模板
 * 可根据评论的不同扩展类型，创建不同模板文件。
 * 如：ext_type 为 forum，则可使用 comment_forum.tpl.php
 */

?>

<div id="comment_<?php echo $comment->ext_type?>_<?php echo $comment->cid?>" 
class="comment_view comment_view_<?php echo $zebra; ?> comment_view_<?php echo $comment->ext_type?>">
	<?php $cuser = user_load($comment->uid);unset($cuser->nid);?>
  <div class="comment_body">
		<div class="litpic"><a href="<?php echo url('user/'.$cuser->uid.'/comment');?>"><img src="/<?php echo get_litpic($cuser, '60x60');?>" width="60" height="60" /></a></div>
		<div class="blue tit"><a href="<?php echo url('user/'.$cuser->uid.'/comment');?>"><?php echo $cuser->name;?></a><i>#<?php echo $comment->count;?></i></div>
		<div class="ccon blue"><?php echo $comment->body; ?></div>
		<!--<div class="cshare"><a href="javascript:" class="mcomment_quote" alt="<?php echo $comment->cid;?>">引用</a><a href="javascript:" class="mcomment_replay" alt="<?php echo $comment->cid;?>">回复</a><a href="javascript:" class="mcomment_share" alt="<?php echo $comment->cid;?>">分享</a></div>-->
	</div>  
	<div class="rep_box">
		<textarea name="" rows="5" cols="70" class="<?php if($GLOBALS['user']->uid ==0){echo 'need_login';};?>"></textarea>
		<div id="comment_form_button" class="form_item form_item_image">
			<input type="hidden" name="pid" value="<?php echo $comment->cid;?>" />
			<input type="image" name="button" src="<?php echo path_to_theme();?>/images/fabiao.jpg" id="comment_form_type_button" class="csubmit form_value_image">
		</div>	
	</div>
</div>
