<?php

class club_info extends BaseClubController {

	private $type = 4;
	public function init(){
	
		$this->view->assign('t',$this->type) ;
		
		$this->view->display('comm-title.php');
	}
	
	public function defaultAction(){
		
		$id = @$_GET['id'] ;
		if(empty($id)){
			$list = $this->club_model->getAllByCatid(50) ;
			
			if(sizeof($list)>=1){
				$id = $list[0]['id'] ;
			}
		}
		$result = $this->club_model->getContent($id) ;
		$this->view->assign('result',$result) ;
		
		$this->view->display('info.php');
	}
	
}
?>