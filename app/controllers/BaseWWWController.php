<?php

class BaseWWWController extends BaseController {
	
	public $index_category ;
	public $www_model ;
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
		
		$this->index_category = $this->initModel('index_category','index');
		$this->www_model = $this->initModel('www_model','www');
		
		$categoryList = $this->index_category->queryAll() ;
		$this->view->assign('categoryList',$categoryList) ;
		
		$this->view->assign('idlist',$this->idlist) ;
	}
	
	public function destroy(){
		$this->view->display('comm-footer.php');
	}
	
	protected function getUserID(){
		@session_start ();
		$userid = $_SESSION [FinalClass::$_session_user]['id'] ;
		return $userid ;
	}
	
}

?>