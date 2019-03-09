-- MySQL dump 10.13  Distrib 5.7.21, for Win64 (x86_64)
--
-- Host: localhost    Database: phq
-- ------------------------------------------------------
-- Server version	5.7.21

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'1','Police Headquarters Bhopal','1','777','1970-01-01',0,'New Firewall mechanism','test',1,1,7,'Done Properly','File','1547724953.pdf'),(2,'12','Police Headquarters Bhopal','23','asd','2019-11-01',0,'New Firewall mechanism','asd',3,0,NULL,NULL,'File','1548239448.jpg'),(3,'qwe','Police Headquarters Bhopal','11','asd','2019-11-01',0,'asd','asd',3,1,8,'wert','File','1548239528.jpg'),(4,'123','Police Headquarters Bhopal','234','345','1970-01-01',0,'dfgf','sdffgs',1,0,NULL,NULL,'File','1548242367.jpg'),(5,'f-11','Police Headquarters Bhopal','l-11','1212','1970-01-01',0,'-1','New desc',8,0,NULL,NULL,'File','1548250170.pdf'),(6,'111','Police Headquarters Bhopal','111','111','1970-01-01',0,'NEW SUB','desc2',1,0,NULL,NULL,'File','1548317669.jpg'),(7,'112','Police Headquarters Bhopal','112','112','1970-01-01',0,'New Sub-3','desc44',1,0,NULL,NULL,'File','1548317873.jpg'),(8,'199','Police Headquarters Bhopal','191','121','2019-02-02',0,'New Sub-3','12',8,0,NULL,NULL,'File','1549032254.jpg'),(9,'1212','Police Headquarters Bhopal','1212','1212','2019-08-02',0,'asd','121212',8,0,NULL,NULL,'letter','1549032326.jpg'),(10,'7_2_19','A.tk','7L_2k19','A.dgp','2019-07-02',0,'-1','file by anand',8,1,7,'Ram close File','File','1549549571.jpg'),(11,'L-121','A.tk','L121-2','121','2019-09-02',0,'Letter121','letter-121',8,0,NULL,NULL,'letter','1549726803.jpg'),(12,'9-3','A.tk','3-9L','9-3-19','2019-09-03',0,'sub_of_9-3','upto 9-3  .11-4',8,0,NULL,NULL,'letter','1552102639.jpg'),(13,'9-39(2)','A.tk','3-9L','9-3-19(2)','2019-09-03',0,'sub_of_9-3','upto 9-3  .14-6',8,0,NULL,NULL,'letter','1552102792.jpg'),(14,'9-3','A.tk','3-9L','9-3-19','2019-10-03',0,'New Firewall mechanism','upto 9-3  .14-6',8,0,NULL,NULL,'letter','1552103625.jpg'),(15,'9-3','Police Headquarters Bhopal','3-9L','9-3-19','1970-01-01',0,'sub_of_9-3','upto 9-3  .11-7',8,0,NULL,NULL,'letter','1552103898.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notesheet`
--

LOCK TABLES `notesheet` WRITE;
/*!40000 ALTER TABLE `notesheet` DISABLE KEYS */;
INSERT INTO `notesheet` VALUES (1,'1','Adding to new file 1','No remarks',1,'2019-01-17 11:35:16','1547724916.pdf',2),(2,'2','test notesheet','No remarks',1,'2019-01-18 16:28:38','1547828919.pdf',2),(3,'3','NOTE-1','remark01',7,'2019-01-23 13:13:42','1548249222.jpg',5),(4,'111','NOTE-2','REMARK02',1,'2019-01-24 08:11:40','1548317501.jpg',6),(5,'1233','NOTE-2','arter',1,'2019-01-24 08:28:33','1548318514.jpg',10),(6,'121','test notesheet','No remark 123',1,'2019-02-03 14:55:46','1549205746.jpg',NULL),(7,'10_2','test notesheet','10_2_ns',8,'2019-02-10 03:26:32','1549769193.jpg',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notesheet_transactions`
--

LOCK TABLES `notesheet_transactions` WRITE;
/*!40000 ALTER TABLE `notesheet_transactions` DISABLE KEYS */;
INSERT INTO `notesheet_transactions` VALUES (1,1,1,7,'2019-01-19 14:14:05',0,1,'123'),(2,2,1,5,'2019-01-19 14:22:59',0,1,'No remarks'),(3,4,1,8,'2019-02-03 14:53:03',0,1,'note send'),(4,6,1,8,'2019-02-03 14:56:05',0,1,'132'),(5,7,8,1,'2019-02-10 03:53:56',0,1,'10_2_remark_forward');
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
  `report_time` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'Information',1,1,3,'2019-01-17 11:35:53',1,1,'no remarks','2019-02-14'),(2,'Information',1,3,7,'2019-01-17 12:00:25',1,1,'Check Updates','2019-02-19'),(3,'Action',1,7,5,'2019-01-17 12:02:33',1,1,'Check for final updates and take actions','2019-02-14'),(4,'Information',1,5,7,'2019-01-17 12:04:14',1,1,'You made some mistake','2019-04-30'),(5,'Information',1,7,3,'2019-01-17 12:05:50',1,1,'tune galti ki mujhe sunna pad rha hai','2019-02-14'),(6,'Action',1,3,7,'2019-01-17 12:14:15',2,1,'chal bhag maine koi galti nhi ki','2019-02-19'),(8,'Action',2,3,8,'2019-01-23 10:30:47',0,0,'No remark','2019-04-30'),(9,'Action',3,3,8,'2019-01-23 10:32:08',2,1,'asd','2019-02-14'),(10,'Action',4,1,3,'2019-01-23 11:19:27',0,1,'No remark','2019-02-19'),(11,'Information',5,8,1,'2019-01-23 13:29:29',0,1,'No remark','2019-02-14'),(12,'Action',6,1,8,'2019-01-24 08:14:29',0,0,'No remark again','2019-04-30'),(13,'Information',7,1,8,'2019-01-24 08:17:52',0,1,'run again','2019-02-14'),(14,'Action',8,8,1,'2019-02-01 14:44:13',0,1,'12','2019-02-19'),(15,'Action',9,8,3,'2019-02-01 14:45:26',0,1,'12','2019-02-14'),(16,'Action',10,8,5,'2019-02-07 14:26:11',1,1,'Remark By Anand (Creation)','2019-04-30'),(17,'Information',10,5,7,'2019-02-07 14:31:15',2,1,'Remark By Roshan(forward)','2019-02-14'),(18,'Action',11,8,1,'2019-02-09 15:40:03',0,0,'run again','2019-02-19'),(19,'Action',14,8,1,'2019-03-09 03:53:45',0,1,'remark upto 14-6',NULL),(20,'Action',15,8,1,'2019-03-09 03:58:17',0,1,'remark upto 11-7','2019-07-11');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Prafful','prafful.lachhwani@gmail.com',9516907970,'123',NULL,'IG',0,0),(2,'Administrator','abc@xyz.com',8976543210,'abc',NULL,'admin',1,0),(3,'Mohit','prafful@kgfits.com',7898057397,'qwerty','1','AIG',0,1),(5,'Roshan','roshan@gmail.com',7067385696,'123',NULL,'AIG',0,1),(7,'Ram','Ram@esh.com',8976543211,'123','1','DSP',0,1),(8,'Anand','anand@gmail.com',1231231232,'abc',NULL,'AIG',0,1);
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

-- Dump completed on 2019-03-09 19:59:30
