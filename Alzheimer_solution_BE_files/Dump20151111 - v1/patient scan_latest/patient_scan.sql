-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2015 at 01:04 AM
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
-- Table structure for table `patient_scan`
--
DROP TABLE `patient_scan`;
CREATE TABLE IF NOT EXISTS `patient_scan` (
  `patient_id` int(11) NOT NULL,
  `scan` polygon NOT NULL,
  `inserted_by` varchar(50) NOT NULL DEFAULT 'scan admin',
  `inserted_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `fk_scan` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_scan`
--

INSERT INTO `patient_scan` (`patient_id`, `scan`, `inserted_by`, `inserted_ts`) VALUES
(137951, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\04@\0\0\0\0\0\0>@\0\0\0\0\0\0D@\0\0\0\0\0\0T@\0\0\0\0\0\0T@\0\0\0\0\0\0N@\0\0\0\0\0\0N@\0\0\0\0\0\0Y@\0\0\0\0\0\0Y@\0\0\0\0\0\0^@\0\0\0\0\0\0n@\0\0\0\0\0\0N@\0\0\0\0\0\0T@\0\0\0\0\0�k@\0\0\0\0\0\04@\0\0\0\0\0\0>@', 'scan admin', '2015-11-11 01:43:08'),
(137951, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�C@\0\0\0\0\0�S@\0\0\0\0\0�S@\0\0\0\0\0�K@\0\0\0\0\0�K@\0\0\0\0\0�X@\0\0\0\0\0�X@\0\0\0\0\0�\\@\0\0\0\0\0`m@\0\0\0\0\0�K@\0\0\0\0\0�S@\0\0\0\0\0�i@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-11-11 01:53:35'),
(137952, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�F@\0\0\0\0\0�T@\0\0\0\0\0�Q@\0\0\0\0\0�K@\0\0\0\0\0�K@\0\0\0\0\0�X@\0\0\0\0\0\0Y@\0\0\0\0\0�\\@\0\0\0\0\0`m@\0\0\0\0\0�K@\0\0\0\0\0\0T@\0\0\0\0\0@j@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-02-10 13:37:18'),
(137951, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�F@\0\0\0\0\0�T@\0\0\0\0\0�Q@\0\0\0\0\0�K@\0\0\0\0\0�K@\0\0\0\0\0�X@\0\0\0\0\0\0Y@\0\0\0\0\0�\\@\0\0\0\0\0`m@\0\0\0\0\0�K@\0\0\0\0\0\0T@\0\0\0\0\0@j@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-11-11 22:53:32'),
(137953, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0I@\0\0\0\0\0\0W@\0\0\0\0\0�R@\0\0\0\0\0\0K@\0\0\0\0\0�K@\0\0\0\0\0�X@\0\0\0\0\0�[@\0\0\0\0\0�^@\0\0\0\0\0\0n@\0\0\0\0\0�R@\0\0\0\0\0�U@\0\0\0\0\0\0i@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-09-03 14:30:00'),
(137953, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0L@\0\0\0\0\0\0W@\0\0\0\0\0�R@\0\0\0\0\0�R@\0\0\0\0\0\0M@\0\0\0\0\0�V@\0\0\0\0\0@Z@\0\0\0\0\0@^@\0\0\0\0\0�k@\0\0\0\0\0\0T@\0\0\0\0\0@U@\0\0\0\0\0�g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-11-05 20:00:00'),
(137953, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0N@\0\0\0\0\0�W@\0\0\0\0\0\0T@\0\0\0\0\0�S@\0\0\0\0\0\0N@\0\0\0\0\0@P@\0\0\0\0\0\0Y@\0\0\0\0\0``@\0\0\0\0\0 l@\0\0\0\0\0�V@\0\0\0\0\0�V@\0\0\0\0\0@h@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-02-02 14:17:00'),
(137954, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�F@\0\0\0\0\0�V@\0\0\0\0\0\0T@\0\0\0\0\0\0S@\0\0\0\0\0�N@\0\0\0\0\0\0T@\0\0\0\0\0�[@\0\0\0\0\0@_@\0\0\0\0\0@j@\0\0\0\0\0�T@\0\0\0\0\0�V@\0\0\0\0\0@h@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-08-31 16:33:00'),
(137954, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�R@\0\0\0\0\0�V@\0\0\0\0\0@S@\0\0\0\0\0@T@\0\0\0\0\0\0P@\0\0\0\0\0@Q@\0\0\0\0\0�Y@\0\0\0\0\0\0`@\0\0\0\0\0 j@\0\0\0\0\0@W@\0\0\0\0\0�V@\0\0\0\0\0`g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-11-04 16:31:20'),
(137954, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�U@\0\0\0\0\0�V@\0\0\0\0\0�S@\0\0\0\0\0\0V@\0\0\0\0\0�Q@\0\0\0\0\0�U@\0\0\0\0\0�Z@\0\0\0\0\0@`@\0\0\0\0\0\0i@\0\0\0\0\0�X@\0\0\0\0\0\0W@\0\0\0\0\0@g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-02-05 15:30:00'),
(137946, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0K@\0\0\0\0\0�W@\0\0\0\0\0�U@\0\0\0\0\0\0N@\0\0\0\0\0\0F@\0\0\0\0\0\0Y@\0\0\0\0\0@Z@\0\0\0\0\0\0^@\0\0\0\0\0@j@\0\0\0\0\0@U@\0\0\0\0\0�T@\0\0\0\0\0�f@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-08-01 12:32:18'),
(137946, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0D@\0\0\0\0\0\0V@\0\0\0\0\0\0R@\0\0\0\0\0\0I@\0\0\0\0\0\0N@\0\0\0\0\0\0Y@\0\0\0\0\0\0Z@\0\0\0\0\0\0^@\0\0\0\0\0`k@\0\0\0\0\0\0N@\0\0\0\0\0@U@\0\0\0\0\0`h@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-11-12 18:00:00'),
(137946, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�F@\0\0\0\0\0�V@\0\0\0\0\0\0S@\0\0\0\0\0�E@\0\0\0\0\0@P@\0\0\0\0\0�Y@\0\0\0\0\0�W@\0\0\0\0\0�[@\0\0\0\0\0@j@\0\0\0\0\0@P@\0\0\0\0\0\0T@\0\0\0\0\0�g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-02-10 18:00:00'),
(137925, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�A@\0\0\0\0\0@U@\0\0\0\0\0�S@\0\0\0\0\0@S@\0\0\0\0\0\0N@\0\0\0\0\0�S@\0\0\0\0\0@Z@\0\0\0\0\0\0^@\0\0\0\0\0\0i@\0\0\0\0\0\0U@\0\0\0\0\0�V@\0\0\0\0\0�h@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-07-31 17:35:00'),
(137925, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0D@\0\0\0\0\0@V@\0\0\0\0\0�Q@\0\0\0\0\0�F@\0\0\0\0\0�O@\0\0\0\0\0�Y@\0\0\0\0\0�X@\0\0\0\0\0\0Y@\0\0\0\0\0\0i@\0\0\0\0\0�Q@\0\0\0\0\0\0T@\0\0\0\0\0�g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-11-06 17:33:00'),
(137925, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0D@\0\0\0\0\0�U@\0\0\0\0\0\0T@\0\0\0\0\0�E@\0\0\0\0\0\0V@\0\0\0\0\0�Y@\0\0\0\0\0�V@\0\0\0\0\0�X@\0\0\0\0\0 i@\0\0\0\0\0@P@\0\0\0\0\0�S@\0\0\0\0\0`g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-03-16 17:00:00'),
(137927, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0L@\0\0\0\0\0\0T@\0\0\0\0\0�P@\0\0\0\0\0\0M@\0\0\0\0\0�P@\0\0\0\0\0\0Y@\0\0\0\0\0@X@\0\0\0\0\0�X@\0\0\0\0\0@j@\0\0\0\0\0�Q@\0\0\0\0\0\0T@\0\0\0\0\0 g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-06-17 20:00:00'),
(137927, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�@@\0\0\0\0\0�U@\0\0\0\0\0�R@\0\0\0\0\0\0H@\0\0\0\0\0�P@\0\0\0\0\0\0Y@\0\0\0\0\0@W@\0\0\0\0\0�Z@\0\0\0\0\0�h@\0\0\0\0\0\0Q@\0\0\0\0\0\0T@\0\0\0\0\0 g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-11-18 21:00:00'),
(137927, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�K@\0\0\0\0\0�U@\0\0\0\0\0\0R@\0\0\0\0\0\0H@\0\0\0\0\0@P@\0\0\0\0\0�Z@\0\0\0\0\0@X@\0\0\0\0\0�Y@\0\0\0\0\0�h@\0\0\0\0\0\0Q@\0\0\0\0\0�S@\0\0\0\0\0@g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-03-30 22:00:00'),
(137927, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�D@\0\0\0\0\0@V@\0\0\0\0\0�R@\0\0\0\0\0�K@\0\0\0\0\0�L@\0\0\0\0\0�Y@\0\0\0\0\0\0Y@\0\0\0\0\0�[@\0\0\0\0\0�i@\0\0\0\0\0@P@\0\0\0\0\0�T@\0\0\0\0\0�f@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-04-30 13:19:00'),
(137928, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0E@\0\0\0\0\0�S@\0\0\0\0\0\0T@\0\0\0\0\0\0P@\0\0\0\0\0\0N@\0\0\0\0\0@Y@\0\0\0\0\0\0Y@\0\0\0\0\0�^@\0\0\0\0\0`k@\0\0\0\0\0\0N@\0\0\0\0\0@U@\0\0\0\0\0`g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-08-12 17:12:00'),
(137928, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�D@\0\0\0\0\0\0U@\0\0\0\0\0@S@\0\0\0\0\0\0Y@\0\0\0\0\0\0O@\0\0\0\0\0�Q@\0\0\0\0\0�^@\0\0\0\0\0�[@\0\0\0\0\0`h@\0\0\0\0\0�T@\0\0\0\0\0�V@\0\0\0\0\0@j@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-08-17 18:00:00'),
(137928, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�K@\0\0\0\0\0\0V@\0\0\0\0\0@P@\0\0\0\0\0\0D@\0\0\0\0\0\0N@\0\0\0\0\0\0Y@\0\0\0\0\0�Q@\0\0\0\0\0@X@\0\0\0\0\0�g@\0\0\0\0\0\0S@\0\0\0\0\0\0S@\0\0\0\0\0�g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-01-15 22:21:00'),
(137935, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�A@\0\0\0\0\0\0T@\0\0\0\0\0�Q@\0\0\0\0\0\0I@\0\0\0\0\0�K@\0\0\0\0\0�W@\0\0\0\0\0\0Y@\0\0\0\0\0�d@\0\0\0\0\0`k@\0\0\0\0\0�V@\0\0\0\0\0@U@\0\0\0\0\0\0i@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-07-15 20:25:00'),
(137935, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0D@\0\0\0\0\0�U@\0\0\0\0\0@U@\0\0\0\0\0\0G@\0\0\0\0\0�V@\0\0\0\0\0�[@\0\0\0\0\0\0W@\0\0\0\0\0\0X@\0\0\0\0\0\0i@\0\0\0\0\0\0Q@\0\0\0\0\0�V@\0\0\0\0\0\0g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-11-19 15:21:00'),
(137935, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�K@\0\0\0\0\0�U@\0\0\0\0\0\0V@\0\0\0\0\0�Q@\0\0\0\0\0\0O@\0\0\0\0\0\0T@\0\0\0\0\0\0Y@\0\0\0\0\0�]@\0\0\0\0\0�i@\0\0\0\0\0\0T@\0\0\0\0\0�V@\0\0\0\0\0�d@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-03-16 14:00:00'),
(137935, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0D@\0\0\0\0\0�T@\0\0\0\0\0�S@\0\0\0\0\0�V@\0\0\0\0\0@P@\0\0\0\0\0\0T@\0\0\0\0\0�Z@\0\0\0\0\0�a@\0\0\0\0\0�g@\0\0\0\0\0@U@\0\0\0\0\0\0T@\0\0\0\0\0\0f@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-02-26 18:00:00'),
(137919, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�K@\0\0\0\0\0�U@\0\0\0\0\0�Q@\0\0\0\0\0�Q@\0\0\0\0\0@U@\0\0\0\0\0\0Y@\0\0\0\0\0�Z@\0\0\0\0\0�c@\0\0\0\0\0 j@\0\0\0\0\0\0X@\0\0\0\0\0\0T@\0\0\0\0\0@h@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-06-30 18:19:00'),
(137919, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�@@\0\0\0\0\0�U@\0\0\0\0\0�R@\0\0\0\0\0\0H@\0\0\0\0\0\0P@\0\0\0\0\0\0X@\0\0\0\0\0@W@\0\0\0\0\0\0Y@\0\0\0\0\0\0i@\0\0\0\0\0@Q@\0\0\0\0\0\0T@\0\0\0\0\0 g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-11-26 12:00:00'),
(137919, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�@@\0\0\0\0\0�U@\0\0\0\0\0�R@\0\0\0\0\0�H@\0\0\0\0\0\0O@\0\0\0\0\0�X@\0\0\0\0\0�X@\0\0\0\0\0\0Z@\0\0\0\0\0@h@\0\0\0\0\0�Q@\0\0\0\0\0\0T@\0\0\0\0\0�f@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-03-08 14:00:00'),
(137920, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�@@\0\0\0\0\0\0V@\0\0\0\0\0�R@\0\0\0\0\0\0I@\0\0\0\0\0@Q@\0\0\0\0\0@Z@\0\0\0\0\0�W@\0\0\0\0\0@[@\0\0\0\0\0�d@\0\0\0\0\0@Q@\0\0\0\0\0�Q@\0\0\0\0\0�g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-06-25 18:27:00'),
(137920, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0�@@\0\0\0\0\0�V@\0\0\0\0\0�R@\0\0\0\0\0\0J@\0\0\0\0\0�Q@\0\0\0\0\0\0Y@\0\0\0\0\0�W@\0\0\0\0\0�[@\0\0\0\0\0 e@\0\0\0\0\0\0S@\0\0\0\0\0�Q@\0\0\0\0\0�g@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2015-11-23 20:23:00'),
(137920, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0\0B@\0\0\0\0\0@V@\0\0\0\0\0�R@\0\0\0\0\0\0J@\0\0\0\0\0�P@\0\0\0\0\0@Y@\0\0\0\0\0@W@\0\0\0\0\0\0[@\0\0\0\0\0`c@\0\0\0\0\0�Q@\0\0\0\0\0�Q@\0\0\0\0\0�f@\0\0\0\0\0\03@\0\0\0\0\0\0=@', 'scan admin', '2016-03-13 19:23:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient_scan`
--
ALTER TABLE `patient_scan`
  ADD CONSTRAINT `fk_scan` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
