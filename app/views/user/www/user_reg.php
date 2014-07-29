<div id="channel_nav">
	<a href="index.php">首页</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
	用户注册
</div>

<div id="channel_main">

  <!--left begin-->
  <div class="dt_left">
	
<!--main begin-->
<div class="main">
	<div class="apply_main">

    <div class="apply_sub">全科专业摄影课程报名注册信息填写</div>
    <form name="form" id="form" method="post" action="user.php?action=regSubmit">
		<div class="apply_sheet">
		
		<table>
		<tr>
			<td><b style="color:#F00;">*</b>电子邮箱：</td><td align="left"><input type="text" tabindex="3" class="sele" size="30" maxlength="30" name="name" id="name">（电子邮箱地址，用户的登录名）</td>
		</tr>
		<tr>
			<td><b style="color:#F00;">*</b>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</td><td align="left"><input type="password" tabindex="3" class="sele" size="20" maxlength="20" name="password" id="password">（密码长度不少于6位）</td>
		</tr>
		<tr>
			<td><b style="color:#F00;">*</b>确认密码：</td><td align="left"><input type="password" tabindex="3" class="sele" size="20" maxlength="20" name="repassword" id="repassword"></td>
		</tr>
		<tr>
			<td><b style="color:#F00;">*</b>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</td><td align="left"><input type="text" tabindex="3" class="sele" size="20" maxlength="20" name="username" id="username">（请填写真实姓名）</td>
		</tr>
		<tr>
			<td colspan=2 align="left"><label><font color="#B60925"><b>全科专业摄影课程报名注册告知函：</b></font></label></td>
		</tr>
		<tr>
			<td colspan=2 align="left"><textarea rows="12" cols="90%" tabindex="1" readonly="true" style="padding:5px 5px;overflow:auto;resize:none">
您好！
欢迎您报名参加全科专业摄影课程的学习！在成为全科专业摄影课程学员的同时，您还将免费成为纽摄俱乐部会员！


纽摄俱乐部（Newshoot Club以下简称NC）是北京纽摄教育科技有限公司的持有品牌，致力于为摄影人提供最有价值的摄影实践、摄影创作、摄影文化交流等活动。

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

再次，欢迎您成为纽摄大家庭的一员！
</textarea></td>
		</tr>
		<tr>
			<td colspan=2 align="left"><input id="instruction" type="checkbox" checked="checked" value=1 tabindex="2"><b style="color:#F00;">*</b>我已经阅读并接受注册告知函。</td>
		</tr>
		</table>
		
		</div>
		<div class="apply_next">
	        <input type="hidden" name="url" value="<?php echo urlencode(@$url);?>">
	        <input type="button" class="btn-img btn-regist" id="registsubmit" value="注册"/>&nbsp;&nbsp;
	        <input type="reset" name="chongxie" class="btn-img btn-regist" value="重新填写" />&nbsp;&nbsp;
	        <input type="button" class="btn-img btn-regist" id="loginsubmit" value="登录"/>
		</div>
    </form>
	</div>
</div>
<!--main end-->
  </div>
  <!--left end-->

  <!--right begin-->
  <div class="dt_right">

  </div>
  <!--right end-->

</div>

<link type="text/css" href="./css/user-style.css" rel="stylesheet">

<script type="text/javascript">
$(function(){
	$("#name").change(function(){
		var name = $('#name').val() ;
		if(name.length==""){
			alert("请输入用户名，用户名必须邮箱地址。") ;
			$("#name").val("") ;
			$("#name").focus() ;
			return false ;
		}

		var Regex = /^(?:\w+\.?)*\w+@(?:\w+\.)*\w+$/;　
		if (!Regex.test(name)) {
			alert("请输入正确的电子邮件地址！");
			$("#name").val("") ;
			$("#name").focus() ;
			return false;
		}
		
		$.post("./user.php?control=json&action=check",{name:$('#name').val()},function(data){
			//alert(data) ;
			if(data==0){
				alert("用户名已被使用，请重新输入") ;
				$("#name").val("") ;
				$("#name").focus() ;
				return false ;
			}
		});
		return true ;
	});

	$("#password").change(function(){
		var pwd = $('#password').val() ;
		//alert(pwd) ;
		//alert(pwd.length) ;
		if(pwd.length<6){
			alert("密码长度不能少于6位数字或字母。") ;
			$("#password").val("") ;
			$("#password").focus() ;
			return false ;
		}
		return true ;
	});
	
	$("#repassword").change(function(){
		if($('#password').val() != $('#repassword').val()){
			alert("两次输入密码不一致，请重新输入") ;
			//$("#password").val("") ;
			$("#repassword").val("") ;
			$("#repassword").focus() ;
			return false ;
		}
		return true ;
	});

	$("#username").change(function(){
		var name = $('#username').val() ;
		var chineseReg = /^[\u4E00-\u9FA5]{2,8}$/;
		if(!chineseReg.test(name)) {
			alert("请填写正确的中文姓名");
			$("#username").val("") ;
			$("#username").focus() ;
			return false ;
		}
		return true ;
	});

	$("#registsubmit").click(function(){
		if(confirm('你确定要提交数据吗？')){
			var name = $('#name').val() ;
			var repassword = $('#repassword').val() ;
			var username = $('#username').val() ;
			if(name=="" || repassword=="" || username=="" ){
				alert("请填写完整信息") ;
				return false ;
			}
			
//			alert("ok") ;
//			alert(document.form.action) ;
//			document.form.submit();
//			$("#myForm").action="reg.php?action=regSubmit";
//			$("#myForm").submit();
			$("#form").submit();
		    return true;
		}
	});
	
	$("#loginsubmit").click(function(){
		document.location.href="/user.php?action=login&url=<?php echo urlencode($url); ?>" ;
	});
})

</script>