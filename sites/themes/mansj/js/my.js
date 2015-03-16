//左右高度自适应
$(document).ready(function () {
	var s1 = $("#sidebar-left").height();
	var mc = $("#center").height();
	if(s1 > 0 && mc > 0){
		if(s1>mc)
			$("#center").height(s1);
		else
			$("#sidebar-left").height(mc);
	}
});