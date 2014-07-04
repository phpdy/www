<?php

class pay_index extends BaseController {

	public function init(){
		$this->userinfo_model = $this->initModel('userinfo_model','user');
		$this->pay_model = $this->initModel('pay_model');
		
		$this->view->assign('t',5) ;
		
		$title = array(
			0	=> '首页' ,
			1	=> '摄影之旅' ,
			2	=> '摄影课程' ,
			3	=> '公益活动' ,
			4	=> '关于我们' ,
			5	=> '会员中心' ,
		) ;
		$this->view->assign('title',$title) ;
		$this->view->display2('title.php','comm');
	}
	public function destroy(){
		$this->view->display2('footer.php','comm');
	}
	
	public function defaultAction(){
//		print_r($_SERVER) ; die();
		//用户登录检验
		@session_start ();
		$user = $_SESSION[FinalClass::$_session_user] ;
		if(empty($user)){
			header("location:login.php?url=".urldecode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		
		$typeid = empty($_GET['typeid'])?0:$_GET['typeid'] ;
		$this->view->assign('typeid',$typeid) ;
		$this->view->assign('user',$user) ;
		
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