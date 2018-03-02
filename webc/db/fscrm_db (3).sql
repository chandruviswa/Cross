-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2018 at 01:12 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fscrm_db`
--
CREATE DATABASE IF NOT EXISTS `fscrm_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fscrm_db`;

-- --------------------------------------------------------

--
-- Table structure for table `add_company`
--

CREATE TABLE IF NOT EXISTS `add_company` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sid` int(255) NOT NULL,
  `aid` int(255) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `location` varchar(255) NOT NULL,
  `city` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `website` varchar(150) NOT NULL,
  `postal` varchar(40) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `add_company`
--

INSERT INTO `add_company` (`id`, `sid`, `aid`, `cname`, `location`, `city`, `email`, `website`, `postal`, `mobile`) VALUES
(1, 1, 2, 'falcon square pvt ltd', 'Ramanathapuram', 'Coimbatore', 'falcon@gmail.com', 'www.fsmanagers.com', '545404', '0422 51541'),
(2, 2, 77, 'google pvt ltd', 'Hydrabad', 'hydrabad', 'google@gmail.com', 'www.google.com', '4597499', '5456156564'),
(3, 1, 2, 'test', 'test', 'test', 'coimbatore@gmail.com', 'googled', '626232', '5451515515');

-- --------------------------------------------------------

--
-- Table structure for table `add_contacts`
--

