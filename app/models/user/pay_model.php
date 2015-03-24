<?php
//支付
class pay_model extends BaseModel {
	protected $dbIndex = 'admin';
	protected $dbTable = "lesson_pay" ;
	
	//ptype 订单分类，俱乐部 4
	//pid 子分类ID ，活动ID
	//paytype 支付类别 在线支付/汇款
	//state 状态 未支付 0， 成功1，失败-1 退款 -2
	protected $items = array('orderid','ptype','state','userid','username','pid','money','paytype','paydate','other','recorder','recordtime') ;
	

	protected function getOrder(){
		return "order by orderid " ;
	}

	public function findOrderListByUserid($userid){
		
		$userid = htmlspecialchars($userid, ENT_QUOTES) ;
		$sql = "select orderid,userid,username,ptype,pid,paytype,paydate,state,money from ".$this->dbTable." where ptype=4 and userid=$userid order by paydate" ;
		$result = $this->getAll($sql) ;
		
		return $result ;
	}

	public function findOrderListByPid($pid){
		$pid = htmlspecialchars($pid, ENT_QUOTES) ;
		$sql = "select orderid,userid,username,ptype,pid,paytype,paydate,state,money from ".$this->dbTable." where ptype=4 and pid=$pid order by paydate" ;
		$result = $this->getAll($sql) ;
		return $result ;
	}

}

