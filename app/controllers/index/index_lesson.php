<?php

class index_lesson extends BaseController {
	private $_id = 59 ;
	
	public function init(){
//		$this->index_category = $this->initModel('index_category','index');
//		$this->index_model = $this->initModel('index_model','index');
		$this->index_page = $this->initModel('index_page','index');
		
		$this->view->assign('tid',$this->_id) ;
		$this->view->display2('title.php','comm');
	}

	public function destroy(){
		$this->view->display2('footer.php','comm');
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->index_category->query(array('parentid'=>$this->_id,'type'=>'0')) ;
		//剔除最后报名信息
		unset($list[sizeof($list)-1]) ;
		$this->view->assign('list',$list) ;
		$this->view->assign('type','lesson') ;
		
		$catid = $_GET['id'] ;
		if(empty($catid)){
			return $this->index($list);
		}
		foreach ($list as $value){
	  		if($value['catid']==$catid){
	  			$cat = $value ;
	  		}
	  	}
		$this->view->assign('cat',$cat) ;
		
		$info = $this->index_model->getDataByPid($catid) ;
		$this->view->assign('info',$info) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('lesson.php');
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
			$info = $this->index_model->getDataByPid($id) ;
			$infolist = array_merge($infolist,$info) ;
		}
		$this->view->assign('info',$infolist) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('photo.php');
	}
}
?>