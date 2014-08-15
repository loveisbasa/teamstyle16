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
				//先检验
		
			$message_title=strip_tags($_POST['message_title']);
			$message_content=strip_tags($_POST['message_content']);
		  $message_type=strip_tags($_POST['message_type']);
			if(!isset($_POST['user_to_nickname']) OR empty($_POST['user_to_nickname'])){
			$_SESSION["feedback_negative"][]=FEEDBACK_USERNAME_TO_FIELD_EMPTY;
				return false;		
		}
		elseif(!isset($_POST['message_content']) OR empty($_POST['message_content'])){
			$_SESSION["feedback_negative"][]=FEEDBACK_MESSAGE_FIELD_EMPTY;
		}
		else{
			$sql ="SELECT user_nickname,user_id from users 
		             WHERE (user_nickname = :user_to_nickname) ";
		$query = $this->db->prepare($sql);
		$query->execute(array(':user_to_nickname' => $_POST['user_to_nickname']));
		$count = $query->rowCount();
		$result=$query->fetch();
		if ($count != 1) {
			$_SESSION['feedback_negative'][] = FEEDBACK_NO_TARGET_FAILED;
			return false;
		}
		else{
			if(!isset($_POST['message_title']) OR empty($_POST['message_title'])){
			$_SESSION["feedback_negative"][]=FEEDBACK_TITLE_WARNING_EMPTY;
			} 
			$sql="INSERT into messages(message_from_id,message_to_id,message_title,message_content,meassage_send_date,message_is_read,message_type)
				VALUES
				(:message_from_id,:message_to_id,:message_title,:message_content,:meassage_send_date, 0 ,:message_type);"	
		  $query=$this->db->prepare($sql);
			$query->execute(array(':message_from_id' => $_Session['user_id'],
				':message_to_id' => $result->user_id,
				':message_title' => $message_title,
				':message_content' => $message_content,
				':message_send_date' => date('Y-m-d H:i:s'),
				':message_type'=> $message_type
			);
		}	
		}
	}
	public function ReadMessage()
	{
		
	}
} 
