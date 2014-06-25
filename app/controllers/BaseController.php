<?php

class BaseController extends Controller {
	protected $start ;//起始时间
	
	private $idlist = array(
		59	=> 'lesson',
		60	=> 'photo',
		61	=> 'student',
		62	=> 'ours',
		63	=> 'info',
		64	=> 'faq',
	) ;
	function __construct(){
		$this->dir = $_GET['dir'] ;
		parent::__construct() ;
		$this->start = microtime(true)*1000 ;
		
		$this->index_category = $this->initModel('index_category','index');
		$this->index_model = $this->initModel('index_model','index');
		
		$categoryList = $this->index_category->queryAll() ;
		$this->view->assign('categoryList',$categoryList) ;
		
		$this->view->assign('idlist',$this->idlist) ;
	}
	
	public function safestr($str,$length = 0){
			$str = mysql_escape_string($str);
			$str = preg_replace("/<.*?>/i","",$str);
			if($length){
				$str = substr($str,0,$length);
			}
			$str=str_replace("'","",$str);
			$str=str_replace("\"","",$str);
			$str=str_replace("delete","",$str);
			$str=trim($str);
			return $str;
	}
	protected function getUserID(){
		@session_start ();
		$userid = $_SESSION [FinalClass::$_session_user]['id'] ;
		return $userid ;
	}
	
	protected function iconvArray($array){
		if (is_array($array))
		foreach ($array as $k=>$v){
			if(is_string($v)){
//				$v = urlencode($v) ;
//				$array[$k] = iconv('gb2312','utf-8',$v) ;
//				$array[$k] = iconv('gbk','utf-8',$v) ;
//				$array[$k] = iconv('utf-8','gbk',$v) ;
			}
			elseif(is_array($v)){
				$array[$k] = $this->encodeUtf8($v) ;
			}
			elseif (is_null($v)){
				$array[$k] = "" ;
			}
		}
		return $array ;
	}
}

?>