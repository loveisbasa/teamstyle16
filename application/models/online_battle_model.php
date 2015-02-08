<?php

class Online_battleModel {
    public function __construct($db) {
        try {
            $this->db = $db;
        }
        catch(PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    public function upload() {
			$file='public/source/'. $_SESSION['user_id'] .'/' . $_SESSION['user_id'].'.c';
      if (file_exists($file)) {
			  unlink($file);
      } 
 
			if ($_SESSION['user_logged_in'] != ture) {
				$_SESSION['feedback_negative'][]="没有登陆呦";
				return false;
			}
			if ($_SESSION['user_team']==NULL){
				$_SESSION['feedback_negative'][]="童鞋你还没有组队呢!";
				return false;
			}
			if(!$_FILES["file"]["name"]){
				$_SESSION['feedback_negative'][]="文件在哪里呢?_?";
				return false;
			}

      if ($_FILES["file"]["error"] > 0) {
          echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
      } else {
          echo "Upload: " . $_FILES["file"]["name"] . "<br />";
          echo "Type: " . $_FILES["file"]["type"] . "<br />";
          echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
          echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
             @mkdir("public/source/" . $_SESSION['user_id']);
              move_uploaded_file($_FILES["file"]["tmp_name"], $file);
					  if (file_exists($file)) 
							$_SESSION["feedback_positive"][]="上传成功";
						else $_SESSION['feedback_negative'][]="未知错误T_T";
      }
    }
    public function compile() {
			if (!$_SESSION['user_logged_in']){
				$_SESSION['feedback_negative'][]='未登录！';
				return false;
			}
				$file='public/source/'. $_SESSION['user_id'] .'/' . $_SESSION['user_id'].'.c';
        if (!file_exists($file)) {
						$_SESSION['feedback_negative'][]='源文件不存在！';
						return false;
				}
         
				
         $service_port = 8001;
         $address = ADDRESS;
         $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
         if ($socket === false) {
             $_SESSION["feedback_negative"][] = "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
         }
         $result = socket_connect($socket, $address, $service_port);
         if ($result === false) {
             $SELECT["feedback_negative"][] = "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
         }
         $in1 = "c\n";
         $in2 = $_SESSION['user_id'];
         socket_write($socket, $in1, strlen($in1));
         socket_write($socket, $in2, strlen($in2));
         $out = '';
         while ($out = socket_read($socket, 8192)) {
             $response[]=$out; 
         };
			 	return $response;
         socket_close($socket);
    }
}
?>



