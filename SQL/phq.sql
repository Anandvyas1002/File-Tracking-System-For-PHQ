-- MySQL dump 10.13  Distrib 5.1.54, for Win32 (ia32)
--
-- Host: localhost    Database: phq
-- ------------------------------------------------------
-- Server version	5.1.54-community

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
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file_no` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `sender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `letter_no` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `dgp_office_no` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `letter_date` date NOT NULL,
  `time_limit` int(10) DEFAULT NULL,
  `subject` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `status` int(1) DEFAULT '0',
  `closed_by` int(10) DEFAULT NULL,
  `closing_remark` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_type` varchar(100) CHARACTER SET latin1 NOT NULL,
  `file_loc` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'1','Police Headquarters Bhopal','1','777','1970-01-01',0,'New Firewall mechanism','test',1,1,7,'Done Properly','File','1547724953.pdf');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notesheet`
--

DROP TABLE IF EXISTS `notesheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notesheet` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `number` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `created_by` int(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ns_loc` varchar(100) DEFAULT NULL,
  `file_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notesheet`
--

LOCK TABLES `notesheet` WRITE;
/*!40000 ALTER TABLE `notesheet` DISABLE KEYS */;
INSERT INTO `notesheet` VALUES (1,'1','Adding to new file 1','No remarks',1,'2019-01-17 11:35:16','1547724916.pdf',NULL),(2,'2','test notesheet','No remarks',1,'2019-01-18 16:28:38','1547828919.pdf',NULL);
/*!40000 ALTER TABLE `notesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notesheet_transactions`
--

DROP TABLE IF EXISTS `notesheet_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notesheet_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notesheet_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `dispatch_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forward_status` int(1) NOT NULL DEFAULT '0',
  `status` int(1) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notesheet_transactions`
--

LOCK TABLES `notesheet_transactions` WRITE;
/*!40000 ALTER TABLE `notesheet_transactions` DISABLE KEYS */;
INSERT INTO `notesheet_transactions` VALUES (1,1,1,7,'2019-01-19 14:14:05',0,1,'123'),(2,2,1,5,'2019-01-19 14:22:59',0,1,'No remarks');
/*!40000 ALTER TABLE `notesheet_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `dispatch_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forward_status` int(1) NOT NULL DEFAULT '0',
  `status` int(1) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'Information',1,1,3,'2019-01-17 11:35:53',1,1,'no remarks'),(2,'Information',1,3,7,'2019-01-17 12:00:25',1,1,'Check Updates'),(3,'Action',1,7,5,'2019-01-17 12:02:33',1,1,'Check for final updates and take actions'),(4,'Information',1,5,7,'2019-01-17 12:04:14',1,1,'You made some mistake'),(5,'Information',1,7,3,'2019-01-17 12:05:50',1,1,'tune galti ki mujhe sunna pad rha hai'),(6,'Action',1,3,7,'2019-01-17 12:14:15',2,1,'chal bhag maine koi galti nhi ki');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `supervisor` varchar(50) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `privilage` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Prafful','prafful.lachhwani@gmail.com',9516907970,'123',NULL,'IG',0,0),(2,'Administrator','abc@xyz.com',8976543210,'abc',NULL,'admin',1,0),(3,'Mohit','prafful@kgfits.com',7898057397,'qwerty','1','AIG',0,1),(5,'Roshan','roshan@gmail.com',7067385696,'123',NULL,'AIG',0,1),(7,'Ram','Ram@esh.com',8976543211,'123','1','DSP',0,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-20 15:21:51
