-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: sistemagestordeproyectos
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `asignacionrecursos`
--

DROP TABLE IF EXISTS `asignacionrecursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignacionrecursos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint unsigned NOT NULL,
  `usuario_id` bigint unsigned NOT NULL,
  `num_computadoras` int NOT NULL DEFAULT '0',
  `presupuesto` decimal(10,2) NOT NULL,
  `fecha_limite` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asignacionrecursos_proyecto_id_foreign` (`proyecto_id`),
  KEY `asignacionrecursos_usuario_id_foreign` (`usuario_id`),
  CONSTRAINT `asignacionrecursos_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `asignacionrecursos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignacionrecursos`
--

LOCK TABLES `asignacionrecursos` WRITE;
/*!40000 ALTER TABLE `asignacionrecursos` DISABLE KEYS */;
INSERT INTO `asignacionrecursos` VALUES (1,1,1,10,10000.00,'2024-12-31','2024-05-24 23:41:47','2024-05-24 23:41:47'),(2,2,2,5,5000.00,'2024-11-30','2024-05-24 23:41:47','2024-05-24 23:41:47'),(3,3,3,15,15000.00,'2024-10-31','2024-05-24 23:41:47','2024-05-24 23:41:47'),(4,4,4,20,20000.00,'2024-09-30','2024-05-24 23:41:47','2024-05-24 23:41:47'),(5,5,5,8,8000.00,'2024-08-31','2024-05-24 23:41:47','2024-05-24 23:41:47');
/*!40000 ALTER TABLE `asignacionrecursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auditorias`
--

DROP TABLE IF EXISTS `auditorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auditorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint unsigned NOT NULL,
  `fecha_auditoria` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resultado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auditorias_proyecto_id_foreign` (`proyecto_id`),
  CONSTRAINT `auditorias_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditorias`
--

LOCK TABLES `auditorias` WRITE;
/*!40000 ALTER TABLE `auditorias` DISABLE KEYS */;
INSERT INTO `auditorias` VALUES (1,1,'2024-05-24 23:41:47','Aprobado','Todo en orden','2024-05-24 23:41:47','2024-05-24 23:41:47'),(2,2,'2024-05-24 23:41:47','Aprobado','Sin observaciones','2024-05-24 23:41:47','2024-05-24 23:41:47'),(3,3,'2024-05-24 23:41:47','Pendiente','Faltan algunos detalles','2024-05-24 23:41:47','2024-05-24 23:41:47'),(4,4,'2024-05-24 23:41:47','Rechazado','No cumple con los requisitos','2024-05-24 23:41:47','2024-05-24 23:41:47'),(5,5,'2024-05-24 23:41:47','Aprobado','Sin comentarios','2024-05-24 23:41:47','2024-05-24 23:41:47');
/*!40000 ALTER TABLE `auditorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Redes','Proyectos de Redes',NULL,NULL),(2,'PRUEBA','12345',NULL,'2024-05-25 12:47:55'),(3,'Desarrollo Web','Proyectos relacionados con el desarrollo de aplicaciones web','2024-05-24 23:41:47','2024-05-24 23:41:47'),(4,'Redes','Proyectos relacionados con la configuración y mantenimiento de redes','2024-05-24 23:41:47','2024-05-24 23:41:47'),(5,'Hardware','Proyectos relacionados con el hardware y mantenimiento de equipos','2024-05-24 23:41:47','2024-05-24 23:41:47'),(6,'ERP','Proyectos relacionados con sistemas ERP','2024-05-24 23:41:47','2024-05-24 23:41:47'),(7,'TVP','Proyectos relacionados con sistemas TVP','2024-05-24 23:41:47','2024-05-24 23:41:47');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'prueba','prueba@gmail.com','33897699','Ciudad',NULL,NULL),(2,'Cliente 1','cliente1@example.com','123456789','Direccion 1','2024-05-24 23:41:47','2024-05-24 23:41:47'),(3,'Cliente 2','cliente2@example.com','987654321','Direccion 2','2024-05-24 23:41:47','2024-05-24 23:41:47'),(4,'Cliente 3','cliente3@example.com','456789123','Direccion 3','2024-05-24 23:41:47','2024-05-24 23:41:47'),(5,'Cliente 4','cliente4@example.com','789123456','Direccion 4','2024-05-24 23:41:47','2024-05-24 23:41:47'),(6,'Cliente 5','cliente5@example.com','321654987','Direccion 5','2024-05-24 23:41:47','2024-05-24 23:41:47');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_05_11_194344_create_usuarios_table',1),(6,'2024_05_11_194546_create_proyectos_table',1),(7,'2024_05_11_194727_create_auditorias_table',1),(8,'2024_05_11_194753_create_reportes_table',1),(9,'2024_05_11_194835_create_roles_table',1),(10,'2024_05_11_194857_create_role_user_table',1),(11,'2024_05_11_194911_create_tareas_table',1),(12,'2024_05_17_163141_create_asignacionrecursos_table',1),(13,'2024_05_18_182123_create_categorias_table',2),(14,'2024_05_18_182236_create_clientes_table',2),(15,'2024_05_18_182353_update_proyectos_table_add_foreign_keys',3),(16,'2024_05_18_190010_create_progreso_proyectos_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('bummerescobar@gmail.com','$2y$10$cGeVjWuf4tBDhtepunjUCuQIBJtLZY5hlqc6QnA/TbjUmXEitkO3u','2024-05-25 04:46:17');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `progreso_proyectos`
--

DROP TABLE IF EXISTS `progreso_proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `progreso_proyectos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint unsigned NOT NULL,
  `porcentaje` decimal(5,2) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `progreso_proyectos_proyecto_id_foreign` (`proyecto_id`),
  CONSTRAINT `progreso_proyectos_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progreso_proyectos`
--

LOCK TABLES `progreso_proyectos` WRITE;
/*!40000 ALTER TABLE `progreso_proyectos` DISABLE KEYS */;
INSERT INTO `progreso_proyectos` VALUES (1,1,50.00,'Mitad del proyecto completado','2024-05-24 23:41:47','2024-05-24 23:41:47'),(2,2,30.00,'En progreso','2024-05-24 23:41:47','2024-05-24 23:41:47'),(3,3,70.00,'Casi terminado','2024-05-24 23:41:47','2024-05-24 23:41:47'),(4,4,10.00,'Inicio del proyecto','2024-05-24 23:41:47','2024-05-24 23:41:47'),(5,5,90.00,'Faltan pocos detalles','2024-05-24 23:41:47','2024-05-24 23:41:47');
/*!40000 ALTER TABLE `progreso_proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyectos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `categoria` enum('software','redes','hardware','sistema ERP','sistema TVP') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lider_id` bigint unsigned NOT NULL,
  `cliente_id` bigint unsigned DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `num_computadoras` int NOT NULL DEFAULT '0',
  `presupuesto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fecha_limite` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proyectos_lider_id_foreign` (`lider_id`),
  KEY `proyectos_categoria_id_foreign` (`categoria_id`),
  KEY `proyectos_cliente_id_foreign` (`cliente_id`),
  CONSTRAINT `proyectos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `proyectos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `proyectos_lider_id_foreign` FOREIGN KEY (`lider_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` VALUES (1,'Proyecto Web','Desarrollo de una aplicación web',2,'software',2,4,'2024-05-24 23:41:47',10,10000.00,'2024-12-31','2024-05-24 23:41:47','2024-05-25 12:48:40'),(2,'Proyecto Redes','Configuración de una red corporativa',2,'redes',2,2,'2024-05-24 23:41:47',5,5000.00,'2024-11-30','2024-05-24 23:41:47','2024-05-24 23:41:47'),(3,'Proyecto Hardware','Mantenimiento de equipos de oficina',3,'hardware',3,3,'2024-05-24 23:41:47',15,15000.00,'2024-10-31','2024-05-24 23:41:47','2024-05-24 23:41:47'),(4,'Proyecto ERP','Implementación de un sistema ERP',6,'sistema ERP',4,4,'2024-05-24 23:41:47',20,20000.00,'2024-09-30','2024-05-24 23:41:47','2024-05-25 11:57:02'),(5,'Proyecto TVP','Desarrollo de un sistema TVP',5,'sistema TVP',5,5,'2024-05-24 23:41:47',8,8000.00,'2024-08-31','2024-05-24 23:41:47','2024-05-24 23:41:47'),(6,'PRUEBA 2','Esto es una prueba',7,'software',1,5,'2024-05-24 06:00:00',9,100000.00,'2024-06-09','2024-05-25 11:25:52','2024-05-25 11:51:14');
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reportes`
--

DROP TABLE IF EXISTS `reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo_reporte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `datos` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reportes`
--

LOCK TABLES `reportes` WRITE;
/*!40000 ALTER TABLE `reportes` DISABLE KEYS */;
INSERT INTO `reportes` VALUES (1,'Mensual','2024-05-01','{\"avance\": \"50%\", \"comentarios\": \"Buen progreso\"}','2024-05-24 23:41:47','2024-05-24 23:41:47'),(2,'Semanal','2024-05-08','{\"avance\": \"30%\", \"comentarios\": \"Necesita más esfuerzo\"}','2024-05-24 23:41:47','2024-05-24 23:41:47'),(3,'Diario','2024-05-15','{\"avance\": \"70%\", \"comentarios\": \"Progreso rápido\"}','2024-05-24 23:41:47','2024-05-24 23:41:47'),(4,'Mensual','2024-05-22','{\"avance\": \"10%\", \"comentarios\": \"Inicio del proyecto\"}','2024-05-24 23:41:47','2024-05-24 23:41:47'),(5,'Anual','2024-05-29','{\"avance\": \"90%\", \"comentarios\": \"Casi finalizado\"}','2024-05-24 23:41:47','2024-05-24 23:41:47');
/*!40000 ALTER TABLE `reportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `usuario_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`usuario_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1),(2,2),(3,2),(4,3),(5,3);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Lider',NULL,NULL),(2,'Coordinador','2024-05-24 23:41:47','2024-05-24 23:41:47'),(3,'Miembro','2024-05-24 23:41:47','2024-05-24 23:41:47'),(5,'Administrador','2024-05-24 23:41:47','2024-05-24 23:41:47'),(6,'Auditor','2024-05-24 23:41:47','2024-05-24 23:41:47');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tareas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `proyecto_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tareas_proyecto_id_foreign` (`proyecto_id`),
  CONSTRAINT `tareas_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
INSERT INTO `tareas` VALUES (1,'Diseño','Diseñar la interfaz','En progreso','2024-05-01','2024-05-10',1,'2024-05-24 23:41:47','2024-05-24 23:41:47'),(2,'Desarrollo','Desarrollar la aplicación','Pendiente','2024-05-11','2024-05-20',2,'2024-05-24 23:41:47','2024-05-24 23:41:47'),(3,'Pruebas','Realizar pruebas','Completado','2024-05-21','2024-05-30',3,'2024-05-24 23:41:47','2024-05-24 23:41:47');
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Andy','a@gmail.com',NULL,'$2y$10$4XnB982oFyTFto8KQCh/3uHnsu9.r0JRYx.BYFZei0/qOvGhrE5e.',NULL,'2024-05-25 03:04:12','2024-05-25 03:04:12'),(2,'Andy13K','bummerescobar@gmail.com',NULL,'$2y$10$LF9HHDNaf8XUIfnwrmtsJukUZIkJ0ULMoHLY1ItoIgwTQs.EwGCXy',NULL,'2024-05-25 04:46:01','2024-05-25 04:46:01'),(3,'Erick','eo@gmail.com',NULL,'$2y$10$4LTTsvEsSlLaLowHG1yzae.6sgoh6Qu7iJkNnKPw9dflVuYymUjze',NULL,'2024-05-25 22:12:48','2024-05-25 22:12:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Andy','a@gmail.com','12345678','1',NULL,NULL),(2,'Usuario 1','usuario1@example.com','password1','coordinador','2024-05-24 23:41:47','2024-05-24 23:41:47'),(3,'Usuario 2','usuario2@example.com','password2','miembro','2024-05-24 23:41:47','2024-05-24 23:41:47'),(4,'Usuario 3','usuario3@example.com','password3','miembro','2024-05-24 23:41:47','2024-05-24 23:41:47'),(5,'Usuario 4','usuario4@example.com','password4','cliente','2024-05-24 23:41:47','2024-05-24 23:41:47'),(6,'Usuario 5','usuario5@example.com','password5','cliente','2024-05-24 23:41:47','2024-05-24 23:41:47');
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

-- Dump completed on 2024-05-25 10:38:52
mv database_dump.sql /ruta/de/tu/proyecto/database_dump.sql
cd /ruta/de/tu/proyecto
git add database_dump.sql
git commit -m "Add database dump"
git push origin main
