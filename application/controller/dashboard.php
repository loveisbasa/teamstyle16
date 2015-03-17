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
			#$All_user=$alluser_model->all_users();
			$this->view->user = $overview_model->getUserProfile($_SESSION['user_id']);
		  $forum_model=$this->loadModel('forum');
			$mythreads=$forum_model->ShowUSERPosts($_SESSION['user_profile']->user_id);
			require 'application/views/_templates/header.php';
			require 'application/views/dashboard/index.php';
			require 'application/views/_templates/footer.php';
		} else {
			session_destroy();
			header('location:' .URL. 'login');
		}	
	}

	public function alluser($page)
	{

		$alluser_model=$this->loadModel('Users');
		$All_user=$alluser_model->all_users($page);
		require 'application/views/_templates/header.php';
		require 'application/views/team/users.php';
		$_SESSION['user_page'] = $page;
		require 'application/views/_templates/footer.php';
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
