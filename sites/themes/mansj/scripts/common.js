$(document).ready(function(){    
    //资讯收藏（详细页）
    //$("a[id^='favourite_detail_']").click(function(){
	  $(".favourite").click(function(){
			var article_id = $(this).attr('title');
			if (settings.user_is_login) {
				if($(this).hasClass('favourited') == ''){
					$.post(Dida.url('mylike/article/article'),{'nid':article_id,'type':'detail', 'value':1, 'ext_id':1},function(msg){
						if(msg.iid != ''){
							$("#favourite_"+article_id).addClass('favourited').html('已收藏');
						}
					},"json");
				}else{
					alert('您已经收藏过');
				}
			}else{
				window.location.href = Dida.url('user/login', {redirect: Dida.url('article/'+article_id)});
			}
    });
    
    //喜欢此资讯（列表页）
    $('.love_2').click(function(){
			var article_id = $(this).attr('title');
			if($(this).hasClass('liked') == ''){
				$(this).addClass('liked');
				$.post(Dida.url('mylike/article/article'),{'nid':article_id,'type':'detail', 'value':1, 'ext_id':2},function(msg){
					$(this).html('aaa');
				},"json");
			}else{
				alert('您已经喜欢过');
			}
    });
    
    //喜欢此资讯（详细页）
	  $("#article_detail_like").click(function(){
			var article_id = $(this).attr('title');
			if($(this).hasClass('liked') == ''){
				$.post(Dida.url('mylike/article/article'),{'nid':article_id,'type':'detail', 'value':1, 'ext_id':2},function(msg){
					if(msg.iid != ''){
						$(this).addClass('liked');
					}
				},"json");
			}else{
				alert('您已经喜欢过');
			}
    });
    
    //资讯评论（详细页）
    $('#article_comment_btn').click(function(){
        var article_id = $('#article_id').val();
        var article_comment = $('#article_comment').val();
        if(article_comment != ''){
            $.post('/articles/article_comment_add',{'article_id':article_id,'article_comment':article_comment},function(msg){
                if(msg.flag == 'guest'){
                    alert(msg.info);
                    window.location.href='/members/login/article_' + article_id;
                } else {
                    alert(msg.info);
                    window.location.href='/articles/article_detail/' + article_id + '.html';
                }
            },"json");
        }else{
            alert('请您输入评论内容');
        }
        
    });
    
    //回复资讯评论（详细页）
    $("a[id^='article_comment_reply_link_']").click(function(){
        var id = $(this).attr('id');
        id = id.substring(27,id.length);
        $('#reply_comment_'+id).show();
    });
    $("a[id^='article_comment_reply_btn_']").click(function(){
        var id = $(this).attr('id');
        id = id.substring(26,id.length);
        var comment_id = $('#comment_id_'+id).val();
        var reply_comment_content = $('#reply_comment_content_'+id).val();
        var article_id = $('#article_id').val();
        if(reply_comment_content != ''){
            $.post('/articles/article_comment_reply_add',{'article_id':article_id,'comment_id':comment_id,'reply_comment_content':reply_comment_content},function(msg){
                if(msg.flag == 'guest'){
                    alert(msg.info);
                    window.location.href='/members/login/article_' + article_id;
                } else {
                    alert(msg.info);
                    window.location.href='/articles/article_detail/' + article_id + '.html';
                }
            },"json");
        }else{
            alert('请您输入回复内容');
        }
        
    });
    $("a[id^='article_comment_reply_close_']").click(function(){
        var id = $(this).attr('id');
        id = id.substring(28,id.length);
        $('#reply_comment_'+id).hide();
    });
	
	
    
	//用户中心回复资讯
    $("a[id^='marticle_comment_reply_link_']").click(function(){
        var id = $(this).attr('id');
        id = id.substring(28,id.length);
        $('#reply_comment_'+id).show();
    });
    $("a[id^='marticle_comment_reply_btn_']").click(function(){
        var id = $(this).attr('id');
        id = id.substring(27,id.length);
        var comment_id = $('#comment_id_'+id).val();
        var reply_comment_content = $('#reply_comment_content_'+id).val();
		var article_id = $("#article_id_"+id).val();
        if(reply_comment_content != ''){
            $.post('/articles/marticle_comment_reply_add',{'article_id':article_id,'comment_id':comment_id,'reply_comment_content':reply_comment_content},function(msg){
				alert(msg.info);
				window.location.href='/members/member_receive_comments';
            },"json");
        }else{
            alert('请您输入回复内容');
        }
        
    });
    $("a[id^='article_comment_reply_close_']").click(function(){
        var id = $(this).attr('id');
        id = id.substring(28,id.length);
        $('#reply_comment_'+id).hide();
    });
	
    //喜欢此活动（列表页）
    $('.love').click(function(){
        var party_id = $(this).attr('id');
        $.post('/parties/party_like',{'party_id':party_id,'type':'list'},function(msg){
            $("#" + party_id).html('赞(' + msg.info + ')');
        },"json");
    });
    
    //喜欢此活动（详细页）
    $("a[id^='party_detail_like_']").click(function(){
        var party_id = $(this).attr('id');
        $.post('/parties/party_like',{'party_id':party_id,'type':'detail'},function(msg){
            $("#" + party_id).html(msg.info);
        },"json");
    });
    
    //活动评论（详细页）
    $('#party_comment_btn').click(function(){
        var party_id = $('#party_id').val();
        var party_comment = $('#party_comment').val();
        if(party_comment != ''){
            $.post('/parties/party_comment_add',{'party_id':party_id,'party_comment':party_comment},function(msg){
                if(msg.flag == 'guest'){
                    alert(msg.info);
                    window.location.href='/members/login/party_' + party_id;
                } else {
                    alert(msg.info);
                    window.location.href='/parties/party_detail/' + party_id + '.html';
                }
            },"json");
        }else{
            alert('请您输入评论内容');
        }
        
    });
    
    //回复活动评论（详细页）
    $("a[id^='party_comment_reply_link_']").click(function(){
        var id = $(this).attr('id');
        id = id.substring(25,id.length);
        $('#reply_comment_'+id).show();
    });
    $("a[id^='party_comment_reply_btn_']").click(function(){
        var id = $(this).attr('id');
        id = id.substring(24,id.length);
        var comment_id = $('#comment_id_'+id).val();
        var reply_comment_content = $('#reply_comment_content_'+id).val();
        var party_id = $('#party_id').val();
        if(reply_comment_content != ''){
            $.post('/parties/party_comment_reply_add',{'party_id':party_id,'comment_id':comment_id,'reply_comment_content':reply_comment_content},function(msg){
                if(msg.flag == 'guest'){
                    alert(msg.info);
                    window.location.href='/members/login/party_' + party_id;
                } else {
                    alert(msg.info);
                    window.location.href='/parties/party_detail/' + party_id + '.html';
                }
            },"json");
        }else{
            alert('请您输入回复内容');
        }
        
    });
    $("a[id^='party_comment_reply_close_']").click(function(){
        var id = $(this).attr('id');
        id = id.substring(26,id.length);
        $('#reply_comment_'+id).hide();
    });

    //参加活动
    $('#join_party').click(function(){
        var party_id = $('#party_id').val();
        $.post('/parties/party_join',{'party_id':party_id},function(msg){          
            if(msg.flag == 'guest'){
                alert(msg.info);
                window.location.href='/members/login/party_' + party_id;
            } else {
                window.location.href='/parties/party_join_form/' + msg.info;
            }        
        },"json");
    });
    $('#join_party_disable').click(function(){
        $(this).html('已经结束');
    });
    
    //慢发现
    $('.digg').click(function(){
        var article_id = $(this).attr('id');
        $.post('/articles/article_like',{'article_id':article_id,'type':'list'},function(msg){
            $("#" + article_id).html('<em><strong>' + msg.info + '</strong></em>');
        },"json");
    });
    
    //关注会员
    $('#member_follow').click(function(){
        var member_follow_id = $("input[name='member_follow_id']").val();
        
        $.post('/members/member_follow',{'member_follow_id':member_follow_id},function(msg){
            if(msg.flag == 'guest'){
                alert(msg.info);
                window.location.href='/members/login/member_detail_' + member_follow_id;
            } else {
                $('#member_follow a').html(msg.info);
            }
        },"json");
    });
    
    //取消关注
    $('#member_follow_remove').click(function(){
        var member_follow_id = $("input[name='member_follow_id']").val();
        
        $.post('/members/member_follow_remove',{'member_follow_id':member_follow_id},function(msg){
            if(msg.flag == 'guest'){
                alert(msg.info);
                window.location.href='/members/login/member_detail_' + member_follow_id;
            } else {
                $('#member_follow_remove a').html(msg.info);
            }
        },"json");
    });
});