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

    public function upload($user_team) {
			$file='public/source/'. $user_team .'/' .$user_team.'.c';
      if (file_exists($file)) {
			  unlink($file);
      } 
 
			if ($user_team==NULL){
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
             @mkdir("public/source/" . $user_team);
              move_uploaded_file($_FILES["file"]["tmp_name"], $file);
					  if (file_exists($file)) 
							$_SESSION["feedback_positive"][]="上传成功";
						else $_SESSION['feedback_negative'][]="未知错误T_T";
      }
		}

		public function show_maps(){
				$sql = "SELECT round,name from maps";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
		}
		
		//显示已经有ai的队伍
		public  function show_others(){
			  $sql= "SELECT team_name,score FROM teams WHERE with_ai=1 ORDER BY score";
	      $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
		}


    public function compile($user_team) {
			$file='public/source/'. $user_team.'/' . $user_team.'.c';
			$file='public/source/'. $user_team .'/player';
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
      $in2 = $user_team;
      socket_write($socket, $in1, strlen($in1));
      socket_write($socket, $in2, strlen($in2));
      $out = '';
      while ($out = socket_read($socket, 8192)) {
          $response[]=$out; 
      };
			$sql = "update teams set with_ai=1 where team_name='{$user_team}'";
      $query = $this->db->prepare($sql);
      $query->execute();
      socket_close($socket);
		 	return $response;
		}

		public function fight($user_team) {
				$file='public/source/'. $user_team .'/player';
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
         $type = "b\n";
         $a = $user_team."\n";
				 $b = $_POST['player']."\n";
				 $c = $_POST['map']."\n";
				 echo $a.$b.$c;
         socket_write($socket, $type, strlen($type));
         socket_write($socket, $a, strlen($a));
         socket_write($socket, $b, strlen($b));
         socket_write($socket, $c, strlen($c));
         $out = '';
         while ($out = socket_read($socket, 8192)) {
         $response[]=$out; 
         };

         socket_close($socket);
			  return $response;
    }
}
?>
