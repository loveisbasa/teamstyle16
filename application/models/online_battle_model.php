<?php

class online_battleModel {
    public function __construct($db) {
        try {
            $this->db = $db;
        }
        catch(PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    public function complie() {
        if ($_SESSION['user_logged_in'] != ture) return false;
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        } else {
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
            } else {
                @mkdir("public/source/" . $_SESSION['user_id']);
                move_uploaded_file($_FILES["file"]["tmp_name"], "public/source/" . $_SESSION['user_id'] . '/'$_SESSION['user_id'] . 'cpp');
                echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
                $service_port = 8001;
                $address = URL;
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
                    echo $out . "<br />";
                };
                socket_close($socket);
            }
        }
    }
?>


