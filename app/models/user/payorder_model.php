<?php
//订单显示内容页发布内容查询
class payorder_model extends BaseModel {
	protected $dbIndex = 'phpcms';
	protected $dbTable = "v9_order" ;
	
	protected $items = array('id','catid','title','description','inputtime','updatetime','money') ;
	

	protected function getOrder(){
		return "order by id " ;
	}

	public function getContent($id){
		$sql = "select id,content from v9_order_data where id=$id" ;
		$result = $this->getOne($sql) ;
		
		log::logBehavior(__CLASS__."|".__FUNCTION__."|".$sql." >> ".$result['id']);
		
		return $result ;
	}
}

