<?php

class user_index extends BaseController {

	public function init(){
		$this->userinfo_model = $this->initModel('userinfo_model');
		$this->pay_model = $this->initModel('pay_model');

	}
	public function destroy(){
		$this->view->display2('comm-footer.php','www');
	}
	
	public function defaultAction(){
		return $this->infoAction();
	}
	
	//登陆
	public function loginAction(){
		$url = @$_REQUEST['url'] ;
		if(empty($url)){
			$url = FinalClass::$_home_url ;
		}
		$this->view->assign('url',urldecode($url)) ;
		$this->view->display2('comm-title.php','www');
		$this->view->display('user_login.php','www');
	}
	//注册
	public function regAction(){
		$url = @$_REQUEST['url'] ;
		if(empty($url)){
			$url = FinalClass::$_home_url ;
		}
		$this->view->assign('url',urldecode($url)) ;
		
		$this->view->display2('comm-title.php','www');
		$type = @$_GET['type'] ;
		$this->view->assign('type',$type) ;
		if(!empty($type) && $type=='free'){
			$this->view->display('user_reg_free.php','www');
		} else {
			$this->view->display('user_reg.php','www');
		}
	}
	public function regSubmitAction(){
		$start = microtime(true)*1000 ;
		$log = __CLASS__."|".__FUNCTION__ ;
		
		if(empty($_POST['name'])){
			echo "<script language=javascript>
				alert('用户名不能为空');</script>" ;
			die();
		}
		$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		if(!preg_match( $pattern, $_POST['name'])){
			echo "<script language=javascript>
				alert('您输入的电子邮件地址不合法');</script>" ;
			die();
		}

		$data = $_POST ;
		$data['password'] = md5($data['password']) ;
		$data['createtime'] = date('Y-m-d H:i:s') ;
		$data['email'] = $data['name'] ;
		$data['tag'] = "www" ;
		$result = $this->userinfo_model->insert($data) ;
		
		//自动登录
		$name = $_POST['name'] ;
		$userlist = $this->userinfo_model->query(array('name'=>$name)) ;
		@session_start ();
		$_SESSION[FinalClass::$_session_user] = $userlist[0] ;
		
		$url = FinalClass::$_home_url ;
		if(!empty($_POST['url'])){
			$url = urldecode($_POST['url']) ;
		}
		
		header("location:$url") ;
		echo "<script>!function(w,d,e){var b=location.href,c=d.referrer,f,s,g=d.cookie,h=g.match(/(^|;)\s*ipycookie=([^;]*)/),i=g.match(/(^|;)\s*ipysession=([^;]*)/);if (w.parent!=w){f=b;b=c;c=f;};u='//stats.ipinyou.com/cvt?a='+e('iX.rL.yhVzI-AcO0xLvO2cU1_Si_')+'&c='+e(h?h[2]:'')+'&s='+e(i?i[2].match(/jump\%3D(\d+)/)[1]:'')+'&u='+e(b)+'&r='+e(c)+'&rd='+(new Date()).getTime()+'&e=';function _(){if(!d.body){setTimeout(_(),100);}else{s= d.createElement('script');s.src = u;d.body.insertBefore(s,d.body.firstChild);}}_();}(window,document,encodeURIComponent);</script><noscript><img src=\"//stats.ipinyou.com/cvt.gif?a=iX.rL.yhVzI-AcO0xLvO2cU1_Si_&e=\" style=\"display:none;\"/></noscript>" ;
		
		$log .= "|$result|$url" ;
		$log .= "|".(int)(microtime(true)*1000-$start) ;
		Log::logBusiness($log) ;
	}
	//修改信息
	public function infoAction(){
		@session_start ();
		$user = @$_SESSION[FinalClass::$_session_user] ;
		if(empty($user)){
			header("location:user.php?action=login&url=".urlencode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		$user = $this->userinfo_model->queryById($user['id']) ;
		$this->view->assign('user',$user) ;
		$this->view->display2('comm-title.php','www');
		$this->view->display('user_info.php','www');
	}
	public function infoSubmitAction(){
		$start = microtime(true)*1000 ;
		$log = __CLASS__."|".__FUNCTION__ ;
		
		$result = $this->userinfo_model->update($_POST) ;
		$url = FinalClass::$_home_url ;
		if(!empty($_POST['url'])){
			$url = urldecode($_POST['url']) ;
		}
		echo "<script language=javascript>
				alert('您的资料已经成功提交');
				document.location.href='$url';</script>" ;
		//header("location:$url") ;
		
		$log .= "|$result|$url" ;
		$log .= "|".(int)(microtime(true)*1000-$start) ;
		Log::logBusiness($log) ;
	}
	//修改密码
	public function pwdAction(){
		@session_start ();
		$user = $_SESSION[FinalClass::$_session_user] ;
		if(empty($user)){
			header("location:login.php?url=".urlencode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		$this->view->assign('user',$user) ;
		$this->view->display2('comm-title.php','www');
		$this->view->display('user_pwd.php','www');
	}
	
	//退出
	public function loginoutAction(){
		@session_start ();
		$_SESSION [FinalClass::$_session_user] = null ;
		unset($_SESSION[FinalClass::$_session_user]) ;
		
		$url = urlencode("user.php") ;
		header("location:$url") ;
	}
	
	
}

?>