-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: pai__osrodek
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

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
-- Table structure for table `apartments`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` varchar(300) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartments`
--

LOCK TABLES `apartments` WRITE;
INSERT INTO `apartments` VALUES (1,'Example','');
UNLOCK TABLES;

--
-- Table structure for table `apt_bookings`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apt_bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apt_bookings_apartments_id_fk` (`apt_id`),
  KEY `apt_bookings_users_id_fk` (`user_id`),
  CONSTRAINT `apt_bookings_apartments_id_fk` FOREIGN KEY (`apt_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `apt_bookings_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apt_bookings`
--

LOCK TABLES `apt_bookings` WRITE;
INSERT INTO `apt_bookings` VALUES (1,1,1,'2020-11-06','2020-11-08');
UNLOCK TABLES;

--
-- Table structure for table `apt_facilities`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apt_facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apt_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(300) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `apt_facilities_apartments_id_fk` (`apt_id`),
  CONSTRAINT `apt_facilities_apartments_id_fk` FOREIGN KEY (`apt_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apt_facilities`
--

LOCK TABLES `apt_facilities` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `apt_photos`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apt_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apt_id` int(11) NOT NULL,
  `photo_name` varchar(40) NOT NULL,
  `file_name` varchar(36) NOT NULL,
  `description` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `apt_photos_file_name_uindex` (`file_name`),
  KEY `apt_photos_apartments_id_fk` (`apt_id`),
  CONSTRAINT `apt_photos_apartments_id_fk` FOREIGN KEY (`apt_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apt_photos`
--

LOCK TABLES `apt_photos` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `apt_ratings`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apt_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` tinyint(1) NOT NULL,
  `description` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `apt_ratings_apartments_id_fk` (`apt_id`),
  KEY `apt_ratings_users_id_fk` (`user_id`),
  CONSTRAINT `apt_ratings_apartments_id_fk` FOREIGN KEY (`apt_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `apt_ratings_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apt_ratings`
--

LOCK TABLES `apt_ratings` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `edit_date` date NOT NULL DEFAULT curdate(),
  PRIMARY KEY (`id`),
  KEY `articles_users_id_fk` (`author_id`),
  CONSTRAINT `articles_users_id_fk` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
INSERT INTO `articles` VALUES (1,'homepage','Przykładowy tekst wybierany z bazy danych.',2,'2020-11-09');
UNLOCK TABLES;

--
-- Table structure for table `attractions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attractions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL DEFAULT '',
  `distance` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions`
--

LOCK TABLES `attractions` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` varchar(300) NOT NULL DEFAULT '',
  `date_from` date NOT NULL DEFAULT current_timestamp(),
  `date_to` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(1) NOT NULL DEFAULT 'c' COMMENT 'C - client; W - worker; A - administrator',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_login_uindex` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'Kamil','qwerty','c'),(2,'admin','qwerty','a'),(3,'pracownik','qwerty','w');
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-24  8:50:51
