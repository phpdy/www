<?php

class index_index extends BaseController {
	private $psize =8;
	public function init(){
		$this->pic_model = $this->initModel('pictue_model','index');
		$this->index_model = $this->initModel('index_model','index');
		$this->pay_model = $this->initModel('pay_model','pay');
		
		$t = empty($_GET['t'])?0:$_GET['t'] ;
		$this->view->assign('t',$t) ;
		$o = empty($_GET['o'])?'html':$_GET['o'] ;
		
		if($o=='html'){
			$title = array(
				0	=> '首页' ,
				1	=> '摄影之旅' ,
				2	=> '摄影课程' ,
				3	=> '公益活动' ,
				4	=> '关于我们' ,
				5	=> '会员中心' ,
			) ;
			$this->view->assign('title',$title) ;
			$this->view->display2('title.php','comm');
		}
	}

	public function destroy(){
		$o = empty($_GET['o'])?'html':$_GET['o'] ;
		
		if($o=='html'){
			$this->view->display2('footer.php','comm');
		}
	}
	
	public function defaultAction(){
		$t = empty($_GET['t'])?0:$_GET['t'] ;
		switch ($t){
			case 0:
				$this->getIndexData();
				$this->view->display('index.php');
				break ;
			case 1:
			case 2:
			case 3:
				$this->getData($t) ;
				$this->view->display('list.php');
				break ;
			case 4:
				header("location: ours.php?t=$t") ;
				break ;
			case 5:
				header("location: user.php") ;
				break ;
		}
	}
	
	private function getIndexData(){
		$club47 = $this->index_model->getNewsList(47) ;
		$club48 = $this->index_model->getNewsList(48) ;
		$club49 = $this->index_model->getNewsList(49) ;
		$club51 = $this->index_model->getNewsList(51) ;
		$club52 = $this->index_model->getNewsList(52) ;
		
		$list = array(
			1	=>	$club47 ,
			2	=>	$club48 ,
			3	=>	$club49 ,
			4	=>	array_slice($club51,0,$this->psize) ,
			5	=>	array_slice($club52,0,$this->psize) ,
		) ;
		$this->view->assign('list',$list) ;

		
		$piclist = $this->pic_model->queryAll() ;
		$this->view->assign('piclist',$piclist) ;
	}
	
