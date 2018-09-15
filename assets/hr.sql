-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2018 at 09:54 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `GenerateTreeView`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GenerateTreeView` ()  READS SQL DATA
BEGIN
CREATE TEMPORARY TABLE TreeView(
    tree_rows varchar(145)
    );
 INSERT into  TreeView VALUE('<ul>');
 INSERT into TreeView VALUE('<ul>');
SELECT GROUP_CONCAT(tree_rows SEPARATOR'')FROM TreeView;
DROP TABLE TreeView;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

DROP TABLE IF EXISTS `emp`;
CREATE TABLE IF NOT EXISTS `emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `manager` varchar(200) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `combined` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `f_name`, `l_name`, `designation`, `manager`, `parent`, `combined`) VALUES
(1, 'Anchal', 'Singh', 'CEO', '', NULL, 'Anchal ( CEO)'),
(2, 'Anika', 'Kumari', 'COO', 'Anchal', 1, 'Anika ( COO)'),
(3, 'Aahna', 'Perumal', 'Head(Quality)', 'Anika', 2, 'Aahna(Head(Quality))'),
(4, 'Yashraj', 'Chopra', 'Quality Manager', 'Aahna', 3, 'Yashraj(Quality Manager)'),
(5, 'Madhlika', 'Santhosh', '(Development)', 'Anika', 2, 'Madhlika((Development))'),
(6, 'Ashlesha ', 'Pramod', 'VP SALES', 'Anchal', 1, 'Ashlesha (VP SALES)'),
(7, 'Birju', 'Maharaj', 'VP Marketing', 'Anchal', 1, 'Birju(VP Marketing)'),
(8, 'Devak', 'Kumar', 'Head(HR)', 'Anchal', 1, 'Devak(Head(HR))'),
(9, 'Phani', 'Singh', 'Head (Finance)', 'Anchal', 1, 'Phani(Head (Finance))'),
(10, 'Sachit', 'Agarwal', 'CTO', 'Anchal', 1, 'Sachit(CTO)'),
(11, 'Udit', 'Narayan', 'Accounts Manager', 'Anika', 2, 'Udit(Accounts Manager)'),
(12, 'Yatiyasa', 'Shubham', 'Business Analyst', 'Anika', 2, 'Yatiyasa(Business Analyst)'),
(13, 'Zena', 'Malik', 'Scrum Master', 'Anika', 2, 'Zena(Scrum Master)'),
(14, 'Veena', 'Kumari', 'Tester', 'Yashraj', 4, 'Veena(Tester)'),
(15, 'Torsha', 'Dsouza', 'Mobile Tester', 'Yashraj', 4, 'Torsha(Mobile Tester)'),
(16, 'Ruchita', 'M', 'Tester', 'Yashraj', 4, 'Ruchita(Tester)'),
(17, 'Oindrila', 'Paul', 'Mobile Tester', 'Yashraj', 4, 'Oindrila(Mobile Tester)'),
(18, 'Kimaya', 'Srinivas', 'Developer', 'Madhulika', 5, 'Kimaya(Developer)'),
(19, 'Indu', 'Binoj', 'Developer', 'Madhulika', 5, 'Indu(Developer)'),
(20, 'Gayatri', 'Ravichander', 'Developer', 'Madhulika', 5, 'Gayatri(Developer)'),
(21, 'Hardik', 'Patel', 'Manager Sales', 'Ashlesha', 6, 'Hardik(Manager Sales)'),
(22, 'Jaganmay', 'Gopal', 'Manager Marketing', 'Birju', 7, 'Jaganmay(Manager Marketing)'),
(23, 'Lakhan', 'Singh', 'Recruitment Manager', 'Devak', 8, 'Lakhan(Recruitment Manager)'),
(24, 'Naamdev', 'Mishra', 'L&D Manager', 'Devak', 8, 'Naamdev(L&D Manager)'),
(25, 'Pradosh', 'Pallai', 'Facilities', 'Devak', 8, 'Pradosh(Facilities)'),
(26, 'Ekaa', 'Kapoor', 'Solution Architect', 'Sachit', 10, 'Ekaa(Solution Architect)'),
(27, 'Chitral', 'Ranganathan', 'Solution Architect', 'Sachit', 10, 'Chitral(Solution Architect)');

--
-- Triggers `emp`
--
DROP TRIGGER IF EXISTS `insert_trigger`;
DELIMITER $$
CREATE TRIGGER `insert_trigger` BEFORE INSERT ON `emp` FOR EACH ROW SET new.combined = CONCAT(new.f_name, '(', new.designation, ')')
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_trigger`;
DELIMITER $$
CREATE TRIGGER `update_trigger` BEFORE UPDATE ON `emp` FOR EACH ROW SET new.combined = CONCAT(new.f_name, '(', new.designation, ')')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `name` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`name`, `department`) VALUES
('Anchal', 'CEO'),
('Anika ', 'COO'),
('Aahna', 'Quality'),
('Yashraj', 'Quality'),
('Madhulika', 'Development'),
('Ashlesha', 'Sales'),
('Birju', 'Marketing'),
('Devak', 'HR)'),
('Phani', 'Finance'),
('Sachit ', 'CTO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`) VALUES
(1, 'deepa', 'admin', 'Deepa'),
(2, 'Nadeem', '12345', 'Nadeem');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
