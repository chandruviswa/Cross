-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2017 at 06:30 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chillum_timer`
--

-- --------------------------------------------------------

--
-- Table structure for table `kop_bill_details`
--

CREATE TABLE IF NOT EXISTS `kop_bill_details` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` varchar(5) NOT NULL,
  `amt` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `remarks` varchar(5000) NOT NULL,
  `unit_type` varchar(500) NOT NULL,
  `ser_tax` varchar(11) NOT NULL,
  `vat_tax` varchar(11) NOT NULL,
  `service` varchar(11) NOT NULL,
  `vat` varchar(11) NOT NULL,
  `tot_amt` varchar(100) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `full_print_status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
