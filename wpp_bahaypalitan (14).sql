-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2015 at 03:24 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `abuse_reports`
--

INSERT INTO `abuse_reports` (`reportID`, `fromuser`, `homeID`, `date_reported`) VALUES
(3, 5, 11, '0000-00-00 00:00:00');

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'brian', 'locaylocay', 'brian@webpropix.com', '2015-09-02 00:00:00', 1, 'G4M7pFiZKVHT9NkdbJn6', '2015-09-01 00:00:00', '2015-09-02 00:00:00', '173.252.120.6', '173.252.120.6', 1, NULL, NULL),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`homeID`, `ownerID`, `ATypeID`, `HTypeID`, `locID`, `photos`, `amenities`, `maxGuests`, `swapStatus`, `homePostType`, `dealNegotiation`, `cancelledNegotiation`) VALUES
(1, 5, 1, 3, 2, 'home5_20150913100337.jpg', 'dfdfdfdf', 2, 'ACTIVE', 'Home', '1', '0'),
(11, 8, 3, 1, 1, 'home8_20150913100948.jpg', '3asds', 2, 'DEACTIVE', 'Home', '0', '0'),
(12, 15, 1, 4, 1, 'home15_20150913100446.JPG', '4test', 5, 'ACTIVE', 'Home', '1', '0'),
(19, 8, 2, 4, 1, 'home8_20150913101006.jpg', '8-101', 6, 'ACTIVE', 'Home', '0', '0'),
(20, 5, 5, 4, 1, 'home5_20150913101137.jpg', '9=-dsdf', 7, 'ACTIVE', 'Home', '0', '0'),
(27, 17, 5, 1, 1, 'home17_20150913101406.jpg', '10', 6, 'ACTIVE', 'Home', '0', '7'),
(28, 18, 3, 4, 4, 'home18_20150913071619.jpg', '11test', 6, 'INACTIVE', 'Home', '1', '0'),
(29, 15, 2, 4, 3, 'home15_20150913094226.jpg', '1010', 8, 'INACTIVE', 'Division', '1', '0'),
(30, 15, 5, 3, 4, 'home15_20150913095005.jpg', '1010', 5, 'ACTIVE', 'Home', '0', '0'),
(31, 15, 2, 4, 4, 'home15_20150913100218.jpg', 'good', 6, 'ACTIVE', 'Home', '0', '0'),
(32, 5, 2, 1, 4, 'home5_20150926011103.jpg', '123123', 6, 'ACTIVE', 'Division', '0', '0'),
(33, 5, 5, 5, 2, 'home5_20150926011230.jpg', 'uip', 6, 'ACTIVE', 'Home', '0', '0');

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
  PRIMARY KEY (`swap_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `home_swap`
--

INSERT INTO `home_swap` (`swap_id`, `swap_home`, `swap_home_to`, `action`, `waiting_to`) VALUES
(19, 27, 1, 'done', 0),
(20, 12, 1, 'done', 0),
(23, 29, 28, 'swapped', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `house_type`
--

INSERT INTO `house_type` (`HTypeID`, `description`, `created_by`, `created_date`, `modified_date`, `created_ip`, `modified_ip`) VALUES
(1, 'Bungalow', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(3, 'Duplex', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(4, 'Apartment', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(5, 'Villa', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locID`, `countryID`, `cityName`, `latitude`, `longitude`, `status`) VALUES
(1, 0, 'Cebu City', '88.3', '-44.3', 'active'),
(2, 0, 'Davao City', '44.884', '20.55555', 'active'),
(3, 0, 'Quezon City', '88..45', '33.877', 'active'),
(4, 0, 'Manila City', '78.9999', '90.333322', 'active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msgId`, `toID`, `fromID`, `content`, `sendDate`, `mstatus`) VALUES
(5, 5, 8, 'dsfsd', '2015-08-03 06:51:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `more_photos`
--

CREATE TABLE IF NOT EXISTS `more_photos` (
  `imageID` int(11) NOT NULL AUTO_INCREMENT,
  `homeID` int(11) NOT NULL,
  `image` varchar(155) NOT NULL,
  PRIMARY KEY (`imageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `more_photos`
--

INSERT INTO `more_photos` (`imageID`, `homeID`, `image`) VALUES
(3, 13, '15_20150902063246.jpg'),
(4, 12, '15_20150913084838.jpg'),
(10, 31, '15_20150913100247.png'),
(11, 31, '15_20150913100258.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notie_id`, `from_user`, `to_user`, `content`, `date`, `nstatus`) VALUES
(1, 5, 6, 'John Yamz want to swap with your home', '2015-08-16 00:00:00', 1),
(10, 5, 15, 'John Yamz want to swap with your home.	View John Yamz''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=5&no=1">home</a>', '2015-08-17 01:14:35', 0),
(13, 5, 15, 'John Yamz want to swap with your home.	View John Yamz''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=5&no=1">home</a>', '2015-08-17 02:21:36', 0),
(15, 0, 15, 'You are now currently swapped with John Yamz.	View John Yamz''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=5&no=1">home</a>', '2015-08-17 02:30:53', 0),
(17, 0, 15, 'You are now currently swapped with John Yamz.	View John Yamz''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=5&no=1">home</a>', '2015-08-17 02:30:58', 0),
(20, 5, 15, 'John Yamz confirmed done swapping with your home. You can now swap with other home.', '2015-08-26 08:56:08', 0),
(26, 17, 5, 'sdfsdf sdfsdf want to swap with your home.	View sdfsdf sdfsdf''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=17&no=27">home</a>', '2015-09-04 08:23:27', 1),
(27, 17, 5, 'sdfsdf sdfsdf want to swap with your home.	View sdfsdf sdfsdf''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=17&no=27">home</a>', '2015-09-04 08:29:48', 0),
(28, 17, 5, 'sdfsdf sdfsdf want to swap with your home.	View sdfsdf sdfsdf''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=17&no=27">home</a>', '2015-09-04 09:40:57', 0),
(29, 17, 5, 'sdfsdf sdfsdf want to swap with your home.	View sdfsdf sdfsdf''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=17&no=27">home</a>', '2015-09-04 09:42:33', 0),
(30, 5, 17, 'John Yamz confirmed home swapping.	View John Yamz''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=5&no=1">home</a>', '2015-09-04 09:43:08', 1),
(31, 0, 5, 'You are now currently swapped with sdfsdf sdfsdf.	View sdfsdf sdfsdf''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=17&no=27">home</a>', '2015-09-04 09:43:08', 1),
(32, 5, 17, 'John Yamz confirmed home swapping.	View John Yamz''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=5&no=1">home</a>', '2015-09-04 10:24:54', 0),
(33, 0, 5, 'You are now currently swapped with sdfsdf sdfsdf.	View sdfsdf sdfsdf''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=17&no=27">home</a>', '2015-09-04 10:24:54', 1),
(34, 17, 5, 'sdfsdf sdfsdf is waiting for your Done swapping home confirmation.', '2015-09-06 09:52:49', 0),
(35, 5, 17, 'John Yamz confirmed done swapping with your home. You can now swap with other home.', '2015-09-06 11:34:25', 1),
(36, 15, 5, 'Brian Locaylocay want to swap with your home.	View Brian Locaylocay''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=15&no=12">home</a>', '2015-09-14 01:56:48', 0),
(37, 5, 15, 'John Yamz confirmed home swapping.	View John Yamz''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=5&no=1">home</a>', '2015-09-14 02:47:41', 1),
(38, 0, 5, 'You are now currently swapped with Brian Locaylocay.	View Brian Locaylocay''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=15&no=12">home</a>', '2015-09-14 02:47:41', 1),
(39, 5, 15, 'John Yamz is waiting for your Done swapping home confirmation.', '2015-09-14 02:51:15', 1),
(40, 15, 5, 'Brian Locaylocay confirmed done swapping with your home. You can now swap with other home.', '2015-09-14 02:51:32', 1),
(41, 15, 18, 'Brian Locaylocay want to swap with your home.	View Brian Locaylocay''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=15&no=12">home</a>', '2015-09-26 01:39:59', 0),
(42, 15, 18, 'Brian Locaylocay want to swap with your home.	View Brian Locaylocay''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=15&no=12">home</a>', '2015-09-26 01:52:35', 0),
(43, 15, 18, 'Brian Locaylocay want to swap with your home.	View Brian Locaylocay''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=15&no=29">home</a>', '2015-09-26 01:57:09', 0),
(44, 18, 15, 'Queenie Lodonia confirmed home swapping.	View Queenie Lodonia''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=18&no=28">home</a>', '2015-09-26 02:01:15', 1),
(45, 0, 18, 'You are now currently swapped with Brian Locaylocay.	View Brian Locaylocay''s <a href="http://localhost/bahaypalitan/user_page_viewhome?homeId=15&no=29">home</a>', '2015-09-26 02:01:15', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`id`, `subID`, `card`, `card_number`, `card_cvv`, `card_fname`, `card_lname`, `card_street`, `card_city`, `card_province`, `card_zipcode`) VALUES
(6, 15, 'Visa', 2147483647, '123', 'brian', 'locaylocay', 'tres de abril, Labangon', 'Cebu', 'Cebu', '6000'),
(7, 16, 'Visa', 1242, '546', 'cherry ann', 'joarta', 'test', 'test', 'test', '6000'),
(8, 17, 'Visa', 2147483647, '123', 'dsfdsf', 'sdfdsf', 'sdfsdf', 'sdfsdf', 'sdf', '6000'),
(9, 18, 'Visa', 2147483647, '123', 'queenie', 'lodonia', '123', '123', '123', '123'),
(10, 0, '12312123', 123123, '[val', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]'),
(11, 19, 'Visa', 2147483647, '123', 'sadfdsa', 'asdf', 'asd', 'asd', 'asd', 'asd');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_records`
--

INSERT INTO `payment_records` (`payment_id`, `from_id`, `value`, `pay_date`) VALUES
(1, 5, '5', '0000-00-00 00:00:00'),
(2, 5, '1.3', '0000-00-00 00:00:00');

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
  `rating_id` int(11) NOT NULL,
  `homeID` int(11) NOT NULL,
  `to_userId` int(11) NOT NULL,
  `from_userID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `safety` int(11) NOT NULL,
  `comfort` int(11) NOT NULL,
  `cleanliness` int(11) NOT NULL,
  `environment` int(11) NOT NULL,
  `accessibility` int(11) NOT NULL,
  `hospitality` int(11) NOT NULL,
  `honesty` int(11) NOT NULL,
  `reliability` int(11) NOT NULL,
  `overallimpression` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings_reviews`
--

INSERT INTO `ratings_reviews` (`rating_id`, `homeID`, `to_userId`, `from_userID`, `comment`, `safety`, `comfort`, `cleanliness`, `environment`, `accessibility`, `hospitality`, `honesty`, `reliability`, `overallimpression`) VALUES
(0, 1, 5, 17, 'kani ka may auto nga pakapin', 5, 6, 8, 6, 7, 6, 8, 7, 9),
(0, 27, 17, 5, 'test!', 6, 7, 5, 8, 6, 8, 5, 8, 6),
(0, 1, 5, 15, 'super fresh air at this home :D', 8, 7, 5, 7, 6, 8, 8, 7, 9),
(0, 12, 15, 5, 'unique home design thumbs up...', 9, 9, 7, 9, 9, 9, 8, 9, 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`subID`, `profilepic`, `lname`, `fname`, `mname`, `gender`, `birthdate`, `emailAdd`, `contactno`, `username`, `password`, `status`, `planID`, `planEnd`, `started`) VALUES
(1, '0.jpg', 'Yamid', 'John Carlo', 'Gasalatan', 'Male', '1993-12-31', 'jcyamid@yahoo.com', '09333960641', 'LYFSUX', 'f962bed5616612c8c7053f6e97e72b12', 0, 0, '2016-09-09 00:00:00', '0000-00-00 00:00:00'),
(2, '0.jpg', 'Nunez', 'Mary Jane', 'Villa', 'Female', '1992-09-13', 'john@yahoo.com', '1232323', 'TUTOR', '527bd5b5d689e2c32ae974c6229ff785', 1, 0, '2016-09-09 00:00:00', '0000-00-00 00:00:00'),
(3, '0.jpg', 'Nunez', 'Mary Jane', 'Balansag', 'Female', '1992-09-13', 'jenai13@yahoo.com', '12323123', 'Tutor', 'edc39b77ff9a4c851d503a05983b4450', 0, 0, '2016-09-09 00:00:00', '0000-00-00 00:00:00'),
(4, '0.jpg', 'Alegado', 'Dave', 'Anthony', 'Male', '2003-04-14', 'dave@yahoo.com', '09222222222', 'dave', '601f1889667efaebb33b8c12572835da3f027f78', 0, 0, '2016-09-09 00:00:00', '0000-00-00 00:00:00'),
(5, '0.jpg', 'Yamz', 'John', 'Gasa', 'Male', '1993-12-31', 'jcyamid@yahoo.com', '09056814008', 'jcyamid', '601f1889667efaebb33b8c12572835da3f027f78', 0, 0, '2016-09-09 00:00:00', '0000-00-00 00:00:00'),
(8, '0.jpg', 'Alquizar', 'Angellie', 'Noob', 'Female', '2015-08-06', 'wee@gmail.com', '123', 'test', '601f1889667efaebb33b8c12572835da3f027f78', 0, 0, '2016-09-09 00:00:00', '0000-00-00 00:00:00'),
(15, 'profile15_20150913104602.jpg', 'Locaylocay', 'Brian', 'Alolor', 'male', '2015-08-18', 'brian@proweaver.net', '09309897249', 'breyjhan', '601f1889667efaebb33b8c12572835da3f027f78', 0, 1, '2015-08-03 00:00:00', '2015-08-09 00:00:00'),
(16, 'Koala.jpg', 'joarta', 'cherry ann', 'susatana', 'female', '1997-06-11', 'brian@webpropix.com', '09309897249', 'you', '601f1889667efaebb33b8c12572835da3f027f78', 0, 2, '2016-09-09 00:00:00', '2015-08-16 00:00:00'),
(17, '0.jpg', 'sdfsdf', 'sdfsdf', 'sadfasdf', 'female', '1996-02-08', 'sdafsdaf@dasfs.com', 'q234', 'misingme', '601f1889667efaebb33b8c12572835da3f027f78', 0, 2, '2016-09-09 00:00:00', '2015-09-04 00:00:00'),
(18, '0.jpg', 'Lodonia', 'Queenie', 'Locaylocay', 'female', '1994-07-13', 'breyjhan@gmail.com', '0978965', 'queenly', '601f1889667efaebb33b8c12572835da3f027f78', 0, 4, '2016-09-09 00:00:00', '2015-09-09 00:00:00'),
(19, '0.jpg', 'asdf', 'sdafas', 'asdfsadf', 'male', '2015-09-23', 'asdfsad@asdf.com', 'fak', 'sdf', '601f1889667efaebb33b8c12572835da3f027f78', 1, 2, '2015-12-23 00:00:00', '2015-09-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `travel_plan`
--

CREATE TABLE IF NOT EXISTS `travel_plan` (
  `TravelPlanID` int(8) NOT NULL AUTO_INCREMENT,
  `PAmenities` varchar(255) NOT NULL,
  `PMaxGuests` int(11) NOT NULL,
  `PStartDate` date NOT NULL,
  `PEndDate` date NOT NULL,
  `locID` int(8) NOT NULL,
  `subID` int(8) NOT NULL,
  PRIMARY KEY (`TravelPlanID`),
  KEY `subID` (`subID`),
  KEY `locID` (`locID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `travel_plan`
--

INSERT INTO `travel_plan` (`TravelPlanID`, `PAmenities`, `PMaxGuests`, `PStartDate`, `PEndDate`, `locID`, `subID`) VALUES
(1, 'dfdfdfd', 3, '2015-07-07', '2015-07-14', 1, 1),
(2, 'fsfddsfsdfsdfsdfds', 4, '2015-07-07', '2015-07-14', 2, 1),
(3, 'Free WiFi, Air-Conditioner', 2, '2015-07-20', '2015-07-27', 3, 1),
(4, 'Free Wifi with CCTV, 5 rooms 2 with aircons, TV SAMSUNG , Car', 2, '2015-11-25', '2015-12-24', 1, 5),
(5, 'Adto qg CEBU palit AIRCON', 4, '2015-11-07', '2015-12-10', 1, 6),
(6, 'pool, garage', 2, '2015-09-07', '2015-11-07', 1, 7),
(13, 'sdas', 6, '2015-11-25', '2015-12-24', 4, 15),
(21, '12', 12, '2015-11-07', '2015-11-27', 4, 17),
(24, 'wqwe', 8, '2015-11-25', '2015-12-24', 3, 18);

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
(1, 'sdas', 6, '2015-11-25 00:00:00', '2015-12-24 00:00:00', 4, 15),
(2, 'wqwe', 8, '2015-11-25 00:00:00', '2015-12-24 00:00:00', 3, 18);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
