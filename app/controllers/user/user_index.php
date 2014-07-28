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
		
		$data = $_POST ;
		$data['password'] = md5($data['password']) ;
		$data['createtime'] = date('Y-m-d H:i:s') ;
		$data['email'] = $data['name'] ;
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
		header("location:$url") ;
		
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