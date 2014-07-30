<?php

class LoginModel
{
	public function __construct($db) 
	{
        		try {
            			$this->db = $db;
        		} catch (PDOException $e) {
            			exit('Database connection could not be established.');
        		}
    	}

	public function Login()
	{
		if (!isset($_POST['user_nickname']) OR empty($_POST['user_nickname'])) {
			$_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_FIELD_EMPTY;
			return false;
		}
        	              if (!isset($_POST['user_password']) OR empty($_POST['user_password'])) {
            		      $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_FIELD_EMPTY;
            		      return false;
        	              }

		$sql = "SELECT user_id, user_nickname, user_password_hash, user_email, user_failed_logins, user_last_failed_login FROM users
		             WHERE (user_nickname = :user_nickname OR user_email = :user_nickname) 
				";
		$query = $this->db->prepare($sql);
                            $query->execute(array(':user_nickname' => $_POST['user_nickname']));
		$count = $query->rowCount();
		if ($count != 1) {
			$_SESSION['feedback_negative'][] = FEEDBACK_LOGIN_FAILED;
                                          return false;
		}

		$result = $query->fetch();

		// block login attempt if somebody has already failed 3 times and the last login attempt is less than 30sec ago
		if (($result->user_failed_logins >= 3) AND ($result->user_last_failed_login > (time()-30))) {
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_WRONG_3_TIMES;
            		return false;
        	}

        	
        	if (password_verify($_POST['user_password'], $result->user_password_hash)) {
        		session_start();
            		$_SESSION['user_logged_in'] = true;
            		$_SESSION['user_id'] = $result->user_id;
            		$_SESSION['user_nickname'] = $result->user_nickname;
            		$_SESSION['user_email'] = $result->user_email;
            //Session::set('user_account_type', $result->user_account_type);
            //Session::set('user_provider_type', 'DEFAULT');
            // put native avatar path into session
            //Session::set('user_avatar_file', $this->getUserAvatarFilePath());
            // put Gravatar URL into session
            //$this->setGravatarImageUrl($result->user_email, AVATAR_SIZE);

            // reset the failed login counter for that user (if necessary)
            		if ($result->user_last_failed_login > 0) {
                    		$sql = "UPDATE users SET user_failed_logins = 0, user_last_failed_login = NULL
                        			WHERE user_id = :user_id AND user_failed_logins != 0";
          	      		$sth = $this->db->prepare($sql);
                    		$sth->execute(array(':user_id' => $result->user_id));
            		}

            // generate integer-timestamp for saving of last-login date
            		$user_last_login_timestamp = time();
            // write timestamp of this login into database (we only write "real" logins via login form into the
            // database, not the session-login on every page request
            		$sql = "UPDATE users SET user_last_login_timestamp = :user_last_login_timestamp WHERE user_id = :user_id";
            		$sth = $this->db->prepare($sql);
            		$sth->execute(array(':user_id' => $result->user_id, ':user_last_login_timestamp' => $user_last_login_timestamp));

            // if user has checked the "remember me" checkbox, then write cookie
            		if (isset($_POST['user_rememberme'])) {
            	       	$random_token_string = hash('sha256', mt_rand());
                // write that token into database
                		$sql = "UPDATE users SET user_rememberme_token = :user_rememberme_token WHERE user_id = :user_id";
                		$sth = $this->db->prepare($sql);
                		$sth->execute(array(':user_rememberme_token' => $random_token_string, ':user_id' => $result->user_id));

                // generate cookie string that consists of user id, random string and combined hash of both
                		$cookie_string_first_part = $result->user_id . ':' . $random_token_string;
                		$cookie_string_hash = hash('sha256', $cookie_string_first_part);
               		$cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;
                // set cookie
                		setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
                	}
            // return true to make clear the login was successful
              	$_SESSION["feedback_positive"][] = "Login in successfully! Cong!";
            		return true;

        		} else {
            // crement the failed login counter for that user
            			$sql = "UPDATE users
                    			SET user_failed_logins = user_failed_logins+1, user_last_failed_login = :user_last_failed_login
                    			WHERE user_nickname = :user_nickname OR user_email = :user_nickname";
                    		$sth = $this->db->prepare($sql);
                    		$sth->execute(array(':user_nickname' => $_POST['user_nickname'], ':user_last_failed_login' => time() ));
            // feedback message
            			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_WRONG;
            			return false;
        		}
        // default return
               	return false;
              }

              public function Logout()
              {
              	setcookie('rememberme', false, time() - (3600 * 3650), '/', COOKIE_DOMAIN);
              	session_destroy();
              }

             public function LoginWithCookie() 
             {
             		$cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : '';

             		if(!$cookie) {
             			$_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
             			return false;
             		}

             		list($user_id, $theoken, $hash) = explode(':', $cookie);
             		if($hash !== hash('sha256', $user_id . ':' . $token)) {
             			$_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
             			return false;
             		}

             		if(empty($token)) {
             			$_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
             			return false;
             		}

             		$query = $this->db->prepare("SELECT user_id, user_name, user_email, user_password_hash,
             			user_failed_logins, user_last_failed_login
             			FROM users 
             			WHERE user_id = :user_id
                                       AND user_rememberme_token = :user_rememberme_token
                                       AND user_rememberme_token IS NOT NULL");
             		$query->execute(array('user_id' => $user_id, 'user_rememberme_token' => $token));
             		$count = $query->rowCount();
             		if ($count == 1) {
             			$result = $query->fetch();

             			session_start();
            			$_SESSION['user_logged_in'] = true;
            			$_SESSION['user_id'] = $result->user_id;
            			$_SESSION['user_nickname'] = $result->user_nickname;
            			$_SESSION['user_email'] = $result->user_email;

            			$_SESSION['feedback_positive'][] = FEEDBACK_LOGIN_SUCCESSFUL;
            			return true;
             		} else {
             			$_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
            			return false;
             		}
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
		if ($count != 1 ) {
			$_SESSION["feedback_negative"][] = FEEDBACK_UNKNOWN_ERROR;
                     return false;
            	}

            	$_SESSION["feedback_positive"][] = "Register successfully! Voila!";
            	return true;
	}
  }
	
}