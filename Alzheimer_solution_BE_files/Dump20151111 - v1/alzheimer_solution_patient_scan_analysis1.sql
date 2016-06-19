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
-- Table structure for table `patient_scan_analysis1`
--

DROP TABLE IF EXISTS `patient_scan_analysis1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_scan_analysis1` (
  `patient_id` int(11) NOT NULL,
  `current_scan` geometry DEFAULT NULL,
  `previous_scan` geometry DEFAULT NULL,
  `current_ts` timestamp NULL DEFAULT NULL,
  `previous_ts` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_scan_analysis1`
--

LOCK TABLES `patient_scan_analysis1` WRITE;
/*!40000 ALTER TABLE `patient_scan_analysis1` DISABLE KEYS */;
INSERT INTO `patient_scan_analysis1` VALUES (137951,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\04@\0\0\0\0\0\0>@\0\0\0\0\0\0D@\0\0\0\0\0\0T@\0\0\0\0\0\0T@\0\0\0\0\0\0N@\0\0\0\0\0\0N@\0\0\0\0\0\0Y@\0\0\0\0\0\0Y@\0\0\0\0\0\0^@\0\0\0\0\0\0n@\0\0\0\0\0\0N@\0\0\0\0\0\0T@\0\0\0\0\0€k@\0\0\0\0\0\04@\0\0\0\0\0\0>@',NULL,'2015-11-11 01:43:08',NULL),(137951,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0€C@\0\0\0\0\0ÀS@\0\0\0\0\0ÀS@\0\0\0\0\0€K@\0\0\0\0\0€K@\0\0\0\0\0ÀX@\0\0\0\0\0ÀX@\0\0\0\0\0À\\@\0\0\0\0\0`m@\0\0\0\0\0€K@\0\0\0\0\0ÀS@\0\0\0\0\0 i@\0\0\0\0\0\03@\0\0\0\0\0\0=@','\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\04@\0\0\0\0\0\0>@\0\0\0\0\0\0D@\0\0\0\0\0\0T@\0\0\0\0\0\0T@\0\0\0\0\0\0N@\0\0\0\0\0\0N@\0\0\0\0\0\0Y@\0\0\0\0\0\0Y@\0\0\0\0\0\0^@\0\0\0\0\0\0n@\0\0\0\0\0\0N@\0\0\0\0\0\0T@\0\0\0\0\0€k@\0\0\0\0\0\04@\0\0\0\0\0\0>@','2015-11-11 01:53:35','2015-11-11 01:43:08'),(137951,NULL,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\03@\0\0\0\0\0\0=@\0\0\0\0\0€C@\0\0\0\0\0ÀS@\0\0\0\0\0ÀS@\0\0\0\0\0€K@\0\0\0\0\0€K@\0\0\0\0\0ÀX@\0\0\0\0\0ÀX@\0\0\0\0\0À\\@\0\0\0\0\0`m@\0\0\0\0\0€K@\0\0\0\0\0ÀS@\0\0\0\0\0 i@\0\0\0\0\0\03@\0\0\0\0\0\0=@',NULL,'2015-11-11 01:53:35');
/*!40000 ALTER TABLE `patient_scan_analysis1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-11 16:37:29
