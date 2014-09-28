-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014-09-24 02:21:05
-- 服务器版本: 5.5.38-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `info`
--

-- --------------------------------------------------------

--
-- 表的结构 `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(20) NOT NULL,
  `team_password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_slogan` text NOT NULL,
  `team_captain` int(11) NOT NULL,
  `team_member1` int(11) NOT NULL DEFAULT '0',
  `team_member2` int(11) NOT NULL DEFAULT '0',
  `team_full` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `team_password_hash`, `team_slogan`, `team_captain`, `team_member1`, `team_member2`, `team_full`) VALUES
(1, '测试队伍1', '$2y$10$R.XI/mXcioSTlvJAZFN.het.rPEmHYCCRzmu4V2Yrs87iPV9jtFPe', '这是一个口号！', 1, 2, 3, 1),
(2, '测试队伍2', '$2y$10$JdG6vQ9XV7bLQCEwGoSTLOpzwCrfFIAHE3CaERgN2/nVaklrBmOue', '这是另一个口号！', 4, 5, 0, 0),
(3, '测试队伍3', '$2y$10$lEGRNJK3KsglJMyO.z2W8eQpxjZU7IiLcor/4duE8jAlxtwdpx22W', '这是第3个口号！', 7, 9, 8, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
