<?php
//订单显示内容页发布内容查询
class club_model extends BaseModel {
	protected $dbIndex = 'phpcms';
	protected $dbTable = "v9_club" ;
	protected $items = array('id','catid','title','thumb','description','url','startdate','closedate','inputtime','updatetime','fee','posids') ;
	

	protected function getOrder(){
		return " order by startdate desc" ;
	}

	public function getContent($id){
		$start = time() ;
		$log = __CLASS__."|".__FUNCTION__ ;
		$sql = "select a.*,c.content from ".$this->dbTable." a,".$this->dbTable."_data c where a.id=c.id and a.id=$id" ;
		$result = $this->getOne($sql) ;
		
		$log .= "|$sql|".$result['id']."|".(time()-$start) ;
		log::logBehavior($log);
		
		return $result ;
	}
	
	public function getAllByCatid($catid){
		$start = time() ;
		$log = __CLASS__."|".__FUNCTION__ ;
		$sql = "select * from ".$this->dbTable." where catid=$catid order by startdate desc" ;
		$result = $this->getAll($sql) ;
		
		$log .= "|$sql|".sizeof($result)."|".(time()-$start) ;
		log::logBehavior($log);
		
		return $result ;
	}
}

