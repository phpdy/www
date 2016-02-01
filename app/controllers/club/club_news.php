<?php

class club_news extends BaseClubController {

	private $type = 4;
	public function init(){
		$type = $_GET['t'] ;
		$this->type = $type ;
		$this->view->assign('t',$this->type) ;
		
	}
	
	public function defaultAction(){
		$id = $_GET['id'] ;
		$this->view->assign('id',$id) ;
		$news = $this->club_model->queryById($id) ;
		$this->view->assign('news',$news) ;
		
		
		$this->view->assign('description',$news['description']) ;
		$this->view->assign('keywords',$news['keywords']) ;
		$this->view->display('comm-title.php');

		$result = $this->club_model->getContent($id) ;
		$this->view->assign('result',$result) ;


	/**
	 * 1	=> '摄影之旅' ,47
	   2	=> '摄影课程' ,48
	 */
		$type = 47 ;
		if($this->type==2){
			$type=48;
		}
		$newslist = $this->club_model->getAllByCatid($type) ;
		$this->view->assign('newslists',$newslist) ;

		$this->view->display('news.php');
	}
	
}
?>