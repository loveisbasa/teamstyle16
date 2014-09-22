<?php
class FileModel
{
	public function __construct($db) 
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}
	public function IsGuest()
	{
		$sql = "SELECT user_type FROM users WHERE user_id = :user_id";
		$query  = $this->db->prepare($sql);
		$query->execute(array(':user_id'=>$_SEESION['user_id']));
		$result = $query->fetch();
		if ($result->user_type == "guest")
			return TRUE;
		else
			return FALSE;
	}
	public function MoveFile()
	{
		if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
			if ( !move_uploaded_file($_FILES['userfile']['tmp_name'], UP_FILE_PATH. $_FILES['userfile']['name'])) {
				$_SEESION["feedback_negative"][] = "error";
				return FALSE;
			}
			return TRUE;
		}

	}
}