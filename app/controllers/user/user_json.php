<?php

class user_json extends BaseController {

	private $userinfo_model ;
	public function init(){
		$this->userinfo_model = $this->initModel('userinfo_model');
	}
	//用户登录
	public function defaultAction(){
		$start = microtime(true)*1000 ;
		$log = __CLASS__."|".__FUNCTION__ ;
		
		$name = @$_GET['name'] ;
		$password = @$_GET['password'] ;
		$log .= "|$name,$password" ;
		$result = $this->userinfo_model->query(array('name'=>$name)) ;
//		print_r($result) ;
		if(empty($result)){
			$result = $this->userinfo_model->query(array('email'=>$name)) ;
		}
		if(empty($result)){
			$result = $this->userinfo_model->query(array('mobile'=>$name)) ;
		}

		if(!empty($result) && sizeof($result)>=1){
			foreach ($result as $userinfo){
				if(md5($password) == $userinfo['password']){
					//登陆成功
					@session_start ();
					$_SESSION[FinalClass::$_session_user] = $userinfo ;
					echo 1 ;
					$log .= "|true" ;
					$log .= "|".(int)(microtime(true)*1000-$start) ;
					Log::logBusiness($log) ;
					return ;
				}
			}
		}
		echo 0 ;
		
		$log .= "|false" ;
		$log .= "|".(int)(microtime(true)*1000-$start) ;
		Log::logBusiness($log) ;
	}

	//用户名检验
	public function checkAction(){
		$start = microtime(true)*1000 ;
		$log = __CLASS__."|".__FUNCTION__ ;
		
		$name = $_POST['name'] ;
		$result = $this->userinfo_model->query(array('name'=>$name)) ;
//		print_r($result) ;

		$log .= "|$name|".sizeof($result) ;
		$log .= "|".(int)(microtime(true)*1000-$start) ;
		Log::logBusiness($log) ;
		
		if(empty($result) || sizeof($result)==0){
			echo 1 ;
		} else {
			echo 0 ;
		}
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
		
		$log .= "|$result" ;
		$log .= "|".(int)(microtime(true)*1000-$start) ;
		Log::logBusiness($log) ;
	}
	
}

?>