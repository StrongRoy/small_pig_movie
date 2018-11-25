<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>缓存设置</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
</head>
<body>
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">
<form action="?s=Admin/Config/Updatecache"  method="post" id="gxform">
<tr class="table_title">
  <td colspan="2">静态缓存设置</td>
</tr>
<tr class="ji">
  <td class="left">模板缓存功能</td>
  <td class="ji"><select name="con[tmpl_cache_on]"><option value=1>开启</option><option value=0 <?php if(($tmpl_cache_on)  ==  "0"): ?>selected<?php endif; ?>>关闭</option></select> 建议动态模式开启</td>
</tr>        
<tr class="tr">
  <td class="left">静态网页文件缓存</td>
  <td><select name="con[html_cache_on]"><option value=1>开启</option><option value=0 <?php if(($html_cache_on)  ==  "0"): ?>selected<?php endif; ?>>关闭</option></select> 建议动态模式开启,开启此功能以下设置才有效(最大缓存时间99)</td>
</tr>      
<tr class="ji">
  <td class="left">首页缓存时间(小时)</td>
  <td><input type="text" name="con[html_cache_index]" size="5" maxlength="2" value="<?php echo ($html_cache_index); ?>" class="ct">
  </td>
</tr>
<tr class="tr">
  <td class="left">栏目页缓存时间(小时)</td>
  <td><input type="text" name="con[html_cache_list]" size="5" maxlength="2" value="<?php echo ($html_cache_list); ?>" class="ct">
  </td>
</tr>
<tr class="ji">
  <td class="left">内容页缓存时间(小时)</td>
  <td><input type="text" name="con[html_cache_content]" size="5" maxlength="2" value="<?php echo ($html_cache_content); ?>" class="ct">
  </td>
</tr>
<tr class="tr">
  <td class="left">播放页缓存时间(小时)</td>
  <td><input type="text" name="con[html_cache_play]" size="5" maxlength="2" value="<?php echo ($html_cache_play); ?>" class="ct">
  </td>
</tr> 
<tr class="tr">
  <td class="left">自定义模板缓存时间(小时)</td>
  <td><input type="text" name="con[html_cache_mytpl]" size="5" maxlength="2" value="<?php echo ($html_cache_mytpl); ?>" class="ct">
  </td>
</tr>               
<tr class="tr">
  <td colspan="2"><input type="hidden" name="setting_sub" value="true">
    <input class="bginput" type="submit" name="submit" value=" 提交 ">
    <input class="bginput" type="reset" name="Input" value="重置"> 注: 设为0时则不启用缓存. 启用缓存可以减少数据库压力,但会占用更多的空间以及导致更新信息延后,请合理设置。
  </td>
</tr>
</form>
</table>
<style>
#footer, #footer a:link, #footer a:visited {
	clear:both;
	color:#0072e3;
	font:12px/1.5 Arial;
	margin-top:10px;
	text-align:center;
	white-space:nowrap;
}
</style>
<div id="footer">程序版本：<?php echo C("cms_var");?>&nbsp;&nbsp;&nbsp;&nbsp;Copyright © 2010-2011 All rights reserved</div>
<div style="display:none"><a href="http://www.youmtv.com" target="_blank">优美电影网</a>商业模板认证</div>
</body>
</html>