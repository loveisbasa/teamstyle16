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
			user_first_login,
			user_type,
			user_team
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
			$_SESSION['user_team']=$result->user_team;

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
			user_failed_logins, user_last_failed_login,user_type,user_team, user_first_login
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
			$_SESSION['user_team']=$result->user_team;
			$_SESSION['user_first_login']=$result->user_first_login;
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
		if($_POST['vcode']!=$_SESSION['captcha']){
				$_SESSION['feedback_negative'][]=FEEDBACK_WRONG_VC;
		}
		elseif (empty($_POST['user_nickname'])) {
			$_SESSION['feedback_negative'][] = FEEDBACK_USERNAME_FIELD_EMPTY;
		} elseif (empty($_POST['user_password_new']) OR empty($_POST['user_password_repeat'])) {
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_FIELD_EMPTY;
		} elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_REPEAT_WRONG;
		} elseif (strlen($_POST['user_password_new']) < 6) {
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_TOO_SHORT;
		} elseif (strlen($_POST['user_nickname']) > 64 OR strlen($_POST['user_nickname']) < 2) {
			$_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG;
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
			//AND preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_nickname'])
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
				$_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_ALREADY_TAKEN;
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
				':user_class' => $user_class,
				':user_type'=>$user_type));
			$count = (int)$query->rowCount();
			if ($count != 1) {
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

/**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     * Gravatar is the #1 (free) provider for email address based global avatar hosting.
     * The image url (on gravatar servers), will return in something like (note that there's no .jpg)
     * http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=80&d=mm&r=g
     *
     * For deeper info on the different parameter possibilities:
     * @see http://gravatar.com/site/implement/images/
     * @source http://gravatar.com/site/implement/images/php/
     *
     * @param string $email The email address
     * @param int $s Size in pixels [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param array $attributes Optional, additional key/value attributes to include in the IMG tag
     */
	public function setGravatarImageUrl($email, $s = 44, $d = 'mm', $r = 'pg', $attributes = array())
	{
	// create image URL, write it into session
		$image_url = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) .  "?s=$s&d=$d&r=$r";
		$_SESSION['user_gravatar_image_url'] = $image_url;
		// build <img /> tag around the URL
		$image_url_with_tag = '<img src="' . $image_url . '"';
		foreach ($attributes as $key => $val) {
			$image_url_with_tag .= ' ' . $key . '="' . $val . '"';
		}
		$image_url_with_tag .= ' />';

		// the image url like above but with an additional <img src .. /> around, write to session
		$_SESSION['user_gravatar_image_tag'] = $image_url_with_tag;
	}

	 /**
	 * Gets the user's avatar file path
	 * @return string avatar picture path
	 */
 	public function getUserAvatarFilePath()
 	{
 		$query = $this->db->prepare("SELECT user_has_avatar FROM users WHERE user_id = :user_id");
 		$query->execute(array(':user_id' => $_SESSION['user_id']));

 		if ($query->fetch()->user_has_avatar) {
 			return URL . AVATAR_PATH . $_SESSION['user_id'] . '.jpg';
 		} else {
 			return URL . AVATAR_PATH . AVATAR_DEFAULT_IMAGE;
 		}
 	}

 	/**
 	* Create an avatar picture (and checks all necessary things too)
 	* @return bool success status
 	*/
 	public function createAvatar()
 	{
 		if (!is_dir(AVATAR_PATH) OR !is_writable(AVATAR_PATH)) {
 			$_SESSION["feedback_negative"][] = FEEDBACK_AVATAR_FOLDER_DOES_NOT_EXIST_OR_NOT_WRITABLE;
 			return false;
 		}
 		if (!isset($_FILES['avatar_file']) OR empty ($_FILES['avatar_file']['tmp_name'])) {
 			$_SESSION["feedback_negative"][] = FEEDBACK_AVATAR_IMAGE_UPLOAD_FAILED;
 			return false;
 		}

 		// get the image width, height and mime type
 		$image_proportions = getimagesize($_FILES['avatar_file']['tmp_name']);

 		// if input file too big (>5MB)
 		if ($_FILES['avatar_file']['size'] > 5000000 ) {
 			$_SESSION["feedback_negative"][] = FEEDBACK_AVATAR_UPLOAD_TOO_BIG;
 			return false;
 		}
 		// if input file too small
 		if ($image_proportions[0] < AVATAR_SIZE OR $image_proportions[1] < AVATAR_SIZE) {
 			$_SESSION["feedback_negative"][] = FEEDBACK_AVATAR_UPLOAD_TOO_SMALL;
 			return false;
 		}

 		if ($image_proportions['mime'] == 'image/jpeg' || $image_proportions['mime'] == 'image/png') {
 		// create a jpg file in the avatar folder
 			$target_file_path = AVATAR_PATH . $_SESSION['user_id'] . ".jpg";
 			$this->resizeAvatarImage($_FILES['avatar_file']['tmp_name'], $target_file_path, AVATAR_SIZE, AVATAR_SIZE, AVATAR_JPEG_QUALITY, true);
 			$query = $this->db->prepare("UPDATE users SET user_has_avatar = TRUE WHERE user_id = :user_id");
 			$query->execute(array(':user_id' => $_SESSION['user_id']));
 			$_SESSION['user_avatar_file'] = $this->getUserAvatarFilePath();
 			$_SESSION["feedback_positive"][] = FEEDBACK_AVATAR_UPLOAD_SUCCESSFUL;
 			return true;
 		} else {
 			$_SESSION["feedback_negative"][] = FEEDBACK_AVATAR_UPLOAD_WRONG_TYPE;
 			return false;
 		}
 	}

 	public function resizeAvatarImage(
 		$source_image, $destination_filename, $width = 88, $height = 88, $quality = 85, $crop = true)
 	{
 		$image_data = getimagesize($source_image);
 		if (!$image_data) {
 			return false;
 		}

 		// set to-be-used function according to filetype
 		switch ($image_data['mime']) {
 			case 'image/gif':
 			$get_func = 'imagecreatefromgif';
 			$suffix = ".gif";
 			break;
 			case 'image/jpeg';
 			$get_func = 'imagecreatefromjpeg';
 			$suffix = ".jpg";
 			break;
 			case 'image/png':
 			$get_func = 'imagecreatefrompng';
 			$suffix = ".png";
 			break;
 		}
 		$img_original = call_user_func($get_func, $source_image );
 		$old_width = $image_data[0];
 		$old_height = $image_data[1];
 		$new_width = $width;
 		$new_height = $height;
 		$src_x = 0;
 		$src_y = 0;
 		$current_ratio = round($old_width / $old_height, 2);
 		$desired_ratio_after = round($width / $height, 2);
 		$desired_ratio_before = round($height / $width, 2);

 		if ($old_width < $width OR $old_height < $height) {
 		// the desired image size is bigger than the original image. Best not to do anything at all really.
 			return false;
 		}

 		// if crop is on: it will take an image and best fit it so it will always come out the exact specified size.
 		if ($crop) {
 		// create empty image of the specified size
 			$new_image = imagecreatetruecolor($width, $height);

 			// landscape image
 			if ($current_ratio > $desired_ratio_after) {
 				$new_width = $old_width * $height / $old_height;
 			}

 			// nearly square ratio image
 			if ($current_ratio > $desired_ratio_before AND $current_ratio < $desired_ratio_after) {
 				if ($old_width > $old_height) {
 					$new_height = max($width, $height);
 					$new_width = $old_width * $new_height / $old_height;
 				} else {
 					$new_height = $old_height * $width / $old_width;
 				}
 			}
 			// portrait sized image
 			if ($current_ratio < $desired_ratio_before) {
 				$new_height = $old_height * $width / $old_width;
 			}

 			// find ratio of original image to find where to croz
 			$width_ratio = $old_width / $new_width;
 			$height_ratio = $old_height / $new_height;

 			// calculate where to crop based on the center of the image
 			$src_x = floor((($new_width - $width) / 2) * $width_ratio);
 			$src_y = round((($new_height - $height) / 2) * $height_ratio);
 		}

 		// don't crop the image, just resize it proportionally
 		else {
 			if ($old_width > $old_height) {
 				$ratio = max($old_width, $old_height) / max($width, $height);
 			} else {
 				$ratio = max($old_width, $old_height) / min($width, $height);
 			}
 			$new_width = $old_width / $ratio;
 			$new_height = $old_height / $ratio;
 			$new_image = imagecreatetruecolor($new_width, $new_height);
 		}
 		// create avatar thumbnail
 		imagecopyresampled($new_image, $img_original, 0, 0, $src_x, $src_y, $new_width, $new_height, $old_width, $old_height);

 		// save it as a .jpg file with our $destination_filename parameter
 		imagejpeg($new_image, $destination_filename, $quality);
 		// delete "working copy" and original file, keep the thumbnail
		imagedestroy($new_image);
		imagedestroy($img_original);

		if (file_exists($destination_filename)) {
			return true;
		}
		// default return
		return false;
	}

	public function getUserProfile($user_id)
	{
		$sql = "SELECT *
			FROM users left join teams on teams.team_name=users.user_team 
			WHERE user_id = :user_id";
		$sth = $this->db->prepare($sql);
		$sth->execute(array(':user_id' => $user_id));

		$user = $sth->fetch();
		$count =  $sth->rowCount();

		if ($count == 1) {
			if (USE_GRAVATAR) {
				$user->user_avatar_link = $this->getGravatarLinkFromEmail($user->user_email);
			} else {
				$user->user_avatar_link = $this->getUserAvatarFilePath($user->user_has_avatar, $user->user_id);
				$_SESSION['src'] = $user->user_avatar_link;
			}
		} else {
			$_SESSION["feedback_negative"][] = FEEDBACK_USER_DOES_NOT_EXIST;
		}

		return $user;
	}

	public function getGravatarLinkFromEmail($email, $s = AVATAR_SIZE, $d = 'mm', $r = 'pg', $options = array())
	{
		$gravatar_image_link = 'http://www.gravatar.com/avatar/';
		$gravatar_image_link .= md5( strtolower( trim( $email ) ) );
		$gravatar_image_link .= "?s=$s&d=$d&r=$r";

		return $gravatar_image_link;
	}
}
