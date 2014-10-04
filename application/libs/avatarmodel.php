<?php

class avatarModel{
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

}
?>
