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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `battle`
--

LOCK TABLES `battle` WRITE;
/*!40000 ALTER TABLE `battle` DISABLE KEYS */;
/*!40000 ALTER TABLE `battle` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forums`
--

LOCK TABLES `forums` WRITE;
/*!40000 ALTER TABLE `forums` DISABLE KEYS */;
INSERT INTO `forums` VALUES (1,'队友招募','寻找志同道合的小(da)伙(tui)伴','2014-10-01 16:35:54',3,5),(2,'吐槽灌水','喜闻乐见的……','2014-10-01 16:36:31',6,14),(3,'平台报错','又出bug了！！！有问题找学长，学长学长倾情奉献','2014-10-01 16:37:57',5,6);
/*!40000 ALTER TABLE `forums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maps`
--

DROP TABLE IF EXISTS `maps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maps` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT,
  `round` int(11) DEFAULT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`map_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maps`
--

LOCK TABLES `maps` WRITE;
/*!40000 ALTER TABLE `maps` DISABLE KEYS */;
INSERT INTO `maps` VALUES (31,50,'50round.map'),(32,10,'small10.map'),(33,500,'small.map'),(34,500,'big.map');
/*!40000 ALTER TABLE `maps` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,3,3,'测试','test                        ','2014-10-01 16:31:11',1,'sec'),(2,3,3,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(3,3,3,'回复:美工啊啊啊啊','teamstyle16回复到木有人么……','2014-10-02 22:07:19',1,'src'),(4,3,4,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(5,3,5,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(6,3,6,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(7,3,7,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(8,3,5,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(9,3,7,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(10,3,3,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(11,3,4,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',0,'pub'),(12,3,6,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(13,3,8,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(14,3,8,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(16,3,8,'好名字','                        (^_^)','2014-10-06 11:31:23',1,'sec'),(17,8,3,'回复:美工啊啊啊啊','飞翔的汤圆回复到我是来试验头像的...','2014-10-06 16:34:01',1,'src'),(18,8,3,'管理员是哪只~','    请问是哪只萌喵呢~~~                    ','2014-10-06 18:04:30',1,'sec'),(19,3,9,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(20,3,9,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(22,3,10,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(23,3,10,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(25,3,11,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(26,3,11,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(28,3,12,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(29,3,12,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(31,3,13,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(32,3,13,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(34,3,14,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(35,3,14,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(37,3,15,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(38,3,15,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(40,3,16,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(41,3,16,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(43,3,17,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',0,'pub'),(44,3,17,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',0,'pub'),(46,16,3,'回复:美工啊啊啊啊','Yeoman回复到不愿意','2014-10-09 22:42:22',1,'src'),(47,9,7,'发生了什么事','为什么突然冒出来这么多人……                        ','2014-10-10 07:51:04',1,'sec'),(48,3,18,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(49,3,18,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(51,3,19,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(52,3,19,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(54,9,3,'回复:美工啊啊啊啊','集结浩回复到好像可以了','2014-10-10 13:15:45',1,'src'),(55,9,9,'回复:修复bug','集结浩回复到不解释','2014-10-10 13:19:20',1,'src'),(56,7,7,'回复:再测试一发！','Ricky回复到回复一下试试看','2014-10-10 13:48:45',1,'src'),(57,7,7,'回复:再测试一发！','Ricky回复到fun 我就是如此脑洞大开','2014-10-10 13:50:09',1,'src'),(58,7,7,'回复:再测试一发！','Ricky回复到上一条不是我自己发的...一会儿删...','2014-10-10 13:51:03',1,'src'),(59,9,7,'回复:再测试一发！','集结浩回复到欢乐多啊欢乐多','2014-10-10 17:23:54',1,'src'),(60,3,8,'miao~~~','大家都可以是啦                        ','2014-10-10 22:01:20',1,'sec'),(61,3,3,'回复:美工啊啊啊啊','teamstyle16回复到再来一个','2014-10-10 22:01:42',1,'src'),(62,3,7,'回复:再测试一发！','teamstyle16回复到没有删除选项hiahia','2014-10-10 22:02:43',1,'src'),(63,3,8,'密码','$E=mc^2$','2014-10-10 22:03:43',1,'sec'),(64,3,7,'密码','$E=mc^2$                        ','2014-10-10 22:04:03',1,'sec'),(65,7,7,'回复:再测试一发！','Ricky回复到楼上是哪位...','2014-10-10 23:38:00',1,'src'),(66,8,7,'回复:再测试一发！','飞翔的汤圆回复到围观楼上卖萌打滚~','2014-10-11 08:41:48',1,'src'),(67,9,7,'回复:再测试一发！','集结浩回复到真是有论坛的感觉了呢','2014-10-12 22:21:10',1,'src'),(68,8,9,'回复:修复bug','飞翔的汤圆回复到整个论坛只有我们三个在水。。。','2014-10-13 00:08:20',1,'src'),(69,9,9,'回复:修复bug','集结浩回复到是不是可以公测了','2014-10-13 14:18:20',1,'src'),(70,3,20,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(71,3,20,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(73,20,9,'回复:修复bug','woinck回复到是可以公测了。。','2014-10-13 23:06:02',1,'src'),(74,3,21,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(75,3,21,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(77,3,22,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',0,'pub'),(78,3,22,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(80,3,23,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(81,3,23,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(83,3,24,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(84,3,24,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(86,3,25,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(87,3,25,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(89,3,25,'功能不少呢','                        还有私信','2014-10-14 23:57:32',1,'sec'),(90,3,7,'文件功能','文件上传用不了了                        ','2014-10-15 00:01:15',1,'sec'),(91,18,18,'回复:邀请码怎么回事啊太多了吧','test回复到哦，不是邀请码是验证码。','2014-10-22 12:29:37',1,'src'),(92,8,18,'回复:邀请码怎么回事啊太多了吧','飞翔的汤圆回复到喵喵~~~副部大大好~~~已经在修改啦~~~\r\n祝小泽大大在美帝玩的开心~当然更重要的是~不要忘记给我们带吃的~~~','2014-10-26 23:07:03',0,'src'),(93,3,13,'回复:新创建的队伍为什么在查看所有队伍里看不到o.o','teamstyle16回复到这个是队伍显示时满四个就会翻页，但是出了bug翻页按钮没有显示。谢谢反馈','2014-11-01 14:14:50',1,'src'),(94,3,18,'回复:邀请码怎么回事啊太多了吧','teamstyle16回复到吃的~^_^~','2014-11-01 14:19:08',0,'src'),(95,3,26,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(96,3,26,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(98,3,27,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(99,3,27,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(100,8,13,'回复:新创建的队伍为什么在查看所有队伍里看不到o.o','飞翔的汤圆回复到谢谢反馈，这是一个测试版，改名功能尚未上线，加人的话可以私信其他人，把队伍密码告诉他就行了','2014-12-02 13:55:45',1,'src'),(101,8,9,'回复:维护结束','飞翔的汤圆回复到辛苦~赞','2015-01-21 16:08:24',1,'src'),(106,9,9,'回复:维护结束','集结浩回复到竞赛流程还没有发布，再等等？','2015-01-25 01:20:22',1,'src'),(108,3,29,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(109,3,29,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub'),(110,3,30,'前进四！！！','欢迎来到队式16                        ','2014-10-01 16:32:00',1,'pub'),(111,3,30,'测试！！！','                        目前网站仍处于测试阶段  随时可能出现问题 消息也可能丢失 请注意！！','2014-10-06 09:39:59',1,'pub');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,3,'木有人么……','2014-10-02 22:07:19'),(2,1,9,'好像可以了','2014-10-10 13:15:44'),(3,3,9,'不解释','2014-10-10 13:19:20'),(4,4,7,'回复一下试试看','2014-10-10 13:48:45'),(5,4,7,'fun 我就是如此脑洞大开','2014-10-10 13:50:09'),(6,4,7,'上一条不是我自己发的...一会儿删...','2014-10-10 13:51:03'),(7,4,9,'欢乐多啊欢乐多','2014-10-10 17:23:54'),(8,1,3,'再来一个','2014-10-10 22:01:42'),(9,4,3,'没有删除选项hiahia','2014-10-10 22:02:43'),(10,4,7,'楼上是哪位...','2014-10-10 23:38:00'),(11,4,8,'围观楼上卖萌打滚~','2014-10-11 08:41:48'),(12,4,9,'真是有论坛的感觉了呢','2014-10-12 22:21:10'),(13,3,8,'整个论坛只有我们三个在水。。。','2014-10-13 00:08:20'),(14,3,9,'是不是可以公测了','2014-10-13 14:18:20'),(15,3,20,'是可以公测了。。','2014-10-13 23:06:02'),(16,7,18,'哦，不是邀请码是验证码。','2014-10-22 12:29:37'),(17,7,8,'喵喵~~~副部大大好~~~已经在修改啦~~~\r\n祝小泽大大在美帝玩的开心~当然更重要的是~不要忘记给我们带吃的~~~','2014-10-26 23:07:03'),(18,8,3,'这个是队伍显示时满四个就会翻页，但是出了bug翻页按钮没有显示。谢谢反馈','2014-11-01 14:14:50'),(19,7,3,'吃的~^_^~','2014-11-01 14:19:08'),(20,8,8,'谢谢反馈，这是一个测试版，改名功能尚未上线，加人的话可以私信其他人，把队伍密码告诉他就行了','2014-12-02 13:55:45'),(21,10,8,'辛苦~赞','2015-01-21 16:08:24'),(22,10,28,'给集结浩问个好！可是怎么也看不懂竞赛流程咋办？','2015-01-24 22:56:04'),(23,10,9,'竞赛流程还没有发布，再等等？','2015-01-25 01:20:22');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
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
  `score` int(11) DEFAULT '0',
  `with_ai` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (4,'TEST','8cfe1991f8b8ad6d37bf479c0b758c9d','测试一下～',7,8,0,1,0,0),(5,'demo','e10adc3949ba59abbe56e057f20f883e','test',3,0,0,0,0,0),(6,'0xFFFFFF','1c8e5b85ba252dc34924479e24d4bd3e','累成狗累成狗',11,0,0,0,0,0),(7,'啊渣渣','029a23c1c5ec99ffba5d732e1443c5c3','啊遍天下渣渣',25,0,0,0,0,0),(8,'test~','db84f1697c9979a605ca74cedba13bf5','我真的就是来试试这个能不能用。。。',14,0,0,0,0,0),(9,'11101001','4e97232a6f3a1bd4465c8055b79f27cb','贰叁叁',13,17,0,0,0,0),(10,'密码是6个1','96e79218965eb72c92a549dd5a330112','。。。',26,0,0,0,0,0);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threads`
--

LOCK TABLES `threads` WRITE;
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` VALUES (1,1,3,'美工啊啊啊啊','美工同学压力山大，有人愿意帮帮他么','2014-10-01 16:42:53','2014-10-10 22:01:42',5),(2,3,9,'test','test','2014-10-10 13:18:06','2014-10-10 13:18:06',0),(3,3,9,'修复bug','hiahiahiahia','2014-10-10 13:18:36','2014-10-13 23:06:02',4),(4,2,7,'再测试一发！','这次一定没问题ww\r\n没问题\r\n问题\r\n题','2014-10-10 13:48:03','2014-10-12 22:21:10',8),(5,1,25,'听说能招募队友','那又怎么样反正我只是卖萌而已','2014-10-15 13:15:26','2014-10-15 13:15:26',0),(6,2,14,'水一发刷存在感~','水！','2014-10-15 14:14:36','2014-10-15 14:14:36',0),(7,2,18,'邀请码怎么回事啊太多了吧','还有到处都有的卖萌又是怎么回事啊\r\n另外登录和登陆能不能统一一下 亲们\r\n','2014-10-22 12:27:43','2014-11-01 14:19:08',3),(8,3,13,'新创建的队伍为什么在查看所有队伍里看不到o.o','但是搜索还是可以搜到=w=\r\n还有我创建队伍之后怎么管理自己的队伍（改名加人什么的o.o','2014-10-31 18:58:28','2014-12-02 13:55:45',2),(9,1,26,'招募队友','密码是6个1，先放这里，反正没人。','2014-12-21 11:10:36','2014-12-21 11:10:36',0),(10,2,9,'维护结束','服务器维护总算结束了，整个结构都变了呢','2015-01-17 19:22:20','2015-01-25 01:20:22',3);
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;
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
  `user_real_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'teamstyle16','demo','teamstyle16@gmail.com','管理员','12345678910','队式网站组',0,NULL,'be590be434290a3d012cb7670d3e6d088d3b54ffeabe373d865522470787f52c',0,'admin',0,'3f4d735b1edfaf3a13456363f2d0a118',NULL),(4,'wangqr',NULL,'wqr14@mails.tsinghua.edu.cn','王启睿','13391815087','无46',0,NULL,NULL,0,'guest',0,'03b90955cfe7143505ca090a76e163d1',NULL),(5,'jas0n1ee',NULL,'i@jas0n1ee.me','js','18811363473','ee25',5,1412694689,NULL,1,'guest',0,'418f94b6423959ef39254ee664aace7a','2014-10-07 23:12:03'),(6,'yanghr',NULL,'yhr13@mails.tsinghua.edu.cn','杨幻睿','13426293220','无34班',0,NULL,NULL,0,'guest',0,'58890ed677ba13c46da833e29d58e465',NULL),(7,'Ricky','TEST','rickidynamic@gmail.com','王健宇','18801318931','无34',0,NULL,'09687b2214d31fcb95f669d6361d034d752c8b1181dc0dede35ff8739efb4e05',0,'guest',1,'4c7bdf4cc197aabe4309ef2ead7cf0aa',NULL),(8,'飞翔的汤圆','TEST','haoyuetang@126.com','汤皓玥','18936877906','无33',0,NULL,'da54d5708b99d87c5b8f1117a5abfd210e4edadff66edc12a7bdaab08eb3401c',0,'guest',1,'b4d5bd16445eb922c463f0293d1654c3',NULL),(9,'集结浩',NULL,'532276465@qq.com','聂浩','18811765207','无31',0,NULL,'e14e61d687f85dcc1753c194ffd6bab425e5f01dd6912b14b48296cdca2733af',0,'guest',1,'9754da0b478302b9b8fc4aad091a3780','2015-02-03 21:39:32'),(10,'Skywalker',NULL,'lgs930420@gmail.com','LGS','18810300973','W18',0,NULL,'7fde28c8ff7afc160aaa489a703704a94d0bbd873fac0fff999ccf0941b4aaa3',0,'guest',0,'a9be831afe8c69459451336e0aea0872',NULL),(11,'ThomasLee969','0xFFFFFF','lisihan969@gmail.com','李思涵','18800183697','无36',0,NULL,'adfa06871323c7ac57e3bd4f3d0409376bced667153715975ca53be138db7e1e',0,'guest',1,'5c1f8a3a8b7c20b5ce40f9c9da6c309d',NULL),(12,'Vone',NULL,'vfirst218@gmail.com','郭一隆','18813148108','无36',0,NULL,'05723b5704dc6e13c1b7047e91e64fe0a81538aec1f09597ae14cfb24cd85e42',0,'guest',0,'ad7950bec94fc6c53dd6531229195823',NULL),(13,'mushr∞m','11101001','cai_lw@126.com','蔡立崴','13121959798','无48',0,NULL,'0ddf890e7ef59ff6caf7713223924f6651a42b556ecb71af77fa49f4869b6ee0',0,'guest',1,'927881488b36b733996a4d79ee34ae8d',NULL),(14,'alex_zhangcx','test~','alex_zhangcx@yeah.net','张晨曦','15624955345','无48',0,NULL,'d15ab1a682cd0a0c72bfac7cd5692ef2fce0b0e0116d9d3c6005b8103e3a5cdf',0,'guest',0,'0c6c28f133e6766e7761ff1bcb635213',NULL),(15,'13aeon',NULL,'zbh14@mails.tsinghua.edu.cn','朱邦华','17888841922','无47',0,NULL,NULL,0,'guest',0,'e05445d5750e8c014bcba1115cd1041b',NULL),(16,'Yeoman',NULL,'zyeoman@163.com','庄永文','18612117986','无37',0,NULL,'a076f0ee8587cf2cb57405b9556684fb488bbc5b3c677e0030aa817ddad1f32f',0,'guest',1,'e19d5cd5af0378da05f63f891c7467af',NULL),(17,'LNCP','11101001','bigbigbige@163.com','葛盈泽','17888833474','无43班',0,NULL,'5b6f37dc89308152cae2a045816d75db2fa67365ff256ee1dfcfebbc9de9b6a6',0,'guest',0,'14f3dbfd6eecd19220b5a22c011d09a7',NULL),(18,'test',NULL,'test@test.test','池雨泽','15643061003','无23',0,NULL,'0f1408b42b0a6e2fd4effa37c3b93248037a14b2af1b81651f230b10709b7bb2',0,'guest',0,'c6b733ed139802698f9c9259cbde1350',NULL),(19,'kaola',NULL,'hjx14@mails.tsinghua.edu.cn','黄佳新','13121983908','无48',0,NULL,'1bac8c50d2f1c5bc0da2771bedd4ea858fe5d0843a115cff3466fd59c1174eab',0,'guest',0,'401a1aefe44e9ac18563e8958798ea3b',NULL),(20,'woinck',NULL,'woinck@126.com','胡益铭','15652142409','无29',0,NULL,'8236348ba8e2980908447421ea448c893ab3730da8d9e9973d03dc76b301e415',0,'guest',1,'923ee362d125cedf6ac31ee0f27a3bab',NULL),(21,'zcx4649',NULL,'nbfhzcx002@163.com','庄程旭','18810301152','无111班',0,NULL,NULL,0,'guest',0,'d37ad7732afb117fd2ef347f8f3e72ab',NULL),(22,'edz-o',NULL,'13261761059@163.com','张懿','13261761059','无38',0,NULL,NULL,0,'guest',0,'3858f62230ac3c915f300c664312c63f',NULL),(23,'Sengent',NULL,'wangkang-ziz@163.com','王康','18001040914','无21',0,NULL,NULL,0,'guest',0,'9e5fa2c8d6e63b95ec6a12427059b4db',NULL),(24,'mikuhatsune',NULL,'mr.sherlock.holmes@live.com','钟元熠','18800197735','无34',0,NULL,'f7e3e5163fe5553f2201804fb8da74b0f5367b81d7387f33f30ad4e512c93d54',0,'guest',0,'e331d15f297e9f40c7a977d49c7c4477',NULL),(25,'李文硕','啊渣渣','liws13@mails.tsinghua.edu.cn','李文硕','13261759815','无36',0,NULL,'7e1dda44826b54dbabfe936db0d4bd61f754159f6d6aace1300928ea10ae18e3',0,'guest',0,'25cc5612f0f54e1b230e5d70780d41ee','2014-10-15 11:02:08'),(26,'aviczhl2','密码是6个1','zoux14@mails.tsinghua.edu.cn','邹旭','18813119511','力4',0,NULL,NULL,0,'guest',0,'12106d85e485636af42626b1733d96e6',NULL),(27,'wengzhe',NULL,'weng-z13@mails.tsinghua.edu.cn','翁喆','18800183317','无32',0,NULL,'68cf878027b735a408098482f05bbdb4a82d6827320ab7460b4f2f2a7e4e7946',0,'guest',0,'602d917034bb8c5ef89fc2c24c8462f7',NULL),(29,'Please Delete Me.',NULL,'wangjianyu13@mails.tsinghua.edu.cn','Ricky','18801318931','w34',0,NULL,NULL,0,'guest',0,'0eff44c362b13fa25fc88a412f5512e1','2015-02-01 15:44:56'),(30,'tlyd',NULL,'tlyd13@mails.tsinghua.edu.cn','唐罗一都','18800185967','无36',0,NULL,NULL,0,'guest',0,'4f1cfc03a178bf6281231c52de997dc6',NULL);
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

-- Dump completed on 2015-02-08 22:05:14
