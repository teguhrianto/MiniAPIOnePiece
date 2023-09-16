-- MySQL dump 10.13  Distrib 5.7.34, for osx10.12 (x86_64)
--
-- Host: localhost    Database: db_onepiece
-- ------------------------------------------------------
-- Server version	5.7.34

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
-- Table structure for table `characters`
--

DROP TABLE IF EXISTS `characters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `devil_fruit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `devil_fruit_id` (`devil_fruit_id`),
  CONSTRAINT `characters_ibfk_1` FOREIGN KEY (`devil_fruit_id`) REFERENCES `devil_fruits` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `characters`
--

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;
INSERT INTO `characters` VALUES (1,'Monkey D. Luffy',19,1),(2,'Roronoa Zoro',21,NULL),(3,'Nami',20,NULL),(4,'Usopp',19,NULL),(5,'Sanji',21,2),(6,'Tony Tony Chopper',17,NULL),(7,'Nico Robin',30,NULL),(8,'Franky',34,NULL),(9,'Brook',90,NULL),(10,'Jinbe',46,NULL),(11,'Bon',22,2),(12,'Bonney',29,1),(13,'Doffy',32,5);
/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devil_fruits`
--

DROP TABLE IF EXISTS `devil_fruits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devil_fruits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devil_fruits`
--

LOCK TABLES `devil_fruits` WRITE;
/*!40000 ALTER TABLE `devil_fruits` DISABLE KEYS */;
INSERT INTO `devil_fruits` VALUES (1,'Gomu Gomu no Mi','Paramecia'),(2,'Mera Mera no Mi','Logia'),(3,'Hie Hie no Mi','Logia'),(4,'Hana Hana no Mi','Paramecia'),(5,'Yomi Yomi no Mi','Paramecia'),(6,'Suke Suke no Mi','Paramecia'),(7,'Tori Tori no Mi, Model: Falcon','Zoan'),(8,'Nikyu Nikyu no Mi','Paramecia'),(9,'Gura Gura no Mi','Paramecia'),(10,'Ope Ope no Mi','Paramecia'),(11,'Ope Ope No Mi','Paramecia');
/*!40000 ALTER TABLE `devil_fruits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_onepiece'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-17  4:12:31
