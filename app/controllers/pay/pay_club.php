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
		
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
//		print_r($_SERVER) ; die();
		//用户登录检验
		@session_start ();
		$user = $_SESSION[FinalClass::$_session_user] ;
		if(empty($user)){
			header("location:user.php?url=".urlencode($_SERVER['REQUEST_URI'])) ;
			$log .= "|user.php?url=".urlencode($_SERVER['REQUEST_URI']) ;
			$log .="|".(int)(microtime(true)-$start) ;
			log::info($log);
			die() ;
		}
		
		//用户信息完整性校验
		$user = $this->userinfo_model->queryById($user['id']) ;
		if(empty($user['mobile']) || empty($user['address'])){
			header("location:user.php?action=info&url=".urlencode($_SERVER['REQUEST_URI'])) ;
			$log .= "|user.php?action=info&url=".urlencode($_SERVER['REQUEST_URI']) ;
			$log .="|".(int)(microtime(true)-$start) ;
			log::info($log);
			die() ;
		}
	
		//判断是否已经提过单，避免重复提单
		$request = array(
			'userid'	=>$user['id'],
			'pid'		=>$_GET['id'],
		);
		$orderlist = $this->pay_model->query($request) ;
		if(!empty($orderlist) && is_array($orderlist)){
			echo "<script language=javascript>
			alert('您已经成功报名了本活动，您可以到“我的订单”中进行操作，谢谢！');
			document.location.href='user.php?action=myorder';</script>" ;
			
			$log .="|user.php?action=myorder|".(int)(microtime(true)-$start) ;
			log::info($log);
			die();
		}
		
		$id = empty($_GET['id'])?0:$_GET['id'] ;
		$result = $this->club_model->queryById($id) ;
		$this->view->assign('id',$id) ;
		$this->view->assign('news',$result) ;
		$this->view->assign('user',$user) ;
		
		$this->view->display2('comm-title.php','club');
		$this->view->display('pay_order.php','club');
		$log .="|0|".(int)(microtime(true)-$start) ;
		log::info($log);
	}

	public function aliAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$id = empty($_GET['id'])?0:$_GET['id'] ;
		$order = $this->Order($id,'在线支付') ;
		
		$log .= "|$id,0在线支付|".sizeof($order) ;
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		header("location:alipay/alipayapi.php?orderid=$order[orderid]&money=$order[money]") ;
//		$this->view->display('pay_order.php');
	}
	public function hkAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$id = empty($_GET['id'])?0:$_GET['id'] ;
		$order = $this->Order($id,'汇款') ;
		
		$log .= "|$id,1汇款|".sizeof($order) ;
		
		$this->view->assign('order',$order) ;
		
		$result = $this->club_model->queryById($id) ;
		$this->view->assign('news',$result) ;
		
		$this->view->display2('comm-title.php','club');
		$this->view->display('pay_hk.php','club');
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
	}
	public function freeAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		if(empty($_GET['id'])){
			echo "请求连接已被修改，请重新请求。" ;
			die() ;
		}
		$id = $_GET['id'] ;
		$result = $this->club_model->queryById($id) ;
		if(empty($result) || !is_array($result)){
			echo "请不要修改连接地址。" ;
			die() ;
		}
		$order = $this->Order($id,'免费报名') ;
		$log .= "|$id,-1免费报名|".sizeof($order) ;
		$pay = array(
    		'id'	=>$order['id'],
    		'state'	=>1,
    	) ;
    	$this->pay_model->update($pay) ;
    	
		$this->view->assign('order',$order) ;
		$this->view->assign('news',$result) ;
		
		$text = "免费报名成功！" ;
		$this->view->assign('text',$text) ;
		$this->view->display2('comm-title.php','club');
		$this->view->display('pay_free.php','club');
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
	}
	//在线支付回调地址
	public function successAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$log .= "|".$_GET['orderid'] ;
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
		
		$this->view->display2('comm-title.php','club');
		$this->view->display('pay_ali.php','club');
		$log .="|$text|".(int)(microtime(true)-$start) ;
		log::info($log);
	}

	//订单入库
	private function Order($id,$paytype){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
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
		
		//判断是否已经提过单，避免重复提单
		$request = array(
			'userid'	=>$user['id'],
			'pid'		=>$id,
		);
		$orderlist = $this->pay_model->query($request) ;
		if(!empty($orderlist) && is_array($orderlist)){
			echo "<script language=javascript>
			alert('您已经成功报名了本活动，您可以到“我的订单”中进行操作，谢谢！');
			document.location.href='user.php?action=myorder';</script>" ;
			
			$log .= "|".json_encode($request) ."|order is exit|".(int)(microtime(true)-$start) ;
			log::info($log);
			die();
		}
		
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
		
		$log .= "|".json_encode($order) ;
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		if($result){
			return $order ;
		} else {
			return $order ;
		}
	}
}
?>