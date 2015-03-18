<?php

class BaseClubController extends BaseController {
	
	public $club_model ;
	
	public $psize =8;
	
	public $description = "纽摄俱乐部与纽约摄影学院全科专业摄影课程同属“纽摄教育“旗下品牌。作为业界高端行摄品牌，自2006年起在中国以及世界地举办各类摄影活动和摄影团，邀约众多专业摄影名家，为追求高品质摄影的个人和团体提供非同一般的行摄感受和专业指导。" ;
	public $keywords = "北京纽摄教育科技有限公司,纽摄俱乐部,摄影团,摄影,旅游" ;
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