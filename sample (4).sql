-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2018 at 03:37 PM
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
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(100) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL,
  `company_desc` varchar(1000) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_landline` varchar(255) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `company_name_2` (`company_name`),
  KEY `company_name` (`company_name`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_desc`, `company_logo`, `company_address`, `company_landline`, `company_website`) VALUES
(40, 'Trend Micro', 'Trend Micro Inc. is a Japanese multinational cyber security & defense company founded in Los Angeles, California with global headquarters in Tokyo, Japan, a R&D center in Taipei, Taiwan, and regional headquarters in Asia, Europe and the Americas.', '833485.png', ' 8/F Tower 2, The Rockwell Business Center, 1600, Ortigas Ave, Pasig, Metro Manila', '(02) 995 6200', 'https://www.trendmicro.com'),
(42, 'Texas Instruments', 'Texas Instruments Inc. is an American technology company that designs and manufactures semiconductors and various integrated circuits, which it sells to electronics designers and manufacturers globally.', '296971.png', 'TEXAS INTRUMENTS, 271 Magsaysay Rd, Brgy. Loakan Proper, Baguio, 2600 Benguet', '(074) 447 1100', 'https://careers.ti.com'),
(45, 'Advanced World Solutions', 'stablished in 1993 as an Offshore Research and Development arm of a joint venture between IBM Japan and Toshiba TEC, we later on became an independent company, establishing our head office in Japan.', '189978.png', 'Unit 3B 3/F Multinational Bancorp Center, 6805 Ayala Avenue, Makati City', '(02) 889 5070', 'awsys-i.com'),
(46, 'IBM', 'IBM is an American multinational technology company headquartered in Armonk, New York, United States, with operations in over 170 countries.', '811648.png', ' 116 Eastwood Ave, Bagumbayan, Quezon City, 1110 Metro Manila', '(02) 995 6007', 'https://www.ibm.com'),
(47, 'Nokia', 'Still on progress.', '623959.png', 'Still on Progress....', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `company_contact`
--

DROP TABLE IF EXISTS `company_contact`;
CREATE TABLE IF NOT EXISTS `company_contact` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contact_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `contact_id` (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_contact`
--

INSERT INTO `company_contact` (`id`, `contact_id`, `company_id`) VALUES
(23, 18, 40),
(25, 20, 40);

-- --------------------------------------------------------

--
-- Table structure for table `contact_person`
--

DROP TABLE IF EXISTS `contact_person`;
CREATE TABLE IF NOT EXISTS `contact_person` (
  `contact_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `middle_initial` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_person`
--

INSERT INTO `contact_person` (`contact_id`, `first_name`, `middle_initial`, `last_name`, `address`, `email`, `contact_num`) VALUES
(18, 'Ralph Gian', 'E.', 'Diano', 'Masinloc, Zambales', 'giandiano@gmail.com', '0954xxxxxxx'),
(20, 'Leo Evrian', 'E.', 'admin', 'Thousand Sunny', 'leo_evrian@yahoo.com', '0921xxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) NOT NULL,
  `event_desc` varchar(100) NOT NULL,
  `event_venue` varchar(200) NOT NULL,
  `time1` varchar(100) NOT NULL,
  `available_slot` int(100) NOT NULL,
  `time2` varchar(100) NOT NULL,
  `event_date` varchar(100) NOT NULL,
  `company_fk` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_fk` (`company_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_desc`, `event_venue`, `time1`, `available_slot`, `time2`, `event_date`, `company_fk`) VALUES
(40, 'Nokia Free Recruitement', 'This event is open for everyone who is awesome ', 'Left Wing SLU Bakakeng 6th Floor', '01:00', 10, '14:00', '2018-04-16', 47),
(41, 'Trend Micro', 'Trend Micro Recruitment', 'Silang Lobby', '09:00', 100, '05:00', '2018-04-20', 42),
(45, 'Advanced World Solutions', 'An event held by advanced world solutions', 'Near the lobby', '13:00', 100, '14:00', '2018-05-01', 45),
(70, 'Event for Nokia', 'This is an event for nokia', 'Bakakeng Road Baguio City', '14:00', 123, '17:00', '2018-06-24', 47),
(71, 'Mama mo event na to', 'adawdawsd', 'awdawdadawd', '02:00', 123, '03:00', '2018-06-23', 46);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `par_id` int(100) NOT NULL AUTO_INCREMENT,
  `par_lastname` text NOT NULL,
  `par_firstname` text NOT NULL,
  `par_mi` varchar(20) NOT NULL,
  `par_email` varchar(44) NOT NULL,
  `course` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `par_contact` varchar(25) NOT NULL,
  `date_fk` int(8) NOT NULL,
  PRIMARY KEY (`par_id`),
  KEY `date_fk` (`date_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`par_id`, `par_lastname`, `par_firstname`, `par_mi`, `par_email`, `course`, `year`, `par_contact`, `date_fk`) VALUES
(2, 'lacap', 'albert', 'I.', 'lacapalbert22@gmail.com', 'Bsit', '4', '9088123', 37),
(3, 'lacaplada', 'albert', 'i.', 'asdaslkdj', 'awihdah', 'kaldlaks', '099123123', 37);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `date_id` int(11) NOT NULL AUTO_INCREMENT,
  `sched_date` date NOT NULL,
  `sched_venue` varchar(255) DEFAULT 'In progress...',
  `sched_time1` time DEFAULT NULL,
  `sched_time2` time DEFAULT NULL,
  `event_fk` int(10) NOT NULL,
  PRIMARY KEY (`date_id`),
  KEY `event_fk` (`event_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`date_id`, `sched_date`, `sched_venue`, `sched_time1`, `sched_time2`, `event_fk`) VALUES
(35, '2018-06-06', 'somewere', '02:00:00', '03:00:00', 70),
(36, '2018-06-06', 'venue', '06:06:00', '06:07:00', 70),
(37, '2018-07-06', 'venue', '06:07:00', '07:00:00', 70),
(38, '2018-05-06', 'awdawdawd', '04:00:00', '05:00:00', 70);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_image`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Benedick Bacani', ''),
(2, 'albert', '7aa129f67fde68c6d88aa58b8b8c5c28eb7dd3a3', 'hahahah', 'albert');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_contact`
--
ALTER TABLE `company_contact`
  ADD CONSTRAINT `company_contact_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`),
  ADD CONSTRAINT `company_contact_ibfk_2` FOREIGN KEY (`contact_id`) REFERENCES `contact_person` (`contact_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`company_fk`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`date_fk`) REFERENCES `schedule` (`date_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`event_fk`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
