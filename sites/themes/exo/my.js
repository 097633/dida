$(function(){
	$(".site_menu_list a").attr('title', '');
	$(".site_menu_list_"+settings.stype+" a").addClass('active');
	$("#index_more").click(function(){
		if($(this).attr('href') == 'javascript:'){
			$("#more1").show();
			$(this).attr('href', '/content/type/news/?page=2');
			return false;
		}else{
			
		}
	})
	$(".gz_search").click(
		function(){
			//$(".searchbox").slideToggle();
			//$("#searchbox").focus();
			if($("#searchbox").val() == '输入关键词回车搜索'){
				$("#searchbox").focus();
				return false;
			}else{
				window.location.href="/search?keyword="+$("#searchbox").val();
			}
		}
	);
	$("#guestbook_node_form_type_submit").click(function(){
		if($("#guestbook_node_form_type_body").val() == ''){
			alert("您的反馈是我们前进的动力，谢谢。");
			$("#guestbook_node_form_type_body").focus();
			return false;
		}
	});
	$("#comment_form_type_button").click(function(){
		if($("#comment_form_type_body").val() == ''){
			alert("评论内容不能为空");
			return false;
		}
	});
	$("#qrcode").hover(
		function(){
			$(".qrimg").show();
			$(this).addClass('qrcoded');
		},
		function(){
			$(".qrimg").hide();
			$(this).removeClass('qrcoded');
		}
	);
	$(".gz_search").hover(
		function(){
			$(this).addClass('gz_searchd');
			$(".searchbox").show("fast");
		},
		function(){
			$(this).removeClass('gz_searchd');
		}
	);
	$(".gz_qq").hover(
		function(){
			$(this).addClass('gz_qqd');
		},
		function(){
			$(this).removeClass('gz_qqd');
		}
	);
	$(".gz_sina").hover(
		function(){
			$(this).addClass('gz_sinad');
		},
		function(){
			$(this).removeClass('gz_sinad');
		}
	);
	$(".gz_rss").hover(
		function(){
			$(this).addClass('gz_rssd');
		},
		function(){
			$(this).removeClass('gz_rssd');
		}
	);
	$(".front_term_list").hover(
		function(){
			$(this).find(".fshare").addClass('wbhover');
		},
		function(){
			$(this).find(".fshare").removeClass('wbhover');
		}
	);
	$(".user_login_form .hittt").click(function(){
		if($(this).hasClass('mhited')){
			$(this).removeClass('mhited').addClass('mhit');
		}else{
			$(this).removeClass('mhit').addClass('mhited');
		}
	})
	$("#content_form_type_fields_xiangguan").change(function(){
		$("#content_form_type_fields_xiangguan option:selected").each(function () {
			tid = $(this).val();
			$.ajax({
			type:'POST',
			url:'/xgajax',
			data:{tid:tid},//url和data等价,url:'bbs.php?fid='+fid+'&page='+page
			//contentType:'text/html;charset=utf-8',//编码格式
			beforeSend:function(data){
			},//发送请求前
			success:function(data){
			  //alert(data);
			  $('#content_form_fields_xiangguan .description').html(data);
			},//请求成功后
			error:function(data){
				$('#content_form_fields_xiangguan .description').html('error');
			},//请求错误
			complete:function(data){
			}//请求完成
			});
			return false;
    });
	});
	if(settings.user_is_login == false){
		$('#comment_form_type_body').addClass('need_login');
	}
	$('.need_login').live('click', function(){
		var opt = {};
		var redirect = $(".cnum a").attr('href');
		opt.title = '请您登录';
		opt.modal = true;
		opt.iframe = true;
		opt.width = 470;
		opt.height = 330;
		opt.url = '/user/login/ajax&redirect='+redirect;
		Dida.dialog(opt);

		return false;
	});
	$(".ding").click(function(){
		$.getJSON($(this).attr('alt'),function(data){
			if(typeof data.iid != "undefined"){
				$('.ding').html(data.statistics.count);
				$('.ding').addClass('dinged');
			}
			if(typeof data.text != "undefined"){
				alert(data.text);
				$('.ding').addClass('dinged');
			}
		})
	});
	$(".cai").click(function(){
		$.getJSON($(this).attr('alt'),function(data){
			if(typeof data.iid != "undefined"){
				$('.cai').html(data.statistics.count);
				$('.cai').addClass('caied');
			}
			if(typeof data.text != "undefined"){
				alert(data.text);
				$('.cai').addClass('caied');
			}
		})
	});
	$(".remen_list:last").css({"border":"none"});
	$(".shouc").click(function(){
		if($(this).hasClass('canged')){
			$.getJSON('/?q=voteapi/delete/'+$(this).attr('iid'),function(data){
				$('.canged').removeClass('canged').addClass('cang');
			})
		}else{
			$.getJSON($(this).attr('alt'),function(data){
				if(typeof data.iid != "undefined"){
					$('.cang').attr('iid', data.iid)
					$('.cang').removeClass('cang').addClass('canged');
				}
				if(typeof data.text != "undefined"){
					alert(data.text);
				}
			})
		}
	});
	$(".rss_term_list .headline2 input:text").click(function(){
		$(this).focus();
		$(this).select();
	})
	$("#content_form_fields_tags .description").click(function(){
		alert('未开发完成，先把文章id复制到相关阅读里');
		return false;
		if($("#content_form_type_fields_tags").val() == ''){
			alert('标签未填写');
			return false;
		}
		var rtnValue=  window.showModalDialog("/?q=xgyd&tags="+$("#content_form_type_fields_tags").val(), window,
		 "unadorned:yes;help:no;scroll:yes;status:yes;"
		 + "dialogWidth:800"     //宽
		 + "px;dialogHeight:600" //高
		 + "px;center:yes;");
		//$("#content_form_type_fields_xgyd").val(rtnValue);
		alert('未开发完成，先把文章id复制到相关阅读里');

		return false;
	});
	$("blockquote").each(function(){
		var yinyong = '<div class="yytop"></div><div id="yinyongcon">'+$(this).html()+'</div><div class="yybom"></div>';
		$(this).html(yinyong);
	})
	
	$(".user_login_form_type_his").click(function(){
		if($(this).attr('checked')==true){
			
		}else{
			$(this).addClass("jzmm");
		}
	})
	$(".mcomment_quote").click(function(){
		var cid = $(this).attr('alt');
		if (cid) {
			var root = $(this).closest('.comment_view');
			if (root) {
				root.find('.rep_box').toggle("fast");
				var q = root.find('.blue').eq(0).find('a').text();
				q = '[yinyong@' + q.replace(/\s/ig, '')+'='+cid+']';
				if (q) {
					$(this).parent().parent().next().find("textarea").focus();
					$(this).parent().parent().next().find("textarea").html(q);
				}
			}
		}
	})
	$(".mcomment_replay").click(function(){
		var cid = $(this).attr('alt');
		if (cid) {
			var root = $(this).closest('.comment_view');
			if (root) {
				root.find('.rep_box').toggle("fast");
				var q = root.find('.blue').eq(0).find('a').text();
				q = '[comment@' + q.replace(/\s/ig, '')+'='+cid+']';
				if (q) {
					$(this).parent().parent().next().find("textarea").focus();
					$(this).parent().parent().next().find("textarea").html(q);
				}
			}
		}
	})
	$(".csubmit").click(function(){
		var con = $(this).parent().prev().val();
		var pid = $(this).prev().val();
		var name = $("#comment_form_type_name").val();
		var ext_id = $("#comment_form_type_ext_id").val();
		var ext_type = $("#comment_form_type_ext_type").val();
		if(con != '' && pid != ''){
			$.post('/?q=content/comment/replay',{body:con,pid:pid,name:name,ext_id:ext_id,ext_type:ext_type},function(msg){
				window.location.href=msg;
			});
			return false;
		}
	});
})

//设置字体大小
function SetFont(size)
{
	var divBody = document.getElementById("content_view_content_body");
	if(!divBody)
	{
	  	return;
	}
	divBody.style.fontSize = size + "px";
	var divChildBody = divBody.childNodes;
	for(var i = 0; i < divChildBody.length; i++)
	{
		if (divChildBody[i].nodeType==1)
		{
			divChildBody[i].style.fontSize = size + "px";
		}
	}
}

function tabs(obj){
	$("."+obj+" .stab").eq(0).show().siblings(".stab").hide();; 
	$("."+obj+">ul>li").eq(0).addClass("active");
	$("."+obj+">ul>li").hover(function(i){ 
		$(this).addClass("active").siblings().removeClass("active"); 
		$("."+obj+" .stab").eq($("."+obj+">ul>li").index(this)).show().siblings(".stab").hide(); 
		return false; 
	}) 
}
/*
$(document).scroll(function() {
    var s1 = $("#content .span-5").height();
    if ($(document).scrollTop() > 200) {
        $("#subnav").css('top', '10px');
    } else {
        $("#subnav").css('top', '200px');
    }
});
*/