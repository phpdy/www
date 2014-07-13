<link type="text/css" href="./css/order.css" rel="stylesheet">

<div id="mainbody">
	<div class="main_new">
	<div class="main_new_nav">
		<span><a href="index.php">首页</a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
		<span><a href="user.php">会员中心</a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
		<span>订单</span>
	</div>
	
	<div class="main_content">
	      <table class="order">
			<tr><td colspan=2><b><font color="red"><?php echo @$text; ?></font></b></td></tr>
			<tr><td>订单号：</td><td><?php echo @$order['orderid']; ?></td></tr>
			<tr><td>订单金额：</td><td>￥  <?php echo @$order['money']; ?> 元</td></tr>
			<tr><td>订单日期：</td><td><?php echo @$order['paydate'] ; ?></td></tr>
			<tr><td>支付方式：</td><td><?php echo @$order['paytype'] ; ?></td></tr>
		  </table>
	  </div>

    </div>
</div>
