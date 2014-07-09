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
      	<?php //print_r($pay); ?>
		<table class="order">
			<tr><td>递送方式：</td><td><select name="t1">
				<option value='1' >请把资料通过邮局寄给我
				<option value='2' >请把电子版的资料发到我的电子邮箱
			</select></td></tr>
			<tr><td>从何处获得招生信息：</td><td>         
				<input type="checkbox" id="1" value="1" name="t2"><label for="1">网站</label>&nbsp;&nbsp;
				<input type="checkbox" id="2" value="2" name="t2"><label for="2">微信</label>&nbsp;&nbsp;
				<input type="checkbox" id="3" value="3" name="t2"><label for="3">微博</label>&nbsp;&nbsp;
				<input type="checkbox" id="4" value="4" name="t2"><label for="4">杂志</label>&nbsp;&nbsp;
				<input type="checkbox" id="5" value="5" name="t2"><label for="5">报纸</label>&nbsp;&nbsp;
				<input type="checkbox" id="6" value="6" name="t2"><label for="6">朋友介绍</label>&nbsp;&nbsp;
			</td></tr>
			<tr><td colspan=2><p><b>免费课程介绍申请注册告知函：</b></p></td></tr>
			<tr><td colspan=2>
	您好！

	感谢您申请全科专业摄影课程的免费课程介绍！为感谢您的关注，您还将免费成为纽摄俱乐部会员！纽摄俱乐部是北京纽摄教育科技有限公司的持有品牌，致力于为摄影人提供最有价值的摄影实践、摄影创作、摄影文化交流等活动。

	请您认真填写相关信息，我们就您填写的个人信息承担保密义务。并就个人信息保护政策，做出如下说明与承诺：
 
	1.收集、使用和提供个人信息
	鉴于在为您办理各项事务中（包括但不限于办理注册、活动保险、预订各类服务等方面）需要个人信息。我们保存会员的部分信息，并针对每种业务建立了个人信息保护管理系统，遵守收集、使用和提供个人信息的相关制度，在法律规定的范围内使用个人信息。
 
	2.遵守相关法律和法规
	在处理个人信息问题上，我们将遵守适用于个人信息保护的相关法律和法规，仅在法律规定的范围内使用，同时未经会员授权不会把相关信息提供给任何第三方。
 
	3.尊重信息所有者本人的权利
	当会员要求更正或删除自己的信息，或要求拒绝本人信息的使用或提供时，我们将充分尊重信息所有者本人的权利，并根据会员的要求予以处理。
 
	4.执行安全措施
	为确保个人信息的正确性和安全性，我们将根据信息安全条例进行个人信息调用的管理、限制个人信息外传途径以及防止来自公司内部与外部的不恰 当调用等，并努力防止信息的遗失、毁坏、篡改或泄露等任何与个人信息相关的问题。对于任何组织与个人窃取、盗用会员个人信息的违法行为，我们坚决反对，并将配合相关法律部门予以严肃查处。
 
	5.不断完善个人信息管理
	我们让所有员工都认识到个人信息保护的重要性，并认真执行个人信息管理制度，以确保个人信息得到合理的使用和保护。

	再次感谢您对我们的关注，并期待您成为纽摄大家庭中的一员！
	</td></tr>
			<tr><td>&nbsp;</td>
			<td><input type="button" value="立刻免费领取" class="btn-order" id="order_free">&nbsp;&nbsp;&nbsp;
			</td></tr>
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

	$("#order_free").click(function(){
		window.location.href="/pay.php?action=free&userid=<?php echo $user['id']; ?>&id=<?php echo $pay['id']; ?>";
	});
	
});
</script>
