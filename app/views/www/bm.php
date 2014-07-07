<div id="channel_nav">
	<a href="?">首页</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
	马上报名
</div>

<div id="channel_main">

  <!--left begin-->
  <div class="dt_left">
    <div id="dt_main">
      <div class="dt_title"><?php echo $info['title'] ;?></div>
        <!-- 
      <div class="dt_date">
        <div class="dateleft">
        <p><span class="time"><?php echo date("Y-m-d H:m:i",$info['inputtime']) ;?></span></p> 
        </div>
        <div style="clear:both"></div>
      </div>
         -->

      <div class="dt_content"><br>
		<?php echo $info['content'] ; ?>
      </div>
      <div class="dt_content"><br>
      <div class="my_button"><a href="pay.php?id=<?php echo $info['id'];?>"><img src="./images/bm.gif"/></a></div>
      </div>
    </div>
  </div>
  <!--left end-->

  <!--right begin-->
  <div class="dt_right">

    <!--sina weibo begin-->
    <div class="dt_wb"><h2 class="widgettitle">纽摄微博</h2>
      <div class="textwidget"><iframe id="sina_widget_1930141335" style="width:100%; height:575px;" frameborder="0" scrolling="no" src="http://v.t.sina.com.cn/widget/widget_blog.php?uid=2722123761&height=575&skin=wd_02&showpic=1"></iframe></div>
    </div>
    <!--sina weibo end-->
    
    
  </div>
  <!--right end-->

</div>