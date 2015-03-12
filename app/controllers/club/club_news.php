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
		$this->view->display('news.php');
	}
	
}
?>