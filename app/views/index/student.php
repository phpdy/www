<div id="channel_nav"><a href="/">首页</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;<a href="#">学员中心</a></div>

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
  </div>

  <div class="channel_right">
	<?php  echo $info[0]['content'] ;?>
  </div>
  <!--left end-->

</div>

<!--main end-->