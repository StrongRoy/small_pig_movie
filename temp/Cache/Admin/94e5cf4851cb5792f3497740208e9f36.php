<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>网站地图-<?php echo C("web_name");?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' type='text/css' href='./views/css/admin_index.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/dialog.js"></script>
<script type="text/javascript">
<!--
function goto(url){
	 window.top.document.getElementById('main').src=url;
	 window.top.art.dialog({id:'map'}).close();
	}
-->
</script>
</head>
<body>
<div id="menuMap">

  <dl>
    <dt>系统管理</dt>
    <dd>
      <ul id="items">
        <li><a href="javascript:goto('?s=Admin/Config/Conf/id/web');" >网站信息设置</a></li>
        <li><a href="javascript:goto('?s=Admin/Config/Conf/id/upload');" >附件参数设置</a></li>
        <li><a href="javascript:goto('?s=Admin/Config/Conf/id/cache');">网站缓存设置</a></li>
        <li><a href="javascript:goto('?s=Admin/Config/Conf/id/url');">访问路径设置</a></li>
        <li><a href="javascript:goto('?s=Admin/Config/Conf/id/user');" >用户中心设置</a></li>
        <li><a href="javascript:goto('?s=Admin/Config/Conf/id/nav');" >快捷菜单设置</a></li>
        <li><a href="javascript:goto('?s=Admin/Config/Conf/id/player');" >播放器设置</a></li>
        <li><a href="javascript:goto('?s=Admin/Config/Conf/id/db');" >数据库设置</a></li>
      </ul>
    </dd>
  </dl>

  <dl>
    <dt>内容管理</dt>
    <dd>
      <ul id="items">
        <li><a href="javascript:goto('?s=Admin/Channel/Show');" >网站栏目管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Channel/Add');">添加网站栏目</a></li>
        <li><a href="javascript:goto('?s=Admin/Video/Show');"><font color="#FF0000">视频数据管理</font></a></li>
        <li><a href="javascript:goto('?s=Admin/Video/Add');">添加视频数据</a></li>
        <li><a href="javascript:goto('?s=Admin/Info/Show');">文章资讯管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Info/Add');">添加文章资讯</a></li>
        <li><a href="javascript:goto('?s=Admin/Special/Show');" >网站专题管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Special/Add');" >添加网站专题</a></li>
        <li><a href="javascript:goto('?s=Admin/Video/Show/serial/1');" >连载中的影片</a></li>
        <li><a href="javascript:goto('?s=Admin/Video/Show/status/0');" >待审核的影片</a></li>
        <li><a href="javascript:goto('?s=Admin/Video/Show/status/-1');" >相似未审核的影片</a></li>
        <li><a href="javascript:goto('?s=Admin/Video/Show/picurl/fail');" >图片下载失败影片</a></li>
      </ul>
    </dd>
  </dl>

   <dl >
    <dt>扩展工具</dt>
    <dd>
      <ul id="items">
      	<li><a href="javascript:goto('?s=Admin/Cache/Show');" >静态缓存管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Slide/Show');" >首页幻灯管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Slide/Add');" >添加首页幻灯</a></li>
        <li><a href="javascript:goto('?s=Admin/Adsense/Show');" >网站广告管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Link/Show');" >友情链接管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Upload/Fileshow');" >上传附件管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Video/Downimg');"  onClick="return confirm('消耗资源较多，请勿在高峰期执行该操作!')">下载影视图片</a></li>
        <li><a href="javascript:goto('?s=Admin/Info/Downimg');"  onClick="return confirm('消耗资源较多，请勿在高峰期执行该操作!')">下载文章图片</a></li>
        <li><a href="javascript:goto('?s=Admin/Video/Downimg/picurl/fail');"  onClick="return confirm('消耗资源较多，请勿在高峰期执行该操作!')" title="重新尝试下载">检测影片失败图片</a></li>
        <li><a href="javascript:goto('?s=Admin/Info/Downimg/picurl/fail');"  onClick="return confirm('消耗资源较多，请勿在高峰期执行该操作!')" title="重新尝试下载">检测文章失败图片</a></li>    
        <li><a href="javascript:goto('?s=Admin/Datacheck/VideoCheck/');" >影片重名检测</a></li> 
        <li><a href="javascript:goto('?s=Admin/Datacheck/ImgClear/');" >无效图片清除</a></li>    
      </ul>
    </dd>
  </dl>

 <dl>
    <dt>用户信息管理</dt>
    <dd>
      <ul id="items">
        <li><a href="javascript:goto('?s=Admin/Master/Show');" >后台用户管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Master/Add');" >添加后台用户</a></li>      
        <li><a href="javascript:goto('?s=Admin/User/Show');" >用户管理中心</a></li>
        <li><a href="javascript:goto('?s=Admin/User/Add');" >添加新用户</a></li>
        <li><a href="javascript:goto('?s=Admin/Comment/Show');">评论管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Comment/Show/status/1');" >未审核评论</a></li>
        <li><a href="javascript:goto('?s=Admin/Guestbook/Show');" >留言管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Guestbook/Show/status/1');" >未审核留言</a></li>
        <li><a href="javascript:goto('?s=Admin/Guestbook/Show/eid/1');" >视频报错管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Userview/Show');" >收费点播记录</a></li>
      </ul>
    </dd>
  </dl> 

  <div  class="clear"></div>
  
   <dl>
    <dt>数据采集管理</dt>
    <dd>
      <ul id="items">
        <li><a href="javascript:goto('?s=Admin/Collect/Show');" >一键采集影片</a></li>
        <li style="background:#e8f3fd;font-weight:600;"><a  href="javascript:goto('?s=Admin/CustomCollect/ListShow');"  style="background:none;">自定义采集</a></li>
        <li><a href="javascript:goto('?s=Admin/CustomCollect/ListShow');" >采集节点管理</a></li>
        <li><a href="javascript:goto('?s=Admin/CustomCollect/Add');" >添加采集节点</a></li>
        <li><a href="javascript:goto('?s=Admin/CustomCollect/ColVideo');" >采集影片入库</a></li>
        <li><a href="javascript:goto('?s=Admin/CustomCollect/AutoChannel');" >自定义转换</a></li>
      </ul>
    </dd>
  </dl>
  <dl>
    <dt>模板管理</dt>
    <dd>
      <ul id="items">
        <li><a href="javascript:goto('?s=Admin/Tpl/Show');" >网站模板管理</a></li>
        <li><a href="javascript:goto('?s=Admin/Tpl/Show/id/.*template*<?php echo C("default_theme");?>*Home/mytpl/1');" >自定义模板</a></li>
      </ul>
    </dd>
  </dl>

  <dl>
    <dt>静态网页生成</dt>
    <dd>
      <ul id="items">
        <li><a href="javascript:goto('?s=Admin/Html/Show');">静态网页选项</a></li>
        <li><a href="javascript:goto('?s=Admin/Html/Videoday/mday/1');">生成当天影视</a></li>
        <li><a href="javascript:goto('?s=Admin/Html/Infoday/aday/1');" >生成当天新闻</a></li>
        <li><a href="javascript:goto('?s=Admin/Html/Maps');" >生成地图索引</a></li>
      </ul>
    </dd>
  </dl> 

  <dl>
    <dt>数据库操作</dt>
    <dd>
      <ul id="items">
        <li><a href="javascript:goto('?s=Admin/Data/Showtable');" >数据库备份</a></li>
        <li><a href="javascript:goto('?s=Admin/Data/Showback');" >数据库还原</a></li>
        <li><a href="javascript:goto('?s=Admin/Data/Showsql');" >高级SQL语句</a></li>
        <li><a href="javascript:goto('?s=Admin/Data/Showtable/id/field');" >数据批量替换</a></li>       
      </ul>
    </dd>
  </dl>            
</div>

</body>
</html>