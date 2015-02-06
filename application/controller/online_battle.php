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

	public function complier(){
		$this->view->render('online_battle/complier');
	}

	public function uplodas(){
		$ob_model=$this->loadModel('online_battle');
		$ob_model->upload();
		$this->view->render('online_battle/complier')
	}

	public function complier_action(){
		$ob_model=$this->loadModel('online_battle');
		$ob_model->complier();
	}
				
}
