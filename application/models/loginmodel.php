<?php

class loginmodel
{
	public function __construct(Database $db)
	{
		$this->db = $db;
	}

	public function login()
	{

	}

	public function register()
	{
                    if (!$this->checkCaptcha()) {
            		$_SESSION["feedback_negative"][] = FEEDBACK_CAPTCHA_WRONG;
        	       } elseif (empty($_POST['user_name'])) {
            		$_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_FIELD_EMPTY;
        	       } elseif (empty($_POST['user_password_new']) OR empty($_POST['user_password_repeat'])) {
            		$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_FIELD_EMPTY;
        	       } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            		$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_REPEAT_WRONG;
        	       } elseif (strlen($_POST['user_password_new']) < 6) {
            		$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_TOO_SHORT;
        	       } elseif (strlen($_POST['user_name']) > 64 OR strlen($_POST['user_name']) < 2) {
            		$_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG;
        	       } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            		$_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN;
        	       } elseif (empty($_POST['user_email'])) {
            		$_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_FIELD_EMPTY;
        	       } elseif (strlen($_POST['user_email']) > 64) {
            		$_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_TOO_LONG;
        	       } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            		$_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN;
        	       } elseif (empty($_POST['user_real_name'])){
        		$_SESSION["feedback_negative"][] = FEEDBACK_REALNAME_EMPTY;
        	       } elseif (empty($_POST['user_phone'])) {
        		$_SESSION["feedback_negative"][] = FEEDBACK_PHONE_EMPTY;
        	       } elseif (empty($_POST['user_class'])) {
        		$_SESSION["feedback_negative"][] = FEEDBACK_CLASS_EMPTY;
        	       } elseif (!empty($_POST['user_name'])
                    AND strlen($_POST['user_name']) <= 64
                    AND strlen($_POST['user_name']) >= 2
                    AND preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
                    AND !empty($_POST['user_email'])
                    AND strlen($_POST['user_email']) <= 64
                    AND filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
                    AND !empty($_POST['user_password_new'])
                    AND !empty($_POST['user_password_repeat'])
                    AND !empty($_POST['user_real_name'])
                    AND !empty($_POST['user_phone'])
                    AND !empty($_POST['user_class'])
                    AND ($_POST['user_password_new'] === $_POST['user_password_repeat'])) {

		echo "test";}
            // clean the input, delete tags
//             $user_name = strip_tags($_POST['user_name']);
//             $user_email = strip_tags($_POST['user_email']);

//             // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character
//             // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4,
//             // by the password hashing compatibility library. the third parameter looks a little bit shitty, but that's
//             // how those PHP 5.5 functions want the parameter: as an array with, currently only used with 'cost' => XX
//             $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
//             $user_password_hash = password_hash($_POST['user_password_new'], PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));

//             // check if username already exists
//             $query = $this->db->prepare("SELECT * FROM users WHERE user_name = :user_name");
//             $query->execute(array(':user_name' => $user_name));
//             $count =  $query->rowCount();
//             if ($count == 1) {
//                 $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_ALREADY_TAKEN;
//                 return false;
//             }

//             // check if email already exists
//             $query = $this->db->prepare("SELECT user_id FROM users WHERE user_email = :user_email");
//             $query->execute(array(':user_email' => $user_email));
//             $count =  $query->rowCount();
//             if ($count == 1) {
//                 $_SESSION["feedback_negative"][] = FEEDBACK_USER_EMAIL_ALREADY_TAKEN;
//                 return false;
//             }

//             // generate random hash for email verification (40 char string)
//             $user_activation_hash = sha1(uniqid(mt_rand(), true));
//             // generate integer-timestamp for saving of account-creating date
//             $user_creation_timestamp = time();

//             // write new users data into database
//             $sql = "INSERT INTO users (user_name, user_password_hash, user_email, user_creation_timestamp, user_activation_hash, user_provider_type)
//                     VALUES (:user_name, :user_password_hash, :user_email, :user_creation_timestamp, :user_activation_hash, :user_provider_type)";
//             $query = $this->db->prepare($sql);
//             $query->execute(array(':user_name' => $user_name,
//                                   ':user_password_hash' => $user_password_hash,
//                                   ':user_email' => $user_email,
//                                   ':user_creation_timestamp' => $user_creation_timestamp,
//                                   ':user_activation_hash' => $user_activation_hash,
//                                   ':user_provider_type' => 'DEFAULT'));
//             $count =  $query->rowCount();
//             if ($count != 1) {
//                 $_SESSION["feedback_negative"][] = FEEDBACK_ACCOUNT_CREATION_FAILED;
//                 return false;
//             }

//             // get user_id of the user that has been created, to keep things clean we DON'T use lastInsertId() here
//             $query = $this->db->prepare("SELECT user_id FROM users WHERE user_name = :user_name");
//             $query->execute(array(':user_name' => $user_name));
//             if ($query->rowCount() != 1) {
//                 $_SESSION["feedback_negative"][] = FEEDBACK_UNKNOWN_ERROR;
//                 return false;
//             }
//             $result_user_row = $query->fetch();
//             $user_id = $result_user_row->user_id;

//             // send verification email, if verification email sending failed: instantly delete the user
//             if ($this->sendVerificationEmail($user_id, $user_email, $user_activation_hash)) {
//                 $_SESSION["feedback_positive"][] = FEEDBACK_ACCOUNT_SUCCESSFULLY_CREATED;
//                 return true;
//             } else {
//                 $query = $this->db->prepare("DELETE FROM users WHERE user_id = :last_inserted_id");
//                 $query->execute(array(':last_inserted_id' => $user_id));
//                 $_SESSION["feedback_negative"][] = FEEDBACK_VERIFICATION_MAIL_SENDING_FAILED;
//                 return false;
//             }
//         } else {
//             $_SESSION["feedback_negative"][] = FEEDBACK_UNKNOWN_ERROR;
//         }
//         // default return, returns only true of really successful (see above)
//         return false;
//     }
// 	}
// }

// private function TestInput($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }
//what's this?
    }
private function checkCaptcha()
    {
        if (isset($_POST["captcha"]) AND ($_POST["captcha"] == $_SESSION['captcha'])) {
            return true;
        }
        // default return
        return false;
    }
}
?>