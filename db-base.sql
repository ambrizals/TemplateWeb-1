-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: web
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `lbs_contactmsg`
--

DROP TABLE IF EXISTS `lbs_contactmsg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lbs_contactmsg` (
  `idContactmsg` int(11) NOT NULL AUTO_INCREMENT,
  `titleContactmsg` varchar(45) NOT NULL,
  `emailContactmsg` varchar(45) NOT NULL,
  `typeContactmsg` varchar(45) NOT NULL,
  `contentContactmsg` text NOT NULL,
  `statusContactmsg` varchar(30) NOT NULL,
  `timeContactmsg` datetime NOT NULL,
  PRIMARY KEY (`idContactmsg`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lbs_contactmsg`
--

LOCK TABLES `lbs_contactmsg` WRITE;
/*!40000 ALTER TABLE `lbs_contactmsg` DISABLE KEYS */;
INSERT INTO `lbs_contactmsg` VALUES (1,'de','de','Penting','de','Menunggu Respon','2017-05-04 09:25:02'),(2,'Saya mau komplain','oke begini','Emergency','asdasdwq','Menunggu Respon','2017-05-04 09:30:19'),(3,'de','sabuncolek@ambrizal.net','Normal','dwd','Menunggu Respon','2017-05-04 09:44:48'),(4,'de','sabuncolek@ambrizal.net','Emergency','de','Menunggu Respon','2017-05-04 09:45:25'),(5,'de','sabuncolek@ambrizal.net','Emergency','de','Menunggu Respon','2017-05-04 09:48:36'),(6,'asd','as','Emergency','asd','Menunggu Respon','2017-05-04 09:48:40'),(7,'de','sabuncolek@ambrizal.net','Penting','de','Menunggu Respon','2017-05-04 09:49:06'),(8,'de','de','Emergency','de','Menunggu Respon','2017-05-04 09:49:10'),(9,'','','Emergency','','Menunggu Respon','2017-05-04 09:49:25'),(10,'','','Emergency','','Menunggu Respon','2017-05-04 09:49:51'),(11,'','','Emergency','','Menunggu Respon','2017-05-04 09:49:52'),(12,'de','de','Emergency','de','Menunggu Respon','2017-05-04 09:49:55'),(13,'de','sabuncolek@ambrizal.net','Emergency','de','Menunggu Respon','2017-05-04 09:49:59'),(14,'','','Emergency','','Menunggu Respon','2017-05-04 09:50:01'),(15,'de','sabuncolek@ambrizal.net','Emergency','de','Menunggu Respon','2017-05-04 09:51:21'),(16,'de','sabuncolek@ambrizal.net','Emergency','de','Menunggu Respon','2017-05-04 09:51:38'),(17,'de','de','Normal','de','Menunggu Respon','2017-05-04 09:51:53'),(18,'ed','sabuncolek@ambrizal.net','Emergency','de','Menunggu Respon','2017-05-04 09:52:15'),(19,'de','sabuncolek@ambrizal.net','Emergency','de','Menunggu Respon','2017-05-04 09:52:25'),(20,'de','sabuncolek@ambrizal.net','Emergency','d','Menunggu Respon','2017-05-04 09:53:27'),(21,'de','sabuncolek@ambrizal.net','Penting','s','Menunggu Respon','2017-05-04 09:54:55');
/*!40000 ALTER TABLE `lbs_contactmsg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'web'
--

--
-- Dumping routines for database 'web'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-04 15:56:10
