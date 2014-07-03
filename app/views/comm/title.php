<!DOCTYPE html>
<!-- saved from url=(0029)http://www.nyipcn.com -->
<html class=" ext-strict"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">

<title>全科课程</title>
<meta name="description" content="纽摄教育在线学院隶属于北京纽摄教育科技有限公司，是中国摄影网络教育领导者。 北京纽摄教育科技有限公司旗下的“纽约摄影学院中国学员班”成立于2005年，目的在于共同向更多中国摄影师推广纽约摄影学院著名的远程互动式摄影课程。纽约摄影学院名誉院长唐·谢夫作为纽约摄影学院专业摄影课程的主要作者，亲自负责监督这套专业摄影课程的汉化和发布。">
<meta name="keywords" content="北京纽摄教育科技有限公司,网校,远程教育,网络教育,其他,摄影">

<link type="text/css" href="./include/css/style.css" rel="stylesheet">
<link type="text/css" href="./include/css/video.css" rel="stylesheet">

<!--[if lt IE 9]> <script src="http://stat.ablesky.cn/statb/js_optimize/lib/shiv/html5.js"></script> <![endif]-->
<link type="image/x-icon" href="http://www.nyipcn.com/wp-content/themes/nyip/images/favicon.ico" rel="shortcut icon"></head>

<body>
<div class="baseLogo">
  <div style="width:960px;height:130px;background:url(http://www2.nyipcn.com/images/logo_top.gif) no-repeat;">
  </div>
</div>

<!--nav begin-->
<?php
  //$sql = "select catid,catname from v9_category order by listorder";
  $nav[0] = array("首页","?",0);
  $nav[1] = array("课程信息","?control=lesson",10);
  $nav[2] = array("摄影天地","?control=photo",20);
  $nav[3] = array("学员中心","?control=student",15);
  $nav[4] = array("关于我们","?control=ours",17);
  $nav[5] = array("联系我们","?control=info",17);
  $nav[6] = array("常见问题","?control=faq",17);
  //$nav[5] = array("学员中心","clist.php?cid=100",0);
  //print_r ($nav);
?>
<div id="navDiv">
<?php
$arr = $nav;
$i = 1;
foreach ($arr as $value) {
?>
<div class="nav_list">
  <div class="nav_sheet" onmouseover="this.className='nav_sheet2'" onmouseout="this.className='nav_sheet'">
    <a onfocus="this.blur()" class="tab_link" href="<?=$value[1];?>"><?=$value[0];?></a>
  </div>
  <?php
  if ($i<7) {
  ?>
  <div style="padding:0;float:left;color:#fff;padding-top:8px;">|</div>
  <? } ?>
</div>
<?php
  $i++;
}
?>
<div class="slogin">[ <a href="http://club2.nyipcn.com/login.php">登录</a> | <a href="http://club2.nyipcn.com/reg.php">注册</a> ]</div>
  <div id="nav_search"><input type="text" class="s_text"><input type="submit" id="su" value="" class="s_btn"></div>
</div>
<!--nav end-->

<script src="./js/jquery-1.4.2.min.js"></script>
