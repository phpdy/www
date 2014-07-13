<?php

class pay_club extends BaseClubController {

	private $userinfo_model ;
	private $pay_model ;
	private $id ;
	public function init(){
		$this->userinfo_model = $this->initModel('userinfo_model','user');
		$this->pay_model = $this->initModel('pay_model','user');
		
		$this->view->assign('t',5) ;
		
		$id = empty($_GET['id'])?0:$_GET['id'] ;
		$this->id = $id ;
		$this->view->assign('id',$id) ;
		
		$this->view->display2('comm-title.php','club');
	}
	
	public function defaultAction(){
//		print_r($_SERVER) ; die();
		//用户登录检验
		@session_start ();
		$user = $_SESSION[FinalClass::$_session_user] ;
		if(empty($user)){
			header("location:user.php?url=".urlencode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		
		//用户信息完整性校验
		$user = $this->userinfo_model->queryById($user['id']) ;
		if(empty($user['mobile']) || empty($user['address'])){
			header("location:user.php?action=info&url=".urlencode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		$id = empty($_GET['id'])?0:$_GET['id'] ;
		$result = $this->club_model->queryById($id) ;
		$this->view->assign('id',$id) ;
		$this->view->assign('news',$result) ;
		$this->view->assign('user',$user) ;
		
		$this->view->display('pay_order.php','club');
	}

	public function aliAction(){
		$id = empty($_GET['id'])?0:$_GET['id'] ;
		$order = $this->Order($id,'在线支付') ;
		
		header("location:alipay/alipayapi.php?orderid=$order[orderid]&money=$order[money]") ;
//		$this->view->display('pay_order.php');
	}
	public function hkAction(){
		$id = empty($_GET['id'])?0:$_GET['id'] ;
		$order = $this->Order($id,'汇款') ;
		
		$this->view->assign('order',$order) ;
		
		$result = $this->club_model->queryById($id) ;
		$this->view->assign('news',$result) ;
		
		$this->view->display('pay_hk.php','club');
	}
	public function freeAction(){
		$id = empty($_GET['id'])?0:$_GET['id'] ;
		$order = $this->Order($id,'免费报名') ;
		
		$this->view->assign('order',$order) ;
		
		$result = $this->club_model->queryById($id) ;
		$this->view->assign('news',$result) ;
		
		$text = "免费报名成功！" ;
		$this->view->assign('text',$text) ;
		$this->view->display('pay_free.php','club');
	}
	public function successAction(){
		$orderlist = $this->pay_model->query(array('orderid'=>$_GET['orderid'])) ;
		
		$text = $_GET['text'] ;
		if($orderlist && is_array($orderlist)){
			$order = $orderlist[0] ;
			if($order['state']!='1'){
				$text = "支付未成功！" ;
			} else {
				$text = "支付成功！" ;
			}
			$this->view->assign('order',$order) ;
		} else {
			$text = "订单不存在！" ;
		}
		
		$this->view->assign('text',$text) ;
		
		$this->view->display('pay_ali.php','club');
	}

	private function Order($id,$paytype){
		
		//用户登录检验
		@session_start ();
		$user = $_SESSION[FinalClass::$_session_user] ;
		if(empty($user)){
			header("location: user.php?url=".urlencode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		
		//用户信息完整性校验
		$user = $this->userinfo_model->queryById($user['id']) ;
		
		$news = $this->club_model->queryById($id) ;
		
		$order = array(
			'orderid'	=>	'NY'.time() ,
			'userid'	=>	$user['id'] ,
			'username'	=>	$user['username'] ,
			'ptype'		=>	4 ,	//缴费类别 俱乐部活动
			'pid'		=>	$news['id'] ,
			'money'		=>	$news['fee'] ,
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