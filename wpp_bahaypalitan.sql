-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2016 at 05:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
(7, 6, 2, 3, 2, 'home6_20160109030717.png', 'naay CR sa ubos.. nya ang swimming pool pwd libangan', 1500, 'ACTIVE', 'Home', '0', '0');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locID`, `countryID`, `cityName`, `latitude`, `longitude`, `status`) VALUES
(1, 0, 'Cebu City', '88.3', '-44.3', 'active'),
(2, 0, 'Davao City', '44.884', '20.55555', 'active'),
(3, 0, 'Quezon City', '88..45', '33.877', 'active'),
(4, 0, 'Manila City', '78.9999', '90.333322', 'active'),
(6, 0, 'Alaminos City ', '16.1603', '119.9803', 'active'),
(7, 0, 'Angeles City', '15.1500', '120.5833', 'active'),
(8, 0, 'Antipolo City', '14.5833', '121.1667', 'active'),
(9, 0, 'Bacolod City', '10.6667', '122.9500', 'active'),
(10, 0, 'Bacoor City', '14.4500', '120.9500', 'active'),
(11, 0, 'Bago City', '10.5333', '122.8333', 'active'),
(12, 0, 'Baguio City', '16.4167', '120.6000', 'active'),
(13, 0, 'Batangas City', '13.8333', '121.0000', 'active'),
(14, 0, 'Bogo City', '11.0300', '124.0000', 'active'),
(15, 0, 'Borongan City', '11.6000', '125.4333', 'active'),
(16, 0, 'Butuan City', '8.9500', '125.5333', 'active'),
(17, 0, 'Cabanatuan City', '15.4833', '120.9667', 'active'),
(18, 0, 'Cabuyao City', '14.2783', '121.1247', 'active'),
(19, 0, 'Cagayan De Oro City', '8.4833', '124.6500', 'active'),
(20, 0, 'Calamba City', '14.2167', '121.1667', 'active'),
(21, 0, 'Calbayog City', '12.0667', '124.6000', 'active'),
(22, 0, 'Caloocan City', '14.6500', '120.9700', 'active'),
(23, 0, 'Canlaon City', '10.3833', '123.2000', 'active'),
(24, 0, 'Catbalogan City', '11.7833', '124.8833', 'active'),
(25, 0, 'Carcar City', '10.1000', '123.6300', 'active'),
(26, 0, 'Cavite City', '14.2667', '120.8667', 'active'),
(27, 0, 'Cotabato City', '7.2167', '124.2500', 'active'),
(28, 0, 'Dagupan City', '16.0333', '120.3333', 'active'),
(29, 0, 'Danao City', '10.5200', '124.0300', 'active'),
(30, 0, 'Dapitan City', '8.6500', '123.4167', 'active'),
(31, 0, 'Dasmariñas City', '14.3264', '120.9361', 'active'),
(32, 0, 'Digos City', '6.7600', '125.3500', 'active'),
(33, 0, 'Dipolog City', '8.5667', '123.3333', 'active'),
(34, 0, 'Dumaguete City', '9.3167', '123.3000', 'active'),
(35, 0, 'Escalante City', '10.8333', '123.5000', 'active'),
(36, 0, 'General Santos City', '6.1167', '125.1667', 'active'),
(37, 0, 'Iligan City', '8.2333', '124.2500', 'active'),
(38, 0, 'Iloilo City', '10.7167', '122.5667', 'active'),
(39, 0, 'Imus City', '14.4000', '120.9333', 'active'),
(40, 0, 'Isabela City', '6.7000', '121.9667', 'active'),
(41, 0, 'koronadal City', '6.5000', '124.8500', 'active'),
(42, 0, 'Lapu-Lapu City', '10.3200', '123.9500', 'active'),
(43, 0, 'Las Piñas CIty', '14.4500', '120.9800', 'active'),
(44, 0, 'Legazpi City', '13.1333', '123.7333', 'active'),
(45, 0, 'Lipa City', '13.9411', '121.1622', 'active'),
(46, 0, 'Lucena City', '13.9333', '121.6167', 'active'),
(47, 0, 'Maasin City', '10.1333', '124.8500', 'active'),
(48, 0, 'Makati City', '14.5500', '121.0300', 'active'),
(49, 0, 'Malabon City', '14.6600', '120.9600', 'active'),
(50, 0, 'Malaybalay City', '8.1500', '125.1333', 'active'),
(51, 0, 'Malolos City', '14.8433', '120.8114', 'active'),
(52, 0, 'Mandaluyong City', '14.5800', '121.0300', 'active'),
(53, 0, 'Mandaue City', '10.3300', '123.9300', 'active'),
(54, 0, 'Marawi City', '8.0000', '124.3000', 'active'),
(55, 0, 'Marikina City', '14.6500', '121.1000', 'active'),
(56, 0, 'Masbate City', '12.3667', '123.6167', 'active'),
(57, 0, 'Muntinlupa City', '14.3800', '121.0500', 'active'),
(58, 0, 'Navotas City', '14.6667', '120.9417', 'active'),
(59, 0, 'Ormoc City', '11.0050', '124.6089', 'active'),
(60, 0, 'Ozamis City', '8.1500', '123.8500', 'active'),
(61, 0, 'Pagadian City', '7.8333', '123.4333', 'active'),
(62, 0, 'Parañaque City', '14.4700', '121.0200', 'active'),
(63, 0, 'Pasay City', '14.5500', '121.0000', 'active'),
(64, 0, 'Pasig City', '14.5750', '121.0833', 'active'),
(65, 0, 'Puerto Princesa', '9.7333', '118.7333', 'active'),
(66, 0, 'Roxas City', '11.5833', '122.7500', 'active'),
(67, 0, 'San Fernando City', '16.6167', '120.3167', 'active'),
(68, 0, 'Santiago City', '16.690014', '121.549072', 'active'),
(69, 0, 'Sorsogon City', '12.9667', '124.0000', 'active'),
(70, 0, 'Surigao City', '9.7833', '125.4833', 'active'),
(71, 0, 'Tabaco City', '13.3594', '123.7303', 'active'),
(72, 0, 'Tacloban City', '11.2400', '125.0000', 'active'),
(73, 0, 'Tacurong City', '6.6833', '124.6667', 'active'),
(74, 0, 'Tagaytay City', '14.1000', '120.9333', 'active'),
(75, 0, 'Tagbilaran City', '9.6500', '123.8500', 'active'),
(76, 0, 'Taguig City', '14.5500', '121.0500', 'active'),
(77, 0, 'Tagum CIty', '7.4500', '125.8000', 'active'),
(78, 0, 'Talisay City', '10.2500', '123.8300', 'active'),
(79, 0, 'Tarlac City', '15.4667', '120.5833', 'active'),
(80, 0, 'Tayabas', '14.0167', '121.5833', 'active'),
(81, 0, 'Toledo , Cebu', '10.3800', '123.6500', 'active'),
(82, 0, 'Tuguegarao City', '17.6167', '121.7167', 'active'),
(83, 0, 'Valencia', '39.4667', '0.3833', 'active'),
(84, 0, 'Valenzuela City', '14.7000', '120.9800', 'active'),
(85, 0, 'Vigan City', '17.5667', '120.3833', 'active'),
(86, 0, 'Zamboanga City', '6.9167', '122.0833', 'active'),
(87, 0, 'Antipolo, 1870 Rizal, Philippines', '14.6254827', '121.12448470000004', 'active'),
(88, 0, 'Cebu City, 6000 Cebu, Philippines', '10.3156992', '123.88543660000005', 'active'),
(89, 0, 'Camotes Rd, Cebu City, Cebu, Philippines', '10.3158987', '123.90958739999996', 'active'),
(90, 0, 'Tisa Basketball Gym, Cebu City, Cebu, Philippines', '10.3005414', '123.87064809999993', 'active'),
(91, 0, 'Lagtang, Talisay City, Cebu, Philippines', '10.2700868', '123.83135960000004', 'active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msgId`, `toID`, `fromID`, `content`, `sendDate`, `mstatus`) VALUES
(2, 2, 1, 'I like your homes and for me it''s a perfect place', '2015-09-26 05:12:48', 0),
(3, 1, 6, 'Hi..', '2016-01-07 03:48:37', 1);

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
--

