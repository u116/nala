-- MySQL dump 10.13  Distrib 8.0.33, for Linux (aarch64)
--
-- Host: localhost    Database: nala
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `about` (
  `aid` int unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `uid` int unsigned NOT NULL,
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  CONSTRAINT `about_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` VALUES (2,'Hey there, I\'m nala. I\'m currently a 23 years old guy living in Spain. This website is a personal proyect focused on carrying out some practices on web developing. I use this site for tools like file-sharing, link-shortening, image storing and other stuff.','2023-09-02 19:51:28',1);
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog` (
  `bid` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `uid` int unsigned NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `uid` (`uid`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,'Pokemon Brilliant Pearl','Finally this game came out! It actually feels quite good to play it, even though I didn\'t expect much from the trailers... I am, indeed, enjoying it a lot.','pkmn.jpg','2021-11-20 00:00:00',1),(2,'Beating the game','Already beat the game... Had a much better experience than I expected. I can feel there is love put into this game, so props to ILCA and the rest of the developers.  It\'s now time for the after-game!','pkmn_1.jpeg','2021-11-23 00:00:00',1),(3,'Spotify Wrapped 2021','This year\'s wrapped is again stucked with japanese music... (unexpected). Surprisingly though, Yorushika is still on top, I thought I didn\'t hear them as much this year...? Anyways, I only use Spotify when I\'m out, so this list kind of not represents much. To point something out, I\'ve known about Chatmonchy from just this year, and I\'ve really been loving their music lately.','spotify.png','2021-12-05 00:00:00',1);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `cid` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(319) DEFAULT NULL,
  `X` varchar(15) DEFAULT NULL,
  `github` varchar(39) DEFAULT NULL,
  `discord` varchar(39) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `uid` int unsigned NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `uid` (`uid`),
  CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'me@nala.dev','nala_dev','u116',NULL,'https://nala.dev',1);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interests` (
  `iid` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `uid` int unsigned NOT NULL,
  PRIMARY KEY (`iid`),
  UNIQUE KEY `title` (`title`),
  KEY `uid` (`uid`),
  CONSTRAINT `interests_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interests`
--

LOCK TABLES `interests` WRITE;
/*!40000 ALTER TABLE `interests` DISABLE KEYS */;
INSERT INTO `interests` VALUES (1,'music','I listen to music basically all the time I am able to, I\'m used to it. It has been with me since I can remember. Currently I love nayuta, minami, monet... but the list is endless.','2023-09-03 15:55:40',1),(2,'Videogames','I play osu! (#12k peak), Azur Lane (Lv. 132 and 99.2% collection) and League of Legends (Master peak). I also play Pokemon from time to time.','2023-09-03 15:58:04',1),(3,'Programming','I love programming and I\'m a pretty active self-learner in this topic. I like to develop web applications as I enjoy Internet communities.','2023-09-03 15:59:58',1),(4,'Media content','I\'m into anime and visual novels, and I use youtube (podcasts, medicine/physics videos, things about my music and other random stuff) and twitch (shigetora and werster).','2023-09-03 16:01:45',1);
/*!40000 ALTER TABLE `interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sakuin`
--

DROP TABLE IF EXISTS `sakuin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sakuin` (
  `sid` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `description` text,
  `link` varchar(2083) NOT NULL,
  `uid` int unsigned NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `uid` (`uid`),
  CONSTRAINT `sakuin_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sakuin`
--

LOCK TABLES `sakuin` WRITE;
/*!40000 ALTER TABLE `sakuin` DISABLE KEYS */;
INSERT INTO `sakuin` VALUES (1,'Ikanaide','Ikanaide is a community-oriented website focused on the japanese culture that envolves anime, manga and related. It\'s currently an on hold project but definitely something I want to hard work on in the near future. At the moment it merely is a pretty basic website that I presented as a project needed on my studies.','https://ikanaide.com',1),(3,'Personal website','nala.dev is my personal website. It\'s fully written in PHP. For now, it can\'t do much, but I intend to add certain functionalities soon. I\'m also writing it in a way where it could become a template in case anyone would like to use this format for his own site.','https://nala.dev',1);
/*!40000 ALTER TABLE `sakuin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `uid` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(60) NOT NULL,
  `joined_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(319) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `sessions` (
                            `token` VARCHAR(256) NOT NULL,
                            `date` DATETIME DEFAULT CURRENT_TIMESTAMP,
                            `uid` INT UNSIGNED NOT NULL,
                            FOREIGN KEY (`uid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
                            PRIMARY KEY (`token`)
) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'nala','nala','2023-09-02 19:51:25','me@nala.dev'),(2,'nabuna','nabuna','2023-09-03 11:04:19',NULL);
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

-- Dump completed on 2023-09-04 23:48:34
