<?php

class Login extends Controller
{
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

	// function login()
	// {
	// 	$login_model = $this->loadModel('LoginModel');
	// 	$login_successful = $login_model->login();

	// 	if($login_successful) {

	// 	}
	// }
}

?>