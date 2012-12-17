-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2012 at 01:58 PM
-- Server version: 5.1.50
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `researchportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ProjectId` varchar(50) DEFAULT NULL,
  `dataset` float(10,0) DEFAULT NULL,
  `communication` float(10,0) DEFAULT NULL,
  `field` float(10,0) DEFAULT NULL,
  `photocopying` float(10,0) DEFAULT NULL,
  `stationery` float DEFAULT NULL,
  `domestictravel` float DEFAULT NULL,
  `localconveyance` float DEFAULT NULL,
  `accomodation` float DEFAULT NULL,
  `contingency` float DEFAULT NULL,
  `software` float DEFAULT NULL,
  `dessimination` float DEFAULT NULL,
  `recurring` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`Date`, `ProjectId`, `dataset`, `communication`, `field`, `photocopying`, `stationery`, `domestictravel`, `localconveyance`, `accomodation`, `contingency`, `software`, `dessimination`, `recurring`) VALUES
('0000-00-00 00:00:00', '10', 1000, 1111, 222, 456, 500, 300, 1500, 5000, 0, 999, 0, 0),
('0000-00-00 00:00:00', '1', 1000, 1111, 222, 456, 500, 300, 1500, 5000, 0, 999, 0, 0),
('0000-00-00 00:00:00', '12', 300, 777, 245, 765, 1111, 9000, 700, 4000, 555, 400, 150, 0),
('0000-00-00 00:00:00', '12', NULL, NULL, 1600, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, 0),
('0000-00-00 00:00:00', '12 ', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 0),
('0000-00-00 00:00:00', '12 ', 669, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 669, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '2 ', 1000, 350, 0, 0, 0, 0, 0, 0, 0, 1000, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '22 ', 550, 1000, 0, 50, 0, 0, 0, 0, 0, 0, 800, 0),
('0000-00-00 00:00:00', '12 ', 130, 878, 0, 0, 0, 0, 0, 0, 0, 454656, 0, 0),
('0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', '12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 733),
('0000-00-00 00:00:00', '12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 733),
('2012-11-10 17:12:12', '22 ', 1000, 0, 0, 355, 0, 3000, 0, 0, 0, 200, 0, 0),
('0000-00-00 00:00:00', '10', 1000, 1111, 222, 456, 500, 300, 1500, 5000, 0, 999, 0, 0),
('0000-00-00 00:00:00', '1', 1000, 1111, 222, 456, 500, 300, 1500, 5000, 0, 999, 0, 0),
('0000-00-00 00:00:00', '12', 300, 777, 245, 765, 1111, 9000, 700, 4000, 555, 400, 150, 0),
('0000-00-00 00:00:00', '12', NULL, NULL, 1600, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, 0),
('0000-00-00 00:00:00', '12 ', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 0),
('0000-00-00 00:00:00', '12 ', 669, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 669, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '2 ', 1000, 350, 0, 0, 0, 0, 0, 0, 0, 1000, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '22 ', 550, 1000, 0, 50, 0, 0, 0, 0, 0, 0, 800, 0),
('0000-00-00 00:00:00', '12 ', 130, 878, 0, 0, 0, 0, 0, 0, 0, 454656, 0, 0),
('0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', '12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 733),
('0000-00-00 00:00:00', '12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 733),
('2012-11-10 17:12:12', '22 ', 1000, 0, 0, 355, 0, 3000, 0, 0, 0, 200, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `Project_ID` bigint(200) NOT NULL,
  `Comment` varchar(5000) NOT NULL,
  `Comment_type` varchar(50) NOT NULL,
  `User` varchar(50) NOT NULL,
  `User_type` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Project_ID`, `Comment`, `Comment_type`, `User`, `User_type`, `Date`) VALUES
(900, 'jgdjsgbdbgjdbgmndsbfdmnsgbjdsf ndfbgdjsgbjfgbdgjfg bjhbgfsjdbgjbdgfbhgbfdhbjfd', 'faculty_application', 'fac', 4, '2012-12-03 07:17:42'),
(900, 'jvhdjsbg,d,g":Sdgl;/dg/dfmglkfshdgkjbdsfn/;''.,', 'faculty_application', 'fac', 4, '2012-12-03 07:23:56'),
(42, 'aaaaaaaaaaaaaaa', 'admin-approve', 'sdsd', 1, '2012-12-03 14:13:39'),
(52, 'asasas', 'admin_approve', 'admin', 1, '2012-12-03 14:37:39'),
(51, 'ffjf', 'admin_reject', 'admin', 1, '2012-12-03 14:37:58'),
(51, 'ffjf', 'admin_reject', 'admin', 1, '2012-12-03 14:39:41'),
(51, 'ffjf', 'admin_reject', 'admin', 1, '2012-12-03 14:46:45'),
(55, 'dgdfgfdg', 'admin_approve', 'admin', 1, '2012-12-03 14:47:20'),
(51, 'asfsfsdfdsfds', 'admin_reject_extension', 'admin', 1, '2012-12-03 17:58:37'),
(32, 'llll', 'admin_approve_extension', 'admin', 1, '2012-12-03 18:05:05'),
(45, 'dfgdffg', 'admin_approve_extension', 'admin', 1, '2012-12-03 18:10:26'),
(36, 'fdgdgdfgfd', 'fafgfd', 'fdgdg', 4, '2012-12-03 18:23:25'),
(36, 'bfgfg', 'rdgdttertr', 'gfhgf', 2, '2012-12-03 18:23:25'),
(36, 'Test Comment from Admin', 'admin_approve_extension', 'admin', 1, '2012-12-03 18:59:56'),
(12, 'hello, sending for your Approval', 'admin_approve_extension', 'admin', 1, '2012-12-03 19:12:08'),
(12, 'dear chairman please approve this project 12', 'admin_approve_completion', 'admin', 1, '2012-12-03 21:48:39'),
(2, 'dear admin lease consider this for completion', 'faculty_completed', 'anurag', 4, '2012-12-03 22:21:11'),
(12, 'reconsider', 'admin_approve_extension', 'admin', 1, '2012-12-03 22:22:48'),
(2, 'approve it admin', 'faculty_completed', 'anurag', 4, '2012-12-03 22:44:08'),
(2, 'please approve admin', 'faculty_completed', 'anurag', 4, '2012-12-03 22:48:38'),
(2, 'consider for app admin', 'faculty_completed', 'anurag', 4, '2012-12-03 22:52:54'),
(2, 'pleaSE APPROVE', 'faculty_extension', 'anurag', 4, '2012-12-04 09:34:45'),
(2, 'Sir please approve!', 'admin_approve_extension', 'admin', 1, '2012-12-04 09:35:33'),
(54, 'Seems ok!', 'admin_approve', 'admin', 1, '2012-12-15 18:38:45'),
(8, 'The project requirements are met!', 'admin_approve', 'admin', 1, '2012-12-15 18:46:30'),
(3, '', 'committee_approve', 'comm', 2, '2012-12-17 12:16:12'),
(3, '', 'committee_approve', 'comm', 2, '2012-12-17 12:40:04'),
(3, '', 'committee_approve', 'comm', 2, '2012-12-17 12:42:29'),
(3, 'Nikhil is testing', 'committee_approve', 'comm', 2, '2012-12-17 12:44:31'),
(3, 'Nikhil is testing', 'committee_approve', 'comm', 2, '2012-12-17 12:46:03'),
(3, '', 'committee_approve', 'comm', 2, '2012-12-17 12:46:16'),
(3, '', 'committee_approve', 'comm', 2, '2012-12-17 12:47:26'),
(3, '', 'committee_approve', 'comm', 2, '2012-12-17 12:50:46'),
(3, '', 'committee_approve', 'comm1', 2, '2012-12-17 12:52:37'),
(3, '', 'committee_approve', 'comm2', 2, '2012-12-17 12:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE IF NOT EXISTS `conference` (
  `ConferenceTitle` varchar(400) NOT NULL,
  `ConferenceId` int(200) NOT NULL AUTO_INCREMENT,
  `Description` varchar(2000) NOT NULL,
  `App_Date` date NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Researcher1` varchar(80) NOT NULL,
  `ConferenceCategory` text NOT NULL,
  `ConferenceGrant` int(11) NOT NULL,
  `CStatus` varchar(50) NOT NULL,
  `Block_number` bigint(100) NOT NULL DEFAULT '0' COMMENT 'first block 1st jan 2001- each block of 3 years; 0 for student',
  PRIMARY KEY (`ConferenceId`),
  UNIQUE KEY `ProjectId` (`ConferenceId`),
  UNIQUE KEY `ProjectId_2` (`ConferenceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`ConferenceTitle`, `ConferenceId`, `Description`, `App_Date`, `Start_Date`, `End_Date`, `Researcher1`, `ConferenceCategory`, `ConferenceGrant`, `CStatus`, `Block_number`) VALUES
('Marketing in Modern Retails', 1, 'A study on the consumer behavior in a modern retail. His choice /selection methods, payment methods and comfort level to be measured.', '2012-09-28', '2012-09-30', '2012-09-28', 'Ankush Verma', '0', 0, 'rejected', 0),
('Strategic Marketing', 2, 'Research on the various methods of applying positioning in marketing', '2012-09-17', '2012-09-18', '2012-10-31', 'ankushv', '0', 0, 'completed', 0),
('Operations Research on Air Industry', 3, '', '0000-00-00', '0000-00-00', '0000-00-00', 'happyMan', '0', 0, 'app_comm', 0),
('Research on recession cycles', 4, 'A study of recession and its effects', '2012-09-06', '0000-00-00', '0000-00-00', 'abc123', '0', 0, 'rejected', 0),
('Aasddsa', 5, 'sgdg gd fd gd gdfgd fgdgdg', '2012-09-19', '2012-09-15', '2012-09-24', 'sfsfsf', '0', 0, 'app_comm', 0),
('Financial Excellence in Banks', 6, 'Studying the various private and government commercial banks  ', '2012-09-12', '2012-09-28', '2012-12-28', 'xcvn2', '0', 0, 'app_chairman', 0),
('Study on Prakhar', 7, 'Prakhar''s genius uncoded', '2012-09-12', '2012-09-29', '2012-10-16', 'prakhars', '0', 0, 'rejected', 0),
('Behavioral study of customers of SUVs', 8, 'SUV automobile industry specific study on the buying behaviour of the customers of different regions', '2012-09-19', '2012-12-13', '2013-01-10', 'pkjain', '0', 0, 'app_comm', 0),
('Behavioral study of customers of sports cars', 9, 'Sports cars industry specific study on the buying behaviour of the customers of different regions', '2012-09-19', '2012-12-13', '2013-01-10', 'pkjain', '0', 0, 'approved', 0),
('Operational Strategy', 10, 'Study of Various operational strategies in Industry', '2012-09-25', '2012-09-30', '2014-03-12', 'Abc11', '0', 0, 'app_chairman', 0),
('TestConference', 11, 'Testing the system', '0000-00-00', '2012-12-12', '2013-02-12', 'absdfsf', '2', 5000, 'app_comm', 0),
('student application', 12, 'going to a conference', '0000-00-00', '2012-12-12', '2013-02-12', 'absdfsf', '1', 100000, 'app_chairman', 0),
('kk', 13, 'kk', '0000-00-00', '2008-12-01', '0000-00-00', 'absdfsf', 'International', 99, 'app_comm', 4),
('Int conf', 14, 'assdsdfsfs', '0000-00-00', '2012-12-15', '2012-12-19', 'absdfsf', 'International', 100000, 'app_admin', 4),
('Int conf 2', 15, 'assdsdfsfs', '0000-00-00', '2012-11-15', '2012-11-19', 'absdfsf', 'International', 100000, 'app_admin', 4),
('testing ', 16, '3', '0000-00-00', '2012-12-25', '2012-12-29', 'absdfsf', 'International', 34532, 'app_comm', 4),
('testing ', 17, '3', '0000-00-00', '2012-12-25', '2012-12-29', 'absdfsf', 'International', 34532, 'app_admin', 4),
('testing ', 18, '3', '0000-00-00', '2012-12-25', '2012-12-29', 'absdfsf', 'International', 34532, 'app_admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `conferencecompleted`
--

CREATE TABLE IF NOT EXISTS `conferencecompleted` (
  `ConferenceId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conferenceextension`
--

CREATE TABLE IF NOT EXISTS `conferenceextension` (
  `ConferenceId` varchar(200) NOT NULL,
  `Period` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c_budget`
--

CREATE TABLE IF NOT EXISTS `c_budget` (
  `date` date NOT NULL,
  `ConferenceId` varchar(50) NOT NULL,
  `registrationCharges` decimal(50,0) NOT NULL DEFAULT '0',
  `travel` decimal(50,0) NOT NULL DEFAULT '0',
  `stay` decimal(50,0) NOT NULL DEFAULT '0',
  `perDiem` decimal(50,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_budget`
--

INSERT INTO `c_budget` (`date`, `ConferenceId`, `registrationCharges`, `travel`, `stay`, `perDiem`) VALUES
('0000-00-00', '17', 1000, 5000, 5000, 100),
('0000-00-00', '9', 1000, 5000, 5000, 100),
('0000-00-00', '9 ', 200, 765, 897, 123);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `ProjectTitle` varchar(400) NOT NULL,
  `ProjectId` bigint(200) NOT NULL AUTO_INCREMENT,
  `Description` varchar(2000) NOT NULL,
  `App_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The  date of application of the project',
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Researcher1` varchar(80) NOT NULL,
  `Researcher2` varchar(80) NOT NULL,
  `Researcher3` varchar(80) NOT NULL,
  `ProjectCategory` varchar(30) NOT NULL,
  `ProjectGrant` int(11) NOT NULL,
  `PStatus` varchar(50) NOT NULL,
  `Deliverables` varchar(500) NOT NULL,
  `cases` int(11) NOT NULL DEFAULT '0',
  `journals` int(11) NOT NULL DEFAULT '0',
  `chapters` int(11) NOT NULL DEFAULT '0',
  `conference` int(11) NOT NULL DEFAULT '0',
  `paper` int(11) NOT NULL DEFAULT '0',
  `comm_approval` int(11) NOT NULL,
  PRIMARY KEY (`ProjectId`),
  UNIQUE KEY `ProjectId` (`ProjectId`),
  UNIQUE KEY `ProjectId_2` (`ProjectId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectTitle`, `ProjectId`, `Description`, `App_Date`, `Start_Date`, `End_Date`, `Researcher1`, `Researcher2`, `Researcher3`, `ProjectCategory`, `ProjectGrant`, `PStatus`, `Deliverables`, `cases`, `journals`, `chapters`, `conference`, `paper`, `comm_approval`) VALUES
('Marketing in Modern Retails', 1, 'A study on the consumer behavior in a modern retail. His choice /selection methods, payment methods and comfort level to be measured.', '2012-09-27 18:30:00', '2012-09-30', '2012-09-28', 'Ankush Verma', 'Rajgopal Brahmachari', 'Venu Sharma', '2', 50000, 'rejected', '', 0, 0, 0, 0, 0, 0),
('Marketing Communications', 2, 'Marketing communications strategy', '2012-09-18 18:30:00', '2012-09-17', '2012-09-30', 'anurag', 'chatterjeea', 'prakashd', '1', 100000, 'approved', '1. Optimal marketing strategy and plan', 0, 0, 0, 0, 0, 0),
('Strategic Marketing', 3, 'Research on the various methods of applying positioning in marketing', '2012-09-16 18:30:00', '2012-09-18', '2012-10-31', 'ankushv', 'rajeshb', '', '1', 50000, 'app_chairman_2', '', 0, 0, 0, 0, 0, 5),
('Operations Research on Air Industry', 4, '', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'happyMan', 'SadMan', 'ankushv', '0', 0, 'app_chairman_1', '', 0, 0, 0, 0, 0, 0),
('Research on recession cycles', 5, 'A study of recession and its effects', '2012-09-05 18:30:00', '0000-00-00', '0000-00-00', 'abc123', 'ankushv', '', '1', 100000, 'rejected', '', 0, 0, 0, 0, 0, 0),
('Aasddsa', 6, 'sgdg gd fd gd gdfgd fgdgdg', '2012-09-18 18:30:00', '2012-09-15', '2012-09-24', 'sfsfsf', 'zdfsdf', 'zdfsfs', '1', 333333, 'rejected', 'zsdfdgdthrh', 0, 0, 0, 0, 0, 0),
('Financial Excellence in Banks', 7, 'Studying the various private and government commercial banks  ', '2012-09-11 18:30:00', '2012-09-28', '2012-12-28', 'xcvn2', 'plkjhgggdsa', '', '3', 5000, 'app_chairman_1', '', 0, 0, 0, 0, 0, 0),
('Business Leasdership Study', 8, 'Leadership traits study on current business leaders', '2012-09-28 18:30:00', '2012-09-30', '2012-11-20', 'ashishkj11', 'prakhars2013', 'anuragn2013', '2', 100000, 'app_chairman_1', '1 Leadership report', 0, 0, 0, 0, 0, 0),
('Study on Prakhar', 9, 'Prakhar''s genius uncoded', '2012-09-11 18:30:00', '2012-09-29', '2012-10-16', 'prakhars', 'ashishkj', 'anuragn', '1', 100000, 'completed', '', 0, 0, 0, 0, 0, 0),
('Behavioral study of customers of SUVs', 10, 'SUV automobile industry specific study on the buying behaviour of the customers of different regions', '2012-09-18 18:30:00', '2012-12-13', '2013-01-10', 'pkjain', 'vaibhavc', 'ashishkj', '3', 5, 'app_comm', '', 0, 0, 0, 0, 0, 0),
('Behavioral study of customers of sports cars', 11, 'Sports cars industry specific study on the buying behaviour of the customers of different regions', '2012-09-18 18:30:00', '2012-12-13', '2013-01-10', 'pkjain', 'vaibhavc', 'ashishkj', '3', 5, 'app_comm', '', 0, 0, 0, 0, 0, 0),
('Operational Strategy', 12, 'Study of Various operational strategies in Industry', '2012-09-24 18:30:00', '2012-09-30', '2014-03-12', 'Abc11', 'POR11', 'lmn45', '2', 50000, 'approved', '', 0, 0, 0, 0, 0, 0),
('title', 13, 'description', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', 'R2', 'R3', '1', 99999, 'app_comm', 'D1 D2 D3', 0, 0, 0, 0, 0, 0),
('title123', 14, 'description1', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', 'R21', 'R31', '1', 111111, 'app_comm', 'D1 D2 D3', 0, 0, 0, 0, 0, 0),
('titleXYX', 22, 'Desc123', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', 'co1', 'co2', '3', 55555, 'approved', '1. sddfsf 2.3444', 0, 0, 0, 0, 0, 0),
('Test Project', 23, 'Testing purpose', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', 'tester1', 'tetser2', '2', 1111111, 'app_comm', 'Test 1  and Test 2', 0, 0, 0, 0, 0, 0),
('', 24, '', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', '', '', '0', 0, 'app_admin', '', 0, 0, 0, 0, 0, 0),
('', 25, '', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', '', '', '1', 0, 'app_comm', '', 0, 0, 0, 0, 0, 0),
('23124', 26, 'zslkfjsf akdfskdfs lkfasbns', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', '123245', '256ge', '1', 0, 'app_admin', 'Preparatory', 0, 0, 0, 0, 0, 0),
('', 27, '', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', '', '', '1', 0, 'app_admin', 'Case', 0, 0, 0, 0, 0, 0),
('1245', 28, 'dgdg', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', 'abc', 'def', '1', 100000, 'app_admin', 'Secondary Research', 0, 0, 0, 0, 0, 0),
('', 29, '', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', '', '', '1', 0, 'app_admin', 'Case', 0, 0, 0, 0, 0, 0),
('', 30, '', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', '', '', '1', 0, 'app_admin', 'Case', 0, 0, 0, 0, 0, 0),
('Marketin', 31, '', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', 'ashish', 'amol', '2', 10000, 'app_admin', 'Course', 0, 0, 0, 0, 0, 0),
('strategy', 32, '', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', 'abhay', 'amul', '2', 10000, 'app_admin', 'Course', 0, 0, 0, 0, 0, 0),
('one more project', 33, '', '2012-11-10 09:46:05', '0000-00-00', '0000-00-00', 'absdfsf', 'sdf', 'sdfsf', '2', 33435, 'app_admin', 'Case', 0, 0, 0, 0, 0, 0),
('A project on Strategy', 34, '', '2012-11-12 08:57:03', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 50000, 'app_admin', '', 0, 0, 0, 0, 0, 0),
('A project on Strategy', 35, '', '2012-11-12 08:58:29', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 50000, 'app_admin', '', 0, 0, 0, 0, 0, 0),
('A project on Strategy', 36, '', '2012-11-12 08:58:37', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 50000, 'app_admin', '', 0, 0, 0, 0, 0, 0),
('A project on Strategy', 37, '', '2012-11-12 08:59:07', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 0, 'app_admin', '', 0, 0, 0, 0, 0, 0),
('A project on Strategy', 38, '', '2012-11-12 08:59:23', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 0, 'app_admin', '', 0, 0, 0, 0, 0, 0),
('A project on Strategy', 39, '', '2012-11-12 09:00:13', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 0, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0),
('A project on Strategy', 40, '', '2012-11-12 09:01:13', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 0, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0),
('A project on Strategy', 41, '', '2012-11-12 09:02:19', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 0, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0),
('A project on Strategy', 42, '', '2012-11-12 09:07:35', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 0, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0),
('A project on Strategy', 43, '', '2012-11-12 09:08:06', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 0, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0),
('A project on Strategy', 44, '', '2012-11-12 09:08:40', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 0, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0),
('', 45, '', '2012-11-12 09:51:36', '0000-00-00', '0000-00-00', 'absdfsf', '', '', '0', 0, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0),
('', 46, '', '2012-11-20 17:13:26', '0000-00-00', '0000-00-00', '', '', '', '0', 0, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0),
('dfgfdhdfh', 47, '', '2012-11-20 17:16:14', '0000-00-00', '0000-00-00', '', 'xhbfg', 'xbfgbxc', '0', 57814, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0),
('dfgfdhdfh', 48, '', '2012-11-20 17:18:02', '0000-00-00', '0000-00-00', '', 'xhbfg', 'xbfgbxc', '0', 57814, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0),
('', 50, '', '2012-12-01 09:35:40', '0000-00-00', '0000-00-00', '', '', '', '0', 0, '', '', 0, 1, 0, 2, 0, 0),
('new project', 51, '', '2012-12-01 10:16:27', '0000-00-00', '0000-00-00', 'absdfsf', 'abhinavj', 'sdfsf', 'Category 1 (IIM C)', 10000, 'rejected', '', 1, 5, 4, 6, 3, 0),
('new project', 52, '', '2012-12-01 10:18:59', '0000-00-00', '0000-00-00', 'subirb', 'abhinavj', 'sdfsf', 'Category 1 (IIM C)', 10000, 'app_comm', '', 1, 5, 4, 6, 3, 0),
('new project', 53, '', '2012-12-01 10:20:08', '0000-00-00', '0000-00-00', 'subirb', 'abhinavj', 'raghav', 'Category 1 (IIM C)', 10000, 'app_comm', '', 1, 5, 0, 0, 3, 0),
('Latest marketing developements', 54, '', '2012-12-01 11:21:08', '0000-00-00', '0000-00-00', 'anurag', 'rajeshk', '', 'Category 1 (IIM C)', 1000, 'app_chairman_2', '', 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projectcompleted`
--

CREATE TABLE IF NOT EXISTS `projectcompleted` (
  `ProjectId` bigint(200) NOT NULL,
  `Period` bigint(200) NOT NULL,
  `ApprovalPending` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectcompleted`
--

INSERT INTO `projectcompleted` (`ProjectId`, `Period`, `ApprovalPending`) VALUES
(51, 12, 'rejectedAdmin'),
(32, 2, 'chairman'),
(45, 4, 'chairman'),
(36, 3, 'chairman'),
(12, 5, 'chairman'),
(2, 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `projectextension`
--

CREATE TABLE IF NOT EXISTS `projectextension` (
  `ProjectId` bigint(200) NOT NULL,
  `Period` bigint(200) NOT NULL,
  `ApprovalPending` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectextension`
--

INSERT INTO `projectextension` (`ProjectId`, `Period`, `ApprovalPending`) VALUES
(51, 12, 'rejectedAdmin'),
(32, 2, 'chairman'),
(45, 4, 'chairman'),
(36, 3, 'chairman'),
(12, 5, 'chairman'),
(51, 12, 'rejectedAdmin'),
(32, 2, 'chairman'),
(45, 4, 'chairman'),
(36, 3, 'chairman'),
(12, 5, 'chairman'),
(2, 20, 'chairman');

-- --------------------------------------------------------

--
-- Table structure for table `recurring`
--

CREATE TABLE IF NOT EXISTS `recurring` (
  `ProjectId` varchar(50) NOT NULL,
  `recurring_amt` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`ProjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recurring`
--

INSERT INTO `recurring` (`ProjectId`, `recurring_amt`, `total`) VALUES
('12', 733, 1000),
('15', 700, 2000),
('22', 500, 7500),
('9', 450, 1350);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Username` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `role`, `password`, `user_type`) VALUES
('admin', 'admin', 'admin123', 1),
('ankushv', 'faculty', 'ankush123', 4),
('chairman', 'chairman', 'chairman', 3),
('ashishkj', 'student', 'ashishkj', 5),
('comm', 'committee', 'comm', 2),
('subirb', 'faculty', 'subirb', 4),
('anurag', 'faculty', 'anurag', 4),
('comm1', 'committee', 'comm1', 2),
('comm2', 'committee', 'comm2', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
