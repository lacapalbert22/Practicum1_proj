-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2018 at 04:21 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) NOT NULL,
  `event_desc` varchar(100) NOT NULL,
  `available_slot` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_desc`, `available_slot`) VALUES
(10, 'sample', 'sample 2', 100),
(5, 'Nokia Free Recruitement', 'Nokia will come to recruit postgraduates ', 100),
(6, 'Nokia Free Recruitement', 'Nokia will come to recruit postgraduates ', 100);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `person_id` int(10) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(20) NOT NULL,
  `person_email` varchar(20) NOT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `person_name`, `person_email`) VALUES
(1, 'lacapalbert22', ''),
(2, 'lacapalbert22', '2155902@slu.edu.ph'),
(3, 'admin', 'boss'),
(4, '2155902', 'boss'),
(5, 'partyt', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `sampletable`
--

DROP TABLE IF EXISTS `sampletable`;
CREATE TABLE IF NOT EXISTS `sampletable` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_pass` varchar(245) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
