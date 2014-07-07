<?php

class user_box extends BaseController {

	public function init(){
		$this->userinfo_model = $this->initModel('userinfo_model');
	}
	
	//登陆框
	public function defaultAction(){
		$this->view->display('user_login_box.php');
	}
	
	
	//密码检验
	public function checkpwdAction(){
		$start = microtime(true)*1000 ;
		$log = __CLASS__."|".__FUNCTION__ ;
		
		$password = md5($_POST['password']) ;
		
		@session_start ();
		$user = $_SESSION[FinalClass::$_session_user] ;

		$log .= "|$password|" ;
		$log .= "|".(int)(microtime(true)*1000-$start) ;
		Log::logBusiness($log) ;
		
//		echo "$password  ". $user['password'] ;
		if($password == $user['password']){
			echo 1 ;
		} else {
			echo 0 ;
		}
	}

	//密码修改
	public function pwdSubmitAction(){
		$start = microtime(true)*1000 ;
		$log = __CLASS__."|".__FUNCTION__ ;
		
		$_POST['password'] = md5($_POST['password']) ;
		$result = $this->userinfo_model->update($_POST) ;
		echo $result ;
//		$url = FinalClass::$_home_url ;
//		if(!empty($_POST['url'])){
//			$url = $_POST['url'] ;
//		}
//		header("location:$url") ;
		
		$log .= "|$result" ;
		$log .= "|".(int)(microtime(true)*1000-$start) ;
		Log::logBusiness($log) ;
	}

}

?>