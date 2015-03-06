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

	public function battle_action($user_team){
		$ob_model=$this->loadModel('online_battle');
		$response=$ob_model->fight($user_team);
		require 'application/views/_templates/header.php';
		require 'application/views/online_battle/compile_info.php';
		require 'application/views/_templates/footer.php';
	}

	public function uploads($user_team){
		$ob_model=$this->loadModel('online_battle');
		$ob_model->upload($user_team);
		header('location:' .URL. 'online_battle/index/');
	}

	public function compile_action($user_team){
		echo $user_team;
		$ob_model=$this->loadModel('online_battle');
		$response=$ob_model->compile($user_team);
		require 'application/views/_templates/header.php';
		require 'application/views/online_battle/compile_info.php';
		require 'application/views/_templates/footer.php';
	}
				
}
