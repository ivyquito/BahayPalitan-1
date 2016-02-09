-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2016 at 05:34 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wpp_bahaypalitan`
--

-- --------------------------------------------------------

--
-- Table structure for table `abuse_reports`
--

CREATE TABLE IF NOT EXISTS `abuse_reports` (
  `reportID` int(11) NOT NULL AUTO_INCREMENT,
  `fromuser` int(11) NOT NULL,
  `homeID` int(11) NOT NULL,
  `date_reported` datetime NOT NULL,
  PRIMARY KEY (`reportID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `abuse_reports`
--

INSERT INTO `abuse_reports` (`reportID`, `fromuser`, `homeID`, `date_reported`) VALUES
(3, 5, 11, '0000-00-00 00:00:00'),
(4, 5, 27, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_firstname` varchar(100) DEFAULT NULL,
  `admin_lastname` varchar(100) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_birthdate` datetime DEFAULT NULL,
  `admin_gender` tinyint(4) DEFAULT NULL,
  `admin_token` varchar(250) NOT NULL,
  `admin_created` datetime DEFAULT NULL,
  `admin_modified` datetime DEFAULT NULL,
  `admin_created_ip` varchar(100) DEFAULT NULL,
  `admin_modified_ip` varchar(100) DEFAULT NULL,
  `admin_flag` tinyint(4) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_birthdate`, `admin_gender`, `admin_token`, `admin_created`, `admin_modified`, `admin_created_ip`, `admin_modified_ip`, `admin_flag`, `last_login`, `last_logout`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'brian', 'locaylocay', 'brian@webpropix.com', '2015-09-02 00:00:00', 1, 'o1cY2QaWi9XKbnH6g8Ll', '2015-09-01 00:00:00', '2015-09-02 00:00:00', '173.252.120.6', '173.252.120.6', 1, NULL, NULL),
(2, 'johnrobert', 'c0da0903211601d058250824485fa0a2', 'john robert', 'jerodiaz', 'johnrobertjerodiaz@gmail.com', '0000-00-00 00:00:00', 1, 'XAiNGK1pd7LJWY82FMZk', '2015-09-13 04:00:50', '2015-09-13 04:00:50', '::1', '::1', 1, NULL, NULL),
(3, 'dummytest', '861767d387e9384116275272ccc07d29', 'dummy', 'testing', 'dummytesting@gmail.com', '0000-00-00 00:00:00', 2, 'RcDoAVlgG8Z7Tm9adnpL', '2015-09-13 04:15:07', '2015-09-13 04:15:07', '::1', '::1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `area_type`
--

CREATE TABLE IF NOT EXISTS `area_type` (
  `ATypeID` int(8) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_ip` varchar(30) NOT NULL,
  `modified_ip` varchar(30) NOT NULL,
  PRIMARY KEY (`ATypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `area_type`
--

INSERT INTO `area_type` (`ATypeID`, `description`, `created_by`, `created_date`, `modified_date`, `created_ip`, `modified_ip`) VALUES
(1, 'Urban', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 'Rural', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(3, 'Mountain View', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(5, 'Sea Side View', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(6, 'City Side View', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `countryID` int(8) NOT NULL AUTO_INCREMENT,
  `countryName` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`countryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryID`, `countryName`, `status`) VALUES
(1, 'Philippines', 'ACTIVE'),
(2, 'USA', 'INACTIVE'),
(3, 'Japan', 'INACTIVE'),
(4, 'Hong Kong', 'INACTIVE'),
(5, 'Malaysia', 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE IF NOT EXISTS `homes` (
  `homeID` int(8) NOT NULL AUTO_INCREMENT,
  `ownerID` int(8) NOT NULL,
  `ATypeID` int(8) NOT NULL,
  `HTypeID` int(8) NOT NULL,
  `locID` int(8) NOT NULL,
  `photos` varchar(255) NOT NULL DEFAULT '0.jpg',
  `amenities` varchar(255) NOT NULL,
  `maxGuests` int(15) NOT NULL,
  `swapStatus` varchar(10) NOT NULL,
  `homePostType` varchar(100) NOT NULL,
  `dealNegotiation` varchar(255) NOT NULL,
  `cancelledNegotiation` varchar(255) NOT NULL,
  PRIMARY KEY (`homeID`),
  KEY `ownerID` (`ownerID`),
  KEY `ATypeID` (`ATypeID`),
  KEY `HTypeID` (`HTypeID`),
  KEY `locID` (`locID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`homeID`, `ownerID`, `ATypeID`, `HTypeID`, `locID`, `photos`, `amenities`, `maxGuests`, `swapStatus`, `homePostType`, `dealNegotiation`, `cancelledNegotiation`) VALUES
(1, 1, 1, 1, 2, 'home1_20150926035358.jpg', 'secured with CCTV''s\r\nfree WiFi\r\nCR with hot and cold', 5, 'ACTIVE', 'Home', '2', '1'),
(2, 2, 1, 3, 4, 'home2_20150926035321.jpg', '5 camera''s installed\r\n3 rooms with cable tv''s\r\n2 cr hot and cold', 5, 'INACTIVE', 'Home', '2', '0'),
(3, 3, 6, 1, 2, 'home3_20150926035633.jpg', '2 refrigerator\r\n4 cable TV''s\r\nWiFi with 5mbps\r\n3 rooms', 5, 'ACTIVE', 'Home', '0', '0'),
(4, 4, 6, 4, 4, 'home4_20150926035459.jpg', '2 rooms \r\n1 CR\r\nsecured with CCTV''s\r\nwith music room', 5, 'ACTIVE', 'Home', '3', '0'),
(5, 5, 1, 6, 1, 'home5_20150926035836.jpg', '2 CR, one with hot and cold\r\n3 LED TV''s\r\nWiFi with 5mbps\r\nwith semi GYM', 7, 'ACTIVE', 'Home', '0', '0'),
(6, 1, 1, 1, 8, 'home1_20151201060256.jpg', 'ikaduhang balay ni John Carlo', 10, 'ACTIVE', 'Home', '0', '0'),
(8, 6, 2, 1, 6, 'home6_20160126014920.jpg', 'The quick brown fox jumps', 5, 'ACTIVE', 'Home', '0', '0'),
(11, 1, 2, 3, 9, 'home1_20160208052349.png', '123', 2, 'ACTIVE', 'Division', '0', '0'),
(12, 1, 2, 4, 9, 'home1_20160208052456.jpg', 'sad', 5, 'ACTIVE', 'Division', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `home_swap`
--

CREATE TABLE IF NOT EXISTS `home_swap` (
  `swap_id` int(11) NOT NULL AUTO_INCREMENT,
  `swap_home` int(11) NOT NULL,
  `swap_home_to` int(11) NOT NULL,
  `action` varchar(155) NOT NULL,
  `waiting_to` int(11) NOT NULL,
  `date_swapped` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`swap_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `home_swap`
--

INSERT INTO `home_swap` (`swap_id`, `swap_home`, `swap_home_to`, `action`, `waiting_to`, `date_swapped`) VALUES
(1, 1, 2, 'swapped', 0, '2015-09-25 21:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `house_type`
--

CREATE TABLE IF NOT EXISTS `house_type` (
  `HTypeID` int(8) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_ip` varchar(30) NOT NULL,
  `modified_ip` varchar(30) NOT NULL,
  PRIMARY KEY (`HTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `house_type`
--

INSERT INTO `house_type` (`HTypeID`, `description`, `created_by`, `created_date`, `modified_date`, `created_ip`, `modified_ip`) VALUES
(1, 'Bungalow', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(3, 'Duplex', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(4, 'Apartment', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(5, 'Villa', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(6, 'Mansion', 1, '2015-09-26 04:00:23', '2015-09-26 04:00:23', '::1', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `locID` int(8) NOT NULL AUTO_INCREMENT,
  `countryID` int(8) NOT NULL,
  `cityName` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`locID`),
  KEY `INDEX` (`countryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locID`, `countryID`, `cityName`, `latitude`, `longitude`, `status`) VALUES
(1, 1, 'Cebu City, 6000 Cebu, Philippines', '10.3156992', '123.88543660000005', 'active'),
(2, 1, 'Bacolod, Negros Occidental, Philippines', '10.6407389', '122.96895649999999', 'active'),
(3, 1, 'Labangon, Cebu City, Cebu, Philippines', '10.2989677', '123.88131810000004', 'active'),
(4, 1, 'Pardo, Cebu City, Cebu, Philippines', '10.2785117', '123.85431270000004', 'active'),
(5, 1, 'Samboan, Cebu, Philippines', '9.5043588', '123.33739160000005', 'active'),
(6, 1, 'Basak, Lapu-Lapu City, Cebu, Philippines', '10.2910239', '123.96104100000002', 'active'),
(9, 1, 'Ginatilan, Cebu, Philippines', '9.5786947', '123.3598366', 'active'),
(10, 0, 'Badian, 6031 Cebu, Philippines', '9.8320892', '123.41592630000002', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `msgId` int(11) NOT NULL AUTO_INCREMENT,
  `toID` int(11) NOT NULL,
  `fromID` int(11) NOT NULL,
  `content` text NOT NULL,
  `sendDate` datetime NOT NULL,
  `mstatus` int(2) NOT NULL COMMENT '1-not read | 0-read ',
  PRIMARY KEY (`msgId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msgId`, `toID`, `fromID`, `content`, `sendDate`, `mstatus`) VALUES
(2, 2, 1, 'I like your homes and for me it''s a perfect place', '2015-09-26 05:12:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `more_photos`
--

CREATE TABLE IF NOT EXISTS `more_photos` (
  `imageID` int(11) NOT NULL AUTO_INCREMENT,
  `homeID` int(11) NOT NULL,
  `image` varchar(155) NOT NULL,
  PRIMARY KEY (`imageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `more_photos`
--

INSERT INTO `more_photos` (`imageID`, `homeID`, `image`) VALUES
(3, 13, '15_20150902063246.jpg'),
(4, 12, '15_20150913084838.jpg'),
(10, 31, '15_20150913100247.png'),
(11, 31, '15_20150913100258.jpg'),
(12, 7, '6_20160107101150.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notie_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `nstatus` int(10) NOT NULL,
  PRIMARY KEY (`notie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notie_id`, `from_user`, `to_user`, `content`, `date`, `nstatus`) VALUES
(1, 1, 2, 'John Carlo Yam-id want to swap with your home.	View John Carlo Yam-id''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=1&no=1">home</a>', '2015-09-26 05:56:43', 0),
(2, 2, 1, 'Rochelle Muana confirmed home swapping.	View Rochelle Muana''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=2&no=2">home</a>', '2015-09-26 05:57:17', 0),
(3, 0, 2, 'You are now currently swapped with John Carlo Yam-id.	View John Carlo Yam-id''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=1&no=1">home</a>', '2015-09-26 05:57:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE IF NOT EXISTS `payment_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subID` int(11) NOT NULL,
  `card` varchar(25) NOT NULL,
  `card_number` int(60) NOT NULL,
  `card_cvv` varchar(4) NOT NULL,
  `card_fname` varchar(255) NOT NULL,
  `card_lname` varchar(255) NOT NULL,
  `card_street` varchar(300) NOT NULL,
  `card_city` varchar(155) NOT NULL,
  `card_province` varchar(155) NOT NULL,
  `card_zipcode` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`id`, `subID`, `card`, `card_number`, `card_cvv`, `card_fname`, `card_lname`, `card_street`, `card_city`, `card_province`, `card_zipcode`) VALUES
(1, 1, 'Visa', 2147483647, '147', 'John Carlo', 'Yam-id', 'Cogon Pardo', 'Cebu City', 'Cebu', '6000'),
(2, 2, 'Visa', 2147483647, '147', 'Rochelle', 'Muana', 'Carmen,Cebu City', 'Cebu City', 'Camotes', '6000'),
(3, 3, 'Visa', 2147483647, '147', 'Angelie Wena', 'Alquizar', 'Cabangcalan', 'Mandaue City', 'Cebu', '6000'),
(4, 4, 'Visa', 2147483647, '147', 'Crystal Jean', 'Abellana', 'Catarman, Liloan', 'Cebu City', 'Cebu', '6000'),
(5, 5, 'Visa', 2147483647, '147', 'Marcel', 'Salazar', 'Basak', 'Cebu City', 'Leyte', '6000'),
(6, 6, 'Visa', 2147483647, '123', 'kent', 'mangubat', 'Cogon Pardo', 'Cebu City', 'Cebu', '6000');

-- --------------------------------------------------------

--
-- Table structure for table `payment_records`
--

CREATE TABLE IF NOT EXISTS `payment_records` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `value` varchar(15) NOT NULL,
  `pay_date` datetime NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payment_records`
--

INSERT INTO `payment_records` (`payment_id`, `from_id`, `value`, `pay_date`) VALUES
(1, 6, '6.40', '2015-12-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `planID` int(8) NOT NULL AUTO_INCREMENT,
  `planName` varchar(255) NOT NULL,
  `planDesc` varchar(255) NOT NULL,
  `planAmount` varchar(255) NOT NULL COMMENT 'value in US dollar',
  `status` varchar(255) NOT NULL,
  `plan_created_by` int(11) NOT NULL,
  `plan_created_date` datetime NOT NULL,
  `plan_modified_date` datetime NOT NULL,
  `plan_created_ip` varchar(30) NOT NULL,
  `plan_modified_ip` varchar(30) NOT NULL,
  PRIMARY KEY (`planID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`planID`, `planName`, `planDesc`, `planAmount`, `status`, `plan_created_by`, `plan_created_date`, `plan_modified_date`, `plan_created_ip`, `plan_modified_ip`) VALUES
(1, 'Platinum', '1 month', '2.13', '0', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 'Bronze', '3 months', '6.40', '0', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(3, 'Silver', '6 months', '12.80', '0', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(4, 'Gold', '12 months', '25.60', '0', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(6, 'Golden Brown', '15 months', '320.00', '0', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ratings_reviews`
--

CREATE TABLE IF NOT EXISTS `ratings_reviews` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `homeID` int(11) NOT NULL,
  `to_userId` int(11) NOT NULL,
  `from_userID` int(11) NOT NULL,
  `comment` text,
  `safety` varchar(11) DEFAULT NULL,
  `comfort` varchar(11) DEFAULT NULL,
  `cleanliness` varchar(11) DEFAULT NULL,
  `environment` varchar(11) DEFAULT NULL,
  `accessibility` varchar(11) DEFAULT NULL,
  `hospitality` varchar(11) DEFAULT NULL,
  `honesty` varchar(11) DEFAULT NULL,
  `reliability` varchar(11) DEFAULT NULL,
  `overallimpression` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ratings_reviews`
--

INSERT INTO `ratings_reviews` (`rating_id`, `homeID`, `to_userId`, `from_userID`, `comment`, `safety`, `comfort`, `cleanliness`, `environment`, `accessibility`, `hospitality`, `honesty`, `reliability`, `overallimpression`) VALUES
(1, 1, 1, 5, NULL, '3', '2', '4', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 1, 6, NULL, '4', '5', '4', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 8, 6, 1, 'sadness', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5');

-- --------------------------------------------------------

--
-- Table structure for table `ratings_user`
--

CREATE TABLE IF NOT EXISTS `ratings_user` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `rate_from` varchar(11) NOT NULL,
  `rate_to` varchar(11) NOT NULL,
  `rate_number` varchar(11) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ratings_user`
--

INSERT INTO `ratings_user` (`rate_id`, `rate_from`, `rate_to`, `rate_number`, `comment`) VALUES
(1, '6', '1', '4', 'sadasdasd'),
(2, '1', '3', '3', 'asdadadasd'),
(3, '5', '1', '2', 'ueaaa');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `subID` int(8) NOT NULL AUTO_INCREMENT,
  `profilepic` varchar(255) DEFAULT '0.jpg',
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `emailAdd` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0 - inactive / 1 - active',
  `planID` int(11) NOT NULL,
  `planEnd` datetime NOT NULL,
  `started` datetime NOT NULL,
  PRIMARY KEY (`subID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`subID`, `profilepic`, `lname`, `fname`, `mname`, `gender`, `birthdate`, `emailAdd`, `contactno`, `username`, `password`, `status`, `planID`, `planEnd`, `started`) VALUES
(1, 'profile1_20150926035101.jpg', 'Yam-id', 'John Carlo', 'Gasalatan', 'male', '1993-12-31', 'jcyamid@yahoo.com', '09333960641', 'jcyamid', 'c35b07262fca57647e4281358eec6674c2c5bb44', 1, 2, '2015-12-24 00:00:00', '2015-09-24 00:00:00'),
(2, 'profile2_20150926035204.jpg', 'Muana', 'Rochelle', 'Genato', 'male', '1990-11-12', 'rochelle@yahoo.com', '09225373062', 'muana', '756f2ac86efb7a98abc1a0fdbad39a7a3caa0063', 1, 1, '2015-10-25 00:00:00', '2015-09-25 00:00:00'),
(3, 'profile3_20150926035537.jpg', 'Alquizar', 'Angelie Wena', 'Sarmiento', 'female', '1993-09-07', 'angelie@yahoo.com', '09224715068', 'angelie', 'c35b07262fca57647e4281358eec6674c2c5bb44', 1, 1, '2015-10-25 00:00:00', '2015-09-25 00:00:00'),
(4, 'profile4_20150926035437.jpg', 'Abellana', 'Crystal Jean', 'Samedra', 'female', '1993-12-25', 'crystal@yahoo.com', '09232943152', 'crystal', 'c35b07262fca57647e4281358eec6674c2c5bb44', 1, 1, '2015-10-25 00:00:00', '2015-09-25 00:00:00'),
(5, 'profile5_20150926035730.jpg', 'Salazar', 'Marcel', 'Mancera', 'male', '1992-09-25', 'marcel@yahoo.com', '09056814009', 'marcel', 'c35b07262fca57647e4281358eec6674c2c5bb44', 1, 2, '2015-12-25 00:00:00', '2015-09-25 00:00:00'),
(6, '0.jpg', 'mangubat', 'kentoy', 'pabebe', 'male', '1992-12-04', 'kent@yahoo.com', '2343455', 'kentoy', 'c35b07262fca57647e4281358eec6674c2c5bb44', 1, 2, '2016-03-16 00:00:00', '2015-12-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `travel_plan`

CREATE TABLE IF NOT EXISTS `travel_plan` (
  `TravelPlanID` int(8) NOT NULL AUTO_INCREMENT,
  `PAmenities` varchar(255) NOT NULL,
  `PMaxGuests` int(11) NOT NULL,
  `PStartDate` date NOT NULL,
  `PEndDate` date NOT NULL,
  `locID` int(8) NOT NULL,
  `subID` int(8) NOT NULL,
  `Lat` varchar(200) NOT NULL COMMENT 'google latitude',
  `Long` varchar(200) NOT NULL COMMENT 'google longitude',
  `GoogleAddr` varchar(200) NOT NULL COMMENT 'google address'
  PRIMARY KEY (`TravelPlanID`),
  KEY `subID` (`subID`),
  KEY `locID` (`locID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `travel_plan`
--

INSERT INTO `travel_plan` (`TravelPlanID`, `PAmenities`, `PMaxGuests`, `PStartDate`, `PEndDate`, `locID`, `subID`) VALUES
(1, 'first balay ni John Carlosssssssss', 10, '2016-02-02', '2016-03-02', 4, 1),
(2, 'air conditioned room and WiFi', 5, '2015-11-25', '2015-12-25', 2, 2),
(3, 'should have airconditioned rooms', 5, '2015-10-25', '2015-11-25', 1, 3),
(4, 'should have refrigerator...1 airconditioned room...WiFi if  possible', 5, '2015-11-25', '2015-12-25', 2, 4),
(5, 'airconditioned room is enough', 5, '2015-10-25', '2015-11-25', 4, 5),
(6, 'try try lng bah', 10, '2016-02-02', '2016-03-02', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `travel_records`
--

CREATE TABLE IF NOT EXISTS `travel_records` (
  `tr_id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_amenities` text NOT NULL,
  `tr_maxGuests` int(11) NOT NULL,
  `tr_startDate` datetime NOT NULL,
  `tr_pEndDate` datetime NOT NULL,
  `tr_locID` int(11) NOT NULL,
  `tr_subID` int(11) NOT NULL,
  PRIMARY KEY (`tr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `travel_records`
--

INSERT INTO `travel_records` (`tr_id`, `tr_amenities`, `tr_maxGuests`, `tr_startDate`, `tr_pEndDate`, `tr_locID`, `tr_subID`) VALUES
(1, 'rooms with TV''s and air conditioned', 5, '2015-11-25 00:00:00', '2015-12-25 00:00:00', 4, 1),
(2, 'air conditioned room and WiFi', 5, '2015-11-25 00:00:00', '2015-12-25 00:00:00', 2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
