<link type="text/css" href="./css/user-style.css" rel="stylesheet">
<script language="javascript" type="text/javascript" src="js/common.js" ></script>
<script language="javascript" type="text/javascript" src="js/Calendar3.js" ></script>

<div id="channel_main">
<!--main begin-->
<div class="apply_main">
<div class="apply_sub">完善用户信息</div>
<?php
include './comm/user_left.php';
?>

	<div class="rmain">
	<div class="jpk">
    <form name="myForm" id="myForm" method="post" action="user.php?action=infoSubmit">
      <div class="apply_sheet">
      	<input type="hidden" name="url" value="<?php echo @$_GET['url']; ?>">
      	<input type="hidden" class="sele" name="id" value="<?php echo $user['id']; ?>">
        <div class="apply_t1"><b>欢迎您成为纽摄俱乐部大家庭的一员！请您尽快完善会员信息。</b></div>
        <div class="apply_t1">用户名（不可修改）：<?php echo $user['name']; ?></div>
        <div class="apply_t1"><b style="color:#F00;">*</b>姓名（请填写真实姓名）：<input type="text" tabindex="3" class="sele" size="20" maxlength="20" name="username" value="<?php echo $user['username']; ?>"></div>
        <div class="apply_t1"><b style="color:#F00;">*</b>性别：
	        <input type="radio" <?php if(@$user['sex']==1){echo "checked";} ?> id="1" value="1" name="sex"><label for="1">男</label>&nbsp;&nbsp;
			<input type="radio" <?php if(@$user['sex']==2){echo "checked";} ?> id="2" value="2" name="sex"><label for="2">女</label>
        </div>
        <div class="apply_t1"><b style="color:#F00;">*</b>出生日期：<input type="text" name="birth" class="sele" value="<?php echo @$user['birth']; ?>" size=20 onclick="new Calendar().show(this);" readonly></div>
        
        <div class="apply_t1"><b style="color:#F00;">*</b>证件类型:
			<select name="paper">
				<option value='1' <?php if(@$user['paper']==1){echo "selected";} ?>>身份证
				<option value='2' <?php if(@$user['paper']==2){echo "selected";} ?>>军官证
				<option value='3' <?php if(@$user['paper']==3){echo "selected";} ?>>护照
				<option value='4' <?php if(@$user['paper']==4){echo "selected";} ?>>港台证
				<option value='5' <?php if(@$user['paper']==5){echo "selected";} ?>>其他
			</select></div>
        <div class="apply_t1"><b style="color:#F00;">*</b>证件号码：<input type="text" class="sele" size="50" maxlength="18" name="paperno" id="paperno" value="<?php echo $user['paperno']; ?>"></div>
        <div class="apply_t1">所在单位：<input type="text" class="sele" size="50" maxlength="50" name="company" value="<?php echo $user['company']; ?>"></div>
        <div class="apply_t1">公司职务：<input type="text" class="sele" size="50" maxlength="50" name="job" value="<?php echo $user['job']; ?>"></div>
        <div class="apply_t1">
        	<b style="color:#F00;">*</b>所在省：<select name="province" id="s1" class="sele"><option></option></select>
	        <b style="color:#F00;">*</b>市：<select name="city" id="s2" class="sele"><option></option></select>
	        <SCRIPT language="javascript">setup()</SCRIPT></div>
	    <div class="apply_t1"><b style="color:#F00;">*</b>通讯地址：<input type="text" class="sele" size="50" maxlength="100" name="address" value="<?php echo $user['address']; ?>"></div>
        <div class="apply_t1"><b style="color:#F00;">*</b>邮政编码：<input type="text" class="sele" size="20" maxlength="20" name="post" value="<?php echo $user['post']; ?>"></div>
        <div class="apply_t1"><b style="color:#F00;">*</b>移动电话：<input type="text" class="sele" size="15" maxlength="15" name="mobile" value="<?php echo $user['mobile']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;
        	备用电话：<input type="text" class="sele" size="15" maxlength="15" name="phone" value="<?php echo $user['phone']; ?>"></div>
        <div class="apply_t1"><b style="color:#F00;">*</b>电子邮件：<input type="text" class="sele" size="50" maxlength="100" name="email" value="<?php echo $user['email']; ?>"></div>
		<!--div class="apply_t1"> <b style="color:#F00;">*</b><input type="checkbox" class="sele" checked> 用户须知</div-->
		<div class="apply_t1"><textarea rows="5" cols="90%" tabindex="1" readonly="true" style="padding:5px 5px;overflow:auto;resize:none">
&nbsp;&nbsp;&nbsp;&nbsp;你所填写的个人信息是为方便您以后参加俱乐部各类活动时，我们可以及时与您联系。同时也为了能够及时快捷地为您安排行程（比如预定酒店、航班、办理保险等）。
&nbsp;&nbsp;&nbsp;&nbsp;纽摄俱乐部将严格遵守个人信息保护的相关法律和法规，仅在法律规定的范围内使用您的个人信息，未经您的许可不会提供给任何第三方。如果您有任何疑虑，请随时致电纽摄俱乐部。
&nbsp;&nbsp;&nbsp;&nbsp;再次欢迎您成为纽摄俱乐部的一员，共同分享摄影的快乐！</textarea>
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
  <!--right begin-->
  <div class="dt_right">

  </div>
  <!--right end-->

</div>

<script type="text/javascript">
$(function(){
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

	$("#paperno").change(function(){
		var name = $('#paperno').val() ;
		if(name.length<5) {
			alert("请录入证件号");
			$("#paperno").val("") ;
			$("#paperno").focus() ;
			return false ;
		}
		return true ;
	});
	
	$("#mobile").change(function(){
		var mobile = $('#mobile').val() ;
		var phoneNumReg = /(^0{0,1}1[0-9]{10}$)/
		if(!phoneNumReg.test(mobile)) {
			alert("请录入正确手机号");
			$("#mobile").val("") ;
			$("#mobile").focus() ;
			return false ;
		}
		return true ;
	});
	
	$("#infosubmit").click(function(){
		if(confirm('你确定要提交数据吗？')){
			if($("#username").val()==""){
				alert("请填写姓名。");
				$("#username").focus() ;
				return false ;
			}
			if($("#birth").val()==""){
				alert("请填写出生日期。");
				$("#birth").focus() ;
				return false ;
			}
			if($("#paperno").val()==""){
				alert("请填写证件号码。");
				$("#paperno").focus() ;
				return false ;
			}
			if($("#province").val()==""){
				alert("请填写完整信息。");
				$("#province").focus() ;
				return false ;
			}
			if($("#city").val()==""){
				alert("请填写完整信息。");
				$("#city").focus() ;
				return false ;
			}
			if($("#address").val()==""){
				alert("请填写完整信息。");
				$("#address").focus() ;
				return false ;
			}
			if($("#post").val()==""){
				alert("请填写完整信息。");
				$("#post").focus() ;
				return false ;
			}
			if($("#mobile").val()==""){
				alert("请填写完整信息。");
				$("#mobile").focus() ;
				return false ;
			}
			if($("#email").val()==""){
				alert("请填写完整信息。");
				$("#email").focus() ;
				return false ;
			}
			$("#myForm").submit();
			return true ;
			
		}
	});
})

$("#s1 option[value='<?php echo $user['province']; ?>']").attr('selected','selected');
$("#s1").change();
$("#s2 option[value='<?php echo $user['city']; ?>']").attr('selected','selected');

</script>