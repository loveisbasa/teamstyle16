<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Configuration for: Project URL
 * Put your URL here, for local development "127.0.0.1" or "localhost" (plus sub-folder) is fine
 */

define('URL', 'http://166.111.223.20/');
//define('URL','http://teamstyle16.com/');
define("HASH_COST_FACTOR", "10");

define('AVATAR_PATH', 'public/avatars/');
define('LIBS_PATH', 'application/libs/');
define('CONTROLLER_PATH', 'application/controller/');
define('MODELS_PATH', 'application/models/');
define('VIEWS_PATH', 'application/views/');
define('UP_FILE_PATH', '/var/www/html/teamstyle16/uploads/');
/**
 * Configuration for: Cookies
 * Please note: The COOKIE_DOMAIN needs the domain where your app is,
 * in a format like this: .mydomain.com
 * Note the . in front of the domain. No www, no http, no slash here!
 * For local development .127.0.0.1 is fine, but when deploying you should
 * change this to your real domain, like '.mydomain.com' ! The leading dot makes the cookie available for
 * sub-domains too.
 * @see http://stackoverflow.com/q/9618217/1114320
 * @see php.net/manual/en/function.setcookie.php
 */
// 1209600 seconds = 2 weeks
define('COOKIE_RUNTIME', 1209600);
// the domain where the cookie is valid for, for local development ".127.0.0.1" and ".localhost" will work
// IMPORTANT: always put a dot in front of the domain, like ".mydomain.com" !
define('COOKIE_DOMAIN', '.localhost');

define("TEAM_INVITATION", "");
define("TEAM_INVITATION_CONTENT", "");

define('USE_GRAVATAR', false);
define('AVATAR_SIZE', 132);
define('AVATAR_JPEG_QUALITY', 85);
define('AVATAR_DEFAULT_IMAGE', 'default.jpg');

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'info');
define('DB_USER', 'duishi16');
//define('DB_USER','root');
//define('DB_PASS', 'wangjianyu');
define('DB_PASS', '******');
//define('DB_PASS', 'niehao');




define("FEEDBACK_UNKNOWN_ERROR", "Unknown error occurred!");
define("FEEDBACK_PASSWORD_WRONG_3_TIMES", "You have typed in a wrong password 3 or more times already. Please wait 30 seconds to try again.");
define("FEEDBACK_ACCOUNT_NOT_ACTIVATED_YET", "Your account is not activated yet. Please click on the confirm link in the mail.");
define("FEEDBACK_PASSWORD_WRONG", "Password was wrong.");
define("FEEDBACK_USER_DOES_NOT_EXIST", "This user does not exist.");
// The "login failed"-message is a security improved feedback that doesn't show a potential attacker if the user exists or not
define("FEEDBACK_PHONE_FIELD_EMPTY", "Phone number is empty.");
define("FEEDBACK_CLASS_FIELD_EMPTY", "Class is empty");
define("FEEDBACL_REAL_NAME_FIELD_EMPTY", "Real name is empty.");

define("FEEDBACK_MEMBER_ALREADY_HAS_TEAM", "你已经是队员了！！");
define("FEEDBACK_TEAM_CREATE_FAILED", "Something wrong. You failed.");
define("FEEDBACK_TEAM_CREATE_SUCCESSFULLY", "Your team is created successfully! Voila!");
define("FEEDBACK_ANN_SUCCESSFULLY", "系统消息发布成功");
define("FEEDBACK_TEAMNAME_FIELD_EMPTY","请输入队伍名");
define("FEEDBACK_INVALID_TEAM_MEMBER","不存在该用户" );
define("FEEDBACK_JOIN_FAILED","队伍加入失败");
define("FEEDBACK_TEAM_FULL","队伍已满");
define("FEEDBACK_WRONG_VC","错误的验证码");


