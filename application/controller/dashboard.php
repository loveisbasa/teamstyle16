<?php
class dashboard extends Controller
{
	public function __constrct()
	{
		parent::__constrct();
		HandleLoggedIn();
	}
	public function index()
	{
		require 'application/views/_templates/header.php';
		require 'application/views/dashboard/index.php';
		require 'application/views/_templates/footer.php';
	}
}

function HandleLoggedIn() 
{
	session_start();

	if(!isset($_SESSION['user_logged_in'])) {
		session_destroy();
		header('location:' .URL. 'login/index');
	}
}