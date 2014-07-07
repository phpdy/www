<link type="text/css" href="./css/user-style.css" rel="stylesheet">
<!--main begin-->
<div class="main">
<div class="apply_sub">订单信息</div>

	<div class="rmain">
	<div class="jpk">
    <form name="myForm" id="myForm" method="post" action="user.php?action=infoSubmit">
      <div class="apply_sheet">
      	<input type="hidden" name="url" value="<?php echo @$_GET['url']; ?>">
      	<input type="hidden" class="sele" name="id" value="<?php echo $user['id']; ?>">
        <div class="apply_t1"><b>欢迎您成为全科专业摄影课程学员！请您完善学员信息，以便完成在线报名流程。</b></div>
        <div class="apply_t1">用户名（不可修改）：<?php echo $user['name']; ?></div>

	    <div class="apply_t1"><b style="color:#F00;">*</b>通讯地址：<input type="text" class="sele" size="50" maxlength="100" name="address" value="<?php echo $user['address']; ?>"></div>
        <div class="apply_t1"><b style="color:#F00;">*</b>邮政编码：<input type="text" class="sele" size="20" maxlength="20" name="post" value="<?php echo $user['post']; ?>"></div>
        <div class="apply_t1"><b style="color:#F00;">*</b>移动电话：<input type="text" class="sele" size="15" maxlength="15" name="mobile" value="<?php echo $user['mobile']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;
        	备用电话：<input type="text" class="sele" size="15" maxlength="15" name="phone" value="<?php echo $user['phone']; ?>"></div>
        <div class="apply_t1"><b style="color:#F00;">*</b>电子邮件：<input type="text" class="sele" size="50" maxlength="100" name="email" value="<?php echo $user['email']; ?>"></div>
		<!--div class="apply_t1"> <b style="color:#F00;">*</b><input type="checkbox" class="sele" checked> 用户须知</div-->
		<div class="apply_t1"><textarea rows="5" cols="90%" tabindex="1" readonly="true" style="padding:5px 5px;overflow:auto;resize:none">
你所填写的个人信息是为了能够准确及时地将课程包裹递送到您手上，并方便您以后参加学校以及俱乐部举办的各类活动时，我们可以及时与您联系。我们将严格遵守个人信息保护的相关法律和法规，仅在法律规定的范围内使用您的个人信息，未经您的许可不会提供给任何第三方。如果您有任何疑虑，请随时致电我们。再次欢迎您成为纽摄大家庭中的一员，共同分享摄影的快乐！
			</textarea>
		</div>

      </div>
      <div class="apply_next">
        <input type="button" class="btn-img btn-regist" id="infosubmit" value="提交修改" tabindex="5" onclick="return btn()">
      </div>
    </form>
    </div>
	</div>
</div>
<!--main end-->


<div id="mainbody">
	<div class="main_new">
	<div class="main_new_nav">
		<span><a href="index.php">首页</a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
		<span><a href="index.php?t=5">会员中心</a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
		<span><?php echo $news['title'];?></span>
	</div>
	<div class="main_content">
	<table class="order">
		<tr><td>会员信息</td><td><input type="button" value="修改资料" class="btn-order" id="mod_user"></td></tr>
		<tr><td>姓名：</td><td><?php echo $user['username']; ?></td>	</tr>
		<tr><td>性别：</td><td><?php echo $user['sex']==2?'女':'男'; ?></td>	</tr>
		<tr><td>地址：</td><td><?php echo $user['province'].' '.$user['city'].' '.$user['address']; ?></td></tr>
		<tr><td><input type="hidden" value="<?php echo $user['id']; ?>" name="userid" id="userid"/>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	<table class="order">
		<tr><td>活动信息</td><td>&nbsp;</td></tr>
		<tr><td>活动：</td><td><?php echo $news['title']; ?></td></tr>
		<tr><td>&nbsp;</td><td><img src="<?php echo $news['thumb']; ?>" width=120 /></td></tr>
		<tr><td>活动日期：</td><td><?php echo $news['startdate']." 至 ".$news['closedate'] ; ?></td></tr>
		<tr><td>活动费用：</td><td><?php echo $news['fee']; ?></td></tr>
		<tr><td>&nbsp;</td>
		<td><input type="button" value="立刻在线报名" class="btn-order" id="order_ali">&nbsp;&nbsp;&nbsp;
		<input type="button" value="稍后汇款报名" class="btn-order" id="order_hk"></td></tr>
	</table>
	</div>
	</div>
</div>

<script language="javascript">
$(function(){
	$("#mod_user").click(function(){
		//alert(23) ;
		window.location.href="/user.php?action=info&url=<?php echo urlencode($_SERVER['REQUEST_URI']);?>";
	});

	$("#order_ali").click(function(){
		window.location.href="/pay.php?action=ali&userid=<?php echo $user['id']; ?>&id=<?php echo $news['id']; ?>";
	});

	$("#order_hk").click(function(){
		window.location.href="/pay.php?action=hk&userid=<?php echo $user['id']; ?>&id=<?php echo $news['id']; ?>";
	});
	
});
</script>
