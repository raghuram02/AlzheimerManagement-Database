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
-- Dumping events for database 'alzheimer_solution'
--

--
-- Dumping routines for database 'alzheimer_solution'
--
/*!50003 DROP FUNCTION IF EXISTS `CALC_AGE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `CALC_AGE`(YR INT) RETURNS int(11)
BEGIN
DECLARE A INT;
SELECT substr(current_date(),1,4) INTO A;
SET A=A-YR;
RETURN A;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_analyse` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_analyse`(IN pat INTEGER)
BEGIN
    DECLARE prev_ts TIMESTAMP; 
    DECLARE curr_ts TIMESTAMP;
    DECLARE patient INTEGER;
    DECLARE curr_scan geometry DEFAULT NULL;
    DECLARE prev_scan geometry DEFAULT NULL;
    DECLARE finished INTEGER default 0;
    DECLARE cursor1 CURSOR FOR SELECT patient_id,scan,inserted_ts FROM PATIENT_SCAN order by inserted_ts;    
	
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
    truncate table patient_scan_analysis1;
    open cursor1;
    cur_loop:Loop
    FETCH cursor1 into patient,curr_scan,curr_ts;
    SELECT ST_AsText(prev_scan),ST_AsText(curr_scan);
    insert into patient_scan_analysis1(patient_id,current_scan,previous_scan,current_ts,previous_ts) values(patient,curr_scan,@prev_scan,curr_ts,prev_ts);
    SET @prev_scan:=curr_scan;
    
    SET prev_ts=curr_ts;
    SET curr_scan=null;
    set curr_ts=null;
    IF finished = 1 THEN
	LEAVE cur_loop;
	END IF;
    
    END LOOP cur_loop;
    close cursor1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_analyse2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_analyse2`(IN pat INTEGER)
BEGIN
    DECLARE prev_ts TIMESTAMP; 
    DECLARE curr_ts TIMESTAMP;
    DECLARE patient INTEGER;
    DECLARE curr_scan geometry DEFAULT NULL;
    DECLARE prev_scan geometry DEFAULT NULL;
    DECLARE finished INTEGER default 0;
    DECLARE cursor1 CURSOR FOR SELECT patient_id,scan,inserted_ts FROM PATIENT_SCAN order by inserted_ts;    
	
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
    
    SET @q=CONCAT('delete from patient_scan_analysis1 where patient_id=',pat );
	PREPARE stmt FROM @q;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
    open cursor1;
    cur_loop:Loop
    FETCH cursor1 into patient,curr_scan,curr_ts;
    IF patient=pat THEN
    insert into patient_scan_analysis1(patient_id,current_scan,previous_scan,current_ts,previous_ts) values(patient,curr_scan,@prev_scan,curr_ts,prev_ts);
    SET @prev_scan:=curr_scan;
    
    SET prev_ts=curr_ts;
    SET curr_scan=null;
    set curr_ts=null;
    END IF;
    IF finished = 1 THEN
	LEAVE cur_loop;
	END IF;
    
    END LOOP cur_loop;
    close cursor1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-11 23:52:03
