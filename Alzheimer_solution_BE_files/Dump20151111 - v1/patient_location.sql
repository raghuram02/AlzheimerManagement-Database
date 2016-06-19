-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2015 at 11:29 PM
-- Server version: 5.6.26-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alzheimer_solution`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_location`
--

CREATE TABLE IF NOT EXISTS `patient_location` (
  `patient_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` double(10,6) NOT NULL,
  `longitude` double(10,6) NOT NULL,
  `inserted_by` varchar(50) NOT NULL DEFAULT 'admin',
  `inserted_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`location_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `patient_location`
--

INSERT INTO `patient_location` (`patient_id`, `location_id`, `latitude`, `longitude`, `inserted_by`, `inserted_ts`) VALUES
(137919, 1, 36.164824, 115.145000, 'admin', '2015-11-11 22:22:37'),
(137919, 2, 20.164824, 123.145000, 'admin', '2015-11-11 22:24:09'),
(137919, 3, 56.164824, 175.145000, 'admin', '2015-11-11 22:24:47'),
(137919, 4, 47.164824, 185.145000, 'admin', '2015-11-11 22:25:28'),
(137919, 5, 36.164824, 180.145000, 'admin', '2015-11-11 22:26:38'),
(137919, 6, 86.164824, 200.145000, 'admin', '2015-11-11 22:26:38'),
(137919, 7, 90.164878, 175.145000, 'admin', '2015-11-11 22:27:24'),
(137919, 8, 876.198824, 400.145000, 'admin', '2015-11-11 22:28:03'),
(137919, 9, 11.164658, 50.145000, 'admin', '2015-11-11 22:28:37'),
(137919, 10, 44.164878, 145.145665, 'admin', '2015-11-11 22:29:16');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient_location`
--
ALTER TABLE `patient_location`
  ADD CONSTRAINT `location_id` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
