<?php

class www_photo extends BaseWWWController {
	private $_id = 60 ;
	
	public function init(){
//		$this->www_category = $this->initModel('www_category','www');
//		$this->www_model = $this->initModel('www_model','www');
		$this->index_page = $this->initModel('index_page','index');
		
		$this->view->assign('tid',$this->_id) ;
		$this->view->display('comm-title.php');
	}

	//栏目首页
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->index_category->query(array('parentid'=>$this->_id,'type'=>'0')) ;
		$this->view->assign('list',$list) ;
		$this->view->assign('type','photo') ;
		
		$id = @$_GET['id'] ;
		if(empty($id)){
			$this->index($list);
		} else {
			foreach ($list as $value){
		  		if($value['catid']==$id){
		  			$cat = $value ;
		  		}
		  	}
			$this->view->assign('cat',$cat) ;
			
			$info = $this->www_model->getDataByPid($id) ;
			$this->view->assign('info',$info) ;
		}
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('photo.php');
	}
	
	//频道首页
	public function index($list){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list2 = $this->index_category->query(array('parentid'=>$this->_id,'type'=>'1')) ;
		$catid = $list2[0]['catid'] ;
		$log.="|$catid" ;
		
		$page = $this->index_page->getDatByCateid($catid) ;
		$cat = array(
			'catname'		=>	$page['title'],
			'description'	=>	$page['content'],
		) ;
		$this->view->assign('cat',$cat) ;
		
		$infolist = array();
		foreach ($list as $value){
			$id = $value['catid'] ;
			$info = $this->www_model->getDataByPid($id) ;
			$infolist = array_merge($infolist,$info) ;
		}
		$this->view->assign('info',$infolist) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
	}
}
?>