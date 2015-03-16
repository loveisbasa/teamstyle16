<?php
class File extends Controller
{
	public function __constrct()
	{
		parent::__constrct();
		//HandleLoggedIn();
	}
	public function index($page = 0)
	{
		$users_model = $this->loadModel('Users');
		$all_users = $users_model->GetAllusers($page);
		$_SESSION['user_page'] = $page;
		require 'application/views/_templates/header.php';
		require 'application/views/_templates/footer.php';
	}
}
