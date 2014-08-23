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
		//检查是否为空
		if (!isset($_POST['user_nickname']) OR empty($_POST['user_nickname'])) {
			$_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_FIELD_EMPTY;
			return false;
		}
		if (!isset($_POST['user_password']) OR empty($_POST['user_password'])) {
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_FIELD_EMPTY;
			return false;
		}

		//根据填入的昵称或者邮箱来查询数据库
		$sql = "SELECT user_id, 
			user_nickname, 
			user_password_hash, 
			user_email, 
			user_failed_logins, 
			user_last_failed_login, 
			user_first_login 
			user_type
			FROM users
				WHERE (user_nickname = :user_nickname OR user_email = :user_nickname) ";
		$query = $this->db->prepare($sql);
		$query->execute(array(':user_nickname' => $_POST['user_nickname']));
		$count = $query->rowCount();
		if ($count != 1) {
			$_SESSION['feedback_negative'][] = FEEDBACK_LOGIN_FAILED;
			return false;
		}
		$result = $query->fetch();

		//如果连续错误3次则在30秒后再试
		if (($result->user_failed_logins >= 3) AND ($result->user_last_failed_login > (time()-30))) {
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_WRONG_3_TIMES;
			return false;
		}

		//检查密码
		if (password_verify($_POST['user_password'], $result->user_password_hash)) {
			session_start();
			$_SESSION['user_logged_in'] = true;
			$_SESSION['user_id'] = $result->user_id;
			$_SESSION['user_nickname'] = $result->user_nickname;
			$_SESSION['user_email'] = $result->user_email;
			$_SESSION['user_first_login'] = $result->user_first_login;
			$_SESSION['user_type']=$result->user_type;
			//下面这些是可以选择扩展的一些功能
			//Session::set('user_account_type', $result->user_account_type);
			//Session::set('user_provider_type', 'DEFAULT');
			// put native avatar path into session
			//Session::set('user_avatar_file', $this->getUserAvatarFilePath());
			// put Gravatar URL into session
			//$this->setGravatarImageUrl($result->user_email, AVATAR_SIZE);
			
			//登陆成功则重设失败标记
			if ($result->user_last_failed_login > 0) {
				$sql = "UPDATE users SET user_failed_logins = 0, user_last_failed_login = NULL
				WHERE user_id = :user_id AND user_failed_logins != 0";
				$sth = $this->db->prepare($sql);
				$sth->execute(array(':user_id' => $result->user_id));
			}
			
			//下面同样是可选择扩展的功能，记录最后一次登陆的时间
			//$user_last_login_timestamp = time();
			// write timestamp of this login into database (we only write "real" logins via login form into the
			// database, not the session-login on every page request
			//$sql = "UPDATE users SET user_last_login_timestamp = :user_last_login_timestamp WHERE user_id = :user_id";
			//$sth = $this->db->prepare($sql);
			//$sth->execute(array(':user_id' => $result->user_id, ':user_last_login_timestamp' => $user_last_login_timestamp));
			
			//若点击‘记住我’，发送cookie
			if (isset($_POST['user_rememberme'])) {
				$random_token_string = hash('sha256', mt_rand());
				//将生成的token写入数据库
				$sql = "UPDATE users SET user_rememberme_token = :user_rememberme_token WHERE user_id = :user_id";
				$sth = $this->db->prepare($sql);
				$sth->execute(array(':user_rememberme_token' => $random_token_string, ':user_id' => $result->user_id));

				//生成cookie string包含user id, random string and combined hash of both
				$cookie_string_first_part = $result->user_id . ':' . $random_token_string;
				$cookie_string_hash = hash('sha256', $cookie_string_first_part);
				$cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;
				setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
			}
			//登陆成功，返回true
			if ($result->user_first_login == 1) {
				$query = $this->db->prepare("UPDATE users SET user_first_login = 0 WHERE user_id = :user_id");
				$query->execute(array(':user_id' => $result->user_id));
				//$count =  $query->rowCount();
			}
			$_SESSION["feedback_positive"][] = "Login in successfully! Cong!";
			return true;
		} else {
			// 密码错误，录入失败信息
			$sql = "UPDATE users
			SET user_failed_logins = user_failed_logins+1, user_last_failed_login = :user_last_failed_login
			WHERE user_nickname = :user_nickname OR user_email = :user_nickname";
			$sth = $this->db->prepare($sql);
			$sth->execute(array(':user_nickname' => $_POST['user_nickname'], ':user_last_failed_login' => time() ));
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_WRONG;
			return false;
		}
		// 默认返回false
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

		if (!$cookie) {
			$_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID. '!cookie';
			return false;
		}

		list($user_id, $token, $hash) = explode(':', $cookie);
		if ($hash !== hash('sha256', $user_id . ':' . $token)) {
			$_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID.'hash!==';
			return false;
		}
		if (empty($token)) {
			$_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID.'!token';
			return false;
		}

		$query = $this->db->prepare("SELECT user_id, user_nickname, user_email, user_password_hash,
			user_failed_logins, user_last_failed_login,user_type
			FROM users 
			WHERE user_id = :user_id
			AND user_rememberme_token = :user_rememberme_token
			AND user_rememberme_token IS NOT NULL");
		$query->execute(array(':user_id' => $user_id, ':user_rememberme_token' => $token));
		$count = $query->rowCount();
		if ($count == 1) {
			$result = $query->fetch();

			session_start();
			$_SESSION['user_logged_in'] = true;
			$_SESSION['user_id'] = $result->user_id;
			$_SESSION['user_nickname'] = $result->user_nickname;
			$_SESSION['user_email'] = $result->user_email;
			$_SESSION['user_type']=$result->user_type;
			$_SESSION['feedback_positive'][] = FEEDBACK_COOKIE_LOGIN_SUCCESSFUL;
			return true;
		} else {
			$_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID.'failed';
			return false;
		}
	}

	public function RegisterNewUser()
	{
		//前面这些if语句用来验证输入，只有完全符合要求才进入与数据库交互的模块
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

			//获取输入，使用strip_tags剔除输入
			$user_nickname = strip_tags($_POST['user_nickname']);
			$user_email = strip_tags($_POST['user_email']);
			$user_real_name = strip_tags($_POST['user_real_name']);
			$user_phone = strip_tags($_POST['user_phone']);
			$user_class = strip_tags($_POST['user_class']);
			//处理密码
			$hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
			$user_password_hash = password_hash($_POST['user_password_new'], PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));
			
			//昵称已经被使用过的情况
			$query = $this->db->prepare("SELECT user_id FROM users WHERE user_nickname = :user_nickname");
			$query->execute(array(':user_nickname' => $user_nickname));
			$count = $query->rowCount();
			if ($count ==1) {
				$_SESSION["feedback_negtive"][] = FEEDBACK_USERNAME_ALREADY_TAKEN;
				return false;
			}
			//邮箱已经被注册过的情况
			$query = $this->db->prepare("SELECT user_id FROM users WHERE user_email = :user_email");
			$query->execute(array(':user_email' => $user_email));
			$count =  $query->rowCount();
			if ($count == 1) {
				$_SESSION["feedback_negative"][] = FEEDBACK_USER_EMAIL_ALREADY_TAKEN;
				return false;
			}
			//权限设置
			if($_POST['user_type']=='dev') $user_type='dev';
			else $user_type='guest';
			$sql = "INSERT INTO users (user_nickname, user_password_hash, user_email, user_real_name, user_phone, user_class,user_type)
			VALUES (:user_nickname, :user_password_hash, :user_email, :user_real_name, :user_phone, :user_class,:user_type)";
			$query = $this->db->prepare($sql);
			$query->execute(array(':user_nickname' => $user_nickname,
				':user_password_hash' => $user_password_hash,
				':user_email' => $user_email,
				':user_real_name' => $user_real_name,
				':user_phone' => $user_phone,
				':user_class' => $user_class
				':user_type'=>$user_type) );
			$count = (int)$query->rowCount();
			if ($count != 1 ) {
				$_SESSION["feedback_negative"][] = FEEDBACK_UNKNOWN_ERROR;
				return false;
			}
			$_SESSION["feedback_positive"][] = "Register successfully! Voila!";
			return true;
		}
	}

	public function deleteCookie()
	{
		setcookie('rememberme', false, time() - (3600 * 3650), '/', COOKIE_DOMAIN);
	}

	public function isUserLoggedIn()
	{
		return $_SESSION['user_logged_in'];
	}
}
