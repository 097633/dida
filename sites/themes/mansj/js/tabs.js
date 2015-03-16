//tabs
$(function(){ 
    $(".ntabs li").eq(0).css("background","#F3F9FC"); 
    $(".ntabs .stab").eq(0).show(); 
    $(".ntabs>ul>li").click(function(i){ 
        $(this).css("background","#F3F9FC").siblings().css("background","#c6dce8"); 
        $(".ntabs .stab").eq($(".ntabs>ul>li").index(this)).show().siblings(".stab").hide(); 
        return false; 
    }) 
}) 
