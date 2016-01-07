<?php

class pay_alipay extends BaseController {

	public $alipay_config ;
	public function init(){
		$this->pay_model = $this->initModel('pay_model','user');
		//require_once(CONTROLLER_PATH."pay/alipay.config.php");
		//require_once(CONTROLLER_PATH."pay/lib/alipay_notify.class.php");
		//require_once(CONTROLLER_PATH."pay/lib/alipay_core.function.php");
		//require_once(CONTROLLER_PATH."pay/lib/alipay_md5.function.php");
		$this->alipay_config['partner']		= '2088211888882712';

		//安全检验码，以数字和字母组成的32位字符
		$this->alipay_config['key']			= 'syc026ywnlyo8dvxfmvljbnj4vzl3t2v';

		//签名方式 不需修改
		$this->alipay_config['sign_type']    = strtoupper('MD5');

		//字符编码格式 目前支持 gbk 或 utf-8
		$this->alipay_config['input_charset']= strtolower('utf-8');

		//ca证书路径地址，用于curl中ssl校验
		//请保证cacert.pem文件在当前文件夹目录中
		$this->alipay_config['cacert']    = getcwd().DS."alipay".DS.'cacert.pem';

		//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$this->alipay_config['transport']    = 'http';
	}
	
	public function notifyAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		//计算得出通知验证结果
		$alipayNotify = new AlipayNotify($this->alipay_config);
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
    		$orderid = $_REQUEST['out_trade_no'] ;
    		//订单成功，修改状态
    		$orderlist = $this->pay_model->query(array('orderid'=>$orderid)) ;
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
		
    	$orderid = $_REQUEST['out_trade_no'] ;

		//计算得出通知验证结果
		$alipayNotify = new AlipayNotify($this->alipay_config);
		$verify_result = $alipayNotify->verifyReturn();
		$log .= "|$orderid|".json_encode($_GET)."|$verify_result" ;

		if($verify_result) {//验证成功
		
		    if($_REQUEST['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
				//判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//如果有做过处理，不执行商户的业务程序
					$text="交易成功.";
		    }else if($_REQUEST['trade_status'] == 'TRADE_FINISHED') {
				//判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//如果有做过处理，不执行商户的业务程序
					$text="交易成功，感谢您的参与";
		    }
		    //修改状态
			//订单成功，修改状态
			
    		$orderlist = $this->pay_model->query(array('orderid'=>$orderid)) ;
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
		header("Location: pay.php?action=success&orderid=$orderid&text=".$text);
	}
	/**
	public function dbAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		if($_GET['re'] == "success") {//验证成功

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
	}*/
}
?>