<?php

class index_photo extends BaseController {
	private $_id = 60 ;
	
	public function init(){
//		$this->index_category = $this->initModel('index_category','index');
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
		
		$list = $this->index_category->query(array('parentid'=>$this->_id)) ;
		$this->view->assign('list',$list) ;
		
		$id = $_GET['id'] ;
		if(empty($id)){
			$id = $list[0]['catid'] ;
		}
		foreach ($list as $value){
	  		if($value['catid']==$id){
	  			$cat = $value ;
	  		}
	  	}
		$this->view->assign('cat',$cat) ;
		
		$info = $this->index_model->getDataByPid($id) ;
		$this->view->assign('info',$info) ;
		
		$this->view->assign('type','photo') ;
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('photo.php');
	}
	
}
?>