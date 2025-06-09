-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: db_niyi
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `caisse`
--

DROP TABLE IF EXISTS `caisse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caisse` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `statut` enum('Entrant','Sortant') NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caisse`
--

LOCK TABLES `caisse` WRITE;
/*!40000 ALTER TABLE `caisse` DISABLE KEYS */;
INSERT INTO `caisse` VALUES (1,'Western',458000,'Entrant','2025-01-06 15:45:11'),(4,'Ria',45000,'Sortant','2025-01-08 18:30:17'),(5,'Ria',728050,'Sortant','2025-01-08 18:30:43'),(6,'Ria',32050,'Sortant','2025-01-06 19:48:27'),(7,'Western',70390,'Sortant','2025-01-06 19:49:13'),(8,'Ria',57050,'Sortant','2025-01-08 09:18:56'),(9,'Western',280550,'Entrant','2025-01-08 18:22:40'),(10,'MoneyGramm',350500,'Entrant','2025-01-09 18:47:06'),(11,'Ria',25874,'Sortant','2025-01-08 18:27:42'),(12,'MoneyGramm',7890560,'Entrant','2025-01-08 09:20:29'),(14,'C1',7200,'Entrant','2025-01-09 18:36:03'),(15,'Western',100000,'Entrant','2025-01-09 18:48:27'),(16,'Momo',48000,'Entrant','2025-01-11 01:12:38');
/*!40000 ALTER TABLE `caisse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devise`
--

DROP TABLE IF EXISTS `devise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `devise` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `statut` enum('Entrant','Sortant') NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devise`
--

LOCK TABLES `devise` WRITE;
/*!40000 ALTER TABLE `devise` DISABLE KEYS */;
INSERT INTO `devise` VALUES (1,'Dollars USD',47050,'Sortant','2025-01-08 18:37:57');
/*!40000 ALTER TABLE `devise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `momo`
--

DROP TABLE IF EXISTS `momo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `momo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `statut` enum('Entrant','Sortant') NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `momo`
--

LOCK TABLES `momo` WRITE;
/*!40000 ALTER TABLE `momo` DISABLE KEYS */;
INSERT INTO `momo` VALUES (3,'MTN',359775,'Sortant','2025-01-08 18:43:47'),(4,'MTN',145055,'Sortant','2025-01-08 10:39:28'),(5,'CELTIS',62300,'Sortant','2025-01-11 01:21:45'),(6,'MOOV',200,'Entrant','2025-01-11 01:21:38');
/*!40000 ALTER TABLE `momo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `naira`
--

DROP TABLE IF EXISTS `naira`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `naira` (
  `id` int NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `statut` enum('Entrant','Sortant') NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `naira`
--

LOCK TABLES `naira` WRITE;
/*!40000 ALTER TABLE `naira` DISABLE KEYS */;
INSERT INTO `naira` VALUES (1,5889250,'Entrant','2025-01-08 10:53:51'),(2,2423270,'Sortant','2025-01-11 01:43:21');
/*!40000 ALTER TABLE `naira` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `user_signup_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'TOQOS','admin@gmail.com','$2y$10$gNh.3q0KxoXw8mPmPQCsQ.kSC3p/g7xz2AZWL0tWKdqo0zXvkHG3u','administrateur','2025-01-08 21:21:43');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-14  5:41:14
