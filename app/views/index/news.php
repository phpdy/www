<div id="mainbody">
	<div class="main_new">
	<div class="main_new_nav">
		<span><a href="index.php">首页</a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
		<?php if(in_array($t, array(1,2,3))){ ?>
		<span><a href="index.php?t=<?php echo $t;?>"><?php echo $title[$t];?></a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
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
		<div class="my_button"><a href="order.php?t=<?php echo $t;?>&id=<?php echo $news['id'];?>"><img src="./images/bm.gif"/></a></div>
		<div class="my_button"><a href="user.php?action=reg"><img src="./images/zc.jpg"/></a></div>
		<?php }?>
		<?php 
		foreach($orderlist as $key=>$order){
			$id=$key+1 ;
			$date = substr($order['paydate'],0,10) ;
			//echo "<div class='order_list'>$id.&nbsp;&nbsp;&nbsp;&nbsp;$order[username]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$date</div>" ;
		}
		?>
	</div>
	</div>
</div>