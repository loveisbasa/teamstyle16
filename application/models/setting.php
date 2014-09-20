<?php
class SettingModel
{
	public function __construct($db) 
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public function editUserName()
	{
		// new username provided ?
		if (!isset($_POST['user_nickname']) OR empty($_POST['user_nickname'])) {
			$_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_FIELD_EMPTY;
			return false;
		}
		// new username same as old one ?
		if ($_POST['user_nickname'] == $_SESSION["user_nickname"]) {
			$_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_SAME_AS_OLD_ONE;
			return false;
		}
		// clean the input
		$user_name = substr(strip_tags($_POST['user_nickname']), 0, 64);
		// check if new username already exists
		$query = $this->db->prepare("SELECT user_id FROM users WHERE user_nickname = :user_nickname");
		$query->execute(array(':user_nickname' => $user_nickname));
		$count =  $query->rowCount();
		if ($count == 1) {
			$_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_ALREADY_TAKEN;
			return false;
		}

		$query = $this->db->prepare("UPDATE users SET user_nickname = :user_nickname WHERE user_id = :user_id");
		$query->execute(array(':user_nickname' => $user_nickname, ':user_id' => $_SESSION['user_id']));
		$count =  $query->rowCount();
		if ($count == 1) {
			Session::set('user_nickname', $user_nickname);
			$_SESSION["feedback_positive"][] = FEEDBACK_USERNAME_CHANGE_SUCCESSFUL;
			return true;
		} else {
			$_SESSION["feedback_negative"][] = FEEDBACK_UNKNOWN_ERROR;
			return false;
		}
	}
	public function editUserEmail()
	{
		if (!isset($_POST['user_email']) OR empty($_POST['user_email'])) {
			$_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_FIELD_EMPTY;
			return false;
		}
		
		if ($_POST['user_email'] == $_SESSION["user_email"]) {
			$_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_SAME_AS_OLD_ONE;
			return false;
		}
		if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
			$_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN;
			return false;
		}

		$user_email = substr(strip_tags($_POST['user_email']), 0, 64);

		$query = $this->db->prepare("UPDATE users SET user_email = :user_email WHERE user_id = :user_id");
		$query->execute(array(':user_email' => $user_email, ':user_id' => $_SESSION['user_id']));
		$count =  $query->rowCount();
		if ($count == 1) {
			Session::set('user_email', $user_email);
			$_SESSION["feedback_positive"][] = FEEDBACK_EMAIL_CHANGE_SUCCESSFUL;
			return true;
		} else {
			$_SESSION["feedback_negative"][] = FEEDBACK_UNKNOWN_ERROR;
			return false;
		}
	}


        }
}