<div id="channel_nav"><a href="?">首页</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;<a href="#"><?php echo $cat['catname'];?></a></div>

<!--main begin-->
<div id="channel_main">
  <!--left begin-->
  <div class="channel_left">
  <ul class="menu">
  <?php 
  	foreach ($list as $value){
  		echo "<li><a href='?control=$type&id=$value[catid]'>$value[catname]</a></li>" ;
  	}
  ?>
  </ul>
  </div>
  <!--left end-->

  <!--right begin-->
  <div class="channel_right">
    <div id="content_main">
      <div class="channel_list_topic"><?php echo $cat['catname'];?></div>
      <div class="channel_intro">
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cat['description'];?></p> 
      <div style="clear:both"></div>
      </div>
	<?php  
		foreach ($info as $key=>$value){
	?>
	 <div class="channel_list">
        <div class="channel_list_img"><img src="<?php echo $value['thumb'] ;?>" width=68 height=68></div>
        <div class="channel_list_title"><a href="?control=detail&id=<?php echo $value['id'];?>"><?php echo ($key+1).".".$value['title'];?></a></div>
        <div class="channel_list_desc"><?php echo $value['description'] ;?></div>
      </div>
	<?php } ?>
      <div class="qk_content"><br>

      </div>
    </div>
  </div>
  <!--right end-->
</div>

<!--main end-->