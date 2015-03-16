$(document).ready(function(){
    if($("#front_search_form_type_title")[0].value==""){
        $("#front_search_form_type_title")[0].value="请输入搜索关键词";
        $("#front_search_form_type_title").focus(function(){
            $("#front_search_form_type_title")[0].value="";
        });
    }
    if($("#front_search_form_type_title")[0].value=="请输入搜索关键词"){
        $("#front_search_form_type_title").focus(function(){
            $("#front_search_form_type_title")[0].value="";
        });
    }
});
//搜索表单校验
$(document).ready(function(){
    
    $("#front_search_form_type_title").submit(function(){
        if($("#front_search_form_type_title")[0].value==""){
            alert("请输入搜索关键词");
            return false;
        }
        return true;
    });
}); 