<?php

class user_json extends BaseController {

	public function init(){
		$this->userinfo_model = $this->initModel('userinfo_model');
	}
	//用户登录
	public function defaultAction(){
		$start = microtime(true)*1000 ;
		$log = __CLASS__."|".__FUNCTION__ ;
		
		$name = $_POST['name'] ;
		$password = $_POST['password'] ;
		$log .= "|$name,$password" ;
		$result = $this->userinfo_model->query(array('name'=>$name)) ;
		
		if(!empty($result) && sizeof($result)==1){
			$userinfo = $result[0] ;
			if(md5($password) == $userinfo['password']){
				//登陆成功
				@session_start ();
				$_SESSION[FinalClass::$_session_user] = $userinfo ;
				
				echo true ;
				$log .= "|true" ;
				$log .= "|".(int)(microtime(true)*1000-$start) ;
				Log::logBusiness($log) ;
				return ;
			}
		}
		echo false ;
		
		$log .= "|false" ;
		$log .= "|".(int)(microtime(true)*1000-$start) ;
		Log::logBusiness($log) ;
	}
	
}

?>