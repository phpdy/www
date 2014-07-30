<?php

class user_club extends BaseUserController {

	public function init(){
		
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
		$this->view->display('user_login.php','club');
	}
	//注册
	public function regAction(){
		$url = @$_REQUEST['url'] ;
		if(empty($url)){
			$url = FinalClass::$_home_url ;
		}
		$this->view->assign('url',urldecode($url)) ;
		$this->view->display('user_reg.php','club');
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
		$this->view->display('user_info.php','club');
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
			header("location:user.php?url=".urlencode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		$this->view->assign('user',$user) ;
		$this->view->display('user_pwd.php','club');
	}
	
	//退出
	public function loginoutAction(){
		@session_start ();
		$_SESSION [FinalClass::$_session_user] = null ;
		unset($_SESSION[FinalClass::$_session_user]) ;
		
		$url = urlencode("user.php") ;
		header("location:$url") ;
	}
	

	public function myorderAction(){
		$user = $_SESSION[FinalClass::$_session_user] ;

		$newslist = $this->club_model->queryAll() ;
		//print_r($newslist) ;
		$orderlist = $this->pay_model->findOrderListByUserid($user['id']) ;
		
		foreach($orderlist as $key=>$order){
			$state = "未付款" ;
			if($order['state']==1){
				$state = "成功" ;
			}
			if($order['state']==-1){
				$state = "失败" ;
			}
			$orderlist[$key]['state2'] = $state ;
			foreach($newslist as $news){
				if($news['id']==$order['pid']){
					$orderlist[$key]['hd'] = $news ;
					break ;
				}
			}
		}
		$now = time() ;
		foreach($orderlist as $key=>$order){
			$time = strtotime($order['hd']['startdate']) ;
			if($now>$time){
				$orderlist1[] = $order ;
			} else {
				$orderlist2[] = $order ;
			}
		}

		$this->view->assign('orderlist1',@$orderlist1) ;
		$this->view->assign('orderlist2',@$orderlist2) ;
		$this->view->assign('orderlist',$orderlist) ;
		$this->view->display('user_myorder.php','club');
	}
}

?>