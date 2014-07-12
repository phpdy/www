<link type="text/css" href="./css/order.css" rel="stylesheet">
<div id="channel_nav">
	<a href="index.php">首页</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
	汇款报名
</div>

<div id="channel_main">

  <!--left begin-->
  <div class="dt_left">
    <div id="dt_main">
      <div style="clear:both"></div>
      <div class="dt_title">欢迎领取免费资料！</div>
      <div class="dt_content">
	      <table class="order">
			<tr><td colspan=2><b><font color="red"><?php echo @$text; ?></font></b></td></tr>
			<tr><td>订单号：</td><td><?php echo @$order['orderid']; ?></td>	</tr>
			<tr><td>金额：</td><td>￥ <?php echo @$order['money']; ?> 元</td>	</tr>
			<tr><td>订单日期：</td><td><?php echo @$order['paydate'] ; ?></td></tr>
			<tr><td>支付方式：</td><td><?php echo @$order['paytype'] ; ?></td></tr>
		  </table>
	  </div>

	  <br>
	  <div style="clear:both"></div>
      
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