	/**
	 * 1	=> '摄影之旅' ,47
	   2	=> '摄影课程' ,48
	   3	=> '公益活动' ,49
	 * @param unknown_type $t
	 */
	private function getData($t){
		
		$title_before ="";
		$title_after ="" ;
		switch ($t){
			case 1:
				$id = 47 ;
				$hd = array(
					'text'	=>	'Photography Trips and Workshops',
					'title'	=>	'跟顶级摄影师到最美的地方学习摄影',
					'info'	=>	
					"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;纽摄俱乐部自2006年起在中国、柬埔寨、尼泊尔、斯里兰卡、土耳其、美国、加拿大、丹麦、瑞典、挪威等地举办各种摄影实践及创作活动。让你在世界上最美的地方和专业的摄影师学习专业的技巧和技术。<br>"
					."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们将邀请资深专业摄影师带领富有创作欲望的爱好者，共同探索世界最美的地方，共同分享关于摄影的技巧，洞察力以及对摄影的热情，进一步磨练自己的摄影技巧和艺术眼光。<br/>"
					."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们在风景如画的地方为那些寻求更深入学习的爱好者提供摄影实战课程。每天你都会学习专业的摄影技能，并在之后进行摄影实践以便能够更好地掌握新学习到的技巧。<br/>"
					."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们也欢迎您参加摄影实践培训。在这类活动中，通常会有2名或以上专业摄影导师随团指导，让你在拍摄那些令人回味的景象的同时磨练自己的摄影技巧，并会每晚进行作品研讨。<br/>",
					'img'	=>	"/img/{$t}02.jpg",
				) ;
				$title_before ="活动预告";
				$title_after ="活动回顾" ;
				break ;
			case 2:
				$id = 48 ;
				$hd = array(
					'text'	=>	'Photo Courses',
					'title'	=>	'专业摄影师带你从入门到精通',
					'info'	=>	
					 "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们的短期面授课程采用互动式教学体系，让学生在较短的时间内获取丰富、系统、实用的摄影知识，循序渐进地快速进入摄影艺术的殿堂。<br>"
					."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数码摄影快速提高系列课程每次主讲一个专题，内容包括如何配置数码摄影的相关器材设备、数码相机的使用、曝光控制、对焦控制、镜头的应用和选择、景深控制、闪光灯的使用、摄影构图和用光等等。每个专题都是摄影人急需解决的重点，这将让你的学习更加有效率、更加有针对性。<br/>"
					."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;后期处理快速提高系列由RAW格式的解读、Photoshop中级及进阶课程、彩色管理和输出课程三部分组成，是为期望通过使用Adobe Photoshop全程控制并改善摄影质量，并通过打印机获得高品质摄影作品的专业摄影师准备的课程。<br/>"
					."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;此外，我们还为职业摄影师提供室内景物及人物摄影用光的相关课程，你将在导师的带领下全面解析影室摄影中常用的灯光设备和布光方法，解密“大片”诞生的全过程。<br/>",
					'img'	=>	"/img/{$t}02.jpg",
				) ;
				$title_before ="课程预告";
				$title_after ="课程回顾" ;
				break ;
			case 3:
				$id = 49 ;
				$hd = array(
					'text'	=>	'Public Benefit Activities',
					'title'	=>	'和我们一起感受摄影的快乐',
					'info'	=>	
					 "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们期望通过举办“纽摄中国摄影公益大课堂”等各种公益活动更多热爱摄影、热爱生活的人感受到摄影的快乐<br>"
					."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们自2009年10月起，面向所有摄影爱好者免费开办“摄影公益大课堂”，摄影公益大课堂邀请国内、外摄影界知名人士举办讲座，为广大摄影爱好者搭建起与摄影大师交流、探讨摄影艺术的平台，进一步促进了中国摄影的发展。至今已经有全国各地数十个城市的数千名摄影爱好者参加，受到了热烈的欢迎和广泛的好评。<br/>"
					."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;此外，我们欢迎所有的摄影师、摄影爱好者、摄影相关机构参与到捐建“摄影希望学校”公益活动中来，给贫困地区的孩子提供帮助，让孩子们能够掌握摄影技能，通过照相机拍摄自己的家乡，记录自己身边的事和身边的人们，甚至让摄影成为自己的职业。让孩子们能够透过镜头感受生活、热爱生活。<br/>",
					'img'	=>	"/img/{$t}02.jpg",
				) ;
				$title_before ="摄影希望学校";
				$title_after ="摄影公益大课堂" ;
				break ;
			
		}
		$hd['bigimg'] = "/img/{$t}00.jpg" ;
		$this->view->assign('hd',$hd) ;
		$newslist = $this->index_model->getNewsList($id) ;
	
		//特殊处理公益活动部分
		if($t==3){
			//$newslist2 = $this->index_model->getNewsList(56) ;
			//$list = array_slice($newslist,0,$this->psize) ;
		} else {
			$list = array() ;
			$now = time() ;
			foreach ($newslist as $item){
				$time = strtotime($item['startdate']) ;
				if($time>$now){
					if(!empty($list) && sizeof($list)==$this->psize){
						continue ;
					}
					$list[] = $item ;
				}
			}
		}
		$this->view->assign('title1',$title_before) ;
		$this->view->assign('title2',$title_after) ;
		$this->view->assign('list',$list) ;
	}
	
	public function oursAction(){
		$list = $this->index_model->getNewsList(50) ;
		
		if(sizeof($list)==1){
			$result = $this->index_model->getNewsContent($list[0]['id']) ;
			$this->view->assign('result',$result) ;
			
		}
		$this->view->display('ours.php');
	}

	public function newsAction(){
		$this->view->assign('id',$_GET['id']) ;
		$news = $this->index_model->getNewsByid($_GET['id']) ;
		$this->view->assign('news',$news) ;

		$orderlist = $this->pay_model->findOrderListByPid($_GET['id']) ;
		$this->view->assign('orderlist',$orderlist) ;
		
		$result = $this->index_model->getNewsContent($_GET['id']) ;
		$this->view->assign('result',$result) ;
		$this->view->display('news.php');
	}
	
	public function moreAction(){
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
		
		$list = $this->index_model->getNewsList($id) ;
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
		
//		echo sizeof($list) ;
//		echo " ==  " ;
//		echo sizeof($newlist['list']) ;
		
		echo json_encode($newlist) ;
	}
}
?>