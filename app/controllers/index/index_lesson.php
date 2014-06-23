<?php

class index_lesson extends BaseController {
	private $_id = 59 ;
	
	public function init(){
		$this->index_category = $this->initModel('index_category','index');
		$this->index_model = $this->initModel('index_model','index');
		
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
		
		$catid = $_GET['catid'] ;
		if(empty($catid)){
			$catid = $list[0]['catid'] ;
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

}
?>