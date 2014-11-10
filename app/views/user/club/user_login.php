<link type="text/css" href="./css/user-style.css" rel="stylesheet">

<div id="channel_main">

  <!--left begin-->
  <div class="dt_left">
    <div class="apply_main">

    <div class="apply_sub">用户登录</div>
    <form name="myForm" onSubmit="return chkForm(this)" method="post" action="">
		<div class="apply_sheet">

        <div class="apply_t1">用&nbsp;户&nbsp;名：<input type="text" class="sele" size="30" maxlength="50" name="name" id="name"></div>
        <div class="apply_t1">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" class="sele" size="30" maxlength="20" name="password" id="password"></div>
       </div>
		<div class="apply_next">
	        <input type="button" class="btn-img btn-regist" id="login" value="登录" tabindex="5">&nbsp;&nbsp;
	        <input type="button" name="regist" id="regist" class="btn-img btn-regist" value="注册" />
		</div>
		<div style="margin: 0px; padding: 7px 0px; text-indent: 29px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; line-height: 24px;">如果您已经是纽约摄影学院中国学员班全科摄影课程的学员，您将自动具备纽摄俱乐部会员身份，无需注册会员。您可以使用您的学号作为用户名，并输入初始密码进行登录。如果您不知道您的初始密码，可以直接拨打学校电话010-51298186获取。</div>
    </form>
	</div>
  </div>
  <!--left end-->

  <!--right begin-->
  <div class="dt_right">

  </div>
  <!--right end-->

</div>

<script type="text/javascript">
$(function(){
	$("#regist").click(function(){
		//alert(1) ;
		document.location.href="user.php?action=reg&url=<?php echo urlencode($url); ?>" ;
	});
	
	$("#login").click(function(){
		var name = $('#name').val() ;
		var password = $('#password').val() ;
		if(name.length==0 || password.length==0){
			alert("请输入用户名和密码") ;
			return false ;
		}

		$.get("./user.php?control=json",{name:name,password:password},function(data){
			//alert(data) ;
			if(data==0){
				alert("登录失败，请检查用户名和密码是否正确。") ;
				return false ;
			}
			
			document.location.href="<?php echo $url; ?>" ;
		});
		
	});
	
})
</script>