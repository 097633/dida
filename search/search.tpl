<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php if (!empty($q)) echo "搜索：" . strip_tags($q) . " - "; ?>Xingzuo 搜索 - Powered by xunsearch</title>
  <link rel="shortcut icon" href="/misc/images/favicon.ico" type="image/x-icon" />
<link rel="bookmark" href="/misc/images/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
  <link type="text/css" rel="stylesheet" media="all" href="/modules/system/system.css?1410012093" />
<link type="text/css" rel="stylesheet" media="all" href="/misc/dida.css?1410012093" />
<link type="text/css" rel="stylesheet" media="all" href="/sites/themes/exo/css/style.css?1410012093" />

<script type="text/javascript">
<!--//--><![CDATA[//><!--
$(function() {$('.site_menu').menuLevel();;});
//--><!]]>
</script>
</head>
<body id="mbody">
	<div id="top"></div>
	<div id="wapp">
	<div id="wrapper"><div class="page_wrapper_search">
		<div id="header">
			<div class="top_right">
				<div class="top_user">
				
				</div>
			</div>
			<div class="banico">
									<span class="login"><a href="/user/center">个人中心</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span><a href="/user/logout">登出</a></span>
							</div>
			<a href="/" title="回到 兔八哥算命网 首页" class="logo" alt="兔八哥算命网">
        <img src="/sites/themes/exo/images/logo.jpg" width="238" />
      </a>
			<div style="position: absolute;right:70px;">
				<form id="searchForm" name="searchForm" method="get" action="/search" onsubmit="return checkSearchForm()">
				<input class="fltext" id="txtKeyWord" onclick="if(this.value=='请输入关键字') this.value=''" value="请输入关键字" name="q">
				<input type="hidden" name="s" value="relevance" />
				<input type="hidden" name="m" value="yes" />
				<input type="hidden" name="f" value="_all" />
				&nbsp;&nbsp;<input type="submit" value="搜索一下">
				</form>
				<div class="breci">
					热门搜索 ：
					<a href="/search?keyword=梦见小河">梦见小河</a>
					</div>
			</div>
			<div class="menu"><ul class="site_menu"><li class="site_menu_list site_menu_list_front first"><a href="/" title="首页">首页</a></li>
<li class="site_menu_list site_menu_list_8"><a href="/category/8" title="情书大全">情书大全</a></li>
<li class="site_menu_list site_menu_list_9"><a href="/category/9" title="姓名大全">姓名大全</a></li>
<li class="site_menu_list site_menu_list_10"><a href="/category/10" title="中国民俗">中国民俗</a></li>
<li class="site_menu_list site_menu_list_7"><a href="/category/7" title="心理测试">心理测试</a></li>
<li class="site_menu_list site_menu_list_5"><a href="/category/5" title="四柱八字">四柱八字</a></li>
<li class="site_menu_list site_menu_list_2"><a href="/category/2" title="周公解梦">周公解梦</a></li>
<li class="site_menu_list site_menu_list_3"><a href="/category/3" title="星座大全">星座大全</a></li>
<li class="site_menu_list site_menu_list_4"><a href="/category/4" title="风水知识">风水知识</a></li>
<li class="site_menu_list site_menu_list_6 last"><a href="/category/6" title="算命大全">算命大全</a></li>
</ul>
</div>
    </div>    
    <div id="main"> 
      
