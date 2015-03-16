-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1:3306
-- 生成日期: 2015 年 02 月 07 日 12:03
-- 服务器版本: 5.5.27
-- PHP 版本: 5.3.16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zsite_sina_blog_com`
--

-- --------------------------------------------------------

--
-- 表的结构 `ad`
--

CREATE TABLE IF NOT EXISTS `ad` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键，自增型',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '网站名称',
  `adname` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `stime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `etime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间',
  `body` mediumtext COMMENT '广告内容',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建者',
  `created` varchar(12) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 导出表中的数据 `ad`
--

INSERT INTO `ad` (`nid`, `title`, `adname`, `url`, `stime`, `etime`, `body`, `uid`, `created`) VALUES
(1, 'ad1首页头部960x70', '网站首页_通栏广告_通栏01', 'ss', 1398268800, 1412006400, '<a href="http://item.jd.com/11449807.html" title="决战第四屏" target="_blank"><img src="/sites/files/user-1/2014-05/车联网海报修改2-05.jpg"></a>', 0, '1400046242'),
(2, 'ad6首页右侧300x130', '首页_按钮广告_按钮01', '#', 1398700800, 1399305600, '<a href="/tags/北京车展" target="_blank"><img src="/sites/files/user-205/2014-04/未标题-1.jpg" alt="" title="" /></a>', 0, '1399461646'),
(3, '文章页ad2右侧上部300x260', '栏目页_按钮广告_按钮03', 'http://www.cheyun.com/tags/%E5%8C%97%E4%BA%AC%E8%BD%A6%E5%B1%95', 1396454400, 1398787200, '<a href="http://www.cheyun.com/tags/%E5%8C%97%E4%BA%AC%E8%BD%A6%E5%B1%95" target="_blank"><img src="/sites/files/user-205/2014-04/2050_QQ图片20140420041414.jpg" alt="2014北京车展" title="2014北京车展"/></a>', 0, '1397940147'),
(4, 'ad3除首页右侧下部300x400', '', '', 1394812800, 1394553600, '<embed type="application/x-shockwave-flash" class="edui-faked-video" pluginspage="http://www.macromedia.com/go/getflashplayer" src="/sites/files/ad/ad3.swf" width="300" height="260" align="none" wmode="transparent" play="true" loop="true" menu="false" allowscriptaccess="never" allowfullscreen="true" />', 0, '1394972854'),
(5, 'ad5正文底部609x100', '', '', 1381593600, 1381593600, 'ad5', 0, '1381716653'),
(6, '首页文章列表头部', '', '', 1381593600, 1381593600, '', 0, '1381716703'),
(7, '首页文章列表中部', '', '', 1381593600, 1381593600, '', 0, '1381716718'),
(8, '首页文章列表底部', '', '', 1381593600, 1381593600, '', 0, '1381716730'),
(9, '车云会第8期', 'aaa', 'aaa', 1396540800, 1397232000, '本期主题《自动驾驶，从技术到商业》', 0, '1396575899'),
(10, 'ad2除首页广告位新闻，科技频道右栏上300x260', '福特翼虎频道广告', 'http://www.kuga.ford.com.cn/', 1395590400, 1395936000, '<embed type="application/x-shockwave-flash" class="edui-faked-video" pluginspage="http://www.macromedia.com/go/getflashplayer" src="/sites/files/ad/ad31.swf" width="300" height="260" align="none" wmode="transparent" play="true" loop="true" menu="false" allowscriptaccess="never" allowfullscreen="true" />', 0, '1395648182'),
(11, '新闻/科技/观点频道通栏广告', '新闻/科技/观点频道通栏广告', 'http://8cv33a.c.admaster.com.cn/c/a18363,b200376303,c3957,i0,m101,h', 1398268800, 1398614400, '<a href="/ad?id=11" title="ds" target="_blank"><img src="/sites/files/user-1/2014-04/ddd.jpg"></a>', 0, '1398326750');

-- --------------------------------------------------------

--
-- 表的结构 `adsum`
--

CREATE TABLE IF NOT EXISTS `adsum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adid` int(11) NOT NULL,
  `adname` varchar(255) NOT NULL DEFAULT '',
  `sum` int(11) NOT NULL,
  `dtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- 导出表中的数据 `adsum`
--

INSERT INTO `adsum` (`id`, `adid`, `adname`, `sum`, `dtime`) VALUES
(1, 1, '福特翼虎首页通栏', 20920, 0);

-- --------------------------------------------------------

--
-- 表的结构 `alias`
--

