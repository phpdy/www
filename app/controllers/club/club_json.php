<?php

class club_json extends BaseController {

	public $psize =8;
	public function init(){
		$this->club_model = $this->initModel('club_model','club');
	}

	public function defaultAction(){
		$p  = empty($_GET['p'])?0:$_GET['p'] ;
		$t = $_GET['t'] ;
		switch ($t){
			case 1:
				$id = 47 ;
				break ;
			case 2:
				$id = 48 ;
				break ;
			case 3:
				$id = 49 ;
				//$id = empty($_GET['hid'])?49:$_GET['hid'] ;
				break ;
			case 4:
				$id = 51 ;
				break ;
			case 5:
				$id = 52 ;
				break ;
		}
		
		$list = $this->club_model->getAllByCatid($id) ;
//		print_r($list) ;
		if($id<49){
			$now = time() ;
			foreach ($list as $key=>$item){
				$time = strtotime($item['startdate']) ;
				if($time>$now){
					unset($list[$key]) ;
				}
			}
		}
//		$list = array_values($list) ;
		//前三个分类按时间排序，只取已经过时的活动，后面两个分类取所有的内容，剔除前面已经显示过的四个。
		$newlist['list'] = array_slice($list,$p*$this->psize,$this->psize) ;
		
		$newlist['page'] = $p+1 ; 
		$newlist['hasmore'] = sizeof($list)>($p+1)*$this->psize ; 
		
		echo json_encode($newlist) ;
	}
}
?>