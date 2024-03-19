-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 05, 2024 at 11:21 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

DROP TABLE IF EXISTS `admin_detail`;
CREATE TABLE IF NOT EXISTS `admin_detail` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`admin_id`, `admin_name`, `email_id`, `pwd`) VALUES
(1, 'admin', 'admin@sportsclub.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

DROP TABLE IF EXISTS `booking_detail`;
CREATE TABLE IF NOT EXISTS `booking_detail` (
  `boking_id` int(10) NOT NULL,
  `upload_date` date NOT NULL,
  `play_date` date NOT NULL,
  `timings_id` int(10) NOT NULL,
  `ground_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `charges` int(10) NOT NULL,
  PRIMARY KEY (`boking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ground_detail`
--

DROP TABLE IF EXISTS `ground_detail`;
CREATE TABLE IF NOT EXISTS `ground_detail` (
  `ground_id` int(10) NOT NULL,
  `ground_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ground_img` varchar(50) NOT NULL,
  PRIMARY KEY (`ground_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ground_detail`
--

INSERT INTO `ground_detail` (`ground_id`, `ground_name`, `description`, `ground_img`) VALUES
(1, 'Cricket Ground', 'Cricket ground as per Icc rules', 'ground_img/1_1709637568.png');

-- --------------------------------------------------------

--
-- Table structure for table `member_regis`
--

DROP TABLE IF EXISTS `member_regis`;
CREATE TABLE IF NOT EXISTS `member_regis` (
  `member_id` int(10) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_regis`
--

INSERT INTO `member_regis` (`member_id`, `member_name`, `address`, `city`, `mobile_no`, `email_id`, `pwd`) VALUES
(1, 'maaz', 'atul', 'valsad', '9876543210', 'maaz@yahoo.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

DROP TABLE IF EXISTS `payment_detail`;
CREATE TABLE IF NOT EXISTS `payment_detail` (
  `payment_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `booking_id` int(10) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timmings_detail`
--

DROP TABLE IF EXISTS `timmings_detail`;
CREATE TABLE IF NOT EXISTS `timmings_detail` (
  `timings_id` int(10) NOT NULL,
  `ground_id` int(10) NOT NULL,
  `session_name` varchar(50) NOT NULL,
  `timings` varchar(20) NOT NULL,
  `charges` int(10) NOT NULL,
  PRIMARY KEY (`timings_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
