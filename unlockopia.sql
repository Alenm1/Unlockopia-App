-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: unlockopia
-- ------------------------------------------------------
-- Server version	8.0.38

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'PC'),(2,'PSP');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dias`
--

DROP TABLE IF EXISTS `dias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dias`
--

LOCK TABLES `dias` WRITE;
/*!40000 ALTER TABLE `dias` DISABLE KEYS */;
INSERT INTO `dias` VALUES (1,'Steam'),(2,'Steam Familiar');
/*!40000 ALTER TABLE `dias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `descripcion` text,
  `disponibles` int DEFAULT NULL,
  `categoria_id` int NOT NULL,
  `dia_id` int NOT NULL,
  `hora_id` int NOT NULL,
  `juego_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eventos_categorias_idx` (`categoria_id`),
  KEY `fk_eventos_dias1_idx` (`dia_id`),
  KEY `fk_eventos_horas1_idx` (`hora_id`),
  KEY `fk_eventos_juegos1_idx` (`juego_id`),
  CONSTRAINT `fk_eventos_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `fk_eventos_dias1` FOREIGN KEY (`dia_id`) REFERENCES `dias` (`id`),
  CONSTRAINT `fk_eventos_horas1` FOREIGN KEY (`hora_id`) REFERENCES `horas` (`id`),
  CONSTRAINT `fk_eventos_juegos1` FOREIGN KEY (`juego_id`) REFERENCES `juegos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'Arcade','Se caracterizan por su jugabilidad sencilla y accesible, diseñada para ser fácil de entender pero difícil de dominar. Estos juegos suelen tener niveles cortos, un ritmo rápido y una curva de dificultad progresiva. ',26,1,1,2,3),(2,'Familia 1','Duis sodales commodo quam, ut molestie mi dictum sed. Donec facilisis suscipit finibus. Praesent sagittis sapien vel interdum dictum. Nullam luctus eleifend elementum. Integer lacinia, mauris congue accumsan pretium, nunc libero iaculis libero, sit amet viverra risus mauris non ante. Nam a efficitur velit. Integer ut tincidunt dolor. Fusce vitae lectus vel turpis euismod dictum eget non velit. Proin eu mi bibendum, sollicitudin magna non, laoreet arcu. Curabitur tempus tincidunt est, et dapibus lectus eleifend quis. Sed eu augue sit amet arcu dictum lobortis. Donec velit risus, placerat eu lobortis at, aliquet nec velit.',15,2,2,4,2),(3,'Familia 2','Proin quis velit iaculis, aliquam diam a, iaculis sapien. Nullam nec ligula ex. Fusce laoreet, purus sed convallis venenatis, neque mi interdum nunc, eget dapibus lectus nisi sit amet est. Aliquam eu massa molestie, euismod orci ut, fringilla erat. In ullamcorper tempor tellus vel auctor. Maecenas dignissim in tortor a consequat. Quisque orci nisi, ultricies in molestie non, pharetra quis nibh. Maecenas consectetur, est eget lobortis ullamcorper, justo sapien vehicula ligula, quis dapibus diam nulla ac dolor. Sed at congue erat. Suspendisse condimentum ex ac tellus luctus bibendum. Nam posuere a nunc a tempus.',17,2,1,6,3),(4,'Acción',' Los juegos de acción pueden situarse en una gran variedad de contextos, desde mundos futuristas hasta escenarios históricos, pero siempre mantienen un enfoque en la dinámica y la emoción del combate y la aventura.',26,1,1,3,12),(5,'Estrategia','Los juegos de estrategia demandan que los jugadores utilicen el pensamiento táctico y la planificación a largo plazo para alcanzar sus objetivos. Estos juegos pueden estar basados en turnos o en tiempo real, y suelen involucrar la gestión de recursos, la construcción de bases, y la coordinación de unidades o personajes. ',26,1,1,4,10),(6,'Gore ','Los juegos de gore se destacan por su contenido gráfico explícito y violento. Este subgénero puede aparecer en una variedad de juegos, incluyendo acción, horror y algunos títulos de aventura. Los elementos de gore se caracterizan por la representación detallada de sangre, vísceras y heridas, buscando impactar visualmente al jugador y a menudo sumergirlo en una atmósfera de tensión y horror',26,1,1,5,6);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horas`
--

DROP TABLE IF EXISTS `horas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hora` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horas`
--

