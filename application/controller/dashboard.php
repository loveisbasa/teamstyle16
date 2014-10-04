<?php
class dashboard extends Controller
{
	public function __constrct()
	{
		parent::__constrct();
		//HandleLoggedIn();
	}
	public function index()
	{
		
		if (isset($_SESSION['user_logged_in'])) {
			$overview_model = $this->loadModel('Login');
			$alluser_model=$this->loadModel('Users');
			$Alluser=$alluser_model->all_users();
			$this->view->user = $overview_model->getUserProfile($_SESSION['user_id']);
			$this->view->render('dashboard/index');
			// require 'application/views/_templates/header.php';
			// require 'application/views/dashboard/index.php';
			// require 'application/views/_templates/footer.php';
		} else {
			session_destroy();
			header('location:' .URL. 'login');
		}	
	}

}

function HandleLoggedIn() 
{
	session_start();

	if ($_SESSION['user_logged_in'] != true) {
		session_destroy();
		header('location:' .URL. 'login/index');
	}
}
