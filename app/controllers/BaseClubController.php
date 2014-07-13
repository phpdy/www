<?php

class BaseClubController extends BaseController {
	
	public $club_model ;
	
	public $psize =8;
	function __construct(){
		parent::__construct() ;
	
		$this->club_model = $this->initModel('club_model','club');
	}
	
	public function destroy(){
		$this->view->display2('comm-footer.php','club');
	}
	
	protected function getUserID(){
		@session_start ();
		$userid = $_SESSION [FinalClass::$_session_user]['id'] ;
		return $userid ;
	}
	
}

?>