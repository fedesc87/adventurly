-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: adventurly
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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(8,2) NOT NULL DEFAULT '0.00',
  `chapter_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'El Origen','Toda gran aventura empieza con un héroe y su decición de seguir el camino. Esta aventura te va a ayudar a entender el sistema de Adventurly',4.50,5,'2017-08-14 04:00:10','2017-08-14 04:00:10'),(2,'Omega','Todo termina al fin, Nada puede quedar. Nuestras aventuras pueden terminar pero el aventurero en nosotros no!',2.50,4,'2017-08-14 04:00:10','2017-08-14 04:00:10'),(3,'El Otro','Las aventuras tienen caminos. Estos suelen llevarnos a destinos distintos. Pero no importa, lo importante es el viaje.',2.00,4,'2017-08-14 04:00:10','2017-08-14 04:00:10');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chapter_num` int(11) NOT NULL,
  `prev_decision` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `decision_a_id` int(11) NOT NULL,
  `decision_a_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decision_b_id` int(11) NOT NULL,
  `decision_b_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decision_c_id` int(11) NOT NULL,
  `decision_c_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapters`
--

LOCK TABLES `chapters` WRITE;
/*!40000 ALTER TABLE `chapters` DISABLE KEYS */;
INSERT INTO `chapters` VALUES (1,0,'0','0',0,'0',0,'0',0,'0',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,0,'0','0',0,'0',0,'0',0,'0',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,0,'0','0',0,'0',0,'0',0,'0',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,'0','Te has encontrado con un destino terrible, ¿no?',1,'Volver a Empezar',2,'Volver Atras',3,'Otra Historia',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,1,'0','Saliste de Vacaciones. Elegiste el bosque que esta pasando un pequeño pueblo misterioso. Despues de caminar un rato ves una sombra. Es pequeña, puede ser un niño. Puede ser un arbusto. O puede ser algo peor. Que haces?',6,'Entrar en el bosque',7,'Escapar',8,'Dormir en el lugar',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,2,'5','Resulta ser un niño. esta blanco como un papel y llorando. tratas de calmarlo y te pide que lo lleves a tu casa que queda (apuntando) en esa dirección',9,'Le pegas para calmarlo',10,'Empiezan a caminar hacia allá',11,'Le decís que se maneje y te vas',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,2,'5','Por cobarde corres y caes en un pozo. Te quebras la columna pero no moris. No aun...',1,'Volver a Empezar',2,'Volver Atras',3,'Otra Historia',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,2,'5','Mientras dormis escuchas ruidos. Te levantas al sonido de un fuerte chillido. La sombra sera el chupacabras... te esta comiendo despacio.',1,'Volver a Empezar',2,'Volver Atras',3,'Otra Historia',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,3,'6','El nene sale corriendo y lo come un oso que justo pasaba por ahi',1,'Volver a Empezar',2,'Volver Atras',3,'Otra Historia',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,3,'6','Consiguen encontrar el sendero al pueblo donde vive el niño, pero se topan con un gigante monstruo amenazándolos. Observas que tiene una flecha enterrada cerca del cuello...',12,'Usar la flecha',13,'Bailar',14,'Corres',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,3,'6','Te encontras con un oso que, por cobarde, te come.',1,'Volver a Empezar',2,'Volver Atras',3,'Otra Historia',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,4,'10','Con movimientos de ninja, logras enterrarle más dentro del cuello la flecha al monstruo. Este muere en agonía. Ahora vos sos el monstruo. Llevás a niño hasta el pueblo y te adentras en el bosque para protegerlo de quien quiera acercarse..matandolos.',4,'Sobreviviste!',0,'0',0,'0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,4,'10','El monstruo baila con vos. El niño se enoja con los dos y los mata.',1,'Volver a Empezar',2,'Volver Atras',3,'Otra Historia',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,4,'10','El monstruo te alcanza, te mata y se lleva al niño.',1,'Volver a Empezar',2,'Volver Atras',3,'Otra Historia',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `chapters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medals`
--

DROP TABLE IF EXISTS `medals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medals`
--

LOCK TABLES `medals` WRITE;
/*!40000 ALTER TABLE `medals` DISABLE KEYS */;
INSERT INTO `medals` VALUES (1,'Alpha_Test','Fuiste una parte integral para Adventurly. Te Queremos',99.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(2,'Beta_Test','Estuviste con nosotros desde el principio.Gracias!',10.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(3,'El_Origen','Soberviviste las aventuras en el Origen. Genio ',2.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(4,'El_Otro','Atravezaste el Otro sin problemas, Sos todo un aventurero',2.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(5,'Omega','Llegaste al final y seguis aca. Muy bien. Te esperamos para la proxima',2.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(6,'First_Story','Completaste una historia completa. Esto solo es el comienzo',1.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(7,'Two_Stories','Ya pasaste por dos grandes aventuras. No te quedes, segui que hay mas',2.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(8,'Trio_Stories','Tres es un numero magico. Pero que no se quede asi.',3.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(9,'Five_Stories','Cinco. Lindo numero, Vamos por mas!',5.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(10,'Seven_Stories','Siete el numero de la suerte. Que hayas llegado aca demuestra compromiso',7.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(11,'Decade_Stories','Una decena de aventuras. Miles de anegdotas. Ya sos un veterano',10.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(12,'La_Torre','Subiste la torre. Derrotaste al mal que la poseia y viviste para ocntarlo',3.00,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(13,'Le_Rock','Una gran aventura. Muchas Bandas y Rock para todos',3.00,'2017-08-14 04:00:00','2017-08-14 04:00:00');
/*!40000 ALTER TABLE `medals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (8,'2014_10_12_000000_create_users_table',1),(9,'2014_10_12_100000_create_password_resets_table',1),(10,'2017_08_14_054618_create_stories_table',1),(11,'2017_08_14_073707_create_chapters_table',1),(12,'2017_08_14_141638_create_medals_table',1),(13,'2017_08_14_142406_create_unlocks_table',1),(14,'2017_08_14_172014_create_books_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(8,2) NOT NULL DEFAULT '0.00',
  `chapter_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stories`
--

LOCK TABLES `stories` WRITE;
/*!40000 ALTER TABLE `stories` DISABLE KEYS */;
/*!40000 ALTER TABLE `stories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unlocks`
--

DROP TABLE IF EXISTS `unlocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unlocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `medal_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unlocks`
--

LOCK TABLES `unlocks` WRITE;
/*!40000 ALTER TABLE `unlocks` DISABLE KEYS */;
INSERT INTO `unlocks` VALUES (1,1,1,1,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(2,1,2,1,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(3,1,3,1,'2017-08-14 04:00:00','2017-08-14 04:00:00'),(4,1,4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,1,5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,1,6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,1,7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,1,8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,1,9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,1,10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,1,11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `unlocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Pancho','pancho@adv.com','$2y$10$KVGPWd9isY1B1u.Pi5q6Te2JDjiTQufTwYRCYFBgmNMNGkOhplp4W','LLq73hS4hndP19XrACZvUMU2pgW7h1DecHbOkB8ESnvQlRpwJuS0mOB5MFjK','2017-08-14 23:36:05','2017-08-14 23:36:05'),(2,'Admin','Admin@Admin.com','$2y$10$AnYgD5SSjN2onaMHVQo0b.nVRiyRiaFZjAx76olK5BiaZ8jAm54CS','viuseQqSum040sZnZuuiEkcjzcc404W1QT5qVYPn2P56FVhy9x1taDtPgSa2','2017-08-15 13:29:28','2017-08-15 13:29:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'adventurly'
--

--
-- Dumping routines for database 'adventurly'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-15 17:24:29
