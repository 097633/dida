<?php
// $Id: content.tpl.php 6 2013-02-25 20:49:15Z east $

/**
 * @file 内容浏览页面默认模板文件
 * @param object $content 内容对象
 *
 * 模板文件加载优化级：
 *  content_ext_{$content->type}_{$content->nid}.tpl.php
 *  content_ext_{$content->type}.tpl.php
 *  content.tpl.php
 */
?>
<style>
.xingcheng table {
border-left: 1px solid #966335;
border-top: 1px solid #966335;
font-size: 14px;
color: #574d4d;
line-height: 24px;
background: #fff;
}
.xingcheng table th {
background: #966335;
height: 33px;
font-size: 17px;
color: #fff;
text-align:center;
}
.xingcheng table th, .xingcheng table td {
border-right: 1px solid #966335;
border-bottom: 1px solid #966335;
}
.canshi {
background: #e7e6e6;
padding: 0 12px;
height: 28px;
line-height: 28px;
color: #4a4949;
}


.content_view h3 {
	border-bottom:1px solid #000;
	padding-bottom:5px;
	margin-bottom:10px;
}
.block {
border: 1px solid #ccc;
margin-bottom: 10px;
background: #f8f8f8;
}
.block .block_title {
height: 18px;
padding: 10px;
border-bottom: 1px dashed #ccc;
}
.block .block_content {
padding: 10px;
height: 100%;
overflow: hidden;
}
</style>
<div style="width:750px;float:left;" class="xingcheng">
	<div class="content_view" id="content_view_<?php echo $content->nid?>">

		<h1 class="content_title"><?php echo $content->title?></h1>
		<h3><span>行程特色</span></h3>
		<div class="tese">
			<?php echo $content->fields['xcts']->text;?>
		</div>
		<h3>行程详情</h3>
		<div class="content_view_content">
			<div class="content_view_content_body clearfix" id="content_view_content_body">
				<?php echo $content->body?>
			</div>
		</div>
		<h3 style="margin-top:10px;">签证信息</h3>
		<div class="tese">
			<?php echo $content->fields['qzsm']->text;?>
		</div>
		<h3>行程须知</h3>
		<div class="tese">
			<?php echo $content->fields['ctxz']->text;?>
		</div>
		<div class="content_view_links">
			<?php if ($content->comment_count) : ?>
			<?php echo '<a href="#content_view_comment_wrapper">' . t('content', '共 !count 条评论', array('!count' => $content->comment_count)) . '</a>'; ?>
			<?php endif?>
			
			<?php if ($content->is_update) : ?>
			<?php echo l(t('content', '编辑'), 'content/' . $content->type . '/' . $content->nid . '/edit', dd_get_redirect()); ?>
			<?php endif?>

			<?php if ($content->is_delete) : ?>
			<?php echo l(t('content', '删除'), 'content/' . $content->type . '/' . $content->nid . '/delete'); ?>
			<?php endif?>
		</div>

	</div>
</div>
<div style="width:200px;float:right;" id="navigator">
		<div class="block block_module_block" id="block_block_boxes_5">
			<h3 class="block_title">
				旅游咨询
			</h3>
			<div class="block_content">
				<li class="zxkfbg">
						<a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=112267947" target="_blank">
							在线咨询
						</a>
				</li>
				<li class="zxkfbg">
						<a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=112267947" target="_blank">
							在线咨询
						</a>
				</li>
				<li class="zxkfbg">
						<a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=112267947" target="_blank">
							在线咨询
						</a>
				</li>
			</div>
		</div>
		<div class="block block_module_block" id="block_block_boxes_2">
			<h3 class="block_title">
				优质服务
			</h3>
			<div class="block_content">
				<ul class="textlisti">
					<li class="s1">
						针对不同需求的客人量身定制不同的旅游线路。
					</li>
					<li class="s2">
						遵纪守法，敬业爱岗；优质服务，宾客至上；真诚公道，信誉第一。
					</li>
					<li class="s3">
						纯玩团队承诺全程不进旅游购物店，让您远离购物店的烦扰，充分的享受大自然。
					</li>
					<li class="s4">
						提前做好车辆安检，专职司机规范服务。
					</li>
					<li class="s5">
						行程中体验北欧美食，风味独特。
					</li>
					<li class="s6">
						7*24小时，为您提供无微不至的旅游服务。
					</li>
				</ul>
			</div>
		</div>
		<div class="block block_module_block" id="block_block_boxes_2" style="height:100%;overflow:hidden;padding-left:10px;">
			<div class="dingyue mt10"><strong>分享给好友</strong>
				<p>喜欢的话记得告诉亲朋好友哦</p>
				<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
						<a class="bds_tsina" title="分享到新浪微博" href="#"></a>
						<a class="bds_qzone" title="分享到QQ空间" href="#"></a>
						<a class="bds_tqq" title="分享到腾讯微博" href="#"></a>
						<a class="bds_kaixin001" title="分享到开心网" href="#"></a>
						<a class="bds_renren" title="分享到人人网" href="#"></a>
				</div>
			</div>
		</div>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=591810" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
</script>
<script>
	$(function(){
		var _defautlTop = $("#navigator").offset().top - $(window).scrollTop(); 
		//导航距离屏幕左侧距离 
		var _defautlLeft = $("#navigator").offset().left - $(window).scrollLeft(); 
		//导航默认样式记录，还原初始样式时候需要 
		var _width = $("#navigator").width(); 
		var _position = $("#navigator").css('position'); 
		var _top = $("#navigator").css('top'); 
		var _left = $("#navigator").css('left'); 
		var _zIndex = $("#navigator").css('z-index'); 
		//鼠标滚动事件 
		$(window).scroll(function(){ 
			if($(this).scrollTop() > _defautlTop){ 
				//IE6不认识position:fixed，单独用position:absolute模拟 
				if($.browser.msie && $.browser.version=="6.0"){ 
				$("#top").css({'position':'absolute','top':eval(document.documentElement.scrollTop),'left':_defautlLeft,'z-index':99999}); 
				//防止出现抖动 
				$("html,body").css({'background-image':'url(about:blank)','background-attachment':'fixed'}); 
				}else{ 
					$("#navigator").css({'position':'fixed','top':0,'width':_width,'left':_defautlLeft,'z-index':99999}); 
				} 
			}else{ 
				$("#navigator").css({'position':_position,'top':_top,'left':_left,'z-index':_zIndex}); 
			} 
		}); 
	});
</script>