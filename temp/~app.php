<?php  function arr2file($filename, $arr=''){ if(is_array($arr)){ $con = var_export($arr,true); } else{ $con = $arr; } $con = "<?php\nreturn $con;\n?>"; write_file($filename, $con); } function mkdirss($dirs,$mode=0777) { if(!is_dir($dirs)){ mkdirss(dirname($dirs), $mode); return @mkdir($dirs, $mode); } return true; } function write_file($l1, $l2=''){ $dir = dirname($l1); if(!is_dir($dir)){ mkdirss($dir); } return @file_put_contents($l1, $l2); } function read_file($l1){ return @file_get_contents($l1); } function t2js($l1, $l2=1){ $I1 = str_replace(array("\r", "\n"), array('', '\n'), addslashes($l1)); return $l2 ? "document.write(\"$I1\");" : $I1; } function u2g($str){ return iconv("UTF-8","GBK",$str); } function g2u($str){ return iconv("GBK","UTF-8//ignore",$str); } function http_url(){ return htmlspecialchars("http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); } function xtime($day){ $day = intval($day); return mktime(23,59,59,date("m"),date("d")-$day,date("y")); } function get_base_path($filename){ $base_path = $_SERVER['PHP_SELF']; $base_path = substr($base_path,0,strpos($base_path,$filename)); return $base_path; } function get_base_url($baseurl,$url){ if("#" == $url){ return ""; }elseif(FALSE !== stristr($url,"http://")){ return $url; }elseif( "/" == substr($url,0,1) ){ $tmp = parse_url($baseurl); return $tmp["scheme"]."://".$tmp["host"].$url; }else{ $tmp = pathinfo($baseurl); return $tmp["dirname"]."/".$url; } } function get_replace_input($str,$rptype=0){ $str = stripslashes($str); $str = htmlspecialchars($str); $str = get_replace_nb($str); return addslashes($str); } function get_replace_nr($str){ $str = str_replace(array("<nr/>","<rr/>"),array("\n","\r"),$str); return trim($str); } function get_replace_nb($str){ $str = str_replace("&nbsp;",' ',$str); $str = str_replace("　",' ',$str); $str = ereg_replace("[\r\n\t ]{1,}",' ',$str); return trim($str); } function get_replace_html($str, $start=0, $length, $charset="utf-8", $suffix=false){ return msubstr(eregi_replace('<[^>]+>','',ereg_replace("[\r\n\t ]{1,}",' ',get_replace_nb($str))),$start,$length,$charset,$suffix); } function get_replace_order($order){ $arrorder['addtime'] = 'addtime'; $arrorder['id'] = 'id'; $arrorder['hits'] = 'hits'; $arrorder['monthhits'] = 'monthhits'; $arrorder['weekhits'] = 'weekhits'; $arrorder['dayhits'] = 'dayhits'; $arrorder['stars'] = 'stars'; $arrorder['up'] = 'up'; $arrorder['down'] = 'down'; $arrorder['score'] = 'score'; $arrorder['scoreer'] = 'scoreer'; return $arrorder[trim($order)]; } function check_model($modelname){ if(strtolower(MODULE_NAME) == $modelname){ return 1; } return 0; } function get_model_name($mid){ if ($mid==1){ return 'video'; }elseif ($mid==2){ return 'info'; }elseif ($mid==3){ return 'special'; }elseif ($mid==4){ return 'user'; } } function get_model_id($str){ if ($mid=='video'){ return 1; }elseif ($mid=='info'){ return 2; }elseif ($mid=='special'){ return 3; }elseif ($mid=='user'){ return 4; } } function get_channel_son($pid){ $tree = list_search(F('_gxcms/channeltree'),'id='.$pid); if(!empty($tree[0]['son'])){ return false; }else{ return true; } } function get_channel_name($cid,$type='cname'){ $arr = list_search(F('_gxcms/channel'),'id='.$cid); if (is_array($arr)) { return $arr[0][$type]; }else{ return $cid; } } function get_channel_array($cid,$type='id'){ $tree = list_search(F('_gxcms/channeltree'),'id='.$cid); if(!empty($tree[0]['son'])){ foreach($tree[0]['son'] as $val){ $param[] = $val[$type]; } return $param; }else{ return false; } } function get_channel_count($cid=0){ $where['status'] = 1; if ($cid > 0) { $where['cid'] = get_channel_sqlin($cid); }elseif ($cid == 0) { $where['addtime'] = array('gt',xtime(1)); } $mid = get_channel_name($cid,'mid'); if ($mid == 2){ $rs = M("Info"); }else{ $rs = M("Video"); } $count = $rs->where($where)->count('id'); return $count+0; } function get_channel_sqlin($cid){ $tree = list_search(F('_gxcms/channeltree'),'id='.$cid); if (!empty($tree[0]['son'])) { foreach($tree[0]['son'] as $val){ $arr['cid'][] = $val['id']; } $channel = implode(',', $arr['cid']); return array('IN',''.$channel.''); } return $cid; } function get_channel_remove($cids){ foreach($cids as $key=>$value){ if(get_channel_son($value)){ $cid .= ','.$value; }else{ $cidin = get_channel_sqlin($value); $cid .= ','.$cidin[1]; } } $cidarr = explode(',',$cid); unset($cidarr[0]); $cidarr = array_unique($cidarr); return $cidarr; } function get_cms_page_max($count,$limit,$page){ $totalPages = ceil($count/$limit); if ($page > $totalPages){ $page = $totalPages; } return $page; } function get_cms_page($totalrecords,$pagesize,$currentpage,$params,$filename='条数据',$pagego=true,$halfPer=5){ $page['totalrecords'] = $totalrecords; $page['totalpages'] = ceil($page['totalrecords']/$pagesize); $page['currentpage'] = $currentpage; $page['urlpage'] = $params.'{!page!}'; $page['listpages'] = '共'.$page['totalrecords'].$filename.'&nbsp;当前：'.$page['currentpage'].'/'.$page['totalpages'].'页&nbsp;'; if ($pagego){ $pagego = 'jumpurl(\''.$page['urlpage'].'\','.$page['totalpages'].')'; } $page['listpages'] .= get_cms_page_css($page['currentpage'],$page['totalpages'],$halfPer,$page['urlpage'],$pagego); return $page; } function get_cms_page_css($currentPage,$totalPages,$halfPer=5,$url,$pagego){ $linkPage .= ( $currentPage > 1 ) ? '<a href="'.str_replace('{!page!}',1,$url).'" class="pagegbk">首页</a>&nbsp;<a href="'.str_replace('{!page!}',($currentPage-1),$url).'" class="pagegbk">上一页</a>&nbsp;' : '<em>首页</em>&nbsp;<em>上一页</em>&nbsp;'; for($i=$currentPage-$halfPer,$i>1||$i=1,$j=$currentPage+$halfPer,$j<$totalPages||$j=$totalPages;$i<$j+1;$i++){ $linkPage .= ($i==$currentPage)?'<span>'.$i.'</span>&nbsp;':'<a href="'.str_replace('{!page!}',$i,$url).'">'.$i.'</a>&nbsp;'; } $linkPage .= ( $currentPage < $totalPages ) ? '<a href="'.str_replace('{!page!}',($currentPage+1),$url).'" class="pagegbk">下一页</a>&nbsp;<a href="'.str_replace('{!page!}',$totalPages,$url).'" class="pagegbk">尾页</a>' : '<em>下一页</em>&nbsp;<em>尾页</em>'; if(!empty($pagego)){ $linkPage .='&nbsp;<input type="input" name="page" id="page" class="pageinput"/><input type="button" value="跳 转" onclick="'.$pagego.'" class="pagebg"/>'; } return str_replace('_1'.C('html_file_suffix'),C('html_file_suffix'),str_replace('index1'.C('html_file_suffix'),'',$linkPage)); } function get_cms_ads($str,$charset="utf-8"){ return '<script type="text/javascript" src="'.C('web_path').C('web_adsensepath').'/'.$str.'.js" charset="utf-8"></script>'; } function get_color_title($str,$color){ if (empty($color)) { return $str; }else{ return '<font color="'.$color.'">'.$str.'</font>'; } } function get_color_date($type='Y-m-d H:i:s',$time,$color='red'){ if($time > xtime(1)){ return '<font color="'.$color.'">'.date($type,$time).'</font>'; }else{ return date($type,$time); } } function get_hot_key($string){ $array = explode('|',$string); if(C('url_html')){ return '<script type="text/javascript" src="'.C('web_path').'temp/Js/hot.js" charset="utf-8"></script>'; } $hotkey = ''; foreach($array as $key=>$value){ $hotkey .= '<a href="'.C('web_path').'index.php?s=video/search/wd/'.urlencode($value).'">'.$value.'</a>'; } return $hotkey; } function get_jifen($fen){ $array = explode('.',$fen); return '<strong>'.$array[0].'</strong>.'.$array[1]; } function get_hilight($string,$keyword,$classname='kw-hilight'){ return str_replace($keyword,'<span class="kw-hilight">'.$keyword.'</span>',$string); } function get_actor_url($str,$num,$keyword,$classname){ $str = str_replace(' ','/',str_replace(',','/',$str)); $arr = explode('/',$str); foreach($arr as $key=>$val){ $value = $val; if($keyword){ $value = get_hilight($value,$keyword,'a'); } $restr .= '<a href="'.C('web_path').'index.php?s=video/search/wd/'.urlencode($val).'" target="_blank">'.$value.'</a> '; if(($key+1) == $num){ break; } } return $restr; } function get_letter_url($cid,$letter='',$mid='video'){ if($cid){ $arrurl['id'] = $cid; } for($i=1;$i<=26;$i++){ $arrurl['letter'] = chr($i+64); $url = str_replace('index.php?s=/Home/','index.php?s=',U('Home-'.$mid.'/lists',$arrurl,false,true)); if($letter == $arrurl['letter']){ $str .='<a href="'.$url.'" class="Letter">'.$arrurl['letter'].'</a>'; }else{ $str .='<a href="'.$url.'">'.$arrurl['letter'].'</a>'; } } return $str; } function get_img_url_preg($file,$content,$number=1){ preg_match_all('/<img(.*?)src="(.*?)(?=")/si',$content,$imgarr); preg_match_all('/(?<=src=").*?(?=")/si',implode('" ',$imgarr[0]).'" ',$imgarr); $countimg = count($imgarr); if($number > $countimg){ $number = $countimg; } return $imgarr[0][($number-1)]; } function get_img_url($file,$content,$number=1){ if(!$file){ return get_img_url_preg($file,$content,$number); } if(strpos($file,'http://') !== false){ return $file; } $prefix = C('upload_ftp_url'); if(!empty($prefix)){ return $prefix.$file; }else{ return C('web_path').C('upload_path').'/'.$file; } } function get_img_url_s($file,$content,$number=1){ if(!$file){ return get_img_url_preg($file,$content,$number); } if(strpos($file,'http://') !== false){ return $file; } $prefix = C('upload_ftp_url'); if(!empty($prefix)){ return $prefix.$file; }else{ return C('web_path').C('upload_path').'-s/'.$file; } } function get_play_name($i,$count){ if($count>99){ if($i<10){ return str_pad($i,3,'0',STR_PAD_LEFT); } if(10<=$i && $i<100){ return str_pad($i,3,'0',STR_PAD_LEFT); } } if($count>9 && $i<10){ return str_pad($i,2,'0',STR_PAD_LEFT); } return $i; } function get_show_url($mid,$arrurl,$page){ if(C('url_html') && C('url_html_channel') && in_array($mid,array('video','info','special'))){ $showurl = C('web_path').str_replace('index'.C('html_file_suffix'),'',get_show_url_dir($mid,$arrurl['id'],$page).C('html_file_suffix')); }else{ if($page > 1){ $arrurl['p'] = '{!page!}'; } $showurl = str_replace('index.php?s=/Home/','index.php?s=',U('Home-'.$mid.'/lists',$arrurl,false,true)); if(C('url_rewrite')){ $showurl = str_replace('index.php?s=','',$showurl); $showurl = str_replace(array("video/lists/id", "info/lists/id"), array('list', 'newslist'), $showurl); }elseif(!C('url_html')){ $showurl = str_replace('index.php','',$showurl); } } return $showurl; } function get_show_url_dir($mid,$cid,$page){ if('special' == $mid){ $showdir = trim(C('url_dir_special')).'/index'; if($page > 1){ $showdir .= '{!page!}'; } return $showdir; } if(C('url_html_rule') == 1){ $listdir = trim(C('url_dir_all')); $listdir = !empty($listdir)?$listdir.'/':''; $showdir = $listdir.get_channel_name($cid,'cfile').'/index'; if($page > 1){ $showdir .= '{!page!}'; } return $showdir; } $showdir = trim(C('url_dir_'.$mid)); if($showdir){ $showdir .= '/'; } if(C('url_html_rule') == 2){ $showdir .= $cid; if($page > 1){ $showdir .= '_{!page!}'; } return $showdir; } $showdir .= get_channel_name($cid,'cfile'); if($page > 1){ $showdir .= '_{!page!}'; } return $showdir; } function get_read_url($mid,$id,$cid,$jumpurl,$name,$page){ if ($jumpurl) { return $jumpurl; } if(C('url_html')){ $readurl = C('web_path').str_replace('index'.C('html_file_suffix'),'',get_read_url_dir($mid,$id,$cid,$name,$page).C('html_file_suffix')); return $readurl; } $arrurl['id'] = $id; $readurl = str_replace('index.php?s=/Home/','index.php?s=',U('Home-'.$mid.'/detail',$arrurl,false,true)); if(C('url_rewrite')){ $readurl = str_replace('index.php?s=','',$readurl); $readurl = str_replace(array("video/detail/id", "info/detail/id"), array('movie', 'news'), $readurl); }else{ $readurl = str_replace('index.php','',$readurl); } return $readurl; } function get_read_url_dir($mid,$id,$cid,$name,$page){ if('special' == $mid){ return trim(C('url_dir_special').'/'.$id); } if(C('url_html_rule') == 1){ $listdir = trim(C('url_dir_all')); $listdir = !empty($listdir)?$listdir.'/':''; $readdir = $listdir.get_channel_name($cid,'cfile').'/'.$id.'/index'; return $readdir; } $readdir = trim(C('url_dir_'.$mid.'read')); $readdir = !empty($readdir)?$readdir.'/':''; if(C('url_html_rule') == 2){ $readdir .= $id; return $readdir; } $readdir .= get_channel_name($cid,'cfile').$id; return $readdir; } function get_play_url($id,$cid,$ji){ if(C('url_html')){ if(C('url_html_play')){ $playurl = C('web_path').str_replace('index'.C('html_file_suffix'),'',get_play_url_dir($id,$cid,$ji).C('html_file_suffix')); if(C('url_html_play') == 1){ $playurl .= '?'.$id.'-'.$ji; } }else{ $playurl = str_replace('index.php?s=/Home/','index.php?s=',U('Home-video/play/id/'.$id.'-'.$ji)); if(C('url_rewrite')){ $playurl = str_replace('index.php?s=','',$playurl); $playurl = str_replace("video/play/id","player", $playurl); } } }else{ $playurl = str_replace('index.php?s=/Home/','index.php?s=',U('Home-video/play/id/'.$id.'-'.$ji)); if(C('url_rewrite')){ $playurl = str_replace('index.php?s=','',$playurl); $playurl = str_replace("video/play/id","player", $playurl); }else{ $playurl = str_replace('index.php','',$playurl); } } return $playurl; } function get_play_url_dir($id,$cid,$ji){ if(C('url_html_rule') == 1){ $listdir = trim(C('url_dir_all')); $listdir = !empty($listdir)?$listdir.'/':''; $playdir = $listdir.get_channel_name($cid,'cfile').'/'; if(C('url_html_play') == 1){ return $playdir.$id.'/play'; } return $playdir.$id.'/'.$id.'-'.$ji; } $playdir = trim(C('url_dir_videoplay')); $playdir = !empty($playdir)?$playdir.'/':''; if(C('url_html_rule') == 2){ if(C('url_html_play') == 1){ return $playdir.$id; } return $playdir.$id.'-'.$ji; } if(C('url_html_play') == 1){ return $playdir.get_channel_name($cid,'cfile').$id; } return $playdir.get_channel_name($cid,'cfile').$id.'-'.$ji; } function get_tag_gxcms($tag){ $table = !empty($tag['name'])?trim($tag['name']):'video'; $field = !empty($tag['field'])?trim($tag['field']):'*'; $limit = !empty($tag['limit'])?trim($tag['limit']):'10'; $order = !empty($tag['order'])?trim($tag['order']):'addtime desc'; if($table != 'link'){ $where['status'] = array('eq',1); } if ($tag['time']) { $where['addtime'] = array('gt',xtime($tag['time'])); } if ($tag['hits']) { $hits = explode(',',trim($tag['hits'])); if (count($hits)>1) { $where['hits'] = array('between',$hits[0].','.$hits[1]); }else{ $where['hits'] = array('gt',$hits[0]); } } if ($tag['cid']) { $cids = explode(',',trim($tag['cid'])); if (count($cids)>1) { $where['cid'] = array('in',get_channel_remove($cids)); }else{ $where['cid'] = get_channel_sqlin($tag['cid']); } } if ($tag['ids']) { $where['id'] = array('in',trim($tag['ids'])); } if ($tag['stars']) { $where['stars'] = array('in',trim($tag['stars'])); } if ($tag['letter']) { $where['letter'] = array('eq',trim($tag['letter'])); } if ($tag['keyword']) { $keyword = trim($tag['keyword']); $where['title'] = array('like','%'.$keyword.'%'); } if ($tag['serial'] && $table=='video') { $serial = trim($tag['serial']); if ('all' == $serial) { $where['serial'] = array('neq',0); }else{ $where['serial'] = array('gt',$serial); } } if ($tag['up']) { $up = explode(',',trim($tag['up'])); if (count($up)>1) { $where['up'] = array('between',$up[0].','.$up[1]); }else{ $where['up'] = array('gt',$up[0]); } } if ($tag['down']) { $down = explode(',',trim($tag['down'])); if (count($down)>1) { $where['down'] = array('between',$down[0].','.$down[1]); }else{ $where['down'] = array('gt',$down[0]); } } if ($tag['score']) { $score = explode(',',trim($tag['score'])); if (count($score)>1) { $where['score'] = array('between',$score[0].','.$score[1]); }else{ $where['score'] = array('gt',$score[0]); } } if ($tag['scoreer']) { $scoreer = explode(',',trim($tag['scoreer'])); if (count($scoreer)>1) { $where['scoreer'] = array('between',$scoreer[0].','.$scoreer[1]); }else{ $where['scoreer'] = array('gt',$scoreer[0]); } } $rs = M($table); $list = $rs->field($field)->where($where)->order($order)->limit($limit)->select(); if('special'==$table){ foreach($list as $key=>$val){ $list[$key]['readurl'] = get_read_url($table,$list[$key]['id'],$list[$key]['cid']); $list[$key]['logo'] = get_img_url($list[$key]['logo']); $list[$key]['banner'] = get_img_url_s($list[$key]['banner']); } }else{ foreach($list as $key=>$val){ $list[$key]['showname'] = get_channel_name($list[$key]['cid']); $list[$key]['showurl'] = get_show_url($table,array('id'=>$list[$key]['cid']),1); $list[$key]['readurl'] = get_read_url($table,$list[$key]['id'],$list[$key]['cid'],$list[$key]['jumpurl']); $list[$key]['playerurl'] = get_play_url($list[$key]['id'],$list[$key]['cid'],1); $list[$key]['picurlsmall'] = get_img_url_s($list[$key]['picurl'],$list[$key]['content']); $list[$key]['picurl'] = get_img_url($list[$key]['picurl'],$list[$key]['content']); } } return $list; } function get_tag_gxlist($tag){ $table = !empty($tag['name']) ? trim($tag['name']) : 'video'; $field = !empty($tag['field']) ? trim($tag['field']) : '*'; $limit = !empty($tag['limit']) ? trim($tag['limit']) : '10'; $order = !empty($tag['order']) ? trim($tag['order']).' desc' : 'addtime desc'; $page = C('bdlist_page'); if(C('bdlist_where')){ $where = C('bdlist_where'); }else{ if(C('bdlist_ids')){ $where['cid'] = C('bdlist_ids'); } $where['status'] = array('eq',1); } $rs = M($table); $list = $rs->field($field)->where($where)->limit($limit)->page($page)->order($order)->select(); if('special'==$table){ foreach($list as $key=>$val){ $list[$key]['readurl'] = get_read_url($table,$list[$key]['id'],$list[$key]['cid']); $list[$key]['logo'] = get_img_url($list[$key]['logo']); $list[$key]['banner'] = get_img_url_s($list[$key]['banner']); } }else{ foreach($list as $key=>$val){ $list[$key]['showname'] = get_channel_name($list[$key]['cid']); $list[$key]['showurl'] = get_show_url($table,array('id'=>$list[$key]['cid']),1); $list[$key]['readurl'] = get_read_url($table,$list[$key]['id'],$list[$key]['cid'],$list[$key]['jumpurl']); $list[$key]['playerurl'] = get_play_url($list[$key]['id'],$list[$key]['cid'],1); $list[$key]['picurl'] = get_img_url($list[$key]['picurl'],$list[$key]['content']); $list[$key]['picurl-s'] = get_img_url_s($list[$key]['picurl'],$list[$key]['content']); } } return $list; } function get_tag_gxsearch($tag){ $table = !empty($tag['name']) ? trim($tag['name']) : 'video'; $field = !empty($tag['field']) ? trim($tag['field']) : '*'; $limit = !empty($tag['limit']) ? trim($tag['limit']) : '10'; $order = !empty($tag['order']) ? trim($tag['order']).' desc' : 'addtime desc'; $page = C('bdsearch_page'); $where = C('bdsearch_where'); $rs = M($table); $list = $rs->field($field)->where($where)->limit($limit)->page($page)->order($order)->select(); if (empty($list)) { C($table.'empty',true); } foreach($list as $key=>$val){ $list[$key]['showname'] = get_channel_name($list[$key]['cid']); $list[$key]['showurl'] = get_show_url($table,array('id'=>$list[$key]['cid']),1); $list[$key]['readurl'] = get_read_url($table,$list[$key]['id'],$list[$key]['cid'],$list[$key]['jumpurl']); $list[$key]['playerurl'] = get_play_url($list[$key]['id'],$list[$key]['cid'],1); $list[$key]['picurl'] = get_img_url($list[$key]['picurl'],$list[$key]['content']); $list[$key]['picurl-s'] = get_img_url_s($list[$key]['picurl'],$list[$key]['content']); } return $list; } function get_tag_gxmenu($tag){ $listtree = F('_gxcms/channeltree'); if ($tag['ids']) { $list = F('_gxcms/channel'); $arrcid = explode(',',trim($tag['ids'])); foreach($arrcid as $key=>$value){ $cidvalue = list_search($listtree,'id='.$value); if (empty($cidvalue)) { $cidvalue = list_search($list,'id='.$value); } $newtree[$key] = $cidvalue[0]; } $listtree = $newtree; } return $listtree; } function get_tag_hits($mid,$type='hits',$array,$js=true){ if((C('url_html') && $js) || $type=='insert'){ return '<script type="text/javascript" src="'.C('web_path').'index.php?s=hits/show/id/'.$array['id'].'/type/'.$type.'/mid/'.$mid.'" charset="utf-8"></script>'; }else{ return $array[$type]; } } function get_url_where(){ $where['page'] = !empty($_GET['p']) ? intval($_GET['p']) : 1; $where['year'] = intval($_REQUEST['year']); $where['id'] = intval($_REQUEST['id']); $where['letter'] = htmlspecialchars($_REQUEST['letter']); $where['area'] = htmlspecialchars(urldecode(trim($_REQUEST['area']))); $where['wd'] = htmlspecialchars(urldecode(trim($_REQUEST['wd']))); $where['order'] = !empty($_GET['order']) ? get_replace_order($_GET['order']) : 'addtime'; return $where; } function get_letter($s0){ $firstchar_ord = ord(strtoupper($s0{0})); if (($firstchar_ord>=65 and $firstchar_ord<=91)or($firstchar_ord>=48 and $firstchar_ord<=57)) return $s0{0}; $s = iconv("UTF-8","gb2312", $s0); $asc = ord($s{0})*256+ord($s{1})-65536; if($asc>=-20319 and $asc<=-20284)return "A"; if($asc>=-20283 and $asc<=-19776)return "B"; if($asc>=-19775 and $asc<=-19219)return "C"; if($asc>=-19218 and $asc<=-18711)return "D"; if($asc>=-18710 and $asc<=-18527)return "E"; if($asc>=-18526 and $asc<=-18240)return "F"; if($asc>=-18239 and $asc<=-17923)return "G"; if($asc>=-17922 and $asc<=-17418)return "H"; if($asc>=-17417 and $asc<=-16475)return "J"; if($asc>=-16474 and $asc<=-16213)return "K"; if($asc>=-16212 and $asc<=-15641)return "L"; if($asc>=-15640 and $asc<=-15166)return "M"; if($asc>=-15165 and $asc<=-14923)return "N"; if($asc>=-14922 and $asc<=-14915)return "O"; if($asc>=-14914 and $asc<=-14631)return "P"; if($asc>=-14630 and $asc<=-14150)return "Q"; if($asc>=-14149 and $asc<=-14091)return "R"; if($asc>=-14090 and $asc<=-13319)return "S"; if($asc>=-13318 and $asc<=-12839)return "T"; if($asc>=-12838 and $asc<=-12557)return "W"; if($asc>=-12556 and $asc<=-11848)return "X"; if($asc>=-11847 and $asc<=-11056)return "Y"; if($asc>=-11055 and $asc<=-10247)return "Z"; return 0; } function get_collect_file($url){ for($i=0;$i<3;$i++){ $content = @file_get_contents($url); if($content) break; } if($content){ return $content; } if(function_exists('curl_init')){ $ch = curl_init(); curl_setopt ($ch, CURLOPT_URL, $url); curl_setopt ($ch, CURLOPT_HEADER, 0); curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); $content = curl_exec($ch); curl_close($ch); if($content){ return $content; } } return false; } function get_collect_krsort($listurl){ krsort($listurl); foreach($listurl as $val){ $list[]=$val; } return $list; } function get_collect_match($rule,$html){ $arr = explode('$$$',$rule); if(count($arr)==2){ preg_match('/'.$arr[1].'/', $html, $data); return $data[$arr[0]].''; }else{ preg_match('/'.$rule.'/', $html, $data); return $data[1].''; } } function get_collect_matchall($rule,$html){ $arr = explode('$$$',$rule); if(count($arr)==2){ preg_match_all('/'.$arr[1].'/', $html, $data); return $data[$arr[0]]; }else{ preg_match_all('/'.$rule.'/', $html, $data); return $data[1]; } } function getrole($str){ $arr1 = array('?','"','(',')','[',']','.','/',':','*','||',); $arr2 = array('\?','\"','\(','\)','\[','\]','\.','\/','\:','.*?','(.*?)',); return str_replace('\[$gxcms\]','([\s\S]*?)',str_replace($arr1,$arr2,$str)); } function getreplace($arr){ foreach($arr as $val){ $array[]=trim(stripslashes($val)); } return implode('|||',$array); } function getdomain($url){ preg_match("|http://(.*)\/|isU", $url, $arr_domain); return $arr_domain[1]; } function getbindval($key){ $bindcache = F('_collect/channel'); return $bindcache[$key]; } function get_collect_bind($pid){ $tree = list_search(F('_gxcms/channeltree'),'id='.$pid); if(!empty($tree[0]['son'])){ return false; }else{ return true; } } return array ( 'app_debug' => false, 'app_domain_deploy' => false, 'app_plugin_on' => false, 'app_file_case' => false, 'app_group_depr' => '.', 'app_group_list' => 'Admin,Home,Plus', 'app_autoload_reg' => false, 'app_autoload_path' => 'Think.Util.', 'app_config_list' => array ( 0 => 'taglibs', 1 => 'routes', 2 => 'tags', 3 => 'htmls', 4 => 'modules', 5 => 'actions', ), 'cookie_expire' => 3600, 'cookie_domain' => '', 'cookie_path' => '/', 'cookie_prefix' => '', 'default_app' => '@', 'default_group' => 'Home', 'default_module' => 'Index', 'default_action' => 'index', 'default_charset' => 'utf-8', 'default_timezone' => 'PRC', 'default_ajax_return' => 'JSON', 'default_theme' => 'default', 'default_lang' => 'zh-cn', 'db_type' => 'mysql', 'db_host' => 'localhost', 'db_name' => 'gxcms', 'db_user' => 'root', 'db_pwd' => 'wanglq1299', 'db_port' => '3306', 'db_prefix' => 'gx_', 'db_suffix' => '', 'db_fieldtype_check' => true, 'db_fields_cache' => true, 'db_charset' => 'utf8', 'db_deploy_type' => 0, 'db_rw_separate' => false, 'data_cache_time' => -1, 'data_cache_compress' => false, 'data_cache_check' => false, 'data_cache_type' => 'File', 'data_cache_path' => './temp/Temp/', 'data_cache_subdir' => true, 'data_path_level' => 2, 'error_message' => '您浏览的页面暂时发生了错误！请稍后再试～', 'error_page' => '', 'html_cache_on' => false, 'html_cache_time' => 0, 'html_read_type' => 0, 'html_file_suffix' => '.html', 'lang_switch_on' => false, 'lang_auto_detect' => true, 'log_record' => false, 'log_file_size' => 2097152, 'log_record_level' => array ( 0 => 'EMERG', 1 => 'ALERT', 2 => 'CRIT', 3 => 'ERR', ), 'page_rollpage' => 5, 'page_listrows' => 20, 'session_auto_start' => true, 'show_run_time' => false, 'show_adv_time' => false, 'show_db_times' => false, 'show_cache_times' => false, 'show_use_mem' => false, 'show_page_trace' => false, 'show_error_msg' => true, 'tmpl_engine_type' => 'Think', 'tmpl_detect_theme' => false, 'tmpl_template_suffix' => '.html', 'tmpl_cachfile_suffix' => '.php', 'tmpl_deny_func_list' => 'echo,exit', 'tmpl_parse_string' => '', 'tmpl_l_delim' => '{', 'tmpl_r_delim' => '}', 'tmpl_var_identify' => 'array', 'tmpl_strip_space' => false, 'tmpl_cache_on' => false, 'tmpl_cache_time' => -1, 'tmpl_action_error' => './views/tips/tips.html', 'tmpl_action_success' => './views/tips/tips.html', 'tmpl_trace_file' => './core/ThinkPHP/Tpl/PageTrace.tpl.php', 'tmpl_exception_file' => './core/ThinkPHP/Tpl/ThinkException.tpl.php', 'tmpl_file_depr' => '_', 'taglib_begin' => '<', 'taglib_end' => '>', 'taglib_load' => true, 'taglib_build_in' => 'cx', 'taglib_pre_load' => '', 'tag_nested_level' => 3, 'tag_extend_parse' => '', 'token_on' => true, 'token_name' => '__hash__', 'token_type' => 'md5', 'url_case_insensitive' => true, 'url_router_on' => false, 'url_dispatch_on' => true, 'url_model' => 3, 'url_pathinfo_model' => 2, 'url_pathinfo_depr' => '/', 'url_html_suffix' => '.html', 'var_group' => 'g', 'var_module' => 'm', 'var_action' => 'a', 'var_router' => 'r', 'var_page' => 'p', 'var_template' => 't', 'var_language' => 'l', 'var_ajax_submit' => 'ajax', 'var_pathinfo' => 's', 'web_name' => '小八戒电影', 'web_url' => 'http://localhost/', 'web_path' => '/', 'web_hotkey' => '西虹市首富|我的间谍前男友|乔纳森|海贼王', 'web_keywords' => 'GXCMS,光线CMS,光线影视内容管理系统', 'web_description' => '欢迎使用光线影视内容管理系统,通过该程序可以在短时间内建立一个强大的视频站点。', 'web_email' => 'richiewen8@gmail.com', 'web_qq' => '877632840', 'web_copyright' => '本网站提供的最新电视剧和电影资源均系收集于各大视频网站，本网站只提供web页面服务，并不提供影片资源存储，也不参与录制、上传。', 'web_tongji' => '<script language="javascript" type="text/javascript" src="http://localhost:7888/tongji.js"></script>', 'web_icp' => '粤ICP备10038673号', 'web_adsensepath' => 'temp/Banner', 'web_admin_pagenum' => 20, 'web_home_pagenum' => '5', 'web_admin_hits' => 500, 'web_hits_way' => '0', 'web_hits_time' => 5, 'web_admin_updown' => 100, 'web_admin_score' => 9, 'web_collect_num' => 3, 'web_admin_edittime' => true, 'web_admin_ordertype' => 'addtime', 'web_admin_language' => '国语,粤语,英语,韩语,日语,法语,中文字幕,英文字幕', 'web_admin_area' => '中国,内地,香港,台湾,韩国,日本,美国,英国,法国,意大利,德国,西班牙,泰国', 'web_admin_nav' => array ( '网站信息配置' => '?s=Admin/Config/Conf/id/web', '视频数据管理' => '?s=Admin/Video/Show', '影片采集中心' => '?s=Admin/Collect/Show', '网站栏目管理' => '?s=Admin/Channel/Show', '网站广告管理' => '?s=Admin/Adsense/Show', '快捷菜单设置' => '?s=Admin/Config/Conf/id/nav', ), 'upload_path' => 'uploads', 'upload_style' => 'Y-m-d', 'upload_thumb' => '0', 'upload_thumb_w' => 120, 'upload_thumb_h' => 168, 'upload_water' => '0', 'upload_water_img' => 'views/images/water.gif', 'upload_water_pct' => 80, 'upload_water_pos' => 9, 'upload_http_down' => 10, 'upload_http' => '0', 'upload_ftp' => '0', 'upload_ftp_host' => '255.255.255.255', 'upload_ftp_user' => 'username', 'upload_ftp_pass' => 'userpwd', 'upload_ftp_port' => 21, 'upload_ftp_dir' => '/', 'upload_ftp_url' => '', 'html_cache_index' => 1, 'html_cache_list' => 24, 'html_cache_content' => 24, 'html_cache_play' => 24, 'html_cache_mytpl' => '1', 'url_rewrite' => '1', 'url_html' => '0', 'url_html_rule' => '2', 'url_html_channel' => '0', 'url_html_play' => '0', 'url_create_time' => 2, 'url_create_num' => 30, 'url_dir_video' => 'vodlist', 'url_dir_videoread' => 'detail', 'url_dir_videoplay' => 'play', 'url_dir_info' => 'infolist', 'url_dir_inforead' => 'detail-n', 'url_dir_special' => 'special', 'url_dir_maps' => 'maps', 'url_dir_all' => '', 'user_register' => '1', 'user_comment' => '1', 'user_check' => '0', 'user_pay' => '0', 'user_post' => '0', 'user_paycid' => array ( 0 => '8', 1 => '9', 2 => '10', 3 => '11', 4 => '12', 5 => '13', 6 => '14', 7 => '15', 8 => '16', 9 => '17', 10 => '18', 11 => '19', 12 => '20', 13 => '21', 14 => '3', 15 => '5', 16 => '6', ), 'user_money_play' => 1, 'user_money_change' => 100, 'user_money_add' => 20, 'user_check_time' => 60, 'user_page_cm' => 8, 'user_page_gb' => 10, 'user_replace' => '脏话|法轮功|枪械|A片|三级|伦理', '_htmls_' => array ( 'home:index:index' => array ( 0 => '{:action}', 1 => 3600, ), 'home:video:lists' => array ( 0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}', 1 => 86400, ), 'home:info:lists' => array ( 0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}', 1 => 86400, ), 'home:video:detail' => array ( 0 => '{:module}_{:action}/{id|md5}', 1 => 86400, ), 'home:info:detail' => array ( 0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}', 1 => 86400, ), 'home:video:play' => array ( 0 => '{:module}_{:action}/{id|md5}', 1 => 86400, ), 'home:my:show' => array ( 0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}', 1 => 3600, ), ), 'player_width' => 610, 'player_height' => 458, 'player_down' => 'http://file.jiji-yingyin.com/yingyin9/jjplayer_install.html', 'player_buffer' => 'http://www.jiji-yingyin.com/waiting.html', 'player_pause' => 'http://www.jiji-yingyin.com/waiting.html', 'player_time' => '8', 'user_auth_key' => 'gxcms', 'not_auth_action' => 'index,show,add,top,left,main', 'require_auth_module' => 'Config,Cache,Master,Channel,Video,Info,Special,Collect,User,Userview,Comment,Gbook,Tpl,Adsense,Link,Upload,Html,Data,Slide', 'cms_admin' => 'index.php', 'cms_name' => '光线影视内容管理系统', 'cms_var' => '1.7', 'cms_url' => 'http://www.gxcms.org/', 'cms_urlvar' => 'http://www.gxcms.org/version.js', 'cms_exts' => 'jpg,jpeg,gif,png', 'cms_col_content' => '[内容]', 'player_list' => array ( 0 => array ( 0 => '<span class=\'tdbf\'></span>高清播放<span class=\'tip\'>(无需下载播放器直接播放)</span>', 1 => 'tudou.com', 2 => 'swf', ), 1 => array ( 0 => '<span class=\'tdbf\'></span>高清播放<span class=\'tip\'>(无需下载播放器直接播放)</span>', 1 => 'tv189.cn', 2 => 'swf', ), 2 => array ( 0 => '<span class=\'tdbf\'></span>qiyi高清播放<span class=\'tip\'>(无需下载播放器直接播放)</span>', 1 => 'qiyi.com', 2 => 'swf', ), 3 => array ( 0 => '<span class=\'tdbf\'></span>高清播放<span class=\'tip\'>(无需下载播放器直接播放)</span>', 1 => '56.com', 2 => 'swf', ), 4 => array ( 0 => '<span class=\'tdbf\'></span>高清播放<span class=\'tip\'>(无需下载播放器直接播放)</span>', 1 => 'youku.com', 2 => 'swf', ), 5 => array ( 0 => '<span class=\'tdbf\'></span>TV189高清播放<span class=\'tip\'>(无需下载播放器直接播放)</span>', 1 => 'tv189.com', 2 => 'tv189', ), 6 => array ( 0 => '<span class=\'tdbf\'></span>高清播放<span class=\'tip\'>(无需下载播放器直接播放)</span>', 1 => 'letv.com', 2 => 'swf', ), 7 => array ( 0 => '<span class=\'bdbf\'></span>百度影音播放', 1 => 'bdhd://', 2 => 'player', ), 8 => array ( 0 => '<span class=\'kbbf\'></span>快播播放', 1 => 'qvod://', 2 => 'qvod', ), 9 => array ( 0 => '<span class=\'tdbf\'></span>高清播放<span class=\'tip\'>(无需下载播放器直接播放)</span>', 1 => 'qq.com', 2 => 'swf', ), ), ); ?>