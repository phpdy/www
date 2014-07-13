<?php

class BaseUserController extends BaseController {
	
	public $type = "club" ;
	public $userinfo_model ;
	public $pay_model ;
	public $club_model ;
	
	private $infolist = array(
		'www' => array(
			'title' => '' ,
			'info'	=> '' ,
			'desc'	=> '' ,
		),
		'club' => array(
			'title' => '' ,
			'info'	=> '' ,
			'desc'	=> '' ,
		),
	) ;
	function __construct(){
		parent::__construct() ;
		$this->start = microtime(true)*1000 ;
	
		if(!empty($_GET['type'])){
			$this->type = $_GET['type'] ;
		}
		
		$this->userinfo_model = $this->initModel('userinfo_model','user');
		$this->pay_model = $this->initModel('pay_model','user');
		$this->club_model = $this->initModel('club_model','club');
		
		$this->view->assign('msginfo',$this->infolist[$this->type]) ;
		
		$this->view->assign('t',5) ;
		$this->view->display2('comm-title.php',$this->type);
	}
	
	public function destroy(){
		$this->view->display2('comm-footer.php',$this->type);
	}
	
}

?>