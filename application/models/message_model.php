<?php

class MessageModel()
{
	public function __construct($db) 
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public function SendMessage()
	{
		if(!isset($_POST['user_to_nickname']) OR empty($_POST['user_to_nickname'])){
			$_SESSION["feedback_negative"][]=FEEDBACK_USERNAME_TO_FIELD_EMPTY;
				return false;		
		}
		elseif(!isset($_POST['message']) OR empty($_POST['message'])){
			$_SESSION["feedback_negative"][]=FEEDBACK_MESSAGE_FIELD_EMPTY;
		}
		else{

		
	}
	public function ReadMessage()
	{
		
	}
} 
