
<!--flash begin-->
<div id="flashBg" style="background-color: rgb(25, 73, 130);">
    <div id="flashLine">
        <div id="flash">
        <?php 
        foreach ($piclist as $key => $value){
        	echo '<a href="'.$value['url'].'" id="flash'.($key+1).'" name="#0b0b0b" style="display: none;"><img src="'.$value['imgurl'].'" width="960" height="350"></a>' ;
        }
        ?>
            <div class="flash_bar">
                <div class="no" id="f1" onclick="changeflash(1)"></div>
                <div class="dq" id="f2" onclick="changeflash(2)"></div>
                <div class="no" id="f3" onclick="changeflash(3)"></div>
                <div class="no" id="f4" onclick="changeflash(4)"></div>
            </div>
        </div>
    </div>
</div>
<!--flash end-->

<!--main begin-->
<div id="index_main">
  <!--channel begin-->
  <div class="index_channel">
  <?php 
  //print_r($list);
  foreach ($list as $key=>$item){
  	if($item['catdir']=='lesson_0'){
	  	echo "<div class=\"channel_show\">
	      <div class=\"channel_topic_h\">$item[catname]</div>
	      <div class=\"channel_img\"><a href=\"#$item[catid]\"><img src=\"$item[image]\" width=304 height=200 border=0></a></div>
	      <div class=\"channel_desc\">
	      	<div>$item[description]</div>
	        <div class=\"channel_desc_c\"><a href=\"#$item[catid]\">点击此处，了解更多详情>></a></div>
	      </div>
	    </div>" ;
  	} else {
	  	echo "<div class=\"channel_show\">
	      <div class=\"channel_topic\">$item[catname]</div>
	      <div class=\"channel_img\"><a href=\"?control=lesson&id=$item[catid]\"><img src=\"$item[image]\" width=304 height=200 border=0></a></div>
	      <div class=\"channel_desc\">
	      	<div>$item[description]</div>
	        <div class=\"channel_desc_c\"><a href=\"?control=lesson&id=$item[catid]\">点击此处，了解更多详情>></a></div>
	      </div>
	    </div>" ;
  	}
  	if(($key+1)%3==0 ){
  		if($key<sizeof($list)-1){
	  		echo "</div>
	  		<div class=\"index_channel\">" ;
  		}
  	} else {
  		echo "<div style=\"width:24px;float:left\">&nbsp;</div>" ;
  	}
  }
  ?>
  </div>
  <!--channel end-->

  <!--commend begin-->
  <div id="main_commend">
    <div class="commend_nav">
      <div class="commend_nav_1"></div>
      <div class="commend_nav_2">
      <div class="commend_con">
      	<div id="line1"></div>
      	<div class="commend_con_1"><iframe scrolling="no" frameborder="0" width="102" height="24" allowtransparency="true" src="https://id.b.qq.com/static/account/bizqq/wpa/wpa_a01.html?type=1&kfuin=800002915&ws=http%3A%2F%2Fwww.nyipcn.com&btn1=%E5%9C%A8%E7%BA%BF%E8%AF%BE%E7%A8%8B%E5%92%A8%E8%AF%A2"></iframe></div>
      	<div id="line1"></div>
      	<div class="commend_con_2"></div>
      </div>
      </div>
    </div>
    <div class="commend_area">
      <div class="commend_show">
        <div class="commend_img"><a href="http://www.newshootedu.com"><img src="files/online.gif" width="227" height="90" border=0></a></div>
        <div class="commend_desc">
          <div class="commend_desc_t">纽摄在线学院视频课程</div>
          <div>我们提供的每一节课都是专业摄影师的拍摄心得，能够为任何类型的学员提供专业的帮助。</div>
          <div class="commend_desc_c"><a href="http://www.newshootedu.com">点击此处，进入在线学院>></a></div>
        </div>
      </div>
      <div style="width:17px;float:left">&nbsp;</div>
      <div class="commend_show">
        <div class="commend_img"><a href="http://club2.nyipcn.com"><img src="files/club.gif" width="227" height="90" border=0></a></div>
        <div class="commend_desc">
          <div class="commend_desc_t">纽摄学员俱乐部</div>
          <div>我们提供的每一节课都是专业摄影师的拍摄心得，能够为任何类型的学员提供专业的帮助。</div>
          <div class="commend_desc_c"><a href="http://club2.nyipcn.com">点击此处，进入俱乐部>></a></div>
        </div>
      </div>
      <div style="width:17px;float:left">&nbsp;</div>
      <div class="commend_show">
        <div class="commend_img"><a href="?control=detail&tid=59&id=307"><img src="files/addus.gif" width="227" height="90" border=0></a></div>
        <div class="commend_desc">
          <div class="commend_desc_t">美国摄影学会</div>
          <div>我们提供的每一节课都是专业摄影师的拍摄心得，能够为任何类型的学员提供专业的帮助。</div>
          <div class="commend_desc_c"><a href="?control=detail&tid=59&id=307">点击此处，进入>></a></div>
        </div>
      </div>
      <div style="width:17px;float:left">&nbsp;</div>
      <div class="commend_show">
        <div class="commend_img"><a href="http://nyipcn.taobao.com"><img src="files/store.gif" width="227" height="90" border=0></a></div>
        <div class="commend_desc" align=center>
          <div class="commend_desc_t">纽摄校园商店</div>
          <div>我们提供的每一节课都是专业摄影师的拍摄心得，能够为任何类型的学员提供专业的帮助。</div>
          <div class="commend_desc_c"><a href="http://nyipcn.taobao.com">点击此处，进入校园商店>></a></div>
         </div>
      </div>
    </div>
  </div>
  <!--commend end-->
</div>
<!--main end-->

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
changeflash(1);
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