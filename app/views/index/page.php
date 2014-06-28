<div id="channel_nav">
	<a href="?">首页</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
	<a href="<?php echo "?control=$type"; ?>"><?php
	 foreach ($categoryList as $value){
	 	if($value['catid']==$tid){
	 		echo $value['catname'];
	 		break ;
	 	}
	 }
	?></a>
</div>

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
      <div class="channel_list_topic"><?php echo $page['title'];?></div>
      <div class="qk_content"><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo $page['content'];?>
      </div>
    </div>
  </div>
  <!--right end-->
</div>

<!--main end-->