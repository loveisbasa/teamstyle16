<?php
class online_battle extends controller
{
	public function __constrct()
	{
		parent::__constrct();
	}
	public function index()
	{
		$this->view->render('online_battle/compile_view');
	}

	public function compiler(){
		$this->view->render('online_battle/compile_view');
	}


	public function battle(){
		$ob_model=$this->loadModel('online_battle');
		$maps=$ob_model->show_maps();
		$teams=$ob_model->show_others();
		require 'application/views/_templates/header.php';
		require 'application/views/online_battle/battle_view.php';
		require 'application/views/_templates/footer.php';
	}

	public function battle_action(){
		$ob_model=$this->loadModel('online_battle');
		$response=$ob_model->fight();
		require 'application/views/_templates/header.php';
		require 'application/views/online_battle/compile_info.php';
		require 'application/views/_templates/footer.php';
	}

	public function uploads(){
		$ob_model=$this->loadModel('online_battle');
		$ob_model->upload();
		header('location:' .URL. 'online_battle/index/');
	}

	public function compile_action(){
		$ob_model=$this->loadModel('online_battle');
		$response=$ob_model->compile();
		require 'application/views/_templates/header.php';
		require 'application/views/online_battle/compile_info.php';
		require 'application/views/_templates/footer.php';
	}
				
}
