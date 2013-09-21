-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2013 at 08:29 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dcc_mgt_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `patient_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `additionalInfo` varchar(500) DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `clinic` (`clinic`),
  KEY `patient_id` (`patient_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `clinic`, `title`, `patient_id`, `startTime`, `endTime`, `staff_id`, `additionalInfo`, `lastModifiedBy`, `modified`) VALUES
(2, 1, 'Bad', '2', '2012-07-29 10:00:00', '2012-07-29 12:00:00', 2, '', 2, NULL),
(6, 1, 'Test', '0', '2012-07-28 14:00:00', '2012-07-28 16:00:00', 0, '', NULL, NULL),
(10, 1, '1', '4fac8e8691cd3', '2012-07-26 14:00:00', '2012-07-26 16:00:00', 5, '', NULL, NULL),
(30, 1, 'Second Consultation', '2', '2012-07-25 10:30:00', '2012-07-25 12:30:00', 3, '', NULL, NULL),
(31, 1, 'Repair Denture', '4', '2012-07-29 16:30:00', '2012-07-29 17:30:00', 2, '', NULL, NULL),
(35, 1, 'Bad', '1', '2012-07-24 11:30:00', '2012-07-24 12:30:00', 1, '', 2, '2012-08-09 11:48:46'),
(36, 1, 'Test', '4fb26a90c226f', '2012-07-27 11:15:00', '2012-07-27 11:45:00', 2, '', NULL, NULL),
(37, 1, 'TEA', '4fab21b15b2b4', '2012-08-01 12:30:00', '2012-08-01 15:45:00', 19, '', NULL, NULL),
(38, 1, 'Godd', 'David Chau', '2012-08-01 11:00:00', '2012-08-01 12:00:00', 4, '', 2, '2012-08-02 01:32:52'),
(39, 1, 'First Consultation', '4fc4f44563eb4', '2012-08-02 10:00:00', '2012-08-02 11:15:00', 22, '', 2, '2012-09-07 00:25:21'),
(51, 2, 'First Consultation', '4fac90cca6475', '2012-08-03 10:15:00', '2012-08-03 11:15:00', 2, '', 2, '2012-08-03 14:25:18'),
(52, 2, '', '4fac90cca6475', '2012-08-03 14:45:00', '2012-08-03 15:15:00', 2, '', 2, '2012-08-03 14:24:58'),
(53, 2, 'Denture Alignment', '4fc700f375ace', '2012-08-09 12:00:00', '2012-08-09 13:00:00', 29, 'Patient in discomfort', 2, '2012-08-09 11:57:57'),
(54, 2, 'Mouth-guard Mold', '4fac8e2533c87', '2012-08-08 10:30:00', '2012-08-08 12:15:00', 28, '', 2, '2012-08-09 11:52:13'),
(55, 2, 'Denture check up', '4fac898722a92', '2012-08-10 10:00:00', '2012-08-10 12:30:00', 31, '', 2, '2012-08-09 11:57:22'),
(56, 2, 'Jdjdj', '4fac90cca6475', '2012-08-16 10:45:00', '2012-08-16 12:00:00', 27, 'Isjsjsjs', 2, '2012-08-17 14:28:50'),
(57, 2, 'Jejsh', '4fac90cca6475', '2012-08-16 08:45:00', '2012-08-16 09:15:00', 27, 'Zushhs', 23, '2012-08-16 14:51:22'),
(58, 2, 'some title', '4fab21b15b2b4', '2012-09-07 08:45:00', '2012-09-07 10:45:00', 27, '', 2, '2012-10-03 22:39:22'),
(59, 2, 'Check up', '4fe3d55c804be', '2012-09-24 16:00:00', '2012-09-24 18:00:00', 2, '', 2, '2012-09-24 15:56:01'),
(60, 2, 'Check up', '4fe3d55c804be', '2012-09-24 15:45:00', '2012-09-24 17:15:00', 28, '', 2, '2012-09-24 17:39:42'),
(61, 2, 'Try in''s', '4fac90cca6475', '2012-09-30 10:45:00', '2012-09-30 12:00:00', 28, '', 2, '2012-09-30 22:36:26'),
(62, 1, 'Fitting', '4fc700f375ace', '2012-09-24 16:00:00', '2012-09-24 17:00:00', 2, '', 2, '2012-09-24 16:01:35'),
(66, 2, 'Test', '4fab21b15b2b4', '2012-09-07 10:30:00', '2012-09-07 12:30:00', 2, '', 2, '2012-10-04 01:46:09'),
(67, 2, 'Test', '4fab21b15b2b4', '2012-09-05 08:45:00', '2012-09-05 10:45:00', 2, '', 2, '2012-10-04 01:41:24'),
(68, 2, 'Test', '506bd2c0e0b66', '2012-09-24 17:15:00', '2012-09-24 17:45:00', 2, '', 2, '2012-10-04 01:45:47'),
(69, 2, 'First Consultation', '5067c6148b384', '2012-01-03 08:30:00', '2012-01-03 09:30:00', 27, '', 2, '2012-10-04 02:38:18'),
(70, 2, 'Second ', '4fe3d55c804be', '2012-01-05 09:30:00', '2012-01-05 11:00:00', 27, '', 2, '2012-10-04 02:38:39'),
(71, 2, 'Second', '5067c6148b384', '2012-01-04 10:30:00', '2012-01-04 11:00:00', 29, '', 2, '2012-10-04 02:39:48'),
(72, 2, 'Test', '4fc84f5a58be0', '2012-01-03 12:00:00', '2012-01-03 12:30:00', 31, '', 2, '2012-10-04 02:40:12'),
(73, 2, 'Test', '4fac8e8691cd3', '2012-01-06 12:30:00', '2012-01-06 13:00:00', 31, '', 2, '2012-10-04 02:40:29'),
(74, 2, 'Test', '505c0758822d8', '2012-01-06 12:45:00', '2012-01-06 13:15:00', 30, '', 2, '2012-10-04 02:40:59'),
(75, 2, 'Test', '505c0758822d8', '2012-01-03 14:45:00', '2012-01-03 15:15:00', 30, '', 2, '2012-10-04 02:41:09'),
(76, 1, 'Test', '5067c6148b384', '2012-01-04 09:15:00', '2012-01-04 09:45:00', 30, '', 2, '2012-10-04 02:41:20'),
(77, 1, 'Test', '4fc43b5cee0ed', '2012-01-04 09:15:00', '2012-01-04 09:45:00', 29, '', 2, '2012-10-04 02:41:53'),
(79, 1, 'Test', '506bd2c0e0b66', '2012-01-02 11:30:00', '2012-01-02 11:45:00', 29, '', 2, '2012-10-04 02:42:12'),
(80, 1, 'Test', '4fc43b5cee0ed', '2012-01-02 10:30:00', '2012-01-02 10:45:00', 29, '', 2, '2012-10-04 02:42:18'),
(82, 1, 'Test', '4fc4e1ee83e33', '2012-01-06 09:15:00', '2012-01-06 09:45:00', 31, '', 2, '2012-10-04 02:42:39'),
(83, 2, 'Test', '5067c6148b384', '2012-01-05 15:00:00', '2012-01-05 15:30:00', 28, '', 2, '2012-10-04 02:43:24'),
(84, 2, 'Test', '505c0758822d8', '2012-01-02 16:30:00', '2012-01-02 17:00:00', 28, '', 2, '2012-10-04 02:43:33'),
(85, 2, 'Test', '4fe3d55c804be', '2012-02-07 09:45:00', '2012-02-07 10:15:00', 28, '', 2, '2012-10-04 02:43:49'),
(86, 2, 'Test', '506c61687038b', '2012-02-08 11:30:00', '2012-02-08 12:00:00', 28, '', 2, '2012-10-04 02:43:55'),
(87, 2, 'Test', '4fe3d55c804be', '2012-02-09 11:15:00', '2012-02-09 11:45:00', 29, '', 2, '2012-10-04 02:44:02'),
(88, 2, 'Test', '4fc4f44563eb4', '2012-02-09 08:45:00', '2012-02-09 09:15:00', 31, '', 2, '2012-10-04 02:44:10'),
(89, 2, 'Test', '4fc700f375ace', '2012-02-06 11:45:00', '2012-02-06 12:15:00', 31, '', 2, '2012-10-04 02:44:22'),
(90, 2, 'Test', '4fc84f5a58be0', '2012-02-10 11:45:00', '2012-02-10 12:15:00', 31, '', 2, '2012-10-04 02:44:30'),
(91, 1, 'Test', '4fc43b5cee0ed', '2012-02-08 09:45:00', '2012-02-08 10:00:00', 27, '', 2, '2012-10-04 02:44:45'),
(92, 1, 'Test', '4fe3d55c804be', '2012-02-09 12:00:00', '2012-02-09 12:30:00', 27, '', 2, '2012-10-04 02:44:50'),
(93, 1, 'Test', '4fc4f44563eb4', '2012-02-06 11:15:00', '2012-02-06 11:30:00', 27, '', 2, '2012-10-04 02:44:57'),
(94, 1, 'Test', '4fac90cca6475', '2012-02-10 09:45:00', '2012-02-10 10:15:00', 27, '', 2, '2012-10-04 02:45:04'),
(95, 1, 'Test', '506c61687038b', '2012-03-07 09:45:00', '2012-03-07 10:00:00', 27, '', 2, '2012-10-04 02:47:27'),
(96, 1, 'Test', '4fac8e2533c87', '2012-03-05 12:00:00', '2012-03-05 12:15:00', 27, '', 2, '2012-10-04 02:45:23'),
(97, 1, 'Test', '5067c6148b384', '2012-03-08 10:30:00', '2012-03-08 11:00:00', 27, '', 2, '2012-10-04 02:45:29'),
(98, 1, 'Test', '4fc4f44563eb4', '2012-03-08 12:30:00', '2012-03-08 13:00:00', 29, '', 2, '2012-10-04 02:45:36'),
(99, 2, 'Test', '506c61687038b', '2012-03-07 09:45:00', '2012-03-07 10:15:00', 29, '', 2, '2012-10-04 02:48:15'),
(100, 2, 'Test', '4fe3d55c804be', '2012-03-05 10:00:00', '2012-03-05 10:15:00', 29, '', 2, '2012-10-04 02:47:06'),
(101, 2, 'Test', '506c61687038b', '2012-03-08 10:45:00', '2012-03-08 11:15:00', 27, '', 2, '2012-10-04 02:48:38'),
(102, 2, 'Test', '506c61687038b', '2012-03-09 11:45:00', '2012-03-09 12:15:00', 2, '', 2, '2012-10-04 02:48:48'),
(103, 2, 'Test', '506c62f4be525', '2012-03-21 10:15:00', '2012-03-21 10:45:00', 27, '', 2, '2012-10-04 02:50:05'),
(104, 2, 'Test', '506c62f4be525', '2012-03-22 10:30:00', '2012-03-22 11:00:00', 2, '', 2, '2012-10-04 02:50:19'),
(105, 2, 'Test', '506c62f4be525', '2012-03-19 11:30:00', '2012-03-19 12:00:00', 2, '', 2, '2012-10-04 02:50:23'),
(106, 2, 'Test', '4fac90cca6475', '2012-03-21 12:15:00', '2012-03-21 12:45:00', 27, '', 2, '2012-10-04 02:51:10'),
(107, 1, 'Test', '506bd2c0e0b66', '2012-03-22 09:30:00', '2012-03-22 10:00:00', 27, '', 2, '2012-10-04 02:51:20'),
(108, 1, 'Test', '506bd2c0e0b66', '2012-04-17 09:15:00', '2012-04-17 09:45:00', 27, '', 2, '2012-10-04 02:51:32'),
(109, 1, 'Test', '506bd2c0e0b66', '2012-04-19 11:15:00', '2012-04-19 11:45:00', 27, '', 2, '2012-10-04 02:51:34'),
(110, 1, 'Test', '506bd2c0e0b66', '2012-04-16 10:00:00', '2012-04-16 10:30:00', 27, '', 2, '2012-10-04 02:51:38'),
(111, 1, 'Test', '506bd2c0e0b66', '2012-04-17 12:15:00', '2012-04-17 12:45:00', 27, '', 2, '2012-10-04 02:51:42'),
(112, 2, 'Test', '505c0758822d8', '2012-04-17 09:15:00', '2012-04-17 09:45:00', 2, '', 2, '2012-10-04 02:52:07'),
(113, 2, 'Test', '505c0758822d8', '2012-04-20 09:30:00', '2012-04-20 10:00:00', 2, '', 2, '2012-10-04 02:52:39'),
(114, 2, 'Test', '506bd2c0e0b66', '2011-11-02 09:45:00', '2011-11-02 10:15:00', 29, '', 2, '2012-10-05 11:18:52'),
(115, 2, 'Good', '4fab21b15b2b4', '2011-09-07 08:45:00', '2011-09-07 09:15:00', 2, '', 2, '2012-10-05 11:21:43'),
(117, 2, 'Denture Moulding', '5067c6148b384', '2012-10-02 10:00:00', '2012-10-02 11:30:00', 2, '', 2, '2012-10-05 13:36:06'),
(118, 2, 'Teeth Mould', '5067c6148b384', '2012-10-02 12:00:00', '2012-10-02 13:30:00', 2, '', 2, '2012-10-05 13:43:09'),
(119, 1, 'Initial consultation', '5067c6148b384', '2012-10-02 11:00:00', '2012-10-02 12:00:00', 27, '', 2, '2012-10-05 13:39:15'),
(120, 2, 'Try in', '5067c6148b384', '2012-10-04 09:30:00', '2012-10-04 10:45:00', 2, '', 2, '2012-10-05 13:38:19'),
(121, 2, 'Try in', '4fac90cca6475', '2012-10-04 13:00:00', '2012-10-04 14:00:00', 2, '', 2, '2012-10-05 13:43:55'),
(122, 2, 'Try in', '4fac8e8691cd3', '2012-10-05 11:00:00', '2012-10-05 12:15:00', 2, '', 2, '2012-10-05 13:45:26'),
(123, 2, 'Denture Moduling', '4fab21b15b2b4', '2012-10-08 08:15:00', '2012-10-08 09:15:00', 2, '', 2, '2012-10-05 13:45:46'),
(124, 2, 'Shade', '4fe3d55c804be', '2012-10-09 09:15:00', '2012-10-09 10:15:00', 2, '', 2, '2012-10-05 13:46:19'),
(125, 2, 'Reline', '506bd2c0e0b66', '2012-10-10 10:00:00', '2012-10-10 11:45:00', 2, '', 2, '2012-10-05 13:46:41'),
(126, 2, 'Good', '5067c6148b384', '2012-10-11 11:00:00', '2012-10-11 14:00:00', 2, '', 2, '2012-10-11 00:34:04'),
(127, 2, 'Denture assessment', '506bd2c0e0b66', '2012-10-03 11:00:00', '2012-10-03 12:00:00', 28, '', 2, '2012-10-05 13:48:22'),
(128, 2, 'Good', '505c0758822d8', '2012-10-11 10:00:00', '2012-10-11 11:30:00', 29, '', 2, '2012-10-11 00:33:58'),
(129, 2, 'Something', '4fc43b5cee0ed', '2012-10-12 10:45:00', '2012-10-12 11:15:00', 2, '', 2, '2012-10-05 13:49:07'),
(130, 2, 'Denture Moulding', '4fac8e2533c87', '2012-10-05 16:00:00', '2012-10-05 16:45:00', 2, '', 2, '2012-10-05 13:49:54'),
(131, 2, 'Ryan', '4fe3d55c804be', '2012-10-12 11:15:00', '2012-10-12 11:45:00', 2, '', 2, '2012-10-18 23:07:24'),
(132, 2, 'Test', '4fac8e2533c87', '2012-10-12 13:30:00', '2012-10-12 13:45:00', 2, '', 2, '2012-10-05 13:53:48'),
(133, 1, 'Double book', '506bd2c0e0b66', '2012-10-11 10:15:00', '2012-10-11 10:45:00', 2, '', 2, '2012-10-11 00:40:05'),
(134, 2, 'Some', '506bd2c0e0b66', '2012-10-08 12:30:00', '2012-10-08 13:00:00', 2, '', 2, '2012-10-11 14:29:26'),
(135, 2, 'Moduling', '4fe3d55c804be', '2012-10-09 10:15:00', '2012-10-09 10:45:00', 2, '', 2, '2012-10-18 23:03:12'),
(136, 2, 'Battleship', '4fac90cca6475', '2012-10-23 10:00:00', '2012-10-23 11:30:00', 2, '', 2, '2012-10-24 14:33:41'),
(137, 2, 'efer', '4fac90cca6475', '2012-10-23 13:30:00', '2012-10-23 13:45:00', 27, '', 2, '2012-10-23 00:41:17'),
(138, 1, 'ferER', '4fab21b15b2b4', '2012-10-23 10:00:00', '2012-10-23 10:30:00', 27, '', 2, '2012-10-23 00:42:54'),
(139, 2, 'Denture Test', '4fac90cca6475', '2012-10-24 09:30:00', '2012-10-24 10:45:00', 2, '', 2, '2012-10-24 00:57:48'),
(140, 2, 'Denture Reline', '5067c6148b384', '2012-10-24 12:00:00', '2012-10-24 14:00:00', 2, '', 2, '2012-10-24 15:51:04'),
(141, 2, 'Check job progress', '4fc4f44563eb4', '2012-10-24 15:00:00', '2012-10-24 16:00:00', 2, '', 2, '2012-10-24 00:58:49'),
(142, 2, 'Bite Tesy', '506c61687038b', '2012-10-25 08:45:00', '2012-10-25 09:15:00', 2, '', 2, '2012-10-24 01:03:11'),
(143, 2, 'Denture Cleaning', '505c0758822d8', '2012-10-25 10:00:00', '2012-10-25 11:00:00', 2, '', 2, '2012-10-24 14:19:53'),
(144, 2, 'Bite Registeration', '4fc43b5cee0ed', '2012-10-25 11:45:00', '2012-10-25 13:15:00', 2, '', 2, '2012-10-24 14:19:56'),
(145, 2, 'Denture Shade', '506bd2c0e0b66', '2012-10-25 13:30:00', '2012-10-25 14:30:00', 2, '', 2, '2012-10-24 14:19:58'),
(146, 2, 'Denture Shade', '506c62f4be525', '2012-10-26 08:15:00', '2012-10-26 08:45:00', 2, '', 2, '2012-10-24 01:06:56'),
(147, 2, 'Second Impression', '4fe3d55c804be', '2012-10-26 09:15:00', '2012-10-26 11:30:00', 2, '', 2, '2012-10-24 14:20:17'),
(148, 2, 'first consultation', '4fac90cca6475', '2012-10-23 08:30:00', '2012-10-23 09:00:00', 27, '', 2, '2012-10-24 16:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

CREATE TABLE IF NOT EXISTS `availabilities` (
  `availability_id` int(11) NOT NULL AUTO_INCREMENT,
  `belongsTo` int(11) DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `clinic` int(11) DEFAULT NULL,
  PRIMARY KEY (`availability_id`),
  KEY `belongsTo` (`belongsTo`),
  KEY `clinic` (`clinic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` (`availability_id`, `belongsTo`, `startTime`, `endTime`, `description`, `modified`, `lastModifiedBy`, `clinic`) VALUES
(2, 2, '2012-09-06 09:00:00', '2012-09-06 11:00:00', '', '2012-08-03 14:19:56', 2, 1),
(3, 2, '2012-08-01 11:00:00', '2012-08-01 13:00:00', '', '2012-08-01 00:00:00', 2, 1),
(4, 4, '2012-08-01 11:00:00', '2012-08-01 13:00:00', '', '2012-08-01 00:00:00', 2, 1),
(5, 22, '2012-08-02 10:00:00', '2012-08-02 15:00:00', '', '2012-08-01 00:00:00', 2, 2),
(6, 23, '2012-08-03 10:00:00', '2012-08-03 15:00:00', '', '2012-08-01 00:00:00', 2, 2),
(12, 27, '2012-09-07 08:00:00', '2012-09-07 13:15:00', '', '2012-08-06 00:19:55', 2, 2),
(13, 2, '2012-09-05 08:00:00', '2012-09-05 17:00:00', '', '2012-10-03 23:35:51', 2, 2),
(14, 2, '2012-09-06 09:15:00', '2012-09-06 11:30:00', '', '2012-09-07 01:46:57', 2, 1),
(15, 2, '2012-09-07 08:00:00', '2012-09-07 13:15:00', '', '2012-10-03 22:39:54', 2, 2),
(16, 2, '2012-09-08 10:00:00', '2012-09-08 14:00:00', '', '2012-09-07 01:49:36', 2, 2),
(17, 2, '2012-09-14 09:00:00', '2012-09-14 12:30:00', '', '2012-09-14 16:46:31', 2, 2),
(18, 2, '2012-09-14 11:45:00', '2012-09-14 13:30:00', '', '2012-09-14 16:41:27', 2, 1),
(19, 2, '2012-09-26 11:00:00', '2012-09-26 12:00:00', '', '2012-09-24 15:45:40', 2, 2),
(20, 2, '2012-09-24 14:00:00', '2012-09-24 18:00:00', '', '2012-09-24 15:46:13', 2, 2),
(21, 2, '2012-09-25 13:00:00', '2012-09-25 16:30:00', '', '2012-09-24 15:46:29', 2, 1),
(23, 2, '2012-09-27 10:00:00', '2012-09-27 13:45:00', '', '2012-09-24 15:47:39', 2, 1),
(24, 2, '2012-09-27 14:15:00', '2012-09-27 16:30:00', '', '2012-09-24 15:47:49', 2, 2),
(25, 28, '2012-09-24 14:00:00', '2012-09-24 18:00:00', '', '2012-09-24 15:53:01', 2, 2),
(26, 28, '2012-09-26 11:00:00', '2012-09-26 14:30:00', '', '2012-09-24 15:54:10', 2, 2),
(27, 27, '2012-09-27 11:00:00', '2012-09-27 15:00:00', '', '2012-09-24 17:49:56', 2, 2),
(28, 2, '2012-10-02 09:00:00', '2012-10-02 14:15:00', '', '2012-10-05 13:23:50', 2, 2),
(29, 2, '2012-10-02 15:00:00', '2012-10-02 17:00:00', '', '2012-10-05 13:23:59', 2, 2),
(30, 2, '2012-10-02 10:00:00', '2012-10-02 11:00:00', '', '2012-10-05 13:24:16', 2, 1),
(31, 2, '2012-10-04 09:30:00', '2012-10-04 14:00:00', '', '2012-10-05 13:24:38', 2, 2),
(32, 2, '2012-10-04 14:30:00', '2012-10-04 17:00:00', 'Staff meeting', '2012-10-05 13:26:58', 2, 1),
(34, 2, '2012-10-05 09:00:00', '2012-10-05 16:00:00', '', '2012-10-05 13:27:21', 2, 1),
(35, 2, '2012-10-01 11:00:00', '2012-10-01 15:00:00', '', '2012-10-05 13:27:47', 2, 1),
(37, 2, '2012-10-12 11:00:00', '2012-10-12 15:00:00', '', '2012-10-11 15:39:48', 2, 2),
(38, 2, '2012-10-24 10:30:00', '2012-10-24 17:30:00', '', '2012-10-24 01:14:12', 2, 2),
(39, 2, '2012-10-25 09:00:00', '2012-10-25 15:00:00', '', '2012-10-24 01:14:19', 2, 2),
(40, 2, '2012-10-26 09:00:00', '2012-10-26 15:00:00', '', '2012-10-24 01:14:27', 2, 2),
(41, 2, '2012-10-23 08:30:00', '2012-10-23 14:30:00', '', '2012-10-24 01:14:41', 2, 1),
(42, 27, '2012-10-23 10:00:00', '2012-10-23 14:30:00', '', '2012-10-24 16:00:01', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clinical_notes`
--

CREATE TABLE IF NOT EXISTS `clinical_notes` (
  `clinical_notes_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(100) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` varchar(500) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`clinical_notes_id`),
  KEY `patient_id` (`patient_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `clinical_notes`
--

INSERT INTO `clinical_notes` (`clinical_notes_id`, `patient_id`, `staff_id`, `category`, `title`, `body`, `created`, `modified`) VALUES
(22, '4fab21b15b2b4', 2, 'Standard', 'First Consultation', 'Everything goes well. Current denture has some problems. Next time will try new denture.', '2012-05-31 14:20:33', '2012-06-01 01:04:02'),
(23, '4fab21b15b2b4', 2, 'General', 'Second Consultation', 'New denture is good. But David said it''s not comfortable.', '2012-05-31 14:21:43', '2012-05-31 14:21:43'),
(24, '4fab21b15b2b4', 2, 'General', ' Impression', 'Make a model of the new denture. Everything goes well1 ', '2012-05-31 14:22:35', '2012-05-31 14:22:35'),
(25, '4fab21b15b2b4', 2, 'General', 'Try In', 'Still not comfortable, patient is angry!', '2012-05-31 14:23:13', '2012-05-31 14:23:13'),
(27, '4fab21b15b2b4', 2, 'RVD', 'Good Test', 'asdf', '2012-09-08 22:12:01', '2012-09-09 15:33:50'),
(28, '4fab21b15b2b4', 2, 'OUD', 'Test', 'afdg', '2012-09-29 16:24:48', '2012-09-29 16:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE IF NOT EXISTS `clinics` (
  `clinic_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  PRIMARY KEY (`clinic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`clinic_id`, `street_address`, `city`, `state`, `postcode`) VALUES
(1, '378 Canterbury Rd', 'Surrey Hills', 'VIC', '3127'),
(2, '207 McKinnon Rd', ' McKinnon', 'VIC', '3204');

-- --------------------------------------------------------

--
-- Table structure for table `job_statuses`
--

CREATE TABLE IF NOT EXISTS `job_statuses` (
  `job_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(100) NOT NULL,
  `patient_status_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`job_status_id`),
  KEY `patient_id` (`patient_id`),
  KEY `patient_status_id` (`patient_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=169 ;

--
-- Dumping data for table `job_statuses`
--

INSERT INTO `job_statuses` (`job_status_id`, `patient_id`, `patient_status_id`, `created`) VALUES
(160, '4fab21b15b2b4', 1, '2012-09-28 12:34:03'),
(161, '505c0758822d8', 1, '2012-09-28 15:04:56'),
(162, '505c0758822d8', 2, '2012-09-28 15:04:56'),
(163, '505c0758822d8', 3, '2012-09-28 15:04:56'),
(164, '505c0758822d8', 4, '2012-09-28 15:04:56'),
(165, '505c0758822d8', 5, '2012-09-28 15:04:56'),
(167, '506bd2c0e0b66', 1, '2012-10-11 00:18:23'),
(168, '506bd2c0e0b66', 13, '2012-10-11 00:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE IF NOT EXISTS `job_titles` (
  `job_title_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`job_title_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `job_titles`
--

INSERT INTO `job_titles` (`job_title_id`, `description`) VALUES
(1, 'Administrator'),
(2, 'Technician'),
(3, 'Super Technician'),
(4, 'Super Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` varchar(100) NOT NULL,
  `given_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `street_address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `home` varchar(50) DEFAULT NULL,
  `gp_name` varchar(50) DEFAULT NULL,
  `gp_address` varchar(200) DEFAULT NULL,
  `gp_phone` varchar(50) DEFAULT NULL,
  `has_current_dentures` tinyint(1) DEFAULT '0',
  `current_dentures_age` varchar(50) DEFAULT NULL,
  `current_dentures_problem` varchar(300) DEFAULT NULL,
  `has_latex_allergic` tinyint(1) DEFAULT '0',
  `latex_allergic_details` varchar(300) DEFAULT NULL,
  `has_other_allergies` tinyint(1) DEFAULT '0',
  `other_allergies_details` varchar(300) DEFAULT NULL,
  `has_medical_conditions` tinyint(1) DEFAULT '0',
  `medical_conditions_details` varchar(300) DEFAULT NULL,
  `has_medicines` tinyint(1) DEFAULT '0',
  `medicines_details` varchar(300) DEFAULT NULL,
  `addtional_information` text,
  `patient_type` int(11) DEFAULT NULL,
  `deposit` decimal(10,2) DEFAULT NULL,
  `deposit2` decimal(10,2) DEFAULT NULL,
  `deposit3` decimal(10,2) DEFAULT NULL,
  `gp_initiation` tinyint(1) DEFAULT '0',
  `voucher` tinyint(1) DEFAULT '0',
  `medicare_confirmation` tinyint(1) DEFAULT '0',
  `dva_confirmation` tinyint(1) DEFAULT '0',
  `dentist_letter` tinyint(1) DEFAULT '0',
  `signature` tinyint(1) DEFAULT '0',
  `Note` text,
  `created` date NOT NULL,
  PRIMARY KEY (`patient_id`),
  KEY `patient_type` (`patient_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `given_name`, `surname`, `gender`, `date_of_birth`, `street_address`, `city`, `state`, `postcode`, `mobile`, `home`, `gp_name`, `gp_address`, `gp_phone`, `has_current_dentures`, `current_dentures_age`, `current_dentures_problem`, `has_latex_allergic`, `latex_allergic_details`, `has_other_allergies`, `other_allergies_details`, `has_medical_conditions`, `medical_conditions_details`, `has_medicines`, `medicines_details`, `addtional_information`, `patient_type`, `deposit`, `deposit2`, `deposit3`, `gp_initiation`, `voucher`, `medicare_confirmation`, `dva_confirmation`, `dentist_letter`, `signature`, `Note`, `created`) VALUES
('4fab21b15b2b4', 'David', 'Chau', 'Male', '1982-05-10', 'Marshall Ave', 'Melbourne', 'ACT', '3161', '0413567709', '90909090', 'Alice', '900 Dandenong Road Caulfield East Victoria 3145 Australia', '0413567709', 1, '2 years', 'Damage the bone that supports the teeth and cause tooth loss and other health problems.', 1, 'No Latex allergy', 0, 'No', 0, 'No', 1, 'Acetaminophen Aspirin Tablet', 'High blood pressure', 2, 2000.00, NULL, NULL, 0, 0, 0, 0, 0, 0, '', '2012-08-01'),
('4fac898722a92', 'Ray', 'Hu', 'male', '1990-05-07', 'Marshall Ave', 'Melbourne', 'VIC', '3161', '413567709', '413567709', 'Ofer', '900 Dandenong Road Caulfield East Victoria 3145 Australia', '413567709', 1, '2 years', 'Dirty', 0, NULL, 0, NULL, 0, NULL, 0, NULL, '', 2, 2000.00, NULL, NULL, 0, 0, 0, 0, 0, 1, '', '2012-06-01'),
('4fac8e2533c87', 'Fredo', 'Fredom', 'Male', '1989-05-11', 'Marshall Ave', 'Melbourne', 'VIC', '3161', '413567709', '413567709', 'Alice', '900 Dandenong Road Caulfield East Victoria 3145 Australia', '0413567709', 1, '1 year', 'Dirty', 0, NULL, 0, NULL, 0, NULL, 0, NULL, '', 4, NULL, NULL, NULL, 0, 0, 0, 1, 0, 1, '', '0000-00-00'),
('4fac8e8691cd3', 'JQ', 'Lee', 'female', '1990-05-11', 'Marshall Ave', 'Melbourne', 'ACT', '3161', '413567709', '413567709', 'Alice', '900 Dandenong Road Caulfield East Victoria 3145 Australia', '413567709', 1, '3 years', 'Dirty', 0, NULL, 0, NULL, 0, NULL, 0, NULL, '', 3, NULL, NULL, NULL, 1, 1, 1, 0, 1, 1, '', '2012-08-12'),
('4fac90cca6475', 'Daniel', 'Lee', 'male', '2012-05-11', 'Marshall Ave', 'Melbourne', 'ACT', '3161', '413567709', '413567709', 'Alice', '900 Dandenong Road Caulfield East Victoria 3145 Australia', '413567709', 1, '1 year', 'Dirty', 0, NULL, 0, NULL, 0, NULL, 0, NULL, '', 4, NULL, NULL, NULL, 0, 0, 0, 1, 1, 1, '', '2012-08-06'),
('4fc43b5cee0ed', 'Fredo', 'Fredom', 'Male', '2012-05-29', '900 Dandenong Road Caulfield East Victoria 3145 Australia', 'Melbourne', 'VIC', '3161', '043567709', '90909090', '', '', '61413567709', 0, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('4fc4e1ee83e33', 'Sarah', 'Hu', 'Female', '2012-05-29', '900 Dandenong Road', 'Melbourne', 'VIC', '3161', '61413567709', '', '', '', '61413567709', 0, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, '', 2, 2000.00, NULL, NULL, 0, 0, 0, 0, 0, 0, '', '2012-06-25'),
('4fc4f44563eb4', 'Elena', 'Gilbert', 'Female', '1988-09-06', '5, Waverly Road', 'Malvern East', 'VIC', '3145', '0414789653', '04123456789', 'Caroline', '900 Dandenong Road Caulfield East 3145 VIC', 'Forbes', 1, '3 years', 'Some problems here', 0, NULL, 1, 'Some details here', 0, NULL, 0, NULL, '', 4, NULL, NULL, NULL, 0, 0, 0, 1, 0, 1, '', '2012-07-09'),
('4fc700f375ace', 'Ray', 'Smith', 'Male', '1993-05-31', '900 Dandenong Road Caulfield East Victoria 3145 Australia', 'Melbourne', 'VIC', '3161', '0413567709', '90909090', '', '', '61413567709', 0, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('4fc84f5a58be0', 'Ray', 'Hu', 'Male', '2012-06-01', 'Marshall Ave', 'Clayton', 'VIC', '3676', '04040409090', '', '', '', '', 1, '2 years', '', 0, NULL, 0, NULL, 0, NULL, 0, NULL, '', 2, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '', '2012-08-12'),
('4fe3d55c804be', 'Elliott', 'Wilson', 'Male', '1988-08-31', '123 Fake St', 'Fakeland', 'VIC', '3221', '0409000000', '0390000000', '', '', '', 0, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, '', 3, NULL, NULL, NULL, 0, 1, 0, 0, 1, 0, '', '2012-07-11'),
('505c0758822d8', 'Kheam', 'Tan', 'Male', '2012-09-21', '2/6 Marshall Ave', 'Clayton', 'VIC', '3168', '0413567709', '90909090', '', '', '', 0, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 5, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '', '2012-09-21'),
('5067c6148b384', 'Edison', 'Chueng', 'Male', '2012-09-30', '2/6 Marshall Ave', 'Clayton', 'VIC', '3168', '0413567709', '90909090', '', '', '', 0, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, '', 2, 3000.00, NULL, NULL, 0, 0, 0, 0, 0, 0, '', '2012-09-30'),
('506bd2c0e0b66', 'David', 'Brown', 'Male', '2012-12-03', '2/5 Warley Rd', 'Malvern East', 'VIC', '3145', '61423123266', '', '', '', '61423123266', 0, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, '', 2, 123.00, 123.00, NULL, 0, 0, 0, 0, 0, 0, NULL, '2012-10-03'),
('506c61687038b', 'Jimmy', 'Smith', 'Male', '2012-10-04', '2/6 Marshall Ave', 'Clayton', 'VIC', '3168', '0413567709', '90909090', 'Alice', '2/6 Marshall Ave', '0413567709', 0, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, '', 1, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, '2012-10-04'),
('506c62f4be525', 'Andy', 'Liu', 'Male', '2012-10-04', '2/6 Marshall Ave', 'Clayton', 'VIC', '3168', '0413567709', '90909090', 'Alice', '900 Dandenong Road Caulfield East Victoria 3145 Australia', '0413567709', 0, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, '', 2, 230.00, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, '2012-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `patient_statuses`
--

CREATE TABLE IF NOT EXISTS `patient_statuses` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `sortOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `patient_statuses`
--

INSERT INTO `patient_statuses` (`status_id`, `name`, `description`, `sortOrder`) VALUES
(1, 'First Consultation', 'First Consultation', 1),
(2, 'First Impression', 'First Impression', 2),
(3, 'Second Impression', 'Second Impression', 3),
(4, 'Bite Registration', 'Bite Registration', 4),
(5, 'Try In', 'Try In', 5),
(6, 'Insert', 'Insert', 6),
(7, 'Shade', 'Shade', 7),
(13, 'Test Status 3', 'Test Status 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_types`
--

CREATE TABLE IF NOT EXISTS `patient_types` (
  `patient_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`patient_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `patient_types`
--

INSERT INTO `patient_types` (`patient_type_id`, `description`) VALUES
(1, 'Prospective'),
(2, 'Private'),
(3, 'Medicare'),
(4, 'DVA'),
(5, 'VDS');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE IF NOT EXISTS `reminders` (
  `reminder_id` int(11) NOT NULL AUTO_INCREMENT,
  `reminder_time` date DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`reminder_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`reminder_id`, `reminder_time`, `description`, `staff_id`) VALUES
(1, '2012-09-08', 'Remember to finish relining.', 2),
(2, NULL, 'Good', NULL),
(3, '2012-09-08', 'Test Reminder', NULL),
(4, '2012-09-08', 'Test', 2),
(5, '2012-09-08', 'Test2', 2),
(6, '2012-09-09', 'Test3', 2),
(7, '2012-09-08', 'Test4', 2),
(8, '2012-09-14', 'Meeting with technicians at Surrey Hills.', 2),
(11, '2012-09-23', 'Finish functionality!!!', 2),
(12, '2012-09-18', 'asd', 2),
(13, '2012-09-12', 'Call patient XX to confirm appointment', 2),
(14, '2012-09-27', 'Call patient XX', 2),
(15, '2012-09-29', 'I need finish today''s to-do list.', 2),
(16, '2012-09-29', 'Test2', 2),
(17, '2012-09-29', 'Test3', 2),
(18, '2012-09-29', 'Test4', 2),
(19, '2012-09-29', 'Test5', 2),
(20, '2012-10-03', 'Finish IE project.', 2),
(21, '2012-10-12', 'Presentation tomorrow', 2),
(22, '2012-10-05', 'Final presentation', 2),
(23, '2012-09-20', 'Old Reminder', 2),
(24, '2012-10-12', 'Email client', 2),
(25, '2012-10-12', 'Completed assignment', 2),
(26, '2012-10-31', 'Future reminder', 2),
(28, '2012-10-16', 'Client meeting', 2),
(29, '2012-10-17', 'Future reminder', 23),
(30, '2012-10-30', 'Remember to contact patient Daniel Lee.', 2),
(31, '2012-10-30', 'Have to done the denture model by today.', 2),
(32, '2012-11-01', 'Check denture status with Elliot Wilson.', 2),
(33, '2012-12-02', 'Contact with technician Ryan Kort, check availability.', 2),
(34, '2012-10-28', 'Remember to go Monash. Attend to Expo.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `startDate` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `token_hash` varchar(1000) DEFAULT NULL,
  `given_name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `working_state` varchar(50) NOT NULL DEFAULT 'Activated',
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `home` varchar(50) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `avatar_photo` varchar(300) DEFAULT NULL,
  `police_check` tinyint(1) DEFAULT '0',
  `insurance_policy` varchar(100) DEFAULT NULL,
  `registeration_certificate` tinyint(1) DEFAULT '0',
  `provider_number` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`staff_id`, `username`, `password`, `token_hash`, `given_name`, `surname`, `working_state`, `date_of_birth`, `gender`, `email_address`, `address`, `city`, `state`, `postcode`, `mobile`, `home`, `job_title`, `avatar_photo`, `police_check`, `insurance_policy`, `registeration_certificate`, `provider_number`) VALUES
(2, 'Ray', 'bf70b2e425faaa97ebea9393ae04398ffc620662', 'a70254f833d81a0184e09a853bb4a532892f4389448db80099b456924124299b8c22834430868ceb3cd362d48a53a778436d5b21456fa7371924f94975782175', 'Ray', 'Hu', 'Activated', '2012-05-29', 'Male', 'hurui@gmail.com', '900 Dandenong Road', 'Melbourne', 'VIC', 3161, '0413567709', '0413567709', '3', '/img/Upload/Ray.png', 1, 'Private', 1, '400000000'),
(22, 'Daniel', 'bf70b2e425faaa97ebea9393ae04398ffc620662', NULL, 'Daniel', 'Lee', 'Activated', '1987-05-30', 'Male', 'Daniel@2M.com', '900 Dandenong Road', 'Caulfield', 'VIC', 3161, '61413567709', '', '1', '', 0, '', 0, ''),
(23, 'Ofer', 'bf70b2e425faaa97ebea9393ae04398ffc620662', '2418c507fd49ff2541412aaa463181c8d2d4f68b', 'Ofer', 'Smith', 'Activated', '1965-04-15', 'Male', 'rhu7@student.monash.edu', '900 Dandenong Road', 'Caulfield', 'VIC', 3161, '0413567709', '9090909', '4', '', 0, '', 0, ''),
(24, 'Ryan', 'bf70b2e425faaa97ebea9393ae04398ffc620662', 'ed82dd88550ad6106625f58b451d151e490515125e91b2c1f60b8d55cf794014a540596dfc4be0df8ab95c91bc6e02ac8f210beda387a8b96585ef21130c81c5', 'Ryan', 'Kort', 'Activated', '1987-06-28', 'Male', 'hurui1207@gmail.com', '2/6 Marshall Ave', 'Clayton', 'VIC', 3168, '0413567709', '9090909', '1', '', 0, '', 0, ''),
(25, 'Alice', 'bf70b2e425faaa97ebea9393ae04398ffc620662', NULL, 'Alice', 'Wong', 'Activated', '1982-07-28', 'Female', 'Alice@2M.com', '900 Dandenong Road', 'Caulfield', 'VIC', 3161, '0413567709', '9090909', '1', '/img/Upload/Default.png', 0, '', 0, ''),
(26, 'Frank', 'bf70b2e425faaa97ebea9393ae04398ffc620662', NULL, 'Frank', 'Brown', 'Suspended', '1963-04-27', 'Male', 'Frank@2M.com', '900 Dandenong Road', 'Caulfield', 'VIC', 3168, '0413567709', '9090909', '1', '', 0, '', 0, ''),
(27, 'Fredo', 'bf70b2e425faaa97ebea9393ae04398ffc620662', NULL, 'Fredo', 'Freedom', 'Activated', '1990-03-31', 'Male', 'Fredo@2M.com', '900 Dandenong Road', 'Caulfield', 'VIC', 3161, '0413567709', '9090909', '2', '', 1, 'Private', 1, 'PN 90303030'),
(28, 'JQ', 'bf70b2e425faaa97ebea9393ae04398ffc620662', NULL, 'Jing', 'Qi', 'Activated', '1990-04-27', 'Female', 'JQ@2M.com', '7 Northcode Ave', 'Caulfield', 'VIC', 3161, '0413567709', '9090909', '2', '', 1, 'Private', 1, 'PN 90303030'),
(29, 'Julia', 'bf70b2e425faaa97ebea9393ae04398ffc620662', NULL, 'Julia', 'Lee', 'Activated', '1990-07-16', 'Female', 'Julia@2M.com', '900 Dandenong Road', 'Clayton', 'VIC', 3161, '0413567709', '9090909', '2', '', 1, 'Private', 1, 'PN 90303030'),
(31, 'stefen.salvatore@2mdental.com', 'bf70b2e425faaa97ebea9393ae04398ffc620662', NULL, 'Stefen', 'Salvatore', 'Activated', '1980-08-02', 'Male', 'stefen.salvatore@2mdental.com', '1 Dandenong Rd', 'Caulfield East', 'VIC', 3140, '0421456321', '', '2', '', 1, 'A001', 1, 'B001');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`clinic`) REFERENCES `clinics` (`clinic_id`);

--
-- Constraints for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD CONSTRAINT `availabilities_ibfk_1` FOREIGN KEY (`clinic`) REFERENCES `clinics` (`clinic_id`);

--
-- Constraints for table `clinical_notes`
--
ALTER TABLE `clinical_notes`
  ADD CONSTRAINT `clinical_notes_ibfk_4` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clinical_notes_ibfk_5` FOREIGN KEY (`staff_id`) REFERENCES `users` (`staff_id`) ON DELETE CASCADE;

--
-- Constraints for table `job_statuses`
--
ALTER TABLE `job_statuses`
  ADD CONSTRAINT `job_statuses_ibfk_1` FOREIGN KEY (`patient_status_id`) REFERENCES `patient_statuses` (`status_id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`patient_type`) REFERENCES `patient_types` (`patient_type_id`);

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `users` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
