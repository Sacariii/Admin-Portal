-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 23, 2020 at 09:10 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `pass`, `name`, `role`) VALUES
('tech_admin', 'test', 'Sam', 'TECH'),
('hr_admin', 'imaboss', 'Will Pocklington', 'HR'),
('sales_admin', 'sales', 'Ronu Coronu', 'SALES'),
('finance_admin', 'money', 'MoneyMan', 'Finance'),
('support_admin', 'pass1', 'john', 'Support');
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `role` varchar(20) NOT NULL,
  `link` varchar(512) NOT NULL,
  `purpose` varchar(512) NOT NULL,
  PRIMARY KEY (`role`,`link`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`role`, `link`, `purpose`) VALUES
('HR', 'https://uh.edu/sugarland/students/advisors/', 'New Hire On-Boarding'),
('HR', 'http://www2.cs.uh.edu/~rsingh/#', 'Benefits'),
('HR', 'https://uh.edu/sugarland/students/information-technology/', 'Payroll'),
('HR', 'https://uh.edu/sugarland/students/study-areas/', 'Off-Boarding'),
('HR', 'https://uh.edu/', 'HR Reports'),
('TECH', 'https://uh.edu/sugarland/about/directions-to-campus/', 'Application Monitoring'),
('TECH', 'https://www.uh.edu/about/', 'Tech Support'),
('TECH', 'https://www.uh.edu/academics/', 'App Developement'),
('TECH', 'https://uh.edu/sugarland/students/information-technology/labs/', 'App Admin'),
('TECH', 'https://www.uh.edu/campus-life/', 'Release Management'),
('SALES', 'https://www.uh.edu/uh-research/', 'Sales Reports'),
('SALES', 'https://www.uh.edu/athletics/', 'Sales Leads'),
('SALES', 'https://uh.edu/sugarland/', 'Sales Demo'),
('FINANCE', 'https://uh.edu/sugarland/about/', 'Finance Reports'),
('FINANCE', 'https://uh.edu/sugarland/students/', 'Accounts Payable'),
('FINANCE', 'https://uh.edu/sugarland/degree-programs/', 'Accounts Receivable'),
('FINANCE', 'https://uh.edu/sugarland/faculty-staff/', 'Tax'),
('Support', 'https://uh.edu/sugarland/news/', 'Help Desk'),
('Support', 'https://uh.edu/sugarland/campus-services/', 'Assign Roles'),
('Support', 'https://uh.edu/sugarland/partnerships/', 'Manage User Accounts');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
