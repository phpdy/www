<?php

class pay_index extends BaseController {

	public function init(){
		$this->userinfo_model = $this->initModel('userinfo_model','user');
		$this->pay_model = $this->initModel('pay_model','user');
		$this->club_model = $this->initModel('club_model','club');
		
	}
	public function destroy(){
		$this->view->display2('comm-footer.php','www');
	}
	
	//订单提单页面
	public function defaultAction(){
		//用户登录检验
		@session_start ();
		$user = @$_SESSION[FinalClass::$_session_user] ;
		if(empty($user)){
			header("location: user.php?action=reg&url=".urldecode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		$user = $this->userinfo_model->queryById($user['id']) ;
		$this->view->assign('user',$user) ;
		
		$pay = $this->club_model->queryById($_GET['id']) ;
		$this->view->assign('pay',$pay) ;
		
		$type = @$_GET['type'] ;
		$this->view->display2('comm-title.php','www');
		if(!empty($type) && $type == 'free'){
			$this->view->display('pay_free.php');
		} else {
			$this->view->display('pay_order.php');
		}
	}

	//支付宝支付
	public function aliAction(){
		$order = $this->Order(1,'在线支付',$_GET['id'],$_GET['fee']) ;
		if(!is_array($order)){
			$this->view->assign('text',$order) ;
			$this->view->display('result_ali.php');
		} else {
			header("location: alipay/alipayapi.php?orderid=$order[orderid]&money=$order[money]") ;
		}
//		$this->view->display('pay_order.php');
	}
	//汇款支付
	public function hkAction(){
		$order = $this->Order(1,'汇款',$_GET['id'],$_GET['fee']) ;
		if(!is_array($order)){
			$this->view->assign('text',$order) ;
		} else {
			$this->view->assign('text',"订单成功！") ;
			$this->view->assign('order',$order) ;
		}
		
		$this->view->display2('comm-title.php','www');
		$this->view->display('result_hk.php');
	}
	public function freeAction(){
		$start = microtime(true)*1000 ;
		$log = __CLASS__."|".__FUNCTION__ ;
		
		$t1 = $_GET['t1'] ;
		$t2 = @$_GET['t2'] ;
		$log .= "|$t1" ;
		if(!empty($t2)){
			$log .= "|".implode(",",$t2) ;
		}
		if($t1==1){
			$t = "-实物" ;
		} else {
			$t = "-电子" ;
		}
		$order = $this->Order(1,'免费领取'.$t,$_GET['id'],0) ;
		if(!is_array($order)){
			$this->view->assign('text',$order) ;
		} else {
			$this->view->assign('text',"领取成功！") ;
			$this->view->assign('order',$order) ;
		}
		
//		$this->view->display2('comm-title.php','www');
//		$this->view->display('result_free.php');
		header("location: index.php?control=detail&tid=59&id=652");
		$log .= '|' . (int)(microtime(true)*1000-$start);
		Log::logBusiness($log);
	}
	//支付宝支付成功页面
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
		
		$this->view->display2('comm-title.php','www');
		$this->view->display('result_ali.php');
	}
	
	/**
	 * 订单入库
	 * @param string $ptype 产品类型 全科1 俱乐部4 
	 * @param string $paytype 付款类型 ：在线支付、汇款、免费领取
	 * @param int $id	付款产品ID
	 * @param int $fee	付款金额 ，需要做校验
	 * @return unknown
	 */
	private function Order($ptype,$paytype,$id,$fee=0){
		//用户登录检验
		@session_start ();
		$user = $_SESSION[FinalClass::$_session_user] ;
		if(empty($user)){
			header("location:user.php?url=".urlencode($_SERVER['REQUEST_URI'])) ;
			die() ;
		}
		
		//用户信息完整性校验
		$user = $this->userinfo_model->queryById($user['id']) ;
	
		if(empty($id)){
			return "非法请求，请不要修改链接。" ;
		}
		$pay = $this->club_model->queryById($id) ;
		//金额校验
		if(!empty($fee) && $fee!=$pay['fee']){
			return "缴费金额不符，请不要修改链接。" ;
		}
		$order = array(
			'orderid'	=>	'NY'.time() ,
			'userid'	=>	$user['id'] ,
			'username'	=>	$user['username'] ,
			'ptype'		=>	$ptype ,
			'pid'		=>	$pay['id'] ,
			'money'		=>	$pay['fee'] ,
			'paytype'	=>	$paytype ,
			'paydate'	=>	date('Y-m-d H:i:s') ,
		) ;
		$result = $this->pay_model->insert($order) ;
		if($result){
			return $order ;
		} else {
			return "订单失败！" ;
		}
	}
	
}
?>