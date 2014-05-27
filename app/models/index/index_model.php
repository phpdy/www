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
		
		$sql = "select id,catid,title,thumb,description,url,startdate,closedate,fee from v9_www where catid=$pid order by startdate desc" ;
		$result = $this->getAll($sql) ;
		
		foreach ($result as $item){
//			$time = $item['inputtime'] ;
			$newItem = array(
				'id'		=>	$item['id'] ,
				'imgurl'	=>	$item['thumb'] ,
				'title'		=>	$item['title'] ,
				'desc'		=>	$item['description'] ,
				'startdate'	=>	$item['startdate'] ,
				'closedate'	=>	$item['closedate'] ,
//				'time'		=>	$time ,
//				'date'		=>	date('Y-m-d ',$time) ,
			) ;
			$newlist[] = $newItem ;
		}
		
		return $newlist ;
	}

	public function getDataByid($id){
		$sql = "select id,catid,title,thumb,description,url,inputtime,startdate,closedate,fee from v9_www where id=$id" ;
		$result = $this->getOne($sql) ;
		
		return $result ;
	}
	
	public function getContentById($id){
		$sql = "select id,content from v9_www_data where id=$id" ;
		$result = $this->getOne($sql) ;
		
		return $result ;
	}
}

