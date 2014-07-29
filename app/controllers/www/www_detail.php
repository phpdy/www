<?php

class www_detail extends BaseWWWController {
	
	public function init(){
//		$this->www_model = $this->initModel('www_model','www');
//		$this->www_category = $this->initModel('www_category','www');
		
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		//最新资讯下载(90)处理，必须登录，且是全科学员才可以下载
		if (@$_GET['pid']==90){
			@session_start ();
			$user = @$_SESSION[FinalClass::$_session_user] ;
			if(empty($user)){
				header("location:user.php?action=login&url=".urlencode($_SERVER['REQUEST_URI'])) ;
				die() ;
			}
			//判断是否是全科学员，2
			$memberid = $user['memberid'] ;
			if(!strstr($memberid,"2")){
				//echo "《最新资料》仅供纽约摄影学院全科专业摄影课程学员登陆后下载。" ;
				echo "<script language=javascript>
				alert('《最新资料》仅供纽约摄影学院全科专业摄影课程学员登陆后下载。');
				document.location.href='index.php?control=student&id=90';</script>" ;
				die() ;
			}
		}
		
		$id = $_GET['id'] ;
		$info = $this->www_model->getDataByid($id) ;
		$this->view->assign('info',$info) ;
		
		$catid = $info['catid'] ;
		$list = $this->index_category->query(array('catid'=>$catid)) ;
		$this->view->assign('cat',$list[0]) ;
		
		$this->view->assign('tid',$_GET['tid']) ;
		$this->view->assign('pid',$_GET['pid']) ;
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('comm-title.php');
		$this->view->display('detail.php');
	}
	
}
?>