-- MySQL dump 10.14  Distrib 5.5.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: info
-- ------------------------------------------------------
-- Server version	5.5.37-MariaDB

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
-- Table structure for table `files`
--
use info;
DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_title` varchar(128) NOT NULL,
  `file_author` int(11) NOT NULL,
  `file_type` varchar(5) NOT NULL,
  `file_date` datetime NOT NULL,
  `file_ip` varchar(20) NOT NULL,
  `file_size` int(11) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forums`
--

LOCK TABLES `forums` WRITE;
/*!40000 ALTER TABLE `forums` DISABLE KEYS */;
INSERT INTO `forums` VALUES (1,'demo1','to be or not','2014-09-30 09:17:48',2,6);
/*!40000 ALTER TABLE `forums` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (2,1,2,'Welcome','欢迎来到对式16，前进四!!','2014-09-29 08:00:00',1,'Pub'),(3,1,3,'Welcome','欢迎来到对式16，前进四!!','2014-09-29 08:00:00',0,'Pub'),(4,1,4,'Welcome','欢迎来到对式16，前进四!!','2014-09-29 08:00:00',0,'Pub'),(5,1,5,'Welcome','欢迎来到对式16，前进四!!','2014-09-29 08:00:00',1,'Pub'),(6,1,6,'Welcome','欢迎来到对式16，前进四!!','2014-09-29 08:00:00',0,'Pub'),(7,1,7,'Welcome','欢迎来到对式16，前进四!!','2014-09-29 08:00:00',0,'Pub'),(8,1,8,'Welcome','欢迎来到对式16，前进四!!','2014-09-29 08:00:00',0,'Pub'),(9,1,9,'Welcome','欢迎来到对式16，前进四!!','2014-09-29 08:00:00',0,'Pub'),(10,1,11,'Welcome','欢迎来到对式16，前进四!!','2014-09-29 08:00:00',1,'Pub'),(11,2,1,'demo_to_1','nothing                        ','2014-10-01 00:16:58',1,'sec');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'测试队伍1','$2y$10$R.XI/mXcioSTlvJAZFN.het.rPEmHYCCRzmu4V2Yrs87iPV9jtFPe','这是一个口号！',1,2,3,1),(2,'测试队伍2','$2y$10$JdG6vQ9XV7bLQCEwGoSTLOpzwCrfFIAHE3CaERgN2/nVaklrBmOue','这是另一个口号！',4,5,0,0),(3,'测试队伍3','$2y$10$lEGRNJK3KsglJMyO.z2W8eQpxjZU7IiLcor/4duE8jAlxtwdpx22W','这是第3个口号！',7,9,8,1);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
  `user_refind_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_nickname`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `user_id` (`user_id`,`user_password_hash`),
  KEY `user_email_2` (`user_email`),
  KEY `user_nickname` (`user_nickname`),
  KEY `user_team` (`user_team`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'测试用户1','测试队伍1','demo001@demo.com','科协网站组','123456','科协网站组',0,NULL,'92fe2365368ff5335d9fd5a73f61541d58bdc799fd70fc59cc1bb7324fc30c17',0,'admin',1,'d9b3d64950895bfd87d53e136385d7e7',NULL),(2,'测试用户2','测试队伍1','demo002@demo.com','科协网站组','123456','科协网站组',0,NULL,NULL,0,'guest',0,'d9b3d64950895bfd87d53e136385d7e7',NULL),(3,'测试用户3','测试队伍1','demo003@demo.com','科协网站组','123456','科协网站组',0,NULL,NULL,0,'guest',0,'d9b3d64950895bfd87d53e136385d7e7',NULL),(4,'测试用户4','测试队伍2','demo004@demo.com','科协网站组','123456','科协网站组',0,NULL,NULL,0,'guest',0,'d9b3d64950895bfd87d53e136385d7e7',NULL),(5,'测试用户5','测试队伍2','demo005@demo.cpm','科协网站组','123456','科协网站组',0,NULL,NULL,0,'guest',1,'d9b3d64950895bfd87d53e136385d7e7',NULL),(6,'测试用户6',NULL,'demo006@demo.com','科协网站组','123456','科协网站组',0,NULL,NULL,1,'guest',0,'d9b3d64950895bfd87d53e136385d7e7',NULL),(7,'测试用户7','测试队伍3','demo007@demo.com','科协网站组','12345678901','科协网站组',0,NULL,NULL,0,'guest',0,'d9b3d64950895bfd87d53e136385d7e7',NULL),(8,'测试用户8','测试队伍3','demo008@demo.com','科协网站组','12345678901','科协网站组',0,NULL,NULL,0,'guest',0,'d9b3d64950895bfd87d53e136385d7e7',NULL),(9,'测试用户9','测试队伍3','demo009@demo.com','科协网站组','12345678901','科协网站组',0,NULL,NULL,0,'guest',0,'d9b3d64950895bfd87d53e136385d7e7',NULL),(10,'测试用户10',NULL,'demo010@demo.com','科协网站组','12345678901','科协网站组',0,NULL,NULL,1,'guest',0,'d9b3d64950895bfd87d53e136385d7e7',NULL),(11,'hsf',NULL,'532276465@qq.com','nh','18811765207','531',1,1412258176,NULL,0,'guest',0,'d9b3d64950895bfd87d53e136385d7e7',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-04 10:36:12
