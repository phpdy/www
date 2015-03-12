<?php

class BaseClubController extends BaseController {
	
	public $club_model ;
	
	public $psize =8;
	
	public $description = "纽约摄影学院中国学员班成立于2005年，目的在于向更多中国专业摄影师及爱好者推广纽约摄影学院著名的远程互动式全科专业摄影课程。纽约摄影学院全科专业摄影课程的主要作者、纽约摄影学院名誉院长、Home Study School现任院长唐·谢夫先生，经由纽约摄影学院授权，亲自负责监督并独家授权北京纽摄教育科技有限公司在中国汉化并教授这套专业摄影课程。" ;
	public $keywords = "北京纽摄教育科技有限公司,远程教育,网络教育,其他,摄影" ;
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