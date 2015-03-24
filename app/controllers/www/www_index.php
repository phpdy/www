<?php

class www_index extends BaseWWWController {
	private $_id = 59 ;
	
	public function init(){
//		$this->www_model = $this->initModel('www_model','www');
//		$this->www_category = $this->initModel('www_category','www');
		$this->pictue_model = $this->initModel('pictue_model','index');
		
		$this->view->assign('tid',$this->_id) ;
		$this->view->display('comm-title.php');
	}

	public function indexAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->index_category->query(array('parentid'=>59,'type'=>'0')) ;
		if(sizeof($list)>6){
			$list = array_splice($list,0,6) ;
		}
		$this->view->assign('list',$list) ;
		
		$piclist = $this->pictue_model->queryAll(array('catid'=>83)) ;
		$this->view->assign('piclist',$piclist) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('index.php');
	}
	
	public function defaultAction(){
		$log = __CLASS__."|".__FUNCTION__ ;
		$start = microtime(true) ;
		
		$list = $this->index_category->query(array('parentid'=>59,'type'=>'0')) ;
		if(sizeof($list)>6){
			$list = array_splice($list,0,6) ;
		}
		$this->view->assign('list',$list) ;

		//首页添加最新消息
		//全科消息
		$www_newlist = $this->www_model->query(array('posids'=>1)) ;
		foreach ($www_newlist as $item){
			$item['url'] = "?control=detail&tid=1&pid=$item[catid]&id=$item[id]" ;
			$newlist[] = $item ;
		}
		//俱乐部消息
		$this->club_model = $this->initModel('club_model','club');
		$club_newlist = $this->club_model->query(array('posids'=>1)) ;
		foreach ($club_newlist as $item){
			$item['url'] = "http://club.nyipcn.com/index.php?control=news&t=99&id=$item[id]" ;
			$newlist[] = $item ;
			//$sorts[] = $item['inputtime'] ;
		}
	
		function mysort($a,$b){
			if($a['inputtime']>$b['inputtime']){
				return -1 ;
			}
			return 1 ;
		}
		//排序
		usort($newlist,'mysort') ;
		//print_r($newlist) ;
		$len = 6 ;
		if(sizeof($newlist)>$len){
			$newlist = array_slice($newlist,0,$len) ;
		}
		$this->view->assign('newlist',$newlist) ;
		//关于我们
		$our = $this->www_model->getDataByPid(62) ;
		$this->view->assign('our',$our[0]) ;

		$piclist = $this->pictue_model->queryAll(array('catid'=>83)) ;
		$this->view->assign('piclist',$piclist) ;
		
		$log .="|".(int)(microtime(true)-$start) ;
		log::info($log);
		$this->view->display('index2.php');
	}
	
	public function destroy(){
		$this->view->display('comm-footer.php');
		echo '<a href="http://webscan.360.cn/index/checkwebsite/url/www.nyipcn.com"><img border="0" src="http://img.webscan.360.cn/status/pai/hash/6c5c489954148ea472c7755fea62fc76"/></a>' ;
	}
}
?>