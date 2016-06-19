-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: alzheimer_solution
-- ------------------------------------------------------
-- Server version	5.6.26-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pat_phy_mapping`
--

DROP TABLE IF EXISTS `pat_phy_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pat_phy_mapping` (
  `patient_id` int(11) NOT NULL,
  `physician_id` int(11) NOT NULL,
  `inserted_by` varchar(50) NOT NULL,
  `inserted_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`patient_id`,`physician_id`),
  KEY `fk_phy` (`physician_id`),
  CONSTRAINT `fk_pat` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `fk_phy` FOREIGN KEY (`physician_id`) REFERENCES `physician` (`physician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pat_phy_mapping`
--

LOCK TABLES `pat_phy_mapping` WRITE;
/*!40000 ALTER TABLE `pat_phy_mapping` DISABLE KEYS */;
INSERT INTO `pat_phy_mapping` VALUES (137919,16,'a','2015-11-08 23:22:34'),(137920,16,'a','2015-11-08 23:26:08'),(137921,16,'a','2015-11-08 23:29:21'),(137922,16,'a','2015-11-08 23:30:25'),(137923,16,'a','2015-11-08 23:31:20'),(137924,16,'a','2015-11-08 23:32:50'),(137925,16,'a','2015-11-08 23:35:50'),(137926,16,'a','2015-11-08 23:38:14'),(137927,16,'a','2015-11-08 23:59:25'),(137928,16,'a','2015-11-09 00:00:20'),(137929,16,'a','2015-11-09 00:00:56'),(137930,16,'a','2015-11-09 00:01:50'),(137931,16,'a','2015-11-09 00:58:17'),(137932,16,'a','2015-11-09 00:58:57'),(137933,16,'a','2015-11-09 00:59:29'),(137934,16,'a','2015-11-09 01:00:00'),(137935,16,'a','2015-11-09 01:03:44'),(137936,16,'a','2015-11-09 01:04:17'),(137937,16,'a','2015-11-09 01:04:53'),(137938,16,'a','2015-11-09 01:05:24'),(137939,16,'a','2015-11-09 01:08:24'),(137940,16,'a','2015-11-09 01:15:51'),(137941,16,'a','2015-11-09 01:19:01'),(137942,16,'a','2015-11-09 01:20:23'),(137943,16,'a','2015-11-09 01:25:10'),(137944,16,'a','2015-11-09 01:27:37'),(137945,16,'a','2015-11-09 01:29:13'),(137946,16,'a','2015-11-09 01:32:00'),(137947,16,'a','2015-11-09 01:38:14'),(137948,16,'a','2015-11-09 01:43:33'),(137949,18,'raghu','2015-11-09 17:43:14'),(137950,19,'sowmiya','2015-11-09 18:30:15');
/*!40000 ALTER TABLE `pat_phy_mapping` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-10 16:53:07
