<div id="mainbody">
	<div class="main_new">
	<div class="main_new_nav">
		<span><a href="index.php">首页</a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
		<?php if(in_array($t, array(1,2,3))){
			include 'final.php' ;
		?>
		<span><a href="<?php echo $title[$t]['url'];?>"><?php echo $title[$t]['title'];?></a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
		<?php }
		 ?>
		<span><?php echo $news['title'];?></span>
	</div>
	<div class="main_content">
	<?php 
	echo $result['content'] ;
	?>
	</div>
	
	<div class="main_daily">
		<div class="hd_title">活动排期</div>
		<?php include 'daily.php';?>
		<?php if(in_array($t, array(1,2,3))){ ?>
		<div class="my_button"><a href="pay.php?t=<?php echo $t;?>&id=<?php echo $news['id'];?>"><img src="./images/bm.gif"/></a></div>
		<div class="my_button"><a href="user.php?action=reg"><img src="./images/zc.jpg"/></a></div>
		<?php }?>
	</div>
	</div>
</div>