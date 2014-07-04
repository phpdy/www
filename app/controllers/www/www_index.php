<?php

class www_index extends BaseWWWController {
	private $_id = 59 ;
	
	public function init(){
//		$this->www_model = $this->initModel('www_model','www');
//		$this->www_category = $this->initModel('www_category','www');
		$this->pictue_model = $this->initModel('pictue_model','www');
		
		$this->view->assign('tid',$this->_id) ;
		$this->view->display('comm-title.php');
	}

	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->www_category->query(array('parentid'=>59,'type'=>'0')) ;
		$this->view->assign('list',$list) ;
		
		$piclist = $this->pictue_model->queryAll(array('catid'=>83)) ;
		$this->view->assign('piclist',$piclist) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('index.php');
	}
	
}
?>