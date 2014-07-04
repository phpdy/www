<?php
//
class www_category extends BaseModel {
	protected $dbIndex = 'phpcms';
	protected $dbTable = "v9_category" ;
	
	protected $items = array('catid','parentid','catname','image','description','catdir','type') ;


	protected function getOrder(){
		return "order by catid " ;
	}
	
}
