<div id="channel_nav">
	<a href="index.php">首页</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
	马上报名
</div>

<div id="channel_main">

  <!--left begin-->
  <div class="dt_left">
    <div id="dt_main">
      <div class="dt_title"><?php echo $info['title'] ;?></div>
      <div class="dt_date">
        <div class="dateleft">
        <p><span class="time"><?php echo date("Y-m-d H:m:i",$info['inputtime']) ;?></span></p> 
        </div>
        <div style="clear:both"></div>
      </div>

      <div class="dt_content"><br>
		<?php echo $info['content'] ; ?>
      </div>
      <div class="dt_content"><br>
      <div class="my_button"><a href="pay.php?id=<?php echo $info['id'];?>"><img src="./images/bm.gif"/></a></div>
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
