<link type="text/css" href="./css/order.css" rel="stylesheet">

<div id="mainbody">
	<div class="main_new">
	<div class="main_new_nav">
		<span><a href="index.php">首页</a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
		<span><a href="user.php">会员中心</a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
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
		<?php if(empty($news['fee']) || $news['fee']=='0' || $news['fee']=='0.00'){?>
		<tr><td>&nbsp;</td>
		<td><input type="button" value="立刻免费报名" class="btn-order" id="order_free"></td></tr>
		<?php } else {?>
		<tr><td>&nbsp;</td>
		<td><input type="button" value="立刻在线报名" class="btn-order" id="order_ali">&nbsp;&nbsp;&nbsp;
		<input type="button" value="稍后汇款报名" class="btn-order" id="order_hk"></td></tr>
		<?php } ?>
	</table>
	</div>
	
	<div class="main_daily">
		<div class="hd_title">活动排期</div>
		<?php include 'daily.php';?>
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
		var html = "/pay.php?action=ali&userid=<?php echo $user['id']; ?>&id=<?php echo $news['id']; ?>" ;
		//window.location.href=html;
		window.open(html,'_blank') ;
	});

	$("#order_hk").click(function(){
		var html = "/pay.php?action=hk&userid=<?php echo $user['id']; ?>&id=<?php echo $news['id']; ?>" ;
		//window.location.href=html;
		window.open(html,'_blank') ;
	});

	$("#order_free").click(function(){
		window.location.href="/pay.php?action=free&userid=<?php echo $user['id']; ?>&id=<?php echo $news['id']; ?>";
	});
	
});
</script>
