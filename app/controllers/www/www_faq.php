<?php

class www_faq extends BaseWWWController {
	private $_id = 64 ;
	public function init(){
//		$this->www_model = $this->initModel('www_model','www');
		
		$this->view->assign('tid',$this->_id) ;
		$this->view->display2('title.php','comm');
	}

	public function destroy(){
		$this->view->display2('footer.php','comm');
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->www_model->getDataByPid($this->_id) ;
		$this->view->assign('info',$list[0]) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('detail.php');
	}
	
}
?>