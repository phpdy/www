<?php
//

class www_page extends BaseModel {
	protected $dbIndex = 'phpcms';
	protected $dbTable = "v9_page" ;
	
	protected $items = array('catid','title','keywords','content','updatetime') ;


	protected function getOrder(){
		return "order by catid" ;
	}
	
	public function getDatByCateid($catid){
		
		$sql = "select * from v9_page where catid=$catid " ;
		$result = $this->getOne($sql) ;
		
		return $result ;
	}
}


