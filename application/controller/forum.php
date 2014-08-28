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
		echo 'Message from Controller: You are in the controller forum, using the method index()';
		$forum_model=$this->loadModel('message');
		$forums=$forum_model->Showforums();
		require 'application/views/_templates/header.php';
		require 'application/views/forum/index.php';
		require 'application/views/_templates/footer.php';
	}

	public function threads()
	{
		echo "Message from Controller: You are in the controller forum, using the method threads()";
		$forum_id=$_GET['forum_id'];
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

	public function posts()
	{
		echo "Message from Controller: You are in the controller forum, using the method post()";
		$forum_id=$_GET['thread_id'];
		if(isset($thread_id) and !empty($thread_id)){
			$forum_model=$this->loadModel('forum');
			$threads=$forum_model->Showposts($thread_id);
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
		require 'application/views/_templates/header.php';
		require 'application/views/forum/createforum.php';
		require 'application/views/_templates/footer.php';
	}

	public funciton create_forum_action()
	{	
		$forum_model=$this->loadModel('forum');
		$create_success=$forum_model->Create_forum();
		if($create_success=='ture') header(	
			'location:' .URL. 'forum/index');
		else header('location:' .URL. 'forum/create_forum');
	}
	public function create_thread()
	{
		if(empty($_GET['forum_id'] and filter_var($_GET['forum_id'],FILTER_VALIDATE_INT,array('min_range'<1)) $_SESSION["feedback_negative"][]=FEEDBACK_FID_EMPTY;
		$forum_id=$_GET['forum_id'];
		require 'application/views/_templates/header.php';
		require "application/views/forum/createthread.php?forum_id=$forum_id";
		require 'application/views/_templates/footer.php';
	}

	public function create_thread_action()
	{
		if(empty($_GET['forum_id'] and filter_var($_GET['forum_id'],FILTER_VALIDATE_INT,array('min_range'<1)) $_SESSION["feedback_negative"][]=FEEDBACK_FID_EMPTY;
		$forum_id=$_GET['forum_id'];
		$forum_model=$this->loadModel('forum');
		$create_success=$forum_model->Create_thread($forum_id);
		if($create_success=='ture') header(	
			'location:' .URL. "forum/threads?forum_id=$forum_id");
		else header('location:' .URL. 'forum/create_thread?forum_id=$forum_id');
	}
	
	public function create_post()
	{
		if(empty($_GET['thread_id'] and filter_var($_GET['thread_id'],FILTER_VALIDATE_INT,array('min_range'<1)) $_SESSION["feedback_negative"][]=FEEDBACK_FID_EMPTY;
		$thread_id=$_GET['thread_id'];
		require 'application/views/_templates/header.php';
		require "application/views/forum/createpost.php?thread_id=$thread_id";
		require 'application/views/_templates/footer.php';
	}

	public function create_post_action()
	{
		if(empty($_GET['thread_id'] and filter_var($_GET['thread_id'],FILTER_VALIDATE_INT,array('min_range'<1)) $_SESSION["feedback_negative"][]=FEEDBACK_FID_EMPTY;
		$thread_id=$_GET['thread_id'];
		$forum_model=$this->loadModel('forum');
		$create_success=$forum_model->Create_post($thread_id);
		if($create_success=='ture') header(	
			'location:' .URL. "forum/posts?thread_id=$thread_id");
		else header('location:' .URL. 'forum/create_post?thread_id=$thread_id');
	}
}
