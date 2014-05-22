<?php
//
class pictue_model extends BaseModel {
	protected $dbIndex = 'phpcms';
	protected $dbTable = "v9_picture" ;
	
	protected $items = array('title','thumb','keywords','description','url','imgurl','islink') ;


	protected function getOrder(){
		return "order by id desc" ;
	}
	
}

