<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>影片采集管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<link rel='stylesheet' type='text/css' href='./views/css/collect.css'>
<link rel='stylesheet' type='text/css' href='./views/css/dialog.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/dialog.js"></script>
<style type="text/css">
<!--
.node{ width:90%;margin:auto;}

.info{width:100%; text-align:left;margin-top:20px;}
.info ul li{float:left;width:150px;}
.list li{margin-top:4px;padding-left:6px;}
.list li td{color:#333;font-size:12px;text-align:left;padding-top:0px;}
.list li a{color:#333;}
.url td{border:none;}
.main{padding-bottom:20px;}
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
<?php if(!empty($ArrUrl["url"])): ?><div class="info">
<dt><strong>采集的列表地址：</strong><?php echo ($ArrUrl["url_list"]); ?></dt>
<dd>
<ul>
<li><small>当前列表共计：<?php echo ($ArrUrl["total"]); ?>条记录</small></li>
<li><small>重复记录：<?php echo ($ArrUrl["reNum"]); ?>条</small></li>
<li><small>新采集记录：<?php echo ($ArrUrl["newAdd"]); ?>条</small></li>
</ul>
</dd>
</div>
<div class="clear"></div>
<div class="list">
<ul>

<?php if(is_array($ArrUrl["url"])): $k = 0; $__LIST__ = $ArrUrl["url"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$k;$mod = ($k % 2 )?><li>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="3%"><?php echo ($k); ?></td>
    <td><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["url"]); ?></a></td>
  </tr>
</table>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
<!--<?php if($ArrUrl['total_page'] > $ArrUrl['page']): ?><script type="text/javascript">location.href='?s=Admin/CustomCollect/ColDo/type/url/nid/<?php echo ($ArrUrl["nid"]); ?>/page/<?php echo ($ArrUrl["page"]); ?>'</script><?php else: ?><script type="text/javascript">alert('采集完成');</script><?php endif; ?>-->
</ul>
</div><?php endif; ?>
<?php if(!empty($con)): ?><div class="info">
<dt><strong>影片来源地址：</strong><?php echo ($url); ?></dt>
<!--<dd>
<ul>
<li><small>待采集影片：<?php echo ($ArrUrl["total"]); ?></small></li>
<li><small>新采集记录：<?php echo ($ArrUrl["newAdd"]); ?>条</small></li>
</ul>
</dd>-->
</div>
<div class="clear"></div>
<div class="list">
<ul>

<?php if(is_array($con["base"])): $k = 0; $__LIST__ = $con["base"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): ++$k;$mod = ($k % 2 )?><li>
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
    <?php if(is_array($con["playurl"])): $i = 0; $__LIST__ = $con["playurl"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$url): ++$i;$mod = ($i % 2 )?><tr><td> <?php echo ($url); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></div></table></td>
  </tr>
</table>
</li>

</ul>
</div><?php endif; ?>

</div>
</div>
<?php if($ArrUrl['action'] == 'real' ): ?><?php if($ArrUrl['total_page'] > $ArrUrl['page']): ?><script type="text/javascript">location.href='?s=Admin/CustomCollect/ColRun/action/real/type/all/nid/<?php echo ($ArrUrl["nid"]); ?>/page/<?php echo ($ArrUrl["page"]); ?>/stime/<?php echo ($ArrUrl["stime"]); ?>'</script><?php else: ?><script type="text/javascript">art.dialog({																																																														    lock: true,
	time: 3,
    content: '地址采集完成,继续采集影片内容!',
    yesFn: function () {
        return true;
    }
});location.href='?s=Admin/CustomCollect/ColRun/action/real/type/content/nid/<?php echo ($ArrUrl["nid"]); ?>/stime/<?php echo ($ArrUrl["stime"]); ?>';</script><?php endif; ?><?php endif; ?>


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