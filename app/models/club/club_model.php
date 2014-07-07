<?php
//订单显示内容页发布内容查询
class club_model extends BaseModel {
	protected $dbIndex = 'phpcms';
	protected $dbTable = "v9_club" ;
	protected $items = array('id','catid','title','thumb','description','url','startdate','closedate','inputtime','updatetime','fee') ;
	

	protected function getOrder(){
		return " order by startdate desc" ;
	}

	public function getContent($id){
		$sql = "select id,content from ".$this->dbTable."_data where id=$id" ;
		$result = $this->getOne($sql) ;
		
		log::logBehavior(__CLASS__."|".__FUNCTION__."|".$sql." >> ".$result['id']);
		
		return $result ;
	}
}

