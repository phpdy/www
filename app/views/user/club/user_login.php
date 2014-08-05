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