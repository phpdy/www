<?php

class www_index extends BaseWWWController {
	private $_id = 59 ;
	
	public function init(){
//		$this->www_model = $this->initModel('www_model','www');
//		$this->www_category = $this->initModel('www_category','www');
		$this->pictue_model = $this->initModel('pictue_model','index');
		
		$this->view->assign('tid',$this->_id) ;
		$this->view->display('comm-title.php');
	}

	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->index_category->query(array('parentid'=>59,'type'=>'0')) ;
		if(sizeof($list)>6){
			$list = array_splice($list,0,6) ;
		}
		$this->view->assign('list',$list) ;
		
		$piclist = $this->pictue_model->queryAll(array('catid'=>83)) ;
		$this->view->assign('piclist',$piclist) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('index.php');
	}
	
	public function indexAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->index_category->query(array('parentid'=>59,'type'=>'0')) ;
		if(sizeof($list)>6){
			$list = array_splice($list,0,6) ;
		}
		$this->view->assign('list',$list) ;

		//首页添加最新消息
		$newlist = $this->www_model->query(array('posids'=>1)) ;
		$this->view->assign('newlist',$newlist) ;
		//关于我们
		$our = $this->www_model->getDataByPid(62) ;
		$this->view->assign('our',$our[0]) ;

		$piclist = $this->pictue_model->queryAll(array('catid'=>83)) ;
		$this->view->assign('piclist',$piclist) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('index2.php');
	}
}
?>