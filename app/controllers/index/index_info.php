<?php

class index_info extends BaseController {
	private $_id = 63 ;
	
	public function init(){
//		$this->index_model = $this->initModel('index_model','index');
		
		$this->view->assign('tid',$this->_id) ;
		$this->view->display2('title.php','comm');
	}

	public function destroy(){
		$this->view->display2('footer.php','comm');
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$id = $_GET['id'] ;
		if(empty($id)){
			$id = $this->_id ;
		}
		$list = $this->index_model->getDataByPid($id) ;
		$this->view->assign('info',$list[0]) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('detail.php');
	}
	
}
?>