<?php

/**
 * Class Forum
 */
class Forum extends Controller
{
		function __constrct()
	{
		parent::__constrct();
	}
	/**
     * PAGE: index
     */
	public function index()
	{
		echo 'Message from Controller: You are in the controller message, using the method index()';
		$forum_model=$this->loadModel('message');
		$get_success=$forum_model->Showforums();
		require 'application/views/_templates/header.php';
		require 'application/views/forum/index.php';
		require 'application/views/_templates/footer.php';
	}

	public function threads(){
		
