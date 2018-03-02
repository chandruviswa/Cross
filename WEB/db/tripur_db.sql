-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2018 at 05:10 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tripur_db`
--
CREATE DATABASE IF NOT EXISTS `tripur_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tripur_db`;

-- --------------------------------------------------------

--
-- Table structure for table `add_branch`
--

CREATE TABLE IF NOT EXISTS `add_branch` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(1000) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `add_branch`
--

INSERT INTO `add_branch` (`bid`, `branch`) VALUES
(1, 'Tripur');

-- --------------------------------------------------------

--
-- Table structure for table `add_counter`
--

CREATE TABLE IF NOT EXISTS `add_counter` (
  `counter_code` varchar(10) NOT NULL,
  `branch` varchar(25) NOT NULL,
  `company` varchar(50) NOT NULL,
  PRIMARY KEY (`counter_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `add_customer`
--

CREATE TABLE IF NOT EXISTS `add_customer` (
  `cus_code` int(100) NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`cus_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `add_employee`
--

CREATE TABLE IF NOT EXISTS `add_employee` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `address` varchar(400) NOT NULL,
  `city` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `emergent_no` bigint(20) NOT NULL,
  `blood_gp` varchar(20) NOT NULL,
  `material_sts` varchar(30) NOT NULL,
  `qualify` varchar(150) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `basic_sal` bigint(20) NOT NULL,
  `bonus` bigint(20) NOT NULL,
  `hra` bigint(10) NOT NULL,
  `pf` bigint(10) NOT NULL,
  `bata` varchar(50) NOT NULL,
  `ot` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `add_employee`
--

INSERT INTO `add_employee` (`eid`, `name`, `dob`, `address`, `city`, `mobile`, `emergent_no`, `blood_gp`, `material_sts`, `qualify`, `branch`, `designation`, `basic_sal`, `bonus`, `hra`, `pf`, `bata`, `ot`, `status`) VALUES
(1, 'parthiban', '1985-12-22', 'gollakuppam', 'vaniyampadi', 8940407986, 0, 'a o', '', '', '1', '1', 14000, 0, 0, 0, '', 0, 1),
(2, 'ramachandran', '12/13/93', 'kvr nager', 'tirupur', 9159931077, 0, '', '', '', '1', '3', 5000, 0, 0, 0, 'Weekly', 0, 1),
(3, 'velu', '2014-06-10', 'karaipudhur', 'tripur', 9788862755, 0, '', '', '', '1', '3', 0, 0, 0, 0, 'Monthly', 0, 1),
(4, 'sadasivam', '1995-12-07', 'kurinji nagar', 'tripur', 8524021124, 0, '', '', '', '1', '3', 0, 0, 0, 0, 'Monthly', 0, 1),
(5, 'Rakesh', '2001-09-19', 'Avadi', 'chennai', 9087282605, 0, '', '', '', '1', '13', 6000, 0, 0, 0, 'Monthly', 0, 1),
(6, 'Dinesh', '1997-12-12', 'Avadi', 'chennai', 9677154242, 0, '', '', '', '1', '13', 9000, 0, 0, 0, 'Monthly', 0, 1),
(7, 'Mani', '1997-12-12', 'Avadi', 'chennai', 9551129766, 0, '', '', '', '1', '13', 0, 0, 0, 0, 'Monthly', 0, 0),
(8, 'Saleem', '1997-12-12', 'Avadi', 'chennai', 8122405820, 0, '', '', '', '1', '6', 0, 0, 0, 0, 'Monthly', 0, 0),
(9, 'Muklesh', '1997-12-12', 'Avadi', 'chennai', 7871146412, 0, '', '', '', '1', '6', 0, 0, 0, 0, 'Monthly', 0, 0),
(10, 'shabunarayan', '1997-12-12', 'Avadi', 'chennai', 7418391134, 0, '', '', '', '1', '6', 0, 0, 0, 0, 'Monthly', 0, 0),
(11, 'Rahman', '1997-12-12', 'Avadi', 'chennai', 9566835780, 0, '', '', '', '1', '6', 0, 0, 0, 0, 'Monthly', 0, 0),
(12, 'Deva', '1997-12-12', 'Avadi', 'Chennai', 9677045535, 0, '', '', '', '1', '6', 0, 0, 0, 0, 'Monthly', 0, 0),
(13, 'baby', '2017-07-22', 'avadi', '', 9551314204, 0, '', '', '', '1', '10', 7500, 0, 0, 0, 'Monthly', 0, 1),
(14, 'ponnamal', '2017-07-22', '', 'avadi', 0, 0, '', '', '', '1', '10', 11500, 0, 0, 0, 'Monthly', 0, 1),
(15, 'udhya murthoory', '1996-05-22', '', '', 7358089428, 0, '', '', '', '1', '13', 0, 0, 0, 0, 'Monthly', 0, 0),
(16, 'khan', '2017-09-09', '', 'chennai', 7448844813, 0, '', '', '', '1', '6', 0, 0, 0, 0, '', 0, 0),
(17, 'khan', '2017-09-09', '', 'chennai', 7448844813, 0, '', '', '', '1', '6', 0, 0, 0, 0, 'Monthly', 0, 0),
(18, 'jackup', '2017-09-28', '', 'chennai', 7449294350, 0, '', '', '', '1', '6', 21000, 0, 0, 0, 'Monthly', 0, 1),
(19, 'sheik loman', '2017-10-04', '', '', 0, 0, '', '', '', '', '', 0, 0, 0, 0, 'Monthly', 0, 0),
(20, 'alfa', '2017-10-04', '', 'chennai', 0, 0, '', '', '', '1', '6', 0, 0, 0, 0, 'Monthly', 0, 1),
(21, 'sheik lokman', '2017-10-04', '', 'chennai', 0, 0, '', '', '', '1', '6', 0, 0, 0, 0, 'Monthly', 0, 1),
(22, 'sheik taimul', '2017-10-04', '', 'chennai', 0, 0, '', '', '', '1', '6', 0, 0, 0, 0, 'Monthly', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_menu`
--

CREATE TABLE IF NOT EXISTS `add_menu` (
  `item_code` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `billing_price` decimal(10,2) NOT NULL,
  `parcel_price` decimal(10,2) NOT NULL,
  `outdoor_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE IF NOT EXISTS `add_product` (
  `product_code` int(100) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`product_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`product_code`, `product_name`, `category`, `unit`, `status`) VALUES
(1, 'CHICKEN', 'NV', 'KG', 0),
(2, 'MUTTON', 'NV', 'KG', 0),
(3, 'VEGETABLES', 'V', 'KG', 0),
(4, 'SEA FOODS', 'NV', 'KG', 0),
(5, 'KADAI NATTUKOZHI', 'NV', 'KG', 0),
(6, 'EGG', 'NV', 'NO', 0),
(7, 'GAS', 'KITCHEN ITEMS', 'NO', 0),
(8, 'MILK', 'DRINKS', 'LT', 0),
(9, 'PROVISION', '', '', 0),
(10, 'OIL', 'KITCHEN ITEMS', 'LT', 0),
(11, 'PACKING', '', '', 0),
(12, 'CHARCOAL', '', '', 0),
(13, 'WATER', 'DRINKS', 'NO', 0),
(14, 'PANEER MUSHROOM', 'V', 'NO', 0),
(15, 'LEAF', '', 'Nos', 0),
(17, 'medicals', '', '', 0),
(18, 'kuboos', '', 'Nos', 0),
(19, 'PANDIAN ELECTRICALS', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_profile`
--

CREATE TABLE IF NOT EXISTS `add_profile` (
  `company_id` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `caption` varchar(1000) NOT NULL,
  `address` varchar(200) NOT NULL,
  `area` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `landline` bigint(15) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `line1` varchar(1000) NOT NULL,
  `line2` varchar(1000) NOT NULL,
  `line3` varchar(1000) NOT NULL,
  `line4` varchar(1000) NOT NULL,
  `upurl` varchar(1000) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_profile`
--

INSERT INTO `add_profile` (`company_id`, `company_name`, `caption`, `address`, `area`, `city`, `landline`, `mobile`, `email`, `line1`, `line2`, `line3`, `line4`, `upurl`) VALUES
('GC0001', 'Arafa Chicken Park', 'Restuarant', 'No.1765', 'Tripur', 'Tripur', 421, 4971212, '', 'Arafa Chicken Park', 'Mangalam road,Tripur', '0421-4971212', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `add_supplier`
--

CREATE TABLE IF NOT EXISTS `add_supplier` (
  `sup_code` int(100) NOT NULL AUTO_INCREMENT,
  `sup_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `open_bal` varchar(500) NOT NULL,
  `initial_open_bal` varchar(500) NOT NULL,
  PRIMARY KEY (`sup_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `add_user`
--

CREATE TABLE IF NOT EXISTS `add_user` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `privilege` varchar(50) NOT NULL,
  `counter` varchar(50) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `login_time` varchar(25) NOT NULL,
  `logout_time` varchar(25) NOT NULL,
  `emp_id` bigint(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `add_user`
--

INSERT INTO `add_user` (`user_id`, `user_name`, `password`, `privilege`, `counter`, `branch`, `login_time`, `logout_time`, `emp_id`) VALUES
(1, 'bishmillah', '123', '1', 'Admin', '1', '', '', 1),
(2, 'shek', 'shek', '1', 'Admin', '1', '', '', 2),
(5, 'bill', 'bill', '2', 'admin', '1', '', '', 6),
(6, 'admin', 'admin', '4', 'All', '1', '', '', 19);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `bill_no` int(11) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `amt` int(10) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `shift` int(11) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `disc_amt` varchar(50) NOT NULL,
  `sub_tot` varchar(50) NOT NULL,
  `ser_tax` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE IF NOT EXISTS `bill_details` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tokens` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `book_master`
--

CREATE TABLE IF NOT EXISTS `book_master` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `book` varchar(900) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `book_master`
--

INSERT INTO `book_master` (`bid`, `book`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `cashier_print`
--

CREATE TABLE IF NOT EXISTS `cashier_print` (
  `cp_id` int(25) NOT NULL AUTO_INCREMENT,
  `sales_id` int(50) NOT NULL,
  `table_id` varchar(50) NOT NULL,
  `chair_id` varchar(50) NOT NULL,
  `entry_date` date NOT NULL,
  `entry_time` time NOT NULL,
  PRIMARY KEY (`cp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `cashier_print`
--

INSERT INTO `cashier_print` (`cp_id`, `sales_id`, `table_id`, `chair_id`, `entry_date`, `entry_time`) VALUES
(37, 1, '4', 'B', '2017-12-08', '20:08:01'),
(38, 1, '4', 'B', '2017-12-08', '20:08:23'),
(39, 2, '1', 'A', '2017-12-09', '13:04:53'),
(40, 2, '1', 'A', '2017-12-09', '13:05:03'),
(41, 2, '1', 'A', '2017-12-09', '13:05:23'),
(42, 2, '1', 'A', '2017-12-09', '13:05:29'),
(43, 2, '1', 'A', '2017-12-09', '13:07:25'),
(44, 6, '88', '1', '2017-12-23', '16:49:38'),
(45, 6, '222', '1', '2017-12-23', '17:06:39'),
(46, 6, '66', '1', '2017-12-23', '18:46:14'),
(47, 6, '888', '1', '2017-12-23', '18:51:38'),
(48, 6, '77', '1', '2017-12-23', '18:58:55'),
(49, 6, '100', '1', '2017-12-27', '10:04:52'),
(50, 6, '99', '1', '2017-12-27', '10:50:57'),
(51, 6, '444', '1', '2017-12-27', '10:56:24'),
(52, 6, '1', '3', '2017-12-28', '17:57:04'),
(53, 6, '1', '5', '2017-12-28', '18:09:05'),
(54, 6, '1', '1', '2017-12-28', '18:24:53'),
(55, 6, '1', '4', '2017-12-29', '10:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `cash_book_privilege`
--

CREATE TABLE IF NOT EXISTS `cash_book_privilege` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `cateen` int(11) NOT NULL,
  `owner_box` int(11) NOT NULL,
  `payroll` int(11) NOT NULL,
  `crdit_pur` int(11) NOT NULL,
  `all_group` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cash_book_privilege`
--

INSERT INTO `cash_book_privilege` (`p_id`, `cateen`, `owner_box`, `payroll`, `crdit_pur`, `all_group`) VALUES
(1, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `counting`
--

CREATE TABLE IF NOT EXISTS `counting` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `dates` varchar(500) NOT NULL,
  `expire` varchar(500) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `counting`
--

INSERT INTO `counting` (`cid`, `dates`, `expire`) VALUES
(3, '2015-08-22', '2015-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `credit_pay`
--

CREATE TABLE IF NOT EXISTS `credit_pay` (
  `cpid` int(11) NOT NULL AUTO_INCREMENT,
  `dates` varchar(500) NOT NULL,
  `times` varchar(500) NOT NULL,
  `eid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `amt` varchar(500) NOT NULL,
  `mode` varchar(500) NOT NULL,
  PRIMARY KEY (`cpid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_purchase`
--

CREATE TABLE IF NOT EXISTS `credit_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(200) NOT NULL,
  `suppli_id` int(15) NOT NULL,
  `itm_code` int(15) NOT NULL,
  `item` varchar(50) NOT NULL,
  `qty` double NOT NULL,
  `amt` double NOT NULL,
  `exp_id` int(11) NOT NULL,
  `emp_id` bigint(20) NOT NULL,
  `store_cat` int(11) NOT NULL,
  `bar_code` varchar(200) NOT NULL,
  `units` varchar(500) NOT NULL,
  `stock` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_type`
--

CREATE TABLE IF NOT EXISTS `credit_type` (
  `ctid` int(11) NOT NULL AUTO_INCREMENT,
  `ctype` varchar(500) NOT NULL,
  `credit_amt` bigint(20) NOT NULL,
  PRIMARY KEY (`ctid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `credit_type`
--

INSERT INTO `credit_type` (`ctid`, `ctype`, `credit_amt`) VALUES
(1, 'Foodpanda', 1151),
(2, 'ZOMATO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `door_del`
--

CREATE TABLE IF NOT EXISTS `door_del` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `amt` int(10) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `disc_amt` varchar(200) NOT NULL,
  `sub_tot` varchar(200) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(200) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `ser_tax` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `mode` varchar(500) NOT NULL,
  `cust_name` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `roundoff` varchar(200) NOT NULL,
  `ser_charge` varchar(500) NOT NULL,
  `cash` varchar(500) NOT NULL,
  `card` varchar(500) NOT NULL,
  `buffet` int(11) NOT NULL,
  `credit_card` varchar(500) NOT NULL,
  `npb` varchar(500) NOT NULL,
  `rt` varchar(500) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `door_del_details`
--

CREATE TABLE IF NOT EXISTS `door_del_details` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `door_del_details_return`
--

CREATE TABLE IF NOT EXISTS `door_del_details_return` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `door_del_return`
--

CREATE TABLE IF NOT EXISTS `door_del_return` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `amt` int(10) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `disc_amt` varchar(200) NOT NULL,
  `sub_tot` varchar(200) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(200) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `ser_tax` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `mode` varchar(500) NOT NULL,
  `cust_name` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `roundoff` varchar(200) NOT NULL,
  `ser_charge` varchar(500) NOT NULL,
  `cash` varchar(500) NOT NULL,
  `card` varchar(500) NOT NULL,
  `discription` text NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE IF NOT EXISTS `dummy` (
  `upid` int(11) NOT NULL AUTO_INCREMENT,
  `icode` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `price` varchar(20) NOT NULL,
  PRIMARY KEY (`upid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_attend`
--

CREATE TABLE IF NOT EXISTS `emp_attend` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(15) NOT NULL,
  `date` date NOT NULL,
  `attend` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `emp_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `category` varchar(150) NOT NULL,
  `expense` varchar(50) NOT NULL,
  `waiter_id` bigint(20) NOT NULL,
  `descr` varchar(150) NOT NULL,
  `amt` varchar(200) NOT NULL,
  `pro` varchar(15) NOT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `bill_no` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `mode` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `emp_id`, `date`, `time`, `category`, `expense`, `waiter_id`, `descr`, `amt`, `pro`, `supplier_id`, `bill_no`, `cat_id`, `mode`) VALUES
(1, 1, '2017-12-05', '22:22:57 PM', 'Anand Box Expenses', 'Personal', 0, '', '150450', 'CASH OUT', 0, '', 706, ''),
(2, 1, '2017-12-11', '12:26:35 PM', 'Anand Box Expenses', 'Personal', 0, '', '204541', 'CASH OUT', 0, '', 706, ''),
(3, 1, '2018-01-03', '16:24:07 PM', 'Canteen Expenses', 'BILL LESS', 2, 'DISCOUNT to Table Bill no.4', '54', 'CASH OUT', 0, '', 6005, '');

-- --------------------------------------------------------

--
-- Table structure for table `exportto_online`
--

CREATE TABLE IF NOT EXISTS `exportto_online` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `tabe_name` varchar(500) NOT NULL,
  `primary_field` varchar(500) NOT NULL,
  `primary_value` varchar(500) NOT NULL,
  `opertaion_type` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exp_cat`
--

CREATE TABLE IF NOT EXISTS `exp_cat` (
  `ex_cid` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ex_cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `exp_cat`
--

INSERT INTO `exp_cat` (`ex_cid`, `cat`, `status`) VALUES
(5, 'HR/SALARY', 1),
(10, 'VESS DEP RTN', 1),
(11, 'CANCEL BILL', 1),
(14, 'MAINTANANCE-BUILDING', 1),
(21, 'PHONE EXPS', 1),
(22, 'OT-ALL/OWNER', 1),
(23, 'EB BILL', 1),
(24, 'PRINTING&amp;STATIONERY', 1),
(25, 'CMC/DRIANAGE', 1),
(26, 'OUTSOURCE', 1),
(27, 'FUEL  EXPS', 1),
(28, 'BANK', 1),
(29, 'VESSELS PURCHASE', 1),
(30, 'OTHER EXPS', 1),
(32, 'charchol', 1),
(33, 'TAX/FEES', 1),
(34, 'GIFT/COMMISSION', 1),
(35, 'FOOD COASTING', 1),
(36, 'banana leaf', 1),
(38, 'MARKETING', 1),
(39, 'OVERHEADS', 1),
(40, 'PACKING COST', 1),
(41, 'TRAVEL EXPENSES', 1),
(42, 'Owner', 1),
(43, 'CASH PURCHASE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exp_master`
--

CREATE TABLE IF NOT EXISTS `exp_master` (
  `exp_ma_id` int(11) NOT NULL AUTO_INCREMENT,
  `head` varchar(250) NOT NULL,
  `grp` int(5) NOT NULL,
  `cat` int(11) NOT NULL,
  PRIMARY KEY (`exp_ma_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6010 ;

--
-- Dumping data for table `exp_master`
--

INSERT INTO `exp_master` (`exp_ma_id`, `head`, `grp`, `cat`) VALUES
(92, 'SALARY ADVANCES', 42, 5),
(202, 'BATA', 42, 5),
(708, 'Others', 41, 42),
(583, 'SAL/WAGES', 42, 5),
(707, 'Bank', 41, 42),
(706, 'Personal', 41, 42),
(705, 'Purchase', 41, 42),
(704, 'Maintance', 41, 42),
(703, 'Transport charges', 40, 41),
(702, 'Transport charges', 40, 38),
(701, 'Petrol &amp; Diesel', 40, 41),
(700, 'Restaurant Supplies', 40, 41),
(699, 'Conveyance', 40, 41),
(698, 'Cholan Plastic', 40, 40),
(697, 'Packing materials', 40, 40),
(696, 'OIL', 40, 40),
(695, 'Telephone/ t.v', 40, 39),
(694, 'Stationary', 40, 39),
(693, 'Repairs &amp; maintenance', 40, 39),
(692, 'Printing &amp; stationary', 40, 39),
(691, 'Pooja expenses', 40, 39),
(690, 'Pest control', 40, 39),
(689, 'Office maintenance', 40, 39),
(688, 'Miscellaneous', 40, 39),
(687, 'House keeping', 40, 39),
(686, 'Garbage removal', 40, 39),
(685, 'fish food', 40, 39),
(684, 'Flowers ', 40, 39),
(683, 'Selling commission', 40, 38),
(682, 'Advertisement', 40, 38),
(681, 'Water', 40, 35),
(680, 'vegetables', 40, 35),
(679, 'Egg', 40, 35),
(653, 'MAKL OT-ND', 42, 5),
(678, 'Milk ', 40, 35),
(677, 'Soft Drinks', 40, 35),
(676, 'Mutton ', 40, 35),
(675, 'Chicken', 40, 35),
(674, 'Sea foods', 40, 35),
(673, 'Provision', 40, 35),
(672, 'Kitchen items', 40, 35),
(671, 'NATTU KOZHI', 40, 35),
(670, 'Ice Creams', 40, 35),
(669, 'Grocery items', 40, 35),
(668, 'Fruits', 40, 35),
(667, 'Food items', 40, 35),
(666, 'Dairy items', 40, 35),
(665, 'Bakery Items', 40, 35),
(664, 'KUBOOS', 40, 35),
(663, 'Wood', 40, 27),
(662, 'Gas', 40, 27),
(661, 'Fuel', 40, 27),
(660, 'Charcoal', 40, 27),
(659, 'Hiring Charges', 40, 36),
(658, 'Rentals', 40, 36),
(657, 'Outside labour', 40, 36),
(656, 'Gift items', 40, 36),
(655, 'Events', 40, 36),
(654, 'EQUIPMENT', 40, 36),
(648, 'CREDIT PURCHASE', 40, 0),
(6005, 'BILL LESS', 40, 0),
(6006, 'CASH PURCHASE', 0, 43),
(6007, 'Leaf', 41, 35),
(6008, 'kadai nattukozhi', 41, 43),
(6009, 'GHEE', 41, 43);

-- --------------------------------------------------------

--
-- Table structure for table `foodpanda`
--

CREATE TABLE IF NOT EXISTS `foodpanda` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `amt` int(10) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `disc_amt` varchar(200) NOT NULL,
  `sub_tot` varchar(200) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(200) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `ser_tax` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `mode` varchar(500) NOT NULL,
  `cust_name` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `roundoff` varchar(200) NOT NULL,
  `ser_charge` varchar(500) NOT NULL,
  `cash` varchar(500) NOT NULL,
  `card` varchar(500) NOT NULL,
  `delivery` varchar(500) NOT NULL,
  `ctype` varchar(500) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `foodpanda_details`
--

CREATE TABLE IF NOT EXISTS `foodpanda_details` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `foodpanda_details_return`
--

CREATE TABLE IF NOT EXISTS `foodpanda_details_return` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `foodpanda_return`
--

CREATE TABLE IF NOT EXISTS `foodpanda_return` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `amt` int(10) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `disc_amt` varchar(200) NOT NULL,
  `sub_tot` varchar(200) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(200) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `ser_tax` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `mode` varchar(500) NOT NULL,
  `cust_name` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `roundoff` varchar(200) NOT NULL,
  `ser_charge` varchar(500) NOT NULL,
  `cash` varchar(500) NOT NULL,
  `card` varchar(500) NOT NULL,
  `delivery` varchar(500) NOT NULL,
  `ctype` varchar(500) NOT NULL,
  `discription` text NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_cat`
--

CREATE TABLE IF NOT EXISTS `item_cat` (
  `itm_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_cat` varchar(250) NOT NULL,
  `separate_bill` int(11) NOT NULL,
  PRIMARY KEY (`itm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `item_cat`
--

INSERT INTO `item_cat` (`itm_id`, `item_cat`, `separate_bill`) VALUES
(1, '---All---', 0),
(2, 'GENERAL', 1),
(3, 'CHICKEN PARK SPECIAL', 2),
(4, 'MUTTONS', 3),
(5, 'KAADAI', 4),
(6, 'FISH', 5),
(7, 'BRIYANI', 6),
(8, 'NATTU KOLI', 7),
(9, 'OIL DRY', 8),
(10, 'SOUPS', 9),
(11, 'CHICKEN GRAVY', 10),
(12, 'CHICKEN DRY', 11),
(13, 'GRILL & TANDOORI', 12),
(14, 'INDIAN BREADS', 13),
(15, 'VEG DRY & GRAVY', 14),
(16, 'RICE & NOODLES', 15),
(17, 'FRESH JUICE', 16),
(18, 'Milkshake', 17),
(19, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_master`
--

CREATE TABLE IF NOT EXISTS `item_master` (
  `itm_code` int(5) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `itm_cat` int(25) NOT NULL,
  `bar_code` varchar(1000) NOT NULL,
  `stock` varchar(200) NOT NULL,
  `parcel` varchar(500) NOT NULL,
  `party` varchar(500) NOT NULL,
  `commision` varchar(200) NOT NULL,
  `par_com` varchar(200) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `tax_cat` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `cat` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`itm_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=438 ;

--
-- Dumping data for table `item_master`
--

INSERT INTO `item_master` (`itm_code`, `item`, `unit_price`, `itm_cat`, `bar_code`, `stock`, `parcel`, `party`, `commision`, `par_com`, `unit`, `tax_cat`, `vat`, `cat`, `status`) VALUES
(1, 'Rotti', 20, 2, '', '', '20', '20', '', '', '20', 0, 0, '', 0),
(2, 'Butter Rotti', 25, 2, '', '', '25', '25', '', '', '25', 0, 0, '0', 0),
(3, ' Naan', 25, 2, '', '', '25', '25', '', '', '25', 0, 0, '', 0),
(4, 'Butter Naan', 35, 2, '', '', '35', '35', '', '', '35', 0, 0, '0', 0),
(5, 'Plain Kulcha', 30, 2, '', '', '30', '30', '', '', '30', 0, 0, '0', 0),
(6, 'Butter Kulcha', 35, 2, '', '', '35', '35', '', '', '35', 0, 0, '0', 0),
(7, 'Tandoori Parotta', 30, 2, '', '', '30', '30', '', '', '30', 0, 0, '0', 0),
(8, 'Chappathi', 20, 2, '', '', '20', '20', '', '', '20', 0, 0, '0', 0),
(9, 'Parotta', 20, 2, '', '', '20', '20', '', '', '20', 0, 0, '0', 0),
(10, 'kothu Parotta', 80, 2, '', '', '80', '80', '', '', '80', 0, 0, '0', 0),
(11, 'Chilly Parotta', 80, 2, '', '', '80', '80', '', '', '80', 0, 0, '0', 0),
(12, 'Bun Parotta', 30, 2, '', '', '30', '30', '', '', '30', 0, 0, '0', 0),
(13, '1KG chicken Briyani', 140, 2, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(14, '1KG Mutton Briyani', 220, 2, '', '', '220', '220', '', '', '220', 0, 0, '0', 0),
(15, 'Chicken Briyani 150', 150, 2, '', '', '150', '150', '', '', '150', 0, 0, '0', 0),
(16, 'Special Shawarma', 110, 2, '', '', '110', '110', '', '', '110', 0, 0, '0', 0),
(17, 'Barbic Chicken Full', 280, 2, '', '', '280', '280', '', '', '280', 0, 0, '0', 0),
(18, 'Barbic Chicken Half', 150, 2, '', '', '150', '150', '', '', '150', 0, 0, '0', 0),
(19, 'Barbic Full Fish 1K', 350, 2, '', '', '350', '350', '', '', '350', 0, 0, '0', 0),
(20, 'Barbic Full Fish 1.5', 450, 2, '', '', '450', '450', '', '', '450', 0, 0, '0', 0),
(21, 'Rabit Peppery fry', 150, 2, '', '', '150', '150', '', '', '150', 0, 0, '0', 0),
(22, 'Mutton Pepper Fry', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(23, 'Mutton Chukka', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(24, 'Mutton Gravy', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(25, 'Mutton Pepper Masala', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(26, 'Kadaai Oil Fry', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(27, 'Kadaai Pepper Fry', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(28, 'Kadaai Pepper masala', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(29, 'Kadaai Gravy', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(30, 'Barbic Chicken Half', 150, 2, '', '', '150', '150', '', '', '150', 0, 0, '0', 0),
(31, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(32, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(33, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(34, 'Vanjarm Fish Fry', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(35, 'Para Fish Fry', 70, 2, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(36, 'Fishv Chili', 80, 2, '', '', '80', '80', '', '', '80', 0, 0, '0', 0),
(37, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(38, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(39, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(40, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(41, 'Hyderabad Chicken BI', 140, 2, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(42, 'Hyd mutton Briyani', 150, 2, '', '', '150', '150', '', '', '150', 0, 0, '0', 0),
(43, 'Hyd Fish Briyani', 150, 2, '', '', '150', '150', '', '', '150', 0, 0, '0', 0),
(44, 'Nika Mutton Briyani', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(45, 'Kaadai Briyani', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(46, 'Nikka Chicken Briyani', 80, 2, '', '', '80', '80', '', '', '80', 0, 0, '0', 0),
(47, 'Leg Piece Briyani', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(48, 'Plain Briyani', 80, 2, '', '', '80', '80', '', '', '80', 0, 0, '0', 0),
(49, 'Mutton Plain Briyani', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(50, 'Nattu Koli Briyani', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(51, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(52, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(53, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(54, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(55, 'Nattu Koli fry', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(56, 'Nattu Koli Varutha K', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(57, 'Nattu koli Kolamu', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(58, 'Nattu Koli Masala', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(59, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(60, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(61, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(62, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(63, 'Boneless 65', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(64, 'Chicken 65', 70, 2, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(65, 'Chilly Chicken', 50, 2, '', '', '50', '50', '', '', '50', 0, 0, '0', 0),
(66, 'Boneless Chilly', 70, 2, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(67, 'Leg Piece 2 pic', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(68, 'Lolly Pop 2pic', 70, 2, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(69, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(70, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(71, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(72, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(73, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(74, 'Nattu Koli soup', 60, 2, '', '', '60', '60', '', '', '60', 0, 0, '0', 0),
(75, 'Mutton Chet Soup', 60, 2, '', '', '60', '60', '', '', '60', 0, 0, '0', 0),
(76, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(77, 'Chicken Chet Soup', 50, 2, '', '', '50', '50', '', '', '50', 0, 0, '0', 0),
(78, 'Hot & Sour Soup', 50, 2, '', '', '50', '50', '', '', '50', 0, 0, '0', 0),
(79, 'Clear Soup', 50, 2, '', '', '50', '50', '', '', '50', 0, 0, '0', 0),
(80, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(81, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(82, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(83, 'Hyderb Boneles masala', 140, 2, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(84, 'Hyderb chic Masala', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(85, 'Chettinad Chicken Ga', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(86, 'Chettinad Chi Boneless', 12, 2, '', '', '12', '12', '', '', '12', 0, 0, '0', 0),
(87, 'Ppalayam Ckn Gary', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(88, 'Ppalayam Ckn Boneless', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(89, 'Pepper Ckn Masala', 110, 2, '', '', '110', '110', '', '', '110', 0, 0, '0', 0),
(90, 'Pepper Ckn Msl Boneless', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(91, 'Kerala Ckn Gravy', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(92, 'Kerala Ckn Boneless', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(93, 'Andra Ckn Gravy', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(94, 'Andra Ckn Boneless', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(95, 'Kaadai Ckn Gravy', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(96, 'Kaadai Chn Boneless', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(97, 'Butter Ckn Boneless M', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(98, 'Tikka Masala', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(99, 'Tangri Masala', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(100, 'HF Grill Punjabi Msl', 180, 2, '', '', '180', '180', '', '', '180', 0, 0, '0', 0),
(101, 'Manchuri Boneless Gravy', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(102, 'Ginger Boneless Gravy', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(103, 'Garlic Boneless Gravy', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(104, 'Szhechuan Boneless Gravy', 140, 2, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(105, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(106, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(107, 'Paper Chi Bolns fry', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(108, 'Hot pepper', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(109, 'Chinese Pepper Ckn', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(110, 'Manjurain Dry', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(111, '20*20', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(112, 'Chicken777', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(113, 'Ginger Boneless Dry', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(114, 'Garlic Boneless Dry', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(115, 'Dragon Ckn Dry', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(116, 'Szhechuan Boneless Dry', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(117, 'Cranch Ckn', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(118, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(119, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(120, 'Shawarma', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(121, 'Special Shawarma', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(122, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(123, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(124, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(125, 'Pepper Grill full', 240, 2, '', '', '240', '240', '', '', '240', 0, 0, '0', 0),
(126, 'Pepper Grill Half', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(127, 'Lemon Grill Full ', 280, 2, '', '', '280', '280', '', '', '280', 0, 0, '0', 0),
(128, 'lemon Grill Half', 140, 2, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(129, 'Grill Full', 240, 2, '', '', '240', '240', '', '', '240', 0, 0, '0', 0),
(130, 'Grill Half', 130, 2, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(131, 'Grill Fry Full', 280, 2, '', '', '280', '280', '', '', '280', 0, 0, '0', 0),
(132, 'Grill Fry Half', 150, 2, '', '', '150', '150', '', '', '150', 0, 0, '0', 0),
(133, 'Tandoori Full', 260, 2, '', '', '260', '260', '', '', '260', 0, 0, '0', 0),
(134, 'Tandoori Half', 140, 2, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(135, 'Tangri Kabab', 80, 2, '', '', '80', '80', '', '', '80', 0, 0, '0', 0),
(136, 'Kalmi Kabab 2Pic', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(137, 'Pudina Tikka', 110, 2, '', '', '110', '110', '', '', '110', 0, 0, '0', 0),
(138, 'chicken Tikka', 110, 2, '', '', '110', '110', '', '', '110', 0, 0, '0', 0),
(139, 'Tandoori Kadaai', 110, 2, '', '', '110', '110', '', '', '110', 0, 0, '0', 0),
(140, 'Hariyali Kabab', 80, 2, '', '', '80', '80', '', '', '80', 0, 0, '0', 0),
(141, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(142, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(143, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(144, 'Veg Rice', 60, 2, '', '', '60', '60', '', '', '60', 0, 0, '0', 0),
(145, 'Veg Noodles', 60, 2, '', '', '60', '60', '', '', '60', 0, 0, '0', 0),
(146, 'Egg Rice', 70, 2, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(147, 'Egg Noodles', 70, 2, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(148, 'Chicken Rice', 80, 2, '', '', '80', '80', '', '', '80', 0, 0, '0', 0),
(149, 'Chicken Noodles', 80, 2, '', '', '80', '80', '', '', '80', 0, 0, '0', 0),
(150, 'Szhechwan Rice', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(151, 'Szhechwan noodles', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(152, 'Mushroom Rice', 70, 2, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(153, 'Mushroom Noodles', 70, 2, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(154, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(155, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(156, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(157, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(158, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(159, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(160, 'Panner Chilly', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(161, 'Paner Pepper Fry', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(162, 'Panner Manjurian', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(163, 'Panner Butter masala', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(164, 'Mushroom Masala', 120, 2, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(165, 'Mushroom Pepper Fry', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(166, 'Mushroom Manjurain', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(167, 'Mushroom Chilly', 100, 2, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(168, 'Veg Panner', 90, 2, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(169, 'Veg Manjurain', 80, 2, '', '', '80', '80', '', '', '80', 0, 0, '0', 0),
(170, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(171, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(172, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(173, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(174, '', 0, 2, '', '', '', '', '', '', '', 0, 0, '0', 0),
(175, 'Fresh Juice', 40, 2, '', '', '40', '40', '', '', '40', 0, 0, '0', 0),
(176, 'Fresh Juice', 60, 2, '', '', '40', '60', '', '', '60', 0, 0, '0', 0),
(177, 'Soda', 25, 2, '', '', '25', '25', '', '', '25', 0, 0, '0', 0),
(178, 'Soda', 35, 2, '', '', '25', '35', '', '', '35', 0, 0, '0', 0),
(179, 'Ice cream', 40, 2, '', '', '40', '40', '', '', '40', 0, 0, '0', 0),
(180, 'Ice cream', 60, 2, '', '', '40', '60', '', '', '60', 0, 0, '0', 0),
(181, 'Mini Cool Drinks', 15, 2, '', '', '15', '15', '', '', '15', 0, 0, '0', 0),
(182, '1Lt Water', 20, 2, '', '', '20', '20', '', '', '20', 0, 0, '0', 0),
(183, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(184, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(185, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(186, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(187, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(188, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(189, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(190, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(191, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(192, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(193, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(194, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(195, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(196, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(197, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(198, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(199, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(200, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(201, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(202, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(203, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(204, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(205, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(206, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(207, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(208, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(209, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(210, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(211, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(212, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(213, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(214, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(215, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(216, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(217, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(218, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(219, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(220, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(221, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '', 0),
(222, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(223, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(224, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(225, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(226, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(227, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(228, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(229, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(230, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(231, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(232, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(233, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(234, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(235, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(236, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(237, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(238, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(239, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(240, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(241, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(242, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(243, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(244, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(245, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(246, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(247, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(248, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(249, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(250, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(251, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(252, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(253, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(254, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(255, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(256, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(257, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(258, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(259, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(260, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(261, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(262, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(263, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(264, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(265, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(266, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(267, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(268, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(269, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(270, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(271, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(272, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(273, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(274, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(275, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(276, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(277, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(278, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(279, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(280, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(281, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(282, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(283, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(284, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(285, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(286, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(287, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(288, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(289, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(290, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(291, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(292, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(293, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(294, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(295, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(296, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(297, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(298, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(299, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '0', 0),
(300, 'Shawarma', 100, 3, '', '', '90', '100', '', '', '100', 0, 0, '0', 0),
(301, 'Special Shawarma', 120, 3, '', '', '110', '120', '', '', '120', 0, 0, '0', 0),
(302, 'Special Shawarma 1/2', 120, 3, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(303, 'Plate Shawarma', 130, 3, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(304, 'Mutton Raan', 1200, 3, '', '', '1200', '1200', '', '', '1200', 0, 0, '0', 0),
(305, 'Mutton Pepper Fry', 130, 4, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(306, 'Mutton Chukka', 130, 4, '', '', '120', '130', '', '', '130', 0, 0, '0', 0),
(307, 'Mutton Gravy', 130, 4, '', '', '120', '130', '', '', '130', 0, 0, '0', 0),
(308, 'Mutton pepper Masala', 140, 4, '', '', '130', '140', '', '', '140', 0, 0, '0', 0),
(309, 'Kaadai Oil Fry', 100, 5, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(310, 'kaadai Pepper Fry', 120, 5, '', '', '100', '120', '', '', '120', 0, 0, '0', 0),
(311, 'Kaadai Pepper Masala', 130, 5, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(312, 'Kaadai Gravy', 130, 5, '', '', '120', '130', '', '', '130', 0, 0, '0', 0),
(313, 'Kaadai Tandoori', 120, 5, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(314, 'Para Fish Fry', 80, 6, '', '', '70', '80', '', '', '80', 0, 0, '0', 0),
(315, 'Vanjaram Fry', 140, 6, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(316, 'Barbic Full Fish 1kg', 350, 6, '', '', '350', '350', '', '', '350', 0, 0, '0', 0),
(317, 'Barbic Full Fish 1.5 Kg', 450, 6, '', '', '450', '450', '', '', '450', 0, 0, '0', 0),
(318, 'Hyderabad Mutton Briyani', 160, 7, '', '', '160', '160', '', '', '160', 0, 0, '0', 0),
(319, 'Hyderabad Chicken Briyani', 150, 7, '', '', '150', '150', '', '', '150', 0, 0, '0', 0),
(320, 'Hyderabad Fish Briyani', 150, 7, '', '', '150', '150', '', '', '150', 0, 0, '0', 0),
(321, 'Nikka Mutton Briyani', 140, 7, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(322, 'Kaadai Briyani', 140, 7, '', '', '120', '140', '', '', '140', 0, 0, '0', 0),
(323, 'Nattu Koli Briyani', 140, 7, '', '', '120', '140', '', '', '140', 0, 0, '0', 0),
(324, 'Nikka Chicken Briyani', 110, 7, '', '', '80', '110', '', '', '110', 0, 0, '0', 0),
(325, 'Plain Briyani', 90, 7, '', '', '80', '90', '', '', '90', 0, 0, '0', 0),
(326, 'Nattu Koli Fry', 120, 8, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(327, 'Nattu Koli Varutha Kari', 130, 8, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(328, 'Nattu Koli Kulambu', 130, 8, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(329, 'Nattu Koli Masala', 140, 8, '', '', '130', '140', '', '', '140', 0, 0, '0', 0),
(330, 'Chicken 65', 70, 9, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(331, 'Boneless 65', 100, 9, '', '', '90', '100', '', '', '100', 0, 0, '0', 0),
(332, 'Leg Piece 2 pic', 100, 9, '', '', '90', '100', '', '', '100', 0, 0, '0', 0),
(333, 'Lolly Pop 4 pics', 120, 9, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(334, 'Nattu koli Soup', 60, 10, '', '', '60', '60', '', '', '60', 0, 0, '0', 0),
(335, 'Nattu Koli Soup 1/2', 70, 10, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(336, 'Mutton Chettinadu soup', 50, 10, '', '', '50', '50', '', '', '50', 0, 0, '0', 0),
(337, 'Mutton Chetti soup 1/2', 60, 10, '', '', '60', '60', '', '', '60', 0, 0, '', 0),
(338, 'Chicken Chettinadu Soup', 50, 10, '', '', '50', '50', '', '', '50', 0, 0, '0', 0),
(339, 'Chicken Chetti Soup 1/2', 60, 10, '', '', '60', '60', '', '', '60', 0, 0, '0', 0),
(340, 'Hot & Sour Soup', 50, 10, '', '', '50', '50', '', '', '50', 0, 0, '0', 0),
(341, 'Hot & Sour  1/2', 60, 10, '', '', '60', '60', '', '', '60', 0, 0, '0', 0),
(342, 'Clear Soup', 50, 10, '', '', '50', '50', '', '', '50', 0, 0, '0', 0),
(343, 'Clear Soup 1/2', 60, 10, '', '', '60', '60', '', '', '60', 0, 0, '0', 0),
(344, 'Chettinadu Chicken gravy', 130, 11, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(345, 'Pallipalayam Chicken gravy', 130, 11, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(346, 'Pepper Chicken Masala', 140, 11, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(347, 'Kerala Chicken gravy', 130, 11, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(348, 'Andra Chicken gravy', 130, 11, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(349, 'Kaadai Chicken gravy', 140, 11, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(350, 'Nilagiris nChicken Masala', 140, 11, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(351, 'Hyderabad Chicken Masala', 140, 11, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(352, 'Butter Chicken Masala', 140, 11, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(353, 'Tikka Masala', 140, 11, '', '', '130', '140', '', '', '140', 0, 0, '0', 0),
(354, 'Tangri Masala', 130, 11, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(355, 'Half Grill Punjabi Masala', 180, 11, '', '', '180', '180', '', '', '180', 0, 0, '0', 0),
(356, 'Pepper Chicken dray', 120, 12, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(357, 'Hot Peeper', 120, 12, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(358, 'Dragon Chicken dray', 120, 12, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(360, 'Chinese pepper Ckn dray', 120, 12, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(359, 'chik Manchurian dray', 120, 12, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(361, 'Szechuan Chicken dray', 120, 12, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(362, '20*20', 120, 12, '', '', '100', '120', '', '', '120', 0, 0, '0', 0),
(363, '777', 120, 12, '', '', '100', '120', '', '', '120', 0, 0, '0', 0),
(364, 'Ginger Chgicken dray', 120, 12, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(365, 'Garlic Chicken dray', 120, 12, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(366, 'Pepper Grill Full', 260, 13, '', '', '240', '260', '', '', '260', 0, 0, '0', 0),
(367, 'Pepper Grill Half', 140, 13, '', '', '130', '140', '', '', '140', 0, 0, '0', 0),
(368, 'Lemon Grill Full', 280, 13, '', '', '280', '280', '', '', '280', 0, 0, '0', 0),
(369, 'Lemon grill Half', 150, 13, '', '', '140', '150', '', '', '150', 0, 0, '0', 0),
(370, 'Grill Pepper Fry Full', 280, 13, '', '', '280', '280', '', '', '280', 0, 0, '0', 0),
(371, 'Grill Pepper Fry Half', 150, 13, '', '', '150', '150', '', '', '150', 0, 0, '0', 0),
(372, 'Tandoori Full', 260, 13, '', '', '260', '260', '', '', '260', 0, 0, '0', 0),
(373, 'Tandoori Half', 140, 13, '', '', '140', '140', '', '', '140', 0, 0, '0', 0),
(374, 'Barbic Chicken Full', 300, 13, '', '', '280', '300', '', '', '300', 0, 0, '0', 0),
(375, 'Barbic ChickenHalf', 160, 13, '', '', '150', '160', '', '', '160', 0, 0, '0', 0),
(376, 'Tangri Kabab 1pec', 90, 13, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(377, 'Kalmi Kabab 2pec', 100, 13, '', '', '90', '100', '', '', '100', 0, 0, '0', 0),
(378, 'Hariyali Kabab', 90, 13, '', '', '80', '90', '', '', '90', 0, 0, '0', 0),
(379, 'Pudina Tikka', 120, 13, '', '', '110', '120', '', '', '120', 0, 0, '0', 0),
(380, 'Chicken Tikka', 120, 13, '', '', '110', '120', '', '', '120', 0, 0, '0', 0),
(381, 'Tandoori Kaadai', 120, 13, '', '', '110', '120', '', '', '120', 0, 0, '0', 0),
(382, 'Rotti', 25, 14, '', '', '20', '25', '', '', '25', 0, 0, '0', 0),
(383, 'Butter Rotti', 30, 14, '', '', '25', '30', '', '', '30', 0, 0, '0', 0),
(384, 'Naan', 25, 14, '', '', '25', '25', '', '', '25', 0, 0, '0', 0),
(385, 'Butter Naan', 35, 14, '', '', '35', '35', '', '', '35', 0, 0, '0', 0),
(386, 'Plain Kulcha', 30, 14, '', '', '30', '30', '', '', '30', 0, 0, '0', 0),
(387, 'Butter Kulcha', 35, 14, '', '', '35', '35', '', '', '35', 0, 0, '0', 0),
(388, 'Tandoori Parotta', 35, 14, '', '', '30', '35', '', '', '35', 0, 0, '0', 0),
(389, 'Chappat', 25, 14, '', '', '20', '25', '', '', '25', 0, 0, '0', 0),
(390, 'Parotta', 30, 14, '', '', '20', '30', '', '', '30', 0, 0, '0', 0),
(391, 'kothu Parotta', 90, 14, '', '', '80', '90', '', '', '90', 0, 0, '0', 0),
(392, 'Chilly Parotta (veg)', 90, 14, '', '', '80', '90', '', '', '90', 0, 0, '0', 0),
(393, 'Paneer Chilly', 120, 15, '', '', '100', '120', '', '', '120', 0, 0, '0', 0),
(394, 'Paneer Pepper Fry', 120, 15, '', '', '100', '120', '', '', '120', 0, 0, '0', 0),
(395, 'Paneer Manchurian', 120, 15, '', '', '100', '120', '', '', '120', 0, 0, '0', 0),
(396, 'Paneer Butter Masala', 130, 15, '', '', '120', '130', '', '', '130', 0, 0, '0', 0),
(397, 'Mushroom Butter Masala', 130, 15, '', '', '120', '130', '', '', '130', 0, 0, '0', 0),
(398, 'Mushroom Pepper Fry', 110, 15, '', '', '100', '110', '', '', '110', 0, 0, '0', 0),
(399, 'Mushroom Manchurian', 110, 15, '', '', '100', '110', '', '', '110', 0, 0, '0', 0),
(400, 'Mushroom Chilly', 110, 15, '', '', '100', '110', '', '', '110', 0, 0, '0', 0),
(401, 'Egg Rice ', 90, 16, '', '', '90', '90', '', '', '90', 0, 0, '', 0),
(402, 'Chicken Rice ', 100, 16, '', '', '100', '100', '', '', '100', 0, 0, '0', 0),
(403, 'Szechuan Rice ', 110, 16, '', '', '110', '110', '', '', '110', 0, 0, '0', 0),
(404, 'Mushroom Rice ', 100, 16, '', '', '90', '90', '', '', '90', 0, 0, '0', 0),
(405, 'Veg Rice ', 80, 16, '', '', '80', '80', '', '', '80', 0, 0, '0', 0),
(406, 'Lemon Soda', 20, 17, '', '', '20', '20', '', '', '20', 0, 0, '0', 0),
(407, 'Sweet & Salt', 25, 17, '', '', '25', '25', '', '', '25', 0, 0, '0', 0),
(408, 'Chilly Soda', 30, 17, '', '', '30', '30', '', '', '30', 0, 0, '0', 0),
(409, 'Apple Juice', 60, 17, '', '', '60', '60', '', '', '60', 0, 0, '0', 0),
(410, 'Mango Juice', 50, 17, '', '', '50', '50', '', '', '50', 0, 0, '0', 0),
(411, 'Pinapple Juice', 50, 17, '', '', '50', '50', '', '', '50', 0, 0, '0', 0),
(412, 'Orange Juice', 40, 17, '', '', '40', '40', '', '', '40', 0, 0, '0', 0),
(413, 'Musambi Juice', 40, 17, '', '', '40', '40', '', '', '40', 0, 0, '0', 0),
(414, 'Pomogranate Juice', 40, 17, '', '', '40', '40', '', '', '40', 0, 0, '0', 0),
(415, 'Grape Juice', 40, 17, '', '', '40', '40', '', '', '40', 0, 0, '0', 0),
(416, 'Vanila', 70, 18, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(417, 'Choclate', 70, 18, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(418, 'Strawberry', 70, 18, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(419, 'Mango mil', 70, 18, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(420, 'Black Current', 70, 18, '', '', '70', '70', '', '', '70', 0, 0, '0', 0),
(421, 'Butter Scotch', 70, 18, '', '', '20', '70', '', '', '70', 0, 0, '0', 0),
(422, 'water 1 lit', 20, 17, '', '', '20', '', '', '', '20', 0, 0, '', 0),
(423, 'Egg noodles', 90, 16, '', '', '90', '90', '', '', '90', 0, 0, '', 0),
(424, 'Chicken noodles', 100, 16, '', '', '100', '100', '', '', '100', 0, 0, '', 0),
(425, 'Szechuan noodles', 110, 16, '', '', '110', '110', '', '', '110', 0, 0, '', 0),
(426, 'vag noodles', 80, 16, '', '', '80', '80', '', '', '80', 0, 0, '', 0),
(427, 'Extra', 10, 3, '', '', '10', '80', '', '', '10', 0, 0, '', 0),
(428, 'Chettinadu Chicken dray', 120, 12, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(430, 'Pallipalayam Chick dray', 120, 0, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(429, 'Pallipalayam Chick dray', 120, 12, '', '', '120', '120', '', '', '120', 0, 0, '0', 0),
(431, 'chik Manchurian gravy', 130, 11, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(432, 'Ginger Chgicken gravy', 130, 11, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(433, 'Garlic Chicken gravy', 130, 11, '', '', '130', '130', '', '', '130', 0, 0, '0', 0),
(434, 'Lemon juice', 20, 17, '', '', '20', '20', '', '', '20', 0, 0, '', 0),
(435, '700 Combo', 700, 3, '', '', '700', '700', '', '', '700', 0, 0, '', 0),
(436, '500  Combo', 500, 3, '', '', '500', '500', '', '', '500', 0, 0, '', 0),
(437, '', 0, 0, '', '', '', '', '', '', '', 0, 0, '', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=698 ;

--
-- Dumping data for table `kop_bill_details`
--

INSERT INTO `kop_bill_details` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`, `remarks`, `unit_type`, `ser_tax`, `vat_tax`, `service`, `vat`, `tot_amt`, `cat`, `full_print_status`) VALUES
(4, 0, '342', 'Tandoori Chicken Half', 180, '1', '180', '2017-07-22', '19:34:49', 6, 1, 2, '3', 'A', '', '', '0', '0', '0', '0', '180', '', 1),
(5, 0, '259', 'masala omalette', 60, '1', '60', '2017-07-22', '19:34:49', 6, 1, 2, '3', 'A', '', '', '0', '0', '0', '0', '60', '', 1),
(6, 0, '28', 'Mutton Pepper Soup', 80, '1', '80', '2017-07-22', '19:34:49', 6, 1, 2, '3', 'A', '', '', '0', '0', '0', '0', '80', '', 1),
(36, 0, '148', 'Mutton Briyani', 180, '1', '180', '2017-07-23', '19:24:12', 6, 1, 2, '3', 'B', '', '', '0', '0', '0', '0', '180', '', 1),
(35, 0, '145', 'Prawn Briyani', 180, '1', '180', '2017-07-23', '19:24:12', 6, 1, 2, '3', 'B', '', '', '0', '0', '0', '0', '180', '', 1),
(73, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2017-12-23', '17:06:27', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '1200', '', 1),
(65, 0, '333', 'Lolly Pop 4 pics', 120, '1', '120', '2017-12-23', '17:02:19', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(34, 0, '22', 'Chicken Pepper Soup', 70, '1', '70', '2017-07-23', '19:24:12', 6, 1, 2, '3', 'B', '', '', '0', '0', '0', '0', '70', '', 1),
(33, 0, '76', 'Fish Finger', 160, '1', '160', '2017-07-23', '19:24:12', 6, 1, 2, '3', 'B', '', '', '0', '0', '0', '0', '160', '', 1),
(32, 0, '70', 'Chicken Lollipop', 150, '1', '150', '2017-07-23', '19:24:12', 6, 1, 2, '3', 'B', '', '', '0', '0', '0', '0', '150', '', 1),
(37, 0, '358', 'Soft Drink 500ml', 40, '1', '40', '2017-07-23', '19:24:12', 6, 1, 2, '3', 'B', '', '', '0', '0', '0', '0', '40', '', 1),
(38, 0, '109', 'Grill half', 175, '1', '175', '2017-07-23', '19:42:18', 6, 1, 2, '7', 'A', '', '', '0', '0', '0', '0', '175', '', 1),
(39, 45, '366', 'shwarma chicken', 90, '2', '180', '2017-07-23', '19:47:28', 6, 1, 2, '1', 'A', '', '', '0', '0', '0', '0', '180', '', 1),
(40, 45, '187', 'egg fri ric/no', 120, '1', '120', '2017-07-23', '19:49:43', 6, 1, 2, '1', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(41, 0, '353', 'Tikka Masala', 140, '4', '560', '2017-12-23', '13:26:17', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '560', '', 1),
(42, 0, '353', 'Tikka Masala', 140, '4', '560', '2017-12-23', '13:29:07', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '560', '', 1),
(64, 0, '331', 'Boneless 65', 100, '1', '100', '2017-12-23', '17:02:19', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 1),
(54, 0, '301', 'Special Shawarma', 120, '3', '360', '2017-12-23', '16:47:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '360', '', 1),
(53, 0, '300', 'Shawarma', 100, '1', '100', '2017-12-23', '16:47:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 1),
(51, 0, '304', 'Mutton Raan', 1200, '2', '2400', '2017-12-23', '15:29:22', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '2400', '', 1),
(72, 0, '427', 'Extra', 10, '1', '10', '2017-12-23', '17:06:27', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '10', '', 1),
(71, 0, '436', '500  Combo', 500, '1', '500', '2017-12-23', '17:06:27', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '500', '', 1),
(70, 0, '435', '700 Combo', 700, '1', '700', '2017-12-23', '17:06:27', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '700', '', 1),
(74, 0, '330', 'Chicken 65', 70, '1', '70', '2017-12-23', '17:47:11', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '70', '', 1),
(75, 0, '331', 'Boneless 65', 100, '1', '100', '2017-12-23', '17:47:11', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 1),
(76, 0, '332', 'Leg Piece 2 pic', 100, '1', '100', '2017-12-23', '17:47:11', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 1),
(77, 0, '330', 'Chicken 65', 70, '1', '70', '2017-12-23', '17:51:53', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '70', '', 1),
(78, 0, '331', 'Boneless 65', 100, '1', '100', '2017-12-23', '17:51:53', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 1),
(79, 0, '332', 'Leg Piece 2 pic', 100, '1', '100', '2017-12-23', '17:51:53', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 1),
(80, 0, '330', 'Chicken 65', 70, '1', '70', '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '70', '', 0),
(81, 0, '331', 'Boneless 65', 100, '1', '100', '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(82, 0, '332', 'Leg Piece 2 pic', 100, '1', '100', '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(83, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '150', '', 0),
(84, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(85, 0, '322', 'Kaadai Briyani', 140, '1', '140', '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(86, 0, '330', 'Chicken 65', 70, '1', '70', '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '70', '', 0),
(87, 0, '331', 'Boneless 65', 100, '1', '100', '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(88, 0, '332', 'Leg Piece 2 pic', 100, '1', '100', '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(89, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '150', '', 0),
(90, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(91, 0, '322', 'Kaadai Briyani', 140, '1', '140', '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(92, 0, '330', 'Chicken 65', 70, '1', '70', '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '70', '', 0),
(93, 0, '331', 'Boneless 65', 100, '1', '100', '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(94, 0, '332', 'Leg Piece 2 pic', 100, '1', '100', '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(95, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '150', '', 0),
(96, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(97, 0, '322', 'Kaadai Briyani', 140, '1', '140', '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(98, 0, '330', 'Chicken 65', 70, '1', '70', '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '70', '', 0),
(99, 0, '331', 'Boneless 65', 100, '1', '100', '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(100, 0, '332', 'Leg Piece 2 pic', 100, '1', '100', '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(101, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '150', '', 0),
(102, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(103, 0, '322', 'Kaadai Briyani', 140, '1', '140', '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(104, 0, '373', 'Tandoori Half', 140, '1', '140', '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(105, 0, '374', 'Barbic Chicken Full', 300, '1', '300', '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '300', '', 0),
(106, 0, '330', 'Chicken 65', 70, '1', '70', '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '70', '', 0),
(107, 0, '331', 'Boneless 65', 100, '1', '100', '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(108, 0, '332', 'Leg Piece 2 pic', 100, '1', '100', '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(109, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '150', '', 0),
(110, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(111, 0, '322', 'Kaadai Briyani', 140, '1', '140', '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(112, 0, '373', 'Tandoori Half', 140, '1', '140', '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(113, 0, '374', 'Barbic Chicken Full', 300, '1', '300', '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '300', '', 0),
(114, 0, '390', 'Parotta', 30, '1', '30', '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '30', '', 0),
(115, 0, '389', 'Chappat', 25, '1', '25', '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '25', '', 0),
(116, 0, '388', 'Tandoori Parotta', 35, '1', '35', '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '35', '', 0),
(117, 0, '330', 'Chicken 65', 70, '1', '70', '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '70', '', 0),
(118, 0, '331', 'Boneless 65', 100, '1', '100', '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(119, 0, '332', 'Leg Piece 2 pic', 100, '1', '100', '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '100', '', 0),
(120, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '150', '', 0),
(121, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(122, 0, '322', 'Kaadai Briyani', 140, '1', '140', '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(123, 0, '373', 'Tandoori Half', 140, '1', '140', '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '140', '', 0),
(124, 0, '374', 'Barbic Chicken Full', 300, '1', '300', '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '300', '', 0),
(125, 0, '390', 'Parotta', 30, '1', '30', '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '30', '', 0),
(126, 0, '389', 'Chappat', 25, '1', '25', '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '25', '', 0),
(127, 0, '388', 'Tandoori Parotta', 35, '1', '35', '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '35', '', 0),
(128, 0, '383', 'Butter Rotti', 30, '1', '30', '2017-12-23', '18:07:45', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '30', '', 0),
(129, 0, '384', 'Naan', 25, '1', '25', '2017-12-23', '18:07:45', 6, 1, 1, '88', '1', '', '', '0', '0', '0', '0', '25', '', 0),
(130, 0, '301', 'Special Shawarma', 120, '1', '120', '2017-12-23', '18:16:28', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(131, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-23', '18:16:28', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(132, 0, '301', 'Special Shawarma', 120, '1', '120', '2017-12-23', '18:19:18', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(133, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-23', '18:19:18', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(134, 0, '329', 'Nattu Koli Masala', 140, '2', '280', '2017-12-23', '18:21:53', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '280', '', 1),
(135, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-23', '18:21:53', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(136, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-23', '18:21:53', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(137, 0, '329', 'Nattu Koli Masala', 140, '2', '280', '2017-12-23', '18:21:54', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '280', '', 1),
(138, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-23', '18:21:54', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(139, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-23', '18:21:54', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(140, 0, '329', 'Nattu Koli Masala', 140, '2', '280', '2017-12-23', '18:25:10', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '280', '', 1),
(141, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-23', '18:25:10', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(142, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-23', '18:25:10', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(143, 0, '329', 'Nattu Koli Masala', 140, '2', '280', '2017-12-23', '18:27:19', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '280', '', 1),
(144, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-23', '18:27:19', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(145, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-23', '18:27:19', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(146, 0, '329', 'Nattu Koli Masala', 140, '2', '280', '2017-12-23', '18:32:54', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '280', '', 1),
(147, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-23', '18:32:54', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(148, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-23', '18:32:54', 6, 1, 1, '66', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(149, 0, '326', 'Nattu Koli Fry', 120, '1', '120', '2017-12-23', '18:33:51', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(150, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-23', '18:33:51', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(151, 0, '5', 'Plain Kulcha', 30, '1', '30', '2017-12-23', '18:34:40', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '30', '', 1),
(152, 0, '6', 'Butter Kulcha', 35, '1', '35', '2017-12-23', '18:34:40', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '35', '', 1),
(153, 0, '7', 'Tandoori Parotta', 30, '1', '30', '2017-12-23', '18:34:40', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '30', '', 1),
(154, 0, '331', 'Boneless 65', 100, '2', '200', '2017-12-23', '18:37:12', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '200', '', 1),
(155, 0, '332', 'Leg Piece 2 pic', 100, '5', '500', '2017-12-23', '18:37:12', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '500', '', 1),
(156, 0, '333', 'Lolly Pop 4 pics', 120, '1', '120', '2017-12-23', '18:37:12', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(157, 0, '301', 'Special Shawarma', 120, '1', '120', '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(158, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(159, 0, '306', 'Mutton Chukka', 130, '3', '390', '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '390', '', 1),
(160, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(161, 0, '305', 'Mutton Pepper Fry', 130, '1', '130', '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(162, 0, '306', 'Mutton Chukka', 130, '1', '130', '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(163, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(164, 0, '395', 'Paneer Manchurian', 120, '1', '120', '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(165, 0, '396', 'Paneer Butter Masala', 130, '1', '130', '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(166, 0, '397', 'Mushroom Butter Masala', 130, '1', '130', '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(167, 0, '398', 'Mushroom Pepper Fry', 110, '1', '110', '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '110', '', 1),
(168, 0, '410', 'Mango Juice', 50, '1', '50', '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '50', '', 1),
(169, 0, '411', 'Pinapple Juice', 50, '1', '50', '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '50', '', 1),
(170, 0, '305', 'Mutton Pepper Fry', 130, '1', '130', '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(171, 0, '306', 'Mutton Chukka', 130, '1', '130', '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(172, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(173, 0, '395', 'Paneer Manchurian', 120, '1', '120', '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(174, 0, '396', 'Paneer Butter Masala', 130, '1', '130', '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(175, 0, '397', 'Mushroom Butter Masala', 130, '1', '130', '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(176, 0, '398', 'Mushroom Pepper Fry', 110, '1', '110', '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '110', '', 1),
(177, 0, '410', 'Mango Juice', 50, '1', '50', '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '50', '', 1),
(178, 0, '411', 'Pinapple Juice', 50, '1', '50', '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '50', '', 1),
(179, 0, '343', 'Clear Soup 1/2', 60, '3', '180', '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', '', '', '0', '0', '0', '0', '180', '', 1),
(180, 0, '352', 'Butter Chicken Masala', 140, '3', '420', '2017-12-23', '18:52:36', 6, 1, 1, '8', 'A', '', '', '0', '0', '0', '0', '420', '', 1),
(181, 0, '326', 'Nattu Koli Fry', 120, '1', '120', '2017-12-23', '18:58:32', 6, 1, 1, '77', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(182, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-23', '18:58:32', 6, 1, 1, '77', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(183, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-23', '18:58:32', 6, 1, 1, '77', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(184, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2017-12-23', '18:58:32', 6, 1, 1, '77', '1', '', '', '0', '0', '0', '0', '140', '', 1),
(185, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-26', '10:34:48', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(186, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-26', '10:34:49', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(187, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-26', '13:01:46', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(188, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-26', '13:01:46', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(189, 0, '396', 'Paneer Butter Masala', 130, '1', '130', '2017-12-26', '13:01:46', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(190, 0, '397', 'Mushroom Butter Masala', 130, '1', '130', '2017-12-26', '13:01:46', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(191, 0, '398', 'Mushroom Pepper Fry', 110, '1', '110', '2017-12-26', '13:01:46', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '110', '', 1),
(192, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-26', '13:03:37', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(193, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-26', '13:03:37', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(194, 0, '396', 'Paneer Butter Masala', 130, '1', '130', '2017-12-26', '13:03:37', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(195, 0, '397', 'Mushroom Butter Masala', 130, '1', '130', '2017-12-26', '13:03:37', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(196, 0, '398', 'Mushroom Pepper Fry', 110, '1', '110', '2017-12-26', '13:03:37', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '110', '', 1),
(197, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-26', '13:08:22', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(198, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-26', '13:08:22', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(199, 0, '396', 'Paneer Butter Masala', 130, '1', '130', '2017-12-26', '13:08:22', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(200, 0, '397', 'Mushroom Butter Masala', 130, '1', '130', '2017-12-26', '13:08:22', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(201, 0, '398', 'Mushroom Pepper Fry', 110, '1', '110', '2017-12-26', '13:08:22', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '110', '', 1),
(202, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(203, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(204, 0, '396', 'Paneer Butter Masala', 130, '1', '130', '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(205, 0, '397', 'Mushroom Butter Masala', 130, '1', '130', '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(206, 0, '398', 'Mushroom Pepper Fry', 110, '1', '110', '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '110', '', 1),
(207, 0, '', '', 0, '12', '0', '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', '', '', '', '', '0', '0', '0', '', 1),
(208, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(209, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(210, 0, '396', 'Paneer Butter Masala', 130, '1', '130', '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(211, 0, '397', 'Mushroom Butter Masala', 130, '1', '130', '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(212, 0, '398', 'Mushroom Pepper Fry', 110, '1', '110', '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '110', '', 1),
(213, 0, '', '', 0, '14', '0', '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', '', '', '', '', '0', '0', '0', '', 1),
(214, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(215, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(216, 0, '396', 'Paneer Butter Masala', 130, '1', '130', '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(217, 0, '397', 'Mushroom Butter Masala', 130, '1', '130', '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(218, 0, '398', 'Mushroom Pepper Fry', 110, '1', '110', '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '110', '', 1),
(219, 0, '', '', 0, '16', '0', '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', '', '', '', '', '0', '0', '0', '', 1),
(220, 0, '', '', 0, '4', '0', '2017-12-26', '13:21:09', 6, 1, 1, '77', '1', '', '', '', '', '0', '0', '0', '', 1),
(221, 0, '', '', 0, '4', '0', '2017-12-26', '13:22:54', 6, 1, 1, '77', '1', '', '', '', '', '0', '0', '0', '', 1),
(222, 0, '313', 'Kaadai Tandoori', 120, '1', '120', '2017-12-26', '13:22:54', 6, 1, 1, '77', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(223, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2017-12-26', '13:22:54', 6, 1, 1, '77', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(224, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-26', '13:22:54', 6, 1, 1, '77', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(225, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(226, 0, '309', 'Kaadai Oil Fry', 100, '1', '100', '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '100', '', 1),
(227, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(228, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(229, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(230, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(231, 0, '309', 'Kaadai Oil Fry', 100, '1', '100', '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '100', '', 1),
(232, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(233, 0, '313', 'Kaadai Tandoori', 120, '1', '120', '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(234, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(235, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(236, 0, '309', 'Kaadai Oil Fry', 100, '1', '100', '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '100', '', 1),
(237, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(238, 0, '313', 'Kaadai Tandoori', 120, '1', '120', '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(239, 0, '314', 'Para Fish Fry', 80, '1', '80', '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '80', '', 1),
(240, 0, '315', 'Vanjaram Fry', 140, '1', '140', '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(241, 0, '316', 'Barbic Full Fish 1kg', 350, '1', '350', '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '350', '', 1),
(242, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(243, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(244, 0, '309', 'Kaadai Oil Fry', 100, '1', '100', '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '100', '', 1),
(245, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(246, 0, '313', 'Kaadai Tandoori', 120, '1', '120', '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(247, 0, '314', 'Para Fish Fry', 80, '1', '80', '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '80', '', 1),
(248, 0, '315', 'Vanjaram Fry', 140, '1', '140', '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(249, 0, '316', 'Barbic Full Fish 1kg', 350, '1', '350', '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '350', '', 1),
(250, 0, '381', 'Tandoori Kaadai', 120, '1', '120', '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(251, 0, '380', 'Chicken Tikka', 120, '1', '120', '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(252, 0, '379', 'Pudina Tikka', 120, '1', '120', '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(253, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(254, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(255, 0, '309', 'Kaadai Oil Fry', 100, '1', '100', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '100', '', 1),
(256, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(257, 0, '313', 'Kaadai Tandoori', 120, '1', '120', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(258, 0, '314', 'Para Fish Fry', 80, '1', '80', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '80', '', 1),
(259, 0, '315', 'Vanjaram Fry', 140, '1', '140', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(260, 0, '316', 'Barbic Full Fish 1kg', 350, '1', '350', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '350', '', 1),
(261, 0, '381', 'Tandoori Kaadai', 120, '1', '120', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(262, 0, '380', 'Chicken Tikka', 120, '1', '120', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(263, 0, '379', 'Pudina Tikka', 120, '1', '120', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(264, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(265, 0, '306', 'Mutton Chukka', 130, '1', '130', '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(266, 0, '335', 'Nattu Koli Soup 1/2', 70, '1', '70', '2017-12-26', '13:33:15', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '70', '', 1),
(267, 0, '336', 'Mutton Chettinadu soup', 50, '1', '50', '2017-12-26', '13:33:15', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '50', '', 1),
(268, 0, '337', 'Mutton Chetti soup 1/2', 60, '1', '60', '2017-12-26', '13:33:15', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '60', '', 1),
(269, 0, '335', 'Nattu Koli Soup 1/2', 70, '1', '70', '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '70', '', 1),
(270, 0, '336', 'Mutton Chettinadu soup', 50, '1', '50', '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '50', '', 1),
(271, 0, '337', 'Mutton Chetti soup 1/2', 60, '1', '60', '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '60', '', 1),
(272, 0, '313', 'Kaadai Tandoori', 120, '2', '240', '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '240', '', 1),
(273, 0, '335', 'Nattu Koli Soup 1/2', 70, '1', '70', '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '70', '', 1),
(274, 0, '336', 'Mutton Chettinadu soup', 50, '1', '50', '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '50', '', 1),
(275, 0, '337', 'Mutton Chetti soup 1/2', 60, '1', '60', '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '60', '', 1),
(276, 0, '313', 'Kaadai Tandoori', 120, '2', '240', '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '240', '', 1),
(277, 0, '311', 'Kaadai Pepper Masala', 130, '2', '260', '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '260', '', 1),
(278, 0, '310', 'kaadai Pepper Fry', 120, '2', '240', '2017-12-26', '13:41:24', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '240', '', 0),
(279, 0, '310', 'kaadai Pepper Fry', 120, '2', '240', '2017-12-26', '13:41:32', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '240', '', 0),
(280, 0, '316', 'Barbic Full Fish 1kg', 350, '2', '700', '2017-12-26', '13:41:32', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '700', '', 0),
(281, 0, '310', 'kaadai Pepper Fry', 120, '2', '240', '2017-12-26', '13:41:40', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '240', '', 0),
(282, 0, '316', 'Barbic Full Fish 1kg', 350, '2', '700', '2017-12-26', '13:41:40', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '700', '', 0),
(283, 0, '308', 'Mutton pepper Masala', 140, '2', '280', '2017-12-26', '13:41:40', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '280', '', 0),
(284, 0, '310', 'kaadai Pepper Fry', 120, '2', '240', '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '240', '', 0),
(285, 0, '316', 'Barbic Full Fish 1kg', 350, '2', '700', '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '700', '', 0),
(286, 0, '308', 'Mutton pepper Masala', 140, '2', '280', '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '280', '', 0),
(287, 0, '333', 'Lolly Pop 4 pics', 120, '2', '240', '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '240', '', 0),
(288, 0, '310', 'kaadai Pepper Fry', 120, '2', '240', '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '240', '', 0),
(289, 0, '316', 'Barbic Full Fish 1kg', 350, '2', '700', '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '700', '', 0),
(290, 0, '308', 'Mutton pepper Masala', 140, '2', '280', '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '280', '', 0),
(291, 0, '333', 'Lolly Pop 4 pics', 120, '2', '240', '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '240', '', 0),
(292, 0, '310', 'kaadai Pepper Fry', 120, '2', '240', '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '240', '', 0),
(293, 0, '316', 'Barbic Full Fish 1kg', 350, '2', '700', '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '700', '', 0),
(294, 0, '308', 'Mutton pepper Masala', 140, '2', '280', '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '280', '', 0),
(295, 0, '333', 'Lolly Pop 4 pics', 120, '2', '240', '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A', '', '', '0', '0', '0', '0', '240', '', 0),
(296, 0, '1', 'Rotti', 20, '4', '80', '2017-12-26', '13:50:24', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '80', '', 1),
(297, 0, '1', 'Rotti', 20, '4', '80', '2017-12-26', '13:52:42', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '80', '', 1),
(298, 0, '435', '700 Combo', 700, '1', '700', '2017-12-26', '13:52:42', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '700', '', 1),
(299, 0, '436', '500  Combo', 500, '1', '500', '2017-12-26', '13:52:42', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '500', '', 1),
(300, 0, '1', 'Rotti', 20, '4', '80', '2017-12-26', '14:20:57', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '80', '', 1),
(301, 0, '435', '700 Combo', 700, '1', '700', '2017-12-26', '14:20:57', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '700', '', 1),
(302, 0, '436', '500  Combo', 500, '1', '500', '2017-12-26', '14:20:57', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '500', '', 1),
(303, 0, '1', 'Rotti', 20, '4', '80', '2017-12-26', '14:21:42', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '80', '', 1),
(304, 0, '435', '700 Combo', 700, '1', '700', '2017-12-26', '14:21:42', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '700', '', 1),
(305, 0, '436', '500  Combo', 500, '1', '500', '2017-12-26', '14:21:42', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '500', '', 1),
(306, 0, '303', 'Plate Shawarma', 130, '2', '260', '2017-12-26', '14:21:42', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '260', '', 1),
(307, 0, '3', ' Naan', 25, '1', '25', '2017-12-26', '14:25:01', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '25', '', 1),
(308, 0, '4', 'Butter Naan', 35, '1', '35', '2017-12-26', '14:25:01', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '35', '', 1),
(309, 0, '5', 'Plain Kulcha', 30, '1', '30', '2017-12-26', '14:25:01', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '30', '', 1),
(310, 0, '3', ' Naan', 25, '1', '25', '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '25', '', 1),
(311, 0, '4', 'Butter Naan', 35, '1', '35', '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '35', '', 1),
(312, 0, '5', 'Plain Kulcha', 30, '1', '30', '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '30', '', 1),
(313, 0, '325', 'Plain Briyani', 90, '1', '90', '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '90', '', 1),
(314, 0, '324', 'Nikka Chicken Briyani', 110, '1', '110', '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '110', '', 1),
(315, 0, '303', 'Plate Shawarma', 130, '2', '260', '2017-12-26', '14:42:04', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '260', '', 1),
(316, 0, '304', 'Mutton Raan', 1200, '4', '4800', '2017-12-26', '14:42:04', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '4800', '', 1),
(317, 0, '303', 'Plate Shawarma', 130, '2', '260', '2017-12-26', '14:42:20', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '260', '', 1),
(318, 0, '304', 'Mutton Raan', 1200, '4', '4800', '2017-12-26', '14:42:20', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '4800', '', 1),
(319, 0, '317', 'Barbic Full Fish 1.5 Kg', 450, '1', '450', '2017-12-26', '14:42:20', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '450', '', 1),
(320, 0, '316', 'Barbic Full Fish 1kg', 350, '1', '350', '2017-12-26', '14:42:20', 6, 1, 1, '100', '1', '', '', '0', '0', '0', '0', '350', '', 1),
(321, 0, '302', 'Special Shawarma 1/2', 120, '2', '240', '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '240', '', 1),
(322, 0, '362', '20*20', 120, '2', '240', '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '240', '', 1),
(323, 0, '311', 'Kaadai Pepper Masala', 130, '2', '260', '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(324, 0, '303', 'Plate Shawarma', 130, '2', '260', '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(325, 0, '313', 'Kaadai Tandoori', 120, '1', '120', '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(326, 0, '307', 'Mutton Gravy', 130, '2', '260', '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(327, 0, '302', 'Special Shawarma 1/2', 120, '2', '240', '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '240', '', 1),
(328, 0, '362', '20*20', 120, '2', '240', '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '240', '', 1),
(329, 0, '311', 'Kaadai Pepper Masala', 130, '2', '260', '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(330, 0, '303', 'Plate Shawarma', 130, '2', '260', '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(331, 0, '313', 'Kaadai Tandoori', 120, '1', '120', '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(332, 0, '307', 'Mutton Gravy', 130, '2', '260', '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(333, 0, '2', 'Butter Rotti', 25, '2', '50', '2017-12-26', '16:39:26', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '50', '', 1),
(334, 0, '2', 'Butter Rotti', 25, '2', '50', '2017-12-26', '16:39:28', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '50', '', 1),
(335, 0, '2', 'Butter Rotti', 25, '2', '50', '2017-12-26', '16:39:34', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '50', '', 1),
(336, 0, '1', 'Rotti', 20, '1', '20', '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '20', '', 1),
(337, 0, '301', 'Special Shawarma', 120, '2', '240', '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '240', '', 1),
(338, 0, '2', 'Butter Rotti', 25, '2', '50', '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '50', '', 1),
(339, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(340, 0, '333', 'Lolly Pop 4 pics', 120, '1', '120', '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(341, 0, '396', 'Paneer Butter Masala', 130, '1', '130', '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(342, 0, '397', 'Mushroom Butter Masala', 130, '1', '130', '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(343, 0, '347', 'Kerala Chicken gravy', 130, '2', '260', '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(344, 0, '348', 'Andra Chicken gravy', 130, '2', '260', '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(345, 0, '349', 'Kaadai Chicken gravy', 140, '2', '280', '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '280', '', 1),
(346, 0, '307', 'Mutton Gravy', 130, '4', '520', '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '520', '', 1),
(347, 0, '310', 'kaadai Pepper Fry', 120, '2', '240', '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '240', '', 1),
(348, 0, '302', 'Special Shawarma 1/2', 120, '2', '240', '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '240', '', 1),
(349, 0, '306', 'Mutton Chukka', 130, '1', '130', '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(350, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(351, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(352, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(353, 0, '327', 'Nattu Koli Varutha Kari', 130, '2', '260', '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(354, 0, '306', 'Mutton Chukka', 130, '1', '130', '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(355, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(356, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(357, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(358, 0, '327', 'Nattu Koli Varutha Kari', 130, '2', '260', '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(359, 0, '317', 'Barbic Full Fish 1.5 Kg', 450, '1', '450', '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '450', '', 1),
(360, 0, '316', 'Barbic Full Fish 1kg', 350, '1', '350', '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '350', '', 1),
(361, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-26', '19:01:44', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(362, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-26', '19:01:44', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(363, 0, '301', 'Special Shawarma', 120, '1', '120', '2017-12-26', '19:01:44', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(364, 0, '304', 'Mutton Raan', 1200, '3', '3600', '2017-12-26', '19:01:44', 6, 1, 1, '222', '1', '', '', '0', '0', '0', '0', '3600', '', 1),
(365, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-27', '09:57:15', 6, 1, 1, '333', '1', '', '', '0', '0', '0', '0', '120', '', 0),
(366, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '09:57:15', 6, 1, 1, '333', '1', '', '', '0', '0', '0', '0', '130', '', 0),
(367, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(368, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(369, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '1200', '', 1),
(370, 0, '427', 'Extra', 10, '2', '20', '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '20', '', 1),
(371, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(372, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(373, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '1200', '', 1),
(374, 0, '427', 'Extra', 10, '2', '20', '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '20', '', 1),
(375, 0, '2', 'Butter Rotti', 25, '1', '25', '2017-12-27', '10:19:36', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '25', '', 1),
(376, 0, '3', ' Naan', 25, '1', '25', '2017-12-27', '10:19:36', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '25', '', 1),
(377, 0, '4', 'Butter Naan', 35, '1', '35', '2017-12-27', '10:19:36', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '35', '', 1),
(378, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-27', '10:32:16', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(379, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '10:32:16', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(380, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2017-12-27', '10:32:16', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '1200', '', 1),
(381, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-27', '10:33:26', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(382, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '10:33:26', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(383, 0, '319', 'Hyderabad Chicken Briyani', 150, '1', '150', '2017-12-27', '10:34:44', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(384, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-27', '10:34:44', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(385, 0, '4', 'Butter Naan', 35, '2', '70', '2017-12-27', '10:38:04', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '70', '', 1),
(386, 0, '3', ' Naan', 25, '1', '25', '2017-12-27', '10:38:04', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '25', '', 1),
(387, 0, '5', 'Plain Kulcha', 30, '1', '30', '2017-12-27', '10:38:04', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '30', '', 1),
(388, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(389, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(390, 0, '304', 'Mutton Raan', 1200, '3', '3600', '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '3600', '', 1),
(391, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(392, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(393, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(394, 0, '337', 'Mutton Chetti soup 1/2', 60, '1', '60', '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '60', '', 1),
(395, 0, '338', 'Chicken Chettinadu Soup', 50, '1', '50', '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '50', '', 1),
(396, 0, '394', 'Paneer Pepper Fry', 120, '1', '120', '2017-12-27', '10:39:26', 6, 1, 1, '7', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(397, 0, '395', 'Paneer Manchurian', 120, '1', '120', '2017-12-27', '10:39:26', 6, 1, 1, '7', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(398, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(399, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(400, 0, '367', 'Pepper Grill Half', 140, '1', '140', '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(401, 0, '368', 'Lemon Grill Full', 280, '1', '280', '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '280', '', 1),
(402, 0, '369', 'Lemon grill Half', 150, '1', '150', '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(403, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-27', '10:45:14', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(404, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '10:45:14', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(405, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2017-12-27', '10:45:14', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '1200', '', 1),
(406, 0, '332', 'Leg Piece 2 pic', 100, '1', '100', '2017-12-27', '10:45:56', 6, 1, 1, '99', '1', '', '', '0', '0', '0', '0', '100', '', 1),
(407, 0, '331', 'Boneless 65', 100, '2', '200', '2017-12-27', '10:45:56', 6, 1, 1, '99', '1', '', '', '0', '0', '0', '0', '200', '', 1),
(408, 0, '330', 'Chicken 65', 70, '1', '70', '2017-12-27', '10:45:56', 6, 1, 1, '99', '1', '', '', '0', '0', '0', '0', '70', '', 1),
(409, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2017-12-27', '10:53:04', 6, 1, 1, '99', '1', '', '', '0', '0', '0', '0', '1200', '', 1);
INSERT INTO `kop_bill_details` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`, `remarks`, `unit_type`, `ser_tax`, `vat_tax`, `service`, `vat`, `tot_amt`, `cat`, `full_print_status`) VALUES
(410, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '10:53:04', 6, 1, 1, '99', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(411, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-27', '10:54:20', 6, 1, 1, '444', '1', '', '', '0', '0', '0', '0', '120', '', 1),
(412, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '10:54:20', 6, 1, 1, '444', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(413, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2017-12-27', '10:54:20', 6, 1, 1, '444', '1', '', '', '0', '0', '0', '0', '1200', '', 1),
(414, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2017-12-27', '10:57:23', 6, 1, 1, '99', '1', '', '', '0', '0', '0', '0', '1200', '', 1),
(415, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '10:57:23', 6, 1, 1, '99', '1', '', '', '0', '0', '0', '0', '130', '', 1),
(416, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-27', '10:57:23', 6, 1, 1, '99', '1', '', '', '0', '0', '0', '0', '140', '', 1),
(417, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-27', '10:57:23', 6, 1, 1, '99', '1', '', '', '0', '0', '0', '0', '150', '', 1),
(418, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-27', '11:01:11', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(419, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '11:01:11', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(420, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2017-12-27', '11:01:11', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '1200', '', 1),
(421, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '11:02:51', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(422, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2017-12-27', '11:02:51', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '1200', '', 1),
(423, 0, '427', 'Extra', 10, '1', '10', '2017-12-27', '11:02:51', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '10', '', 1),
(424, 0, '303', 'Plate Shawarma', 130, '2', '260', '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(425, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(426, 0, '301', 'Special Shawarma', 120, '1', '120', '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(427, 0, '354', 'Tangri Masala', 130, '1', '130', '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(428, 0, '355', 'Half Grill Punjabi Masala', 180, '1', '180', '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '180', '', 1),
(429, 0, '303', 'Plate Shawarma', 130, '2', '260', '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(430, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(431, 0, '301', 'Special Shawarma', 120, '1', '120', '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(432, 0, '354', 'Tangri Masala', 130, '1', '130', '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(433, 0, '355', 'Half Grill Punjabi Masala', 180, '1', '180', '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '180', '', 1),
(434, 0, '420', 'Black Current', 70, '1', '70', '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '70', '', 1),
(435, 0, '421', 'Butter Scotch', 70, '1', '70', '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '70', '', 1),
(436, 0, '301', 'Special Shawarma', 120, '1', '120', '2017-12-27', '13:18:30', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(437, 0, '308', 'Mutton pepper Masala', 140, '1', '140', '2017-12-27', '13:18:30', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(438, 0, '313', 'Kaadai Tandoori', 120, '1', '120', '2017-12-27', '13:18:30', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(439, 0, '357', 'Hot Peeper', 120, '1', '120', '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(440, 0, '308', 'Mutton pepper Masala', 140, '2', '280', '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '280', '', 1),
(441, 0, '313', 'Kaadai Tandoori', 120, '1', '120', '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(442, 0, '325', 'Plain Briyani', 90, '1', '90', '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '90', '', 1),
(443, 0, '422', 'water 1 lit', 20, '1', '20', '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '20', '', 1),
(444, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2017-12-27', '16:38:31', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '1200', '', 1),
(445, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-27', '16:38:31', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(446, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2017-12-27', '16:38:31', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(447, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-29', '11:18:13', 6, 1, 1, '7', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(448, 0, '3', ' Naan', 25, '1', '25', '2017-12-29', '11:18:25', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '25', '', 1),
(449, 0, '3', ' Naan', 25, '1', '25', '2017-12-29', '11:18:25', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '25', '', 1),
(450, 0, '3', ' Naan', 25, '1', '25', '2017-12-29', '11:18:40', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '25', '', 1),
(451, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-29', '13:47:26', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(452, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-29', '13:47:26', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(453, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(454, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(455, 0, '308', 'Mutton pepper Masala', 140, '1', '140', '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(456, 0, '319', 'Hyderabad Chicken Briyani', 150, '1', '150', '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(457, 0, '301', 'Special Shawarma', 120, '1', '120', '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(458, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(459, 0, '347', 'Kerala Chicken gravy', 130, '1', '130', '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(460, 0, '329', 'Nattu Koli Masala', 140, '2', '280', '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '280', '', 1),
(461, 0, '348', 'Andra Chicken gravy', 130, '3', '390', '2017-12-29', '17:06:58', 6, 1, 1, '5', 'B', '', '', '0', '0', '0', '0', '390', '', 1),
(462, 0, '360', 'Chinese pepper Ckn dray', 120, '1', '120', '2017-12-29', '17:06:58', 6, 1, 1, '5', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(463, 0, '346', 'Pepper Chicken Masala', 140, '1', '140', '2017-12-29', '17:06:58', 6, 1, 1, '5', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(464, 0, '319', 'Hyderabad Chicken Briyani', 150, '1', '150', '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '150', '', 1),
(465, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(466, 0, '333', 'Lolly Pop 4 pics', 120, '1', '120', '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(467, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(468, 0, '319', 'Hyderabad Chicken Briyani', 150, '1', '150', '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '150', '', 1),
(469, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(470, 0, '333', 'Lolly Pop 4 pics', 120, '1', '120', '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(471, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(472, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-29', '17:09:31', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(473, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-29', '17:09:31', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(474, 0, '333', 'Lolly Pop 4 pics', 120, '1', '120', '2017-12-29', '17:09:31', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(475, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(476, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(477, 0, '333', 'Lolly Pop 4 pics', 120, '1', '120', '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(478, 0, '315', 'Vanjaram Fry', 140, '1', '140', '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(479, 0, '301', 'Special Shawarma', 120, '1', '120', '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(480, 0, '333', 'Lolly Pop 4 pics', 120, '1', '120', '2017-12-29', '17:14:41', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(481, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-29', '17:14:41', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(482, 0, '306', 'Mutton Chukka', 130, '1', '130', '2017-12-29', '17:14:41', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(483, 0, '1', 'Rotti', 20, '1', '20', '2017-12-29', '17:17:07', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '20', '', 1),
(484, 0, '332', 'Leg Piece 2 pic', 100, '1', '100', '2017-12-29', '17:17:07', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '100', '', 1),
(485, 0, '333', 'Lolly Pop 4 pics', 120, '1', '120', '2017-12-29', '17:17:07', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(486, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(487, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(488, 0, '332', 'Leg Piece 2 pic', 100, '1', '100', '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '100', '', 1),
(489, 0, '347', 'Kerala Chicken gravy', 130, '1', '130', '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(490, 0, '308', 'Mutton pepper Masala', 140, '1', '140', '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(491, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(492, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(493, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-30', '13:05:54', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(494, 0, '346', 'Pepper Chicken Masala', 140, '1', '140', '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(495, 0, '347', 'Kerala Chicken gravy', 130, '1', '130', '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(496, 0, '361', 'Szechuan Chicken dray', 120, '1', '120', '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(497, 0, '370', 'Grill Pepper Fry Full', 280, '1', '280', '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '280', '', 1),
(498, 0, '371', 'Grill Pepper Fry Half', 150, '1', '150', '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(499, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-30', '13:07:22', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(500, 0, '333', 'Lolly Pop 4 pics', 120, '1', '120', '2017-12-30', '13:07:22', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(501, 0, '346', 'Pepper Chicken Masala', 140, '1', '140', '2017-12-30', '13:07:22', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(502, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-30', '13:11:25', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(503, 0, '331', 'Boneless 65', 100, '1', '100', '2017-12-30', '13:11:25', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '100', '', 1),
(504, 0, '316', 'Barbic Full Fish 1kg', 350, '1', '350', '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '350', '', 1),
(505, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(506, 0, '333', 'Lolly Pop 4 pics', 120, '1', '120', '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(507, 0, '359', 'chik Manchurian dray', 120, '1', '120', '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(508, 0, '337', 'Mutton Chetti soup 1/2', 60, '1', '60', '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '60', '', 1),
(509, 0, '320', 'Hyderabad Fish Briyani', 150, '2', '300', '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '300', '', 1),
(510, 0, '307', 'Mutton Gravy', 130, '2', '260', '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '260', '', 1),
(511, 0, '365', 'Garlic Chicken dray', 120, '1', '120', '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(512, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(513, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(514, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(515, 0, '306', 'Mutton Chukka', 130, '1', '130', '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(516, 0, '347', 'Kerala Chicken gravy', 130, '1', '130', '2017-12-30', '13:52:59', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(517, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(518, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(519, 0, '319', 'Hyderabad Chicken Briyani', 150, '1', '150', '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(520, 0, '308', 'Mutton pepper Masala', 140, '1', '140', '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(521, 0, '320', 'Hyderabad Fish Briyani', 150, '2', '300', '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '300', '', 1),
(522, 0, '310', 'kaadai Pepper Fry', 120, '2', '240', '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '240', '', 1),
(523, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(524, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(525, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(526, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(527, 0, '301', 'Special Shawarma', 120, '1', '120', '2017-12-30', '14:57:00', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(528, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-30', '14:57:00', 6, 1, 1, '3', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(529, 0, '307', 'Mutton Gravy', 130, '2', '260', '2017-12-30', '14:57:31', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(530, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-30', '14:58:19', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(531, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-30', '14:58:19', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(532, 0, '329', 'Nattu Koli Masala', 140, '3', '420', '2017-12-30', '14:58:19', 6, 1, 1, '5', 'A', '', '', '0', '0', '0', '0', '420', '', 1),
(533, 0, '319', 'Hyderabad Chicken Briyani', 150, '1', '150', '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(534, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(535, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(536, 0, '311', 'Kaadai Pepper Masala', 130, '2', '260', '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(537, 0, '347', 'Kerala Chicken gravy', 130, '3', '390', '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '390', '', 1),
(538, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(539, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(540, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(541, 0, '307', 'Mutton Gravy', 130, '3', '390', '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '390', '', 1),
(542, 0, '306', 'Mutton Chukka', 130, '1', '130', '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(543, 0, '327', 'Nattu Koli Varutha Kari', 130, '1', '130', '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(544, 0, '320', 'Hyderabad Fish Briyani', 150, '2', '300', '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '300', '', 1),
(545, 0, '307', 'Mutton Gravy', 130, '2', '260', '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '260', '', 1),
(546, 0, '306', 'Mutton Chukka', 130, '2', '260', '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '260', '', 1),
(547, 0, '302', 'Special Shawarma 1/2', 120, '2', '240', '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '240', '', 1),
(548, 0, '347', 'Kerala Chicken gravy', 130, '2', '260', '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '260', '', 1),
(549, 0, '365', 'Garlic Chicken dray', 120, '2', '240', '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '240', '', 1),
(550, 0, '428', 'Chettinadu Chicken dray', 120, '1', '120', '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(551, 0, '316', 'Barbic Full Fish 1kg', 350, '1', '350', '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '350', '', 1),
(552, 0, '315', 'Vanjaram Fry', 140, '1', '140', '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(553, 0, '314', 'Para Fish Fry', 80, '1', '80', '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '80', '', 1),
(554, 0, '317', 'Barbic Full Fish 1.5 Kg', 450, '3', '1350', '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '1350', '', 1),
(555, 0, '301', 'Special Shawarma', 120, '1', '120', '2017-12-30', '15:27:37', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(556, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-30', '15:27:37', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(557, 0, '308', 'Mutton pepper Masala', 140, '2', '280', '2017-12-30', '15:27:37', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '280', '', 1),
(558, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-30', '15:29:21', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(559, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-30', '15:29:21', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(560, 0, '301', 'Special Shawarma', 120, '2', '240', '2017-12-30', '15:41:41', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '240', '', 1),
(561, 0, '329', 'Nattu Koli Masala', 140, '2', '280', '2017-12-30', '15:41:41', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '280', '', 1),
(562, 0, '301', 'Special Shawarma', 120, '5', '600', '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '600', '', 1),
(563, 0, '303', 'Plate Shawarma', 130, '1', '130', '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(564, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '150', '', 1),
(565, 0, '302', 'Special Shawarma 1/2', 120, '2', '240', '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '240', '', 1),
(566, 0, '302', 'Special Shawarma 1/2', 120, '2', '240', '2017-12-30', '15:47:23', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '240', '', 1),
(567, 0, '303', 'Plate Shawarma', 130, '2', '260', '2017-12-30', '15:47:23', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '260', '', 1),
(568, 0, '320', 'Hyderabad Fish Briyani', 150, '2', '300', '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '300', '', 1),
(569, 0, '321', 'Nikka Mutton Briyani', 140, '2', '280', '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '280', '', 1),
(570, 0, '322', 'Kaadai Briyani', 140, '1', '140', '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(571, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(572, 0, '326', 'Nattu Koli Fry', 120, '1', '120', '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(573, 0, '307', 'Mutton Gravy', 130, '1', '130', '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(574, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(575, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(576, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(577, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(578, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '150', '', 1),
(579, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(580, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(581, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(582, 0, '409', 'Apple Juice', 60, '1', '60', '2017-12-30', '16:05:56', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '60', '', 1),
(583, 0, '410', 'Mango Juice', 50, '1', '50', '2017-12-30', '16:05:56', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '50', '', 1),
(584, 0, '411', 'Pinapple Juice', 50, '1', '50', '2017-12-30', '16:05:56', 6, 1, 1, '4', 'B', '', '', '0', '0', '0', '0', '50', '', 1),
(585, 0, '319', 'Hyderabad Chicken Briyani', 150, '3', '450', '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '450', '', 1),
(586, 0, '307', 'Mutton Gravy', 130, '2', '260', '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(587, 0, '308', 'Mutton pepper Masala', 140, '2', '280', '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '280', '', 1),
(588, 0, '321', 'Nikka Mutton Briyani', 140, '2', '280', '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '280', '', 1),
(589, 0, '418', 'Strawberry', 70, '1', '70', '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '70', '', 1),
(590, 0, '419', 'Mango mil', 70, '2', '140', '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(591, 0, '312', 'Kaadai Gravy', 130, '2', '260', '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(592, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2017-12-30', '16:11:36', 6, 1, 1, '7', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(593, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2017-12-30', '16:11:36', 6, 1, 1, '7', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(594, 0, '313', 'Kaadai Tandoori', 120, '1', '120', '2017-12-30', '16:11:36', 6, 1, 1, '7', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(595, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(596, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(597, 0, '326', 'Nattu Koli Fry', 120, '1', '120', '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(598, 0, '327', 'Nattu Koli Varutha Kari', 130, '2', '260', '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B', '', '', '0', '0', '0', '0', '260', '', 1),
(599, 0, '316', 'Barbic Full Fish 1kg', 350, '1', '350', '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '350', '', 1),
(600, 0, '315', 'Vanjaram Fry', 140, '1', '140', '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(601, 0, '314', 'Para Fish Fry', 80, '1', '80', '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '80', '', 1),
(602, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(603, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(604, 0, '311', 'Kaadai Pepper Masala', 130, '2', '260', '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '260', '', 1),
(605, 0, '308', 'Mutton pepper Masala', 140, '2', '280', '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '280', '', 1),
(606, 0, '321', 'Nikka Mutton Briyani', 140, '2', '280', '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '280', '', 1),
(607, 0, '333', 'Lolly Pop 4 pics', 120, '2', '240', '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '240', '', 1),
(608, 0, '332', 'Leg Piece 2 pic', 100, '2', '200', '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '200', '', 1),
(609, 0, '331', 'Boneless 65', 100, '2', '200', '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '200', '', 1),
(610, 0, '330', 'Chicken 65', 70, '2', '140', '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(611, 0, '350', 'Nilagiris nChicken Masala', 140, '4', '560', '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '560', '', 1),
(612, 0, '349', 'Kaadai Chicken gravy', 140, '2', '280', '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '280', '', 1),
(613, 0, '348', 'Andra Chicken gravy', 130, '3', '390', '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', '', '', '0', '0', '0', '0', '390', '', 1),
(614, 0, '333', 'Lolly Pop 4 pics', 120, '2', '240', '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '240', '', 1),
(615, 0, '332', 'Leg Piece 2 pic', 100, '2', '200', '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '200', '', 1),
(616, 0, '331', 'Boneless 65', 100, '3', '300', '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '300', '', 1),
(617, 0, '330', 'Chicken 65', 70, '1', '70', '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '70', '', 1),
(618, 0, '307', 'Mutton Gravy', 130, '3', '390', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '390', '', 1),
(619, 0, '308', 'Mutton pepper Masala', 140, '1', '140', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(620, 0, '334', 'Nattu koli Soup', 60, '2', '120', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(621, 0, '342', 'Clear Soup', 50, '2', '100', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '100', '', 1),
(622, 0, '372', 'Tandoori Full', 260, '2', '520', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '520', '', 1),
(623, 0, '373', 'Tandoori Half', 140, '2', '280', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '280', '', 1),
(624, 0, '405', 'Veg Rice ', 80, '1', '80', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '80', '', 1),
(625, 0, '423', 'Egg noodles', 90, '2', '180', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '180', '', 1),
(626, 0, '402', 'Chicken Rice ', 100, '2', '200', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '200', '', 1),
(627, 0, '401', 'Egg Rice ', 90, '2', '180', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '180', '', 1),
(628, 0, '424', 'Chicken noodles', 100, '1', '100', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '100', '', 1),
(629, 0, '425', 'Szechuan noodles', 110, '1', '110', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '110', '', 1),
(630, 0, '426', 'vag noodles', 80, '1', '80', '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '80', '', 1),
(631, 0, '307', 'Mutton Gravy', 130, '3', '390', '2018-01-02', '10:57:13', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '390', '', 1),
(632, 0, '306', 'Mutton Chukka', 130, '2', '260', '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(633, 0, '347', 'Kerala Chicken gravy', 130, '2', '260', '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(634, 0, '337', 'Mutton Chetti soup 1/2', 60, '2', '120', '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(635, 0, '329', 'Nattu Koli Masala', 140, '2', '280', '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '280', '', 1),
(636, 0, '301', 'Special Shawarma', 120, '2', '240', '2018-01-02', '10:57:36', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '240', '', 1),
(637, 0, '302', 'Special Shawarma 1/2', 120, '5', '600', '2018-01-02', '10:57:36', 6, 1, 1, '10', 'A', '', '', '0', '0', '0', '0', '600', '', 1),
(638, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(639, 0, '321', 'Nikka Mutton Briyani', 140, '3', '420', '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '420', '', 1),
(640, 0, '322', 'Kaadai Briyani', 140, '1', '140', '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(641, 0, '323', 'Nattu Koli Briyani', 140, '1', '140', '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(642, 0, '311', 'Kaadai Pepper Masala', 130, '1', '130', '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(643, 0, '310', 'kaadai Pepper Fry', 120, '1', '120', '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(644, 0, '309', 'Kaadai Oil Fry', 100, '1', '100', '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '100', '', 1),
(645, 0, '312', 'Kaadai Gravy', 130, '1', '130', '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(646, 0, '321', 'Nikka Mutton Briyani', 140, '2', '280', '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '280', '', 1),
(647, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '150', '', 1),
(648, 0, '302', 'Special Shawarma 1/2', 120, '3', '360', '2018-01-02', '11:50:50', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '360', '', 1),
(649, 0, '301', 'Special Shawarma', 120, '2', '240', '2018-01-02', '11:50:50', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '240', '', 1),
(650, 0, '383', 'Butter Rotti', 30, '1', '30', '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '30', '', 1),
(651, 0, '384', 'Naan', 25, '1', '25', '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '25', '', 1),
(652, 0, '385', 'Butter Naan', 35, '1', '35', '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '35', '', 1),
(653, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '150', '', 1),
(654, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(655, 0, '322', 'Kaadai Briyani', 140, '1', '140', '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(656, 0, '304', 'Mutton Raan', 1200, '2', '2400', '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '2400', '', 1),
(657, 0, '301', 'Special Shawarma', 120, '1', '120', '2018-01-02', '11:55:00', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(658, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2018-01-02', '11:55:00', 6, 1, 1, '6', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(659, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(660, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '140', '', 1),
(661, 0, '327', 'Nattu Koli Varutha Kari', 130, '3', '390', '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '390', '', 1),
(662, 0, '326', 'Nattu Koli Fry', 120, '1', '120', '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(663, 0, '328', 'Nattu Koli Kulambu', 130, '11', '1430', '2018-01-02', '19:10:35', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '1430', '', 1),
(664, 0, '315', 'Vanjaram Fry', 140, '2', '280', '2018-01-02', '19:10:35', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '280', '', 1),
(665, 0, '1', 'Rotti', 20, '1', '20', '2018-01-02', '19:51:12', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '20', '', 1),
(666, 0, '2', 'Butter Rotti', 25, '5', '125', '2018-01-02', '19:51:12', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '125', '', 1),
(667, 0, '3', ' Naan', 25, '1', '25', '2018-01-02', '19:51:12', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '25', '', 1),
(668, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(669, 0, '301', 'Special Shawarma', 120, '1', '120', '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B', '', '', '0', '0', '0', '0', '120', '', 1),
(670, 0, '303', 'Plate Shawarma', 130, '1', '130', '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(671, 0, '304', 'Mutton Raan', 1200, '1', '1200', '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B', '', '', '0', '0', '0', '0', '1200', '', 1),
(672, 0, '301', 'Special Shawarma', 120, '3', '360', '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '360', '', 0),
(673, 0, '302', 'Special Shawarma 1/2', 120, '2', '240', '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '240', '', 0),
(674, 0, '303', 'Plate Shawarma', 130, '2', '260', '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '260', '', 0),
(675, 0, '321', 'Nikka Mutton Briyani', 140, '2', '280', '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A', '', '', '0', '0', '0', '0', '280', '', 0),
(676, 0, '320', 'Hyderabad Fish Briyani', 150, '3', '450', '2018-01-03', '17:23:08', 6, 1, 1, '5', 'B', '', '', '0', '0', '0', '0', '450', '', 1),
(677, 0, '321', 'Nikka Mutton Briyani', 140, '3', '420', '2018-01-03', '17:23:08', 6, 1, 1, '5', 'B', '', '', '0', '0', '0', '0', '420', '', 1),
(678, 0, '3', ' Naan', 25, '2', '50', '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '50', '', 1),
(679, 0, '4', 'Butter Naan', 35, '2', '70', '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '70', '', 1),
(680, 0, '322', 'Kaadai Briyani', 140, '2', '280', '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '280', '', 1),
(681, 0, '349', 'Kaadai Chicken gravy', 140, '2', '280', '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '280', '', 1),
(682, 0, '311', 'Kaadai Pepper Masala', 130, '2', '260', '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '260', '', 1),
(683, 0, '310', 'kaadai Pepper Fry', 120, '2', '240', '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '240', '', 1),
(684, 0, '309', 'Kaadai Oil Fry', 100, '2', '200', '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '200', '', 1),
(685, 0, '312', 'Kaadai Gravy', 130, '2', '260', '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '260', '', 1),
(686, 0, '313', 'Kaadai Tandoori', 120, '2', '240', '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '240', '', 1),
(687, 0, '309', 'Kaadai Oil Fry', 100, '2', '200', '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '200', '', 1),
(688, 0, '310', 'kaadai Pepper Fry', 120, '2', '240', '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '240', '', 1),
(689, 0, '311', 'Kaadai Pepper Masala', 130, '2', '260', '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '260', '', 1),
(690, 0, '329', 'Nattu Koli Masala', 140, '1', '140', '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(691, 0, '328', 'Nattu Koli Kulambu', 130, '1', '130', '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '130', '', 1),
(692, 0, '320', 'Hyderabad Fish Briyani', 150, '1', '150', '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '150', '', 1),
(693, 0, '321', 'Nikka Mutton Briyani', 140, '1', '140', '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', '', '', '0', '0', '0', '0', '140', '', 1),
(694, 0, '301', 'Special Shawarma', 120, '1', '120', '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(695, 0, '302', 'Special Shawarma 1/2', 120, '1', '120', '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '120', '', 1),
(696, 0, '303', 'Plate Shawarma', 130, '1', '130', '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '130', '', 1),
(697, 0, '304', 'Mutton Raan', 1200, '2', '2400', '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '2400', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kop_bill_print`
--

CREATE TABLE IF NOT EXISTS `kop_bill_print` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `kop_bill_status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=698 ;

--
-- Dumping data for table `kop_bill_print`
--

INSERT INTO `kop_bill_print` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`, `kop_bill_status`) VALUES
(65, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-23', '17:02:19', 6, 1, 1, '88', '1', 1),
(72, 0, '427', 'Extra', 10, 1, 10, '2017-12-23', '17:06:27', 6, 1, 1, '222', '1', 1),
(40, 0, '187', 'egg fri ric/no', 120, 1, 120, '2017-07-23', '19:49:43', 6, 1, 2, '1', 'A', 0),
(39, 0, '366', 'shwarma chicken', 90, 2, 180, '2017-07-23', '19:47:28', 6, 1, 2, '1', 'A', 1),
(38, 0, '109', 'Grill half', 175, 1, 175, '2017-07-23', '19:42:18', 6, 1, 2, '7', 'A', 1),
(41, 0, '353', 'Tikka Masala', 140, 4, 560, '2017-12-23', '13:26:17', 6, 1, 1, '2', 'A', 1),
(42, 0, '353', 'Tikka Masala', 140, 4, 560, '2017-12-23', '13:29:07', 6, 1, 1, '2', 'A', 1),
(64, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '17:02:19', 6, 1, 1, '88', '1', 1),
(53, 0, '300', 'Shawarma', 100, 1, 100, '2017-12-23', '16:47:55', 6, 1, 1, '88', '1', 1),
(54, 0, '301', 'Special Shawarma', 120, 3, 360, '2017-12-23', '16:47:55', 6, 1, 1, '88', '1', 1),
(51, 0, '304', 'Mutton Raan', 1200, 2, 2400, '2017-12-23', '15:29:22', 6, 1, 1, '2', 'B', 1),
(73, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-23', '17:06:27', 6, 1, 1, '222', '1', 1),
(71, 0, '436', '500  Combo', 500, 1, 500, '2017-12-23', '17:06:27', 6, 1, 1, '222', '1', 1),
(70, 0, '435', '700 Combo', 700, 1, 700, '2017-12-23', '17:06:27', 6, 1, 1, '222', '1', 1),
(74, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '17:47:11', 6, 1, 1, '88', '1', 0),
(75, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '17:47:11', 6, 1, 1, '88', '1', 0),
(76, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '17:47:11', 6, 1, 1, '88', '1', 0),
(77, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '17:51:53', 6, 1, 1, '88', '1', 0),
(78, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '17:51:53', 6, 1, 1, '88', '1', 0),
(79, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '17:51:53', 6, 1, 1, '88', '1', 0),
(80, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', 0),
(81, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', 0),
(82, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', 0),
(83, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', 0),
(84, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', 0),
(85, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1', 0),
(86, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', 0),
(87, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', 0),
(88, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', 0),
(89, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', 0),
(90, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', 0),
(91, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1', 0),
(92, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', 0),
(93, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', 0),
(94, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', 0),
(95, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', 0),
(96, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', 0),
(97, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1', 0),
(98, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', 0),
(99, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', 0),
(100, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', 0),
(101, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', 0),
(102, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', 0),
(103, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', 0),
(104, 0, '373', 'Tandoori Half', 140, 1, 140, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', 0),
(105, 0, '374', 'Barbic Chicken Full', 300, 1, 300, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1', 0),
(106, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', 0),
(107, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', 0),
(108, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', 0),
(109, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', 0),
(110, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', 0),
(111, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', 0),
(112, 0, '373', 'Tandoori Half', 140, 1, 140, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', 0),
(113, 0, '374', 'Barbic Chicken Full', 300, 1, 300, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', 0),
(114, 0, '390', 'Parotta', 30, 1, 30, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', 0),
(115, 0, '389', 'Chappat', 25, 1, 25, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', 0),
(116, 0, '388', 'Tandoori Parotta', 35, 1, 35, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1', 0),
(117, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', 0),
(118, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', 0),
(119, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', 0),
(120, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', 0),
(121, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', 0),
(122, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', 0),
(123, 0, '373', 'Tandoori Half', 140, 1, 140, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', 0),
(124, 0, '374', 'Barbic Chicken Full', 300, 1, 300, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', 0),
(125, 0, '390', 'Parotta', 30, 1, 30, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', 0),
(126, 0, '389', 'Chappat', 25, 1, 25, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', 0),
(127, 0, '388', 'Tandoori Parotta', 35, 1, 35, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1', 0),
(128, 0, '383', 'Butter Rotti', 30, 1, 30, '2017-12-23', '18:07:45', 6, 1, 1, '88', '1', 0),
(129, 0, '384', 'Naan', 25, 1, 25, '2017-12-23', '18:07:45', 6, 1, 1, '88', '1', 0),
(130, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-23', '18:16:28', 6, 1, 1, '1', 'B', 0),
(131, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-23', '18:16:28', 6, 1, 1, '1', 'B', 0),
(132, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-23', '18:19:18', 6, 1, 1, '1', 'B', 0),
(133, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-23', '18:19:18', 6, 1, 1, '1', 'B', 0),
(134, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-23', '18:21:53', 6, 1, 1, '66', '1', 0),
(135, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:21:53', 6, 1, 1, '66', '1', 0),
(136, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:21:53', 6, 1, 1, '66', '1', 0),
(137, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-23', '18:21:54', 6, 1, 1, '66', '1', 0),
(138, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:21:54', 6, 1, 1, '66', '1', 0),
(139, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:21:54', 6, 1, 1, '66', '1', 0),
(140, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-23', '18:25:10', 6, 1, 1, '66', '1', 0),
(141, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:25:10', 6, 1, 1, '66', '1', 0),
(142, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:25:10', 6, 1, 1, '66', '1', 0),
(143, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-23', '18:27:19', 6, 1, 1, '66', '1', 0),
(144, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:27:19', 6, 1, 1, '66', '1', 0),
(145, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:27:19', 6, 1, 1, '66', '1', 0),
(146, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-23', '18:32:54', 6, 1, 1, '66', '1', 0),
(147, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:32:54', 6, 1, 1, '66', '1', 0),
(148, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:32:54', 6, 1, 1, '66', '1', 0),
(149, 0, '326', 'Nattu Koli Fry', 120, 1, 120, '2017-12-23', '18:33:51', 6, 1, 1, '3', 'B', 0),
(150, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:33:51', 6, 1, 1, '3', 'B', 0),
(151, 0, '5', 'Plain Kulcha', 30, 1, 30, '2017-12-23', '18:34:40', 6, 1, 1, '6', 'A', 0),
(152, 0, '6', 'Butter Kulcha', 35, 1, 35, '2017-12-23', '18:34:40', 6, 1, 1, '6', 'A', 0),
(153, 0, '7', 'Tandoori Parotta', 30, 1, 30, '2017-12-23', '18:34:40', 6, 1, 1, '6', 'A', 0),
(154, 0, '331', 'Boneless 65', 100, 2, 200, '2017-12-23', '18:37:12', 6, 1, 1, '6', 'B', 0),
(155, 0, '332', 'Leg Piece 2 pic', 100, 5, 500, '2017-12-23', '18:37:12', 6, 1, 1, '6', 'B', 0),
(156, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-23', '18:37:12', 6, 1, 1, '6', 'B', 0),
(157, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B', 0),
(158, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B', 0),
(159, 0, '306', 'Mutton Chukka', 130, 3, 390, '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B', 0),
(160, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B', 0),
(161, 0, '305', 'Mutton Pepper Fry', 130, 1, 130, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', 0),
(162, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', 0),
(163, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', 0),
(164, 0, '395', 'Paneer Manchurian', 120, 1, 120, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', 0),
(165, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', 0),
(166, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', 0),
(167, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', 0),
(168, 0, '410', 'Mango Juice', 50, 1, 50, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', 0),
(169, 0, '411', 'Pinapple Juice', 50, 1, 50, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1', 0),
(170, 0, '305', 'Mutton Pepper Fry', 130, 1, 130, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', 0),
(171, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', 0),
(172, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', 0),
(173, 0, '395', 'Paneer Manchurian', 120, 1, 120, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', 0),
(174, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', 0),
(175, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', 0),
(176, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', 0),
(177, 0, '410', 'Mango Juice', 50, 1, 50, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', 0),
(178, 0, '411', 'Pinapple Juice', 50, 1, 50, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', 0),
(179, 0, '343', 'Clear Soup 1/2', 60, 3, 180, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1', 0),
(180, 0, '352', 'Butter Chicken Masala', 140, 3, 420, '2017-12-23', '18:52:36', 6, 1, 1, '8', 'A', 0),
(181, 0, '326', 'Nattu Koli Fry', 120, 1, 120, '2017-12-23', '18:58:32', 6, 1, 1, '77', '1', 0),
(182, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:58:32', 6, 1, 1, '77', '1', 0),
(183, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:58:32', 6, 1, 1, '77', '1', 0),
(184, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-23', '18:58:32', 6, 1, 1, '77', '1', 0),
(185, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '10:34:48', 6, 1, 1, '100', '1', 0),
(186, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '10:34:49', 6, 1, 1, '100', '1', 0),
(187, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:01:46', 6, 1, 1, '100', '1', 0),
(188, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:01:46', 6, 1, 1, '100', '1', 0),
(189, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:01:46', 6, 1, 1, '100', '1', 0),
(190, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:01:46', 6, 1, 1, '100', '1', 0),
(191, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:01:46', 6, 1, 1, '100', '1', 0),
(192, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:03:37', 6, 1, 1, '100', '1', 0),
(193, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:03:37', 6, 1, 1, '100', '1', 0),
(194, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:03:37', 6, 1, 1, '100', '1', 0),
(195, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:03:37', 6, 1, 1, '100', '1', 0),
(196, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:03:37', 6, 1, 1, '100', '1', 0),
(197, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:08:22', 6, 1, 1, '100', '1', 0),
(198, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:08:22', 6, 1, 1, '100', '1', 0),
(199, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:08:22', 6, 1, 1, '100', '1', 0),
(200, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:08:22', 6, 1, 1, '100', '1', 0),
(201, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:08:22', 6, 1, 1, '100', '1', 0),
(202, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', 0),
(203, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', 0),
(204, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', 0),
(205, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', 0),
(206, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', 0),
(207, 0, '', '', 0, 12, 0, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1', 0),
(208, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', 0),
(209, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', 0),
(210, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', 0),
(211, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', 0),
(212, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', 0),
(213, 0, '', '', 0, 14, 0, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1', 0),
(214, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', 0),
(215, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', 0),
(216, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', 0),
(217, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', 0),
(218, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', 0),
(219, 0, '', '', 0, 16, 0, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1', 0),
(220, 0, '', '', 0, 4, 0, '2017-12-26', '13:21:09', 6, 1, 1, '77', '1', 0),
(221, 0, '', '', 0, 4, 0, '2017-12-26', '13:22:54', 6, 1, 1, '77', '1', 0),
(222, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '13:22:54', 6, 1, 1, '77', '1', 0),
(223, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:22:54', 6, 1, 1, '77', '1', 0),
(224, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:22:54', 6, 1, 1, '77', '1', 0),
(225, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B', 0),
(226, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B', 0),
(227, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B', 0),
(228, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B', 0),
(229, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B', 0),
(230, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B', 0),
(231, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B', 0),
(232, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B', 0),
(233, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B', 0),
(234, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', 0),
(235, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', 0),
(236, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', 0),
(237, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', 0),
(238, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', 0),
(239, 0, '314', 'Para Fish Fry', 80, 1, 80, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', 0),
(240, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', 0),
(241, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B', 0),
(242, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', 0),
(243, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', 0),
(244, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', 0),
(245, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', 0),
(246, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', 0),
(247, 0, '314', 'Para Fish Fry', 80, 1, 80, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', 0),
(248, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', 0),
(249, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', 0),
(250, 0, '381', 'Tandoori Kaadai', 120, 1, 120, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', 0),
(251, 0, '380', 'Chicken Tikka', 120, 1, 120, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', 0),
(252, 0, '379', 'Pudina Tikka', 120, 1, 120, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B', 0),
(253, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(254, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(255, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(256, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(257, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(258, 0, '314', 'Para Fish Fry', 80, 1, 80, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(259, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(260, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(261, 0, '381', 'Tandoori Kaadai', 120, 1, 120, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(262, 0, '380', 'Chicken Tikka', 120, 1, 120, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(263, 0, '379', 'Pudina Tikka', 120, 1, 120, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(264, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(265, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B', 0),
(266, 0, '335', 'Nattu Koli Soup 1/2', 70, 1, 70, '2017-12-26', '13:33:15', 6, 1, 1, '2', 'B', 0),
(267, 0, '336', 'Mutton Chettinadu soup', 50, 1, 50, '2017-12-26', '13:33:15', 6, 1, 1, '2', 'B', 0),
(268, 0, '337', 'Mutton Chetti soup 1/2', 60, 1, 60, '2017-12-26', '13:33:15', 6, 1, 1, '2', 'B', 0),
(269, 0, '335', 'Nattu Koli Soup 1/2', 70, 1, 70, '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B', 0),
(270, 0, '336', 'Mutton Chettinadu soup', 50, 1, 50, '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B', 0),
(271, 0, '337', 'Mutton Chetti soup 1/2', 60, 1, 60, '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B', 0),
(272, 0, '313', 'Kaadai Tandoori', 120, 2, 240, '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B', 0),
(273, 0, '335', 'Nattu Koli Soup 1/2', 70, 1, 70, '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B', 0),
(274, 0, '336', 'Mutton Chettinadu soup', 50, 1, 50, '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B', 0),
(275, 0, '337', 'Mutton Chetti soup 1/2', 60, 1, 60, '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B', 0),
(276, 0, '313', 'Kaadai Tandoori', 120, 2, 240, '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B', 0),
(277, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B', 0),
(278, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:41:24', 6, 1, 1, '2', 'A', 0),
(279, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:41:32', 6, 1, 1, '2', 'A', 0),
(280, 0, '316', 'Barbic Full Fish 1kg', 350, 2, 700, '2017-12-26', '13:41:32', 6, 1, 1, '2', 'A', 0),
(281, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:41:40', 6, 1, 1, '2', 'A', 0),
(282, 0, '316', 'Barbic Full Fish 1kg', 350, 2, 700, '2017-12-26', '13:41:40', 6, 1, 1, '2', 'A', 0),
(283, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-26', '13:41:40', 6, 1, 1, '2', 'A', 0),
(284, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A', 0),
(285, 0, '316', 'Barbic Full Fish 1kg', 350, 2, 700, '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A', 0),
(286, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A', 0),
(287, 0, '333', 'Lolly Pop 4 pics', 120, 2, 240, '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A', 0),
(288, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A', 0),
(289, 0, '316', 'Barbic Full Fish 1kg', 350, 2, 700, '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A', 0),
(290, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A', 0),
(291, 0, '333', 'Lolly Pop 4 pics', 120, 2, 240, '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A', 0),
(292, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A', 0),
(293, 0, '316', 'Barbic Full Fish 1kg', 350, 2, 700, '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A', 0),
(294, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A', 0),
(295, 0, '333', 'Lolly Pop 4 pics', 120, 2, 240, '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A', 0),
(296, 0, '1', 'Rotti', 20, 4, 80, '2017-12-26', '13:50:24', 6, 1, 1, '222', '1', 0),
(297, 0, '1', 'Rotti', 20, 4, 80, '2017-12-26', '13:52:42', 6, 1, 1, '222', '1', 0),
(298, 0, '435', '700 Combo', 700, 1, 700, '2017-12-26', '13:52:42', 6, 1, 1, '222', '1', 0),
(299, 0, '436', '500  Combo', 500, 1, 500, '2017-12-26', '13:52:42', 6, 1, 1, '222', '1', 0),
(300, 0, '1', 'Rotti', 20, 4, 80, '2017-12-26', '14:20:57', 6, 1, 1, '222', '1', 0),
(301, 0, '435', '700 Combo', 700, 1, 700, '2017-12-26', '14:20:57', 6, 1, 1, '222', '1', 0),
(302, 0, '436', '500  Combo', 500, 1, 500, '2017-12-26', '14:20:57', 6, 1, 1, '222', '1', 0),
(303, 0, '1', 'Rotti', 20, 4, 80, '2017-12-26', '14:21:42', 6, 1, 1, '222', '1', 0),
(304, 0, '435', '700 Combo', 700, 1, 700, '2017-12-26', '14:21:42', 6, 1, 1, '222', '1', 0),
(305, 0, '436', '500  Combo', 500, 1, 500, '2017-12-26', '14:21:42', 6, 1, 1, '222', '1', 0),
(306, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-26', '14:21:42', 6, 1, 1, '222', '1', 0),
(307, 0, '3', ' Naan', 25, 1, 25, '2017-12-26', '14:25:01', 6, 1, 1, '6', 'A', 0),
(308, 0, '4', 'Butter Naan', 35, 1, 35, '2017-12-26', '14:25:01', 6, 1, 1, '6', 'A', 0),
(309, 0, '5', 'Plain Kulcha', 30, 1, 30, '2017-12-26', '14:25:01', 6, 1, 1, '6', 'A', 0),
(310, 0, '3', ' Naan', 25, 1, 25, '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A', 0),
(311, 0, '4', 'Butter Naan', 35, 1, 35, '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A', 0),
(312, 0, '5', 'Plain Kulcha', 30, 1, 30, '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A', 0),
(313, 0, '325', 'Plain Briyani', 90, 1, 90, '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A', 0),
(314, 0, '324', 'Nikka Chicken Briyani', 110, 1, 110, '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A', 0),
(315, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-26', '14:42:04', 6, 1, 1, '100', '1', 0),
(316, 0, '304', 'Mutton Raan', 1200, 4, 4800, '2017-12-26', '14:42:04', 6, 1, 1, '100', '1', 0),
(317, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-26', '14:42:20', 6, 1, 1, '100', '1', 0),
(318, 0, '304', 'Mutton Raan', 1200, 4, 4800, '2017-12-26', '14:42:20', 6, 1, 1, '100', '1', 0),
(319, 0, '317', 'Barbic Full Fish 1.5 Kg', 450, 1, 450, '2017-12-26', '14:42:20', 6, 1, 1, '100', '1', 0),
(320, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-26', '14:42:20', 6, 1, 1, '100', '1', 0),
(321, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', 0),
(322, 0, '362', '20*20', 120, 2, 240, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', 0),
(323, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', 0),
(324, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', 0),
(325, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', 0),
(326, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A', 0),
(327, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', 0),
(328, 0, '362', '20*20', 120, 2, 240, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', 0),
(329, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', 0),
(330, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', 0),
(331, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', 0),
(332, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A', 0),
(333, 0, '2', 'Butter Rotti', 25, 2, 50, '2017-12-26', '16:39:26', 6, 1, 1, '9', 'A', 0),
(334, 0, '2', 'Butter Rotti', 25, 2, 50, '2017-12-26', '16:39:28', 6, 1, 1, '9', 'A', 0),
(335, 0, '2', 'Butter Rotti', 25, 2, 50, '2017-12-26', '16:39:34', 6, 1, 1, '9', 'A', 0),
(336, 0, '1', 'Rotti', 20, 1, 20, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', 0),
(337, 0, '301', 'Special Shawarma', 120, 2, 240, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', 0),
(338, 0, '2', 'Butter Rotti', 25, 2, 50, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', 0),
(339, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', 0),
(340, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', 0),
(341, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', 0),
(342, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A', 0),
(343, 0, '347', 'Kerala Chicken gravy', 130, 2, 260, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', 0),
(344, 0, '348', 'Andra Chicken gravy', 130, 2, 260, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', 0),
(345, 0, '349', 'Kaadai Chicken gravy', 140, 2, 280, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', 0),
(346, 0, '307', 'Mutton Gravy', 130, 4, 520, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', 0),
(347, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', 0),
(348, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A', 0),
(349, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A', 0),
(350, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A', 0),
(351, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A', 0),
(352, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A', 0),
(353, 0, '327', 'Nattu Koli Varutha Kari', 130, 2, 260, '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A', 0),
(354, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', 0),
(355, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', 0),
(356, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', 0),
(357, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', 0),
(358, 0, '327', 'Nattu Koli Varutha Kari', 130, 2, 260, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', 0),
(359, 0, '317', 'Barbic Full Fish 1.5 Kg', 450, 1, 450, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', 0),
(360, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A', 0),
(361, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '19:01:44', 6, 1, 1, '222', '1', 0),
(362, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '19:01:44', 6, 1, 1, '222', '1', 0),
(363, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-26', '19:01:44', 6, 1, 1, '222', '1', 0),
(364, 0, '304', 'Mutton Raan', 1200, 3, 3600, '2017-12-26', '19:01:44', 6, 1, 1, '222', '1', 0),
(365, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '09:57:15', 6, 1, 1, '333', '1', 0),
(366, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '09:57:15', 6, 1, 1, '333', '1', 0),
(367, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B', 0),
(368, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B', 0),
(369, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B', 0),
(370, 0, '427', 'Extra', 10, 2, 20, '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B', 0),
(371, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B', 0),
(372, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B', 0),
(373, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B', 0),
(374, 0, '427', 'Extra', 10, 2, 20, '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B', 0),
(375, 0, '2', 'Butter Rotti', 25, 1, 25, '2017-12-27', '10:19:36', 6, 1, 1, '1', 'A', 0),
(376, 0, '3', ' Naan', 25, 1, 25, '2017-12-27', '10:19:36', 6, 1, 1, '1', 'A', 0),
(377, 0, '4', 'Butter Naan', 35, 1, 35, '2017-12-27', '10:19:36', 6, 1, 1, '1', 'A', 0),
(378, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:32:16', 6, 1, 1, '4', 'B', 0),
(379, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:32:16', 6, 1, 1, '4', 'B', 0),
(380, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:32:16', 6, 1, 1, '4', 'B', 0),
(381, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:33:26', 6, 1, 1, '1', 'A', 0),
(382, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:33:26', 6, 1, 1, '1', 'A', 0),
(383, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-27', '10:34:44', 6, 1, 1, '1', 'A', 0),
(384, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-27', '10:34:44', 6, 1, 1, '1', 'A', 0),
(385, 0, '4', 'Butter Naan', 35, 2, 70, '2017-12-27', '10:38:04', 6, 1, 1, '1', 'A', 0),
(386, 0, '3', ' Naan', 25, 1, 25, '2017-12-27', '10:38:04', 6, 1, 1, '1', 'A', 0),
(387, 0, '5', 'Plain Kulcha', 30, 1, 30, '2017-12-27', '10:38:04', 6, 1, 1, '1', 'A', 0),
(388, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', 0),
(389, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', 0),
(390, 0, '304', 'Mutton Raan', 1200, 3, 3600, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', 0),
(391, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', 0),
(392, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', 0),
(393, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', 0),
(394, 0, '337', 'Mutton Chetti soup 1/2', 60, 1, 60, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', 0),
(395, 0, '338', 'Chicken Chettinadu Soup', 50, 1, 50, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A', 0),
(396, 0, '394', 'Paneer Pepper Fry', 120, 1, 120, '2017-12-27', '10:39:26', 6, 1, 1, '7', 'A', 0),
(397, 0, '395', 'Paneer Manchurian', 120, 1, 120, '2017-12-27', '10:39:26', 6, 1, 1, '7', 'A', 0),
(398, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A', 0),
(399, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A', 0),
(400, 0, '367', 'Pepper Grill Half', 140, 1, 140, '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A', 0),
(401, 0, '368', 'Lemon Grill Full', 280, 1, 280, '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A', 0),
(402, 0, '369', 'Lemon grill Half', 150, 1, 150, '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A', 0),
(403, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:45:14', 6, 1, 1, '1', 'B', 0),
(404, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:45:14', 6, 1, 1, '1', 'B', 0),
(405, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:45:14', 6, 1, 1, '1', 'B', 0),
(406, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-27', '10:45:56', 6, 1, 1, '99', '1', 0),
(407, 0, '331', 'Boneless 65', 100, 2, 200, '2017-12-27', '10:45:56', 6, 1, 1, '99', '1', 0),
(408, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-27', '10:45:56', 6, 1, 1, '99', '1', 0),
(409, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:53:04', 6, 1, 1, '99', '1', 0),
(410, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:53:04', 6, 1, 1, '99', '1', 0),
(411, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:54:20', 6, 1, 1, '444', '1', 0),
(412, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:54:20', 6, 1, 1, '444', '1', 0),
(413, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:54:20', 6, 1, 1, '444', '1', 0),
(414, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:57:23', 6, 1, 1, '99', '1', 0),
(415, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:57:23', 6, 1, 1, '99', '1', 0),
(416, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-27', '10:57:23', 6, 1, 1, '99', '1', 0),
(417, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-27', '10:57:23', 6, 1, 1, '99', '1', 0),
(418, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '11:01:11', 6, 1, 1, '1', 'A', 0),
(419, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '11:01:11', 6, 1, 1, '1', 'A', 0),
(420, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '11:01:11', 6, 1, 1, '1', 'A', 0),
(421, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '11:02:51', 6, 1, 1, '1', 'A', 0),
(422, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '11:02:51', 6, 1, 1, '1', 'A', 0),
(423, 0, '427', 'Extra', 10, 1, 10, '2017-12-27', '11:02:51', 6, 1, 1, '1', 'A', 0),
(424, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A', 0),
(425, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A', 0),
(426, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A', 0),
(427, 0, '354', 'Tangri Masala', 130, 1, 130, '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A', 0),
(428, 0, '355', 'Half Grill Punjabi Masala', 180, 1, 180, '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A', 0),
(429, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', 0),
(430, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', 0),
(431, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', 0),
(432, 0, '354', 'Tangri Masala', 130, 1, 130, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', 0),
(433, 0, '355', 'Half Grill Punjabi Masala', 180, 1, 180, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', 0),
(434, 0, '420', 'Black Current', 70, 1, 70, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', 0),
(435, 0, '421', 'Butter Scotch', 70, 1, 70, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A', 0),
(436, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-27', '13:18:30', 6, 1, 1, '3', 'B', 0),
(437, 0, '308', 'Mutton pepper Masala', 140, 1, 140, '2017-12-27', '13:18:30', 6, 1, 1, '3', 'B', 0),
(438, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-27', '13:18:30', 6, 1, 1, '3', 'B', 0),
(439, 0, '357', 'Hot Peeper', 120, 1, 120, '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B', 0),
(440, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B', 0),
(441, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B', 0),
(442, 0, '325', 'Plain Briyani', 90, 1, 90, '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B', 0),
(443, 0, '422', 'water 1 lit', 20, 1, 20, '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B', 0),
(444, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '16:38:31', 6, 1, 1, '5', 'A', 0),
(445, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '16:38:31', 6, 1, 1, '5', 'A', 0),
(446, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-27', '16:38:31', 6, 1, 1, '5', 'A', 0),
(447, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-29', '11:18:13', 6, 1, 1, '7', 'B', 0),
(448, 0, '3', ' Naan', 25, 1, 25, '2017-12-29', '11:18:25', 6, 1, 1, '10', 'A', 0),
(449, 0, '3', ' Naan', 25, 1, 25, '2017-12-29', '11:18:25', 6, 1, 1, '10', 'A', 0),
(450, 0, '3', ' Naan', 25, 1, 25, '2017-12-29', '11:18:40', 6, 1, 1, '9', 'A', 0),
(451, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-29', '13:47:26', 6, 1, 1, '2', 'B', 0),
(452, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-29', '13:47:26', 6, 1, 1, '2', 'B', 0),
(453, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A', 0),
(454, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A', 0),
(455, 0, '308', 'Mutton pepper Masala', 140, 1, 140, '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A', 0),
(456, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A', 0),
(457, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A', 0),
(458, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A', 0),
(459, 0, '347', 'Kerala Chicken gravy', 130, 1, 130, '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A', 0),
(460, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A', 0),
(461, 0, '348', 'Andra Chicken gravy', 130, 3, 390, '2017-12-29', '17:06:58', 6, 1, 1, '5', 'B', 0),
(462, 0, '360', 'Chinese pepper Ckn dray', 120, 1, 120, '2017-12-29', '17:06:58', 6, 1, 1, '5', 'B', 0),
(463, 0, '346', 'Pepper Chicken Masala', 140, 1, 140, '2017-12-29', '17:06:58', 6, 1, 1, '5', 'B', 0),
(464, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', 0),
(465, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', 0),
(466, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', 0),
(467, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', 0),
(468, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', 0),
(469, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', 0),
(470, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', 0),
(471, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B', 0),
(472, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-29', '17:09:31', 6, 1, 1, '6', 'B', 0),
(473, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-29', '17:09:31', 6, 1, 1, '6', 'B', 0),
(474, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:09:31', 6, 1, 1, '6', 'B', 0),
(475, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B', 0),
(476, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B', 0),
(477, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B', 0),
(478, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B', 0),
(479, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B', 0),
(480, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:14:41', 6, 1, 1, '6', 'B', 0),
(481, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-29', '17:14:41', 6, 1, 1, '6', 'B', 0),
(482, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-29', '17:14:41', 6, 1, 1, '6', 'B', 0),
(483, 0, '1', 'Rotti', 20, 1, 20, '2017-12-29', '17:17:07', 6, 1, 1, '1', 'A', 0),
(484, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-29', '17:17:07', 6, 1, 1, '1', 'A', 0),
(485, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:17:07', 6, 1, 1, '1', 'A', 0),
(486, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', 0),
(487, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', 0),
(488, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', 0),
(489, 0, '347', 'Kerala Chicken gravy', 130, 1, 130, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', 0),
(490, 0, '308', 'Mutton pepper Masala', 140, 1, 140, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', 0),
(491, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', 0),
(492, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A', 0),
(493, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-30', '13:05:54', 6, 1, 1, '6', 'A', 0),
(494, 0, '346', 'Pepper Chicken Masala', 140, 1, 140, '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A', 0),
(495, 0, '347', 'Kerala Chicken gravy', 130, 1, 130, '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A', 0),
(496, 0, '361', 'Szechuan Chicken dray', 120, 1, 120, '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A', 0),
(497, 0, '370', 'Grill Pepper Fry Full', 280, 1, 280, '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A', 0),
(498, 0, '371', 'Grill Pepper Fry Half', 150, 1, 150, '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A', 0),
(499, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '13:07:22', 6, 1, 1, '3', 'A', 0),
(500, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-30', '13:07:22', 6, 1, 1, '3', 'A', 0),
(501, 0, '346', 'Pepper Chicken Masala', 140, 1, 140, '2017-12-30', '13:07:22', 6, 1, 1, '3', 'A', 0),
(502, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '13:11:25', 6, 1, 1, '3', 'A', 0),
(503, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-30', '13:11:25', 6, 1, 1, '3', 'A', 0),
(504, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', 0),
(505, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', 0),
(506, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', 0),
(507, 0, '359', 'chik Manchurian dray', 120, 1, 120, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', 0),
(508, 0, '337', 'Mutton Chetti soup 1/2', 60, 1, 60, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', 0),
(509, 0, '320', 'Hyderabad Fish Briyani', 150, 2, 300, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', 0),
(510, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B', 0),
(511, 0, '365', 'Garlic Chicken dray', 120, 1, 120, '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B', 0),
(512, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B', 0),
(513, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B', 0),
(514, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B', 0),
(515, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B', 0),
(516, 0, '347', 'Kerala Chicken gravy', 130, 1, 130, '2017-12-30', '13:52:59', 6, 1, 1, '3', 'A', 0),
(517, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', 0),
(518, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', 0),
(519, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', 0),
(520, 0, '308', 'Mutton pepper Masala', 140, 1, 140, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', 0),
(521, 0, '320', 'Hyderabad Fish Briyani', 150, 2, 300, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', 0),
(522, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A', 0),
(523, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A', 0),
(524, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A', 0),
(525, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A', 0),
(526, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A', 0),
(527, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-30', '14:57:00', 6, 1, 1, '3', 'A', 0),
(528, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-30', '14:57:00', 6, 1, 1, '3', 'A', 0),
(529, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-30', '14:57:31', 6, 1, 1, '4', 'A', 0),
(530, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-30', '14:58:19', 6, 1, 1, '5', 'A', 0),
(531, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '14:58:19', 6, 1, 1, '5', 'A', 0),
(532, 0, '329', 'Nattu Koli Masala', 140, 3, 420, '2017-12-30', '14:58:19', 6, 1, 1, '5', 'A', 0),
(533, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A', 0),
(534, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A', 0),
(535, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A', 0),
(536, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A', 0),
(537, 0, '347', 'Kerala Chicken gravy', 130, 3, 390, '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A', 0),
(538, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A', 0),
(539, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A', 0),
(540, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A', 0),
(541, 0, '307', 'Mutton Gravy', 130, 3, 390, '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A', 0),
(542, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A', 0),
(543, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', 0),
(544, 0, '320', 'Hyderabad Fish Briyani', 150, 2, 300, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', 0),
(545, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', 0),
(546, 0, '306', 'Mutton Chukka', 130, 2, 260, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', 0),
(547, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', 0),
(548, 0, '347', 'Kerala Chicken gravy', 130, 2, 260, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', 0),
(549, 0, '365', 'Garlic Chicken dray', 120, 2, 240, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', 0),
(550, 0, '428', 'Chettinadu Chicken dray', 120, 1, 120, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B', 0),
(551, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A', 0),
(552, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A', 0),
(553, 0, '314', 'Para Fish Fry', 80, 1, 80, '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A', 0),
(554, 0, '317', 'Barbic Full Fish 1.5 Kg', 450, 3, 1350, '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A', 0),
(555, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-30', '15:27:37', 6, 1, 1, '4', 'A', 0),
(556, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '15:27:37', 6, 1, 1, '4', 'A', 0),
(557, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-30', '15:27:37', 6, 1, 1, '4', 'A', 0),
(558, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-30', '15:29:21', 6, 1, 1, '4', 'A', 0),
(559, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '15:29:21', 6, 1, 1, '4', 'A', 0),
(560, 0, '301', 'Special Shawarma', 120, 2, 240, '2017-12-30', '15:41:41', 6, 1, 1, '4', 'B', 0),
(561, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-30', '15:41:41', 6, 1, 1, '4', 'B', 0),
(562, 0, '301', 'Special Shawarma', 120, 5, 600, '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B', 0),
(563, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B', 0),
(564, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B', 0),
(565, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B', 0),
(566, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-30', '15:47:23', 6, 1, 1, '6', 'B', 0),
(567, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-30', '15:47:23', 6, 1, 1, '6', 'B', 0),
(568, 0, '320', 'Hyderabad Fish Briyani', 150, 2, 300, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', 0),
(569, 0, '321', 'Nikka Mutton Briyani', 140, 2, 280, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', 0),
(570, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', 0),
(571, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', 0),
(572, 0, '326', 'Nattu Koli Fry', 120, 1, 120, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', 0),
(573, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B', 0),
(574, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', 0),
(575, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', 0),
(576, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', 0),
(577, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', 0);
INSERT INTO `kop_bill_print` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`, `kop_bill_status`) VALUES
(578, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', 0),
(579, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', 0),
(580, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', 0),
(581, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B', 0),
(582, 0, '409', 'Apple Juice', 60, 1, 60, '2017-12-30', '16:05:56', 6, 1, 1, '4', 'B', 0),
(583, 0, '410', 'Mango Juice', 50, 1, 50, '2017-12-30', '16:05:56', 6, 1, 1, '4', 'B', 0),
(584, 0, '411', 'Pinapple Juice', 50, 1, 50, '2017-12-30', '16:05:56', 6, 1, 1, '4', 'B', 0),
(585, 0, '319', 'Hyderabad Chicken Briyani', 150, 3, 450, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', 0),
(586, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', 0),
(587, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', 0),
(588, 0, '321', 'Nikka Mutton Briyani', 140, 2, 280, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', 0),
(589, 0, '418', 'Strawberry', 70, 1, 70, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', 0),
(590, 0, '419', 'Mango mil', 70, 2, 140, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', 0),
(591, 0, '312', 'Kaadai Gravy', 130, 2, 260, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A', 0),
(592, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '16:11:36', 6, 1, 1, '7', 'B', 0),
(593, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-30', '16:11:36', 6, 1, 1, '7', 'B', 0),
(594, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-30', '16:11:36', 6, 1, 1, '7', 'B', 0),
(595, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B', 0),
(596, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B', 0),
(597, 0, '326', 'Nattu Koli Fry', 120, 1, 120, '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B', 0),
(598, 0, '327', 'Nattu Koli Varutha Kari', 130, 2, 260, '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B', 0),
(599, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', 0),
(600, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', 0),
(601, 0, '314', 'Para Fish Fry', 80, 1, 80, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', 0),
(602, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', 0),
(603, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', 0),
(604, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', 0),
(605, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', 0),
(606, 0, '321', 'Nikka Mutton Briyani', 140, 2, 280, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B', 0),
(607, 0, '333', 'Lolly Pop 4 pics', 120, 2, 240, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', 0),
(608, 0, '332', 'Leg Piece 2 pic', 100, 2, 200, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', 0),
(609, 0, '331', 'Boneless 65', 100, 2, 200, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', 0),
(610, 0, '330', 'Chicken 65', 70, 2, 140, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', 0),
(611, 0, '350', 'Nilagiris nChicken Masala', 140, 4, 560, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', 0),
(612, 0, '349', 'Kaadai Chicken gravy', 140, 2, 280, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', 0),
(613, 0, '348', 'Andra Chicken gravy', 130, 3, 390, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B', 0),
(614, 0, '333', 'Lolly Pop 4 pics', 120, 2, 240, '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A', 0),
(615, 0, '332', 'Leg Piece 2 pic', 100, 2, 200, '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A', 0),
(616, 0, '331', 'Boneless 65', 100, 3, 300, '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A', 0),
(617, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A', 0),
(618, 0, '307', 'Mutton Gravy', 130, 3, 390, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(619, 0, '308', 'Mutton pepper Masala', 140, 1, 140, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(620, 0, '334', 'Nattu koli Soup', 60, 2, 120, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(621, 0, '342', 'Clear Soup', 50, 2, 100, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(622, 0, '372', 'Tandoori Full', 260, 2, 520, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(623, 0, '373', 'Tandoori Half', 140, 2, 280, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(624, 0, '405', 'Veg Rice ', 80, 1, 80, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(625, 0, '423', 'Egg noodles', 90, 2, 180, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(626, 0, '402', 'Chicken Rice ', 100, 2, 200, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(627, 0, '401', 'Egg Rice ', 90, 2, 180, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(628, 0, '424', 'Chicken noodles', 100, 1, 100, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(629, 0, '425', 'Szechuan noodles', 110, 1, 110, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(630, 0, '426', 'vag noodles', 80, 1, 80, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A', 0),
(631, 0, '307', 'Mutton Gravy', 130, 3, 390, '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A', 0),
(632, 0, '306', 'Mutton Chukka', 130, 2, 260, '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A', 0),
(633, 0, '347', 'Kerala Chicken gravy', 130, 2, 260, '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A', 0),
(634, 0, '337', 'Mutton Chetti soup 1/2', 60, 2, 120, '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A', 0),
(635, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A', 0),
(636, 0, '301', 'Special Shawarma', 120, 2, 240, '2018-01-02', '10:57:36', 6, 1, 1, '10', 'A', 0),
(637, 0, '302', 'Special Shawarma 1/2', 120, 5, 600, '2018-01-02', '10:57:36', 6, 1, 1, '10', 'A', 0),
(638, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A', 0),
(639, 0, '321', 'Nikka Mutton Briyani', 140, 3, 420, '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A', 0),
(640, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A', 0),
(641, 0, '323', 'Nattu Koli Briyani', 140, 1, 140, '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A', 0),
(642, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', 0),
(643, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', 0),
(644, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', 0),
(645, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', 0),
(646, 0, '321', 'Nikka Mutton Briyani', 140, 2, 280, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', 0),
(647, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B', 0),
(648, 0, '302', 'Special Shawarma 1/2', 120, 3, 360, '2018-01-02', '11:50:50', 6, 1, 1, '1', 'B', 0),
(649, 0, '301', 'Special Shawarma', 120, 2, 240, '2018-01-02', '11:50:50', 6, 1, 1, '1', 'B', 0),
(650, 0, '383', 'Butter Rotti', 30, 1, 30, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', 0),
(651, 0, '384', 'Naan', 25, 1, 25, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', 0),
(652, 0, '385', 'Butter Naan', 35, 1, 35, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', 0),
(653, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', 0),
(654, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', 0),
(655, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', 0),
(656, 0, '304', 'Mutton Raan', 1200, 2, 2400, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A', 0),
(657, 0, '301', 'Special Shawarma', 120, 1, 120, '2018-01-02', '11:55:00', 6, 1, 1, '6', 'A', 0),
(658, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2018-01-02', '11:55:00', 6, 1, 1, '6', 'A', 0),
(659, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A', 0),
(660, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A', 0),
(661, 0, '327', 'Nattu Koli Varutha Kari', 130, 3, 390, '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A', 0),
(662, 0, '326', 'Nattu Koli Fry', 120, 1, 120, '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A', 0),
(663, 0, '328', 'Nattu Koli Kulambu', 130, 11, 1430, '2018-01-02', '19:10:35', 6, 1, 1, '9', 'A', 0),
(664, 0, '315', 'Vanjaram Fry', 140, 2, 280, '2018-01-02', '19:10:35', 6, 1, 1, '9', 'A', 0),
(665, 0, '1', 'Rotti', 20, 1, 20, '2018-01-02', '19:51:12', 6, 1, 1, '9', 'A', 0),
(666, 0, '2', 'Butter Rotti', 25, 5, 125, '2018-01-02', '19:51:12', 6, 1, 1, '9', 'A', 0),
(667, 0, '3', ' Naan', 25, 1, 25, '2018-01-02', '19:51:12', 6, 1, 1, '9', 'A', 0),
(668, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B', 0),
(669, 0, '301', 'Special Shawarma', 120, 1, 120, '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B', 0),
(670, 0, '303', 'Plate Shawarma', 130, 1, 130, '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B', 0),
(671, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B', 0),
(672, 0, '301', 'Special Shawarma', 120, 3, 360, '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A', 0),
(673, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A', 0),
(674, 0, '303', 'Plate Shawarma', 130, 2, 260, '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A', 0),
(675, 0, '321', 'Nikka Mutton Briyani', 140, 2, 280, '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A', 0),
(676, 0, '320', 'Hyderabad Fish Briyani', 150, 3, 450, '2018-01-03', '17:23:08', 6, 1, 1, '5', 'B', 0),
(677, 0, '321', 'Nikka Mutton Briyani', 140, 3, 420, '2018-01-03', '17:23:08', 6, 1, 1, '5', 'B', 0),
(678, 0, '3', ' Naan', 25, 2, 50, '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', 0),
(679, 0, '4', 'Butter Naan', 35, 2, 70, '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', 0),
(680, 0, '322', 'Kaadai Briyani', 140, 2, 280, '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', 0),
(681, 0, '349', 'Kaadai Chicken gravy', 140, 2, 280, '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', 0),
(682, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', 0),
(683, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', 0),
(684, 0, '309', 'Kaadai Oil Fry', 100, 2, 200, '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', 0),
(685, 0, '312', 'Kaadai Gravy', 130, 2, 260, '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', 0),
(686, 0, '313', 'Kaadai Tandoori', 120, 2, 240, '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', 0),
(687, 0, '309', 'Kaadai Oil Fry', 100, 2, 200, '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A', 0),
(688, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A', 0),
(689, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A', 0),
(690, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', 0),
(691, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', 0),
(692, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', 0),
(693, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', 0),
(694, 0, '301', 'Special Shawarma', 120, 1, 120, '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', 0),
(695, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', 0),
(696, 0, '303', 'Plate Shawarma', 130, 1, 130, '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', 0),
(697, 0, '304', 'Mutton Raan', 1200, 2, 2400, '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_det`
--

CREATE TABLE IF NOT EXISTS `login_det` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` varchar(20) NOT NULL,
  `dates` varchar(500) NOT NULL,
  `times` varchar(500) NOT NULL,
  `log_ip` varchar(500) NOT NULL,
  `privillage` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `login_det`
--

INSERT INTO `login_det` (`lid`, `eid`, `dates`, `times`, `log_ip`, `privillage`, `status`) VALUES
(1, '1', '2017-12-01', '17:12:12', '192.168.1.13', 1, 0),
(2, '1', '2017-12-01', '17:15:10', '192.168.1.13', 1, 0),
(3, '1', '2017-12-01', '17:58:32', '192.168.1.13', 1, 0),
(4, '1', '2017-12-04', '11:29:52', '192.168.1.2', 1, 0),
(5, '1', '2017-12-04', '12:05:04', '192.168.1.2', 1, 0),
(6, '1', '2017-12-04', '12:29:58', '192.168.1.2', 1, 0),
(7, '1', '2017-12-04', '12:40:58', '192.168.1.2', 1, 0),
(8, '1', '2017-12-04', '13:30:41', '192.168.1.2', 1, 0),
(9, '1', '2017-12-04', '13:31:05', '192.168.1.2', 1, 0),
(10, '1', '2017-12-05', '11:32:06', '192.168.1.2', 1, 0),
(11, '1', '2017-12-05', '11:42:43', '192.168.1.2', 1, 0),
(12, '1', '2017-12-05', '11:50:32', '192.168.1.2', 1, 0),
(13, '1', '2017-12-05', '11:52:13', '192.168.1.2', 1, 0),
(14, '1', '2017-12-05', '12:33:28', '192.168.1.2', 1, 0),
(15, '1', '2017-12-05', '12:47:59', '192.168.1.2', 1, 0),
(16, '1', '2017-12-05', '12:49:40', '192.168.1.2', 1, 0),
(17, '1', '2017-12-05', '13:00:15', '192.168.1.2', 1, 0),
(18, '1', '2017-12-05', '13:17:21', '192.168.1.2', 1, 0),
(19, '1', '2017-12-05', '18:47:52', '192.168.1.2', 1, 0),
(20, '1', '2017-12-05', '19:55:42', '192.168.1.2', 1, 0),
(21, '1', '2017-12-06', '12:07:23', '192.168.1.2', 1, 0),
(22, '1', '2017-12-06', '12:08:53', '192.168.1.2', 1, 0),
(23, '1', '2017-12-06', '13:00:45', '192.168.1.2', 1, 0),
(24, '1', '2017-12-06', '13:18:21', '192.168.1.2', 1, 0),
(25, '1', '2017-12-06', '13:21:23', '192.168.1.2', 1, 0),
(26, '1', '2017-12-06', '13:59:51', '192.168.1.2', 1, 0),
(27, '1', '2017-12-06', '14:26:38', '192.168.1.2', 1, 0),
(28, '1', '2017-12-06', '14:39:52', '192.168.1.2', 1, 0),
(29, '1', '2017-12-06', '14:52:28', '192.168.1.2', 1, 0),
(30, '1', '2017-12-06', '15:10:29', '192.168.1.2', 1, 0),
(31, '1', '2017-12-06', '15:36:32', '192.168.1.2', 1, 0),
(32, '1', '2017-12-06', '15:41:01', '192.168.1.2', 1, 1),
(33, '1', '2017-12-07', '10:45:57', '192.168.1.2', 1, 0),
(34, '1', '2017-12-07', '11:19:41', '192.168.1.2', 1, 0),
(35, '1', '2017-12-07', '11:39:59', '192.168.1.2', 1, 0),
(36, '1', '2017-12-07', '12:09:10', '192.168.1.2', 1, 0),
(37, '1', '2017-12-07', '12:10:56', '192.168.1.2', 1, 0),
(38, '1', '2017-12-07', '14:54:44', '192.168.1.2', 1, 0),
(39, '1', '2017-12-07', '14:56:39', '192.168.1.2', 1, 0),
(40, '1', '2017-12-07', '21:18:32', '192.168.1.2', 1, 0),
(41, '1', '2017-12-07', '22:49:47', '192.168.1.2', 1, 0),
(42, '1', '2017-12-08', '17:06:27', '192.168.1.2', 1, 0),
(43, '1', '2017-12-08', '17:52:19', '192.168.1.2', 1, 0),
(44, '1', '2017-12-08', '18:11:02', '192.168.1.2', 1, 0),
(45, '1', '2017-12-08', '19:00:12', '192.168.1.2', 1, 0),
(46, '1', '2017-12-08', '19:16:12', '192.168.1.2', 1, 0),
(47, '1', '2017-12-08', '19:41:53', '192.168.1.2', 1, 0),
(48, '1', '2017-12-08', '21:12:27', '192.168.1.2', 1, 0),
(49, '1', '2017-12-08', '22:37:17', '192.168.1.2', 1, 0),
(50, '1', '2017-12-08', '22:50:18', '192.168.1.2', 1, 0),
(51, '1', '2017-12-09', '11:05:59', '169.254.92.70', 1, 0),
(52, '1', '2017-12-09', '11:15:47', '169.254.92.70', 1, 0),
(53, '1', '2017-12-09', '12:34:42', '192.168.1.2', 1, 0),
(54, '1', '2017-12-09', '13:29:20', '192.168.1.2', 1, 0),
(55, '1', '2017-12-09', '18:26:26', '192.168.1.2', 1, 0),
(56, '1', '2017-12-09', '19:10:08', '192.168.1.2', 1, 0),
(57, '1', '2017-12-09', '19:18:03', '192.168.1.2', 1, 1),
(58, '1', '2017-12-10', '11:35:28', '192.168.1.2', 1, 0),
(59, '1', '2017-12-10', '11:38:11', '192.168.1.2', 1, 1),
(60, '1', '2017-12-11', '11:11:58', '192.168.1.2', 1, 0),
(61, '1', '2017-12-11', '11:41:31', '192.168.1.2', 1, 0),
(62, '1', '2017-12-11', '12:19:23', '192.168.1.2', 1, 0),
(63, '1', '2017-12-11', '12:31:35', '192.168.1.2', 1, 0),
(64, '1', '2017-12-11', '12:39:40', '192.168.1.2', 1, 0),
(65, '1', '2017-12-11', '15:50:17', '192.168.1.2', 1, 0),
(66, '1', '2017-12-12', '11:25:37', '192.168.1.2', 1, 0),
(67, '1', '2017-12-12', '12:53:31', '192.168.1.2', 1, 0),
(68, '1', '2017-12-12', '12:59:09', '192.168.1.2', 1, 0),
(69, '1', '2017-12-12', '13:42:08', '192.168.1.2', 1, 0),
(70, '1', '2017-12-12', '20:45:10', '192.168.1.2', 1, 0),
(71, '1', '2017-12-13', '11:58:57', '192.168.1.2', 1, 0),
(72, '1', '2017-12-13', '19:48:32', '192.168.1.2', 1, 0),
(73, '1', '2017-12-13', '21:42:50', '192.168.1.2', 1, 0),
(74, '1', '2017-12-14', '11:20:52', '192.168.1.2', 1, 0),
(75, '1', '2017-12-14', '14:25:09', '192.168.1.2', 1, 0),
(76, '1', '2017-12-14', '14:35:52', '192.168.1.2', 1, 0),
(77, '1', '2017-12-14', '21:37:57', '192.168.1.2', 1, 0),
(78, '1', '2017-12-14', '23:00:39', '192.168.1.2', 1, 0),
(79, '1', '2017-12-14', '23:07:33', '192.168.1.2', 1, 0),
(80, '1', '2017-12-15', '17:55:00', '169.254.92.70', 1, 0),
(81, '1', '2017-12-15', '18:46:33', '192.168.1.2', 1, 1),
(82, '1', '2017-12-16', '11:19:00', '192.168.1.2', 1, 0),
(83, '1', '2017-12-16', '11:19:50', '192.168.1.2', 1, 0),
(84, '1', '2017-12-16', '13:42:05', '192.168.1.2', 1, 0),
(85, '1', '2017-12-16', '15:37:24', '192.168.1.101', 1, 0),
(86, '1', '2017-12-22', '18:03:52', '192.168.1.101', 1, 0),
(87, '1', '2018-01-02', '15:13:22', '192.168.1.106', 1, 0),
(88, '1', '2018-01-03', '13:38:52', '192.168.1.106', 1, 0),
(89, '1', '2018-01-03', '16:09:37', '192.168.1.106', 1, 0),
(90, '1', '2018-01-03', '16:22:23', '192.168.1.106', 1, 0),
(91, '1', '2018-01-04', '11:16:42', '192.168.1.106', 1, 0),
(92, '1', '2018-01-04', '12:12:26', '192.168.1.106', 1, 0),
(93, '1', '2018-01-04', '13:34:21', '192.168.1.106', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_reset`
--

CREATE TABLE IF NOT EXISTS `login_reset` (
  `lid` int(100) NOT NULL AUTO_INCREMENT,
  `eid` int(100) NOT NULL,
  `dates` varchar(1000) NOT NULL,
  `times` varchar(1000) NOT NULL,
  `logip` varchar(1000) NOT NULL,
  `mac` varchar(100) NOT NULL,
  `system_name` varchar(1000) NOT NULL,
  `privillage` varchar(1000) NOT NULL,
  `bill_clerk` varchar(1000) NOT NULL,
  `cashier` varchar(1000) NOT NULL,
  `trouble_shoot` varchar(1000) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `login_reset`
--

INSERT INTO `login_reset` (`lid`, `eid`, `dates`, `times`, `logip`, `mac`, `system_name`, `privillage`, `bill_clerk`, `cashier`, `trouble_shoot`) VALUES
(1, 1, '2017-12-09', '12:34:28', '192.168.1.2', '64006A11A25A', 'DESKTOP-S29JOA1', '1', '1', '1', '1'),
(2, 1, '2017-12-11', '11:40:45', '192.168.1.2', '64006A11A25A', 'DESKTOP-S29JOA1', '1', '1', '1', '1'),
(3, 1, '2017-12-13', '19:47:00', '192.168.1.2', '64006A11A25A', 'DESKTOP-S29JOA1', '1', '0', '0', '0'),
(4, 1, '2017-12-15', '18:41:13', '192.168.1.2', '64006A11A25A', 'DESKTOP-S29JOA1', '1', '0', '0', '0'),
(5, 1, '2017-12-15', '18:46:10', '192.168.1.2', '64006A11A25A', 'DESKTOP-S29JOA1', '1', '1', '1', '1'),
(6, 1, '2017-12-16', '11:54:15', '192.168.1.2', '64006A11A25A', 'DESKTOP-S29JOA1', '1', '1', '1', '1'),
(7, 1, '2017-12-16', '15:37:03', '192.168.1.101', '4C72B942E4E1', 'CHANDRU-PC', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mac`
--

CREATE TABLE IF NOT EXISTS `mac` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `mac_adds` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE IF NOT EXISTS `order_master` (
  `itm_code` int(5) NOT NULL,
  `item` varchar(50) NOT NULL,
  `unit_price` int(10) NOT NULL,
  PRIMARY KEY (`itm_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`itm_code`, `item`, `unit_price`) VALUES
(1, 'IDLY', 10),
(2, 'VADAI', 10),
(3, 'PONGAL', 25),
(4, 'KICHADY', 25),
(5, 'POORI-SET', 29),
(6, 'ROAST', 25),
(7, 'ONION UTTAPPAM', 33),
(8, 'TOMATO UTTAPPAM', 35),
(9, 'MASAL ROAST', 33),
(10, 'GHEE ROAST', 33),
(11, 'COFFEE', 17),
(12, 'TEA', 10),
(13, 'PAROTTA', 22),
(14, 'CHAPATTI-SET', 29),
(15, 'BAKODA', 10),
(16, 'IDIAPPAM-SET', 25),
(17, 'LEMON SEVAI', 26),
(18, 'WATER BOTTLE', 19),
(19, 'RAGGI DOSAI', 30),
(20, 'CURD VADAI-SET', 30),
(21, 'ONION ROAST', 33),
(22, 'MIXED UTTAPPAM', 38),
(23, 'SPL.VEECH PAROTTA', 27),
(24, 'kurma pkt-1', 10),
(25, 'CHILLI PAROTTA', 36),
(26, 'MUSHROOM ROAST', 36),
(27, 'CAULIFLR ROAST', 35),
(28, 'BUTR.PORATTA-set', 38),
(29, 'SOYA MASAL ROAST', 35),
(30, 'CURD RICE', 24),
(31, 'CHOLA POORI', 36),
(32, 'CURD SEMIYA', 25),
(33, 'WHEAT ROAST', 30),
(34, 'CURD VADAI', 18),
(35, 'POORI-SINGLE', 16),
(36, 'CHAPPATHI-single', 16),
(37, 'P.B.PORATTAsingle', 24),
(38, 'IDDIYAPPAM', 14),
(39, 'HORLICKS', 26),
(40, 'MILK TEA', 18),
(41, 'PODI ROAST', 33),
(42, 'PARCEL BOX', 10),
(43, 'poorimasal pkt-1', 10),
(44, 'SPL .MASAL.ROAST', 38),
(45, 'SPL ONION ROAST', 38),
(46, 'PANEER ROAST', 35),
(47, 'PANIYARAM', 31),
(48, 'ROSE MILK', 17),
(49, 'ROMALI ROTTI', 30),
(50, 'VEG OMLET', 25),
(51, 'SEMIYA KITCHADI', 26),
(52, 'FIVE-IN-ONE UTHAPPAM', 66),
(53, 'SPL CHILLI IDLY', 34),
(54, 'CURD UPPUMA', 33),
(55, 'sambar pkt-1', 10),
(56, 'chutney pk-1', 10),
(57, 'rasam pkt-1', 10),
(58, 'RASAM RICE', 24),
(59, 'GHEE ONION ROAST', 36),
(60, 'GHEE MASAL ROAST', 36),
(61, 'UPPUMA', 25),
(62, 'KOTHU PAROTTA', 35),
(63, 'VEECH PAROTTA+GRAVY', 25),
(64, 'MALLI RICE', 24),
(65, 'LEMON RICE', 24),
(66, 'TOMATO RICE', 24),
(67, 'kesari/payasam-1', 10),
(68, 'TAMARIND RICE', 24),
(69, 'PEPPAR  RICE', 29),
(70, 'TOMATO BIRIYANI', 31),
(71, 'SAMBAR RICE', 25),
(72, 'kootu pkt-1', 10),
(73, 'CURD', 11),
(74, 'MINI IDLY', 29),
(75, 'VEG BIRIYANI', 31),
(76, 'MUSHROOM BIRIYANI', 36),
(77, 'MEALS + CURD(1) LIMIT', 55),
(78, 'MINI MEALS', 55),
(79, 'WATER CAN', 40),
(80, 'PARCEL MEALS', 60),
(81, 'MALLI UTHAPPAM', 33),
(82, 'BRIJAL ROAST', 35),
(83, 'SET PAROTTA', 25),
(84, 'gravy pkt-1', 20),
(85, 'BABY CORN ROAST', 35),
(86, 'vatha/more-kulambu pkt-1', 10),
(87, 'setting item only-1', 40),
(88, 'GP MASAL ROAST', 35),
(89, 'UTHAPPAM', 25),
(90, 'BADAM MILK', 17),
(91, 'CARROT ROAST', 35),
(121, 'SOUP-TOMATO', 20),
(92, 'CHANNA ROAST', 35),
(93, 'SAMBAR VADAI', 11),
(94, 'porial pkt-1', 10),
(95, 'SAMBAR ILDY', 11),
(96, 'BUT ONI SEVAI', 29),
(97, 'VEG', 1),
(98, 'CARROT UTHAPPAM', 35),
(99, 'SET MINI UTHAPPAM', 40),
(999, 'LINE SALES', 1),
(100, 'MUNCHURIAN SOYA', 36),
(101, 'SOUP-SWEET CORN', 25),
(102, 'SOUP-VEG SOUP', 20),
(103, 'SOUP-VEG CLEAR SOUP', 20),
(104, 'VEG.FRIED RICE', 35),
(105, 'MUSH.FRIED RICE', 43),
(106, 'VEG.NOODLES', 35),
(107, 'MUSH.NOODLES', 43),
(108, 'CHILLI GOBI-DRY', 29),
(109, 'CHILLI MUSH-DRY', 31),
(110, 'CHILLI SOYA-DRY', 29),
(111, 'MANCHURIAN-GOBI', 35),
(112, 'MANCHURIAN-MUSHROOM', 39),
(113, 'MANCHURIAN-SOYA', 37),
(114, 'PEPPER FRY-GOBI.', 35),
(115, 'PEPPER FRY-MUSHROOM.', 40),
(116, 'PEPPER FRY-SOYA.', 37),
(117, 'GRAVY-GOBI', 40),
(118, 'GRAVY-MUSHROOM', 40),
(119, 'GRAVY-GREEN PEAS', 40),
(120, 'GRAVY-PANEER MASALA', 40),
(998, 'LINE SALES-CHINESE', 1),
(122, 'GHEE RICE', 40),
(123, 'GOBI RICE', 40),
(124, 'MIDX-NOODLES+RICE', 45),
(125, 'GOBI-65', 40),
(126, 'MUSHROOM-65', 42),
(130, 'CHILLY PANEER', 42);

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE IF NOT EXISTS `parcel` (
  `bill_no` int(25) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `amt` int(10) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `parcel_id` int(25) NOT NULL AUTO_INCREMENT,
  `shift` int(11) NOT NULL,
  `tokens` bigint(20) NOT NULL,
  `myip` varchar(200) NOT NULL,
  `temp_billno` int(11) NOT NULL,
  `bill_type` int(11) NOT NULL,
  PRIMARY KEY (`parcel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`bill_no`, `e_id`, `date`, `time`, `amt`, `sales_id`, `parcel_id`, `shift`, `tokens`, `myip`, `temp_billno`, `bill_type`) VALUES
(1, 1, '2017-12-23', '18:56:28', 2540, 1, 1, 1, 0, '', 0, 0),
(2, 1, '2017-12-23', '18:59:23', 520, 1, 2, 1, 0, '', 0, 0),
(3, 1, '2017-12-23', '19:00:00', 240, 1, 3, 1, 0, '', 0, 0),
(4, 1, '2017-12-23', '19:04:35', 180, 1, 4, 1, 0, '', 0, 0),
(5, 1, '2017-12-24', '10:57:17', 640, 1, 5, 1, 0, '', 0, 0),
(6, 1, '2017-12-24', '11:55:09', 1320, 1, 6, 1, 0, '', 0, 0),
(7, 1, '2017-12-27', '12:33:51', 110, 1, 7, 1, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_details`
--

CREATE TABLE IF NOT EXISTS `parcel_details` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` int(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` int(11) NOT NULL,
  `shift` int(11) NOT NULL,
  `tokens` bigint(20) NOT NULL,
  `myip` varchar(200) NOT NULL,
  `temp_billno` int(11) NOT NULL,
  `bill_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `parcel_details`
--

INSERT INTO `parcel_details` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tokens`, `myip`, `temp_billno`, `bill_type`) VALUES
(1, 1, 303, 'Plate Shawarma', 130, 1, 130, '2017-12-23', '18:56:28', 1, 1, 1, 0, '', 0, 0),
(2, 1, 304, 'Mutton Raan', 1200, 1, 1200, '2017-12-23', '18:56:28', 1, 1, 1, 0, '', 0, 0),
(3, 1, 427, 'Extra', 10, 1, 10, '2017-12-23', '18:56:28', 1, 1, 1, 0, '', 0, 0),
(4, 1, 435, '700 Combo', 700, 1, 700, '2017-12-23', '18:56:28', 1, 1, 1, 0, '', 0, 0),
(5, 1, 436, '500  Combo', 500, 1, 500, '2017-12-23', '18:56:28', 1, 1, 1, 0, '', 0, 0),
(6, 2, 326, 'Nattu Koli Fry', 120, 1, 120, '2017-12-23', '18:59:23', 1, 1, 1, 0, '', 0, 0),
(7, 2, 327, 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:59:23', 1, 1, 1, 0, '', 0, 0),
(8, 2, 328, 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:59:23', 1, 1, 1, 0, '', 0, 0),
(9, 2, 329, 'Nattu Koli Masala', 140, 1, 140, '2017-12-23', '18:59:23', 1, 1, 1, 0, '', 0, 0),
(10, 3, 360, 'Chinese pepper Ckn dray', 120, 2, 240, '2017-12-23', '19:00:00', 1, 1, 1, 0, '', 0, 0),
(11, 4, 410, 'Mango Juice', 50, 1, 50, '2017-12-23', '19:04:35', 1, 1, 1, 0, '', 0, 0),
(12, 4, 411, 'Pinapple Juice', 50, 1, 50, '2017-12-23', '19:04:35', 1, 1, 1, 0, '', 0, 0),
(13, 4, 412, 'Orange Juice', 40, 1, 40, '2017-12-23', '19:04:35', 1, 1, 1, 0, '', 0, 0),
(14, 4, 414, 'Pomogranate Juice', 40, 1, 40, '2017-12-23', '19:04:35', 1, 1, 1, 0, '', 0, 0),
(15, 5, 310, 'kaadai Pepper Fry', 120, 1, 120, '2017-12-24', '10:57:17', 1, 1, 1, 0, '', 0, 0),
(16, 5, 311, 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-24', '10:57:17', 1, 1, 1, 0, '', 0, 0),
(17, 5, 312, 'Kaadai Gravy', 130, 3, 390, '2017-12-24', '10:57:17', 1, 1, 1, 0, '', 0, 0),
(18, 6, 330, 'Chicken 65', 70, 4, 280, '2017-12-24', '11:55:09', 1, 1, 1, 0, '', 0, 0),
(19, 6, 331, 'Boneless 65', 100, 4, 400, '2017-12-24', '11:55:09', 1, 1, 1, 0, '', 0, 0),
(20, 6, 332, 'Leg Piece 2 pic', 100, 4, 400, '2017-12-24', '11:55:09', 1, 1, 1, 0, '', 0, 0),
(21, 6, 333, 'Lolly Pop 4 pics', 120, 2, 240, '2017-12-24', '11:55:09', 1, 1, 1, 0, '', 0, 0),
(22, 7, 7, 'Tandoori Parotta', 30, 1, 30, '2017-12-27', '12:33:51', 1, 1, 1, 0, '', 0, 0),
(23, 7, 8, 'Chappathi', 20, 1, 20, '2017-12-27', '12:33:51', 1, 1, 1, 0, '', 0, 0),
(24, 7, 9, 'Parotta', 20, 3, 60, '2017-12-27', '12:33:51', 1, 1, 1, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_master`
--

CREATE TABLE IF NOT EXISTS `parcel_master` (
  `itm_code` int(5) NOT NULL,
  `item` varchar(50) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `itm_cat` int(25) NOT NULL,
  PRIMARY KEY (`itm_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent_cat`
--

CREATE TABLE IF NOT EXISTS `parent_cat` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `p_cat` varchar(100) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `parent_cat`
--

INSERT INTO `parent_cat` (`pid`, `p_cat`) VALUES
(1, 'SOUPS'),
(2, 'VEG STARTER'),
(3, 'NON-VEG STARTER'),
(4, 'MAIN DISH'),
(5, 'THANDHOORI'),
(6, 'DESERT BEVERASES'),
(7, 'INDIAN RICE & GRAVIES');

-- --------------------------------------------------------

--
-- Table structure for table `party_booking`
--

CREATE TABLE IF NOT EXISTS `party_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(10) NOT NULL,
  `book` varchar(3) NOT NULL,
  `bill_no` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `contact` bigint(25) NOT NULL,
  `bill_amt` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `payment` int(15) NOT NULL,
  `discount` int(5) NOT NULL,
  `balance` int(10) NOT NULL,
  `date` varchar(25) NOT NULL,
  `time` time NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `order_time` time NOT NULL,
  `tra` int(5) NOT NULL,
  `shift` varchar(75) NOT NULL,
  `address` text NOT NULL,
  `vessel_deposit` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `party_dish_group`
--

CREATE TABLE IF NOT EXISTS `party_dish_group` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(1000) NOT NULL,
  `cat` int(11) NOT NULL,
  `additional` varchar(100) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `party_dish_items`
--

CREATE TABLE IF NOT EXISTS `party_dish_items` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `icode` int(11) NOT NULL,
  `igroup` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `party_dish_limit`
--

CREATE TABLE IF NOT EXISTS `party_dish_limit` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `igroup` int(11) NOT NULL,
  `glimit` varchar(500) NOT NULL,
  `acost` varchar(500) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `party_dish_payment`
--

CREATE TABLE IF NOT EXISTS `party_dish_payment` (
  `pdfid` int(11) NOT NULL AUTO_INCREMENT,
  `shedule_id` int(11) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `dates` varchar(500) NOT NULL,
  `times` varchar(500) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `mode` varchar(50) NOT NULL,
  PRIMARY KEY (`pdfid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `party_dish_plan`
--

CREATE TABLE IF NOT EXISTS `party_dish_plan` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `plan` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `cat` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `party_dish_shedule`
--

CREATE TABLE IF NOT EXISTS `party_dish_shedule` (
  `pdsid` int(11) NOT NULL AUTO_INCREMENT,
  `dates` varchar(500) NOT NULL,
  `times` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `fdate` varchar(500) NOT NULL,
  `ftime` varchar(500) NOT NULL,
  `tdate` varchar(500) NOT NULL,
  `ttime` varchar(500) NOT NULL,
  `minpax` varchar(500) NOT NULL,
  `maxpax` varchar(500) NOT NULL,
  `perpaxamt` varchar(500) NOT NULL,
  `totamt` varchar(500) NOT NULL,
  `advance_amt` varchar(500) NOT NULL,
  `plan` varchar(500) NOT NULL,
  PRIMARY KEY (`pdsid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `party_dish_shedule_det`
--

CREATE TABLE IF NOT EXISTS `party_dish_shedule_det` (
  `pdsi` int(11) NOT NULL AUTO_INCREMENT,
  `icode` int(11) NOT NULL,
  `item` varchar(1000) NOT NULL,
  `planid` int(11) NOT NULL,
  `shedule_id` int(11) NOT NULL,
  PRIMARY KEY (`pdsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `party_income`
--

CREATE TABLE IF NOT EXISTS `party_income` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `book` varchar(2) NOT NULL,
  `bill_no` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `descr` varchar(150) NOT NULL,
  `amt` int(10) NOT NULL,
  `eid` int(5) NOT NULL,
  `shift` varchar(200) NOT NULL,
  `mode` varchar(500) NOT NULL,
  `cash` varchar(500) NOT NULL,
  `card` varchar(500) NOT NULL,
  `credit_card` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `party_item_entry`
--

CREATE TABLE IF NOT EXISTS `party_item_entry` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `book` varchar(50) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `itm_code` int(11) NOT NULL,
  `item` varchar(1000) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `dates` varchar(500) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `party_permenent_id`
--

CREATE TABLE IF NOT EXISTS `party_permenent_id` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `par_bill_mer`
--

CREATE TABLE IF NOT EXISTS `par_bill_mer` (
  `pbm_id` int(11) NOT NULL AUTO_INCREMENT,
  `con` int(11) NOT NULL,
  `con2` int(11) NOT NULL,
  `con3` int(11) NOT NULL,
  `con4` int(11) NOT NULL,
  PRIMARY KEY (`pbm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `par_bill_mer`
--

INSERT INTO `par_bill_mer` (`pbm_id`, `con`, `con2`, `con3`, `con4`) VALUES
(1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `past_bill`
--

CREATE TABLE IF NOT EXISTS `past_bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `amt` int(10) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `disc_amt` varchar(200) NOT NULL,
  `sub_tot` varchar(200) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(200) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `ser_tax` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `mode` varchar(500) NOT NULL,
  `cust_name` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `roundoff` varchar(200) NOT NULL,
  `ser_charge` varchar(500) NOT NULL,
  `cash` varchar(500) NOT NULL,
  `card` varchar(500) NOT NULL,
  `noofpax` varchar(50) NOT NULL,
  `buffet` int(11) NOT NULL,
  `credit_card` varchar(500) NOT NULL,
  `npb` varchar(500) NOT NULL,
  `rt` varchar(500) NOT NULL,
  `voucher` varchar(500) NOT NULL,
  `app_id` int(25) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `past_bill`
--

INSERT INTO `past_bill` (`bill_id`, `bill_no`, `e_id`, `date`, `time`, `amt`, `discount`, `disc_amt`, `sub_tot`, `sales_id`, `shift`, `tables`, `chair`, `ser_tax`, `vat`, `description`, `mode`, `cust_name`, `mobile`, `status`, `roundoff`, `ser_charge`, `cash`, `card`, `noofpax`, `buffet`, `credit_card`, `npb`, `rt`, `voucher`, `app_id`) VALUES
(1, 1, 1, '2018-01-03', '17:23:08', 870, '', '', '870', 6, 1, '5', 'B', '', '', '', '', '', '', 'Paid', '', '', '0', '0', '', 0, '0', '0', '0', '0', 0),
(2, 2, 1, '2018-01-03', '17:30:41', 680, '', '', '680', 6, 1, '1', 'B', '', '', '', '', '', '', 'Paid', '', '', '0', '0', '', 0, '0', '0', '0', '0', 0),
(3, 1, 1, '2018-01-04', '09:52:45', 1200, '', '', '1200', 6, 1, '2', 'B', '', '', '', '', '', '', 'Paid', '', '', '0', '0', '', 0, '0', '0', '0', '0', 0),
(4, 2, 1, '2018-01-04', '09:54:20', 700, '', '', '700', 6, 1, '9', 'A', '', '', '', '', '', '', 'Paid', '', '', '0', '0', '', 0, '0', '0', '0', '0', 0),
(6, 3, 1, '2018-01-04', '13:03:43', 2770, '', '', '2770', 6, 1, '4', 'A', '', '', '', '', '', '', 'Unpaid', '', '', '0', '0', '', 0, '0', '0', '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `past_bill_details`
--

CREATE TABLE IF NOT EXISTS `past_bill_details` (
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
  `mob_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=23 ;

--
-- Dumping data for table `past_bill_details`
--

INSERT INTO `past_bill_details` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`, `remarks`, `unit_type`, `ser_tax`, `vat_tax`, `service`, `vat`, `tot_amt`, `cat`, `mob_status`) VALUES
(1, 1, '320', 'Hyderabad Fish Briyani', 150, '3', '450', '2018-01-03', '17:23:08', 6, 1, 1, '5', 'B', '', '', '0', '0', '0', '0', '450', '', 0),
(2, 1, '321', 'Nikka Mutton Briyani', 140, '3', '420', '2018-01-03', '17:23:08', 6, 1, 1, '5', 'B', '', '', '0', '0', '0', '0', '420', '', 0),
(3, 2, '3', ' Naan', 25, '2', '50', '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '50', '', 0),
(4, 2, '4', 'Butter Naan', 35, '2', '70', '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '70', '', 0),
(5, 2, '322', 'Kaadai Briyani', 140, '2', '280', '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '280', '', 0),
(6, 2, '349', 'Kaadai Chicken gravy', 140, '2', '280', '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B', '', '', '0', '0', '0', '0', '280', '', 0),
(7, 1, '311', 'Kaadai Pepper Masala', 130, '2', '260', '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '260', '', 0),
(8, 1, '310', 'kaadai Pepper Fry', 120, '2', '240', '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '240', '', 0),
(9, 1, '309', 'Kaadai Oil Fry', 100, '2', '200', '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '200', '', 0),
(10, 1, '312', 'Kaadai Gravy', 130, '2', '260', '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '260', '', 0),
(11, 1, '313', 'Kaadai Tandoori', 120, '2', '240', '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B', '', '', '0', '0', '0', '0', '240', '', 0),
(12, 2, '309', 'Kaadai Oil Fry', 100, '2', '200', '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '200', '', 0),
(13, 2, '310', 'kaadai Pepper Fry', 120, '2', '240', '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '240', '', 0),
(14, 2, '311', 'Kaadai Pepper Masala', 130, '2', '260', '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A', '', '', '0', '0', '0', '0', '260', '', 0),
(22, 3, '304', 'Mutton Raan', 1200, '2', '2400', '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '2400', '', 0),
(21, 3, '303', 'Plate Shawarma', 130, '1', '130', '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '130', '', 0),
(20, 3, '302', 'Special Shawarma 1/2', 120, '1', '120', '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '120', '', 0),
(19, 3, '301', 'Special Shawarma', 120, '1', '120', '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A', '', '', '0', '0', '0', '0', '120', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `past_bill_details_return`
--

CREATE TABLE IF NOT EXISTS `past_bill_details_return` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `remarks` varchar(5000) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `unit_type` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=5 ;

--
-- Dumping data for table `past_bill_details_return`
--

INSERT INTO `past_bill_details_return` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `remarks`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`, `unit_type`) VALUES
(1, 3, '329', 'Nattu Koli Masala', 140, 1, '', 140, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', ''),
(2, 3, '328', 'Nattu Koli Kulambu', 130, 1, '', 130, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', ''),
(3, 3, '320', 'Hyderabad Fish Briyani', 150, 1, '', 150, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', ''),
(4, 3, '321', 'Nikka Mutton Briyani', 140, 1, '', 140, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B', '');

-- --------------------------------------------------------

--
-- Table structure for table `past_bill_details_temp`
--

CREATE TABLE IF NOT EXISTS `past_bill_details_temp` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `past_bill_print`
--

CREATE TABLE IF NOT EXISTS `past_bill_print` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=933 ;

--
-- Dumping data for table `past_bill_print`
--

INSERT INTO `past_bill_print` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`) VALUES
(265, 0, '1', 'v', 0, 0, 0, '2017-12-08', '18:43:31', 0, 1, 1, '2', 'A'),
(266, 0, '1', 'v', 0, 0, 0, '2017-12-08', '18:44:58', 0, 1, 1, '1', 'A'),
(267, 0, '1', 'v', 0, 0, 0, '2017-12-08', '19:04:37', 0, 1, 1, '1', 'A'),
(268, 0, '1', 'v', 0, 0, 0, '2017-12-08', '19:10:22', 6, 1, 1, '4', 'A'),
(269, 0, '1', 'v', 0, 0, 0, '2017-12-08', '19:50:44', 4, 1, 1, '4', 'B'),
(270, 0, '1', 'v', 0, 0, 0, '2017-12-08', '20:03:12', 4, 1, 1, '4', 'B'),
(271, 0, '1', 'v', 0, 0, 0, '2017-12-08', '20:23:04', 4, 1, 1, '5', 'B'),
(272, 0, '1', 'v', 0, 0, 0, '2017-12-09', '13:04:06', 2, 1, 1, '1', 'A'),
(273, 0, '1', 'v', 0, 0, 0, '2017-12-09', '13:05:44', 2, 1, 1, '1', 'A'),
(274, 0, '1', 'v', 0, 0, 0, '2017-12-09', '13:06:21', 2, 1, 1, '1', 'A'),
(275, 0, '1', 'v', 0, 0, 0, '2017-12-09', '13:06:44', 2, 1, 1, '1', 'A'),
(276, 0, '353', 'Tikka Masala', 140, 4, 560, '2017-12-23', '13:26:17', 6, 1, 1, '2', 'A'),
(277, 0, '353', 'Tikka Masala', 140, 4, 560, '2017-12-23', '13:29:07', 6, 1, 1, '2', 'A'),
(300, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-23', '17:02:19', 6, 1, 1, '88', '1'),
(289, 0, '301', 'Special Shawarma', 120, 3, 360, '2017-12-23', '16:47:55', 6, 1, 1, '88', '1'),
(288, 0, '300', 'Shawarma', 100, 1, 100, '2017-12-23', '16:47:55', 6, 1, 1, '88', '1'),
(286, 0, '304', 'Mutton Raan', 1200, 2, 2400, '2017-12-23', '15:29:22', 6, 1, 1, '2', 'B'),
(307, 0, '427', 'Extra', 10, 1, 10, '2017-12-23', '17:06:27', 6, 1, 1, '222', '1'),
(299, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '17:02:19', 6, 1, 1, '88', '1'),
(306, 0, '436', '500  Combo', 500, 1, 500, '2017-12-23', '17:06:27', 6, 1, 1, '222', '1'),
(305, 0, '435', '700 Combo', 700, 1, 700, '2017-12-23', '17:06:27', 6, 1, 1, '222', '1'),
(308, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-23', '17:06:27', 6, 1, 1, '222', '1'),
(309, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '17:47:11', 6, 1, 1, '88', '1'),
(310, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '17:47:11', 6, 1, 1, '88', '1'),
(311, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '17:47:11', 6, 1, 1, '88', '1'),
(312, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '17:51:53', 6, 1, 1, '88', '1'),
(313, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '17:51:53', 6, 1, 1, '88', '1'),
(314, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '17:51:53', 6, 1, 1, '88', '1'),
(315, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1'),
(316, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1'),
(317, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1'),
(318, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1'),
(319, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1'),
(320, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:03:32', 6, 1, 1, '88', '1'),
(321, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1'),
(322, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1'),
(323, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1'),
(324, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1'),
(325, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1'),
(326, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:03:36', 6, 1, 1, '88', '1'),
(327, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1'),
(328, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1'),
(329, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1'),
(330, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1'),
(331, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1'),
(332, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:04:02', 6, 1, 1, '88', '1'),
(333, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1'),
(334, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1'),
(335, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1'),
(336, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1'),
(337, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1'),
(338, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1'),
(339, 0, '373', 'Tandoori Half', 140, 1, 140, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1'),
(340, 0, '374', 'Barbic Chicken Full', 300, 1, 300, '2017-12-23', '18:04:13', 6, 1, 1, '88', '1'),
(341, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1'),
(342, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1'),
(343, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1'),
(344, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1'),
(345, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1'),
(346, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1'),
(347, 0, '373', 'Tandoori Half', 140, 1, 140, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1'),
(348, 0, '374', 'Barbic Chicken Full', 300, 1, 300, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1'),
(349, 0, '390', 'Parotta', 30, 1, 30, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1'),
(350, 0, '389', 'Chappat', 25, 1, 25, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1'),
(351, 0, '388', 'Tandoori Parotta', 35, 1, 35, '2017-12-23', '18:04:55', 6, 1, 1, '88', '1'),
(352, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1'),
(353, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1'),
(354, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1'),
(355, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1'),
(356, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1'),
(357, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1'),
(358, 0, '373', 'Tandoori Half', 140, 1, 140, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1'),
(359, 0, '374', 'Barbic Chicken Full', 300, 1, 300, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1'),
(360, 0, '390', 'Parotta', 30, 1, 30, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1'),
(361, 0, '389', 'Chappat', 25, 1, 25, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1'),
(362, 0, '388', 'Tandoori Parotta', 35, 1, 35, '2017-12-23', '18:05:58', 6, 1, 1, '88', '1'),
(363, 0, '383', 'Butter Rotti', 30, 1, 30, '2017-12-23', '18:07:45', 6, 1, 1, '88', '1'),
(364, 0, '384', 'Naan', 25, 1, 25, '2017-12-23', '18:07:45', 6, 1, 1, '88', '1'),
(365, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-23', '18:16:28', 6, 1, 1, '1', 'B'),
(366, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-23', '18:16:28', 6, 1, 1, '1', 'B'),
(367, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-23', '18:19:18', 6, 1, 1, '1', 'B'),
(368, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-23', '18:19:18', 6, 1, 1, '1', 'B'),
(369, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-23', '18:21:53', 6, 1, 1, '66', '1'),
(370, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:21:53', 6, 1, 1, '66', '1'),
(371, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:21:53', 6, 1, 1, '66', '1'),
(372, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-23', '18:21:54', 6, 1, 1, '66', '1'),
(373, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:21:54', 6, 1, 1, '66', '1'),
(374, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:21:54', 6, 1, 1, '66', '1'),
(375, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-23', '18:25:10', 6, 1, 1, '66', '1'),
(376, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:25:10', 6, 1, 1, '66', '1'),
(377, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:25:10', 6, 1, 1, '66', '1'),
(378, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-23', '18:27:19', 6, 1, 1, '66', '1'),
(379, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:27:19', 6, 1, 1, '66', '1'),
(380, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:27:19', 6, 1, 1, '66', '1'),
(381, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-23', '18:32:54', 6, 1, 1, '66', '1'),
(382, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:32:54', 6, 1, 1, '66', '1'),
(383, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:32:54', 6, 1, 1, '66', '1'),
(384, 0, '326', 'Nattu Koli Fry', 120, 1, 120, '2017-12-23', '18:33:51', 6, 1, 1, '3', 'B'),
(385, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:33:51', 6, 1, 1, '3', 'B'),
(386, 0, '5', 'Plain Kulcha', 30, 1, 30, '2017-12-23', '18:34:40', 6, 1, 1, '6', 'A'),
(387, 0, '6', 'Butter Kulcha', 35, 1, 35, '2017-12-23', '18:34:40', 6, 1, 1, '6', 'A'),
(388, 0, '7', 'Tandoori Parotta', 30, 1, 30, '2017-12-23', '18:34:40', 6, 1, 1, '6', 'A'),
(389, 0, '331', 'Boneless 65', 100, 2, 200, '2017-12-23', '18:37:12', 6, 1, 1, '6', 'B'),
(390, 0, '332', 'Leg Piece 2 pic', 100, 5, 500, '2017-12-23', '18:37:12', 6, 1, 1, '6', 'B'),
(391, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-23', '18:37:12', 6, 1, 1, '6', 'B'),
(392, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B'),
(393, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B'),
(394, 0, '306', 'Mutton Chukka', 130, 3, 390, '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B'),
(395, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-23', '18:48:27', 6, 1, 1, '1', 'B'),
(396, 0, '305', 'Mutton Pepper Fry', 130, 1, 130, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1'),
(397, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1'),
(398, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1'),
(399, 0, '395', 'Paneer Manchurian', 120, 1, 120, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1'),
(400, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1'),
(401, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1'),
(402, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1'),
(403, 0, '410', 'Mango Juice', 50, 1, 50, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1'),
(404, 0, '411', 'Pinapple Juice', 50, 1, 50, '2017-12-23', '18:50:27', 6, 1, 1, '888', '1'),
(405, 0, '305', 'Mutton Pepper Fry', 130, 1, 130, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1'),
(406, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1'),
(407, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1'),
(408, 0, '395', 'Paneer Manchurian', 120, 1, 120, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1'),
(409, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1'),
(410, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1'),
(411, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1'),
(412, 0, '410', 'Mango Juice', 50, 1, 50, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1'),
(413, 0, '411', 'Pinapple Juice', 50, 1, 50, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1'),
(414, 0, '343', 'Clear Soup 1/2', 60, 3, 180, '2017-12-23', '18:51:04', 6, 1, 1, '888', '1'),
(415, 0, '352', 'Butter Chicken Masala', 140, 3, 420, '2017-12-23', '18:52:36', 6, 1, 1, '8', 'A'),
(416, 0, '326', 'Nattu Koli Fry', 120, 1, 120, '2017-12-23', '18:58:32', 6, 1, 1, '77', '1'),
(417, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-23', '18:58:32', 6, 1, 1, '77', '1'),
(418, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-23', '18:58:32', 6, 1, 1, '77', '1'),
(419, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-23', '18:58:32', 6, 1, 1, '77', '1'),
(420, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '10:34:49', 6, 1, 1, '100', '1'),
(421, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '10:34:49', 6, 1, 1, '100', '1'),
(422, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:01:46', 6, 1, 1, '100', '1'),
(423, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:01:46', 6, 1, 1, '100', '1'),
(424, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:01:46', 6, 1, 1, '100', '1'),
(425, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:01:46', 6, 1, 1, '100', '1'),
(426, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:01:46', 6, 1, 1, '100', '1'),
(427, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:03:37', 6, 1, 1, '100', '1'),
(428, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:03:37', 6, 1, 1, '100', '1'),
(429, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:03:37', 6, 1, 1, '100', '1'),
(430, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:03:37', 6, 1, 1, '100', '1'),
(431, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:03:37', 6, 1, 1, '100', '1'),
(432, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:08:22', 6, 1, 1, '100', '1'),
(433, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:08:22', 6, 1, 1, '100', '1'),
(434, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:08:22', 6, 1, 1, '100', '1'),
(435, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:08:22', 6, 1, 1, '100', '1'),
(436, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:08:22', 6, 1, 1, '100', '1'),
(437, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1'),
(438, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1'),
(439, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1'),
(440, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1'),
(441, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1'),
(442, 0, '', '', 0, 12, 0, '2017-12-26', '13:13:51', 6, 1, 1, '100', '1'),
(443, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1'),
(444, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1'),
(445, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1'),
(446, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1'),
(447, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1'),
(448, 0, '', '', 0, 14, 0, '2017-12-26', '13:17:03', 6, 1, 1, '100', '1'),
(449, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1'),
(450, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1'),
(451, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1'),
(452, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1'),
(453, 0, '398', 'Mushroom Pepper Fry', 110, 1, 110, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1'),
(454, 0, '', '', 0, 16, 0, '2017-12-26', '13:20:27', 6, 1, 1, '100', '1'),
(455, 0, '', '', 0, 4, 0, '2017-12-26', '13:21:09', 6, 1, 1, '77', '1'),
(456, 0, '', '', 0, 4, 0, '2017-12-26', '13:22:54', 6, 1, 1, '77', '1'),
(457, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '13:22:54', 6, 1, 1, '77', '1'),
(458, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:22:54', 6, 1, 1, '77', '1'),
(459, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:22:54', 6, 1, 1, '77', '1'),
(460, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B'),
(461, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B'),
(462, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B'),
(463, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:24:26', 6, 1, 1, '6', 'B'),
(464, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B'),
(465, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B'),
(466, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B'),
(467, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B'),
(468, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '13:25:36', 6, 1, 1, '2', 'B'),
(469, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B'),
(470, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B'),
(471, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B'),
(472, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B'),
(473, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B'),
(474, 0, '314', 'Para Fish Fry', 80, 1, 80, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B'),
(475, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B'),
(476, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-26', '13:28:34', 6, 1, 1, '2', 'B'),
(477, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B'),
(478, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B'),
(479, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B'),
(480, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B'),
(481, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B'),
(482, 0, '314', 'Para Fish Fry', 80, 1, 80, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B'),
(483, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B'),
(484, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B'),
(485, 0, '381', 'Tandoori Kaadai', 120, 1, 120, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B'),
(486, 0, '380', 'Chicken Tikka', 120, 1, 120, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B'),
(487, 0, '379', 'Pudina Tikka', 120, 1, 120, '2017-12-26', '13:28:44', 6, 1, 1, '2', 'B'),
(488, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(489, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(490, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(491, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(492, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(493, 0, '314', 'Para Fish Fry', 80, 1, 80, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(494, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(495, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(496, 0, '381', 'Tandoori Kaadai', 120, 1, 120, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(497, 0, '380', 'Chicken Tikka', 120, 1, 120, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(498, 0, '379', 'Pudina Tikka', 120, 1, 120, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(499, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(500, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-26', '13:30:32', 6, 1, 1, '2', 'B'),
(501, 0, '335', 'Nattu Koli Soup 1/2', 70, 1, 70, '2017-12-26', '13:33:15', 6, 1, 1, '2', 'B'),
(502, 0, '336', 'Mutton Chettinadu soup', 50, 1, 50, '2017-12-26', '13:33:15', 6, 1, 1, '2', 'B'),
(503, 0, '337', 'Mutton Chetti soup 1/2', 60, 1, 60, '2017-12-26', '13:33:15', 6, 1, 1, '2', 'B'),
(504, 0, '335', 'Nattu Koli Soup 1/2', 70, 1, 70, '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B'),
(505, 0, '336', 'Mutton Chettinadu soup', 50, 1, 50, '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B'),
(506, 0, '337', 'Mutton Chetti soup 1/2', 60, 1, 60, '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B'),
(507, 0, '313', 'Kaadai Tandoori', 120, 2, 240, '2017-12-26', '13:37:00', 6, 1, 1, '2', 'B'),
(508, 0, '335', 'Nattu Koli Soup 1/2', 70, 1, 70, '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B'),
(509, 0, '336', 'Mutton Chettinadu soup', 50, 1, 50, '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B'),
(510, 0, '337', 'Mutton Chetti soup 1/2', 60, 1, 60, '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B'),
(511, 0, '313', 'Kaadai Tandoori', 120, 2, 240, '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B'),
(512, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2017-12-26', '13:41:02', 6, 1, 1, '2', 'B'),
(513, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:41:24', 6, 1, 1, '2', 'A'),
(514, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:41:32', 6, 1, 1, '2', 'A'),
(515, 0, '316', 'Barbic Full Fish 1kg', 350, 2, 700, '2017-12-26', '13:41:32', 6, 1, 1, '2', 'A'),
(516, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:41:40', 6, 1, 1, '2', 'A'),
(517, 0, '316', 'Barbic Full Fish 1kg', 350, 2, 700, '2017-12-26', '13:41:40', 6, 1, 1, '2', 'A'),
(518, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-26', '13:41:40', 6, 1, 1, '2', 'A'),
(519, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A'),
(520, 0, '316', 'Barbic Full Fish 1kg', 350, 2, 700, '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A'),
(521, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A'),
(522, 0, '333', 'Lolly Pop 4 pics', 120, 2, 240, '2017-12-26', '13:42:17', 6, 1, 1, '2', 'A'),
(523, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A'),
(524, 0, '316', 'Barbic Full Fish 1kg', 350, 2, 700, '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A'),
(525, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A'),
(526, 0, '333', 'Lolly Pop 4 pics', 120, 2, 240, '2017-12-26', '13:43:17', 6, 1, 1, '2', 'A'),
(527, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A'),
(528, 0, '316', 'Barbic Full Fish 1kg', 350, 2, 700, '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A'),
(529, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A'),
(530, 0, '333', 'Lolly Pop 4 pics', 120, 2, 240, '2017-12-26', '13:44:23', 6, 1, 1, '2', 'A'),
(531, 0, '1', 'Rotti', 20, 4, 80, '2017-12-26', '13:50:24', 6, 1, 1, '222', '1'),
(532, 0, '1', 'Rotti', 20, 4, 80, '2017-12-26', '13:52:42', 6, 1, 1, '222', '1'),
(533, 0, '435', '700 Combo', 700, 1, 700, '2017-12-26', '13:52:42', 6, 1, 1, '222', '1'),
(534, 0, '436', '500  Combo', 500, 1, 500, '2017-12-26', '13:52:42', 6, 1, 1, '222', '1'),
(535, 0, '1', 'Rotti', 20, 4, 80, '2017-12-26', '14:20:57', 6, 1, 1, '222', '1'),
(536, 0, '435', '700 Combo', 700, 1, 700, '2017-12-26', '14:20:57', 6, 1, 1, '222', '1'),
(537, 0, '436', '500  Combo', 500, 1, 500, '2017-12-26', '14:20:57', 6, 1, 1, '222', '1'),
(538, 0, '1', 'Rotti', 20, 4, 80, '2017-12-26', '14:21:42', 6, 1, 1, '222', '1'),
(539, 0, '435', '700 Combo', 700, 1, 700, '2017-12-26', '14:21:42', 6, 1, 1, '222', '1'),
(540, 0, '436', '500  Combo', 500, 1, 500, '2017-12-26', '14:21:42', 6, 1, 1, '222', '1'),
(541, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-26', '14:21:42', 6, 1, 1, '222', '1'),
(542, 0, '3', ' Naan', 25, 1, 25, '2017-12-26', '14:25:01', 6, 1, 1, '6', 'A'),
(543, 0, '4', 'Butter Naan', 35, 1, 35, '2017-12-26', '14:25:01', 6, 1, 1, '6', 'A'),
(544, 0, '5', 'Plain Kulcha', 30, 1, 30, '2017-12-26', '14:25:01', 6, 1, 1, '6', 'A'),
(545, 0, '3', ' Naan', 25, 1, 25, '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A'),
(546, 0, '4', 'Butter Naan', 35, 1, 35, '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A'),
(547, 0, '5', 'Plain Kulcha', 30, 1, 30, '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A'),
(548, 0, '325', 'Plain Briyani', 90, 1, 90, '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A'),
(549, 0, '324', 'Nikka Chicken Briyani', 110, 1, 110, '2017-12-26', '14:25:26', 6, 1, 1, '6', 'A'),
(550, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-26', '14:42:04', 6, 1, 1, '100', '1'),
(551, 0, '304', 'Mutton Raan', 1200, 4, 4800, '2017-12-26', '14:42:04', 6, 1, 1, '100', '1'),
(552, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-26', '14:42:20', 6, 1, 1, '100', '1'),
(553, 0, '304', 'Mutton Raan', 1200, 4, 4800, '2017-12-26', '14:42:20', 6, 1, 1, '100', '1'),
(554, 0, '317', 'Barbic Full Fish 1.5 Kg', 450, 1, 450, '2017-12-26', '14:42:20', 6, 1, 1, '100', '1'),
(555, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-26', '14:42:20', 6, 1, 1, '100', '1'),
(556, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A'),
(557, 0, '362', '20*20', 120, 2, 240, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A'),
(558, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A'),
(559, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A'),
(560, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A'),
(561, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-26', '15:42:57', 6, 1, 1, '9', 'A'),
(562, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A'),
(563, 0, '362', '20*20', 120, 2, 240, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A'),
(564, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A'),
(565, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A'),
(566, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A'),
(567, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-26', '15:43:01', 6, 1, 1, '9', 'A'),
(568, 0, '2', 'Butter Rotti', 25, 2, 50, '2017-12-26', '16:39:26', 6, 1, 1, '9', 'A'),
(569, 0, '2', 'Butter Rotti', 25, 2, 50, '2017-12-26', '16:39:28', 6, 1, 1, '9', 'A'),
(570, 0, '2', 'Butter Rotti', 25, 2, 50, '2017-12-26', '16:39:34', 6, 1, 1, '9', 'A'),
(571, 0, '1', 'Rotti', 20, 1, 20, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A'),
(572, 0, '301', 'Special Shawarma', 120, 2, 240, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A'),
(573, 0, '2', 'Butter Rotti', 25, 2, 50, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A'),
(574, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A'),
(575, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A'),
(576, 0, '396', 'Paneer Butter Masala', 130, 1, 130, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A'),
(577, 0, '397', 'Mushroom Butter Masala', 130, 1, 130, '2017-12-26', '16:54:20', 6, 1, 1, '9', 'A'),
(578, 0, '347', 'Kerala Chicken gravy', 130, 2, 260, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A'),
(579, 0, '348', 'Andra Chicken gravy', 130, 2, 260, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A'),
(580, 0, '349', 'Kaadai Chicken gravy', 140, 2, 280, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A'),
(581, 0, '307', 'Mutton Gravy', 130, 4, 520, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A'),
(582, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A'),
(583, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-26', '17:15:34', 6, 1, 1, '9', 'A'),
(584, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A'),
(585, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A'),
(586, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A'),
(587, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A'),
(588, 0, '327', 'Nattu Koli Varutha Kari', 130, 2, 260, '2017-12-26', '17:16:40', 6, 1, 1, '10', 'A'),
(589, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A'),
(590, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A'),
(591, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A'),
(592, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A'),
(593, 0, '327', 'Nattu Koli Varutha Kari', 130, 2, 260, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A'),
(594, 0, '317', 'Barbic Full Fish 1.5 Kg', 450, 1, 450, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A'),
(595, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-26', '18:00:00', 6, 1, 1, '10', 'A'),
(596, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-26', '19:01:44', 6, 1, 1, '222', '1'),
(597, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-26', '19:01:44', 6, 1, 1, '222', '1'),
(598, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-26', '19:01:44', 6, 1, 1, '222', '1'),
(599, 0, '304', 'Mutton Raan', 1200, 3, 3600, '2017-12-26', '19:01:44', 6, 1, 1, '222', '1'),
(600, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '09:57:15', 6, 1, 1, '333', '1'),
(601, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '09:57:15', 6, 1, 1, '333', '1'),
(602, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B'),
(603, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B'),
(604, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B'),
(605, 0, '427', 'Extra', 10, 2, 20, '2017-12-27', '10:06:51', 6, 1, 1, '1', 'B'),
(606, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B'),
(607, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B'),
(608, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B'),
(609, 0, '427', 'Extra', 10, 2, 20, '2017-12-27', '10:15:22', 6, 1, 1, '1', 'B'),
(610, 0, '2', 'Butter Rotti', 25, 1, 25, '2017-12-27', '10:19:36', 6, 1, 1, '1', 'A'),
(611, 0, '3', ' Naan', 25, 1, 25, '2017-12-27', '10:19:36', 6, 1, 1, '1', 'A'),
(612, 0, '4', 'Butter Naan', 35, 1, 35, '2017-12-27', '10:19:36', 6, 1, 1, '1', 'A'),
(613, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:32:16', 6, 1, 1, '4', 'B'),
(614, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:32:16', 6, 1, 1, '4', 'B'),
(615, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:32:16', 6, 1, 1, '4', 'B'),
(616, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:33:26', 6, 1, 1, '1', 'A'),
(617, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:33:26', 6, 1, 1, '1', 'A'),
(618, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-27', '10:34:44', 6, 1, 1, '1', 'A'),
(619, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-27', '10:34:44', 6, 1, 1, '1', 'A'),
(620, 0, '4', 'Butter Naan', 35, 2, 70, '2017-12-27', '10:38:04', 6, 1, 1, '1', 'A'),
(621, 0, '3', ' Naan', 25, 1, 25, '2017-12-27', '10:38:04', 6, 1, 1, '1', 'A'),
(622, 0, '5', 'Plain Kulcha', 30, 1, 30, '2017-12-27', '10:38:04', 6, 1, 1, '1', 'A'),
(623, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A'),
(624, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A'),
(625, 0, '304', 'Mutton Raan', 1200, 3, 3600, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A'),
(626, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A'),
(627, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A'),
(628, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A'),
(629, 0, '337', 'Mutton Chetti soup 1/2', 60, 1, 60, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A'),
(630, 0, '338', 'Chicken Chettinadu Soup', 50, 1, 50, '2017-12-27', '10:39:00', 6, 1, 1, '3', 'A'),
(631, 0, '394', 'Paneer Pepper Fry', 120, 1, 120, '2017-12-27', '10:39:26', 6, 1, 1, '7', 'A'),
(632, 0, '395', 'Paneer Manchurian', 120, 1, 120, '2017-12-27', '10:39:26', 6, 1, 1, '7', 'A'),
(633, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A'),
(634, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A'),
(635, 0, '367', 'Pepper Grill Half', 140, 1, 140, '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A'),
(636, 0, '368', 'Lemon Grill Full', 280, 1, 280, '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A'),
(637, 0, '369', 'Lemon grill Half', 150, 1, 150, '2017-12-27', '10:40:43', 6, 1, 1, '1', 'A'),
(638, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:45:14', 6, 1, 1, '1', 'B'),
(639, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:45:14', 6, 1, 1, '1', 'B'),
(640, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:45:14', 6, 1, 1, '1', 'B'),
(641, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-27', '10:45:56', 6, 1, 1, '99', '1'),
(642, 0, '331', 'Boneless 65', 100, 2, 200, '2017-12-27', '10:45:56', 6, 1, 1, '99', '1'),
(643, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-27', '10:45:56', 6, 1, 1, '99', '1'),
(644, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:53:04', 6, 1, 1, '99', '1'),
(645, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:53:04', 6, 1, 1, '99', '1'),
(646, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '10:54:20', 6, 1, 1, '444', '1'),
(647, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:54:20', 6, 1, 1, '444', '1'),
(648, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:54:20', 6, 1, 1, '444', '1'),
(649, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '10:57:23', 6, 1, 1, '99', '1'),
(650, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '10:57:23', 6, 1, 1, '99', '1'),
(651, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-27', '10:57:23', 6, 1, 1, '99', '1'),
(652, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-27', '10:57:23', 6, 1, 1, '99', '1'),
(653, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '11:01:11', 6, 1, 1, '1', 'A'),
(654, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '11:01:11', 6, 1, 1, '1', 'A'),
(655, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '11:01:11', 6, 1, 1, '1', 'A'),
(656, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '11:02:51', 6, 1, 1, '1', 'A'),
(657, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '11:02:51', 6, 1, 1, '1', 'A'),
(658, 0, '427', 'Extra', 10, 1, 10, '2017-12-27', '11:02:51', 6, 1, 1, '1', 'A'),
(659, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A'),
(660, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A'),
(661, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A'),
(662, 0, '354', 'Tangri Masala', 130, 1, 130, '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A'),
(663, 0, '355', 'Half Grill Punjabi Masala', 180, 1, 180, '2017-12-27', '11:04:26', 6, 1, 1, '5', 'A'),
(664, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A'),
(665, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A'),
(666, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A'),
(667, 0, '354', 'Tangri Masala', 130, 1, 130, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A'),
(668, 0, '355', 'Half Grill Punjabi Masala', 180, 1, 180, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A'),
(669, 0, '420', 'Black Current', 70, 1, 70, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A'),
(670, 0, '421', 'Butter Scotch', 70, 1, 70, '2017-12-27', '11:06:16', 6, 1, 1, '5', 'A'),
(671, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-27', '13:18:30', 6, 1, 1, '3', 'B'),
(672, 0, '308', 'Mutton pepper Masala', 140, 1, 140, '2017-12-27', '13:18:30', 6, 1, 1, '3', 'B'),
(673, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-27', '13:18:30', 6, 1, 1, '3', 'B'),
(674, 0, '357', 'Hot Peeper', 120, 1, 120, '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B'),
(675, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B'),
(676, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B'),
(677, 0, '325', 'Plain Briyani', 90, 1, 90, '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B'),
(678, 0, '422', 'water 1 lit', 20, 1, 20, '2017-12-27', '15:45:14', 6, 1, 1, '1', 'B'),
(679, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2017-12-27', '16:38:31', 6, 1, 1, '5', 'A'),
(680, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-27', '16:38:31', 6, 1, 1, '5', 'A'),
(681, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-27', '16:38:31', 6, 1, 1, '5', 'A'),
(682, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-29', '11:18:13', 6, 1, 1, '7', 'B'),
(683, 0, '3', ' Naan', 25, 1, 25, '2017-12-29', '11:18:25', 6, 1, 1, '10', 'A'),
(684, 0, '3', ' Naan', 25, 1, 25, '2017-12-29', '11:18:25', 6, 1, 1, '10', 'A'),
(685, 0, '3', ' Naan', 25, 1, 25, '2017-12-29', '11:18:40', 6, 1, 1, '9', 'A'),
(686, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-29', '13:47:26', 6, 1, 1, '2', 'B'),
(687, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-29', '13:47:26', 6, 1, 1, '2', 'B'),
(688, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A'),
(689, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A'),
(690, 0, '308', 'Mutton pepper Masala', 140, 1, 140, '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A'),
(691, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-29', '15:39:48', 6, 1, 1, '7', 'A'),
(692, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A'),
(693, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A'),
(694, 0, '347', 'Kerala Chicken gravy', 130, 1, 130, '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A'),
(695, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-29', '16:48:43', 6, 1, 1, '5', 'A'),
(696, 0, '348', 'Andra Chicken gravy', 130, 3, 390, '2017-12-29', '17:06:58', 6, 1, 1, '5', 'B'),
(697, 0, '360', 'Chinese pepper Ckn dray', 120, 1, 120, '2017-12-29', '17:06:58', 6, 1, 1, '5', 'B'),
(698, 0, '346', 'Pepper Chicken Masala', 140, 1, 140, '2017-12-29', '17:06:58', 6, 1, 1, '5', 'B'),
(699, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B'),
(700, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B'),
(701, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B'),
(702, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B'),
(703, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B'),
(704, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B'),
(705, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B'),
(706, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-29', '17:08:35', 6, 1, 1, '6', 'B'),
(707, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-29', '17:09:31', 6, 1, 1, '6', 'B'),
(708, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-29', '17:09:31', 6, 1, 1, '6', 'B'),
(709, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:09:31', 6, 1, 1, '6', 'B'),
(710, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B'),
(711, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B'),
(712, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B'),
(713, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B'),
(714, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-29', '17:11:38', 6, 1, 1, '6', 'B'),
(715, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:14:41', 6, 1, 1, '6', 'B'),
(716, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-29', '17:14:41', 6, 1, 1, '6', 'B'),
(717, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-29', '17:14:41', 6, 1, 1, '6', 'B'),
(718, 0, '1', 'Rotti', 20, 1, 20, '2017-12-29', '17:17:07', 6, 1, 1, '1', 'A'),
(719, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-29', '17:17:07', 6, 1, 1, '1', 'A'),
(720, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-29', '17:17:07', 6, 1, 1, '1', 'A'),
(721, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A'),
(722, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A'),
(723, 0, '332', 'Leg Piece 2 pic', 100, 1, 100, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A'),
(724, 0, '347', 'Kerala Chicken gravy', 130, 1, 130, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A'),
(725, 0, '308', 'Mutton pepper Masala', 140, 1, 140, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A'),
(726, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A'),
(727, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-29', '19:02:08', 6, 1, 1, '1', 'A'),
(728, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-30', '13:05:54', 6, 1, 1, '6', 'A'),
(729, 0, '346', 'Pepper Chicken Masala', 140, 1, 140, '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A'),
(730, 0, '347', 'Kerala Chicken gravy', 130, 1, 130, '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A'),
(731, 0, '361', 'Szechuan Chicken dray', 120, 1, 120, '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A'),
(732, 0, '370', 'Grill Pepper Fry Full', 280, 1, 280, '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A'),
(733, 0, '371', 'Grill Pepper Fry Half', 150, 1, 150, '2017-12-30', '13:05:55', 6, 1, 1, '6', 'A'),
(734, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '13:07:22', 6, 1, 1, '3', 'A'),
(735, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-30', '13:07:22', 6, 1, 1, '3', 'A'),
(736, 0, '346', 'Pepper Chicken Masala', 140, 1, 140, '2017-12-30', '13:07:22', 6, 1, 1, '3', 'A'),
(737, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '13:11:25', 6, 1, 1, '3', 'A'),
(738, 0, '331', 'Boneless 65', 100, 1, 100, '2017-12-30', '13:11:25', 6, 1, 1, '3', 'A'),
(739, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B'),
(740, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B'),
(741, 0, '333', 'Lolly Pop 4 pics', 120, 1, 120, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B'),
(742, 0, '359', 'chik Manchurian dray', 120, 1, 120, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B'),
(743, 0, '337', 'Mutton Chetti soup 1/2', 60, 1, 60, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B'),
(744, 0, '320', 'Hyderabad Fish Briyani', 150, 2, 300, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B'),
(745, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-30', '13:26:52', 6, 1, 1, '4', 'B'),
(746, 0, '365', 'Garlic Chicken dray', 120, 1, 120, '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B'),
(747, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B'),
(748, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B'),
(749, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B'),
(750, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-30', '13:29:05', 6, 1, 1, '4', 'B'),
(751, 0, '347', 'Kerala Chicken gravy', 130, 1, 130, '2017-12-30', '13:52:59', 6, 1, 1, '3', 'A'),
(752, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A'),
(753, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A'),
(754, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A'),
(755, 0, '308', 'Mutton pepper Masala', 140, 1, 140, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A'),
(756, 0, '320', 'Hyderabad Fish Briyani', 150, 2, 300, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A'),
(757, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2017-12-30', '14:53:09', 6, 1, 1, '3', 'A'),
(758, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A'),
(759, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A'),
(760, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A'),
(761, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '14:55:36', 6, 1, 1, '3', 'A'),
(762, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-30', '14:57:00', 6, 1, 1, '3', 'A'),
(763, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-30', '14:57:00', 6, 1, 1, '3', 'A'),
(764, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-30', '14:57:31', 6, 1, 1, '4', 'A'),
(765, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-30', '14:58:19', 6, 1, 1, '5', 'A'),
(766, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '14:58:19', 6, 1, 1, '5', 'A'),
(767, 0, '329', 'Nattu Koli Masala', 140, 3, 420, '2017-12-30', '14:58:19', 6, 1, 1, '5', 'A'),
(768, 0, '319', 'Hyderabad Chicken Briyani', 150, 1, 150, '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A'),
(769, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A'),
(770, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A'),
(771, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A'),
(772, 0, '347', 'Kerala Chicken gravy', 130, 3, 390, '2017-12-30', '14:59:52', 6, 1, 1, '4', 'A'),
(773, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A'),
(774, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A'),
(775, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A'),
(776, 0, '307', 'Mutton Gravy', 130, 3, 390, '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A'),
(777, 0, '306', 'Mutton Chukka', 130, 1, 130, '2017-12-30', '15:17:44', 6, 1, 1, '6', 'A'),
(778, 0, '327', 'Nattu Koli Varutha Kari', 130, 1, 130, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B'),
(779, 0, '320', 'Hyderabad Fish Briyani', 150, 2, 300, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B'),
(780, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B'),
(781, 0, '306', 'Mutton Chukka', 130, 2, 260, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B'),
(782, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B'),
(783, 0, '347', 'Kerala Chicken gravy', 130, 2, 260, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B'),
(784, 0, '365', 'Garlic Chicken dray', 120, 2, 240, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B'),
(785, 0, '428', 'Chettinadu Chicken dray', 120, 1, 120, '2017-12-30', '15:20:10', 6, 1, 1, '3', 'B'),
(786, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A'),
(787, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A'),
(788, 0, '314', 'Para Fish Fry', 80, 1, 80, '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A'),
(789, 0, '317', 'Barbic Full Fish 1.5 Kg', 450, 3, 1350, '2017-12-30', '15:27:12', 6, 1, 1, '4', 'A'),
(790, 0, '301', 'Special Shawarma', 120, 1, 120, '2017-12-30', '15:27:37', 6, 1, 1, '4', 'A'),
(791, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '15:27:37', 6, 1, 1, '4', 'A'),
(792, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-30', '15:27:37', 6, 1, 1, '4', 'A'),
(793, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-30', '15:29:21', 6, 1, 1, '4', 'A'),
(794, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '15:29:21', 6, 1, 1, '4', 'A'),
(795, 0, '301', 'Special Shawarma', 120, 2, 240, '2017-12-30', '15:41:41', 6, 1, 1, '4', 'B'),
(796, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2017-12-30', '15:41:41', 6, 1, 1, '4', 'B'),
(797, 0, '301', 'Special Shawarma', 120, 5, 600, '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B'),
(798, 0, '303', 'Plate Shawarma', 130, 1, 130, '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B'),
(799, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B'),
(800, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-30', '15:42:27', 6, 1, 1, '4', 'B'),
(801, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2017-12-30', '15:47:23', 6, 1, 1, '6', 'B'),
(802, 0, '303', 'Plate Shawarma', 130, 2, 260, '2017-12-30', '15:47:23', 6, 1, 1, '6', 'B'),
(803, 0, '320', 'Hyderabad Fish Briyani', 150, 2, 300, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B'),
(804, 0, '321', 'Nikka Mutton Briyani', 140, 2, 280, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B'),
(805, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B'),
(806, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B'),
(807, 0, '326', 'Nattu Koli Fry', 120, 1, 120, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B'),
(808, 0, '307', 'Mutton Gravy', 130, 1, 130, '2017-12-30', '15:50:16', 6, 1, 1, '2', 'B'),
(809, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B'),
(810, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B'),
(811, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B'),
(812, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B'),
(813, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B'),
(814, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B'),
(815, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B'),
(816, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-30', '16:05:41', 6, 1, 1, '4', 'B'),
(817, 0, '409', 'Apple Juice', 60, 1, 60, '2017-12-30', '16:05:56', 6, 1, 1, '4', 'B'),
(818, 0, '410', 'Mango Juice', 50, 1, 50, '2017-12-30', '16:05:56', 6, 1, 1, '4', 'B'),
(819, 0, '411', 'Pinapple Juice', 50, 1, 50, '2017-12-30', '16:05:56', 6, 1, 1, '4', 'B'),
(820, 0, '319', 'Hyderabad Chicken Briyani', 150, 3, 450, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A'),
(821, 0, '307', 'Mutton Gravy', 130, 2, 260, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A'),
(822, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A'),
(823, 0, '321', 'Nikka Mutton Briyani', 140, 2, 280, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A');
INSERT INTO `past_bill_print` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`) VALUES
(824, 0, '418', 'Strawberry', 70, 1, 70, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A'),
(825, 0, '419', 'Mango mil', 70, 2, 140, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A'),
(826, 0, '312', 'Kaadai Gravy', 130, 2, 260, '2017-12-30', '16:06:51', 6, 1, 1, '6', 'A'),
(827, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2017-12-30', '16:11:36', 6, 1, 1, '7', 'B'),
(828, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2017-12-30', '16:11:36', 6, 1, 1, '7', 'B'),
(829, 0, '313', 'Kaadai Tandoori', 120, 1, 120, '2017-12-30', '16:11:36', 6, 1, 1, '7', 'B'),
(830, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B'),
(831, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B'),
(832, 0, '326', 'Nattu Koli Fry', 120, 1, 120, '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B'),
(833, 0, '327', 'Nattu Koli Varutha Kari', 130, 2, 260, '2017-12-30', '16:17:29', 6, 1, 1, '7', 'B'),
(834, 0, '316', 'Barbic Full Fish 1kg', 350, 1, 350, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B'),
(835, 0, '315', 'Vanjaram Fry', 140, 1, 140, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B'),
(836, 0, '314', 'Para Fish Fry', 80, 1, 80, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B'),
(837, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B'),
(838, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B'),
(839, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B'),
(840, 0, '308', 'Mutton pepper Masala', 140, 2, 280, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B'),
(841, 0, '321', 'Nikka Mutton Briyani', 140, 2, 280, '2017-12-30', '16:24:20', 6, 1, 1, '3', 'B'),
(842, 0, '333', 'Lolly Pop 4 pics', 120, 2, 240, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B'),
(843, 0, '332', 'Leg Piece 2 pic', 100, 2, 200, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B'),
(844, 0, '331', 'Boneless 65', 100, 2, 200, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B'),
(845, 0, '330', 'Chicken 65', 70, 2, 140, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B'),
(846, 0, '350', 'Nilagiris nChicken Masala', 140, 4, 560, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B'),
(847, 0, '349', 'Kaadai Chicken gravy', 140, 2, 280, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B'),
(848, 0, '348', 'Andra Chicken gravy', 130, 3, 390, '2017-12-30', '16:25:07', 6, 1, 1, '6', 'B'),
(849, 0, '333', 'Lolly Pop 4 pics', 120, 2, 240, '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A'),
(850, 0, '332', 'Leg Piece 2 pic', 100, 2, 200, '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A'),
(851, 0, '331', 'Boneless 65', 100, 3, 300, '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A'),
(852, 0, '330', 'Chicken 65', 70, 1, 70, '2017-12-30', '16:26:34', 6, 1, 1, '10', 'A'),
(853, 0, '307', 'Mutton Gravy', 130, 3, 390, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(854, 0, '308', 'Mutton pepper Masala', 140, 1, 140, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(855, 0, '334', 'Nattu koli Soup', 60, 2, 120, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(856, 0, '342', 'Clear Soup', 50, 2, 100, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(857, 0, '372', 'Tandoori Full', 260, 2, 520, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(858, 0, '373', 'Tandoori Half', 140, 2, 280, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(859, 0, '405', 'Veg Rice ', 80, 1, 80, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(860, 0, '423', 'Egg noodles', 90, 2, 180, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(861, 0, '402', 'Chicken Rice ', 100, 2, 200, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(862, 0, '401', 'Egg Rice ', 90, 2, 180, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(863, 0, '424', 'Chicken noodles', 100, 1, 100, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(864, 0, '425', 'Szechuan noodles', 110, 1, 110, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(865, 0, '426', 'vag noodles', 80, 1, 80, '2017-12-30', '16:40:41', 6, 1, 1, '10', 'A'),
(866, 0, '307', 'Mutton Gravy', 130, 3, 390, '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A'),
(867, 0, '306', 'Mutton Chukka', 130, 2, 260, '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A'),
(868, 0, '347', 'Kerala Chicken gravy', 130, 2, 260, '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A'),
(869, 0, '337', 'Mutton Chetti soup 1/2', 60, 2, 120, '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A'),
(870, 0, '329', 'Nattu Koli Masala', 140, 2, 280, '2018-01-02', '10:57:14', 6, 1, 1, '10', 'A'),
(871, 0, '301', 'Special Shawarma', 120, 2, 240, '2018-01-02', '10:57:36', 6, 1, 1, '10', 'A'),
(872, 0, '302', 'Special Shawarma 1/2', 120, 5, 600, '2018-01-02', '10:57:36', 6, 1, 1, '10', 'A'),
(873, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A'),
(874, 0, '321', 'Nikka Mutton Briyani', 140, 3, 420, '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A'),
(875, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A'),
(876, 0, '323', 'Nattu Koli Briyani', 140, 1, 140, '2018-01-02', '10:58:19', 6, 1, 1, '9', 'A'),
(877, 0, '311', 'Kaadai Pepper Masala', 130, 1, 130, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B'),
(878, 0, '310', 'kaadai Pepper Fry', 120, 1, 120, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B'),
(879, 0, '309', 'Kaadai Oil Fry', 100, 1, 100, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B'),
(880, 0, '312', 'Kaadai Gravy', 130, 1, 130, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B'),
(881, 0, '321', 'Nikka Mutton Briyani', 140, 2, 280, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B'),
(882, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2018-01-02', '11:00:12', 6, 1, 1, '3', 'B'),
(883, 0, '302', 'Special Shawarma 1/2', 120, 3, 360, '2018-01-02', '11:50:50', 6, 1, 1, '1', 'B'),
(884, 0, '301', 'Special Shawarma', 120, 2, 240, '2018-01-02', '11:50:50', 6, 1, 1, '1', 'B'),
(885, 0, '383', 'Butter Rotti', 30, 1, 30, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A'),
(886, 0, '384', 'Naan', 25, 1, 25, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A'),
(887, 0, '385', 'Butter Naan', 35, 1, 35, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A'),
(888, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A'),
(889, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A'),
(890, 0, '322', 'Kaadai Briyani', 140, 1, 140, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A'),
(891, 0, '304', 'Mutton Raan', 1200, 2, 2400, '2018-01-02', '11:52:05', 6, 1, 1, '4', 'A'),
(892, 0, '301', 'Special Shawarma', 120, 1, 120, '2018-01-02', '11:55:00', 6, 1, 1, '6', 'A'),
(893, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2018-01-02', '11:55:00', 6, 1, 1, '6', 'A'),
(894, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A'),
(895, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A'),
(896, 0, '327', 'Nattu Koli Varutha Kari', 130, 3, 390, '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A'),
(897, 0, '326', 'Nattu Koli Fry', 120, 1, 120, '2018-01-02', '17:44:14', 6, 1, 1, '4', 'A'),
(898, 0, '328', 'Nattu Koli Kulambu', 130, 11, 1430, '2018-01-02', '19:10:35', 6, 1, 1, '9', 'A'),
(899, 0, '315', 'Vanjaram Fry', 140, 2, 280, '2018-01-02', '19:10:35', 6, 1, 1, '9', 'A'),
(900, 0, '1', 'Rotti', 20, 1, 20, '2018-01-02', '19:51:12', 6, 1, 1, '9', 'A'),
(901, 0, '2', 'Butter Rotti', 25, 5, 125, '2018-01-02', '19:51:12', 6, 1, 1, '9', 'A'),
(902, 0, '3', ' Naan', 25, 1, 25, '2018-01-02', '19:51:12', 6, 1, 1, '9', 'A'),
(903, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B'),
(904, 0, '301', 'Special Shawarma', 120, 1, 120, '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B'),
(905, 0, '303', 'Plate Shawarma', 130, 1, 130, '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B'),
(906, 0, '304', 'Mutton Raan', 1200, 1, 1200, '2018-01-03', '16:04:12', 6, 1, 1, '5', 'B'),
(907, 0, '301', 'Special Shawarma', 120, 3, 360, '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A'),
(908, 0, '302', 'Special Shawarma 1/2', 120, 2, 240, '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A'),
(909, 0, '303', 'Plate Shawarma', 130, 2, 260, '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A'),
(910, 0, '321', 'Nikka Mutton Briyani', 140, 2, 280, '2018-01-03', '17:19:34', 6, 1, 1, '1', 'A'),
(911, 0, '320', 'Hyderabad Fish Briyani', 150, 3, 450, '2018-01-03', '17:23:08', 6, 1, 1, '5', 'B'),
(912, 0, '321', 'Nikka Mutton Briyani', 140, 3, 420, '2018-01-03', '17:23:08', 6, 1, 1, '5', 'B'),
(913, 0, '3', ' Naan', 25, 2, 50, '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B'),
(914, 0, '4', 'Butter Naan', 35, 2, 70, '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B'),
(915, 0, '322', 'Kaadai Briyani', 140, 2, 280, '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B'),
(916, 0, '349', 'Kaadai Chicken gravy', 140, 2, 280, '2018-01-03', '17:30:41', 6, 1, 1, '1', 'B'),
(917, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B'),
(918, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B'),
(919, 0, '309', 'Kaadai Oil Fry', 100, 2, 200, '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B'),
(920, 0, '312', 'Kaadai Gravy', 130, 2, 260, '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B'),
(921, 0, '313', 'Kaadai Tandoori', 120, 2, 240, '2018-01-04', '09:52:45', 6, 1, 1, '2', 'B'),
(922, 0, '309', 'Kaadai Oil Fry', 100, 2, 200, '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A'),
(923, 0, '310', 'kaadai Pepper Fry', 120, 2, 240, '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A'),
(924, 0, '311', 'Kaadai Pepper Masala', 130, 2, 260, '2018-01-04', '09:54:20', 6, 1, 1, '9', 'A'),
(925, 0, '329', 'Nattu Koli Masala', 140, 1, 140, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B'),
(926, 0, '328', 'Nattu Koli Kulambu', 130, 1, 130, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B'),
(927, 0, '320', 'Hyderabad Fish Briyani', 150, 1, 150, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B'),
(928, 0, '321', 'Nikka Mutton Briyani', 140, 1, 140, '2018-01-04', '10:33:40', 6, 1, 1, '3', 'B'),
(929, 0, '301', 'Special Shawarma', 120, 1, 120, '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A'),
(930, 0, '302', 'Special Shawarma 1/2', 120, 1, 120, '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A'),
(931, 0, '303', 'Plate Shawarma', 130, 1, 130, '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A'),
(932, 0, '304', 'Mutton Raan', 1200, 2, 2400, '2018-01-04', '13:03:43', 6, 1, 1, '4', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `past_bill_return`
--

CREATE TABLE IF NOT EXISTS `past_bill_return` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `amt` int(10) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `disc_amt` varchar(200) NOT NULL,
  `sub_tot` varchar(200) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(200) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `ser_tax` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `mode` varchar(500) NOT NULL,
  `cust_name` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `roundoff` varchar(200) NOT NULL,
  `ser_charge` varchar(500) NOT NULL,
  `cash` varchar(500) NOT NULL,
  `card` varchar(500) NOT NULL,
  `noofpax` varchar(50) NOT NULL,
  `buffet` int(11) NOT NULL,
  `credit_card` varchar(500) NOT NULL,
  `npb` varchar(500) NOT NULL,
  `rt` varchar(500) NOT NULL,
  `voucher` varchar(500) NOT NULL,
  `discription` varchar(5000) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `past_bill_return`
--

INSERT INTO `past_bill_return` (`bill_id`, `bill_no`, `e_id`, `date`, `time`, `amt`, `discount`, `disc_amt`, `sub_tot`, `sales_id`, `shift`, `tables`, `chair`, `ser_tax`, `vat`, `description`, `mode`, `cust_name`, `mobile`, `status`, `roundoff`, `ser_charge`, `cash`, `card`, `noofpax`, `buffet`, `credit_card`, `npb`, `rt`, `voucher`, `discription`) VALUES
(1, 14, 1, '2017-09-26', '19:46:02', 47, '', '0.00', '40', 1, 1, '1', 'B', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'test'),
(2, 1, 1, '2017-09-28', '13:03:08', 47, '', '0.00', '40', 1, 2, '1', 'A', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'test'),
(3, 2, 1, '2017-09-28', '13:04:17', 47, '', '0.00', '40', 1, 2, '1', 'A', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'test'),
(4, 3, 1, '2017-09-28', '13:06:21', 47, '', '0.00', '40', 1, 2, '1', 'A', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'test'),
(5, 4, 1, '2017-09-28', '13:07:22', 47, '', '0.00', '40', 1, 2, '1', 'A', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'test'),
(6, 3, 1, '2018-01-04', '10:33:40', 560, '', '', '560', 6, 1, '3', 'B', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `past_bill_table`
--

CREATE TABLE IF NOT EXISTS `past_bill_table` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tname` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `waiter` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=52 ;

--
-- Dumping data for table `past_bill_table`
--

INSERT INTO `past_bill_table` (`tid`, `tname`, `chair`, `waiter`, `branch`) VALUES
(1, '1', 'A', 1, 1),
(2, '1', 'B', 1, 1),
(3, '2', 'A', 1, 1),
(4, '2', 'B', 1, 1),
(5, '3', 'A', 1, 1),
(6, '3', 'B', 1, 1),
(7, '4', 'A', 1, 1),
(8, '4', 'B', 1, 1),
(9, '5', 'A', 2, 1),
(10, '5', 'B', 2, 1),
(11, '6', 'A', 2, 1),
(12, '6', 'B', 2, 1),
(13, '7', 'A', 2, 1),
(14, '7', 'B', 2, 1),
(31, '8', 'A', 1, 1),
(32, '9', 'A', 1, 1),
(33, '10', 'A', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `past_bill_temp`
--

CREATE TABLE IF NOT EXISTS `past_bill_temp` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `amt` int(10) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `disc_amt` varchar(200) NOT NULL,
  `sub_tot` varchar(200) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(200) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `ser_tax` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `mode` varchar(500) NOT NULL,
  `cust_name` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `roundoff` varchar(200) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `printer`
--

CREATE TABLE IF NOT EXISTS `printer` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `printer_name` varchar(1000) NOT NULL,
  `billing_print` varchar(500) NOT NULL,
  `kop_print` varchar(500) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `printer`
--

INSERT INTO `printer` (`pid`, `printer_name`, `billing_print`, `kop_print`) VALUES
(1, 'doPDF 8', 'doPDF 8', 'doPDF 8');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `privilege` varchar(500) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`pid`, `privilege`) VALUES
(1, 'cashier'),
(2, 'Bill Clerk'),
(3, 'Captain'),
(4, 'Admin'),
(5, 'Cheff'),
(6, 'Cook'),
(7, 'Asst Cook'),
(8, 'Store Keeper'),
(9, 'Kitchen Asst Helper'),
(10, 'House Keeping'),
(11, 'Security'),
(12, 'Manager'),
(13, 'Steward');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_det`
--

CREATE TABLE IF NOT EXISTS `privilege_det` (
  `pd_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `line` int(11) NOT NULL,
  `parcel` int(11) NOT NULL,
  `tables` int(11) NOT NULL,
  `po` int(11) NOT NULL,
  `poie` int(11) NOT NULL,
  `rs` int(11) NOT NULL,
  `cpd` int(11) NOT NULL,
  `tbr` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `exp_entry` int(11) NOT NULL,
  `reports` int(11) NOT NULL,
  `sclose` int(11) NOT NULL,
  `curr_bill_rep` int(11) NOT NULL,
  `li_sales` int(11) NOT NULL,
  `parcel_sls` int(11) NOT NULL,
  `tbl_sls` int(11) NOT NULL,
  `tbl_sls_rtn` int(11) NOT NULL,
  `hot_sls` int(11) NOT NULL,
  `cre_pur_det` int(11) NOT NULL,
  `exp_rep` int(11) NOT NULL,
  `billwise` int(11) NOT NULL,
  `itmwise` int(11) NOT NULL,
  `cre_sls` int(11) NOT NULL,
  `cre_pur` int(11) NOT NULL,
  `cash_sls` int(11) NOT NULL,
  `cashier_rep` int(11) NOT NULL,
  `owner_box` int(11) NOT NULL,
  `cash_book` int(11) NOT NULL,
  `partybill` int(11) NOT NULL,
  `porty_order` int(11) NOT NULL,
  `po_receipt` int(11) NOT NULL,
  `room_ser` int(11) NOT NULL,
  `outstand` int(11) NOT NULL,
  `inventory` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `sup_pur` int(11) NOT NULL,
  `stock_out` int(11) NOT NULL,
  `stock_adjst` int(11) NOT NULL,
  `exits` int(11) NOT NULL,
  `comm` int(11) NOT NULL,
  `barstock` int(11) NOT NULL,
  `mast` int(11) NOT NULL,
  `apro` int(11) NOT NULL,
  `mcat` int(11) NOT NULL,
  `ecat` int(11) NOT NULL,
  `emast` int(11) NOT NULL,
  `aprod` int(11) NOT NULL,
  `aemp` int(11) NOT NULL,
  `asup` int(11) NOT NULL,
  `acust` int(11) NOT NULL,
  `auser` int(11) NOT NULL,
  `atable` int(11) NOT NULL,
  `pwd` int(11) NOT NULL,
  `atax` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `lin` int(11) NOT NULL,
  `tabl` int(11) NOT NULL,
  `parc` int(11) NOT NULL,
  `party` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `room_rep` int(11) NOT NULL,
  `door` int(11) NOT NULL,
  `foodpanda` int(11) NOT NULL,
  `takeaway` int(11) NOT NULL,
  `canteen` int(11) NOT NULL,
  `sale_tot` int(11) NOT NULL,
  `expens` int(11) NOT NULL,
  `profit_loss` int(11) NOT NULL,
  `npb` int(11) NOT NULL,
  PRIMARY KEY (`pd_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `privilege_det`
--

INSERT INTO `privilege_det` (`pd_id`, `pid`, `sales`, `line`, `parcel`, `tables`, `po`, `poie`, `rs`, `cpd`, `tbr`, `exp`, `exp_entry`, `reports`, `sclose`, `curr_bill_rep`, `li_sales`, `parcel_sls`, `tbl_sls`, `tbl_sls_rtn`, `hot_sls`, `cre_pur_det`, `exp_rep`, `billwise`, `itmwise`, `cre_sls`, `cre_pur`, `cash_sls`, `cashier_rep`, `owner_box`, `cash_book`, `partybill`, `porty_order`, `po_receipt`, `room_ser`, `outstand`, `inventory`, `stock`, `sup_pur`, `stock_out`, `stock_adjst`, `exits`, `comm`, `barstock`, `mast`, `apro`, `mcat`, `ecat`, `emast`, `aprod`, `aemp`, `asup`, `acust`, `auser`, `atable`, `pwd`, `atax`, `profit`, `lin`, `tabl`, `parc`, `party`, `room`, `room_rep`, `door`, `foodpanda`, `takeaway`, `canteen`, `sale_tot`, `expens`, `profit_loss`, `npb`) VALUES
(1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1),
(2, 1, 1, 0, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0),
(3, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `privilege_exp_det`
--

CREATE TABLE IF NOT EXISTS `privilege_exp_det` (
  `peid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `ob_exp` int(11) NOT NULL,
  `on_rec` int(11) NOT NULL,
  `ca_exp` int(11) NOT NULL,
  `ca_rec` int(11) NOT NULL,
  `payroll` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `vesal` int(11) NOT NULL,
  `receipt` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  PRIMARY KEY (`peid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `privilege_exp_det`
--

INSERT INTO `privilege_exp_det` (`peid`, `pid`, `ob_exp`, `on_rec`, `ca_exp`, `ca_rec`, `payroll`, `credit`, `vesal`, `receipt`, `exp`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `privilege_icon_det`
--

CREATE TABLE IF NOT EXISTS `privilege_icon_det` (
  `pid_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `calc` int(11) NOT NULL,
  `logout` int(11) NOT NULL,
  `about` int(11) NOT NULL,
  `help` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  `linebill` int(11) NOT NULL,
  `parcelbill` int(11) NOT NULL,
  `partyodr` int(11) NOT NULL,
  `poitem` int(11) NOT NULL,
  `lodge` int(11) NOT NULL,
  `tables` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `expense` int(11) NOT NULL,
  `shift` int(11) NOT NULL,
  `report` int(11) NOT NULL,
  `calender` int(11) NOT NULL,
  `linedup` int(11) NOT NULL,
  `parceldup` int(11) NOT NULL,
  `tabledup` int(11) NOT NULL,
  `hoteldup` int(11) NOT NULL,
  PRIMARY KEY (`pid_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `privilege_icon_det`
--

INSERT INTO `privilege_icon_det` (`pid_id`, `pid`, `calc`, `logout`, `about`, `help`, `token`, `menu`, `linebill`, `parcelbill`, `partyodr`, `poitem`, `lodge`, `tables`, `credit`, `expense`, `shift`, `report`, `calender`, `linedup`, `parceldup`, `tabledup`, `hoteldup`) VALUES
(1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0),
(2, 2, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0),
(3, 8, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `privilege_token_det`
--

CREATE TABLE IF NOT EXISTS `privilege_token_det` (
  `ptid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `gc` int(11) NOT NULL,
  `gr` int(11) NOT NULL,
  `gh` int(11) NOT NULL,
  PRIMARY KEY (`ptid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `privilege_token_det`
--

INSERT INTO `privilege_token_det` (`ptid`, `pid`, `gc`, `gr`, `gh`) VALUES
(1, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_inward`
--

CREATE TABLE IF NOT EXISTS `product_inward` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `Unit` varchar(11) NOT NULL,
  `inward` varchar(100) NOT NULL,
  `store` varchar(1000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `unit_price` varchar(500) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_outward`
--

CREATE TABLE IF NOT EXISTS `product_outward` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `outward` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_wastage`
--

CREATE TABLE IF NOT EXISTS `product_wastage` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `wastage_qty` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `price` varchar(500) NOT NULL,
  `stock` varchar(500) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prod_cat`
--

CREATE TABLE IF NOT EXISTS `prod_cat` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(1000) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `prod_cat`
--

INSERT INTO `prod_cat` (`prod_id`, `category`) VALUES
(1, 'Milk'),
(2, 'Sugar'),
(3, 'Vegitable'),
(4, 'Egg'),
(5, 'Oil 2 packed');

-- --------------------------------------------------------

--
-- Table structure for table `prod_store_unit`
--

CREATE TABLE IF NOT EXISTS `prod_store_unit` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `units` varchar(500) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `prod_store_unit`
--

INSERT INTO `prod_store_unit` (`pid`, `units`) VALUES
(1, 'Nos'),
(2, 'Kg'),
(3, 'no'),
(4, 'Bgs'),
(5, 'lts'),
(6, 'box'),
(7, 'pkt'),
(8, 'Sqr'),
(9, 'PCS'),
(10, 'Gms'),
(11, 'TIN'),
(12, 'Btl'),
(13, 'Rm'),
(14, 'Rl'),
(15, 'Jr'),
(16, ' KG'),
(17, 'PC'),
(18, 'LT'),
(19, '');

-- --------------------------------------------------------

--
-- Table structure for table `prod_unit`
--

CREATE TABLE IF NOT EXISTS `prod_unit` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) NOT NULL,
  `short_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prod_unit`
--

INSERT INTO `prod_unit` (`uid`, `uname`, `short_name`) VALUES
(1, 'KILOGRAM', 'Kg'),
(2, 'Piece', 'Pcs');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `bill_no` int(25) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `amt` int(10) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `room_no` int(10) NOT NULL,
  `room_id` int(25) NOT NULL AUTO_INCREMENT,
  `ac_name` varchar(250) NOT NULL,
  `hotel` varchar(150) NOT NULL,
  `shift` int(11) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_ac`
--

CREATE TABLE IF NOT EXISTS `room_ac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `total` int(15) NOT NULL,
  `paid` int(15) NOT NULL,
  `bal` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE IF NOT EXISTS `room_details` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` int(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `room_no` int(25) NOT NULL,
  `ac_name` varchar(250) NOT NULL,
  `e_id` int(11) NOT NULL,
  `hotel` varchar(150) NOT NULL,
  `shift` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_reciept`
--

CREATE TABLE IF NOT EXISTS `room_reciept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(70) NOT NULL,
  `amt` int(15) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `room_no` int(25) NOT NULL,
  `ac_name` varchar(250) NOT NULL,
  `hotel` varchar(150) NOT NULL,
  `balance` bigint(20) NOT NULL,
  `shift` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `for_month` varchar(5) NOT NULL,
  `for_year` varchar(10) NOT NULL,
  `bp1` int(10) NOT NULL,
  `bp2` int(10) NOT NULL,
  `incentive` int(10) NOT NULL,
  `basic_sal` varchar(500) NOT NULL,
  `rest_leave` varchar(500) NOT NULL,
  `ot` varchar(500) NOT NULL,
  `owner_ot` varchar(500) NOT NULL,
  `hra` int(10) NOT NULL,
  `pf` bigint(20) NOT NULL,
  `bata` int(10) NOT NULL,
  `advance` int(10) NOT NULL,
  `advance_carry` int(10) NOT NULL,
  `status` varchar(25) NOT NULL,
  `total` varchar(500) NOT NULL,
  `adv_cry_adjt` varchar(500) NOT NULL,
  `net_pay` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary_first_adv`
--

CREATE TABLE IF NOT EXISTS `salary_first_adv` (
  `sfa_id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `dates` varchar(500) NOT NULL,
  `times` varchar(500) NOT NULL,
  `for_month` varchar(500) NOT NULL,
  `for_year` varchar(500) NOT NULL,
  `advance_carry` varchar(500) NOT NULL,
  PRIMARY KEY (`sfa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary_fs`
--

CREATE TABLE IF NOT EXISTS `salary_fs` (
  `sal_id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `dates` varchar(500) NOT NULL,
  `times` varchar(500) NOT NULL,
  `for_month` varchar(500) NOT NULL,
  `for_year` varchar(500) NOT NULL,
  `from_date` varchar(500) NOT NULL,
  `to_date` varchar(500) NOT NULL,
  `pre` int(11) NOT NULL,
  `abs` int(11) NOT NULL,
  `rest` int(11) NOT NULL,
  `basic_sal` varchar(500) NOT NULL,
  `rest_sal` varchar(500) NOT NULL,
  `ot` varchar(500) NOT NULL,
  `total_sal` varchar(500) NOT NULL,
  `own_ot` varchar(500) NOT NULL,
  `bata` varchar(500) NOT NULL,
  `hra` varchar(500) NOT NULL,
  `total_colect` varchar(500) NOT NULL,
  `carry_adv` varchar(500) NOT NULL,
  `cur_adv` varchar(500) NOT NULL,
  `tot_adv` varchar(500) NOT NULL,
  `pf` varchar(500) NOT NULL,
  `net_pay` varchar(500) NOT NULL,
  `over_adv` varchar(500) NOT NULL,
  `incentive` varchar(500) NOT NULL,
  `advance_cry_adj` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
  `shift_id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_name` varchar(150) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `shift_order` int(11) NOT NULL,
  `create_id` bigint(20) NOT NULL,
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift_name`, `start_time`, `end_time`, `shift_order`, `create_id`) VALUES
(1, 'Morning', '09:00:00 AM', '01:00:00 PM', 1, 1001),
(2, 'Evening', '01:00:00 PM', '08:00:00 PM', 2, 1001);

-- --------------------------------------------------------

--
-- Table structure for table `shift_details`
--

CREATE TABLE IF NOT EXISTS `shift_details` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `opening_cash` double NOT NULL,
  `closing_cash` double NOT NULL,
  `opening_coins` bigint(50) NOT NULL,
  `closing_coins` bigint(50) NOT NULL,
  `opening_date` varchar(50) NOT NULL,
  `opening_time` varchar(50) NOT NULL,
  `closing_date` varchar(50) NOT NULL,
  `closing_time` varchar(50) NOT NULL,
  `myip` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`det_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `shift_details`
--

INSERT INTO `shift_details` (`det_id`, `shift_id`, `emp_id`, `opening_cash`, `closing_cash`, `opening_coins`, `closing_coins`, `opening_date`, `opening_time`, `closing_date`, `closing_time`, `myip`, `status`) VALUES
(1, 1, 1, 0, 0, 0, 0, '2017-17-14', '12:18:50 PM', '2017-07-14', '12:16:10 PM', '192.168.1.13', 0),
(2, 2, 2, 0, 2181, 0, 0, '2017-07-14', '12:18:50 PM', '2017-07-14', '12:16:10 PM', '192.168.1.13', 0),
(10, 2, 1, 2181, 6423, 0, 142, '2017-07-22', '16:36:56 PM', '2017-07-22', '11:35:50 PM', '192.168.1.13', 0),
(11, 2, 1, 6423, 2321.8, 142, 0, '2017-07-23', '12:08:14 PM', '2017-07-23', '11:18:25 PM', '192.168.1.13', 0),
(12, 1, 1, 2321.8, 10829.05, 0, 0, '2017-07-24', '11:42:01 AM', '2017-07-24', '11:19:08 PM', '192.168.1.13', 0),
(13, 2, 2, 10829.05, 2279.05, 0, 0, '2017-07-24', '23:24:24 PM', '2017-07-24', '11:32:38 PM', '192.168.1.13', 0),
(14, 1, 1, 2279.05, 2658.05, 0, 0, '2017-07-25', '11:31:33 AM', '2017-07-25', '11:20:58 PM', '192.168.1.13', 0),
(15, 2, 2, 2658.05, 0.05, 0, 0, '2017-07-25', '23:26:35 PM', '2017-07-25', '11:32:12 PM', '192.168.1.13', 0),
(16, 2, 1, 0.05, 0.25, 0, 0, '2017-07-26', '18:24:04 PM', '2017-07-26', '11:14:21 PM', '192.168.1.13', 0),
(17, 2, 1, 0.25, 0.35, 0, 0, '2017-07-27', '12:34:16 PM', '2017-07-27', '11:20:39 PM', '192.168.1.13', 0),
(18, 2, 1, 0.35, 7739.1, 0, 0, '2017-07-28', '12:49:44 PM', '2017-07-28', '11:20:50 PM', '192.168.1.13', 0),
(19, 1, 1, 7739.1, 156.1, 0, 0, '2017-07-29', '11:45:49 AM', '2017-07-29', '11:51:37 PM', '192.168.1.13', 0),
(20, 2, 2, 156.1, 156.1, 0, 0, '2017-07-29', '23:53:18 PM', '2017-07-29', '11:56:12 PM', '192.168.1.13', 0),
(21, 2, 2, 156.1, 91.02, 0, 0, '2017-07-30', '12:19:11 PM', '2017-07-30', '11:13:09 PM', '192.168.1.13', 0),
(22, 1, 1, 91.02, 5.02, 0, 0, '2017-07-31', '11:47:50 AM', '2017-07-31', '11:49:48 PM', '192.168.1.13', 0),
(23, 2, 1, 5.02, 0.17, 0, 0, '2017-08-01', '12:26:45 PM', '2017-08-01', '11:11:55 PM', '192.168.1.13', 0),
(24, 1, 1, 0.17, 0.71, 0, 0, '2017-08-02', '11:45:17 AM', '2017-08-02', '11:18:40 PM', '192.168.1.13', 0),
(25, 1, 1, 0.71, 0.31, 0, 0, '2017-08-03', '11:50:24 AM', '2017-08-03', '11:45:49 PM', '192.168.1.13', 0),
(26, 2, 2, 0.31, 0.31, 0, 0, '2017-08-04', '12:27:05 PM', '2017-08-04', '11:50:37 PM', '192.168.1.13', 0),
(27, 2, 2, 0.31, 12613.31, 0, 0, '2017-08-05', '12:03:45 PM', '2017-08-05', '11:43:18 PM', '192.168.1.13', 0),
(28, 1, 2, 12613.31, 0.51, 0, 0, '2017-08-06', '11:21:27 AM', '2017-08-06', '11:13:28 PM', '192.168.1.13', 0),
(29, 1, 1, 0.51, 2988.89, 0, 0, '2017-08-07', '11:23:04 AM', '2017-08-07', '11:06:37 PM', '192.168.1.13', 0),
(30, 1, 1, 2988.89, 3000.89, 0, 0, '2017-08-08', '11:30:28 AM', '2017-08-08', '11:11:40 PM', '192.168.1.13', 0),
(31, 2, 1, 3000.89, 2999.91, 0, 0, '2017-08-09', '12:34:57 PM', '2017-08-09', '11:25:46 PM', '192.168.1.13', 0),
(32, 2, 1, 2999.91, 3212.33, 0, 0, '2017-08-10', '12:08:13 PM', '2017-08-10', '11:35:40 PM', '192.168.1.13', 0),
(33, 1, 1, 3212.33, 6326.17, 0, 0, '2017-08-11', '11:53:09 AM', '2017-08-11', '11:09:57 PM', '192.168.1.13', 0),
(34, 2, 2, 6326.17, 3216.17, 0, 0, '2017-08-11', '23:10:43 PM', '2017-08-11', '11:16:56 PM', '192.168.1.13', 0),
(35, 1, 1, 3216.17, 3215.69, 0, 0, '2017-08-12', '11:57:13 AM', '2017-08-12', '11:25:23 PM', '192.168.1.13', 0),
(36, 1, 2, 3215.69, 2428.19, 0, 0, '2017-08-13', '11:28:17 AM', '2017-08-13', '11:08:28 PM', '192.168.1.13', 0),
(37, 2, 1, 2428.19, 2987.98, 0, 0, '2017-08-14', '12:34:51 PM', '2017-08-14', '11:30:31 PM', '192.168.1.13', 0),
(38, 1, 1, 2987.98, 3016.3, 0, 0, '2017-08-15', '11:18:45 AM', '2017-08-15', '11:11:26 PM', '192.168.1.13', 0),
(39, 1, 1, 3016.3, 3040.18, 0, 0, '2017-08-16', '11:57:48 AM', '2017-08-16', '11:26:06 PM', '192.168.1.13', 0),
(40, 1, 1, 3040.18, 3078.4, 0, 0, '2017-08-17', '11:28:07 AM', '2017-08-17', '11:21:44 PM', '192.168.1.13', 0),
(41, 2, 1, 3078.4, 3671.49, 0, 0, '2017-08-18', '13:01:35 PM', '2017-08-18', '11:28:14 PM', '192.168.1.13', 0),
(42, 1, 1, 3671.49, 3671.1, 0, 0, '2017-08-19', '11:32:44 AM', '2017-08-19', '11:17:15 PM', '192.168.1.13', 0),
(43, 1, 1, 3671.1, 3680.34, 0, 0, '2017-08-20', '11:37:16 AM', '2017-08-20', '11:30:22 PM', '192.168.1.13', 0),
(44, 1, 1, 3680.34, 3734.51, 0, 0, '2017-08-21', '11:56:32 AM', '2017-08-21', '11:23:24 PM', '192.168.1.13', 0),
(45, 1, 2, 3734.51, 3662.65, 0, 0, '2017-08-22', '11:54:49 AM', '2017-08-22', '11:16:21 PM', '192.168.1.13', 0),
(46, 2, 1, 3662.65, 3362.65, 0, 0, '2017-08-22', '23:21:33 PM', '2017-08-22', '11:22:06 PM', '192.168.1.13', 0),
(47, 1, 1, 3362.65, 3482.47, 0, 0, '2017-08-23', '11:54:33 AM', '2017-08-23', '11:24:45 PM', '192.168.1.13', 0),
(48, 1, 1, 3482.47, 3482.47, 0, 0, '2017-08-24', '11:44:26 AM', '2017-08-24', '11:24:43 PM', '192.168.1.13', 0),
(49, 2, 1, 3482.47, 3420.47, 0, 0, '2017-08-25', '13:19:32 PM', '2017-08-25', '11:04:09 PM', '192.168.1.13', 0),
(50, 1, 2, 3420.47, 3388.47, 0, 0, '2017-08-26', '11:45:46 AM', '2017-08-26', '11:14:44 PM', '192.168.1.13', 0),
(51, 1, 2, 3388.47, 3455.92, 0, 0, '2017-08-27', '11:48:26 AM', '2017-08-27', '11:01:17 PM', '192.168.1.13', 0),
(52, 1, 1, 3455.92, 3494.92, 0, 0, '2017-08-28', '11:32:44 AM', '2017-08-28', '11:06:05 PM', '192.168.1.13', 0),
(53, 2, 1, 3494.92, 3521.46, 0, 0, '2017-08-29', '12:03:03 PM', '2017-08-29', '11:07:12 PM', '192.168.1.13', 0),
(54, 1, 1, 3521.46, 3535.64, 0, 0, '2017-08-30', '11:42:46 AM', '2017-08-30', '11:19:41 PM', '192.168.1.13', 0),
(55, 2, 1, 3535.64, 3538.97, 0, 0, '2017-08-31', '12:10:42 PM', '2017-08-31', '11:15:05 PM', '192.168.1.13', 0),
(56, 1, 1, 3538.97, 3506.97, 0, 0, '2017-09-01', '10:40:26 AM', '2017-09-01', '11:16:51 PM', '192.168.1.13', 0),
(57, 1, 1, 3506.97, 2977.23, 0, 0, '2017-09-02', '11:36:14 AM', '2017-09-03', '12:05:48 AM', '192.168.1.13', 0),
(58, 1, 1, 2977.23, 3871.17, 0, 0, '2017-09-03', '10:47:26 AM', '2017-09-03', '11:31:56 PM', '192.168.1.13', 0),
(59, 2, 2, 3871.17, 2914.17, 0, 0, '2017-09-03', '23:34:18 PM', '2017-09-03', '11:38:11 PM', '192.168.1.13', 0),
(60, 1, 1, 2914.17, 2286.41, 0, 0, '2017-09-04', '10:47:32 AM', '2017-09-04', '11:57:32 PM', '192.168.1.13', 0),
(61, 1, 2, 2286.41, 2363.41, 0, 0, '2017-09-05', '00:01:13 AM', '2017-09-05', '12:03:10 AM', '192.168.1.13', 0),
(62, 2, 1, 2363.41, 2214.41, 0, 0, '2017-09-05', '12:05:52 PM', '2017-09-06', '11:37:04 AM', '192.168.1.13', 0),
(63, 1, 2, 2214.41, 2214.41, 0, 0, '2017-09-06', '11:38:12 AM', '2017-09-06', '12:02:53 PM', '192.168.1.13', 0),
(64, 2, 1, 2214.41, 11051.41, 0, 0, '2017-09-06', '13:18:10 PM', '2017-09-06', '11:20:34 PM', '192.168.1.13', 0),
(65, 1, 1, 11051.41, 10900.54, 0, 0, '2017-09-07', '11:47:18 AM', '2017-09-07', '11:27:51 PM', '192.168.1.13', 0),
(66, 2, 1, 10900.54, 3206.24, 0, 0, '2017-09-08', '12:20:01 PM', '2017-09-08', '11:06:18 PM', '192.168.1.13', 0),
(67, 1, 1, 3206.24, 3225.06, 0, 0, '2017-09-09', '11:30:50 AM', '2017-09-09', '11:22:27 PM', '192.168.1.13', 0),
(68, 1, 1, 3225.06, 3186.06, 0, 0, '2017-09-10', '11:32:07 AM', '2017-09-10', '11:21:22 PM', '192.168.1.13', 0),
(69, 1, 2, 3186.06, 3190.86, 0, 0, '2017-09-11', '11:58:47 AM', '2017-09-11', '11:21:06 PM', '192.168.1.13', 0),
(70, 1, 2, 3190.86, 3206.52, 0, 0, '2017-09-12', '11:16:17 AM', '2017-09-12', '11:17:53 PM', '192.168.1.13', 0),
(71, 1, 2, 3206.52, 3210.06, 0, 0, '2017-09-13', '11:15:04 AM', '2017-09-13', '11:28:51 PM', '192.168.1.13', 0),
(72, 2, 1, 3210.06, 8719.96, 0, 0, '2017-09-14', '12:45:14 PM', '2017-09-14', '11:14:44 PM', '192.168.1.13', 0),
(73, 1, 2, 8719.96, 3284.55, 0, 0, '2017-09-15', '11:50:01 AM', '2017-09-15', '08:42:55 PM', '192.168.1.13', 0),
(74, 2, 2, 3284.55, 3211.24, 0, 0, '2017-09-16', '12:36:14 PM', '2017-09-16', '11:24:43 PM', '192.168.1.13', 0),
(75, 1, 2, 3211.24, 3234.24, 0, 0, '2017-09-17', '11:39:06 AM', '2017-09-17', '11:14:49 PM', '192.168.1.13', 0),
(76, 2, 1, 3234.24, 3273.24, 0, 0, '2017-09-18', '12:47:21 PM', '2017-09-18', '11:45:12 PM', '192.168.1.13', 0),
(77, 2, 1, 3273.24, 12364.74, 0, 0, '2017-09-22', '13:28:31 PM', '2017-09-22', '11:11:30 PM', '192.168.1.13', 0),
(78, 1, 2, 12364.74, 3283.74, 0, 0, '2017-09-23', '11:37:19 AM', '2017-09-23', '11:25:48 PM', '192.168.1.13', 0),
(79, 2, 2, 3283.74, 3260.45, 0, 0, '2017-09-24', '12:02:43 PM', '2017-09-24', '11:32:03 PM', '192.168.1.13', 0),
(80, 1, 2, 3260.45, 3127.33, 0, 0, '2017-09-25', '11:51:11 AM', '2017-09-25', '10:58:20 PM', '192.168.1.13', 0),
(81, 1, 1, 3127.33, 3219.77, 0, 0, '2017-09-26', '11:45:40 AM', '2017-09-26', '11:09:10 PM', '192.168.1.13', 0),
(82, 1, 1, 3219.77, 3210.77, 0, 0, '2017-09-27', '11:03:34 AM', '2017-09-27', '11:28:21 PM', '192.168.1.13', 0),
(83, 2, 1, 3210.77, 3186.77, 0, 0, '2017-09-28', '12:15:35 PM', '2017-09-28', '10:46:46 PM', '192.168.1.13', 0),
(84, 2, 2, 3186.77, 3234.77, 0, 0, '2017-09-29', '12:27:26 PM', '2017-09-29', '11:07:25 PM', '192.168.1.13', 0),
(85, 2, 2, 3234.77, 3185.03, 0, 0, '2017-09-30', '12:27:39 PM', '2017-09-30', '11:23:57 PM', '192.168.1.13', 0),
(86, 1, 2, 3185.03, 3191.11, 0, 0, '2017-10-01', '11:53:31 AM', '2017-10-01', '11:21:00 PM', '192.168.1.13', 0),
(87, 2, 2, 3191.11, 3171.5, 0, 0, '2017-10-02', '12:30:33 PM', '2017-10-02', '11:04:40 PM', '192.168.1.13', 0),
(88, 1, 1, 3171.5, 2939.5, 0, 0, '2017-10-03', '11:56:25 AM', '2017-10-03', '11:17:33 PM', '192.168.1.13', 0),
(89, 1, 1, 2939.5, 2672.5, 0, 0, '2017-10-04', '11:40:05 AM', '2017-10-04', '11:19:50 PM', '192.168.1.13', 0),
(90, 1, 1, 2672.5, 2198.03, 0, 0, '2017-10-05', '11:20:11 AM', '2017-10-05', '11:02:05 PM', '192.168.1.13', 0),
(91, 2, 1, 2198.03, 2299.95, 0, 0, '2017-10-06', '12:45:07 PM', '2017-10-06', '11:04:32 PM', '192.168.1.13', 0),
(92, 1, 1, 2299.95, 2283.87, 0, 0, '2017-10-07', '11:51:06 AM', '2017-10-07', '11:09:03 PM', '192.168.1.13', 0),
(93, 1, 1, 2283.87, 2287.05, 0, 0, '2017-10-08', '11:50:53 AM', '2017-10-08', '11:16:30 PM', '192.168.1.13', 0),
(94, 1, 2, 2287.05, 10330.92, 0, 0, '2017-10-09', '11:56:10 AM', '2017-10-09', '10:55:47 PM', '192.168.1.13', 0),
(95, 2, 1, 10330.92, 2330.92, 0, 0, '2017-10-09', '23:03:59 PM', '2017-10-09', '11:11:37 PM', '192.168.1.13', 0),
(96, 1, 2, 2330.92, 2361.66, 0, 0, '2017-10-10', '11:35:46 AM', '2017-10-10', '11:38:00 PM', '192.168.1.13', 0),
(97, 2, 1, 2361.66, 119956.66, 0, 0, '2017-10-11', '23:41:29 PM', '2017-11-03', '10:26:46 AM', '192.168.1.101', 0),
(98, 1, 1, 119956.66, 145012.66, 0, 0, '2017-11-03', '10:27:37 AM', '2017-11-04', '12:09:55 PM', '192.168.1.101', 0),
(99, 2, 1, 145012.66, 146109.66, 0, 0, '2017-11-04', '12:10:37 PM', '2017-11-06', '10:10:22 AM', '192.168.1.101', 0),
(100, 1, 1, 146109.66, 147094.66, 0, 0, '2017-11-06', '10:11:01 AM', '2017-12-04', '12:38:13 PM', '192.168.1.2', 0),
(101, 2, 1, 147094.66, 150452.66, 0, 0, '2017-12-04', '12:40:57 PM', '2017-12-05', '11:51:51 AM', '192.168.1.2', 0),
(102, 1, 1, 150452.66, 4546.66, 0, 0, '2017-12-05', '11:52:12 AM', '2017-12-05', '10:26:50 PM', '192.168.1.2', 0),
(103, 2, 1, 4546.66, 39841.66, 0, 0, '2017-12-06', '12:07:22 PM', '2017-12-07', '12:10:07 PM', '192.168.1.2', 0),
(104, 2, 1, 39841.66, 68056.66, 0, 0, '2017-12-07', '12:10:55 PM', '2017-12-08', '06:07:23 PM', '192.168.1.2', 0),
(105, 2, 1, 68056.66, 88626.66, 0, 0, '2017-12-08', '18:11:02 PM', '2017-12-08', '11:02:10 PM', '192.168.1.2', 0),
(106, 1, 1, 88626.66, 141991.66, 0, 0, '2017-12-09', '11:05:58 AM', '2017-12-10', '11:37:25 AM', '192.168.1.2', 0),
(107, 1, 1, 141991.66, 204541.66, 0, 0, '2017-12-10', '11:38:10 AM', '2017-12-11', '12:18:41 PM', '192.168.1.2', 0),
(109, 2, 1, 0, -179406, 0, 0, '2017-12-11', '12:31:33 PM', '2017-12-11', '11:12:11 PM', '192.168.1.2', 0),
(110, 1, 1, -179406, -150381, 0, 0, '2017-12-12', '11:25:36 AM', '2017-12-12', '11:03:08 PM', '192.168.1.2', 0),
(111, 1, 1, -150381, -119486, 0, 0, '2017-12-14', '11:58:56 AM', '2017-12-14', '11:15:02 PM', '192.168.1.2', 0),
(112, 2, 1, -119486, -105816, 0, 0, '2017-12-15', '17:54:59 PM', '2017-12-16', '11:19:09 AM', '192.168.1.2', 0),
(113, 1, 1, -105816, 0, 0, 0, '2017-12-16', '11:19:49 AM', '', '', '192.168.1.106', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shift_lock`
--

CREATE TABLE IF NOT EXISTS `shift_lock` (
  `sl_id` int(11) NOT NULL AUTO_INCREMENT,
  `place` varchar(500) NOT NULL,
  `position` varchar(500) NOT NULL,
  `locked` varchar(500) NOT NULL,
  PRIMARY KEY (`sl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shift_lock`
--

INSERT INTO `shift_lock` (`sl_id`, `place`, `position`, `locked`) VALUES
(1, 'cust_det', 'none', '1'),
(2, 'condi_yester', 'none', ''),
(4, 'supplier_entry', 'none', ''),
(3, 'token_entry', 'none', '');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` int(11) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `product_code`, `product_name`, `unit`, `stock`, `date`) VALUES
(1, 1, 'BROWNIE( KERRY) [ 1 KG ] ', '2', 30, '2017-07-12 19:47:33'),
(2, 15, 'LEAF', '1', 1, '2017-09-26 20:21:12'),
(3, 18, 'kuboos', '1', 1, '2017-09-26 20:59:54'),
(4, 10, 'OIL', '18', 7, '2017-10-09 20:00:58'),
(5, 19, 'PANDIAN ELECTRICALS', '19', 1, '2017-10-04 22:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `store_adjust`
--

CREATE TABLE IF NOT EXISTS `store_adjust` (
  `s_adst` int(11) NOT NULL AUTO_INCREMENT,
  `p_code` int(11) NOT NULL,
  `p_name` varchar(300) NOT NULL,
  `stock` int(11) NOT NULL,
  `date` varchar(300) NOT NULL,
  `qty` int(11) NOT NULL,
  `adjust_type` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `units` varchar(500) NOT NULL,
  PRIMARY KEY (`s_adst`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `store_cat`
--

CREATE TABLE IF NOT EXISTS `store_cat` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(200) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `store_cat`
--

INSERT INTO `store_cat` (`sid`, `store_name`) VALUES
(1, 'Store1');

-- --------------------------------------------------------

--
-- Table structure for table `store_history`
--

CREATE TABLE IF NOT EXISTS `store_history` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `emp_no` int(11) NOT NULL,
  `emp_name` varchar(500) NOT NULL,
  `kitchen` varchar(200) NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `date` varchar(100) NOT NULL,
  `tot_stock` bigint(20) NOT NULL,
  `rem_stock` bigint(20) NOT NULL,
  `unit_price` varchar(500) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `store_kitchen`
--

CREATE TABLE IF NOT EXISTS `store_kitchen` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `kitchen` varchar(200) NOT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `store_kitchen`
--

INSERT INTO `store_kitchen` (`kid`, `kitchen`) VALUES
(1, 'LA CHOCOLATE');

-- --------------------------------------------------------

--
-- Table structure for table `store_location`
--

CREATE TABLE IF NOT EXISTS `store_location` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `store_location`
--

INSERT INTO `store_location` (`lid`, `location_name`) VALUES
(1, 'Backery '),
(2, 'Production ');

-- --------------------------------------------------------

--
-- Table structure for table `takeaway`
--

CREATE TABLE IF NOT EXISTS `takeaway` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `amt` int(10) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `disc_amt` varchar(200) NOT NULL,
  `sub_tot` varchar(200) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(200) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `ser_tax` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `mode` varchar(500) NOT NULL,
  `cust_name` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `roundoff` varchar(200) NOT NULL,
  `ser_charge` varchar(500) NOT NULL,
  `cash` varchar(500) NOT NULL,
  `card` varchar(500) NOT NULL,
  `buffet` int(11) NOT NULL,
  `credit_card` varchar(500) NOT NULL,
  `npb` varchar(500) NOT NULL,
  `rt` varchar(500) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `takeaway`
--

INSERT INTO `takeaway` (`bill_id`, `bill_no`, `e_id`, `date`, `time`, `amt`, `discount`, `disc_amt`, `sub_tot`, `sales_id`, `shift`, `tables`, `chair`, `ser_tax`, `vat`, `description`, `mode`, `cust_name`, `mobile`, `status`, `roundoff`, `ser_charge`, `cash`, `card`, `buffet`, `credit_card`, `npb`, `rt`) VALUES
(1, 1, 1, '2018-01-03', '16:43:09', 1740, '', '', '1740', 6, 1, '1', '1', '0', '0', '', '', '', '', 'Paid', '', '', '0', '0', 0, '0', '0', '0'),
(2, 2, 1, '2018-01-03', '16:43:52', 1000, '', '', '1000', 6, 1, '1', '2', '', '', '', '', '', '', 'Paid', '', '', '0', '0', 0, '0', '0', '0'),
(3, 3, 1, '2018-01-03', '16:44:48', 1050, '', '', '1050', 6, 1, '1', '1', '', '', '', '', '', '', 'Paid', '', '', '0', '0', 0, '0', '0', '0'),
(4, 4, 1, '2018-01-03', '16:53:23', 640, '', '', '640', 6, 1, '1', '1', '', '', '', '', '', '', 'Paid', '', '', '0', '0', 0, '0', '0', '0'),
(5, 5, 1, '2018-01-03', '17:04:06', 640, '', '', '640', 6, 1, '1', '1', '0', '0', '', '', '', '', 'Paid', '', '', '0', '0', 0, '0', '0', '0'),
(6, 1, 1, '2018-01-04', '10:47:44', 220, '', '', '220', 6, 1, '1', '1', '', '', '', '', '', '', 'Paid', '', '', '0', '0', 0, '0', '0', '0'),
(7, 2, 1, '2018-01-04', '11:16:11', 210, '', '', '210', 6, 1, '1', '1', '', '', '', '', '', '', 'Paid', '', '', '0', '0', 0, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `takeaway_details`
--

CREATE TABLE IF NOT EXISTS `takeaway_details` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=27 ;

--
-- Dumping data for table `takeaway_details`
--

INSERT INTO `takeaway_details` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `remarks`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`) VALUES
(1, 1, '301', 'Special Shawarma', 120, 1, '', 120, '2018-01-03', '16:42:41', 6, 1, 1, '1', '1'),
(2, 1, '302', 'Special Shawarma 1/2', 120, 1, '', 120, '2018-01-03', '16:42:41', 6, 1, 1, '1', '1'),
(3, 1, '303', 'Plate Shawarma', 130, 1, '', 130, '2018-01-03', '16:42:41', 6, 1, 1, '1', '1'),
(4, 1, '304', 'Mutton Raan', 1200, 1, '', 1200, '2018-01-03', '16:42:41', 6, 1, 1, '1', '1'),
(5, 1, '337', 'Mutton Chetti soup 1/2', 60, 2, '', 120, '2018-01-03', '16:42:41', 6, 1, 1, '1', '1'),
(6, 1, '3', ' Naan', 25, 2, '', 50, '2018-01-03', '16:43:09', 6, 1, 1, '1', '1'),
(7, 2, '321', 'Nikka Mutton Briyani', 140, 1, '', 140, '2018-01-03', '16:43:52', 6, 1, 1, '1', '2'),
(8, 2, '320', 'Hyderabad Fish Briyani', 150, 2, '', 300, '2018-01-03', '16:43:52', 6, 1, 1, '1', '2'),
(9, 2, '322', 'Kaadai Briyani', 140, 2, '', 280, '2018-01-03', '16:43:52', 6, 1, 1, '1', '2'),
(10, 2, '323', 'Nattu Koli Briyani', 140, 2, '', 280, '2018-01-03', '16:43:52', 6, 1, 1, '1', '2'),
(11, 3, '396', 'Paneer Butter Masala', 130, 3, '', 390, '2018-01-03', '16:44:48', 6, 1, 1, '1', '1'),
(12, 3, '398', 'Mushroom Pepper Fry', 110, 4, '', 440, '2018-01-03', '16:44:48', 6, 1, 1, '1', '1'),
(13, 3, '400', 'Mushroom Chilly', 110, 2, '', 220, '2018-01-03', '16:44:48', 6, 1, 1, '1', '1'),
(14, 4, '308', 'Mutton pepper Masala', 140, 1, '', 140, '2018-01-03', '16:53:23', 6, 1, 1, '1', '1'),
(15, 4, '307', 'Mutton Gravy', 130, 1, '', 130, '2018-01-03', '16:53:23', 6, 1, 1, '1', '1'),
(16, 4, '306', 'Mutton Chukka', 130, 1, '', 130, '2018-01-03', '16:53:23', 6, 1, 1, '1', '1'),
(17, 4, '362', '20*20', 120, 2, '', 240, '2018-01-03', '16:53:23', 6, 1, 1, '1', '1'),
(18, 5, '332', 'Leg Piece 2 pic', 100, 4, '', 400, '2018-01-03', '16:55:44', 6, 1, 1, '1', '1'),
(19, 5, '333', 'Lolly Pop 4 pics', 120, 2, '', 240, '2018-01-03', '17:04:06', 6, 1, 1, '1', '1'),
(20, 1, '337', 'Mutton Chetti soup 1/2', 60, 1, '', 60, '2018-01-04', '10:47:44', 6, 1, 1, '1', '1'),
(21, 1, '338', 'Chicken Chettinadu Soup', 50, 1, '', 50, '2018-01-04', '10:47:44', 6, 1, 1, '1', '1'),
(22, 1, '339', 'Chicken Chetti Soup 1/2', 60, 1, '', 60, '2018-01-04', '10:47:44', 6, 1, 1, '1', '1'),
(23, 1, '340', 'Hot & Sour Soup', 50, 1, '', 50, '2018-01-04', '10:47:44', 6, 1, 1, '1', '1'),
(24, 2, '336', 'Mutton Chettinadu soup', 50, 1, '', 50, '2018-01-04', '11:16:11', 6, 1, 1, '1', '1'),
(25, 2, '337', 'Mutton Chetti soup 1/2', 60, 1, '', 60, '2018-01-04', '11:16:11', 6, 1, 1, '1', '1'),
(26, 2, '338', 'Chicken Chettinadu Soup', 50, 2, '', 100, '2018-01-04', '11:16:11', 6, 1, 1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `takeaway_details_return`
--

CREATE TABLE IF NOT EXISTS `takeaway_details_return` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `bill_no` int(25) NOT NULL,
  `itm_code` varchar(15) NOT NULL,
  `item` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `amt` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sales_id` int(5) NOT NULL,
  `e_id` bigint(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(500) NOT NULL,
  `chair` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=16 ;

--
-- Dumping data for table `takeaway_details_return`
--

INSERT INTO `takeaway_details_return` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `remarks`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`) VALUES
(1, 1, '148', 'Chicken Rice', 80, 1, '', 80, '2017-12-12', '11:47:18', 0, 1, 1, '', ''),
(2, 2, '148', 'Chicken Rice', 80, 1, '', 80, '2017-12-12', '11:47:33', 0, 1, 1, '', ''),
(3, 3, '13', '1KG chicken Briyani', 140, 1, '', 140, '2017-12-12', '11:48:15', 0, 1, 1, '', ''),
(4, 4, '56', 'Nattu Koli Varutha K', 120, 1, '', 120, '2017-12-12', '11:49:46', 0, 1, 1, '', ''),
(5, 5, '148', 'Chicken Rice', 80, 1, '', 80, '2017-12-12', '12:03:15', 0, 1, 1, '', ''),
(6, 6, '148', 'Chicken Rice', 80, 1, '', 80, '2017-12-12', '12:19:20', 0, 1, 1, '', ''),
(7, 6, '13', '1KG chicken Briyani', 140, 2, '', 280, '2017-12-12', '12:19:20', 0, 1, 1, '', ''),
(8, 6, '132', 'Grill Fry Half', 150, 2, '', 300, '2017-12-12', '12:19:20', 0, 1, 1, '', ''),
(9, 6, '3', ' Naan', 25, 16, '', 400, '2017-12-12', '12:19:20', 0, 1, 1, '', ''),
(10, 6, '4', 'Butter Naan', 35, 1, '', 35, '2017-12-12', '12:19:20', 0, 1, 1, '', ''),
(11, 6, '1', 'Rotti', 20, 4, '', 80, '2017-12-12', '12:19:20', 0, 1, 1, '', ''),
(12, 6, '2', 'Butter Rotti', 25, 5, '', 125, '2017-12-12', '12:19:20', 0, 1, 1, '', ''),
(13, 7, '148', 'Chicken Rice', 80, 6, '', 480, '2017-12-12', '12:22:04', 0, 1, 1, '', ''),
(14, 9, '148', 'Chicken Rice', 80, 1, '', 80, '2017-12-12', '13:04:02', 0, 1, 1, '', ''),
(15, 17, '35', 'Para Fish Fry', 70, 2, '', 140, '2017-12-13', '13:24:25', 0, 1, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `takeaway_return`
--

CREATE TABLE IF NOT EXISTS `takeaway_return` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `e_id` int(5) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `amt` int(10) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `disc_amt` varchar(200) NOT NULL,
  `sub_tot` varchar(200) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `shift` int(11) NOT NULL,
  `tables` varchar(200) NOT NULL,
  `chair` varchar(500) NOT NULL,
  `ser_tax` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `mode` varchar(500) NOT NULL,
  `cust_name` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `roundoff` varchar(200) NOT NULL,
  `ser_charge` varchar(500) NOT NULL,
  `cash` varchar(500) NOT NULL,
  `card` varchar(500) NOT NULL,
  `discription` text NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `takeaway_return`
--

INSERT INTO `takeaway_return` (`bill_id`, `bill_no`, `e_id`, `date`, `time`, `amt`, `discount`, `disc_amt`, `sub_tot`, `sales_id`, `shift`, `tables`, `chair`, `ser_tax`, `vat`, `description`, `mode`, `cust_name`, `mobile`, `status`, `roundoff`, `ser_charge`, `cash`, `card`, `discription`) VALUES
(1, 1, 1, '2017-12-12', '11:47:18', 80, '0', '0', '80', 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', 'test'),
(2, 2, 1, '2017-12-12', '11:47:33', 80, '', '0', '80', 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', 'jjk'),
(3, 3, 1, '2017-12-12', '11:48:15', 140, '', '0', '140', 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', 'klk'),
(4, 4, 1, '2017-12-12', '11:49:46', 120, '', '0', '120', 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', 'kjj\n'),
(5, 5, 1, '2017-12-12', '12:03:15', 80, '0', '0', '80', 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', 'jj\n'),
(6, 6, 1, '2017-12-12', '12:19:20', 1350, '', '0', '1350', 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', 'kkcdxc'),
(7, 7, 1, '2017-12-12', '12:22:04', 560, '0', '0', '560', 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', 'hjhj'),
(8, 9, 1, '2017-12-12', '13:04:02', 80, '0', '0', '80', 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', 'jjk\n'),
(9, 17, 1, '2017-12-13', '13:24:25', 140, '', '0', '140', 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', 'kiio');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tax_name` varchar(500) NOT NULL,
  `tax_per` varchar(11) NOT NULL,
  `itm_code` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`tid`, `tax_name`, `tax_per`, `itm_code`, `cat`) VALUES
(1, 'SGST', '0', 1, 1),
(2, 'CGST', '0', 0, 1),
(3, 'SC', '0', 0, 1),
(4, 'SGST', '0', 0, 2),
(5, 'CGST', '0', 0, 2),
(6, 'ST', '0', 0, 2),
(7, 'SGST', '0', 0, 3),
(8, 'CGST', '0', 0, 3),
(9, 'SC', '0', 0, 3),
(10, 'SGST', '0', 0, 4),
(11, 'CGST', '0', 0, 4),
(12, 'SC', '0', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tax_cat`
--

CREATE TABLE IF NOT EXISTS `tax_cat` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(500) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tax_cat`
--

INSERT INTO `tax_cat` (`tid`, `cat`) VALUES
(1, 'Table Sales'),
(2, 'Take away'),
(3, 'Foodpanda'),
(4, 'Door Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `times` varchar(200) NOT NULL,
  `dates` varchar(500) NOT NULL,
  `ct` varchar(500) NOT NULL,
  `rt` varchar(500) NOT NULL,
  `ht` varchar(500) NOT NULL,
  `total` varchar(500) NOT NULL,
  `emp_id` varchar(500) NOT NULL,
  `shift` varchar(500) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unitwise_price_line`
--

CREATE TABLE IF NOT EXISTS `unitwise_price_line` (
  `upid` int(11) NOT NULL AUTO_INCREMENT,
  `icode` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`upid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=431 ;

--
-- Dumping data for table `unitwise_price_line`
--

INSERT INTO `unitwise_price_line` (`upid`, `icode`, `unit`, `price`) VALUES
(1, 1, 2, '20'),
(2, 2, 2, '25'),
(3, 3, 2, '25'),
(4, 4, 2, '35'),
(5, 5, 2, '30'),
(6, 6, 2, '35'),
(7, 7, 2, '30'),
(8, 8, 2, '20'),
(9, 9, 2, '20'),
(10, 10, 2, '80'),
(11, 11, 2, '80'),
(12, 12, 2, '30'),
(13, 13, 2, '140'),
(14, 14, 2, '220'),
(15, 15, 2, '150'),
(16, 16, 2, '110'),
(17, 17, 2, '280'),
(18, 18, 2, '150'),
(19, 19, 2, '350'),
(20, 20, 2, '450'),
(21, 21, 2, '150'),
(22, 22, 2, '120'),
(23, 23, 2, '120'),
(24, 24, 2, '120'),
(25, 25, 2, '130'),
(26, 26, 2, '90'),
(27, 27, 2, '100'),
(28, 28, 2, '120'),
(29, 29, 2, '120'),
(30, 30, 2, '150'),
(31, 31, 2, ''),
(32, 32, 2, ''),
(33, 33, 2, ''),
(34, 34, 2, '130'),
(35, 35, 2, '70'),
(36, 36, 2, '80'),
(37, 37, 2, ''),
(38, 38, 2, ''),
(39, 39, 2, ''),
(40, 40, 2, ''),
(41, 41, 2, '140'),
(42, 42, 2, '150'),
(43, 43, 2, '150'),
(44, 44, 2, '120'),
(45, 45, 2, '120'),
(46, 46, 2, '80'),
(47, 47, 2, '90'),
(48, 48, 2, '80'),
(49, 49, 2, '90'),
(50, 50, 2, '120'),
(51, 51, 2, ''),
(52, 52, 2, ''),
(53, 53, 2, ''),
(54, 54, 2, ''),
(55, 55, 2, '120'),
(56, 56, 2, '120'),
(57, 57, 2, '120'),
(58, 58, 2, '130'),
(59, 59, 2, ''),
(60, 60, 2, ''),
(61, 61, 2, ''),
(62, 62, 2, ''),
(63, 63, 2, '90'),
(64, 64, 2, '70'),
(65, 65, 2, '50'),
(66, 66, 2, '70'),
(67, 67, 2, '90'),
(68, 68, 2, '70'),
(69, 69, 2, ''),
(70, 70, 2, ''),
(71, 71, 2, ''),
(72, 72, 2, ''),
(73, 73, 2, ''),
(74, 74, 2, '60'),
(75, 75, 2, '60'),
(76, 76, 2, ''),
(77, 77, 2, '50'),
(78, 78, 2, '50'),
(79, 79, 2, '50'),
(80, 80, 2, ''),
(81, 81, 2, ''),
(82, 82, 2, ''),
(83, 83, 2, '140'),
(84, 84, 2, '120'),
(85, 85, 2, '90'),
(86, 86, 2, '12'),
(87, 87, 2, '90'),
(88, 88, 2, '120'),
(89, 89, 2, '110'),
(90, 90, 2, '130'),
(91, 91, 2, '100'),
(92, 92, 2, '120'),
(93, 93, 2, '100'),
(94, 94, 2, '120'),
(95, 95, 2, '100'),
(96, 96, 2, '120'),
(97, 97, 2, '130'),
(98, 98, 2, '130'),
(99, 99, 2, '130'),
(100, 100, 2, '180'),
(101, 101, 2, '130'),
(102, 102, 2, '130'),
(103, 103, 2, '130'),
(104, 104, 2, '140'),
(105, 105, 2, ''),
(106, 106, 2, ''),
(107, 107, 2, '100'),
(108, 108, 2, '100'),
(109, 109, 2, '100'),
(110, 110, 2, '100'),
(111, 111, 2, '100'),
(112, 112, 2, '100'),
(113, 113, 2, '100'),
(114, 114, 2, '100'),
(115, 115, 2, '100'),
(116, 116, 2, '100'),
(117, 117, 2, '100'),
(118, 118, 2, ''),
(119, 119, 2, ''),
(120, 120, 2, '90'),
(121, 121, 2, '120'),
(122, 122, 2, ''),
(123, 123, 2, ''),
(124, 124, 2, ''),
(125, 125, 2, '240'),
(126, 126, 2, '130'),
(127, 127, 2, '280'),
(128, 128, 2, '140'),
(129, 129, 2, '240'),
(130, 130, 2, '130'),
(131, 131, 2, '280'),
(132, 132, 2, '150'),
(133, 133, 2, '260'),
(134, 134, 2, '140'),
(135, 135, 2, '80'),
(136, 136, 2, '90'),
(137, 137, 2, '110'),
(138, 138, 2, '110'),
(139, 139, 2, '110'),
(140, 140, 2, '80'),
(141, 141, 2, ''),
(142, 142, 2, ''),
(143, 143, 2, ''),
(144, 144, 2, '60'),
(145, 145, 2, '60'),
(146, 146, 2, '70'),
(147, 147, 2, '70'),
(148, 148, 2, '80'),
(149, 149, 2, '80'),
(150, 150, 2, '90'),
(151, 151, 2, '90'),
(152, 152, 2, '70'),
(153, 153, 2, '70'),
(154, 154, 2, ''),
(155, 155, 2, ''),
(156, 156, 2, ''),
(157, 157, 2, ''),
(158, 158, 2, ''),
(159, 159, 2, ''),
(160, 160, 2, '100'),
(161, 161, 2, '100'),
(162, 162, 2, '100'),
(163, 163, 2, '120'),
(164, 164, 2, '120'),
(165, 165, 2, '100'),
(166, 166, 2, '100'),
(167, 167, 2, '100'),
(168, 168, 2, '90'),
(169, 169, 2, '80'),
(170, 170, 2, ''),
(171, 171, 2, ''),
(172, 172, 2, ''),
(173, 173, 2, ''),
(174, 174, 2, ''),
(175, 175, 2, '40'),
(176, 176, 2, '60'),
(177, 177, 2, '25'),
(178, 178, 2, '35'),
(179, 179, 2, '40'),
(180, 180, 2, '60'),
(181, 181, 2, '15'),
(182, 182, 2, '20'),
(183, 183, 0, ''),
(184, 184, 0, ''),
(185, 185, 0, ''),
(186, 186, 0, ''),
(187, 187, 0, ''),
(188, 188, 0, ''),
(189, 189, 0, ''),
(190, 190, 0, ''),
(191, 191, 0, ''),
(192, 192, 0, ''),
(193, 193, 0, ''),
(194, 194, 0, ''),
(195, 195, 0, ''),
(196, 196, 0, ''),
(197, 197, 0, ''),
(198, 198, 0, ''),
(199, 199, 0, ''),
(200, 200, 0, ''),
(201, 201, 0, ''),
(202, 202, 0, ''),
(203, 203, 0, ''),
(204, 204, 0, ''),
(205, 205, 0, ''),
(206, 206, 0, ''),
(207, 207, 0, ''),
(208, 208, 0, ''),
(209, 209, 0, ''),
(210, 210, 0, ''),
(211, 211, 0, ''),
(212, 212, 0, ''),
(213, 213, 0, ''),
(214, 214, 0, ''),
(215, 215, 0, ''),
(216, 216, 0, ''),
(217, 217, 0, ''),
(218, 218, 0, ''),
(219, 219, 0, ''),
(220, 220, 0, ''),
(221, 221, 0, ''),
(222, 222, 0, ''),
(223, 223, 0, ''),
(224, 224, 0, ''),
(225, 225, 0, ''),
(226, 226, 0, ''),
(227, 227, 0, ''),
(228, 228, 0, ''),
(229, 229, 0, ''),
(230, 230, 0, ''),
(231, 231, 0, ''),
(232, 232, 0, ''),
(233, 233, 0, ''),
(234, 234, 0, ''),
(235, 235, 0, ''),
(236, 236, 0, ''),
(237, 237, 0, ''),
(238, 238, 0, ''),
(239, 239, 0, ''),
(240, 240, 0, ''),
(241, 241, 0, ''),
(242, 242, 0, ''),
(243, 243, 0, ''),
(244, 244, 0, ''),
(245, 245, 0, ''),
(246, 246, 0, ''),
(247, 247, 0, ''),
(248, 248, 0, ''),
(249, 249, 0, ''),
(250, 250, 0, ''),
(251, 251, 0, ''),
(252, 252, 0, ''),
(253, 253, 0, ''),
(254, 254, 0, ''),
(255, 255, 0, ''),
(256, 256, 0, ''),
(257, 257, 0, ''),
(258, 258, 0, ''),
(259, 259, 0, ''),
(260, 260, 0, ''),
(261, 261, 0, ''),
(262, 262, 0, ''),
(263, 263, 0, ''),
(264, 264, 0, ''),
(265, 265, 0, ''),
(266, 266, 0, ''),
(267, 267, 0, ''),
(268, 268, 0, ''),
(269, 269, 0, ''),
(270, 270, 0, ''),
(271, 271, 0, ''),
(272, 272, 0, ''),
(273, 273, 0, ''),
(274, 274, 0, ''),
(275, 275, 0, ''),
(276, 276, 0, ''),
(277, 277, 0, ''),
(278, 278, 0, ''),
(279, 279, 0, ''),
(280, 280, 0, ''),
(281, 281, 0, ''),
(282, 282, 0, ''),
(283, 283, 0, ''),
(284, 284, 0, ''),
(285, 285, 0, ''),
(286, 286, 0, ''),
(287, 287, 0, ''),
(288, 288, 0, ''),
(289, 289, 0, ''),
(290, 290, 0, ''),
(291, 291, 0, ''),
(292, 292, 0, ''),
(293, 293, 0, ''),
(294, 294, 0, ''),
(295, 295, 0, ''),
(296, 296, 0, ''),
(297, 297, 0, ''),
(298, 298, 0, ''),
(299, 299, 0, ''),
(300, 300, 3, '100'),
(301, 301, 3, '120'),
(302, 302, 3, '120'),
(303, 303, 3, '130'),
(304, 304, 3, '1200'),
(305, 305, 4, '130'),
(306, 306, 4, '130'),
(307, 307, 4, '130'),
(308, 308, 4, '140'),
(309, 309, 5, '100'),
(310, 310, 5, '120'),
(311, 311, 5, '130'),
(312, 312, 5, '130'),
(313, 313, 5, '120'),
(314, 314, 6, '80'),
(315, 315, 6, '140'),
(316, 316, 6, '350'),
(317, 317, 6, '450'),
(318, 318, 7, '160'),
(319, 319, 7, '150'),
(320, 320, 7, '150'),
(321, 321, 7, '140'),
(322, 322, 7, '140'),
(323, 323, 7, '140'),
(324, 324, 7, '110'),
(325, 325, 7, '90'),
(326, 326, 8, '120'),
(327, 327, 8, '130'),
(328, 328, 8, '130'),
(329, 329, 8, '140'),
(330, 330, 9, '70'),
(331, 331, 9, '100'),
(332, 332, 9, '100'),
(333, 333, 9, '120'),
(334, 334, 10, '60'),
(335, 335, 10, '70'),
(336, 336, 10, '50'),
(337, 337, 2, '60'),
(338, 338, 10, '50'),
(339, 339, 2, '60'),
(340, 340, 10, '50'),
(341, 341, 2, '60'),
(342, 342, 10, '50'),
(343, 343, 10, '60'),
(344, 344, 2, '130'),
(345, 345, 2, '130'),
(346, 346, 11, '140'),
(347, 347, 2, '130'),
(348, 348, 2, '130'),
(349, 349, 2, '140'),
(350, 350, 11, '140'),
(351, 351, 11, '140'),
(352, 352, 11, '140'),
(353, 353, 11, '140'),
(354, 354, 11, '130'),
(355, 355, 11, '180'),
(356, 356, 2, '120'),
(357, 357, 12, '120'),
(358, 358, 2, '120'),
(359, 360, 2, '120'),
(360, 359, 2, '120'),
(361, 361, 2, '120'),
(362, 362, 12, '120'),
(363, 363, 12, '120'),
(364, 364, 2, '120'),
(365, 365, 2, '120'),
(366, 366, 13, '260'),
(367, 367, 2, '140'),
(368, 368, 13, '280'),
(369, 369, 13, '150'),
(370, 370, 13, '280'),
(371, 371, 13, '150'),
(372, 372, 13, '260'),
(373, 373, 13, '140'),
(374, 374, 13, '300'),
(375, 375, 13, '160'),
(376, 376, 13, '90'),
(377, 377, 13, '100'),
(378, 378, 13, '90'),
(379, 379, 13, '120'),
(380, 380, 13, '120'),
(381, 381, 13, '120'),
(382, 382, 14, '25'),
(383, 383, 14, '30'),
(384, 384, 14, '25'),
(385, 385, 14, '35'),
(386, 386, 14, '30'),
(387, 387, 14, '35'),
(388, 388, 14, '35'),
(389, 389, 2, '25'),
(390, 390, 14, '30'),
(391, 391, 14, '90'),
(392, 392, 14, '90'),
(393, 393, 15, '120'),
(394, 394, 15, '120'),
(395, 395, 15, '120'),
(396, 396, 15, '130'),
(397, 397, 15, '130'),
(398, 398, 15, '110'),
(399, 399, 15, '110'),
(400, 400, 15, '110'),
(401, 401, 2, '90'),
(402, 402, 2, '100'),
(403, 403, 2, '110'),
(404, 404, 2, '90'),
(405, 405, 2, '80'),
(406, 406, 17, '20'),
(407, 407, 2, '25'),
(408, 408, 2, '30'),
(409, 409, 17, '60'),
(410, 410, 17, '50'),
(411, 411, 17, '50'),
(412, 412, 17, '40'),
(413, 413, 17, '40'),
(414, 414, 17, '40'),
(415, 415, 17, '40'),
(416, 416, 18, '70'),
(417, 417, 18, '70'),
(418, 418, 18, '70'),
(419, 419, 2, '70'),
(420, 420, 18, '70'),
(421, 421, 18, '70'),
(422, 422, 2, '20'),
(423, 424, 2, '100'),
(424, 425, 2, '110'),
(425, 426, 2, '80'),
(426, 427, 2, '10'),
(427, 434, 2, '20'),
(428, 435, 2, '700'),
(429, 436, 2, '500'),
(430, 437, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`UserID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vessel`
--

CREATE TABLE IF NOT EXISTS `vessel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book` varchar(5) NOT NULL,
  `bill_no` varchar(5) NOT NULL,
  `vessel` varchar(50) NOT NULL,
  `qty` int(5) NOT NULL,
  `state` int(1) NOT NULL,
  `date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
