<?php

class www_order extends BaseWWWController {
	
	public function init(){
		$this->payorder_model = $this->initModel('payorder_model','user');
		
		$this->view->display('comm-title.php');
	}

	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$id = $_GET['catid'] ;
		if(empty($id)){
			$id = 84 ;
		}
		$list = $this->payorder_model->query(array('catid'=>$id)) ;
		$info = $list[0] ;
		$content = $this->payorder_model->getContent($info['id']) ;
		$info['content'] = $content['content'] ;
		$this->view->assign('info',$info) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('bm.php');
	}
	
}
?>