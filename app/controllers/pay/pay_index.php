<?php

class pay_index extends BaseController {

	public function init(){
		$this->userinfo_model = $this->initModel('userinfo_model','user');
		$this->pay_model = $this->initModel('pay_model','user');
		$this->payorder_model = $this->initModel('payorder_model','user');
		
		$this->view->display2('comm-title.php','www');
	}
	public function destroy(){
		$this->view->display2('comm-footer.php','www');
	}
	
	public function defaultAction(){
		//用户登录检验
		@session_start ();
		$user = $_SESSION[FinalClass::$_session_user] ;
		if(empty($user)){
			header("location: user.php?action=login&url=".urldecode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		$user = $this->userinfo_model->queryById($user['id']) ;
		$this->view->assign('user',$user) ;
		
		$pay = $this->payorder_model->queryById($_GET['id']) ;
		$this->view->assign('pay',$pay) ;
		
		$this->view->display('pay_order.php');
	}

	public function jumpAction(){

		//用户登录检验
		@session_start ();
		$user = $_SESSION[FinalClass::$_session_user] ;
		if(empty($user)){
			header("location:login.php?url=".urldecode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		
		$typeid = $_GET['typeid'] ;
		$orderid= "NY".time() ;
		$this->view->assign('typeid',$typeid) ;
		$this->view->assign('user',$user) ;
		$this->view->assign('orderid',$orderid) ;
		
//		$this->pay_model->insert() ;
		
		
		$this->view->display('pay_jump.php');
	}

	public function successAction(){
		$orderid = $_GET['orderid'] ;
		
		$this->view->assign('orderid',$orderid) ;
		
		$this->view->display('pay_jump.php');
	}
	
}
?>