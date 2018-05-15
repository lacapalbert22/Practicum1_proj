-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 05:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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

CREATE TABLE `company` (
  `company_id` int(100) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_desc` varchar(1000) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_landline` varchar(255) NOT NULL,
  `company_website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_desc`, `company_logo`, `company_address`, `company_landline`, `company_website`) VALUES
(40, 'Trend Micro', 'Trend Micro Inc. is a Japanese multinational cyber security & defense company founded in Los Angeles, California with global headquarters in Tokyo, Japan, a R&D center in Taipei, Taiwan, and regional headquarters in Asia, Europe and the Americas.', '833485.png', ' 8/F Tower 2, The Rockwell Business Center, 1600, Ortigas Ave, Pasig, Metro Manila', '(02) 995 6200', 'https://www.trendmicro.com'),
(42, 'Texas Instruments', 'Texas Instruments Inc. is an American technology company that designs and manufactures semiconductors and various integrated circuits, which it sells to electronics designers and manufacturers globally.', '296971.png', 'TEXAS INTRUMENTS, 271 Magsaysay Rd, Brgy. Loakan Proper, Baguio, 2600 Benguet', '(074) 447 1100', 'https://careers.ti.com'),
(45, 'Advanced World Solutions', 'stablished in 1993 as an Offshore Research and Development arm of a joint venture between IBM Japan and Toshiba TEC, we later on became an independent company, establishing our head office in Japan.', '189978.png', 'Unit 3B 3/F Multinational Bancorp Center, 6805 Ayala Avenue, Makati City', '(02) 889 5070', 'awsys-i.com'),
(46, 'IBM', 'IBM is an American multinational technology company headquartered in Armonk, New York, United States, with operations in over 170 countries.', '811648.png', ' 116 Eastwood Ave, Bagumbayan, Quezon City, 1110 Metro Manila', '(02) 995 6007', 'https://www.ibm.com');

-- --------------------------------------------------------

--
-- Table structure for table `company_contact`
--

CREATE TABLE `company_contact` (
  `id` int(10) NOT NULL,
  `contact_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `contact_person` (
  `contact_id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_initial` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `events` (
  `id` int(100) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_desc` varchar(100) NOT NULL,
  `event_venue` varchar(200) NOT NULL,
  `time1` varchar(100) NOT NULL,
  `available_slot` int(100) NOT NULL,
  `time2` varchar(100) NOT NULL,
  `event_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_desc`, `event_venue`, `time1`, `available_slot`, `time2`, `event_date`) VALUES
(1, 'Nokia Free Recruitement', 'This event is open for everyone who is awesome ', 'Left Wing SLU Bakakeng 6th Floor', '01:00', 10, '14:00', '2018-04-16'),
(22, 'Nokia Free Recruitement', 'see you on tv son', 'Bakakeng Road', '13:59', 100, '11:59', '2018-12-31'),
(24, 'Trend Micro', 'Trend Micro Recruitment', 'Silang Lobby', '09:00', 100, '05:00', '2018-04-20'),
(25, 'a', 'a', 'a', '04:01', 100, '03:02', '2018-05-10'),
(26, 'aaa', 'aaa', 'aaa', '01:59', 9, '00:59', '2018-05-04'),
(27, '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `par_id` int(100) NOT NULL,
  `par_lastname` text NOT NULL,
  `par_firstname` text NOT NULL,
  `par_mi` varchar(20) NOT NULL,
  `par_email` varchar(44) NOT NULL,
  `par_contact` int(16) NOT NULL,
  `event_fk` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`par_id`, `par_lastname`, `par_firstname`, `par_mi`, `par_email`, `par_contact`, `event_fk`) VALUES
(1, 'Lacap', 'Albert', 'I.', 'lacapalbert22@gmail.com', 90982948, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_image`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Benedick Bacani', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name_2` (`company_name`),
  ADD KEY `company_name` (`company_name`);

--
-- Indexes for table `company_contact`
--
ALTER TABLE `company_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `contact_id` (`contact_id`);

--
-- Indexes for table `contact_person`
--
ALTER TABLE `contact_person`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`par_id`),
  ADD KEY `event_fk` (`event_fk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `company_contact`
--
ALTER TABLE `company_contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact_person`
--
ALTER TABLE `contact_person`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `par_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`event_fk`) REFERENCES `events` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
