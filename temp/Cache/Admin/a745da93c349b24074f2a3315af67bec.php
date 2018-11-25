<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>影片采集管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<link rel='stylesheet' type='text/css' href='./views/css/collect.css'>
<style type="text/css">
<!--
.node{ width:90%;margin:auto;}

.info{width:100%; text-align:left;margin-top:20px;}
.info ul li{float:left;width:150px;}
.list{margin-top:20px;}
.list li{margin-top:4px;padding-left:6px;}
.list li td{color:#333;font-size:12px;text-align:left;padding-top:0px;}
.list li a{color:#333;}
.url td{border:none;}
.main{padding-bottom:20px;}
.msg span{margin:0px 6px;}
.msg strong{color:#f30;}
-->
</style>
</head>
<body>
<div class="main">
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="table">
<tr>
  <td colspan="6" class="table_title">
  <ul>
  <li><a  href="?s=Admin/CustomCollect/ListShow">采集节点管理</a> </li>
  <li><a href="?s=Admin/CustomCollect/Add">添加采集节点</a></li>
  <li><a href="?s=Admin/CustomCollect/Manage/action/import">导入采集规则</a></li>
  </ul>
  </td>
</tr>
</table>
<div class="node">
<div class="info">
<dt><strong>影片来源地址：</strong><?php echo ($video["url"]); ?></dt>
<dd>
<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center" class="url">
  <tr>
    <td width="20%">待采集影片：<?php echo ($video["already"]); ?>/<?php echo ($video["total"]); ?>部</td>
    <td><div style='width:200px;height:15px;border:1px solid #2e4e7e;text-align:left'><div style='width:<?php echo ($video["percent"]); ?>px;height:15px;background-color:#4c8dae'></div></div></td>
  </tr>
</table>
</dd>
</div>
<div class="clear"></div>
<div class="list">
<ul>
<?php if(!empty($video["msg"])): ?><li  class="msg"><?php echo ($video["msg"]); ?></li><?php endif; ?>
<?php if(is_array($video["con"]["base"])): $k = 0; $__LIST__ = $video["con"]["base"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): ++$k;$mod = ($k % 2 )?><li>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="10%"><?php echo ($key); ?>：</td>
    <td width="800px" ><div style="width:800px;" class="break"><?php echo ($co); ?></div></td>
  </tr>
</table>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="10%">播放地址：</td>
    <td width="800px" class="break">
    <div style="width:800px;" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="url">
    <?php if(is_array($video["con"]["playurl"])): $i = 0; $__LIST__ = $video["con"]["playurl"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): ++$i;$mod = ($i % 2 )?><tr><td> <?php echo ($u); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table></div ></td>
  </tr>
</table>
</li>

</ul>
</div>


</div>
</div>
<?php if(!empty($video["StrUrl"])): ?><?php if($video['total'] >= $video['already']): ?><script type="text/javascript">location.href='<?php echo ($video["StrUrl"]); ?>'</script><?php endif; ?><?php endif; ?>
<!--<?php if($ArrUrl['type'] == 'content' ): ?><?php if($ArrUrl['total_page'] > $ArrUrl['page']): ?><script type="text/javascript">location.href='<?php echo ($StrUrl); ?>'</script><?php else: ?><script type="text/javascript">alert('采集完成');location.href='?s=Admin/CustomCollect/ColRun/action/real/type/content/nid/<?php echo ($ArrUrl["nid"]); ?>/';</script><?php endif; ?><?php endif; ?>
-->

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