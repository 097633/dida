// $Id: wb.js 8 2012-05-01 06:01:19Z east $

$(function() {
  $('.wb_ajax_reposts').bind('click', function() {
    var dom = $(this).attr('alt');
    $.post($(this).attr('href'), {op: 'reposts'}, function(html) {
      $(dom).html(html);
    });
    $(this).unbind('click').attr('href', '#');
    return false;
  });
  
  if (Dida.settings.ajax_message) {  
    var id = window.setInterval(function() {
      $.ajax({
        type: 'POST',
        url: '',
        dataType: 'html',
        data: {'logs': 1},
        success: function(html) {
          if (html != 'ok') {
            $('#ajax_message').html(html);
          } else {
            clearInterval(id);
          }
        },
        error: function(e) { alert('error'); }
      });
    }, 1000);
  }
 
});
