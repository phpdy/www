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
	<?php if(isset($_GET['id'])){ ?>
	&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
	<?php echo $cat['catname'];
	}
	?>
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
  <div>&nbsp;</div>
  <div><a href='?control=order&catid=75'><img src="images/lkbm.jpg" border="0" width="105" height="35" align=order></a>&nbsp;&nbsp;
  <iframe scrolling="no" frameborder="0" width="102" height="24" allowtransparency="true" src="https://id.b.qq.com/static/account/bizqq/wpa/wpa_a01.html?type=1&kfuin=800002915&ws=http%3A%2F%2Fwww.nyipcn.com&btn1=%E5%9C%A8%E7%BA%BF%E8%AF%BE%E7%A8%8B%E5%92%A8%E8%AF%A2" title="在线课程咨询"></iframe>
  </div>
  <div><img src="images/tel.jpg" border="0" align="tel"></div>
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
		$pn = empty($_GET['pn'])?0:$_GET['pn'] ;
		$psize = 15 ;
		
		$start = $pn * $psize ;
		$outlist = array_slice($info,$start,$psize) ;
		foreach ($outlist as $key=>$value){
	?>
	  <div class="channel_list">
        <div class="channel_list_img"><img src="<?php echo $value['thumb'] ;?>" width=68 height=68></div>
        <div class="channel_list_title"><a href="<?php echo "?control=detail&tid=$tid&pid=$value[catid]&id=$value[id]";?>"><?php echo $value['title'];?></a></div>
        <div class="channel_list_desc"><?php echo $value['description'] ;?></div>
      </div>
	<?php } ?>
      <div class="qk_content" style="float:right;"><br>
		<?php 
		//分页
		$count = sizeof($info);
		$allPn = (int)(($count-1)/$psize) +1 ;
		$url = "?control=$type" ;
		if(isset($_GET['id'])){
			$url .= "&id=".$_GET['id'] ;
		}
		if ($allPn>1)
		for($s=0;$s<$allPn;$s++){
			$outp = $s+1 ;
			if($s == $pn){
				echo $outp ;
			} else {
				echo "<a href='$url&pn=$s'>$outp</a>" ;
			}
			if($s<$allPn-1){
				echo " . " ;
			}
		}
		?>
      </div>
    </div>
  </div>
  <!--right end-->
</div>

<!--main end-->