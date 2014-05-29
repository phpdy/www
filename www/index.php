<?php
  //include "./include/db.php";
  include "./include/config.php";
?>

<!DOCTYPE html>
<!-- saved from url=(0029)http://www.nyipcn.com -->
<html class=" ext-strict"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">

<meta name="description" content="纽摄教育在线学院隶属于北京纽摄教育科技有限公司，是中国摄影网络教育领导者。 北京纽摄教育科技有限公司旗下的“纽约摄影学院中国学员班”成立于2005年，目的在于共同向更多中国摄影师推广纽约摄影学院著名的远程互动式摄影课程。纽约摄影学院名誉院长唐·谢夫作为纽约摄影学院专业摄影课程的主要作者，亲自负责监督这套专业摄影课程的汉化和发布。">
<meta name="keywords" content="北京纽摄教育科技有限公司,网校,远程教育,网络教育,其他,摄影">
<title><?=$title_desc;?></title>

<link type="text/css" href="./include/css/style.css" rel="stylesheet">
<link type="text/css" href="./include/css/video.css" rel="stylesheet">

<!--[if lt IE 9]> <script src="http://stat.ablesky.cn/statb/js_optimize/lib/shiv/html5.js"></script> <![endif]-->
<link type="image/x-icon" href="http://www.nyipcn.com/wp-content/themes/nyip/images/favicon.ico" rel="shortcut icon"></head>

<body>
<?php
  include "./include/header.php";
?>

<script src="./files/jquery-1.4.2.min.js"></script>

<!--flash begin-->
<div id="flashBg" style="background-color: rgb(25, 73, 130);">
    <div id="flashLine">
        <div id="flash">
            <a href="http://www.nyipcn.com" id="flash1" name="#0b0b0b" style="display: none;"><img src="./files/adshow1.gif" width="960" height="350"></a>
            <a href="http://www.nyipcn.com" id="flash2" name="#194982" style="display: block;"><img src="./files/adshow2.gif" width="960" height="350"></a>
            <a href="http://www.nyipcn.com" id="flash3" name="#04304b" style="display: none;"><img src="./files/adshow3.gif" width="960" height="350"></a>
            <a href="http://www.nyipcn.com" id="flash4" name="#194982" style="display: none;"><img src="./files/adshow4.gif" width="960" height="350"></a>
            <div class="flash_bar">
                <div class="no" id="f1" onclick="changeflash(1)"></div>
                <div class="dq" id="f2" onclick="changeflash(2)"></div>
                <div class="no" id="f3" onclick="changeflash(3)"></div>
                <div class="no" id="f4" onclick="changeflash(4)"></div>
            </div>
        </div>
    </div>
</div>
<script>
var currentindex=1;
$("#flashBg").css("background-color",$("#flash1").attr("name"));
function changeflash(i) {	
currentindex=i;
for (j=1;j<=4;j++){
	if (j==i) 
	{$("#flash"+j).fadeIn("normal");
	$("#flash"+j).css("display","block");
	$("#f"+j).removeClass();
	$("#f"+j).addClass("dq");
	$("#flashBg").css("background-color",$("#flash"+j).attr("name"));
	}
	else
	{$("#flash"+j).css("display","none");
	$("#f"+j).removeClass();
	$("#f"+j).addClass("no");}
}}
function startAm(){
timerID = setInterval("timer_tick()",5000);
}
function stopAm(){
clearInterval(timerID);
}
function timer_tick() {
    currentindex=currentindex>=4?1:currentindex+1;
	changeflash(currentindex);}
$(document).ready(function(){
$(".flash_bar div").mouseover(function(){stopAm();}).mouseout(function(){startAm();});
startAm();
});
</script>
<!--flash end-->