CREATE TABLE IF NOT EXISTS `add_contacts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sid` int(255) NOT NULL,
  `aid` int(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `add_contacts`
--

INSERT INTO `add_contacts` (`id`, `sid`, `aid`, `name`, `mobile`, `email`, `location`) VALUES
(1, 1, 2, 'GOd', '484413426512', 'hod@ghmsail.com', 'Coimbatore'),
(2, 1, 2, 'guuru', '54295565', 'guru@gmail.com', 'bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `add_customer`
--

CREATE TABLE IF NOT EXISTS `add_customer` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(40) NOT NULL,
  `eid` int(50) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `product` varchar(200) NOT NULL,
  `date` varchar(30) NOT NULL,
  `sid` int(255) NOT NULL,
  `aid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `add_customer`
--

INSERT INTO `add_customer` (`id`, `name`, `email`, `mobile`, `address`, `status`, `eid`, `create_date`, `product`, `date`, `sid`, `aid`) VALUES
(4, 'venkatsk', 'venkats@gmail.com', '9443079499', 'coimbatore', 'Negative', 77, '2017-11-22', 'Hotel Software', '2018-02-16', 1, 2),
(7, 'chandruviswa', 'chandruviswachan@gmail.com', '9443079499', 'RAMANATHAPURAM', 'Possitive', 77, '2018-02-02', 'Software', '2018-02-10', 1, 2),
(9, 'panner', 'Raja1994.eng@gmail.com', '9443079499', 'RAMANATHAPURAM', 'Possitive', 77, '2018-02-02', 'Software', '2018-02-13', 1, 2),
(10, 'venkatkumar', 'Raja1994.eng@gmail.com', '9443079499', 'RAMANATHAPURAM', 'Positive', 77, '2018-02-06', 'Website', '2018-02-08', 1, 2),
(12, 'Chola', '', '', 'singanallur', 'Positive', 86, '2018-02-09', 'Software', '2018-02-12', 1, 3),
(13, 'guru', 'cube@gmail.com', '9443079499', 'RAMANATHAPURAM', 'Installed', 77, '2018-02-09', 'Hotel Software', '2018-02-15', 1, 2),
(14, 'harish', 'harish@gmail', '234234234234238', 'harish', 'Positive', 77, '2018-02-10', 'Hotel Software', '2018-02-24', 1, 2),
(15, 'ashok', 'ashol@gmail.com', '4564564561', 'Bangalore', 'Possitive', 87, '2018-02-12', 'Android APP', '2018-02-12', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `add_lead`
--

CREATE TABLE IF NOT EXISTS `add_lead` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `imageid` varchar(50) NOT NULL,
  `empid` int(50) NOT NULL,
  `totalcustomer` varchar(100) NOT NULL,
  `create_date` varchar(50) NOT NULL,
  `sid` int(255) NOT NULL,
  `aid` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `add_lead`
--

INSERT INTO `add_lead` (`id`, `username`, `password`, `name`, `designation`, `mobileno`, `email`, `imageid`, `empid`, `totalcustomer`, `create_date`, `sid`, `aid`) VALUES
(77, 'karth', 'karth', 'karthi', 'Marketing department', '7339221252', 'karthik@hj', '', 2, '1', '2017-11-1818:43:54', 1, 2),
(78, 'karthi', 'karthi', 'karthik', 'marketing', '564111641', 'karthi@gmail.com', '', 2, '1', '2017-11-2010:10:22', 1, 2),
(79, 'guru', 'guru', 'guruji', 'Sales department', '968945111847', 'newtest@gmail.com', '', 2, '1', '2017-11-2012:03:58', 1, 2),
(81, 'kumar', 'kumar', 'kumar', 'sales', '5456425955256', 'asdsad', '1', 0, '0', '1212121', 1, 2),
(82, 'ashok', 'ashok', 'ashok', 'Marketing department', '7010490735', 'ashok@gmail.com', '0', 0, '0', '2018-02-02', 1, 2),
(86, 'gokul', 'gokul', 'Gokul', 'Marketing department', '7418677871', 'info@cubespace.in', '0', 0, '0', '2018-02-09', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `add_user`
--

CREATE TABLE IF NOT EXISTS `add_user` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `privilege` varchar(100) NOT NULL,
  `counter` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `login_time` varchar(100) NOT NULL,
  `logout_time` varchar(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `add_user`
--

INSERT INTO `add_user` (`user_id`, `name`, `username`, `password`, `privilege`, `counter`, `branch`, `login_time`, `logout_time`, `emp_id`) VALUES
(1, 'ADMIN', 'abc', 'abc', '1', 'Admin', '1', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `create_date` varchar(50) NOT NULL,
  `sid` int(255) NOT NULL,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `mobile`, `create_date`, `sid`, `name`) VALUES
(2, 'viswa', '123', 'viswass@gmail.com', '733922123434', '2018-02-08', 1, 'viswa'),
(3, 'cube', 'jana', 'cube@gmail.com', '9047699935', '2018-02-09', 1, 'CUBE');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `message` longtext NOT NULL,
  `name` varchar(100) NOT NULL,
  `eid` int(100) NOT NULL,
  `create_date` varchar(100) NOT NULL,
  `create_time` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `name`, `eid`, `create_date`, `create_time`) VALUES
(1, 'finalones', '1', 1, ' 2017-11-23', ' 17:46:26'),
(2, 'finalones', '1', 1, ' 2017-11-23', ' 17:46:46'),
(3, 'finalteos', '1', 1, ' 2017-11-23', ' 17:47:23'),
(4, 'finalteos', '1', 1, ' 2017-11-23', ' 17:47:24'),
(5, 'finalteos', '1', 1, ' 2017-11-23', ' 17:47:42'),
(6, 'finalteos', '1', 1, ' 2017-11-23', ' 17:49:56'),
(7, 'finalthreees', '1', 1, ' 2017-11-23', ' 17:50:06'),
(8, 'finalthreees', '1', 1, ' 2017-11-23', ' 17:50:08'),
(9, 'finalthfours', '1', 1, ' 2017-11-23', ' 17:50:18'),
(10, 'finalthfours', '1', 1, ' 2017-11-23', ' 17:50:22'),
(11, 'dfd', '1', 1, ' 2017-11-23', ' 17:51:12'),
(12, 'sdfs', '1', 1, ' 2017-11-23', ' 17:53:18'),
(13, 'zxczcx', '1', 1, ' 2017-11-23', ' 17:54:00'),
(14, 'test', '1', 1, ' 2017-11-23', ' 17:56:09'),
(15, '4564', '1', 1, ' 2017-11-23', ' 17:56:41'),
(16, 'sdfdv', '1', 1, ' 2017-11-23', ' 18:00:20'),
(17, 'testing ', '1', 1, ' 2017-11-23', ' 18:00:37'),
(18, 'finding', '1', 1, ' 2017-11-23', ' 18:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `chat-room`
--

CREATE TABLE IF NOT EXISTS `chat-room` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `messageId` int(100) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `toUserId` int(100) NOT NULL,
  `toUserName` varchar(100) NOT NULL,
  `time` varchar(20) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `chat-room`
--

INSERT INTO `chat-room` (`id`, `messageId`, `userId`, `userName`, `toUserId`, `toUserName`, `time`, `message`, `status`) VALUES
(12, 2147483647, '0', 'Admin', 1, '', '17:35:10', ' test', ' 0'),
(13, 2147483647, '0', 'Admin', 1, '', '17:35:51', ' fgdfg', ' 0'),
(14, 432344, '1', 'chan', 3, '', '15:03:18', ' hik', ' pending'),
(15, 432344, '1', 'chan', 3, '', '15:04:23', ' hik', ' pending'),
(16, 432344, '1', 'chan', 3, '', '15:04:27', ' hik', ' pending'),
(17, 432344, '1', 'chan', 3, '', '15:05:13', ' hik', ' pending'),
(18, 432344, '1', 'chan', 3, '', '15:05:25', ' hik', ' pending'),
(19, 432344, '0', 'chan', 3, '', '15:06:24', ' hik', ' pending'),
(20, 432344, '0', 'chan', 3, '', '15:07:55', ' hik', ' pending'),
(21, 432344, '0', 'chan', 3, '', '15:08:54', ' hik', ' pending'),
(22, 432344, '0', 'chan', 3, '', '15:08:55', ' hik', ' pending'),
(23, 432344, '0', 'chan', 3, '', '15:08:56', ' hik', ' pending');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` longblob NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE IF NOT EXISTS `leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(200) NOT NULL,
  `contactperson` varchar(100) NOT NULL,
  `eid` int(255) NOT NULL,
  `aid` int(255) NOT NULL,
  `sid` int(255) NOT NULL,
  `updatedate` varchar(150) NOT NULL,
  `source` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `followdate` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `expecteddate` varchar(50) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` int(50) NOT NULL,
  `unit` int(200) NOT NULL,
  `total` int(200) NOT NULL,
  `comment` longtext NOT NULL,
  `create_date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `companyname`, `contactperson`, `eid`, `aid`, `sid`, `updatedate`, `source`, `status`, `followdate`, `time`, `expecteddate`, `product`, `qty`, `unit`, `total`, `comment`, `create_date`) VALUES
(6, '1', '1', 77, 2, 1, '2018-02-20', 'Google search', 'Positive', '2018-02-22', '02:01', '2018-02-24', 'Customize Software', 2, 250, 500, 'test', '2018-02-20'),
(7, '2', '2', 77, 2, 1, '2018-02-21', 'Company website', 'Confirmed', '2018-02-28', '04:00', '2018-02-28', 'Customize Software', 3, 250, 750, 'test', '2018-02-28'),
(8, '2', '2', 77, 2, 1, '2018-02-21', 'Google search', 'Negative', '2018-02-20', '15:01', '2018-02-23', 'Others', 5, 20, 100, 'testing', '2018-02-21'),
(9, '1', '2', 77, 2, 1, '2018-02-21', 'Google search', 'Positive', '2018-02-20', '02:01', '2018-02-24', 'Retail Software', 3, 450, 1350, 'under construction', '2018-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `eid` int(200) NOT NULL,
  `news` varchar(200) NOT NULL,
  `created_date` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES
(1, 1, 'new customer added Added', '1212112'),
(2, 1, 'venkatcustomer updated', '2018-02-02 : 11:25:33'),
(3, 0, 'customer deleted', '2018-02-02 : 12:16:55'),
(4, 0, 'New customer added', '2018-02-02 : 12:35:45'),
(5, 0, 'New customer added', '2018-02-02 : 12:35:45'),
(6, 0, 'customer deleted', '2018-02-02 : 12:35:56'),
(7, 0, 'New customer added', '2018-02-02 : 13:03:39'),
(8, 0, 'ashokEmployee updated', '2018-02-02 : 13:07:29'),
(9, 0, 'Employee deleted', '2018-02-03 : 10:33:27'),
(10, 77, 'New customer added', '2018-02-06 : 06:33:01'),
(11, 77, 'pannercustomer updated', '2018-02-06 : 06:33:14'),
(12, 77, 'venkatscustomer updated', '2018-02-06 : 06:35:59'),
(13, 1, 'venkatcustomer updated', '2018-02-06 : 10:13:30'),
(14, 0, 'Employee deleted', '2018-02-08 : 10:33:36'),
(15, 0, 'New Employee added', '2018-02-08 : 12:02:27'),
(16, 0, 'New Employee added', '2018-02-08 : 12:03:55'),
(17, 1, 'Employee deleted', '2018-02-08 : 12:06:27'),
(18, 77, 'Visit updated', '2018-02-08 : 12:37:40'),
(19, 0, 'customer deleted', '2018-02-08 : 12:48:38'),
(20, 0, 'venkatscustomer updated', '2018-02-08 : 12:49:00'),
(21, 77, 'venkatscustomer updated', '2018-02-08 : 12:56:59'),
(22, 77, 'Visit updated', '2018-02-08 : 12:57:25'),
(23, 77, 'chandruviswacustomer updated', '2018-02-08 : 13:00:05'),
(24, 0, 'New customer added', '2018-02-08 : 13:08:58'),
(25, 0, 'venkatskumarcustomer updated', '2018-02-08 : 13:10:57'),
(26, 0, 'venkatskumarcustomer updated', '2018-02-08 : 13:11:24'),
(27, 1, 'New Employee added', '2018-02-08 : 13:19:39'),
(28, 1, 'New Employee added', '2018-02-09 : 05:21:10'),
(29, 86, 'New customer added', '2018-02-09 : 05:22:20'),
(30, 0, 'Cholacustomer updated', '2018-02-09 : 05:25:05'),
(31, 0, 'venkatskumarcustomer updated', '2018-02-09 : 05:39:31'),
(32, 77, 'Visit updated', '2018-02-09 : 05:42:59'),
(33, 77, 'venkatskumarcustomer updated', '2018-02-09 : 05:43:28'),
(34, 77, 'Visit updated', '2018-02-09 : 05:46:18'),
(35, 77, 'venkatskumarcustomer updated', '2018-02-09 : 05:46:27'),
(36, 77, 'Visit updated', '2018-02-09 : 05:47:41'),
(37, 77, 'venkatskumarcustomer updated', '2018-02-09 : 05:47:53'),
(38, 77, 'Visit updated', '2018-02-09 : 06:24:54'),
(39, 0, 'New customer added', '2018-02-09 : 06:44:30'),
(40, 1, 'karthiEmployee updated', '2018-02-09 : 07:31:22'),
(41, 1, 'Employee deleted', '2018-02-09 : 07:31:33'),
(42, 0, 'customer deleted', '2018-02-09 : 07:31:56'),
(43, 77, 'New customer added', '2018-02-10 : 10:31:35'),
(44, 77, 'venkatskumarcustomer updated', '2018-02-10 : 11:15:18'),
(45, 77, 'venkatskcustomer updated', '2018-02-10 : 11:15:38'),
(46, 77, 'venkatskcustomer updated', '2018-02-10 : 11:15:59'),
(47, 77, 'venkatskcustomer updated', '2018-02-10 : 11:16:14'),
(48, 77, 'venkatskcustomer updated', '2018-02-10 : 11:16:23'),
(49, 77, 'venkatskcustomer updated', '2018-02-10 : 11:18:00'),
(50, 77, 'harishcustomer updated', '2018-02-10 : 11:18:38'),
(51, 77, 'harishcustomer updated', '2018-02-10 : 11:19:45'),
(52, 1, 'gurujiEmployee updated', '2018-02-10 : 12:03:04'),
(53, 0, 'venkatskcustomer updated', '2018-02-10 : 12:29:28'),
(54, 1, 'New Employee added', '2018-02-12 : 04:37:30'),
(55, 1, 'amirshEmployee updated', '2018-02-12 : 04:38:01'),
(56, 0, 'New customer added', '2018-02-12 : 04:40:21'),
(57, 77, 'customer updated', '2018-02-20 : 10:10:14'),
(58, 77, 'customer updated', '2018-02-20 : 10:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sid` int(255) NOT NULL,
  `aid` int(255) NOT NULL,
  `eid` int(255) NOT NULL,
  `orderid` int(255) NOT NULL,
  `totalamt` varchar(200) NOT NULL,
  `paid` varchar(200) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `create_date` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(255) NOT NULL AUTO_INCREMENT,
  `product` varchar(200) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product`) VALUES
(1, 'Hotel Software'),
(2, 'Website'),
(3, 'Android APP'),
(4, 'Retail Software'),
(5, 'Customize Software'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE IF NOT EXISTS `sources` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sources` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `sources`) VALUES
(1, 'Company website'),
(2, 'Denave/Trendsetters'),
(3, 'Existing client'),
(4, 'Google search'),
(5, 'HR sites / Resume'),
(6, 'Inbound Equiries'),
(7, 'Internal campaigns'),
(8, 'LinkedIn profile'),
(9, 'Others'),
(10, 'Paper Ads/ magazines'),
(11, 'Referral from Clients'),
(12, 'Referral from vendors'),
(13, 'Seminars /Exhibitions');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `eid` varchar(100) NOT NULL,
  `toeid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `task` longtext NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `eid`, `toeid`, `name`, `task`, `start_date`, `start_time`, `end_time`, `end_date`, `feedback`, `status`) VALUES
(1, '0', '1', 'ADMIN', ' test', '2017-11-28', '10:22:10', '10:22:17', '2017-11-30', '2017-11-29', 1),
(2, '1', '77', 'chandru', ' karthi', '2017-11-29', '12:20:22', '12:20:26', '2017-11-29', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `vist_type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `requirement` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `notes` longtext NOT NULL,
  `eid` int(100) NOT NULL,
  `visit_time` varchar(100) NOT NULL,
  `custom_id` int(100) NOT NULL,
  `next_visit` varchar(50) NOT NULL,
  `sid` int(255) NOT NULL,
  `aid` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `vist_type`, `name`, `location`, `requirement`, `status`, `notes`, `eid`, `visit_time`, `custom_id`, `next_visit`, `sid`, `aid`) VALUES
