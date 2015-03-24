<?php
//

class www_changeModel extends BaseModel {
	protected $dbIndex = 'phpcms';
	protected $dbTable = "v9_www" ;
	
	protected $items = array('catid','title','keywords','content','updatetime') ;


	protected function getOrder(){
		return "order by catid" ;
	}
	
	public function findData($catid){
		$catid = htmlspecialchars($catid, ENT_QUOTES) ;
		$sql = "SELECT d.id,post_title,post_excerpt,post_content,post_date,post_modified FROM cafe.cafe_terms a,cafe.cafe_term_taxonomy b,cafe.cafe_term_relationships c ,cafe.cafe_posts d
		WHERE a.term_id IN ($catid) AND a.term_id=b.term_id AND b.term_taxonomy_id = c.term_taxonomy_id AND c.object_id=d.id
		ORDER BY d.post_modified DESC" ;
		$result = $this->getAll($sql) ;
		log::logBehavior(__CLASS__."|".__FUNCTION__."|".$sql." >> ".sizeof($result));
		
		return $result ;
	}
	
	public function getMaxId(){
		$sql = "select max(id) id from v9_www" ;
		$result = $this->getOne($sql) ;
		
		log::logBehavior(__CLASS__."|".__FUNCTION__."|".$sql." >> ".$result['id']);
		
		return $result['id'] ;
	}

	public function insert($id,$value,$catid){
		$inputtime = strtotime($value['post_date']) ;
		$updatetime = strtotime($value['post_modified']) ;
		$id = htmlspecialchars($id, ENT_QUOTES) ;
		$catid = htmlspecialchars($catid, ENT_QUOTES) ;
		$sql = "insert into v9_www (id,catid,title,keywords,description,inputtime,updatetime,status,sysadd,username) ".
		" values($id,$catid,'$value[post_title]','$value[post_title]','$value[post_excerpt]',$inputtime,$updatetime,99,1,'phpcms')" ;
		$result = $this->excuteSQL($sql) ;
		
		log::logBehavior(__CLASS__."|".__FUNCTION__."|".$sql." >> ".$result);
		
		$sql = "insert into v9_www_data (id,content) values($id, (select  post_content from cafe.cafe_posts where id=$value[id]))" ;
		$result = $this->excuteSQL($sql) ;
		log::logBehavior(__CLASS__."|".__FUNCTION__."|".$sql." >> ".$result);

		return $result ;
	}
	
}


