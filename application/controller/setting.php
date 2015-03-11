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
			$login_model = $this->loadModel('Login');
		$login_successful = $login_model->LoginWithCookie();


		if ($model)
			header('location:'.URL.'setting');
	}
	public function EditUserEmail()
	{
		$model = $this->loadModel('Setting');
		$model->editUserEmail();
			$login_model = $this->loadModel('Login');
		$login_successful = $login_model->LoginWithCookie();


		if ($model)
			header('location:'.URL.'setting');
	}
}