CREATE TABLE IF NOT EXISTS `alias` (
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '系统路径',
  `type` varchar(8) NOT NULL DEFAULT '' COMMENT '扩展字段',
  `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展字段',
  `alias` varchar(255) NOT NULL DEFAULT '' COMMENT '别名',
  PRIMARY KEY (`path`),
  UNIQUE KEY `alias` (`alias`),
  KEY `tid` (`type`,`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='自定义路径';

--
-- 导出表中的数据 `alias`
--

INSERT INTO `alias` (`path`, `type`, `tid`, `alias`) VALUES
('category/1', 'system', 0, 'news'),
('category/2', 'system', 0, 'keji'),
('category/3', 'system', 0, 'guandian');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键，自增型',
  `ext_id` int(10) unsigned DEFAULT '0' COMMENT '主键，自增型',
  `ext_id2` int(10) unsigned DEFAULT '0' COMMENT '主键，自增型',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '标题',
  `referer` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `fid` int(10) unsigned DEFAULT '0' COMMENT '缩略图id',
  `flag` varchar(12) NOT NULL DEFAULT '' COMMENT '推荐位',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '点击数',
  `description` mediumtext COMMENT '描述',
  `body` longtext COMMENT '正文',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '作者 id',
  `format` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '输入格式',
  `created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表时间',
  `updated` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '发布状态',
  PRIMARY KEY (`nid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `article`
--

INSERT INTO `article` (`nid`, `ext_id`, `ext_id2`, `title`, `referer`, `fid`, `flag`, `click`, `description`, `body`, `uid`, `format`, `created`, `updated`, `status`) VALUES
(1, 0, 0, '2014年处暑是几月几日：2014年8月23日', '', 0, 't', 399, '', '<p><strong>2014年处暑是几月几日：2014年8月23日</strong><br /><br />2014年处暑时间：2014年8月23日 12:45 - 2014年9月8日 01:01<br />阳历时刻：2014年8月23日 12:45:58<br />阴历日期：七月(小) 廿八 星期六<br /><br /><strong>2014年-2031年处暑时间表</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><table style="width:542px;height:278px" border="1" cellspacing="0" cellpadding="0"><tbody><tr><td>2014年处暑时间</td><td>8月23日 <br />12:45:58</td><td>2015年处暑时间</td><td>8月23日 <br />18:37:15</td><td>2016年处暑时间</td><td>8月23日 <br />00:38:26</td></tr><tr><td>2017年处暑时间</td><td>8月23日 <br />06:20:09</td><td>2018年处暑时间</td><td>8月23日 <br />12:08:30</td><td>2019年处暑时间</td><td>8月23日 <br />18:01:53</td></tr><tr><td>2020年处暑时间</td><td>8月22日 <br />23:44:48</td><td>2021年处暑时间</td><td>8月23日 <br />05:34:48</td><td>2022年处暑时间</td><td>8月23日<br />11:15:59</td></tr><tr><td>2023年处暑时间</td><td>8月23日 <br />17:01:06</td><td>2024年处暑时间</td><td>8月22日 <br />22:54:48</td><td>2025年处暑时间</td><td>8月23日<br />04:33:35</td></tr><tr><td>2026年处暑时间</td><td>8月23日 <br />10:18:31</td><td>2027年处暑时间</td><td>8月23日 <br />16:13:59</td><td>2028年处暑时间</td><td>8月22日 <br />22:00:35</td></tr><tr><td>2029年处暑时间</td><td>8月23日 <br />03:51:14</td><td>2030年处暑时间</td><td>8月23日 <br />09:36:00</td><td>2031年处暑时间</td><td>8月23日 <br />15:22:54<br /></td></tr></tbody></table><p><br /><br />处暑，二十四节气之一。处暑节气在每年八月二十三日左右。此时太阳到达黄经150°。据《月令七十二候集解》说：“处，去也，暑气至此而止矣。”意思是炎热的夏天即将过去了。虽然，处暑前后我国北京、太原、西安、成都和贵阳一线以东及以南的广大地区和新疆塔里木盆地地区日平均气温仍在摄氏二十二度以上，处于夏季，但是这时冷空气南下次数增多，气温下降逐渐明显。<br /><br />我国古代将处暑分为三候：<br />一候鹰乃祭鸟；<br />二候天地始肃；<br />三候禾乃登。<br />意思是说，到此节气时老鹰已经开始大量捕猎鸟类，并像祭祀那样陈列食物；接着天地间万物开始凋零，到处充满了肃杀的气氛；再过几天，黍、稷、粱等类农作物也开始成熟了。</p><p><br /></p>', 1, 2, 1410028652, 1423281051, 1),
(2, 0, 0, '2014中秋节是几月几号：2014年9月8日', '', 0, 's', 225, '', '<p><strong>2014中秋节是几月几号：2014年9月8日</strong><br /><br />2014年9月8日 农历 八月十五 星期一 中秋节<br /><br />中秋节是9月8日，放1天假，与周六周日连休3天。分别是9月6日、9月7日、9月8日休假。<br />中秋节又称月夕、秋节、仲秋节、八月节、八月会、追月节、玩月节、拜月节、女儿节或团圆节，是流行于中国众多民族与东亚诸国中的传统文化节日，时在农历八月十五；因其恰值三秋之半，故名，也有些地方将中秋节定在八月十六。2014年中秋节是9月8号。<br /><br /><br /><strong>2014年中秋节放几天假?</strong><br />根据国务院最新发布的关于《2014年部分节假日安排的通知规定：2014年的中秋节是9月8日，刚好是周一。也就是说，按照国务院规定，中秋节与9月6日周六、9月7日周日连休，放3天假的。不需要调休，不需要补班。<br /><br /><strong>中秋节的由来：</strong><br />每年农历八月十五日，是传统的中秋佳节。这时是一年秋季的中期，所以被称为中秋。在中国的农历里，一年分为四季，每季又分为孟、仲、季三个部分，因而中秋也称仲秋。八月十五的月亮比其他几个月的满月更圆，更明亮，所以又叫做“月夕”，“八月节”。<br />在古代人们看来,月亮是仅次于太阳的神灵,一直是人们重要的崇拜对象。北京的月坛就是明清皇帝祭月的场所,颐和园也是清朝慈禧太后率领大臣、宫女祭拜月神的场所。</p>', 1, 2, 1410028324, 1423281031, 1);

-- --------------------------------------------------------

--
-- 表的结构 `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(64) NOT NULL DEFAULT '' COMMENT '模块名称',
  `theme` varchar(64) NOT NULL DEFAULT '' COMMENT '主题名称',
  `region` varchar(64) NOT NULL DEFAULT '' COMMENT '区域标识',
  `delta` varchar(32) NOT NULL DEFAULT '' COMMENT '模块内部编号',
  `title` varchar(64) NOT NULL DEFAULT '' COMMENT '默认标题',
  `weight` int(11) NOT NULL DEFAULT '0' COMMENT '权重 id',
  `visibility` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示',
  `cache` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否缓存',
  `settings` longtext COMMENT '其它设置',
  PRIMARY KEY (`bid`),
  UNIQUE KEY `tmd` (`theme`,`module`,`delta`),
  KEY `list` (`theme`,`region`,`weight`,`visibility`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='区块' AUTO_INCREMENT=102 ;

--
-- 导出表中的数据 `blocks`
--

INSERT INTO `blocks` (`bid`, `module`, `theme`, `region`, `delta`, `title`, `weight`, `visibility`, `cache`, `settings`) VALUES
(1, 'system', 'default', 'left', 'adminLink', '网站管理', -30, 0, 1, 'a:0:{}'),
(2, 'user', 'default', 'left', 'login', '用户登录', -30, 0, 1, 'a:0:{}'),
(4, 'block', 'default', 'left', 'boxes_2', '联系我们', 0, 1, 1, 'a:0:{}'),
(5, 'block', 'default', 'bottom', 'boxes_3', '', 0, 1, 1, 'a:1:{s:7:"display";a:1:{s:4:"body";s:0:"";}}'),
(10, 'system', 'chugui', 'left', 'adminLink', '网站管理', -30, 0, 1, 'a:0:{}'),
(11, 'user', 'chugui', 'left', 'login', '用户登录', -30, 0, 1, 'a:0:{}'),
(13, 'block', 'chugui', 'left', 'boxes_2', '联系我们', 0, 1, 1, 'a:0:{}'),
(14, 'block', 'chugui', 'bottom', 'boxes_3', '', 0, 1, 1, 'a:1:{s:7:"display";a:1:{s:4:"body";s:0:"";}}'),
(15, 'system', 'canting', 'left', 'adminLink', '网站管理', -30, 1, 1, 'a:0:{}'),
(17, 'block', 'canting', '', 'boxes_2', '联系我们', 0, 0, 1, 'a:0:{}'),
(18, 'block', 'canting', '', 'boxes_3', '底部链接', 0, 0, 1, 'a:0:{}'),
(19, 'system', 'jiaju', 'left', 'adminLink', '网站管理', -30, 1, 1, 'a:0:{}'),
(20, 'user', 'jiaju', 'left', 'login', '用户登录', -30, 1, 1, 'a:0:{}'),
(21, 'block', 'jiaju', '', 'boxes_2', '联系我们', 0, 0, 1, 'a:0:{}'),
(22, 'block', 'jiaju', '', 'boxes_3', '底部链接', 0, 0, 1, 'a:0:{}'),
(23, 'system', 'mansj', 'left', 'adminLink', '网站管理', -30, 1, 1, 'a:0:{}'),
(24, 'user', 'mansj', 'left', 'login', '用户登录', -30, 1, 1, 'a:0:{}'),
(25, 'block', 'mansj', '', 'boxes_2', '联系我们', 0, 0, 1, 'a:0:{}'),
(26, 'block', 'mansj', '', 'boxes_3', '底部链接', 0, 0, 1, 'a:0:{}'),
(27, 'system', 'che', 'left', 'adminLink', '网站管理', -30, 0, 1, 'a:0:{}'),
(28, 'user', 'che', 'left', 'login', '用户登录', -30, 0, 1, 'a:0:{}'),
(29, 'block', 'che', '0', 'boxes_2', '联系我们', 0, 0, 1, 'a:0:{}'),
(30, 'block', 'che', '0', 'boxes_3', '底部链接', 0, 0, 1, 'a:0:{}'),
(31, 'article', 'che', 'right', 'top_article', '热点文章', -30, 0, 1, 'a:0:{}'),
(32, 'article', 'che', 'right', 'rand_article', '随机文章', -30, 0, 1, 'a:0:{}'),
(33, 'article', 'che', 'right', 'guidang_article', '文章归档', -30, 0, 1, 'a:0:{}'),
(34, 'article', 'che', 'right', 'tags_article', '文章标签', -30, 0, 1, 'a:0:{}'),
(35, 'article', 'che', 'right', 'links', '友情链接', 30, 0, 1, 'a:0:{}'),
(36, 'article', 'che', 'right', 'theme_select', '主题选择', 30, 0, 1, 'a:0:{}'),
(37, 'system', 'chedui', '0', 'adminLink', '网站管理', -30, 1, 1, 'a:0:{}'),
(38, 'user', 'chedui', '0', 'login', '用户登录', -30, 1, 1, 'a:0:{}'),
(39, 'block', 'chedui', '0', 'boxes_2', '联系我们', 0, 0, 1, 'a:0:{}'),
(40, 'block', 'chedui', '0', 'boxes_3', '底部链接', 0, 0, 1, 'a:0:{}'),
(41, 'article', 'chedui', 'right', 'top_article', '热点文章', -30, 1, 1, 'a:0:{}'),
(42, 'article', 'chedui', 'right', 'rand_article', '随机文章', -30, 1, 1, 'a:0:{}'),
(43, 'article', 'chedui', 'right', 'guidang_article', '文章归档', -30, 1, 1, 'a:0:{}'),
(44, 'article', 'chedui', 'right', 'tags_article', '文章标签', -30, 1, 1, 'a:0:{}'),
(45, 'article', 'chedui', 'right', 'links', '友情链接', 30, 1, 1, 'a:0:{}'),
(46, 'article', 'chedui', 'right', 'theme_select', '主题选择', 30, 1, 1, 'a:0:{}'),
(47, 'article', 'default', 'right', 'top_article', '热点文章', -30, 1, 1, 'a:0:{}'),
(48, 'article', 'default', 'right', 'rand_article', '随机文章', -30, 1, 1, 'a:0:{}'),
(49, 'article', 'default', 'right', 'guidang_article', '文章归档', -30, 1, 1, 'a:0:{}'),
(50, 'article', 'default', 'right', 'tags_article', '文章标签', -30, 1, 1, 'a:0:{}'),
(51, 'article', 'default', 'right', 'links', '友情链接', 30, 1, 1, 'a:0:{}'),
(52, 'article', 'default', 'right', 'theme_select', '主题选择', 30, 1, 1, 'a:0:{}'),
(53, 'system', 'che1', 'left', 'adminLink', '网站管理', -30, 0, 1, 'a:0:{}'),
(54, 'user', 'che1', 'left', 'login', '用户登录', -30, 0, 1, 'a:0:{}'),
(55, 'block', 'che1', '0', 'boxes_2', '联系我们', 0, 1, 1, 'a:0:{}'),
(56, 'block', 'che1', '0', 'boxes_3', '底部链接', 0, 0, 1, 'a:0:{}'),
(63, 'block', 'che1', '0', 'boxes_4', '合作伙伴', 0, 0, 1, 'a:0:{}'),
(64, 'block', 'che1', '0', 'boxes_5', '推荐话题', 0, 0, 1, 'a:0:{}'),
(71, 'system', 'phone1', 'left', 'adminLink', '网站管理', -30, 0, 1, 'a:0:{}'),
(72, 'user', 'phone1', 'left', 'login', '用户登录', -30, 0, 1, 'a:0:{}'),
(73, 'block', 'phone1', '0', 'boxes_2', '采集微博用户列表', 0, 1, 1, 'a:0:{}'),
(74, 'block', 'phone1', '0', 'boxes_3', '底部链接', 0, 0, 1, 'a:0:{}'),
(75, 'block', 'phone1', '0', 'boxes_4', '投稿须知', 0, 0, 1, 'a:0:{}'),
(76, 'block', 'phone1', '0', 'boxes_5', '推荐话题', 0, 0, 1, 'a:0:{}'),
(89, 'block', 'che1', '0', 'boxes_12', '首页特别策划', 0, 0, 1, 'a:0:{}'),
(90, 'block', 'phone1', '0', 'boxes_12', '广告统计数据', 0, 0, 1, 'a:0:{}'),
(91, 'system', 'exo', 'left', 'adminLink', '网站管理', -30, 0, 1, 'a:0:{}'),
(92, 'user', 'exo', 'left', 'login', '用户登录', -30, 0, 1, 'a:0:{}'),
(93, 'block', 'exo', '0', 'boxes_2', '采集微博用户列表', 0, 0, 1, 'a:0:{}'),
(94, 'block', 'exo', '0', 'boxes_3', '底部链接', 0, 0, 1, 'a:0:{}'),
(95, 'block', 'exo', '0', 'boxes_4', '投稿须知', 0, 0, 1, 'a:0:{}'),
(96, 'block', 'exo', '0', 'boxes_5', '推荐话题', 0, 0, 1, 'a:0:{}'),
(97, 'article', 'exo', 'right', 'top_article', '热点文章', -30, 0, 1, 'a:0:{}'),
(98, 'article', 'exo', 'right', 'rand_article', '随机文章', -30, 0, 1, 'a:0:{}'),
(99, 'article', 'exo', 'right', 'guidang_article', '文章归档', -30, 0, 1, 'a:0:{}'),
(100, 'article', 'exo', 'right', 'tags_article', '文章标签', -30, 0, 1, 'a:0:{}'),
(101, 'article', 'exo', 'right', 'theme_select', '主题选择', 30, 0, 1, 'a:0:{}');

-- --------------------------------------------------------

--
-- 表的结构 `boxes`
--

CREATE TABLE IF NOT EXISTS `boxes` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL DEFAULT '' COMMENT '默认标题',
  `body` longtext COMMENT '内容',
  `format` tinyint(4) NOT NULL DEFAULT '0' COMMENT '输入格式',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文本区块' AUTO_INCREMENT=7 ;

--
-- 导出表中的数据 `boxes`
--

INSERT INTO `boxes` (`bid`, `title`, `body`, `format`) VALUES
(2, '采集微博用户列表', '采集微博用户列表', 2),
(3, '底部链接', '<p>\r\n	<a href="/one/1">关于我们</a> | <a href="/one/1#tougao">关于投稿</a> | <a href="/one/1#snews">新闻爆料</a> | <a href="/one/1#job">人才招聘</a> | <a href="/one/1#feedback">建议反馈</a> | <a href="/one/4">网站协议</a> | <a href="/sitemap.xml" target="_blank">网站地图</a> | <a href="/kuaizhao.php" target="_blank">历史快照</a></p>\r\n<p>\r\n	Copyright ©2013 XX网 (京ICP备100000-0号)</p>', 2),
(4, '投稿须知', ' <h1>感谢您的投稿，这意味着您对本网站的信任及认可。\r\n</h1>\r\n本网站欢迎TMT（科技，媒体，通信）领域的各类文章（参见 “<b></b>” ），也欢迎你在这里发表对汽车职场和热点话题的一线吐槽。为了能更好的合作，希望您能了解以下约定：<br/>\r\n1、本网站是一个汽车资讯及观点分享交流平台，不承诺对每篇被选用的投稿发放稿酬， 如果你希望有偿刊登，请在投稿时注明。<br/>\r\n2、我们每个月会综合考量文章质量、浏览量及评论数等指标，对优秀的稿件予以200-1000元不等的奖金激励，以表达对原创者的尊重，并在网站进行公示。独家、深度的稿件，更容易获得青睐。<br/>\r\n3、请尽量留下您的常用联系方式，以便后续沟通。否则默认为匿名供稿，并放弃参与评奖的权利。<br/>\r\n4、我们重视新闻真实。如您的文章里有引用或翻译其它来源的数据或文字，请注明出处以供核对。<br/>\r\n5、投稿提交后，可在“个人中心－我的文章”中查看审核进度。<br/>\r\n6、邮件投稿请将文章直接发送至。车云会对选用的稿件进行邮件通知或电话确认。', 2),
(5, '推荐话题', '推荐话题', 2),
(6, 'hot', '关键词\r\n关键词\r\n关键词\r\n关键词\r\n关键词', 2);

-- --------------------------------------------------------

--
-- 表的结构 `cache`
--

CREATE TABLE IF NOT EXISTS `cache` (
  `cid` varchar(255) NOT NULL DEFAULT '' COMMENT '缓存名。主键',
  `data` longblob COMMENT '缓存内容',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  `created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `serialized` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否序列化',
  PRIMARY KEY (`cid`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='通用缓存';

--
-- 导出表中的数据 `cache`
--


-- --------------------------------------------------------

--
-- 表的结构 `cache_block`
--

CREATE TABLE IF NOT EXISTS `cache_block` (
  `cid` varchar(255) NOT NULL DEFAULT '' COMMENT '缓存名。主键',
  `data` longblob COMMENT '缓存内容',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  `created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `serialized` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否序列化',
  PRIMARY KEY (`cid`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='区块缓存';

--
-- 导出表中的数据 `cache_block`
--


-- --------------------------------------------------------

--
-- 表的结构 `cache_field`
--

CREATE TABLE IF NOT EXISTS `cache_field` (
  `cid` varchar(255) NOT NULL DEFAULT '' COMMENT '缓存名。主键',
  `data` longblob COMMENT '缓存内容',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  `created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `serialized` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否序列化',
  PRIMARY KEY (`cid`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='字段缓存';

--
-- 导出表中的数据 `cache_field`
--


-- --------------------------------------------------------

--
-- 表的结构 `cache_filter`
--

CREATE TABLE IF NOT EXISTS `cache_filter` (
  `cid` varchar(255) NOT NULL DEFAULT '' COMMENT '缓存名。主键',
  `data` longblob COMMENT '缓存内容',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  `created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `serialized` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否序列化',
  PRIMARY KEY (`cid`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='输入法缓存';

--
-- 导出表中的数据 `cache_filter`
--


-- --------------------------------------------------------

--
-- 表的结构 `cache_form`
--

CREATE TABLE IF NOT EXISTS `cache_form` (
  `cid` varchar(255) NOT NULL DEFAULT '' COMMENT '缓存名。主键',
  `data` longblob COMMENT '缓存内容',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  `created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `serialized` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否序列化',
  PRIMARY KEY (`cid`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='表单缓存';

--
-- 导出表中的数据 `cache_form`
--


-- --------------------------------------------------------

--
-- 表的结构 `cache_menu`
--

CREATE TABLE IF NOT EXISTS `cache_menu` (
  `cid` varchar(255) NOT NULL DEFAULT '' COMMENT '缓存名。主键',
  `data` longblob COMMENT '缓存内容',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  `created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `serialized` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否序列化',
  PRIMARY KEY (`cid`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='路径缓存';

--
-- 导出表中的数据 `cache_menu`
--


-- --------------------------------------------------------

--
-- 表的结构 `cache_page`
--

CREATE TABLE IF NOT EXISTS `cache_page` (
  `cid` varchar(255) NOT NULL DEFAULT '' COMMENT '缓存名。主键',
  `data` longblob COMMENT '缓存内容',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  `created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `serialized` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否序列化',
  PRIMARY KEY (`cid`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='页面缓存';

--
-- 导出表中的数据 `cache_page`
--


-- --------------------------------------------------------

--
-- 表的结构 `cache_page_list`
--

CREATE TABLE IF NOT EXISTS `cache_page_list` (
  `path` varchar(155) NOT NULL DEFAULT '' COMMENT '系统路径',
  `dirname` varchar(155) NOT NULL DEFAULT '' COMMENT '文件路径',
  UNIQUE KEY `pd` (`path`,`dirname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='静态页路径表';

--
-- 导出表中的数据 `cache_page_list`
--


-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ext_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展 id，由模块定义',
  `ext_id2` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展 id，由模块定义',
  `ext_type` varchar(32) NOT NULL DEFAULT '' COMMENT '扩展类型，由模块定义',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '昵称',
  `mail` varchar(255) NOT NULL DEFAULT '' COMMENT '邮件',
  `host` varchar(255) NOT NULL DEFAULT '' COMMENT '主机地址',
  `site` varchar(255) NOT NULL DEFAULT '' COMMENT '主页',
  `body` longtext COMMENT '评论内容',
  `data` mediumtext COMMENT '其它数据',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '作者 id',
  `format` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '输入格式',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0：待审核，1、正常，模块也可自定义',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父评论 id',
  `created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`cid`),
  KEY `ese` (`ext_type`,`status`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `crm`
--

CREATE TABLE IF NOT EXISTS `crm` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键，自增型',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '姓名',
  `sex` varchar(128) NOT NULL DEFAULT '' COMMENT '性别',
  `company` varchar(128) NOT NULL DEFAULT '' COMMENT '公司',
  `zhiwei` varchar(128) NOT NULL DEFAULT '' COMMENT '职位',
  `phone` varchar(128) NOT NULL DEFAULT '' COMMENT '手机',
  `email` varchar(128) NOT NULL DEFAULT '' COMMENT '邮箱',
  `weixin` varchar(128) NOT NULL DEFAULT '' COMMENT '微信号',
  `qq` varchar(128) NOT NULL DEFAULT '' COMMENT 'qq',
  `des` mediumtext COMMENT '备注',
  `created` varchar(12) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 导出表中的数据 `crm`
--

INSERT INTO `crm` (`nid`, `title`, `sex`, `company`, `zhiwei`, `phone`, `email`, `weixin`, `qq`, `des`, `created`) VALUES
(5, '武', '0', '工行', '开发', '18910719862', 'levin_yunlong_wu@sina.com', '', '', '', '1396952468'),
(6, '陈蒙蒙', '0', '慧聪网', '记者', '13121314113', 'micsimon@foxmail.com', '', '', '', '1396967873'),
(7, '熊淑蕾', '0', '车音网', '总经理助理', '18601386398', '838267259@qq.com', '', '', '', '1397008472'),
(8, '秦雯', '0', '和讯信息科技有限公司', '客户经理', '18911902643', 'viviencuc@163.com', '', '', '', '1397012091'),
(9, '高倩倩', '0', '中国汽车工业协会后市场委员会', '执行副秘书长', '18610935309,15001283055', 'Auto60@163.com', '', '', '中国汽车行业品牌推展委员会秘书长；\r\n中国汽车汽配用品行业联合会常务副秘书长', '1397012627'),
(10, '徐彬', '0', '西城环保局', '科员', '13810700279', 'xubin_01@163.com', '', '', '', '1397014856'),
(11, '许飞', '0', '车优优', 'coo', '13911841514', 'finn2027@gmail.com', '', '', '感谢车云网，程总！', '1397017179'),
(12, '杨凝', '0', '通用汽车中国公司', '公共传播经理', '13810262269', 'sylvia.yang@gm.com', '', '', '', '1397019775'),
(14, '张晓云', '0', '北京航天航空大学', '研究生一年级', '13521668919', 'zhangxiaopyun@163.com', '', '', '', '1397025871'),
(15, '王萌', '0', '长城会', '项目经理', '18618331516', 'monica.wang@gwc.net', '', '', '', '1397032705'),
(16, 'Cecilia Shen', '0', '长城会', '项目总监', '188-0112-2715', 'cecilia.shen@gwc.net', '', '', '', '1397032896'),
(18, '张瑞琳', '0', '北京理工大学', '学生', '15510726720', '369675940@qq.com', '', '', '无人驾驶相关专业，研究生', '1397037252'),
(19, '朱雅茜', '0', '越野e族', '品牌经理', '18600640214', 'zhuyaxi@qq.com', '', '', '', '1397045124'),
(20, '李博', '0', '第一财经周刊', '记者', '15201675546', 'libo@yicai.com', '', '', '', '1397049904'),
(21, '贾艳旗', '0', '大鼎地产', '市场经理', '13911807534', 'jessica0073@126.com', '', '', '', '1397057518'),
(22, '高倩倩', '0', '中国汽车工业协会后市场委员会', '执行副秘书长', '15001283055', 'auto60@163.com', '', '', '中国汽车行业品牌推展委员会秘书长\r\n中国汽车汽配用品行业联合会常务副秘书长', '1397083118'),
(23, '张旭', '0', '中国交通报', '汽车事业部专题部主任', '13718420760', 'x_777@126.com', '', '', '', '1397098089'),
(24, '贾江伟', '0', '品质汽车', '主笔', '13581624181', 'jiajiangwei520@163.com', '', '', '', '1397102442'),
(25, '李方', '0', '中国消费者报', '汽车事业部副主任', '13901047615', 'lifang@vip.sina.com', '', '', '', '1397111489'),
(26, '任利娟', '0', '北京雅森环宇信息科技有限公司', '主编', '13811867377', 'renlijuan@yasn.com.cn', '', '', '后市场雅森车品网', '1397132068'),
(27, '杨福国', '0', '人大经济论坛', '编辑', '15001086892', 'yangfuguo2012@sina.cn', '', '', '', '1397139538'),
(29, '王雪', '0', '中国电建集团', '员工', '13520617756', 'wcpcd@qq.com', '', '', '朋友推荐，来听朋友的讲座。', '1397141654'),
(30, '陈海建', '0', '建业汽车服务', '技师', '15062753790', '306352461@qq.com', '', '', '', '1397187830'),
(31, '周晨阳', '0', '北京理工大学', '本科生', '18810406958', 'zhou_cybit@163.com', '', '', '', '1397197919');

-- --------------------------------------------------------

--
-- 表的结构 `cron`
--

CREATE TABLE IF NOT EXISTS `cron` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `module` varchar(32) NOT NULL DEFAULT '' COMMENT '模块系统名称',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0：待执行，1、已执行',
  `type` varchar(128) DEFAULT '' COMMENT '任务类型，模块自定义',
  `data` longtext COMMENT '任务数据',
  `weight` int(11) NOT NULL DEFAULT '0' COMMENT '任务权重',
  PRIMARY KEY (`cid`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='计划任务' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `cron`
--


-- --------------------------------------------------------

--
-- 表的结构 `custom`
--

CREATE TABLE IF NOT EXISTS `custom` (
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
  `value` longtext NOT NULL COMMENT '内容',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='定制数据，供模块使用';

--
-- 导出表中的数据 `custom`
--

INSERT INTO `custom` (`name`, `value`) VALUES
('field_groups_contentext_news', 'N;');

-- --------------------------------------------------------

--
-- 表的结构 `fields`
--

CREATE TABLE IF NOT EXISTS `fields` (
  `field_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `field_type` varchar(32) NOT NULL DEFAULT '' COMMENT '字段类型标识',
  `field_key` varchar(128) NOT NULL DEFAULT '' COMMENT '字段索引',
  `field_func` varchar(64) NOT NULL DEFAULT '' COMMENT '字段数据处理方式，空为默认 或 指定的函数',
  `type` varchar(32) NOT NULL DEFAULT '' COMMENT '调用标识',
  `module` varchar(64) NOT NULL DEFAULT '' COMMENT '创建字段的模块',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '名称',
  `weight` int(11) NOT NULL DEFAULT '0' COMMENT '权重',
  `required` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否必须',
  `access` tinytext COMMENT '访问权限',
  `deleted` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否允许从界面删除，1 为允许',
  `locked` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否锁定，即不允许从界面编辑，1 为锁定',
  `data` mediumtext COMMENT '配置参数',
  `groups` varchar(32) NOT NULL DEFAULT '' COMMENT '字段分组',
  PRIMARY KEY (`field_id`),
  UNIQUE KEY `ftm` (`field_key`,`type`,`module`),
  KEY `weight` (`weight`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='字段' AUTO_INCREMENT=38 ;

--
-- 导出表中的数据 `fields`
--

INSERT INTO `fields` (`field_id`, `field_type`, `field_key`, `field_func`, `type`, `module`, `name`, `weight`, `required`, `access`, `deleted`, `locked`, `data`, `groups`) VALUES
(1, 'select', 'lanmu', '', 'my_field', 'article', '栏目分类', 0, 1, 'N;', 1, 0, 'a:2:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";}', ''),
(4, 'tags', 'tags', '', 'my_field', 'article', 'tags', 0, 0, 'N;', 1, 0, 'a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:8:"validate";a:5:{s:12:"autocomplete";s:1:"1";s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:2:{s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}', ''),
(5, 'file', 'litpic', '', 'field', 'user', '头像', 0, 0, 'a:0:{}', 1, 0, 'a:10:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"access";a:2:{s:5:"input";a:2:{i:1;s:1:"1";i:2;s:1:"2";}s:7:"display";s:1:"0";}s:5:"multi";s:1:"1";s:8:"filetype";s:0:"";s:8:"filesize";s:0:"";s:8:"filename";s:0:"";s:9:"extension";s:0:"";s:6:"thumbs";a:2:{s:5:"thumb";s:5:"85x85";s:6:"medium";s:7:"200x200";}s:8:"savepath";s:0:"";}', ''),
(20, 'textfield', 'zhiwei', '', 'field', 'user', '职位', 2, 0, 'a:0:{}', 1, 0, 'a:4:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"access";a:1:{s:5:"input";a:1:{i:2;s:1:"2";}}s:8:"validate";a:4:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:4:{s:4:"date";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"date_time";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}', ''),
(21, 'tags', 'tags', '', 'field', 'user', '标签', 0, 0, 'a:0:{}', 1, 0, 'a:4:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"access";a:1:{s:5:"input";a:1:{i:2;s:1:"2";}}s:8:"validate";a:4:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:2:{s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}', ''),
(27, 'textfield', 'tsina', '', 'field', 'user', '新浪微博', 0, 0, 'a:0:{}', 1, 0, 'a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:8:"validate";a:4:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:4:{s:4:"date";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"date_time";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}', ''),
(28, 'textfield', 'tqq', '', 'field', 'user', '腾讯微博', 0, 0, 'a:0:{}', 1, 0, 'a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:8:"validate";a:4:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:4:{s:4:"date";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"date_time";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}', ''),
(29, 'textarea', 'jieshao', '', 'field', 'user', '个人介绍', 17, 0, 'a:0:{}', 1, 0, 'a:4:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"format";s:1:"2";s:8:"validate";a:2:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";}}', ''),
(30, 'select', 'flag', '', 'field', 'user', '推荐', 0, 0, 'a:0:{}', 1, 0, 'a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"access";a:2:{s:5:"input";a:1:{i:3;s:1:"3";}s:7:"display";s:1:"0";}}', ''),
(34, 'textfield', 'gongsi', '', 'field', 'user', '公司', 1, 0, 'a:0:{}', 1, 0, 'a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:8:"validate";a:4:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:4:{s:4:"date";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"date_time";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}', ''),
(36, 'select', 'weight', '', 'field', 'user', '排序', 0, 0, 'a:0:{}', 1, 0, 'a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"access";a:2:{s:5:"input";a:1:{i:3;s:1:"3";}s:7:"display";s:1:"0";}}', '');

-- --------------------------------------------------------

--
-- 表的结构 `fields_long`
--

CREATE TABLE IF NOT EXISTS `fields_long` (
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展 id',
  `field_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '字段 id',
  `text` longtext COMMENT '值',
  KEY `nid` (`nid`),
  KEY `field_id` (`field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='长文本';

--
-- 导出表中的数据 `fields_long`
--


-- --------------------------------------------------------

--
-- 表的结构 `fields_small`
--

CREATE TABLE IF NOT EXISTS `fields_small` (
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展 id',
  `field_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '字段 id',
  `text` varchar(255) NOT NULL DEFAULT '' COMMENT '值',
  KEY `nid` (`nid`),
  KEY `field_id` (`field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='短文本';

--
-- 导出表中的数据 `fields_small`
--


-- --------------------------------------------------------

--
-- 表的结构 `fields_term`
--

CREATE TABLE IF NOT EXISTS `fields_term` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级id',
  `field_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '根id',
  `weight` int(11) NOT NULL DEFAULT '0' COMMENT '权重',
  `description` longtext COMMENT '描述',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '名称',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `pfn` (`pid`,`field_id`,`name`),
  KEY `field_id` (`field_id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='分类字段' AUTO_INCREMENT=17 ;

--
-- 导出表中的数据 `fields_term`
--

INSERT INTO `fields_term` (`tid`, `pid`, `field_id`, `weight`, `description`, `name`) VALUES
(6, 0, 1, 0, '', '默认栏目一'),
(8, 0, 1, 0, '', '默认栏目'),
(12, 11, 1, 0, '中秋节,2014年中秋节', '中秋节'),
(13, 12, 1, 0, '中秋节放假,今年中秋节放假安排,中秋节放几天假,中秋节假期', '中秋节放假'),
(15, 14, 1, 0, '处暑节气，处暑是什么意思，处暑代表什么', '处暑');

-- --------------------------------------------------------

--
-- 表的结构 `fields_term_node`
--

CREATE TABLE IF NOT EXISTS `fields_term_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用于tags排序',
  `tid` int(10) unsigned NOT NULL COMMENT '分类 id',
  `nid` int(10) unsigned NOT NULL COMMENT '文章 id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tid` (`tid`,`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='分类字段下的文章' AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `fields_term_node`
--

INSERT INTO `fields_term_node` (`id`, `tid`, `nid`) VALUES
(7, 6, 1),
(6, 8, 2);

-- --------------------------------------------------------

--
-- 表的结构 `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件 id，主键自增',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传者 uid',
  `ext_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展字段',
  `ext_id2` int(11) NOT NULL DEFAULT '0' COMMENT '扩展字段',
  `ext_type` varchar(32) NOT NULL DEFAULT '' COMMENT '扩展字段',
  `filename` varchar(255) NOT NULL DEFAULT '' COMMENT '文件名',
  `filepath` varchar(255) NOT NULL COMMENT '文件物理位置',
  `filemime` varchar(255) NOT NULL COMMENT '文件类型',
  `filesize` int(10) unsigned NOT NULL COMMENT '文件大小',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0：未发布，1：已发布',
  `timestamp` int(10) unsigned NOT NULL COMMENT '时间戳',
  `filebody` mediumtext COMMENT '文件描述',
  PRIMARY KEY (`fid`),
  KEY `uid` (`uid`),
  KEY `status` (`status`),
  KEY `file_type_id` (`ext_type`,`ext_id`,`ext_id2`),
  KEY `file_type` (`ext_type`(12)),
  KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文件表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `files`
--


-- --------------------------------------------------------

--
-- 表的结构 `filters`
--

CREATE TABLE IF NOT EXISTS `filters` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `format` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '输入法 id',
  `filter` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过滤器 id',
  `delta` varchar(12) NOT NULL DEFAULT '' COMMENT '过滤器在模块内部编号',
  `module` varchar(64) NOT NULL DEFAULT '' COMMENT '模块名称',
  `weight` int(11) NOT NULL DEFAULT '0' COMMENT '权重',
  PRIMARY KEY (`fid`),
  KEY `f_filters_filter_format_format_format` (`format`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='输入过滤' AUTO_INCREMENT=8 ;

--
-- 导出表中的数据 `filters`
--

INSERT INTO `filters` (`fid`, `format`, `filter`, `delta`, `module`, `weight`) VALUES
(4, 2, 1, 'br', 'system', 0),
(5, 2, 1, 'smiley', 'system', 0),
(6, 2, 1, '1', 'system', 0),
(7, 2, 1, '0', 'comment', 0);

-- --------------------------------------------------------

--
-- 表的结构 `filter_format`
--

CREATE TABLE IF NOT EXISTS `filter_format` (
  `format` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT '输入法名称',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `roles` longtext COMMENT '适用角色',
  `cache` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0：不缓存，1：缓存',
  PRIMARY KEY (`format`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='输入法列表' AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `filter_format`
--

INSERT INTO `filter_format` (`format`, `name`, `description`, `roles`, `cache`) VALUES
(2, '完整 HTML', '允许任何 HTML 标签', 'N;', 1);

-- --------------------------------------------------------

--
-- 表的结构 `filter_tags`
--

CREATE TABLE IF NOT EXISTS `filter_tags` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL COMMENT '格式名称',
  `body` text COMMENT '内容，由模块控制',
  `delta` varchar(12) NOT NULL DEFAULT '' COMMENT '基于的过滤规则在其模块内部编号',
  `module` varchar(64) NOT NULL DEFAULT '' COMMENT '定义此过滤器的模块名称',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  PRIMARY KEY (`fid`),
  UNIQUE KEY `title` (`title`),
  KEY `md` (`delta`,`module`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='基于 html 标签和指定词语的过滤格式' AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `filter_tags`
--

INSERT INTO `filter_tags` (`fid`, `title`, `body`, `delta`, `module`, `description`) VALUES
(1, '非法关键词', '兔八哥|--', 'keyword', 'system', '');

-- --------------------------------------------------------

--
-- 表的结构 `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键，自增型',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '标题',
  `body` longtext COMMENT '内容',
  `ip` varchar(16) NOT NULL DEFAULT '' COMMENT '留言ip',
  `status` int(2) unsigned DEFAULT '0' COMMENT '是否审核',
  `created` varchar(12) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `guestbook`
--


-- --------------------------------------------------------

--
-- 表的结构 `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `hid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `uid` int(10) unsigned NOT NULL COMMENT '用户 uid',
  `session` varchar(128) NOT NULL DEFAULT '' COMMENT 'session id',
  `host` varchar(128) NOT NULL DEFAULT '' COMMENT '主机',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '访问路径，仅统计 hook_menu 定义的路径',
  `referer` varchar(255) NOT NULL DEFAULT '' COMMENT '来路',
  `timestamp` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`hid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='浏览记录' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `history`
--


-- --------------------------------------------------------

--
-- 表的结构 `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `language` varchar(16) NOT NULL DEFAULT '' COMMENT '语言标记',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '语言名称',
  PRIMARY KEY (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='多语言';

--
-- 导出表中的数据 `languages`
--

INSERT INTO `languages` (`language`, `name`) VALUES
('zh-CN', '简体中文'),
('zh-TW', '繁体中文');

-- --------------------------------------------------------

--
-- 表的结构 `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键，自增型',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '网站名称',
  `url` varchar(128) NOT NULL DEFAULT '' COMMENT '网址',
  `weight` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `created` varchar(12) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `link`
--

INSERT INTO `link` (`nid`, `title`, `url`, `weight`, `created`) VALUES
(1, '百度', 'http://www.baidu.com', 0, '1423281242');

-- --------------------------------------------------------

--
-- 表的结构 `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `uid` int(10) unsigned NOT NULL COMMENT '用户 uid',
  `ext_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展 id',
  `type` varchar(16) NOT NULL DEFAULT '' COMMENT '事件类型',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '事件等级，1、普通，2、严重，3、警告',
  `url` text NOT NULL COMMENT '出事地点',
  `value` text NOT NULL COMMENT '事件描述',
  `timestamp` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  `host` varchar(128) NOT NULL DEFAULT '' COMMENT '目击者 ip',
  PRIMARY KEY (`sid`),
  KEY `type` (`type`),
  KEY `tex` (`type`,`ext_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='操作日志' AUTO_INCREMENT=1542 ;

--
-- 导出表中的数据 `logs`
--

INSERT INTO `logs` (`sid`, `uid`, `ext_id`, `type`, `status`, `url`, `value`, `timestamp`, `host`) VALUES
(1540, 1, 0, 'user_login', 0, 'user/login', 'aaaaaa-1', 1409999703, '101.39.108.91'),
(1541, 1, 0, 'user_login', 0, 'user/login', 'aaaaaa-1', 1423280479, '101.39.118.65');

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '主键，唯一',
  `module` varchar(32) NOT NULL DEFAULT '' COMMENT '注册路径的模块名',
  `title` varchar(128) DEFAULT '' COMMENT '页面标题，优先级低于 dc_set_title 赋值',
  `title_callback` varchar(32) DEFAULT '' COMMENT '标题回调函数，优先级低于 title',
  `title_arguments` mediumtext COMMENT '传递给标题函数的参数',
  `load_functions` mediumtext COMMENT '通配符调用的函数',
  `access_callback` varchar(32) DEFAULT '' COMMENT '权限函数',
  `access_arguments` mediumtext COMMENT '传递给权限函数的参数',
  `page_callback` varchar(32) NOT NULL DEFAULT '' COMMENT '页面函数',
  `page_arguments` mediumtext COMMENT '传递给页面函数的参数',
  `description` varchar(255) DEFAULT '' COMMENT '描述',
  `file` varchar(255) DEFAULT '' COMMENT '包含的文件',
  `fit` int(11) NOT NULL DEFAULT '0' COMMENT '路径宽度',
  `weight` int(11) NOT NULL DEFAULT '0' COMMENT '路径权重',
  PRIMARY KEY (`path`),
  KEY `fit` (`fit`),
  KEY `weight` (`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='menu注册表';

--
-- 导出表中的数据 `menu`
--

INSERT INTO `menu` (`path`, `module`, `title`, `title_callback`, `title_arguments`, `load_functions`, `access_callback`, `access_arguments`, `page_callback`, `page_arguments`, `description`, `file`, `fit`, `weight`) VALUES
('admin', 'system', '网站管理', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:17:"system view admin";}', 'system_admin_default', NULL, '', 'modules/system/system.admin.inc', 1, 0),
('admin/alias', 'system', '别名管理', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:18:"system admin alias";}', 'system_admin_alias', NULL, '', 'modules/system/system.admin.inc', 3, 0),
('admin/article', 'article', '管理文章', '', NULL, NULL, 'article_is_edit', NULL, 'article_admin_page', NULL, '', 'sites/modules/article/article.admin.inc', 3, 0),
('admin/article/%/edit', 'article', '编辑文章', '', NULL, 'a:1:{i:2;a:1:{i:0;s:12:"article_load";}}', 'article_is_edit', NULL, 'dd_get_form', 'a:2:{i:0;s:17:"article_node_form";i:1;i:2;}', '', 'sites/modules/article/article.form.inc', 13, 0),
('admin/article/add', 'article', '发表文章', '', NULL, NULL, 'article_is_edit', NULL, 'dd_get_form', 'a:1:{i:0;s:17:"article_node_form";}', '', 'sites/modules/article/article.form.inc', 7, 0),
('admin/article/duoxuan', 'article', '多选', '', NULL, NULL, 'article_is_edit', NULL, 'article_admin_duoxuan', NULL, '', 'sites/modules/article/article.admin.inc', 7, 0),
('admin/article/fields', 'article', '字段管理', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:20:"admin article fields";}', 'article_admin_fields', NULL, '', 'sites/modules/article/article.admin.inc', 7, 0),
('admin/blocks/boxes', 'block', '编辑区块', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:11:"admin block";}', 'block_admin_boxes', NULL, '', 'modules/block/block.form.inc', 7, 0),
('admin/blocks/boxes/add', 'block', '添加区块', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:11:"admin block";}', 'dd_get_form', 'a:1:{i:0;s:14:"block_add_form";}', '', 'modules/block/block.form.inc', 15, 0),
('admin/blocks/boxes/delete/%', 'block', '删除区块', '', NULL, 'a:1:{i:4;a:1:{i:0;s:14:"block_box_load";}}', 'user_access', 'a:1:{i:0;s:11:"admin block";}', 'block_admin_delete', 'a:1:{i:0;i:4;}', '', 'modules/block/block.form.inc', 30, 0),
('admin/blocks/boxes/edit/%', 'block', NULL, '', NULL, 'a:1:{i:4;a:1:{i:0;s:14:"block_box_load";}}', 'user_access', 'a:1:{i:0;s:11:"admin block";}', 'dd_get_form', 'a:2:{i:0;s:14:"block_add_form";i:1;i:4;}', '', 'modules/block/block.form.inc', 30, 0),
('admin/blocks/cache/%', 'block', '缓存管理', '', NULL, 'a:1:{i:3;s:1:"%";}', 'user_access', 'a:1:{i:0;s:11:"admin block";}', 'dd_get_form', 'a:2:{i:0;s:17:"block_admin_cache";i:1;i:3;}', '', 'modules/block/block.admin.inc', 14, 0),
('admin/blocks/settings', 'block', NULL, '', NULL, NULL, 'user_access', 'a:1:{i:0;s:11:"admin block";}', 'block_admin_default', NULL, '', 'modules/block/block.admin.inc', 7, 0),
('admin/blocks/settings/%', 'block', NULL, '', NULL, 'a:1:{i:3;s:1:"%";}', 'user_access', 'a:1:{i:0;s:11:"admin block";}', 'dd_get_form', 'a:2:{i:0;s:16:"block_admin_form";i:1;i:3;}', '', 'modules/block/block.admin.inc', 14, 0),
('admin/blocks/settings/%/%', 'block', '区块设置', '', NULL, 'a:2:{i:3;s:1:"%";i:4;a:1:{i:0;s:10:"block_load";}}', 'user_access', 'a:1:{i:0;s:11:"admin block";}', 'dd_get_form', 'a:3:{i:0;s:19:"block_settings_form";i:1;i:3;i:2;i:4;}', '', 'modules/block/block.admin.inc', 28, 0),
('admin/cache', 'system', '缓存管理', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:18:"system admin cache";}', 'dd_get_form', 'a:1:{i:0;s:18:"system_cache_clear";}', '', 'modules/system/system.admin.inc', 3, 0),
('admin/cache/settings', 'system', '缓存设置', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:18:"system admin cache";}', 'dd_get_form', 'a:1:{i:0;s:21:"system_cache_settings";}', '', 'modules/system/system.admin.inc', 7, 0),
('admin/comment', 'comment', '评论管理', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:18:"comment admin view";}', 'comment_admin_page', NULL, '', 'sites/modules/comment/comment.admin.inc', 3, 0),
('admin/comment/change/status', 'comment', '评论推荐', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:18:"comment admin view";}', 'comment_tuijian', NULL, '', 'sites/modules/comment/comment.admin.inc', 15, 0),
('admin/filter', 'system', '输入设置', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:19:"system admin filter";}', 'system_admin_filter', NULL, '', 'modules/system/system.admin.inc', 3, 0),
('admin/format', 'system', '过滤器列表', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:19:"system admin filter";}', 'system_admin_format', NULL, '', 'modules/system/system.admin.inc', 3, 0),
('admin/front', 'system', '首页设置', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:18:"system admin front";}', 'dd_get_form', 'a:1:{i:0;s:18:"system_admin_front";}', '', 'modules/system/system.admin.inc', 3, 0),
('admin/guestbook', 'guestbook', '管理留言', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:20:"admin guestbook list";}', 'guestbook_admin_page', NULL, '', NULL, 3, 0),
('admin/guestbook/%/edit', 'guestbook', '编辑留言', '', NULL, 'a:1:{i:2;a:1:{i:0;s:14:"guestbook_load";}}', 'user_access', 'a:1:{i:0;s:20:"admin guestbook list";}', 'dd_get_form', 'a:2:{i:0;s:19:"guestbook_node_form";i:1;i:2;}', '', NULL, 13, 0),
('admin/guestbook/%/replay', 'guestbook', '回复留言', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:20:"admin guestbook list";}', 'guestbook_replay', 'a:1:{i:0;s:0:"";}', '', NULL, 13, 0),
('admin/lang', 'system', '语言设置', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:17:"system admin lang";}', 'system_admin_lang', NULL, '', 'modules/system/system.admin.inc', 3, 0),
('admin/link', 'link', '管理合作伙伴', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:15:"admin link list";}', 'link_admin_page', NULL, '', 'sites/modules/link/link.admin.inc', 3, 0),
('admin/link/%/edit', 'link', '编辑合作伙伴', '', NULL, 'a:1:{i:2;a:1:{i:0;s:9:"link_load";}}', 'user_access', 'a:1:{i:0;s:9:"link edit";}', 'dd_get_form', 'a:2:{i:0;s:14:"link_node_form";i:1;i:2;}', '', NULL, 13, 0),
('admin/link/add', 'link', '发表合作伙伴', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:8:"link add";}', 'dd_get_form', 'a:1:{i:0;s:14:"link_node_form";}', '', NULL, 7, 0),
('admin/link/fields', 'link', '字段管理', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:17:"admin link fields";}', 'link_admin_fields', NULL, '', 'sites/modules/link/link.admin.inc', 7, 0),
('admin/logs', 'system', '系统日志', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:17:"system admin logs";}', 'system_admin_logs', NULL, '', 'modules/system/system.admin.inc', 3, 0),
('admin/message', 'message', '管理站内信', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:18:"admin message list";}', 'message_admin_page', NULL, '', NULL, 3, 0),
('admin/message/%/edit', 'message', '编辑站内信', '', NULL, 'a:1:{i:2;a:1:{i:0;s:12:"message_load";}}', 'user_access', 'a:1:{i:0;s:18:"admin message list";}', 'dd_get_form', 'a:2:{i:0;s:17:"message_node_form";i:1;i:2;}', '', NULL, 13, 0),
('admin/message/%/replay', 'message', '回复站内信', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:18:"admin message list";}', 'message_replay', 'a:1:{i:0;s:0:"";}', '', NULL, 13, 0),
('admin/modules', 'system', '模块管理', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:19:"system admin module";}', 'dd_get_form', 'a:1:{i:0;s:19:"system_modules_page";}', '', 'modules/system/system.module.inc', 3, 0),
('admin/oauth/settings', 'oauth', '开发平台设置', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:11:"admin oauth";}', 'dd_get_form', 'a:1:{i:0;s:20:"oauth_admin_settings";}', '', 'sites/modules/oauth/oauth.admin.inc', 7, 0),
('admin/oauth/users', 'oauth', '开发平台用户管理', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:11:"admin oauth";}', 'oauth_admin_users', NULL, '', 'sites/modules/oauth/oauth.admin.inc', 7, 0),
('admin/one', 'one', '管理单页面', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:14:"admin one list";}', 'one_admin_page', NULL, '', 'sites/modules/one/one.admin.inc', 3, 0),
('admin/one/%/edit', 'one', '编辑单页面', '', NULL, 'a:1:{i:2;a:1:{i:0;s:8:"one_load";}}', 'user_access', 'a:1:{i:0;s:14:"admin one list";}', 'dd_get_form', 'a:2:{i:0;s:13:"one_node_form";i:1;i:2;}', '', 'sites/modules/one/one.form.inc', 13, 0),
('admin/one/add', 'one', '发表单页面', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:7:"one add";}', 'dd_get_form', 'a:1:{i:0;s:13:"one_node_form";}', '', 'sites/modules/one/one.form.inc', 7, 0),
('admin/one/duoxuan', 'one', '多选', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:14:"admin one list";}', 'one_admin_duoxuan', NULL, '', 'sites/modules/one/one.admin.inc', 7, 0),
('admin/one/fields', 'one', '字段管理', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:16:"admin one fields";}', 'one_admin_fields', NULL, '', 'sites/modules/one/one.admin.inc', 7, 0),
('admin/settings', 'system', '站点设置', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:21:"system admin settings";}', 'dd_get_form', 'a:1:{i:0;s:20:"system_site_settings";}', '', 'modules/system/system.admin.inc', 3, 0),
('admin/settings/captcha', 'system', '验证码设置', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:29:"system admin settings captcha";}', 'dd_get_form', 'a:1:{i:0;s:19:"system_site_captcha";}', '', 'modules/system/system.admin.inc', 7, 0),
('admin/settings/error', 'system', '错误设置', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:27:"system admin settings error";}', 'dd_get_form', 'a:1:{i:0;s:17:"system_site_error";}', '', 'modules/system/system.admin.inc', 7, 0),
('admin/settings/files', 'system', '文件设置', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:27:"system admin settings files";}', 'dd_get_form', 'a:1:{i:0;s:17:"system_site_files";}', '', 'modules/system/system.admin.inc', 7, 0),
('admin/settings/global', 'system', '站点信息', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:28:"system admin settings global";}', 'dd_get_form', 'a:1:{i:0;s:18:"system_site_global";}', '', 'modules/system/system.admin.inc', 7, 0),
('admin/status/php', 'system', NULL, '', NULL, NULL, 'user_access', 'a:1:{i:0;s:17:"system view admin";}', 'system_status_php', NULL, '', 'modules/system/system.admin.inc', 7, 0),
('admin/status/update', 'system', NULL, '', NULL, NULL, 'user_access', 'a:1:{i:0;s:17:"system view admin";}', 'system_status_update', NULL, '', NULL, 7, 0),
('admin/themes', 'system', '主题管理', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:18:"system admin theme";}', 'dd_get_form', 'a:1:{i:0;s:18:"system_themes_page";}', '', 'modules/system/system.module.inc', 3, 0),
('admin/themes/admin', 'system', '管理专用主题', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:18:"system admin theme";}', 'dd_get_form', 'a:1:{i:0;s:19:"system_themes_admin";}', '', 'modules/system/system.module.inc', 7, 0),
('admin/themes/setting/%', 'system', '主题设置', '', NULL, 'a:1:{i:3;s:1:"%";}', 'user_access', 'a:1:{i:0;s:18:"system admin theme";}', 'dd_get_form', 'a:2:{i:0;s:21:"system_themes_setting";i:1;i:3;}', '', 'modules/system/system.module.inc', 14, 0),
('admin/token', 'system', '通配符', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:17:"system view admin";}', 'system_admin_token', NULL, '', 'modules/system/system.admin.inc', 3, 0),
('admin/users', 'user', '用户列表', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:15:"admin user view";}', 'user_admin_default', NULL, '', 'modules/user/user.admin.inc', 3, 0),
('admin/users/add', 'user', '新增用户', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:14:"admin user add";}', 'dd_get_form', 'a:1:{i:0;s:14:"user_admin_add";}', '', 'modules/user/user.admin.inc', 7, 0),
('admin/users/fields', 'user', '用户字段', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:17:"admin user fields";}', 'user_admin_fields', NULL, '', 'modules/user/user.admin.inc', 7, 0),
('admin/users/perms', 'user', '用户权限', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:16:"admin user perms";}', 'dd_get_form', 'a:1:{i:0;s:13:"user_set_perm";}', '', 'modules/user/user.admin.inc', 7, 0),
('admin/users/roles', 'user', '角色管理', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:16:"admin user roles";}', 'user_admin_roles', NULL, '', 'modules/user/user.admin.inc', 7, 0),
('admin/users/settings', 'user', '用户设置', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:19:"admin user settings";}', 'dd_get_form', 'a:1:{i:0;s:17:"user_set_settings";}', '', 'modules/user/user.admin.inc', 7, 0),
('admin/users/view/%', 'user', '用户资料', '', NULL, 'a:1:{i:3;a:1:{i:0;s:9:"user_load";}}', 'user_access', 'a:1:{i:0;s:15:"admin user view";}', 'user_admin_view', 'a:1:{i:0;i:3;}', '', 'modules/user/user.admin.inc', 14, 0),
('ajax', 'system', NULL, '', NULL, NULL, '1', NULL, 'system_tools_ajax', NULL, '全局 ajax 地址', NULL, 1, 0),
('archives/article/%', 'article', '发表文章', '', NULL, NULL, '1', NULL, 'archives_page', NULL, '', NULL, 6, 0),
('article', 'article', '文章', '', NULL, NULL, '1', NULL, 'article_front', 'a:1:{i:0;s:0:"";}', '', NULL, 1, 0),
('article/%', 'article', NULL, '', NULL, 'a:1:{i:1;a:1:{i:0;s:12:"article_load";}}', '1', NULL, 'article_page', 'a:1:{i:0;i:1;}', '', NULL, 2, 0),
('article/%/delete', 'article', '删除文章', '', NULL, 'a:1:{i:1;a:1:{i:0;s:12:"article_load";}}', 'article_is_edit', NULL, 'article_delete', 'a:1:{i:0;i:1;}', '', NULL, 5, 0),
('article/add', 'article', '发表文章', '', NULL, NULL, 'article_is_edit', NULL, 'dd_get_form', 'a:1:{i:0;s:17:"article_node_form";}', '', 'sites/modules/article/article.form.inc', 3, 0),
('baidu_editor_image_manage', 'baidueditor', NULL, '', NULL, NULL, 'user_access', 'a:1:{i:0;s:11:"file upload";}', 'baidu_editor_image_manage', NULL, '', NULL, 1, 0),
('baidu_editor_image_remote', 'baidueditor', NULL, '', NULL, NULL, 'user_access', 'a:1:{i:0;s:11:"file upload";}', 'baidu_editor_image_remote', NULL, '', NULL, 1, 0),
('baidu_editor_image_upload', 'baidueditor', NULL, '', NULL, NULL, 'user_access', 'a:1:{i:0;s:11:"file upload";}', 'baidu_editor_image_upload', NULL, '', NULL, 1, 0),
('captcha', 'system', NULL, '', NULL, NULL, '1', NULL, 'captcha_page', NULL, '', 'modules/system/system.captcha.inc', 1, 0),
('category/%', 'field', NULL, '', NULL, 'a:1:{i:1;a:1:{i:0;s:15:"field_term_load";}}', 'field_term_access', 'a:1:{i:0;i:1;}', 'field_term_page', 'a:1:{i:0;i:1;}', '', 'modules/field/field.page.inc', 2, 0),
('category/%/feed', 'field', NULL, '', NULL, 'a:1:{i:1;a:1:{i:0;s:15:"field_term_load";}}', 'field_term_access', 'a:1:{i:0;i:1;}', 'field_term_feed', 'a:1:{i:0;i:1;}', '', 'modules/field/field.page.inc', 5, 0),
('comment/delete/%', 'comment', NULL, '', NULL, 'a:1:{i:2;a:1:{i:0;s:12:"comment_load";}}', 'comment_is_delete', 'a:1:{i:0;i:2;}', 'comment_page_delete', 'a:1:{i:0;i:2;}', '删除评论', 'sites/modules/comment/comment.page.inc', 6, 0),
('comment/edit/%', 'comment', NULL, '', NULL, 'a:1:{i:2;a:1:{i:0;s:12:"comment_load";}}', 'comment_is_update', 'a:1:{i:0;i:2;}', 'comment_page_edit', 'a:1:{i:0;i:2;}', '编辑评论', 'sites/modules/comment/comment.page.inc', 6, 0),
('comment/goto/%', 'comment', NULL, '', NULL, 'a:1:{i:2;a:1:{i:0;s:12:"comment_load";}}', 'comment_is_view', 'a:1:{i:0;i:2;}', 'comment_page_goto', 'a:1:{i:0;i:2;}', '根据评论 id 跳转到所属节点', 'sites/modules/comment/comment.page.inc', 6, 0),
('fields/%', 'field', NULL, '', NULL, 'a:1:{i:1;a:1:{i:0;s:10:"field_load";}}', 'field_access', 'a:2:{i:0;s:4:"view";i:1;i:1;}', 'field_page', 'a:1:{i:0;i:1;}', '', 'modules/field/field.page.inc', 2, 0),
('files/%/%', 'system', NULL, '', NULL, 'a:2:{i:1;a:1:{i:0;s:9:"file_load";}i:2;s:1:"%";}', 'file_is_access', 'a:2:{i:0;i:1;i:1;i:2;}', 'file_operate', 'a:2:{i:0;i:1;i:1;i:2;}', '', NULL, 4, 0),
('files/editor', 'system', NULL, '', NULL, NULL, 'user_access', 'a:1:{i:0;s:11:"file upload";}', 'system_file_upload', NULL, '', 'modules/system/system.file.inc', 3, 0),
('g', 'system', NULL, '', NULL, NULL, '1', NULL, 'system_tools_go', NULL, '全局重定向跳转地址', NULL, 1, 0),
('guestbook', 'guestbook', '留言页面', '', NULL, NULL, '1', 'a:1:{i:0;s:13:"guestbook add";}', 'guestbook_front', 'a:1:{i:0;s:0:"";}', '', NULL, 1, 0),
('guestbook/%/delete', 'guestbook', '删除留言', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:20:"admin guestbook list";}', 'guestbook_delete', 'a:1:{i:0;i:1;}', '', NULL, 5, 0),
('guestbook/add', 'guestbook', '发表留言', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:13:"guestbook add";}', 'dd_get_form', 'a:1:{i:0;s:19:"guestbook_node_form";}', '', NULL, 3, 0),
('images/error', 'system', NULL, '', NULL, NULL, '1', NULL, 'system_images_error', NULL, '', NULL, 3, 0),
('link', 'link', '友情链接', '', NULL, NULL, '1', NULL, 'link_front', NULL, '', NULL, 1, 0),
('link/%/delete', 'link', '删除合作伙伴', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:9:"link edit";}', 'link_delete', 'a:1:{i:0;i:1;}', '', NULL, 5, 0),
('message/%/delete', 'message', '删除站内信', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:18:"admin message list";}', 'message_delete', 'a:1:{i:0;i:1;}', '', NULL, 5, 0),
('message/add', 'message', '发表站内信', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:11:"message add";}', 'dd_get_form', 'a:1:{i:0;s:17:"message_node_form";}', '', NULL, 3, 0),
('message/users', 'message', '会员列表', '', NULL, NULL, '1', NULL, 'message_users', 'a:1:{i:0;s:0:"";}', '', NULL, 3, 0),
('oauth/qq', 'oauth', NULL, '', NULL, NULL, '1', NULL, 'oauth_qq_validate', NULL, 'qq帐号登录或绑定', 'sites/modules/oauth/oauth.pages.inc', 3, 0),
('oauth/renren', 'oauth', NULL, '', NULL, NULL, '1', NULL, 'oauth_renren_validate', NULL, 'renren帐号登录或绑定', 'sites/modules/oauth/oauth.pages.inc', 3, 0),
('oauth/sina', 'oauth', NULL, '', NULL, NULL, '1', NULL, 'oauth_sina_validate', NULL, '新浪微博帐号登录或绑定', 'sites/modules/oauth/oauth.pages.inc', 3, 0),
('one', 'one', '单页面', '', NULL, NULL, '1', NULL, 'one_front', 'a:1:{i:0;s:0:"";}', '', NULL, 1, 0),
('one/%', 'one', NULL, '', NULL, 'a:1:{i:1;a:1:{i:0;s:8:"one_load";}}', '1', NULL, 'one_page', 'a:1:{i:0;i:1;}', '', NULL, 2, 0),
('one/%/delete', 'one', '删除单页面', '', NULL, 'a:1:{i:1;a:1:{i:0;s:8:"one_load";}}', 'user_access', 'a:1:{i:0;s:14:"admin one list";}', 'one_delete', 'a:1:{i:0;i:1;}', '', NULL, 5, 0),
('one/add', 'one', '发表单页面', '', NULL, NULL, 'user_access', 'a:1:{i:0;s:7:"one add";}', 'dd_get_form', 'a:1:{i:0;s:13:"one_node_form";}', '', 'sites/modules/one/one.form.inc', 3, 0),
('search', 'article', NULL, '', NULL, NULL, '1', NULL, 'search_page', NULL, '', NULL, 1, 0),
('sitemap.xml', 'article', '网站地图', '', NULL, NULL, '1', NULL, 'sitemap_xml', 'a:1:{i:0;s:0:"";}', '', NULL, 1, 0),
('tag/%', 'article', NULL, '', NULL, NULL, '1', NULL, 'tag_category', 'a:1:{i:0;s:0:"";}', '', NULL, 2, 0),
('tags', 'article', '标签', '', NULL, NULL, '1', NULL, 'tags_page', 'a:1:{i:0;s:0:"";}', '', NULL, 1, 0),
('user', 'user', NULL, '', NULL, NULL, '1', NULL, 'user_default', NULL, '', 'modules/user/user.page.inc', 1, 0),
('user/%', 'user', NULL, '', NULL, 'a:1:{i:1;a:1:{i:0;s:9:"user_load";}}', 'user_is_user_view', 'a:1:{i:0;i:1;}', 'user_view', 'a:1:{i:0;i:1;}', '', NULL, 2, 0),
('user/activation', 'user', '激活', '', NULL, NULL, 'user_is_activation', 'a:1:{i:0;s:4:"goto";}', 'dd_get_form', 'a:1:{i:0;s:20:"user_page_activation";}', '', 'modules/user/user.page.inc', 3, 0),
('user/center', 'user', '个人中心', '', NULL, NULL, 'user_is_login', NULL, 'user_page_center', NULL, '', 'modules/user/user.page.inc', 3, 0),
('user/center/%', 'user', NULL, '', NULL, 'a:1:{i:2;s:1:"%";}', 'user_is_login', NULL, 'user_page_center', 'a:1:{i:0;i:2;}', '个人中心扩展页', 'modules/user/user.page.inc', 6, 0),
('user/login', 'user', '登录', '', NULL, NULL, 'user_is_not_login', 'a:1:{i:0;s:4:"goto";}', 'user_page_login', NULL, '', 'modules/user/user.page.inc', 3, 0),
('user/login/ajax', 'user', NULL, '', NULL, NULL, 'user_is_not_login', NULL, 'user_page_login_ajax', NULL, '', 'modules/user/user.page.inc', 7, 0),
('user/logout', 'user', NULL, '', NULL, NULL, 'user_is_login', NULL, 'user_logout', NULL, '', NULL, 3, 0),
('user/pass', 'user', '找回密码', '', NULL, NULL, 'user_is_not_login', 'a:1:{i:0;s:4:"goto";}', 'dd_get_form', 'a:1:{i:0;s:14:"user_page_pass";}', '', 'modules/user/user.page.inc', 3, 0),
('user/register', 'user', '注册', '', NULL, NULL, 'user_is_register', 'a:1:{i:0;s:4:"goto";}', 'user_page_register', NULL, '', 'modules/user/user.page.inc', 3, 0),
('voteapi/%/%', 'voteapi', NULL, '', NULL, 'a:2:{i:1;s:1:"%";i:2;s:1:"%";}', '1', NULL, '_voteapi_exec', 'a:2:{i:0;i:1;i:1;i:2;}', '', NULL, 4, 0),
('voteapi/delete/%', 'voteapi', NULL, '', NULL, NULL, '1', NULL, 'voteapi_info_delete', 'a:1:{i:0;i:2;}', '', NULL, 6, 0);

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键，自增型',
  `touid` int(11) NOT NULL DEFAULT '0' COMMENT 'to用户',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '留言uid',
  `body` longtext COMMENT '内容',
  `status` int(2) unsigned DEFAULT '0' COMMENT '查看状态',
  `created` varchar(12) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `type` int(2) NOT NULL DEFAULT '0' COMMENT '留言uid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `message`
--


-- --------------------------------------------------------

--
-- 表的结构 `mylike_info`
--

CREATE TABLE IF NOT EXISTS `mylike_info` (
  `iid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '节点 id',
  `type` varchar(32) NOT NULL DEFAULT '' COMMENT '自定义类型',
  `ext_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展 id',
  `value` int(11) NOT NULL DEFAULT '0' COMMENT '值，只允许整型',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户 id',
  `host` varchar(128) NOT NULL DEFAULT '' COMMENT '用户主机',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投票时间',
  PRIMARY KEY (`iid`),
  KEY `te` (`type`,`ext_id`),
  KEY `type` (`type`),
  KEY `nt` (`nid`,`type`),
  KEY `value` (`value`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='投票明细' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `mylike_info`
--


-- --------------------------------------------------------

--
-- 表的结构 `oauth_user`
--

CREATE TABLE IF NOT EXISTS `oauth_user` (
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关联 users 表',
  `oauth_uid` varchar(32) NOT NULL DEFAULT '' COMMENT '用户 id',
  `token` mediumtext NOT NULL COMMENT '访问令牌等信息',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上次同步时间',
  `user_from` varchar(32) NOT NULL DEFAULT '' COMMENT '用户来源',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `oauth_uid` (`oauth_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='绑定其他网站用户表';

--
-- 导出表中的数据 `oauth_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `one`
--

CREATE TABLE IF NOT EXISTS `one` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键，自增型',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '标题',
  `fid` int(10) unsigned DEFAULT '0' COMMENT '缩略图id',
  `flag` varchar(12) NOT NULL DEFAULT '' COMMENT '推荐位',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '点击数',
  `description` mediumtext COMMENT '描述',
  `body` longtext COMMENT '正文',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '作者 id',
  `format` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '输入格式',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表时间',
  PRIMARY KEY (`nid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `one`
--

INSERT INTO `one` (`nid`, `title`, `fid`, `flag`, `click`, `description`, `body`, `uid`, `format`, `timestamp`) VALUES
(1, '关于我们', 0, '', 195, '', '<p><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span><span>关于我们</span>关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们</p>', 1, 2, 1423281477);

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL DEFAULT '' COMMENT '角色组名称',
  `perm` longtext COMMENT '角色组对应权限',
  `count` int(11) NOT NULL DEFAULT '0' COMMENT '该角色会员数量',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户权限角色组' AUTO_INCREMENT=7 ;

--
-- 导出表中的数据 `role`
--

INSERT INTO `role` (`rid`, `name`, `perm`, `count`) VALUES
(1, '游客', 'a:4:{s:4:"user";a:1:{s:19:"user view user info";i:36;}s:7:"message";a:1:{s:11:"message add";i:72;}s:9:"guestbook";a:1:{s:13:"guestbook add";i:85;}s:7:"content";a:13:{s:17:"content news view";i:104;s:25:"content news comment view";i:128;s:27:"content news comment create";i:134;s:16:"content wxx view";i:158;s:24:"content wxx comment view";i:178;s:26:"content wxx comment create";i:183;s:17:"content dutu view";i:197;s:17:"content csdt view";i:220;s:25:"content csdt comment view";i:241;s:27:"content csdt comment create";i:247;s:15:"content zt view";i:268;s:17:"content plan view";i:307;s:20:"content toutiao view";i:326;}}', 0),
(2, '登录用户', 'a:5:{s:6:"system";a:4:{s:11:"file upload";i:9;s:13:"file one view";i:16;s:15:"file one delete";i:23;s:15:"file one update";i:30;}s:4:"user";a:2:{s:19:"user view user info";i:35;s:16:"user change name";i:63;}s:7:"message";a:1:{s:11:"message add";i:71;}s:9:"guestbook";a:1:{s:13:"guestbook add";i:84;}s:7:"content";a:19:{s:17:"content news view";i:103;s:25:"content news comment view";i:127;s:27:"content news comment create";i:133;s:31:"content news comment update own";i:143;s:31:"content news comment delete own";i:152;s:16:"content wxx view";i:157;s:24:"content wxx comment view";i:177;s:26:"content wxx comment create";i:182;s:30:"content wxx comment update own";i:187;s:30:"content wxx comment delete own";i:191;s:17:"content dutu view";i:196;s:17:"content csdt view";i:219;s:25:"content csdt comment view";i:240;s:27:"content csdt comment create";i:246;s:31:"content csdt comment update own";i:255;s:31:"content csdt comment delete own";i:263;s:15:"content zt view";i:267;s:17:"content plan view";i:306;s:20:"content toutiao view";i:325;}}', 47),
(3, '网站编辑', 'a:14:{s:6:"system";a:5:{s:17:"system view admin";i:3;s:11:"file upload";i:8;s:13:"file one view";i:15;s:15:"file one delete";i:22;s:15:"file one update";i:29;}s:4:"user";a:8:{s:19:"user view user info";i:34;s:20:"user use search user";i:39;s:15:"admin user view";i:42;s:14:"admin user add";i:45;s:22:"admin user change name";i:52;s:15:"user change own";i:55;s:16:"user change mail";i:58;s:16:"user change name";i:62;}s:5:"block";a:1:{s:11:"admin block";i:66;}s:7:"message";a:1:{s:11:"message add";i:70;}s:4:"link";a:2:{s:8:"link add";i:76;s:15:"admin link list";i:79;}s:9:"guestbook";a:2:{s:13:"guestbook add";i:83;s:20:"admin guestbook list";i:88;}s:3:"crm";a:2:{s:7:"crm add";i:90;s:14:"admin crm list";i:92;}s:7:"content";a:69:{s:18:"admin content view";i:96;s:17:"content news view";i:102;s:19:"content news create";i:108;s:23:"content news update own";i:112;s:19:"content news update";i:115;s:23:"content news delete own";i:119;s:19:"content news delete";i:122;s:25:"content news comment view";i:126;s:27:"content news comment create";i:132;s:27:"content news comment update";i:138;s:31:"content news comment update own";i:142;s:27:"content news comment delete";i:147;s:31:"content news comment delete own";i:151;s:16:"content wxx view";i:156;s:18:"content wxx create";i:161;s:22:"content wxx update own";i:164;s:18:"content wxx update";i:167;s:22:"content wxx delete own";i:170;s:18:"content wxx delete";i:173;s:24:"content wxx comment view";i:176;s:26:"content wxx comment create";i:181;s:30:"content wxx comment update own";i:186;s:30:"content wxx comment delete own";i:190;s:17:"content dutu view";i:195;s:19:"content dutu create";i:201;s:23:"content dutu update own";i:205;s:19:"content dutu update";i:208;s:23:"content dutu delete own";i:212;s:19:"content dutu delete";i:215;s:17:"content csdt view";i:218;s:19:"content csdt create";i:223;s:23:"content csdt update own";i:226;s:19:"content csdt update";i:229;s:23:"content csdt delete own";i:232;s:19:"content csdt delete";i:235;s:25:"content csdt comment view";i:239;s:27:"content csdt comment create";i:245;s:27:"content csdt comment update";i:250;s:31:"content csdt comment update own";i:254;s:27:"content csdt comment delete";i:258;s:31:"content csdt comment delete own";i:262;s:15:"content zt view";i:266;s:17:"content zt create";i:271;s:21:"content zt update own";i:274;s:17:"content zt update";i:277;s:21:"content zt delete own";i:280;s:17:"content zt delete";i:283;s:17:"content wxdt view";i:286;s:19:"content wxdt create";i:289;s:23:"content wxdt update own";i:292;s:19:"content wxdt update";i:295;s:23:"content wxdt delete own";i:298;s:19:"content wxdt delete";i:301;s:17:"content plan view";i:305;s:19:"content plan create";i:310;s:23:"content plan update own";i:313;s:19:"content plan update";i:316;s:20:"content toutiao view";i:324;s:22:"content toutiao create";i:329;s:26:"content toutiao update own";i:332;s:22:"content toutiao update";i:335;s:26:"content toutiao delete own";i:338;s:22:"content toutiao delete";i:341;s:28:"content toutiao comment view";i:344;s:30:"content toutiao comment create";i:347;s:30:"content toutiao comment update";i:350;s:34:"content toutiao comment update own";i:353;s:30:"content toutiao comment delete";i:356;s:34:"content toutiao comment delete own";i:359;}s:7:"comment";a:1:{s:18:"comment admin view";i:363;}s:9:"cheyunhui";a:1:{s:20:"admin cheyunhui list";i:366;}s:5:"ttags";a:2:{s:9:"ttags add";i:373;s:16:"admin ttags list";i:376;}s:3:"one";a:2:{s:7:"one add";i:379;s:14:"admin one list";i:382;}s:10:"cheyunclub";a:4:{s:14:"cheyunclub add";i:385;s:16:"cheyunclub admin";i:388;s:8:"xcnr add";i:391;s:10:"xcnr admin";i:394;}s:7:"article";a:2:{s:11:"article add";i:397;s:13:"article admin";i:400;}}', 13),
(4, '专栏作者', 'a:6:{s:6:"system";a:4:{s:11:"file upload";i:7;s:13:"file one view";i:14;s:15:"file one delete";i:21;s:15:"file one update";i:28;}s:4:"user";a:2:{s:19:"user view user info";i:33;s:16:"user change name";i:61;}s:7:"message";a:1:{s:11:"message add";i:69;}s:9:"guestbook";a:1:{s:13:"guestbook add";i:82;}s:7:"content";a:22:{s:18:"admin content view";i:95;s:17:"content news view";i:101;s:19:"content news create";i:107;s:23:"content news update own";i:111;s:23:"content news delete own";i:118;s:25:"content news comment view";i:125;s:27:"content news comment create";i:131;s:27:"content news comment update";i:137;s:31:"content news comment update own";i:141;s:27:"content news comment delete";i:146;s:31:"content news comment delete own";i:150;s:16:"content wxx view";i:155;s:17:"content dutu view";i:194;s:19:"content dutu create";i:200;s:23:"content dutu update own";i:204;s:23:"content dutu delete own";i:211;s:25:"content csdt comment view";i:238;s:27:"content csdt comment create";i:244;s:31:"content csdt comment update own";i:253;s:31:"content csdt comment delete own";i:261;s:17:"content plan view";i:304;s:20:"content toutiao view";i:323;}s:7:"comment";a:1:{s:18:"comment admin view";i:362;}}', 39),
(5, '审核编辑', 'a:15:{s:6:"system";a:8:{s:17:"system view admin";i:2;s:11:"file upload";i:6;s:13:"file all view";i:11;s:13:"file one view";i:13;s:15:"file all delete";i:18;s:15:"file one delete";i:20;s:15:"file all update";i:25;s:15:"file one update";i:27;}s:4:"user";a:10:{s:19:"user view user info";i:32;s:20:"user use search user";i:38;s:15:"admin user view";i:41;s:14:"admin user add";i:44;s:19:"admin user edit all";i:47;s:22:"admin user change mail";i:49;s:22:"admin user change name";i:51;s:15:"user change own";i:54;s:16:"user change mail";i:57;s:16:"user change name";i:60;}s:5:"block";a:1:{s:11:"admin block";i:65;}s:7:"message";a:1:{s:11:"message add";i:68;}s:4:"link";a:2:{s:8:"link add";i:75;s:15:"admin link list";i:78;}s:9:"guestbook";a:2:{s:13:"guestbook add";i:81;s:20:"admin guestbook list";i:87;}s:3:"crm";a:2:{s:7:"crm add";i:89;s:14:"admin crm list";i:91;}s:7:"content";a:72:{s:18:"admin content view";i:94;s:18:"admin content type";i:98;s:17:"content news view";i:100;s:19:"content news create";i:106;s:23:"content news update own";i:110;s:19:"content news update";i:114;s:23:"content news delete own";i:117;s:19:"content news delete";i:121;s:25:"content news comment view";i:124;s:27:"content news comment create";i:130;s:27:"content news comment update";i:136;s:31:"content news comment update own";i:140;s:27:"content news comment delete";i:145;s:31:"content news comment delete own";i:149;s:16:"content wxx view";i:154;s:18:"content wxx create";i:160;s:22:"content wxx update own";i:163;s:18:"content wxx update";i:166;s:22:"content wxx delete own";i:169;s:18:"content wxx delete";i:172;s:24:"content wxx comment view";i:175;s:26:"content wxx comment create";i:180;s:30:"content wxx comment update own";i:185;s:30:"content wxx comment delete own";i:189;s:17:"content dutu view";i:193;s:19:"content dutu create";i:199;s:23:"content dutu update own";i:203;s:19:"content dutu update";i:207;s:23:"content dutu delete own";i:210;s:19:"content dutu delete";i:214;s:17:"content csdt view";i:217;s:19:"content csdt create";i:222;s:23:"content csdt update own";i:225;s:19:"content csdt update";i:228;s:23:"content csdt delete own";i:231;s:19:"content csdt delete";i:234;s:25:"content csdt comment view";i:237;s:27:"content csdt comment create";i:243;s:27:"content csdt comment update";i:249;s:31:"content csdt comment update own";i:252;s:27:"content csdt comment delete";i:257;s:31:"content csdt comment delete own";i:260;s:15:"content zt view";i:265;s:17:"content zt create";i:270;s:21:"content zt update own";i:273;s:17:"content zt update";i:276;s:21:"content zt delete own";i:279;s:17:"content zt delete";i:282;s:17:"content wxdt view";i:285;s:19:"content wxdt create";i:288;s:23:"content wxdt update own";i:291;s:19:"content wxdt update";i:294;s:23:"content wxdt delete own";i:297;s:19:"content wxdt delete";i:300;s:17:"content plan view";i:303;s:19:"content plan create";i:309;s:23:"content plan update own";i:312;s:19:"content plan update";i:315;s:23:"content plan delete own";i:318;s:19:"content plan delete";i:320;s:20:"content toutiao view";i:322;s:22:"content toutiao create";i:328;s:26:"content toutiao update own";i:331;s:22:"content toutiao update";i:334;s:26:"content toutiao delete own";i:337;s:22:"content toutiao delete";i:340;s:28:"content toutiao comment view";i:343;s:30:"content toutiao comment create";i:346;s:30:"content toutiao comment update";i:349;s:34:"content toutiao comment update own";i:352;s:30:"content toutiao comment delete";i:355;s:34:"content toutiao comment delete own";i:358;}s:7:"comment";a:1:{s:18:"comment admin view";i:361;}s:9:"cheyunhui";a:1:{s:20:"admin cheyunhui list";i:365;}s:2:"ad";a:2:{s:6:"ad add";i:368;s:13:"admin ad list";i:370;}s:5:"ttags";a:2:{s:9:"ttags add";i:372;s:16:"admin ttags list";i:375;}s:3:"one";a:2:{s:7:"one add";i:378;s:14:"admin one list";i:381;}s:10:"cheyunclub";a:4:{s:14:"cheyunclub add";i:384;s:16:"cheyunclub admin";i:387;s:8:"xcnr add";i:390;s:10:"xcnr admin";i:393;}s:7:"article";a:2:{s:11:"article add";i:396;s:13:"article admin";i:399;}}', 5),
(6, '管理员', 'a:14:{s:6:"system";a:9:{s:17:"system view admin";i:1;s:18:"system admin cache";i:4;s:11:"file upload";i:5;s:13:"file all view";i:10;s:13:"file one view";i:12;s:15:"file all delete";i:17;s:15:"file one delete";i:19;s:15:"file all update";i:24;s:15:"file one update";i:26;}s:4:"user";a:10:{s:19:"user view user info";i:31;s:20:"user use search user";i:37;s:15:"admin user view";i:40;s:14:"admin user add";i:43;s:19:"admin user edit all";i:46;s:22:"admin user change mail";i:48;s:22:"admin user change name";i:50;s:15:"user change own";i:53;s:16:"user change mail";i:56;s:16:"user change name";i:59;}s:5:"block";a:1:{s:11:"admin block";i:64;}s:7:"message";a:2:{s:11:"message add";i:67;s:18:"admin message list";i:73;}s:4:"link";a:2:{s:8:"link add";i:74;s:15:"admin link list";i:77;}s:9:"guestbook";a:2:{s:13:"guestbook add";i:80;s:20:"admin guestbook list";i:86;}s:7:"content";a:72:{s:18:"admin content view";i:93;s:18:"admin content type";i:97;s:17:"content news view";i:99;s:19:"content news create";i:105;s:23:"content news update own";i:109;s:19:"content news update";i:113;s:23:"content news delete own";i:116;s:19:"content news delete";i:120;s:25:"content news comment view";i:123;s:27:"content news comment create";i:129;s:27:"content news comment update";i:135;s:31:"content news comment update own";i:139;s:27:"content news comment delete";i:144;s:31:"content news comment delete own";i:148;s:16:"content wxx view";i:153;s:18:"content wxx create";i:159;s:22:"content wxx update own";i:162;s:18:"content wxx update";i:165;s:22:"content wxx delete own";i:168;s:18:"content wxx delete";i:171;s:24:"content wxx comment view";i:174;s:26:"content wxx comment create";i:179;s:30:"content wxx comment update own";i:184;s:30:"content wxx comment delete own";i:188;s:17:"content dutu view";i:192;s:19:"content dutu create";i:198;s:23:"content dutu update own";i:202;s:19:"content dutu update";i:206;s:23:"content dutu delete own";i:209;s:19:"content dutu delete";i:213;s:17:"content csdt view";i:216;s:19:"content csdt create";i:221;s:23:"content csdt update own";i:224;s:19:"content csdt update";i:227;s:23:"content csdt delete own";i:230;s:19:"content csdt delete";i:233;s:25:"content csdt comment view";i:236;s:27:"content csdt comment create";i:242;s:27:"content csdt comment update";i:248;s:31:"content csdt comment update own";i:251;s:27:"content csdt comment delete";i:256;s:31:"content csdt comment delete own";i:259;s:15:"content zt view";i:264;s:17:"content zt create";i:269;s:21:"content zt update own";i:272;s:17:"content zt update";i:275;s:21:"content zt delete own";i:278;s:17:"content zt delete";i:281;s:17:"content wxdt view";i:284;s:19:"content wxdt create";i:287;s:23:"content wxdt update own";i:290;s:19:"content wxdt update";i:293;s:23:"content wxdt delete own";i:296;s:19:"content wxdt delete";i:299;s:17:"content plan view";i:302;s:19:"content plan create";i:308;s:23:"content plan update own";i:311;s:19:"content plan update";i:314;s:23:"content plan delete own";i:317;s:19:"content plan delete";i:319;s:20:"content toutiao view";i:321;s:22:"content toutiao create";i:327;s:26:"content toutiao update own";i:330;s:22:"content toutiao update";i:333;s:26:"content toutiao delete own";i:336;s:22:"content toutiao delete";i:339;s:28:"content toutiao comment view";i:342;s:30:"content toutiao comment create";i:345;s:30:"content toutiao comment update";i:348;s:34:"content toutiao comment update own";i:351;s:30:"content toutiao comment delete";i:354;s:34:"content toutiao comment delete own";i:357;}s:7:"comment";a:1:{s:18:"comment admin view";i:360;}s:9:"cheyunhui";a:1:{s:20:"admin cheyunhui list";i:364;}s:2:"ad";a:2:{s:6:"ad add";i:367;s:13:"admin ad list";i:369;}s:5:"ttags";a:2:{s:9:"ttags add";i:371;s:16:"admin ttags list";i:374;}s:3:"one";a:2:{s:7:"one add";i:377;s:14:"admin one list";i:380;}s:10:"cheyunclub";a:4:{s:14:"cheyunclub add";i:383;s:16:"cheyunclub admin";i:386;s:8:"xcnr add";i:389;s:10:"xcnr admin";i:392;}s:7:"article";a:2:{s:11:"article add";i:395;s:13:"article admin";i:398;}}', 4);

-- --------------------------------------------------------

--
-- 表的结构 `storage`
--

CREATE TABLE IF NOT EXISTS `storage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ext_id` int(11) NOT NULL DEFAULT '0' COMMENT '扩展 id',
  `ext_type` varchar(32) NOT NULL DEFAULT '' COMMENT '扩展类型1',
  `ext_type2` varchar(32) NOT NULL DEFAULT '' COMMENT '扩展类型2',
  `weight` int(11) NOT NULL DEFAULT '0' COMMENT '权重',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间',
  `data` longtext NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`),
  KEY `ewt` (`ext_type`,`weight`,`timestamp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='自定义存储表' AUTO_INCREMENT=11 ;

--
-- 导出表中的数据 `storage`
--

INSERT INTO `storage` (`id`, `ext_id`, `ext_type`, `ext_type2`, `weight`, `timestamp`, `data`) VALUES
(3, 5, '27', '1', 0, 0, 'news'),
(5, 7, '28', '2', 0, 0, 'news'),
(6, 6, '27', '1', 0, 0, 'news'),
(7, 0, '28', '1', 0, 0, 'news'),
(10, 12, '28', '3', 0, 0, 'news');

-- --------------------------------------------------------

--
-- 表的结构 `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `filename` varchar(64) NOT NULL DEFAULT '' COMMENT '主键，唯一。模块、主题名称',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '物理路径',
  `type` varchar(16) NOT NULL DEFAULT '' COMMENT '类型，theme 或 module',
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT '状态。0、未启用。1、已启用。-1、默认主题',
  `install` int(11) NOT NULL DEFAULT '0' COMMENT '模块升级版本号记录',
  `weight` int(11) NOT NULL DEFAULT '0' COMMENT '权重。影响模块加载顺序',
  `info` text NOT NULL COMMENT '描述',
  PRIMARY KEY (`filename`),
  KEY `weight` (`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='模块、主题注册表';

--
-- 导出表中的数据 `system`
--

INSERT INTO `system` (`filename`, `path`, `type`, `status`, `install`, `weight`, `info`) VALUES
('admin', 'themes/admin', 'theme', 1, -1, 0, 'a:11:{s:4:"name";s:5:"admin";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:7:"created";i:1252415760;s:7:"updated";i:1258511520;s:11:"description";s:12:"管理主题";s:16:"preview_original";s:27:"images/preview_original.png";s:13:"preview_thumb";s:24:"images/preview_thumb.png";s:6:"weight";i:0;s:9:"uninstall";b:0;s:8:"settings";N;}'),
('aipipi', 'sites/themes/aipipi', 'theme', 0, -1, 0, 'a:13:{s:4:"name";s:6:"aipipi";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:7:"created";i:1252415760;s:7:"updated";i:1258511520;s:11:"description";s:12:"缺省主题";s:16:"preview_original";s:27:"images/preview_original.png";s:13:"preview_thumb";s:24:"images/preview_thumb.png";s:6:"region";a:4:{s:4:"left";s:6:"左栏";s:5:"right";s:6:"右栏";s:6:"contop";s:12:"内容上部";s:6:"bottom";s:6:"底部";}s:6:"styles";a:2:{i:0;s:17:"css/bootstrap.css";i:1;s:13:"css/style.css";}s:7:"scripts";a:1:{i:0;s:5:"my.js";}s:6:"weight";i:0;s:9:"uninstall";b:0;}'),
('article', 'sites/modules/article', 'module', 1, 0, -1, 'a:6:{s:4:"name";s:7:"article";s:11:"description";s:39:"文章模块，创建一个文章类型";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:6:"weight";s:2:"-1";s:9:"uninstall";b:1;}'),
('baidueditor', 'sites/modules/baidueditor', 'module', 1, -1, 0, 'a:5:{s:4:"name";s:15:"百度编辑器";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:6:"weight";i:0;s:9:"uninstall";b:0;}'),
('block', 'modules/block', 'module', 1, 0, 98, 'a:8:{s:4:"name";s:6:"区块";s:11:"description";s:15:"侧边栏模块";s:3:"ver";s:3:"1.0";s:6:"weight";i:98;s:8:"language";s:7:"zh-hans";s:7:"created";i:1258521915;s:7:"updated";i:1258521915;s:9:"uninstall";b:0;}'),
('caiji', 'sites/modules/caiji', 'module', 0, -1, 0, 'a:6:{s:4:"name";s:12:"采集模块";s:11:"description";s:12:"采集模块";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:6:"weight";i:0;s:9:"uninstall";b:1;}'),
('comment', 'sites/modules/comment', 'module', 1, 0, 0, 'a:6:{s:4:"name";s:12:"评论接口";s:11:"description";s:33:"为其它模块提供评论功能";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:6:"weight";i:0;s:9:"uninstall";b:1;}'),
('content', 'sites/modules/content', 'module', 0, -1, 0, 'a:7:{s:4:"name";s:6:"内容";s:11:"description";s:33:"提供完善的内容管理功能";s:3:"ver";s:3:"1.0";s:12:"dependencies";a:1:{i:0;s:7:"comment";}s:8:"language";s:7:"zh-hans";s:6:"weight";i:0;s:9:"uninstall";b:1;}'),
('default', 'themes/default', 'theme', 0, -1, 0, 'a:16:{s:4:"name";s:7:"default";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:7:"created";i:1252415760;s:7:"updated";i:1258511520;s:11:"description";s:12:"缺省主题";s:16:"preview_original";s:27:"images/preview_original.png";s:13:"preview_thumb";s:24:"images/preview_thumb.png";s:6:"region";a:3:{s:4:"left";s:6:"左栏";s:5:"right";s:6:"右栏";s:6:"bottom";s:6:"底部";}s:7:"scripts";a:1:{i:0;s:8:"js/my.js";}s:6:"weight";i:0;s:9:"uninstall";b:0;s:4:"logo";s:77:"sites/bbb.handanw.com/files/cache/themes/4018744f8e352a9950e52b9a6942a345.jpg";s:8:"settings";N;s:6:"styles";a:1:{i:0;s:13:"css/style.css";}s:13:"styles_remove";a:0:{}}'),
('exo', 'sites/themes/exo', 'theme', -1, -1, 0, 'a:12:{s:4:"name";s:3:"exo";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:7:"created";i:1252415760;s:7:"updated";i:1258511520;s:11:"description";s:12:"缺省主题";s:16:"preview_original";s:27:"images/preview_original.png";s:13:"preview_thumb";s:24:"images/preview_thumb.png";s:6:"region";a:4:{s:4:"left";s:6:"左栏";s:5:"right";s:6:"右栏";s:6:"contop";s:12:"内容上部";s:6:"bottom";s:6:"底部";}s:7:"scripts";a:1:{i:0;s:5:"my.js";}s:6:"weight";i:0;s:9:"uninstall";b:0;}'),
('field', 'modules/field', 'module', 1, 3, 0, 'a:8:{s:4:"name";s:6:"字段";s:11:"description";s:21:"自定义表单字段";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:7:"created";i:1265774520;s:7:"updated";i:1265774520;s:6:"weight";i:0;s:9:"uninstall";b:1;}'),
('forum', 'sites/modules/forum', 'module', 0, -1, 0, 'a:7:{s:4:"name";s:6:"微吧";s:11:"description";s:24:"提供基本微吧功能";s:3:"ver";s:3:"1.0";s:12:"dependencies";a:1:{i:0;s:7:"comment";}s:8:"language";s:7:"zh-hans";s:6:"weight";i:0;s:9:"uninstall";b:1;}'),
('guestbook', 'sites/modules/guestbook', 'module', 1, 0, 0, 'a:7:{s:4:"name";s:9:"guestbook";s:11:"description";s:15:"留言本模块";s:3:"ver";s:3:"1.0";s:12:"dependencies";a:1:{i:0;s:7:"comment";}s:8:"language";s:7:"zh-hans";s:6:"weight";i:0;s:9:"uninstall";b:1;}'),
('highcharts', 'sites/modules/highcharts', 'module', 1, -1, 0, 'a:6:{s:4:"name";s:11:"High Charts";s:11:"description";s:21:"highcharts.com 接口";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:6:"weight";i:0;s:9:"uninstall";b:0;}'),
('link', 'sites/modules/link', 'module', 1, 0, 0, 'a:6:{s:4:"name";s:4:"link";s:11:"description";s:18:"合作伙伴模块";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:6:"weight";i:0;s:9:"uninstall";b:1;}'),
('message', 'sites/modules/message', 'module', 1, 0, 0, 'a:6:{s:4:"name";s:7:"message";s:11:"description";s:15:"站内信模块";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:6:"weight";i:0;s:9:"uninstall";b:1;}'),
('oauth', 'sites/modules/oauth', 'module', 1, 0, 0, 'a:6:{s:4:"name";s:24:"新浪开放平台接口";s:11:"description";s:36:"目前实现新浪微博部分功能";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:6:"weight";i:0;s:9:"uninstall";b:1;}'),
('one', 'sites/modules/one', 'module', 1, 0, -1, 'a:6:{s:4:"name";s:3:"one";s:11:"description";s:45:"单页面模块，创建一个单页面类型";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:6:"weight";s:2:"-1";s:9:"uninstall";b:1;}'),
('phone', 'sites/themes/phone', 'theme', 0, -1, 0, 'a:11:{s:4:"name";s:5:"phone";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:7:"created";i:1252415760;s:7:"updated";i:1258511520;s:11:"description";s:12:"缺省主题";s:16:"preview_original";s:27:"images/preview_original.png";s:13:"preview_thumb";s:24:"images/preview_thumb.png";s:6:"region";a:4:{s:4:"left";s:6:"左栏";s:5:"right";s:6:"右栏";s:6:"contop";s:12:"内容上部";s:6:"bottom";s:6:"底部";}s:6:"weight";i:0;s:9:"uninstall";b:0;}'),
('phone1', 'sites/themes/phone1', 'theme', 0, -1, 0, 'a:11:{s:4:"name";s:6:"phone1";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:7:"created";i:1252415760;s:7:"updated";i:1258511520;s:11:"description";s:12:"缺省主题";s:16:"preview_original";s:27:"images/preview_original.png";s:13:"preview_thumb";s:24:"images/preview_thumb.png";s:6:"region";a:4:{s:4:"left";s:6:"左栏";s:5:"right";s:6:"右栏";s:6:"contop";s:12:"内容上部";s:6:"bottom";s:6:"底部";}s:6:"weight";i:0;s:9:"uninstall";b:0;}'),
('system', 'modules/system', 'module', 1, 7, 100, 'a:9:{s:4:"name";s:12:"系统管理";s:4:"pack";s:6:"核心";s:11:"description";s:51:"系统管理模块，所有程序依赖此模块。";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:6:"weight";i:100;s:7:"created";i:1252415760;s:7:"updated";i:1258511520;s:9:"uninstall";b:0;}'),
('user', 'modules/user', 'module', 1, 6, 99, 'a:10:{s:4:"name";s:12:"用户管理";s:4:"pack";s:6:"核心";s:11:"description";s:21:"用户管理模块。";s:3:"ver";s:3:"1.0";s:6:"weight";i:99;s:8:"language";s:7:"zh-hans";s:7:"created";i:1252415760;s:7:"updated";i:1258511520;s:4:"init";i:1;s:9:"uninstall";b:0;}'),
('voteapi', 'sites/modules/voteapi', 'module', 1, 1, 0, 'a:6:{s:4:"name";s:7:"voteapi";s:11:"description";s:39:"为其它模块提供投票计数接口";s:3:"ver";s:3:"1.0";s:8:"language";s:7:"zh-hans";s:6:"weight";i:0;s:9:"uninstall";b:1;}');

-- --------------------------------------------------------

--
-- 表的结构 `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `tid` varchar(128) NOT NULL DEFAULT '',
  `type` varchar(32) NOT NULL DEFAULT '',
  `data` longtext,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户 id',
  `timestamp` int(10) unsigned NOT NULL COMMENT '时间戳',
  `serialized` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否序列化',
  PRIMARY KEY (`tid`),
  KEY `timestamp` (`timestamp`),
  KEY `type` (`type`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='临时表，自动任务将定期清除该表。';

--
-- 导出表中的数据 `temp`
--


-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '' COMMENT '昵称',
  `pass` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `newpass` varchar(32) NOT NULL DEFAULT '' COMMENT '找回密码，生成一个验证码',
  `mail` varchar(64) DEFAULT '' COMMENT '邮箱/登录帐号',
  `validate` varchar(32) NOT NULL DEFAULT '' COMMENT '登录安全验证码',
  `safe` varchar(32) NOT NULL DEFAULT '' COMMENT '帐号保护密码',
  `theme` varchar(255) NOT NULL DEFAULT '' COMMENT '用户主题',
  `language` varchar(32) NOT NULL DEFAULT '' COMMENT '用户语言',
  `created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `salt` char(6) NOT NULL DEFAULT '' COMMENT '密码随机数',
  `login` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最新登陆时间',
  `count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `active` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最近活动时间',
  `online` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '在线时间',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0：未激活。1、允许。2：阻止。3、注销',
  `host` varchar(128) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `session` varchar(64) NOT NULL DEFAULT '' COMMENT 'session',
  `data` longtext COMMENT '其它数据',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `mail` (`mail`),
  KEY `created` (`created`),
  KEY `login` (`login`),
  KEY `count` (`count`),
  KEY `online` (`online`),
  KEY `active` (`active`),
  KEY `language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=11 ;

--
-- 导出表中的数据 `users`
--

INSERT INTO `users` (`uid`, `name`, `pass`, `newpass`, `mail`, `validate`, `safe`, `theme`, `language`, `created`, `salt`, `login`, `count`, `active`, `online`, `status`, `host`, `session`, `data`) VALUES
(0, '游客', '', '', '', '', '', '', '', 1314077726, '', 0, 0, 0, 0, 1, '', '', NULL),
(1, 'aaaaaa', 'ab7081d399feff7e0ea0748758a6f791', 'c1091d30ac41f97cf8fec5e1b6733ac4', 'a@a.com', '', '', '', '', 1338182362, '2RnDI8', 1423280479, 621, 1423281765, 693491, 1, '101.39.118.65', 'g4lshknc8huqaiubf104tq7cm6', NULL),
(2, 'bbbbbb', '8514819b4bd63c5d52764532f9180e75', '', 'b@b.com', '', '', '', '', 1341734014, '1xH09f', 1397441499, 78, 1397441499, 21967, 1, '118.186.17.60', 'f3lism4e9d2ru2oa845di7sik1', NULL),
(3, '江小牛', '3139bf206033f9ed7239077ee7e23f0d', '', '1337875208@t.sina.com.cn', '', '', '', '', 1337875208, 'Iznivq', 0, 0, 0, 0, 1, '127.0.0.1', '', NULL),
(4, 'lvyefeng86', 'dd83f64782aef2d29542d5d2f16865e4', '', '1337875209@t.sina.com.cn', '', '', '', '', 1337875209, 'qt9NiY', 1342198691, 1, 1342198691, 0, 1, '127.0.0.1', 'ad1a6804564e137266c4ffc603fc934a', NULL),
(5, 'lissame', '55a25d14f1fd66c447be2371a2053bf0', '', '1337875210@t.sina.com.cn', '', '', '', '', 1337875210, 'O3QCdg', 0, 0, 0, 0, 1, '127.0.0.1', '', NULL),
(6, 'ruwuhan', 'd5344920e626fe586c9fe9c111becf91', '', '1337875211@t.sina.com.cn', '', '', '', '', 1337875211, 'txRMcG', 0, 0, 0, 0, 1, '127.0.0.1', '', NULL),
(7, 'sunjing123_1985', 'cfc771a6d5a2d3ab30ce18f7e8190016', '', '1337875212@t.sina.com.cn', '', '', '', '', 1337875212, '0J9eqE', 0, 0, 0, 0, 1, '127.0.0.1', '', NULL),
(8, '韩潮文化', 'b94cd497cbe60ad84d80cf0c9d7dde4e', '', '1337875213@t.sina.com.cn', '', '', '', '', 1337875213, '0h0FJN', 0, 0, 0, 0, 1, '127.0.0.1', '', NULL),
(9, 'akinaxyx', 'fa63fb383afc05dfc970ae01cdbce066', '', '1337875214@t.sina.com.cn', '', '', '', '', 1337875214, 'c0VQ41', 0, 0, 0, 0, 1, '127.0.0.1', '', NULL),
(10, 'l307458276', '65404dc3049c2c386344e40f41e1cc01', '', '1337875216@t.sina.com.cn', '', '', '', '', 1337875216, 'gdt2Dk', 0, 0, 0, 0, 1, '127.0.0.1', '', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user_ext`
--

CREATE TABLE IF NOT EXISTS `user_ext` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '在 users 中的 uid',
  `ext_name` varchar(64) NOT NULL DEFAULT '' COMMENT '第三方用户名',
  `ext_type` varchar(32) NOT NULL DEFAULT '' COMMENT '第三方类型或其它标识',
  `type` varchar(16) NOT NULL DEFAULT '' COMMENT '模块自定义标识，如：weibo',
  `ext_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展 id',
  `data` longtext COMMENT '其它数据',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`aid`),
  KEY `type` (`type`),
  KEY `uid` (`uid`),
  KEY `ta` (`type`,`aid`),
  KEY `tt` (`type`,`ext_type`),
  KEY `ti` (`type`,`ext_id`),
  KEY `tn` (`type`,`ext_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='与第三方关联的用户，一个系统用户可关联多个第三方用户' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `user_ext`
--


-- --------------------------------------------------------

--
-- 表的结构 `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `uid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  UNIQUE KEY `role` (`uid`,`rid`),
  KEY `f_user_roles_role_rid_rid` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户所属角色组，可属多个角色组，权限叠加';

--
-- 导出表中的数据 `user_roles`
--

INSERT INTO `user_roles` (`uid`, `rid`) VALUES
(1, 2),
(2, 2),
(48, 2),
(49, 2);

-- --------------------------------------------------------

--
-- 表的结构 `variable`
--

CREATE TABLE IF NOT EXISTS `variable` (
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
  `value` longtext NOT NULL COMMENT '内容',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统配置表';

--
-- 导出表中的数据 `variable`
--

INSERT INTO `variable` (`name`, `value`) VALUES
('admin_custom_links', 's:1:"0";'),
('alias', 's:1:"0";'),
('cache_css_and_js', 's:1:"0";'),
('cache_css_and_js_timestamp', 'i:1423280546;'),
('cache_memcache_host', 's:9:"localhost";'),
('cache_memcache_port', 's:5:"11211";'),
('cache_memcache_prefix', 's:13:"wwwxingzuocom";'),
('clean_url', 's:1:"1";'),
('cron_last_time', 'i:1400868213;'),
('cron_min_time', 's:4:"3600";'),
('cron_pass', 's:0:"";'),
('crypt_default_key', 's:7:"xingzuo";'),
('custom_view', 's:1:"0";'),
('dd_cache_file', 's:19:"/includes/cache.inc";'),
('debug', 'i:1;'),
('default_format', 's:1:"2";'),
('default_language', 's:7:"zh-hans";'),
('default_theme', 's:3:"exo";'),
('field_count', 'a:2:{s:15:"articlemy_field";i:1;s:9:"userfield";i:1;}'),
('field_data', 'a:11:{i:1;O:8:"stdClass":15:{s:8:"field_id";s:1:"1";s:10:"field_type";s:6:"select";s:9:"field_key";s:5:"lanmu";s:10:"field_func";s:0:"";s:4:"type";s:8:"my_field";s:6:"module";s:7:"article";s:4:"name";s:12:"栏目分类";s:6:"weight";s:1:"0";s:8:"required";s:1:"1";s:6:"access";N;s:7:"deleted";s:1:"1";s:6:"locked";s:1:"0";s:4:"data";a:2:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";}s:6:"groups";s:0:"";s:12:"field_module";s:5:"field";}i:4;O:8:"stdClass":15:{s:8:"field_id";s:1:"4";s:10:"field_type";s:4:"tags";s:9:"field_key";s:4:"tags";s:10:"field_func";s:0:"";s:4:"type";s:8:"my_field";s:6:"module";s:7:"article";s:4:"name";s:4:"tags";s:6:"weight";s:1:"0";s:8:"required";s:1:"0";s:6:"access";N;s:7:"deleted";s:1:"1";s:6:"locked";s:1:"0";s:4:"data";a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:8:"validate";a:5:{s:12:"autocomplete";s:1:"1";s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:2:{s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}s:6:"groups";s:0:"";s:12:"field_module";s:5:"field";}i:5;O:8:"stdClass":15:{s:8:"field_id";s:1:"5";s:10:"field_type";s:4:"file";s:9:"field_key";s:6:"litpic";s:10:"field_func";s:0:"";s:4:"type";s:5:"field";s:6:"module";s:4:"user";s:4:"name";s:6:"头像";s:6:"weight";s:1:"0";s:8:"required";s:1:"0";s:6:"access";a:0:{}s:7:"deleted";s:1:"1";s:6:"locked";s:1:"0";s:4:"data";a:10:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"access";a:2:{s:5:"input";a:2:{i:1;s:1:"1";i:2;s:1:"2";}s:7:"display";s:1:"0";}s:5:"multi";s:1:"1";s:8:"filetype";s:0:"";s:8:"filesize";s:0:"";s:8:"filename";s:0:"";s:9:"extension";s:0:"";s:6:"thumbs";a:2:{s:5:"thumb";s:5:"85x85";s:6:"medium";s:7:"200x200";}s:8:"savepath";s:0:"";}s:6:"groups";s:0:"";s:12:"field_module";s:5:"field";}i:21;O:8:"stdClass":15:{s:8:"field_id";s:2:"21";s:10:"field_type";s:4:"tags";s:9:"field_key";s:4:"tags";s:10:"field_func";s:0:"";s:4:"type";s:5:"field";s:6:"module";s:4:"user";s:4:"name";s:6:"标签";s:6:"weight";s:1:"0";s:8:"required";s:1:"0";s:6:"access";a:0:{}s:7:"deleted";s:1:"1";s:6:"locked";s:1:"0";s:4:"data";a:4:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"access";a:1:{s:5:"input";a:1:{i:2;s:1:"2";}}s:8:"validate";a:4:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:2:{s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}s:6:"groups";s:0:"";s:12:"field_module";s:5:"field";}i:27;O:8:"stdClass":15:{s:8:"field_id";s:2:"27";s:10:"field_type";s:9:"textfield";s:9:"field_key";s:5:"tsina";s:10:"field_func";s:0:"";s:4:"type";s:5:"field";s:6:"module";s:4:"user";s:4:"name";s:12:"新浪微博";s:6:"weight";s:1:"0";s:8:"required";s:1:"0";s:6:"access";a:0:{}s:7:"deleted";s:1:"1";s:6:"locked";s:1:"0";s:4:"data";a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:8:"validate";a:4:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:4:{s:4:"date";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"date_time";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}s:6:"groups";s:0:"";s:12:"field_module";s:5:"field";}i:28;O:8:"stdClass":15:{s:8:"field_id";s:2:"28";s:10:"field_type";s:9:"textfield";s:9:"field_key";s:3:"tqq";s:10:"field_func";s:0:"";s:4:"type";s:5:"field";s:6:"module";s:4:"user";s:4:"name";s:12:"腾讯微博";s:6:"weight";s:1:"0";s:8:"required";s:1:"0";s:6:"access";a:0:{}s:7:"deleted";s:1:"1";s:6:"locked";s:1:"0";s:4:"data";a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:8:"validate";a:4:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:4:{s:4:"date";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"date_time";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}s:6:"groups";s:0:"";s:12:"field_module";s:5:"field";}i:30;O:8:"stdClass":15:{s:8:"field_id";s:2:"30";s:10:"field_type";s:6:"select";s:9:"field_key";s:4:"flag";s:10:"field_func";s:0:"";s:4:"type";s:5:"field";s:6:"module";s:4:"user";s:4:"name";s:6:"推荐";s:6:"weight";s:1:"0";s:8:"required";s:1:"0";s:6:"access";a:0:{}s:7:"deleted";s:1:"1";s:6:"locked";s:1:"0";s:4:"data";a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"access";a:2:{s:5:"input";a:1:{i:3;s:1:"3";}s:7:"display";s:1:"0";}}s:6:"groups";s:0:"";s:12:"field_module";s:5:"field";}i:36;O:8:"stdClass":15:{s:8:"field_id";s:2:"36";s:10:"field_type";s:6:"select";s:9:"field_key";s:6:"weight";s:10:"field_func";s:0:"";s:4:"type";s:5:"field";s:6:"module";s:4:"user";s:4:"name";s:6:"排序";s:6:"weight";s:1:"0";s:8:"required";s:1:"0";s:6:"access";a:0:{}s:7:"deleted";s:1:"1";s:6:"locked";s:1:"0";s:4:"data";a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"access";a:2:{s:5:"input";a:1:{i:3;s:1:"3";}s:7:"display";s:1:"0";}}s:6:"groups";s:0:"";s:12:"field_module";s:5:"field";}i:34;O:8:"stdClass":15:{s:8:"field_id";s:2:"34";s:10:"field_type";s:9:"textfield";s:9:"field_key";s:6:"gongsi";s:10:"field_func";s:0:"";s:4:"type";s:5:"field";s:6:"module";s:4:"user";s:4:"name";s:6:"公司";s:6:"weight";s:1:"1";s:8:"required";s:1:"0";s:6:"access";a:0:{}s:7:"deleted";s:1:"1";s:6:"locked";s:1:"0";s:4:"data";a:3:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:8:"validate";a:4:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:4:{s:4:"date";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"date_time";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}s:6:"groups";s:0:"";s:12:"field_module";s:5:"field";}i:20;O:8:"stdClass":15:{s:8:"field_id";s:2:"20";s:10:"field_type";s:9:"textfield";s:9:"field_key";s:6:"zhiwei";s:10:"field_func";s:0:"";s:4:"type";s:5:"field";s:6:"module";s:4:"user";s:4:"name";s:6:"职位";s:6:"weight";s:1:"2";s:8:"required";s:1:"0";s:6:"access";a:0:{}s:7:"deleted";s:1:"1";s:6:"locked";s:1:"0";s:4:"data";a:4:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"access";a:1:{s:5:"input";a:1:{i:2;s:1:"2";}}s:8:"validate";a:4:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";s:4:"type";s:1:"0";s:8:"settings";a:4:{s:4:"date";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"date_time";a:7:{s:10:"value_type";s:8:"yy-mm-dd";s:10:"datepicker";s:1:"1";s:9:"yearRange";s:0:"";s:7:"maxDate";s:0:"";s:7:"minDate";s:0:"";s:12:"start_or_end";s:1:"0";s:9:"field_key";s:0:"";}s:9:"custom_ok";a:1:{s:6:"values";s:0:"";}s:10:"custom_not";a:1:{s:6:"values";s:0:"";}}}}s:6:"groups";s:0:"";s:12:"field_module";s:5:"field";}i:29;O:8:"stdClass":15:{s:8:"field_id";s:2:"29";s:10:"field_type";s:8:"textarea";s:9:"field_key";s:7:"jieshao";s:10:"field_func";s:0:"";s:4:"type";s:5:"field";s:6:"module";s:4:"user";s:4:"name";s:12:"个人介绍";s:6:"weight";s:2:"17";s:8:"required";s:1:"0";s:6:"access";a:0:{}s:7:"deleted";s:1:"1";s:6:"locked";s:1:"0";s:4:"data";a:4:{s:17:"input_description";s:0:"";s:11:"description";s:0:"";s:6:"format";s:1:"2";s:8:"validate";a:2:{s:7:"maxsize";s:0:"";s:7:"minsize";s:0:"";}}s:6:"groups";s:0:"";s:12:"field_module";s:5:"field";}}'),
('field_term_children', 'a:1:{i:1;i:1;}'),
('file_directory_path', 's:11:"sites/files";'),
('file_image_quality', 's:3:"100";'),
('file_image_watermark', 'a:6:{s:7:"default";s:1:"0";s:4:"file";s:1:"0";s:6:"garble";s:1:"0";s:11:"garble_file";s:1:"0";s:9:"min_width";s:3:"150";s:10:"min_height";s:3:"150";}'),
('file_upload_rename', 's:1:"0";'),
('file_user_directory', 's:28:"user-[uid]/[date_Y]-[date_m]";'),
('filters', 'a:1:{i:2;a:4:{i:0;a:4:{s:6:"filter";s:1:"1";s:6:"format";s:1:"2";s:5:"delta";s:1:"0";s:6:"module";s:7:"comment";}i:1;a:4:{s:6:"filter";s:1:"1";s:6:"format";s:1:"2";s:5:"delta";s:1:"1";s:6:"module";s:6:"system";}i:2;a:4:{s:6:"filter";s:1:"1";s:6:"format";s:1:"2";s:5:"delta";s:6:"smiley";s:6:"module";s:6:"system";}i:3;a:4:{s:6:"filter";s:1:"1";s:6:"format";s:1:"2";s:5:"delta";s:2:"br";s:6:"module";s:6:"system";}}}'),
('filter_cache', 's:1:"0";'),
('filter_system_type_1', 'N;'),
('format', 'a:1:{s:0:"";a:3:{i:0;a:5:{s:6:"format";s:1:"1";s:4:"name";s:9:"纯文本";s:11:"description";s:61:"不允许任何 HTML 标签，仅将换行符转换为 <br />";s:5:"delta";s:1:"0";s:6:"module";s:6:"system";}i:1;a:5:{s:6:"format";s:1:"3";s:4:"name";s:10:"PHP 代码";s:11:"description";s:29:"将内容解析为 PHP 代码";s:5:"delta";s:1:"2";s:6:"module";s:6:"system";}i:2;a:5:{s:6:"format";s:1:"1";s:4:"name";s:9:"纯文本";s:11:"description";s:61:"不允许任何 HTML 标签，仅将换行符转换为 <br />";s:5:"delta";s:1:"1";s:6:"module";s:6:"system";}}}'),
('formats', 'a:1:{i:2;a:4:{s:5:"roles";N;s:6:"format";s:1:"2";s:4:"name";s:11:"完整 HTML";s:11:"description";s:24:"允许任何 HTML 标签";}}'),
('format_roles', 'a:0:{}'),
('form_id', 's:21:"system_cache_settings";'),
('form_token', 's:32:"e05c043ecb9e6a9283ce125365e60899";'),
('front_view_module', 's:1:"0";'),
('front_view_type', 's:1:"0";'),
('history_enabled', 's:1:"0";'),
('history_enabled_limit', 's:6:"100000";'),
('hook_cache', 'a:31:{s:5:"theme";a:9:{s:6:"system";s:12:"system_theme";s:4:"user";s:10:"user_theme";s:5:"block";s:11:"block_theme";s:4:"link";s:10:"link_theme";s:9:"guestbook";s:15:"guestbook_theme";s:5:"field";s:11:"field_theme";s:7:"comment";s:13:"comment_theme";s:3:"one";s:9:"one_theme";s:7:"article";s:13:"article_theme";}s:18:"system_cache_clear";a:4:{s:6:"system";s:25:"system_system_cache_clear";s:4:"user";s:23:"user_system_cache_clear";s:5:"field";s:24:"field_system_cache_clear";s:7:"article";s:26:"article_system_cache_clear";}s:15:"field_call_list";a:1:{s:5:"field";s:21:"field_field_call_list";}s:15:"field_call_load";b:0;s:10:"form_alter";a:1:{s:7:"article";s:18:"article_form_alter";}s:14:"form_type_info";b:0;s:24:"template_preprocess_page";b:0;s:9:"site_menu";a:3:{s:4:"user";s:14:"user_site_menu";s:3:"one";s:13:"one_site_menu";s:7:"article";s:17:"article_site_menu";}s:18:"system_admin_menus";a:9:{s:6:"system";s:25:"system_system_admin_menus";s:4:"user";s:23:"user_system_admin_menus";s:5:"block";s:24:"block_system_admin_menus";s:5:"oauth";s:24:"oauth_system_admin_menus";s:4:"link";s:23:"link_system_admin_menus";s:9:"guestbook";s:28:"guestbook_system_admin_menus";s:7:"comment";s:26:"comment_system_admin_menus";s:3:"one";s:22:"one_system_admin_menus";s:7:"article";s:26:"article_system_admin_menus";}s:17:"alter_admin_menus";b:0;s:10:"front_view";b:0;s:10:"front_page";b:0;s:15:"field_node_load";b:0;s:12:"article_load";a:1:{s:3:"one";s:16:"one_article_load";}s:16:"field_call_links";a:1:{s:5:"field";s:22:"field_field_call_links";}s:20:"field_call_term_load";b:0;s:22:"field_call_term_delete";b:0;s:20:"field_call_term_form";b:0;s:24:"field_call_term_validate";b:0;s:20:"field_call_term_save";a:1:{s:7:"article";s:28:"article_field_call_term_save";}s:20:"system_site_settings";b:0;s:18:"system_site_global";b:0;s:15:"field_node_form";b:0;s:15:"field_node_save";b:0;s:12:"article_save";b:0;s:8:"one_save";b:0;s:20:"system_admin_default";a:1:{s:6:"system";s:27:"system_system_admin_default";}s:15:"field_call_form";a:2:{s:4:"user";s:20:"user_field_call_form";s:5:"field";s:21:"field_field_call_form";}s:19:"field_call_validate";a:1:{s:5:"field";s:25:"field_field_call_validate";}s:15:"field_call_save";a:1:{s:5:"field";s:21:"field_field_call_save";}s:17:"field_call_delete";b:0;}'),
('languages', 'a:2:{s:7:"zh-hans";s:12:"简体中文";s:7:"zh-hant";s:12:"繁體中文";}'),
('logs_enabled_limit', 's:6:"100000";'),
('menu_masks', 'a:12:{i:0;i:30;i:1;i:28;i:2;i:15;i:3;i:14;i:4;i:13;i:5;i:7;i:6;i:6;i:7;i:5;i:8;i:4;i:9;i:3;i:10;i:2;i:11;i:1;}'),
('modules', 'a:14:{s:6:"system";a:4:{s:8:"filename";s:6:"system";s:4:"path";s:14:"modules/system";s:4:"name";s:12:"系统管理";s:8:"language";s:7:"zh-hans";}s:4:"user";a:4:{s:8:"filename";s:4:"user";s:4:"path";s:12:"modules/user";s:4:"name";s:12:"用户管理";s:8:"language";s:7:"zh-hans";}s:5:"block";a:4:{s:8:"filename";s:5:"block";s:4:"path";s:13:"modules/block";s:4:"name";s:6:"区块";s:8:"language";s:7:"zh-hans";}s:7:"voteapi";a:4:{s:8:"filename";s:7:"voteapi";s:4:"path";s:21:"sites/modules/voteapi";s:4:"name";s:7:"voteapi";s:8:"language";s:7:"zh-hans";}s:5:"oauth";a:4:{s:8:"filename";s:5:"oauth";s:4:"path";s:19:"sites/modules/oauth";s:4:"name";s:24:"新浪开放平台接口";s:8:"language";s:7:"zh-hans";}s:7:"message";a:4:{s:8:"filename";s:7:"message";s:4:"path";s:21:"sites/modules/message";s:4:"name";s:7:"message";s:8:"language";s:7:"zh-hans";}s:4:"link";a:4:{s:8:"filename";s:4:"link";s:4:"path";s:18:"sites/modules/link";s:4:"name";s:4:"link";s:8:"language";s:7:"zh-hans";}s:10:"highcharts";a:4:{s:8:"filename";s:10:"highcharts";s:4:"path";s:24:"sites/modules/highcharts";s:4:"name";s:11:"High Charts";s:8:"language";s:7:"zh-hans";}s:9:"guestbook";a:4:{s:8:"filename";s:9:"guestbook";s:4:"path";s:23:"sites/modules/guestbook";s:4:"name";s:9:"guestbook";s:8:"language";s:7:"zh-hans";}s:5:"field";a:4:{s:8:"filename";s:5:"field";s:4:"path";s:13:"modules/field";s:4:"name";s:6:"字段";s:8:"language";s:7:"zh-hans";}s:7:"comment";a:4:{s:8:"filename";s:7:"comment";s:4:"path";s:21:"sites/modules/comment";s:4:"name";s:12:"评论接口";s:8:"language";s:7:"zh-hans";}s:11:"baidueditor";a:4:{s:8:"filename";s:11:"baidueditor";s:4:"path";s:25:"sites/modules/baidueditor";s:4:"name";s:15:"百度编辑器";s:8:"language";s:7:"zh-hans";}s:3:"one";a:4:{s:8:"filename";s:3:"one";s:4:"path";s:17:"sites/modules/one";s:4:"name";s:3:"one";s:8:"language";s:7:"zh-hans";}s:7:"article";a:4:{s:8:"filename";s:7:"article";s:4:"path";s:21:"sites/modules/article";s:4:"name";s:7:"article";s:8:"language";s:7:"zh-hans";}}'),
('oauth', 'a:8:{s:8:"is_login";s:1:"0";s:23:"sina_oauth_consumer_key";s:10:"2772204160";s:26:"sina_oauth_consumer_secret";s:32:"c4a2c8d5d25e6f7c58b86204fd0502ec";s:25:"renren_oauth_consumer_key";s:3:"aaa";s:28:"renren_oauth_consumer_secret";s:3:"bbb";s:34:"renren_oauth_consumer_redirect_uri";s:3:"ccc";s:21:"qq_oauth_consumer_key";s:9:"100414565";s:24:"qq_oauth_consumer_secret";s:32:"d6346bfdaa9ef2b1c06bce56500d59bf";}'),
('php_info', 's:1:"0";'),
('roles_perm_cache', 'a:6:{i:1;a:16:{s:19:"user view user info";i:0;s:11:"message add";i:1;s:13:"guestbook add";i:2;s:17:"content news view";i:3;s:25:"content news comment view";i:4;s:27:"content news comment create";i:5;s:16:"content wxx view";i:6;s:24:"content wxx comment view";i:7;s:26:"content wxx comment create";i:8;s:17:"content dutu view";i:9;s:17:"content csdt view";i:10;s:25:"content csdt comment view";i:11;s:27:"content csdt comment create";i:12;s:15:"content zt view";i:13;s:17:"content plan view";i:14;s:20:"content toutiao view";i:15;}i:2;a:27:{s:11:"file upload";i:0;s:13:"file one view";i:1;s:15:"file one delete";i:2;s:15:"file one update";i:3;s:19:"user view user info";i:4;s:16:"user change name";i:5;s:11:"message add";i:6;s:13:"guestbook add";i:7;s:17:"content news view";i:8;s:25:"content news comment view";i:9;s:27:"content news comment create";i:10;s:31:"content news comment update own";i:11;s:31:"content news comment delete own";i:12;s:16:"content wxx view";i:13;s:24:"content wxx comment view";i:14;s:26:"content wxx comment create";i:15;s:30:"content wxx comment update own";i:16;s:30:"content wxx comment delete own";i:17;s:17:"content dutu view";i:18;s:17:"content csdt view";i:19;s:25:"content csdt comment view";i:20;s:27:"content csdt comment create";i:21;s:31:"content csdt comment update own";i:22;s:31:"content csdt comment delete own";i:23;s:15:"content zt view";i:24;s:17:"content plan view";i:25;s:20:"content toutiao view";i:26;}i:3;a:102:{s:17:"system view admin";i:0;s:11:"file upload";i:1;s:13:"file one view";i:2;s:15:"file one delete";i:3;s:15:"file one update";i:4;s:19:"user view user info";i:5;s:20:"user use search user";i:6;s:15:"admin user view";i:7;s:14:"admin user add";i:8;s:22:"admin user change name";i:9;s:15:"user change own";i:10;s:16:"user change mail";i:11;s:16:"user change name";i:12;s:11:"admin block";i:13;s:11:"message add";i:14;s:8:"link add";i:15;s:15:"admin link list";i:16;s:13:"guestbook add";i:17;s:20:"admin guestbook list";i:18;s:7:"crm add";i:19;s:14:"admin crm list";i:20;s:18:"admin content view";i:21;s:17:"content news view";i:22;s:19:"content news create";i:23;s:23:"content news update own";i:24;s:19:"content news update";i:25;s:23:"content news delete own";i:26;s:19:"content news delete";i:27;s:25:"content news comment view";i:28;s:27:"content news comment create";i:29;s:27:"content news comment update";i:30;s:31:"content news comment update own";i:31;s:27:"content news comment delete";i:32;s:31:"content news comment delete own";i:33;s:16:"content wxx view";i:34;s:18:"content wxx create";i:35;s:22:"content wxx update own";i:36;s:18:"content wxx update";i:37;s:22:"content wxx delete own";i:38;s:18:"content wxx delete";i:39;s:24:"content wxx comment view";i:40;s:26:"content wxx comment create";i:41;s:30:"content wxx comment update own";i:42;s:30:"content wxx comment delete own";i:43;s:17:"content dutu view";i:44;s:19:"content dutu create";i:45;s:23:"content dutu update own";i:46;s:19:"content dutu update";i:47;s:23:"content dutu delete own";i:48;s:19:"content dutu delete";i:49;s:17:"content csdt view";i:50;s:19:"content csdt create";i:51;s:23:"content csdt update own";i:52;s:19:"content csdt update";i:53;s:23:"content csdt delete own";i:54;s:19:"content csdt delete";i:55;s:25:"content csdt comment view";i:56;s:27:"content csdt comment create";i:57;s:27:"content csdt comment update";i:58;s:31:"content csdt comment update own";i:59;s:27:"content csdt comment delete";i:60;s:31:"content csdt comment delete own";i:61;s:15:"content zt view";i:62;s:17:"content zt create";i:63;s:21:"content zt update own";i:64;s:17:"content zt update";i:65;s:21:"content zt delete own";i:66;s:17:"content zt delete";i:67;s:17:"content wxdt view";i:68;s:19:"content wxdt create";i:69;s:23:"content wxdt update own";i:70;s:19:"content wxdt update";i:71;s:23:"content wxdt delete own";i:72;s:19:"content wxdt delete";i:73;s:17:"content plan view";i:74;s:19:"content plan create";i:75;s:23:"content plan update own";i:76;s:19:"content plan update";i:77;s:20:"content toutiao view";i:78;s:22:"content toutiao create";i:79;s:26:"content toutiao update own";i:80;s:22:"content toutiao update";i:81;s:26:"content toutiao delete own";i:82;s:22:"content toutiao delete";i:83;s:28:"content toutiao comment view";i:84;s:30:"content toutiao comment create";i:85;s:30:"content toutiao comment update";i:86;s:34:"content toutiao comment update own";i:87;s:30:"content toutiao comment delete";i:88;s:34:"content toutiao comment delete own";i:89;s:18:"comment admin view";i:90;s:20:"admin cheyunhui list";i:91;s:9:"ttags add";i:92;s:16:"admin ttags list";i:93;s:7:"one add";i:94;s:14:"admin one list";i:95;s:14:"cheyunclub add";i:96;s:16:"cheyunclub admin";i:97;s:8:"xcnr add";i:98;s:10:"xcnr admin";i:99;s:11:"article add";i:100;s:13:"article admin";i:101;}i:4;a:31:{s:11:"file upload";i:0;s:13:"file one view";i:1;s:15:"file one delete";i:2;s:15:"file one update";i:3;s:19:"user view user info";i:4;s:16:"user change name";i:5;s:11:"message add";i:6;s:13:"guestbook add";i:7;s:18:"admin content view";i:8;s:17:"content news view";i:9;s:19:"content news create";i:10;s:23:"content news update own";i:11;s:23:"content news delete own";i:12;s:25:"content news comment view";i:13;s:27:"content news comment create";i:14;s:27:"content news comment update";i:15;s:31:"content news comment update own";i:16;s:27:"content news comment delete";i:17;s:31:"content news comment delete own";i:18;s:16:"content wxx view";i:19;s:17:"content dutu view";i:20;s:19:"content dutu create";i:21;s:23:"content dutu update own";i:22;s:23:"content dutu delete own";i:23;s:25:"content csdt comment view";i:24;s:27:"content csdt comment create";i:25;s:31:"content csdt comment update own";i:26;s:31:"content csdt comment delete own";i:27;s:17:"content plan view";i:28;s:20:"content toutiao view";i:29;s:18:"comment admin view";i:30;}i:5;a:112:{s:17:"system view admin";i:0;s:11:"file upload";i:1;s:13:"file all view";i:2;s:13:"file one view";i:3;s:15:"file all delete";i:4;s:15:"file one delete";i:5;s:15:"file all update";i:6;s:15:"file one update";i:7;s:19:"user view user info";i:8;s:20:"user use search user";i:9;s:15:"admin user view";i:10;s:14:"admin user add";i:11;s:19:"admin user edit all";i:12;s:22:"admin user change mail";i:13;s:22:"admin user change name";i:14;s:15:"user change own";i:15;s:16:"user change mail";i:16;s:16:"user change name";i:17;s:11:"admin block";i:18;s:11:"message add";i:19;s:8:"link add";i:20;s:15:"admin link list";i:21;s:13:"guestbook add";i:22;s:20:"admin guestbook list";i:23;s:7:"crm add";i:24;s:14:"admin crm list";i:25;s:18:"admin content view";i:26;s:18:"admin content type";i:27;s:17:"content news view";i:28;s:19:"content news create";i:29;s:23:"content news update own";i:30;s:19:"content news update";i:31;s:23:"content news delete own";i:32;s:19:"content news delete";i:33;s:25:"content news comment view";i:34;s:27:"content news comment create";i:35;s:27:"content news comment update";i:36;s:31:"content news comment update own";i:37;s:27:"content news comment delete";i:38;s:31:"content news comment delete own";i:39;s:16:"content wxx view";i:40;s:18:"content wxx create";i:41;s:22:"content wxx update own";i:42;s:18:"content wxx update";i:43;s:22:"content wxx delete own";i:44;s:18:"content wxx delete";i:45;s:24:"content wxx comment view";i:46;s:26:"content wxx comment create";i:47;s:30:"content wxx comment update own";i:48;s:30:"content wxx comment delete own";i:49;s:17:"content dutu view";i:50;s:19:"content dutu create";i:51;s:23:"content dutu update own";i:52;s:19:"content dutu update";i:53;s:23:"content dutu delete own";i:54;s:19:"content dutu delete";i:55;s:17:"content csdt view";i:56;s:19:"content csdt create";i:57;s:23:"content csdt update own";i:58;s:19:"content csdt update";i:59;s:23:"content csdt delete own";i:60;s:19:"content csdt delete";i:61;s:25:"content csdt comment view";i:62;s:27:"content csdt comment create";i:63;s:27:"content csdt comment update";i:64;s:31:"content csdt comment update own";i:65;s:27:"content csdt comment delete";i:66;s:31:"content csdt comment delete own";i:67;s:15:"content zt view";i:68;s:17:"content zt create";i:69;s:21:"content zt update own";i:70;s:17:"content zt update";i:71;s:21:"content zt delete own";i:72;s:17:"content zt delete";i:73;s:17:"content wxdt view";i:74;s:19:"content wxdt create";i:75;s:23:"content wxdt update own";i:76;s:19:"content wxdt update";i:77;s:23:"content wxdt delete own";i:78;s:19:"content wxdt delete";i:79;s:17:"content plan view";i:80;s:19:"content plan create";i:81;s:23:"content plan update own";i:82;s:19:"content plan update";i:83;s:23:"content plan delete own";i:84;s:19:"content plan delete";i:85;s:20:"content toutiao view";i:86;s:22:"content toutiao create";i:87;s:26:"content toutiao update own";i:88;s:22:"content toutiao update";i:89;s:26:"content toutiao delete own";i:90;s:22:"content toutiao delete";i:91;s:28:"content toutiao comment view";i:92;s:30:"content toutiao comment create";i:93;s:30:"content toutiao comment update";i:94;s:34:"content toutiao comment update own";i:95;s:30:"content toutiao comment delete";i:96;s:34:"content toutiao comment delete own";i:97;s:18:"comment admin view";i:98;s:20:"admin cheyunhui list";i:99;s:6:"ad add";i:100;s:13:"admin ad list";i:101;s:9:"ttags add";i:102;s:16:"admin ttags list";i:103;s:7:"one add";i:104;s:14:"admin one list";i:105;s:14:"cheyunclub add";i:106;s:16:"cheyunclub admin";i:107;s:8:"xcnr add";i:108;s:10:"xcnr admin";i:109;s:11:"article add";i:110;s:13:"article admin";i:111;}i:6;a:112:{s:17:"system view admin";i:0;s:18:"system admin cache";i:1;s:11:"file upload";i:2;s:13:"file all view";i:3;s:13:"file one view";i:4;s:15:"file all delete";i:5;s:15:"file one delete";i:6;s:15:"file all update";i:7;s:15:"file one update";i:8;s:19:"user view user info";i:9;s:20:"user use search user";i:10;s:15:"admin user view";i:11;s:14:"admin user add";i:12;s:19:"admin user edit all";i:13;s:22:"admin user change mail";i:14;s:22:"admin user change name";i:15;s:15:"user change own";i:16;s:16:"user change mail";i:17;s:16:"user change name";i:18;s:11:"admin block";i:19;s:11:"message add";i:20;s:18:"admin message list";i:21;s:8:"link add";i:22;s:15:"admin link list";i:23;s:13:"guestbook add";i:24;s:20:"admin guestbook list";i:25;s:18:"admin content view";i:26;s:18:"admin content type";i:27;s:17:"content news view";i:28;s:19:"content news create";i:29;s:23:"content news update own";i:30;s:19:"content news update";i:31;s:23:"content news delete own";i:32;s:19:"content news delete";i:33;s:25:"content news comment view";i:34;s:27:"content news comment create";i:35;s:27:"content news comment update";i:36;s:31:"content news comment update own";i:37;s:27:"content news comment delete";i:38;s:31:"content news comment delete own";i:39;s:16:"content wxx view";i:40;s:18:"content wxx create";i:41;s:22:"content wxx update own";i:42;s:18:"content wxx update";i:43;s:22:"content wxx delete own";i:44;s:18:"content wxx delete";i:45;s:24:"content wxx comment view";i:46;s:26:"content wxx comment create";i:47;s:30:"content wxx comment update own";i:48;s:30:"content wxx comment delete own";i:49;s:17:"content dutu view";i:50;s:19:"content dutu create";i:51;s:23:"content dutu update own";i:52;s:19:"content dutu update";i:53;s:23:"content dutu delete own";i:54;s:19:"content dutu delete";i:55;s:17:"content csdt view";i:56;s:19:"content csdt create";i:57;s:23:"content csdt update own";i:58;s:19:"content csdt update";i:59;s:23:"content csdt delete own";i:60;s:19:"content csdt delete";i:61;s:25:"content csdt comment view";i:62;s:27:"content csdt comment create";i:63;s:27:"content csdt comment update";i:64;s:31:"content csdt comment update own";i:65;s:27:"content csdt comment delete";i:66;s:31:"content csdt comment delete own";i:67;s:15:"content zt view";i:68;s:17:"content zt create";i:69;s:21:"content zt update own";i:70;s:17:"content zt update";i:71;s:21:"content zt delete own";i:72;s:17:"content zt delete";i:73;s:17:"content wxdt view";i:74;s:19:"content wxdt create";i:75;s:23:"content wxdt update own";i:76;s:19:"content wxdt update";i:77;s:23:"content wxdt delete own";i:78;s:19:"content wxdt delete";i:79;s:17:"content plan view";i:80;s:19:"content plan create";i:81;s:23:"content plan update own";i:82;s:19:"content plan update";i:83;s:23:"content plan delete own";i:84;s:19:"content plan delete";i:85;s:20:"content toutiao view";i:86;s:22:"content toutiao create";i:87;s:26:"content toutiao update own";i:88;s:22:"content toutiao update";i:89;s:26:"content toutiao delete own";i:90;s:22:"content toutiao delete";i:91;s:28:"content toutiao comment view";i:92;s:30:"content toutiao comment create";i:93;s:30:"content toutiao comment update";i:94;s:34:"content toutiao comment update own";i:95;s:30:"content toutiao comment delete";i:96;s:34:"content toutiao comment delete own";i:97;s:18:"comment admin view";i:98;s:20:"admin cheyunhui list";i:99;s:6:"ad add";i:100;s:13:"admin ad list";i:101;s:9:"ttags add";i:102;s:16:"admin ttags list";i:103;s:7:"one add";i:104;s:14:"admin one list";i:105;s:14:"cheyunclub add";i:106;s:16:"cheyunclub admin";i:107;s:8:"xcnr add";i:108;s:10:"xcnr admin";i:109;s:11:"article add";i:110;s:13:"article admin";i:111;}}'),
('site_created', 'i:1314077726;'),
('site_global', 'a:6:{s:4:"name";s:12:"网站名称";s:4:"mail";s:7:"a@a.com";s:9:"send_mail";s:7:"a@a.com";s:6:"slogan";s:12:"网站口号";s:11:"description";s:0:"";s:6:"footer";s:0:"";}'),
('site_mode', 's:1:"0";'),
('sql_info', 's:1:"0";'),
('status', 's:1:"1";'),
('themes', 'a:2:{s:3:"exo";a:8:{s:8:"filename";s:3:"exo";s:4:"path";s:16:"sites/themes/exo";s:6:"region";a:4:{s:4:"left";s:6:"左栏";s:5:"right";s:6:"右栏";s:6:"contop";s:12:"内容上部";s:6:"bottom";s:6:"底部";}s:6:"styles";N;s:7:"scripts";a:1:{i:0;s:5:"my.js";}s:4:"name";s:3:"exo";s:13:"styles_remove";a:0:{}s:8:"language";s:7:"zh-hans";}s:5:"admin";a:8:{s:8:"filename";s:5:"admin";s:4:"path";s:12:"themes/admin";s:6:"region";N;s:6:"styles";N;s:7:"scripts";N;s:4:"name";s:5:"admin";s:13:"styles_remove";a:0:{}s:8:"language";s:7:"zh-hans";}}'),
('theme_admin', 's:5:"admin";'),
('theme_admin_view', 'N;'),
('theme_cache', 'a:24:{s:5:"print";a:3:{s:3:"tpl";s:13:"print.tpl.php";s:4:"args";a:1:{i:0;s:7:"content";}s:6:"module";s:6:"system";}s:5:"error";a:3:{s:3:"tpl";s:13:"error.tpl.php";s:4:"args";a:2:{i:0;s:7:"content";i:1;s:4:"code";}s:6:"module";s:6:"system";}s:5:"front";a:3:{s:3:"tpl";s:13:"front.tpl.php";s:4:"args";a:1:{i:0;s:5:"front";}s:6:"module";s:6:"system";}s:4:"page";a:3:{s:3:"tpl";s:12:"page.tpl.php";s:4:"args";a:1:{i:0;s:7:"content";}s:6:"module";s:6:"system";}s:9:"item_list";a:3:{s:3:"fun";s:15:"theme_item_list";s:4:"args";a:4:{i:0;s:5:"items";i:1;s:5:"title";i:2;s:4:"type";i:3;s:10:"attributes";}s:6:"module";s:6:"system";}s:10:"breadcrumb";a:3:{s:3:"fun";s:16:"theme_breadcrumb";s:4:"args";a:1:{i:0;s:10:"breadcrumb";}s:6:"module";s:6:"system";}s:4:"help";a:3:{s:3:"fun";s:10:"theme_help";s:4:"args";a:1:{i:0;s:4:"help";}s:6:"module";s:6:"system";}s:5:"table";a:3:{s:3:"fun";s:11:"theme_table";s:4:"args";a:3:{i:0;s:6:"header";i:1;s:4:"rows";i:2;s:10:"attributes";}s:6:"module";s:6:"system";}s:8:"username";a:3:{s:3:"fun";s:14:"theme_username";s:4:"args";a:2:{i:0;s:7:"account";i:1;s:4:"link";}s:6:"module";s:4:"user";}s:4:"user";a:3:{s:3:"tpl";s:12:"user.tpl.php";s:4:"args";a:1:{i:0;s:7:"account";}s:6:"module";s:4:"user";}s:11:"user_center";a:3:{s:3:"tpl";s:19:"user_center.tpl.php";s:4:"args";a:1:{i:0;s:6:"center";}s:6:"module";s:4:"user";}s:13:"user_category";a:3:{s:3:"tpl";s:21:"user_category.tpl.php";s:4:"args";a:1:{i:0;s:4:"data";}s:6:"module";s:4:"user";}s:5:"block";a:3:{s:3:"tpl";s:13:"block.tpl.php";s:4:"args";a:1:{i:0;s:5:"block";}s:6:"module";s:5:"block";}s:9:"linkfront";a:2:{s:3:"tpl";s:13:"front.tpl.php";s:6:"module";s:4:"link";}s:15:"guestbook_front";a:3:{s:3:"tpl";s:13:"front.tpl.php";s:11:"description";s:12:"留言首页";s:6:"module";s:9:"guestbook";}s:6:"fields";a:4:{s:3:"tpl";s:14:"fields.tpl.php";s:11:"description";s:27:"节点字段组输出模板";s:4:"args";a:3:{i:0;s:6:"module";i:1;s:4:"node";i:2;s:4:"type";}s:6:"module";s:5:"field";}s:15:"field_node_list";a:4:{s:3:"tpl";s:23:"field_node_list.tpl.php";s:11:"description";s:48:"字段或类别所属节点列表浏览页模板";s:4:"args";a:3:{i:0;s:7:"content";i:1;s:4:"data";i:2;s:4:"type";}s:6:"module";s:5:"field";}s:7:"comment";a:4:{s:3:"tpl";s:15:"comment.tpl.php";s:5:"title";s:12:"评论模块";s:4:"args";a:1:{i:0;s:7:"comment";}s:6:"module";s:7:"comment";}s:3:"one";a:3:{s:3:"tpl";s:12:"node.tpl.php";s:4:"args";a:1:{i:0;s:3:"one";}s:6:"module";s:3:"one";}s:8:"onefront";a:3:{s:3:"tpl";s:16:"category.tpl.php";s:4:"args";a:1:{i:0;s:4:"data";}s:6:"module";s:3:"one";}s:7:"article";a:3:{s:3:"tpl";s:12:"node.tpl.php";s:4:"args";a:1:{i:0;s:7:"article";}s:6:"module";s:7:"article";}s:3:"tag";a:3:{s:3:"tpl";s:11:"tag.tpl.php";s:4:"args";a:1:{i:0;s:3:"tag";}s:6:"module";s:7:"article";}s:15:"articlecategory";a:3:{s:3:"tpl";s:16:"category.tpl.php";s:4:"args";a:1:{i:0;s:4:"data";}s:6:"module";s:7:"article";}s:6:"search";a:3:{s:3:"tpl";s:14:"search.tpl.php";s:4:"args";a:1:{i:0;s:4:"data";}s:6:"module";s:7:"article";}}'),
('theme_canting_view', 'a:1:{s:4:"left";a:2:{s:4:"user";a:1:{s:5:"login";O:8:"stdClass":10:{s:3:"bid";s:2:"16";s:6:"module";s:4:"user";s:5:"theme";s:7:"canting";s:6:"region";s:4:"left";s:5:"delta";s:5:"login";s:5:"title";s:12:"用户登录";s:6:"weight";s:3:"-30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}}s:6:"system";a:1:{s:9:"adminLink";O:8:"stdClass":10:{s:3:"bid";s:2:"15";s:6:"module";s:6:"system";s:5:"theme";s:7:"canting";s:6:"region";s:4:"left";s:5:"delta";s:9:"adminLink";s:5:"title";s:12:"网站管理";s:6:"weight";s:3:"-30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}}}}'),
('theme_che1_view', 'N;'),
('theme_chedui_view', 'a:1:{s:5:"right";a:1:{s:7:"article";a:6:{s:12:"tags_article";O:8:"stdClass":10:{s:3:"bid";s:2:"44";s:6:"module";s:7:"article";s:5:"theme";s:6:"chedui";s:6:"region";s:5:"right";s:5:"delta";s:12:"tags_article";s:5:"title";s:12:"文章标签";s:6:"weight";s:3:"-30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}s:15:"guidang_article";O:8:"stdClass":10:{s:3:"bid";s:2:"43";s:6:"module";s:7:"article";s:5:"theme";s:6:"chedui";s:6:"region";s:5:"right";s:5:"delta";s:15:"guidang_article";s:5:"title";s:12:"文章归档";s:6:"weight";s:3:"-30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}s:12:"rand_article";O:8:"stdClass":10:{s:3:"bid";s:2:"42";s:6:"module";s:7:"article";s:5:"theme";s:6:"chedui";s:6:"region";s:5:"right";s:5:"delta";s:12:"rand_article";s:5:"title";s:12:"随机文章";s:6:"weight";s:3:"-30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}s:11:"top_article";O:8:"stdClass":10:{s:3:"bid";s:2:"41";s:6:"module";s:7:"article";s:5:"theme";s:6:"chedui";s:6:"region";s:5:"right";s:5:"delta";s:11:"top_article";s:5:"title";s:12:"热点文章";s:6:"weight";s:3:"-30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}s:12:"theme_select";O:8:"stdClass":10:{s:3:"bid";s:2:"46";s:6:"module";s:7:"article";s:5:"theme";s:6:"chedui";s:6:"region";s:5:"right";s:5:"delta";s:12:"theme_select";s:5:"title";s:12:"主题选择";s:6:"weight";s:2:"30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}s:5:"links";O:8:"stdClass":10:{s:3:"bid";s:2:"45";s:6:"module";s:7:"article";s:5:"theme";s:6:"chedui";s:6:"region";s:5:"right";s:5:"delta";s:5:"links";s:5:"title";s:12:"友情链接";s:6:"weight";s:2:"30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}}}}'),
('theme_che_view', 'N;'),
('theme_default_view', 'a:2:{s:6:"bottom";a:1:{s:5:"block";a:1:{s:7:"boxes_3";O:8:"stdClass":10:{s:3:"bid";s:1:"5";s:6:"module";s:5:"block";s:5:"theme";s:7:"default";s:6:"region";s:6:"bottom";s:5:"delta";s:7:"boxes_3";s:5:"title";s:0:"";s:6:"weight";s:1:"0";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:2:{s:7:"display";a:1:{s:4:"body";s:0:"";}s:6:"custom";a:0:{}}}}}s:4:"left";a:1:{s:5:"block";a:1:{s:7:"boxes_2";O:8:"stdClass":10:{s:3:"bid";s:1:"4";s:6:"module";s:5:"block";s:5:"theme";s:7:"default";s:6:"region";s:4:"left";s:5:"delta";s:7:"boxes_2";s:5:"title";s:12:"联系我们";s:6:"weight";s:1:"0";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}}}}'),
('theme_exo_view', 'N;'),
('theme_jiaju_view', 'a:1:{s:4:"left";a:2:{s:4:"user";a:1:{s:5:"login";O:8:"stdClass":10:{s:3:"bid";s:2:"20";s:6:"module";s:4:"user";s:5:"theme";s:5:"jiaju";s:6:"region";s:4:"left";s:5:"delta";s:5:"login";s:5:"title";s:12:"用户登录";s:6:"weight";s:3:"-30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}}s:6:"system";a:1:{s:9:"adminLink";O:8:"stdClass":10:{s:3:"bid";s:2:"19";s:6:"module";s:6:"system";s:5:"theme";s:5:"jiaju";s:6:"region";s:4:"left";s:5:"delta";s:9:"adminLink";s:5:"title";s:12:"网站管理";s:6:"weight";s:3:"-30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}}}}'),
('theme_mansj_view', 'a:1:{s:4:"left";a:2:{s:4:"user";a:1:{s:5:"login";O:8:"stdClass":10:{s:3:"bid";s:2:"24";s:6:"module";s:4:"user";s:5:"theme";s:5:"mansj";s:6:"region";s:4:"left";s:5:"delta";s:5:"login";s:5:"title";s:12:"用户登录";s:6:"weight";s:3:"-30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}}s:6:"system";a:1:{s:9:"adminLink";O:8:"stdClass":10:{s:3:"bid";s:2:"23";s:6:"module";s:6:"system";s:5:"theme";s:5:"mansj";s:6:"region";s:4:"left";s:5:"delta";s:9:"adminLink";s:5:"title";s:12:"网站管理";s:6:"weight";s:3:"-30";s:10:"visibility";s:1:"1";s:5:"cache";s:1:"1";s:8:"settings";a:1:{s:6:"custom";a:0:{}}}}}}'),
('theme_phone1_view', 'N;'),
('theme_real_view', 'N;'),
('user', 'a:11:{s:8:"register";s:1:"1";s:6:"status";s:1:"1";s:9:"anonymous";s:6:"游客";s:12:"select_theme";s:1:"0";s:11:"select_lang";s:1:"0";s:8:"redirect";s:10:"user/[uid]";s:14:"default_avatar";s:22:"misc/images/avatar.gif";s:12:"default_role";s:1:"2";s:14:"anonymous_role";s:1:"1";s:11:"custom_view";s:1:"0";s:18:"custom_view_module";s:1:"0";}'),
('user_file_size', 's:3:"300";'),
('user_file_size_role_2', 's:1:"0";'),
('user_file_size_role_3', 's:1:"0";'),
('user_file_size_role_4', 's:1:"0";'),
('user_file_size_role_5', 's:1:"0";'),
('user_roles', 'a:6:{i:1;O:8:"stdClass":4:{s:3:"rid";s:1:"1";s:4:"name";s:6:"游客";s:4:"perm";s:464:"a:3:{s:4:"user";a:1:{s:19:"user view user info";i:26;}s:9:"guestbook";a:1:{s:13:"guestbook add";i:55;}s:7:"content";a:10:{s:17:"content news view";i:66;s:25:"content news comment view";i:84;s:27:"content news comment create";i:89;s:16:"content wxx view";i:108;s:17:"content dutu view";i:123;s:17:"content csdt view";i:140;s:25:"content csdt comment view";i:155;s:27:"content csdt comment create";i:160;s:15:"content zt view";i:176;s:17:"content plan view";i:203;}}";s:5:"count";s:1:"0";}i:2;O:8:"stdClass":4:{s:3:"rid";s:1:"2";s:4:"name";s:12:"登录用户";s:4:"perm";s:796:"a:4:{s:6:"system";a:4:{s:11:"file upload";i:6;s:13:"file one view";i:11;s:15:"file one delete";i:16;s:15:"file one update";i:21;}s:4:"user";a:2:{s:19:"user view user info";i:25;s:16:"user change name";i:44;}s:9:"guestbook";a:1:{s:13:"guestbook add";i:54;}s:7:"content";a:14:{s:17:"content news view";i:65;s:25:"content news comment view";i:83;s:27:"content news comment create";i:88;s:31:"content news comment update own";i:96;s:31:"content news comment delete own";i:103;s:16:"content wxx view";i:107;s:17:"content dutu view";i:122;s:17:"content csdt view";i:139;s:25:"content csdt comment view";i:154;s:27:"content csdt comment create";i:159;s:31:"content csdt comment update own";i:166;s:31:"content csdt comment delete own";i:172;s:15:"content zt view";i:175;s:17:"content plan view";i:202;}}";s:5:"count";s:2:"40";}i:3;O:8:"stdClass":4:{s:3:"rid";s:1:"3";s:4:"name";s:12:"网站编辑";s:4:"perm";s:2733:"a:10:{s:6:"system";a:5:{s:17:"system view admin";i:2;s:11:"file upload";i:5;s:13:"file one view";i:10;s:15:"file one delete";i:15;s:15:"file one update";i:20;}s:4:"user";a:8:{s:19:"user view user info";i:24;s:20:"user use search user";i:28;s:15:"admin user view";i:30;s:14:"admin user add";i:32;s:22:"admin user change name";i:36;s:15:"user change own";i:38;s:16:"user change mail";i:40;s:16:"user change name";i:43;}s:5:"block";a:1:{s:11:"admin block";i:46;}s:4:"link";a:2:{s:8:"link add";i:48;s:15:"admin link list";i:50;}s:9:"guestbook";a:2:{s:13:"guestbook add";i:53;s:20:"admin guestbook list";i:57;}s:7:"content";a:53:{s:18:"admin content view";i:60;s:17:"content news view";i:64;s:19:"content news create";i:69;s:23:"content news update own";i:72;s:19:"content news update";i:74;s:23:"content news delete own";i:77;s:19:"content news delete";i:79;s:25:"content news comment view";i:82;s:27:"content news comment create";i:87;s:27:"content news comment update";i:92;s:31:"content news comment update own";i:95;s:27:"content news comment delete";i:99;s:31:"content news comment delete own";i:102;s:16:"content wxx view";i:106;s:18:"content wxx create";i:110;s:22:"content wxx update own";i:112;s:18:"content wxx update";i:114;s:22:"content wxx delete own";i:116;s:18:"content wxx delete";i:118;s:17:"content dutu view";i:121;s:19:"content dutu create";i:126;s:23:"content dutu update own";i:129;s:19:"content dutu update";i:131;s:23:"content dutu delete own";i:134;s:19:"content dutu delete";i:136;s:17:"content csdt view";i:138;s:19:"content csdt create";i:142;s:23:"content csdt update own";i:144;s:19:"content csdt update";i:146;s:23:"content csdt delete own";i:148;s:19:"content csdt delete";i:150;s:25:"content csdt comment view";i:153;s:27:"content csdt comment create";i:158;s:27:"content csdt comment update";i:162;s:31:"content csdt comment update own";i:165;s:27:"content csdt comment delete";i:168;s:31:"content csdt comment delete own";i:171;s:15:"content zt view";i:174;s:17:"content zt create";i:178;s:21:"content zt update own";i:180;s:17:"content zt update";i:182;s:21:"content zt delete own";i:184;s:17:"content zt delete";i:186;s:17:"content wxdt view";i:188;s:19:"content wxdt create";i:190;s:23:"content wxdt update own";i:192;s:19:"content wxdt update";i:194;s:23:"content wxdt delete own";i:196;s:19:"content wxdt delete";i:198;s:17:"content plan view";i:201;s:19:"content plan create";i:205;s:23:"content plan update own";i:207;s:19:"content plan update";i:209;}s:7:"comment";a:1:{s:18:"comment admin view";i:213;}s:9:"cheyunhui";a:1:{s:20:"admin cheyunhui list";i:215;}s:5:"ttags";a:2:{s:9:"ttags add";i:219;s:16:"admin ttags list";i:221;}s:3:"one";a:2:{s:7:"one add";i:223;s:14:"admin one list";i:225;}}";s:5:"count";s:2:"10";}i:4;O:8:"stdClass":4:{s:3:"rid";s:1:"4";s:4:"name";s:12:"专栏作者";s:4:"perm";s:1109:"a:5:{s:6:"system";a:4:{s:11:"file upload";i:4;s:13:"file one view";i:9;s:15:"file one delete";i:14;s:15:"file one update";i:19;}s:4:"user";a:2:{s:19:"user view user info";i:23;s:16:"user change name";i:42;}s:9:"guestbook";a:1:{s:13:"guestbook add";i:52;}s:7:"content";a:21:{s:18:"admin content view";i:59;s:17:"content news view";i:63;s:19:"content news create";i:68;s:23:"content news update own";i:71;s:23:"content news delete own";i:76;s:25:"content news comment view";i:81;s:27:"content news comment create";i:86;s:27:"content news comment update";i:91;s:31:"content news comment update own";i:94;s:27:"content news comment delete";i:98;s:31:"content news comment delete own";i:101;s:16:"content wxx view";i:105;s:17:"content dutu view";i:120;s:19:"content dutu create";i:125;s:23:"content dutu update own";i:128;s:23:"content dutu delete own";i:133;s:25:"content csdt comment view";i:152;s:27:"content csdt comment create";i:157;s:31:"content csdt comment update own";i:164;s:31:"content csdt comment delete own";i:170;s:17:"content plan view";i:200;}s:7:"comment";a:1:{s:18:"comment admin view";i:212;}}";s:5:"count";s:2:"34";}i:5;O:8:"stdClass":4:{s:3:"rid";s:1:"5";s:4:"name";s:12:"审核编辑";s:4:"perm";s:3053:"a:12:{s:6:"system";a:8:{s:17:"system view admin";i:1;s:11:"file upload";i:3;s:13:"file all view";i:7;s:13:"file one view";i:8;s:15:"file all delete";i:12;s:15:"file one delete";i:13;s:15:"file all update";i:17;s:15:"file one update";i:18;}s:4:"user";a:10:{s:19:"user view user info";i:22;s:20:"user use search user";i:27;s:15:"admin user view";i:29;s:14:"admin user add";i:31;s:19:"admin user edit all";i:33;s:22:"admin user change mail";i:34;s:22:"admin user change name";i:35;s:15:"user change own";i:37;s:16:"user change mail";i:39;s:16:"user change name";i:41;}s:5:"block";a:1:{s:11:"admin block";i:45;}s:4:"link";a:2:{s:8:"link add";i:47;s:15:"admin link list";i:49;}s:9:"guestbook";a:2:{s:13:"guestbook add";i:51;s:20:"admin guestbook list";i:56;}s:7:"content";a:55:{s:18:"admin content view";i:58;s:18:"admin content type";i:61;s:17:"content news view";i:62;s:19:"content news create";i:67;s:23:"content news update own";i:70;s:19:"content news update";i:73;s:23:"content news delete own";i:75;s:19:"content news delete";i:78;s:25:"content news comment view";i:80;s:27:"content news comment create";i:85;s:27:"content news comment update";i:90;s:31:"content news comment update own";i:93;s:27:"content news comment delete";i:97;s:31:"content news comment delete own";i:100;s:16:"content wxx view";i:104;s:18:"content wxx create";i:109;s:22:"content wxx update own";i:111;s:18:"content wxx update";i:113;s:22:"content wxx delete own";i:115;s:18:"content wxx delete";i:117;s:17:"content dutu view";i:119;s:19:"content dutu create";i:124;s:23:"content dutu update own";i:127;s:19:"content dutu update";i:130;s:23:"content dutu delete own";i:132;s:19:"content dutu delete";i:135;s:17:"content csdt view";i:137;s:19:"content csdt create";i:141;s:23:"content csdt update own";i:143;s:19:"content csdt update";i:145;s:23:"content csdt delete own";i:147;s:19:"content csdt delete";i:149;s:25:"content csdt comment view";i:151;s:27:"content csdt comment create";i:156;s:27:"content csdt comment update";i:161;s:31:"content csdt comment update own";i:163;s:27:"content csdt comment delete";i:167;s:31:"content csdt comment delete own";i:169;s:15:"content zt view";i:173;s:17:"content zt create";i:177;s:21:"content zt update own";i:179;s:17:"content zt update";i:181;s:21:"content zt delete own";i:183;s:17:"content zt delete";i:185;s:17:"content wxdt view";i:187;s:19:"content wxdt create";i:189;s:23:"content wxdt update own";i:191;s:19:"content wxdt update";i:193;s:23:"content wxdt delete own";i:195;s:19:"content wxdt delete";i:197;s:17:"content plan view";i:199;s:19:"content plan create";i:204;s:23:"content plan update own";i:206;s:19:"content plan update";i:208;s:19:"content plan delete";i:210;}s:7:"comment";a:1:{s:18:"comment admin view";i:211;}s:9:"cheyunhui";a:1:{s:20:"admin cheyunhui list";i:214;}s:2:"ad";a:2:{s:6:"ad add";i:216;s:13:"admin ad list";i:217;}s:5:"ttags";a:2:{s:9:"ttags add";i:218;s:16:"admin ttags list";i:220;}s:3:"one";a:2:{s:7:"one add";i:222;s:14:"admin one list";i:224;}s:7:"article";a:1:{s:13:"article admin";i:226;}}";s:5:"count";s:1:"7";}i:6;O:8:"stdClass":4:{s:3:"rid";s:1:"6";s:4:"name";s:9:"管理员";s:4:"perm";N;s:5:"count";s:1:"0";}}'),
('_dida_values', 'O:8:"stdClass":7:{s:13:"dd_cache_file";s:19:"/includes/cache.inc";s:19:"cache_memcache_host";s:9:"localhost";s:19:"cache_memcache_port";s:5:"11211";s:21:"cache_memcache_prefix";s:13:"wwwxingzuocom";s:6:"submit";s:12:"确认提交";s:7:"form_id";s:21:"system_cache_settings";s:10:"form_token";s:32:"e05c043ecb9e6a9283ce125365e60899";}');

-- --------------------------------------------------------

--
-- 表的结构 `voteapi`
--

CREATE TABLE IF NOT EXISTS `voteapi` (
  `vid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '节点 id',
  `type` varchar(32) NOT NULL DEFAULT '' COMMENT '自定义类型',
  `tags` varchar(8) NOT NULL DEFAULT '' COMMENT '统计类型，基本类型：sum： average：count',
  `value` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '值',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投票时间',
  PRIMARY KEY (`vid`),
  UNIQUE KEY `ntv` (`nid`,`type`,`tags`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='记录节点总票数' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `voteapi`
--


-- --------------------------------------------------------

--
-- 表的结构 `voteapi_info`
--

CREATE TABLE IF NOT EXISTS `voteapi_info` (
  `iid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '节点 id',
  `type` varchar(32) NOT NULL DEFAULT '' COMMENT '自定义类型',
  `ext_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展 id',
  `value` int(11) NOT NULL DEFAULT '0' COMMENT '值，只允许整型',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户 id',
  `host` varchar(128) NOT NULL DEFAULT '' COMMENT '用户主机',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投票时间',
  PRIMARY KEY (`iid`),
  KEY `te` (`type`,`ext_id`),
  KEY `type` (`type`),
  KEY `nt` (`nid`,`type`),
  KEY `value` (`value`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='投票明细' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `voteapi_info`
--


-- --------------------------------------------------------

--
-- 表的结构 `weixinmsg`
--

CREATE TABLE IF NOT EXISTS `weixinmsg` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `fake_id` int(11) NOT NULL COMMENT '微信粉丝id',
  `nick_name` varchar(255) NOT NULL COMMENT '粉丝昵称',
  `content` text NOT NULL COMMENT '信息内容',
  `date_time` int(11) NOT NULL COMMENT '信息发布时间',
  `litpic` varchar(255) NOT NULL COMMENT '粉丝头像',
  `msgid` int(11) NOT NULL COMMENT '信息id',
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT '上墙状态',
  `uid` int(11) NOT NULL COMMENT '更新人',
  `zhong` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否中奖',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 导出表中的数据 `weixinmsg`
--

INSERT INTO `weixinmsg` (`id`, `fake_id`, `nick_name`, `content`, `date_time`, `litpic`, `msgid`, `status`, `uid`, `zhong`) VALUES
(1, 345, 'sdfsf', 'sdfdsf', 123213, 'sfdsf', 234234, 0, 0, 0),
(2, 1947926122, '李俊毅', '李俊毅', 1386216069, 'weixin/litpic/1947926122.jpg', 10017105, 1, 0, 1),
(3, 2116863560, '兔八哥', '测试微信上墙', 1386233711, 'weixin/litpic/2116863560.jpg', 10017149, 1, 1, 1),
(4, 2116863560, '兔八哥', '哈哈哈啊哈哈啊里', 1386313438, 'weixin/litpic/2116863560.jpg', 10017273, 1, 1, 1),
(5, 398080315, '天马-小平', '想认识你', 1386293468, 'weixin/litpic/398080315.jpg', 10017241, 1, 1, 1),
(6, 108573615, '周刚', '汽车结构', 1386377709, 'weixin/litpic/108573615.jpg', 10017326, 1, 1, 1),
(7, 108573615, '周刚', '电喷', 1386377694, 'weixin/litpic/108573615.jpg', 10017324, 1, 1, 1),
(8, 1285266281, 'Green_199', '汽车分类', 1386329346, 'weixin/litpic/1285266281.jpg', 10017294, 1, 1, 1),
(9, 40356585, 'Winson ', '车云会', 1386389737, 'weixin/litpic/40356585.jpg', 10017363, 1, 1, 1),
(10, 2896145, '小范_同学', '话题', 1393550249, 'weixin/litpic/2896145.jpg', 200106847, 0, 1, 0),
(11, 1026718620, '赵晶', '自主品牌', 1394691735, 'weixin/litpic/1026718620.jpg', 200158241, 0, 1, 0),
(12, 6212245, '默默', '致危机中变革的自主品牌', 1394683917, 'weixin/litpic/6212245.jpg', 200157819, 0, 1, 0),
(13, 6212245, '默默', '自主品牌', 1394683647, 'weixin/litpic/6212245.jpg', 200157802, 0, 1, 0),
(14, 2116863560, '兔八哥', '许丽丽姐', 1394682650, 'weixin/litpic/2116863560.jpg', 200157734, 1, 1, 1);

--
-- 限制导出的表
--

--
-- 限制表 `fields_long`
--
ALTER TABLE `fields_long`
  ADD CONSTRAINT `f_fields_long_fields_field_id_field_id` FOREIGN KEY (`field_id`) REFERENCES `fields` (`field_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `fields_small`
--
ALTER TABLE `fields_small`
  ADD CONSTRAINT `f_fields_small_fields_field_id_field_id` FOREIGN KEY (`field_id`) REFERENCES `fields` (`field_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `fields_term`
--
ALTER TABLE `fields_term`
  ADD CONSTRAINT `f_fields_term_fields_field_id_field_id` FOREIGN KEY (`field_id`) REFERENCES `fields` (`field_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `fields_term_node`
--
ALTER TABLE `fields_term_node`
  ADD CONSTRAINT `f_fields_term_node_fields_term_tid_tid` FOREIGN KEY (`tid`) REFERENCES `fields_term` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `filters`
--
ALTER TABLE `filters`
  ADD CONSTRAINT `f_filters_filter_format_format_format` FOREIGN KEY (`format`) REFERENCES `filter_format` (`format`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `user_ext`
--
ALTER TABLE `user_ext`
  ADD CONSTRAINT `f_user_ext_users_uid_uid` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
