<?php

class index_photo extends BaseController {

	public function init(){
		$this->index_model = $this->initModel('index_model','index');
		
		$this->view->display2('title.php','comm');
	}

	public function destroy(){
		$this->view->display2('footer.php','comm');
	}
	
	public function defaultAction(){
		$this->view->display('index.php');
	}
	
}
?>