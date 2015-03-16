$(document).ready(function(){
    $('li.mainlevel').mousemove(function(){
        $(this).find('ul').slideDown();
    });
  
    $('li.mainlevel').mouseleave(function(){
        $(this).find('ul').slideUp("fast");
    });
});