<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($year); ?>《<?php echo ($title); ?>》<?php if(($serial == 0) and ($pid != 1)): ?>全集1-<?php echo ($count); ?><?php endif; ?><?php if(($serial != 0) and ($pid != 1)): ?>1-<?php echo ($serial); ?><?php endif; ?>百度影音在线观看/下载-<?php echo ($cname); ?>-<?php echo ($webname); ?></title>
<meta name="keywords" content="<?php echo ($title); ?>,<?php echo ($title); ?>在线观看,<?php echo ($title); ?>全集,<?php echo ($title); ?>下载">
<meta name="description" content="由<?php echo ($actor); ?>主演的<?php echo ($title); ?>高清全集百度影音在线观看和下载;<?php echo ($title); ?>剧情:<?php echo (get_replace_html($content,0,100,'utf-8',true)); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<script language="javascript">var SitePath='<?php echo ($webpath); ?>';var SiteMid='<?php echo ($mid); ?>';var SiteCid='<?php echo ($cid); ?>';var SiteId='<?php echo ($id); ?>';</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>youmtv/js/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/system.js"></script>
<script type="text/javascript" src="<?php echo ($webpath); ?>youmtv/js/common.js"></script>
<link rel="stylesheet" type="text/css" href='<?php echo ($webpath); ?>views/css/system.css'>
<link rel="stylesheet" type="text/css" href="<?php echo ($webpath); ?>youmtv/images/all.css" />
<link rel="shortcut icon" href="<?php echo ($webpath); ?>favicon.ico" /> 
</head>
<body class="allBg">
<div id="all">
  <h1><a title="<?php echo ($webname); ?>" href="/"><img src="<?php echo ($webpath); ?>youmtv/images/allLogo.gif" alt="<?php echo ($webname); ?>"/></a></h1>
  <div class="nav">
    <ul>
      <li class="no"><a href="<?php echo ($webpath); ?>" title="首页">首页</a></li>
      <li><a href="<?php echo ($movieurl); ?>" title="电影">电影</a></li>
      <li><a href="<?php echo ($tvurl); ?>" title="电视剧">电视剧</a></li>
      <li><a href="<?php echo ($zongyiurl); ?>" title="综艺">综艺</a></li>
      <li><a href="<?php echo ($animeurl); ?>" title="动漫">动漫</a></li>
      <li><a href="<?php echo ($jilupianurl); ?>" title="纪录片">纪录片</a></li>
      <li><a href="/list/24.html" title="直播">直播</a></li>
      <li><a href="/special/lists.html" title="专题">专题</a></li>
      <li><a href="/list/7.html" title="资讯">资讯</a></li>
      <li><a href="<?php echo ($topurl); ?>" title="排行榜">排行榜</a></li>
    </ul>
    <?php if(C('user_register') == 1): ?><span id="Login" class="login"></span><?php endif; ?>
    <span class="his" id="ggg" onmouseover="fnDisplayMenu(this,'mnuArtStyles');" onmouseout="fnHideMenu('mnuArtStyles'); fnRemoveHighlight('mnuArtStyles');" ><a class="headerMnuLink" id="mnuArtStylesLink" href="javascript:void(0);">我看过的</a> </span>
    <div class="popup1" id="mnuArtStyles"  style="display:none" onmouseover="fnDisplayMenu2($('#mnuArtStylesLink'),'mnuArtStyles');" onmouseout="fnHideMenu('mnuArtStyles'); fnRemoveHighlight('mnuArtStyles');" >
      <div class="sub"></div>
      <div id="history"></div>
    </div>
  </div>
  <div class="search">
    <div class="box">
      <form action="<?php echo ($webpath); ?>index.php?s=video/search" method="post" name="search" id="search" target="_blank" >
        <div class="input">
          <input type="text" value="请输入视频名、导演或主演" id="xdwwd" name="wd" autocomplete="off" maxlength="35">
        </div>
        <div class="btn">
          <input name="ok" class="bat" type="submit" value=" " id="ok"/>
        </div>
         <div id="xdwss"></div>
      <script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>youmtv/js/searchajax.js"></script>
      </form>
    </div>
  </div>
