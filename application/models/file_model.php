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
				echo $_FILES['devfile']['error'];
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
	public function Download($id)
	{
		$sql = "SELECT file_title FROM files WHERE file_id = :file_id";
		$query  = $this->db->prepare($sql);
		$query->execute(array(':file_id'=>$id));
		$result = $query->fetch();
		$file_name = $result->file_title;

		$file_sub_path = "/var/www/html/teamstyle16/uploads/";
		$file_path = $file_sub_path . $file_name;
		//echo $file_path;//debug
		//首先要判断给定的文件存在与否
		 if(!file_exists($file_path)){
		 	echo "没有该文件";
		 	return false;
		 }
		$fp=fopen($file_path,"r");
		$file_size=filesize($file_path);
		//下载文件需要用到的头
		Header("Content-type: application/octet-stream"); 
		Header("Accept-Ranges: bytes"); 
		Header("Accept-Length:".$file_size); 
		Header("Content-Disposition: attachment; filename=".$file_name); 
		$buffer=1024;
		$file_count=0;
		ob_clean()；
		flush();
		//向浏览器返回数据
		while(!feof($fp) && $file_count<$file_size){
			$file_con=fread($fp,$buffer);
			$file_count+=$buffer;
			echo $file_con;
		}
		fclose($fp);  
	}
	public function GetAllFiles()
	{
		$query = $this->db->prepare("SELECT file_id, file_title, file_type, file_size, file_author, file_date 
			FROM files");
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}
}