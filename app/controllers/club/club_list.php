<?php

class club_list extends BaseClubController {

	private $type = 1;
	public function init(){
		
		$type = empty($_GET['type'])?1:$_GET['type'] ;
		$this->type = $type ;
		
		$this->view->assign('t',$this->type) ;
		
		$this->view->display('comm-title.php');
	}

	/**
	 * 1	=> '摄影之旅' ,47
	   2	=> '摄影课程' ,48
	 */
	public function defaultAction(){
		$title_before ="";
		$title_after ="" ;
		$type = $this->type ;
		switch ($type){
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
					'img'	=>	"/img/{$type}02.jpg",
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
					'img'	=>	"/img/{$type}02.jpg",
				) ;
				$title_before ="课程预告";
				$title_after ="课程回顾" ;
				break ;
		}
		$hd['bigimg'] = "/img/{$type}00.jpg" ;
		$this->view->assign('hd',$hd) ;
		
		$newslist = $this->club_model->getAllByCatid($id) ;
		
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
		$this->view->assign('title1',$title_before) ;
		$this->view->assign('title2',$title_after) ;
		$this->view->assign('list',$list) ;
		
		$this->view->display('list.php');
	}
	
}
?>