define("FEEDBACK_LOGIN_FAILED", "Login failed.");
define("FEEDBACK_USERNAME_FIELD_EMPTY", "用户名不能为空。");
define("FEEDBACK_PASSWORD_FIELD_EMPTY", "密码不能为空");
define("FEEDBACK_EMAIL_FIELD_EMPTY", "邮箱不能为空");
define("FEEDBACK_EMAIL_AND_PASSWORD_FIELDS_EMPTY", "Email field was empty.");
define("FEEDBACK_USERNAME_SAME_AS_OLD_ONE", "Sorry, that username is the same as your current one. Please choose another one.");
define("FEEDBACK_USERNAME_ALREADY_TAKEN", "昵称已经被注册过了，换用其他的吧~");
define("FEEDBACK_USER_EMAIL_ALREADY_TAKEN", "Sorry, that email is already in use. Please choose another one.");
define("FEEDBACK_USERNAME_CHANGE_SUCCESSFUL", "Your username has been changed successfully.");
define("FEEDBACK_USERNAME_AND_PASSWORD_FIELD_EMPTY", "Username and password fields were empty.");
define("FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN", "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters.");
define("FEEDBACK_PHONE_DOES_NOT_FIT_PATTERN","小盆友不许耍赖哦，乖乖把手机号填好");
define("FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN", "Sorry, your chosen email does not fit into the email naming pattern.");
define("FEEDBACK_EMAIL_SAME_AS_OLD_ONE", "Sorry, that email address is the same as your current one. Please choose another one.");
define("FEEDBACK_EMAIL_CHANGE_SUCCESSFUL", "Your email address has been changed successfully.");
define("FEEDBACK_CAPTCHA_WRONG", "The entered captcha security characters were wrong.");
define("FEEDBACK_PASSWORD_REPEAT_WRONG", "Password and password repeat are not the same.");
define("FEEDBACK_PASSWORD_TOO_SHORT", "Password has a minimum length of 6 characters.");
define("FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG", "Username cannot be shorter than 2 or longer than 64 characters.");
define("FEEDBACK_EMAIL_TOO_LONG", "Email cannot be longer than 64 characters.");
define("FEEDBACK_ACCOUNT_SUCCESSFULLY_CREATED", "Your account has been created successfully and we have sent you an email. Please click the VERIFICATION LINK within that mail.");
define("FEEDBACK_VERIFICATION_MAIL_SENDING_FAILED", "Sorry, we could not send you an verification mail. Your account has NOT been created.");
define("FEEDBACK_ACCOUNT_CREATION_FAILED", "Sorry, your registration failed. Please go back and try again.");
define("FEEDBACK_VERIFICATION_MAIL_SENDING_ERROR", "Verification mail could not be sent due to: ");
define("FEEDBACK_VERIFICATION_MAIL_SENDING_SUCCESSFUL", "A verification mail has been sent successfully.");
define("FEEDBACK_ACCOUNT_ACTIVATION_SUCCESSFUL", "Activation was successful! You can now log in.");
define("FEEDBACK_ACCOUNT_ACTIVATION_FAILED", "Sorry, no such id/verification code combination here...");
define("FEEDBACK_AVATAR_UPLOAD_SUCCESSFUL", "Avatar upload was successful.");
define("FEEDBACK_AVATAR_UPLOAD_WRONG_TYPE", "Only JPEG and PNG files are supported.");
define("FEEDBACK_AVATAR_UPLOAD_TOO_SMALL", "Avatar source file's width/height is too small. Needs to be 100x100 pixel minimum.");
define("FEEDBACK_AVATAR_UPLOAD_TOO_BIG", "Avatar source file is too big. 5 Megabyte is the maximum.");
define("FEEDBACK_AVATAR_FOLDER_DOES_NOT_EXIST_OR_NOT_WRITABLE", "Avatar folder does not exist or is not writable. Please change this via chmod 775 or 777.");
define("FEEDBACK_AVATAR_IMAGE_UPLOAD_FAILED", "Something went wrong with the image upload.");
define("FEEDBACK_PASSWORD_RESET_TOKEN_FAIL", "Could not write token to database.");
define("FEEDBACK_PASSWORD_RESET_TOKEN_MISSING", "No password reset token.");
define("FEEDBACK_PASSWORD_RESET_MAIL_SENDING_ERROR", "Password reset mail could not be sent due to: ");
define("FEEDBACK_PASSWORD_RESET_MAIL_SENDING_SUCCESSFUL", "A password reset mail has been sent successfully.");
define("FEEDBACK_PASSWORD_RESET_LINK_EXPIRED", "Your reset link has expired. Please use the reset link within one hour.");
define("FEEDBACK_PASSWORD_RESET_COMBINATION_DOES_NOT_EXIST", "Username/Verification code combination does not exist.");
define("FEEDBACK_PASSWORD_RESET_LINK_VALID", "Password reset validation link is valid. Please change the password now.");
define("FEEDBACK_PASSWORD_CHANGE_SUCCESSFUL", "Password successfully changed.");
define("FEEDBACK_PASSWORD_CHANGE_FAILED", "Sorry, your password changing failed.");
define("FEEDBACK_ACCOUNT_UPGRADE_SUCCESSFUL", "Account upgrade was successful.");
define("FEEDBACK_ACCOUNT_UPGRADE_FAILED", "Account upgrade failed.");
define("FEEDBACK_ACCOUNT_DOWNGRADE_SUCCESSFUL", "Account downgrade was successful.");
define("FEEDBACK_ACCOUNT_DOWNGRADE_FAILED", "Account downgrade failed.");
define("FEEDBACK_NOTE_CREATION_FAILED", "Note creation failed.");
define("FEEDBACK_NOTE_EDITING_FAILED", "Note editing failed.");
define("FEEDBACK_NOTE_DELETION_FAILED", "Note deletion failed.");
define("FEEDBACK_COOKIE_INVALID", "Your remember-me-cookie is invalid.");
define("FEEDBACK_COOKIE_LOGIN_SUCCESSFUL", "You were successfully logged in via the remember-me-cookie.");
