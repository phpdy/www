<?php

class www_change extends BaseWWWController {
	
	public function init(){
//		$this->www_model = $this->initModel('www_model','www');
		$this->www_change = $this->initModel('www_changeModel','www');
		
		$this->view->display('comm-title.php');
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;

		$id=$_GET['id'] ;
		$catid=$_GET['catid'] ;
		$list = $this->www_change->findData($id) ;
		$log .="|".sizeof($list) ;
		$maxid = $this->www_change->getMaxId() ;
		$log .="|".$maxid ;
		
		$set = array() ;
		foreach ($list as $key=>$value){
			$postid = $value['id'] ;
			if(in_array($postid,$set)){
				continue ;
			}
			$set[] = $postid ;
			
			$_id = $key+1+$maxid ;
			$this->www_change->insert($_id,$value,$catid) ;
		}
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
	}
	
}
?>