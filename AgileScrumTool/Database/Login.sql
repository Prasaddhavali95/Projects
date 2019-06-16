-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2015 at 07:18 PM
-- Server version: 5.5.40
-- PHP Version: 5.3.10-1ubuntu3.16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Login`
--

-- --------------------------------------------------------

--
-- Table structure for table `iteration`
--

CREATE TABLE IF NOT EXISTS `iteration` (
  `iteration_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `iteration_name` text,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`iteration_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `iteration`
--

INSERT INTO `iteration` (`iteration_id`, `user_id`, `project_id`, `iteration_name`, `start_date`, `end_date`) VALUES
(5, 1, 6, 'March_22_Iteration', '2015-03-14', '2015-03-21'),
(6, 1, 6, 'Iteration 2', '2015-03-21', '2015-03-28'),
(7, 1, 7, 'Iteration 3', '2015-03-21', '2015-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `linkuesr`
--

CREATE TABLE IF NOT EXISTS `linkuesr` (
  `linkuser_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_linkid` int(11) DEFAULT NULL,
  PRIMARY KEY (`linkuser_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `linkuesr`
--

INSERT INTO `linkuesr` (`linkuser_id`, `user_id`, `user_linkid`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` text,
  `product` text,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `user_id`, `name`, `product`, `start`, `end`) VALUES
(6, 1, 'Firefly', 'Firefly Pilot', '2015-03-21', '2015-03-31'),
(7, 1, 'Firaa', 'Firaa', '2015-03-21', '2015-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE IF NOT EXISTS `story` (
  `story_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `project` text,
  `name` text,
  `state` text,
  `hours` text,
  `story_point` int(11) DEFAULT NULL,
  `end_date_time` datetime NOT NULL,
  `start_date_time` datetime NOT NULL,
  PRIMARY KEY (`story_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`story_id`, `user_id`, `project_id`, `project`, `name`, `state`, `hours`, `story_point`, `end_date_time`, `start_date_time`) VALUES
(6, 1, 6, '6', 'User should be able to login and Register', 'Done', '10', 5, '2015-03-15 07:21:20', '2015-03-17 01:50:28'),
(7, 1, 6, '6', 'Something', 'Done', '4', 2, '2015-03-16 02:04:41', '2015-03-18 01:59:54'),
(8, 1, 6, '', 'Random Sampeling', 'Done', '5', 2, '2015-03-17 02:04:45', '2015-03-17 19:57:59'),
(9, 1, 6, '', 'Upper threashold', 'Done', '4', 5, '2015-03-23 06:31:41', '2015-03-18 03:18:24'),
(10, 1, 6, '', 'Javascript analytics for analyzing pages', 'Not Started', '20', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 6, '', 'Pop up Tracking', 'Not Started', '5', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 6, '', 'Workflow Analysis', 'Not Started', '15', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 7, '', 'Facebook Login', 'Not Started', '5', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `story_iteration_assign`
--

CREATE TABLE IF NOT EXISTS `story_iteration_assign` (
  `story_iteration_assign` int(11) NOT NULL AUTO_INCREMENT,
  `iteration_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`story_iteration_assign`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `story_iteration_assign`
--

INSERT INTO `story_iteration_assign` (`story_iteration_assign`, `iteration_id`, `story_id`, `project_id`) VALUES
(5, 5, 6, 6),
(6, 5, 7, 6),
(7, 5, 8, 6),
(8, 5, 9, 6),
(9, 6, 10, 6),
(10, 6, 11, 6),
(11, 6, 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` text,
  `email` text,
  `password` text,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text,
  `password` text,
  `user_type` text,
  `first_name` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `user_type`, `first_name`) VALUES
(1, 'dsiddharth2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'main', 'Siddharth'),
(2, 'ketan@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'sub', 'Ketan'),
(3, 'hemant@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'sub', 'Hemant'),
(4, 'pratima@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'sub', 'Pratima');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
