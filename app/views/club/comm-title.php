<!DOCTYPE html>
<!-- saved from url=(0029)http://www.nyipcn.com -->
<html class=" ext-strict">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<meta name="description" content="">
<meta name="keywords" content="">
<title>纽摄俱乐部</title>
<link type="text/css" href="./css/common.css" rel="stylesheet">
</head>
<body>

<div id="header">

<div id="navbox">
	<div>
<!--	<img style="display:block;border-bottom:1px #CDCDCD solid" src="./images/top.jpg" class="" width="960" height="80">-->
	<img src="./images/top.jpg" class="" width="960" height="75">
	<div class="top_link"><a href="http://www.nyipcn.com/" target="_blank">纽约摄影学院全科专业摄影课程</a> | <a href="http://v.nyipcn.com/" target="_blank">纽摄教育在线学院</a></div>
	</div>
	<span class="topbar">
  <?php 
  @session_start ();
  $userinfo = @$_SESSION [FinalClass::$_session_user] ;
  if(empty($userinfo)){
  	echo '<a href="user.php?action=login">登录</a>|<a href="user.php?action=reg">注册</a>' ;
  } else {
  	$username = $userinfo['username'] ;
  	if(empty($username)){
  		$username = $userinfo['name'] ;
  	}
  	echo "<a href=\"user.php\">$username</a>|<a href=\"user.php?action=loginout\">退出</a>" ;
  }
  ?>
	</span>
	<ul class="mainnav">
		<?php 
		include 'final.php' ;
		if(is_array($title)){
			foreach ($title as $key=>$value){
				if ($t==$key){
					echo "<li id=\"mainnav_select\"><a href=\"$value[url]\">$value[title]</a></li>" ;
				} else {
					echo "<li id=\"mainnav_a\"><a href=\"$value[url]\">$value[title]</a></li>" ;
				}
			}
		}
		?>
	</ul>
</div>
</div>
<script src="./js/jquery-1.9.1.min.js"></script>