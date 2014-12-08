CREATE DATABASE  IF NOT EXISTS `moovite` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `moovite`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: moovite
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `voyage`
--

DROP TABLE IF EXISTS `voyage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voyage` (
  `idvoyage` int(11) NOT NULL AUTO_INCREMENT,
  `depart` varchar(45) NOT NULL,
  `arrivee` varchar(45) NOT NULL,
  `datedepart` datetime NOT NULL,
  `datearrivee` datetime NOT NULL,
  `compagnie_avion` varchar(45) DEFAULT NULL,
  `prix_train` double DEFAULT NULL,
  `prix_avion` double DEFAULT NULL,
  `prix_covoit` double DEFAULT NULL,
  `duree_avion` time DEFAULT NULL,
  `duree_train` time DEFAULT NULL,
  `duree_covoit` time DEFAULT NULL,
  `co2` double DEFAULT NULL,
  PRIMARY KEY (`idvoyage`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voyage`
--

LOCK TABLES `voyage` WRITE;
/*!40000 ALTER TABLE `voyage` DISABLE KEYS */;
INSERT INTO `voyage` VALUES (1,'brest','antibes','2015-02-01 07:10:00','2015-02-01 21:10:00','sncf blablacar',70,65,0,'00:00:00','05:00:00','09:00:00',135),(2,'brest','antibes','2015-02-01 07:10:00','2015-02-01 21:10:00','sncf blablacar',70,0,65,'00:00:00','05:00:00','09:00:00',135),(3,'brest','antibes','2015-02-01 08:40:00','2015-02-01 20:50:00','sncf',155,0,0,'00:00:00','12:10:00','00:00:00',125),(4,'brest','antibes','2015-02-01 08:40:00','2015-02-01 20:50:00','raynair blablacar',0,55,25,'01:30:00','00:00:00','00:50:00',140),(5,'brest','antibes','2015-02-01 08:40:00','2015-02-01 20:50:00','raynair sncf',35,55,0,'01:30:00','00:40:00','00:00:00',134),(6,'brest','nice','2015-02-01 08:40:00','2015-02-01 20:50:00','raynair sncf',35,55,0,'01:30:00','00:00:00','00:40:00',134),(7,'brest','lyon','2015-02-01 08:40:00','2015-02-01 17:50:00','sncf',95,0,0,'00:00:00','09:10:00','00:00:00',134),(8,'quimper','lyon','2015-02-01 08:40:00','2015-02-01 17:50:00','sncf',95,0,0,'00:00:00','09:10:00','00:00:00',132);
/*!40000 ALTER TABLE `voyage` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-08 19:01:18
