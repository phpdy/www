<?php

class pay_alipay extends BaseController {

	public function init(){
		$this->pay_model = $this->initModel('pay_model','user');
		require_once(ROOT_PATH."club/alipay/alipay.config.php");
		require_once(ROOT_PATH."club/alipay/lib/alipay_notify.class.php");
		require_once(ROOT_PATH."club/alipay/lib/alipay_core.function.php");
		require_once(ROOT_PATH."club/alipay/lib/alipay_md5.function.php");
	}
	
	public function notifyAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		//计算得出通知验证结果
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyNotify();
		
		if($verify_result) {//验证成功

			if($_POST['trade_status'] == 'WAIT_BUYER_PAY') {
				$used='1';
				echo "success";		//请不要修改或删除
//				// }else if($_POST['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
//
//			
//       // echo "success";		//请不要修改或删除
//    //}else if($_POST['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') {
//	//该判断表示卖家已经发了货，但买家还没有做确认收货的操作
//	
//		//判断该笔订单是否在商户网站中已经做过处理
//			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
//			//如果有做过处理，不执行商户的业务程序
//			
//       // echo "success";		//请不要修改或删除
//    //}else if($_POST['trade_status'] == 'TRADE_FINISHED') {
//	//该判断表示买家已经确认收货，这笔交易完成
//	
//		//判断该笔订单是否在商户网站中已经做过处理
//			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
//			//如果有做过处理，不执行商户的业务程序
//			
//        //echo "success";		//请不要修改或删除
    		} else {
    			$used='2';
    			echo "success";
    		}
    		
    		//订单成功，修改状态
    		$orderlist = $this->pay_model->query(array('orderid'=>$_GET['orderid'])) ;
    		$pay = array(
    			'id'	=>$orderlist[0]['id'],
    			'state'	=>1,
    		) ;
    		$this->pay_model->update($pay) ;
    		
    		$log .="|success" ;
		} else {
			//验证失败
			echo "fail";
    		$log .="|fail" ;
		}
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
	}

	public function returnAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		

		//计算得出通知验证结果
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyReturn();
		$log .="|".$verify_result ;

		if($verify_result) {//验证成功
		
		    if($_GET['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
				//判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//如果有做过处理，不执行商户的业务程序
					$text="交易成功.";
		    }else if($_GET['trade_status'] == 'TRADE_FINISHED') {
				//判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//如果有做过处理，不执行商户的业务程序
					$text="交易成功，感谢您的参与";
		    }
		    //修改状态
			//订单成功，修改状态
    		$orderlist = $this->pay_model->query(array('orderid'=>$_GET['orderid'])) ;
    		$pay = array(
    			'id'	=>$orderlist[0]['id'],
    			'state'	=>1,
    		) ;
    		$this->pay_model->update($pay) ;
    		
		}else {
		    //验证失败
		   $text="交易失败";
		}
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		header("Location: pay.php?action=success&orderid=$_GET[orderid]&text=".$text);
	}
	
}
?>