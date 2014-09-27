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
		$model->editUserName();
		if ($model)
			header('location:'.URL.'setting');
	}
	public function EditUserEmail()
	{
		$model = $this->loadModel('Setting');
		$model->editUserEmail();
		if ($model)
			header('location:'.URL.'setting');
	}
}