<div class="container">
  <div class="row">
	<!-- search form -->
    <div class="span12">
      <form class="form-search" id="q-form" method="get" style="margin:0 auto;padding-top:20px;">
        <div class="input-append" id="q-input">
          <input type="text" class="span6 search-query" name="q" title="输入任意关键词皆可搜索" value="<?php echo htmlspecialchars($q); ?>">
          <button type="submit" class="btn">搜索</button>
        </div>
        <div class="condition" id="q-options">
          <label class="radio inline"><input type="radio" name="f" value="title" <?php echo $f_title; ?> />Title</label>
          <label class="radio inline">
            <input type="radio" name="f" value="_all" <?php echo $f__all; ?> />全文
          </label>
          <label class="checkbox inline">
            <input type="checkbox" name="m" value="yes" <?php echo $m_check; ?> />模糊搜索 
          </label>
          <label class="checkbox inline">
            <input type="checkbox" name="syn" value="yes" <?php echo $syn_check; ?> />同义词
          </label>
          按
          <select name="s" size="1">
            <option value="relevance">相关性</option>
			
          </select>
          排序
		</div>
      </form>
    </div>

    <!-- begin search result -->
    <?php if (!empty($q)): ?>
    <div class="span12">
      <!-- neck bar -->
      <?php if (!empty($error)): ?>
      <p class="text-error"><strong>错误：</strong><?php echo $error; ?></p>
	  <?php else: ?>
	  <p class="result">大约有<b><?php echo number_format($count); ?></b>项符合查询结果，库内数据总量为<b><?php echo number_format($total); ?></b>项。（搜索耗时：<?php printf('%.4f', $search_cost); ?>秒） [<a href="<?php echo "$bu&o=$o&n=$n&xml=yes"; ?>" target="_blank">XML</a>]</p>
      <?php endif; ?>
      
      <!-- fixed query -->
      <?php if (count($corrected) > 0): ?>
      <div class="link corrected">
        <h4>您是不是要找：</h4>
        <p>
          <?php foreach ($corrected as $word): ?>
          <span><a href="<?php echo $_SERVER['SCRIPT_NAME'] . '?q=' . urlencode($word); ?>" class="text-error"><?php echo $word; ?></a></span>
          <?php endforeach; ?>
        </p>
      </div>
      <?php endif; ?>
      
      <!-- empty result -->
      <?php if ($count === 0 && empty($error)): ?>
      <div class="demo-error">
        <p class="text-error">找不到和 <em><?php echo htmlspecialchars($q); ?></em> 相符的内容或信息。</p>
        <h5>建议您：</h5>
        <ul>
          <li>1.请检查输入字词有无错误。</li>
          <li>2.请换用另外的查询字词。</li>
          <li>3.请改用较短、较为常见的字词。</li>
        </ul>
      </div>
      <?php endif; ?>
      
      <!-- result doc list -->
      <dl class="result-list">
        <?php foreach ($docs as $doc): ?>
        <dt>
          <a href="/article/<?php echo $doc->nid; ?>.html" target="_blank"><h4><?php echo $doc->rank(); ?>. <?php echo $search->highlight(htmlspecialchars($doc->title)); ?> <small>[<?php echo $doc->percent(); ?>%]</small></h4></a>          
        </dt>
        <dd>
          <p><?php echo $search->highlight(htmlspecialchars($doc->body)); ?></p>
          <p class="field-info text-error">
            
          </p>
        </dd>
        <?php endforeach; ?>
      </dl>
      
      <!-- pager -->
      <?php if (!empty($pager)): ?>
      <div class="pagination pagination-centered">
        <ul>
          <!--<li><a href="#">Prev</a></li>-->
          <?php echo $pager; ?>
          <!--<li><a href="#">Next</a></li>-->
        </ul>
      </div>
      <?php endif; ?>

    </div>
    <?php endif; ?>
    <!-- end search result -->
  </div>
</div>

<!-- hot search -->
<?php if (count($hot) > 0): ?>
<section class="link">
  <div class="container">
    <h4>热门搜索:</h4>
    <p>
      <?php foreach($hot as $word => $freq): ?>
      <span><a href="<?php echo $_SERVER['SCRIPT_NAME'] . '?q=' . urlencode($word); ?>"><?php echo $word; ?></a></span>
      <?php endforeach; ?>	
    </p>
  </div>
</section>
<?php endif; ?>

<!-- related query -->
<?php if (count($related) > 0): ?>
<section class="link">
  <div class="container">
    <h4>相关搜索:</h4>
    <p>
      <?php foreach ($related as $word): ?>
      <span><a href="<?php echo $_SERVER['SCRIPT_NAME'] . '?q=' . urlencode($word); ?>"><?php echo $word; ?></a></span>
      <?php endforeach; ?>	
	</p>
  </div>
</section>
<?php endif; ?>

<!-- footer -->
<footer>
  <div class="container">
    <p>(C)opyright 2011 - Xingzuo search - 页面处理总时间：<?php printf('%.4f', $total_cost); ?>秒<br>
  </div>
</footer>
			
		</div>
	</div>
</div>
</div>
<div id="copy">
<p class="debug_php_info">执行时间：5.7527780532837 秒，占用内存 <em>8517472</em> bytes，约为 <em>8.12289</em> MB</p></div>
<div class="go">
	<a title="返回顶部" class="gotop" href="javascript:"></a>
	<a title="欢迎您给我留言！" class="feedback" href="/guestbook"></a>
	<a title="前往底部" class="gobottom" href="javacript:"></a>
</div>
<script>
$('.gotop').click(function(){
	$('html, body').animate({scrollTop: $('#mbody').offset().top}, 500);
	return false;
});
$('.gobottom').click(function(){
	$('html, body').animate({scrollTop: $('#copy').offset().top}, 500);
	return false;
});
</script></body>
</html>