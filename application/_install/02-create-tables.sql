CREATE TABLE `info`.`users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nickname` varchar(20) NOT NULL,
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_team` varchar(20) DEFAULT NULL,
  `user_email` varchar(128) NOT NULL,
  #`user_confirmed` tinyint(1) NOT NULL,
  `user_real_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(14) NOT NULL,
  `user_class` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0',
  `user_last_failed_login` int(10) DEFAULT NULL,
  `user_remmember_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_first_login` tinyint(1) DEFAULT '1',
  #`user_in_team` tinyint(1) DEFAULT '0',
  #`user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has a local avatar, 0 if not',
  #`user_used_space` int(11) NOT NULL DEFAULT '5395',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_nickname`),
  UNIQUE KEY `user_email` (`user_email`),
  Index (`user_id`,`user_password_hash`),
	Index(`user_email`),
  Index (`user_nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

CREATE TABLE `info`.`teams` (
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

CREATE TABLE `info`.`announcementS` (
`ann_id` int(11) NOT NULL AUTO_INCREMENT,
`ann_title` varchar(20) NOT NULL,
`ann_content` text NOT NULL,
`ann_send_date` datetime NOT NULL,
PRIMARY KEY(`ann_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `info`.`messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_from_id` int(11) NOT NULL,
  `message_to_id` int(11) NOT NULL,
  `message_title` varchar(30) NOT NULL,
  `message_content` text NOT NULL,
  `message_send_date` datetime NOT NULL,
  `message_is_read` tinyint(1) NOT NULL,
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
CREATE TABLE `info`.`forum`(
`form_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
`form_name` varchar(60) NOT NULL,
PRIMARY KEY (`form_id`),
UNIQUE(`form_name`)
);

CREATE TABLE `info`.`thread`(
	`thread_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`form_id`  tinyint(3) UNSIGNED NOT NULL,
	`user_id`  int(11) UNSIGNED NOT NULL,
	`subject` VARCHAR(150) NOT NULL,
	#主题名不应长于150字
	PRIMARY KEY (`thread_id`),
	INDEX (`thread_id`),
	Index (`user_id`)
);

CREATE TABLE `info`.`post`(
	post_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	thread_id int(11) UNSIGNED NOT NULL,
	user_id int(11) UNSIGNED NOT NULL,
	message text NOT NULL,
	post_on datetime NOT NULL,
	PRIMARY KEY (post_id),
	INDEX (thread_id),
	INDEX （user_id)
);


