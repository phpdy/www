<?php
//
class pictue_model extends BaseModel {
	protected $dbIndex = 'phpcms';
	protected $dbTable = "v9_picture" ;
	
	protected $items = array('catid','title','thumb','keywords','description','url','imgurl','islink') ;


	protected function getOrder(){
		return "order by listorder" ;
	}

	public function getAllByCatid($catid){
		$start = time() ;
		$log = __CLASS__."|".__FUNCTION__ ;
		$sql = "select * from ".$this->dbTable." where catid=$catid order by listorder" ;
		$result = $this->getAll($sql) ;
		
		$log .= "|$sql|".sizeof($result)."|".(time()-$start) ;
		log::logBehavior($log);
		
		return $result ;
	}
}

