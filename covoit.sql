-- MySQL dump 10.19  Distrib 10.3.39-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: covoit2025
-- ------------------------------------------------------
-- Server version	10.3.39-MariaDB-0+deb10u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `CovoitUser`
--

DROP TABLE IF EXISTS `CovoitUser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CovoitUser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `tel` char(10) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `mdp` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CovoitUser`
--

LOCK TABLES `CovoitUser` WRITE;
/*!40000 ALTER TABLE `CovoitUser` DISABLE KEYS */;
INSERT INTO `CovoitUser` VALUES (1,'Dupont','Alice','0612345678','alice.dupont@example.com','alice123'),(2,'Martin','Bob','0698765432','bob.martin@example.com','bobsecret'),(4,'Lefevre','David','0611223344','david.lefevre@example.com','david2025'),(5,'Nguyen','Emilie','86955599','test@gmail.com','5ecuri+Y'),(6,'Dupont','Alice','0612345678','alice.dupont@example.com','alice123'),(7,'Martin','Bob','0698765432','bob.martin@example.com','bobsecret'),(8,'Moreau','Claire','0600112233','claire.moreau@example.com','clairepwd'),(9,'Lefevre','David','0611223344','david.lefevre@example.com','david2025'),(10,'Nguyen','Emilie','0677889900','emilie.nguyen@example.com','emipass45'),(11,'Doe','John','555-555','test@gmail.com','5ecuri+Y'),(12,'Wanderland','Alice','86955599','test@gmail.com','$2y$10$/CLzByXLVAcQJh0w8PrSUuCb7b28YbSJ1IMl8qxMohFf40Fv4qieK');
/*!40000 ALTER TABLE `CovoitUser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OffreCovoit`
--

DROP TABLE IF EXISTS `OffreCovoit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OffreCovoit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jour` enum('Lundi','Mardi','Mercredi','Jeudi','Vendredi') DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `lieu` varchar(40) DEFAULT NULL,
  `chauffeur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chauffeur` (`chauffeur`),
  CONSTRAINT `OffreCovoit_ibfk_1` FOREIGN KEY (`chauffeur`) REFERENCES `CovoitUser` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OffreCovoit`
--

LOCK TABLES `OffreCovoit` WRITE;
/*!40000 ALTER TABLE `OffreCovoit` DISABLE KEYS */;
INSERT INTO `OffreCovoit` VALUES (7,'Lundi','08:00:00','2025-09-22','Gare Centrale',1),(8,'Mardi','07:30:00','2025-09-23','Université',2),(9,'Mercredi','09:15:00','2025-09-24','Zone Industrielle',2),(10,'Jeudi','18:00:00','2025-09-25','Centre Ville',1),(11,'Vendredi','12:00:00','2025-09-26','Aéroport',4),(12,'Lundi','07:45:00','2025-09-29','Campus Sud',5);
/*!40000 ALTER TABLE `OffreCovoit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-14 20:48:31
