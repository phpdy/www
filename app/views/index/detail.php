<div id="channel_nav">
	<a href="?">首页</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
	<a href="#"><?php echo $cat['catname'];?></a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
</div>

<div id="channel_main">

  <!--left begin-->
  <div class="dt_left">
    <div id="dt_main">
      <div class="dt_title"><?php echo $info['title'] ;?></div>
      <div class="dt_date">
        <div class="dateleft">
        <p><span class="time"><?php echo date("Y-m-d H:m:i",$info['inputtime']) ;?></span> &nbsp;栏目：<?php echo $cat['catname'];?>&nbsp;</p> 
        </div>
        <div style="clear:both"></div>
      </div>

      <div class="dt_content"><br>
		<?php echo $info['content'] ; ?>
        </div>
    </div>
  </div>
  <!--left end-->

  <!--right begin-->
  <div class="dt_right">

  </div>
  <!--right end-->

</div>