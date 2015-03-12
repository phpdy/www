<?php

class club_index extends BaseClubController {

	private $t = '0';
	public function init(){
		$this->pictue_model = $this->initModel('pictue_model','index');
		
		$this->view->assign('t',$this->t) ;
		
		$this->view->assign('description',$this->description) ;
		$this->view->assign('keywords',$this->keywords) ;

		$this->view->display('comm-title.php');
	}

	public function defaultAction(){
		
		$club47 = $this->club_model->getAllByCatid(47) ;
		$club48 = $this->club_model->getAllByCatid(48) ;
		$club49 = $this->club_model->getAllByCatid(49) ;
		
		$list = array(
			1	=>	array_slice($club47,0,4) ,
			2	=>	array_slice($club48,0,4) ,
			3	=>	array_slice($club49,0,4) ,
		) ;
		$this->view->assign('list',$list) ;


		$piclist = $this->pictue_model->getAllByCatid(57) ;
		$this->view->assign('piclist',$piclist) ;
		
		$this->view->display('index.php');
	}
	
}
?>