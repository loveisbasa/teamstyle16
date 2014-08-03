CREATE TABLE `info`.`users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nickname` varchar(20) NOT NULL,
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_team` varchar(5) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  #`user_confirmed` tinyint(1) NOT NULL,
  `user_real_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(14) NOT NULL,
  `user_class` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0',
  `user_last_failed_login` int(10) DEFAULT NULL,
  `user-remmember_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  #`user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has a local avatar, 0 if not',
  #`user_used_space` int(11) NOT NULL DEFAULT '5395',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_nickname`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';
