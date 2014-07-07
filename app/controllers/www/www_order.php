<?php

class www_order extends BaseWWWController {
	
	public function init(){
		$this->club_model = $this->initModel('club_model','club');
		
		$this->view->display('comm-title.php');
	}

	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$id = $_GET['catid'] ;
		if(empty($id)){
			$id = 84 ;
		}
		$list = $this->club_model->query(array('catid'=>$id)) ;
		$info = $list[0] ;
		
		$content = $this->club_model->getContent($info['id']) ;
		$info['content'] = $content['content'] ;
		$this->view->assign('info',$info) ;
		//print_r($info) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('bm.php');
	}
	
}
?>