-- MySQL dump 10.13  Distrib 9.3.0, for macos14.7 (x86_64)
--
-- Host: localhost    Database: stepoil
-- ------------------------------------------------------
-- Server version	9.3.0

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
-- Table structure for table `additional`
--

DROP TABLE IF EXISTS `additional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `additional` (
  `id_add` int unsigned NOT NULL AUTO_INCREMENT,
  `id_wellinfo` bigint unsigned NOT NULL,
  `bssactivity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rigactivity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `vctodryer_bbls` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vctodryer_m3` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vcfrdryer_bbls` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vcfrdryer_m3` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vcfrcf1_bbls` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vcfrcf1_m3` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vcfrcf2_bbls` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vcfrcf2_m3` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vcfrcf3_bbls` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vcfrcf3_m3` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_add`),
  KEY `additional_id_wellinfo_foreign` (`id_wellinfo`),
  CONSTRAINT `additional_id_wellinfo_foreign` FOREIGN KEY (`id_wellinfo`) REFERENCES `wellinfo` (`id_wellinfo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `additional`
--

LOCK TABLES `additional` WRITE;
/*!40000 ALTER TABLE `additional` DISABLE KEYS */;
INSERT INTO `additional` VALUES (1,1,'<!-- 🔧 JavaScript: Validasi dan UI -->\r\n<script>\r\nfunction validateCharCount(textareaId, maxLength, counterId) {\r\n    const textarea = document.getElementById(textareaId);\r\n    const counter = document.getElementById(counterId);','const textarea = document.getElementById(textareaId);\r\n                        const counter = document.getElementById(counterId);\r\n                        const currentLength = textarea.value.length;\r\n\r\n                        if','147.32','23.42','130.95','20.82','23.61','3.75','25','3.97','214.78','34.15'),(3,9,'<!-- 🔧 JavaScript: Validasi dan UI -->\r\n<script>\r\nfunction validateCharCount(textareaId, maxLength, counterId) {\r\n    const textarea = document.getElementById(textareaId);\r\n    const counter = document.getElementById(counterId);','const textarea = document.getElementById(textareaId);\r\n                        const counter = document.getElementById(counterId);\r\n                        const currentLength = textarea.value.length;\r\n\r\n                        if','147.32','23.42','130.95','20.82','23.61','3.75','25','3.97','241.63','38.42'),(4,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,12,'<!-- 🔧 JavaScript: Validasi dan UI -->\r\n<script>\r\nfunction validateCharCount(textareaId, maxLength, counterId) {\r\n    const textarea = document.getElementById(textareaId);\r\n    const counter = document.getElementById(counterId);','const textarea = document.getElementById(textareaId);\r\n                        const counter = document.getElementById(counterId);\r\n                        const currentLength = textarea.value.length;\r\n\r\n                        if','147.32','23.42','130.95','20.82','23.61','3.75','25','3.97','241.63','38.42'),(7,13,'<!-- 🔧 JavaScript: Validasi dan UI -->\r\n<script>\r\nfunction validateCharCount(textareaId, maxLength, counterId) {\r\n    const textarea = document.getElementById(textareaId);\r\n    const counter = document.getElementById(counterId);','const textarea = document.getElementById(textareaId);\r\n                        const counter = document.getElementById(counterId);\r\n                        const currentLength = textarea.value.length;\r\n\r\n                        if','147.32','23.42','130.95','20.82','23.61','3.75','25','3.97','241.63','38.42'),(8,14,'<!-- 🔧 JavaScript: Validasi dan UI -->\r\n<script>\r\nfunction validateCharCount(textareaId, maxLength, counterId) {\r\n    const textarea = document.getElementById(textareaId)d;\r\n    const counter = document.getElementById(counterId);','const textarea = document.getElementById(textareaId);\r\n                        const counter = document.getElementById(counterId);\r\n                        const currentLength = textarea.value.length;\r\n\r\n                        if','147.32','23.42','130.95','20.82','23.61','3.75','25','3.97','241.63','38.42');
/*!40000 ALTER TABLE `additional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets_list`
--

DROP TABLE IF EXISTS `assets_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets_list` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pm_category` bigint unsigned NOT NULL,
  `asset_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mfg_sn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_asset` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assets_list_id_pm_category_foreign` (`id_pm_category`),
  CONSTRAINT `assets_list_id_pm_category_foreign` FOREIGN KEY (`id_pm_category`) REFERENCES `pm_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets_list`
--

LOCK TABLES `assets_list` WRITE;
/*!40000 ALTER TABLE `assets_list` DISABLE KEYS */;
INSERT INTO `assets_list` VALUES (5,1,'Centrifuge','CF098','12CF','coc_files/5-12CF.pdf','active','d','2025-05-02 10:04:25','2025-05-06 10:02:19'),(6,4,'Shaker','SHTK','SH012','coc_files/6-SH012.pdf','active','dddd','2025-05-02 11:11:27','2025-05-06 10:03:04'),(8,5,'Auger','ARG001','AGR01','coc_files/8-AGR01.pdf','active',NULL,'2025-05-02 11:11:51','2025-05-06 10:02:39'),(9,6,'Land Mud Cooler','LMCFG','LMC-001','coc_files/9-LMC-001.pdf','active',NULL,'2025-05-06 09:53:00','2025-05-06 10:02:47');
/*!40000 ALTER TABLE `assets_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuttingsbypassed`
--

DROP TABLE IF EXISTS `cuttingsbypassed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuttingsbypassed` (
  `id_cuttingbypassed` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_wellinfo` bigint unsigned NOT NULL,
  `percentage` double DEFAULT NULL,
  `volume` double DEFAULT NULL,
  `from_depth` double DEFAULT NULL,
  `each_from_depth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_depth` double DEFAULT NULL,
  `each_to_depth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cuttingbypassed`),
  KEY `cuttingsbypassed_id_wellinfo_foreign` (`id_wellinfo`),
  CONSTRAINT `cuttingsbypassed_id_wellinfo_foreign` FOREIGN KEY (`id_wellinfo`) REFERENCES `wellinfo` (`id_wellinfo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuttingsbypassed`
--

LOCK TABLES `cuttingsbypassed` WRITE;
/*!40000 ALTER TABLE `cuttingsbypassed` DISABLE KEYS */;
INSERT INTO `cuttingsbypassed` VALUES (1,1,69,43,44,'Feet',55,'Metre','2025-04-11 08:00:01','2025-04-11 08:08:23'),(3,9,69,43,44,'Feet',55,'Metre','2025-04-11 08:58:06','2025-04-11 08:58:06'),(4,10,0,0,0,'Metre',0,'Metre','2025-04-11 09:09:17','2025-04-11 09:09:17'),(5,11,0,0,0,'Metre',0,'Metre','2025-04-17 11:40:26','2025-04-17 11:40:26'),(6,12,69,43,44,'Feet',55,'Metre','2025-05-06 09:33:22','2025-05-06 09:33:22'),(7,13,69,43,44,'Feet',55,'Metre','2025-05-06 09:33:28','2025-05-06 09:33:28'),(8,14,69,43,44,'Feet',55,'Metre','2025-05-07 09:41:54','2025-05-07 09:41:54');
/*!40000 ALTER TABLE `cuttingsbypassed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dailywaste`
--

DROP TABLE IF EXISTS `dailywaste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dailywaste` (
  `id_dailywaste` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_wellinfo` bigint unsigned NOT NULL,
  `dailywaste_generated` double DEFAULT NULL,
  `avg_moc` double DEFAULT NULL,
  `avg_discharge` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_dailywaste`),
  KEY `dailywaste_id_wellinfo_foreign` (`id_wellinfo`),
  CONSTRAINT `dailywaste_id_wellinfo_foreign` FOREIGN KEY (`id_wellinfo`) REFERENCES `wellinfo` (`id_wellinfo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dailywaste`
--

LOCK TABLES `dailywaste` WRITE;
/*!40000 ALTER TABLE `dailywaste` DISABLE KEYS */;
INSERT INTO `dailywaste` VALUES (1,1,396.03,2.12,0,'2025-04-10 06:58:31','2025-04-11 07:29:16'),(3,9,396.03,2.12,0,'2025-04-11 08:58:06','2025-04-11 08:58:06'),(4,10,NULL,NULL,NULL,'2025-04-11 09:09:17','2025-04-11 09:09:17'),(5,11,NULL,NULL,NULL,'2025-04-17 11:40:26','2025-04-17 11:40:26'),(6,12,396.03,2.12,0,'2025-05-06 09:33:22','2025-05-06 09:33:22'),(7,13,396.03,2.12,0,'2025-05-06 09:33:28','2025-05-06 09:33:28'),(8,14,435.23,2.12,0,'2025-05-07 09:41:54','2025-05-16 10:19:02');
/*!40000 ALTER TABLE `dailywaste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `desanders`
--

DROP TABLE IF EXISTS `desanders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `desanders` (
  `id_desander` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_wellinfo` bigint unsigned NOT NULL,
  `run_hour` int DEFAULT NULL,
  `feed_rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feed_dens` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overflow_dens` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `underflow_dens` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vol_discharge` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mudoncuttings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volmud_discharge` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_pressure` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_desander`),
  KEY `desanders_id_wellinfo_foreign` (`id_wellinfo`),
  CONSTRAINT `desanders_id_wellinfo_foreign` FOREIGN KEY (`id_wellinfo`) REFERENCES `wellinfo` (`id_wellinfo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desanders`
--

LOCK TABLES `desanders` WRITE;
/*!40000 ALTER TABLE `desanders` DISABLE KEYS */;
INSERT INTO `desanders` VALUES (1,1,2,'-0.59','4','9.3','10.30','9','1','18.00','23','2025-04-03 04:34:47','2025-04-09 06:00:27'),(7,9,2,'-0.59','4','9.3','10.30','9','1','18.00','23','2025-04-11 08:58:06','2025-04-11 08:58:06'),(8,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-11 09:09:17','2025-04-11 09:09:17'),(9,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-17 11:40:26','2025-04-17 11:40:26'),(10,12,2,'-0.59','4','9.3','10.30','9','1','18.00','23','2025-05-06 09:33:22','2025-05-06 09:33:22'),(11,13,2,'-0.59','4','9.3','10.30','9','1','18.00','23','2025-05-06 09:33:28','2025-05-06 09:33:28'),(12,14,2,'-0.59','4','9.3','10.30','9','1','18.00','23','2025-05-07 09:41:54','2025-05-07 09:41:54');
/*!40000 ALTER TABLE `desanders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `desilters`
--

DROP TABLE IF EXISTS `desilters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `desilters` (
  `id_desilter` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_wellinfo` bigint unsigned NOT NULL,
  `run_hour` int DEFAULT NULL,
  `feed_rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feed_dens` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overflow_dens` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `underflow_dens` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vol_discharge` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mudoncuttings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volmud_discharge` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_pressure` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_desilter`),
  KEY `desilters_id_wellinfo_foreign` (`id_wellinfo`),
  CONSTRAINT `desilters_id_wellinfo_foreign` FOREIGN KEY (`id_wellinfo`) REFERENCES `wellinfo` (`id_wellinfo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desilters`
--

LOCK TABLES `desilters` WRITE;
/*!40000 ALTER TABLE `desilters` DISABLE KEYS */;
INSERT INTO `desilters` VALUES (1,1,4,'3.21','9.3','8.1','10.3','10','3.2','134.40','120','2025-04-03 04:34:47','2025-04-09 06:25:21'),(7,9,4,'3.21','9.3','8.1','10.3','10','3.2','134.40','120','2025-04-11 08:58:06','2025-04-11 08:58:06'),(8,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-11 09:09:17','2025-04-11 09:09:17'),(9,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-17 11:40:26','2025-04-17 11:40:26'),(10,12,4,'3.21','9.3','8.1','10.3','10','3.2','134.40','120','2025-05-06 09:33:22','2025-05-06 09:33:22'),(11,13,4,'3.21','9.3','8.1','10.3','10','3.2','134.40','120','2025-05-06 09:33:28','2025-05-06 09:33:28'),(12,14,4,'3.21','9.3','8.1','10.3','10','3.2','134.40','120','2025-05-07 09:41:54','2025-05-07 09:41:54');
/*!40000 ALTER TABLE `desilters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `details` (
  `id_details` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_wellinfo` bigint unsigned NOT NULL,
  `mudcheck_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depth_each` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depth1bef` double DEFAULT NULL,
  `bitsize` double DEFAULT NULL,
  `bittype` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `washout` double DEFAULT NULL,
  `mudweight` double DEFAULT NULL,
  `mwunit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curdepth` double DEFAULT NULL,
  `volholedrill` double DEFAULT NULL,
  `volholeunit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avgrop` double DEFAULT NULL,
  `lgsactive` double DEFAULT NULL,
  `datenow` date DEFAULT NULL,
  `cirrategpm` double DEFAULT NULL,
  `hgsactive` double DEFAULT NULL,
  `sgbasefluid` double DEFAULT NULL,
  `fluidtype` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rigpresentact` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activesysvol` double DEFAULT NULL,
  `pv` double DEFAULT NULL,
  `yp` double DEFAULT NULL,
  `sandcontent` double DEFAULT NULL,
  `basefluid` double DEFAULT NULL,
  `chlorides` double DEFAULT NULL,
  `mudtemp` double DEFAULT NULL,
  `tempunit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories1` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories2` double DEFAULT NULL,
  `sgdrillsolid` double DEFAULT NULL,
  `sh1_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh1_model` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh1_screensize` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh1_runninghour` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh2_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh2_model` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh2_screensize` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh2_runninghour` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh3_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh3_model` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh3_screensize` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh3_runninghour` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh4_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh4_model` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh4_screensize` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh4_runninghour` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh5_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh5_model` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh5_screensize` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh5_runninghour` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh6_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh6_model` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh6_screensize` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh6_runninghour` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screens_changed` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf1_sn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf1_model` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf1_modeofopr` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf1_weirplate` double DEFAULT NULL,
  `cf1_bowlspeed` double DEFAULT NULL,
  `cf1_bowlconv` double DEFAULT NULL,
  `cf1_feedsuc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf1_effluentreturn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf1_underflow` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf1_runninghour` double DEFAULT NULL,
  `cf1_feedinrate` double DEFAULT NULL,
  `cf1_feedindensity` double DEFAULT NULL,
  `cf1_centratedens` double DEFAULT NULL,
  `cf1_cakediscdens` double DEFAULT NULL,
  `cf1_centratereturn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf1_cakediscflow` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf1_masscake` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf1_volcake` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf2_sn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf2_model` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf2_modeofopr` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf2_weirplate` double DEFAULT NULL,
  `cf2_bowlspeed` double DEFAULT NULL,
  `cf2_bowlconv` double DEFAULT NULL,
  `cf2_feedsuc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf2_effluentreturn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf2_underflow` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf2_runninghour` double DEFAULT NULL,
  `cf2_feedinrate` double DEFAULT NULL,
  `cf2_feedindensity` double DEFAULT NULL,
  `cf2_centratedens` double DEFAULT NULL,
  `cf2_cakediscdens` double DEFAULT NULL,
  `cf2_centratereturn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf2_cakediscflow` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf2_masscake` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf2_volcake` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf3_sn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf3_model` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf3_modeofopr` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf3_weirplate` double DEFAULT NULL,
  `cf3_bowlspeed` double DEFAULT NULL,
  `cf3_bowlconv` double DEFAULT NULL,
  `cf3_feedsuc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf3_effluentreturn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf3_underflow` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf3_runninghour` double DEFAULT NULL,
  `cf3_feedinrate` double DEFAULT NULL,
  `cf3_feedindensity` double DEFAULT NULL,
  `cf3_centratedens` double DEFAULT NULL,
  `cf3_cakediscdens` double DEFAULT NULL,
  `cf3_centratereturn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf3_cakediscflow` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf3_masscake` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf3_volcake` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cdu1_sn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cdu1_model` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cdu1_screensize` double DEFAULT NULL,
  `cdu1_runninghour` double DEFAULT NULL,
  `cdu1_centrateppg` double DEFAULT NULL,
  `cdu1_scroll` double DEFAULT NULL,
  `cdu1_sampledepth` double DEFAULT NULL,
  `cdu2_sn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cdu2_model` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cdu2_screensize` double DEFAULT NULL,
  `cdu2_runninghour` double DEFAULT NULL,
  `cdu2_centrateppg` double DEFAULT NULL,
  `cdu2_scroll` double DEFAULT NULL,
  `cdu2_sampledepth` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_details`),
  KEY `fk_details_wellinfo` (`id_wellinfo`),
  CONSTRAINT `fk_details_wellinfo` FOREIGN KEY (`id_wellinfo`) REFERENCES `wellinfo` (`id_wellinfo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `details`
--

LOCK TABLES `details` WRITE;
/*!40000 ALTER TABLE `details` DISABLE KEYS */;
INSERT INTO `details` VALUES (1,1,'OBM-SB','feet',2000,17.5,'PDC',10,9.7,'ppg',2500,163.69,'bbls',60,3.2,'2025-04-05',800,4.5,0.78,'OBM-SB','Drilling 17.5',950,24,18,0.3,62.5,50000,30,'degc','72.5/27.5',550,2.6,'Shaker #1','Model X1','API 1001','01','Shaker #2','Model X2','API 1002','02','Shaker #3','Model X3','API 1003','03','Shaker #4','Model X4','API 1004','04','Shaker #5','Model X5','API 1005','05','Shaker #6','Model X6','API 1006','07','berubahh','CFSN1','1000FRDRYER','FRDREYR',3.5,2500,1500,'HOLDINGTANK','HOLDINGTANK','CUTTINGSKIPS',8,50,10.6,9.8,22.4,'46.83','3.17','10.84','36.28','2222','HNH','FRDREYR',3.5,2500,1500,'HOLDINGTANK','HOLDINGTANK','CUTTINGSKIPS',8,50,10.6,9.8,22.4,'46.83','3.17','10.84','36.28','CFSN3','1000GBD','BARITE',3.5,2500,1200,'-','-','-',8,50,9.3,8.1,10.3,'22.73','27.27','42.81','311.69','CDU-SN111','WSM01',0.002,10,10.6,900,2201,'CDU-SN22','WSM04',0.222,10,9.2,900,122,'2025-04-03 04:34:47','2025-04-08 03:30:40'),(8,9,'OBM-SB','feet',2000,17.5,'PDC',10,9.7,'ppg',2500,163.69,'bbls',60,3.2,'2025-04-05',800,4.5,0.78,'OBM-SB','Drilling 17.5',950,24,18,0.3,62.5,50000,30,'degc','72.5/27.5',550,2.6,'Shaker #1','Model X1','API 1001','01','Shaker #2','Model X2','API 1002','02','Shaker #3','Model X3','API 1003','03','Shaker #4','Model X4','API 1004','04','Shaker #5','Model X5','API 1005','05','Shaker #6','Model X6','API 1006','07','berubahh','CFSN1','1000FRDRYER','FRDREYR',3.5,2500,1500,'OVERBOARD','CUTTINGSKIPS','SANDTRAPTANK',8,50,10.6,9.8,22.4,'46.83','3.17','10.84','36.28','2222','HNH','FRDREYR',3.5,2500,1500,'SANDTRAPTANK','ACTIVETANK','JUMBOBAG',8,50,10.6,9.8,22.4,'46.83','3.17','10.84','36.28','CFSN3','1000GBD','BARITE',3.5,2500,1200,'OVERBOARD','CUTTINGSKIPS','JUMBOBAG',9,50,9.3,8.1,10.3,'22.73','27.27','48.16','350.65','CDU-SN111','WSM01',0.002,10,10.6,900,2201,'CDU-SN22','WSM04',0.222,10,9.2,900,122,'2025-04-11 08:58:06','2025-04-14 06:18:13'),(9,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-11 09:09:17','2025-04-11 09:09:17'),(10,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-17 11:40:26','2025-04-17 11:40:26'),(11,12,'OBM-SB','feet',2000,17.5,'PDC',10,9.7,'ppg',2500,163.69,'bbls',60,3.2,'2025-04-05',800,4.5,0.78,'OBM-SB','Drilling 17.5',950,24,18,0.3,62.5,50000,30,'degc','72.5/27.5',550,2.6,'Shaker #1','Model X1','API 1001','01','Shaker #2','Model X2','API 1002','02','Shaker #3','Model X3','API 1003','03','Shaker #4','Model X4','API 1004','04','Shaker #5','Model X5','API 1005','05','Shaker #6','Model X6','API 1006','07','berubahh','CFSN1','1000FRDRYER','FRDREYR',3.5,2500,1500,'OVERBOARD','CUTTINGSKIPS','SANDTRAPTANK',8,50,10.6,9.8,22.4,'46.83','3.17','10.84','36.28','2222','HNH','FRDREYR',3.5,2500,1500,'SANDTRAPTANK','ACTIVETANK','JUMBOBAG',8,50,10.6,9.8,22.4,'46.83','3.17','10.84','36.28','CFSN3','1000GBD','BARITE',3.5,2500,1200,'OVERBOARD','CUTTINGSKIPS','JUMBOBAG',9,50,9.3,8.1,10.3,'22.73','27.27','48.16','350.65','CDU-SN111','WSM01',0.002,10,10.6,900,2201,'CDU-SN22','WSM04',0.222,10,9.2,900,122,'2025-05-06 09:33:22','2025-05-06 09:33:22'),(12,13,'OBM-SB','feet',2000,17.5,'PDC',10,9.7,'ppg',2500,163.69,'bbls',60,3.2,'2025-04-05',800,4.5,0.78,'OBM-SB','Drilling 17.5',950,24,18,0.3,62.5,50000,30,'degc','72.5/27.5',550,2.6,'Shaker #1','Model X1','API 1001','01','Shaker #2','Model X2','API 1002','02','Shaker #3','Model X3','API 1003','03','Shaker #4','Model X4','API 1004','04','Shaker #5','Model X5','API 1005','05','Shaker #6','Model X6','API 1006','07','berubahh','CFSN1','1000FRDRYER','FRDREYR',3.5,2500,1500,'OVERBOARD','CUTTINGSKIPS','SANDTRAPTANK',8,50,10.6,9.8,22.4,'46.83','3.17','10.84','36.28','2222','HNH','FRDREYR',3.5,2500,1500,'SANDTRAPTANK','ACTIVETANK','JUMBOBAG',8,50,10.6,9.8,22.4,'46.83','3.17','10.84','36.28','CFSN3','1000GBD','BARITE',3.5,2500,1200,'OVERBOARD','CUTTINGSKIPS','JUMBOBAG',9,50,9.3,8.1,10.3,'22.73','27.27','48.16','350.65','CDU-SN111','WSM01',0.002,10,10.6,900,2201,'CDU-SN22','WSM04',0.222,10,9.2,900,122,'2025-05-06 09:33:28','2025-05-06 09:33:28'),(13,14,'OBM-SB','feet',2000,17.5,'PDC',10,9.7,'ppg',2500,163.69,'bbls',60,3.2,'2025-04-05',800,4.5,0.78,'OBM-SB','Drilling 17.5',950,24,18,0.3,62.5,50000,30,'degc','72.5/27.5',550,2.6,'Shaker #1','Model X1','API 1001','01','Shaker #2','Model X2','API 1002','02','Shaker #3','Model X3','API 1003','03','Shaker #4','Model X4','API 1004','04','Shaker #5','Model X5','API 1005','05','Shaker #6','Model X6','API 1006','07','berubahh','CFSN1','1000FRDRYER','FRDREYR',3.5,2500,1500,'OVERBOARD','CUTTINGSKIPS','SANDTRAPTANK',8,50,10.6,9.8,22.4,'46.83','3.17','10.84','36.28','2222','HNH','FRDREYR',3.5,2500,1500,'SANDTRAPTANK','ACTIVETANK','JUMBOBAG',8,50,10.6,9.8,22.4,'46.83','3.17','10.84','36.28','CFSN3','1000GBD','BARITE',3.5,2500,1200,'OVERBOARD','CUTTINGSKIPS','JUMBOBAG',9,50,9.3,8.1,10.3,'22.73','27.27','48.16','350.65','CDU-SN111','WSM01',0.002,10,10.6,900,2201,'CDU-SN22','WSM04',0.222,10,9.2,900,122,'2025-05-07 09:41:54','2025-05-07 09:41:54');
/*!40000 ALTER TABLE `details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspection_category`
--

DROP TABLE IF EXISTS `inspection_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inspection_category` (
  `id_inspection` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_inspection` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_inspection`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspection_category`
--

LOCK TABLES `inspection_category` WRITE;
/*!40000 ALTER TABLE `inspection_category` DISABLE KEYS */;
INSERT INTO `inspection_category` VALUES (3,'Lifting Gear','Periodik 6 bulan','2025-04-29 04:50:43','2025-05-02 10:07:18'),(4,'Load Test','1 tahun','2025-04-29 04:51:02','2025-05-02 10:07:25'),(5,'MPI','1 year','2025-05-03 22:39:42','2025-05-03 22:39:42');
/*!40000 ALTER TABLE `inspection_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspection_detail`
--

DROP TABLE IF EXISTS `inspection_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inspection_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_inspection` bigint unsigned NOT NULL,
  `id_asset_list` bigint unsigned NOT NULL,
  `inspection_date` date DEFAULT NULL,
  `inspection_exp` date DEFAULT NULL,
  `cert` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspection_detail`
--

LOCK TABLES `inspection_detail` WRITE;
/*!40000 ALTER TABLE `inspection_detail` DISABLE KEYS */;
INSERT INTO `inspection_detail` VALUES (15,3,8,'2025-05-15','2025-05-09','inspection_files/insp_li_agr01.pdf','dd','2025-05-03 23:12:56','2025-05-04 00:55:23'),(16,3,6,'2025-05-01','2025-05-15','inspection_files/insp_li_sh012.pdf',NULL,'2025-05-03 23:14:45','2025-05-03 23:14:45'),(17,5,8,'2025-05-01','2025-05-02','inspection_files/insp_mp_agr01.pdf',NULL,'2025-05-03 23:20:29','2025-05-03 23:20:29'),(18,4,8,'2023-09-26','2025-05-21','inspection_files/insp_lo_agr01.pdf',NULL,'2025-05-03 23:36:48','2025-05-03 23:36:48'),(19,4,6,'2025-05-02','2025-05-30','inspection_files/insp_lo_sh012.pdf',NULL,'2025-05-03 23:41:27','2025-05-03 23:41:27'),(20,5,5,'2025-05-22','2025-05-31','inspection_files/insp_mp_12cf.pdf',NULL,'2025-05-04 00:56:13','2025-05-04 00:56:13'),(21,5,6,'2024-09-04','2026-02-27','inspection_files/insp_mp_sh012.pdf','neww','2025-05-04 00:58:27','2025-05-04 00:58:27'),(22,5,9,'2025-03-01','2025-05-31','inspection_files/insp_mp_lmc-001.pdf','ISP','2025-05-06 10:03:54','2025-05-06 10:03:54');
/*!40000 ALTER TABLE `inspection_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2025_03_29_044055_create_project_table',1),(2,'2025_03_29_044058_create_xusers_table',1),(3,'2025_03_29_044831_create_wellinfo_table',1),(4,'2025_03_29_044944_create_additional_table',1),(5,'2025_03_29_153548_create_details_table',1),(8,'2025_03_29_154905_create_warning_table',1),(9,'2025_03_29_172338_create_sessions_table',1),(10,'2025_04_03_105256_create_desanders_table',1),(11,'2025_04_03_105317_create_desilters_table',1),(14,'2025_03_29_154811_create_retorts_table',1),(17,'2025_04_03_105357_create_dailywaste_table',3),(18,'2025_04_03_105343_create_cuttingsbypassed_table',4),(19,'2025_03_29_154624_create_personnel_table',5),(20,'2025_04_16_154413_create_pm_categories_table',6),(21,'2025_04_16_154507_create_pm_data_table',7),(22,'2025_04_16_175818_create_cache_table',8),(23,'2025_04_19_053546_create_assets_list_table',9),(24,'2025_04_19_053557_create_inspection_category_table',10),(25,'2025_04_19_053558_create_pm_detail_category_table',11),(26,'2025_04_19_053558_create_pm_details_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personnel` (
  `id_personnel` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_wellinfo` bigint unsigned NOT NULL,
  `ds1_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ds2_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ns1_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ns2_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_personnel`),
  KEY `personnel_id_wellinfo_foreign` (`id_wellinfo`),
  CONSTRAINT `personnel_id_wellinfo_foreign` FOREIGN KEY (`id_wellinfo`) REFERENCES `wellinfo` (`id_wellinfo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personnel`
--

LOCK TABLES `personnel` WRITE;
/*!40000 ALTER TABLE `personnel` DISABLE KEYS */;
INSERT INTO `personnel` VALUES (1,1,'Person A','Person B','Person D','Person E','2025-04-14 09:39:38','2025-04-14 09:39:38'),(2,9,'Febro','Anggara','Dimas','Setiawan','2025-04-14 09:51:44','2025-04-14 09:53:33'),(3,11,'','','','','2025-04-17 11:43:37','2025-04-17 11:43:37'),(4,13,'ff1','ff3','ss3','rr3','2025-05-07 08:15:57','2025-05-07 08:16:11');
/*!40000 ALTER TABLE `personnel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pm_categories`
--

DROP TABLE IF EXISTS `pm_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pm_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pm_categories`
--

LOCK TABLES `pm_categories` WRITE;
/*!40000 ALTER TABLE `pm_categories` DISABLE KEYS */;
INSERT INTO `pm_categories` VALUES (1,'Centrifuge','ini cfg','2025-04-16 17:16:12','2025-04-16 17:16:12'),(3,'Cutting Dryer','111cdu','2025-04-16 10:21:07','2025-04-17 12:19:24'),(4,'Shaker','PM Shale Shaker','2025-04-17 09:13:05','2025-04-17 09:13:05'),(5,'Screw Conveyor','-','2025-04-17 12:18:57','2025-04-17 12:18:57'),(6,'Land Mud Cooler','ini adlaah deskripsi','2025-05-04 08:52:26','2025-05-04 08:53:05');
/*!40000 ALTER TABLE `pm_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pm_data`
--

DROP TABLE IF EXISTS `pm_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pm_data` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` bigint unsigned NOT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pm_data_category_id_foreign` (`category_id`),
  KEY `pm_data_id_user_foreign` (`id_user`),
  CONSTRAINT `pm_data_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `pm_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pm_data_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `xusers` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pm_data`
--

LOCK TABLES `pm_data` WRITE;
/*!40000 ALTER TABLE `pm_data` DISABLE KEYS */;
INSERT INTO `pm_data` VALUES (18,6,'PM 1','pm/land-mud-cooler/yhEJElZ5FmnY1vzc3uVsC3iEcsyjZSzXCUIKAejN.pdf','application/pdf',14854,8,'2025-06-05 09:47:24','2025-06-05 09:47:24'),(19,6,'PM2','pm/land-mud-cooler/id_pm2.pdf','application/pdf',14319,8,'2025-06-05 10:08:10','2025-06-05 10:08:10'),(20,1,'Operation Manual','pm/centrifuge/id_operation-manual.xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',1325127,8,'2025-06-05 10:29:39','2025-06-05 10:29:39'),(21,1,'Coba xls','pm/centrifuge/id_coba-xls.xls','application/vnd.ms-excel',8439,8,'2025-06-05 10:35:30','2025-06-05 10:35:30'),(22,1,'coba doc','pm/centrifuge/id_coba-doc.doc','application/msword',22528,8,'2025-06-05 10:38:03','2025-06-05 10:38:03'),(23,1,'cpba docx','pm/centrifuge/id_cpba-docx.docx','application/vnd.openxmlformats-officedocument.wordprocessingml.document',11901,8,'2025-06-05 10:38:14','2025-06-05 10:38:14'),(24,1,'ddd','pm/centrifuge/id_ddd.ppt','application/vnd.ms-powerpoint',43008,8,'2025-06-05 10:45:11','2025-06-05 10:45:11'),(25,1,'xx','pm/centrifuge/id_xx.pptx','application/vnd.openxmlformats-officedocument.presentationml.presentation',32613,8,'2025-06-05 10:45:19','2025-06-05 10:45:19'),(26,1,'pdff','pm/centrifuge/id_pdff.pdf','application/pdf',15002,8,'2025-06-05 11:00:27','2025-06-05 11:00:27');
/*!40000 ALTER TABLE `pm_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pm_detail_category`
--

DROP TABLE IF EXISTS `pm_detail_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pm_detail_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pm_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `frequency` int NOT NULL,
  `frequency_unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pm_detail_category`
--

LOCK TABLES `pm_detail_category` WRITE;
/*!40000 ALTER TABLE `pm_detail_category` DISABLE KEYS */;
INSERT INTO `pm_detail_category` VALUES (11,'PM Daily',1,'Day','Daily Use','2025-05-04 08:31:44','2025-05-04 08:31:44'),(12,'PM Weekly',1,'Week','Weekly Use','2025-05-04 08:32:03','2025-05-04 08:32:03'),(13,'PM Monthly',1,'Month','Monthly Use','2025-05-04 08:32:22','2025-05-04 08:32:22'),(14,'PM Six Month',6,'Month','Every 6 Month','2025-05-04 08:32:49','2025-05-04 08:32:49'),(15,'PM Annually',1,'Year','Every 1 Year','2025-05-04 08:33:18','2025-05-06 10:09:39');
/*!40000 ALTER TABLE `pm_detail_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pm_details`
--

DROP TABLE IF EXISTS `pm_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pm_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pm_detail_category` bigint unsigned NOT NULL,
  `id_asset_list` bigint unsigned NOT NULL,
  `pm_start` date DEFAULT NULL,
  `pm_due` date DEFAULT NULL,
  `pm_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performed_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pm_details_id_pm_detail_category_foreign` (`id_pm_detail_category`),
  KEY `pm_details_id_asset_list_foreign` (`id_asset_list`),
  CONSTRAINT `pm_details_id_asset_list_foreign` FOREIGN KEY (`id_asset_list`) REFERENCES `assets_list` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pm_details_id_pm_detail_category_foreign` FOREIGN KEY (`id_pm_detail_category`) REFERENCES `pm_detail_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pm_details`
--

LOCK TABLES `pm_details` WRITE;
/*!40000 ALTER TABLE `pm_details` DISABLE KEYS */;
INSERT INTO `pm_details` VALUES (1,14,5,'2025-01-01','2025-06-01','VALID','Febro','maintenance all finding',NULL,NULL),(2,11,8,'2025-05-01','2025-05-02','PM DUE','ee',NULL,'2025-05-06 09:00:40','2025-05-06 09:00:40'),(3,12,8,'2025-05-01','2025-05-08','VALID','qqq',NULL,'2025-05-06 09:03:54','2025-05-06 09:03:54'),(5,12,5,'2025-05-01','2025-05-08','VALID','dd',NULL,'2025-05-06 09:07:13','2025-05-06 09:07:13');
/*!40000 ALTER TABLE `pm_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id_project` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contract` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drillingrig` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `wellname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kodeakses` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_project`),
  KEY `projects_kodeakses_index` (`kodeakses`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'CO12344','MEDCO','GRISSIK','CO12344.jpeg','GRS-001',85496,'2025-04-03 04:34:46','2025-04-14 08:39:41'),(34,'SLB001','SLB','MI','SLB001.png','CIB',58968,'2025-04-11 09:09:17','2025-04-11 09:09:17'),(35,'SOL0001','Petronas','Esar','SOL0001.png','BTJTB',19047,'2025-04-17 11:40:26','2025-04-17 11:40:26');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retorts`
--

DROP TABLE IF EXISTS `retorts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `retorts` (
  `id_retort` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_wellinfo` bigint unsigned NOT NULL,
  `rt_sh_sampletime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt_cdu_sampletime` int DEFAULT NULL,
  `rt_cf1_sampletime` int DEFAULT NULL,
  `rt_cf2_sampletime` int DEFAULT NULL,
  `rt_cf3_sampletime` int DEFAULT NULL,
  `rt_sh_sampledepth` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt_sh_emptycell` decimal(10,2) DEFAULT NULL,
  `rt_sh_emptycellwetsamp` decimal(10,2) DEFAULT NULL,
  `rt_sh_celldrycut` decimal(10,2) DEFAULT NULL,
  `rt_sh_emptycylinder` decimal(10,2) DEFAULT NULL,
  `rt_sh_watervolin` decimal(10,2) DEFAULT NULL,
  `rt_sh_basefluidvolincyl` decimal(10,2) DEFAULT NULL,
  `rt_sh_wtcylwaterbf` decimal(10,2) DEFAULT NULL,
  `rt_sh_massofcutting` decimal(10,2) DEFAULT NULL,
  `rt_sh_massofdry` decimal(10,2) DEFAULT NULL,
  `rt_sh_wtofwaterbf` decimal(10,2) DEFAULT NULL,
  `rt_sh_massofbf` decimal(10,2) DEFAULT NULL,
  `rt_sh_mudoncutting` decimal(10,2) DEFAULT NULL,
  `rt_sh_percofcutting` decimal(10,2) DEFAULT NULL,
  `rt_sh_volbfoildisc` decimal(10,2) DEFAULT NULL,
  `rt_sh_volmuddisc` decimal(10,2) DEFAULT NULL,
  `rt_sh_ooc` decimal(10,2) DEFAULT NULL,
  `rt_cdu_sampledepth` decimal(10,2) DEFAULT NULL,
  `rt_cdu_emptycell` decimal(10,2) DEFAULT NULL,
  `rt_cdu_emptycellwetsamp` decimal(10,2) DEFAULT NULL,
  `rt_cdu_celldrycut` decimal(10,2) DEFAULT NULL,
  `rt_cdu_emptycylinder` decimal(10,2) DEFAULT NULL,
  `rt_cdu_watervolin` decimal(10,2) DEFAULT NULL,
  `rt_cdu_basefluidvolincyl` decimal(10,2) DEFAULT NULL,
  `rt_cdu_wtcylwaterbf` decimal(10,2) DEFAULT NULL,
  `rt_cdu_massofcutting` decimal(10,2) DEFAULT NULL,
  `rt_cdu_massofdry` decimal(10,2) DEFAULT NULL,
  `rt_cdu_wtofwaterbf` decimal(10,2) DEFAULT NULL,
  `rt_cdu_massofbf` decimal(10,2) DEFAULT NULL,
  `rt_cdu_mudoncutting` decimal(10,2) DEFAULT NULL,
  `rt_cdu_percofcutting` decimal(10,2) DEFAULT NULL,
  `rt_cdu_volbfoildisc` decimal(10,2) DEFAULT NULL,
  `rt_cdu_volmuddisc` decimal(10,2) DEFAULT NULL,
  `rt_cdu_ooc` decimal(10,2) DEFAULT NULL,
  `rt_cf1_sampledepth` decimal(10,2) DEFAULT NULL,
  `rt_cf1_emptycell` decimal(10,2) DEFAULT NULL,
  `rt_cf1_emptycellwetsamp` decimal(10,2) DEFAULT NULL,
  `rt_cf1_celldrycut` decimal(10,2) DEFAULT NULL,
  `rt_cf1_emptycylinder` decimal(10,2) DEFAULT NULL,
  `rt_cf1_watervolin` decimal(10,2) DEFAULT NULL,
  `rt_cf1_basefluidvolincyl` decimal(10,2) DEFAULT NULL,
  `rt_cf1_wtcylwaterbf` decimal(10,2) DEFAULT NULL,
  `rt_cf1_massofcutting` decimal(10,2) DEFAULT NULL,
  `rt_cf1_massofdry` decimal(10,2) DEFAULT NULL,
  `rt_cf1_wtofwaterbf` decimal(10,2) DEFAULT NULL,
  `rt_cf1_massofbf` decimal(10,2) DEFAULT NULL,
  `rt_cf1_mudoncutting` decimal(10,2) DEFAULT NULL,
  `rt_cf1_percofcutting` decimal(10,2) DEFAULT NULL,
  `rt_cf1_volbfoildisc` decimal(10,2) DEFAULT NULL,
  `rt_cf1_volmuddisc` decimal(10,2) DEFAULT NULL,
  `rt_cf1_ooc` decimal(10,2) DEFAULT NULL,
  `rt_cf2_sampledepth` decimal(10,2) DEFAULT NULL,
  `rt_cf2_emptycell` decimal(10,2) DEFAULT NULL,
  `rt_cf2_emptycellwetsamp` decimal(10,2) DEFAULT NULL,
  `rt_cf2_celldrycut` decimal(10,2) DEFAULT NULL,
  `rt_cf2_emptycylinder` decimal(10,2) DEFAULT NULL,
  `rt_cf2_watervolin` decimal(10,2) DEFAULT NULL,
  `rt_cf2_basefluidvolincyl` decimal(10,2) DEFAULT NULL,
  `rt_cf2_wtcylwaterbf` decimal(10,2) DEFAULT NULL,
  `rt_cf2_massofcutting` decimal(10,2) DEFAULT NULL,
  `rt_cf2_massofdry` decimal(10,2) DEFAULT NULL,
  `rt_cf2_wtofwaterbf` decimal(10,2) DEFAULT NULL,
  `rt_cf2_massofbf` decimal(10,2) DEFAULT NULL,
  `rt_cf2_mudoncutting` decimal(10,2) DEFAULT NULL,
  `rt_cf2_percofcutting` decimal(10,2) DEFAULT NULL,
  `rt_cf2_volbfoildisc` decimal(10,2) DEFAULT NULL,
  `rt_cf2_volmuddisc` decimal(10,2) DEFAULT NULL,
  `rt_cf2_ooc` decimal(10,2) DEFAULT NULL,
  `rt_cf3_sampledepth` decimal(10,2) DEFAULT NULL,
  `rt_cf3_emptycell` decimal(10,2) DEFAULT NULL,
  `rt_cf3_emptycellwetsamp` decimal(10,2) DEFAULT NULL,
  `rt_cf3_celldrycut` decimal(10,2) DEFAULT NULL,
  `rt_cf3_emptycylinder` decimal(10,2) DEFAULT NULL,
  `rt_cf3_watervolin` decimal(10,2) DEFAULT NULL,
  `rt_cf3_basefluidvolincyl` decimal(10,2) DEFAULT NULL,
  `rt_cf3_wtcylwaterbf` decimal(10,2) DEFAULT NULL,
  `rt_cf3_massofcutting` decimal(10,2) DEFAULT NULL,
  `rt_cf3_massofdry` decimal(10,2) DEFAULT NULL,
  `rt_cf3_wtofwaterbf` decimal(10,2) DEFAULT NULL,
  `rt_cf3_massofbf` decimal(10,2) DEFAULT NULL,
  `rt_cf3_mudoncutting` decimal(10,2) DEFAULT NULL,
  `rt_cf3_percofcutting` decimal(10,2) DEFAULT NULL,
  `rt_cf3_volbfoildisc` decimal(10,2) DEFAULT NULL,
  `rt_cf3_volmuddisc` decimal(10,2) DEFAULT NULL,
  `rt_cf3_ooc` decimal(10,2) DEFAULT NULL,
  `oil_recovered` decimal(10,2) DEFAULT NULL,
  `mud_recovered` decimal(10,2) DEFAULT NULL,
  `cum_oil` decimal(10,2) DEFAULT NULL,
  `cum_mud` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_retort`),
  KEY `retorts_id_wellinfo_foreign` (`id_wellinfo`),
  CONSTRAINT `retorts_id_wellinfo_foreign` FOREIGN KEY (`id_wellinfo`) REFERENCES `wellinfo` (`id_wellinfo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retorts`
--

LOCK TABLES `retorts` WRITE;
/*!40000 ALTER TABLE `retorts` DISABLE KEYS */;
INSERT INTO `retorts` VALUES (1,1,NULL,NULL,NULL,NULL,NULL,'2300',855.00,950.00,925.00,63.00,6.60,18.50,84.00,95.00,70.00,21.00,14.40,1.27,90.00,116.68,186.69,15.16,2200.00,855.00,954.00,927.00,63.00,15.40,4.60,82.00,99.00,72.00,19.00,3.60,0.21,80.00,17.38,27.81,3.64,2200.00,855.00,948.00,922.00,63.00,8.40,9.70,79.00,93.00,67.00,16.00,7.60,0.54,100.00,7.97,12.75,8.17,2200.00,855.00,948.00,922.00,63.00,8.30,8.60,78.00,93.00,67.00,15.00,6.70,0.46,100.00,7.19,11.50,7.20,2200.00,855.00,948.00,922.00,63.00,8.30,8.60,78.00,93.00,67.00,15.00,6.70,0.46,100.00,61.75,98.80,7.20,22.40,35.80,91.30,146.10,'2025-04-09 06:53:06','2025-04-11 08:05:58'),(8,9,'0',0,0,0,0,'2300',855.00,950.00,925.00,63.00,6.60,18.50,84.00,95.00,70.00,21.00,14.40,1.27,90.00,116.68,186.69,15.16,2200.00,855.00,954.00,927.00,63.00,15.40,4.60,82.00,99.00,72.00,19.00,3.60,0.21,80.00,17.38,27.81,3.64,2200.00,855.00,948.00,922.00,63.00,8.40,9.70,79.00,93.00,67.00,16.00,7.60,0.54,100.00,7.97,12.75,8.17,2200.00,855.00,948.00,922.00,63.00,8.30,8.60,78.00,93.00,67.00,15.00,6.70,0.46,100.00,7.19,11.50,7.20,2200.00,855.00,948.00,922.00,63.00,8.30,8.60,78.00,93.00,67.00,15.00,6.70,0.46,100.00,69.47,111.15,7.20,14.70,23.50,91.30,146.10,'2025-04-11 08:58:06','2025-04-14 10:22:29'),(9,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-11 09:09:17','2025-04-11 09:09:17'),(10,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-17 11:40:26','2025-04-17 11:40:26'),(11,12,'0',0,0,0,0,'2300',855.00,950.00,925.00,63.00,6.60,18.50,84.00,95.00,70.00,21.00,14.40,1.27,90.00,116.68,186.69,15.16,2200.00,855.00,954.00,927.00,63.00,15.40,4.60,82.00,99.00,72.00,19.00,3.60,0.21,80.00,17.38,27.81,3.64,2200.00,855.00,948.00,922.00,63.00,8.40,9.70,79.00,93.00,67.00,16.00,7.60,0.54,100.00,7.97,12.75,8.17,2200.00,855.00,948.00,922.00,63.00,8.30,8.60,78.00,93.00,67.00,15.00,6.70,0.46,100.00,7.19,11.50,7.20,2200.00,855.00,948.00,922.00,63.00,8.30,8.60,78.00,93.00,67.00,15.00,6.70,0.46,100.00,69.47,111.15,7.20,14.70,23.50,91.30,146.10,'2025-05-06 09:33:22','2025-05-06 09:33:22'),(12,13,'0',0,0,0,0,'2300',855.00,950.00,925.00,63.00,6.60,18.50,84.00,95.00,70.00,21.00,14.40,1.27,90.00,116.68,186.69,15.16,2200.00,855.00,954.00,927.00,63.00,15.40,4.60,82.00,99.00,72.00,19.00,3.60,0.21,80.00,17.38,27.81,3.64,2200.00,855.00,948.00,922.00,63.00,8.40,9.70,79.00,93.00,67.00,16.00,7.60,0.54,100.00,7.97,12.75,8.17,2200.00,855.00,948.00,922.00,63.00,8.30,8.60,78.00,93.00,67.00,15.00,6.70,0.46,100.00,7.19,11.50,7.20,2200.00,855.00,948.00,922.00,63.00,8.30,8.60,78.00,93.00,67.00,15.00,6.70,0.46,100.00,69.47,111.15,7.20,14.70,23.50,91.30,146.10,'2025-05-06 09:33:28','2025-05-06 09:33:28'),(13,14,'0',0,0,0,0,'2300',855.00,950.00,925.00,63.00,6.60,18.50,84.00,95.00,70.00,21.00,14.40,1.27,90.00,116.68,186.69,15.16,2200.00,855.00,954.00,927.00,63.00,15.40,4.60,82.00,99.00,72.00,19.00,3.60,0.21,80.00,17.38,27.81,3.64,2200.00,855.00,948.00,922.00,63.00,8.40,9.70,79.00,93.00,67.00,16.00,7.60,0.54,100.00,7.97,12.75,8.17,2200.00,855.00,948.00,922.00,63.00,8.30,8.60,78.00,93.00,67.00,15.00,6.70,0.46,100.00,7.19,11.50,7.20,2200.00,855.00,948.00,922.00,63.00,8.30,8.60,78.00,93.00,67.00,15.00,6.70,0.46,100.00,69.47,111.15,7.20,14.70,23.50,91.30,146.10,'2025-05-07 09:41:54','2025-05-07 09:41:54');
/*!40000 ALTER TABLE `retorts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('D2rGlWkNOlZ4H58MIgoOGZJZ0Y353I0uaqIQzMMk',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Safari/605.1.15','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNmhHMkpqUHFWVVpodE9sdXJocmhZT0ZsaVJWRUUzNm1uRllXYUg4OCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Qvc3RlcG9pbC9wdWJsaWMvbG9naW4iO31zOjQ6InVzZXIiO086MTY6IkFwcFxNb2RlbHNcWFVzZXIiOjMyOntzOjEzOiIAKgBjb25uZWN0aW9uIjtzOjU6Im15c3FsIjtzOjg6IgAqAHRhYmxlIjtzOjY6Inh1c2VycyI7czoxMzoiACoAcHJpbWFyeUtleSI7czo3OiJpZF91c2VyIjtzOjEwOiIAKgBrZXlUeXBlIjtzOjM6ImludCI7czoxMjoiaW5jcmVtZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjA6e31zOjEyOiIAKgB3aXRoQ291bnQiO2E6MDp7fXM6MTk6InByZXZlbnRzTGF6eUxvYWRpbmciO2I6MDtzOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6OTp7czo3OiJpZF91c2VyIjtpOjg7czoxMToiZW1wbG95ZWVfaWQiO3M6MTQ6ImZlYnJvaGVyZHlhbnRvIjtzOjEzOiJlbXBsb3llZV9uYW1lIjtzOjI5OiJGZWJybyBIZXJkeWFudG8gQWRtaW5pc3RyYXRvciI7czo1OiJlbWFpbCI7czoyNjoiZmVicm9oZXJkeWFudG85OEBnbWFpbC5jb20iO3M6MTA6ImtvZGVfbG9naW4iO3M6MTQ6ImZlYnJvaGVyZHlhbnRvIjtzOjEwOiJwYXNzX2xvZ2luIjtzOjYwOiIkMnkkMTAkcHdTa2Flbno2dDdRckd0UGZ1SS5GT2RvRXhXTGY0cjRsc1FGQ25MNVRxRHpUUmZLb3NsRE8iO3M6NToibGV2ZWwiO3M6NjoiTUFTVEVSIjtzOjEwOiJpZF9wcm9qZWN0IjtOO3M6Njoic3RhdHVzIjtzOjE6IlkiO31zOjExOiIAKgBvcmlnaW5hbCI7YTo5OntzOjc6ImlkX3VzZXIiO2k6ODtzOjExOiJlbXBsb3llZV9pZCI7czoxNDoiZmVicm9oZXJkeWFudG8iO3M6MTM6ImVtcGxveWVlX25hbWUiO3M6Mjk6IkZlYnJvIEhlcmR5YW50byBBZG1pbmlzdHJhdG9yIjtzOjU6ImVtYWlsIjtzOjI2OiJmZWJyb2hlcmR5YW50bzk4QGdtYWlsLmNvbSI7czoxMDoia29kZV9sb2dpbiI7czoxNDoiZmVicm9oZXJkeWFudG8iO3M6MTA6InBhc3NfbG9naW4iO3M6NjA6IiQyeSQxMCRwd1NrYWVuejZ0N1FyR3RQZnVJLkZPZG9FeFdMZjRyNGxzUUZDbkw1VHFEelRSZktvc2xETyI7czo1OiJsZXZlbCI7czo2OiJNQVNURVIiO3M6MTA6ImlkX3Byb2plY3QiO047czo2OiJzdGF0dXMiO3M6MToiWSI7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MDp7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YToxOntzOjc6InByb2plY3QiO047fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6MTA6InRpbWVzdGFtcHMiO2I6MDtzOjEzOiJ1c2VzVW5pcXVlSWRzIjtiOjA7czo5OiIAKgBoaWRkZW4iO2E6MDp7fXM6MTA6IgAqAHZpc2libGUiO2E6MDp7fXM6MTE6IgAqAGZpbGxhYmxlIjthOjg6e2k6MDtzOjExOiJlbXBsb3llZV9pZCI7aToxO3M6MTM6ImVtcGxveWVlX25hbWUiO2k6MjtzOjU6ImVtYWlsIjtpOjM7czoxMDoia29kZV9sb2dpbiI7aTo0O3M6MTA6InBhc3NfbG9naW4iO2k6NTtzOjU6ImxldmVsIjtpOjY7czoxMDoiaWRfcHJvamVjdCI7aTo3O3M6Njoic3RhdHVzIjt9czoxMDoiACoAZ3VhcmRlZCI7YToxOntpOjA7czoxOiIqIjt9czoxOToiACoAYXV0aFBhc3N3b3JkTmFtZSI7czo4OiJwYXNzd29yZCI7czoyMDoiACoAcmVtZW1iZXJUb2tlbk5hbWUiO3M6MTQ6InJlbWVtYmVyX3Rva2VuIjt9czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NzoiaHR0cDovL2xvY2FsaG9zdC9zdGVwb2lsL3B1YmxpYy9wbS1hZG1pbi8xL3Nob3ciO319',1744901589),('T6V6h8kIxgB4JAly9ReGAE1Jmfr5yad2lRfh0NkH',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1FtZTdsZUloQ2pnemxwNDIzSlZ3RjBMcFNjZTdsYzU2TEpZQmFWbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Qvc3RlcG9pbC9wdWJsaWMvbG9naW4iO319',1744897882),('u5XEE4cGEU6KiMWaKrO3H9MrKFoXJCiNzGS1s3tA',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Safari/605.1.15','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidDZvMGlkQnJaNDhNQWlGSDg5OGlFelJpSjJuUmxyNlhIUU5PTXpKayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9sb2NhbGhvc3Qvc3RlcG9pbC9wdWJsaWMvcG0tYWRtaW4vMS9zaG93Ijt9czo0OiJ1c2VyIjtPOjE2OiJBcHBcTW9kZWxzXFhVc2VyIjozMDp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czo2OiJ4dXNlcnMiO3M6MTM6IgAqAHByaW1hcnlLZXkiO3M6NzoiaWRfdXNlciI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjk6e3M6NzoiaWRfdXNlciI7aTo4O3M6MTE6ImVtcGxveWVlX2lkIjtzOjE0OiJmZWJyb2hlcmR5YW50byI7czoxMzoiZW1wbG95ZWVfbmFtZSI7czoyOToiRmVicm8gSGVyZHlhbnRvIEFkbWluaXN0cmF0b3IiO3M6NToiZW1haWwiO3M6MjY6ImZlYnJvaGVyZHlhbnRvOThAZ21haWwuY29tIjtzOjEwOiJrb2RlX2xvZ2luIjtzOjE0OiJmZWJyb2hlcmR5YW50byI7czoxMDoicGFzc19sb2dpbiI7czo2MDoiJDJ5JDEwJHB3U2thZW56NnQ3UXJHdFBmdUkuRk9kb0V4V0xmNHI0bHNRRkNuTDVUcUR6VFJmS29zbERPIjtzOjU6ImxldmVsIjtzOjY6Ik1BU1RFUiI7czoxMDoiaWRfcHJvamVjdCI7TjtzOjY6InN0YXR1cyI7czoxOiJZIjt9czoxMToiACoAb3JpZ2luYWwiO2E6OTp7czo3OiJpZF91c2VyIjtpOjg7czoxMToiZW1wbG95ZWVfaWQiO3M6MTQ6ImZlYnJvaGVyZHlhbnRvIjtzOjEzOiJlbXBsb3llZV9uYW1lIjtzOjI5OiJGZWJybyBIZXJkeWFudG8gQWRtaW5pc3RyYXRvciI7czo1OiJlbWFpbCI7czoyNjoiZmVicm9oZXJkeWFudG85OEBnbWFpbC5jb20iO3M6MTA6ImtvZGVfbG9naW4iO3M6MTQ6ImZlYnJvaGVyZHlhbnRvIjtzOjEwOiJwYXNzX2xvZ2luIjtzOjYwOiIkMnkkMTAkcHdTa2Flbno2dDdRckd0UGZ1SS5GT2RvRXhXTGY0cjRsc1FGQ25MNVRxRHpUUmZLb3NsRE8iO3M6NToibGV2ZWwiO3M6NjoiTUFTVEVSIjtzOjEwOiJpZF9wcm9qZWN0IjtOO3M6Njoic3RhdHVzIjtzOjE6IlkiO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjA6e31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MTp7czo3OiJwcm9qZWN0IjtOO31zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjEwOiJ0aW1lc3RhbXBzIjtiOjA7czoxMzoidXNlc1VuaXF1ZUlkcyI7YjowO3M6OToiACoAaGlkZGVuIjthOjA6e31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjExOiIAKgBmaWxsYWJsZSI7YTo4OntpOjA7czoxMToiZW1wbG95ZWVfaWQiO2k6MTtzOjEzOiJlbXBsb3llZV9uYW1lIjtpOjI7czo1OiJlbWFpbCI7aTozO3M6MTA6ImtvZGVfbG9naW4iO2k6NDtzOjEwOiJwYXNzX2xvZ2luIjtpOjU7czo1OiJsZXZlbCI7aTo2O3M6MTA6ImlkX3Byb2plY3QiO2k6NztzOjY6InN0YXR1cyI7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fX19',1744828609);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warning`
--

DROP TABLE IF EXISTS `warning`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `warning` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code_warning` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_warning` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `status_warning` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `warning_code_warning_index` (`code_warning`),
  KEY `warning_status_warning_index` (`status_warning`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warning`
--

LOCK TABLES `warning` WRITE;
/*!40000 ALTER TABLE `warning` DISABLE KEYS */;
/*!40000 ALTER TABLE `warning` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wellinfo`
--

DROP TABLE IF EXISTS `wellinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wellinfo` (
  `id_wellinfo` bigint unsigned NOT NULL AUTO_INCREMENT,
  `curdate` date DEFAULT NULL,
  `id_project` bigint unsigned NOT NULL,
  `platform` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wellname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spud_date` date DEFAULT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oim` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mudeng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urut` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lockreport` enum('YES','NO') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_wellinfo`),
  KEY `wellinfo_id_project_foreign` (`id_project`),
  CONSTRAINT `wellinfo_id_project_foreign` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wellinfo`
--

LOCK TABLES `wellinfo` WRITE;
/*!40000 ALTER TABLE `wellinfo` DISABLE KEYS */;
INSERT INTO `wellinfo` VALUES (1,'2025-04-03',1,'PLT','WNnn','2025-04-03','CKRs','FBR','sfbrd','HRD','1','NO','2025-04-03 04:34:47','2025-04-11 08:16:52'),(9,'2025-04-11',1,'dsd','gfgf','2025-04-03','dsds','r3ed','544','4tgf','2','YES','2025-04-11 08:58:06','2025-05-06 09:33:04'),(10,'2025-04-11',34,'SLB001','CIB','2025-04-11','','','','','1','NO','2025-04-11 09:09:17','2025-04-11 09:09:17'),(11,'2025-04-17',35,'SOL0001','BTJTB','2025-04-17','','','','','1','YES','2025-04-17 11:40:26','2025-04-17 11:44:20'),(12,'2025-05-06',1,'dsd','gfgf','2025-04-03','dsds','r3ed','544','4tgf','3','NO','2025-05-06 09:33:22','2025-05-06 09:33:22'),(13,'2025-05-06',1,'dsd','gfgf','2025-04-03','dsds','r3ed','544','4tgf','4','YES','2025-05-06 09:33:28','2025-05-07 08:14:53'),(14,'2025-05-07',1,'dsd','gfgf','2025-04-03','dsds','r3ed','544','4tgf','5','YES','2025-05-07 09:41:54','2025-05-07 09:42:00');
/*!40000 ALTER TABLE `wellinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xusers`
--

DROP TABLE IF EXISTS `xusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xusers` (
  `id_user` int unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_project` int DEFAULT NULL,
  `status` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xusers`
--

LOCK TABLES `xusers` WRITE;
/*!40000 ALTER TABLE `xusers` DISABLE KEYS */;
INSERT INTO `xusers` VALUES (8,'febroherdyanto','Febro Herdyanto Administrator','febroherdyanto98@gmail.com','febroherdyanto','$2y$10$pwSkaenz6t7QrGtPfuI.FOdoExWLf4r4lsQFCnL5TqDzTRfKoslDO','MASTER',NULL,'Y'),(10,'H248044','Bobby Setiawan','bobby.setiawan@halli.com','bobby.setiawan','$2y$12$NyUQfUteCE9xaAvwTDo7pebfNKdnx7rFeMvDTjEATmQq26NBVODj6','Supervisor',0,'Y'),(11,'operator','OP Baru','op@g.co','operator','$2y$12$dGjp7nmU28Fgaia06MKsKuBV5MzQK920/9ILpw.C/beCX79zr98X6','Operator',1,'Y');
/*!40000 ALTER TABLE `xusers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-06  1:18:07
