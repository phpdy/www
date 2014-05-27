<?php

class index_ours extends BaseController {
	private $_id = 63 ;
	
	public function init(){
		$this->index_model = $this->initModel('index_model','index');
		
		$this->view->display2('title.php','comm');
	}

	public function destroy(){
		$this->view->display2('footer.php','comm');
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;

		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('ours.php');
	}
	
}
?>