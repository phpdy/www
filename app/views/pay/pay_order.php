<link type="text/css" href="./css/order.css" rel="stylesheet">
<div id="channel_nav">
	<a href="index.php">首页</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
	马上报名
</div>

<div id="channel_main">

  <!--left begin-->
  <div class="dt_left">
    <div id="dt_main">
      <div style="clear:both"></div>
      <div class="dt_title">用户信息</div>
      <div class="dt_content">
	      <table class="order">
			<tr><td>姓名：</td><td><?php echo $user['username']; ?></td>	</tr>
			<tr><td>邮箱：</td><td><?php echo $user['email']; ?></td>	</tr>
			<tr><td>性别：</td><td><?php echo $user['sex']==2?'女':'男'; ?></td>	</tr>
			<tr><td>地址：</td><td><?php echo $user['province'].' '.$user['city'].' '.$user['address']; ?></td></tr>	
			<tr><td>联系方式：</td><td><?php echo $user['mobile'].' '.$user['phone'] ; ?></td></tr>	
			<tr><td>&nbsp;</td><td><input type="button" value="修改资料" class="btn-order" id="mod_user"></td></tr>
		  </table>
	  </div>

	  <br>
	  <div style="clear:both"></div>
	  <div class="dt_title">订单信息</div>
      <div class="dt_content">
      	<?php //print_r($pay); ?>
		<table class="order">
			<tr><td>订单名称：</td><td><?php echo $pay['title']; ?></td></tr>
			<tr><td>课程介绍：</td><td><?php echo $pay['description'] ; ?></td></tr>
			<tr><td>报名费用：</td><td>￥ <?php echo $pay['fee']; ?> 元</td></tr>
			<tr><td>&nbsp;</td>
			<td><input type="button" value="立刻在线报名" class="btn-order" id="order_ali">&nbsp;&nbsp;&nbsp;
			<input type="button" value="稍后汇款报名" class="btn-order" id="order_hk"></td></tr>
		</table>
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


<script language="javascript">
$(function(){
	$("#mod_user").click(function(){
		//alert(23) ;
		window.location.href="/user.php?action=info&url=<?php echo urlencode($_SERVER['REQUEST_URI']);?>";
	});

	$("#order_ali").click(function(){
		window.location.href="/pay.php?action=ali&id=<?php echo $pay['id']; ?>&fee=<?php echo $pay['fee']; ?>";
	});

	$("#order_hk").click(function(){
		window.location.href="/pay.php?action=hk&id=<?php echo $pay['id']; ?>&fee=<?php echo $pay['fee']; ?>";
	});
	
});
</script>
