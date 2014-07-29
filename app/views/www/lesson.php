<div id="channel_nav">
	<a href="?">首页</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
	<a href="?control=lesson">课程信息</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
	<?php  echo $cat['catname'] ; ?>
</div>

<!--main begin-->
<div id="channel_main">
  <!--left begin-->
  <div class="channel_left">
  <ul class="menu">
  <?php 
  	foreach ($list as $value){
  		echo "<li><a href='?control=lesson&id=$value[catid]'>$value[catname]</a></li>" ;
  	}
  ?>
  </ul>
  <div>&nbsp;</div>
  <div><a href='?control=order&catid=75'><img src="images/lkbm.jpg" border="0" width="105" height="35" align=order></a></div>
  </div>

  <!--left end-->
  
  <!--right begin-->
  <div class="channel_right">
    <div id="content_main">
      <div class="qk_title"><?php  echo $cat['catname'] ;?></div>
        <!-- 
      <div class="date">
        <div class="dateleft">
        <p><span class="time"><?php echo date("Y-m-d H:m:i",$info['inputtime']) ;?></span> &nbsp;栏目：课程信息&nbsp;</p> 
        </div>
        <div style="clear:both"></div>
      </div>
        -->
      <div class="qk_content">
      <br>
      <?php  echo $info['content'] ;?>
      </div>
    </div>
  </div>
  <!--right end-->

</div>

<!--main end-->