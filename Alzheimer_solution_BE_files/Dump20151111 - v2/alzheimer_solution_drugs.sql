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
-- Table structure for table `drugs`
--

DROP TABLE IF EXISTS `drugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs` (
  `drug_id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_name` varchar(50) NOT NULL,
  `dosage` varchar(250) DEFAULT NULL,
  `components` varchar(500) DEFAULT NULL,
  `side_effects` varchar(1000) NOT NULL,
  `inserted_by` varchar(50) NOT NULL DEFAULT 'admin',
  `inserted_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`drug_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drugs`
--

LOCK TABLES `drugs` WRITE;
/*!40000 ALTER TABLE `drugs` DISABLE KEYS */;
INSERT INTO `drugs` VALUES (1,'Donepezil(Aricept) - 5mg','5 mg','(RS)-2-[(1-benzyl-4-piperidyl)methyl]- 5,6-dimethoxy-2,3-dihydroinden-1-one','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:47:32'),(2,'Donepezil(Aricept) - 10mg','10 mg','(RS)-2-[(1-benzyl-4-piperidyl)methyl]- 5,6-dimethoxy-2,3-dihydroinden-1-one','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:48:30'),(3,'Donepezil(Aricept) - 23mg','23 mg','(RS)-2-[(1-benzyl-4-piperidyl)methyl]- 5,6-dimethoxy-2,3-dihydroinden-1-one','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:48:48'),(4,'Galantamine(Razadyne) - 4mg/mL','4mg/mL','(4aS,6R,8aS)- 5,6,9,10,11,12- hexahydro- 3-methoxy- 11-methyl- 4aH- [1]benzofuro[3a,3,2-ef] [2] benzazepin- 6-ol','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:51:29'),(5,'Galantamine(Razadyne) - 4mg','4mg','(4aS,6R,8aS)- 5,6,9,10,11,12- hexahydro- 3-methoxy- 11-methyl- 4aH- [1]benzofuro[3a,3,2-ef] [2] benzazepin- 6-ol','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:52:21'),(6,'Galantamine(Razadyne) - 8mg','8mg','(4aS,6R,8aS)- 5,6,9,10,11,12- hexahydro- 3-methoxy- 11-methyl- 4aH- [1]benzofuro[3a,3,2-ef] [2] benzazepin- 6-ol','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:52:38'),(7,'Galantamine(Razadyne) - 12mg','12mg','(4aS,6R,8aS)- 5,6,9,10,11,12- hexahydro- 3-methoxy- 11-methyl- 4aH- [1]benzofuro[3a,3,2-ef] [2] benzazepin- 6-ol','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:52:52'),(8,'Galantamine(Razadyne) - 16mg','16mg','(4aS,6R,8aS)- 5,6,9,10,11,12- hexahydro- 3-methoxy- 11-methyl- 4aH- [1]benzofuro[3a,3,2-ef] [2] benzazepin- 6-ol','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:53:13'),(9,'Galantamine(Razadyne) - 24mg','24mg','(4aS,6R,8aS)- 5,6,9,10,11,12- hexahydro- 3-methoxy- 11-methyl- 4aH- [1]benzofuro[3a,3,2-ef] [2] benzazepin- 6-ol','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:53:32'),(10,'Rivastigmine(Exelon) - 1.5mg','1.5 mg','(S)-3-[1-(dimethylamino)ethyl]phenyl N-ethyl-N-methylcarbamate','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:56:08'),(11,'Rivastigmine(Exelon) - 3mg','3 mg','(S)-3-[1-(dimethylamino)ethyl]phenyl N-ethyl-N-methylcarbamate','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:56:37'),(12,'Rivastigmine(Exelon) - 13.3mg/24hr','13.3mg/24hr','(S)-3-[1-(dimethylamino)ethyl]phenyl N-ethyl-N-methylcarbamate','Nausea, vomiting, loss of appetite and increased frequency of bowel movements.','admin','2015-11-11 07:57:37'),(13,'Memantine(Namenda) - 28 mg','28 mg','3,5-dimethyltricyclo[3.3.1.13,7]decan-1amine\r\nor\r\n3,5-dimethyladamantan-1-amine','Headache, constipation, confusion and dizziness.','admin','2015-11-11 07:59:30');
/*!40000 ALTER TABLE `drugs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-11 23:51:39
