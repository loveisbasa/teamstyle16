<?php

class LoginModel
{
	function __construct($db) 
	{
        		try {
            			$this->db = $db;
        		} catch (PDOException $e) {
            			exit('Database connection could not be established.');
        		}
    	}

	public function login()
	{
		$sql = "SELECT user_nickname, user_password_hash, user_email FROM users
		             WHERE (user_nickname = :user_nickname OR user_email = :user_email) 
		             AND user_password_hash = :user_password_hash";
		$query = $this->db->prepare($sql);
              $result = $query->execute();
		$count = $result->rowCount();
		if ($count == 1)
			echo "voila!";
	}

	public function RegisterNewUser()
	{
              if (empty($_POST['user_nickname'])) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_FIELD_EMPTY;
            } elseif (empty($_POST['user_password_new']) OR empty($_POST['user_password_repeat'])) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_FIELD_EMPTY;
            } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_REPEAT_WRONG;
            } elseif (strlen($_POST['user_password_new']) < 6) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_TOO_SHORT;
            } elseif (strlen($_POST['user_nickname']) > 64 OR strlen($_POST['user_nickname']) < 2) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG;
            } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_nickname'])) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN;
            } elseif (empty($_POST['user_email'])) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_FIELD_EMPTY;
            } elseif (strlen($_POST['user_email']) > 64) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_TOO_LONG;
            } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN;
            } elseif (empty($_POST['user_real_name'])) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_REAL_NAME_FILED_EMPTY;
            } elseif (empty($_POST['user_phone'])) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_PHONE_FIELD_EMPTY;
            } elseif (empty($_POST['user_class'])) {
                    $_SESSION["feedback_negative"][] = FEEDBACK_CLASS_FIELD_EMPTY;
            } elseif (!empty($_POST['user_nickname'])
            AND strlen($_POST['user_nickname']) <= 64
            AND strlen($_POST['user_nickname']) >= 2
            AND preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_nickname'])
            AND !empty($_POST['user_email'])
            AND strlen($_POST['user_email']) <= 64
            AND filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            AND !empty($_POST['user_password_new'])
            AND !empty($_POST['user_password_repeat'])
            AND ($_POST['user_password_new'] === $_POST['user_password_repeat'])
            AND !empty($_POST['user_class'])
            AND !empty($_POST['user_phone'])
            AND !empty($_POST['user_real_name'])) {

		$user_nickname = strip_tags($_POST['user_nickname']);
              $user_email = strip_tags($_POST['user_email']);
              $user_real_name = strip_tags($_POST['user_real_name']);
              $user_phone = strip_tags($_POST['user_phone']);
              $user_class = strip_tags($_POST['user_class']);

           	$hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
            	$user_password_hash = password_hash($_POST['user_password_new'], PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));
       
       	$query = $this->db->prepare("SELECT user_id FROM users WHERE user_nickname = :user_nickname");
       	$query->execute(array(':user_nickname' => $user_nickname));
       	$count = $query->rowCount();
       	if ($count ==1) {
       		$_SESSION["feedback_negtive"][] = FEEDBACK_USERNAME_ALREADY_TAKEN;
       		return false;
       	} 


       	$query = $this->db->prepare("SELECT user_id FROM users WHERE user_email = :user_email");
            	$query->execute(array(':user_email' => $user_email));
            	$count =  $query->rowCount();
            	if ($count == 1) {
                	$_SESSION["feedback_negative"][] = FEEDBACK_USER_EMAIL_ALREADY_TAKEN;
                	return false;
            	}


		$sql = "INSERT INTO users (user_nickname, user_password_hash, user_email, user_real_name, user_phone, user_class)
		             VALUES (:user_nickname, :user_password_hash, :user_email, :user_real_name, :user_phone, :user_class)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':user_nickname' => $user_nickname,
			 		':user_password_hash' => $user_password_hash,
                                  ':user_email' => $user_email,
                                  ':user_real_name' => $user_real_name,
                                  ':user_phone' => $user_phone,
                                  ':user_class' => $user_class) );
		$count = (int)$query->rowCount();
		//$_SESSION['row_count'][] = $count;
		if ($count != 1 ){
                    $_SESSION["feedback_negative"][] = FEEDBACK_UNKNOWN_ERROR;
                    return false;
            	}

            	$_SESSION["feedback_positive"][] = "Register successfully! Voila!";
            	return true;
	}
  }
	
}