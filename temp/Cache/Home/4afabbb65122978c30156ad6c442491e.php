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
</head>
<body>
<div id="wrapper">
<!--头部 开始-->
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
<!--头部 结束-->
<div class="box"><span>您现在所在的位置：</span><?php echo ($navtitle); ?></div>
<div class="box">
  <div class="left_col">
    <div class="topbrd"></div>
    <div class="bd"><div class="ct">
        <div class="hd"><h3>热门视频排行</h3><a href="<?php echo ($topurl); ?>" class="more">更多&gt;&gt;</a></div>
        <ul class="top"><?php $tag['name'] = 'video';$tag['limit'] = '20';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li <?php if(($i)  >=  "4"): ?>class="b <?php if($i == 10): ?>nobrd<?php endif; ?>"<?php endif; ?>> 
        	<em><?php echo ($i); ?></em><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,15)); ?></a> <span><?php echo (get_color_date('m-d',$video["addtime"])); ?></span>
        </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?></ul>
    </div></div>
    <div class="btmbrd"></div>
  </div>
  <div class="right_col"><div class="video_search_box bd">
    <span class="tl"></span><span class="tr"></span>
      <div class="ct">
        <?php if(($count)  >  "0"): ?><div class="video_search_total">共找到<span class="kw"><?php echo ($count); ?></span>条与<span class="kw">"<?php echo ($keyword); ?>"</span> 的相关结果</div>
        <ul class="mov_list">
          <?php $tag['name'] = 'video';$tag['limit'] = '10';$tag['order'] = ''.$order.''; $__LIST__ = get_tag_gxsearch($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li> 
            <a href="<?php echo ($video["readurl"]); ?>"><img src="<?php echo ($video["picurl"]); ?>" width="119" height="170" border="0" onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'"/></a>
              <a href="<?php echo ($video["readurl"]); ?>" class="title" title="<?php echo ($video["title"]); ?>"><?php echo (get_hilight(get_replace_html($video['title'],0,10),$keyword)); ?></a>
              <p>导演：<?php echo (get_hilight(($video['director'])?($video['director']):'未知',$keyword)); ?> <br>主演：主演：<?php echo (get_actor_url(get_replace_html($video["actor"],0,6))); ?><br>地区：<?php echo ($video["area"]); ?>   年份：<?php echo (($video["year"])?($video["year"]):'未录入'); ?><br>评分：<span class="score"><?php echo ($video["score"]); ?></span> </p>
              <p>剧集介绍：<?php echo (get_hilight(get_replace_html($video["content"],0,35,'utf-8',true),$keyword)); ?></p>
              <p class="bar"><a href="<?php echo ($video["readurl"]); ?>" class="view">详细资料&gt;&gt;</a><a href="<?php echo ($video["playerurl"]); ?>" class="watch">立即观看</a> </p>
            </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
        </ul>
        	<?php if($count > 10): ?><div class="pages"><?php echo ($pages); ?></div><?php endif; ?>
        <?php else: ?>
        	<div style="height:200px; line-height:200px; text-align:center">未找到与"<span class="kw-hilight">"<?php echo ($keyword); ?>"</span>"相关的视频，请给我们<a href="<?php echo ($guestbookurl); ?>">留言</a>!</div><?php endif; ?>
      </div>
      <span class="bl"></span><span class="br"></span>
  </div></div>
</div>
<div id="footer">
	<?php echo ($copyright); ?><br />
	Copyright © 2007 - 2011 <a href="<?php echo ($weburl); ?>"><?php echo ($webname); ?></a> Some Rights Reserved <?php echo ($icp); ?> <?php echo ($tongji); ?> <a href="<?php echo ($baidusitemap); ?>">sitemap</a> <a href="<?php echo ($googlesitemap); ?>">sitemap</a><br />
</div>
</body>
</html>