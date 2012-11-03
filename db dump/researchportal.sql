-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2012 at 08:37 PM
-- Server version: 5.5.16
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
  `ProjectId` varchar(50) NOT NULL,
  `ResearchAssit` decimal(10,0) NOT NULL,
  `Miscalleneous` decimal(10,0) NOT NULL,
  `Travel` decimal(10,0) NOT NULL,
  `Contingency` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `ProjectTitle` varchar(400) NOT NULL,
  `ProjectId` varchar(200) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `App_Date` date NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Researcher1` varchar(80) NOT NULL,
  `Researcher2` varchar(80) NOT NULL,
  `Researcher3` varchar(80) NOT NULL,
  `ProjectCategory` int(11) NOT NULL,
  `ProjectGrant` int(11) NOT NULL,
  `PStatus` varchar(50) NOT NULL,
  `Deliverables` varchar(500) NOT NULL,
  PRIMARY KEY (`ProjectId`),
  UNIQUE KEY `ProjectId` (`ProjectId`),
  UNIQUE KEY `ProjectId_2` (`ProjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectTitle`, `ProjectId`, `Description`, `App_Date`, `Start_Date`, `End_Date`, `Researcher1`, `Researcher2`, `Researcher3`, `ProjectCategory`, `ProjectGrant`, `PStatus`, `Deliverables`) VALUES
('Marketing in Modern Retails', 'P1000', 'A study on the consumer behavior in a modern retail. His choice /selection methods, payment methods and comfort level to be measured.', '2012-09-28', '2012-09-30', '2012-09-28', 'Ankush Verma', 'Rajgopal Brahmachari', 'Venu Sharma', 2, 50000, 'rejected', ''),
('Strategic Marketing', 'P11111', 'Research on the various methods of applying positioning in marketing', '2012-09-17', '2012-09-18', '2012-10-31', 'ankushv', 'rajeshb', '', 1, 50000, 'app_comm', ''),
('Operations Research on Air Industry', 'P11223', '', '0000-00-00', '0000-00-00', '0000-00-00', 'happyMan', 'SadMan', 'ankushv', 0, 0, 'app_comm', ''),
('Research on recession cycles', 'P1223', 'A study of recession and its effects', '2012-09-06', '0000-00-00', '0000-00-00', 'abc123', 'ankushv', '', 1, 100000, 'rejected', ''),
('Aasddsa', 'P123234', 'sgdg gd fd gd gdfgd fgdgdg', '2012-09-19', '2012-09-15', '2012-09-24', 'sfsfsf', 'zdfsdf', 'zdfsfs', 1, 333333, 'app_comm', 'zsdfdgdthrh'),
('Financial Excellence in Banks', 'P12345', 'Studying the various private and government commercial banks  ', '2012-09-12', '2012-09-28', '2012-12-28', 'xcvn2', 'plkjhgggdsa', '', 3, 5000, 'app_chairman', ''),
('Study on Prakhar', 'P6754', 'Prakhar''s genius uncoded', '2012-09-12', '2012-09-29', '2012-10-16', 'prakhars', 'ashishkj', 'anuragn', 1, 100000, 'rejected', ''),
('Behavioral study of customers of SUVs', 'P6789', 'SUV automobile industry specific study on the buying behaviour of the customers of different regions', '2012-09-19', '2012-12-13', '2013-01-10', 'pkjain', 'vaibhavc', 'ashishkj', 3, 5, 'app_comm', ''),
('Behavioral study of customers of sports cars', 'P7777', 'Sports cars industry specific study on the buying behaviour of the customers of different regions', '2012-09-19', '2012-12-13', '2013-01-10', 'pkjain', 'vaibhavc', 'ashishkj', 3, 5, 'app_comm', ''),
('Operational Strategy', 'P98765', 'Study of Various operational strategies in Industry', '2012-09-25', '2012-09-30', '2014-03-12', 'Abc11', 'POR11', 'lmn45', 2, 50000, 'app_chairman', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Username` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
