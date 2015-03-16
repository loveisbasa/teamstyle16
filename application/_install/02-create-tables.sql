-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: info
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `battle`
--

DROP TABLE IF EXISTS `battle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `battle` (
  `battle_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id_a` int(11) NOT NULL,
  `team_id_b` int(11) NOT NULL,
  `a_score` int(11) NOT NULL,
  `b_score` int(11) NOT NULL,
  `winner` int(11) NOT NULL,
  PRIMARY KEY (`battle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_title` varchar(128) NOT NULL,
  `file_author` int(11) NOT NULL,
  `file_type` varchar(20) DEFAULT NULL,
  `file_date` datetime NOT NULL,
  `file_ip` varchar(20) NOT NULL,
  `file_size` int(11) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `forums`
--

DROP TABLE IF EXISTS `forums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forums` (
  `forum_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `intro` tinytext NOT NULL,
  `latest_reply` datetime NOT NULL,
  `count_thread` int(11) NOT NULL,
  `count_post` int(11) NOT NULL,
  PRIMARY KEY (`forum_id`),
  UNIQUE KEY `forum_id_2` (`forum_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `maps`
--

DROP TABLE IF EXISTS `maps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maps` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT,
  `round` int(11) DEFAULT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`map_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='user data';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_from_id` int(11) NOT NULL,
  `message_to_id` int(11) DEFAULT NULL,
  `message_title` varchar(30) NOT NULL,
  `message_content` text NOT NULL,
  `message_send_date` datetime NOT NULL,
  `message_is_read` tinyint(1) NOT NULL,
  `message_type` varchar(5) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `message_id` (`message_id`,`message_from_id`),
  KEY `message_to_id` (`message_to_id`),
  KEY `message_send_date` (`message_send_date`),
  KEY `message_from_id` (`message_from_id`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`message_from_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`message_to_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1052 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `post_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `message` text NOT NULL,
  `post_on` datetime NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `thread_id` (`thread_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(20) NOT NULL,
  `team_password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_slogan` text NOT NULL,
  `team_captain` int(11) NOT NULL,
  `team_member1` int(11) NOT NULL DEFAULT '0',
  `team_member2` int(11) NOT NULL DEFAULT '0',
  `team_full` tinyint(1) NOT NULL DEFAULT '1',
  `score` int(11) DEFAULT '0',
  `with_ai` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `threads` (
  `thread_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` tinyint(3) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `subject` varchar(150) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `establish_date` datetime NOT NULL,
  `latest_reply` datetime NOT NULL,
  `reply_count` int(11) NOT NULL,
  PRIMARY KEY (`thread_id`),
  KEY `thread_id` (`thread_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nickname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_team` varchar(20) DEFAULT NULL,
  `user_email` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_real_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_class` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0',
  `user_last_failed_login` int(10) DEFAULT NULL,
  `user_rememberme_token` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_first_login` tinyint(1) DEFAULT '1',
  `user_type` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has a local avatar, 0 if not',
  `user_password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_refind_date` datetime DEFAULT NULL,
  `test_battle` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_nickname`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `user_id` (`user_id`,`user_password_hash`),
  KEY `user_email_2` (`user_email`),
  KEY `user_nickname` (`user_nickname`),
  KEY `user_team` (`user_team`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8 COMMENT='user data';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-16 10:53:39
