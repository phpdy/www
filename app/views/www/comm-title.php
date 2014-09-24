<!DOCTYPE html>
<!-- saved from url=(0029)http://www.nyipcn.com -->
<html class=" ext-strict"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">

<title>纽约摄影学院全科专业摄影课程——全球最受欢迎的摄影培训课程</title>
<meta name="description" content="纽约摄影学院中国学员班成立于2005年，目的在于向更多中国专业摄影师及爱好者推广纽约摄影学院著名的远程互动式全科专业摄影课程。纽约摄影学院全科专业摄影课程的主要作者、纽约摄影学院名誉院长、Home Study School现任院长唐·谢夫先生，经由纽约摄影学院授权，亲自负责监督并独家授权北京纽摄教育科技有限公司在中国汉化并教授这套专业摄影课程。">
<meta name="keywords" content="北京纽摄教育科技有限公司,远程教育,网络教育,其他,摄影">

<link type="text/css" href="./include/css/style.css" rel="stylesheet">
<link type="text/css" href="./include/css/video.css" rel="stylesheet">

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?c0f9a1897e0b5c971c4f213b761a5043";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--[if lt IE 9]> <script src="http://stat.ablesky.cn/statb/js_optimize/lib/shiv/html5.js"></script> <![endif]-->
<link type="image/x-icon" href="./favicon.ico" rel="shortcut icon"></head>

<body>
<div class="baseLogo">
  <div style="width:960px;height:130px;background:url(./images/logo_top.gif) no-repeat;">
  </div>
</div>

<!--nav begin-->
<?php
  //$sql = "select catid,catname from v9_category order by listorder";
  $nav[0] = array("首页","index.php",0);
  $nav[1] = array("课程信息","index.php?control=lesson",10);
  $nav[2] = array("摄影天地","index.php?control=photo",20);
  $nav[3] = array("学员中心","index.php?control=student",15);
  $nav[4] = array("俱乐部","http://club.nyipcn.com",17);
  $nav[5] = array("关于我们","index.php?control=ours",17);
  //$nav[5] = array("联系我们","index.php?control=info",17);
  $nav[6] = array("常见问题","index.php?control=faq",17);
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

//登陆注册
@session_start ();
$user = @$_SESSION [FinalClass::$_session_user] ;
if(!empty($user)){
	echo '<div class="slogin">[ <a href="user.php">'.$user['username'].'</a> | <a href="user.php?action=loginout">退出</a> | <a href="http://club.nyipcn.com/user.php?action=pwd">改密码</a> ]</div>' ;
} else {
	echo '<div class="slogin">[ <a href="http://club.nyipcn.com/user.php?action=login">学员登录</a> | <a href="user.php?action=reg">注册</a> ]</div>' ;
}
?>

  <div id="nav_search">
  <form action="http://www.baidu.com/baidu" target="_blank">
  <input type="text" name="word" class="s_text">
  <input type="submit" id="su" value="" class="s_btn">
  <input name=tn type=hidden value="bds">
  <input name=cl type=hidden value="3">
  <input name=ct type=hidden value="2097152">
  <input name=si type=hidden value="www.nyipcn.com">
  </form>
  </div>
</div>
<!--nav end-->

<script src="./js/jquery-1.4.2.min.js"></script>
