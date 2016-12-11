-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: susu
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT '0.00',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `nextOfKin` varchar(100) DEFAULT NULL,
  `salesPerson` varchar(100) DEFAULT NULL,
  `unitContribution` varchar(10) DEFAULT NULL,
  `houseNumber` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `dateOfBirth` varchar(50) DEFAULT NULL,
  `accountNumber` varchar(10) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `accountType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Nurudin','0248125236','undefined','Accra',NULL,0.00,'1','hakim','Sales 2','50','GHS240',NULL,NULL,'2016-12-06',NULL,'Male','Susu Account'),(2,'Loreta','0248125236','loreta@yahoo.com','Takoradi',NULL,0.00,'0','Mag','Sales 2','20','GHS240',NULL,NULL,'2016-12-08','CCSS0002','Female','Susu Account'),(3,'hakim','0243246888','hakim@gmail.com','Kojo Sardine',NULL,200.00,'1','Nuru','Sales 1','','GS242',NULL,NULL,'2016-12-10','CCSS0003','Male',''),(4,'Therera Tetteh','0243246888','hakim@gmail.com','Kojo Sardine',NULL,0.00,'1','Nuru','Sales 1','','GS242',NULL,NULL,'2016-12-10','CCSS0004','Male','null');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `client` int(12) NOT NULL,
  `amount` decimal(12,0) NOT NULL,
  `balance` decimal(12,0) NOT NULL,
  `user` int(6) NOT NULL,
  `sales` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'Deposit','01-Dec-2016',2,100,19400,7,'Sales 2',NULL,'2016-12-10 11:18:20'),(2,'Withdrawal','01-Dec-2016',2,200,19200,7,'Sales 2',NULL,'2016-12-10 11:18:30'),(3,'Deposit','08-Dec-2016',1,600,800,7,'Sales 2',NULL,'2016-12-10 11:18:52'),(4,'Withdrawal','08-Dec-2016',1,200,600,7,'Sales 2',NULL,'2016-12-10 11:19:12'),(5,'Deposit','17-Dec-2016',3,200,200,7,'Sales 1',NULL,'2016-12-10 16:37:07');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `position` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'Nurudin Lartey Wahab','0243246888','undefined','Labadi','nuru','pass','undefined','0'),(8,'Emmanuel Asaber','8504065214','undefined','Accra','emma','pass','undefined','0'),(20,'Sales 2','5454545','i@gmail.com','osu','sales2','pass','Sales','1'),(21,'Rayden','0261212124','undefined','Kumasi','nuru','pass','Director','1'),(22,'Sales 1','','undefined','','nuru','pass','Sales','1'),(23,'Sales 3','','undefined','','nuru','pass','Sales','1'),(24,'Sales 4','','undefined','','sales4','pass','Sales','1');
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

-- Dump completed on 2016-12-11  3:35:03
