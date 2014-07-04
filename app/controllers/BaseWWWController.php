<?php

class BaseWWWController extends BaseController {
	
	private $idlist = array(
		59	=> 'lesson',
		60	=> 'photo',
		61	=> 'student',
		62	=> 'ours',
		63	=> 'info',
		64	=> 'faq',
	) ;
	function __construct(){
		parent::__construct() ;
		$this->start = microtime(true)*1000 ;
		
		$this->www_category = $this->initModel('www_category','www');
		$this->www_model = $this->initModel('www_model','www');
		
		$categoryList = $this->www_category->queryAll() ;
		$this->view->assign('categoryList',$categoryList) ;
		
		$this->view->assign('idlist',$this->idlist) ;
	}
	
	protected function getUserID(){
		@session_start ();
		$userid = $_SESSION [FinalClass::$_session_user]['id'] ;
		return $userid ;
	}
	
}

?>