LOCK TABLES `horas` WRITE;
/*!40000 ALTER TABLE `horas` DISABLE KEYS */;
INSERT INTO `horas` VALUES (1,'‎ '),(2,'‎ '),(3,'‎ '),(4,'‎ '),(5,'‎ '),(6,'‎ '),(7,'‎ '),(8,'‎ ');
/*!40000 ALTER TABLE `horas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juegos`
--

DROP TABLE IF EXISTS `juegos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `juegos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `estudio` varchar(40) DEFAULT NULL,
  `plataforma` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `imagen` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tags` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `redes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juegos`
--

LOCK TABLES `juegos` WRITE;
/*!40000 ALTER TABLE `juegos` DISABLE KEYS */;
INSERT INTO `juegos` VALUES (2,' God Of War','S/. 85.00','PC','Perú','68455e1d30ad169db88527622c3e4635','acción','{\"steam\":\"https://store.steampowered.com/app/1593500/God_of_War/\",\"xbox\":\"\",\"play\":\"https://www.playstation.com/es-pe/games/god-of-war/\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(3,' Ultra Street Fighter IV','S/. 20.00','PC','Perú','d6dc2674249feaf001d144173aad2469','acción,pasatiempo','{\"steam\":\"https://store.steampowered.com/app/45760/Ultra_Street_Fighter_IV/?l=spanish\",\"xbox\":\"https://www.xbox.com/es-ES/games/store/ultra-sfiv/BWSDF7H5XTCX\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(4,' Mortal Kombat 11 Ultimate','S/. 25.00','PC','Perú','5edf15a9932b599a3f810b9bdf5d7ed6','acción','{\"steam\":\"https://store.steampowered.com/app/976310/Mortal_Kombat11/\",\"xbox\":\"https://www.xbox.com/es-MX/games/store/mortal-kombat-11-ultimate/9pg26dbx43l1\",\"play\":\"https://store.playstation.com/es-bo/product/UP1018-PPSA01617_00-MK11ULTIMATEKOLL\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(5,' Mortal Kombat 11 And X','S/. 35.00','PC','Perú','d2baf3c4bacc27f7ee3be50ed7f93c76','acción','{\"steam\":\"https://store.steampowered.com/app/976310/Mortal_Kombat11/?l=spanish\",\"xbox\":\"https://www.xbox.com/es-MX/games/store/mortal-kombat-11/btc0l0bw6lwc\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(6,' Mortal Kombat 1','S/. 120.00','PC, PS4','Perú','ad411563bc1f30cce8f50b3ce058efdf','acción','{\"steam\":\"https://store.steampowered.com/app/1971870/Mortal_Kombat_1/\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(7,' Dragon Ball Z: Kakarot Deluxe Edition','S/. 80.00','PC, PS4','Perú','e5b37cb62f1d73eaf795006cef3316ba','acción,pasatiempo','{\"steam\":\"https://store.steampowered.com/app/851850/DRAGON_BALL_Z_KAKAROT/\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"https://www.xbox.com/es-ES/games/store/dragon-ball-z-kakarot-deluxe-edition/9P9KP4WTMN5M\",\"google\":\"\"} '),(8,' Dragon Ball Xenoverse','S/. 20.00','PC, PS4','Perú','2b7f89666f3405951fe209bb6f1d7fc4','acción','{\"steam\":\"https://store.steampowered.com/app/323470/DRAGON_BALL_XENOVERSE/\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(9,' Dragonball Xenoverse Bundle Edition','S/. 30.00','PC, PS4','Perú','3e3f5355dcb8eed9aa56c166c8ce4b3a','acción,pasatiempo','{\"steam\":\"https://store.steampowered.com/sub/59191/?l=spanish\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(10,' Dragon Ball - Fighterz Edition','S/. 60.00','PC, PS4','Perú','b4e85413dd08a6d59b4c38b45f1908bd','pasatiempo','{\"steam\":\"https://store.steampowered.com/app/678950/DRAGON_BALL_FighterZ/\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"}'),(11,' Hogwarts Legacy','S/. 105.00','PC','Perú','a8fb55aa20d947c137807168bdda2458','acción,estrategia','{\"steam\":\"https://store.steampowered.com/app/990080/Hogwarts_Legacy/?l=spanish\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"https://store.epicgames.com/es-ES/p/hogwarts-legacy\",\"microsoft\":\"\",\"google\":\"\"} '),(12,' Batman: Arkham Collection','S/. 40.00','PC','Perú','c7b1f7b496af624f6774dedb1dd196fb','acción','{\"steam\":\"https://store.steampowered.com/sub/320795/\",\"xbox\":\"https://www.xbox.com/es-ES/games/store/batman-arkham-collection/C4H36B87SVL1\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(13,' Back 4 Blood','S/. 35.00','PC','Perú','1bb0e92ee59dde1c2ab9201e8ff36437','acción,supervivencia','{\"steam\":\"https://store.steampowered.com/app/924970/Back_4_Blood/\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"https://store.epicgames.com/es-ES/p/back-4-blood\",\"microsoft\":\"\",\"google\":\"\"} '),(14,' Watch Dogs 2','S/. 30.00','PC','Perú','e3af28bf489b69fa5324585a5c94e84e','supervivencia,acción','{\"steam\":\"https://store.steampowered.com/app/447040/Watch_Dogs_2/\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"https://store.epicgames.com/es-ES/p/watch-dogs-2\",\"microsoft\":\"\",\"google\":\"\"} '),(15,' Watch Dogs Legion','S/. 45.00','PC, PS4','Perú','80d950211efa9eb7179e4e5dd53cae75','acción','{\"steam\":\"https://store.steampowered.com/app/2239550/Watch_Dogs_Legion/\",\"xbox\":\"\",\"play\":\"https://www.playstation.com/es-pe/games/watch-dogs-legion/\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(16,' Tekken 7 - Originals Edition','S/. 50.00','PC','Perú','298a8cb0a5a0a2af614accac4d0bc98c','acción','{\"steam\":\"https://store.steampowered.com/app/389730/TEKKEN_7/?l=spanish\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(17,' Dark Souls III','S/. 95.00','PC','Perú','c9d9876878d5adffcf6c9cf7a9ab0e9c','acción','{\"steam\":\"https://store.steampowered.com/app/374320/DARK_SOULS_III/\",\"xbox\":\"https://www.xbox.com/es-AR/games/store/dark-souls-iii/bw2xdrnsccpz\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(18,' Rain World','S/. 23.00','PC','Perú','e87d35376528b6bfa20618c63f70fc8b','acción,estrategia','{\"steam\":\"https://store.steampowered.com/app/312520/Rain_World/\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(42,' Naruto To Boruto: Shinobi Striker','S/. 25.00','PC','Perú','54ca5b950c70dbcec294f283410eb0da','acción','{\"steam\":\"https://store.steampowered.com/app/633230/NARUTO_TO_BORUTO_SHINOBI_STRIKER/\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"\",\"google\":\"\"} '),(43,' Captain Tsubasa: Rise of New Champions','S/. 70.00','PC','Perú','4e61ea76fadd722a2107da7af6607dcc','acción','{\"steam\":\"https://store.steampowered.com/app/1163550/Captain_Tsubasa_Rise_of_New_Champions/?l=latam\",\"xbox\":\"\",\"play\":\"\",\"epic\":\"\",\"microsoft\":\"https://www.nintendo.com/es-mx/store/products/captain-tsubasa-rise-of-new-champions-deluxe-edition-switch/\",\"google\":\"\"} ');
/*!40000 ALTER TABLE `juegos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquetes`
--

DROP TABLE IF EXISTS `paquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paquetes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquetes`
--

LOCK TABLES `paquetes` WRITE;
/*!40000 ALTER TABLE `paquetes` DISABLE KEYS */;
INSERT INTO `paquetes` VALUES (1,'Premium'),(2,'Platino'),(3,'Gratis');
/*!40000 ALTER TABLE `paquetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registros`
--

DROP TABLE IF EXISTS `registros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paquete_id` int DEFAULT NULL,
  `pago_id` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `token` varchar(8) DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarioId` (`usuario_id`),
  KEY `paquete_id` (`paquete_id`),
  CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `registros_ibfk_2` FOREIGN KEY (`paquete_id`) REFERENCES `paquetes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros`
--

LOCK TABLES `registros` WRITE;
/*!40000 ALTER TABLE `registros` DISABLE KEYS */;
INSERT INTO `registros` VALUES (1,3,'','b9fd67ab',2),(3,2,'','aa5c72de',3);
/*!40000 ALTER TABLE `registros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `confirmado` tinyint(1) DEFAULT NULL,
  `token` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,' Aldair','Maquera','box@box.com','$2y$10$ZFLrWZRetG28DgVqmCL5hO18wl8qRZe8rc0FeE0xw0b6vStoRwGS2',1,'',1),(2,' Elian','Gutiérrez','correo@correo.com','$2y$10$s4tg7ZrtU4cYf0QKhKQUHevDyOaJWxQYZkSME2xv5L3dUg.ZkAaKa',1,'',0),(3,'Jose','Andrade','correo2@correo.com','$2y$10$xOIp9T7R9hrvMEZJRnp4W.0HG8diarOytvQuO9VHkmqJzuuZ4mq8y',1,'',0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-14 19:55:30