</div>

<div class="wrapper"><?php echo get_cms_ads('neirong-top');?></div>
<div class="vcate"><span>当前位置：</span><?php echo ($navtitle); ?></div>
<div class="wrapper">
  <div class="dLeft">
    <div class="ibox dteail">
      <div class="dteailImg"> <a title="<?php echo ($title); ?>" href="<?php echo ($playurl_first); ?>" class="pic" target="_blank"><img src="<?php echo ($picurl); ?>" title="<?php echo ($title); ?>" onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="imgpic" alt="<?php echo ($title); ?>"/>
        <?php if(($hits)  >  "499"): ?><span class="hotV"></span><?php endif; ?>
        </a> </div>
      <div class="dteailInfo">
        <div class="dteailTt">
          <h1><a href="<?php echo ($playurl_first); ?>" class="title" title="<?php echo ($title); ?>" target="_blank"><?php echo ($title); ?></a></h1>
          <span>
          <?php if(!empty($intro)): ?><?php echo ($intro); ?><?php endif; ?>
          <?php if(!empty($serial)): ?>更新至<?php echo ($serial); ?>
            <?php if(($cid)  ==  "4"): ?>期
              <?php else: ?>
              集<?php echo ($intro); ?><?php endif; ?><?php endif; ?>
          </span></div>
        <div class="dteailScore">
          <?php if(c(url_html) == 1): ?><p class="score"><span id="Scorenum" class="Scorenum"><?php echo ($score); ?></span> 分 (<span id="Scoreer" class="Scoreer"><?php echo ($scoreer); ?></span>人评价)</p>
            <?php else: ?>
            <p class="score"><span id="Scorenum"><?php echo ($score); ?></span> 分 (<span id="Scoreer"><?php echo ($scoreer); ?></span>人评)</p><?php endif; ?>
<?php echo get_cms_ads('neirong-120-240');?>
        </div>
        <ul class="dteailList">
          <li><strong>
            <?php if(($cid)  ==  "4"): ?>主持
              <?php else: ?>
              <?php if(($cid)  ==  "3"): ?>配音
                <?php else: ?>
                主演<?php endif; ?><?php endif; ?>
            ：</strong>
            <?php if(!empty($actor)): ?><?php echo (get_actor_url(get_replace_html($actor,0,30))); ?>
              <?php else: ?>
              未知<?php endif; ?>
          </li>
          <li class="short"><strong>
            <?php if(($cid)  ==  "4"): ?>电视台
              <?php else: ?>
              导演<?php endif; ?>
            ：</strong>
            <?php if(!empty($director)): ?><?php echo (get_actor_url(get_replace_html($director,0,16))); ?>
              <?php else: ?>
              未知<?php endif; ?>
          </li>
          <li><strong>类型：</strong><a href="<?php echo ($showurl); ?>" target="_blank"><?php echo ($cname); ?></a></li>
          <li class="short"><strong>地区：</strong><?php echo (($area)?($area):'未知'); ?></li>
          <li><strong>语言：</strong><?php echo (($language)?($language):'未知'); ?></li>
          <li class="short"><strong>上映：</strong><?php echo (($year)?($year):'未录入'); ?> 年</li>
          <li><strong>更新：</strong><?php echo (get_color_date('Y年m月d日 H:i:s',$addtime)); ?></li>
        </ul>
        <div class="cont"><a href="http://jifendownload.2345.cn/jifen_2345/2345pack3_k5636_120010026.exe"><img src="/app/2345.gif" width="350" height="55" border="0"></a>
