<?php

class www_detail extends BaseWWWController {
	
	public function init(){
//		$this->www_model = $this->initModel('www_model','www');
//		$this->www_category = $this->initModel('www_category','www');
		
		$this->view->display2('title.php','comm');
	}

	public function destroy(){
		$this->view->display2('footer.php','comm');
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$id = $_GET['id'] ;
		$info = $this->www_model->getDataByid($id) ;
		$this->view->assign('info',$info) ;
		
		$catid = $info['catid'] ;
		$list = $this->www_category->query(array('catid'=>$catid)) ;
		$this->view->assign('cat',$list[0]) ;
		
		$this->view->assign('tid',$_GET['tid']) ;
		$this->view->assign('pid',$_GET['pid']) ;
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('detail.php');
	}
	
}
?>