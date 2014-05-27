<?php

class index_index extends BaseController {
	private $_id = 59 ;
	
	public function init(){
		$this->index_model = $this->initModel('index_model','index');
		$this->index_category = $this->initModel('index_category','index');
		
		$this->view->display2('title.php','comm');
	}

	public function destroy(){
		$this->view->display2('footer.php','comm');
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->index_category->query(array('parentid'=>59)) ;
		$this->view->assign('list',$list) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('index.php');
	}
	
}
?>