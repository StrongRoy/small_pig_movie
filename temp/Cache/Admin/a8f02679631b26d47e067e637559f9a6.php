<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>附件设置</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
</head>
<body>
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">
<form action="?s=Admin/Config/Updateup" method="post" id="gxform">       
<tr class="table_title">
  <td colspan="3">本地附件设置</td>
</tr>
 <tr class="ji">
  <td class="left">本地附件文件夹</td>
  <td colspan="2"><input type="text" name="con[upload_path]" size="35" maxlength="50" value="<?php echo ($upload_path); ?>"> *定期修改此选项防止盗链,相对于程序安装目录,不要加 '/'</td>
</tr>
<tr class="tr">
  <td class="left">附件路径保存风格</td>
  <td colspan="2"><input type="text" name="con[upload_style]" size="35" maxlength="50" value="<?php echo ($upload_style); ?>"> *标记：Y年,M月,D日.相对于附件文件夹,不要加 '/'</td>
</tr> 
 <tr class="ji">
  <td class="left">是否自动保存远程图片</td>
  <td colspan="2"><select name="con[upload_http]"><option value="1">是</option><option value=0 <?php if(($upload_http)  ==  "0"): ?>selected<?php endif; ?>>否</option></select> 选择"是"则在手动添加数据时候自动保存网络上的图片</td>
</tr>            
<tr class="tr">
  <td class="left">是否开启缩略图功能</td>
  <td colspan="2"><select name="con[upload_thumb]"><option value="1">是</option><option value=0 <?php if(($upload_thumb)  ==  "0"): ?>selected<?php endif; ?>>否</option></select> 选择"是"则上传或远程图片保存时自动为其增加小图片</td>
</tr> 
<tr class="ji"> 
<td class="left">是否开启水印功能</td>
<td colspan="2"><select name="con[upload_water]"><option value="1">是</option><option value=0 <?php if(($upload_water)  ==  "0"): ?>selected<?php endif; ?>>否</option></select> 是否需要在保存图片附件时加上水印</td>
</tr>       
<tr class="tr">
  <td class="left">缩略图大小(宽度/高度)</td>
  <td style="padding:0"><table border="0" cellpadding="0" cellspacing="0">
  <tr><td><input type="text" name="con[upload_thumb_w]" size="5" maxlength="4" value="<?php echo ($upload_thumb_w); ?>" class="ct"> X</td><td><input type="text" name="con[upload_thumb_h]" size="5" maxlength="4" value="<?php echo ($upload_thumb_h); ?>" class="ct"> 按原图比率缩小(小于该指定大小的图片将不生成缩略图)</td>
</tr></table></td>
</tr> 
<tr class="ji"> 
<td class="left">水印图片</td>
<td colspan="2"><input type="text" name="con[upload_water_img]" size="22" maxlength="30" value="<?php echo ($upload_water_img); ?>"> 相对于安装目录的水印图片路径</td>
</tr>
<tr class="tr"> 
<td class="left">水印透明度</td>
<td colspan="2"><input type="text" name="con[upload_water_pct]" size="5" maxlength="3" value="<?php echo ($upload_water_pct); ?>"> 1-100, 一般设为80即可, 不要加 '%'</td>
</tr>
<tr class="ji"> 
<td class="left">水印位置</td>
<td colspan="2"><input type="text" name="con[upload_water_pos]" size="5" maxlength="1" value="<?php echo ($upload_water_pos); ?>" > 0=随机,从左&gt;右,上&gt;下,可以设置1-9,9个位置</td>
</tr>
<tr class="tr"> 
<td class="left">批量保存数量</td>
<td colspan="2"><input type="text" name="con[upload_http_down]" size="5" maxlength="2" value="<?php echo ($upload_http_down); ?>" > 一次性批量保存多少张远程图片,不超过99张</td>
</tr>
<tr class="table_title"><td colspan="3">远程附件设置</td></tr>
<tr class="ji"> 
<td class="left">是否开启FTP远程附件</td>
<td colspan="2"><select name="con[upload_ftp]"><option value=0>否</option><option value=1 <?php if(($upload_ftp)  ==  "1"): ?>selected<?php endif; ?>>是</option></select> 开启将影响上传速度,但是可以将附件转移到FTP服务器(上传图片或采集时自动保存到远程服务器)</td>
</tr>
<tr class="tr"> 
<td class="left">FTP 服务器</td>
<td colspan="2"><input type="text" name="con[upload_ftp_host]" size="35" maxlength="50" value="<?php echo ($upload_ftp_host); ?>" > 服务器地址,不需要加"http://",一般为IP</td>
</tr>
<tr class="ji"> 
<td class="left">FTP 用户名</td>
<td colspan="2"><input type="text" name="con[upload_ftp_user]" size="35" maxlength="50" value="<?php echo ($upload_ftp_user); ?>" > FTP服务器登录用的用户名</td>
</tr>
<tr class="tr"> 
<td class="left">FTP 密码</td>
<td colspan="2"><input type="text" name="con[upload_ftp_pass]" size="35" maxlength="50" value="<?php echo ($upload_ftp_pass); ?>" > FTP服务器登录用的密码</td>
</tr>
<tr class="ji"> 
<td class="left">FTP 端口</td>
<td colspan="2"><input type="text" name="con[upload_ftp_port]" size="35" maxlength="50" value="<?php echo ($upload_ftp_port); ?>" > 服务器端口, 一般为 21</td>
</tr>
<tr class="tr"> 
<td class="left">远程附件保存文件夹</td>
<td colspan="2"><input type="text" name="con[upload_ftp_dir]" size="35" maxlength="50" value="<?php echo ($upload_ftp_dir); ?>" > 请确保已经建立,相对于FTP服务器根目录, 如/wwwroot/upload/</td>
</tr>                              
<tr class="ji"> 
<td class="left">远程附件访问地址</td>
<td colspan="2"><input type="text" name="con[upload_ftp_url]" size="35" maxlength="50" value="<?php echo ($upload_ftp_url); ?>" > 必须/结尾(如 http://img.baidu.com/upload/),留空则不使用该功能</td>
</tr>                    
<tr class="tr"><td colspan="3"><input type="hidden" name="setting_sub" value="true"> <input class="bginput" type="submit" name="submit" value="提交"> <input class="bginput" type="reset" name="Input" value="重置" > 可上传附件类型有(<?php echo C("cms_exts");?>)</td></tr>
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