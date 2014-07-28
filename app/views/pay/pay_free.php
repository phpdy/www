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
			<tr><td>联系电话：</td><td><?php echo $user['mobile'].' '.$user['phone'] ; ?></td></tr>
			<tr><td>详细地址：</td><td><?php echo $user['province'].' '.$user['city'].' '.$user['address']; ?></td></tr>
			<tr><td>邮政编码：</td><td><?php echo $user['post'] ; ?> （街道信息、门牌号和邮政编码可以让投递更加准确。）</td></tr>
			<tr><td>&nbsp;</td><td><input type="button" value="修改资料" class="btn-order" id="mod_user"></td></tr>
		  </table>
	  </div>

	  <br>
	  <div style="clear:both"></div>
	  <div class="dt_title">订单信息</div>
      <div class="dt_content">
      <form name="myForm" id="myForm" method="get" action="pay.php">
      	<input type="hidden" value="free" name="action">
      	<input type="hidden" value="<?php echo @$pay['id']; ?>" name="id">
		<table class="order">
			<tr><td>递送方式：</td><td><select name="t1" id="t1">
				<option value='1' >请把资料通过邮局寄给我
				<option value='2' >请把电子版的资料发到我的电子邮箱
			</select></td></tr>
			<tr><td>从何处获得招生信息：</td><td>         
				<input type="checkbox" id="1" value="1" name="t2[]"><label for="1">网站</label>&nbsp;&nbsp;
				<input type="checkbox" id="2" value="2" name="t2[]"><label for="2">微信</label>&nbsp;&nbsp;
				<input type="checkbox" id="3" value="3" name="t2[]"><label for="3">微博</label>&nbsp;&nbsp;
				<input type="checkbox" id="4" value="4" name="t2[]"><label for="4">杂志</label>&nbsp;&nbsp;
				<input type="checkbox" id="5" value="5" name="t2[]"><label for="5">报纸</label>&nbsp;&nbsp;
				<input type="checkbox" id="6" value="6" name="t2[]"><label for="6">朋友介绍</label>&nbsp;&nbsp;
			</td></tr>
			<tr><td>&nbsp;</td>
			<td><input type="button" value="立刻免费领取" class="btn-order" id="order_free">&nbsp;&nbsp;&nbsp;
			</td></tr>
		</table>
		</form>
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

	$("#order_free").click(function(){
		//window.location.href="/pay.php?action=free&id=<?php echo $pay['id']; ?>&t1="+$('#t1').val()+"&t2="+$('#t2').val();
		$("#myForm").submit();
		//window.location.href="index.php?control=detail&tid=59&id=652" ;
	});
	
});
</script>
