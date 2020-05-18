-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: candidature
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dossier`
--
create database candidature;
use candidature;


DROP TABLE IF EXISTS `dossier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `dossier` (
  `id_dossier` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL,
  `cv` varchar(100) DEFAULT NULL,
  `releve` varchar(100) DEFAULT NULL,
  `lettremotiv` varchar(100) DEFAULT NULL,
  `screenshot` varchar(100) DEFAULT NULL,
  `formulaire` varchar(100) DEFAULT NULL,
  `id_type_formation` int(11) DEFAULT NULL,
  `identite` varchar(100) DEFAULT NULL,
  `commentaire` mediumtext,
  PRIMARY KEY (`id_dossier`),
  KEY `id_stat_idx` (`id_status`),
  KEY `id_forma_idx` (`id_formation`),
  KEY `id_util_idx` (`id_utilisateur`),
  KEY `id_type_forma_idx` (`id_type_formation`),
  CONSTRAINT `id_forma` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`),
  CONSTRAINT `id_stat` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  CONSTRAINT `id_type_forma` FOREIGN KEY (`id_type_formation`) REFERENCES `type_formation` (`id_type_formation`),
  CONSTRAINT `id_util` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dossier`
--

LOCK TABLES `dossier` WRITE;
/*!40000 ALTER TABLE `dossier` DISABLE KEYS */;
/*!40000 ALTER TABLE `dossier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formation`
--

DROP TABLE IF EXISTS `formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `libelle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formation`
--

LOCK TABLES `formation` WRITE;
/*!40000 ALTER TABLE `formation` DISABLE KEYS */;
INSERT INTO `formation` VALUES (1,'Licence Miage'),(2,'Master 1 Miage'),(3,'Master 2 Miage');
/*!40000 ALTER TABLE `formation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `libelle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Reçu'),(2,'Reçu incomplet'),(3,'Validé complet'),(4,'Entretien'),(5,'Accepté'),(6,'Refusé'),(7,'Liste d\'attente');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_formation`
--

DROP TABLE IF EXISTS `type_formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `type_formation` (
  `id_type_formation` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_type_formation`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_formation`
--

LOCK TABLES `type_formation` WRITE;
/*!40000 ALTER TABLE `type_formation` DISABLE KEYS */;
INSERT INTO `type_formation` VALUES (1,'Initial'),(2,'Alternance'),(3,'Initial et alternance');
/*!40000 ALTER TABLE `type_formation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `utilisateur` (
  `profil` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `date_de_naissance` varchar(45) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(60) DEFAULT NULL,
  `cni` varchar(45) DEFAULT NULL,
  `first_connexion` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES ('admin','admin','admin','1999-12-10',77777777,'admin@parisnanterre.fr',6,'$2y$10$PIEbzsdBYu21LXZOgFxLeeSjlo6BWCVjwN2xshn30RIndLMqeAjBy','dqf',NULL),('prof',NULL,NULL,NULL,NULL,'sonia@parisnanterre.fr',7,'$2y$10$9W5c460pxBDysyfGAp6GieaS0PF6/fgetMHreVDJU1cAINoQxIU.2',NULL,NULL),('prof',NULL,NULL,NULL,NULL,'jeanfrancois@parisnanterre.fr',8,'$2y$10$YYa/SuQoS57zPaZfMJm0TuWw2BazdWp3CbzaWX2KzfFZpvyzta6eG',NULL,NULL);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-18 17:01:53
