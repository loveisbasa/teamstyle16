<?php
class online_battle extends controller
{
	public function __constrct()
	{
		parent::__constrct();
	}
	public function index()
	{
		$this->view->render('online_battle/complier');
	}

	public function compiler(){
		$this->view->render('online_battle/complier');
	}

	public function uploads(){
		$ob_model=$this->loadModel('online_battle');
		$ob_model->upload();
		header('location:' .URL. 'online_battle/index/');
	}

	public function compile_action(){
		$ob_model=$this->loadModel('online_battle');
		$ob_model->compile();
	}
				
}
