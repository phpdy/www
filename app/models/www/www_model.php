<?php
//

class www_model extends BaseModel {
	protected $dbIndex = 'phpcms';
	protected $dbTable = "v9_www" ;
	
	protected $items = array('catid','title','description','content','thumb','inputtime','posids') ;


	protected function getOrder(){
		return "order by inputtime desc" ;
	}
	
	public function getDataList($pid){
		
		$sql = "select * from v9_www where catid=$pid order by id" ;
		$result = $this->getAll($sql) ;
		
		return $result ;
	}
	public function getAllDataList($pid){
		
		$sql = "select w.*,c.catname from v9_www w,v9_category c where c.catid = w.catid and c.parentid=$pid order by w.inputtime desc" ;
		$result = $this->getAll($sql) ;
		
		return $result ;
	}

	public function getDataByid($id){
		$sql = "select v.*,d.content from v9_www v,v9_www_data d where v.id=$id and v.id = d.id" ;
		$result = $this->getOne($sql) ;
		
		return $result ;
	}

	public function getDataByPid($pid){
		$sql = "select v.*,d.content from v9_www v,v9_www_data d where v.catid=$pid and v.id = d.id order by v.inputtime desc" ;
		$result = $this->getAll($sql) ;
		return $result ;
	}
	public function getContentById($id){
		$sql = "select id,content from v9_www_data where id=$id" ;
		$result = $this->getOne($sql) ;
		
		return $result ;
	}
}


