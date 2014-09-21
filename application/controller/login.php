<?php

class Login extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
    	
	public function index()
	{
		//echo 'Message from Controller: You are in the controller login, using the method index()';
		//echo $_COOKIE['rememberme'].'|||'.$_SESSION['user_logged_in'];
		//$login_model = $this->loadModel('LoginModel');

		if (isset($_SESSION['user_logged_in'])) {
			header('location:' .URL. 'dashboard');
		} else {
			require 'application/views/_templates/header.php';
			require 'application/views/login/index.php';
			require 'application/views/_templates/footer.php';
		}
	} 

	public function register()
	{
		require 'application/views/_templates/header.php';
		require 'application/views/login/register.php';
		require 'application/views/_templates/footer.php';
	}
	public function register_action()
	{
		//session_start();
		$login_model = $this->loadModel('Login');
		$register_success = $login_model->RegisterNewUser();
		if ($register_success == true) {
			header('location:' .URL. 'login/index');
		} else {
			header('location:' .URL. 'login/register');
		}
	}

	public function login()
	{
			$login_model = $this->loadModel('Login');
			$login_success = $login_model->Login();

			if ($login_success == true) {
				header('location:' .URL. 'dashboard/index');
			} else {
				header('location:' .URL. 'login/index');
			}
	}

	public function logout()
	{
		//echo 'Message from Controller: You are in the controller login, using the method logout()';
		$login_model = $this->loadModel('Login');
		$logout_success = $login_model->Logout();

		header('location:' .URL. 'login/index');
	}

	public function loginWithCookie()
	{
		// run the loginWithCookie() method in the login-model, put the result in $login_successful (true or false)
		$login_model = $this->loadModel('Login');
		$login_successful = $login_model->LoginWithCookie();

		if ($login_successful == true) {
			header('location: ' . URL . 'dashboard/index');
		} else {
			// delete the invalid cookie to prevent infinite login loops
			$login_model->deleteCookie();
			// if NO, then move user to login/index (login form) (this is a browser-redirection, not a rendered view)
			header('location: ' . URL . 'login/index');
		}
	}

	function uploadAvatar()
	{
	// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
		Auth::handleLogin();
		$login_model = $this->loadModel('Login');
		$this->view->avatar_file_path = $login_model->getUserAvatarFilePath();
		$this->view->render('login/uploadavatar');
	}

	function uploadAvatar_action()
	{
	// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
	// Note: This line was missing in early version of the script, but it was never a real security issue as
	// it was not possible to read or edit anything in the database unless the user is really logged in and
	// has a valid session.
		Auth::handleLogin();
		$login_model = $this->loadModel('Login');
		$login_model->createAvatar();
		header('location: ' . URL . 'setting/index');
	}

 function changpwd(){
		Auth::handleLogin();
		$login_model = $this->loadModel('Login');
		$login_model->changePwd()
		header('location: ' .URL . 'setting/indec');
 }	 
}

