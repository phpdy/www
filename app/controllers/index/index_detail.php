<?php

class index_detail extends BaseController {
	
	public function init(){
//		$this->index_model = $this->initModel('index_model','index');
//		$this->index_category = $this->initModel('index_category','index');
		
		$this->view->display2('title.php','comm');
	}

	public function destroy(){
		$this->view->display2('footer.php','comm');
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$id = $_GET['id'] ;
		$info = $this->index_model->getDataByid($id) ;
		$this->view->assign('info',$info) ;
		
		$catid = $info['catid'] ;
		$list = $this->index_category->query(array('catid'=>$catid)) ;
		$this->view->assign('cat',$list[0]) ;
		
		$this->view->assign('tid',$_GET['tid']) ;
		$this->view->assign('pid',$_GET['pid']) ;
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('detail.php');
	}
	
}
?>