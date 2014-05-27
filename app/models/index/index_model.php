<?php
//
class index_model extends BaseModel {
	protected $dbIndex = 'phpcms';
	protected $dbTable = "v9_www" ;
	
	protected $items = array('catid','title','description','content','thumb','inputtime') ;


	protected function getOrder(){
		return "order by inputtime desc" ;
	}
	
	public function getDataList($pid){
		
		$sql = "select * from v9_www where catid=$pid order by startdate desc" ;
		$result = $this->getAll($sql) ;
		
		return $newlist ;
	}

	public function getDataByid($id){
		$sql = "select * from v9_www where id=$id" ;
		$result = $this->getOne($sql) ;
		
		return $result ;
	}
	
	public function getContentById($id){
		$sql = "select id,content from v9_www_data where id=$id" ;
		$result = $this->getOne($sql) ;
		
		return $result ;
	}
}

