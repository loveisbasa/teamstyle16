CREATE TABLE `info`.`users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nickname` varchar(20) NOT NULL,
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_team` varchar(5) DEFAULT NULL,
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
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

CREATE TABLE `info`.`teams` (
`team_id` int(11) NOT NULL AUTO_INCREMENT,
`team_name` varchar(20) NOT NULL,
`team_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`team_slogan` text NOT NULL DEFAULT "",
`team_captain` int(11) NOT NULL,
`team_member_1` int(11) NOT NULL DEFAULT '0',
`team_member_2` int(11) NOT NULL DEFAULT '0',
`team_full` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8; 

CREATE TABLE `info`.`announcementS` (
`ann_id` int(11) NOT NULL AUTO_INCREMENT,
`ann_title` varchar(20) NOT NULL,
`ann_content` text NOT NULL,
`ann_send_date` datetime NOT NULL
PRIMARY KEY(`ann_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `info`.`messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_from` varchar(20) NOT NULL,
  `message_to` varchar(20) NOT NULL,
  `message_title` varchar(30) NOT NULL,
  `message_content` text NOT NULL,
  `meassage_send_date` datetime NOT NULL,
  `message_is_read` tinyint(1) NOT NULL,
  `message_type` varchar(5) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
