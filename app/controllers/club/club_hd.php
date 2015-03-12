<?php

class club_hd extends BaseClubController {

	private $type = 3;
	public function init(){
		$this->view->assign('t',$this->type) ;
		
		$this->view->assign('description',$this->description) ;
		$this->view->assign('keywords',$this->keywords) ;
		$this->view->display('comm-title.php');
	}

	/**
	   3	=> '公益活动' ,49
	 */
	public function defaultAction(){
		$type = $this->type ;
		$hd = array(
			'text'	=>	'Public Benefit Activities',
			'title'	=>	'和我们一起感受摄影的快乐',
			'info'	=>	
			 "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们期望通过举办“纽摄中国摄影公益大课堂”等各种公益活动更多热爱摄影、热爱生活的人感受到摄影的快乐<br>"
			."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们自2009年10月起，面向所有摄影爱好者免费开办“摄影公益大课堂”，摄影公益大课堂邀请国内、外摄影界知名人士举办讲座，为广大摄影爱好者搭建起与摄影大师交流、探讨摄影艺术的平台，进一步促进了中国摄影的发展。至今已经有全国各地数十个城市的数千名摄影爱好者参加，受到了热烈的欢迎和广泛的好评。<br/>"
			."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;此外，我们欢迎所有的摄影师、摄影爱好者、摄影相关机构参与到捐建“摄影希望学校”公益活动中来，给贫困地区的孩子提供帮助，让孩子们能够掌握摄影技能，通过照相机拍摄自己的家乡，记录自己身边的事和身边的人们，甚至让摄影成为自己的职业。让孩子们能够透过镜头感受生活、热爱生活。<br/>",
			'img'	=>	"/img/{$type}02.jpg",
		) ;
//		$title_before ="摄影希望学校";
		$title_after ="摄影公益大课堂" ;
		
		$hd['bigimg'] = "/img/{$type}00.jpg" ;
		
		$this->view->assign('hd',$hd) ;
//		$this->view->assign('title1',$title_before) ;
		$this->view->assign('title2',$title_after) ;
		
		$this->view->display('list.php');
	}
	
}
?>