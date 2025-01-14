-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2023 at 05:38 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(100) NOT NULL,
  `user_uname` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_name`, `user_uname`, `user_pwd`) VALUES
(1, 'Administrator', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `app_id` int(11) NOT NULL auto_increment,
  `app_ten` int(11) NOT NULL,
  `app_sup` int(11) NOT NULL,
  `app_value` int(11) NOT NULL,
  `email` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`app_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`app_id`, `app_ten`, `app_sup`, `app_value`, `email`) VALUES
(1, 2, 1, 3100100, ''),
(2, 2, 3, 3100200, ''),
(3, 2, 2, 3100150, ''),
(4, 3, 3, 3600000, ''),
(5, 4, 1, 400000, ''),
(6, 4, 3, 450000, ''),
(7, 1, 3, 3000000, ''),
(9, 7, 1, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL auto_increment,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_uname` varchar(100) NOT NULL,
  `cust_pwd` varchar(100) NOT NULL,
  PRIMARY KEY  (`cust_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_uname`, `cust_pwd`) VALUES
(1, 'Saravanan', 'sara@gmail.com', 'sara', 'sara'),
(2, 'Mahendran', 'mahe@gmail.com', 'mahe', 'mahe');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` int(11) NOT NULL auto_increment,
  `supp_name` varchar(100) NOT NULL,
  `supp_email` varchar(100) NOT NULL,
  `supp_uname` varchar(100) NOT NULL,
  `supp_pwd` varchar(100) NOT NULL,
  PRIMARY KEY  (`supp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `supp_name`, `supp_email`, `supp_uname`, `supp_pwd`) VALUES
(1, 'Richard Dennis', 'rich@gmail.com', 'rich', 'rich'),
(2, 'Shiyam Prashant', 'shiam@gmail.com', 'shiam', 'shiam'),
(3, 'Hariharan', 'hari@gmail.com', 'hari', 'hari');

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `ten_id` int(11) NOT NULL auto_increment,
  `ten_title` varchar(100) collate latin1_general_ci NOT NULL,
  `ten_dept` varchar(100) collate latin1_general_ci NOT NULL,
  `ten_type` varchar(100) collate latin1_general_ci NOT NULL,
  `ten_value` varchar(100) collate latin1_general_ci NOT NULL,
  `ten_loc` varchar(100) collate latin1_general_ci NOT NULL,
  `ten_odate` date NOT NULL,
  `ten_cdate` date NOT NULL,
  `ten_user` int(11) NOT NULL,
  `ten_to` int(11) NOT NULL,
  `ten_status` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ten_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`ten_id`, `ten_title`, `ten_dept`, `ten_type`, `ten_value`, `ten_loc`, `ten_odate`, `ten_cdate`, `ten_user`, `ten_to`, `ten_status`) VALUES
(6, 'computer science', 'c++', 'balagurusamy', '2', 'NV publications', '2023-12-21', '2023-12-31', 1, 0, 'Published'),
(7, 'compter science', 'vb.net', 'guru', '1', 'NV publications', '2023-12-21', '2023-12-31', 1, 1, 'Allotted'),
(8, 'ece', 'embedded', 'raja', '1', 'ss', '2023-12-21', '2023-12-31', 1, 0, 'Published');
