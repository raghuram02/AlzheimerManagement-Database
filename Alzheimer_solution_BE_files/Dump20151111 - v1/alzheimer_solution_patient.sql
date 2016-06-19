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
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(50) NOT NULL,
  `dob_year` int(11) NOT NULL,
  `dob_month` int(11) NOT NULL,
  `dob_date` int(11) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `address_line1` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `suggest_app` int(11) NOT NULL DEFAULT '0',
  `inserted_by` varchar(50) NOT NULL,
  `inserted_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=137957 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (137919,'kishore',1968,1,1,0,'kj','kjk','kj',876,'+919597173294',0,'a','2015-11-08 23:22:34'),(137920,'hari',1968,1,1,1,'jhj','wo','jb',989,'+919730091896',0,'a','2015-11-08 23:26:08'),(137921,'ra',1968,1,1,0,'kj','kjk','jh',98989,'+00000009',0,'a','2015-11-08 23:29:21'),(137922,'fds',1968,1,1,0,'jh','jhj','hjh',1581,'+99899898',0,'a','2015-11-08 23:30:24'),(137923,'hj',1968,1,1,0,'hj','hj','hj',1581,'+8998989898',0,'a','2015-11-08 23:31:20'),(137924,'kis',1968,1,1,0,'k','k','k',1581,'+919898989888',0,'a','2015-11-08 23:32:50'),(137925,'kk',1968,1,1,0,'k','k','k',1581,'+898999999999',0,'a','2015-11-08 23:35:50'),(137926,'l',1968,1,1,0,'lk','k','lk',909,'+909999999',0,'a','2015-11-08 23:38:14'),(137927,'j',1968,1,1,0,'j','j','j',90,'+99999',0,'a','2015-11-08 23:59:25'),(137928,'j',1968,1,1,0,'j','j','j',989,'+986668884444',0,'a','2015-11-09 00:00:20'),(137929,'k',1968,1,1,0,'k','k','k',899,'+999999999999',0,'a','2015-11-09 00:00:56'),(137930,'x',1968,1,1,0,'j','j','hg',89898,'+878788778',0,'a','2015-11-09 00:01:50'),(137931,'kishore',1968,1,1,0,'j','j','j',6578,'+999999999',0,'a','2015-11-09 00:58:17'),(137932,'s',1968,1,1,0,'s','s','s',98989,'+8787778',0,'a','2015-11-09 00:58:57'),(137933,'kk',1968,1,1,0,'kj','kjk','kj',9009,'+9198998989',0,'a','2015-11-09 00:59:29'),(137934,'kj',1968,1,1,0,'jk','j','kj',99989,'+919898988989',0,'a','2015-11-09 01:00:00'),(137935,'k',1968,1,1,0,'kkj','kjk','kjj',9898,'+976566554545',0,'a','2015-11-09 01:03:44'),(137936,'k',1968,1,1,0,'k','k','k',989,'+989898987676',0,'a','2015-11-09 01:04:17'),(137937,'k',1968,1,1,0,'k','k','k',9898,'+877878787777',0,'a','2015-11-09 01:04:53'),(137938,'k',1968,1,1,0,'k','k','k',9898,'+98976767',0,'a','2015-11-09 01:05:24'),(137939,'k',1968,1,1,0,'k','k','k',9989,'+876566565656',0,'a','2015-11-09 01:08:24'),(137940,'k',1968,1,1,0,'k','k','k',989,'+89989865333',0,'a','2015-11-09 01:15:51'),(137941,'k',1968,1,1,0,'k','k','k',6666,'+112223334444',0,'a','2015-11-09 01:19:01'),(137942,'j',1968,1,1,0,'j','j','j',98988,'+343434334434',0,'a','2015-11-09 01:20:23'),(137943,'kk',1968,1,1,0,'k','k','k',98989,'+997875654545',0,'a','2015-11-09 01:25:10'),(137944,'k',1968,1,1,0,'j','j','j',9909,'+919899886655',0,'a','2015-11-09 01:27:37'),(137945,'kk',1968,1,1,0,'kk','kk','k',9898,'+919899896553',0,'a','2015-11-09 01:29:13'),(137946,'kj',1968,1,1,0,'kj','kjk','jk',9898,'+199898999898',0,'a','2015-11-09 01:32:00'),(137947,'oo',1968,1,1,0,'o','o','o',1581,'+919874335566',0,'a','2015-11-09 01:38:14'),(137948,'kishore',1968,1,1,0,'kk','kk','kk',9898,'+336664441245',0,'a','2015-11-09 01:43:33'),(137949,'kishore',1971,1,1,0,'kj','jk','jk',1581,'+15086541407',0,'raghu','2015-11-09 17:43:14'),(137950,'Harish',1973,1,1,0,'pp','ooo','oo',9087,'+19009877777',0,'sowmiya','2015-11-09 18:30:15'),(137951,'ram',1974,3,2,0,'kj','kjk','kj',98009,'+18998988998',1,'a','2015-11-10 22:17:22'),(137952,'keku',1974,1,1,0,'jk','jkj','jkj',98976,'+58787884545',0,'a','2015-11-11 08:52:49'),(137953,'kk',1968,1,1,0,'kj','kjkj','jkjk',98998,'+919988886666',0,'a','2015-11-11 09:02:29'),(137954,'jhj',1968,1,1,0,'ii','ii','ii',98765,'+91988986563',0,'a','2015-11-11 09:05:02'),(137955,'kjk',1990,1,1,0,'ioo','uu','uuu',90987,'+919897674322',0,'a','2015-11-11 09:06:49'),(137956,'kj',1968,1,1,0,'jk','kjkj','jj',8998,'+764442224444',0,'a','2015-11-11 09:08:54');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
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
