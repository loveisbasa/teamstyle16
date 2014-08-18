<?php

/**
 * Class Message
 */
class Message extends Controller
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
		// debug message to show where you are, just for the demo
		echo 'Message from Controller: You are in the controller message, using the method index()';
		if (isset($_SESSION['user_logged_in'])) {
			$message_model=$this->loadModel('message');
				$get_success=$message_model->ReadNewMessage();
				if($get_success!='NOTHING'){
				require 'application/views/_templates/header.php';
				require 'application/views/message/index.php';
				require 'application/views/_templates/footer.php';

				}
				else;
		}
		else header('location' . URL. 'login');
				}
	public function all_message()
	{
		// debug message to show where you are, just for the demo
		echo 'Message from Controller: You are in the controller message, using the method all_message()';
		if (isset($_SESSION['user_logged_in'])) {
				$message_model=$this->loadModel('message');
				$message_success=$message_model->ReadAllMessage();
				require 'application/views/_templates/header.php';
				require 'application/views/message/index.php';
				require 'application/views/_templates/footer.php';

		}
	
	}
	public function is_read($message_id)
	{

		echo 'Message from Controller: You are in the controller message, using the method is_read()';
				require 'application/views/_templates/header.php';
				require 'application/views/home/index.php';
				require 'application/views/_templates/footer.php';
	$message_model=$this->loadModel("message");
		$message_model->message_is_read($message_id);
	}
}
