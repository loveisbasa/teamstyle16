<?php

/**
 * Class Message
 */
class Message extends Controller
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
		if (isset($_SESSION['user_logged_in'])) {
			$message_model=$this->loadModel('message');
				$new_message=$message_model->ReadNewMessage();
				if($new_message!='NOTHING'){
				require 'application/views/_templates/header.php';
				require 'application/views/message/index.php';
				require 'application/views/_templates/footer.php';

				}
		else header('location: ' . URL . 'dashboard/index');
		}
		else header('location: ' . URL . 'dashboard/index');
	}

	public function countmessage()
	{
		
	header('Content-Type: text/event-stream');
	header('Cache-Control: no-cache');
	$message_model=$this->loadModel('message');
	$count=$message_model->CountMessage();
	echo "data: {$count}\n\n";
	flush();
	
	}
	public function all_message()
	{
		// debug message to show where you are, just for the demo
		if (isset($_SESSION['user_logged_in'])) {
				$message_model=$this->loadModel('message');
				$new_message=$message_model->ReadAllMessage();
				require 'application/views/_templates/header.php';
				require 'application/views/message/index.php';
				require 'application/views/_templates/footer.php';

		}
	
	}

	public function is_read($message_id)
	{
		$message_model=$this->loadModel("message");
		$message_model->ChangeStatusMessage($message_id);
		 header('location: ' . URL . 'message/index');
	}

  public function send_mail($send_to_name="")
	{
		if (isset($_SESSION['user_logged_in'])) {
		require 'application/views/_templates/header.php';
		require 'application/views/message/send_mail.php';
		require 'application/views/_templates/footer.php';
		}
		else header('location: ' . URL. 'login/index');
	}

	public function send_mail_action()
	{
		$message_model=$this->loadModel('message');
	  $message_model->SendMessage();
		header('location: ' . URL . 'dashboard/index');
	}	
}
