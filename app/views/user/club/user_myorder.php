<link type="text/css" href="./css/user-style.css" rel="stylesheet">

<div id="channel_main">

<!--main begin-->
<div class="apply_main">
<div class="apply_sub">我的订单</div>
<?php
include './comm/user_left.php';
?>

	<div class="rmain">
	<div class="jpk">
      <div class="apply_sheet">
	  <div class="apply_t1"><b>未启动活动</b></div>
	  <table class="order">
	   <?php 
	   if ($orderlist2){
	   		foreach($orderlist2 as $order){
	   ?>
        <tr>
		<td><img src="<?php echo $order['hd']['thumb']; ?>" width="120" height="80"/></td>
		<td style="text-align:left;">
		<?php 
		$alipay="" ;
		if($order['state']==0){
			$alipay = "尚未支付&nbsp;&nbsp;<a href='alipay/alipayapi.php?orderid=$order[orderid]&money=$order[money]'><font color=red><b>支付宝支付</b></font></a>"
			."&nbsp;&nbsp;<a href='index.php?control=info&id=311'><font color=red><b>银行汇款</b></font></a>" ;
		}
		echo 
	   "&nbsp;活动名称：<b>". $order['hd']['title'] ."</b>&nbsp;<br/>"
	   ."&nbsp;支付订单：".$order['orderid'] ."&nbsp;&nbsp;&nbsp;&nbsp; $alipay<br/>"
	   ."&nbsp;活动时间：". $order['hd']['startdate'] ." 至 ".  $order['hd']['closedate'] ."&nbsp;<br/>"
	   //."支付方式：". $order['paytype'] ."&nbsp;<br/>"
	   ."&nbsp;活动金额：". number_format($order['money'], 2, '.', '') ." 元&nbsp;<br/>"
	   //."状态：". $order['state'] 
	   ;
		?>
		</td>
		</tr>
		<?php 
	   		}
	    } ?>
		</table>
		
	  <div class="apply_t1"><b>历史报名活动</b></div>
	  <table class="order">
	   <?php 
	   if ($orderlist1){
	   		foreach($orderlist1 as $order){
	   ?>
        <tr>
		<td><img src="<?php echo $order['hd']['thumb']; ?>" width="120" height="80"/></td>
		<td style="text-align:left;">
		<?php 
		echo 
	   "&nbsp;活动名称：<b>". $order['hd']['title'] ."</b>&nbsp;<br/>"
	   ."&nbsp;支付订单：".$order['orderid'] ."&nbsp;<br/>"
	   ."&nbsp;活动时间：". $order['hd']['startdate'] ." 至 ".  $order['hd']['closedate'] ."&nbsp;<br/>"
	   //."支付方式：". $order['paytype'] ."&nbsp;<br/>"
	   ."&nbsp;活动金额：". number_format($order['money'], 2, '.', '') ." 元&nbsp;<br/>"
	   //."状态：". $order['state'] 
	   ;
		?>
		</td>
		</tr>
		<?php 
	   		}
	  	}?>
		</table>

      </div>
    </div>
	</div>
</div>
<!--main end-->
</div>