-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2013 at 09:19 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

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
  `ResearchAssistance` float(10,0) DEFAULT NULL,
  `RCE` float(10,0) DEFAULT NULL,
  `Investigators` float(10,0) DEFAULT NULL,
  `TravelAcco` float(10,0) DEFAULT NULL,
  `Communication` float DEFAULT NULL,
  `ITCosts` float DEFAULT NULL,
  `Dissemination` float DEFAULT NULL,
  `Contingency` float DEFAULT NULL,
  `recurring` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`Date`, `ProjectId`, `ResearchAssistance`, `RCE`, `Investigators`, `TravelAcco`, `Communication`, `ITCosts`, `Dissemination`, `Contingency`, `recurring`) VALUES
('2013-03-17 18:30:00', '10', 1000, 1111, 222, 456, 500, 300, 1500, 0, 0),
('0000-00-00 00:00:00', '1', 1000, 1111, 222, 456, 500, 300, 1500, 0, 0),
('0000-00-00 00:00:00', '12', 300, 777, 245, 765, 1111, 9000, 700, 555, 0),
('0000-00-00 00:00:00', '12', NULL, NULL, 1600, NULL, NULL, NULL, 1000, NULL, 0),
('0000-00-00 00:00:00', '12 ', 1, 2, 3, 4, 5, 6, 7, 9, 0),
('0000-00-00 00:00:00', '12 ', 669, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 669, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 1, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 1, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 3, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 12, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 0, 100, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '2 ', 1000, 350, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '22 ', 550, 1000, 0, 50, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 130, 878, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', '12', 0, 0, 0, 0, 0, 0, 0, 0, 733),
('0000-00-00 00:00:00', '12', 0, 0, 0, 0, 0, 0, 0, 0, 733),
('2012-11-10 17:12:12', '22 ', 1000, 0, 0, 355, 0, 3000, 0, 0, 0),
('0000-00-00 00:00:00', '10', 1000, 1111, 222, 456, 500, 300, 1500, 0, 0),
('0000-00-00 00:00:00', '1', 1000, 1111, 222, 456, 500, 300, 1500, 0, 0),
('0000-00-00 00:00:00', '12', 300, 777, 245, 765, 1111, 9000, 700, 555, 0),
('0000-00-00 00:00:00', '12', NULL, NULL, 1600, NULL, NULL, NULL, 1000, NULL, 0),
('0000-00-00 00:00:00', '12 ', 1, 2, 3, 4, 5, 6, 7, 9, 0),
('0000-00-00 00:00:00', '12 ', 669, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 669, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 1, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 1, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 3, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 12, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 0, 100, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '2 ', 1000, 350, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '22 ', 550, 1000, 0, 50, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '12 ', 130, 878, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 733),
('0000-00-00 00:00:00', '12', 0, 0, 0, 0, 0, 0, 0, 0, 733),
('0000-00-00 00:00:00', '12', 0, 0, 0, 0, 0, 0, 0, 0, 733),
('2012-11-10 17:12:12', '22 ', 1000, 0, 0, 355, 0, 3000, 0, 0, 0),
('2013-03-18 06:01:37', '61', 2, 2, 2, 2, 2, 2, 2, 2, 0),
('2013-03-18 09:03:18', '61', 7, 7, 7, 7, 7, 7, 7, 7, 0),
('2013-03-18 09:15:26', '61', 7, 7, 7, 7, 7, 7, 7, 7, 0),
('2013-03-18 09:21:29', '61', 7, 7, 7, 7, 7, 7, 7, 7, 0),
('2013-03-18 09:29:54', '12', 6, 6, 6, 6, 6, 6, 6, 6, 0),
('2013-03-18 19:19:55', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

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
(2, 'extend', 'faculty_extension', 'anurag', 4, '2012-12-18 05:51:49'),
(55, 'Please approve within one month', 'faculty_application', 'anurag', 4, '2012-12-18 07:04:14'),
(2, 'Please review for mistakes and upload the correct deliverables', 'admin_reject_completion', 'admin', 1, '2012-12-18 07:37:08'),
(55, 'Please upload correct deliverables', 'admin_reject', 'admin', 1, '2012-12-19 10:05:00'),
(55, 'Please upload correct deliverables', 'admin_reject', 'admin', 1, '2012-12-19 10:10:28'),
(3, 'Comm', 'committee_approve', 'comm', 2, '2012-12-19 10:55:44'),
(10, 'comm', 'committee_approve', 'comm', 2, '2012-12-19 11:00:08'),
(57, 'Please approve asap', 'faculty_application', 'anurag', 4, '2012-12-19 11:06:05'),
(57, 'Checked', 'admin_approve', 'admin', 1, '2012-12-19 11:07:06'),
(57, 'please check', 'chairman_approve', 'chairman', 3, '2012-12-19 11:08:22'),
(57, 'ok', 'committee_approve', 'comm2', 2, '2012-12-19 11:09:39'),
(57, 'approved!!', 'chairman_approve', 'chairman', 3, '2012-12-19 11:16:09'),
(57, 'extension', 'faculty_extension', 'anurag', 4, '2012-12-19 11:23:36'),
(57, 'ok', 'admin_approve_extension', 'admin', 1, '2012-12-19 11:26:26'),
(57, 'plz set correct date', 'chairman_consult_extension', 'chairman', 3, '2012-12-19 11:27:03'),
(60, 'check it for download', 'faculty_application', 'anurag', 4, '2012-12-21 14:57:10'),
(11, '', 'committee_approve', 'comm', 2, '2012-12-24 10:50:07'),
(11, '', 'committee_approve', 'comm', 2, '2012-12-24 10:51:48'),
(11, '', 'committee_approve', 'comm', 2, '2012-12-24 10:52:08'),
(11, '', 'committee_approve', 'comm', 2, '2012-12-24 10:52:28'),
(11, '', 'committee_approve', 'comm', 2, '2012-12-24 10:52:50'),
(11, '', 'committee_approve', 'comm', 2, '2012-12-24 10:52:57'),
(11, '', 'committee_approve', 'comm', 2, '2012-12-24 10:53:30'),
(11, '', 'committee_approve', 'comm', 2, '2012-12-24 10:54:05'),
(11, '', 'committee_approve', 'comm', 2, '2012-12-24 10:54:21'),
(11, '', 'committee_approve', 'comm', 2, '2012-12-24 10:54:32'),
(11, 'Seems ok!', 'committee_approve', 'comm', 2, '2012-12-24 13:06:28'),
(11, 'seems fine to me as well', 'committee_approve', 'comm1', 2, '2012-12-24 13:09:21'),
(11, 'Plz approve!', 'committee_approve', 'comm2', 2, '2012-12-24 13:16:49'),
(60, '', 'admin_reject', 'admin', 1, '2012-12-24 13:33:50'),
(4, '', 'chairmain_reject', 'chairman', 3, '2013-01-02 11:56:47'),
(26, '', 'admin_approve', 'admin', 1, '2013-01-16 16:56:10'),
(24, '', 'admin_approve', 'admin', 1, '2013-01-16 17:06:32'),
(27, '', 'admin_approve', 'admin', 1, '2013-01-16 17:12:58'),
(28, '', 'admin_approve', 'admin', 1, '2013-01-16 17:16:48'),
(29, '', 'admin_approve', 'admin', 1, '2013-01-16 17:21:23'),
(61, '', 'admin_approve', 'admin', 1, '2013-03-02 11:40:33'),
(61, '', 'chairman_approve', 'chairman', 3, '2013-03-02 11:41:49'),
(61, '', 'committee_approve', 'comm1', 2, '2013-03-02 11:42:40'),
(61, '', 'committee_approve', 'comm2', 2, '2013-03-02 11:43:56'),
(61, '', 'chairman_approve', 'chairman', 3, '2013-03-02 11:46:28'),
(7, '', 'chairman_approve', 'chairman', 3, '2013-03-02 13:13:35');

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
  `WorkOrderId` varchar(1000) NOT NULL,
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
  `books` int(11) NOT NULL DEFAULT '0',
  `comm_approval` int(11) NOT NULL DEFAULT '0',
  `ResearchAssistanceBudget` int(11) NOT NULL,
  `RCEBudget` int(11) NOT NULL,
  `InvestigatorsBudget` int(11) NOT NULL,
  `TravelAccoBudget` int(11) NOT NULL,
  `CommunicationBudget` int(11) NOT NULL,
  `ITCostsBudget` int(11) NOT NULL,
  `DisseminationBudget` int(11) NOT NULL,
  `ContingencyBudget` int(11) NOT NULL,
  PRIMARY KEY (`ProjectId`),
  UNIQUE KEY `ProjectId` (`ProjectId`),
  UNIQUE KEY `ProjectId_2` (`ProjectId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectTitle`, `WorkOrderId`, `ProjectId`, `Description`, `App_Date`, `Start_Date`, `End_Date`, `Researcher1`, `Researcher2`, `Researcher3`, `ProjectCategory`, `ProjectGrant`, `PStatus`, `Deliverables`, `cases`, `journals`, `chapters`, `conference`, `paper`, `books`, `comm_approval`, `ResearchAssistanceBudget`, `RCEBudget`, `InvestigatorsBudget`, `TravelAccoBudget`, `CommunicationBudget`, `ITCostsBudget`, `DisseminationBudget`, `ContingencyBudget`) VALUES
('Marketing in Modern Retails', '', 1, 'A study on the consumer behavior in a modern retail. His choice /selection methods, payment methods and comfort level to be measured.', '2012-09-27 18:30:00', '2012-09-30', '2012-09-28', 'Ankush Verma', 'Rajgopal Brahmachari', 'Venu Sharma', '2', 50000, 'rejected', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Strategic Marketing', '', 3, 'Research on the various methods of applying positioning in marketing', '2012-09-16 18:30:00', '2012-09-18', '2012-10-31', 'ankushv', 'rajeshb', '', '1', 50000, 'app_chairman_2', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Aasddsa', '', 6, 'sgdg gd fd gd gdfgd fgdgdg', '2012-09-18 18:30:00', '2012-09-15', '2012-09-24', 'sfsfsf', 'zdfsdf', 'zdfsfs', '1', 333333, 'rejected', 'zsdfdgdthrh', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Financial Excellence in Banks', '', 7, 'Studying the various private and government commercial banks  ', '2012-09-11 18:30:00', '2012-09-28', '2012-12-28', 'xcvn2', 'plkjhgggdsa', '', '3', 5000, 'app_comm', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Business Leasdership Study', '', 8, 'Leadership traits study on current business leaders', '2012-09-28 18:30:00', '2012-09-30', '2012-11-20', 'ashishkj11', 'prakhars2013', 'anuragn2013', '2', 100000, 'app_chairman_1', '1 Leadership report', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Behavioral study of customers of SUVs', '', 10, 'SUV automobile industry specific study on the buying behaviour of the customers of different regions', '2012-09-18 18:30:00', '2012-12-13', '2013-01-10', 'pkjain', 'vaibhavc', 'ashishkj', '3', 5, 'app_chairman_2', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Behavioral study of customers of SPORTS CAR', '', 11, 'Sports cars industry specific study on the buying behaviour of the customers of different regions', '2012-09-18 18:30:00', '2012-12-13', '2013-01-10', 'pkjain', 'vaibhavc', 'ashishkj', '3', 5, 'app_comm', '', 0, 0, 0, 0, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0),
('Operational Strategy', 'W234', 12, 'Study of Various operational strategies in Industry', '2012-09-24 18:30:00', '2012-09-30', '2014-03-12', 'Abc11', 'POR11', 'lmn45', '2', 50000, 'approved', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9, 0, 0, 0, 0),
('title', '', 13, 'description', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 'absdfsf', 'R2', 'R3', '1', 99999, 'app_comm', 'D1 D2 D3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('A project on Strategy', '', 40, '', '2012-11-12 09:01:13', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 0, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('A project on Strategy', '', 41, '', '2012-11-12 09:02:19', '0000-00-00', '0000-00-00', 'absdfsf', 'anubhavs', '', '0', 0, 'app_admin', 'dummy_Deliverable', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('addd project', '', 60, '', '2012-12-21 14:57:10', '0000-00-00', '0000-00-00', 'anurag', 'sfdgd', 'w436ygf', 'Category 2 (IIM C)', 556765868, 'revisionAdmin', '', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Check Flow', '89', 61, '', '2013-03-02 11:39:26', '0000-00-00', '0000-00-00', 'ankushv', 'a', 'b', 'Category 1 (IIM C)', 12, 'ongoing', '', 0, 0, 0, 0, 0, 0, 7, 8, 8, 8, 8, 8, 8, 8, 8);

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
(2, 0, 'rejectedAdmin'),
(0, 0, 'admin');

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
(2, 20, 'chairman'),
(57, 111, 'chairman'),
(0, 7, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `recurring`
--

CREATE TABLE IF NOT EXISTS `recurring` (
  `ProjectId` varchar(200) NOT NULL,
  `WorkOrderId` int(11) NOT NULL,
  `recurring_amt` double NOT NULL,
  `total` double NOT NULL,
  `Userid` varchar(200) NOT NULL,
  `Account_Details` varchar(1000) NOT NULL,
  `Payment_Procedure` varchar(200) NOT NULL,
  `No_payments` bigint(200) NOT NULL,
  `researcher_id` varchar(200) NOT NULL,
  `Day_payment` tinyint(32) NOT NULL,
  `PAN` varchar(50) NOT NULL,
  `Cheque_name` varchar(100) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recurring`
--

INSERT INTO `recurring` (`ProjectId`, `WorkOrderId`, `recurring_amt`, `total`, `Userid`, `Account_Details`, `Payment_Procedure`, `No_payments`, `researcher_id`, `Day_payment`, `PAN`, `Cheque_name`, `DOB`) VALUES
('', 0, 733, 1000, '', '', '', 0, '', 0, '', '', '0000-00-00'),
('', 0, 700, 2000, '', '', '', 0, '', 0, '', '', '0000-00-00'),
('', 0, 500, 7500, '', '', '', 0, '', 0, '', '', '0000-00-00'),
('', 0, 450, 1350, '', '', '', 0, '', 0, '', '', '0000-00-00'),
('12', 0, 45, 0, 'ankushv', '2342dvdsv', 'ds', 12, 'ddd', 3, '', '', '0000-00-00'),
('11', 0, 67, 222, '', '', '', 0, '', 0, '', '', '0000-00-00'),
('14', 0, 67, 0, 'ankushv', 'gjhggfjh', 'jhghg', 6, 'yyy', 7, '', '', '0000-00-00'),
('14', 0, 67, 0, 'ankushv', 'gjhggfjh', 'jhghg', 6, 'yyy', 7, '', '', '0000-00-00'),
('14', 0, 67, 0, 'ankushv', 'gjhggfjh', 'jhghg', 6, 'yyy', 7, '', '', '0000-00-00'),
('14', 0, 67, 0, 'ankushv', 'gjhggfjh', 'jhghg', 6, 'yyy', 7, '', '', '0000-00-00'),
('14', 0, 67, 0, 'ankushv', 'gjhggfjh', 'jhghg', 6, 'yyy', 7, '', '', '0000-00-00'),
('14', 0, 67, 0, 'ankushv', 'gjhggfjh', 'jhghg', 6, 'yyy', 7, '', '', '0000-00-00'),
('14', 0, 67, 0, 'ankushv', 'gjhggfjh', 'jhghg', 6, 'yyy', 7, '', '', '0000-00-00'),
('1', 0, 1, 0, 'ankushv', '1', '1', 1, '1', 1, '', '', '0000-00-00'),
('1', 0, 1, 0, 'ankushv', '1', '1', 1, '1', 1, '', '', '0000-00-00'),
('1', 0, 1, 0, 'ankushv', '1', '1', 1, '1', 1, '', '', '0000-00-00'),
('1', 0, 1, 0, 'ankushv', '1', '1', 1, '1', 1, '', '', '0000-00-00'),
('1', 0, 1, 0, 'ankushv', '1', '1', 1, '1', 1, '', '', '0000-00-00'),
('2', 0, 22, 0, 'ankushv', '2', '2', 2, '2', 2, '', '', '0000-00-00'),
('2', 0, 22, 0, 'ankushv', '2', '2', 2, '2', 2, '', '', '0000-00-00'),
('2', 0, 22, 0, 'ankushv', '2', '2', 2, '2', 2, '', '', '0000-00-00'),
('2', 0, 22, 0, 'ankushv', '2', '2', 2, '2', 2, '', '', '0000-00-00'),
('2', 0, 22, 0, 'ankushv', '2', '2', 2, '2', 2, '', '', '0000-00-00'),
('2', 0, 22, 0, 'ankushv', '2', '2', 2, '2', 2, '', '', '0000-00-00'),
('2', 0, 22, 0, 'ankushv', '2', '2', 2, '2', 2, '', '', '0000-00-00'),
('2', 0, 22, 0, 'ankushv', '2', '2', 2, '2', 2, '', '', '0000-00-00'),
('2', 0, 22, 0, 'ankushv', '2', '2', 2, '2', 2, '', '', '0000-00-00'),
('3', 0, 3, 0, 'ankushv', '3', '3', 3, '3', 3, '', '', '0000-00-00'),
('4', 0, 56, 0, 'ankushv', '4', '4', 4, '4', 4, '', '', '0000-00-00'),
('4', 0, 56, 0, 'ankushv', '4', '4', 4, '4', 4, '', '', '0000-00-00'),
('4', 0, 56, 0, 'ankushv', '4', '4', 4, '4', 4, '', '', '0000-00-00'),
('4', 0, 56, 0, 'ankushv', '4', '4', 4, '4', 4, '', '', '0000-00-00'),
('4', 0, 56, 0, 'anurag', '4', '4', 4, '4', 4, '', '', '0000-00-00'),
('4', 0, 56, 0, 'anurag', '4', '4', 4, '4', 4, '', '', '0000-00-00'),
('5', 0, 78, 0, 'anurag', '5', '5', 5, '5', 5, '', '', '0000-00-00'),
('5', 0, 78, 0, 'anurag', '5', '5', 5, '5', 5, '', '', '0000-00-00'),
('2', 0, 90, 0, 'anurag', 'dfsf fvds ', 'ffff', 5, 'as', 5, '', '', '0000-00-00'),
('2', 0, 2, 0, 'anurag', '2', '2', 2, '4', 2, '', '', '0000-00-00'),
('1', 0, 1, 0, 'admin', '1', '1', 1, '1', 1, '1', '1', '0000-00-00'),
('1', 0, 1, 0, 'admin', '1', '1', 1, '1', 1, '1', '1', '0000-00-00'),
('1', 0, 89, 0, 'admin', 'bjbjb', 'bjj', 4, 'jk', 8, '898989', '8989', '0000-00-00'),
('1', 0, 89, 0, 'admin', 'bjbjb', 'bjj', 4, 'jk', 8, '898989', '8989', '0000-00-00'),
('1', 0, 89, 0, 'admin', 'bjbjb', 'bjj', 4, 'jk', 8, '898989', '8989', '0000-00-00'),
('1', 0, 9, 0, 'admin', 'bjbjb', 'bjj', 5, 'jjj', 8, '1', '1', '0000-00-00'),
('1', 0, 8, 0, 'admin', '8', '8', 8, '8', 8, '8', '8', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `Tno` int(11) NOT NULL AUTO_INCREMENT,
  `DueDate` date NOT NULL,
  `WorkOrderId` int(11) NOT NULL,
  `ProjectId` int(11) NOT NULL,
  `Head` varchar(200) NOT NULL,
  `RA_ID` varchar(200) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Remarks` varchar(200) NOT NULL,
  `completed` int(11) NOT NULL DEFAULT '2' COMMENT '0=pending, 1=complete, 2=pending in future',
  PRIMARY KEY (`Tno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Tno`, `DueDate`, `WorkOrderId`, `ProjectId`, `Head`, `RA_ID`, `Amount`, `Remarks`, `completed`) VALUES
(1, '2013-03-11', 0, 61, '', 'as', 34, 'errerere', 1),
(14, '2013-04-08', 0, 1, 'ResearchAssistance', 'jjj', 9, 'NA', 2),
(15, '2013-05-08', 0, 1, 'ResearchAssistance', 'jjj', 9, 'NA', 2),
(16, '2013-06-08', 0, 1, 'ResearchAssistance', 'jjj', 9, 'NA', 2),
(17, '2013-07-08', 0, 1, 'ResearchAssistance', 'jjj', 9, 'NA', 2),
(18, '2013-08-08', 0, 1, 'ResearchAssistance', 'jjj', 9, 'NA', 2),
(19, '2013-04-08', 0, 1, 'ResearchAssistance', '8', 8, 'NA', 2),
(20, '2013-05-08', 0, 1, 'ResearchAssistance', '8', 8, 'NA', 2),
(21, '2013-06-08', 0, 1, 'ResearchAssistance', '8', 8, 'NA', 2),
(22, '2013-07-08', 0, 1, 'ResearchAssistance', '8', 8, 'NA', 2),
(23, '2013-08-08', 0, 1, 'ResearchAssistance', '8', 8, 'NA', 2),
(24, '2013-09-08', 0, 1, 'ResearchAssistance', '8', 8, 'NA', 2),
(25, '2013-10-08', 0, 1, 'ResearchAssistance', '8', 8, 'NA', 2),
(26, '2013-11-08', 0, 1, 'ResearchAssistance', '8', 8, 'NA', 2);

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