(1, 'Direct Customer Location', 'venkats', 'COIMBATORE', 'Test', 'Positive', 'Test', 77, '2018-02-08', 4, '2018-02-08', 1, 2),
(2, 'Direct Customer Location', 'venkatskumar', 'COIMBATORE', 'Test', 'Positive', 'Test', 77, '2018-02-09', 4, '2018-02-11', 1, 2),
(3, 'Direct Customer Location', 'venkatskumar', 'COIMBATORE', 'Test', 'Positive', 'Test', 77, '2018-02-09', 4, '2018-02-13', 1, 2),
(4, 'Direct Customer Location', 'venkatskumar', 'Coimbatore', 'Test', 'Positive', 'Test', 77, '2018-02-09', 4, '2018-02-15', 1, 2),
(5, 'BY Call', 'venkatskumar', 'Coimbatore', 'Test', 'Negative', 'Test', 77, '2018-02-09', 4, '2018-02-09', 1, 2),
(6, 'Direct Customer Location', 'chandruviswa', 'Coimbatore', 'Test', 'Negative', 'Test', 77, '2018-02-09', 7, '2018-01-08', 1, 2),
(7, 'Direct Customer Location', 'chandruviswa', 'COIMBATORE', 'Test', 'Negative', 'Test', 77, '2018-02-09', 7, '2018-02-09', 1, 2),
(8, 'Direct Customer Location', 'chandruviswa', 'Coimbatore', 'Test', 'Confirmed', 'Test', 77, '2018-02-09', 7, '2018-02-10', 1, 2),
(9, 'Direct Customer Location', 'chandruviswa', 'Coimbatore', 'Test', 'Positive', 'Test', 77, '2018-02-10', 7, '2018-02-10', 1, 2),
(10, 'Direct Customer Location', 'panner', 'dehili', 'tets', 'Positive', 'tets', 77, '2018-02-10', 9, '2018-02-13', 1, 2),
(11, 'Direct Customer Location', '', 'Coimbatore', 'Test', 'Negative', 'Test', 77, '2018-02-20', 6, '2018-02-20', 1, 2),
(12, 'BY Call', '', 'Coimbatore', 'Test', 'Negative', 'Test', 77, '2018-02-20', 6, '2018-02-23', 1, 2),
(13, 'Direct Customer Location', '', 'Coimbatore', 'Test', 'Positive', '', 77, '2018-02-20', 6, '2018-02-23', 1, 2),
(14, 'By Mail', '', 'COIMBATORE', 'tets', 'Installed', '', 77, '2018-02-20', 6, '2018-02-28', 1, 2),
(15, 'Direct Customer Location', '', 'Coimbatore', 'Test', 'Confirmed', '', 77, '2018-02-20', 6, '2018-02-28', 1, 2),
(16, 'Direct Customer Location', '', 'Coimbatore', 'Test', 'Pending', '', 77, '2018-02-21', 6, '2018-02-23', 1, 2),
(17, 'Direct Customer Location', '', 'Coimbatore', 'Test', 'Positive', '', 77, '2018-02-21', 6, '2018-02-22', 1, 2),
(18, 'Direct Customer Location', '', 'Hydrabad', 'Test', 'Positive', '', 77, '2018-02-21', 8, '2018-02-24', 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
