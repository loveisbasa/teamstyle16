<?php
class setting extends controller
{
	public function __constrct()
	{
		parent::__constrct();
	}
	public function index()
	{
		$this->view->render('setting/index');
	}
	public function EditUserName()
	{
		$model = $this->loadModel('Setting');
		$model->EditUserName();
		header('location:' .URL. '/setting');
	}
}