CREATE TABLE IF NOT EXISTS `travel_plan` (
  `TravelPlanID` int(8) NOT NULL AUTO_INCREMENT,
  `PAmenities` varchar(255) NOT NULL,
  `PMaxGuests` int(11) NOT NULL,
  `PStartDate` date NOT NULL,
  `PEndDate` date NOT NULL,
  `locID` int(8) NOT NULL,
  `subID` int(8) NOT NULL,
  `Lat` varchar(100) NOT NULL COMMENT 'google latitude',
  `Long` varchar(100) NOT NULL COMMENT 'google longitude',
  `GoogleAddr` varchar(100) NOT NULL COMMENT 'google address',
  PRIMARY KEY (`TravelPlanID`),
  KEY `subID` (`subID`),
  KEY `locID` (`locID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `travel_plan`
--

INSERT INTO `travel_plan` (`TravelPlanID`, `PAmenities`, `PMaxGuests`, `PStartDate`, `PEndDate`, `locID`, `subID`, `Lat`, `Long`, `GoogleAddr`) VALUES
(1, 'amoang balay', 8, '2016-01-08', '2016-01-08', 87, 6, '14.6254827', '121.12448470000004', 'Antipolo, 1870 Rizal, Philippines'),
(2, '', 9, '2016-01-13', '2016-01-15', 89, 6, '10.3158987', '123.90958739999996', 'Camotes Rd, Cebu City, Cebu, Philippines'),
(3, '', 14, '2016-01-20', '2016-01-22', 90, 6, '10.3005414', '123.87064809999993', 'Tisa Basketball Gym, Cebu City, Cebu, Philippines'),
(4, '', 50, '2016-01-28', '2016-01-30', 91, 6, '10.2700868', '123.83135960000004', 'Lagtang, Talisay City, Cebu, Philippines');

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
