CREATE TABLE IF NOT EXISTS `info`.`users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_team` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `user_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_real_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `user_class` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0',
  `user_last_failed_login` int(10) DEFAULT NULL,
  `user_rememberme_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_first_login` tinyint(1) DEFAULT '1',
  `user_type` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has a local avatar, 0 if not',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`user_refind_date` datetime, 
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_nickname`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `user_id` (`user_id`,`user_password_hash`),
  KEY `user_email_2` (`user_email`),
  KEY `user_nickname` (`user_nickname`),
  KEY `user_team` (`user_team`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=11 ;

CREATE TABLE IF NOT EXISTS`info`.`teams` (
`team_id` int(11) NOT NULL AUTO_INCREMENT,
`team_name` varchar(20) NOT NULL,
`team_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`team_slogan` text NOT NULL DEFAULT "",
`team_captain` int(11) NOT NULL,
`team_member1` int(11) NOT NULL DEFAULT '0',
`team_member2` int(11) NOT NULL DEFAULT '0',
`team_full` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8; 

CREATE TABLE IF NOT EXISTS`info`.`messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_from_id` int(11) NOT NULL,
  `message_to_id` int(11) ,
  `message_title` varchar(30) NOT NULL,
  `message_content` text NOT NULL,
  `message_send_date` datetime NOT NULL,
  `message_is_read` tinyint(1) NOT NULL,/*1表示已读，0表示未读......好吧，应该用bool类型的，先这样吧*/
  `message_type` varchar(5) NOT NULL,
  INDEX (`message_id`,`message_from_id`),
  INDEX (`message_to_id`),
	INDEX	(`message_send_date`),
	PRIMARY KEY (`message_id`),
  FOREIGN KEY (`message_from_id`) REFERENCES users (`user_id`)
	ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`message_to_id`) REFERENCES users (`user_id`)
	ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*以下几个表都是论坛用*/
/*-----------------------------------------------------------------------------*/
/*板块*/
CREATE TABLE IF NOT EXISTS`info`.`forums`(
`forum_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
`title` varchar(80) NOT NULL,
`intro` tinytext NOT NULL,
`latest_reply` datetime NOT NULL,
`count_thread` int NOT NULL, /*非必须，但是可以提高性能*/
`count_post` int NOT NULL,/*同上*/
PRIMARY KEY (`forum_id`),
INDEX(`forum_id`),
UNIQUE(`forum_id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8; 
/*每条主题*/
CREATE TABLE IF NOT EXISTS`info`.`threads`(
	`thread_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`forum_id`  tinyint(3) UNSIGNED NOT NULL,
	`user_id`  int(11) UNSIGNED NOT NULL,
	`subject` VARCHAR(150) NOT NULL,
  `content` VARCHAR(1000) NOT NULL,
	#主题名不应长于150字
  `establish_date` datetime NOT NULL,
  `latest_reply` datetime NOT NULL,
  `reply_count` int NOT NUll,
	PRIMARY KEY (`thread_id`),
	INDEX (`thread_id`),
	Index (`user_id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8; 
/*评论*/
CREATE TABLE IF NOT EXISTS`info`.`posts`(
	post_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	thread_id int(11) UNSIGNED NOT NULL,
	user_id int(11) UNSIGNED NOT NULL,
	message text NOT NULL,
	post_on datetime NOT NULL,
	PRIMARY KEY (post_id),
	INDEX (thread_id),
	INDEX (user_id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8; 

CREATE TABLE IF NOT EXISTS `info`.`files` (
`file_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`file_title` varchar(128) NOT NULL,
`file_author` int(11) NOT NULL,
`file_type` varchar(5) NOT NULL,
`file_date` datetime NOT NULL,
`file_ip` varchar(20) NOT NULL,
`file_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 


