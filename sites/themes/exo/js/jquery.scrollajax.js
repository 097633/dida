jQuery.fn.extend({
  scrollAjax: function(o) {
    var nextUrl = o.firstUrl || '';
    var isAjax = true;

    if (!$('body').is('#scroll-item-loading')) {
      var url = o.loadImage || settings.base_path+'misc/images/loading.gif';
      var _s = Dida.getsize();
      var html = '<div id="scroll-item-loading" style="top:' + (_s[1]/2-20) + 'px;"><img align="absmiddle" src="' + url + '" /></div></div>';
      $('#center .column').append(html);
    }

    var _ajax = function(url) {
      // 防止多页同时请求，造成错乱
      if (isAjax !== true) return;
      isAjax = false;

      $('#scroll-item-loading').show();
      $.ajax({
        type: 'POST',
        data: 'ajax=true',
        url: url,
        dataType: 'json',
        success: function(json) {
	
          if (json.nextUrl) {
            nextUrl = json.nextUrl;
          }
          
          isAjax = true;

          if (json.data.length) {
            for (var i in json.data) {

              $('#center .column').append(json.data[i]);
            } 
          } else {
            // 没有数据了。
          }

          $("#scroll-item-loading").hide();
        },
        error: function() {
          isAjax = true;
          $("#scroll-item-loading").hide();
        }
      })
    }

    $(window).scroll(function(){
      var clientHeight = $(window).height(),
      scrollTop = $(window).scrollTop(),
      scrollHeight = $(document).height();
      if (clientHeight + scrollTop >  scrollHeight-150) {
        _ajax(nextUrl);
      }
    });
  }
});
