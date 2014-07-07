<?php

class pay_index extends BaseController {

	public function init(){
		$this->userinfo_model = $this->initModel('userinfo_model','user');
		$this->pay_model = $this->initModel('pay_model','user');
		$this->club_model = $this->initModel('club_model','club');
		
		$this->view->display2('comm-title.php','www');
	}
	public function destroy(){
		$this->view->display2('comm-footer.php','www');
	}
	
	//订单提单页面
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
		
		$pay = $this->club_model->queryById($_GET['id']) ;
		$this->view->assign('pay',$pay) ;
		
		$this->view->display('pay_order.php');
	}

	//支付宝支付
	public function aliAction(){
		$order = $this->Order('在线支付') ;
		
		header("location: alipay/alipayapi.php?orderid=$order[orderid]&money=$order[money]") ;
//		$this->view->display('pay_order.php');
	}
	//汇款支付
	public function hkAction(){
		$order = $this->Order('汇款') ;
		
		$this->view->assign('order',$order) ;
		
		$this->view->display('pay_hk.php');
	}
	//支付宝支付成功页面
	public function successAction(){
		$order = $this->pay_model->query(array('orderid'=>$_GET['orderid'])) ;
		
		$this->view->assign('order',$order[0]) ;
		$this->view->assign('text',$_GET['text']) ;
		
		$this->view->display('pay_ali.php');
	}
	//订单入库
	private function Order($paytype){
		
		//用户登录检验
		@session_start ();
		$user = $_SESSION[FinalClass::$_session_user] ;
		if(empty($user)){
			header("location:login.php?url=".urlencode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		
		//用户信息完整性校验
		$user = $this->userinfo_model->queryById($user['id']) ;
		
		$pay = $this->club_model->queryById($_GET['id']) ;
		
		$order = array(
			'orderid'	=>	'NY'.time() ,
			'userid'	=>	$user['id'] ,
			'username'	=>	$user['username'] ,
			'ptype'		=>	1 ,
			'pid'		=>	$pay['id'] ,
			'money'		=>	$pay['fee'] ,
			'paytype'	=>	$paytype ,
			'paydate'	=>	date('Y-m-d H:i:s') ,
		) ;
		$result = $this->pay_model->insert($order) ;
		if($result){
			return $order ;
		} else {
			return $order ;
		}
	}
	
}
?>