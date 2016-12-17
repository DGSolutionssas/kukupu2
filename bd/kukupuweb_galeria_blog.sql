CREATE DATABASE  IF NOT EXISTS `kukupuweb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kukupuweb`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: kukupuweb
-- ------------------------------------------------------
-- Server version	5.6.22-log

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
-- Table structure for table `galeria_blog`
--

DROP TABLE IF EXISTS `galeria_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galeria_blog` (
  `idgaleria` int(11) NOT NULL,
  `idblog` int(11) NOT NULL,
  KEY `galeria_blog_blog_idx` (`idblog`),
  KEY `galeria_blog_galeria_idx` (`idgaleria`),
  CONSTRAINT `galeria_blog_blog` FOREIGN KEY (`idblog`) REFERENCES `blog` (`idBlog`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `galeria_blog_galeria` FOREIGN KEY (`idgaleria`) REFERENCES `galerias` (`idGaleria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tabla para asociar las fotos a presentar en el blog';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeria_blog`
--

LOCK TABLES `galeria_blog` WRITE;
/*!40000 ALTER TABLE `galeria_blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeria_blog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-17 11:44:18
