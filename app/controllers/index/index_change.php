<?php

class index_change extends BaseController {
	
	public function init(){
//		$this->index_model = $this->initModel('index_model','index');
		$this->index_change = $this->initModel('index_changeModel','index');
		
		$this->view->display2('title.php','comm');
	}

	public function destroy(){
		$this->view->display2('footer.php','comm');
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;

		$id=$_GET['id'] ;
		$catid=$_GET['catid'] ;
		$list = $this->index_change->findData($id) ;
		$log .="|".sizeof($list) ;
		$maxid = $this->index_change->getMaxId() ;
		$log .="|".$maxid ;
		
		$set = array() ;
		foreach ($list as $key=>$value){
			$postid = $value['id'] ;
			if(in_array($postid,$set)){
				continue ;
			}
			$set[] = $postid ;
			
			$_id = $key+1+$maxid ;
			$this->index_change->insert($_id,$value,$catid) ;
		}
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
	}
	
}
?>