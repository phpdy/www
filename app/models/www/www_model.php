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
		$pid = htmlspecialchars($pid, ENT_QUOTES) ;
		$sql = "select * from v9_www where catid=? order by id" ;
		$result = $this->getAll($sql,array($pid)) ;
		
		return $result ;
	}
	public function getAllDataList($pid){
		
		$pid = htmlspecialchars($pid, ENT_QUOTES) ;
		$sql = "select w.*,c.catname from v9_www w,v9_category c where c.catid = w.catid and c.parentid=? order by w.inputtime desc" ;
		$result = $this->getAll($sql,array($pid)) ;
		
		return $result ;
	}

	public function getDataByid($id){
		
		$id = htmlspecialchars($id, ENT_QUOTES) ;
		$sql = "select v.*,d.content from v9_www v,v9_www_data d where v.id=? and v.id = d.id" ;
		$result = $this->getOne($sql,array($id)) ;
		
		return $result ;
	}

	public function getDataByPid($pid){
		$pid = htmlspecialchars($pid, ENT_QUOTES) ;
		$sql = "select v.*,d.content from v9_www v,v9_www_data d where v.catid=? and v.id = d.id order by v.inputtime desc" ;
		$result = $this->getAll($sql,array($pid)) ;
		return $result ;
	}
	public function getContentById($id){
		$id = htmlspecialchars($id, ENT_QUOTES) ;
		$sql = "select id,content from v9_www_data where id=?" ;
		$result = $this->getOne($sql,array($id)) ;
		
		return $result ;
	}
}


