<?php
class File extends Controller
{
	public function __constrct()
	{
		parent::__constrct();
		//HandleLoggedIn();
	}
	public function index()
	{
		$users_model = $this->loadModel('Users');
		$all_users = $users_model->GetAllusers();
		require 'application/views/_templates/header.php';
		require 'application/views/_templates/footer.php';
	}
}
