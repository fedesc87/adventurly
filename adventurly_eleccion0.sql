-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: adventurly
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `eleccion`
--

DROP TABLE IF EXISTS `eleccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eleccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `decision` varchar(45) CHARACTER SET latin1 NOT NULL,
  `valor` int(11) NOT NULL,
  `consecuencia` text CHARACTER SET latin1 NOT NULL,
  `id_historia` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `parent_id_fk` (`parent_id`),
  KEY `id_historia_fk` (`id_historia`),
  CONSTRAINT `id_historia_fk` FOREIGN KEY (`id_historia`) REFERENCES `historia` (`id`),
  CONSTRAINT `parent_id_fk` FOREIGN KEY (`parent_id`) REFERENCES `eleccion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eleccion`
--

LOCK TABLES `eleccion` WRITE;
/*!40000 ALTER TABLE `eleccion` DISABLE KEYS */;
INSERT INTO `eleccion` VALUES (1,'Entrar en el bosque',1,'Ves una sombra, no sabes si es un niño o un arbusto. Resulta ser un niño. esta blanco como un papel y llorando. tratas de calmarlo y te pide que lo lleves a tu casa que queda (apuntando) en esa dirección',1,NULL),(2,'Escapar',2,'Por cobarde corres y caes en un pozo. Te quebras la columna pero no moris',1,NULL),(3,'Dormir en el lugar',3,'Por flojo viene un monstruo mítico y te come',1,NULL),(4,'Le pegas para calmarlo',2,'El nene sale corriendo y lo come un oso que justo pasaba por ahi',1,1),(5,'Empiezan a caminar hacia allá',1,'Consiguen encontrar el sendero al pueblo donde vive el niño, pero se topan con un gigante monstruo amenazándolos. Observas que tiene una flecha enterrada cerca del cuello...',1,1),(6,'Le decís que se maneje y te vas',3,'Te encontras con un oso que, por cobarde, te come.',1,1),(7,'Usar la flecha',1,'Con movimientos de ninja, logras enterrarle más dentro del cuello la flecha al monstruo. Este muere en agonía. Ahora vos sos el monstruo. Llevás a niño hasta el pueblo y te adentras en el bosque para protegerlo de quien quiera acercarse..matandolos.',1,5),(8,'Bailar',3,'El monstruo baila con vos. El niño se enoja con los dos y los mata.',1,5),(9,'Corres ',2,'El monstruo te alcanza, te mata y se lleva al niño.',1,5);
/*!40000 ALTER TABLE `eleccion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-12 14:07:30
