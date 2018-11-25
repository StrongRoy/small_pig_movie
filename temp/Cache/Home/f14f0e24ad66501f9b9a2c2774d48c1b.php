<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($webtitle); ?></title>
<meta name="keywords" content="<?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($description); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<script language="javascript">var SitePath='<?php echo ($webpath); ?>';var SiteMid='<?php echo ($mid); ?>';var SiteCid='<?php echo ($cid); ?>';var SiteId='<?php echo ($id); ?>';</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/system.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/history.js"></script>
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>views/css/system.css'>
<link rel='stylesheet' type='text/css' href='<?php echo ($tplpath); ?>template.css'>
<script language="javascript">
$(document).ready(function(){
	$('#content').focus(function(){
		if($('#content').val()=='分享您的看法吧，最多200个字。'){
			$('#content').val('');
		}
	});
	$('#content').blur(function(){
		if($('#content').val()==''){
			$('#content').val('分享您的看法吧，最多200个字。');
		}
	});	
	$("#guestbook").submit( function () {
		if($('#content').val().length>200){
			alert('您输入的留言信息过长，请删减一些！');
  			return false;
		}
		if($('#content').val()=='分享您的看法吧，最多200个字。'){
			alert('请输入留言信息！');
  			return false;
		}		
	}); 
});
</script>
</head>
<body>
<div id="wrapper">
<script language="JavaScript" type="text/javascript" src="<?php echo ($tplpath); ?>template.js"></script>
<div class="header">
  <div class="top">
    <div title="<?php echo ($webname); ?>" class="logo"></div>
    <?php if(C('user_register') == 1): ?><div id="Login" class="login"></div><?php endif; ?>
    <div class="control"><a href="<?php echo ($rssurl); ?>">RSS订阅</a>&nbsp;|&nbsp;<a href="javascript:void(0)" id="fav">收藏本站</a>&nbsp;|&nbsp;<a href="<?php echo ($guestbookurl); ?>">留言反馈</a>&nbsp;|&nbsp;<span class="his"  id="ggg" onmouseover="fnDisplayMenu(this,'mnuArtStyles');" onmouseout="fnHideMenu('mnuArtStyles'); fnRemoveHighlight('mnuArtStyles');" ><a class="headerMnuLink" id="mnuArtStylesLink" href="javascript:void(0);">播放记录</a></span></div>

    <div class="popup1" id="mnuArtStyles"  style="display:none" onmouseover="fnDisplayMenu2($('#mnuArtStylesLink'),'mnuArtStyles');" onmouseout="fnHideMenu('mnuArtStyles'); fnRemoveHighlight('mnuArtStyles');" >
      <div id="history">
      </div>
   </div>

  </div>
  <div class="nav"><a href="<?php echo ($webpath); ?>" <?php if($model == 'index'): ?>class="cur"<?php endif; ?>>首页</a>
    <?php $tag['name'] = 'menu'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><a onfocus="this.blur();" href="<?php echo ($menu["showurl"]); ?>" <?php if(($menu['id'] == $cid) or ($menu['id'] == $pid)): ?>class="cur"<?php endif; ?>><?php echo ($menu["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?><span>|</span>
    <a href="<?php echo ($topurl); ?>" <?php if(check_model('top10') == 1): ?>class="cur"<?php endif; ?>>排行</a>
    <a href="<?php echo ($specialurl); ?>" <?php if(check_model('special') == 1): ?>class="cur"<?php endif; ?>>专题</a>


   
  </div>
  <div class="query"> <span class="query_l"></span>
    <form action="<?php echo ($webpath); ?>index.php?s=video/search" method="post" name="search" id="search" >
      <input type="text" value="<?php echo (($keyword)?($keyword):'请输入关键字'); ?>" id="wd" name="wd" autocomplete="off" maxlength="35">
      <div id="search_sort"><span id="cur_txt">视频</span><ul class="sort" id="sort"><li><a href="javascript:void(0)">视频</a></li><li><a href="javascript:void(0)">新闻</a></li></ul></div>
      <button type="submit" class="search_bt"><span>搜索</span></button>
    </form>
    <div class="hot_kw">热门关键词：<?php echo ($hotkey); ?></div>
    <span class="query_r"></span> </div>
</div>
<div class="box"><span>您现在所在的位置：</span><?php echo ($navtitle); ?></div>
<div class="guestbook_box bd">
<span class="tl"></span><span class="tr"></span>
<div class="ct">
    <div class="guestbook_in">
    <form action="<?php echo ($webpath); ?>index.php?s=Guestbook/Insert" method="post" name="guestbook" id="guestbook">
    <input name="errid" type="hidden" value="<?php echo ($id); ?>" />  
    <p class="title">我也来说说：</p>
  <?php if((C('user_post') == 1) and ($userid == 0)): ?><div class="guestbook_login">发表留言，请登录：<a href="<?php echo ($webpath); ?>index.php?s=user/login">登录</a>&nbsp;|&nbsp;<a href="index.php?s=user/reg">注册</a></div>
    <textarea id="guestbookInput" name="content" rows="5" onFocus="if(this.value=='分享您的看法吧，最多200个字。'){this.value='';};this.select();" onblur="if(this.value==''){this.value='分享您的看法吧，最多200个字。';};" class="txt_in" maxlength="200" disabled="disabled"></textarea>
    <p class="under_row"><button type="submit" class="sub_btn" name="submit" id="submitCommBtn" disabled><span>发表留言</span></button></p>
  <?php else: ?>
    <div><textarea name="content"  id="content" rows="5" class="txt_in" maxlength="200"><?php echo (($content)?($content):'分享您的看法吧，最多200个字。'); ?></textarea></div>
    <p class="under_row"><button type="submit" class="sub_btn" id="submit"><span>发表留言</span></button></p><?php endif; ?>
    </form>
    </div>
    <!--留言列表-->
	<p class="board_title"><span class="title">留言信息：</span></p>
    <ul class="board_ul">
        <?php if(is_array($list_guestbook)): $i = 0; $__LIST__ = $list_guestbook;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$guestbook): ++$i;$mod = ($i % 2 )?><li>
        <div class="guestbook_cont">
        <?php if(empty($guestbook["face"])): ?><img src="<?php echo ($webpath); ?>views/images/user/face.jpg" /><?php else: ?><img src="<?php echo ($guestbook["face"]); ?>" /><?php endif; ?>
        <p><span class="time"><?php echo (get_color_date('Y-m-d H:i',$guestbook["addtime"])); ?></span><?php echo ($guestbook["floor"]); ?>楼：<strong><?php echo (remove_xss(htmlspecialchars($guestbook["username"]))); ?></strong><br><?php echo (remove_xss(htmlspecialchars($guestbook["content"]))); ?></p></div>
        <?php if(!empty($guestbook["recontent"])): ?><div class="re_cont"><p class="re_title">站长回复：</p><p><?php echo ($guestbook["recontent"]); ?></p></div><?php endif; ?>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <?php if(($count)  >  "10"): ?><div class="pages"><?php echo ($pages); ?></div><?php endif; ?>
</div>
<span class="bl"></span><span class="br"></span> 
</div>
<div id="footer">
	<?php echo ($copyright); ?><br />
	Copyright © 2007 - 2011 <a href="<?php echo ($weburl); ?>"><?php echo ($webname); ?></a> Some Rights Reserved <?php echo ($icp); ?> <?php echo ($tongji); ?> <a href="<?php echo ($baidusitemap); ?>">sitemap</a> <a href="<?php echo ($googlesitemap); ?>">sitemap</a><br />
</div>
</div>
</body>
</html>