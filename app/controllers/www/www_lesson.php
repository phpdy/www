<?php

class www_lesson extends BaseWWWController {
	private $_id = 59 ;
	
	public function init(){
//		$this->www_category = $this->initModel('www_category','www');
//		$this->www_model = $this->initModel('www_model','www');
		$this->www_page = $this->initModel('www_page','www');
		
		$this->view->assign('tid',$this->_id) ;
		$this->view->display('comm-title.php');
	}

	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->www_category->query(array('parentid'=>$this->_id,'type'=>'0')) ;
		//剔除最后报名信息
		unset($list[sizeof($list)-1]) ;
		$this->view->assign('list',$list) ;
		$this->view->assign('type','lesson') ;
		
		$catid = @$_GET['id'] ;
		if(empty($catid)){
			return $this->index();
		}
		foreach ($list as $value){
	  		if($value['catid']==$catid){
	  			$cat = $value ;
	  		}
	  	}
		$this->view->assign('cat',$cat) ;
		
		$info = $this->www_model->getDataByPid($catid) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		if ($catid==74){
			$this->view->assign('info',$info) ;
			$this->view->display('photo.php');
		} else {
			$this->view->assign('info',$info[0]) ;
			$this->view->display('lesson.php');
		}
	}

	//频道首页
	public function index(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$page = $this->www_page->getDatByCateid(81) ;
		$info = array(
			'inputtime'	=>	$page['updatetime'],
			'content'	=>	$page['content'],
		);
		$this->view->assign('info',$info) ;
		$this->view->assign('cat',array('catname'=>'课程信息')) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('lesson_index.php');
	}
}
?>