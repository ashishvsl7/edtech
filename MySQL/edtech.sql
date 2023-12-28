-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 28, 2023 at 05:52 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

DROP TABLE IF EXISTS `certificate`;
CREATE TABLE IF NOT EXISTS `certificate` (
  `crt_id` int NOT NULL AUTO_INCREMENT,
  `co_id` int NOT NULL,
  `stu_id` int NOT NULL,
  `co_completed_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crt_issue_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unique1` varchar(255) NOT NULL,
  `unique2` varchar(255) NOT NULL,
  `mdcode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`crt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`crt_id`, `co_id`, `stu_id`, `co_completed_date`, `crt_issue_date`, `unique1`, `unique2`, `mdcode`) VALUES
(11, 1, 1, '2023-12-27 20:31:13', '2023-12-27 20:31:13', '1703709073269', '1703709073658c899141c155.71286377', '765385607fbaf2214e2783fdbbdf5a77'),
(10, 3, 1, '2023-12-27 20:27:59', '2023-12-27 20:27:59', '1703708879848', '1703708879658c88cfcf3bb1.67453142', 'd6c3130e79d8fe4a6bf707754a7590b2');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE IF NOT EXISTS `chapter` (
  `ch_id` int NOT NULL AUTO_INCREMENT,
  `co_id` int NOT NULL,
  `ch_name` varchar(255) NOT NULL,
  `ch_details` text NOT NULL,
  PRIMARY KEY (`ch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`ch_id`, `co_id`, `ch_name`, `ch_details`) VALUES
(1, 1, 'Chapter 1', 'Chapter 1 dummy text '),
(2, 1, 'Chapter 2', 'Chapter 2 dummy text'),
(3, 1, 'Chapter 3', 'Chapter 3 dummy text '),
(4, 1, 'Chapter 4', 'Chapter 4 dummy text'),
(5, 1, 'Chapter 5', 'Chapter 5 dummy text '),
(6, 2, 'Chapter 1 ', 'Chapter 1 dummy text'),
(7, 2, 'Chapter 2', 'Chapter 2 dummy text'),
(8, 3, 'Chapter 1 ', 'Chapter 1 dummy text'),
(9, 3, 'Chapter 2', 'Chapter 2 dummy text'),
(10, 4, 'Chapter 1 ', 'Chapter 1 dummy text'),
(11, 4, 'Chapter 2', 'Chapter 2 dummy text'),
(12, 5, 'Chapter 1 ', 'Chapter 1 dummy text'),
(13, 5, 'Chapter 2', 'Chapter 2 dummy text');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `co_id` int NOT NULL AUTO_INCREMENT,
  `co_name` varchar(255) NOT NULL,
  `co_totalchapter` int NOT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`co_id`, `co_name`, `co_totalchapter`) VALUES
(1, 'React JS', 5),
(2, 'Anguler JS', 2),
(3, 'PHP', 2),
(4, 'MySQL', 2),
(5, 'MERN', 3);


--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` int NOT NULL AUTO_INCREMENT,
  `stu_name` varchar(100) NOT NULL,
  `stu_mobile` varchar(15) NOT NULL,
  `stu_email` varchar(50) NOT NULL,
  `stu_address` varchar(255) NOT NULL,
  `stu_password` varchar(20) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_mobile`, `stu_email`, `stu_address`, `stu_password`) VALUES
(1, 'Ashish', '9999254967', 'a@gmail.com', '12345 Sec78', 'ashish'),
(2, 'Ashish. ', '9999254966', 'a1@gmail.com', 'Noida', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

DROP TABLE IF EXISTS `student_courses`;
CREATE TABLE IF NOT EXISTS `student_courses` (
  `stu_co_id` int NOT NULL AUTO_INCREMENT,
  `stu_id` int NOT NULL,
  `stu_chp_completed` varchar(1) NOT NULL DEFAULT 'N',
  `stu_cur_chp` int NOT NULL,
  PRIMARY KEY (`stu_co_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
