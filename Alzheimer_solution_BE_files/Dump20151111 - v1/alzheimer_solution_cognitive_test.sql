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
-- Table structure for table `cognitive_test`
--

DROP TABLE IF EXISTS `cognitive_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cognitive_test` (
  `cognitive_test_id` int(11) NOT NULL AUTO_INCREMENT,
  `cognitive_test_set` int(11) DEFAULT NULL,
  `cognitive_question` varchar(150) DEFAULT NULL,
  `cognitive_qanswer` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cognitive_test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cognitive_test`
--

LOCK TABLES `cognitive_test` WRITE;
/*!40000 ALTER TABLE `cognitive_test` DISABLE KEYS */;
INSERT INTO `cognitive_test` VALUES (1,1,'What is the date?','1'),(2,1,'Can you tell me something that happened in the news recently? ','1'),(3,1,'What was the name and address I asked you to remember?','1'),(4,2,'Does the patient have more trouble remembering things that have happened recently than he used to?','1'),(5,2,'Does he or she have more trouble recalling conversations a few days later?  ','1'),(6,2,'Is the patient less able to manage money and financial affairs (e.g. paying bills, budgeting)? ','1'),(7,2,'Is the patient less able to manage his or her medication independently? ','1'),(8,2,'Does the patient need more assistance with transport(either private or public)? ','1');
/*!40000 ALTER TABLE `cognitive_test` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-11 16:37:58
