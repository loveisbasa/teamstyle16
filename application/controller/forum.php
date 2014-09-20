<?php

/**
 * Class Forum
 */
class Forum extends Controller
{
		function __construct()
	{
		parent::__construct();
	}
	/**
     * PAGE: index
     */
	public function index()
	{
		$forum_model=$this->loadModel('forum');
		$forums=$forum_model->Showforums();
		require 'application/views/_templates/header.php';
		require 'application/views/forum/index.php';
		require 'application/views/_templates/footer.php';
	}

	public function threads($forum_id)
	{
		if(isset($forum_id) and !empty($forum_id)){
			$forum_model=$this->loadModel('forum');
			$threads=$forum_model->Showthreads($forum_id);
			require 'application/views/_templates/header.php';
			require 'application/views/forum/thread.php';
			require 'application/views/_templates/footer.php';
		}
		else{
			header('location: ' . URL . 'forum/index');
		}
	}

	public function posts($thread_id)
	{
		if(isset($thread_id) and !empty($thread_id)){
			$forum_model=$this->loadModel('forum');
			$posts=$forum_model->Showposts($thread_id);
			require 'application/views/_templates/header.php';
			require 'application/views/forum/post.php';
			require 'application/views/_templates/footer.php';
		}
		else{
			header('location: ' . URL . 'forum/index');
		}
	}

	public function user_posts() 
	{
		echo "Message from Controller: You are in the controller forum, using the method userposts()";
		$user_id=$_SESSION['user_id'];
		if(isset($user_id) and !empty($user_id)){
			$forum_model=$this->loadModel('forum');
			$threads=$forum_model->ShowUSERpostposts($user_id);
			require 'application/views/_templates/header.php';
			require 'application/views/forum/userpost.php';
			require 'application/views/_templates/footer.php';
		}
		else{
			header('location: ' . URL . 'forum/index');
		}
	}

	public function create_forum()
	{	
		if($_SESSION['user_type']=='admin'){
		require 'application/views/_templates/header.php';
		require 'application/views/forum/create_forum.php';
		require 'application/views/_templates/footer.php';
		}
		else $_SESSION["feedback_negative"]=FEEDBACK_PERMISSION_DENIED;
}

	public function create_forum_action()
	{	
		$forum_model=$this->loadModel('forum');
		$create_success=$forum_model->Create_forum();
		if($create_success=='true') header(	
			'location:' .URL. 'forum/index');
		else header('location:' .URL. 'forum/create_forum');
	}
	public function create_thread($forum_id)
	{
		require 'application/views/_templates/header.php';
		require 'application/views/_templates/footer.php';
	}

	public function create_thread_action($forum_id)
	{

		$forum_model=$this->loadModel('forum');
		$create_success=$forum_model->Create_thread($forum_id);
		if($create_success=='true') header(	
			'location:' .URL. 'forum/threads/' . $forum_id);
	}
	
	public function create_post($thread_id)
	{
		if(empty($thread_id) and filter_var($thread_id,FILTER_VALIDATE_INT,array('min_range'<1)))
		 	$_SESSION["feedback_negative"][]=FEEDBACK_FID_EMPTY;
		require 'application/views/_templates/header.php';
		require "application/views/forum/createpost.php";
		require 'application/views/_templates/footer.php';
	}

	public function create_post_action()
	{
		if(empty($_POST['thread_id']) and filter_var($_POST['thread_id'],FILTER_VALIDATE_INT,array('min_range'<1)))
		 	$_SESSION["feedback_negative"][]=FEEDBACK_FID_EMPTY;
		$thread_id=$_POST['thread_id'];
		echo $thread_id;
		$forum_model=$this->loadModel('forum');
		$create_success=$forum_model->Create_post($thread_id);
		if($create_success=='true') header(	
			'location:' .URL. "forum/posts/" . $thread_id);
		else header('location:' .URL. 'forum/create_post/' . $thread_id);
	}
}