<!--main begin-->
<div id="index_main">
  <!--channel begin-->
  <div class="index_channel">
    <div class="channel_show">
      <div class="channel_topic">课程内容</div>
      <div class="channel_img"><img src="http://www2.nyipcn.com/files/kcnr.gif" width="304" height="200" border=0></div>
      <div class="channel_desc">
        <div>全科专业摄影课程涵盖了你所需要知道的关于艺术、技法和经营的方方面面。</div>
        <div class="channel_desc_c"><a href="#">点击此处，了解更多详情>></a></div>
      </div>
    </div>
    <div style="width:24px;float:left">&nbsp;</div>
    <div class="channel_show">
      <div class="channel_topic">学习方式</div>
      <div class="channel_img"><img src="http://www2.nyipcn.com/files/xxfs.gif" width="304" height="200" border=0></div>
      <div class="channel_desc"></div>
    </div>
    <div style="width:24px;float:left">&nbsp;</div>
    <div class="channel_show">
      <div class="channel_topic">教学资料</div>
      <div class="channel_img"><img src="http://www2.nyipcn.com/files/jxzl.gif" width="304" height="200" border=0></div>
      <div class="channel_desc"></div>
    </div>
  </div>

  <div class="index_channel">
    <div class="channel_show">
      <div class="channel_topic">考核方式</div>
      <div class="channel_img"><img src="http://www2.nyipcn.com/files/khfs.gif" width="304" height="200" border=0></div>
      <div class="channel_desc"></div>
    </div>
    <div style="width:24px;float:left">&nbsp;</div>
    <div class="channel_show">
      <div class="channel_topic">教学团队</div>
      <div class="channel_img"><img src="http://www2.nyipcn.com/files/jxtd.gif" width="304" height="200" border=0></div>
      <div class="channel_desc"></div>
    </div>
    <div style="width:24px;float:left">&nbsp;</div>
    <div class="channel_show">
      <div class="channel_topic_h">不用犹豫，现在就报名！</div>
      <div class="channel_img"><img src="http://www2.nyipcn.com/files/baoming.gif" width="304" height="200" border=0></div>
      <div class="channel_desc"></div>
    </div>
  </div>
  <!--channel end-->

  <!--commend begin-->
  <div id="main_commend">
    <div class="commend_nav">
      <div class="commend_nav_1"></div>
      <div class="commend_nav_2">
      <div class="commend_con"><div id="line1"></div><div class="commend_con_1"><iframe scrolling="no" frameborder="0" width="102" height="24" allowtransparency="true" src="https://id.b.qq.com/static/account/bizqq/wpa/wpa_a01.html?type=1&kfuin=800002915&ws=http%3A%2F%2Fwww.nyipcn.com&btn1=%E5%9C%A8%E7%BA%BF%E8%AF%BE%E7%A8%8B%E5%92%A8%E8%AF%A2"></iframe></div><div id="line1"></div><div class="commend_con_2"></div></div>
      </div>
    </div>
    <div class="commend_area">
      <div class="commend_show">
        <div class="commend_img"><img src="files/online.gif" width="227" height="90" border=0></div>
        <div class="commend_desc">
          <div class="commend_desc_t">纽摄在线学院视频课程</div>
          <div>我们提供的每一节课都是专业摄影师的拍摄心得，能够为任何类型的学员提供专业的帮助。</div>
          <div class="commend_desc_c"><a href="#">点击此处，进入在线学院>></a></div>
        </div>
      </div>
      <div style="width:17px;float:left">&nbsp;</div>
      <div class="commend_show">
        <div class="commend_img"><img src="files/club.gif" width="227" height="90" border=0></div>
        <div class="commend_desc" align=center></div>
      </div>
      <div style="width:17px;float:left">&nbsp;</div>
      <div class="commend_show">
        <div class="commend_img"><img src="files/addus.gif" width="227" height="90" border=0></div>
        <div class="commend_desc" align=center></div>
      </div>
      <div style="width:17px;float:left">&nbsp;</div>
      <div class="commend_show">
        <div class="commend_img"><img src="files/store.gif" width="227" height="90" border=0></div>
        <div class="commend_desc" align=center></div>
      </div>
    </div>
  </div>
  <!--commend end-->
</div>

<!--main end-->
<div style="clear:both;"></div>

<?php
  include "./include/footer.php";
?>


</body></html>