</div>
        <div class="dteailBtn">
          <div class="btn1"><a title="<?php echo ($title); ?>在线观看" target="kankanWindow" href="<?php echo ($playurl_first); ?>">在线观看</a></div>
          <div class="optionBtn v">
            <div class="btn2"><span class="Up">顶<?php echo ($up); ?></span><em>|</em><span class="Down">踩<?php echo ($down); ?></span></div>
          </div>
        </div>
        <div class="sharebox">
          <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
<!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
<span class="bds_more">分享到：</span>
<a class="bds_tsina"></a>
<a class="bds_qzone"></a>
<a class="bds_tqq"></a>
<a class="bds_renren"></a>
<a class="bds_t163"></a>
<a class="bds_tsohu"></a>
<a class="bds_sqq"></a>
<a class="shareCount"></a>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;mini=1&amp;uid=676338" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END --> </div>
        </div>
      </div>
    </div>
    <div class="ibox iboxList playBox">
      <div class="boxTt boxTtab" id="ord">
        <p onmousedown="switchTab('bf',0,3,'on','');" class="on" id="Tab_bf_0"><span>在线观看
          <!--<em><?php echo ($count); ?></em>-->
          </span></p>
        <p a onmousedown="switchTab('bf',1,3,'on','');" class="" id="Tab_bf_1"><span>免费下载</span></p>
        <p a onmousedown="switchTab('bf',2,3,'on','');" class="" id="Tab_bf_2"><span>剧情介绍</span></p>
      </div>
      <div class="boxCon1 cno">
        <div id="videoData" class="boxList">
          <div id="List_bf_0" class="playConL" style="display: block;">        
            <?php if(is_array($playlists)): $i = 0; $__LIST__ = $playlists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$playlist): ++$i;$mod = ($i % 2 )?><?php if(($playlist["count"])  >  "0"): ?><div class="play_list">
                  <p class="title"><?php echo ($playlist["display_name"]); ?> </p>
                  <div id="plist">
                    <ul class="split-list">
                      <?php if(is_array($playlist["playlist"])): $i = 0; $__LIST__ = $playlist["playlist"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo ($video["playurl"]); ?>" target="_blank"><?php echo ($video["playname"]); ?></a></li>
                      <?php if(($i)  ==  "55"): ?></ul>
                    <ul id="all-plist" class="split_list all-plist" style="display:none;"><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <?php if(($playlist["count"])  >  "55"): ?><div id="pmoreContain" class="playMoreA pmoreContain"><a onfocus="this.blur()" class="plMore" id="plMore">展开列表</a></div><?php endif; ?>
                  </div>
                </div><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
          <div id="List_bf_1" class="playCon" style="display:none;">
            <div class="boxlist">
              <?php if(($countdown)  >  "0"): ?><div class="play_list">
                  <p class="title">下载列表：</p>
                  <div id="plist">
                    <ul class="split-list">
                      <?php if(is_array($downlist)): $i = 0; $__LIST__ = $downlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo ($video["playpath"]); ?>" target="_blank"><?php echo ($video["playname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                  </div>
                </div>
                <?php else: ?>
                暂无下载地址...<?php endif; ?>
            </div>
          </div>
          <div id="List_bf_2" class="playCon" style="display:none;"><?php echo ($content); ?><p>温馨提示：您正在观看的《<?php echo ($title); ?>》的剧情介绍来自于[WWW.DADI.TV-大地影院]，如果您喜欢本站，请推荐给您的朋友，谢谢您的支持!最后更新：<?php echo (get_color_date('Y年m月d日',$addtime)); ?></p></div>
        </div>
      </div>
    </div>
    <div class="dLeftAd"><?php echo get_cms_ads('detail-left720');?></div>
    <div class="ibox iboxList playBox">
      <div class="boxTt top">
        <h2>同类热门推荐</h2>
      </div>
      <ul class="tlMov">
        <?php $tag['name'] = 'video';$tag['cid'] = ''.$cid.'';$tag['limit'] = '6';$tag['order'] = 'stars desc,hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li 
          
          <?php if(($i)  ==  "6"): ?>class="no"<?php endif; ?>
          >
          <div class="imgBox"><a title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>" class="pic" target="_blank"><img src="<?php echo ($video["picurl"]); ?>" onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" alt="<?php echo ($video["title"]); ?>" /></a> </div>
          <p class="movTt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,8)); ?></a><a target="_blank" class="movInfo" title="<?php echo ($video["title"]); ?>在线评论" href="<?php echo ($video["readurl"]); ?>#comment" target="_blank"><?php echo (get_replace_html($video["title"],0,8)); ?></a></p>
          <p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
          </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
      </ul>
    </div>
    <!--影片评论-->
    <?php if(C('user_comment') == 1): ?><div class="ibox iboxList playBox"> <a name="cmm" id="comment"></a>
        <div class="boxTt top">
          <h2>影片评论</h2>
        </div>
        <div class="comm"><!-- Duoshuo Comment BEGIN -->
	<div class="ds-thread"></div>
<script type="text/javascript">
var duoshuoQuery = {short_name:"daditv"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = 'http://static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		|| document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- Duoshuo Comment END --></div>
        <!--发表评论表单 -->
      </div><?php endif; ?>
  </div>
   <div class="rightAd"><?php echo get_cms_ads('nryb-300');?>
    <div class="ibox submenu">
      <div class="boxTt top">
        <h2>
          <?php if(($pid)  ==  "1"): ?>电影<?php else: ?><?php if(($pid)  ==  "2"): ?>电视剧<?php else: ?><?php endif; ?><?php if(($cid)  ==  "3"): ?>动漫<?php else: ?><?php endif; ?><?php if(($cid)  ==  "4"): ?>综艺<?php else: ?><?php endif; ?><?php if(($cid)  ==  "6"): ?>纪录片<?php else: ?><?php endif; ?><?php endif; ?>热播榜</h2>
      </div>
      <div class="boxCon">
        <div class="reboList rL">
          <ul>
            <?php if(($pid)  ==  "1"): ?><?php $tag['name'] = 'video';$tag['cid'] = ''.$pid.'';$tag['limit'] = '15';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="no2">
                    <?php else: ?>
                  <li><?php endif; ?>
                <em><?php echo ($i); ?></em><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,12)); ?></a> <span><?php echo ($video["score"]); ?></span>
                </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
              <?php else: ?>
              <?php if(($pid)  ==  "2"): ?><?php $tag['name'] = 'video';$tag['cid'] = ''.$pid.'';$tag['limit'] = '15';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="no2">
                      <?php else: ?>
                    <li><?php endif; ?>
                  <em><?php echo ($i); ?></em><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,12)); ?></a> <span><?php echo ($video["score"]); ?></span>
                  </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
                <?php else: ?>
                <?php $tag['name'] = 'video';$tag['cid'] = ''.$cid.'';$tag['limit'] = '15';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="no2">
                      <?php else: ?>
                    <li><?php endif; ?>
                  <em><?php echo ($i); ?></em><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,12)); ?></a> <span><?php echo ($video["score"]); ?></span>
                  </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?><?php endif; ?><?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
<?php echo get_cms_ads('detail-right240-1');?>
  </div>
 </div>
<script src="<?php echo ($webpath); ?>youmtv/js/comment.js" type="text/javascript"></script>
<div id="footer"> <?php echo ($copyright); ?><br />
  Copyright © 2013 <a href="<?php echo ($weburl); ?>"><?php echo ($webname); ?></a> All Rights Reserved <br />
  <?php echo ($icp); ?> <a href="<?php echo ($baidusitemap); ?>">百度地图</a> <a href="<?php echo ($googlesitemap); ?>">谷歌地图</a> <?php echo ($tongji); ?><br />
</div>
</body>
</html>