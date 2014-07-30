<?php

class Login extends Controller
{
	function __construct()
    	{
        		parent::__construct();
    	}
    	
	public function index()
	{
		echo 'Message from Controller: You are in the controller login, using the method index()';
		//$login_model = $this->loadModel('LoginModel');

		require 'application/views/_templates/header.php';
		require 'application/views/login/index.php';
		require 'application/views/_templates/footer.php';
	} 

	public function register()
	{
		echo 'Message from Controller: You are in the controller login, using the method register()';

		require 'application/views/_templates/header.php';
		require 'application/views/login/register.php';
		require 'application/views/_templates/footer.php';
	}
	public function register_action()
	{
		//session_start();
		echo 'Message from Controller: You are in the controller login, using the method register_action()';

		$login_model = $this->loadModel('Login');
		$register_success = $login_model->RegisterNewUser();
		if ($register_success == true) {
			header('location:' .URL. 'login/index');
		} else {
			header('location:' .URL. 'login/register');
		}
		//$this->view->render('login/register');

		
		//require 'application/views/_templates/header.php';
		//require 'application/views/login/register.php';
		//require 'application/views/_templates/footer.php';
	}

	public function login()
	{
		echo 'Message from Controller: You are in the controller login, using the method login()';
		$login_model = $this->loadModel('Login');
		$login_success = $login_model->Login();

		if($login_success == true) {
			header('location:' .URL. 'dashboard/index');
		} else {
			header('location:' .URL. 'login/index');
		}
	}

	public function logout()
	{
		echo 'Message from Controller: You are in the controller login, using the method logout()';
		$login_model = $this->loadModel('Login');
		$logout_success = $login_model->Logout();

		header('location:' .URL. 'login/index');
	}
}

