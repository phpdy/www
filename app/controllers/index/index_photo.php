<?php

class index_photo extends BaseController {
	private $_id = 60 ;
	
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
	//栏目首页
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->index_category->query(array('parentid'=>$this->_id,'type'=>'0')) ;
		$this->view->assign('list',$list) ;
		$this->view->assign('type','photo') ;
		
		$id = $_GET['id'] ;
		if(empty($id)){
			return $this->index();
		}
		foreach ($list as $value){
	  		if($value['catid']==$id){
	  			$cat = $value ;
	  		}
	  	}
		$this->view->assign('cat',$cat) ;
		
		$info = $this->index_model->getDataByPid($id) ;
		$this->view->assign('info',$info) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('photo.php');
	}
	
	//频道首页
	public function index(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->index_category->query(array('parentid'=>$this->_id,'type'=>'1')) ;
		$catid = $list[0]['catid'] ;
		$log.="|$catid" ;
		
		$page = $this->index_page->getDatByCateid($catid) ;
		$this->view->assign('page',$page) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('page.php');
	}
}
?>