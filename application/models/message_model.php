<?php

class MessageModel 
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
		$result=$query->fetchAll();
		if ($count != 1) {
			$_SESSION['feedback_negative'][] = FEEDBACK_NO_TARGET_FAILED;
			return false;
		}
		else{
			if(!isset($_POST['message_title']) OR empty($_POST['message_title'])){
			$_SESSION["feedback_negative"][]=FEEDBACK_TITLE_WARNING_EMPTY;
			} 
			$sql="INSERT into messages(message_from_id,message_to_id,message_title,message_content,message_send_date,message_is_read,message_type)
				VALUES
				(:message_from_id,:message_to_id,:message_title,:message_content,:message_send_date, 0 ,:message_type)";	
			$user_id=$result->user_id;
		  $d=date('Y-m-d H:i:s');
			$query=$this->db->prepare($sql);
			$query->execute(array(':message_from_id' => $_Session['user_id'],
				':message_to_id' => $user_id,
				':message_title' => $message_title,
				':message_content' => $message_content,
				':message_send_date' => date('Y-m-d H:i:s'),
				':message_type'=> $message_type
			));
		}	
		}
	}
		
	public function CountMessage()
	{
		$message_to_id=$_SESSION['user_id'];
		$sql="select COUNT(message_id) as unread_messages
			from messages
			WHERE message_to_id={$message_to_id} and message_is_read=0";
		$query=$this->db->prepare($sql);
		$query->execute();
		return $query->fetch()->unread_messages;	
	}
	public function ReadNewMessage()
	{
		$message_to_id=$_SESSION['user_id'];
		$sql="SELECT message_id,user_nickname,message_title,message_content,message_send_date
			from messages AS m INNER JOIN users AS u
			ON m.message_from_id=u.user_id
			where message_to_id=:message_to_id and message_is_read=0
			GROUP BY user_nickname";

		$query=$this->db->prepare($sql);	
		$query->execute(array(':message_to_id' => $message_to_id));
		$count = $query->rowCount();
		if($count) {
			$result= $query->fetchAll();
			return $result;
		}
		else return 'NOTHING';
		}

public function ReadAllMessage()
	{
		$message_to_id=$_SESSION['user_id'];
		$sql="SELECT message_id,user_nickname,message_title,message_content,message_send_date
			from messages AS m INNER JOIN users AS u
			ON m.message_from_id=u.user_id
			where message_to_id=:message_to_id  	";
		$query=$this->db->prepare($sql);	
		$query->execute(array(':message_to_id' => $message_to_id));
		echo $sql;
		return $query->fetchAll();
		
	}
		public function ChangeStatusMessage($id)
		{
		$sql="UPDATE messages SET message_is_read=1 where message_id=:id";

		$query=$this->db->prepare($sql);	
		$query->execute(array(':id' => $id));
		
		}
} 
