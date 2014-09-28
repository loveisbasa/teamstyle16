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
		if (is_uploaded_file($_FILES['devfile']['tmp_name'])) {
			if ( !move_uploaded_file($_FILES['devfile']['tmp_name'], UP_FILE_PATH. $_FILES['devfile']['name'])) {
				$_SESSION["feedback_negative"][] = "error";
				return FALSE;
			}
			$fname = strip_tags($_FILES['devfile']['name']);
			$ftype = strip_tags($_FILES['devfile']['type']);
			$fauthor = $_SESSION['user_id'];
			$fsize = $_FILES['devfile']['size'];
			$fdate  = date("Y-m-d H:i:sa");

			$sql = "INSERT INTO files(file_title, file_type, file_size, file_author, file_date) VALUES (:file_title, :file_type, :file_size, :file_author, :file_date)";
			$query  = $this->db->prepare($sql);
			$query->execute(array(':file_title'=>$fname, 
				':file_type'=>$ftype, 
				':file_author'=>$fauthor, 
				':file_size'=>$fsize,
				':file_date'=>$fdate));
			$count = $query->rowCount();
			if ($count != 1) {
				$_SESSION["feedback_negative"][] = "error!";
				return false;
			}
			$_SESSION["feedback_positive"][] = "successfully!";
			return TRUE;
		}
	}
}