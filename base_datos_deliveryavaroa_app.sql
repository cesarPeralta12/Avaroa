/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.17-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: deliveryavaroa_app
-- ------------------------------------------------------
-- Server version	10.11.17-MariaDB

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
-- Table structure for table `about_us_gallery_images`
--

DROP TABLE IF EXISTS `about_us_gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `about_us_gallery_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) DEFAULT NULL,
  `order` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_us_gallery_images`
--

LOCK TABLES `about_us_gallery_images` WRITE;
/*!40000 ALTER TABLE `about_us_gallery_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `about_us_gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `about_us_generals`
--

DROP TABLE IF EXISTS `about_us_generals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `about_us_generals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_area_title` varchar(255) DEFAULT NULL,
  `gallery_area_subtitle` text DEFAULT NULL,
  `gallery_third_image` varchar(255) DEFAULT NULL,
  `gallery_second_image` varchar(255) DEFAULT NULL,
  `gallery_first_image` varchar(255) DEFAULT NULL,
  `our_history_title` varchar(255) DEFAULT NULL,
  `our_history_subtitle` text DEFAULT NULL,
  `upgrade_skill_logo` varchar(255) DEFAULT NULL,
  `upgrade_skill_title` varchar(255) DEFAULT NULL,
  `upgrade_skill_subtitle` text DEFAULT NULL,
  `upgrade_skill_button_name` varchar(255) DEFAULT NULL,
  `team_member_logo` varchar(255) DEFAULT NULL,
  `team_member_title` varchar(255) DEFAULT NULL,
  `team_member_subtitle` text DEFAULT NULL,
  `instructor_support_title` varchar(255) DEFAULT NULL,
  `instructor_support_subtitle` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_us_generals`
--

LOCK TABLES `about_us_generals` WRITE;
/*!40000 ALTER TABLE `about_us_generals` DISABLE KEYS */;
INSERT INTO `about_us_generals` VALUES
(1,'Mere Tranquil Existence, That I Neglect My Talents Should','Possession Of My Entire Soul, Like These Sweet Mornings Of Spring Which I Enjoy With My Whole Heart. I Am Alone, And Charm Of Existence In This Spot, Which Was Created For The Bliss Of Souls Like Mine. I Am So Happy, My Dear Friend, So Absorbed In The Exquisite Sense Of Mere Tranquil Existence','uploads_demo/gallery/3.jpg','uploads_demo/gallery/2.jpg','uploads_demo/gallery/1.jpg','Our History','Possession Of My Entire Soul, Like These Sweet Mornings Of Spring Which I Enjoy With My Whole Heart. I Am Alone, And Charm Of Existence In This Spot Which','uploads_demo/about_us_general/upgrade.jpg','Upgrade Your Skills Today For Upgrading Your Life.','Noticed by me when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence stalks, and grow familiar with the countless','Find Your Course','uploads_demo/about_us_general/team-members-heading-img.png','Our Passionate Team Members','CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS','Quality Course, Instructor And Support','CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS',NULL,NULL);
/*!40000 ALTER TABLE `about_us_generals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `label` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `coordinates` varchar(255) NOT NULL DEFAULT '0.0,0.0',
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES
(8,29,'Home','123 Main Street','Cityville','40.7128,-74.0060',0,'2025-05-24 08:42:47','2025-05-26 05:02:24'),
(9,29,'office','Azad nagar','indore','0.0,0.0',0,'2025-05-24 08:43:59','2025-05-26 05:02:24'),
(18,30,'Home','86CC+RR3,Industrial Area','Burhanpur','21.3223666,76.2223826',0,'2025-05-25 07:12:37','2025-05-25 07:32:06'),
(20,30,'Home','86CC+RR3,Industrial Area','Burhanpur','21.3223666,76.2223826',1,'2025-05-25 07:32:06','2025-05-25 07:32:06'),
(21,29,'Home','86CC+RR3,Industrial Area','Burhanpur','21.3223666,76.2223826',0,'2025-05-25 07:33:26','2025-05-26 05:02:24'),
(26,32,'Home','86CC+RR3,Industrial Area','Burhanpur','21.3223666,76.2223826',0,'2025-05-25 07:53:42','2025-05-25 07:53:57'),
(27,32,'Home','86CC+RR3,Industrial Area','Burhanpur','21.3223666,76.2223826',1,'2025-05-25 07:53:57','2025-05-25 07:53:57'),
(31,33,'Home','Google Building 43','Mountain View','37.4219983,-122.084',0,'2025-05-26 04:53:04','2025-05-26 04:53:04'),
(32,33,'Home','Google Building 43','Mountain View','37.4219983,-122.084',1,'2025-05-26 04:53:04','2025-05-26 04:53:04'),
(33,34,'Home','Google Building 43','Mountain View','37.4219983,-122.084',0,'2025-05-26 04:56:21','2025-05-26 04:56:21'),
(34,34,'Home','Google Building 43','Mountain View','37.4219983,-122.084',1,'2025-05-26 04:56:21','2025-05-26 04:56:21'),
(35,35,'Home','Google Building 43','Mountain View','37.4219983,-122.084',0,'2025-05-26 04:58:06','2025-05-26 04:58:06'),
(36,35,'Home','Google Building 43','Mountain View','37.4219983,-122.084',1,'2025-05-26 04:58:06','2025-05-26 04:58:06'),
(37,29,'Home','Google Building 43','Mountain View','37.4219983,-122.084',1,'2025-05-26 05:02:24','2025-05-26 05:02:24'),
(38,36,'Home','138/06,Industrial Area','Burhanpur','21.324985,76.2235441',0,'2025-05-26 05:20:40','2025-05-26 05:20:41'),
(39,36,'Home','138/06,Industrial Area','Burhanpur','21.324985,76.2235441',1,'2025-05-26 05:20:41','2025-05-26 05:20:41'),
(40,37,'Home','6RH7+CMW,Centro','Santa Cruz de la Sierra','-17.7713817,-63.1857887',1,'2025-05-26 05:39:43','2025-05-26 05:39:43'),
(41,31,'Home','246,Av. Cristóbal De Mendoza 246,Centro','Santa Cruz de la Sierra','-17.7714435,-63.1857815',1,'2025-05-28 16:38:52','2025-05-28 16:38:52'),
(42,31,'Ubicación actual','Av. Cristobal de Mendoza # 246 Edificio La Casona','Santa Cruz de la Sierra','-17.7715362,-63.1857979',0,'2025-05-30 23:45:34','2025-05-30 23:45:34'),
(43,37,'Ubicación actual','Av. Cristóbal De Mendoza 246','Santa Cruz de la Sierra','-17.7717747,-63.1858207',0,'2025-06-02 19:25:06','2025-06-02 19:25:06'),
(44,31,'Ubicación actual','Av. Cristóbal De Mendoza 246','Santa Cruz de la Sierra','-17.7714322,-63.1857941',0,'2025-06-03 16:21:18','2025-06-03 16:21:18');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_logs`
--

DROP TABLE IF EXISTS `audit_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `audit_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `trip_id` bigint(20) unsigned DEFAULT NULL,
  `conversation_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `event_type` varchar(255) NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`details`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audit_logs_trip_id_foreign` (`trip_id`),
  KEY `audit_logs_conversation_id_foreign` (`conversation_id`),
  CONSTRAINT `audit_logs_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversation_sessions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `audit_logs_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_logs`
--

LOCK TABLES `audit_logs` WRITE;
/*!40000 ALTER TABLE `audit_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank_details`
--

DROP TABLE IF EXISTS `bank_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `bank_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `account_number` varchar(191) DEFAULT NULL,
  `ifsc_code` varchar(191) DEFAULT NULL,
  `qrcode_path` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank_details`
--

LOCK TABLES `bank_details` WRITE;
/*!40000 ALTER TABLE `bank_details` DISABLE KEYS */;
INSERT INTO `bank_details` VALUES
(7,NULL,NULL,NULL,NULL,'Commons_QR_code.png','2024-04-13 23:44:41','2024-04-13 23:44:41');
/*!40000 ALTER TABLE `bank_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `banks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banks`
--

LOCK TABLES `banks` WRITE;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` VALUES
(5,'State Bank Of India','Aasif Ahmed','987654321',1,'2025-01-13 01:30:34','2025-01-13 01:30:34');
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title1` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `image` varchar(191) NOT NULL,
  `page_banner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES
(7,'Fin de semana perfecto','-','-','-','https://bikebros.net/productbyCategory/7','uploads/banners/1748888808-Hbl33rnWlg.jpg',NULL,'2024-08-15 06:10:17','2025-06-02 18:26:48'),
(11,'Un fin de semana perfecto','Ofrecemos experiencias increíbles y creamos','aventuras seguras para ti al mismo tiempo.','Sobre Nosotros','http://superfastsattaresult.in/','uploads/banners/1748881980-o67iq3XIKl.jpg',NULL,'2024-08-15 13:05:16','2025-06-02 16:33:00'),
(12,'A cualquier parte de la ciudad','Una gran variedad de toboganes de agua, desde los más empinados hasta los más suaves,','para todos los gustos. ¡Diversión garantizada!','Sobre Nosotros','https://desawarkingsatta.com/','uploads/banners/1748882884-UgViGVCJ4l.jpg',NULL,'2025-01-27 00:56:33','2025-06-02 16:48:04');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active, 0=deactivated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_categories_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
INSERT INTO `blog_categories` VALUES
(1,'86d5f6cd-caa2-11f0-9eae-84144d03fc31','Forex Trading','forex-trading',0,'2025-11-26 08:33:04','2025-11-26 08:33:04'),
(2,'86d600c6-caa2-11f0-9eae-84144d03fc31','Crypto Analysis','crypto-analysis',0,'2025-11-26 08:33:04','2025-11-26 08:33:04'),
(3,'86d60134-caa2-11f0-9eae-84144d03fc31','Risk Management','risk-management',0,'2025-11-26 08:33:04','2025-11-26 08:33:04'),
(4,'86d60159-caa2-11f0-9eae-84144d03fc31','Psychology','trading-psychology',0,'2025-11-26 08:33:04','2025-11-26 08:33:04'),
(5,'86d60178-caa2-11f0-9eae-84144d03fc31','Technical Analysis','technical-analysis',0,'2025-11-26 08:33:04','2025-11-26 08:33:04'),
(6,'86d60197-caa2-11f0-9eae-84144d03fc31','Funded Accounts','funded-accounts',0,'2025-11-26 08:33:04','2025-11-26 08:33:04');
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_comments`
--

DROP TABLE IF EXISTS `blog_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 2=deactivate',
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_comments`
--

LOCK TABLES `blog_comments` WRITE;
/*!40000 ALTER TABLE `blog_comments` DISABLE KEYS */;
INSERT INTO `blog_comments` VALUES
(4,14,3,NULL,NULL,'test',1,NULL,'2024-11-02 01:38:48','2024-11-02 01:38:48'),
(5,14,3,NULL,NULL,'cxgvsdfsd',1,NULL,'2024-11-02 01:45:47','2024-11-02 01:45:47'),
(6,14,3,NULL,NULL,'blog comment test',1,NULL,'2024-11-02 02:36:27','2024-11-02 02:36:27'),
(7,11,3,NULL,NULL,'edu',1,NULL,'2024-11-02 02:37:09','2024-11-02 02:37:09'),
(8,14,5,NULL,NULL,'wow',1,NULL,'2024-11-02 02:55:14','2024-11-02 02:55:14'),
(9,14,5,NULL,NULL,'reh',1,5,'2024-11-02 03:03:41','2024-11-02 03:03:41');
/*!40000 ALTER TABLE `blog_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_tags`
--

DROP TABLE IF EXISTS `blog_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) unsigned DEFAULT NULL,
  `tag_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_tags`
--

LOCK TABLES `blog_tags` WRITE;
/*!40000 ALTER TABLE `blog_tags` DISABLE KEYS */;
INSERT INTO `blog_tags` VALUES
(9,4,2,'2024-03-29 00:44:55','2024-03-29 00:44:55'),
(10,4,3,'2024-03-29 00:44:55','2024-03-29 00:44:55'),
(12,7,3,'2024-03-29 01:30:57','2024-03-29 01:30:57'),
(17,10,3,'2024-03-29 01:46:55','2024-03-29 01:46:55'),
(19,3,4,'2024-03-29 05:13:33','2024-03-29 05:13:33'),
(23,15,3,'2024-10-28 03:53:46','2024-10-28 03:53:46'),
(27,14,1,'2024-10-28 05:14:45','2024-10-28 05:14:45');
/*!40000 ALTER TABLE `blog_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `like_count` varchar(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `details` mediumtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=published, 0=unpublished',
  `blog_category_id` bigint(20) unsigned DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES
(1,'3c6bc7c0-caa4-11f0-9eae-84144d03fc31',1,'245','Mastering Support & Resistance in 2025','mastering-support-resistance-2025','Learn how pro traders use S&R levels for high-probability entries with laser precision.','<p>Support and resistance are the foundation of price action trading...</p>','https://images.unsplash.com/photo-1561414927-6d86591d0c4f',1,1,'Mastering Support & Resistance in 2025','Professional guide to drawing and trading S&R levels','forex, support resistance, price action','https://images.unsplash.com/photo-1559526324-593bc073d938','2025-11-26 08:45:18','2025-11-26 08:45:18'),
(3,'3c6bd279-caa4-11f0-9eae-84144d03fc31',1,'312','How to Trade News Without Getting Stop-Hunted','trade-news-without-stop-hunt','3 proven strategies to survive NFP, CPI, and rate decisions safely.','<p>News doesn’t have to be gambling...</p>','https://images.unsplash.com/photo-1454165804606-c3d57bc86b40',1,1,'Safe News Trading Strategy','Avoid stop hunts during high-impact news','nfp, news trading','https://images.unsplash.com/photo-1535223289827-42f1e9919769','2025-11-26 08:45:18','2025-11-26 08:45:18'),
(7,'3c6bd340-caa4-11f0-9eae-84144d03fc31',1,'892','The 1% Risk Rule That Saved My Career','1-percent-risk-rule','How proper position sizing turns losers into winners.','<p>I blew 3 accounts before I learned this one rule...</p>','https://images.unsplash.com/photo-1509021436665-8f07dbf5bf1d',1,3,'1% Risk Rule Explained','Never blow another account again','risk management, position sizing','https://images.unsplash.com/photo-1515165562835-c4c7f589308c','2025-11-26 08:45:18','2025-11-26 08:45:18'),
(8,'3c6bd36b-caa4-11f0-9eae-84144d03fc31',1,'721','Why 90% of Traders Fail – Real Stats','why-90-percent-traders-fail','The brutal truth backed by broker data.','<p>Most traders ignore these 3 things...</p>','https://images.unsplash.com/photo-1542744173-8e7e53415bb0',1,3,'Why Traders Fail','Trading statistics and psychology','trading failure, risk','https://images.unsplash.com/photo-1543286386-713bdd548da4','2025-11-26 08:45:18','2025-11-26 08:45:18'),
(10,'3c6bd3c4-caa4-11f0-9eae-84144d03fc31',1,'945','How to Stop Revenge Trading Forever','stop-revenge-trading','The one mental shift that breaks emotional trading.','<p>I lost $8k in one day — then fixed my mind...</p>','https://images.unsplash.com/photo-1522202176988-66273c2fd55f',1,4,'Stop Revenge Trading','Overcome emotional trading','trading psychology, revenge','https://images.unsplash.com/photo-1455849318743-b2233052fcff','2025-11-26 08:45:18','2025-11-26 08:45:18'),
(11,'3c6bd3f3-caa4-11f0-9eae-84144d03fc31',1,'876','How to Beat FOMO in Trading (3 Steps)','beat-trading-fomo','Stop chasing every green candle.','<p>FOMO kills accounts. Here’s the cure...</p>','https://images.unsplash.com/photo-1521791055366-0d553872125f',1,4,'Beat FOMO Trading','Discipline and patience','fomo, psychology','https://images.unsplash.com/photo-1536233716094-d76a24f2e71e','2025-11-26 08:45:18','2025-11-26 08:45:18'),
(12,'3c6bd41d-caa4-11f0-9eae-84144d03fc31',1,'801','Daily Routine of a 6-Figure Funded Trader','funded-trader-routine','Copy the exact morning routine of elite traders.','<p>Journal → Analysis → Execution...</p>','https://images.unsplash.com/photo-1522202176988-66273c2fd55f',1,4,'Funded Trader Routine','Pro trader habits','trading routine','https://images.unsplash.com/photo-1515165562835-c4c7f589308c','2025-11-26 08:45:18','2025-11-26 08:45:18'),
(15,'3c6bd4de-caa4-11f0-9eae-84144d03fc31',1,'834','5 Candlestick Patterns That Actually Work','candlestick-patterns-2025','Backtested 80%+ win rate patterns.','<p>Not all candles are equal. These 5 dominate...</p>','https://images.unsplash.com/photo-1517148815978-75f6acaaf32c',1,5,'Best Candlestick Patterns','Price action trading','candlesticks, reversal','https://images.unsplash.com/photo-1504384308090-c894fdcc538d','2025-11-26 08:45:18','2025-11-26 08:45:18'),
(17,'3c6bd535-caa4-11f0-9eae-84144d03fc31',1,'1156','How I Passed FTMO in 7 Days','pass-ftmo-7-days','Exact strategy used by 200+ traders.','<p>From $10k to $400k funded...</p>','https://images.unsplash.com/photo-1551836022-d5d88e9218df',1,6,'Pass FTMO Fast','FTMO challenge strategy','ftmo, funded','https://images.unsplash.com/photo-1454165804606-c3d57bc86b40','2025-11-26 08:45:18','2025-11-26 08:45:18');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_feature` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,'','Construcción',NULL,'no','construccion',NULL,NULL,NULL,NULL,1,'2025-07-08 10:29:10','2025-07-15 12:00:00'),
(4,'c4d5e6f7-5be6-11f0-8620-9a4383c8618e','Hogar',NULL,'no','hogar',NULL,NULL,NULL,NULL,1,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(5,'c4d5e6f8-5be6-11f0-8620-9a4383c8618e','Gastronomía',NULL,'no','gastronomia',NULL,NULL,NULL,NULL,1,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(6,'c4d5e6f9-5be6-11f0-8620-9a4383c8618e','Cuidado y Bienestar',NULL,'no','cuidado-y-bienestar',NULL,NULL,NULL,NULL,1,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(7,'c4d5e6fa-5be6-11f0-8620-9a4383c8618e','Seguridad',NULL,'no','seguridad',NULL,NULL,NULL,NULL,1,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(8,'c4d5e6fb-5be6-11f0-8620-9a4383c8618e','Educación',NULL,'no','educacion',NULL,NULL,NULL,NULL,1,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(9,'c4d5e6fc-5be6-11f0-8620-9a4383c8618e','Mascotas',NULL,'no','mascotas',NULL,NULL,NULL,NULL,1,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(10,'c4d5e6fd-5be6-11f0-8620-9a4383c8618e','Belleza',NULL,'no','belleza',NULL,NULL,NULL,NULL,1,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(11,'c4d5e6fe-5be6-11f0-8620-9a4383c8618e','Eventos',NULL,'no','eventos',NULL,NULL,NULL,NULL,1,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(12,'c4d5e6ff-5be6-11f0-8620-9a4383c8618e','Redes Sociales',NULL,'no','redes-sociales',NULL,NULL,NULL,NULL,1,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(13,'c4d5e700-5be6-11f0-8620-9a4383c8618e','Mantenimiento y Reparación',NULL,'no','mantenimiento-y-reparacion',NULL,NULL,NULL,NULL,1,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(14,'c4d5e701-5be6-11f0-8620-9a4383c8618e','Otros',NULL,'no','otros',NULL,NULL,NULL,NULL,1,'2025-07-15 12:00:00','2025-07-15 12:00:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `chats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `request_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `client_account_type` varchar(255) DEFAULT NULL,
  `worker_id` bigint(20) unsigned NOT NULL,
  `worker_account_type` varchar(255) DEFAULT NULL,
  `chat_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chats_chat_id_unique` (`chat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES
(1,4,41,'Client',43,'Client','chat_4_Ps27DEFdpZhAcozI0IlJVvLn2UM2_YdwgkxnnK0VfdXmyhsieDutqGyD3','2025-07-08 13:55:00','2025-07-25 13:15:16'),
(2,11,41,'Client',44,'Chambeador','chat_11_Ps27DEFdpZhAcozI0IlJVvLn2UM2_9iTS6GPWa1RBKhoUeXQgMrgb3Lv2','2025-07-08 15:47:51','2025-07-12 03:57:05'),
(3,11,44,'Chambeador',44,'Chambeador','chat_11_9iTS6GPWa1RBKhoUeXQgMrgb3Lv2_9iTS6GPWa1RBKhoUeXQgMrgb3Lv2','2025-07-08 16:33:32','2025-07-08 16:51:09'),
(4,11,41,'Client',44,'Chambeador','chat_11_9iTS6GPWa1RBKhoUeXQgMrgb3Lv2_Ps27DEFdpZhAcozI0IlJVvLn2UM2','2025-07-08 16:48:11','2025-07-08 16:51:36'),
(5,4,41,'Client',42,'Chambeador','chat_4_Ps27DEFdpZhAcozI0IlJVvLn2UM2_4Mqh5sTGviPOnqsCrIfH5FDnGPw1','2025-07-19 04:55:13','2025-07-19 05:44:27'),
(6,18,41,'Client',44,'Chambeador','chat_18_Ps27DEFdpZhAcozI0IlJVvLn2UM2_9iTS6GPWa1RBKhoUeXQgMrgb3Lv2','2025-07-19 08:04:08','2025-07-19 08:04:08'),
(7,20,41,'Client',44,'Chambeador','chat_20_Ps27DEFdpZhAcozI0IlJVvLn2UM2_9iTS6GPWa1RBKhoUeXQgMrgb3Lv2','2025-07-19 08:56:53','2025-07-25 13:16:15'),
(8,41,41,'Client',44,'Chambeador','chat_41_Ps27DEFdpZhAcozI0IlJVvLn2UM2_9iTS6GPWa1RBKhoUeXQgMrgb3Lv2','2025-07-28 07:05:48','2025-07-28 07:05:48'),
(9,44,41,'Client',46,'Chambeador','chat_44_Ps27DEFdpZhAcozI0IlJVvLn2UM2_eTaMlGgWVoak3CXuUNUHAevXWVM2','2025-08-01 15:48:18','2025-08-06 03:08:05'),
(10,45,46,'Client',68,'Chambeador','chat_45_eTaMlGgWVoak3CXuUNUHAevXWVM2_qgj9Gik54BYk8Po1xei4lxFurQ03','2025-08-06 08:23:06','2025-09-10 16:09:07'),
(11,43,41,'Client',44,'Chambeador','chat_43_Ps27DEFdpZhAcozI0IlJVvLn2UM2_9iTS6GPWa1RBKhoUeXQgMrgb3Lv2','2025-08-07 08:25:34','2025-08-07 08:25:34'),
(12,65,41,'Client',44,'Chambeador','chat_65_Ps27DEFdpZhAcozI0IlJVvLn2UM2_9iTS6GPWa1RBKhoUeXQgMrgb3Lv2','2025-09-05 09:26:50','2025-09-09 15:39:06'),
(13,67,46,'Client',94,'Chambeador','chat_67_eTaMlGgWVoak3CXuUNUHAevXWVM2_FiGfxzgXRKfIaE7F7a1JAgL09HF3','2025-09-09 17:13:01','2025-09-09 17:13:01'),
(14,68,46,'Client',94,'Chambeador','chat_68_eTaMlGgWVoak3CXuUNUHAevXWVM2_FiGfxzgXRKfIaE7F7a1JAgL09HF3','2025-09-09 17:21:57','2025-09-09 17:21:57'),
(15,75,84,'Client',49,'Chambeador','chat_75_JfREDCu0MhgsJCF7dezcZAc6fkU2_2PqcjE3oykWtVPdKCU9ZUYpA0yr1','2025-09-14 05:15:24','2025-09-14 05:17:06'),
(16,78,84,'Client',49,'Chambeador','chat_78_JfREDCu0MhgsJCF7dezcZAc6fkU2_2PqcjE3oykWtVPdKCU9ZUYpA0yr1','2025-09-14 05:44:05','2025-09-14 05:44:20'),
(17,79,41,'Client',44,'Chambeador','chat_79_Ps27DEFdpZhAcozI0IlJVvLn2UM2_9iTS6GPWa1RBKhoUeXQgMrgb3Lv2','2025-09-14 06:54:18','2025-09-14 06:54:18'),
(18,80,41,'Client',104,'Chambeador','chat_80_Ps27DEFdpZhAcozI0IlJVvLn2UM2_rnBZGW9BScYBOZzIcaAcMDUcP9u1','2025-09-14 07:37:10','2025-09-14 07:37:10'),
(19,81,41,'Client',42,'Chambeador','chat_81_Ps27DEFdpZhAcozI0IlJVvLn2UM2_4Mqh5sTGviPOnqsCrIfH5FDnGPw1','2025-09-14 07:49:50','2025-09-14 07:49:50'),
(20,82,84,'Client',49,'Chambeador','chat_82_JfREDCu0MhgsJCF7dezcZAc6fkU2_2PqcjE3oykWtVPdKCU9ZUYpA0yr1','2025-09-14 08:08:22','2025-09-14 08:09:18'),
(21,83,41,'Client',132,'Chambeador','chat_83_Ps27DEFdpZhAcozI0IlJVvLn2UM2_1JKFRVLoHDcJ4j7OqXvWpp68iWW2','2025-09-14 08:37:20','2025-09-14 08:37:20'),
(22,84,84,'Client',49,'Chambeador','chat_84_JfREDCu0MhgsJCF7dezcZAc6fkU2_2PqcjE3oykWtVPdKCU9ZUYpA0yr1','2025-09-14 08:39:08','2025-09-14 08:39:21'),
(23,85,41,'Client',133,'Chambeador','chat_85_Ps27DEFdpZhAcozI0IlJVvLn2UM2_BWSb9mDTwXOKW5iRyKutAAr7GSv1','2025-09-14 08:50:22','2025-09-14 08:50:22'),
(24,86,41,'Client',133,'Chambeador','chat_86_Ps27DEFdpZhAcozI0IlJVvLn2UM2_BWSb9mDTwXOKW5iRyKutAAr7GSv1','2025-09-14 09:48:49','2025-09-14 09:50:01'),
(25,87,41,'Client',133,'Chambeador','chat_87_Ps27DEFdpZhAcozI0IlJVvLn2UM2_BWSb9mDTwXOKW5iRyKutAAr7GSv1','2025-09-14 09:55:10','2025-09-14 09:55:10'),
(26,100,46,'Client',84,'Chambeador','chat_100_eTaMlGgWVoak3CXuUNUHAevXWVM2_JfREDCu0MhgsJCF7dezcZAc6fkU2','2025-09-15 15:26:55','2025-09-15 15:43:50'),
(27,103,84,'Client',46,'Chambeador','chat_103_JfREDCu0MhgsJCF7dezcZAc6fkU2_eTaMlGgWVoak3CXuUNUHAevXWVM2','2025-09-15 17:14:46','2025-09-15 17:15:35'),
(28,104,46,'Client',84,'Chambeador','chat_104_eTaMlGgWVoak3CXuUNUHAevXWVM2_JfREDCu0MhgsJCF7dezcZAc6fkU2','2025-09-16 00:55:20','2025-09-16 00:55:40'),
(29,105,84,'Client',46,'Chambeador','chat_105_JfREDCu0MhgsJCF7dezcZAc6fkU2_eTaMlGgWVoak3CXuUNUHAevXWVM2','2025-09-16 01:11:31','2025-09-16 01:11:31'),
(30,107,136,'Client',41,'Chambeador','chat_107_bocExt1uGBWVHiO0bpsuIoBqNxE3_Ps27DEFdpZhAcozI0IlJVvLn2UM2','2025-09-16 04:04:54','2025-09-16 04:17:29'),
(31,113,84,'Client',46,'Chambeador','chat_113_JfREDCu0MhgsJCF7dezcZAc6fkU2_eTaMlGgWVoak3CXuUNUHAevXWVM2','2025-09-16 12:40:21','2025-09-16 12:40:35'),
(32,116,46,'Client',84,'Chambeador','chat_116_eTaMlGgWVoak3CXuUNUHAevXWVM2_JfREDCu0MhgsJCF7dezcZAc6fkU2','2025-09-17 04:56:44','2025-09-17 05:04:36'),
(33,121,49,'Client',84,'Chambeador','chat_121_2PqcjE3oykWtVPdKCU9ZUYpA0yr1_JfREDCu0MhgsJCF7dezcZAc6fkU2','2025-09-18 18:49:51','2025-09-18 18:49:51'),
(34,127,135,'Client',84,'Chambeador','chat_127_hSBrqstY49QipUpxk9cfdNp67C73_JfREDCu0MhgsJCF7dezcZAc6fkU2','2025-09-18 23:51:39','2025-09-19 17:00:34'),
(35,127,135,'Client',49,'Chambeador','chat_127_hSBrqstY49QipUpxk9cfdNp67C73_2PqcjE3oykWtVPdKCU9ZUYpA0yr1','2025-09-18 23:52:53','2025-09-18 23:53:00'),
(36,47,57,'Client',57,'Chambeador','chat_47_W7IE6M18rGhVgNQaWlPnxVKypDq1_W7IE6M18rGhVgNQaWlPnxVKypDq1','2025-09-21 03:26:59','2025-09-21 03:26:59'),
(37,123,84,'Client',46,'Chambeador','chat_123_JfREDCu0MhgsJCF7dezcZAc6fkU2_eTaMlGgWVoak3CXuUNUHAevXWVM2','2025-09-23 02:08:16','2025-09-23 02:08:16'),
(38,89,69,'Client',70,'Chambeador','chat_89_psLu0VroyLcEMP1q6EfH5VhU4A83_gJP4m0NfJIT15DDuaK9vPINz9Eq1','2025-09-23 03:12:15','2025-09-23 03:12:15'),
(39,131,57,'Client',84,'Chambeador','chat_131_W7IE6M18rGhVgNQaWlPnxVKypDq1_JfREDCu0MhgsJCF7dezcZAc6fkU2','2025-09-23 11:37:58','2025-09-23 11:37:58'),
(40,143,46,'Client',84,'Chambeador','chat_143_eTaMlGgWVoak3CXuUNUHAevXWVM2_JfREDCu0MhgsJCF7dezcZAc6fkU2','2025-09-23 20:38:02','2025-09-23 20:38:25'),
(41,151,144,'Client',84,'Chambeador','chat_151_Tke15qGA49eJDkajJhEdvuf53Wv1_JfREDCu0MhgsJCF7dezcZAc6fkU2','2025-09-25 15:21:30','2025-09-25 15:21:30'),
(42,152,144,'Client',135,'Chambeador','chat_152_Tke15qGA49eJDkajJhEdvuf53Wv1_hSBrqstY49QipUpxk9cfdNp67C73','2025-09-25 17:17:52','2025-09-25 17:17:52');
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES
(1,1,'Dhanmondi',NULL,NULL),
(2,1,'Bannai',NULL,NULL),
(4,2,'Zero Point',NULL,NULL),
(5,3,'Tomchombridge',NULL,NULL),
(6,3,'Cantonment',NULL,NULL),
(7,4,'Acton',NULL,NULL),
(8,4,'Alamo',NULL,NULL),
(9,5,'Albin',NULL,NULL),
(10,6,'Bartow',NULL,NULL),
(11,7,'Oban',NULL,NULL),
(12,8,'Holywood',NULL,NULL),
(13,9,'Ely',NULL,NULL),
(14,1,'Tejgaon','2024-06-07 06:12:00','2024-06-07 06:14:19');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_logos`
--

DROP TABLE IF EXISTS `client_logos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `client_logos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_logos`
--

LOCK TABLES `client_logos` WRITE;
/*!40000 ALTER TABLE `client_logos` DISABLE KEYS */;
INSERT INTO `client_logos` VALUES
(1,'Ovita','uploads_demo/client-logo/1.png','2022-12-04 17:05:33','2025-01-13 06:31:55'),
(2,'Vigon','uploads_demo/client-logo/2.png','2022-12-04 17:05:33','2025-01-13 06:31:55'),
(3,'Betribe','uploads_demo/client-logo/3.png','2022-12-04 17:05:33','2025-01-13 06:31:55'),
(4,'Parsit','uploads_demo/client-logo/4.png','2022-12-04 17:05:33','2025-01-13 06:31:55'),
(5,'Karika','uploads/client_logo/1736769716IbQJzw0Mp8.jpg','2022-12-04 17:05:33','2025-01-13 06:31:55'),
(6,'d',NULL,'2025-01-13 05:41:26','2025-01-13 06:31:55');
/*!40000 ALTER TABLE `client_logos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES
(1,'Aasif Ahmed','aasifdev5@gmail.com','8878326802',NULL,'2025-10-16 03:45:38','2025-10-16 04:03:05');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` bigint(20) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES
(1,2,NULL,'fgdg','hrnatrajinfotech@gmail.com','dfss','2025-02-13 21:17:35','2025-02-13 21:17:35'),
(2,3,1,'fdgd','hrnatrajinfotech@gmail.com','xcvxvc','2025-02-13 21:31:38','2025-02-13 21:31:38'),
(3,3,11,'wow','aasifdev5@gmail.com','sfsdf','2025-02-13 21:32:41','2025-02-13 21:32:41');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_us` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_us_issue_id` bigint(20) unsigned DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us_issues`
--

DROP TABLE IF EXISTS `contact_us_issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_us_issues` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active, 0=deactivated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact_us_issues_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us_issues`
--

LOCK TABLES `contact_us_issues` WRITE;
/*!40000 ALTER TABLE `contact_us_issues` DISABLE KEYS */;
INSERT INTO `contact_us_issues` VALUES
(3,'7c57e841-fdcb-401f-aaf9-c64b31bd1e3c','Withdraw',1,'2024-03-09 23:39:51','2024-03-09 23:39:51'),
(4,'1d2a6c9d-d2f8-494a-98a3-53833530945e','Refund',1,'2024-03-09 23:40:12','2024-03-09 23:40:12');
/*!40000 ALTER TABLE `contact_us_issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversation_sessions`
--

DROP TABLE IF EXISTS `conversation_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `conversation_sessions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `flow_type` enum('taxi','delivery') DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `missing_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`missing_data`)),
  `trip_id` bigint(20) unsigned DEFAULT NULL,
  `last_message_at` timestamp NULL DEFAULT NULL,
  `escalated_to_human` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversation_sessions`
--

LOCK TABLES `conversation_sessions` WRITE;
/*!40000 ALTER TABLE `conversation_sessions` DISABLE KEYS */;
INSERT INTO `conversation_sessions` VALUES
(1,14,'delivery','es','SEARCHING_DRIVER',NULL,8,NULL,0,'2026-03-24 20:47:21','2026-04-09 19:10:07'),
(2,11,NULL,'es','ASK_PICKUP',NULL,NULL,NULL,0,'2026-04-08 10:16:16','2026-04-10 15:24:37'),
(3,34,'delivery','es','COMPLETED',NULL,NULL,NULL,0,'2026-04-14 20:59:20','2026-05-13 00:05:37'),
(4,15,NULL,'es','ASK_VEHICLE_TYPE',NULL,NULL,NULL,0,'2026-04-14 21:28:53','2026-05-05 00:24:01'),
(5,35,'delivery','es','SHOW_PRICE',NULL,162,NULL,0,'2026-04-15 17:50:26','2026-05-18 21:28:30'),
(6,36,NULL,'es','ASK_PICKUP',NULL,NULL,NULL,0,'2026-04-28 01:03:06','2026-04-29 20:26:17'),
(7,37,NULL,'es','ASK_PICKUP',NULL,NULL,NULL,0,'2026-04-28 01:46:12','2026-04-30 06:06:06'),
(8,38,NULL,'es','ASK_VEHICLE_TYPE',NULL,NULL,NULL,0,'2026-04-28 01:46:28','2026-05-09 07:24:24'),
(9,39,'delivery','es','SHOW_PRICE',NULL,83,NULL,0,'2026-04-28 01:53:51','2026-04-28 01:55:10'),
(10,40,'delivery','es','ASK_PICKUP',NULL,154,NULL,0,'2026-04-28 02:11:18','2026-05-08 05:50:20'),
(11,41,'delivery','es','SHOW_PRICE',NULL,118,NULL,0,'2026-04-28 02:32:01','2026-04-30 20:50:45'),
(12,43,NULL,'es','ASK_PICKUP',NULL,NULL,NULL,0,'2026-04-28 08:17:14','2026-04-28 08:17:14'),
(13,44,NULL,'es','COMPLETED',NULL,NULL,NULL,0,'2026-04-28 08:41:57','2026-04-28 08:49:35'),
(14,49,NULL,'es','ASK_PICKUP',NULL,NULL,NULL,0,'2026-04-28 22:20:24','2026-04-28 22:20:24'),
(15,51,'delivery','es','ASK_INSTRUCTIONS',NULL,93,NULL,0,'2026-04-29 06:21:48','2026-04-29 06:24:26'),
(16,52,NULL,'es','ASK_PICKUP',NULL,NULL,NULL,0,'2026-04-29 14:01:18','2026-04-29 14:01:18'),
(17,53,'delivery','es','ASK_DESTINATION',NULL,94,NULL,0,'2026-04-29 15:07:57','2026-04-29 15:08:25'),
(18,54,'delivery','es','ASK_DESTINATION',NULL,96,NULL,0,'2026-04-29 20:26:51','2026-04-29 20:30:48'),
(19,55,'delivery','es','SHOW_PRICE',NULL,95,NULL,0,'2026-04-29 20:27:17','2026-04-29 20:30:12'),
(20,58,NULL,'es','COMPLETED',NULL,NULL,NULL,0,'2026-04-29 22:34:34','2026-04-29 22:44:39'),
(21,59,'delivery','es','SHOW_PRICE',NULL,101,NULL,0,'2026-04-29 22:35:13','2026-04-29 22:50:02'),
(22,60,'delivery','es','ASK_DESTINATION',NULL,112,NULL,0,'2026-04-29 22:37:20','2026-04-30 01:48:46'),
(23,61,'delivery','es','ASK_INSTRUCTIONS',NULL,106,NULL,0,'2026-04-30 00:35:38','2026-04-30 00:37:41'),
(24,62,NULL,'es','ASK_PICKUP',NULL,NULL,NULL,0,'2026-04-30 01:04:18','2026-04-30 01:04:18'),
(25,65,'delivery','es','SHOW_PRICE',NULL,116,NULL,0,'2026-04-30 03:25:02','2026-04-30 03:29:52'),
(26,67,NULL,'es','ASK_PICKUP',NULL,NULL,NULL,0,'2026-05-02 17:16:36','2026-05-02 17:16:36'),
(27,68,'delivery','es','SHOW_PRICE',NULL,121,NULL,0,'2026-05-04 08:15:24','2026-05-04 08:17:02'),
(28,75,'delivery','es','ASK_PICKUP',NULL,152,NULL,0,'2026-05-07 20:37:14','2026-05-07 20:37:47'),
(29,97,NULL,'es','ASK_SERVICE_TYPE',NULL,NULL,NULL,0,'2026-05-19 19:41:29','2026-05-26 00:09:49'),
(30,99,NULL,'es','ASK_VEHICLE_TYPE',NULL,NULL,NULL,0,'2026-05-19 19:52:18','2026-05-26 21:34:20'),
(31,114,'delivery','es','SHOW_PRICE',NULL,186,NULL,0,'2026-05-21 21:12:33','2026-05-22 18:02:28'),
(32,115,'delivery','es','ASK_PICKUP',NULL,169,NULL,0,'2026-05-21 21:16:51','2026-05-21 21:25:29'),
(33,116,'delivery','es','DRIVER_ASSIGNED',NULL,184,NULL,0,'2026-05-22 04:18:52','2026-05-22 05:45:48'),
(34,118,'delivery','es','ASK_PICKUP',NULL,185,NULL,0,'2026-05-22 08:52:28','2026-05-22 08:53:52'),
(35,119,NULL,'es','ASK_VEHICLE_TYPE',NULL,NULL,NULL,0,'2026-05-22 09:20:29','2026-05-22 09:20:29'),
(36,122,NULL,'es','ASK_VEHICLE_TYPE',NULL,NULL,NULL,0,'2026-05-26 00:06:41','2026-05-26 00:08:06'),
(37,123,NULL,'es','ASK_VEHICLE_TYPE',NULL,NULL,NULL,0,'2026-05-26 03:40:52','2026-05-27 02:07:23'),
(38,124,NULL,'es','ASK_VEHICLE_TYPE',NULL,NULL,NULL,0,'2026-06-03 06:21:50','2026-06-03 06:22:17');
/*!40000 ALTER TABLE `conversation_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `short_name` varchar(10) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `phonecode` varchar(255) NOT NULL,
  `continent` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES
(1,'BD','Bangladesh','','bangladesh','+88','Asia',NULL,NULL),
(2,'USA','United States','','united-states','+1','North America',NULL,NULL),
(3,'UK','United Kingdom','','united-kingdom','+44','Europe',NULL,NULL),
(7,'BO','Bolivia','BO','','+591','South America','2025-01-13 01:28:10','2025-01-13 01:28:10');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `currency_code` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `currency_placement` varchar(255) NOT NULL DEFAULT 'before' COMMENT 'before, after',
  `current_currency` varchar(255) NOT NULL DEFAULT 'no' COMMENT 'on, off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES
(1,'USD','$','before','off',NULL,'2026-05-23 11:33:14'),
(2,'BDT','৳','before','off',NULL,'2026-05-23 11:33:14'),
(3,'INR','₹','before','off',NULL,'2026-05-23 11:33:14'),
(4,'GBP','£','after','off',NULL,'2026-05-23 11:33:14'),
(5,'MXN','$','before','off',NULL,'2026-05-23 11:33:14'),
(6,'SAR','SR','before','off',NULL,'2026-05-23 11:33:14'),
(7,'TRY','₺','after','off',NULL,'2026-05-23 11:33:14'),
(8,'ARS','$','before','off',NULL,'2026-05-23 11:33:14'),
(9,'EUR','€','before','off',NULL,'2026-05-23 11:33:14'),
(11,'BS','Bs','before','on','2024-06-07 04:12:21','2026-05-23 11:33:14'),
(12,'Dinars','Dinar','after','off','2024-06-07 04:20:07','2026-05-23 11:33:14');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driver_availabilities`
--

DROP TABLE IF EXISTS `driver_availabilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `driver_availabilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `driver_id` bigint(20) unsigned NOT NULL,
  `status` enum('offline','online','busy','break') NOT NULL DEFAULT 'offline',
  `current_lat` decimal(10,8) DEFAULT NULL,
  `current_lng` decimal(11,8) DEFAULT NULL,
  `location_address` varchar(255) DEFAULT NULL,
  `last_location_at` timestamp NULL DEFAULT NULL,
  `went_online_at` timestamp NULL DEFAULT NULL,
  `went_offline_at` timestamp NULL DEFAULT NULL,
  `total_online_hours` int(11) NOT NULL DEFAULT 0,
  `vehicle_types` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`vehicle_types`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver_availabilities`
--

LOCK TABLES `driver_availabilities` WRITE;
/*!40000 ALTER TABLE `driver_availabilities` DISABLE KEYS */;
INSERT INTO `driver_availabilities` VALUES
(1,7,'busy',NULL,NULL,NULL,NULL,'2026-04-06 15:54:32','2026-04-07 12:07:24',0,NULL,'2026-04-07 12:07:24','2026-05-18 13:51:54'),
(2,7,'busy',NULL,NULL,NULL,NULL,'2026-04-07 12:36:59','2026-04-07 12:44:46',0,NULL,'2026-04-07 12:44:46','2026-05-18 13:51:54'),
(3,7,'busy',NULL,NULL,NULL,NULL,'2026-04-07 12:44:57','2026-04-07 13:50:47',0,NULL,'2026-04-07 13:50:47','2026-05-18 13:51:54'),
(4,7,'busy',NULL,NULL,NULL,NULL,'2026-04-08 10:42:37','2026-04-08 11:08:55',0,NULL,'2026-04-08 11:08:55','2026-05-18 13:51:54'),
(5,7,'busy',NULL,NULL,NULL,NULL,'2026-04-08 11:09:01','2026-04-08 11:48:31',0,NULL,'2026-04-08 11:48:31','2026-05-18 13:51:54'),
(6,7,'busy',NULL,NULL,NULL,NULL,'2026-04-10 13:32:00','2026-04-15 09:58:29',0,NULL,'2026-04-15 09:58:29','2026-05-18 13:51:54'),
(7,7,'busy',NULL,NULL,NULL,NULL,'2026-04-15 09:59:08','2026-04-15 09:59:37',0,NULL,'2026-04-15 09:59:37','2026-05-18 13:51:54'),
(8,7,'busy',NULL,NULL,NULL,NULL,'2026-04-15 09:59:56','2026-04-15 11:29:19',0,NULL,'2026-04-15 11:29:19','2026-05-18 13:51:54'),
(9,9,'busy',NULL,NULL,NULL,NULL,'2026-04-14 21:14:44','2026-04-15 20:15:42',0,NULL,'2026-04-15 20:15:42','2026-05-05 00:48:25'),
(10,9,'busy',NULL,NULL,NULL,NULL,'2026-04-15 20:15:46','2026-04-20 23:42:21',0,NULL,'2026-04-20 23:42:21','2026-05-05 00:48:25'),
(11,8,'online',NULL,NULL,NULL,NULL,'2026-04-21 18:49:08','2026-04-21 19:59:37',0,NULL,'2026-04-21 19:59:37','2026-04-23 20:20:04'),
(12,8,'online',NULL,NULL,NULL,NULL,'2026-04-21 19:59:43','2026-04-21 20:40:09',0,NULL,'2026-04-21 20:40:09','2026-04-23 20:20:04'),
(13,9,'busy',NULL,NULL,NULL,NULL,'2026-04-20 23:42:28','2026-04-28 00:46:57',0,NULL,'2026-04-28 00:46:57','2026-05-05 00:48:25'),
(14,9,'busy',NULL,NULL,NULL,NULL,'2026-04-28 19:32:01','2026-04-28 19:34:28',0,NULL,'2026-04-28 19:34:28','2026-05-05 00:48:25'),
(15,9,'busy',NULL,NULL,NULL,NULL,'2026-04-29 21:41:19','2026-04-29 22:17:03',0,NULL,'2026-04-29 22:17:03','2026-05-05 00:48:25'),
(16,15,'offline',NULL,NULL,NULL,NULL,'2026-04-29 14:58:30','2026-04-30 02:02:18',0,NULL,'2026-04-30 02:02:18','2026-04-30 02:02:18'),
(17,15,'offline',NULL,NULL,NULL,NULL,'2026-04-30 02:02:28','2026-04-30 02:47:16',0,NULL,'2026-04-30 02:47:16','2026-04-30 02:47:16'),
(18,15,'offline',NULL,NULL,NULL,NULL,'2026-04-30 02:47:30','2026-05-05 05:16:08',0,NULL,'2026-05-05 05:16:08','2026-05-05 05:16:08'),
(19,9,'offline',NULL,NULL,NULL,NULL,'2026-05-06 00:04:39','2026-05-06 04:45:29',0,NULL,'2026-05-06 04:45:29','2026-05-06 04:45:29'),
(20,15,'offline',NULL,NULL,NULL,NULL,'2026-05-05 05:16:17','2026-05-06 16:22:37',0,NULL,'2026-05-06 16:22:37','2026-05-06 16:22:37'),
(21,9,'offline',NULL,NULL,NULL,NULL,'2026-05-06 21:21:25','2026-05-06 21:27:24',0,NULL,'2026-05-06 21:27:24','2026-05-06 21:27:24'),
(22,7,'busy',NULL,NULL,NULL,NULL,'2026-05-03 11:44:19','2026-05-06 21:51:07',0,NULL,'2026-05-06 21:51:07','2026-05-18 13:51:54'),
(23,15,'offline',NULL,NULL,NULL,NULL,'2026-05-06 16:22:41','2026-05-07 19:58:44',0,NULL,'2026-05-07 19:58:44','2026-05-07 19:58:44'),
(24,33,'offline',NULL,NULL,NULL,NULL,'2026-05-11 20:41:47','2026-05-11 20:47:07',0,NULL,'2026-05-11 20:47:07','2026-05-11 20:47:07'),
(25,29,'offline',NULL,NULL,NULL,NULL,'2026-05-12 02:58:21','2026-05-12 03:08:20',0,NULL,'2026-05-12 03:08:20','2026-05-12 03:08:20'),
(26,33,'offline',NULL,NULL,NULL,NULL,'2026-05-11 20:47:12','2026-05-12 04:30:48',0,NULL,'2026-05-12 04:30:48','2026-05-12 04:30:48'),
(27,29,'offline',NULL,NULL,NULL,NULL,'2026-05-12 22:15:42','2026-05-12 22:18:03',0,NULL,'2026-05-12 22:18:03','2026-05-12 22:18:03'),
(28,31,'offline',NULL,NULL,NULL,NULL,'2026-05-08 15:59:43','2026-05-12 23:35:34',0,NULL,'2026-05-12 23:35:34','2026-05-12 23:35:34'),
(29,31,'offline',NULL,NULL,NULL,NULL,'2026-05-12 23:35:37','2026-05-12 23:37:09',0,NULL,'2026-05-12 23:37:09','2026-05-12 23:37:09'),
(30,37,'offline',NULL,NULL,NULL,NULL,'2026-05-17 22:41:58','2026-05-18 00:31:40',0,NULL,'2026-05-18 00:31:40','2026-05-18 00:31:40'),
(31,27,'offline',NULL,NULL,NULL,NULL,'2026-05-18 20:45:46','2026-05-18 20:46:15',0,NULL,'2026-05-18 20:46:15','2026-05-18 20:46:15'),
(32,29,'offline',NULL,NULL,NULL,NULL,'2026-05-18 20:28:50','2026-05-18 21:00:38',0,NULL,'2026-05-18 21:00:38','2026-05-18 21:00:38'),
(33,37,'offline',NULL,NULL,NULL,NULL,'2026-05-19 02:11:14','2026-05-19 02:15:45',0,NULL,'2026-05-19 02:15:45','2026-05-19 02:15:45'),
(34,42,'offline',NULL,NULL,NULL,NULL,'2026-05-19 02:51:31','2026-05-19 03:00:41',0,NULL,'2026-05-19 03:00:41','2026-05-19 03:00:41'),
(35,46,'offline',NULL,NULL,NULL,NULL,'2026-05-19 11:23:16','2026-05-19 19:56:10',0,NULL,'2026-05-19 19:56:10','2026-05-19 19:56:10'),
(36,49,'offline',NULL,NULL,NULL,NULL,'2026-05-19 20:03:05','2026-05-19 20:05:09',0,NULL,'2026-05-19 20:05:09','2026-05-19 20:05:09'),
(37,51,'offline',NULL,NULL,NULL,NULL,'2026-05-19 20:15:13','2026-05-19 20:19:28',0,NULL,'2026-05-19 20:19:28','2026-05-19 20:19:28'),
(38,51,'offline',NULL,NULL,NULL,NULL,'2026-05-19 20:19:34','2026-05-19 20:19:53',0,NULL,'2026-05-19 20:19:53','2026-05-19 20:19:53'),
(39,51,'offline',NULL,NULL,NULL,NULL,'2026-05-19 20:19:57','2026-05-19 21:00:16',0,NULL,'2026-05-19 21:00:16','2026-05-19 21:00:16'),
(40,51,'offline',NULL,NULL,NULL,NULL,'2026-05-19 21:00:47','2026-05-20 00:15:24',0,NULL,'2026-05-20 00:15:24','2026-05-20 00:15:24'),
(41,48,'offline',NULL,NULL,NULL,NULL,'2026-05-19 19:51:52','2026-05-20 00:27:20',0,NULL,'2026-05-20 00:27:20','2026-05-20 00:27:20'),
(42,48,'offline',NULL,NULL,NULL,NULL,'2026-05-20 00:27:25','2026-05-20 00:27:26',0,NULL,'2026-05-20 00:27:26','2026-05-20 00:27:26'),
(43,44,'offline',NULL,NULL,NULL,NULL,'2026-05-19 03:12:57','2026-05-20 18:02:20',0,NULL,'2026-05-20 18:02:20','2026-05-20 18:02:20'),
(44,44,'offline',NULL,NULL,NULL,NULL,'2026-05-20 18:02:24','2026-05-20 18:03:21',0,NULL,'2026-05-20 18:03:21','2026-05-20 18:03:21'),
(45,52,'offline',NULL,NULL,NULL,NULL,'2026-05-20 19:42:55','2026-05-20 19:45:19',0,NULL,'2026-05-20 19:45:19','2026-05-20 19:45:19'),
(46,49,'offline',NULL,NULL,NULL,NULL,'2026-05-20 20:34:56','2026-05-20 20:38:58',0,NULL,'2026-05-20 20:38:58','2026-05-20 20:38:58'),
(47,49,'offline',NULL,NULL,NULL,NULL,'2026-05-20 20:39:50','2026-05-20 20:40:38',0,NULL,'2026-05-20 20:40:38','2026-05-20 20:40:38'),
(48,48,'offline',NULL,NULL,NULL,NULL,'2026-05-20 19:22:30','2026-05-20 20:58:16',0,NULL,'2026-05-20 20:58:16','2026-05-20 20:58:16'),
(49,51,'offline',NULL,NULL,NULL,NULL,'2026-05-20 00:15:28','2026-05-20 21:03:33',0,NULL,'2026-05-20 21:03:33','2026-05-20 21:03:33'),
(50,44,'offline',NULL,NULL,NULL,NULL,'2026-05-20 23:47:48','2026-05-20 23:51:30',0,NULL,'2026-05-20 23:51:30','2026-05-20 23:51:30'),
(51,48,'offline',NULL,NULL,NULL,NULL,'2026-05-20 22:02:57','2026-05-20 23:52:47',0,NULL,'2026-05-20 23:52:47','2026-05-20 23:52:47'),
(52,48,'offline',NULL,NULL,NULL,NULL,'2026-05-21 01:29:33','2026-05-21 05:02:07',0,NULL,'2026-05-21 05:02:07','2026-05-21 05:02:07'),
(53,48,'offline',NULL,NULL,NULL,NULL,'2026-05-21 21:02:23','2026-05-21 21:03:09',0,NULL,'2026-05-21 21:03:09','2026-05-21 21:03:09'),
(54,51,'offline',NULL,NULL,NULL,NULL,'2026-05-21 03:57:31','2026-05-21 21:12:28',0,NULL,'2026-05-21 21:12:28','2026-05-21 21:12:28'),
(55,62,'busy',NULL,NULL,NULL,NULL,'2026-05-21 21:28:28','2026-05-21 21:54:20',0,NULL,'2026-05-21 21:54:20','2026-05-22 03:54:36'),
(56,48,'offline',NULL,NULL,NULL,NULL,'2026-05-21 22:00:08','2026-05-22 00:20:55',0,NULL,'2026-05-22 00:20:55','2026-05-22 00:20:55'),
(57,48,'offline',NULL,NULL,NULL,NULL,'2026-05-22 18:29:24','2026-05-22 20:38:05',0,NULL,'2026-05-22 20:38:05','2026-05-22 20:38:05'),
(58,65,'offline',NULL,NULL,NULL,NULL,'2026-05-22 21:17:58','2026-05-22 21:22:54',0,NULL,'2026-05-22 21:22:54','2026-05-22 21:22:54'),
(59,48,'offline',NULL,NULL,NULL,NULL,'2026-05-22 21:50:31','2026-05-22 23:58:16',0,NULL,'2026-05-22 23:58:16','2026-05-22 23:58:16'),
(60,65,'offline',NULL,NULL,NULL,NULL,'2026-05-22 21:22:58','2026-05-23 04:29:54',0,NULL,'2026-05-23 04:29:54','2026-05-23 04:29:54'),
(61,51,'offline',NULL,NULL,NULL,NULL,'2026-05-22 01:03:22','2026-05-23 08:47:06',0,NULL,'2026-05-23 08:47:06','2026-05-23 08:47:06'),
(62,48,'offline',NULL,NULL,NULL,NULL,'2026-05-23 03:27:32','2026-05-23 09:16:29',0,NULL,'2026-05-23 09:16:29','2026-05-23 09:16:29'),
(63,65,'offline',NULL,NULL,NULL,NULL,'2026-05-23 18:07:25','2026-05-23 21:20:54',0,NULL,'2026-05-23 21:20:54','2026-05-23 21:20:54'),
(64,51,'offline',NULL,NULL,NULL,NULL,'2026-05-23 16:01:18','2026-05-23 22:32:12',0,NULL,'2026-05-23 22:32:12','2026-05-23 22:32:12'),
(65,48,'offline',NULL,NULL,NULL,NULL,'2026-05-23 20:12:18','2026-05-24 00:09:13',0,NULL,'2026-05-24 00:09:13','2026-05-24 00:09:13'),
(66,51,'offline',NULL,NULL,NULL,NULL,'2026-05-24 05:21:52','2026-05-24 08:42:57',0,NULL,'2026-05-24 08:42:57','2026-05-24 08:42:57'),
(67,44,'offline',NULL,NULL,NULL,NULL,'2026-05-21 18:21:23','2026-05-25 06:41:46',0,NULL,'2026-05-25 06:41:46','2026-05-25 06:41:46'),
(68,55,'offline',NULL,NULL,NULL,NULL,'2026-05-20 20:54:36','2026-05-25 20:58:08',0,NULL,'2026-05-25 20:58:08','2026-05-25 20:58:08'),
(69,49,'offline',NULL,NULL,NULL,NULL,'2026-05-26 20:45:36','2026-05-26 20:45:49',0,NULL,'2026-05-26 20:45:49','2026-05-26 20:45:49');
/*!40000 ALTER TABLE `driver_availabilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driver_documents`
--

DROP TABLE IF EXISTS `driver_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `driver_documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `driver_id` bigint(20) unsigned NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  `status` enum('pending','verified','rejected') NOT NULL DEFAULT 'pending',
  `rejection_reason` text DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` bigint(20) unsigned DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_documents_driver_id_foreign` (`driver_id`),
  CONSTRAINT `driver_documents_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver_documents`
--

LOCK TABLES `driver_documents` WRITE;
/*!40000 ALTER TABLE `driver_documents` DISABLE KEYS */;
INSERT INTO `driver_documents` VALUES
(68,42,'id_card_front','uploads/drivers/42/documentos/carnet/frente/1779139099-4UKCBU5g1c.jpg','id_front_1779139098570.jpg',121218,'image/jpeg','verified',NULL,'2026-05-19 02:50:35',1,NULL,'2026-05-19 02:48:19','2026-05-19 02:50:35'),
(69,42,'id_card_back','uploads/drivers/42/documentos/carnet/reverso/1779139099-3VDJDzPXcH.jpg','id_back_1779139098570.jpg',175080,'image/jpeg','verified',NULL,'2026-05-19 02:50:35',1,NULL,'2026-05-19 02:48:19','2026-05-19 02:50:35'),
(70,42,'license_front','uploads/drivers/42/documentos/licencia/frente/1779139099-tvaxDF1gWZ.jpg','license_front_1779139098576.jpg',127429,'image/jpeg','verified',NULL,'2026-05-19 02:50:35',1,NULL,'2026-05-19 02:48:19','2026-05-19 02:50:35'),
(71,42,'license_back','uploads/drivers/42/documentos/licencia/reverso/1779139099-UorODKafhl.jpg','license_back_1779139098576.jpg',171355,'image/jpeg','verified',NULL,'2026-05-19 02:50:35',1,NULL,'2026-05-19 02:48:19','2026-05-19 02:50:35'),
(72,42,'ruat','uploads/drivers/42/documentos/ruat/1779139099-Y7IXMjvEDV.jpg','ruat_1779139098576.jpg',102702,'image/jpeg','verified',NULL,'2026-05-19 02:50:35',1,NULL,'2026-05-19 02:48:19','2026-05-19 02:50:35'),
(73,42,'soat','uploads/drivers/42/documentos/soat/1779139099-Rjo4qi42JJ.jpg','soat_1779139098578.jpg',36558,'image/jpeg','verified',NULL,'2026-05-19 02:50:35',1,NULL,'2026-05-19 02:48:19','2026-05-19 02:50:35'),
(74,42,'insurance_certificate','uploads/drivers/42/documentos/seguro/1779139099-t286v4UDJ5.jpg','insurance_1779139098579.jpg',84165,'image/jpeg','verified',NULL,'2026-05-19 02:50:35',1,NULL,'2026-05-19 02:48:19','2026-05-19 02:50:35'),
(75,44,'id_card_back','uploads/drivers/44/documentos/carnet/reverso/1779141068-0ENxUvBWCN.jpg','scaled_a4fefab3-bd6f-4796-b941-09f625b128e13490390477361410224.jpg',304133,'image/jpeg','verified',NULL,'2026-05-19 19:03:42',1,NULL,'2026-05-19 03:21:08','2026-05-19 19:03:42'),
(76,45,'id_card_front','uploads/drivers/45/documentos/carnet/frente/1779146673-922YDtbkz3.jpg','id_front_1779146667103.jpg',222441,'image/jpeg','verified',NULL,'2026-05-19 19:04:10',1,NULL,'2026-05-19 04:54:33','2026-05-19 19:04:10'),
(77,45,'id_card_back','uploads/drivers/45/documentos/carnet/reverso/1779146673-xKQSB44BUD.jpg','id_back_1779146667109.jpg',334541,'image/jpeg','verified',NULL,'2026-05-19 19:04:10',1,NULL,'2026-05-19 04:54:33','2026-05-19 19:04:10'),
(78,45,'license_front','uploads/drivers/45/documentos/licencia/frente/1779146673-rBgica6Vm2.jpg','license_front_1779146667131.jpg',286410,'image/jpeg','verified',NULL,'2026-05-19 19:04:10',1,NULL,'2026-05-19 04:54:33','2026-05-19 19:04:10'),
(79,45,'license_back','uploads/drivers/45/documentos/licencia/reverso/1779146673-escMFjH7Mm.jpg','license_back_1779146667133.jpg',190185,'image/jpeg','verified',NULL,'2026-05-19 19:04:10',1,NULL,'2026-05-19 04:54:33','2026-05-19 19:04:10'),
(80,45,'ruat','uploads/drivers/45/documentos/ruat/1779146673-VdhuOLF1ra.jpg','ruat_1779146667134.jpg',147483,'image/jpeg','verified',NULL,'2026-05-19 19:04:10',1,NULL,'2026-05-19 04:54:33','2026-05-19 19:04:10'),
(81,45,'soat','uploads/drivers/45/documentos/soat/1779146673-4kiFspoDrG.jpg','soat_1779146667135.jpg',68360,'image/jpeg','verified',NULL,'2026-05-19 19:04:10',1,NULL,'2026-05-19 04:54:33','2026-05-19 19:04:10'),
(82,45,'insurance_certificate','uploads/drivers/45/documentos/seguro/1779146673-RIJHOdZ6E3.jpg','insurance_1779146667137.jpg',139858,'image/jpeg','verified',NULL,'2026-05-19 19:04:10',1,NULL,'2026-05-19 04:54:33','2026-05-19 19:04:10'),
(83,48,'id_card_front','uploads/drivers/48/documentos/carnet/frente/1779200359-POvjLmXsyv.jpg','id_front_1779200350520.jpg',141149,'image/jpeg','verified',NULL,'2026-05-19 19:50:31',1,NULL,'2026-05-19 19:49:19','2026-05-19 19:50:31'),
(84,48,'id_card_back','uploads/drivers/48/documentos/carnet/reverso/1779200359-npi396DhlV.jpg','id_back_1779200350521.jpg',142216,'image/jpeg','verified',NULL,'2026-05-19 19:50:31',1,NULL,'2026-05-19 19:49:19','2026-05-19 19:50:31'),
(85,48,'license_front','uploads/drivers/48/documentos/licencia/frente/1779200359-V2xvUf6qiY.jpg','license_front_1779200350521.jpg',146026,'image/jpeg','verified',NULL,'2026-05-19 19:50:31',1,NULL,'2026-05-19 19:49:19','2026-05-19 19:50:31'),
(86,48,'license_back','uploads/drivers/48/documentos/licencia/reverso/1779200359-uLPEJfDT7I.jpg','license_back_1779200350521.jpg',225174,'image/jpeg','verified',NULL,'2026-05-19 19:50:31',1,NULL,'2026-05-19 19:49:19','2026-05-19 19:50:31'),
(87,48,'ruat','uploads/drivers/48/documentos/ruat/1779200359-9seAXKLHMj.jpg','ruat_1779200350521.jpg',190106,'image/jpeg','verified',NULL,'2026-05-19 19:50:31',1,NULL,'2026-05-19 19:49:19','2026-05-19 19:50:31'),
(88,48,'soat','uploads/drivers/48/documentos/soat/1779200359-JhbbCgWJek.jpg','soat_1779200350521.jpg',143784,'image/jpeg','verified',NULL,'2026-05-19 19:50:31',1,NULL,'2026-05-19 19:49:19','2026-05-19 19:50:31'),
(89,48,'insurance_certificate','uploads/drivers/48/documentos/seguro/1779200359-u3bz5wlPXx.jpg','insurance_1779200350522.jpg',132534,'image/jpeg','verified',NULL,'2026-05-19 19:50:31',1,NULL,'2026-05-19 19:49:19','2026-05-19 19:50:31'),
(90,49,'id_card_front','uploads/drivers/49/documentos/carnet/frente/1779201038-BSknDFcuIZ.jpg','id_front_1779201033758.jpg',238618,'image/jpeg','verified',NULL,'2026-05-19 20:01:32',1,NULL,'2026-05-19 20:00:38','2026-05-19 20:01:32'),
(91,49,'id_card_back','uploads/drivers/49/documentos/carnet/reverso/1779201038-Hm1qw7Q68g.jpg','id_back_1779201033762.jpg',223226,'image/jpeg','verified',NULL,'2026-05-19 20:01:32',1,NULL,'2026-05-19 20:00:38','2026-05-19 20:01:32'),
(92,49,'license_front','uploads/drivers/49/documentos/licencia/frente/1779201038-mp90txbQ73.jpg','license_front_1779201033763.jpg',194087,'image/jpeg','verified',NULL,'2026-05-19 20:01:32',1,NULL,'2026-05-19 20:00:38','2026-05-19 20:01:32'),
(93,49,'license_back','uploads/drivers/49/documentos/licencia/reverso/1779201038-qeQccGOVP6.jpg','license_back_1779201033794.jpg',224532,'image/jpeg','verified',NULL,'2026-05-19 20:01:32',1,NULL,'2026-05-19 20:00:38','2026-05-19 20:01:32'),
(94,49,'ruat','uploads/drivers/49/documentos/ruat/1779201038-g2B3vmyifK.jpg','ruat_1779201033796.jpg',161581,'image/jpeg','verified',NULL,'2026-05-19 20:01:32',1,NULL,'2026-05-19 20:00:38','2026-05-19 20:01:32'),
(95,49,'soat','uploads/drivers/49/documentos/soat/1779201038-skbWRx5urr.jpg','soat_1779201033819.jpg',71185,'image/jpeg','verified',NULL,'2026-05-19 20:01:32',1,NULL,'2026-05-19 20:00:38','2026-05-19 20:01:32'),
(96,49,'insurance_certificate','uploads/drivers/49/documentos/seguro/1779201038-GKYr3TEzVR.jpg','insurance_1779201033819.jpg',87246,'image/jpeg','verified',NULL,'2026-05-19 20:01:32',1,NULL,'2026-05-19 20:00:38','2026-05-19 20:01:32'),
(97,51,'id_card_front','uploads/drivers/51/documentos/carnet/frente/1779201805-dAHQWQ3eXD.jpg','id_front_1779201801141.jpg',217235,'image/jpeg','verified',NULL,'2026-05-19 20:15:01',1,NULL,'2026-05-19 20:13:25','2026-05-19 20:15:01'),
(98,51,'id_card_back','uploads/drivers/51/documentos/carnet/reverso/1779201805-eHe37vsa0T.jpg','id_back_1779201801141.jpg',255882,'image/jpeg','verified',NULL,'2026-05-19 20:15:01',1,NULL,'2026-05-19 20:13:25','2026-05-19 20:15:01'),
(99,51,'license_front','uploads/drivers/51/documentos/licencia/frente/1779201805-OIhA1QJTjj.jpg','license_front_1779201801141.jpg',256192,'image/jpeg','verified',NULL,'2026-05-19 20:15:01',1,NULL,'2026-05-19 20:13:25','2026-05-19 20:15:01'),
(100,51,'license_back','uploads/drivers/51/documentos/licencia/reverso/1779201805-hyWFzcJmnS.jpg','license_back_1779201801142.jpg',247617,'image/jpeg','verified',NULL,'2026-05-19 20:15:01',1,NULL,'2026-05-19 20:13:25','2026-05-19 20:15:01'),
(101,51,'ruat','uploads/drivers/51/documentos/ruat/1779201805-dI1pXKxUSD.jpg','ruat_1779201801142.jpg',265981,'image/jpeg','verified',NULL,'2026-05-19 20:15:01',1,NULL,'2026-05-19 20:13:25','2026-05-19 20:15:01'),
(102,51,'soat','uploads/drivers/51/documentos/soat/1779201805-RQqyeJ8MHb.jpg','soat_1779201801143.jpg',257889,'image/jpeg','verified',NULL,'2026-05-19 20:15:01',1,NULL,'2026-05-19 20:13:25','2026-05-19 20:15:01'),
(103,51,'insurance_certificate','uploads/drivers/51/documentos/seguro/1779201805-bl4UsmagSc.jpg','insurance_1779201801143.jpg',246724,'image/jpeg','verified',NULL,'2026-05-19 20:15:01',1,NULL,'2026-05-19 20:13:25','2026-05-19 20:15:01'),
(104,54,'id_card_front','uploads/drivers/54/documentos/carnet/frente/1779290240-Knw60PLmg9.jpg','id_front_1779290236943.jpg',44549,'image/jpeg','pending',NULL,NULL,NULL,NULL,'2026-05-20 20:47:20','2026-05-20 20:47:20'),
(105,54,'id_card_back','uploads/drivers/54/documentos/carnet/reverso/1779290240-dSYhFImxU9.jpg','id_back_1779290236944.jpg',44438,'image/jpeg','verified',NULL,'2026-05-20 20:49:54',1,NULL,'2026-05-20 20:47:20','2026-05-20 20:49:54'),
(106,54,'license_front','uploads/drivers/54/documentos/licencia/frente/1779290240-IVasSvap9x.jpg','license_front_1779290236945.jpg',44363,'image/jpeg','verified',NULL,'2026-05-20 20:50:24',1,NULL,'2026-05-20 20:47:20','2026-05-20 20:50:24'),
(107,54,'license_back','uploads/drivers/54/documentos/licencia/reverso/1779290240-NP5n7al3Hw.jpg','license_back_1779290236946.jpg',44739,'image/jpeg','verified',NULL,'2026-05-20 20:50:31',1,NULL,'2026-05-20 20:47:20','2026-05-20 20:50:31'),
(108,54,'ruat','uploads/drivers/54/documentos/ruat/1779290240-CBqu6dor7D.jpg','ruat_1779290236946.jpg',44253,'image/jpeg','pending',NULL,NULL,NULL,NULL,'2026-05-20 20:47:20','2026-05-20 20:47:20'),
(109,54,'soat','uploads/drivers/54/documentos/soat/1779290240-RJF36WCOvN.jpg','soat_1779290236946.jpg',44934,'image/jpeg','verified',NULL,'2026-05-20 20:50:38',1,NULL,'2026-05-20 20:47:20','2026-05-20 20:50:38'),
(110,54,'insurance_certificate','uploads/drivers/54/documentos/seguro/1779290240-2bPavxeYDX.jpg','insurance_1779290236947.jpg',44876,'image/jpeg','verified',NULL,'2026-05-20 20:49:47',1,NULL,'2026-05-20 20:47:20','2026-05-20 20:49:47'),
(111,55,'id_card_front','uploads/drivers/55/documentos/carnet/frente/1779290565-ysxKYHU7CE.jpg','id_front_1779290564482.jpg',230065,'image/jpeg','verified',NULL,'2026-05-20 20:53:47',1,NULL,'2026-05-20 20:52:45','2026-05-20 20:53:47'),
(112,55,'id_card_back','uploads/drivers/55/documentos/carnet/reverso/1779290565-FOyCmz9KK8.jpg','id_back_1779290564483.jpg',82389,'image/jpeg','verified',NULL,'2026-05-20 20:53:47',1,NULL,'2026-05-20 20:52:45','2026-05-20 20:53:47'),
(113,55,'license_front','uploads/drivers/55/documentos/licencia/frente/1779290565-WUs35K9Jm0.jpg','license_front_1779290564483.jpg',122677,'image/jpeg','verified',NULL,'2026-05-20 20:53:47',1,NULL,'2026-05-20 20:52:45','2026-05-20 20:53:47'),
(114,55,'license_back','uploads/drivers/55/documentos/licencia/reverso/1779290565-s4lqeBtgGx.jpg','license_back_1779290564484.jpg',81448,'image/jpeg','verified',NULL,'2026-05-20 20:53:47',1,NULL,'2026-05-20 20:52:45','2026-05-20 20:53:47'),
(115,55,'ruat','uploads/drivers/55/documentos/ruat/1779290565-JgQZLJaHmu.jpg','ruat_1779290564484.jpg',154537,'image/jpeg','verified',NULL,'2026-05-20 20:53:47',1,NULL,'2026-05-20 20:52:45','2026-05-20 20:53:47'),
(116,55,'soat','uploads/drivers/55/documentos/soat/1779290565-dPsQojdIPj.jpg','soat_1779290564484.jpg',99306,'image/jpeg','verified',NULL,'2026-05-20 20:53:47',1,NULL,'2026-05-20 20:52:45','2026-05-20 20:53:47'),
(117,55,'insurance_certificate','uploads/drivers/55/documentos/seguro/1779290565-GmuOntmoGu.jpg','insurance_1779290564484.jpg',117764,'image/jpeg','verified',NULL,'2026-05-20 20:53:47',1,NULL,'2026-05-20 20:52:45','2026-05-20 20:53:47'),
(118,57,'id_card_front','uploads/drivers/57/documentos/carnet/frente/1779292214-6Pd0cG0Kf0.jpg','id_front_1779292209103.jpg',137466,'image/jpeg','verified',NULL,'2026-05-22 17:01:16',1,NULL,'2026-05-20 21:20:14','2026-05-22 17:01:16'),
(119,57,'id_card_back','uploads/drivers/57/documentos/carnet/reverso/1779292214-Jbi3JX4YTM.jpg','id_back_1779292209105.jpg',105097,'image/jpeg','verified',NULL,'2026-05-22 17:01:16',1,NULL,'2026-05-20 21:20:14','2026-05-22 17:01:16'),
(120,57,'license_front','uploads/drivers/57/documentos/licencia/frente/1779292214-skwKwnToNx.jpg','license_front_1779292209147.jpg',39077,'image/jpeg','verified',NULL,'2026-05-22 17:01:16',1,NULL,'2026-05-20 21:20:14','2026-05-22 17:01:16'),
(121,57,'license_back','uploads/drivers/57/documentos/licencia/reverso/1779292214-XfPgA412da.jpg','license_back_1779292209148.jpg',115970,'image/jpeg','verified',NULL,'2026-05-22 17:01:16',1,NULL,'2026-05-20 21:20:14','2026-05-22 17:01:16'),
(122,57,'ruat','uploads/drivers/57/documentos/ruat/1779292214-ut05aKugB3.jpg','ruat_1779292209148.jpg',127135,'image/jpeg','verified',NULL,'2026-05-22 17:01:16',1,NULL,'2026-05-20 21:20:14','2026-05-22 17:01:16'),
(123,57,'soat','uploads/drivers/57/documentos/soat/1779292214-ux7qgLbHfC.jpg','soat_1779292209148.jpg',223359,'image/jpeg','verified',NULL,'2026-05-22 17:01:16',1,NULL,'2026-05-20 21:20:14','2026-05-22 17:01:16'),
(124,57,'insurance_certificate','uploads/drivers/57/documentos/seguro/1779292214-hBNerPcWSP.jpg','insurance_1779292209149.jpg',114743,'image/jpeg','verified',NULL,'2026-05-22 17:01:16',1,NULL,'2026-05-20 21:20:14','2026-05-22 17:01:16'),
(125,58,'id_card_front','uploads/drivers/58/documentos/carnet/frente/1779292496-tdNUOGYeEn.jpg','id_front_1779292494447.jpg',27181,'image/jpeg','verified',NULL,'2026-05-20 21:28:34',1,NULL,'2026-05-20 21:24:56','2026-05-20 21:28:34'),
(126,58,'id_card_back','uploads/drivers/58/documentos/carnet/reverso/1779292496-5NRZ6mb5EP.jpg','id_back_1779292494448.jpg',41813,'image/jpeg','verified',NULL,'2026-05-20 21:28:34',1,NULL,'2026-05-20 21:24:56','2026-05-20 21:28:34'),
(127,58,'license_front','uploads/drivers/58/documentos/licencia/frente/1779292496-kkSREdr50V.jpg','license_front_1779292494449.jpg',41813,'image/jpeg','verified',NULL,'2026-05-20 21:28:34',1,NULL,'2026-05-20 21:24:56','2026-05-20 21:28:34'),
(128,58,'license_back','uploads/drivers/58/documentos/licencia/reverso/1779292496-cY3jtd6Ffe.jpg','license_back_1779292494449.jpg',41813,'image/jpeg','verified',NULL,'2026-05-20 21:28:34',1,NULL,'2026-05-20 21:24:56','2026-05-20 21:28:34'),
(129,58,'ruat','uploads/drivers/58/documentos/ruat/1779292496-8W3hKjC2DS.jpg','ruat_1779292494449.jpg',23055,'image/jpeg','verified',NULL,'2026-05-20 21:28:34',1,NULL,'2026-05-20 21:24:56','2026-05-20 21:28:34'),
(130,58,'soat','uploads/drivers/58/documentos/soat/1779292496-X2njbs8PR5.jpg','soat_1779292494450.jpg',41813,'image/jpeg','verified',NULL,'2026-05-20 21:28:34',1,NULL,'2026-05-20 21:24:56','2026-05-20 21:28:34'),
(131,58,'insurance_certificate','uploads/drivers/58/documentos/seguro/1779292496-dsWK4CnTsy.jpg','insurance_1779292494450.jpg',41813,'image/jpeg','verified',NULL,'2026-05-20 21:28:34',1,NULL,'2026-05-20 21:24:56','2026-05-20 21:28:34'),
(132,61,'id_card_front','uploads/drivers/61/documentos/carnet/frente/1779373231-lDgJ4tRjhM.jpg','id_front_1779373227878.jpg',129855,'image/jpeg','pending',NULL,NULL,NULL,NULL,'2026-05-21 19:50:31','2026-05-21 19:50:31'),
(133,61,'id_card_back','uploads/drivers/61/documentos/carnet/reverso/1779373231-3dSFJUHVEm.jpg','id_back_1779373227890.jpg',162386,'image/jpeg','pending',NULL,NULL,NULL,NULL,'2026-05-21 19:50:31','2026-05-21 19:50:31'),
(134,61,'license_front','uploads/drivers/61/documentos/licencia/frente/1779373231-SnfZ09ZPjt.jpg','license_front_1779373227915.jpg',154070,'image/jpeg','pending',NULL,NULL,NULL,NULL,'2026-05-21 19:50:31','2026-05-21 19:50:31'),
(135,61,'license_back','uploads/drivers/61/documentos/licencia/reverso/1779373231-l5g48nlU9b.jpg','license_back_1779373227917.jpg',188482,'image/jpeg','pending',NULL,NULL,NULL,NULL,'2026-05-21 19:50:31','2026-05-21 19:50:31'),
(136,61,'ruat','uploads/drivers/61/documentos/ruat/1779373231-QIOUpZl4JW.jpg','ruat_1779373227919.jpg',150373,'image/jpeg','pending',NULL,NULL,NULL,NULL,'2026-05-21 19:50:31','2026-05-21 19:50:31'),
(137,61,'soat','uploads/drivers/61/documentos/soat/1779373231-vyXjpFx4jy.jpg','soat_1779373227920.jpg',93136,'image/jpeg','pending',NULL,NULL,NULL,NULL,'2026-05-21 19:50:31','2026-05-21 19:50:31'),
(138,61,'insurance_certificate','uploads/drivers/61/documentos/seguro/1779373231-p5WSyAGwNh.jpg','insurance_1779373227922.jpg',138700,'image/jpeg','pending',NULL,NULL,NULL,NULL,'2026-05-21 19:50:31','2026-05-21 19:50:31'),
(146,64,'id_card_front','uploads/drivers/64/documentos/carnet/frente/1779463721-yP8iJyOVab.jpg','id_front_1779463710497.jpg',272907,'image/jpeg','verified',NULL,'2026-05-22 20:59:24',1,NULL,'2026-05-22 20:58:41','2026-05-22 20:59:24'),
(147,64,'id_card_back','uploads/drivers/64/documentos/carnet/reverso/1779463721-OaT84NIpd2.jpg','id_back_1779463710499.jpg',241966,'image/jpeg','verified',NULL,'2026-05-22 20:59:24',1,NULL,'2026-05-22 20:58:41','2026-05-22 20:59:24'),
(148,64,'license_front','uploads/drivers/64/documentos/licencia/frente/1779463721-F8oofRUhEz.jpg','license_front_1779463710500.jpg',259716,'image/jpeg','verified',NULL,'2026-05-22 20:59:24',1,NULL,'2026-05-22 20:58:41','2026-05-22 20:59:24'),
(149,64,'license_back','uploads/drivers/64/documentos/licencia/reverso/1779463721-xIGoaiuitg.jpg','license_back_1779463710500.jpg',236089,'image/jpeg','verified',NULL,'2026-05-22 20:59:24',1,NULL,'2026-05-22 20:58:41','2026-05-22 20:59:24'),
(150,64,'ruat','uploads/drivers/64/documentos/ruat/1779463721-GZ674xoRAX.jpg','ruat_1779463710501.jpg',632739,'image/jpeg','verified',NULL,'2026-05-22 20:59:24',1,NULL,'2026-05-22 20:58:41','2026-05-22 20:59:24'),
(151,64,'soat','uploads/drivers/64/documentos/soat/1779463721-UGlPbJUBVQ.jpg','soat_1779463710501.jpg',595472,'image/jpeg','verified',NULL,'2026-05-22 20:59:24',1,NULL,'2026-05-22 20:58:41','2026-05-22 20:59:24'),
(152,64,'insurance_certificate','uploads/drivers/64/documentos/seguro/1779463721-feZadzjCrl.jpg','insurance_1779463710502.jpg',435000,'image/jpeg','verified',NULL,'2026-05-22 20:59:24',1,NULL,'2026-05-22 20:58:41','2026-05-22 20:59:24');
/*!40000 ALTER TABLE `driver_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driver_requests`
--

DROP TABLE IF EXISTS `driver_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `driver_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `trip_id` bigint(20) unsigned NOT NULL,
  `driver_id` bigint(20) unsigned DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `responded_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_requests_trip_id_foreign` (`trip_id`),
  KEY `driver_requests_driver_id_foreign` (`driver_id`),
  CONSTRAINT `driver_requests_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `driver_requests_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver_requests`
--

LOCK TABLES `driver_requests` WRITE;
/*!40000 ALTER TABLE `driver_requests` DISABLE KEYS */;
INSERT INTO `driver_requests` VALUES
(188,163,42,'rejected','2026-05-19 19:55:08','2026-05-19 19:55:58',NULL,'2026-05-19 19:55:08','2026-05-19 19:55:58'),
(189,163,48,'rejected','2026-05-19 19:55:08',NULL,NULL,'2026-05-19 19:55:08','2026-05-22 05:17:08'),
(190,165,42,'pending','2026-05-20 20:30:43',NULL,NULL,'2026-05-20 20:30:43','2026-05-20 20:30:43'),
(191,165,48,'rejected','2026-05-20 20:30:48','2026-05-20 20:46:05',NULL,'2026-05-20 20:30:48','2026-05-20 20:46:05'),
(192,165,51,'rejected','2026-05-20 20:30:50','2026-05-20 20:31:27',NULL,'2026-05-20 20:30:50','2026-05-20 20:31:27'),
(193,166,42,'rejected','2026-05-20 21:02:15',NULL,NULL,'2026-05-20 21:02:15','2026-05-20 21:06:01'),
(194,166,51,'rejected','2026-05-20 21:02:16','2026-05-20 21:02:44',NULL,'2026-05-20 21:02:16','2026-05-20 21:02:44'),
(195,166,55,'accepted','2026-05-20 21:02:17','2026-05-20 21:06:01',NULL,'2026-05-20 21:02:17','2026-05-20 21:06:01'),
(196,167,61,'rejected','2026-05-21 21:35:02',NULL,NULL,'2026-05-21 21:35:02','2026-05-21 21:36:39'),
(197,174,61,'rejected','2026-05-22 02:46:50',NULL,NULL,'2026-05-22 02:46:50','2026-05-22 03:59:21'),
(198,175,42,'rejected','2026-05-22 02:50:21',NULL,NULL,'2026-05-22 02:50:21','2026-05-22 02:53:50'),
(199,175,51,'rejected','2026-05-22 02:50:21',NULL,NULL,'2026-05-22 02:50:21','2026-05-22 02:53:50'),
(200,175,55,'accepted','2026-05-22 02:50:22','2026-05-22 02:53:50',NULL,'2026-05-22 02:50:22','2026-05-22 02:53:50'),
(201,173,61,'rejected','2026-05-22 02:50:36',NULL,NULL,'2026-05-22 02:50:36','2026-05-22 02:50:41'),
(202,176,61,'rejected','2026-05-22 02:54:51',NULL,NULL,'2026-05-22 02:54:51','2026-05-22 02:55:11'),
(203,177,42,'pending','2026-05-22 02:58:54',NULL,NULL,'2026-05-22 02:58:54','2026-05-22 02:58:54'),
(204,177,51,'rejected','2026-05-22 02:58:55','2026-05-22 02:59:12',NULL,'2026-05-22 02:58:55','2026-05-22 02:59:12'),
(205,178,42,'rejected','2026-05-22 03:03:27',NULL,NULL,'2026-05-22 03:03:27','2026-05-22 03:04:13'),
(206,178,51,'rejected','2026-05-22 03:03:27',NULL,NULL,'2026-05-22 03:03:27','2026-05-22 03:04:13'),
(207,178,55,'accepted','2026-05-22 03:03:28','2026-05-22 03:04:13',NULL,'2026-05-22 03:03:28','2026-05-22 03:04:13'),
(208,179,61,'rejected','2026-05-22 03:53:51',NULL,NULL,'2026-05-22 03:53:51','2026-05-22 03:54:36'),
(209,180,42,'rejected','2026-05-22 04:08:13',NULL,NULL,'2026-05-22 04:08:13','2026-05-22 04:09:09'),
(210,180,51,'rejected','2026-05-22 04:08:13','2026-05-22 04:08:30',NULL,'2026-05-22 04:08:13','2026-05-22 04:08:30'),
(211,180,54,'accepted','2026-05-22 04:08:14','2026-05-22 04:09:09',NULL,'2026-05-22 04:08:14','2026-05-22 04:09:09'),
(212,181,61,'rejected','2026-05-22 05:08:19',NULL,NULL,'2026-05-22 05:08:19','2026-05-22 05:18:15'),
(213,183,61,'accepted','2026-05-22 05:40:22','2026-05-22 05:40:49',NULL,'2026-05-22 05:40:22','2026-05-22 05:40:49'),
(214,184,61,'accepted','2026-05-22 05:45:36','2026-05-22 05:45:48',NULL,'2026-05-22 05:45:36','2026-05-22 05:45:48'),
(215,187,57,'accepted','2026-05-25 15:44:33','2026-05-25 15:46:01',NULL,'2026-05-25 15:44:33','2026-05-25 15:46:01'),
(216,187,51,'rejected','2026-05-25 15:44:33',NULL,NULL,'2026-05-25 15:44:33','2026-05-25 15:46:01'),
(217,188,57,'accepted','2026-05-25 15:44:33','2026-05-25 15:45:20',NULL,'2026-05-25 15:44:33','2026-05-25 15:45:20'),
(218,188,51,'rejected','2026-05-25 15:44:33',NULL,NULL,'2026-05-25 15:44:33','2026-05-25 15:45:20'),
(219,189,57,'accepted','2026-05-25 15:54:25','2026-05-25 15:55:20',NULL,'2026-05-25 15:54:25','2026-05-25 15:55:20'),
(220,189,51,'rejected','2026-05-25 15:54:25',NULL,NULL,'2026-05-25 15:54:25','2026-05-25 15:55:20'),
(221,190,57,'accepted','2026-05-25 15:54:25','2026-05-25 15:54:35',NULL,'2026-05-25 15:54:25','2026-05-25 15:54:35'),
(222,190,51,'rejected','2026-05-25 15:54:25',NULL,NULL,'2026-05-25 15:54:25','2026-05-25 15:54:35'),
(223,191,57,'rejected','2026-05-25 15:54:25','2026-05-25 15:56:28',NULL,'2026-05-25 15:54:25','2026-05-25 15:56:28'),
(224,191,51,'pending','2026-05-25 15:54:25',NULL,NULL,'2026-05-25 15:54:25','2026-05-25 15:54:25'),
(225,192,57,'accepted','2026-05-26 15:23:13','2026-05-26 15:23:56',NULL,'2026-05-26 15:23:13','2026-05-26 15:23:56'),
(226,192,51,'rejected','2026-05-26 15:23:13',NULL,NULL,'2026-05-26 15:23:13','2026-05-26 15:23:56'),
(227,193,57,'accepted','2026-05-26 15:23:13','2026-05-26 15:23:35',NULL,'2026-05-26 15:23:13','2026-05-26 15:23:35'),
(228,193,51,'rejected','2026-05-26 15:23:13',NULL,NULL,'2026-05-26 15:23:13','2026-05-26 15:23:35');
/*!40000 ALTER TABLE `driver_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `drivers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `is_online` tinyint(1) DEFAULT 0,
  `license_number` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'offline',
  `approval_status` enum('pending','under_review','approved','rejected') DEFAULT 'pending',
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `current_lat` decimal(10,7) DEFAULT NULL,
  `current_long` decimal(10,7) DEFAULT NULL,
  `last_location_update` timestamp NULL DEFAULT NULL,
  `score` double(8,2) NOT NULL DEFAULT 0.00,
  `total_ratings` int(11) NOT NULL DEFAULT 0,
  `penalties` int(11) NOT NULL DEFAULT 0,
  `acceptance_rate` double(8,2) NOT NULL DEFAULT 0.00,
  `cooldown_end` timestamp NULL DEFAULT NULL,
  `online_since` timestamp NULL DEFAULT NULL,
  `utilization_rate` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vehicle_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_vehicle_id` (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES
(42,91,1,NULL,NULL,'available','pending',1,-21.5205706,-64.7304629,'2026-05-19 03:02:20',5.00,0,0,100.00,NULL,'2026-05-19 03:00:44',0.00,'2026-05-19 02:44:47','2026-05-19 03:02:20',NULL),
(43,92,0,NULL,NULL,'offline','pending',0,NULL,NULL,NULL,5.00,0,0,100.00,NULL,NULL,0.00,'2026-05-19 02:55:57','2026-05-19 02:55:57',NULL),
(44,93,0,NULL,'uploads/drivers/44/profile/1779140686-T7Y2Omagc5.jpg','offline','pending',1,-21.5220175,-64.7173343,'2026-05-21 18:21:55',5.00,0,0,100.00,NULL,NULL,0.00,'2026-05-19 03:06:05','2026-05-25 06:41:46',NULL),
(45,94,1,NULL,'uploads/drivers/45/profile/1779314009-edxJOl7Wze.jpg','offline','pending',1,-21.5470439,-64.7011056,'2026-05-19 04:56:17',5.00,0,0,100.00,NULL,'2026-05-19 04:56:17',0.00,'2026-05-19 03:13:13','2026-05-21 03:23:29',NULL),
(46,95,1,NULL,NULL,'available','pending',1,-21.5355687,-64.7124420,'2026-05-20 00:54:35',5.00,0,0,100.00,NULL,'2026-05-20 00:49:21',0.00,'2026-05-19 05:21:47','2026-05-20 00:54:35',NULL),
(47,96,0,NULL,NULL,'offline','pending',0,NULL,NULL,NULL,5.00,0,0,100.00,NULL,NULL,0.00,'2026-05-19 19:38:10','2026-05-19 19:38:10',NULL),
(48,98,1,NULL,'uploads/drivers/48/profile/1779201652-jflIYzT14m.jpg','available','pending',1,-21.5325983,-64.7174700,'2026-05-26 23:05:49',5.00,0,0,100.00,NULL,'2026-05-26 23:05:50',0.00,'2026-05-19 19:42:27','2026-05-26 23:05:50',NULL),
(49,100,0,NULL,NULL,'offline','pending',1,-21.5172037,-64.7367441,'2026-05-26 20:45:36',5.00,0,0,100.00,NULL,NULL,0.00,'2026-05-19 19:53:26','2026-05-26 20:45:49',NULL),
(50,101,0,NULL,NULL,'offline','pending',0,NULL,NULL,NULL,5.00,0,0,100.00,NULL,NULL,0.00,'2026-05-19 20:06:19','2026-05-19 20:06:19',NULL),
(51,102,1,NULL,'uploads/drivers/51/profile/1779204696-LrMA917Yoi.jpg','available','pending',1,-21.5298400,-64.7204467,'2026-05-24 08:42:58',5.00,0,0,100.00,NULL,'2026-05-24 08:42:58',0.00,'2026-05-19 20:06:50','2026-05-24 08:42:58',NULL),
(54,105,1,NULL,NULL,'available','pending',0,-17.8044255,-63.1568545,'2026-05-22 04:14:06',5.00,0,0,100.00,NULL,'2026-05-22 04:03:26',0.00,'2026-05-20 20:44:13','2026-05-22 04:14:06',NULL),
(55,106,1,NULL,NULL,'available','pending',1,-21.5205099,-64.7303706,'2026-05-25 20:58:10',5.00,0,0,100.00,NULL,'2026-05-25 20:58:10',0.00,'2026-05-20 20:47:48','2026-05-25 20:58:10',NULL),
(57,108,1,NULL,NULL,'available','approved',1,NULL,NULL,NULL,5.00,0,0,100.00,NULL,'2026-05-25 15:18:55',0.00,'2026-05-20 21:18:51','2026-05-26 15:24:48',NULL),
(58,109,0,NULL,NULL,'offline','pending',1,NULL,NULL,NULL,5.00,0,0,100.00,NULL,NULL,0.00,'2026-05-20 21:23:15','2026-05-20 21:28:34',NULL),
(59,110,1,NULL,NULL,'available','pending',0,-21.5347655,-64.7486270,'2026-05-21 20:19:59',5.00,0,0,100.00,NULL,'2026-05-21 20:19:27',0.00,'2026-05-21 00:52:09','2026-05-21 20:19:59',NULL),
(60,111,0,NULL,NULL,'offline','pending',0,NULL,NULL,NULL,5.00,0,0,100.00,NULL,NULL,0.00,'2026-05-21 03:01:43','2026-05-21 03:01:43',NULL),
(61,112,1,NULL,NULL,'busy','pending',1,-21.5204317,-64.7306067,'2026-05-21 21:29:28',5.00,0,0,100.00,NULL,'2026-05-21 21:28:22',0.00,'2026-05-21 17:56:26','2026-05-22 05:45:48',NULL),
(62,113,1,NULL,NULL,'available','pending',1,-21.5239324,-64.7433040,'2026-05-21 23:03:29',5.00,0,0,100.00,NULL,'2026-05-21 21:54:24',0.00,'2026-05-21 20:21:51','2026-05-22 03:59:47',NULL),
(64,120,0,NULL,NULL,'offline','approved',1,NULL,NULL,NULL,5.00,0,0,100.00,NULL,NULL,0.00,'2026-05-22 20:55:01','2026-05-22 20:59:24',NULL),
(65,121,1,NULL,NULL,'available','pending',0,-21.5019106,-64.7336923,'2026-05-26 14:33:37',5.00,0,0,100.00,NULL,'2026-05-26 14:33:37',0.00,'2026-05-22 21:08:58','2026-05-26 14:33:37',NULL);
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `faq_questions`
--

DROP TABLE IF EXISTS `faq_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq_questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_questions`
--

LOCK TABLES `faq_questions` WRITE;
/*!40000 ALTER TABLE `faq_questions` DISABLE KEYS */;
INSERT INTO `faq_questions` VALUES
(1,'which I enjoy with my whole heart am alone feel?','Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(2,'which I enjoy with my whole heart am alone feel?','Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(3,'which I enjoy with my whole heart am alone feel?','Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.','2022-12-04 17:05:33','2022-12-04 17:05:33');
/*!40000 ALTER TABLE `faq_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL,
  `iso_code` varchar(255) NOT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `rtl` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `default_language` varchar(255) DEFAULT 'off' COMMENT 'on,off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_language_unique` (`language`),
  UNIQUE KEY `languages_iso_code_unique` (`iso_code`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES
(2,'Spanish','es','<i class=\"flag-icon flag-icon-es\"></i>',0,1,'off','2024-04-03 08:08:17','2026-05-23 11:33:14'),
(3,'Portuguese','pt','<i class=\"flag-icon flag-icon-pt\"></i>',0,1,'off','2024-10-30 05:02:08','2026-05-23 11:33:14'),
(4,'English','gb','<i class=\"flag-icon flag-icon-gb\"></i>',0,1,'on','2024-10-30 05:02:08','2026-05-23 11:33:14'),
(10,'Hindi','in','in',0,1,'off','2025-01-13 02:33:50','2026-05-23 11:33:14');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `conversation_id` bigint(20) unsigned DEFAULT NULL,
  `trip_id` bigint(20) unsigned DEFAULT NULL,
  `sender_type` enum('customer','system','driver','admin') NOT NULL,
  `sender_id` bigint(20) unsigned DEFAULT NULL,
  `content` text NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `status` enum('sent','delivered','read') NOT NULL DEFAULT 'sent',
  `whatsapp_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_conversation_id_foreign` (`conversation_id`),
  KEY `messages_trip_id_foreign` (`trip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2807 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES
(319,27,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-07 09:38:33','2026-03-07 09:38:33'),
(320,27,NULL,'system',0,'Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:38:33','2026-03-07 09:38:33'),
(321,27,NULL,'customer',11,'Please share your destination (Google Maps link OR WhatsApp shared location).','text','sent',NULL,'2026-03-07 09:38:38','2026-03-07 09:38:38'),
(322,27,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:38:38','2026-03-07 09:38:38'),
(323,27,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-07 09:40:15','2026-03-07 09:40:15'),
(324,27,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:40:15','2026-03-07 09:40:15'),
(325,27,NULL,'customer',11,'Yes I need a taxi','text','sent',NULL,'2026-03-07 09:40:33','2026-03-07 09:40:33'),
(326,27,24,'system',0,'Perfect! Where should we pick you up? 📍','text','sent',NULL,'2026-03-07 09:40:33','2026-03-07 09:40:33'),
(327,27,24,'customer',11,'Please share your pickup location (Google Maps link OR WhatsApp shared location).','text','sent',NULL,'2026-03-07 09:40:39','2026-03-07 09:40:39'),
(328,27,24,'system',0,'Please send your pickup location as a Google Maps link or WhatsApp location. 📍\n\nHow to share:\n1. Open Google Maps\n2. Tap your location\n3. Tap Share\n4. Select WhatsApp','text','sent',NULL,'2026-03-07 09:40:39','2026-03-07 09:40:39'),
(329,27,24,'customer',11,'https://maps.app.goo.gl/6Xm7zbTyvhj5T8qu5','text','sent',NULL,'2026-03-07 09:41:04','2026-03-07 09:41:04'),
(330,27,24,'system',0,'Great! Where are we going? 😄','text','sent',NULL,'2026-03-07 09:41:04','2026-03-07 09:41:04'),
(331,27,24,'customer',11,'Thank you for sharing your location. It has been received. Now, please share your destination (Google Maps link OR WhatsApp shared location).','text','sent',NULL,'2026-03-07 09:41:10','2026-03-07 09:41:10'),
(332,27,24,'system',0,'Please send your destination as a Google Maps link or WhatsApp location. 📍\n\nHow to share:\n1. Open Google Maps\n2. Search destination\n3. Tap Share\n4. Select WhatsApp','text','sent',NULL,'2026-03-07 09:41:10','2026-03-07 09:41:10'),
(333,27,24,'customer',11,'https://maps.app.goo.gl/X4hik8p74Wecdt4b6','text','sent',NULL,'2026-03-07 09:41:28','2026-03-07 09:41:28'),
(334,27,24,'system',0,'The service costs Bs 30. Would you like us to assign a driver?','text','sent',NULL,'2026-03-07 09:41:30','2026-03-07 09:41:30'),
(335,27,24,'customer',11,'Thank you for sharing your destination. I will now calculate the cost. Please hold on for a moment.','text','sent',NULL,'2026-03-07 09:41:34','2026-03-07 09:41:34'),
(336,27,24,'system',0,'Please reply Yes to book a driver or No to cancel.','text','sent',NULL,'2026-03-07 09:41:34','2026-03-07 09:41:34'),
(337,27,24,'customer',11,'No problem','text','sent',NULL,'2026-03-07 09:41:44','2026-03-07 09:41:44'),
(338,27,24,'system',0,'Please reply Yes to book a driver or No to cancel.','text','sent',NULL,'2026-03-07 09:41:44','2026-03-07 09:41:44'),
(339,27,24,'customer',11,'The cost for your ride is Bs {{price}}. Would you like me to assign a driver?','text','sent',NULL,'2026-03-07 09:41:50','2026-03-07 09:41:50'),
(340,27,24,'system',0,'Please reply Yes to book a driver or No to cancel.','text','sent',NULL,'2026-03-07 09:41:50','2026-03-07 09:41:50'),
(341,27,24,'customer',11,'Yes','text','sent',NULL,'2026-03-07 09:41:58','2026-03-07 09:41:58'),
(342,27,24,'system',0,'Would you like to send any instructions to the driver? (Type instructions or \'No\')','text','sent',NULL,'2026-03-07 09:41:58','2026-03-07 09:41:58'),
(343,27,24,'customer',11,'Do you have any special instructions for the driver?','text','sent',NULL,'2026-03-07 09:42:03','2026-03-07 09:42:03'),
(344,27,24,'system',0,'Searching for a driver... Please hold on a moment. 🚗','text','sent',NULL,'2026-03-07 09:42:04','2026-03-07 09:42:04'),
(345,28,NULL,'customer',11,'No','text','sent',NULL,'2026-03-07 09:42:44','2026-03-07 09:42:44'),
(346,28,NULL,'system',0,'Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:42:44','2026-03-07 09:42:44'),
(347,28,NULL,'customer',11,'I will now search for a driver. Please hold on for a moment.','text','sent',NULL,'2026-03-07 09:42:50','2026-03-07 09:42:50'),
(348,28,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:42:50','2026-03-07 09:42:50'),
(349,28,NULL,'customer',11,'Okay','text','sent',NULL,'2026-03-07 09:42:56','2026-03-07 09:42:56'),
(350,28,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:42:56','2026-03-07 09:42:56'),
(351,28,NULL,'customer',11,'Your driver has left. I will send you the driver\'s information shortly.','text','sent',NULL,'2026-03-07 09:43:02','2026-03-07 09:43:02'),
(352,28,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:43:02','2026-03-07 09:43:02'),
(353,28,NULL,'customer',11,'Alright','text','sent',NULL,'2026-03-07 09:43:15','2026-03-07 09:43:15'),
(354,28,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:43:15','2026-03-07 09:43:15'),
(355,28,NULL,'customer',11,'Here is your driver\'s information:  \n👤 Name: {{driver_name}}  \n🚗 Vehicle: {{vehicle_details}}  \n\nYour driver is on the way!','text','sent',NULL,'2026-03-07 09:43:21','2026-03-07 09:43:21'),
(356,28,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:43:21','2026-03-07 09:43:21'),
(357,28,NULL,'customer',11,'Okay, thanks','text','sent',NULL,'2026-03-07 09:43:59','2026-03-07 09:43:59'),
(358,28,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:43:59','2026-03-07 09:43:59'),
(359,28,NULL,'customer',11,'You\'re welcome! 🚗 You will receive trip status updates as you go.','text','sent',NULL,'2026-03-07 09:44:04','2026-03-07 09:44:04'),
(360,28,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:44:04','2026-03-07 09:44:04'),
(361,28,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-07 09:55:06','2026-03-07 09:55:06'),
(362,28,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:55:06','2026-03-07 09:55:06'),
(363,28,NULL,'customer',11,'Yes I need a taxi','text','sent',NULL,'2026-03-07 09:55:25','2026-03-07 09:55:25'),
(364,28,25,'system',0,'Perfect! Where should we pick you up? 📍','text','sent',NULL,'2026-03-07 09:55:25','2026-03-07 09:55:25'),
(365,28,25,'customer',11,'https://maps.app.goo.gl/X4hik8p74Wecdt4b6','text','sent',NULL,'2026-03-07 09:55:47','2026-03-07 09:55:47'),
(366,28,25,'system',0,'Great! Where are we going? 😄','text','sent',NULL,'2026-03-07 09:55:47','2026-03-07 09:55:47'),
(367,28,25,'customer',11,'https://maps.app.goo.gl/6Xm7zbTyvhj5T8qu5','text','sent',NULL,'2026-03-07 09:55:58','2026-03-07 09:55:58'),
(368,28,25,'system',0,'The service costs Bs 30. Would you like us to assign a driver?','text','sent',NULL,'2026-03-07 09:56:00','2026-03-07 09:56:00'),
(369,28,25,'customer',11,'Yes','text','sent',NULL,'2026-03-07 09:56:09','2026-03-07 09:56:09'),
(370,28,25,'system',0,'Would you like to send any instructions to the driver? (Type instructions or \'No\')','text','sent',NULL,'2026-03-07 09:56:09','2026-03-07 09:56:09'),
(371,28,25,'customer',11,'Yes we are 3 persons','text','sent',NULL,'2026-03-07 09:56:35','2026-03-07 09:56:35'),
(372,28,25,'system',0,'Searching for a driver... Please hold on a moment. 🚗','text','sent',NULL,'2026-03-07 09:56:37','2026-03-07 09:56:37'),
(373,29,NULL,'customer',11,'Alright','text','sent',NULL,'2026-03-07 09:56:56','2026-03-07 09:56:56'),
(374,29,NULL,'system',0,'Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:56:56','2026-03-07 09:56:56'),
(375,29,NULL,'customer',11,'Ok','text','sent',NULL,'2026-03-07 09:57:14','2026-03-07 09:57:14'),
(376,29,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 09:57:14','2026-03-07 09:57:14'),
(393,2,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-07 10:07:14','2026-03-07 10:07:14'),
(394,2,NULL,'system',0,'Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 10:07:14','2026-03-07 10:07:14'),
(395,2,NULL,'customer',11,'Yes I need a taxi','text','sent',NULL,'2026-03-07 10:07:40','2026-03-07 10:07:40'),
(396,2,27,'system',0,'Perfect! Where should we pick you up? 📍','text','sent',NULL,'2026-03-07 10:07:40','2026-03-07 10:07:40'),
(397,2,27,'customer',11,'https://maps.app.goo.gl/X4hik8p74Wecdt4b6','text','sent',NULL,'2026-03-07 10:07:57','2026-03-07 10:07:57'),
(398,2,27,'system',0,'Great! Where are we going? 😄','text','sent',NULL,'2026-03-07 10:07:57','2026-03-07 10:07:57'),
(399,2,27,'customer',11,'https://maps.app.goo.gl/6Xm7zbTyvhj5T8qu5','text','sent',NULL,'2026-03-07 10:08:09','2026-03-07 10:08:09'),
(400,2,27,'system',0,'The service costs Bs 30. Would you like us to assign a driver?','text','sent',NULL,'2026-03-07 10:08:12','2026-03-07 10:08:12'),
(401,2,27,'customer',11,'Yes','text','sent',NULL,'2026-03-07 10:08:24','2026-03-07 10:08:24'),
(402,2,27,'system',0,'Would you like to send any instructions to the driver? (Type instructions or \'No\')','text','sent',NULL,'2026-03-07 10:08:24','2026-03-07 10:08:24'),
(403,2,27,'customer',11,'No','text','sent',NULL,'2026-03-07 10:08:42','2026-03-07 10:08:42'),
(404,2,27,'system',0,'Searching for a driver... Please hold on a moment. 🚗','text','sent',NULL,'2026-03-07 10:08:45','2026-03-07 10:08:45'),
(405,2,27,'customer',11,'Alright','text','sent',NULL,'2026-03-07 10:09:15','2026-03-07 10:09:15'),
(420,2,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-07 11:11:58','2026-03-07 11:11:58'),
(421,2,NULL,'system',0,'Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 11:11:58','2026-03-07 11:11:58'),
(422,2,NULL,'customer',11,'Yes I need a taxi','text','sent',NULL,'2026-03-07 11:12:07','2026-03-07 11:12:07'),
(423,2,2,'system',0,'Perfect! Where should we pick you up? 📍','text','sent',NULL,'2026-03-07 11:12:07','2026-03-07 11:12:07'),
(424,2,2,'customer',11,'https://maps.app.goo.gl/o1XdWsfnGb7GQhBEA','text','sent',NULL,'2026-03-07 11:12:21','2026-03-07 11:12:21'),
(425,2,2,'system',0,'Great! Where are we going? 😄','text','sent',NULL,'2026-03-07 11:12:21','2026-03-07 11:12:21'),
(426,2,2,'customer',11,'https://maps.app.goo.gl/q38vP3DkzFcwU7Y37','text','sent',NULL,'2026-03-07 11:12:39','2026-03-07 11:12:39'),
(427,2,2,'system',0,'The service costs Bs 30. Would you like us to assign a driver?','text','sent',NULL,'2026-03-07 11:12:42','2026-03-07 11:12:42'),
(428,2,2,'customer',11,'Yes','text','sent',NULL,'2026-03-07 11:12:51','2026-03-07 11:12:51'),
(429,2,2,'system',0,'Would you like to send any instructions to the driver? (Type instructions or \'No\')','text','sent',NULL,'2026-03-07 11:12:51','2026-03-07 11:12:51'),
(430,2,2,'customer',11,'No','text','sent',NULL,'2026-03-07 11:13:04','2026-03-07 11:13:04'),
(431,2,2,'system',0,'Searching for a driver... Please hold on a moment. 🚗','text','sent',NULL,'2026-03-07 11:13:06','2026-03-07 11:13:06'),
(432,2,2,'customer',11,'Alright','text','sent',NULL,'2026-03-07 11:13:48','2026-03-07 11:13:48'),
(433,2,2,'customer',11,'Ok','text','sent',NULL,'2026-03-07 11:19:31','2026-03-07 11:19:31'),
(434,2,2,'customer',11,'Hi','text','sent',NULL,'2026-03-07 11:20:42','2026-03-07 11:20:42'),
(435,2,2,'customer',11,'Hello! Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 11:20:48','2026-03-07 11:20:48'),
(436,2,2,'customer',11,'Yes I need a taxi','text','sent',NULL,'2026-03-07 11:20:56','2026-03-07 11:20:56'),
(437,2,2,'customer',11,'Please share your pickup location (Google Maps link OR WhatsApp shared location).','text','sent',NULL,'2026-03-07 11:21:01','2026-03-07 11:21:01'),
(438,2,2,'customer',11,'https://maps.app.goo.gl/q38vP3DkzFcwU7Y37','text','sent',NULL,'2026-03-07 11:21:27','2026-03-07 11:21:27'),
(439,2,2,'customer',11,'Thank you for sharing your location. It has been received. Now, please share your destination (Google Maps link OR WhatsApp shared location).','text','sent',NULL,'2026-03-07 11:21:33','2026-03-07 11:21:33'),
(440,2,2,'customer',11,'https://maps.app.goo.gl/o1XdWsfnGb7GQhBEA','text','sent',NULL,'2026-03-07 11:27:19','2026-03-07 11:27:19'),
(441,2,2,'customer',11,'Okay','text','sent',NULL,'2026-03-07 11:27:39','2026-03-07 11:27:39'),
(442,3,NULL,'customer',11,'Yes','text','sent',NULL,'2026-03-07 11:30:53','2026-03-07 11:30:53'),
(443,3,NULL,'system',0,'Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 11:30:53','2026-03-07 11:30:53'),
(444,3,NULL,'customer',11,'No','text','sent',NULL,'2026-03-07 11:31:05','2026-03-07 11:31:05'),
(445,3,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 11:31:05','2026-03-07 11:31:05'),
(446,3,NULL,'customer',11,'Okay','text','sent',NULL,'2026-03-07 11:31:14','2026-03-07 11:31:14'),
(447,3,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 11:31:14','2026-03-07 11:31:14'),
(448,3,NULL,'customer',11,'Okay, thanks','text','sent',NULL,'2026-03-07 11:31:23','2026-03-07 11:31:23'),
(449,3,NULL,'system',0,'Please choose: Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-07 11:31:23','2026-03-07 11:31:23'),
(450,3,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-18 05:49:16','2026-03-18 05:49:16'),
(451,3,NULL,'system',0,'Hello! Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-18 05:49:20','2026-03-18 05:49:20'),
(452,3,NULL,'system',0,'Hello! Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-18 05:49:20','2026-03-18 05:49:20'),
(453,3,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-18 05:51:41','2026-03-18 05:51:41'),
(454,3,NULL,'system',0,'Hello! Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-18 05:51:43','2026-03-18 05:51:43'),
(455,3,NULL,'system',0,'Hello! Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-18 05:51:43','2026-03-18 05:51:43'),
(456,3,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-18 05:58:15','2026-03-18 05:58:15'),
(457,3,NULL,'system',0,'Hello! Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-18 05:58:18','2026-03-18 05:58:18'),
(458,3,NULL,'system',0,'Hello! Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-18 05:58:18','2026-03-18 05:58:18'),
(459,3,NULL,'customer',11,'Yes I need a taxi','text','sent',NULL,'2026-03-18 05:58:41','2026-03-18 05:58:41'),
(460,3,3,'system',0,'Perfect! Where should we pick you up? 📍','text','sent',NULL,'2026-03-18 05:58:44','2026-03-18 05:58:44'),
(461,3,3,'system',0,'Perfect! Where should we pick you up? 📍','text','sent',NULL,'2026-03-18 05:58:44','2026-03-18 05:58:44'),
(462,3,3,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-18 05:59:02','2026-03-18 05:59:02'),
(463,3,3,'system',0,'Great! Where are we going? 😄','text','sent',NULL,'2026-03-18 05:59:04','2026-03-18 05:59:04'),
(464,3,3,'system',0,'Great! Where are we going? 😄','text','sent',NULL,'2026-03-18 05:59:04','2026-03-18 05:59:04'),
(465,3,3,'customer',11,'#ATTACHMENT:location#Takliwala Glass House#21.31507389#76.22400741','text','sent',NULL,'2026-03-18 05:59:22','2026-03-18 05:59:22'),
(466,3,3,'system',0,'Got it! Just to confirm, you\'re going from Shanti Furniture and Electronics to Takliwala Glass House. Would you like to send any instructions to the driver?','text','sent',NULL,'2026-03-18 05:59:26','2026-03-18 05:59:26'),
(467,3,3,'system',0,'Got it! Just to confirm, you\'re going from Shanti Furniture and Electronics to Takliwala Glass House. Would you like to send any instructions to the driver?','text','sent',NULL,'2026-03-18 05:59:26','2026-03-18 05:59:26'),
(468,3,3,'customer',11,'Yes','text','sent',NULL,'2026-03-19 11:16:31','2026-03-19 11:16:31'),
(469,3,3,'system',0,'Please provide the instructions you\'d like to send to the driver.','text','sent',NULL,'2026-03-19 11:16:36','2026-03-19 11:16:36'),
(470,3,3,'system',0,'Please provide the instructions you\'d like to send to the driver.','text','sent',NULL,'2026-03-19 11:16:36','2026-03-19 11:16:36'),
(471,3,3,'customer',11,'Yes please','text','sent',NULL,'2026-03-19 11:27:12','2026-03-19 11:27:12'),
(472,3,3,'system',0,'Please provide the instructions you\'d like to send to the driver.','text','sent',NULL,'2026-03-19 11:27:14','2026-03-19 11:27:14'),
(473,3,3,'system',0,'Please provide the instructions you\'d like to send to the driver.','text','sent',NULL,'2026-03-19 11:27:14','2026-03-19 11:27:14'),
(474,3,3,'customer',11,'No I don\'t have any instructions','text','sent',NULL,'2026-03-19 11:27:58','2026-03-19 11:27:58'),
(475,3,3,'system',0,'No problem! The price is Bs. Would you like to book the taxi? ✅','text','sent',NULL,'2026-03-19 11:28:02','2026-03-19 11:28:02'),
(476,3,3,'system',0,'No problem! The price is Bs. Would you like to book the taxi? ✅','text','sent',NULL,'2026-03-19 11:28:02','2026-03-19 11:28:02'),
(477,3,3,'customer',11,'Yes sure','text','sent',NULL,'2026-03-19 11:28:19','2026-03-19 11:28:19'),
(478,3,3,'system',0,'Great! Your taxi is booked. Safe travels! 🚗','text','sent',NULL,'2026-03-19 11:28:21','2026-03-19 11:28:21'),
(479,3,3,'system',0,'Great! Your taxi is booked. Safe travels! 🚗','text','sent',NULL,'2026-03-19 11:28:21','2026-03-19 11:28:21'),
(480,3,3,'customer',11,'Yes, please!','text','sent',NULL,'2026-03-19 11:51:15','2026-03-19 11:51:15'),
(481,3,4,'system',0,'Perfect! Where should we pick you up? 📍','text','sent',NULL,'2026-03-19 11:51:17','2026-03-19 11:51:17'),
(482,3,4,'system',0,'Perfect! Where should we pick you up? 📍','text','sent',NULL,'2026-03-19 11:51:17','2026-03-19 11:51:17'),
(483,1,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-19 12:40:34','2026-03-19 12:40:34'),
(484,1,NULL,'system',0,'Hello! Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-19 12:40:37','2026-03-19 12:40:37'),
(485,1,NULL,'customer',11,'Yes I need a taxi','text','sent',NULL,'2026-03-19 12:40:48','2026-03-19 12:40:48'),
(486,1,5,'system',0,'Perfect! Where should we pick you up? 📍','text','sent',NULL,'2026-03-19 12:40:49','2026-03-19 12:40:49'),
(487,1,5,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-19 12:41:19','2026-03-19 12:41:19'),
(488,1,5,'system',0,'Great! Where are we going? 😄','text','sent',NULL,'2026-03-19 12:41:20','2026-03-19 12:41:20'),
(489,1,5,'customer',11,'#ATTACHMENT:location#Takliwala Glass House#21.31507389#76.22400741','text','sent',NULL,'2026-03-19 12:41:28','2026-03-19 12:41:28'),
(490,1,5,'system',0,'Price shown: Bs 15.39','text','sent',NULL,'2026-03-19 12:41:30','2026-03-19 12:41:30'),
(491,1,5,'customer',11,'Yes','text','sent',NULL,'2026-03-19 12:41:45','2026-03-19 12:41:45'),
(492,1,5,'system',0,'Excellent! Would you like to send any instructions to the driver?','text','sent',NULL,'2026-03-19 12:41:47','2026-03-19 12:41:47'),
(493,1,5,'customer',11,'No','text','sent',NULL,'2026-03-19 12:41:56','2026-03-19 12:41:56'),
(494,1,5,'system',0,'Your taxi is booked! 🚗','text','sent',NULL,'2026-03-19 12:42:00','2026-03-19 12:42:00'),
(495,1,5,'customer',11,'Great','text','sent',NULL,'2026-03-19 12:42:28','2026-03-19 12:42:28'),
(496,1,5,'system',0,'Your taxi is booked! 🚗','text','sent',NULL,'2026-03-19 12:42:31','2026-03-19 12:42:31'),
(497,2,NULL,'customer',14,'Hola','text','sent',NULL,'2026-03-19 13:59:04','2026-03-19 13:59:04'),
(498,2,NULL,'system',0,'Perfect! I\'m ready to book your taxi. 😊 Would you like to send any instructions to the driver?','text','sent',NULL,'2026-03-19 13:59:08','2026-03-19 13:59:08'),
(499,2,NULL,'customer',14,'No','text','sent',NULL,'2026-03-19 13:59:20','2026-03-19 13:59:20'),
(500,2,NULL,'system',0,'Great! Your taxi is booked. Safe travels! 🚗','text','sent',NULL,'2026-03-19 13:59:23','2026-03-19 13:59:23'),
(501,2,NULL,'customer',14,'?','text','sent',NULL,'2026-03-19 13:59:39','2026-03-19 13:59:39'),
(502,2,NULL,'system',0,'Lo siento, parece que hubo un malentendido. ¿Necesitas algo más o quieres confirmar la reserva?','text','sent',NULL,'2026-03-19 13:59:41','2026-03-19 13:59:41'),
(503,2,NULL,'customer',14,'cual reserva?','text','sent',NULL,'2026-03-19 14:00:46','2026-03-19 14:00:46'),
(504,2,NULL,'system',0,'Parece que no se ha confirmado la reserva. ¿Te gustaría reservar un taxi ahora?','text','sent',NULL,'2026-03-19 14:00:48','2026-03-19 14:00:48'),
(505,2,NULL,'customer',14,'si','text','sent',NULL,'2026-03-19 14:01:00','2026-03-19 14:01:00'),
(506,2,6,'system',0,'¡Excelente! ¿Dónde te gustaría que te recojan? 📍','text','sent',NULL,'2026-03-19 14:01:06','2026-03-19 14:01:06'),
(507,2,6,'customer',14,'#ATTACHMENT:location#Shared location#-17.8044386#-63.1567916','text','sent',NULL,'2026-03-19 14:01:31','2026-03-19 14:01:31'),
(508,2,6,'system',0,'¡Genial! ¿A dónde vamos? 😄','text','sent',NULL,'2026-03-19 14:01:33','2026-03-19 14:01:33'),
(509,2,6,'customer',14,'#ATTACHMENT:location#Torre Barcelona#-17.80414296#-63.15668512','text','sent',NULL,'2026-03-19 14:02:40','2026-03-19 14:02:40'),
(510,2,6,'system',0,'Price shown: Bs 15.2','text','sent',NULL,'2026-03-19 14:02:41','2026-03-19 14:02:41'),
(511,1,5,'customer',11,'Hola','text','sent',NULL,'2026-03-20 05:55:20','2026-03-20 05:55:20'),
(512,1,5,'system',0,'¡Hola! ¿Necesitas un Taxi 🚗 o Delivery 🚚?','text','sent',NULL,'2026-03-20 05:55:23','2026-03-20 05:55:23'),
(513,1,5,'customer',11,'Hola','text','sent',NULL,'2026-03-20 06:30:01','2026-03-20 06:30:01'),
(514,1,5,'system',0,'¡Hola! ¿Necesitas un Taxi 🚗 o Delivery 🚚?','text','sent',NULL,'2026-03-20 06:30:04','2026-03-20 06:30:04'),
(515,1,5,'customer',11,'Yes I need a taxi','text','sent',NULL,'2026-03-20 06:30:22','2026-03-20 06:30:22'),
(516,1,5,'system',0,'Perfect! Where should we pick you up? 📍','text','sent',NULL,'2026-03-20 06:30:24','2026-03-20 06:30:24'),
(517,2,6,'customer',14,'Si','text','sent',NULL,'2026-03-20 07:38:59','2026-03-20 07:38:59'),
(518,2,6,'system',0,'¡Excelente! ¿Te gustaría enviar alguna instrucción al conductor?','text','sent',NULL,'2026-03-20 07:39:02','2026-03-20 07:39:02'),
(519,2,6,'customer',14,'No','text','sent',NULL,'2026-03-20 09:37:15','2026-03-20 09:37:15'),
(520,2,6,'system',0,'Tu reserva está confirmada. 🚗','text','sent',NULL,'2026-03-20 09:37:18','2026-03-20 09:37:18'),
(521,1,NULL,'customer',14,'Hola','text','sent',NULL,'2026-03-20 10:49:16','2026-03-20 10:49:16'),
(522,1,NULL,'system',0,'¡Hola! ¿Necesitas un Taxi 🚗 o Delivery 🚚?','text','sent',NULL,'2026-03-20 10:49:18','2026-03-20 10:49:18'),
(523,1,NULL,'customer',14,'delivery','text','sent',NULL,'2026-03-20 10:49:27','2026-03-20 10:49:27'),
(524,1,NULL,'customer',14,'delivery','text','sent',NULL,'2026-03-20 10:49:31','2026-03-20 10:49:31'),
(525,1,NULL,'customer',14,'delivery','text','sent',NULL,'2026-03-20 10:49:33','2026-03-20 10:49:33'),
(526,1,NULL,'customer',14,'delivery','text','sent',NULL,'2026-03-20 10:49:38','2026-03-20 10:49:38'),
(527,1,NULL,'customer',14,'delivery','text','sent',NULL,'2026-03-20 10:50:03','2026-03-20 10:50:03'),
(528,1,NULL,'customer',14,'delivery','text','sent',NULL,'2026-03-20 10:54:27','2026-03-20 10:54:27'),
(529,2,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-20 10:57:31','2026-03-20 10:57:31'),
(530,2,NULL,'system',0,'Hello! Do you need Taxi 🚗 or Delivery 🚚?','text','sent',NULL,'2026-03-20 10:57:33','2026-03-20 10:57:33'),
(531,2,NULL,'customer',11,'Delivery','text','sent',NULL,'2026-03-20 10:58:56','2026-03-20 10:58:56'),
(532,2,NULL,'customer',11,'Delivery','text','sent',NULL,'2026-03-20 10:58:59','2026-03-20 10:58:59'),
(533,2,NULL,'customer',11,'Delivery','text','sent',NULL,'2026-03-20 10:59:03','2026-03-20 10:59:03'),
(534,2,NULL,'customer',11,'Delivery','text','sent',NULL,'2026-03-20 10:59:06','2026-03-20 10:59:06'),
(535,2,NULL,'customer',11,'Delivery','text','sent',NULL,'2026-03-20 10:59:14','2026-03-20 10:59:14'),
(536,2,NULL,'customer',11,'delivery','text','sent',NULL,'2026-03-20 10:59:42','2026-03-20 10:59:42'),
(537,2,NULL,'customer',11,'delivery','text','sent',NULL,'2026-03-20 10:59:45','2026-03-20 10:59:45'),
(538,2,NULL,'customer',11,'delivery','text','sent',NULL,'2026-03-20 10:59:49','2026-03-20 10:59:49'),
(539,2,NULL,'customer',11,'delivery','text','sent',NULL,'2026-03-20 10:59:53','2026-03-20 10:59:53'),
(540,2,NULL,'customer',11,'Delivery','text','sent',NULL,'2026-03-20 10:59:55','2026-03-20 10:59:55'),
(541,2,NULL,'customer',11,'delivery','text','sent',NULL,'2026-03-20 10:59:59','2026-03-20 10:59:59'),
(542,2,NULL,'customer',11,'delivery','text','sent',NULL,'2026-03-20 11:01:11','2026-03-20 11:01:11'),
(543,2,18,'system',0,'Great choice! Where should we pick up your delivery from? 📍','text','sent',NULL,'2026-03-20 11:01:13','2026-03-20 11:01:13'),
(544,2,18,'customer',11,'delivery','text','sent',NULL,'2026-03-20 11:02:19','2026-03-20 11:02:19'),
(545,2,18,'system',0,'Please provide the pickup location for your delivery. You can share a Google Maps link or your current location. 📍','text','sent',NULL,'2026-03-20 11:02:23','2026-03-20 11:02:23'),
(546,2,18,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-20 11:03:11','2026-03-20 11:03:11'),
(547,2,18,'system',0,'Perfect! Where should we deliver it to? 😄','text','sent',NULL,'2026-03-20 11:03:13','2026-03-20 11:03:13'),
(548,2,18,'customer',11,'#ATTACHMENT:location#Takliwala Glass House#21.31507389#76.22400741','text','sent',NULL,'2026-03-20 11:03:30','2026-03-20 11:03:30'),
(549,2,18,'system',0,'Price shown: Bs 2','text','sent',NULL,'2026-03-20 11:03:31','2026-03-20 11:03:31'),
(550,2,18,'customer',11,'Yes','text','sent',NULL,'2026-03-20 11:05:40','2026-03-20 11:05:40'),
(551,2,18,'system',0,'Excellent! Would you like to send any instructions to the driver?','text','sent',NULL,'2026-03-20 11:05:42','2026-03-20 11:05:42'),
(552,1,NULL,'customer',14,'Hola','text','sent',NULL,'2026-03-20 11:05:54','2026-03-20 11:05:54'),
(553,1,NULL,'system',0,'¡Hola! ¿Necesitas Taxi 🚗 o Delivery 🚚?','text','sent',NULL,'2026-03-20 11:05:56','2026-03-20 11:05:56'),
(554,1,NULL,'customer',14,'Delivery','text','sent',NULL,'2026-03-20 11:06:03','2026-03-20 11:06:03'),
(555,1,19,'system',0,'¡Perfecto! ¿Dónde te recogemos? 📍','text','sent',NULL,'2026-03-20 11:06:05','2026-03-20 11:06:05'),
(556,2,18,'customer',11,'Yes it\'s refrigerator','text','sent',NULL,'2026-03-20 11:06:06','2026-03-20 11:06:06'),
(557,2,18,'system',0,'Your delivery is confirmed! A refrigerator will be picked up from Shanti Furniture and Electronics and delivered to Takliwala Glass House. 🚚','text','sent',NULL,'2026-03-20 11:06:10','2026-03-20 11:06:10'),
(558,1,19,'customer',14,'Cuarto anillo radial 10','text','sent',NULL,'2026-03-20 11:06:20','2026-03-20 11:06:20'),
(559,1,19,'system',0,'¡Excelente! ¿A dónde vamos? 😄','text','sent',NULL,'2026-03-20 11:06:23','2026-03-20 11:06:23'),
(560,1,19,'customer',14,'Las brisas','text','sent',NULL,'2026-03-20 11:06:40','2026-03-20 11:06:40'),
(561,1,19,'system',0,'¡Genial! Déjame calcular el costo para ti. Un momento por favor.','text','sent',NULL,'2026-03-20 11:06:43','2026-03-20 11:06:43'),
(562,2,18,'customer',11,'Delivery','text','sent',NULL,'2026-03-20 11:54:35','2026-03-20 11:54:35'),
(563,2,18,'system',0,'Your delivery is confirmed! A refrigerator will be picked up from Shanti Furniture and Electronics and delivered to Takliwala Glass House. 🚚','text','sent',NULL,'2026-03-20 11:54:40','2026-03-20 11:54:40'),
(564,2,18,'customer',11,'Thank you','text','sent',NULL,'2026-03-20 21:43:59','2026-03-20 21:43:59'),
(565,2,18,'system',0,'You\'re welcome! If you need anything else, feel free to ask. 😊','text','sent',NULL,'2026-03-20 21:44:02','2026-03-20 21:44:02'),
(566,1,19,'customer',14,'?','text','sent',NULL,'2026-03-20 23:14:45','2026-03-20 23:14:45'),
(567,1,19,'system',0,'¿Puedes por favor enviar un link de Google Maps o compartir la ubicación de \'Las Brisas\'? Así puedo ayudarte mejor. 📍','text','sent',NULL,'2026-03-20 23:14:48','2026-03-20 23:14:48'),
(568,3,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-22 18:10:41','2026-03-22 18:10:41'),
(569,3,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-22 18:10:44','2026-03-22 18:10:44'),
(570,3,NULL,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-22 18:11:04','2026-03-22 18:11:04'),
(571,3,20,'system',0,'Great! Where should we deliver your package? 📦','text','sent',NULL,'2026-03-22 18:11:07','2026-03-22 18:11:07'),
(572,3,20,'customer',11,'#ATTACHMENT:location#Takliwala Glass House#21.31507389#76.22400741','text','sent',NULL,'2026-03-22 18:11:34','2026-03-22 18:11:34'),
(573,3,20,'system',0,'Price shown: Bs 2','text','sent',NULL,'2026-03-22 18:11:35','2026-03-22 18:11:35'),
(574,3,20,'customer',11,'Yes','text','sent',NULL,'2026-03-22 18:11:59','2026-03-22 18:11:59'),
(575,3,20,'system',0,'Excellent! Would you like to send any instructions to the courier?','text','sent',NULL,'2026-03-22 18:12:01','2026-03-22 18:12:01'),
(576,3,20,'customer',11,'Yes, please! It\' refrigerator','text','sent',NULL,'2026-03-22 18:12:19','2026-03-22 18:12:19'),
(577,3,20,'system',0,'Got it! Your package is a refrigerator. Let me confirm your booking now.','text','sent',NULL,'2026-03-22 18:12:22','2026-03-22 18:12:22'),
(578,3,20,'customer',11,'Alright','text','sent',NULL,'2026-03-22 18:12:52','2026-03-22 18:12:52'),
(579,3,20,'system',0,'Your booking has been confirmed! 🚚 The courier will handle your refrigerator with care. If you need anything else, just let me know!','text','sent',NULL,'2026-03-22 18:12:54','2026-03-22 18:12:54'),
(580,3,20,'customer',11,'Hi','text','sent',NULL,'2026-03-22 18:17:59','2026-03-22 18:17:59'),
(581,3,20,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-22 18:18:02','2026-03-22 18:18:02'),
(582,3,20,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-22 18:18:18','2026-03-22 18:18:18'),
(583,3,20,'system',0,'Great! Where should we deliver your package? 📦','text','sent',NULL,'2026-03-22 18:18:20','2026-03-22 18:18:20'),
(584,3,20,'customer',11,'#ATTACHMENT:location#Shaniya Std Pco#21.3148206#76.22400163','text','sent',NULL,'2026-03-22 18:18:39','2026-03-22 18:18:39'),
(585,3,20,'system',0,'Perfect! Let me calculate the delivery cost. One moment please.','text','sent',NULL,'2026-03-22 18:18:42','2026-03-22 18:18:42'),
(586,3,20,'customer',11,'No problem','text','sent',NULL,'2026-03-22 18:18:57','2026-03-22 18:18:57'),
(587,3,20,'system',0,'Let me calculate the cost for you. One moment please.','text','sent',NULL,'2026-03-22 18:18:58','2026-03-22 18:18:58'),
(588,3,20,'customer',11,'Okay','text','sent',NULL,'2026-03-22 18:19:34','2026-03-22 18:19:34'),
(589,3,20,'system',0,'I appreciate your patience! Let me finalize the details for you.','text','sent',NULL,'2026-03-22 18:19:36','2026-03-22 18:19:36'),
(590,3,20,'customer',11,'Great 👍','text','sent',NULL,'2026-03-22 18:19:47','2026-03-22 18:19:47'),
(591,3,20,'system',0,'Excellent! Would you like to send any instructions to the courier?','text','sent',NULL,'2026-03-22 18:19:48','2026-03-22 18:19:48'),
(592,3,20,'customer',11,'Yes it\'s refrigerator','text','sent',NULL,'2026-03-22 18:20:01','2026-03-22 18:20:01'),
(593,3,20,'system',0,'Got it! So, you want to send a refrigerator. Just to confirm, would you like me to book the delivery with these details?','text','sent',NULL,'2026-03-22 18:20:03','2026-03-22 18:20:03'),
(594,3,20,'customer',11,'Yes','text','sent',NULL,'2026-03-22 18:20:12','2026-03-22 18:20:12'),
(595,3,20,'system',0,'Your delivery is confirmed! 🚚 Would you like to provide any special instructions for the courier?','text','sent',NULL,'2026-03-22 18:20:14','2026-03-22 18:20:14'),
(596,3,20,'customer',11,'No','text','sent',NULL,'2026-03-22 18:20:24','2026-03-22 18:20:24'),
(597,3,20,'system',0,'Your delivery is all set! The courier will be on the way shortly. 📦','text','sent',NULL,'2026-03-22 18:20:25','2026-03-22 18:20:25'),
(598,4,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-22 18:21:42','2026-03-22 18:21:42'),
(599,4,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-22 18:21:43','2026-03-22 18:21:43'),
(600,4,NULL,'customer',11,'#ATTACHMENT:location#S-Mart Super Bazar#21.31459814#76.22332804','text','sent',NULL,'2026-03-22 18:22:12','2026-03-22 18:22:12'),
(601,4,21,'system',0,'Great! Where should we deliver your package? 📦','text','sent',NULL,'2026-03-22 18:22:15','2026-03-22 18:22:15'),
(602,4,21,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-22 18:22:30','2026-03-22 18:22:30'),
(603,4,21,'system',0,'Price shown: Bs 2','text','sent',NULL,'2026-03-22 18:22:31','2026-03-22 18:22:31'),
(604,4,21,'customer',11,'Yes','text','sent',NULL,'2026-03-22 18:22:53','2026-03-22 18:22:53'),
(605,4,21,'system',0,'Excellent! Would you like to send any instructions to the courier?','text','sent',NULL,'2026-03-22 18:22:55','2026-03-22 18:22:55'),
(606,4,21,'customer',11,'No','text','sent',NULL,'2026-03-22 18:23:04','2026-03-22 18:23:04'),
(607,4,21,'system',0,'Your delivery has been booked successfully! 🚚','text','sent',NULL,'2026-03-22 18:23:05','2026-03-22 18:23:05'),
(608,1,19,'customer',14,'Hola','text','sent',NULL,'2026-03-23 00:39:58','2026-03-23 00:39:58'),
(609,1,19,'system',0,'¡Hola! ¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 00:40:02','2026-03-23 00:40:02'),
(610,1,19,'customer',14,'Avenida radial','text','sent',NULL,'2026-03-23 00:40:23','2026-03-23 00:40:23'),
(611,1,19,'system',0,'Price shown: Bs 30','text','sent',NULL,'2026-03-23 00:40:25','2026-03-23 00:40:25'),
(612,4,21,'customer',11,'Hola','text','sent',NULL,'2026-03-23 07:26:54','2026-03-23 07:26:54'),
(613,4,21,'system',0,'Courier assigned! ✅\nName: Driver 6704\nVehicle: car\nPlate: 4567-ABCD\nPhone: 918817016704\n\nOn the way! 🚚','text','sent',NULL,'2026-03-23 07:26:54','2026-03-23 07:26:54'),
(614,4,21,'customer',11,'Hi','text','sent',NULL,'2026-03-23 07:27:16','2026-03-23 07:27:16'),
(615,4,21,'system',0,'Courier assigned! ✅\nName: Driver 6704\nVehicle: car\nPlate: 4567-ABCD\nPhone: 918817016704\n\nOn the way! 🚚','text','sent',NULL,'2026-03-23 07:27:16','2026-03-23 07:27:16'),
(616,4,21,'customer',11,'Hola','text','sent',NULL,'2026-03-23 08:18:11','2026-03-23 08:18:11'),
(617,4,21,'system',0,'Courier assigned! ✅\nName: Driver 6704\nVehicle: car\nPlate: 4567-ABCD\nPhone: 918817016704\nPrice: Bs 0\n\nOn the way! 🚚','text','sent',NULL,'2026-03-23 08:18:11','2026-03-23 08:18:11'),
(618,4,21,'customer',11,'Hi','text','sent',NULL,'2026-03-23 08:18:23','2026-03-23 08:18:23'),
(619,4,21,'system',0,'Courier assigned! ✅\nName: Driver 6704\nVehicle: car\nPlate: 4567-ABCD\nPhone: 918817016704\nPrice: Bs 0\n\nOn the way! 🚚','text','sent',NULL,'2026-03-23 08:18:23','2026-03-23 08:18:23'),
(620,1,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-23 08:21:15','2026-03-23 08:21:15'),
(621,1,NULL,'system',0,'¡Hola! ¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 08:21:17','2026-03-23 08:21:17'),
(622,1,NULL,'customer',11,'#ATTACHMENT:location#Master Furniture and Electronics#21.3132688#76.22018096','text','sent',NULL,'2026-03-23 08:21:57','2026-03-23 08:21:57'),
(623,1,1,'system',0,'¡Excelente! ¿A dónde entregamos tu paquete? 📦','text','sent',NULL,'2026-03-23 08:21:58','2026-03-23 08:21:58'),
(624,1,1,'customer',11,'#ATTACHMENT:location#Takliwala Glass House#21.31507389#76.22400741','text','sent',NULL,'2026-03-23 08:22:14','2026-03-23 08:22:14'),
(625,1,1,'system',0,'Price shown: Bs 15','text','sent',NULL,'2026-03-23 08:22:15','2026-03-23 08:22:15'),
(626,1,1,'customer',11,'si','text','sent',NULL,'2026-03-23 08:23:06','2026-03-23 08:23:06'),
(627,1,1,'system',0,'¡Excelente! ¿Te gustaría enviar alguna instrucción al mensajero?','text','sent',NULL,'2026-03-23 08:23:08','2026-03-23 08:23:08'),
(628,1,1,'customer',11,'Hi','text','sent',NULL,'2026-03-23 08:24:27','2026-03-23 08:24:27'),
(629,1,1,'system',0,'Lo siento, pero solo puedo responder en español. ¿Te gustaría enviar alguna instrucción al mensajero?','text','sent',NULL,'2026-03-23 08:24:29','2026-03-23 08:24:29'),
(630,1,1,'customer',11,'Hola','text','sent',NULL,'2026-03-23 08:42:51','2026-03-23 08:42:51'),
(631,1,1,'system',0,'¡Mensajero asignado! ✅\nNombre: Driver 6704\nVehículo: car\nPlaca: 4567-ABCD\nTeléfono: 918817016704\nPrecio: Bs 0\n\n¡En camino! 🚚','text','sent',NULL,'2026-03-23 08:42:51','2026-03-23 08:42:51'),
(632,1,1,'customer',11,'Hola','text','sent',NULL,'2026-03-23 08:53:52','2026-03-23 08:53:52'),
(633,1,1,'system',0,'¡Mensajero asignado! ✅\nNombre: Driver 6704\nVehículo: car\nPlaca: 4567-ABCD\nTeléfono: 918817016704\nPrecio: Bs 0\n\n¡En camino! 🚚','text','sent',NULL,'2026-03-23 08:53:52','2026-03-23 08:53:52'),
(634,1,1,'customer',11,'Hola','text','sent',NULL,'2026-03-23 08:54:37','2026-03-23 08:54:37'),
(635,1,1,'system',0,'¡Mensajero asignado! ✅\nNombre: Driver 6704\nVehículo: car\nPlaca: 4567-ABCD\nTeléfono: 918817016704\nPrecio: Bs 0\n\n¡En camino! 🚚','text','sent',NULL,'2026-03-23 08:54:38','2026-03-23 08:54:38'),
(636,1,1,'customer',11,'Hola','text','sent',NULL,'2026-03-23 08:55:15','2026-03-23 08:55:15'),
(637,1,1,'system',0,'¡Mensajero asignado! ✅\nNombre: Driver 6704\nVehículo: car\nPlaca: 4567-ABCD\nTeléfono: 918817016704\nPrecio: Bs 0\n\n¡En camino! 🚚','text','sent',NULL,'2026-03-23 08:55:16','2026-03-23 08:55:16'),
(638,1,1,'customer',11,'Hola','text','sent',NULL,'2026-03-23 08:56:13','2026-03-23 08:56:13'),
(639,1,1,'system',0,'¡Mensajero asignado! ✅\nNombre: Driver 6704\nVehículo: car\nPlaca: 4567-ABCD\nTeléfono: 918817016704\nPrecio: Bs 0\n\n¡En camino! 🚚','text','sent',NULL,'2026-03-23 08:56:14','2026-03-23 08:56:14'),
(640,1,1,'customer',11,'Hola','text','sent',NULL,'2026-03-23 08:56:36','2026-03-23 08:56:36'),
(641,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 08:56:36','2026-03-23 08:56:36'),
(642,1,NULL,'customer',11,'#ATTACHMENT:location#Bajaj Madhusudan Bajaj Service Centre#21.31473533#76.22392374','text','sent',NULL,'2026-03-23 08:57:12','2026-03-23 08:57:12'),
(643,1,NULL,'system',0,'¡Excelente! ¿A dónde entregamos tu paquete? 📦','text','sent',NULL,'2026-03-23 08:57:14','2026-03-23 08:57:14'),
(644,1,NULL,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-23 08:57:24','2026-03-23 08:57:24'),
(645,1,2,'system',0,'¡Perfecto! Déjame calcular el costo de entrega. Un momento por favor.','text','sent',NULL,'2026-03-23 08:57:26','2026-03-23 08:57:26'),
(646,1,2,'customer',11,'Si','text','sent',NULL,'2026-03-23 08:58:13','2026-03-23 08:58:13'),
(647,1,2,'system',0,'¡Excelente! ¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-03-23 08:58:16','2026-03-23 08:58:16'),
(648,1,2,'customer',11,'No','text','sent',NULL,'2026-03-23 08:58:24','2026-03-23 08:58:24'),
(649,1,2,'system',0,'¡Listo! Tu entrega ha sido confirmada. 🚚','text','sent',NULL,'2026-03-23 08:58:26','2026-03-23 08:58:26'),
(650,1,2,'customer',11,'Si','text','sent',NULL,'2026-03-23 08:58:40','2026-03-23 08:58:40'),
(651,1,2,'system',0,'¡Genial! Tu entrega ha sido confirmada. 🚚','text','sent',NULL,'2026-03-23 08:58:42','2026-03-23 08:58:42'),
(652,1,2,'customer',11,'Si','text','sent',NULL,'2026-03-23 08:58:54','2026-03-23 08:58:54'),
(653,1,2,'system',0,'¡Genial! Tu entrega ha sido confirmada. 🚚','text','sent',NULL,'2026-03-23 08:58:58','2026-03-23 08:58:58'),
(654,1,2,'customer',11,'#ATTACHMENT:location#Takliwala Glass House#21.31507389#76.22400741','text','sent',NULL,'2026-03-23 09:00:00','2026-03-23 09:00:00'),
(655,1,2,'system',0,'Price shown: Bs 15','text','sent',NULL,'2026-03-23 09:00:02','2026-03-23 09:00:02'),
(656,1,2,'customer',11,'Si','text','sent',NULL,'2026-03-23 09:00:18','2026-03-23 09:00:18'),
(657,1,2,'system',0,'¡Excelente! Tu entrega ha sido confirmada. 🚚','text','sent',NULL,'2026-03-23 09:00:20','2026-03-23 09:00:20'),
(658,1,2,'customer',11,'Great','text','sent',NULL,'2026-03-23 09:00:41','2026-03-23 09:00:41'),
(659,1,2,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 09:00:43','2026-03-23 09:00:43'),
(660,1,2,'customer',11,'Hi','text','sent',NULL,'2026-03-23 09:03:30','2026-03-23 09:03:30'),
(661,1,2,'system',0,'¡Mensajero asignado! ✅\nNombre: Driver 6704\nVehículo: car\nPlaca: 4567-ABCD\nTeléfono: 918817016704\nPrecio: Bs 0\n\n¡En camino! 🚚','text','sent',NULL,'2026-03-23 09:03:30','2026-03-23 09:03:30'),
(662,1,2,'customer',11,'Great','text','sent',NULL,'2026-03-23 09:03:40','2026-03-23 09:03:40'),
(663,1,2,'system',0,'¡Mensajero asignado! ✅\nNombre: Driver 6704\nVehículo: car\nPlaca: 4567-ABCD\nTeléfono: 918817016704\nPrecio: Bs 0\n\n¡En camino! 🚚','text','sent',NULL,'2026-03-23 09:03:40','2026-03-23 09:03:40'),
(664,1,2,'customer',11,'hola','text','sent',NULL,'2026-03-23 09:08:52','2026-03-23 09:08:52'),
(665,1,2,'system',0,'¡Mensajero asignado! ✅\nNombre: Driver 6704\nVehículo: car\nPlaca: 4567-ABCD\nTeléfono: 918817016704\nPrecio: Bs 0\n\n¡En camino! 🚚','text','sent',NULL,'2026-03-23 09:08:52','2026-03-23 09:08:52'),
(666,1,2,'customer',11,'Hola','text','sent',NULL,'2026-03-23 09:11:17','2026-03-23 09:11:17'),
(667,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 09:11:17','2026-03-23 09:11:17'),
(668,1,NULL,'customer',11,'#ATTACHMENT:location#Seva Sadan Higher Secondary School#21.31123199#76.22422401','text','sent',NULL,'2026-03-23 09:12:17','2026-03-23 09:12:17'),
(669,1,NULL,'system',0,'¡Excelente! ¿A dónde entregamos tu paquete? 📦','text','sent',NULL,'2026-03-23 09:12:20','2026-03-23 09:12:20'),
(670,1,NULL,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-23 09:12:37','2026-03-23 09:12:37'),
(671,1,3,'system',0,'¡Perfecto! Déjame calcular el costo de entrega. Un momento por favor.','text','sent',NULL,'2026-03-23 09:12:40','2026-03-23 09:12:40'),
(672,1,3,'customer',11,'si','text','sent',NULL,'2026-03-23 09:14:12','2026-03-23 09:14:12'),
(673,1,3,'system',0,'¡Excelente! ¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-03-23 09:14:15','2026-03-23 09:14:15'),
(674,1,3,'customer',11,'No','text','sent',NULL,'2026-03-23 09:14:23','2026-03-23 09:14:23'),
(675,1,3,'system',0,'¡Gracias! Tu pedido ha sido confirmado y se procesará sin instrucciones adicionales. Te avisaremos cuando el mensajero esté en camino. 🚚','text','sent',NULL,'2026-03-23 09:14:25','2026-03-23 09:14:25'),
(676,1,3,'customer',11,'si','text','sent',NULL,'2026-03-23 09:15:43','2026-03-23 09:15:43'),
(677,1,3,'system',0,'¡Gracias por tu confirmación! Tu pedido ha sido procesado. Te avisaremos cuando el mensajero esté en camino. 🚚','text','sent',NULL,'2026-03-23 09:15:47','2026-03-23 09:15:47'),
(678,2,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-23 09:17:53','2026-03-23 09:17:53'),
(679,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 09:17:54','2026-03-23 09:17:54'),
(680,2,NULL,'customer',11,'#ATTACHMENT:location#Shanwara Masjid#21.31183889#76.22653276','text','sent',NULL,'2026-03-23 09:18:34','2026-03-23 09:18:34'),
(681,2,4,'system',0,'Great! Where should we deliver your package? 📦','text','sent',NULL,'2026-03-23 09:18:35','2026-03-23 09:18:35'),
(682,2,4,'customer',11,'#ATTACHMENT:location#Hakimi Hospital#21.3179032#76.2156013','text','sent',NULL,'2026-03-23 09:19:19','2026-03-23 09:19:19'),
(683,2,4,'system',0,'Price shown: Bs 15','text','sent',NULL,'2026-03-23 09:19:20','2026-03-23 09:19:20'),
(684,2,4,'customer',11,'Yes','text','sent',NULL,'2026-03-23 09:19:41','2026-03-23 09:19:41'),
(685,2,4,'system',0,'Excellent! Would you like to send any instructions to the courier? (Type instructions or \'No\')','text','sent',NULL,'2026-03-23 09:19:43','2026-03-23 09:19:43'),
(686,2,4,'customer',11,'No','text','sent',NULL,'2026-03-23 09:19:49','2026-03-23 09:19:49'),
(687,2,4,'system',0,'Your delivery has been booked successfully! 🚚 Thank you for choosing us. If you have any questions, feel free to ask!','text','sent',NULL,'2026-03-23 09:19:51','2026-03-23 09:19:51'),
(688,2,4,'customer',11,'Ok','text','sent',NULL,'2026-03-23 09:20:48','2026-03-23 09:20:48'),
(689,2,4,'system',0,'If you need any further assistance, just let me know! Have a great day! 😊','text','sent',NULL,'2026-03-23 09:20:50','2026-03-23 09:20:50'),
(690,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 09:31:03','2026-03-23 09:31:03'),
(691,2,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-23 09:31:04','2026-03-23 09:31:04'),
(692,2,NULL,'system',0,'No problem! Where should we pick up your package? 📍','text','sent',NULL,'2026-03-23 09:31:05','2026-03-23 09:31:05'),
(693,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 09:31:53','2026-03-23 09:31:53'),
(694,2,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-23 09:31:54','2026-03-23 09:31:54'),
(695,2,NULL,'system',0,'No problem! Where should we pick up your package? 📍','text','sent',NULL,'2026-03-23 09:31:55','2026-03-23 09:31:55'),
(696,2,NULL,'customer',11,'#ATTACHMENT:location#Bajaj Madhusudan Bajaj Service Centre#21.31473533#76.22392374','text','sent',NULL,'2026-03-23 09:32:42','2026-03-23 09:32:42'),
(697,2,5,'system',0,'Great! Where should we deliver your package? 📦','text','sent',NULL,'2026-03-23 09:32:44','2026-03-23 09:32:44'),
(698,2,5,'customer',11,'#ATTACHMENT:location#S-Mart Super Bazar#21.31459814#76.22332804','text','sent',NULL,'2026-03-23 09:32:51','2026-03-23 09:32:51'),
(699,2,5,'system',0,'Price shown: Bs 15','text','sent',NULL,'2026-03-23 09:32:52','2026-03-23 09:32:52'),
(700,2,5,'customer',11,'Cancel','text','sent',NULL,'2026-03-23 09:33:06','2026-03-23 09:33:06'),
(701,2,NULL,'system',0,'Your delivery has been canceled. If you need anything else, feel free to reach out! ✅','text','sent',NULL,'2026-03-23 09:33:09','2026-03-23 09:33:09'),
(702,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 09:51:00','2026-03-23 09:51:00'),
(703,2,NULL,'customer',11,'Hi','text','sent',NULL,'2026-03-23 09:51:01','2026-03-23 09:51:01'),
(704,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 09:51:03','2026-03-23 09:51:03'),
(705,2,NULL,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-23 09:51:16','2026-03-23 09:51:16'),
(706,2,6,'system',0,'Great! Where should we deliver your package? 📦','text','sent',NULL,'2026-03-23 09:51:18','2026-03-23 09:51:18'),
(707,2,6,'customer',11,'#ATTACHMENT:location#Takliwala Glass House#21.31507389#76.22400741','text','sent',NULL,'2026-03-23 09:51:32','2026-03-23 09:51:32'),
(708,2,6,'system',0,'Price shown: Bs 15','text','sent',NULL,'2026-03-23 09:51:33','2026-03-23 09:51:33'),
(709,2,6,'customer',11,'Yes','text','sent',NULL,'2026-03-23 09:51:47','2026-03-23 09:51:47'),
(710,2,6,'system',0,'Excellent! Would you like to send any instructions to the courier? (Type instructions or \'No\')','text','sent',NULL,'2026-03-23 09:51:48','2026-03-23 09:51:48'),
(711,2,6,'customer',11,'No','text','sent',NULL,'2026-03-23 09:51:53','2026-03-23 09:51:53'),
(712,2,6,'system',0,'Your delivery has been successfully booked! The courier will be on the way shortly. Thank you! 🚚','text','sent',NULL,'2026-03-23 09:51:55','2026-03-23 09:51:55'),
(713,3,NULL,'customer',14,'Hola','text','sent',NULL,'2026-03-23 18:23:59','2026-03-23 18:23:59'),
(714,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 18:24:02','2026-03-23 18:24:02'),
(715,3,NULL,'customer',14,'Aqui','text','sent',NULL,'2026-03-23 18:24:12','2026-03-23 18:24:12'),
(716,3,NULL,'system',0,'Por favor, comparte un enlace de Google Maps o tu ubicación exacta para la recogida. 📍','text','sent',NULL,'2026-03-23 18:24:15','2026-03-23 18:24:15'),
(717,3,NULL,'customer',14,'#ATTACHMENT:location#Shared location#-17.804295#-63.1567651','text','sent',NULL,'2026-03-23 18:25:27','2026-03-23 18:25:27'),
(718,3,7,'system',0,'¡Excelente! ¿A dónde entregamos tu paquete? 📦','text','sent',NULL,'2026-03-23 18:25:30','2026-03-23 18:25:30'),
(719,3,7,'customer',14,'A plaza 24','text','sent',NULL,'2026-03-23 18:27:27','2026-03-23 18:27:27'),
(720,3,7,'system',0,'Price shown: Bs 18','text','sent',NULL,'2026-03-23 18:27:30','2026-03-23 18:27:30'),
(721,3,7,'customer',14,'?','text','sent',NULL,'2026-03-23 18:27:37','2026-03-23 18:27:37'),
(722,3,7,'system',0,'El precio es Bs 18.00. ¿Te gustaría reservar un mensajero?','text','sent',NULL,'2026-03-23 18:27:38','2026-03-23 18:27:38'),
(723,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 20:14:59','2026-03-23 20:14:59'),
(724,2,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-23 20:15:00','2026-03-23 20:15:00'),
(725,2,NULL,'system',0,'No problem! Where should we pick up your package? 📍','text','sent',NULL,'2026-03-23 20:15:04','2026-03-23 20:15:04'),
(726,3,7,'customer',14,'No','text','sent',NULL,'2026-03-23 20:39:39','2026-03-23 20:39:39'),
(727,3,NULL,'system',0,'¡Está bien! Si cambias de opinión o necesitas algo más, aquí estaré. 😊','text','sent',NULL,'2026-03-23 20:39:47','2026-03-23 20:39:47'),
(728,3,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 20:48:24','2026-03-23 20:48:24'),
(729,3,NULL,'customer',14,'Hola','text','sent',NULL,'2026-03-23 20:48:24','2026-03-23 20:48:24'),
(730,3,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 20:48:27','2026-03-23 20:48:27'),
(731,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 20:57:49','2026-03-23 20:57:49'),
(732,2,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-23 20:57:49','2026-03-23 20:57:49'),
(733,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 20:57:51','2026-03-23 20:57:51'),
(734,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 20:59:21','2026-03-23 20:59:21'),
(735,2,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-23 20:59:22','2026-03-23 20:59:22'),
(736,2,NULL,'system',0,'No problem! Where should we pick up your package? 📍','text','sent',NULL,'2026-03-23 20:59:24','2026-03-23 20:59:24'),
(737,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 20:59:36','2026-03-23 20:59:36'),
(738,2,NULL,'customer',11,'hola','text','sent',NULL,'2026-03-23 20:59:37','2026-03-23 20:59:37'),
(739,2,NULL,'system',0,'No problem! Where should we pick up your package? 📍','text','sent',NULL,'2026-03-23 20:59:38','2026-03-23 20:59:38'),
(740,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 20:59:57','2026-03-23 20:59:57'),
(741,2,NULL,'customer',11,'hola','text','sent',NULL,'2026-03-23 20:59:58','2026-03-23 20:59:58'),
(742,2,NULL,'system',0,'No problem! Where should we pick up your package? 📍','text','sent',NULL,'2026-03-23 21:00:00','2026-03-23 21:00:00'),
(743,2,NULL,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 21:03:09','2026-03-23 21:03:09'),
(744,2,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-23 21:03:10','2026-03-23 21:03:10'),
(745,2,NULL,'system',0,'Comparte la ubicación de recogida 📍','text','sent',NULL,'2026-03-23 21:03:10','2026-03-23 21:03:10'),
(746,2,NULL,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-23 21:03:25','2026-03-23 21:03:25'),
(747,2,8,'system',0,'¿Dónde entregamos el paquete? 📦','text','sent',NULL,'2026-03-23 21:03:26','2026-03-23 21:03:26'),
(748,2,8,'customer',11,'Hola','text','sent',NULL,'2026-03-23 21:09:20','2026-03-23 21:09:20'),
(749,2,8,'customer',11,'Hola','text','sent',NULL,'2026-03-23 21:09:21','2026-03-23 21:09:21'),
(750,2,8,'customer',11,'Hola','text','sent',NULL,'2026-03-23 21:09:23','2026-03-23 21:09:23'),
(751,2,8,'customer',11,'Hola','text','sent',NULL,'2026-03-23 21:09:25','2026-03-23 21:09:25'),
(752,2,8,'customer',11,'Hola','text','sent',NULL,'2026-03-23 21:09:34','2026-03-23 21:09:34'),
(753,2,8,'customer',11,'hola','text','sent',NULL,'2026-03-23 21:10:06','2026-03-23 21:10:06'),
(754,2,8,'customer',11,'hola','text','sent',NULL,'2026-03-23 21:10:07','2026-03-23 21:10:07'),
(755,2,8,'customer',11,'hola','text','sent',NULL,'2026-03-23 21:10:08','2026-03-23 21:10:08'),
(756,2,8,'customer',11,'hola','text','sent',NULL,'2026-03-23 21:10:11','2026-03-23 21:10:11'),
(757,2,8,'customer',11,'hola','text','sent',NULL,'2026-03-23 21:10:17','2026-03-23 21:10:17'),
(758,2,8,'customer',11,'Hola','text','sent',NULL,'2026-03-23 21:10:33','2026-03-23 21:10:33'),
(759,2,8,'system',0,'Hello! Welcome to Delivery Avaroa 🚚\n\nWhere should we pick up your package? 📍','text','sent',NULL,'2026-03-23 21:10:36','2026-03-23 21:10:36'),
(760,2,8,'customer',11,'Hola','text','sent',NULL,'2026-03-23 21:11:27','2026-03-23 21:11:27'),
(761,2,8,'system',0,'Por favor envía el destino como link de Google Maps o ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre Google Maps\n2. Busca el destino\n3. Toca Compartir\n4. Selecciona WhatsApp','text','sent',NULL,'2026-03-23 21:11:28','2026-03-23 21:11:28'),
(762,2,8,'customer',11,'#ATTACHMENT:location#Bajaj Madhusudan Bajaj Service Centre#21.31473533#76.22392374','text','sent',NULL,'2026-03-23 21:11:43','2026-03-23 21:11:43'),
(763,2,8,'customer',11,'Hola','text','sent',NULL,'2026-03-23 21:12:15','2026-03-23 21:12:15'),
(764,2,8,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde debemos recoger tu paquete? 📍','text','sent',NULL,'2026-03-23 21:12:17','2026-03-23 21:12:17'),
(765,2,8,'customer',11,'#ATTACHMENT:location#Seva Sadan Higher Secondary School#21.31123199#76.22422401','text','sent',NULL,'2026-03-23 21:12:57','2026-03-23 21:12:57'),
(766,2,8,'system',0,'¡Perfecto! ¿Dónde debemos entregar tu paquete? 📦','text','sent',NULL,'2026-03-23 21:12:59','2026-03-23 21:12:59'),
(767,2,8,'customer',11,'hola','text','sent',NULL,'2026-03-23 21:14:21','2026-03-23 21:14:21'),
(768,2,8,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-03-23 21:14:21','2026-03-23 21:14:21'),
(769,2,8,'customer',11,'Hola','text','sent',NULL,'2026-03-23 21:15:17','2026-03-23 21:15:17'),
(770,2,8,'system',0,'Buscando mensajeros disponibles... 🚚\n\n(Escribe \'cancelar\' para detener)','text','sent',NULL,'2026-03-23 21:15:17','2026-03-23 21:15:17'),
(771,4,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-23 21:43:27','2026-03-23 21:43:27'),
(772,4,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 21:43:27','2026-03-23 21:43:27'),
(773,5,NULL,'customer',11,'#ATTACHMENT:location#Seva Sadan Higher Secondary School#21.31123199#76.22422401','text','sent',NULL,'2026-03-23 21:44:26','2026-03-23 21:44:26'),
(774,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 21:44:26','2026-03-23 21:44:26'),
(775,6,NULL,'customer',11,'#ATTACHMENT:location#Shared location#21.3150095#76.223561','text','sent',NULL,'2026-03-23 21:45:00','2026-03-23 21:45:00'),
(776,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 21:45:00','2026-03-23 21:45:00'),
(777,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 22:00:04','2026-03-23 22:00:04'),
(778,6,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-23 22:00:05','2026-03-23 22:00:05'),
(779,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 22:00:05','2026-03-23 22:00:05'),
(780,6,NULL,'customer',11,'#ATTACHMENT:location#Sadashiv super shop#21.31555917#76.22392628','text','sent',NULL,'2026-03-23 22:00:43','2026-03-23 22:00:43'),
(781,6,9,'system',0,'¡Excelente! ¿A dónde entregamos tu paquete? 📦','text','sent',NULL,'2026-03-23 22:00:43','2026-03-23 22:00:43'),
(782,6,9,'customer',11,'#ATTACHMENT:location#S-Mart Super Bazar#21.31459814#76.22332804','text','sent',NULL,'2026-03-23 22:01:23','2026-03-23 22:01:23'),
(783,6,9,'system',0,'El costo del servicio es: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-03-23 22:01:23','2026-03-23 22:01:23'),
(784,6,9,'customer',11,'Hola','text','sent',NULL,'2026-03-23 22:07:17','2026-03-23 22:07:17'),
(785,6,9,'system',0,'Por favor responde Sí para reservar un mensajero o No para cancelar.','text','sent',NULL,'2026-03-23 22:07:17','2026-03-23 22:07:17'),
(786,6,9,'customer',11,'Si','text','sent',NULL,'2026-03-23 22:07:24','2026-03-23 22:07:24'),
(787,6,9,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-03-23 22:07:24','2026-03-23 22:07:24'),
(788,6,9,'customer',11,'No','text','sent',NULL,'2026-03-23 22:07:37','2026-03-23 22:07:37'),
(789,6,9,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-03-23 22:07:37','2026-03-23 22:07:37'),
(790,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 22:14:06','2026-03-23 22:14:06'),
(791,6,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-23 22:14:07','2026-03-23 22:14:07'),
(792,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 22:14:07','2026-03-23 22:14:07'),
(793,6,NULL,'customer',11,'https://www.google.com/maps?q=-16.4897,-68.1193','text','sent',NULL,'2026-03-23 22:14:22','2026-03-23 22:14:22'),
(794,6,10,'system',0,'Por favor envía la ubicación de destino como link de Google Maps o ubicación de WhatsApp. 📍','text','sent',NULL,'2026-03-23 22:14:22','2026-03-23 22:14:22'),
(795,6,10,'customer',11,'https://www.google.com/maps?q=-17.7833,-63.1821','text','sent',NULL,'2026-03-23 22:14:38','2026-03-23 22:14:38'),
(796,6,10,'system',0,'El costo del servicio es: Bs 2,193.21\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-03-23 22:14:38','2026-03-23 22:14:38'),
(797,6,10,'customer',11,'Si','text','sent',NULL,'2026-03-23 22:14:51','2026-03-23 22:14:51'),
(798,6,10,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-03-23 22:14:51','2026-03-23 22:14:51'),
(799,6,10,'customer',11,'No','text','sent',NULL,'2026-03-23 22:14:57','2026-03-23 22:14:57'),
(800,6,10,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-03-23 22:14:58','2026-03-23 22:14:58'),
(801,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 23:13:10','2026-03-23 23:13:10'),
(802,3,NULL,'customer',14,'Hola','text','sent',NULL,'2026-03-23 23:13:11','2026-03-23 23:13:11'),
(803,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 23:13:11','2026-03-23 23:13:11'),
(804,3,NULL,'customer',14,'Quiero hacer envio','text','sent',NULL,'2026-03-23 23:13:27','2026-03-23 23:13:27'),
(805,3,NULL,'system',0,'Por favor envía la ubicación de recogida como link de Google Maps o ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre Google Maps\n2. Toca la ubicación\n3. Toca Compartir\n4. Selecciona WhatsApp','text','sent',NULL,'2026-03-23 23:13:29','2026-03-23 23:13:29'),
(806,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 23:46:39','2026-03-23 23:46:39'),
(807,3,NULL,'customer',14,'Hola','text','sent',NULL,'2026-03-23 23:46:40','2026-03-23 23:46:40'),
(808,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 23:46:40','2026-03-23 23:46:40'),
(809,3,NULL,'customer',14,'Empieza otra vez','text','sent',NULL,'2026-03-23 23:46:45','2026-03-23 23:46:45'),
(810,3,NULL,'system',0,'Por favor envía la ubicación de recogida como link de Google Maps o ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre Google Maps\n2. Toca la ubicación\n3. Toca Compartir\n4. Selecciona WhatsApp','text','sent',NULL,'2026-03-23 23:46:47','2026-03-23 23:46:47'),
(811,3,NULL,'customer',14,'Estoy en narnia','text','sent',NULL,'2026-03-23 23:57:58','2026-03-23 23:57:58'),
(812,3,NULL,'system',0,'Por favor envía la ubicación de recogida como link de Google Maps o ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre Google Maps\n2. Toca la ubicación\n3. Toca Compartir\n4. Selecciona WhatsApp','text','sent',NULL,'2026-03-23 23:58:00','2026-03-23 23:58:00'),
(813,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 23:58:09','2026-03-23 23:58:09'),
(814,3,NULL,'customer',14,'Hola','text','sent',NULL,'2026-03-23 23:58:10','2026-03-23 23:58:10'),
(815,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-23 23:58:10','2026-03-23 23:58:10'),
(816,3,NULL,'customer',14,'Desde aca','text','sent',NULL,'2026-03-23 23:58:22','2026-03-23 23:58:22'),
(817,3,NULL,'system',0,'Por favor envía la ubicación de recogida como link de Google Maps o ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre Google Maps\n2. Toca la ubicación\n3. Toca Compartir\n4. Selecciona WhatsApp','text','sent',NULL,'2026-03-23 23:58:24','2026-03-23 23:58:24'),
(818,3,NULL,'customer',14,'#ATTACHMENT:location#Shared location#-17.7835428#-63.1625681','text','sent',NULL,'2026-03-24 00:06:36','2026-03-24 00:06:36'),
(819,3,11,'system',0,'Por favor envía la ubicación de destino como link de Google Maps o ubicación de WhatsApp. 📍','text','sent',NULL,'2026-03-24 00:06:36','2026-03-24 00:06:36'),
(820,3,11,'customer',14,'[image message]','text','sent',NULL,'2026-03-24 00:07:04','2026-03-24 00:07:04'),
(821,3,11,'customer',14,'Please remove it','text','sent',NULL,'2026-03-24 00:07:07','2026-03-24 00:07:07'),
(822,3,11,'system',0,'Por favor envía el destino como link de Google Maps o ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre Google Maps\n2. Busca el destino\n3. Toca Compartir\n4. Selecciona WhatsApp','text','sent',NULL,'2026-03-24 00:07:09','2026-03-24 00:07:09'),
(823,3,11,'system',0,'Por favor envía el destino como link de Google Maps o ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre Google Maps\n2. Busca el destino\n3. Toca Compartir\n4. Selecciona WhatsApp','text','sent',NULL,'2026-03-24 00:07:10','2026-03-24 00:07:10'),
(824,3,11,'customer',14,'Bro seriously enflish version worked perfectly','text','sent',NULL,'2026-03-24 00:07:22','2026-03-24 00:07:22'),
(825,3,11,'system',0,'Por favor envía el destino como link de Google Maps o ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre Google Maps\n2. Busca el destino\n3. Toca Compartir\n4. Selecciona WhatsApp','text','sent',NULL,'2026-03-24 00:07:24','2026-03-24 00:07:24'),
(826,3,11,'customer',14,'Iw I\'ll translate second part:\nHow to share :\n1. Open Google maps','text','sent',NULL,'2026-03-24 00:08:10','2026-03-24 00:08:10'),
(827,3,11,'system',0,'Por favor envía el destino como link de Google Maps o ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre Google Maps\n2. Busca el destino\n3. Toca Compartir\n4. Selecciona WhatsApp','text','sent',NULL,'2026-03-24 00:08:11','2026-03-24 00:08:11'),
(828,7,NULL,'customer',15,'Hola','text','sent',NULL,'2026-03-24 00:13:23','2026-03-24 00:13:23'),
(829,7,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-24 00:13:23','2026-03-24 00:13:23'),
(830,7,NULL,'customer',15,'Aca','text','sent',NULL,'2026-03-24 00:13:36','2026-03-24 00:13:36'),
(831,7,NULL,'system',0,'Por favor envía la ubicación de recogida como link de Google Maps o ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre Google Maps\n2. Toca la ubicación\n3. Toca Compartir\n4. Selecciona WhatsApp','text','sent',NULL,'2026-03-24 00:13:38','2026-03-24 00:13:38'),
(832,7,NULL,'customer',15,'#ATTACHMENT:location#Shared location#-17.7843203#-63.164335','text','sent',NULL,'2026-03-24 00:13:56','2026-03-24 00:13:56'),
(833,7,12,'system',0,'Por favor envía la ubicación de destino como link de Google Maps o ubicación de WhatsApp. 📍','text','sent',NULL,'2026-03-24 00:13:56','2026-03-24 00:13:56'),
(834,7,12,'customer',15,'#ATTACHMENT:location#Shared location#-17.7837504#-63.1643655','text','sent',NULL,'2026-03-24 00:14:15','2026-03-24 00:14:15'),
(835,7,12,'system',0,'El costo del servicio es: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-03-24 00:14:15','2026-03-24 00:14:15'),
(836,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-24 11:57:46','2026-03-24 11:57:46'),
(837,6,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-24 11:57:47','2026-03-24 11:57:47'),
(838,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-24 11:57:47','2026-03-24 11:57:47'),
(839,6,NULL,'customer',11,'#ATTACHMENT:location#Bajaj Madhusudan Bajaj Service Centre#21.31473533#76.22392374','text','sent',NULL,'2026-03-24 11:59:31','2026-03-24 11:59:31'),
(840,6,13,'system',0,'Por favor envía la ubicación de destino como link de Google Maps o ubicación de WhatsApp. 📍','text','sent',NULL,'2026-03-24 11:59:31','2026-03-24 11:59:31'),
(841,6,13,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-24 11:59:55','2026-03-24 11:59:55'),
(842,6,13,'system',0,'El costo del servicio es: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-03-24 11:59:55','2026-03-24 11:59:55'),
(843,6,13,'customer',11,'Hola','text','sent',NULL,'2026-03-24 12:18:55','2026-03-24 12:18:55'),
(844,6,13,'system',0,'Por favor responde Sí para reservar un mensajero o No para cancelar.','text','sent',NULL,'2026-03-24 12:18:55','2026-03-24 12:18:55'),
(845,6,13,'customer',11,'Hola','text','sent',NULL,'2026-03-24 12:19:49','2026-03-24 12:19:49'),
(846,6,13,'system',0,'Por favor responde Sí para reservar un mensajero o No para cancelar.','text','sent',NULL,'2026-03-24 12:19:49','2026-03-24 12:19:49'),
(847,6,13,'customer',11,'Si','text','sent',NULL,'2026-03-24 12:19:58','2026-03-24 12:19:58'),
(848,6,13,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-03-24 12:19:58','2026-03-24 12:19:58'),
(849,6,13,'customer',11,'No','text','sent',NULL,'2026-03-24 12:20:04','2026-03-24 12:20:04'),
(850,6,13,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-03-24 12:20:05','2026-03-24 12:20:05'),
(851,6,13,'customer',11,'Cancel','text','sent',NULL,'2026-03-24 12:20:19','2026-03-24 12:20:19'),
(852,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-24 12:20:19','2026-03-24 12:20:19'),
(853,6,NULL,'customer',11,'#ATTACHMENT:location#Shanwara Masjid#21.31183889#76.22653276','text','sent',NULL,'2026-03-24 12:21:18','2026-03-24 12:21:18'),
(854,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-24 12:21:18','2026-03-24 12:21:18'),
(855,6,NULL,'customer',11,'#ATTACHMENT:location#Smart Home Center#21.31476517#76.22328072','text','sent',NULL,'2026-03-24 12:21:39','2026-03-24 12:21:39'),
(856,6,14,'system',0,'Por favor envía la ubicación de destino como link de Google Maps o ubicación de WhatsApp. 📍','text','sent',NULL,'2026-03-24 12:21:39','2026-03-24 12:21:39'),
(857,6,14,'customer',11,'#ATTACHMENT:location#Burhanpur District Court#21.31152344#76.23007482','text','sent',NULL,'2026-03-24 12:22:29','2026-03-24 12:22:29'),
(858,6,14,'system',0,'El costo del servicio es: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-03-24 12:22:29','2026-03-24 12:22:29'),
(859,6,14,'customer',11,'#ATTACHMENT:location#Rajasthan Bhawan#21.31369925#76.21635765','text','sent',NULL,'2026-03-24 12:23:44','2026-03-24 12:23:44'),
(860,6,14,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-03-24 12:23:44','2026-03-24 12:23:44'),
(861,6,14,'customer',11,'#ATTACHMENT:location#Takliwala Glass House#21.31507389#76.22400741','text','sent',NULL,'2026-03-24 12:24:20','2026-03-24 12:24:20'),
(862,6,14,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-03-24 12:24:21','2026-03-24 12:24:21'),
(863,6,14,'customer',11,'#ATTACHMENT:location#Santa Ram Hotel#21.103375#76.059117','text','sent',NULL,'2026-03-24 12:49:05','2026-03-24 12:49:05'),
(864,6,14,'system',0,'Buscando mensajeros disponibles... 🚚\n\n(Escribe \'cancelar\' para detener)','text','sent',NULL,'2026-03-24 12:49:05','2026-03-24 12:49:05'),
(865,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-24 13:29:41','2026-03-24 13:29:41'),
(866,6,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-24 13:29:42','2026-03-24 13:29:42'),
(867,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-24 13:29:42','2026-03-24 13:29:42'),
(868,6,NULL,'customer',11,'#ATTACHMENT:location#Raver#21.24302546#76.02557022','text','sent',NULL,'2026-03-24 13:30:58','2026-03-24 13:30:58'),
(869,6,15,'system',0,'Por favor envía la ubicación de destino usando la ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre WhatsApp\n2. Toca el ícono de adjuntar (📎)\n3. Selecciona Ubicación\n4. Envía la ubicación de destino','text','sent',NULL,'2026-03-24 13:30:58','2026-03-24 13:30:58'),
(870,6,15,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-03-24 13:31:20','2026-03-24 13:31:20'),
(871,6,15,'system',0,'📍 Distancia: 0 km\n💰 Costo del servicio: Bs 88.78\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-03-24 13:31:20','2026-03-24 13:31:20'),
(872,6,15,'customer',11,'Si','text','sent',NULL,'2026-03-24 13:31:32','2026-03-24 13:31:32'),
(873,6,15,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-03-24 13:31:32','2026-03-24 13:31:32'),
(874,6,15,'customer',11,'No','text','sent',NULL,'2026-03-24 13:31:40','2026-03-24 13:31:40'),
(875,6,15,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-03-24 13:31:40','2026-03-24 13:31:40'),
(876,6,NULL,'customer',11,'Hola','text','sent',NULL,'2026-03-24 17:29:32','2026-03-24 17:29:32'),
(877,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-24 17:29:32','2026-03-24 17:29:32'),
(878,6,NULL,'customer',11,'#ATTACHMENT:location#Savda#21.24138938#75.30255446','text','sent',NULL,'2026-03-24 17:30:40','2026-03-24 17:30:40'),
(879,6,16,'system',0,'Por favor envía la ubicación de destino usando la ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre WhatsApp\n2. Toca el ícono de adjuntar (📎)\n3. Selecciona Ubicación\n4. Envía la ubicación de destino','text','sent',NULL,'2026-03-24 17:30:40','2026-03-24 17:30:40'),
(880,6,16,'customer',11,'#ATTACHMENT:location#Seva Sadan Higher Secondary School#21.31123199#76.22422401','text','sent',NULL,'2026-03-24 17:31:38','2026-03-24 17:31:38'),
(881,6,16,'system',0,'📍 Distancia: 134.1 km\n💰 Costo del servicio: Bs 386.31\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-03-24 17:31:38','2026-03-24 17:31:38'),
(882,6,16,'customer',11,'Si','text','sent',NULL,'2026-03-24 17:31:49','2026-03-24 17:31:49'),
(883,6,16,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-03-24 17:31:49','2026-03-24 17:31:49'),
(884,6,16,'customer',11,'No','text','sent',NULL,'2026-03-24 17:31:55','2026-03-24 17:31:55'),
(885,6,16,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-03-24 17:31:56','2026-03-24 17:31:56'),
(886,3,11,'customer',14,'Hola','text','sent',NULL,'2026-03-24 20:38:07','2026-03-24 20:38:07'),
(887,3,11,'system',0,'Por favor envía la ubicación de destino usando la ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre WhatsApp\n2. Toca el ícono de adjuntar (📎)\n3. Selecciona Ubicación\n4. Envía la ubicación de destino','text','sent',NULL,'2026-03-24 20:38:10','2026-03-24 20:38:10'),
(888,3,11,'customer',14,'#ATTACHMENT:location#Shared location#-17.804398#-63.1568566','text','sent',NULL,'2026-03-24 20:38:46','2026-03-24 20:38:46'),
(889,3,11,'system',0,'📍 Distancia: 3.4 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-03-24 20:38:46','2026-03-24 20:38:46'),
(890,3,11,'customer',14,'Hola','text','sent',NULL,'2026-03-24 20:47:13','2026-03-24 20:47:13'),
(891,3,11,'system',0,'Por favor responde Sí para reservar un mensajero o No para cancelar.','text','sent',NULL,'2026-03-24 20:47:13','2026-03-24 20:47:13'),
(892,1,NULL,'customer',14,'No','text','sent',NULL,'2026-03-24 20:47:21','2026-03-24 20:47:21'),
(893,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-24 20:47:21','2026-03-24 20:47:21'),
(894,1,NULL,'customer',14,'Aquí en radil','text','sent',NULL,'2026-03-24 20:47:32','2026-03-24 20:47:32'),
(895,1,NULL,'system',0,'Por favor envía la ubicación de recogida usando la ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre WhatsApp\n2. Toca el ícono de adjuntar (📎)\n3. Selecciona Ubicación\n4. Envía tu ubicación actual','text','sent',NULL,'2026-03-24 20:47:36','2026-03-24 20:47:36'),
(896,1,NULL,'customer',14,'#ATTACHMENT:location#Shared location#-17.8043799#-63.1567831','text','sent',NULL,'2026-03-24 20:48:02','2026-03-24 20:48:02'),
(897,1,17,'system',0,'Por favor envía la ubicación de destino usando la ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre WhatsApp\n2. Toca el ícono de adjuntar (📎)\n3. Selecciona Ubicación\n4. Envía la ubicación de destino','text','sent',NULL,'2026-03-24 20:48:02','2026-03-24 20:48:02'),
(898,1,17,'customer',14,'#ATTACHMENT:location#Centro Comercial \"La Fortuna\", Santa Cruz de la Sierra, Bolivia#-17.790134104459#-63.155022896826','text','sent',NULL,'2026-03-24 20:48:29','2026-03-24 20:48:29'),
(899,1,17,'system',0,'📍 Distancia: 2.2 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-03-24 20:48:29','2026-03-24 20:48:29'),
(900,1,NULL,'customer',14,'hola','text','sent',NULL,'2026-03-26 20:16:17','2026-03-26 20:16:17'),
(901,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍','text','sent',NULL,'2026-03-26 20:16:17','2026-03-26 20:16:17'),
(902,1,NULL,'customer',14,'en el urubo','text','sent',NULL,'2026-03-26 20:16:56','2026-03-26 20:16:56'),
(903,1,1,'system',0,'Por favor envía la ubicación de destino usando la ubicación de WhatsApp. 📍\n\nCómo compartir:\n1. Abre WhatsApp\n2. Toca el ícono de adjuntar (📎)\n3. Selecciona Ubicación\n4. Envía la ubicación de destino','text','sent',NULL,'2026-03-26 20:16:59','2026-03-26 20:16:59'),
(904,1,1,'customer',14,'#ATTACHMENT:location#Shared location#-17.8043209#-63.1566826','text','sent',NULL,'2026-03-27 00:20:39','2026-03-27 00:20:39'),
(905,1,1,'system',0,'📍 Distancia: 5.0 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-03-27 00:20:39','2026-03-27 00:20:39'),
(906,1,1,'customer',14,'No','text','sent',NULL,'2026-03-27 18:28:46','2026-03-27 18:28:46'),
(907,1,NULL,'system',0,'Tu solicitud de entrega ha sido cancelada. Envía \'reiniciar\' para empezar de nuevo.','text','sent',NULL,'2026-03-27 18:28:46','2026-03-27 18:28:46'),
(908,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-03-27 19:13:33','2026-03-27 19:13:33'),
(909,1,NULL,'customer',14,'ok','text','sent',NULL,'2026-03-27 19:13:34','2026-03-27 19:13:34'),
(910,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-03-27 19:13:34','2026-03-27 19:13:34'),
(911,1,NULL,'customer',14,'urubo','text','sent',NULL,'2026-03-27 19:13:50','2026-03-27 19:13:50'),
(912,1,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo calcular una entrega desde \"urubo\" porque no es un lugar geolocalizado real.\n\nPor favor envía una *ubicación real* usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía tu ubicación actual o selecciona un punto en el mapa\n\n⚠️ No escribas nombres de lugares. Debe ser una ubicación GPS real.','text','sent',NULL,'2026-03-27 19:13:50','2026-03-27 19:13:50'),
(913,1,NULL,'customer',14,'plaza 24','text','sent',NULL,'2026-03-27 19:14:11','2026-03-27 19:14:11'),
(914,1,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo calcular una entrega desde \"plaza 24\" porque no es un lugar geolocalizado real.\n\nPor favor envía una *ubicación real* usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía tu ubicación actual o selecciona un punto en el mapa\n\n⚠️ No escribas nombres de lugares. Debe ser una ubicación GPS real.','text','sent',NULL,'2026-03-27 19:14:11','2026-03-27 19:14:11'),
(915,1,NULL,'customer',14,'https://maps.app.goo.gl/w61JSNr3hkVgKW218','text','sent',NULL,'2026-03-27 19:14:54','2026-03-27 19:14:54'),
(916,1,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo calcular una entrega desde \"https://maps.app.goo.gl/w61JSNr3hkVgKW218\" porque no es un lugar geolocalizado real.\n\nPor favor envía una *ubicación real* usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía tu ubicación actual o selecciona un punto en el mapa\n\n⚠️ No escribas nombres de lugares. Debe ser una ubicación GPS real.','text','sent',NULL,'2026-03-27 19:14:54','2026-03-27 19:14:54'),
(917,1,NULL,'customer',14,'#ATTACHMENT:location#Shared location#-17.8042667#-63.156745','text','sent',NULL,'2026-03-27 19:18:51','2026-03-27 19:18:51'),
(918,1,2,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.8042667, Lng: -63.156745\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-03-27 19:18:51','2026-03-27 19:18:51'),
(919,1,2,'customer',14,'#ATTACHMENT:location#Reyes Cardona 243, Santa Cruz de la Sierra, Bolivia#-17.780700836614#-63.192831650376','text','sent',NULL,'2026-03-27 19:21:26','2026-03-27 19:21:26'),
(920,1,2,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 6.5 km\n💰 Costo del servicio: Bs 18.67\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-03-27 19:21:26','2026-03-27 19:21:26'),
(921,1,2,'customer',14,'Hola','text','sent',NULL,'2026-04-01 19:51:52','2026-04-01 19:51:52'),
(922,1,2,'system',0,'Por favor responde *Sí* para reservar un mensajero o *No* para cancelar.','text','sent',NULL,'2026-04-01 19:51:52','2026-04-01 19:51:52'),
(923,1,2,'customer',14,'No','text','sent',NULL,'2026-04-01 19:52:03','2026-04-01 19:52:03'),
(924,1,NULL,'system',0,'Tu solicitud de entrega ha sido cancelada. Envía \'reiniciar\' para empezar de nuevo.','text','sent',NULL,'2026-04-01 19:52:03','2026-04-01 19:52:03'),
(925,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-01 19:54:38','2026-04-01 19:54:38'),
(926,1,NULL,'customer',14,'Otra vez','text','sent',NULL,'2026-04-01 19:54:38','2026-04-01 19:54:38'),
(927,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-01 19:54:38','2026-04-01 19:54:38'),
(928,1,NULL,'customer',14,'#ATTACHMENT:location#Huacaraje 2390, Santa Cruz de la Sierra, Bolivia#-17.780446704868#-63.160226047039','text','sent',NULL,'2026-04-01 19:55:04','2026-04-01 19:55:04'),
(929,1,3,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.780446704868, Lng: -63.160226047039\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-01 19:55:04','2026-04-01 19:55:04'),
(930,1,3,'customer',14,'#ATTACHMENT:location#Andres Ibanez 207, Santa Cruz de la Sierra, Bolivia#-17.776331380429#-63.18476356566','text','sent',NULL,'2026-04-01 19:55:28','2026-04-01 19:55:28'),
(931,1,3,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 3.7 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-01 19:55:28','2026-04-01 19:55:28'),
(932,1,3,'customer',14,'Si','text','sent',NULL,'2026-04-01 19:55:40','2026-04-01 19:55:40'),
(933,1,3,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-01 19:55:40','2026-04-01 19:55:40'),
(934,1,3,'customer',14,'No','text','sent',NULL,'2026-04-01 19:55:49','2026-04-01 19:55:49'),
(935,1,3,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-01 19:55:50','2026-04-01 19:55:50'),
(936,1,3,'customer',14,'hola','text','sent',NULL,'2026-04-02 20:16:10','2026-04-02 20:16:10'),
(937,1,3,'system',0,'Buscando mensajeros disponibles... 🚚\n\n(Escribe \'cancelar\' para detener)','text','sent',NULL,'2026-04-02 20:16:10','2026-04-02 20:16:10'),
(938,1,3,'customer',14,'cancelar','text','sent',NULL,'2026-04-02 20:17:42','2026-04-02 20:17:42'),
(939,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-02 20:17:42','2026-04-02 20:17:42'),
(940,1,NULL,'customer',14,'como','text','sent',NULL,'2026-04-02 20:17:53','2026-04-02 20:17:53'),
(941,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-02 20:17:53','2026-04-02 20:17:53'),
(942,1,NULL,'customer',14,'#ATTACHMENT:location#6R6V+8VW, C. Cap. Manuel Valverde, Santa Cruz de la Sierra, Bolivia#-17.789537117371#-63.155191205442','text','sent',NULL,'2026-04-02 20:18:40','2026-04-02 20:18:40'),
(943,1,4,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.789537117371, Lng: -63.155191205442\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-02 20:18:40','2026-04-02 20:18:40'),
(944,1,4,'customer',14,'#ATTACHMENT:location#6R7R+RQM, Santa Cruz de la Sierra, Bolivia#-17.785729761319#-63.158027976751','text','sent',NULL,'2026-04-02 20:19:05','2026-04-02 20:19:05'),
(945,1,4,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 0.7 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-02 20:19:05','2026-04-02 20:19:05'),
(946,1,4,'customer',14,'Si','text','sent',NULL,'2026-04-02 21:01:58','2026-04-02 21:01:58'),
(947,1,4,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-02 21:01:58','2026-04-02 21:01:58'),
(948,1,4,'customer',14,'Si','text','sent',NULL,'2026-04-02 21:02:11','2026-04-02 21:02:11'),
(949,1,4,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-02 21:02:12','2026-04-02 21:02:12'),
(950,1,4,'customer',14,'Hola','text','sent',NULL,'2026-04-06 23:35:29','2026-04-06 23:35:29'),
(951,1,4,'system',0,'Tu mensajero se está acercando. Envía \'estado\' para actualizaciones. 📍','text','sent',NULL,'2026-04-06 23:35:29','2026-04-06 23:35:29'),
(952,1,4,'customer',14,'Estado','text','sent',NULL,'2026-04-06 23:35:40','2026-04-06 23:35:40'),
(953,1,4,'system',0,'Mensajero en camino al destino.\n👤 Mensajero: Driver 6704\n📱 Contacto: 918817016704','text','sent',NULL,'2026-04-06 23:35:40','2026-04-06 23:35:40'),
(954,2,NULL,'customer',11,'Hola','text','sent',NULL,'2026-04-08 10:16:16','2026-04-08 10:16:16'),
(955,2,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-08 10:16:16','2026-04-08 10:16:16'),
(956,2,NULL,'customer',11,'#ATTACHMENT:location#Hotel High Rise Regency#21.31379836#76.22201621','text','sent',NULL,'2026-04-08 10:16:42','2026-04-08 10:16:42'),
(957,2,NULL,'system',0,'❌ *Ubicación fuera de rango*\n\nLas coordenadas recibidas no parecen estar en Bolivia o áreas de servicio válidas.\n\nPor favor envía una ubicación dentro del área de servicio de Delivery Avaroa.','text','sent',NULL,'2026-04-08 10:16:42','2026-04-08 10:16:42'),
(958,2,NULL,'customer',11,'#ATTACHMENT:location#Shanti Furniture and Electronics#21.31457867#76.2236937','text','sent',NULL,'2026-04-08 10:17:10','2026-04-08 10:17:10'),
(959,2,NULL,'system',0,'❌ *Ubicación fuera de rango*\n\nLas coordenadas recibidas no parecen estar en Bolivia o áreas de servicio válidas.\n\nPor favor envía una ubicación dentro del área de servicio de Delivery Avaroa.','text','sent',NULL,'2026-04-08 10:17:10','2026-04-08 10:17:10'),
(960,2,NULL,'customer',11,'https://maps.app.goo.gl/YP97UhwmyH7mhios6','text','sent',NULL,'2026-04-08 10:20:24','2026-04-08 10:20:24'),
(961,2,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo calcular una entrega desde \"https://maps.app.goo.gl/YP97UhwmyH7mhios6\" porque no es un lugar geolocalizado real.\n\nPor favor envía una *ubicación real* usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía tu ubicación actual o selecciona un punto en el mapa\n\n⚠️ No escribas nombres de lugares. Debe ser una ubicación GPS real.','text','sent',NULL,'2026-04-08 10:20:24','2026-04-08 10:20:24'),
(962,2,NULL,'customer',11,'La paz','text','sent',NULL,'2026-04-08 10:23:14','2026-04-08 10:23:14'),
(963,2,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo calcular una entrega desde \"La paz\" porque no es un lugar geolocalizado real.\n\nPor favor envía una *ubicación real* usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía tu ubicación actual o selecciona un punto en el mapa\n\n⚠️ No escribas nombres de lugares. Debe ser una ubicación GPS real.','text','sent',NULL,'2026-04-08 10:23:14','2026-04-08 10:23:14'),
(964,2,NULL,'customer',11,'https://www.google.com/maps?q=-16.5,-68.15','text','sent',NULL,'2026-04-08 10:28:41','2026-04-08 10:28:41'),
(965,2,5,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -16.5, Lng: -68.15\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-08 10:28:41','2026-04-08 10:28:41'),
(966,2,5,'customer',11,'https://www.google.com/maps?q=-16.7476,-62.0751','text','sent',NULL,'2026-04-08 10:29:02','2026-04-08 10:29:02'),
(967,2,5,'system',0,'❌ *Error de cálculo*\n\nNo se pudo calcular la ruta. Asegúrate de haber enviado ubicaciones GPS reales válidas.\n\nEscribe \'reiniciar\' para comenzar de nuevo con ubicaciones reales.','text','sent',NULL,'2026-04-08 10:29:02','2026-04-08 10:29:02'),
(968,2,NULL,'customer',11,'https://www.google.com/maps?q=-21.5355,-64.7296','text','sent',NULL,'2026-04-08 10:30:35','2026-04-08 10:30:35'),
(969,2,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-08 10:30:35','2026-04-08 10:30:35'),
(970,2,NULL,'customer',11,'https://www.google.com/maps?q=-21.5355,-64.7296','text','sent',NULL,'2026-04-08 10:33:31','2026-04-08 10:33:31'),
(971,2,6,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -21.5355, Lng: -64.7296\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-08 10:33:31','2026-04-08 10:33:31'),
(972,2,6,'customer',11,'https://www.google.com/maps?q=-16.5,-68.15','text','sent',NULL,'2026-04-08 10:33:56','2026-04-08 10:33:56'),
(973,2,6,'system',0,'❌ *Error de cálculo*\n\nNo se pudo calcular la ruta. Asegúrate de haber enviado ubicaciones GPS reales válidas.\n\nEscribe \'reiniciar\' para comenzar de nuevo con ubicaciones reales.','text','sent',NULL,'2026-04-08 10:33:56','2026-04-08 10:33:56'),
(974,1,4,'customer',14,'Hola','text','sent',NULL,'2026-04-08 16:30:57','2026-04-08 16:30:57'),
(975,1,4,'system',0,'Tu mensajero se está acercando. Envía \'estado\' para actualizaciones. 📍','text','sent',NULL,'2026-04-08 16:30:57','2026-04-08 16:30:57'),
(976,1,4,'customer',14,'Estado','text','sent',NULL,'2026-04-08 16:31:13','2026-04-08 16:31:13'),
(977,1,4,'system',0,'Estado desconocido','text','sent',NULL,'2026-04-08 16:31:13','2026-04-08 16:31:13'),
(978,1,4,'customer',14,'Reiniciar','text','sent',NULL,'2026-04-08 16:31:35','2026-04-08 16:31:35'),
(979,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-08 16:31:35','2026-04-08 16:31:35'),
(980,1,NULL,'customer',14,'#ATTACHMENT:location#Las Totaquis 2425, Santa Cruz de la Sierra, Bolivia#-17.772875264775#-63.163938559592','text','sent',NULL,'2026-04-08 16:32:14','2026-04-08 16:32:14'),
(981,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-08 16:32:14','2026-04-08 16:32:14'),
(982,1,NULL,'customer',14,'#ATTACHMENT:location#6RFW+XF2, Santa Cruz de la Sierra, Bolivia#-17.77646100342#-63.15452132374','text','sent',NULL,'2026-04-09 19:05:36','2026-04-09 19:05:36'),
(983,1,7,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.77646100342, Lng: -63.15452132374\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-09 19:05:36','2026-04-09 19:05:36'),
(984,1,7,'customer',14,'Reinciar','text','sent',NULL,'2026-04-09 19:06:03','2026-04-09 19:06:03'),
(985,1,7,'system',0,'❌ *Destino no válido*\n\n\"Reinciar\" no es una ubicación geolocalizada real.\n\nNo puedo calcular el precio desde Narnia, Disneylandia, o direcciones inventadas. 😊\n\nPor favor envía una *ubicación real* usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de destino en el mapa\n\n⚠️ El cálculo solo funciona desde un punto GPS real A a un punto GPS real B.','text','sent',NULL,'2026-04-09 19:06:03','2026-04-09 19:06:03'),
(986,1,7,'customer',14,'#ATTACHMENT:location#Av. Mutualista, esq, Santa Cruz de la Sierra, Bolivia#-17.764400873755#-63.159758672118','text','sent',NULL,'2026-04-09 19:06:38','2026-04-09 19:06:38'),
(987,1,7,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 2.0 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-09 19:06:38','2026-04-09 19:06:38'),
(988,1,7,'customer',14,'Si','text','sent',NULL,'2026-04-09 19:06:55','2026-04-09 19:06:55'),
(989,1,7,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-09 19:06:55','2026-04-09 19:06:55'),
(990,1,7,'customer',14,'No','text','sent',NULL,'2026-04-09 19:07:02','2026-04-09 19:07:02'),
(991,1,7,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-09 19:07:03','2026-04-09 19:07:03'),
(992,1,7,'customer',14,'Reinicia','text','sent',NULL,'2026-04-09 19:07:28','2026-04-09 19:07:28'),
(993,1,7,'system',0,'Buscando mensajeros disponibles... 🚚\n\n(Escribe \'cancelar\' para detener)','text','sent',NULL,'2026-04-09 19:07:28','2026-04-09 19:07:28'),
(994,1,7,'customer',14,'Cancelar','text','sent',NULL,'2026-04-09 19:07:38','2026-04-09 19:07:38'),
(995,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-09 19:07:38','2026-04-09 19:07:38'),
(996,1,NULL,'customer',14,'#ATTACHMENT:location#Shared location#-17.8044557#-63.156788','text','sent',NULL,'2026-04-09 19:09:02','2026-04-09 19:09:02'),
(997,1,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-09 19:09:02','2026-04-09 19:09:02'),
(998,1,NULL,'customer',14,'#ATTACHMENT:location#Av. San Rafael 3050, Santa Cruz de la Sierra, Bolivia#-17.797044962623#-63.157539814711','text','sent',NULL,'2026-04-09 19:09:32','2026-04-09 19:09:32'),
(999,1,8,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.797044962623, Lng: -63.157539814711\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-09 19:09:32','2026-04-09 19:09:32'),
(1000,1,8,'customer',14,'#ATTACHMENT:location#6R9P+77V, Av. Sta. Cruz, Santa Cruz de la Sierra, Bolivia#-17.781837401304#-63.164172917604','text','sent',NULL,'2026-04-09 19:09:50','2026-04-09 19:09:50'),
(1001,1,8,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 2.6 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-09 19:09:50','2026-04-09 19:09:50'),
(1002,1,8,'customer',14,'Si','text','sent',NULL,'2026-04-09 19:10:00','2026-04-09 19:10:00'),
(1003,1,8,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-09 19:10:00','2026-04-09 19:10:00'),
(1004,1,8,'customer',14,'No','text','sent',NULL,'2026-04-09 19:10:07','2026-04-09 19:10:07'),
(1005,1,8,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-09 19:10:08','2026-04-09 19:10:08'),
(1006,1,8,'customer',14,'Ok','text','sent',NULL,'2026-04-09 19:13:58','2026-04-09 19:13:58'),
(1007,1,8,'system',0,'Buscando mensajeros disponibles... 🚚\n\n(Escribe \'cancelar\' para detener)','text','sent',NULL,'2026-04-09 19:13:58','2026-04-09 19:13:58'),
(1008,2,NULL,'customer',11,'Hi','text','sent',NULL,'2026-04-10 15:22:19','2026-04-10 15:22:19'),
(1009,2,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-10 15:22:19','2026-04-10 15:22:19'),
(1010,2,NULL,'customer',11,'#ATTACHMENT:location#Db Mall || Best Clothing Shop | Footwear Shop | Toy Shop#21.31476224#76.22273826','text','sent',NULL,'2026-04-10 15:23:09','2026-04-10 15:23:09'),
(1011,2,NULL,'system',0,'❌ *Ubicación fuera de rango*\n\nLas coordenadas recibidas no parecen estar en Bolivia o áreas de servicio válidas.\n\nPor favor envía una ubicación dentro del área de servicio de Delivery Avaroa.','text','sent',NULL,'2026-04-10 15:23:09','2026-04-10 15:23:09'),
(1012,2,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-10 15:24:37','2026-04-10 15:24:37'),
(1013,2,NULL,'customer',11,'Hi','text','sent',NULL,'2026-04-10 15:24:37','2026-04-10 15:24:37'),
(1014,2,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-10 15:24:37','2026-04-10 15:24:37'),
(1015,3,NULL,'customer',34,'Hola','text','sent',NULL,'2026-04-14 20:59:20','2026-04-14 20:59:20'),
(1016,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-14 20:59:20','2026-04-14 20:59:20'),
(1017,3,NULL,'customer',34,'#ATTACHMENT:location#Av. Juan Pablo II 3015, Santa Cruz de la Sierra, Bolivia#-17.795135947801#-63.157354742289','text','sent',NULL,'2026-04-14 20:59:52','2026-04-14 20:59:52'),
(1018,3,10,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.795135947801, Lng: -63.157354742289\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-14 20:59:52','2026-04-14 20:59:52'),
(1019,3,10,'customer',34,'#ATTACHMENT:location#6RP5+68G, Santa Cruz de la Sierra, Bolivia#-17.764427055523#-63.191694393754','text','sent',NULL,'2026-04-14 21:00:14','2026-04-14 21:00:14'),
(1020,3,10,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 7.0 km\n💰 Costo del servicio: Bs 20.12\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-14 21:00:14','2026-04-14 21:00:14'),
(1021,3,10,'customer',34,'Si','text','sent',NULL,'2026-04-14 21:12:24','2026-04-14 21:12:24'),
(1022,3,10,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-14 21:12:24','2026-04-14 21:12:24'),
(1023,3,10,'customer',34,'No','text','sent',NULL,'2026-04-14 21:12:41','2026-04-14 21:12:41'),
(1024,3,10,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-14 21:12:42','2026-04-14 21:12:42'),
(1025,3,10,'customer',34,'Si','text','sent',NULL,'2026-04-14 21:14:57','2026-04-14 21:14:57'),
(1026,3,10,'system',0,'Buscando mensajeros disponibles... 🚚\n\n(Escribe \'cancelar\' para detener)','text','sent',NULL,'2026-04-14 21:14:57','2026-04-14 21:14:57'),
(1027,3,10,'customer',34,'Ok','text','sent',NULL,'2026-04-14 21:15:07','2026-04-14 21:15:07'),
(1028,3,10,'system',0,'Buscando mensajeros disponibles... 🚚\n\n(Escribe \'cancelar\' para detener)','text','sent',NULL,'2026-04-14 21:15:07','2026-04-14 21:15:07'),
(1029,3,10,'customer',34,'Cancelar','text','sent',NULL,'2026-04-14 21:22:00','2026-04-14 21:22:00'),
(1030,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-14 21:22:00','2026-04-14 21:22:00'),
(1031,3,NULL,'customer',34,'#ATTACHMENT:location#Shared location#-17.804537#-63.1567978','text','sent',NULL,'2026-04-14 21:23:10','2026-04-14 21:23:10'),
(1032,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-14 21:23:10','2026-04-14 21:23:10'),
(1033,3,NULL,'customer',34,'#ATTACHMENT:location#Av. Paraguá 2395, Los Cuquisas 2440, Santa Cruz de la Sierra, Bolivia#-17.772750747582#-63.161482326686','text','sent',NULL,'2026-04-14 21:23:25','2026-04-14 21:23:25'),
(1034,3,11,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.772750747582, Lng: -63.161482326686\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-14 21:23:25','2026-04-14 21:23:25'),
(1035,3,11,'customer',34,'#ATTACHMENT:location#Shared location#-17.8045465#-63.1568291','text','sent',NULL,'2026-04-14 21:24:23','2026-04-14 21:24:23'),
(1036,3,11,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 5.0 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-14 21:24:23','2026-04-14 21:24:23'),
(1037,4,NULL,'customer',15,'hola','text','sent',NULL,'2026-04-14 21:28:53','2026-04-14 21:28:53'),
(1038,4,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-14 21:28:53','2026-04-14 21:28:53'),
(1039,4,NULL,'customer',15,'https://maps.app.goo.gl/8E8vbwvhoAZRWt376','text','sent',NULL,'2026-04-14 21:29:56','2026-04-14 21:29:56'),
(1040,4,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo calcular una entrega desde \"https://maps.app.goo.gl/8E8vbwvhoAZRWt376\" porque no es un lugar geolocalizado real.\n\nPor favor envía una *ubicación real* usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía tu ubicación actual o selecciona un punto en el mapa\n\n⚠️ No escribas nombres de lugares. Debe ser una ubicación GPS real.','text','sent',NULL,'2026-04-14 21:29:56','2026-04-14 21:29:56'),
(1041,4,NULL,'customer',15,'#ATTACHMENT:location#Auto Llaves Omar#-17.77504986#-63.1757232','text','sent',NULL,'2026-04-14 22:50:13','2026-04-14 22:50:13'),
(1042,4,12,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.77504986, Lng: -63.1757232\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-14 22:50:13','2026-04-14 22:50:13'),
(1043,4,12,'customer',15,'#ATTACHMENT:location#Churrasquería Rancho Verde#-17.77527869#-63.17580491','text','sent',NULL,'2026-04-14 22:50:21','2026-04-14 22:50:21'),
(1044,4,12,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-14 22:50:21','2026-04-14 22:50:21'),
(1045,4,12,'customer',15,'Hola','text','sent',NULL,'2026-04-14 23:07:37','2026-04-14 23:07:37'),
(1046,4,12,'system',0,'❌ *Destino no válido*\n\n\"Hola\" no es una ubicación geolocalizada real.\n\nNo puedo calcular el precio desde Narnia, Disneylandia, o direcciones inventadas. 😊\n\nPor favor envía una *ubicación real* usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de destino en el mapa\n\n⚠️ El cálculo solo funciona desde un punto GPS real A a un punto GPS real B.','text','sent',NULL,'2026-04-14 23:07:37','2026-04-14 23:07:37'),
(1047,4,12,'customer',15,'#ATTACHMENT:location#Shared location#-17.7890862#-63.1621833','text','sent',NULL,'2026-04-14 23:11:03','2026-04-14 23:11:03'),
(1048,4,12,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 3.0 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-14 23:11:03','2026-04-14 23:11:03'),
(1049,4,12,'customer',15,'si','text','sent',NULL,'2026-04-14 23:12:21','2026-04-14 23:12:21'),
(1050,4,12,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-14 23:12:21','2026-04-14 23:12:21'),
(1051,4,12,'customer',15,'no','text','sent',NULL,'2026-04-14 23:12:30','2026-04-14 23:12:30'),
(1052,4,12,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-14 23:12:32','2026-04-14 23:12:32'),
(1053,4,12,'customer',15,'Cancels','text','sent',NULL,'2026-04-15 02:37:25','2026-04-15 02:37:25'),
(1054,4,12,'system',0,'Buscando mensajeros disponibles... 🚚\n\n(Escribe \'cancelar\' para detener)','text','sent',NULL,'2026-04-15 02:37:25','2026-04-15 02:37:25'),
(1055,4,12,'customer',15,'Cancelar','text','sent',NULL,'2026-04-15 02:37:31','2026-04-15 02:37:31'),
(1056,4,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-15 02:37:31','2026-04-15 02:37:31'),
(1057,4,NULL,'customer',15,'Chau','text','sent',NULL,'2026-04-15 02:37:44','2026-04-15 02:37:44'),
(1058,4,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-15 02:37:44','2026-04-15 02:37:44'),
(1059,4,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-15 02:37:51','2026-04-15 02:37:51'),
(1060,4,NULL,'customer',15,'Hola','text','sent',NULL,'2026-04-15 02:37:51','2026-04-15 02:37:51'),
(1061,4,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-15 02:37:51','2026-04-15 02:37:51'),
(1062,4,NULL,'customer',15,'#ATTACHMENT:location#Shared location#-17.8044461#-63.1566619','text','sent',NULL,'2026-04-15 02:38:14','2026-04-15 02:38:14'),
(1063,4,13,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.8044461, Lng: -63.1566619\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-15 02:38:14','2026-04-15 02:38:14'),
(1064,4,13,'customer',15,'#ATTACHMENT:location#C. Oscar Alborta 44, Santa Cruz de la Sierra, Bolivia#-17.793713111937#-63.155461773276','text','sent',NULL,'2026-04-15 02:38:33','2026-04-15 02:38:33'),
(1065,4,13,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 1.7 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-15 02:38:33','2026-04-15 02:38:33'),
(1066,4,13,'customer',15,'Si','text','sent',NULL,'2026-04-15 02:38:43','2026-04-15 02:38:43'),
(1067,4,13,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-15 02:38:43','2026-04-15 02:38:43'),
(1068,4,13,'customer',15,'No','text','sent',NULL,'2026-04-15 02:38:50','2026-04-15 02:38:50'),
(1069,4,13,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-15 02:38:52','2026-04-15 02:38:52'),
(1070,4,13,'customer',15,'Cancelar','text','sent',NULL,'2026-04-15 17:23:44','2026-04-15 17:23:44'),
(1071,4,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-15 17:23:44','2026-04-15 17:23:44'),
(1072,4,NULL,'customer',15,'#ATTACHMENT:location#Shared location#-17.8043232#-63.1567016','text','sent',NULL,'2026-04-15 17:24:04','2026-04-15 17:24:04'),
(1073,4,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-15 17:24:04','2026-04-15 17:24:04'),
(1074,4,NULL,'customer',15,'#ATTACHMENT:location#6RFR+4VH, Santa Cruz de la Sierra, Bolivia#-17.777342820387#-63.157872073352','text','sent',NULL,'2026-04-15 17:24:30','2026-04-15 17:24:30'),
(1075,4,14,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.777342820387, Lng: -63.157872073352\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-15 17:24:30','2026-04-15 17:24:30'),
(1076,4,14,'customer',15,'#ATTACHMENT:location#C. Oscar Alborta 3105, Santa Cruz de la Sierra, Bolivia#-17.794533550425#-63.155872486532','text','sent',NULL,'2026-04-15 17:24:54','2026-04-15 17:24:54'),
(1077,4,14,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 2.7 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-15 17:24:54','2026-04-15 17:24:54'),
(1078,4,14,'customer',15,'Si','text','sent',NULL,'2026-04-15 17:25:10','2026-04-15 17:25:10'),
(1079,4,14,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-15 17:25:10','2026-04-15 17:25:10'),
(1080,4,14,'customer',15,'No','text','sent',NULL,'2026-04-15 17:25:15','2026-04-15 17:25:15'),
(1081,4,14,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-15 17:25:16','2026-04-15 17:25:16'),
(1082,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-15 17:50:26','2026-04-15 17:50:26'),
(1083,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-15 17:50:26','2026-04-15 17:50:26'),
(1084,5,NULL,'customer',35,'Quiero hacer un envio','text','sent',NULL,'2026-04-15 17:50:59','2026-04-15 17:50:59'),
(1085,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo calcular una entrega desde \"Quiero hacer un envio\" porque no es un lugar geolocalizado real.\n\nPor favor envía una *ubicación real* usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía tu ubicación actual o selecciona un punto en el mapa\n\n⚠️ No escribas nombres de lugares. Debe ser una ubicación GPS real.','text','sent',NULL,'2026-04-15 17:50:59','2026-04-15 17:50:59'),
(1086,5,NULL,'customer',35,'#ATTACHMENT:location#8R2J+8RG Condominio Marsella, C. Central, Santa Cruz de la Sierra, Bolivia#-17.699846068135#-63.167444206774','text','sent',NULL,'2026-04-15 17:51:46','2026-04-15 17:51:46'),
(1087,5,15,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.699846068135, Lng: -63.167444206774\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-15 17:51:46','2026-04-15 17:51:46'),
(1088,5,15,'customer',35,'#ATTACHMENT:location#3RXJ+WW7, Santa Cruz de la Sierra, Bolivia#-17.901055339949#-63.167815357447','text','sent',NULL,'2026-04-15 17:52:22','2026-04-15 17:52:22'),
(1089,5,15,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 31.3 km\n💰 Costo del servicio: Bs 90.20\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-15 17:52:22','2026-04-15 17:52:22'),
(1090,5,15,'customer',35,'Si','text','sent',NULL,'2026-04-15 17:53:03','2026-04-15 17:53:03'),
(1091,5,15,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-15 17:53:03','2026-04-15 17:53:03'),
(1092,5,15,'customer',35,'O','text','sent',NULL,'2026-04-15 17:53:10','2026-04-15 17:53:10'),
(1093,5,15,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-15 17:53:11','2026-04-15 17:53:11'),
(1094,5,15,'customer',35,'Cancelar','text','sent',NULL,'2026-04-15 18:02:05','2026-04-15 18:02:05'),
(1095,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-15 18:02:05','2026-04-15 18:02:05'),
(1096,5,NULL,'customer',35,'#ATTACHMENT:location#Shared location#-17.8045405#-63.1568273','text','sent',NULL,'2026-04-15 18:05:10','2026-04-15 18:05:10'),
(1097,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-15 18:05:10','2026-04-15 18:05:10'),
(1098,5,NULL,'customer',35,'#ATTACHMENT:location#Nte Interno, Santa Cruz de la Sierra, Bolivia#-17.76345353819#-63.160494267941','text','sent',NULL,'2026-04-15 18:05:26','2026-04-15 18:05:26'),
(1099,5,16,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.76345353819, Lng: -63.160494267941\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-15 18:05:26','2026-04-15 18:05:26'),
(1100,5,16,'customer',35,'#ATTACHMENT:location#C. 2 Nte. 118, Santa Cruz de la Sierra, Bolivia#-17.790055889687#-63.208068609238','text','sent',NULL,'2026-04-15 18:06:39','2026-04-15 18:06:39'),
(1101,5,16,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 8.2 km\n💰 Costo del servicio: Bs 23.55\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-15 18:06:39','2026-04-15 18:06:39'),
(1102,5,16,'customer',35,'Si','text','sent',NULL,'2026-04-15 18:06:57','2026-04-15 18:06:57'),
(1103,5,16,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-15 18:06:57','2026-04-15 18:06:57'),
(1104,5,16,'customer',35,'No','text','sent',NULL,'2026-04-15 18:07:05','2026-04-15 18:07:05'),
(1105,5,16,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-15 18:07:06','2026-04-15 18:07:06'),
(1106,5,16,'customer',35,'#ATTACHMENT:location#Nte Interno, Santa Cruz de la Sierra, Bolivia#-17.76345353819#-63.160494267941','text','sent',NULL,'2026-04-15 19:09:54','2026-04-15 19:09:54'),
(1107,5,16,'system',0,'Buscando mensajeros disponibles... 🚚\n\n(Escribe \'cancelar\' para detener)','text','sent',NULL,'2026-04-15 19:09:54','2026-04-15 19:09:54'),
(1108,5,16,'customer',35,'Cancelar','text','sent',NULL,'2026-04-15 19:16:52','2026-04-15 19:16:52'),
(1109,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-15 19:16:52','2026-04-15 19:16:52'),
(1110,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-15 20:16:23','2026-04-15 20:16:23'),
(1111,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-15 20:16:23','2026-04-15 20:16:23'),
(1112,5,NULL,'customer',35,'#ATTACHMENT:location#Padre José Ramón Hurtado 3130, Santa Cruz de la Sierra, Bolivia#-17.797188616759#-63.156134001911','text','sent',NULL,'2026-04-15 20:18:10','2026-04-15 20:18:10'),
(1113,5,17,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.797188616759, Lng: -63.156134001911\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-15 20:18:10','2026-04-15 20:18:10'),
(1114,5,17,'customer',35,'#ATTACHMENT:location#C. Rogelia Rojo 3150, Santa Cruz de la Sierra, Bolivia#-17.783019931722#-63.149035535753','text','sent',NULL,'2026-04-15 20:18:20','2026-04-15 20:18:20'),
(1115,5,17,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 2.5 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-15 20:18:20','2026-04-15 20:18:20'),
(1116,5,17,'customer',35,'Si','text','sent',NULL,'2026-04-15 20:18:27','2026-04-15 20:18:27'),
(1117,5,17,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-15 20:18:27','2026-04-15 20:18:27'),
(1118,5,17,'customer',35,'No','text','sent',NULL,'2026-04-15 20:18:36','2026-04-15 20:18:36'),
(1119,5,17,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-15 20:18:36','2026-04-15 20:18:36'),
(1120,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Envía tu ubicación GPS real usando WhatsApp (botón adjuntar 📎 → Ubicación 📍)','text','sent',NULL,'2026-04-15 20:47:53','2026-04-15 20:47:53'),
(1121,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-15 20:47:54','2026-04-15 20:47:54'),
(1122,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Dónde recogemos tu paquete? 📍\n\n*IMPORTANTE:* Debes enviar tu ubicación usando el botón de WhatsApp.\n\nCómo hacerlo:\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía tu ubicación actual','text','sent',NULL,'2026-04-15 20:47:54','2026-04-15 20:47:54'),
(1123,5,NULL,'customer',35,'#ATTACHMENT:location#Las Petas 2202, Santa Cruz de la Sierra, Bolivia#-17.776520387321#-63.163156360388','text','sent',NULL,'2026-04-15 20:48:19','2026-04-15 20:48:19'),
(1124,5,18,'system',0,'✅ *Recogida registrada*\n\n📍 Lat: -17.776520387321, Lng: -63.163156360388\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-15 20:48:19','2026-04-15 20:48:19'),
(1125,5,18,'customer',35,'#ATTACHMENT:location#C. M Arteaga 3070, Santa Cruz de la Sierra, Bolivia#-17.797926997191#-63.158194944262','text','sent',NULL,'2026-04-15 20:48:38','2026-04-15 20:48:38'),
(1126,5,18,'system',0,'📊 *Cálculo realizado desde punto GPS real A a punto GPS real B*\n\n📍 Distancia: 3.4 km\n💰 Costo del servicio: Bs 15.00\n\n¿Deseas confirmar el envío? (Responde Sí o No)','text','sent',NULL,'2026-04-15 20:48:38','2026-04-15 20:48:38'),
(1127,5,18,'customer',35,'Si','text','sent',NULL,'2026-04-15 20:49:25','2026-04-15 20:49:25'),
(1128,5,18,'system',0,'¿Te gustaría enviar alguna instrucción al mensajero? (Escribe instrucciones o \'No\')','text','sent',NULL,'2026-04-15 20:49:25','2026-04-15 20:49:25'),
(1129,5,18,'customer',35,'No','text','sent',NULL,'2026-04-15 20:49:33','2026-04-15 20:49:33'),
(1130,5,18,'system',0,'Buscando un mensajero... Por favor espera un momento. 🚚','text','sent',NULL,'2026-04-15 20:49:33','2026-04-15 20:49:33'),
(1131,3,11,'customer',34,'Ok','text','sent',NULL,'2026-04-15 21:13:57','2026-04-15 21:13:57'),
(1132,3,11,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-15 21:13:57','2026-04-15 21:13:57'),
(1133,3,11,'customer',34,'No','text','sent',NULL,'2026-04-15 21:14:05','2026-04-15 21:14:05'),
(1134,3,11,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-15 21:14:06','2026-04-15 21:14:06'),
(1135,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-15 21:14:20','2026-04-15 21:14:20'),
(1136,3,NULL,'customer',34,'#ATTACHMENT:location#Dr. Victorino Rivero 3135, Santa Cruz de la Sierra, Bolivia#-17.794505776888#-63.154383189976','text','sent',NULL,'2026-04-15 21:14:46','2026-04-15 21:14:46'),
(1137,3,19,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-15 21:14:46','2026-04-15 21:14:46'),
(1138,3,19,'customer',34,'#ATTACHMENT:location#Cap. Manuel Valverde 1, Santa Cruz de la Sierra, Bolivia#-17.788439230557#-63.155042342842','text','sent',NULL,'2026-04-15 21:15:03','2026-04-15 21:15:03'),
(1139,3,19,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.0 km\n💵 Costo del servicio: *Bs 15.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-15 21:15:03','2026-04-15 21:15:03'),
(1140,3,19,'customer',34,'Si','text','sent',NULL,'2026-04-15 21:15:12','2026-04-15 21:15:12'),
(1141,3,19,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-15 21:15:12','2026-04-15 21:15:12'),
(1142,3,19,'customer',34,'No','text','sent',NULL,'2026-04-15 21:16:55','2026-04-15 21:16:55'),
(1143,3,19,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-15 21:16:57','2026-04-15 21:16:57'),
(1144,3,NULL,'customer',34,'Estado','text','sent',NULL,'2026-04-15 21:18:17','2026-04-15 21:18:17'),
(1145,3,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-04-15 21:18:17','2026-04-15 21:18:17'),
(1146,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-15 22:17:36','2026-04-15 22:17:36'),
(1147,3,NULL,'customer',34,'#ATTACHMENT:location#6RFP+RH9, Av. Paraguá, Santa Cruz de la Sierra, Bolivia#-17.775488828695#-63.163508400321','text','sent',NULL,'2026-04-15 22:18:17','2026-04-15 22:18:17'),
(1148,3,20,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-15 22:18:17','2026-04-15 22:18:17'),
(1149,3,20,'customer',34,'No sé cómo enviar una ubicación real diferente a mi ubicación actual','text','sent',NULL,'2026-04-15 22:18:46','2026-04-15 22:18:46'),
(1150,3,20,'system',0,'❌ *Destino no válido*\n\n\"No sé cómo enviar una ubicación real diferente a mi ubicación actual\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-15 22:18:46','2026-04-15 22:18:46'),
(1151,3,20,'customer',34,'#ATTACHMENT:location#0000, Santa Cruz de la Sierra, Bolivia#-17.781383734074#-63.156975544989','text','sent',NULL,'2026-04-15 22:19:11','2026-04-15 22:19:11'),
(1152,3,20,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.3 km\n💵 Costo del servicio: *Bs 15.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-15 22:19:11','2026-04-15 22:19:11'),
(1153,3,20,'customer',34,'Si','text','sent',NULL,'2026-04-18 18:33:56','2026-04-18 18:33:56'),
(1154,3,20,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-18 18:34:07','2026-04-18 18:34:07'),
(1155,3,20,'customer',34,'Quiero cancelar','text','sent',NULL,'2026-04-18 18:34:11','2026-04-18 18:34:11'),
(1156,3,20,'customer',34,'Quiero cancelar','text','sent',NULL,'2026-04-18 18:34:22','2026-04-18 18:34:22'),
(1157,3,20,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-18 18:34:22','2026-04-18 18:34:22'),
(1158,3,20,'customer',34,'Quiero cancelar','text','sent',NULL,'2026-04-18 18:34:23','2026-04-18 18:34:23'),
(1159,3,20,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-18 18:34:23','2026-04-18 18:34:23'),
(1160,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-18 18:34:33','2026-04-18 18:34:33'),
(1161,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-20 23:42:54','2026-04-20 23:42:54'),
(1162,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-20 23:42:56','2026-04-20 23:42:56'),
(1163,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-20 23:42:56','2026-04-20 23:42:56'),
(1164,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-20 23:43:19','2026-04-20 23:43:19'),
(1165,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-20 23:43:20','2026-04-20 23:43:20'),
(1166,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-20 23:43:20','2026-04-20 23:43:20'),
(1167,5,NULL,'customer',35,'#ATTACHMENT:location#Lorgio San Vaca 3175, Santa Cruz de la Sierra, Bolivia#-17.793284056222#-63.154462650418','text','sent',NULL,'2026-04-20 23:43:47','2026-04-20 23:43:47'),
(1168,5,56,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-20 23:43:47','2026-04-20 23:43:47'),
(1169,5,56,'customer',35,'#ATTACHMENT:location#591-73114431, Santa Cruz de la Sierra, Bolivia#-17.797157651321#-63.154574632645','text','sent',NULL,'2026-04-20 23:44:14','2026-04-20 23:44:14'),
(1170,5,56,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.0 km\n💵 Costo del servicio: *Bs 15.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-20 23:44:14','2026-04-20 23:44:14'),
(1171,5,56,'customer',35,'Si','text','sent',NULL,'2026-04-20 23:44:32','2026-04-20 23:44:32'),
(1172,5,56,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-20 23:44:32','2026-04-20 23:44:32'),
(1173,5,56,'customer',35,'No','text','sent',NULL,'2026-04-20 23:44:43','2026-04-20 23:44:43'),
(1174,5,56,'customer',35,'No','text','sent',NULL,'2026-04-20 23:44:44','2026-04-20 23:44:44'),
(1175,5,56,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-20 23:44:44','2026-04-20 23:44:44'),
(1176,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-20 23:46:27','2026-04-20 23:46:27'),
(1177,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-20 23:46:43','2026-04-20 23:46:43'),
(1178,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-20 23:46:44','2026-04-20 23:46:44'),
(1179,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-20 23:46:44','2026-04-20 23:46:44'),
(1180,5,NULL,'customer',35,'#ATTACHMENT:location#Padre José Ramón Hurtado 3165-3025, Santa Cruz de la Sierra, Bolivia#-17.7967835118#-63.156120590866','text','sent',NULL,'2026-04-20 23:47:18','2026-04-20 23:47:18'),
(1181,5,57,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-20 23:47:18','2026-04-20 23:47:18'),
(1182,5,57,'customer',35,'#ATTACHMENT:location#6R2V+H26, Capitán Luis de Fuentes, Santa Cruz de la Sierra, Bolivia#-17.79865292465#-63.157456666231','text','sent',NULL,'2026-04-20 23:48:13','2026-04-20 23:48:13'),
(1183,5,57,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.0 km\n💵 Costo del servicio: *Bs 15.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-20 23:48:13','2026-04-20 23:48:13'),
(1184,5,57,'customer',35,'Si','text','sent',NULL,'2026-04-20 23:48:32','2026-04-20 23:48:32'),
(1185,5,57,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-20 23:48:32','2026-04-20 23:48:32'),
(1186,5,57,'customer',35,'No','text','sent',NULL,'2026-04-20 23:48:56','2026-04-20 23:48:56'),
(1187,5,57,'customer',35,'No','text','sent',NULL,'2026-04-20 23:48:58','2026-04-20 23:48:58'),
(1188,5,57,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-20 23:48:58','2026-04-20 23:48:58'),
(1189,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-20 23:49:59','2026-04-20 23:49:59'),
(1190,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-21 17:36:22','2026-04-21 17:36:22'),
(1191,5,NULL,'customer',35,'Hola que necesito para pedir servicio','text','sent',NULL,'2026-04-21 17:36:23','2026-04-21 17:36:23'),
(1192,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola que necesito para pedir servicio\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-21 17:36:23','2026-04-21 17:36:23'),
(1193,5,NULL,'customer',35,'#ATTACHMENT:location#Av. 3 Pasos Al Frente 3075, Santa Cruz de la Sierra, Bolivia#-17.796233154969#-63.156061917543','text','sent',NULL,'2026-04-21 17:36:59','2026-04-21 17:36:59'),
(1194,5,58,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-21 17:36:59','2026-04-21 17:36:59'),
(1195,5,58,'customer',35,'#ATTACHMENT:location#6R4V+M45, Santa Cruz de la Sierra, Bolivia#-17.793291398702#-63.156944699585','text','sent',NULL,'2026-04-21 17:56:54','2026-04-21 17:56:54'),
(1196,5,58,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.0 km\n💵 Costo del servicio: *Bs 15.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-21 17:56:54','2026-04-21 17:56:54'),
(1197,5,58,'customer',35,'Si','text','sent',NULL,'2026-04-21 17:57:17','2026-04-21 17:57:17'),
(1198,5,58,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-21 17:57:17','2026-04-21 17:57:17'),
(1199,5,58,'customer',35,'No','text','sent',NULL,'2026-04-21 18:04:50','2026-04-21 18:04:50'),
(1200,5,58,'customer',35,'No','text','sent',NULL,'2026-04-21 18:04:51','2026-04-21 18:04:51'),
(1201,5,58,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-21 18:04:51','2026-04-21 18:04:51'),
(1202,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-21 18:05:02','2026-04-21 18:05:02'),
(1203,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8045319#-63.1568355','text','sent',NULL,'2026-04-21 18:05:20','2026-04-21 18:05:20'),
(1204,5,59,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-21 18:05:20','2026-04-21 18:05:20'),
(1205,5,59,'customer',35,'#ATTACHMENT:location#3er Anillo Interno, Santa Cruz de la Sierra, Bolivia#-17.7854363687#-63.158756867051','text','sent',NULL,'2026-04-21 18:05:40','2026-04-21 18:05:40'),
(1206,5,59,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 3.0 km\n💵 Costo del servicio: *Bs 15.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-21 18:05:40','2026-04-21 18:05:40'),
(1207,5,59,'customer',35,'Si','text','sent',NULL,'2026-04-21 18:05:56','2026-04-21 18:05:56'),
(1208,5,59,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-21 18:05:56','2026-04-21 18:05:56'),
(1209,5,59,'customer',35,'Puerta roja. Toque timbre por favor. Pregunte por Marcelo','text','sent',NULL,'2026-04-21 18:06:56','2026-04-21 18:06:56'),
(1210,5,59,'customer',35,'Puerta roja. Toque timbre por favor. Pregunte por Marcelo','text','sent',NULL,'2026-04-21 18:06:57','2026-04-21 18:06:57'),
(1211,5,59,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-21 18:06:57','2026-04-21 18:06:57'),
(1212,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-21 18:27:29','2026-04-21 18:27:29'),
(1213,5,NULL,'customer',35,'Ok','text','sent',NULL,'2026-04-21 18:27:43','2026-04-21 18:27:43'),
(1214,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Ok\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-21 18:27:43','2026-04-21 18:27:43'),
(1215,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8045217#-63.1568339','text','sent',NULL,'2026-04-21 18:28:09','2026-04-21 18:28:09'),
(1216,5,60,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-21 18:28:09','2026-04-21 18:28:09'),
(1217,5,60,'customer',35,'#ATTACHMENT:location#6R6R+9XV, Santa Cruz de la Sierra, Bolivia#-17.790194441546#-63.156868591905','text','sent',NULL,'2026-04-21 18:28:28','2026-04-21 18:28:28'),
(1218,5,60,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 2.2 km\n💵 Costo del servicio: *Bs 15.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-21 18:28:28','2026-04-21 18:28:28'),
(1219,5,60,'customer',35,'Si','text','sent',NULL,'2026-04-21 18:28:37','2026-04-21 18:28:37'),
(1220,5,60,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-21 18:28:37','2026-04-21 18:28:37'),
(1221,5,60,'customer',35,'Por favor léeme rkfkdbshsjd','text','sent',NULL,'2026-04-21 18:50:45','2026-04-21 18:50:45'),
(1222,5,NULL,'customer',35,'Ok','text','sent',NULL,'2026-04-21 18:50:56','2026-04-21 18:50:56'),
(1223,5,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-04-21 18:50:56','2026-04-21 18:50:56'),
(1224,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-21 18:51:10','2026-04-21 18:51:10'),
(1225,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-21 18:51:11','2026-04-21 18:51:11'),
(1226,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-21 18:51:11','2026-04-21 18:51:11'),
(1227,5,NULL,'customer',35,'#ATTACHMENT:location#Padre José Ramón Hurtado 3025, Santa Cruz de la Sierra, Bolivia#-17.796236985765#-63.156471960247','text','sent',NULL,'2026-04-21 18:51:31','2026-04-21 18:51:31'),
(1228,5,61,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-21 18:51:31','2026-04-21 18:51:31'),
(1229,5,61,'customer',35,'#ATTACHMENT:location#Avenue Principal 136, Santa Cruz de la Sierra, Bolivia#-17.745787221555#-63.169578909874','text','sent',NULL,'2026-04-21 18:52:01','2026-04-21 18:52:01'),
(1230,5,61,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 8.1 km\n💵 Costo del servicio: *Bs 23.30*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-21 18:52:01','2026-04-21 18:52:01'),
(1231,5,61,'customer',35,'Si','text','sent',NULL,'2026-04-21 18:52:16','2026-04-21 18:52:16'),
(1232,5,61,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-21 18:52:16','2026-04-21 18:52:16'),
(1233,5,61,'customer',35,'INSTRUCCIONES ALFA','text','sent',NULL,'2026-04-21 18:52:34','2026-04-21 18:52:34'),
(1234,5,NULL,'customer',35,'Ok','text','sent',NULL,'2026-04-21 18:55:08','2026-04-21 18:55:08'),
(1235,5,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-04-21 18:55:08','2026-04-21 18:55:08'),
(1236,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-21 18:55:23','2026-04-21 18:55:23'),
(1237,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-21 18:55:24','2026-04-21 18:55:24'),
(1238,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-21 18:55:24','2026-04-21 18:55:24'),
(1239,5,NULL,'customer',35,'1','text','sent',NULL,'2026-04-21 18:55:31','2026-04-21 18:55:31'),
(1240,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"1\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-21 18:55:31','2026-04-21 18:55:31'),
(1241,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044963#-63.1567857','text','sent',NULL,'2026-04-21 18:55:40','2026-04-21 18:55:40'),
(1242,5,62,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-21 18:55:40','2026-04-21 18:55:40'),
(1243,5,62,'customer',35,'#ATTACHMENT:location#Padre José Ramón Hurtado 3065, Santa Cruz de la Sierra, Bolivia#-17.796800431095#-63.155897632241','text','sent',NULL,'2026-04-21 18:55:57','2026-04-21 18:55:57'),
(1244,5,62,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.2 km\n💵 Costo del servicio: *Bs 15.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-21 18:55:57','2026-04-21 18:55:57'),
(1245,5,62,'customer',35,'Si','text','sent',NULL,'2026-04-21 18:56:09','2026-04-21 18:56:09'),
(1246,5,62,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-21 18:56:09','2026-04-21 18:56:09'),
(1247,5,62,'customer',35,'No','text','sent',NULL,'2026-04-21 18:56:19','2026-04-21 18:56:19'),
(1248,5,NULL,'customer',35,'Ok','text','sent',NULL,'2026-04-21 18:56:49','2026-04-21 18:56:49'),
(1249,5,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-04-21 18:56:49','2026-04-21 18:56:49'),
(1250,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-21 18:57:05','2026-04-21 18:57:05'),
(1251,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-21 18:57:05','2026-04-21 18:57:05'),
(1252,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-21 18:57:05','2026-04-21 18:57:05'),
(1253,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8045221#-63.1568299','text','sent',NULL,'2026-04-21 19:01:28','2026-04-21 19:01:28'),
(1254,5,63,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-21 19:01:28','2026-04-21 19:01:28'),
(1255,5,63,'customer',35,'#ATTACHMENT:location#7RFQ+5GR, Santa Cruz de la Sierra, Bolivia#-17.726874951756#-63.161152414978','text','sent',NULL,'2026-04-21 19:01:51','2026-04-21 19:01:51'),
(1256,5,63,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 12.1 km\n💵 Costo del servicio: *Bs 34.86*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-21 19:01:51','2026-04-21 19:01:51'),
(1257,5,63,'customer',35,'Si','text','sent',NULL,'2026-04-21 19:02:03','2026-04-21 19:02:03'),
(1258,5,63,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-21 19:02:03','2026-04-21 19:02:03'),
(1259,5,63,'customer',35,'No','text','sent',NULL,'2026-04-21 19:02:13','2026-04-21 19:02:13'),
(1260,5,63,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-21 19:02:13','2026-04-21 19:02:13'),
(1261,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-21 19:13:51','2026-04-21 19:13:51'),
(1262,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-21 19:13:52','2026-04-21 19:13:52'),
(1263,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-21 19:13:52','2026-04-21 19:13:52'),
(1264,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8045262#-63.1568307','text','sent',NULL,'2026-04-21 19:14:51','2026-04-21 19:14:51'),
(1265,5,64,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-21 19:14:51','2026-04-21 19:14:51'),
(1266,5,64,'customer',35,'#ATTACHMENT:location#10260, Santa Cruz de la Sierra, Bolivia#-17.78939601104#-63.156811594963','text','sent',NULL,'2026-04-21 19:18:56','2026-04-21 19:18:56'),
(1267,5,64,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 2.4 km\n💵 Costo del servicio: *Bs 15.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-21 19:18:56','2026-04-21 19:18:56'),
(1268,5,64,'customer',35,'Si','text','sent',NULL,'2026-04-21 20:00:02','2026-04-21 20:00:02'),
(1269,5,64,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-21 20:00:02','2026-04-21 20:00:02'),
(1270,5,64,'customer',35,'Grsxjh jghj bue','text','sent',NULL,'2026-04-21 20:00:18','2026-04-21 20:00:18'),
(1271,5,64,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-21 20:00:18','2026-04-21 20:00:18'),
(1272,5,NULL,'customer',35,'Ok','text','sent',NULL,'2026-04-21 20:28:43','2026-04-21 20:28:43'),
(1273,5,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-04-21 20:28:43','2026-04-21 20:28:43'),
(1274,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-21 20:28:50','2026-04-21 20:28:50'),
(1275,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-21 20:28:50','2026-04-21 20:28:50'),
(1276,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-21 20:28:50','2026-04-21 20:28:50'),
(1277,5,NULL,'customer',35,'#ATTACHMENT:location#Av Virgen De Cotoca 3895, Santa Cruz de la Sierra, Bolivia#-17.7807675621#-63.151852525771','text','sent',NULL,'2026-04-21 20:29:24','2026-04-21 20:29:24'),
(1278,5,65,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-21 20:29:24','2026-04-21 20:29:24'),
(1279,5,65,'customer',35,'#ATTACHMENT:location#Ave 18 De Marzo 3, Santa Cruz de la Sierra, Bolivia#-17.736919719126#-63.168746754527','text','sent',NULL,'2026-04-21 20:29:58','2026-04-21 20:29:58'),
(1280,5,65,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 7.3 km\n💵 Costo del servicio: *Bs 20.94*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-21 20:29:58','2026-04-21 20:29:58'),
(1281,5,65,'customer',35,'Si','text','sent',NULL,'2026-04-21 20:30:11','2026-04-21 20:30:11'),
(1282,5,65,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-21 20:30:11','2026-04-21 20:30:11'),
(1283,5,65,'customer',35,'RONSOCO SKA','text','sent',NULL,'2026-04-21 20:30:33','2026-04-21 20:30:33'),
(1284,5,65,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-21 20:30:34','2026-04-21 20:30:34'),
(1285,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-21 20:36:04','2026-04-21 20:36:04'),
(1286,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-21 20:36:04','2026-04-21 20:36:04'),
(1287,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-21 20:36:04','2026-04-21 20:36:04'),
(1288,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8043923#-63.1566853','text','sent',NULL,'2026-04-21 20:36:23','2026-04-21 20:36:23'),
(1289,5,66,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-21 20:36:23','2026-04-21 20:36:23'),
(1290,5,66,'customer',35,'#ATTACHMENT:location#Fernando Paticu 2530, Santa Cruz de la Sierra, Bolivia#-17.783150826886#-63.158770948648','text','sent',NULL,'2026-04-21 20:37:33','2026-04-21 20:37:33'),
(1291,5,66,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 3.3 km\n💵 Costo del servicio: *Bs 15.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-21 20:37:33','2026-04-21 20:37:33'),
(1292,5,66,'customer',35,'No','text','sent',NULL,'2026-04-21 20:37:42','2026-04-21 20:37:42'),
(1293,5,NULL,'system',0,'❌ *Solicitud cancelada*\n\nTu solicitud de entrega ha sido cancelada.\n\nEnvía *HOLA* para comenzar una nueva solicitud.','text','sent',NULL,'2026-04-21 20:37:42','2026-04-21 20:37:42'),
(1294,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-21 20:37:56','2026-04-21 20:37:56'),
(1295,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-21 20:37:56','2026-04-21 20:37:56'),
(1296,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-21 20:37:56','2026-04-21 20:37:56'),
(1297,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8041631#-63.1568526','text','sent',NULL,'2026-04-21 20:38:09','2026-04-21 20:38:09'),
(1298,5,67,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-21 20:38:09','2026-04-21 20:38:09'),
(1299,5,67,'customer',35,'#ATTACHMENT:location#123, Santa Cruz de la Sierra, Bolivia#-17.784728904209#-63.159233629704','text','sent',NULL,'2026-04-21 20:38:35','2026-04-21 20:38:35'),
(1300,5,67,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 3.1 km\n💵 Costo del servicio: *Bs 15.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-21 20:38:35','2026-04-21 20:38:35'),
(1301,5,67,'customer',35,'Si','text','sent',NULL,'2026-04-21 20:38:47','2026-04-21 20:38:47'),
(1302,5,67,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-21 20:38:47','2026-04-21 20:38:47'),
(1303,5,67,'customer',35,'No','text','sent',NULL,'2026-04-21 20:39:13','2026-04-21 20:39:13'),
(1304,5,67,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-21 20:39:14','2026-04-21 20:39:14'),
(1305,5,67,'customer',35,'Estado','text','sent',NULL,'2026-04-21 20:40:44','2026-04-21 20:40:44'),
(1306,5,67,'system',0,'⏳ *Buscando mensajero...*\n\nTodavía estamos buscando un mensajero disponible.\n\nTiempo restante: aproximadamente 5 minutos desde que iniciaste la búsqueda.\n\nEscribe *CANCELAR* si deseas detener la búsqueda.','text','sent',NULL,'2026-04-21 20:40:44','2026-04-21 20:40:44'),
(1307,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-21 20:41:33','2026-04-21 20:41:33'),
(1308,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8041526#-63.1568536','text','sent',NULL,'2026-04-21 20:41:46','2026-04-21 20:41:46'),
(1309,5,68,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-21 20:41:46','2026-04-21 20:41:46'),
(1310,5,68,'customer',35,'#ATTACHMENT:location#Pasteleria para ti#-17.80445157#-63.15699626','text','sent',NULL,'2026-04-21 20:42:14','2026-04-21 20:42:14'),
(1311,5,68,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-21 20:42:14','2026-04-21 20:42:14'),
(1312,5,68,'customer',35,'#ATTACHMENT:location#7R6H+5RM, Santa Cruz de la Sierra, Bolivia#-17.739745526774#-63.170513659716','text','sent',NULL,'2026-04-21 20:42:39','2026-04-21 20:42:39'),
(1313,5,68,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 10.2 km\n💵 Costo del servicio: *Bs 29.46*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-21 20:42:39','2026-04-21 20:42:39'),
(1314,5,68,'customer',35,'Si','text','sent',NULL,'2026-04-21 20:42:55','2026-04-21 20:42:55'),
(1315,5,68,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-21 20:42:55','2026-04-21 20:42:55'),
(1316,5,68,'customer',35,'CALLAU PACHECO','text','sent',NULL,'2026-04-21 20:43:18','2026-04-21 20:43:18'),
(1317,5,68,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-21 20:43:19','2026-04-21 20:43:19'),
(1318,4,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-23 16:33:48','2026-04-23 16:33:48'),
(1319,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-23 19:47:41','2026-04-23 19:47:41'),
(1320,5,NULL,'customer',35,'Hey','text','sent',NULL,'2026-04-23 19:47:42','2026-04-23 19:47:42'),
(1321,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hey\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-23 19:47:42','2026-04-23 19:47:42'),
(1322,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8045216#-63.1568376','text','sent',NULL,'2026-04-23 19:48:09','2026-04-23 19:48:09'),
(1323,5,70,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-23 19:48:09','2026-04-23 19:48:09'),
(1324,5,70,'customer',35,'#ATTACHMENT:location#Av Sta Gema 2015, Santa Cruz de la Sierra, Bolivia#-17.722299468443#-63.157790601254','text','sent',NULL,'2026-04-23 19:48:24','2026-04-23 19:48:24'),
(1325,5,70,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 12.8 km\n💵 Costo del servicio: *Bs 36.87*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-23 19:48:24','2026-04-23 19:48:24'),
(1326,5,70,'customer',35,'Si','text','sent',NULL,'2026-04-23 19:48:36','2026-04-23 19:48:36'),
(1327,5,70,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-23 19:48:36','2026-04-23 19:48:36'),
(1328,5,70,'customer',35,'Loli','text','sent',NULL,'2026-04-23 19:48:59','2026-04-23 19:48:59'),
(1329,5,70,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-23 19:48:59','2026-04-23 19:48:59'),
(1330,5,70,'customer',35,'Estado','text','sent',NULL,'2026-04-23 19:50:26','2026-04-23 19:50:26'),
(1331,5,70,'system',0,'⏳ *Buscando mensajero...*\n\nTodavía estamos buscando un mensajero disponible.\n\nTiempo restante: aproximadamente 5 minutos desde que iniciaste la búsqueda.\n\nEscribe *CANCELAR* si deseas detener la búsqueda.','text','sent',NULL,'2026-04-23 19:50:26','2026-04-23 19:50:26'),
(1332,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-23 19:50:37','2026-04-23 19:50:37'),
(1333,5,NULL,'customer',35,'#ATTACHMENT:location#Av. Beni SN, Santa Cruz de la Sierra, Bolivia#-17.730477579645#-63.159196414053','text','sent',NULL,'2026-04-23 19:50:57','2026-04-23 19:50:57'),
(1334,5,71,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-23 19:50:57','2026-04-23 19:50:57'),
(1335,5,71,'customer',35,'#ATTACHMENT:location#4RGF+FV, Santa Cruz de la Sierra, Bolivia#-17.874006878107#-63.176473528147','text','sent',NULL,'2026-04-23 19:51:14','2026-04-23 19:51:14'),
(1336,5,71,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 22.5 km\n💵 Costo del servicio: *Bs 64.77*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-23 19:51:14','2026-04-23 19:51:14'),
(1337,5,71,'customer',35,'Si','text','sent',NULL,'2026-04-23 19:51:25','2026-04-23 19:51:25'),
(1338,5,71,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-23 19:51:25','2026-04-23 19:51:25'),
(1339,5,71,'customer',35,'Chosfyjj','text','sent',NULL,'2026-04-23 19:51:31','2026-04-23 19:51:31'),
(1340,5,71,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-23 19:51:32','2026-04-23 19:51:32'),
(1341,5,71,'customer',35,'Hey','text','sent',NULL,'2026-04-23 19:52:08','2026-04-23 19:52:08'),
(1342,5,71,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-23 19:52:08','2026-04-23 19:52:08'),
(1343,5,71,'customer',35,'Estado','text','sent',NULL,'2026-04-23 19:52:13','2026-04-23 19:52:13'),
(1344,5,71,'system',0,'⏳ *Buscando mensajero...*\n\nTodavía estamos buscando un mensajero disponible.\n\nTiempo restante: aproximadamente 5 minutos desde que iniciaste la búsqueda.\n\nEscribe *CANCELAR* si deseas detener la búsqueda.','text','sent',NULL,'2026-04-23 19:52:13','2026-04-23 19:52:13'),
(1345,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-23 19:52:41','2026-04-23 19:52:41'),
(1346,5,NULL,'customer',35,'#ATTACHMENT:location#6R6V+C83, Cap. M. Montenegro, Santa Cruz de la Sierra, Bolivia#-17.788363249772#-63.157499246299','text','sent',NULL,'2026-04-23 19:53:55','2026-04-23 19:53:55'),
(1347,5,72,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-23 19:53:55','2026-04-23 19:53:55'),
(1348,5,72,'customer',35,'#ATTACHMENT:location#Calle 8 56, Santa Cruz de la Sierra, Bolivia#-17.832514444393#-63.177719078958','text','sent',NULL,'2026-04-23 19:55:04','2026-04-23 19:55:04'),
(1349,5,72,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 7.5 km\n💵 Costo del servicio: *Bs 21.59*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-23 19:55:04','2026-04-23 19:55:04'),
(1350,5,72,'customer',35,'Frrh','text','sent',NULL,'2026-04-23 19:55:19','2026-04-23 19:55:19'),
(1351,5,72,'system',0,'Por favor responde:\n✅ *SÍ* - Para confirmar el envío\n❌ *NO* - Para cancelar','text','sent',NULL,'2026-04-23 19:55:19','2026-04-23 19:55:19'),
(1352,5,72,'customer',35,'Si','text','sent',NULL,'2026-04-23 19:55:27','2026-04-23 19:55:27'),
(1353,5,72,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-23 19:55:27','2026-04-23 19:55:27'),
(1354,5,72,'customer',35,'Eyehege','text','sent',NULL,'2026-04-23 19:55:34','2026-04-23 19:55:34'),
(1355,5,72,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-23 19:55:34','2026-04-23 19:55:34'),
(1356,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-23 19:56:48','2026-04-23 19:56:48'),
(1357,5,NULL,'customer',35,'#ATTACHMENT:location#Ave Centinelas Del Chaco 113, Santa Cruz de la Sierra, Bolivia#-17.82137832339#-63.165989108384','text','sent',NULL,'2026-04-23 19:57:06','2026-04-23 19:57:06'),
(1358,5,73,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-23 19:57:06','2026-04-23 19:57:06'),
(1359,5,73,'customer',35,'#ATTACHMENT:location#San Joaquin 2320, Santa Cruz de la Sierra, Bolivia#-17.77971399888#-63.161164484918','text','sent',NULL,'2026-04-23 19:57:22','2026-04-23 19:57:22'),
(1360,5,73,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 6.5 km\n💵 Costo del servicio: *Bs 18.79*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-23 19:57:22','2026-04-23 19:57:22'),
(1361,5,73,'customer',35,'Si','text','sent',NULL,'2026-04-23 19:57:31','2026-04-23 19:57:31'),
(1362,5,73,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-23 19:57:31','2026-04-23 19:57:31'),
(1363,5,73,'customer',35,'No','text','sent',NULL,'2026-04-23 19:57:39','2026-04-23 19:57:39'),
(1364,5,73,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-23 19:57:40','2026-04-23 19:57:40'),
(1365,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-23 19:58:50','2026-04-23 19:58:50'),
(1366,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.777976244516#-63.159379139543','text','sent',NULL,'2026-04-23 19:59:17','2026-04-23 19:59:17'),
(1367,5,74,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-23 19:59:17','2026-04-23 19:59:17'),
(1368,5,74,'customer',35,'#ATTACHMENT:location#5RGQ+G5M, Cuarto Anillo, Santa Cruz de la Sierra, Bolivia#-17.823808923364#-63.161685839295','text','sent',NULL,'2026-04-23 19:59:33','2026-04-23 19:59:33'),
(1369,5,74,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 7.1 km\n💵 Costo del servicio: *Bs 20.57*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-23 19:59:33','2026-04-23 19:59:33'),
(1370,5,74,'customer',35,'Su','text','sent',NULL,'2026-04-23 19:59:40','2026-04-23 19:59:40'),
(1371,5,74,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-23 19:59:40','2026-04-23 19:59:40'),
(1372,5,74,'customer',35,'No','text','sent',NULL,'2026-04-23 19:59:50','2026-04-23 19:59:50'),
(1373,5,74,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-23 19:59:50','2026-04-23 19:59:50'),
(1374,5,74,'customer',35,'H','text','sent',NULL,'2026-04-23 20:12:45','2026-04-23 20:12:45'),
(1375,5,74,'system',0,'✅ *Entrega completada*\n\n📍 Origen: https://www.google.com/maps?q=-17.777976244516,-63.159379139543\n📦 Destino: https://www.google.com/maps?q=-17.823808923364,-63.161685839295\n👤 Mensajero: prueba\n💰 Total: Bs 20.57\n\n¡Gracias por usar Delivery Avaroa! 🚚\n\nEnvía *HOLA* para realizar otra entrega.','text','sent',NULL,'2026-04-23 20:12:45','2026-04-23 20:12:45'),
(1376,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-23 20:12:55','2026-04-23 20:12:55'),
(1377,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-23 20:12:56','2026-04-23 20:12:56'),
(1378,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-23 20:12:56','2026-04-23 20:12:56'),
(1379,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8045327#-63.1568403','text','sent',NULL,'2026-04-23 20:13:11','2026-04-23 20:13:11'),
(1380,5,75,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-23 20:13:11','2026-04-23 20:13:11'),
(1381,5,75,'customer',35,'#ATTACHMENT:location#6R3V+Q7H, Av. Tres Pasos Al Frente, Santa Cruz de la Sierra, Bolivia#-17.795659492359#-63.156767338514','text','sent',NULL,'2026-04-23 20:13:34','2026-04-23 20:13:34'),
(1382,5,75,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.4 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-23 20:13:34','2026-04-23 20:13:34'),
(1383,5,75,'customer',35,'Si','text','sent',NULL,'2026-04-23 20:13:43','2026-04-23 20:13:43'),
(1384,5,75,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-23 20:13:43','2026-04-23 20:13:43'),
(1385,5,75,'customer',35,'Hola','text','sent',NULL,'2026-04-23 20:13:51','2026-04-23 20:13:51'),
(1386,5,75,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-23 20:13:52','2026-04-23 20:13:52'),
(1387,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-23 20:14:44','2026-04-23 20:14:44'),
(1388,5,NULL,'customer',35,'#ATTACHMENT:location#6R3R+PWF, Av. 3 Pasos Al Frente, Santa Cruz de la Sierra, Bolivia#-17.795609691846#-63.157610557973','text','sent',NULL,'2026-04-23 20:15:01','2026-04-23 20:15:01'),
(1389,5,76,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-23 20:15:01','2026-04-23 20:15:01'),
(1390,5,76,'customer',35,'#ATTACHMENT:location#Gobernador Seoane 149, Santa Cruz de la Sierra, Bolivia#-17.805228594757#-63.188527040184','text','sent',NULL,'2026-04-23 20:15:20','2026-04-23 20:15:20'),
(1391,5,76,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 4.8 km\n💵 Costo del servicio: *Bs 13.88*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-23 20:15:21','2026-04-23 20:15:21'),
(1392,5,76,'customer',35,'Si','text','sent',NULL,'2026-04-23 20:16:16','2026-04-23 20:16:16'),
(1393,5,76,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-23 20:16:16','2026-04-23 20:16:16'),
(1394,5,76,'customer',35,'No','text','sent',NULL,'2026-04-23 20:16:20','2026-04-23 20:16:20'),
(1395,5,76,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-23 20:16:21','2026-04-23 20:16:21'),
(1396,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-27 17:58:15','2026-04-27 17:58:15'),
(1397,3,NULL,'customer',34,'Hola','text','sent',NULL,'2026-04-27 17:58:16','2026-04-27 17:58:16'),
(1398,3,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-27 17:58:16','2026-04-27 17:58:16'),
(1399,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-27 18:03:11','2026-04-27 18:03:11'),
(1400,3,NULL,'customer',34,'Hola','text','sent',NULL,'2026-04-27 18:03:12','2026-04-27 18:03:12'),
(1401,3,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-27 18:03:12','2026-04-27 18:03:12'),
(1402,3,NULL,'customer',34,'Haces taxi?','text','sent',NULL,'2026-04-27 18:07:26','2026-04-27 18:07:26'),
(1403,3,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Haces taxi?\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-27 18:07:26','2026-04-27 18:07:26'),
(1404,3,NULL,'customer',34,'#ATTACHMENT:location#Ubicación compartida#-17.8044085#-63.1567947','text','sent',NULL,'2026-04-27 18:07:46','2026-04-27 18:07:46'),
(1405,3,77,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-27 18:07:46','2026-04-27 18:07:46'),
(1406,3,77,'customer',34,'#ATTACHMENT:location#C. M Arteaga 3070, Santa Cruz de la Sierra, Bolivia#-17.798222284662#-63.157981038094','text','sent',NULL,'2026-04-27 18:09:37','2026-04-27 18:09:37'),
(1407,3,77,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.0 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-27 18:09:37','2026-04-27 18:09:37'),
(1408,3,77,'customer',34,'Si','text','sent',NULL,'2026-04-27 18:09:46','2026-04-27 18:09:46'),
(1409,3,77,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-27 18:09:46','2026-04-27 18:09:46'),
(1410,3,77,'customer',34,'Noufery','text','sent',NULL,'2026-04-27 18:09:57','2026-04-27 18:09:57'),
(1411,3,77,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-27 18:09:59','2026-04-27 18:09:59'),
(1412,3,77,'customer',34,'Noufery','text','sent',NULL,'2026-04-27 18:09:59','2026-04-27 18:09:59'),
(1413,3,77,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-27 18:09:59','2026-04-27 18:09:59'),
(1414,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-27 18:51:23','2026-04-27 18:51:23'),
(1415,3,NULL,'customer',34,'Hola','text','sent',NULL,'2026-04-27 18:51:25','2026-04-27 18:51:25'),
(1416,3,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-27 18:51:25','2026-04-27 18:51:25'),
(1417,3,NULL,'customer',34,'#ATTACHMENT:location#Ubicación compartida#-17.80751#-63.156305','text','sent',NULL,'2026-04-27 20:50:24','2026-04-27 20:50:24'),
(1418,3,78,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-27 20:50:24','2026-04-27 20:50:24'),
(1419,3,78,'customer',34,'#ATTACHMENT:location#5RXW+V2C Plaza De La Estacion Argentina, Santa Cruz de la Sierra, Bolivia#-17.800501249047#-63.155147619545','text','sent',NULL,'2026-04-27 20:53:01','2026-04-27 20:53:01'),
(1420,3,78,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.1 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-27 20:53:01','2026-04-27 20:53:01'),
(1421,3,78,'customer',34,'Si','text','sent',NULL,'2026-04-27 20:53:08','2026-04-27 20:53:08'),
(1422,3,78,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-27 20:53:08','2026-04-27 20:53:08'),
(1423,3,78,'customer',34,'No','text','sent',NULL,'2026-04-27 20:53:15','2026-04-27 20:53:15'),
(1424,3,78,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-27 20:53:16','2026-04-27 20:53:16'),
(1425,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-27 20:55:04','2026-04-27 20:55:04'),
(1426,3,NULL,'customer',34,'#ATTACHMENT:location#Ubicación compartida#-17.8075274#-63.1562549','text','sent',NULL,'2026-04-27 20:55:15','2026-04-27 20:55:15'),
(1427,3,79,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-27 20:55:15','2026-04-27 20:55:15'),
(1428,3,79,'customer',34,'#ATTACHMENT:location#6R2R+4V7, Santa Cruz de la Sierra, Bolivia#-17.79979959033#-63.157999813557','text','sent',NULL,'2026-04-27 20:55:31','2026-04-27 20:55:31'),
(1429,3,79,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.2 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-27 20:55:31','2026-04-27 20:55:31'),
(1430,3,79,'customer',34,'Si','text','sent',NULL,'2026-04-27 20:55:38','2026-04-27 20:55:38'),
(1431,3,79,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-27 20:55:38','2026-04-27 20:55:38'),
(1432,3,79,'customer',34,'No','text','sent',NULL,'2026-04-27 20:55:44','2026-04-27 20:55:44'),
(1433,3,79,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-27 20:55:45','2026-04-27 20:55:45'),
(1434,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 00:49:05','2026-04-28 00:49:05'),
(1435,3,NULL,'customer',34,'Hola','text','sent',NULL,'2026-04-28 00:49:06','2026-04-28 00:49:06'),
(1436,3,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 00:49:06','2026-04-28 00:49:06'),
(1437,3,NULL,'customer',34,'#ATTACHMENT:location#6RGM+JGX, Av. Japón, Santa Cruz de la Sierra, Bolivia#-17.773444530731#-63.165953569114','text','sent',NULL,'2026-04-28 00:49:33','2026-04-28 00:49:33'),
(1438,3,80,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 00:49:33','2026-04-28 00:49:33'),
(1439,3,80,'customer',34,'#ATTACHMENT:location#Elda Viera 4130, Santa Cruz de la Sierra, Bolivia#-17.74553527546#-63.165669925511','text','sent',NULL,'2026-04-28 00:50:04','2026-04-28 00:50:04'),
(1440,3,80,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 4.3 km\n💵 Costo del servicio: *Bs 12.51*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 00:50:04','2026-04-28 00:50:04'),
(1441,3,80,'customer',34,'Si','text','sent',NULL,'2026-04-28 00:50:24','2026-04-28 00:50:24'),
(1442,3,80,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-28 00:50:24','2026-04-28 00:50:24'),
(1443,3,80,'customer',34,'No','text','sent',NULL,'2026-04-28 00:50:39','2026-04-28 00:50:39'),
(1444,3,80,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-28 00:50:40','2026-04-28 00:50:40'),
(1445,6,NULL,'customer',36,'....','text','sent',NULL,'2026-04-28 01:03:06','2026-04-28 01:03:06'),
(1446,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 01:03:06','2026-04-28 01:03:06'),
(1447,6,NULL,'customer',36,'Debe poner AVAROA','text','sent',NULL,'2026-04-28 01:04:58','2026-04-28 01:04:58'),
(1448,6,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Debe poner AVAROA\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 01:04:58','2026-04-28 01:04:58'),
(1449,6,NULL,'customer',36,'Móvil delivery cuorrier','text','sent',NULL,'2026-04-28 01:05:35','2026-04-28 01:05:35'),
(1450,6,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Móvil delivery cuorrier\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 01:05:35','2026-04-28 01:05:35'),
(1451,7,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 01:46:12','2026-04-28 01:46:12'),
(1452,7,NULL,'customer',37,'Buenas tardes','text','sent',NULL,'2026-04-28 01:46:13','2026-04-28 01:46:13'),
(1453,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buenas tardes\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 01:46:13','2026-04-28 01:46:13'),
(1454,7,NULL,'customer',37,'Delivery','text','sent',NULL,'2026-04-28 01:46:14','2026-04-28 01:46:14'),
(1455,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Delivery\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 01:46:14','2026-04-28 01:46:14'),
(1456,8,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 01:46:28','2026-04-28 01:46:28'),
(1457,8,NULL,'customer',38,'Buenas tardes','text','sent',NULL,'2026-04-28 01:46:29','2026-04-28 01:46:29'),
(1458,8,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buenas tardes\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 01:46:29','2026-04-28 01:46:29'),
(1459,7,NULL,'customer',37,'#ATTACHMENT:location#Ubicación compartida#-21.5348176#-64.7487192','text','sent',NULL,'2026-04-28 01:46:59','2026-04-28 01:46:59'),
(1460,7,81,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 01:46:59','2026-04-28 01:46:59'),
(1461,7,81,'customer',37,'#ATTACHMENT:location#Ubicación compartida#-21.535064697266#-64.738014221191','text','sent',NULL,'2026-04-28 01:48:01','2026-04-28 01:48:01'),
(1462,7,81,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.6 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 01:48:01','2026-04-28 01:48:01'),
(1463,8,NULL,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5348877#-64.7486916','text','sent',NULL,'2026-04-28 01:48:25','2026-04-28 01:48:25'),
(1464,8,82,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 01:48:25','2026-04-28 01:48:25'),
(1465,7,81,'customer',37,'Si','text','sent',NULL,'2026-04-28 01:49:08','2026-04-28 01:49:08'),
(1466,7,81,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-28 01:49:08','2026-04-28 01:49:08'),
(1467,7,81,'customer',37,'No','text','sent',NULL,'2026-04-28 01:49:21','2026-04-28 01:49:21'),
(1468,7,81,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-28 01:49:22','2026-04-28 01:49:22'),
(1469,8,82,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5197171#-64.73709','text','sent',NULL,'2026-04-28 01:50:14','2026-04-28 01:50:14'),
(1470,8,82,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 2.9 km\n💵 Costo del servicio: *Bs 8.35*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 01:50:14','2026-04-28 01:50:14'),
(1471,8,82,'customer',38,'[image message]','text','sent',NULL,'2026-04-28 01:50:18','2026-04-28 01:50:18'),
(1472,8,82,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-28 01:50:18','2026-04-28 01:50:18'),
(1473,8,82,'customer',38,'Si','text','sent',NULL,'2026-04-28 01:52:50','2026-04-28 01:52:50'),
(1474,8,82,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-28 01:52:51','2026-04-28 01:52:51'),
(1475,8,82,'customer',38,'[contacts message]','text','sent',NULL,'2026-04-28 01:53:07','2026-04-28 01:53:07'),
(1476,8,82,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-28 01:53:07','2026-04-28 01:53:07'),
(1477,9,NULL,'customer',39,'Una Motito Porfavor','text','sent',NULL,'2026-04-28 01:53:51','2026-04-28 01:53:51'),
(1478,9,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 01:53:51','2026-04-28 01:53:51'),
(1479,9,NULL,'customer',39,'#ATTACHMENT:location#Ubicación compartida#-21.534812927246#-64.748611450195','text','sent',NULL,'2026-04-28 01:54:14','2026-04-28 01:54:14'),
(1480,9,83,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 01:54:14','2026-04-28 01:54:14'),
(1481,8,82,'customer',38,'Movil','text','sent',NULL,'2026-04-28 01:54:45','2026-04-28 01:54:45'),
(1482,8,82,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-28 01:54:45','2026-04-28 01:54:45'),
(1483,9,83,'customer',39,'#ATTACHMENT:location#Ubicación compartida#-21.545608520508#-64.761993408203','text','sent',NULL,'2026-04-28 01:55:10','2026-04-28 01:55:10'),
(1484,9,83,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 2.6 km\n💵 Costo del servicio: *Bs 7.39*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 01:55:10','2026-04-28 01:55:10'),
(1485,8,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 01:56:22','2026-04-28 01:56:22'),
(1486,7,NULL,'customer',37,'Ok','text','sent',NULL,'2026-04-28 01:57:11','2026-04-28 01:57:11'),
(1487,7,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-04-28 01:57:11','2026-04-28 01:57:11'),
(1488,8,NULL,'customer',38,'Movil','text','sent',NULL,'2026-04-28 01:59:00','2026-04-28 01:59:00'),
(1489,8,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Movil\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 01:59:00','2026-04-28 01:59:00'),
(1490,7,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 01:59:50','2026-04-28 01:59:50'),
(1491,7,NULL,'customer',37,'Buenas tardes','text','sent',NULL,'2026-04-28 01:59:51','2026-04-28 01:59:51'),
(1492,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buenas tardes\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 01:59:51','2026-04-28 01:59:51'),
(1493,7,NULL,'customer',37,'Un móvil','text','sent',NULL,'2026-04-28 01:59:52','2026-04-28 01:59:52'),
(1494,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Un móvil\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 01:59:52','2026-04-28 01:59:52'),
(1495,9,83,'customer',39,'Móvil','text','sent',NULL,'2026-04-28 02:00:04','2026-04-28 02:00:04'),
(1496,9,83,'system',0,'Por favor responde:\n✅ *SÍ* - Para confirmar el envío\n❌ *NO* - Para cancelar','text','sent',NULL,'2026-04-28 02:00:04','2026-04-28 02:00:04'),
(1497,8,NULL,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5350997#-64.7487816','text','sent',NULL,'2026-04-28 02:00:07','2026-04-28 02:00:07'),
(1498,8,84,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 02:00:07','2026-04-28 02:00:07'),
(1499,9,83,'customer',39,'Móvil Porfavor','text','sent',NULL,'2026-04-28 02:00:49','2026-04-28 02:00:49'),
(1500,9,83,'system',0,'Por favor responde:\n✅ *SÍ* - Para confirmar el envío\n❌ *NO* - Para cancelar','text','sent',NULL,'2026-04-28 02:00:49','2026-04-28 02:00:49'),
(1501,8,84,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5348287#-64.7486874','text','sent',NULL,'2026-04-28 02:03:24','2026-04-28 02:03:24'),
(1502,8,84,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-28 02:03:24','2026-04-28 02:03:24'),
(1503,8,84,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5350332#-64.729502','text','sent',NULL,'2026-04-28 02:05:13','2026-04-28 02:05:13'),
(1504,8,84,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 2.8 km\n💵 Costo del servicio: *Bs 8.04*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 02:05:13','2026-04-28 02:05:13'),
(1505,8,84,'customer',38,'No','text','sent',NULL,'2026-04-28 02:05:42','2026-04-28 02:05:42'),
(1506,8,NULL,'system',0,'❌ *Solicitud cancelada*\n\nTu solicitud de entrega ha sido cancelada.\n\nEnvía *HOLA* para comenzar una nueva solicitud.','text','sent',NULL,'2026-04-28 02:05:42','2026-04-28 02:05:42'),
(1507,8,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 02:06:05','2026-04-28 02:06:05'),
(1508,8,NULL,'customer',38,'Hola','text','sent',NULL,'2026-04-28 02:06:06','2026-04-28 02:06:06'),
(1509,8,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 02:06:06','2026-04-28 02:06:06'),
(1510,8,NULL,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5348211#-64.7487213','text','sent',NULL,'2026-04-28 02:06:56','2026-04-28 02:06:56'),
(1511,8,85,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 02:06:56','2026-04-28 02:06:56'),
(1512,10,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 02:11:18','2026-04-28 02:11:18'),
(1513,10,NULL,'customer',40,'Buen día móvil','text','sent',NULL,'2026-04-28 02:11:19','2026-04-28 02:11:19'),
(1514,10,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buen día móvil\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 02:11:19','2026-04-28 02:11:19'),
(1515,10,NULL,'customer',40,'1','text','sent',NULL,'2026-04-28 02:11:48','2026-04-28 02:11:48'),
(1516,10,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"1\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 02:11:48','2026-04-28 02:11:48'),
(1517,10,NULL,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5348517#-64.748715','text','sent',NULL,'2026-04-28 02:12:07','2026-04-28 02:12:07'),
(1518,10,86,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 02:12:07','2026-04-28 02:12:07'),
(1519,10,86,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5204747#-64.7303725','text','sent',NULL,'2026-04-28 02:15:49','2026-04-28 02:15:49'),
(1520,10,86,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 3.5 km\n💵 Costo del servicio: *Bs 10.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 02:15:49','2026-04-28 02:15:49'),
(1521,10,86,'customer',40,'Si','text','sent',NULL,'2026-04-28 02:16:23','2026-04-28 02:16:23'),
(1522,10,86,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-28 02:16:23','2026-04-28 02:16:23'),
(1523,10,86,'customer',40,'Llamar antes de llegar','text','sent',NULL,'2026-04-28 02:17:53','2026-04-28 02:17:53'),
(1524,10,86,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-28 02:17:54','2026-04-28 02:17:54'),
(1525,10,86,'customer',40,'Estado','text','sent',NULL,'2026-04-28 02:18:42','2026-04-28 02:18:42'),
(1526,10,86,'system',0,'⏳ *Buscando mensajero...*\n\nTodavía estamos buscando un mensajero disponible.\n\nTiempo restante: aproximadamente 5 minutos desde que iniciaste la búsqueda.\n\nEscribe *CANCELAR* si deseas detener la búsqueda.','text','sent',NULL,'2026-04-28 02:18:42','2026-04-28 02:18:42'),
(1527,11,NULL,'customer',41,'.','text','sent',NULL,'2026-04-28 02:32:01','2026-04-28 02:32:01'),
(1528,11,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 02:32:01','2026-04-28 02:32:01'),
(1529,11,NULL,'customer',41,'#ATTACHMENT:location#Ubicación compartida#-21.5375355#-64.7299284','text','sent',NULL,'2026-04-28 02:32:59','2026-04-28 02:32:59'),
(1530,11,87,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 02:32:59','2026-04-28 02:32:59'),
(1531,11,87,'customer',41,'#ATTACHMENT:location#Ubicación compartida#-21.5375262#-64.7299314','text','sent',NULL,'2026-04-28 02:33:28','2026-04-28 02:33:28'),
(1532,11,87,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-28 02:33:28','2026-04-28 02:33:28'),
(1533,11,87,'customer',41,'#ATTACHMENT:location#F729+H73, Tarija, Bolivia#-21.548471426869#-64.731815457344','text','sent',NULL,'2026-04-28 02:33:54','2026-04-28 02:33:54'),
(1534,11,87,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.7 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 02:33:54','2026-04-28 02:33:54'),
(1535,11,87,'customer',41,'Si','text','sent',NULL,'2026-04-28 02:35:24','2026-04-28 02:35:24'),
(1536,11,87,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-28 02:35:24','2026-04-28 02:35:24'),
(1537,11,87,'customer',41,'No','text','sent',NULL,'2026-04-28 02:35:40','2026-04-28 02:35:40'),
(1538,11,87,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-28 02:35:42','2026-04-28 02:35:42'),
(1539,11,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 02:35:59','2026-04-28 02:35:59'),
(1540,11,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 02:36:23','2026-04-28 02:36:23'),
(1541,11,NULL,'customer',41,'.','text','sent',NULL,'2026-04-28 02:40:13','2026-04-28 02:40:13'),
(1542,11,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \".\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 02:40:13','2026-04-28 02:40:13'),
(1543,11,NULL,'customer',41,'#ATTACHMENT:location#Ubicación compartida#-21.5375414#-64.7299977','text','sent',NULL,'2026-04-28 02:40:26','2026-04-28 02:40:26'),
(1544,11,88,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 02:40:26','2026-04-28 02:40:26'),
(1545,11,88,'customer',41,'#ATTACHMENT:location#Ubicación compartida#-21.541967800934#-64.743764698505','text','sent',NULL,'2026-04-28 02:40:41','2026-04-28 02:40:41'),
(1546,11,88,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 2.1 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 02:40:41','2026-04-28 02:40:41'),
(1547,11,88,'customer',41,'SI','text','sent',NULL,'2026-04-28 02:40:55','2026-04-28 02:40:55'),
(1548,11,88,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-28 02:40:55','2026-04-28 02:40:55'),
(1549,11,88,'customer',41,'Pedir factura','text','sent',NULL,'2026-04-28 02:41:14','2026-04-28 02:41:14'),
(1550,11,88,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-28 02:41:15','2026-04-28 02:41:15'),
(1551,11,88,'customer',41,'ESTADO','text','sent',NULL,'2026-04-28 02:41:35','2026-04-28 02:41:35'),
(1552,11,88,'system',0,'⏳ *Buscando mensajero...*\n\nTodavía estamos buscando un mensajero disponible.\n\nTiempo restante: aproximadamente 5 minutos desde que iniciaste la búsqueda.\n\nEscribe *CANCELAR* si deseas detener la búsqueda.','text','sent',NULL,'2026-04-28 02:41:35','2026-04-28 02:41:35'),
(1553,11,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 02:41:53','2026-04-28 02:41:53'),
(1554,8,85,'customer',38,'Servicio de licoreria','text','sent',NULL,'2026-04-28 02:46:22','2026-04-28 02:46:22'),
(1555,8,85,'system',0,'❌ *Destino no válido*\n\n\"Servicio de licoreria\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-28 02:46:22','2026-04-28 02:46:22'),
(1556,8,85,'customer',38,'Servicio de compras','text','sent',NULL,'2026-04-28 02:50:20','2026-04-28 02:50:20'),
(1557,8,85,'system',0,'❌ *Destino no válido*\n\n\"Servicio de compras\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-28 02:50:20','2026-04-28 02:50:20'),
(1558,8,85,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5348178#-64.748764','text','sent',NULL,'2026-04-28 02:50:33','2026-04-28 02:50:33'),
(1559,8,85,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-28 02:50:33','2026-04-28 02:50:33'),
(1560,8,85,'customer',38,'Servicio de compras','text','sent',NULL,'2026-04-28 02:50:38','2026-04-28 02:50:38'),
(1561,8,85,'system',0,'❌ *Destino no válido*\n\n\"Servicio de compras\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-28 02:50:38','2026-04-28 02:50:38'),
(1562,8,85,'customer',38,'Movil','text','sent',NULL,'2026-04-28 02:55:25','2026-04-28 02:55:25'),
(1563,8,85,'system',0,'❌ *Destino no válido*\n\n\"Movil\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-28 02:55:25','2026-04-28 02:55:25'),
(1564,8,85,'customer',38,'https://www.facebook.com/profile.php?id=61588928121431\nAvaroa: Tu Red Logística Estratégica para la Distribución Eficiente\n \nAvaroa es una red integral de puntos logísticos diseñada para optimizar el almacenamiento y la operación de productos, facilitando una distribución rápida, sencilla y accesible. Nuestra plataforma permite a las empresas gestionar sus inventarios y realizar entregas eficientes desde ubicaciones estratégicas, mejorando la velocidad de respuesta y la satisfacción del cliente.','text','sent',NULL,'2026-04-28 08:10:24','2026-04-28 08:10:24'),
(1565,8,85,'system',0,'❌ *Destino no válido*\n\n\"https://www.facebook.com/profile.php?id=61588928121431\nAvaroa: Tu Red Logística Estratégica para la Distribución Eficiente\n \nAvaroa es una red integral de puntos logísticos diseñada para optimizar el almacenamiento y la operación de productos, facilitando una distribución rápida, sencilla y accesible. Nuestra plataforma permite a las empresas gestionar sus inventarios y realizar entregas eficientes desde ubicaciones estratégicas, mejorando la velocidad de respuesta y la satisfacción del cliente.\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-28 08:10:24','2026-04-28 08:10:24'),
(1566,12,NULL,'customer',43,'.','text','sent',NULL,'2026-04-28 08:17:14','2026-04-28 08:17:14'),
(1567,12,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 08:17:14','2026-04-28 08:17:14'),
(1568,8,85,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5348007#-64.7487539','text','sent',NULL,'2026-04-28 08:21:05','2026-04-28 08:21:05'),
(1569,8,85,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-28 08:21:05','2026-04-28 08:21:05'),
(1570,8,85,'customer',38,'Móvil movil','text','sent',NULL,'2026-04-28 08:21:10','2026-04-28 08:21:10'),
(1571,8,85,'system',0,'❌ *Destino no válido*\n\n\"Móvil movil\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-28 08:21:10','2026-04-28 08:21:10'),
(1572,8,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 08:21:37','2026-04-28 08:21:37'),
(1573,13,NULL,'customer',44,'Delivery','text','sent',NULL,'2026-04-28 08:41:57','2026-04-28 08:41:57'),
(1574,13,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 08:41:57','2026-04-28 08:41:57'),
(1575,13,NULL,'customer',44,'#ATTACHMENT:location#Luis Benitez#-21.51553131#-64.72509871','text','sent',NULL,'2026-04-28 08:42:32','2026-04-28 08:42:32'),
(1576,13,89,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 08:42:32','2026-04-28 08:42:32'),
(1577,13,89,'customer',44,'#ATTACHMENT:location#Mas Que Vencedores#-21.51565982#-64.72475686','text','sent',NULL,'2026-04-28 08:42:57','2026-04-28 08:42:57'),
(1578,13,89,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-28 08:42:57','2026-04-28 08:42:57'),
(1579,13,89,'customer',44,'#ATTACHMENT:location#U.E. Julio Calvo#-21.5175189#-64.72685186','text','sent',NULL,'2026-04-28 08:43:17','2026-04-28 08:43:17'),
(1580,13,89,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 0.4 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 08:43:17','2026-04-28 08:43:17'),
(1581,13,89,'customer',44,'Si','text','sent',NULL,'2026-04-28 08:43:44','2026-04-28 08:43:44'),
(1582,13,89,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-28 08:43:44','2026-04-28 08:43:44'),
(1583,13,89,'customer',44,'Llamar antes de llegar','text','sent',NULL,'2026-04-28 08:44:16','2026-04-28 08:44:16'),
(1584,13,89,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-28 08:44:16','2026-04-28 08:44:16'),
(1585,13,89,'customer',44,'ESTADO','text','sent',NULL,'2026-04-28 08:44:35','2026-04-28 08:44:35'),
(1586,13,89,'system',0,'⏳ *Buscando mensajero...*\n\nTodavía estamos buscando un mensajero disponible.\n\nTiempo restante: aproximadamente 5 minutos desde que iniciaste la búsqueda.\n\nEscribe *CANCELAR* si deseas detener la búsqueda.','text','sent',NULL,'2026-04-28 08:44:35','2026-04-28 08:44:35'),
(1587,13,NULL,'customer',44,'Ok gracias','text','sent',NULL,'2026-04-28 08:49:35','2026-04-28 08:49:35'),
(1588,13,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-04-28 08:49:35','2026-04-28 08:49:35'),
(1589,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 16:54:20','2026-04-28 16:54:20'),
(1590,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-28 16:54:21','2026-04-28 16:54:21'),
(1591,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 16:54:21','2026-04-28 16:54:21'),
(1592,5,NULL,'customer',35,'#ATTACHMENT:location#Dr. Victorino Rivero 200, Santa Cruz de la Sierra, Bolivia#-17.795395485631#-63.154398612678','text','sent',NULL,'2026-04-28 16:55:41','2026-04-28 16:55:41'),
(1593,5,90,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 16:55:41','2026-04-28 16:55:41'),
(1594,5,90,'customer',35,'#ATTACHMENT:location#6RVV+JWM, RN 4, Santa Cruz de la Sierra, Bolivia#-17.755269269556#-63.155525811017','text','sent',NULL,'2026-04-28 16:59:49','2026-04-28 16:59:49'),
(1595,5,90,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 6.3 km\n💵 Costo del servicio: *Bs 18.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 16:59:49','2026-04-28 16:59:49'),
(1596,5,90,'customer',35,'Si','text','sent',NULL,'2026-04-28 17:03:17','2026-04-28 17:03:17'),
(1597,5,90,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-28 17:03:17','2026-04-28 17:03:17'),
(1598,5,90,'customer',35,'No','text','sent',NULL,'2026-04-28 17:03:35','2026-04-28 17:03:35'),
(1599,5,90,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-28 17:03:36','2026-04-28 17:03:36'),
(1600,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 19:34:13','2026-04-28 19:34:13'),
(1601,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-28 19:34:14','2026-04-28 19:34:14'),
(1602,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 19:34:14','2026-04-28 19:34:14'),
(1603,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044415#-63.1568008','text','sent',NULL,'2026-04-28 19:35:08','2026-04-28 19:35:08'),
(1604,5,91,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 19:35:08','2026-04-28 19:35:08'),
(1605,5,91,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.793495072592#-63.160015493631','text','sent',NULL,'2026-04-28 19:35:30','2026-04-28 19:35:30'),
(1606,5,91,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.8 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 19:35:30','2026-04-28 19:35:30'),
(1607,5,91,'customer',35,'Si','text','sent',NULL,'2026-04-28 19:35:42','2026-04-28 19:35:42'),
(1608,5,91,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-28 19:35:42','2026-04-28 19:35:42'),
(1609,5,91,'customer',35,'No','text','sent',NULL,'2026-04-28 19:35:49','2026-04-28 19:35:49'),
(1610,5,91,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-28 19:35:50','2026-04-28 19:35:50'),
(1611,14,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 22:20:24','2026-04-28 22:20:24'),
(1612,14,NULL,'customer',49,'Hola','text','sent',NULL,'2026-04-28 22:20:25','2026-04-28 22:20:25'),
(1613,14,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 22:20:25','2026-04-28 22:20:25'),
(1614,8,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-28 22:32:32','2026-04-28 22:32:32'),
(1615,8,NULL,'customer',38,'Hola','text','sent',NULL,'2026-04-28 22:32:33','2026-04-28 22:32:33'),
(1616,8,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 22:32:33','2026-04-28 22:32:33'),
(1617,8,NULL,'customer',38,'Movil','text','sent',NULL,'2026-04-28 22:33:12','2026-04-28 22:33:12'),
(1618,8,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Movil\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-28 22:33:12','2026-04-28 22:33:12'),
(1619,8,NULL,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5242806#-64.7217958','text','sent',NULL,'2026-04-28 22:33:34','2026-04-28 22:33:34'),
(1620,8,92,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-28 22:33:34','2026-04-28 22:33:34'),
(1621,8,92,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5294756#-64.7302966','text','sent',NULL,'2026-04-28 22:34:56','2026-04-28 22:34:56'),
(1622,8,92,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.5 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-28 22:34:56','2026-04-28 22:34:56'),
(1623,8,92,'customer',38,'No','text','sent',NULL,'2026-04-28 22:35:39','2026-04-28 22:35:39'),
(1624,8,NULL,'system',0,'❌ *Solicitud cancelada*\n\nTu solicitud de entrega ha sido cancelada.\n\nEnvía *HOLA* para comenzar una nueva solicitud.','text','sent',NULL,'2026-04-28 22:35:39','2026-04-28 22:35:39'),
(1625,15,NULL,'customer',51,'Una moto','text','sent',NULL,'2026-04-29 06:21:48','2026-04-29 06:21:48'),
(1626,15,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 06:21:48','2026-04-29 06:21:48'),
(1627,15,NULL,'customer',51,'#ATTACHMENT:location#Ubicación compartida#-21.5178085#-64.7287604','text','sent',NULL,'2026-04-29 06:22:14','2026-04-29 06:22:14'),
(1628,15,93,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-29 06:22:14','2026-04-29 06:22:14'),
(1629,15,93,'customer',51,'#ATTACHMENT:location#Ubicación compartida#-21.5178058#-64.7285974','text','sent',NULL,'2026-04-29 06:23:02','2026-04-29 06:23:02'),
(1630,15,93,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-29 06:23:02','2026-04-29 06:23:02'),
(1631,15,93,'customer',51,'#ATTACHMENT:location#Ubicación compartida#-21.5078151#-64.7278334','text','sent',NULL,'2026-04-29 06:23:41','2026-04-29 06:23:41'),
(1632,15,93,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.6 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-29 06:23:41','2026-04-29 06:23:41'),
(1633,15,93,'customer',51,'Si','text','sent',NULL,'2026-04-29 06:24:26','2026-04-29 06:24:26'),
(1634,15,93,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-29 06:24:26','2026-04-29 06:24:26'),
(1635,16,NULL,'customer',52,'Hola, solicito recarga de saldo para mi cuenta de conductor. 450\nMonto: 50 Bs\nAdjunto comprobante de pago...','text','sent',NULL,'2026-04-29 14:01:18','2026-04-29 14:01:18'),
(1636,16,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 14:01:18','2026-04-29 14:01:18'),
(1637,17,NULL,'customer',53,'Delivery','text','sent',NULL,'2026-04-29 15:07:57','2026-04-29 15:07:57'),
(1638,17,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 15:07:57','2026-04-29 15:07:57'),
(1639,17,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 15:08:00','2026-04-29 15:08:00'),
(1640,17,NULL,'customer',53,'Hola','text','sent',NULL,'2026-04-29 15:08:01','2026-04-29 15:08:01'),
(1641,17,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-29 15:08:01','2026-04-29 15:08:01'),
(1642,17,NULL,'customer',53,'#ATTACHMENT:location#Ubicación compartida#-21.5347781#-64.7487647','text','sent',NULL,'2026-04-29 15:08:25','2026-04-29 15:08:25'),
(1643,17,94,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-29 15:08:25','2026-04-29 15:08:25'),
(1644,6,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 20:26:17','2026-04-29 20:26:17'),
(1645,6,NULL,'customer',36,'Hola','text','sent',NULL,'2026-04-29 20:26:18','2026-04-29 20:26:18'),
(1646,6,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-29 20:26:18','2026-04-29 20:26:18'),
(1647,18,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 20:26:51','2026-04-29 20:26:51'),
(1648,18,NULL,'customer',54,'Hola','text','sent',NULL,'2026-04-29 20:26:52','2026-04-29 20:26:52'),
(1649,18,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-29 20:26:52','2026-04-29 20:26:52'),
(1650,19,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 20:27:17','2026-04-29 20:27:17'),
(1651,19,NULL,'customer',55,'Hola','text','sent',NULL,'2026-04-29 20:27:17','2026-04-29 20:27:17'),
(1652,19,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-29 20:27:17','2026-04-29 20:27:17'),
(1653,19,NULL,'customer',55,'#ATTACHMENT:location#F7H9+QR2, Av. Mejillones, Tarija, Bolivia#-21.520612778011#-64.730347618461','text','sent',NULL,'2026-04-29 20:29:06','2026-04-29 20:29:06'),
(1654,19,95,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-29 20:29:06','2026-04-29 20:29:06'),
(1655,19,95,'customer',55,'#ATTACHMENT:location#F7QC+632, Tarija, Bolivia#-21.511897646944#-64.730061292648','text','sent',NULL,'2026-04-29 20:30:12','2026-04-29 20:30:12'),
(1656,19,95,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.4 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-29 20:30:12','2026-04-29 20:30:12'),
(1657,18,NULL,'customer',54,'#ATTACHMENT:location#Ubicación compartida#-21.520486#-64.7303743','text','sent',NULL,'2026-04-29 20:30:48','2026-04-29 20:30:48'),
(1658,18,96,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-29 20:30:48','2026-04-29 20:30:48'),
(1659,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 21:46:29','2026-04-29 21:46:29'),
(1660,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-29 21:46:30','2026-04-29 21:46:30'),
(1661,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-29 21:46:30','2026-04-29 21:46:30'),
(1662,5,NULL,'customer',35,'#ATTACHMENT:location#Ave Los Penocos 4145, Santa Cruz de la Sierra, Bolivia#-17.807907123662#-63.149954527617','text','sent',NULL,'2026-04-29 21:46:46','2026-04-29 21:46:46'),
(1663,5,97,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-29 21:46:46','2026-04-29 21:46:46'),
(1664,5,97,'customer',35,'#ATTACHMENT:location#C. G. de Acuña 3345, Santa Cruz de la Sierra, Bolivia#-17.763286548623#-63.156984597445','text','sent',NULL,'2026-04-29 21:47:02','2026-04-29 21:47:02'),
(1665,5,97,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 7.0 km\n💵 Costo del servicio: *Bs 20.23*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-29 21:47:02','2026-04-29 21:47:02'),
(1666,5,97,'customer',35,'Si','text','sent',NULL,'2026-04-29 21:47:12','2026-04-29 21:47:12'),
(1667,5,97,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-29 21:47:12','2026-04-29 21:47:12'),
(1668,5,97,'customer',35,'No','text','sent',NULL,'2026-04-29 21:47:36','2026-04-29 21:47:36'),
(1669,5,97,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-29 21:47:38','2026-04-29 21:47:38'),
(1670,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 22:14:06','2026-04-29 22:14:06'),
(1671,5,NULL,'customer',35,'Ok','text','sent',NULL,'2026-04-29 22:14:26','2026-04-29 22:14:26'),
(1672,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Ok\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-29 22:14:26','2026-04-29 22:14:26'),
(1673,5,NULL,'customer',35,'#ATTACHMENT:location#C. Oscar Alborta 3090, Santa Cruz de la Sierra, Bolivia#-17.794462360776#-63.155606612563','text','sent',NULL,'2026-04-29 22:16:04','2026-04-29 22:16:04'),
(1674,5,98,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-29 22:16:04','2026-04-29 22:16:04'),
(1675,5,98,'customer',35,'#ATTACHMENT:location#7R2J+XG3, Santa Cruz de la Sierra, Bolivia#-17.747735720444#-63.168904669583','text','sent',NULL,'2026-04-29 22:16:23','2026-04-29 22:16:23'),
(1676,5,98,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 7.5 km\n💵 Costo del servicio: *Bs 21.71*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-29 22:16:23','2026-04-29 22:16:23'),
(1677,5,98,'customer',35,'Si','text','sent',NULL,'2026-04-29 22:16:34','2026-04-29 22:16:34'),
(1678,5,98,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-29 22:16:34','2026-04-29 22:16:34'),
(1679,5,98,'customer',35,'Local h','text','sent',NULL,'2026-04-29 22:16:42','2026-04-29 22:16:42'),
(1680,5,98,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-29 22:16:43','2026-04-29 22:16:43'),
(1681,5,98,'customer',35,'Estado','text','sent',NULL,'2026-04-29 22:17:22','2026-04-29 22:17:22'),
(1682,5,98,'system',0,'⏳ *Buscando mensajero...*\n\nTodavía estamos buscando un mensajero disponible.\n\nTiempo restante: aproximadamente 5 minutos desde que iniciaste la búsqueda.\n\nEscribe *CANCELAR* si deseas detener la búsqueda.','text','sent',NULL,'2026-04-29 22:17:22','2026-04-29 22:17:22'),
(1683,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 22:17:34','2026-04-29 22:17:34'),
(1684,5,NULL,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8041457#-63.1568114','text','sent',NULL,'2026-04-29 22:17:47','2026-04-29 22:17:47'),
(1685,5,99,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-29 22:17:47','2026-04-29 22:17:47'),
(1686,5,99,'customer',35,'#ATTACHMENT:location#RN 4 520, Santa Cruz de la Sierra, Bolivia#-17.752681593617#-63.161824308336','text','sent',NULL,'2026-04-29 22:18:05','2026-04-29 22:18:05'),
(1687,5,99,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 8.1 km\n💵 Costo del servicio: *Bs 23.17*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-29 22:18:05','2026-04-29 22:18:05'),
(1688,5,99,'customer',35,'Local','text','sent',NULL,'2026-04-29 22:18:14','2026-04-29 22:18:14'),
(1689,5,99,'system',0,'Por favor responde:\n✅ *SÍ* - Para confirmar el envío\n❌ *NO* - Para cancelar','text','sent',NULL,'2026-04-29 22:18:14','2026-04-29 22:18:14'),
(1690,5,99,'customer',35,'Si','text','sent',NULL,'2026-04-29 22:18:17','2026-04-29 22:18:17'),
(1691,5,99,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-29 22:18:17','2026-04-29 22:18:17'),
(1692,5,99,'customer',35,'Local h','text','sent',NULL,'2026-04-29 22:18:25','2026-04-29 22:18:25'),
(1693,5,99,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-29 22:18:26','2026-04-29 22:18:26'),
(1694,20,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 22:34:34','2026-04-29 22:34:34'),
(1695,20,NULL,'customer',58,'Buen día','text','sent',NULL,'2026-04-29 22:34:35','2026-04-29 22:34:35'),
(1696,20,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buen día\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-29 22:34:35','2026-04-29 22:34:35'),
(1697,20,NULL,'customer',58,'#ATTACHMENT:location#Ubicación compartida#-21.5213174#-64.7308902','text','sent',NULL,'2026-04-29 22:35:08','2026-04-29 22:35:08'),
(1698,20,100,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-29 22:35:08','2026-04-29 22:35:08'),
(1699,21,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 22:35:13','2026-04-29 22:35:13'),
(1700,21,NULL,'customer',59,'Buenas tardes','text','sent',NULL,'2026-04-29 22:35:14','2026-04-29 22:35:14'),
(1701,21,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buenas tardes\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-29 22:35:14','2026-04-29 22:35:14'),
(1702,20,100,'customer',58,'#ATTACHMENT:location#Ubicación compartida#-21.5213214#-64.7308802','text','sent',NULL,'2026-04-29 22:35:31','2026-04-29 22:35:31'),
(1703,20,100,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-29 22:35:31','2026-04-29 22:35:31'),
(1704,20,100,'customer',58,'#ATTACHMENT:location#Ubicación compartida#-21.518635#-64.7403449','text','sent',NULL,'2026-04-29 22:35:45','2026-04-29 22:35:45'),
(1705,20,100,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.4 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-29 22:35:45','2026-04-29 22:35:45'),
(1706,20,100,'customer',58,'Si','text','sent',NULL,'2026-04-29 22:35:58','2026-04-29 22:35:58'),
(1707,20,100,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-29 22:35:58','2026-04-29 22:35:58'),
(1708,20,100,'customer',58,'Quiero un servicio','text','sent',NULL,'2026-04-29 22:36:16','2026-04-29 22:36:16'),
(1709,20,100,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-29 22:36:18','2026-04-29 22:36:18'),
(1710,21,NULL,'customer',59,'#ATTACHMENT:location#Coca Machucada Tía Coca#-21.5226999#-64.74490356','text','sent',NULL,'2026-04-29 22:36:26','2026-04-29 22:36:26'),
(1711,21,101,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-29 22:36:26','2026-04-29 22:36:26'),
(1712,20,100,'customer',58,'[reaction message]','text','sent',NULL,'2026-04-29 22:36:31','2026-04-29 22:36:31'),
(1713,20,100,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-29 22:36:31','2026-04-29 22:36:31'),
(1714,20,100,'customer',58,'[reaction message]','text','sent',NULL,'2026-04-29 22:36:40','2026-04-29 22:36:40'),
(1715,20,100,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-29 22:36:40','2026-04-29 22:36:40'),
(1716,21,101,'customer',59,'https://maps.app.goo.gl/YLmvCXVTX9vnBWudA?g_st=aw','text','sent',NULL,'2026-04-29 22:37:15','2026-04-29 22:37:15'),
(1717,21,101,'system',0,'❌ *Destino no válido*\n\n\"https://maps.app.goo.gl/YLmvCXVTX9vnBWudA?g_st=aw\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-29 22:37:15','2026-04-29 22:37:15'),
(1718,22,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 22:37:20','2026-04-29 22:37:20'),
(1719,22,NULL,'customer',60,'Buenas Tardes una Motito','text','sent',NULL,'2026-04-29 22:37:21','2026-04-29 22:37:21'),
(1720,22,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buenas Tardes una Motito\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-29 22:37:21','2026-04-29 22:37:21'),
(1721,21,101,'customer',59,'https://maps.app.goo.gl/wuSLsvSNAfg71m2X6?g_st=aw','text','sent',NULL,'2026-04-29 22:37:58','2026-04-29 22:37:58'),
(1722,21,101,'system',0,'❌ *Destino no válido*\n\n\"https://maps.app.goo.gl/wuSLsvSNAfg71m2X6?g_st=aw\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-29 22:37:58','2026-04-29 22:37:58'),
(1723,22,NULL,'customer',60,'#ATTACHMENT:location#Ubicación compartida#-21.53047#-64.7363133','text','sent',NULL,'2026-04-29 22:40:32','2026-04-29 22:40:32'),
(1724,22,102,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-29 22:40:32','2026-04-29 22:40:32'),
(1725,22,102,'customer',60,'https://maps.app.goo.gl/7ck8WAy5eQinEnUGA?g_st=aw','text','sent',NULL,'2026-04-29 22:41:52','2026-04-29 22:41:52'),
(1726,22,102,'system',0,'❌ *Destino no válido*\n\n\"https://maps.app.goo.gl/7ck8WAy5eQinEnUGA?g_st=aw\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-29 22:41:52','2026-04-29 22:41:52'),
(1727,22,102,'customer',60,'#ATTACHMENT:location#Ubicación compartida#-21.5290967#-64.7342217','text','sent',NULL,'2026-04-29 22:43:13','2026-04-29 22:43:13'),
(1728,22,102,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 0.4 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-29 22:43:13','2026-04-29 22:43:13'),
(1729,22,102,'customer',60,'Si','text','sent',NULL,'2026-04-29 22:43:35','2026-04-29 22:43:35'),
(1730,22,102,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-29 22:43:35','2026-04-29 22:43:35'),
(1731,22,102,'customer',60,'NO','text','sent',NULL,'2026-04-29 22:44:24','2026-04-29 22:44:24'),
(1732,22,102,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-29 22:44:25','2026-04-29 22:44:25'),
(1733,20,NULL,'customer',58,'[reaction message]','text','sent',NULL,'2026-04-29 22:44:39','2026-04-29 22:44:39'),
(1734,20,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-04-29 22:44:39','2026-04-29 22:44:39'),
(1735,21,101,'customer',59,'#ATTACHMENT:location#Ubicación compartida#-21.5103587#-64.7230404','text','sent',NULL,'2026-04-29 22:50:02','2026-04-29 22:50:02'),
(1736,21,101,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 3.7 km\n💵 Costo del servicio: *Bs 10.67*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-29 22:50:02','2026-04-29 22:50:02'),
(1737,10,NULL,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.53045#-64.7160983','text','sent',NULL,'2026-04-29 23:50:32','2026-04-29 23:50:32'),
(1738,10,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-04-29 23:50:32','2026-04-29 23:50:32'),
(1739,10,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-29 23:50:53','2026-04-29 23:50:53'),
(1740,10,NULL,'customer',40,'Hola','text','sent',NULL,'2026-04-29 23:50:54','2026-04-29 23:50:54'),
(1741,10,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-29 23:50:54','2026-04-29 23:50:54'),
(1742,10,NULL,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5336417#-64.7165617','text','sent',NULL,'2026-04-29 23:51:05','2026-04-29 23:51:05'),
(1743,10,103,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-29 23:51:05','2026-04-29 23:51:05'),
(1744,10,103,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5444196#-64.7034697','text','sent',NULL,'2026-04-29 23:56:16','2026-04-29 23:56:16'),
(1745,10,103,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 2.5 km\n💵 Costo del servicio: *Bs 7.29*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-29 23:56:16','2026-04-29 23:56:16'),
(1746,10,103,'customer',40,'No','text','sent',NULL,'2026-04-30 00:00:02','2026-04-30 00:00:02'),
(1747,10,NULL,'system',0,'❌ *Solicitud cancelada*\n\nTu solicitud de entrega ha sido cancelada.\n\nEnvía *HOLA* para comenzar una nueva solicitud.','text','sent',NULL,'2026-04-30 00:00:02','2026-04-30 00:00:02'),
(1748,10,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 00:00:08','2026-04-30 00:00:08'),
(1749,10,NULL,'customer',40,'Hola','text','sent',NULL,'2026-04-30 00:00:10','2026-04-30 00:00:10'),
(1750,10,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 00:00:10','2026-04-30 00:00:10'),
(1751,10,NULL,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.540432#-64.7099741','text','sent',NULL,'2026-04-30 00:00:23','2026-04-30 00:00:23'),
(1752,10,104,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 00:00:23','2026-04-30 00:00:23'),
(1753,10,104,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5356433#-64.72691','text','sent',NULL,'2026-04-30 00:09:13','2026-04-30 00:09:13'),
(1754,10,104,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 2.6 km\n💵 Costo del servicio: *Bs 7.38*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 00:09:13','2026-04-30 00:09:13'),
(1755,10,104,'customer',40,'No','text','sent',NULL,'2026-04-30 00:10:53','2026-04-30 00:10:53'),
(1756,10,NULL,'system',0,'❌ *Solicitud cancelada*\n\nTu solicitud de entrega ha sido cancelada.\n\nEnvía *HOLA* para comenzar una nueva solicitud.','text','sent',NULL,'2026-04-30 00:10:53','2026-04-30 00:10:53'),
(1757,10,NULL,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5330933#-64.727145','text','sent',NULL,'2026-04-30 00:11:10','2026-04-30 00:11:10'),
(1758,10,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-04-30 00:11:10','2026-04-30 00:11:10'),
(1759,10,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 00:11:25','2026-04-30 00:11:25'),
(1760,10,NULL,'customer',40,'Hola','text','sent',NULL,'2026-04-30 00:11:26','2026-04-30 00:11:26'),
(1761,10,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 00:11:26','2026-04-30 00:11:26'),
(1762,10,NULL,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5330117#-64.7270533','text','sent',NULL,'2026-04-30 00:11:32','2026-04-30 00:11:32'),
(1763,10,105,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 00:11:32','2026-04-30 00:11:32'),
(1764,10,105,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5204217#-64.7304083','text','sent',NULL,'2026-04-30 00:17:22','2026-04-30 00:17:22'),
(1765,10,105,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 2.0 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 00:17:22','2026-04-30 00:17:22'),
(1766,23,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 00:35:38','2026-04-30 00:35:38'),
(1767,23,NULL,'customer',61,'Hola Delivery','text','sent',NULL,'2026-04-30 00:35:39','2026-04-30 00:35:39'),
(1768,23,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola Delivery\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 00:35:39','2026-04-30 00:35:39'),
(1769,23,NULL,'customer',61,'#ATTACHMENT:location#Ubicación compartida#-21.520569#-64.7305507','text','sent',NULL,'2026-04-30 00:36:04','2026-04-30 00:36:04'),
(1770,23,106,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 00:36:04','2026-04-30 00:36:04'),
(1771,23,106,'customer',61,'#ATTACHMENT:location#Ubicación compartida#-21.5447758#-64.7349921','text','sent',NULL,'2026-04-30 00:37:10','2026-04-30 00:37:10'),
(1772,23,106,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 3.8 km\n💵 Costo del servicio: *Bs 11.01*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 00:37:10','2026-04-30 00:37:10'),
(1773,23,106,'customer',61,'Si','text','sent',NULL,'2026-04-30 00:37:41','2026-04-30 00:37:41'),
(1774,23,106,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-30 00:37:41','2026-04-30 00:37:41'),
(1775,24,NULL,'customer',62,'Hola, solicito recarga de saldo para mi cuenta de conductor.\nMonto: 100 Bs\nAdjunto comprobante de pago...','text','sent',NULL,'2026-04-30 01:04:18','2026-04-30 01:04:18'),
(1776,24,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 01:04:18','2026-04-30 01:04:18'),
(1777,24,NULL,'customer',62,'Hola, solicito recarga de saldo para mi cuenta de conductor.\nMonto: 100 Bs\nAdjunto comprobante de pago...','text','sent',NULL,'2026-04-30 01:07:44','2026-04-30 01:07:44'),
(1778,24,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola, solicito recarga de saldo para mi cuenta de conductor.\nMonto: 100 Bs\nAdjunto comprobante de pago...\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 01:07:44','2026-04-30 01:07:44'),
(1779,22,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 01:26:52','2026-04-30 01:26:52'),
(1780,22,NULL,'customer',60,'Hola','text','sent',NULL,'2026-04-30 01:26:53','2026-04-30 01:26:53'),
(1781,22,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 01:26:53','2026-04-30 01:26:53'),
(1782,22,NULL,'customer',60,'Una Motito','text','sent',NULL,'2026-04-30 01:27:06','2026-04-30 01:27:06'),
(1783,22,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Una Motito\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 01:27:06','2026-04-30 01:27:06'),
(1784,22,NULL,'customer',60,'Por favor','text','sent',NULL,'2026-04-30 01:27:09','2026-04-30 01:27:09'),
(1785,22,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Por favor\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 01:27:09','2026-04-30 01:27:09'),
(1786,22,NULL,'customer',60,'#ATTACHMENT:location#Ubicación compartida#-21.520476#-64.7303575','text','sent',NULL,'2026-04-30 01:27:47','2026-04-30 01:27:47'),
(1787,22,107,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 01:27:47','2026-04-30 01:27:47'),
(1788,22,107,'customer',60,'#ATTACHMENT:location#Ubicación compartida#-21.5290967#-64.7342217','text','sent',NULL,'2026-04-30 01:28:02','2026-04-30 01:28:02'),
(1789,22,107,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.5 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 01:28:02','2026-04-30 01:28:02'),
(1790,22,107,'customer',60,'Sí','text','sent',NULL,'2026-04-30 01:28:22','2026-04-30 01:28:22'),
(1791,22,107,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-30 01:28:22','2026-04-30 01:28:22'),
(1792,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 01:30:34','2026-04-30 01:30:34'),
(1793,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-04-30 01:30:35','2026-04-30 01:30:35'),
(1794,5,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 01:30:35','2026-04-30 01:30:35'),
(1795,5,NULL,'customer',35,'#ATTACHMENT:location#Padre José Ramón Hurtado 3185, Santa Cruz de la Sierra, Bolivia#-17.797300028442#-63.15579906106','text','sent',NULL,'2026-04-30 01:31:02','2026-04-30 01:31:02'),
(1796,5,108,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 01:31:02','2026-04-30 01:31:02'),
(1797,5,108,'customer',35,'#ATTACHMENT:location#10260, Santa Cruz de la Sierra, Bolivia#-17.735459057036#-63.159173280001','text','sent',NULL,'2026-04-30 01:31:27','2026-04-30 01:31:27'),
(1798,5,108,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 9.6 km\n💵 Costo del servicio: *Bs 27.76*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 01:31:27','2026-04-30 01:31:27'),
(1799,5,108,'customer',35,'Si','text','sent',NULL,'2026-04-30 01:31:39','2026-04-30 01:31:39'),
(1800,5,108,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-30 01:31:39','2026-04-30 01:31:39'),
(1801,5,108,'customer',35,'No','text','sent',NULL,'2026-04-30 01:31:52','2026-04-30 01:31:52'),
(1802,5,108,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-30 01:31:53','2026-04-30 01:31:53'),
(1803,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 01:33:46','2026-04-30 01:33:46'),
(1804,5,NULL,'customer',35,'#ATTACHMENT:location#6R3R+RJH, Santa Cruz de la Sierra, Bolivia#-17.795592772437#-63.1583994627','text','sent',NULL,'2026-04-30 01:34:40','2026-04-30 01:34:40'),
(1805,5,109,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 01:34:40','2026-04-30 01:34:40'),
(1806,5,109,'customer',35,'#ATTACHMENT:location#6RVR+GG7 Parque Villa Pillín, Santa Cruz de la Sierra, Bolivia#-17.755974934807#-63.158812187612','text','sent',NULL,'2026-04-30 01:34:55','2026-04-30 01:34:55'),
(1807,5,109,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 6.2 km\n💵 Costo del servicio: *Bs 17.76*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 01:34:55','2026-04-30 01:34:55'),
(1808,5,109,'customer',35,'Si','text','sent',NULL,'2026-04-30 01:35:04','2026-04-30 01:35:04'),
(1809,5,109,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-30 01:35:04','2026-04-30 01:35:04'),
(1810,5,109,'customer',35,'Puerta roja número 16','text','sent',NULL,'2026-04-30 01:35:17','2026-04-30 01:35:17'),
(1811,5,109,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-30 01:35:19','2026-04-30 01:35:19'),
(1812,22,107,'customer',60,'Moto','text','sent',NULL,'2026-04-30 01:40:28','2026-04-30 01:40:28'),
(1813,22,107,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-30 01:40:29','2026-04-30 01:40:29'),
(1814,7,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 01:40:39','2026-04-30 01:40:39'),
(1815,7,NULL,'customer',37,'Buenas tardes','text','sent',NULL,'2026-04-30 01:40:40','2026-04-30 01:40:40'),
(1816,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buenas tardes\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 01:40:40','2026-04-30 01:40:40'),
(1817,7,NULL,'customer',37,'Delivery','text','sent',NULL,'2026-04-30 01:40:41','2026-04-30 01:40:41'),
(1818,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Delivery\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 01:40:41','2026-04-30 01:40:41'),
(1819,3,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 01:41:14','2026-04-30 01:41:14'),
(1820,3,NULL,'customer',34,'Hola','text','sent',NULL,'2026-04-30 01:41:15','2026-04-30 01:41:15'),
(1821,3,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 01:41:15','2026-04-30 01:41:15'),
(1822,3,NULL,'customer',34,'#ATTACHMENT:location#Av.Cruz Roja, Av. Beni y, Santa Cruz de la Sierra, Bolivia#-17.742858046894#-63.165762126446','text','sent',NULL,'2026-04-30 01:41:27','2026-04-30 01:41:27'),
(1823,3,110,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 01:41:27','2026-04-30 01:41:27'),
(1824,7,NULL,'customer',37,'#ATTACHMENT:location#Ubicación compartida#-21.5204758#-64.7303578','text','sent',NULL,'2026-04-30 01:41:36','2026-04-30 01:41:36'),
(1825,7,111,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 01:41:36','2026-04-30 01:41:36'),
(1826,3,110,'customer',34,'#ATTACHMENT:location#7RGJ+WWW, Septimo Anillo, Santa Cruz de la Sierra, Bolivia#-17.722299149078#-63.166981190443','text','sent',NULL,'2026-04-30 01:41:40','2026-04-30 01:41:40'),
(1827,3,110,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 3.2 km\n💵 Costo del servicio: *Bs 9.23*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 01:41:40','2026-04-30 01:41:40'),
(1828,3,110,'customer',34,'Si','text','sent',NULL,'2026-04-30 01:41:50','2026-04-30 01:41:50'),
(1829,3,110,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-30 01:41:50','2026-04-30 01:41:50'),
(1830,22,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 01:41:57','2026-04-30 01:41:57'),
(1831,3,110,'customer',34,'No','text','sent',NULL,'2026-04-30 01:41:58','2026-04-30 01:41:58'),
(1832,3,110,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-30 01:41:59','2026-04-30 01:41:59'),
(1833,7,111,'customer',37,'#ATTACHMENT:location#Ubicación compartida#-21.589479446411#-64.721626281738','text','sent',NULL,'2026-04-30 01:42:20','2026-04-30 01:42:20'),
(1834,7,111,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 10.8 km\n💵 Costo del servicio: *Bs 31.15*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 01:42:20','2026-04-30 01:42:20'),
(1835,7,111,'customer',37,'No','text','sent',NULL,'2026-04-30 01:43:03','2026-04-30 01:43:03'),
(1836,7,NULL,'system',0,'❌ *Solicitud cancelada*\n\nTu solicitud de entrega ha sido cancelada.\n\nEnvía *HOLA* para comenzar una nueva solicitud.','text','sent',NULL,'2026-04-30 01:43:03','2026-04-30 01:43:03'),
(1837,22,NULL,'customer',60,'Moto','text','sent',NULL,'2026-04-30 01:48:30','2026-04-30 01:48:30'),
(1838,22,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Moto\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 01:48:30','2026-04-30 01:48:30'),
(1839,22,NULL,'customer',60,'#ATTACHMENT:location#Ubicación compartida#-21.5205284#-64.7302822','text','sent',NULL,'2026-04-30 01:48:46','2026-04-30 01:48:46'),
(1840,22,112,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 01:48:46','2026-04-30 01:48:46'),
(1841,22,112,'customer',60,'Un móvil','text','sent',NULL,'2026-04-30 01:50:08','2026-04-30 01:50:08'),
(1842,22,112,'system',0,'❌ *Destino no válido*\n\n\"Un móvil\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-30 01:50:08','2026-04-30 01:50:08'),
(1843,22,112,'customer',60,'Auto','text','sent',NULL,'2026-04-30 01:50:11','2026-04-30 01:50:11'),
(1844,22,112,'system',0,'❌ *Destino no válido*\n\n\"Auto\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-30 01:50:11','2026-04-30 01:50:11'),
(1845,22,112,'customer',60,'#ATTACHMENT:location#Ubicación compartida#-21.5204829#-64.7303566','text','sent',NULL,'2026-04-30 01:50:26','2026-04-30 01:50:26'),
(1846,22,112,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-30 01:50:26','2026-04-30 01:50:26'),
(1847,22,112,'customer',60,'#ATTACHMENT:location#Ubicación compartida#-21.5205103#-64.7302944','text','sent',NULL,'2026-04-30 01:50:35','2026-04-30 01:50:35'),
(1848,22,112,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-30 01:50:35','2026-04-30 01:50:35'),
(1849,7,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 01:51:12','2026-04-30 01:51:12'),
(1850,7,NULL,'customer',37,'Buenas tardes','text','sent',NULL,'2026-04-30 01:51:13','2026-04-30 01:51:13'),
(1851,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buenas tardes\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 01:51:13','2026-04-30 01:51:13'),
(1852,7,NULL,'customer',37,'Móvil','text','sent',NULL,'2026-04-30 01:51:14','2026-04-30 01:51:14'),
(1853,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Móvil\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 01:51:14','2026-04-30 01:51:14'),
(1854,7,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 02:28:41','2026-04-30 02:28:41'),
(1855,7,NULL,'customer',37,'Buenas tardes','text','sent',NULL,'2026-04-30 02:28:42','2026-04-30 02:28:42'),
(1856,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buenas tardes\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 02:28:42','2026-04-30 02:28:42'),
(1857,7,NULL,'customer',37,'Delivery','text','sent',NULL,'2026-04-30 02:28:42','2026-04-30 02:28:42'),
(1858,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Delivery\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 02:28:42','2026-04-30 02:28:42'),
(1859,7,NULL,'customer',37,'#ATTACHMENT:location#Ubicación compartida#-21.5348092#-64.748756','text','sent',NULL,'2026-04-30 02:28:53','2026-04-30 02:28:53'),
(1860,7,113,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 02:28:53','2026-04-30 02:28:53'),
(1861,7,113,'customer',37,'#ATTACHMENT:location#Ubicación compartida#-21.534381#-64.7073072','text','sent',NULL,'2026-04-30 02:29:35','2026-04-30 02:29:35'),
(1862,7,113,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 6.0 km\n💵 Costo del servicio: *Bs 17.29*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 02:29:35','2026-04-30 02:29:35'),
(1863,7,113,'customer',37,'Si','text','sent',NULL,'2026-04-30 02:29:51','2026-04-30 02:29:51'),
(1864,7,113,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-30 02:29:51','2026-04-30 02:29:51'),
(1865,7,113,'customer',37,'Llamar antes de llegar','text','sent',NULL,'2026-04-30 02:30:07','2026-04-30 02:30:07'),
(1866,7,113,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-30 02:30:08','2026-04-30 02:30:08'),
(1867,7,113,'customer',37,'Buenas tardes','text','sent',NULL,'2026-04-30 02:38:51','2026-04-30 02:38:51'),
(1868,7,113,'system',0,'✅ *Mensajero asignado*\n\n👤 *Nombre:* Miguel Alfaro\n🚗 *Vehículo:* moto\n🔢 *Placa:* 5398EDP\n📱 *Contacto:* 59171876942\n💰 *Precio:* Bs 17.29\n\n📍 *Estado:* Asignado, preparándose para la recogida\n\nEnvía *ESTADO* para actualizaciones.','text','sent',NULL,'2026-04-30 02:38:51','2026-04-30 02:38:51'),
(1869,7,113,'customer',37,'Móvil','text','sent',NULL,'2026-04-30 02:38:57','2026-04-30 02:38:57'),
(1870,7,113,'system',0,'✅ *Mensajero asignado*\n\n👤 *Nombre:* Miguel Alfaro\n🚗 *Vehículo:* moto\n🔢 *Placa:* 5398EDP\n📱 *Contacto:* 59171876942\n💰 *Precio:* Bs 17.29\n\n📍 *Estado:* Asignado, preparándose para la recogida\n\nEnvía *ESTADO* para actualizaciones.','text','sent',NULL,'2026-04-30 02:38:57','2026-04-30 02:38:57'),
(1871,7,113,'customer',37,'Estado','text','sent',NULL,'2026-04-30 02:39:20','2026-04-30 02:39:20'),
(1872,7,113,'system',0,'✅ Mensajero asignado, en camino a la recogida.\n👤 Mensajero: Miguel Alfaro\n📱 Contacto: 59171876942','text','sent',NULL,'2026-04-30 02:39:20','2026-04-30 02:39:20'),
(1873,7,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 02:39:45','2026-04-30 02:39:45'),
(1874,7,NULL,'customer',37,'#ATTACHMENT:location#Ubicación compartida#-21.5348064#-64.748758','text','sent',NULL,'2026-04-30 02:41:19','2026-04-30 02:41:19'),
(1875,7,114,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 02:41:19','2026-04-30 02:41:19'),
(1876,7,114,'customer',37,'#ATTACHMENT:location#Ubicación compartida#-21.531531531532#-64.714233702085','text','sent',NULL,'2026-04-30 02:41:32','2026-04-30 02:41:32'),
(1877,7,114,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 5.0 km\n💵 Costo del servicio: *Bs 14.47*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 02:41:32','2026-04-30 02:41:32'),
(1878,7,114,'customer',37,'Si','text','sent',NULL,'2026-04-30 02:41:45','2026-04-30 02:41:45'),
(1879,7,114,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-30 02:41:45','2026-04-30 02:41:45'),
(1880,7,114,'customer',37,'No','text','sent',NULL,'2026-04-30 02:41:55','2026-04-30 02:41:55'),
(1881,7,114,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-30 02:41:57','2026-04-30 02:41:57'),
(1882,7,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 02:42:17','2026-04-30 02:42:17'),
(1883,7,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 02:52:07','2026-04-30 02:52:07'),
(1884,7,NULL,'customer',37,'#ATTACHMENT:location#Ubicación compartida#-21.5348164#-64.7487592','text','sent',NULL,'2026-04-30 02:56:35','2026-04-30 02:56:35'),
(1885,7,115,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 02:56:35','2026-04-30 02:56:35'),
(1886,7,115,'customer',37,'#ATTACHMENT:location#Ubicación compartida#-21.559143066406#-64.71036529541','text','sent',NULL,'2026-04-30 02:57:29','2026-04-30 02:57:29'),
(1887,7,115,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 6.7 km\n💵 Costo del servicio: *Bs 19.37*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 02:57:29','2026-04-30 02:57:29'),
(1888,7,115,'customer',37,'No','text','sent',NULL,'2026-04-30 02:57:40','2026-04-30 02:57:40'),
(1889,7,NULL,'system',0,'❌ *Solicitud cancelada*\n\nTu solicitud de entrega ha sido cancelada.\n\nEnvía *HOLA* para comenzar una nueva solicitud.','text','sent',NULL,'2026-04-30 02:57:40','2026-04-30 02:57:40'),
(1890,10,105,'customer',40,'Buenas tardes','text','sent',NULL,'2026-04-30 03:22:40','2026-04-30 03:22:40'),
(1891,10,105,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-04-30 03:22:40','2026-04-30 03:22:40'),
(1892,10,105,'customer',40,'No','text','sent',NULL,'2026-04-30 03:22:55','2026-04-30 03:22:55'),
(1893,10,105,'system',0,'🔍 *Buscando mensajero...*\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-04-30 03:22:57','2026-04-30 03:22:57'),
(1894,10,105,'customer',40,'Cancelado','text','sent',NULL,'2026-04-30 03:23:49','2026-04-30 03:23:49'),
(1895,10,105,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-04-30 03:23:49','2026-04-30 03:23:49'),
(1896,10,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 03:24:04','2026-04-30 03:24:04'),
(1897,10,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 03:24:16','2026-04-30 03:24:16'),
(1898,10,NULL,'customer',40,'Buenas tardes','text','sent',NULL,'2026-04-30 03:24:17','2026-04-30 03:24:17'),
(1899,10,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buenas tardes\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 03:24:17','2026-04-30 03:24:17'),
(1900,10,NULL,'customer',40,'Movil','text','sent',NULL,'2026-04-30 03:24:43','2026-04-30 03:24:43'),
(1901,10,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Movil\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 03:24:43','2026-04-30 03:24:43'),
(1902,25,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 03:25:02','2026-04-30 03:25:02'),
(1903,25,NULL,'customer',65,'Buenas tardes','text','sent',NULL,'2026-04-30 03:25:02','2026-04-30 03:25:02'),
(1904,25,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buenas tardes\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 03:25:02','2026-04-30 03:25:02'),
(1905,25,NULL,'customer',65,'#ATTACHMENT:location#Ubicación compartida#-21.5251658#-64.7295902','text','sent',NULL,'2026-04-30 03:26:01','2026-04-30 03:26:01'),
(1906,25,116,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 03:26:01','2026-04-30 03:26:01'),
(1907,25,116,'customer',65,'#ATTACHMENT:location#Ubicación compartida#-21.5251917#-64.729725','text','sent',NULL,'2026-04-30 03:27:42','2026-04-30 03:27:42'),
(1908,25,116,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-04-30 03:27:42','2026-04-30 03:27:42'),
(1909,25,116,'customer',65,'#ATTACHMENT:location#Ubicación compartida#-21.5538309#-64.7166384','text','sent',NULL,'2026-04-30 03:29:52','2026-04-30 03:29:52'),
(1910,25,116,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 4.8 km\n💵 Costo del servicio: *Bs 13.94*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 03:29:52','2026-04-30 03:29:52'),
(1911,7,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 06:06:06','2026-04-30 06:06:06'),
(1912,7,NULL,'customer',37,'Delivery','text','sent',NULL,'2026-04-30 06:06:06','2026-04-30 06:06:06'),
(1913,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Delivery\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 06:06:06','2026-04-30 06:06:06'),
(1914,7,NULL,'customer',37,'Servicio','text','sent',NULL,'2026-04-30 06:06:06','2026-04-30 06:06:06'),
(1915,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Servicio\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 06:06:06','2026-04-30 06:06:06'),
(1916,7,NULL,'customer',37,'Buenas noches','text','sent',NULL,'2026-04-30 06:06:07','2026-04-30 06:06:07'),
(1917,7,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Buenas noches\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 06:06:07','2026-04-30 06:06:07'),
(1918,10,NULL,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5314617#-64.7520883','text','sent',NULL,'2026-04-30 15:54:14','2026-04-30 15:54:14'),
(1919,10,117,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 15:54:14','2026-04-30 15:54:14'),
(1920,10,117,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.527815#-64.722005','text','sent',NULL,'2026-04-30 16:04:19','2026-04-30 16:04:19'),
(1921,10,117,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 4.4 km\n💵 Costo del servicio: *Bs 12.65*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 16:04:19','2026-04-30 16:04:19'),
(1922,11,NULL,'customer',41,'#ATTACHMENT:location#Ubicación compartida#-21.5420875#-64.7222012','text','sent',NULL,'2026-04-30 20:49:51','2026-04-30 20:49:51'),
(1923,11,118,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 20:49:51','2026-04-30 20:49:51'),
(1924,11,118,'customer',41,'#ATTACHMENT:location#F6RW+JMP, Tarija, Bolivia#-21.50812584595#-64.753830693662','text','sent',NULL,'2026-04-30 20:50:45','2026-04-30 20:50:45'),
(1925,11,118,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 7.0 km\n💵 Costo del servicio: *Bs 20.15*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 20:50:45','2026-04-30 20:50:45'),
(1926,10,117,'customer',40,'No','text','sent',NULL,'2026-04-30 21:29:21','2026-04-30 21:29:21'),
(1927,10,NULL,'system',0,'❌ *Solicitud cancelada*\n\nTu solicitud de entrega ha sido cancelada.\n\nEnvía *HOLA* para comenzar una nueva solicitud.','text','sent',NULL,'2026-04-30 21:29:21','2026-04-30 21:29:21'),
(1928,10,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 21:29:56','2026-04-30 21:29:56'),
(1929,10,NULL,'customer',40,'Hola','text','sent',NULL,'2026-04-30 21:29:57','2026-04-30 21:29:57'),
(1930,10,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 21:29:57','2026-04-30 21:29:57'),
(1931,10,NULL,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5423237#-64.7469487','text','sent',NULL,'2026-04-30 22:10:28','2026-04-30 22:10:28'),
(1932,10,119,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 22:10:28','2026-04-30 22:10:28'),
(1933,10,119,'customer',40,'Hola','text','sent',NULL,'2026-04-30 22:22:00','2026-04-30 22:22:00'),
(1934,10,119,'system',0,'❌ *Destino no válido*\n\n\"Hola\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-04-30 22:22:00','2026-04-30 22:22:00'),
(1935,10,119,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.540435#-64.7269167','text','sent',NULL,'2026-04-30 22:22:32','2026-04-30 22:22:32'),
(1936,10,119,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 2.9 km\n💵 Costo del servicio: *Bs 8.40*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 22:22:32','2026-04-30 22:22:32'),
(1937,10,119,'customer',40,'No','text','sent',NULL,'2026-04-30 22:23:53','2026-04-30 22:23:53'),
(1938,10,NULL,'system',0,'❌ *Solicitud cancelada*\n\nTu solicitud de entrega ha sido cancelada.\n\nEnvía *HOLA* para comenzar una nueva solicitud.','text','sent',NULL,'2026-04-30 22:23:53','2026-04-30 22:23:53'),
(1939,10,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-04-30 22:30:31','2026-04-30 22:30:31'),
(1940,10,NULL,'customer',40,'Hola','text','sent',NULL,'2026-04-30 22:30:32','2026-04-30 22:30:32'),
(1941,10,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-04-30 22:30:32','2026-04-30 22:30:32'),
(1942,10,NULL,'customer',40,'#ATTACHMENT:location#Colegio Bancario#-21.548767089844#-64.732292175293','text','sent',NULL,'2026-04-30 22:31:00','2026-04-30 22:31:00'),
(1943,10,120,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-04-30 22:31:00','2026-04-30 22:31:00'),
(1944,10,120,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5246067#-64.7238933','text','sent',NULL,'2026-04-30 22:31:31','2026-04-30 22:31:31'),
(1945,10,120,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 4.0 km\n💵 Costo del servicio: *Bs 11.38*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-04-30 22:31:31','2026-04-30 22:31:31'),
(1946,10,120,'customer',40,'Hola','text','sent',NULL,'2026-04-30 23:09:29','2026-04-30 23:09:29'),
(1947,10,120,'system',0,'Por favor responde:\n✅ *SÍ* - Para confirmar el envío\n❌ *NO* - Para cancelar','text','sent',NULL,'2026-04-30 23:09:29','2026-04-30 23:09:29'),
(1948,10,120,'customer',40,'No','text','sent',NULL,'2026-04-30 23:09:50','2026-04-30 23:09:50'),
(1949,10,NULL,'system',0,'❌ *Solicitud cancelada*\n\nTu solicitud de entrega ha sido cancelada.\n\nEnvía *HOLA* para comenzar una nueva solicitud.','text','sent',NULL,'2026-04-30 23:09:50','2026-04-30 23:09:50'),
(1950,10,NULL,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5269448#-64.7331732','text','sent',NULL,'2026-05-01 10:02:38','2026-05-01 10:02:38'),
(1951,10,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-05-01 10:02:38','2026-05-01 10:02:38'),
(1952,10,NULL,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5269448#-64.7331732','text','sent',NULL,'2026-05-01 10:13:25','2026-05-01 10:13:25'),
(1953,10,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-05-01 10:13:25','2026-05-01 10:13:25'),
(1954,10,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-01 16:24:57','2026-05-01 16:24:57'),
(1955,10,NULL,'customer',40,'Hola','text','sent',NULL,'2026-05-01 16:24:59','2026-05-01 16:24:59'),
(1956,10,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-05-01 16:24:59','2026-05-01 16:24:59'),
(1957,26,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-02 17:16:36','2026-05-02 17:16:36'),
(1958,26,NULL,'customer',67,'Hola','text','sent',NULL,'2026-05-02 17:16:37','2026-05-02 17:16:37'),
(1959,26,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-05-02 17:16:37','2026-05-02 17:16:37'),
(1960,24,NULL,'customer',62,'69300348','text','sent',NULL,'2026-05-04 05:26:10','2026-05-04 05:26:10'),
(1961,24,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"69300348\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-05-04 05:26:10','2026-05-04 05:26:10'),
(1962,27,NULL,'customer',68,'Delibery','text','sent',NULL,'2026-05-04 08:15:24','2026-05-04 08:15:24'),
(1963,27,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-04 08:15:24','2026-05-04 08:15:24'),
(1964,8,NULL,'customer',38,'Delivery','text','sent',NULL,'2026-05-04 08:15:45','2026-05-04 08:15:45'),
(1965,8,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-05-04 08:15:45','2026-05-04 08:15:45'),
(1966,8,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n📍 *Paso 1 de 3:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-04 08:15:56','2026-05-04 08:15:56'),
(1967,8,NULL,'customer',38,'Hola','text','sent',NULL,'2026-05-04 08:15:57','2026-05-04 08:15:57'),
(1968,8,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Hola\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-05-04 08:15:57','2026-05-04 08:15:57'),
(1969,27,NULL,'customer',68,'#ATTACHMENT:location#Ubicación compartida#-21.5204866#-64.7303455','text','sent',NULL,'2026-05-04 08:16:05','2026-05-04 08:16:05'),
(1970,27,121,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 2 de 3:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-05-04 08:16:05','2026-05-04 08:16:05'),
(1971,27,121,'customer',68,'#ATTACHMENT:location#Ubicación compartida#-21.5205639#-64.7303609','text','sent',NULL,'2026-05-04 08:16:35','2026-05-04 08:16:35'),
(1972,27,121,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-05-04 08:16:35','2026-05-04 08:16:35'),
(1973,27,121,'customer',68,'#ATTACHMENT:location#Daniel Zamora 1537, Tarija, Bolivia#-21.520904406623#-64.740640260279','text','sent',NULL,'2026-05-04 08:17:02','2026-05-04 08:17:02'),
(1974,27,121,'system',0,'💰 *Paso 3 de 3:* Confirmar envío\n\n📍 Distancia: 1.5 km\n💵 Costo del servicio: *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-05-04 08:17:02','2026-05-04 08:17:02'),
(1975,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n🛵🚗 *Paso 1 de 4:* Tipo de vehículo\n\n¿Qué tipo de vehículo necesitas?\n\n1️⃣ *MOTO* - Rápido, ideal para documentos y paquetes pequeños\n2️⃣ *AUTO* - Para paquetes medianos\n3️⃣ *MINIVAN* - Para cargas grandes o múltiples paquetes\n4️⃣ *CAMIÓN* - Para mudanzas o cargas muy grandes\n\nResponde con el número o el tipo de vehículo que prefieres.','text','sent',NULL,'2026-05-04 20:35:39','2026-05-04 20:35:39'),
(1976,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-05-04 20:35:40','2026-05-04 20:35:40'),
(1977,5,NULL,'system',0,'❌ *Tipo no válido*\n\nPor favor elige una opción válida:\n\n1️⃣ *MOTO* - Documentos y paquetes pequeños\n2️⃣ *AUTO* - Paquetes medianos\n3️⃣ *MINIVAN* - Cargas grandes\n4️⃣ *CAMIÓN* - Mudanzas o cargas muy grandes\n\nResponde con el número o nombre del vehículo.','text','sent',NULL,'2026-05-04 20:35:40','2026-05-04 20:35:40'),
(1978,5,NULL,'customer',35,'1','text','sent',NULL,'2026-05-04 20:36:02','2026-05-04 20:36:02'),
(1979,5,122,'system',0,'✅ *Vehículo seleccionado:* 🛵 Moto\n\n📍 *Paso 2 de 4:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-04 20:36:02','2026-05-04 20:36:02'),
(1980,5,122,'customer',35,'#ATTACHMENT:location#David Trapero 3640, Santa Cruz de la Sierra, Bolivia#-17.794981438016#-63.156182952225','text','sent',NULL,'2026-05-04 21:00:59','2026-05-04 21:00:59'),
(1981,5,122,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 3 de 4:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-05-04 21:00:59','2026-05-04 21:00:59'),
(1982,5,122,'customer',35,'#ATTACHMENT:location#6RJV+FP6, Santa Cruz de la Sierra, Bolivia#-17.768974323428#-63.155739717185','text','sent',NULL,'2026-05-04 21:01:17','2026-05-04 21:01:17'),
(1983,5,122,'system',0,'💰 *Paso 4 de 4:* Confirmar envío\n\n🚗 *Vehículo:* 🛵 Moto\n📍 *Distancia:* 4.1 km\n💵 *Costo del servicio:* *Bs 11.66*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-05-04 21:01:17','2026-05-04 21:01:17'),
(1984,5,122,'customer',35,'Si','text','sent',NULL,'2026-05-04 21:01:27','2026-05-04 21:01:27'),
(1985,5,122,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-05-04 21:01:27','2026-05-04 21:01:27'),
(1986,5,122,'customer',35,'HEY AQUI ESTA EL MENSAJE','text','sent',NULL,'2026-05-04 21:02:16','2026-05-04 21:02:16'),
(1987,5,122,'system',0,'🔍 *Buscando mensajero...*\n\nBuscando mensajero con *🛵 moto* disponible.\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-05-04 21:02:18','2026-05-04 21:02:18'),
(1988,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n🛵🚗 *Paso 1 de 4:* Tipo de vehículo\n\n¿Qué tipo de vehículo necesitas?\n\n1️⃣ *MOTO* - Rápido, ideal para documentos y paquetes pequeños\n2️⃣ *AUTO* - Para paquetes medianos\n3️⃣ *MINIVAN* - Para cargas grandes o múltiples paquetes\n4️⃣ *CAMIÓN* - Para mudanzas o cargas muy grandes\n\nResponde con el número o el tipo de vehículo que prefieres.','text','sent',NULL,'2026-05-04 21:04:36','2026-05-04 21:04:36'),
(1989,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-04 21:04:50','2026-05-04 21:04:50'),
(1990,5,123,'system',0,'✅ *Vehículo seleccionado:* 🚗 Auto\n\n📍 *Paso 2 de 4:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-04 21:04:50','2026-05-04 21:04:50'),
(1991,5,123,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.80431#-63.1566562','text','sent',NULL,'2026-05-04 21:05:11','2026-05-04 21:05:11'),
(1992,5,123,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 3 de 4:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-05-04 21:05:11','2026-05-04 21:05:11'),
(1993,5,123,'customer',35,'#ATTACHMENT:location#6RGW+M2J, Av Dr Lucas Saucedo, Santa Cruz de la Sierra, Bolivia#-17.773000420429#-63.155530169606','text','sent',NULL,'2026-05-04 21:05:23','2026-05-04 21:05:23'),
(1994,5,123,'system',0,'💰 *Paso 4 de 4:* Confirmar envío\n\n🚗 *Vehículo:* 🚗 Auto\n📍 *Distancia:* 4.9 km\n💵 *Costo del servicio:* *Bs 14.05*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-05-04 21:05:23','2026-05-04 21:05:23'),
(1995,5,123,'customer',35,'Si','text','sent',NULL,'2026-05-04 21:05:35','2026-05-04 21:05:35'),
(1996,5,123,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-05-04 21:05:35','2026-05-04 21:05:35'),
(1997,5,123,'customer',35,'No','text','sent',NULL,'2026-05-04 21:05:47','2026-05-04 21:05:47'),
(1998,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n🛵🚗 *Paso 1 de 4:* Tipo de vehículo\n\n¿Qué tipo de vehículo necesitas?\n\n1️⃣ *MOTO* - Rápido, ideal para documentos y paquetes pequeños\n2️⃣ *AUTO* - Para paquetes medianos\n3️⃣ *MINIVAN* - Para cargas grandes o múltiples paquetes\n4️⃣ *CAMIÓN* - Para mudanzas o cargas muy grandes\n\nResponde con el número o el tipo de vehículo que prefieres.','text','sent',NULL,'2026-05-05 00:16:29','2026-05-05 00:16:29'),
(1999,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-05 00:17:02','2026-05-05 00:17:02'),
(2000,5,124,'system',0,'✅ *Vehículo seleccionado:* 🚗 Auto\n\n📍 *Paso 2 de 4:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-05 00:17:02','2026-05-05 00:17:02'),
(2001,5,124,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044415#-63.1567996','text','sent',NULL,'2026-05-05 00:17:19','2026-05-05 00:17:19'),
(2002,5,124,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 3 de 4:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-05-05 00:17:19','2026-05-05 00:17:19'),
(2003,5,124,'customer',35,'#ATTACHMENT:location#Av. Cristo Redentor 950, Santa Cruz de la Sierra, Bolivia#-17.725786580466#-63.167534396052','text','sent',NULL,'2026-05-05 00:17:42','2026-05-05 00:17:42'),
(2004,5,124,'system',0,'💰 *Paso 4 de 4:* Confirmar envío\n\n🚗 *Vehículo:* 🚗 Auto\n📍 *Distancia:* 12.4 km\n💵 *Costo del servicio:* *Bs 35.56*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-05-05 00:17:42','2026-05-05 00:17:42'),
(2005,5,124,'customer',35,'Si','text','sent',NULL,'2026-05-05 00:17:52','2026-05-05 00:17:52'),
(2006,5,124,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-05-05 00:17:52','2026-05-05 00:17:52'),
(2007,5,124,'customer',35,'No','text','sent',NULL,'2026-05-05 00:18:01','2026-05-05 00:18:01'),
(2008,5,NULL,'customer',35,'Estado','text','sent',NULL,'2026-05-05 00:18:28','2026-05-05 00:18:28'),
(2009,5,NULL,'system',0,'✅ *Sesión completada*\n\nNo hay envíos activos.\n\nEnvía *HOLA* para realizar una nueva entrega.','text','sent',NULL,'2026-05-05 00:18:28','2026-05-05 00:18:28'),
(2010,4,NULL,'customer',15,'[image message]','text','sent',NULL,'2026-05-05 00:23:49','2026-05-05 00:23:49'),
(2011,4,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"[image message]\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-05-05 00:23:49','2026-05-05 00:23:49'),
(2012,4,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n🛵🚗 *Paso 1 de 4:* Tipo de vehículo\n\n¿Qué tipo de vehículo necesitas?\n\n1️⃣ *MOTO* - Rápido, ideal para documentos y paquetes pequeños\n2️⃣ *AUTO* - Para paquetes medianos\n3️⃣ *MINIVAN* - Para cargas grandes o múltiples paquetes\n4️⃣ *CAMIÓN* - Para mudanzas o cargas muy grandes\n\nResponde con el número o el tipo de vehículo que prefieres.','text','sent',NULL,'2026-05-05 00:24:01','2026-05-05 00:24:01'),
(2013,4,NULL,'customer',15,'Buenas tardes estimado Ugi','text','sent',NULL,'2026-05-05 00:24:02','2026-05-05 00:24:02'),
(2014,4,NULL,'system',0,'❌ *Tipo no válido*\n\nPor favor elige una opción válida:\n\n1️⃣ *MOTO* - Documentos y paquetes pequeños\n2️⃣ *AUTO* - Paquetes medianos\n3️⃣ *MINIVAN* - Cargas grandes\n4️⃣ *CAMIÓN* - Mudanzas o cargas muy grandes\n\nResponde con el número o nombre del vehículo.','text','sent',NULL,'2026-05-05 00:24:02','2026-05-05 00:24:02'),
(2015,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n🛵🚗 *Paso 1 de 4:* Tipo de vehículo\n\n¿Qué tipo de vehículo necesitas?\n\n1️⃣ *MOTO* - Rápido, ideal para documentos y paquetes pequeños\n2️⃣ *AUTO* - Para paquetes medianos\n3️⃣ *MINIVAN* - Para cargas grandes o múltiples paquetes\n4️⃣ *CAMIÓN* - Para mudanzas o cargas muy grandes\n\nResponde con el número o el tipo de vehículo que prefieres.','text','sent',NULL,'2026-05-05 00:39:08','2026-05-05 00:39:08'),
(2016,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-05-05 00:39:10','2026-05-05 00:39:10'),
(2017,5,NULL,'system',0,'❌ *Tipo no válido*\n\nPor favor elige una opción válida:\n\n1️⃣ *MOTO* - Documentos y paquetes pequeños\n2️⃣ *AUTO* - Paquetes medianos\n3️⃣ *MINIVAN* - Cargas grandes\n4️⃣ *CAMIÓN* - Mudanzas o cargas muy grandes\n\nResponde con el número o nombre del vehículo.','text','sent',NULL,'2026-05-05 00:39:10','2026-05-05 00:39:10'),
(2018,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n🛵🚗 *Paso 1 de 4:* Tipo de vehículo\n\n¿Qué tipo de vehículo necesitas?\n\n1️⃣ *MOTO* - Rápido, ideal para documentos y paquetes pequeños\n2️⃣ *AUTO* - Para paquetes medianos\n3️⃣ *MINIVAN* - Para cargas grandes o múltiples paquetes\n4️⃣ *CAMIÓN* - Para mudanzas o cargas muy grandes\n\nResponde con el número o el tipo de vehículo que prefieres.','text','sent',NULL,'2026-05-05 00:41:06','2026-05-05 00:41:06'),
(2019,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-05 00:43:04','2026-05-05 00:43:04'),
(2020,5,125,'system',0,'✅ *Vehículo seleccionado:* 🚗 Auto\n\n📍 *Paso 2 de 4:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-05 00:43:04','2026-05-05 00:43:04'),
(2021,5,125,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044403#-63.1567979','text','sent',NULL,'2026-05-05 00:43:20','2026-05-05 00:43:20'),
(2022,5,125,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 3 de 4:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-05-05 00:43:20','2026-05-05 00:43:20'),
(2023,5,125,'customer',35,'#ATTACHMENT:location#Calle 2 10, Santa Cruz de la Sierra, Bolivia#-17.729974921436#-63.165346384048','text','sent',NULL,'2026-05-05 00:43:35','2026-05-05 00:43:35'),
(2024,5,125,'system',0,'💰 *Paso 4 de 4:* Confirmar envío\n\n🚗 *Vehículo:* 🚗 Auto\n📍 *Distancia:* 11.7 km\n💵 *Costo del servicio:* *Bs 33.58*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-05-05 00:43:35','2026-05-05 00:43:35'),
(2025,5,125,'customer',35,'Si','text','sent',NULL,'2026-05-05 00:43:51','2026-05-05 00:43:51'),
(2026,5,125,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-05-05 00:43:51','2026-05-05 00:43:51'),
(2027,5,125,'customer',35,'No','text','sent',NULL,'2026-05-05 00:44:04','2026-05-05 00:44:04'),
(2028,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n🛵🚗 *Paso 1 de 4:* Tipo de vehículo\n\n¿Qué tipo de vehículo necesitas?\n\n1️⃣ *MOTO* - Rápido, ideal para documentos y paquetes pequeños\n2️⃣ *AUTO* - Para paquetes medianos\n3️⃣ *MINIVAN* - Para cargas grandes o múltiples paquetes\n4️⃣ *CAMIÓN* - Para mudanzas o cargas muy grandes\n\nResponde con el número o el tipo de vehículo que prefieres.','text','sent',NULL,'2026-05-05 00:44:53','2026-05-05 00:44:53'),
(2029,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-05 00:44:58','2026-05-05 00:44:58'),
(2030,5,126,'system',0,'✅ *Vehículo seleccionado:* 🚗 Auto\n\n📍 *Paso 2 de 4:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-05 00:44:58','2026-05-05 00:44:58'),
(2031,5,126,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044416#-63.1567943','text','sent',NULL,'2026-05-05 00:45:47','2026-05-05 00:45:47'),
(2032,5,126,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 3 de 4:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-05-05 00:45:47','2026-05-05 00:45:47'),
(2033,5,126,'customer',35,'#ATTACHMENT:location#Las Petas 2685, Santa Cruz de la Sierra, Bolivia#-17.774496215284#-63.157257847488','text','sent',NULL,'2026-05-05 00:46:00','2026-05-05 00:46:00'),
(2034,5,126,'system',0,'💰 *Paso 4 de 4:* Confirmar envío\n\n🚗 *Vehículo:* 🚗 Auto\n📍 *Distancia:* 4.7 km\n💵 *Costo del servicio:* *Bs 13.43*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-05-05 00:46:00','2026-05-05 00:46:00'),
(2035,5,126,'customer',35,'Si','text','sent',NULL,'2026-05-05 00:46:07','2026-05-05 00:46:07'),
(2036,5,126,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-05-05 00:46:07','2026-05-05 00:46:07'),
(2037,5,126,'customer',35,'CON PARRILLA','text','sent',NULL,'2026-05-05 00:46:17','2026-05-05 00:46:17'),
(2038,5,126,'system',0,'🔍 *Buscando mensajero...*\n\nBuscando mensajero con *🚗 auto* disponible.\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-05-05 00:46:18','2026-05-05 00:46:18'),
(2039,8,NULL,'customer',38,'Movil','text','sent',NULL,'2026-05-05 03:48:11','2026-05-05 03:48:11'),
(2040,8,NULL,'system',0,'❌ *Ubicación no válida*\n\nNo puedo usar \"Movil\" porque no es una ubicación GPS real.\n\nPor favor envía la ubicación usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nNo escribas nombres de lugares, debe ser una ubicación GPS.','text','sent',NULL,'2026-05-05 03:48:11','2026-05-05 03:48:11'),
(2041,8,NULL,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.534878#-64.7486326','text','sent',NULL,'2026-05-05 03:49:52','2026-05-05 03:49:52'),
(2042,8,NULL,'system',0,'❌ Error: No se encontró la entrega. Escribe \'reiniciar\' para comenzar de nuevo.','text','sent',NULL,'2026-05-05 03:49:52','2026-05-05 03:49:52'),
(2043,8,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n🛵🚗 *Paso 1 de 4:* Tipo de vehículo\n\n¿Qué tipo de vehículo necesitas?\n\n1️⃣ *MOTO* - Rápido, ideal para documentos y paquetes pequeños\n2️⃣ *AUTO* - Para paquetes medianos\n3️⃣ *MINIVAN* - Para cargas grandes o múltiples paquetes\n4️⃣ *CAMIÓN* - Para mudanzas o cargas muy grandes\n\nResponde con el número o el tipo de vehículo que prefieres.','text','sent',NULL,'2026-05-05 03:50:20','2026-05-05 03:50:20'),
(2044,8,NULL,'customer',38,'2','text','sent',NULL,'2026-05-05 03:51:09','2026-05-05 03:51:09'),
(2045,8,127,'system',0,'✅ *Vehículo seleccionado:* 🚗 Auto\n\n📍 *Paso 2 de 4:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-05 03:51:09','2026-05-05 03:51:09'),
(2046,8,127,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5349784#-64.7488282','text','sent',NULL,'2026-05-05 03:51:34','2026-05-05 03:51:34'),
(2047,8,127,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 3 de 4:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-05-05 03:51:34','2026-05-05 03:51:34'),
(2048,8,127,'customer',38,'Delivery','text','sent',NULL,'2026-05-05 03:58:24','2026-05-05 03:58:24'),
(2049,8,127,'system',0,'❌ *Destino no válido*\n\n\"Delivery\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-05-05 03:58:24','2026-05-05 03:58:24'),
(2050,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n🛵🚗 *Paso 1 de 4:* Tipo de vehículo\n\n¿Qué tipo de vehículo necesitas?\n\n1️⃣ *MOTO* - Rápido, ideal para documentos y paquetes pequeños\n2️⃣ *AUTO* - Para paquetes medianos\n3️⃣ *MINIVAN* - Para cargas grandes o múltiples paquetes\n4️⃣ *CAMIÓN* - Para mudanzas o cargas muy grandes\n\nResponde con el número o el tipo de vehículo que prefieres.','text','sent',NULL,'2026-05-05 04:21:11','2026-05-05 04:21:11'),
(2051,5,NULL,'customer',35,'Hola','text','sent',NULL,'2026-05-05 04:21:12','2026-05-05 04:21:12'),
(2052,5,NULL,'system',0,'❌ *Tipo no válido*\n\nPor favor elige una opción válida:\n\n1️⃣ *MOTO* - Documentos y paquetes pequeños\n2️⃣ *AUTO* - Paquetes medianos\n3️⃣ *MINIVAN* - Cargas grandes\n4️⃣ *CAMIÓN* - Mudanzas o cargas muy grandes\n\nResponde con el número o nombre del vehículo.','text','sent',NULL,'2026-05-05 04:21:12','2026-05-05 04:21:12'),
(2053,5,NULL,'customer',35,'Movil','text','sent',NULL,'2026-05-05 04:21:32','2026-05-05 04:21:32'),
(2054,5,NULL,'system',0,'❌ *Tipo no válido*\n\nPor favor elige una opción válida:\n\n1️⃣ *MOTO* - Documentos y paquetes pequeños\n2️⃣ *AUTO* - Paquetes medianos\n3️⃣ *MINIVAN* - Cargas grandes\n4️⃣ *CAMIÓN* - Mudanzas o cargas muy grandes\n\nResponde con el número o nombre del vehículo.','text','sent',NULL,'2026-05-05 04:21:32','2026-05-05 04:21:32'),
(2055,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-05 04:21:51','2026-05-05 04:21:51'),
(2056,5,128,'system',0,'✅ *Vehículo seleccionado:* 🚗 Auto\n\n📍 *Paso 2 de 4:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-05 04:21:51','2026-05-05 04:21:51'),
(2057,5,128,'customer',35,'#ATTACHMENT:location#Av. Carmelo Ortiz 100, Santa Cruz de la Sierra, Bolivia#-17.792290903213#-63.154530711472','text','sent',NULL,'2026-05-05 04:22:27','2026-05-05 04:22:27'),
(2058,5,128,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 3 de 4:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-05-05 04:22:27','2026-05-05 04:22:27'),
(2059,5,128,'customer',35,'#ATTACHMENT:location#7R6M+5V2 Plaza Los Motacuses, Santa Cruz de la Sierra, Bolivia#-17.739351149019#-63.164949081838','text','sent',NULL,'2026-05-05 04:23:18','2026-05-05 04:23:18'),
(2060,5,128,'system',0,'💰 *Paso 4 de 4:* Confirmar envío\n\n🚗 *Vehículo:* 🚗 Auto\n📍 *Distancia:* 8.4 km\n💵 *Costo del servicio:* *Bs 24.15*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-05-05 04:23:18','2026-05-05 04:23:18'),
(2061,8,127,'customer',38,'Hola','text','sent',NULL,'2026-05-05 04:43:41','2026-05-05 04:43:41'),
(2062,8,127,'system',0,'❌ *Destino no válido*\n\n\"Hola\" no es una ubicación GPS real.\n\nPor favor envía la ubicación de destino usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Selecciona el punto en el mapa\n\nEl cálculo solo funciona con coordenadas GPS reales.','text','sent',NULL,'2026-05-05 04:43:41','2026-05-05 04:43:41'),
(2063,8,127,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5324516#-64.7314692','text','sent',NULL,'2026-05-05 04:45:00','2026-05-05 04:45:00'),
(2064,8,127,'system',0,'💰 *Paso 4 de 4:* Confirmar envío\n\n🚗 *Vehículo:* 🚗 Auto\n📍 *Distancia:* 2.5 km\n💵 *Costo del servicio:* *Bs 7.33*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-05-05 04:45:00','2026-05-05 04:45:00'),
(2065,8,127,'customer',38,'No','text','sent',NULL,'2026-05-05 04:53:32','2026-05-05 04:53:32'),
(2066,8,NULL,'system',0,'❌ *Solicitud cancelada*\n\nTu solicitud de entrega ha sido cancelada.\n\nEnvía *HOLA* para comenzar una nueva solicitud.','text','sent',NULL,'2026-05-05 04:53:32','2026-05-05 04:53:32'),
(2067,5,128,'customer',35,'Si','text','sent',NULL,'2026-05-05 05:07:14','2026-05-05 05:07:14'),
(2068,5,128,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-05-05 05:07:14','2026-05-05 05:07:14'),
(2069,5,128,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.803901#-63.1562694','text','sent',NULL,'2026-05-05 05:07:15','2026-05-05 05:07:15'),
(2070,5,128,'system',0,'🔍 *Buscando mensajero...*\n\nBuscando mensajero con *🚗 auto* disponible.\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-05-05 05:07:15','2026-05-05 05:07:15'),
(2071,5,128,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.78737358113#-63.151888400316','text','sent',NULL,'2026-05-05 05:07:15','2026-05-05 05:07:15'),
(2072,5,128,'system',0,'⏳ *Búsqueda en progreso...*\n\nTodavía estamos buscando un mensajero para tu envío.\n\nPor favor ten paciencia o escribe *CANCELAR* para detener la búsqueda.','text','sent',NULL,'2026-05-05 05:07:15','2026-05-05 05:07:15'),
(2073,8,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n🛵🚗 *Paso 1 de 4:* Tipo de vehículo\n\n¿Qué tipo de vehículo necesitas?\n\n1️⃣ *MOTO* - Rápido, ideal para documentos y paquetes pequeños\n2️⃣ *AUTO* - Para paquetes medianos\n3️⃣ *MINIVAN* - Para cargas grandes o múltiples paquetes\n4️⃣ *CAMIÓN* - Para mudanzas o cargas muy grandes\n\nResponde con el número o el tipo de vehículo que prefieres.','text','sent',NULL,'2026-05-05 05:09:52','2026-05-05 05:09:52'),
(2074,8,NULL,'customer',38,'Hola','text','sent',NULL,'2026-05-05 05:09:53','2026-05-05 05:09:53'),
(2075,8,NULL,'system',0,'❌ *Tipo no válido*\n\nPor favor elige una opción válida:\n\n1️⃣ *MOTO* - Documentos y paquetes pequeños\n2️⃣ *AUTO* - Paquetes medianos\n3️⃣ *MINIVAN* - Cargas grandes\n4️⃣ *CAMIÓN* - Mudanzas o cargas muy grandes\n\nResponde con el número o nombre del vehículo.','text','sent',NULL,'2026-05-05 05:09:53','2026-05-05 05:09:53'),
(2076,8,NULL,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5204405#-64.7304364','text','sent',NULL,'2026-05-05 05:09:58','2026-05-05 05:09:58'),
(2077,8,NULL,'system',0,'❌ *Tipo no válido*\n\nPor favor elige una opción válida:\n\n1️⃣ *MOTO* - Documentos y paquetes pequeños\n2️⃣ *AUTO* - Paquetes medianos\n3️⃣ *MINIVAN* - Cargas grandes\n4️⃣ *CAMIÓN* - Mudanzas o cargas muy grandes\n\nResponde con el número o nombre del vehículo.','text','sent',NULL,'2026-05-05 05:09:58','2026-05-05 05:09:58'),
(2078,8,NULL,'customer',38,'2','text','sent',NULL,'2026-05-05 05:10:30','2026-05-05 05:10:30'),
(2079,8,129,'system',0,'✅ *Vehículo seleccionado:* 🚗 Auto\n\n📍 *Paso 2 de 4:* Ubicación de recogida\n\nPor favor envía la ubicación de recogida usando WhatsApp:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación*\n3. Envía la ubicación en el mapa\n\n⚠️ *Importante:* Debe ser una ubicación GPS real, no texto.','text','sent',NULL,'2026-05-05 05:10:30','2026-05-05 05:10:30'),
(2080,5,NULL,'system',0,'¡Hola! Bienvenido a Delivery Avaroa 🚚\n\nTe ayudaré a coordinar tu envío.\n\n🛵🚗 *Paso 1 de 4:* Tipo de vehículo\n\n¿Qué tipo de vehículo necesitas?\n\n1️⃣ *MOTO* - Rápido, ideal para documentos y paquetes pequeños\n2️⃣ *AUTO* - Para paquetes medianos\n3️⃣ *MINIVAN* - Para cargas grandes o múltiples paquetes\n4️⃣ *CAMIÓN* - Para mudanzas o cargas muy grandes\n\nResponde con el número o el tipo de vehículo que prefieres.','text','sent',NULL,'2026-05-05 05:11:10','2026-05-05 05:11:10'),
(2081,8,129,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5204483#-64.7304359','text','sent',NULL,'2026-05-05 05:12:53','2026-05-05 05:12:53'),
(2082,8,129,'system',0,'✅ *Recogida registrada*\n\n📍 Coordenadas guardadas correctamente.\n\n📦 *Paso 3 de 4:* Ubicación de destino\n\nAhora envía la ubicación de *DESTINO* usando el mismo método:\n\n1. Toca el ícono de adjuntar (📎)\n2. Selecciona *Ubicación* 📍\n3. Envía la ubicación de entrega','text','sent',NULL,'2026-05-05 05:12:53','2026-05-05 05:12:53'),
(2083,8,129,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5204427#-64.7304381','text','sent',NULL,'2026-05-05 05:13:37','2026-05-05 05:13:37'),
(2084,8,129,'system',0,'❌ *Destino inválido*\n\nLa ubicación de destino es igual a la recogida. Por favor envía una ubicación diferente.','text','sent',NULL,'2026-05-05 05:13:37','2026-05-05 05:13:37'),
(2085,8,129,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5335466#-64.7271885','text','sent',NULL,'2026-05-05 05:14:26','2026-05-05 05:14:26'),
(2086,8,129,'system',0,'💰 *Paso 4 de 4:* Confirmar envío\n\n🚗 *Vehículo:* 🚗 Auto\n📍 *Distancia:* 2.1 km\n💵 *Costo del servicio:* *Bs 7.00*\n\n¿Deseas confirmar el envío?\n\nResponde *SÍ* para buscar un mensajero\nResponde *NO* para cancelar','text','sent',NULL,'2026-05-05 05:14:26','2026-05-05 05:14:26'),
(2087,8,129,'customer',38,'Si','text','sent',NULL,'2026-05-05 05:14:59','2026-05-05 05:14:59'),
(2088,8,129,'system',0,'📝 *Instrucciones opcionales*\n\n¿Deseas agregar alguna instrucción para el mensajero?\n\nEjemplos:\n• Llamar antes de llegar\n• Pedir factura\n• Entregar a recepción\n\nEscribe las instrucciones o responde *NO* para continuar sin instrucciones.','text','sent',NULL,'2026-05-05 05:14:59','2026-05-05 05:14:59'),
(2089,8,129,'customer',38,'No','text','sent',NULL,'2026-05-05 05:17:04','2026-05-05 05:17:04'),
(2090,8,129,'system',0,'🔍 *Buscando mensajero...*\n\nBuscando mensajero con *🚗 auto* disponible.\n\nSe ha notificado a los mensajeros disponibles. Tienen *5 minutos* para aceptar tu solicitud.\n\n⏳ Por favor espera un momento...\n\nPuedes escribir *ESTADO* para verificar el estado o *CANCELAR* para anular.','text','sent',NULL,'2026-05-05 05:17:04','2026-05-05 05:17:04'),
(2091,8,129,'customer',38,'Estado','text','sent',NULL,'2026-05-05 05:19:51','2026-05-05 05:19:51'),
(2092,8,129,'system',0,'⏳ *Buscando mensajero...*\n\nTodavía estamos buscando un mensajero disponible.\n\nTiempo restante: aproximadamente 5 minutos desde que iniciaste la búsqueda.\n\nEscribe *CANCELAR* si deseas detener la búsqueda.','text','sent',NULL,'2026-05-05 05:19:51','2026-05-05 05:19:51'),
(2093,8,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitas mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-05 18:23:40','2026-05-05 18:23:40'),
(2094,8,NULL,'customer',38,'5','text','sent',NULL,'2026-05-05 18:24:21','2026-05-05 18:24:21'),
(2095,8,130,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnviamé tu *ubicación real* de WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y mandá\n\n⚠️ *Solo GPS real.* No escribas direcciones.','text','sent',NULL,'2026-05-05 18:24:21','2026-05-05 18:24:21'),
(2096,8,130,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5347808#-64.7487163','text','sent',NULL,'2026-05-05 18:24:49','2026-05-05 18:24:49'),
(2097,8,130,'system',0,'❌ Esa ubicación queda fuera de Santa Cruz.\n\nMandame una ubicación dentro del área de cobertura.','text','sent',NULL,'2026-05-05 18:24:49','2026-05-05 18:24:49'),
(2098,8,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitas mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-05 20:41:13','2026-05-05 20:41:13'),
(2099,8,NULL,'customer',38,'55','text','sent',NULL,'2026-05-05 20:41:54','2026-05-05 20:41:54'),
(2100,8,131,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnviamé tu *ubicación real* de WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y mandá\n\n⚠️ *Solo GPS real.* No escribas direcciones.','text','sent',NULL,'2026-05-05 20:41:54','2026-05-05 20:41:54'),
(2101,8,131,'customer',38,'5','text','sent',NULL,'2026-05-05 20:41:58','2026-05-05 20:41:58'),
(2102,8,131,'system',0,'❌ Eso no es una ubicación GPS.\n\nTocá 📎 → Ubicación → elegí el punto en el mapa.\nSin texto, sin direcciones escritas.','text','sent',NULL,'2026-05-05 20:41:58','2026-05-05 20:41:58'),
(2103,8,131,'customer',38,'#ATTACHMENT:location#Ubicación compartida#-21.5348011#-64.7487496','text','sent',NULL,'2026-05-05 20:42:15','2026-05-05 20:42:15'),
(2104,8,131,'system',0,'❌ Esa ubicación queda fuera de Santa Cruz.\n\nMandame una ubicación dentro del área de cobertura.','text','sent',NULL,'2026-05-05 20:42:15','2026-05-05 20:42:15'),
(2105,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitas mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-05 21:14:29','2026-05-05 21:14:29'),
(2106,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-05 21:15:04','2026-05-05 21:15:04'),
(2107,5,132,'system',0,'✅ 🏍️ Moto Veloz — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnviamé tu *ubicación real* de WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y mandá\n\n⚠️ *Solo GPS real.* No escribas direcciones.','text','sent',NULL,'2026-05-05 21:15:04','2026-05-05 21:15:04'),
(2108,5,132,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044444#-63.156812','text','sent',NULL,'2026-05-05 21:15:36','2026-05-05 21:15:36'),
(2109,5,132,'system',0,'✅ Recogida guardada.\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos el paquete?\n\nMandame la ubicación de *destino* del mismo modo:\n📎 → Ubicación → elegí en el mapa','text','sent',NULL,'2026-05-05 21:15:36','2026-05-05 21:15:36'),
(2110,5,132,'customer',35,'#ATTACHMENT:location#Teniente Antonio Cueto 3136, Santa Cruz de la Sierra, Bolivia#-17.753581728472#-63.16204559058','text','sent',NULL,'2026-05-05 21:16:08','2026-05-05 21:16:08'),
(2111,5,132,'system',0,'⏳ Calculando precio... dame un segundito.','text','sent',NULL,'2026-05-05 21:16:08','2026-05-05 21:16:08'),
(2112,5,132,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🏍️ Moto Veloz\n📍 Distancia: 8.0 km\n💰 Precio: *Bs 22.91*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO*','text','sent',NULL,'2026-05-05 21:16:09','2026-05-05 21:16:09'),
(2113,5,132,'customer',35,'Si','text','sent',NULL,'2026-05-05 21:16:29','2026-05-05 21:16:29'),
(2114,5,132,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-05 21:16:29','2026-05-05 21:16:29'),
(2115,5,132,'customer',35,'No','text','sent',NULL,'2026-05-05 21:16:40','2026-05-05 21:16:40'),
(2116,5,NULL,'customer',35,'eStado','text','sent',NULL,'2026-05-05 21:16:58','2026-05-05 21:16:58'),
(2117,5,NULL,'system',0,'✅ No tenés envíos activos.\n\nEscribí *HOLA* para hacer una nueva entrega 🚚','text','sent',NULL,'2026-05-05 21:16:58','2026-05-05 21:16:58'),
(2118,5,NULL,'customer',35,'Hila','text','sent',NULL,'2026-05-05 21:17:09','2026-05-05 21:17:09'),
(2119,5,NULL,'system',0,'✅ No tenés envíos activos.\n\nEscribí *HOLA* para hacer una nueva entrega 🚚','text','sent',NULL,'2026-05-05 21:17:09','2026-05-05 21:17:09'),
(2120,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitas mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-05 21:17:21','2026-05-05 21:17:21'),
(2121,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-05 21:17:32','2026-05-05 21:17:32'),
(2122,5,133,'system',0,'✅ 🏍️ Moto Veloz — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnviamé tu *ubicación real* de WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y mandá\n\n⚠️ *Solo GPS real.* No escribas direcciones.','text','sent',NULL,'2026-05-05 21:17:32','2026-05-05 21:17:32'),
(2123,5,133,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044481#-63.1568131','text','sent',NULL,'2026-05-05 21:17:53','2026-05-05 21:17:53'),
(2124,5,133,'system',0,'✅ Recogida guardada.\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos el paquete?\n\nMandame la ubicación de *destino* del mismo modo:\n📎 → Ubicación → elegí en el mapa','text','sent',NULL,'2026-05-05 21:17:53','2026-05-05 21:17:53'),
(2125,5,133,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044272#-63.1568049','text','sent',NULL,'2026-05-05 21:18:09','2026-05-05 21:18:09'),
(2126,5,133,'system',0,'❌ El destino es igual a la recogida.\n\nMandame una ubicación *diferente*.','text','sent',NULL,'2026-05-05 21:18:09','2026-05-05 21:18:09'),
(2127,5,133,'customer',35,'#ATTACHMENT:location#6R6V+XC5, Santa Cruz de la Sierra, Bolivia#-17.7876605856#-63.158463165164','text','sent',NULL,'2026-05-05 21:18:36','2026-05-05 21:18:36'),
(2128,5,133,'system',0,'⏳ Calculando precio... dame un segundito.','text','sent',NULL,'2026-05-05 21:18:36','2026-05-05 21:18:36'),
(2129,5,133,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🏍️ Moto Veloz\n📍 Distancia: 2.6 km\n💰 Precio: *Bs 7.56*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO*','text','sent',NULL,'2026-05-05 21:18:37','2026-05-05 21:18:37'),
(2130,5,133,'customer',35,'Si','text','sent',NULL,'2026-05-05 21:18:51','2026-05-05 21:18:51'),
(2131,5,133,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-05 21:18:51','2026-05-05 21:18:51'),
(2132,5,133,'customer',35,'No','text','sent',NULL,'2026-05-05 21:19:07','2026-05-05 21:19:07'),
(2133,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitas mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-05 21:19:23','2026-05-05 21:19:23'),
(2134,5,NULL,'customer',35,'5','text','sent',NULL,'2026-05-05 21:19:28','2026-05-05 21:19:28'),
(2135,5,134,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnviamé tu *ubicación real* de WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y mandá\n\n⚠️ *Solo GPS real.* No escribas direcciones.','text','sent',NULL,'2026-05-05 21:19:28','2026-05-05 21:19:28'),
(2136,5,134,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044497#-63.1567979','text','sent',NULL,'2026-05-05 21:19:41','2026-05-05 21:19:41'),
(2137,5,134,'system',0,'✅ Recogida guardada.\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos el paquete?\n\nMandame la ubicación de *destino* del mismo modo:\n📎 → Ubicación → elegí en el mapa','text','sent',NULL,'2026-05-05 21:19:41','2026-05-05 21:19:41'),
(2138,5,134,'customer',35,'#ATTACHMENT:location#Las Petas 2215, Santa Cruz de la Sierra, Bolivia#-17.77600349131#-63.162689320743','text','sent',NULL,'2026-05-05 21:19:57','2026-05-05 21:19:57'),
(2139,5,134,'system',0,'⏳ Calculando precio... dame un segundito.','text','sent',NULL,'2026-05-05 21:19:57','2026-05-05 21:19:57'),
(2140,5,134,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Móvil\n📍 Distancia: 4.5 km\n💰 Precio: *Bs 13.00*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO*','text','sent',NULL,'2026-05-05 21:19:58','2026-05-05 21:19:58'),
(2141,5,134,'customer',35,'Si','text','sent',NULL,'2026-05-05 21:20:07','2026-05-05 21:20:07'),
(2142,5,134,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-05 21:20:07','2026-05-05 21:20:07'),
(2143,5,134,'customer',35,'No','text','sent',NULL,'2026-05-05 21:20:23','2026-05-05 21:20:23'),
(2144,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitas mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-05 21:20:33','2026-05-05 21:20:33'),
(2145,5,NULL,'customer',35,'5','text','sent',NULL,'2026-05-05 21:20:41','2026-05-05 21:20:41'),
(2146,5,135,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnviamé tu *ubicación real* de WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y mandá\n\n⚠️ *Solo GPS real.* No escribas direcciones.','text','sent',NULL,'2026-05-05 21:20:41','2026-05-05 21:20:41'),
(2147,5,135,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8043934#-63.1567808','text','sent',NULL,'2026-05-05 21:20:51','2026-05-05 21:20:51'),
(2148,5,135,'system',0,'✅ Recogida guardada.\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos el paquete?\n\nMandame la ubicación de *destino* del mismo modo:\n📎 → Ubicación → elegí en el mapa','text','sent',NULL,'2026-05-05 21:20:51','2026-05-05 21:20:51'),
(2149,5,135,'customer',35,'#ATTACHMENT:location#6R5R+GV5, Santa Cruz de la Sierra, Bolivia#-17.791829919996#-63.158025629818','text','sent',NULL,'2026-05-05 21:21:08','2026-05-05 21:21:08'),
(2150,5,135,'system',0,'⏳ Calculando precio... dame un segundito.','text','sent',NULL,'2026-05-05 21:21:09','2026-05-05 21:21:09'),
(2151,5,135,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Móvil\n📍 Distancia: 2.0 km\n💰 Precio: *Bs 7.00*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO*','text','sent',NULL,'2026-05-05 21:21:09','2026-05-05 21:21:09'),
(2152,5,135,'customer',35,'Si','text','sent',NULL,'2026-05-05 21:21:17','2026-05-05 21:21:17'),
(2153,5,135,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-05 21:21:17','2026-05-05 21:21:17'),
(2154,5,135,'customer',35,'No','text','sent',NULL,'2026-05-05 21:21:27','2026-05-05 21:21:27'),
(2155,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitas mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-05 22:27:04','2026-05-05 22:27:04'),
(2156,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-06 00:02:11','2026-05-06 00:02:11'),
(2157,5,136,'system',0,'✅ 🚗 Auto — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-06 00:02:11','2026-05-06 00:02:11'),
(2158,5,136,'customer',35,'#ATTACHMENT:location#6R8V+83C, Av. Prol. San Pablo, Santa Cruz de la Sierra, Bolivia#-17.784146584765#-63.157305791974','text','sent',NULL,'2026-05-06 00:02:37','2026-05-06 00:02:37'),
(2159,5,136,'system',0,'✅ Recogida guardada\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos?\n\nMandame la ubicación de destino 📎 → *Ubicación*','text','sent',NULL,'2026-05-06 00:02:37','2026-05-06 00:02:37'),
(2160,5,136,'customer',35,'#ATTACHMENT:location#7R9V+Q3F, Santa Cruz de la Sierra, Bolivia#-17.730535382055#-63.157501593232','text','sent',NULL,'2026-05-06 00:03:02','2026-05-06 00:03:02'),
(2161,5,136,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-06 00:03:02','2026-05-06 00:03:02'),
(2162,5,136,'system',0,'📊 *Paso 4 de 4* — Resumen de tu envío\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 8.4 km\n💰 Precio: *Bs 24.04*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO* 👍','text','sent',NULL,'2026-05-06 00:03:03','2026-05-06 00:03:03'),
(2163,5,136,'customer',35,'Si','text','sent',NULL,'2026-05-06 00:03:18','2026-05-06 00:03:18'),
(2164,5,136,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEj: *Llamar al llegar*, *Puerta roja*\nEscribila o respondé *No*','text','sent',NULL,'2026-05-06 00:03:18','2026-05-06 00:03:18'),
(2165,5,136,'customer',35,'No','text','sent',NULL,'2026-05-06 00:03:28','2026-05-06 00:03:28'),
(2166,5,NULL,'system',0,'❌ No hay mensajeros con 🚗 Auto disponibles ahora 😕\n\nEscribí *HOLA* para intentar con otro vehículo','text','sent',NULL,'2026-05-06 00:03:29','2026-05-06 00:03:29'),
(2167,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Qué vehículo necesitás hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nRespondé con el *número* o el *nombre* 😊','text','sent',NULL,'2026-05-06 00:03:44','2026-05-06 00:03:44'),
(2168,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-06 00:03:54','2026-05-06 00:03:54'),
(2169,5,137,'system',0,'✅ 🚗 Auto — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-06 00:03:54','2026-05-06 00:03:54'),
(2170,5,137,'customer',35,'Que hago','text','sent',NULL,'2026-05-06 00:04:47','2026-05-06 00:04:47'),
(2171,5,137,'system',0,'Casi... pero necesito GPS 📍\n\n📎 → Ubicación → tocá en el mapa\nY mandá nomás','text','sent',NULL,'2026-05-06 00:04:47','2026-05-06 00:04:47'),
(2172,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Qué vehículo necesitás hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nRespondé con el *número* o el *nombre* 😊','text','sent',NULL,'2026-05-06 00:04:59','2026-05-06 00:04:59'),
(2173,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-06 00:05:09','2026-05-06 00:05:09'),
(2174,5,138,'system',0,'✅ 🚗 Auto — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-06 00:05:09','2026-05-06 00:05:09'),
(2175,5,138,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044472#-63.1568121','text','sent',NULL,'2026-05-06 00:05:29','2026-05-06 00:05:29'),
(2176,5,138,'system',0,'✅ Recogida guardada\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos?\n\nMandame la ubicación de destino 📎 → *Ubicación*','text','sent',NULL,'2026-05-06 00:05:29','2026-05-06 00:05:29'),
(2177,5,138,'customer',35,'#ATTACHMENT:location#Calle 25 de Mayo, Av. Prolongacion Beni S/N UV 74 MZA 05, Santa Cruz de la Sierra, Bolivia#-17.730164615996#-63.156116232276','text','sent',NULL,'2026-05-06 00:05:49','2026-05-06 00:05:49'),
(2178,5,138,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-06 00:05:49','2026-05-06 00:05:49'),
(2179,5,138,'system',0,'📊 *Paso 4 de 4* — Resumen de tu envío\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 11.6 km\n💰 Precio: *Bs 33.31*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO* 👍','text','sent',NULL,'2026-05-06 00:05:51','2026-05-06 00:05:51'),
(2180,5,138,'customer',35,'Si','text','sent',NULL,'2026-05-06 00:06:03','2026-05-06 00:06:03'),
(2181,5,138,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEj: *Llamar al llegar*, *Puerta roja*\nEscribila o respondé *No*','text','sent',NULL,'2026-05-06 00:06:03','2026-05-06 00:06:03'),
(2182,5,138,'customer',35,'No','text','sent',NULL,'2026-05-06 00:06:12','2026-05-06 00:06:12'),
(2183,5,NULL,'system',0,'❌ No hay mensajeros con 🚗 Auto disponibles ahora 😕\n\nEscribí *HOLA* para intentar con otro vehículo','text','sent',NULL,'2026-05-06 00:06:13','2026-05-06 00:06:13'),
(2184,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Qué vehículo necesitás hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nRespondé con el *número* o el *nombre* 😊','text','sent',NULL,'2026-05-06 00:06:23','2026-05-06 00:06:23'),
(2185,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-06 00:06:31','2026-05-06 00:06:31'),
(2186,5,139,'system',0,'✅ 🚗 Auto — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-06 00:06:31','2026-05-06 00:06:31'),
(2187,5,139,'customer',35,'#ATTACHMENT:location#Calle F 3035, Santa Cruz de la Sierra, Bolivia#-17.805107611511#-63.156792484224','text','sent',NULL,'2026-05-06 00:58:45','2026-05-06 00:58:45'),
(2188,5,139,'system',0,'✅ Recogida guardada\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos?\n\nMandame la ubicación de destino 📎 → *Ubicación*','text','sent',NULL,'2026-05-06 00:58:45','2026-05-06 00:58:45'),
(2189,5,139,'customer',35,'#ATTACHMENT:location#Los Tucanes 2490, Santa Cruz de la Sierra, Bolivia#-17.77236729794#-63.163126856089','text','sent',NULL,'2026-05-06 00:59:34','2026-05-06 00:59:34'),
(2190,5,139,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-06 00:59:34','2026-05-06 00:59:34'),
(2191,5,139,'system',0,'📊 *Paso 4 de 4* — Resumen de tu envío\n\n🚗 Vehículo: 🚗 Móvil\n📍 Distancia: 5.2 km\n💰 Precio: *Bs 14.93*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO* 👍','text','sent',NULL,'2026-05-06 00:59:35','2026-05-06 00:59:35'),
(2192,5,139,'customer',35,'Si','text','sent',NULL,'2026-05-06 00:59:45','2026-05-06 00:59:45'),
(2193,5,139,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEj: *Llamar al llegar*, *Puerta roja*\nEscribila o respondé *No*','text','sent',NULL,'2026-05-06 00:59:45','2026-05-06 00:59:45'),
(2194,5,139,'customer',35,'PARRILLA','text','sent',NULL,'2026-05-06 00:59:56','2026-05-06 00:59:56'),
(2195,5,NULL,'system',0,'❌ No hay mensajeros con 🚗 Móvil disponibles ahora 😕\n\nEscribí *HOLA* para intentar con otro vehículo','text','sent',NULL,'2026-05-06 00:59:57','2026-05-06 00:59:57'),
(2196,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-06 01:00:32','2026-05-06 01:00:32'),
(2197,5,NULL,'customer',35,'5','text','sent',NULL,'2026-05-06 01:00:42','2026-05-06 01:00:42'),
(2198,5,140,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-06 01:00:42','2026-05-06 01:00:42'),
(2199,5,140,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044393#-63.1568007','text','sent',NULL,'2026-05-06 01:00:57','2026-05-06 01:00:57'),
(2200,5,140,'system',0,'✅ Recogida guardada\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos?\n\nMandame la ubicación de destino 📎 → *Ubicación*','text','sent',NULL,'2026-05-06 01:00:57','2026-05-06 01:00:57'),
(2201,5,140,'customer',35,'#ATTACHMENT:location#0, Santa Cruz de la Sierra, Bolivia#-17.773265737356#-63.169677145779','text','sent',NULL,'2026-05-06 01:01:43','2026-05-06 01:01:43'),
(2202,5,140,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-06 01:01:43','2026-05-06 01:01:43'),
(2203,5,140,'system',0,'📊 *Paso 4 de 4* — Resumen de tu envío\n\n🚗 Vehículo: 🚗 Móvil\n📍 Distancia: 5.2 km\n💰 Precio: *Bs 15.02*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO* 👍','text','sent',NULL,'2026-05-06 01:01:44','2026-05-06 01:01:44'),
(2204,5,140,'customer',35,'Si','text','sent',NULL,'2026-05-06 01:01:52','2026-05-06 01:01:52'),
(2205,5,140,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEj: *Llamar al llegar*, *Puerta roja*\nEscribila o respondé *No*','text','sent',NULL,'2026-05-06 01:01:52','2026-05-06 01:01:52'),
(2206,5,140,'customer',35,'No','text','sent',NULL,'2026-05-06 01:02:01','2026-05-06 01:02:01'),
(2207,5,NULL,'system',0,'❌ No hay mensajeros con 🚗 Móvil disponibles ahora 😕\n\nEscribí *HOLA* para intentar con otro vehículo','text','sent',NULL,'2026-05-06 01:02:02','2026-05-06 01:02:02'),
(2208,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-06 04:42:54','2026-05-06 04:42:54'),
(2209,5,NULL,'customer',35,'5','text','sent',NULL,'2026-05-06 04:43:16','2026-05-06 04:43:16'),
(2210,5,141,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-06 04:43:16','2026-05-06 04:43:16'),
(2211,5,141,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044481#-63.1567935','text','sent',NULL,'2026-05-06 04:43:32','2026-05-06 04:43:32'),
(2212,5,141,'system',0,'✅ Recogida guardada\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos?\n\nMandame la ubicación de destino 📎 → *Ubicación*','text','sent',NULL,'2026-05-06 04:43:32','2026-05-06 04:43:32'),
(2213,5,141,'customer',35,'#ATTACHMENT:location#Fernando Paticu 2565, Santa Cruz de la Sierra, Bolivia#-17.782400892072#-63.158007189631','text','sent',NULL,'2026-05-06 04:43:52','2026-05-06 04:43:52'),
(2214,5,141,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-06 04:43:52','2026-05-06 04:43:52'),
(2215,5,141,'system',0,'📊 *Paso 4 de 4* — Resumen de tu envío\n\n🚗 Vehículo: 🚗 Móvil\n📍 Distancia: 3.4 km\n💰 Precio: *Bs 9.90*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO* 👍','text','sent',NULL,'2026-05-06 04:43:53','2026-05-06 04:43:53'),
(2216,5,141,'customer',35,'Si','text','sent',NULL,'2026-05-06 04:44:13','2026-05-06 04:44:13'),
(2217,5,141,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEj: *Llamar al llegar*, *Puerta roja*\nEscribila o respondé *No*','text','sent',NULL,'2026-05-06 04:44:13','2026-05-06 04:44:13'),
(2218,5,141,'customer',35,'PUERTA ROJA','text','sent',NULL,'2026-05-06 04:44:29','2026-05-06 04:44:29'),
(2219,5,NULL,'system',0,'❌ No hay mensajeros con 🚗 Móvil disponibles ahora 😕\n\nEscribí *HOLA* para intentar con otro vehículo','text','sent',NULL,'2026-05-06 04:44:29','2026-05-06 04:44:29'),
(2220,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-06 17:59:49','2026-05-06 17:59:49'),
(2221,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-06 19:00:18','2026-05-06 19:00:18'),
(2222,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-06 19:00:20','2026-05-06 19:00:20'),
(2223,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-06 21:19:22','2026-05-06 21:19:22'),
(2224,5,NULL,'customer',35,'5','text','sent',NULL,'2026-05-06 21:19:42','2026-05-06 21:19:42'),
(2225,5,142,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-06 21:19:42','2026-05-06 21:19:42'),
(2226,5,142,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8043488#-63.156763','text','sent',NULL,'2026-05-06 21:20:06','2026-05-06 21:20:06'),
(2227,5,142,'system',0,'✅ Recogida guardada\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos?\n\nMandame la ubicación de destino 📎 → *Ubicación*','text','sent',NULL,'2026-05-06 21:20:06','2026-05-06 21:20:06'),
(2228,5,142,'customer',35,'#ATTACHMENT:location#García Hurtado de Mendoza 3890, Santa Cruz de la Sierra, Bolivia#-17.7593547454#-63.152937814593','text','sent',NULL,'2026-05-06 21:20:23','2026-05-06 21:20:23'),
(2229,5,142,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-06 21:20:23','2026-05-06 21:20:23'),
(2230,5,142,'system',0,'📊 *Paso 4 de 4* — Resumen de tu envío\n\n🚗 Vehículo: 🚗 Móvil\n📍 Distancia: 7.0 km\n💰 Precio: *Bs 20.24*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO* 👍','text','sent',NULL,'2026-05-06 21:20:24','2026-05-06 21:20:24'),
(2231,5,142,'customer',35,'Si','text','sent',NULL,'2026-05-06 21:21:26','2026-05-06 21:21:26'),
(2232,5,142,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEj: *Llamar al llegar*, *Puerta roja*\nEscribila o respondé *No*','text','sent',NULL,'2026-05-06 21:21:26','2026-05-06 21:21:26'),
(2233,5,142,'customer',35,'No','text','sent',NULL,'2026-05-06 21:21:32','2026-05-06 21:21:32'),
(2234,5,NULL,'system',0,'❌ No hay mensajeros con 🚗 Móvil disponibles ahora 😕\n\nEscribí *HOLA* para intentar con otro vehículo','text','sent',NULL,'2026-05-06 21:21:33','2026-05-06 21:21:33'),
(2235,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-06 21:28:01','2026-05-06 21:28:01'),
(2236,5,NULL,'customer',35,'5','text','sent',NULL,'2026-05-06 21:28:06','2026-05-06 21:28:06'),
(2237,5,143,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-06 21:28:06','2026-05-06 21:28:06'),
(2238,5,143,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8041443#-63.1567966','text','sent',NULL,'2026-05-06 21:28:17','2026-05-06 21:28:17'),
(2239,5,143,'system',0,'✅ Recogida guardada\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos?\n\nMandame la ubicación de destino 📎 → *Ubicación*','text','sent',NULL,'2026-05-06 21:28:17','2026-05-06 21:28:17'),
(2240,5,143,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8043743#-63.1568195','text','sent',NULL,'2026-05-06 21:28:26','2026-05-06 21:28:26'),
(2241,5,143,'system',0,'❌ El destino es igual a la recogida 😅\n\nMandame una ubicación *diferente*','text','sent',NULL,'2026-05-06 21:28:26','2026-05-06 21:28:26'),
(2242,5,143,'customer',35,'#ATTACHMENT:location#Guayaramerin 2820, Santa Cruz de la Sierra, Bolivia#-17.780379021478#-63.155462108552','text','sent',NULL,'2026-05-06 21:28:45','2026-05-06 21:28:45'),
(2243,5,143,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-06 21:28:45','2026-05-06 21:28:45'),
(2244,5,143,'system',0,'📊 *Paso 4 de 4* — Resumen de tu envío\n\n🚗 Vehículo: 🚗 Móvil\n📍 Distancia: 3.7 km\n💰 Precio: *Bs 10.67*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO* 👍','text','sent',NULL,'2026-05-06 21:28:46','2026-05-06 21:28:46'),
(2245,5,143,'customer',35,'Si','text','sent',NULL,'2026-05-06 21:28:59','2026-05-06 21:28:59'),
(2246,5,143,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEj: *Llamar al llegar*, *Puerta roja*\nEscribila o respondé *No*','text','sent',NULL,'2026-05-06 21:28:59','2026-05-06 21:28:59'),
(2247,5,143,'customer',35,'No','text','sent',NULL,'2026-05-06 21:29:04','2026-05-06 21:29:04'),
(2248,5,NULL,'system',0,'❌ No hay mensajeros con 🚗 Móvil disponibles ahora 😕\n\nEscribí *HOLA* para intentar con otro vehículo','text','sent',NULL,'2026-05-06 21:29:05','2026-05-06 21:29:05'),
(2249,5,NULL,'customer',35,'Estado','text','sent',NULL,'2026-05-06 22:56:11','2026-05-06 22:56:11'),
(2250,5,NULL,'system',0,'¿Otro envío? 😊\n\nEscribí *HOLA* para empezar','text','sent',NULL,'2026-05-06 22:56:11','2026-05-06 22:56:11'),
(2251,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-06 22:56:22','2026-05-06 22:56:22'),
(2252,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-06 22:56:38','2026-05-06 22:56:38'),
(2253,5,144,'system',0,'✅ 🏍️ Moto Veloz — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-06 22:56:38','2026-05-06 22:56:38'),
(2254,5,144,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044476#-63.1568022','text','sent',NULL,'2026-05-06 22:56:52','2026-05-06 22:56:52'),
(2255,5,144,'system',0,'✅ Recogida guardada\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos?\n\nMandame la ubicación de destino 📎 → *Ubicación*','text','sent',NULL,'2026-05-06 22:56:52','2026-05-06 22:56:52'),
(2256,5,144,'customer',35,'#ATTACHMENT:location#6RVX+WC3, Santa Cruz de la Sierra, Bolivia#-17.756207707938#-63.151533007622','text','sent',NULL,'2026-05-06 22:57:06','2026-05-06 22:57:06'),
(2257,5,144,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-06 22:57:06','2026-05-06 22:57:06'),
(2258,5,144,'system',0,'📊 *Paso 4 de 4* — Resumen de tu envío\n\n🚗 Vehículo: 🏍️ Moto Veloz\n📍 Distancia: 7.6 km\n💰 Precio: *Bs 21.74*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO* 👍','text','sent',NULL,'2026-05-06 22:57:07','2026-05-06 22:57:07'),
(2259,5,144,'customer',35,'Si','text','sent',NULL,'2026-05-06 22:57:18','2026-05-06 22:57:18'),
(2260,5,144,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEj: *Llamar al llegar*, *Puerta roja*\nEscribila o respondé *No*','text','sent',NULL,'2026-05-06 22:57:18','2026-05-06 22:57:18'),
(2261,5,144,'customer',35,'Fuentes','text','sent',NULL,'2026-05-06 22:57:27','2026-05-06 22:57:27'),
(2262,5,144,'system',0,'🔍 Buscando mensajero con 🏍️ Moto Veloz...\n\nTiempo: *1-4 minutos*\nEscribí *ESTADO* para ver progreso','text','sent',NULL,'2026-05-06 22:57:28','2026-05-06 22:57:28'),
(2263,5,144,'customer',35,'Estado','text','sent',NULL,'2026-05-06 22:57:39','2026-05-06 22:57:39'),
(2264,5,144,'system',0,'⏳ Todavía buscando...\n\nEscribí *CANCELAR* para detener','text','sent',NULL,'2026-05-06 22:57:39','2026-05-06 22:57:39'),
(2265,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-06 23:37:17','2026-05-06 23:37:17'),
(2266,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-06 23:37:38','2026-05-06 23:37:38'),
(2267,5,145,'system',0,'✅ 🏍️ Moto Veloz — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-06 23:37:38','2026-05-06 23:37:38'),
(2268,5,145,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044406#-63.1567889','text','sent',NULL,'2026-05-06 23:37:49','2026-05-06 23:37:49'),
(2269,5,145,'system',0,'✅ Recogida guardada\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos?\n\nMandame la ubicación de destino 📎 → *Ubicación*','text','sent',NULL,'2026-05-06 23:37:49','2026-05-06 23:37:49'),
(2270,5,145,'customer',35,'#ATTACHMENT:location#Guayaramerin 2556, Santa Cruz de la Sierra, Bolivia#-17.780833649041#-63.158322684467','text','sent',NULL,'2026-05-06 23:38:03','2026-05-06 23:38:03'),
(2271,5,145,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-06 23:38:03','2026-05-06 23:38:03'),
(2272,5,145,'system',0,'📊 *Paso 4 de 4* — Resumen de tu envío\n\n🚗 Vehículo: 🏍️ Moto Veloz\n📍 Distancia: 3.7 km\n💰 Precio: *Bs 10.60*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO* 👍','text','sent',NULL,'2026-05-06 23:38:04','2026-05-06 23:38:04'),
(2273,5,145,'customer',35,'Si','text','sent',NULL,'2026-05-06 23:38:18','2026-05-06 23:38:18'),
(2274,5,145,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEj: *Llamar al llegar*, *Puerta roja*\nEscribila o respondé *No*','text','sent',NULL,'2026-05-06 23:38:18','2026-05-06 23:38:18'),
(2275,5,145,'customer',35,'No','text','sent',NULL,'2026-05-06 23:38:25','2026-05-06 23:38:25'),
(2276,5,145,'system',0,'🔍 Buscando mensajero con 🏍️ Moto Veloz...\n\nTiempo: *1-4 minutos*\nEscribí *ESTADO* para ver progreso','text','sent',NULL,'2026-05-06 23:38:26','2026-05-06 23:38:26'),
(2277,10,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-07 04:18:31','2026-05-07 04:18:31'),
(2278,10,NULL,'customer',40,'5','text','sent',NULL,'2026-05-07 04:19:59','2026-05-07 04:19:59'),
(2279,10,146,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-07 04:19:59','2026-05-07 04:19:59'),
(2280,10,146,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.53497#-64.7486933','text','sent',NULL,'2026-05-07 04:20:26','2026-05-07 04:20:26'),
(2281,10,146,'system',0,'❌ Esa ubicación queda fuera de Santa Cruz 😕\n\nMandame una ubicación dentro del área de cobertura','text','sent',NULL,'2026-05-07 04:20:26','2026-05-07 04:20:26'),
(2282,10,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-07 05:32:17','2026-05-07 05:32:17'),
(2283,10,NULL,'customer',40,'Auto estándar','text','sent',NULL,'2026-05-07 05:35:10','2026-05-07 05:35:10'),
(2284,10,147,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-07 05:35:10','2026-05-07 05:35:10'),
(2285,10,147,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.520425#-64.73053','text','sent',NULL,'2026-05-07 05:36:44','2026-05-07 05:36:44'),
(2286,10,147,'system',0,'❌ Esa ubicación queda fuera de Santa Cruz 😕\n\nMandame una ubicación dentro del área de cobertura','text','sent',NULL,'2026-05-07 05:36:44','2026-05-07 05:36:44'),
(2287,10,147,'customer',40,'Cuál es la área de cobertura','text','sent',NULL,'2026-05-07 05:37:16','2026-05-07 05:37:16'),
(2288,10,147,'system',0,'Eso no es GPS 😅\n\n📎 → Ubicación → elegí en el mapa\nSin direcciones escritas','text','sent',NULL,'2026-05-07 05:37:16','2026-05-07 05:37:16'),
(2289,10,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-07 05:37:31','2026-05-07 05:37:31'),
(2290,10,NULL,'customer',40,'1','text','sent',NULL,'2026-05-07 05:37:52','2026-05-07 05:37:52'),
(2291,10,148,'system',0,'✅ 🛵 Moto Restaurant — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-07 05:37:52','2026-05-07 05:37:52'),
(2292,10,148,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.520425#-64.73053','text','sent',NULL,'2026-05-07 05:38:11','2026-05-07 05:38:11'),
(2293,10,148,'system',0,'❌ Esa ubicación queda fuera de Santa Cruz 😕\n\nMandame una ubicación dentro del área de cobertura','text','sent',NULL,'2026-05-07 05:38:11','2026-05-07 05:38:11'),
(2294,10,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-07 05:38:56','2026-05-07 05:38:56'),
(2295,10,NULL,'customer',40,'4','text','sent',NULL,'2026-05-07 05:39:12','2026-05-07 05:39:12'),
(2296,10,149,'system',0,'✅ 🚕 Moto Taxi — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-07 05:39:12','2026-05-07 05:39:12'),
(2297,10,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-07 05:49:42','2026-05-07 05:49:42'),
(2298,10,NULL,'customer',40,'3','text','sent',NULL,'2026-05-07 05:49:48','2026-05-07 05:49:48'),
(2299,10,150,'system',0,'✅ 🆘 Moto Socorro — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-07 05:49:48','2026-05-07 05:49:48'),
(2300,10,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-07 20:09:47','2026-05-07 20:09:47'),
(2301,10,NULL,'customer',40,'Buen dia','text','sent',NULL,'2026-05-07 20:31:40','2026-05-07 20:31:40'),
(2302,10,NULL,'system',0,'Esa opción no existe 😅\n\nElegí del 1 al 8\nO escribí el nombre','text','sent',NULL,'2026-05-07 20:31:40','2026-05-07 20:31:40'),
(2303,10,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-07 20:32:04','2026-05-07 20:32:04'),
(2304,10,NULL,'customer',40,'5','text','sent',NULL,'2026-05-07 20:32:18','2026-05-07 20:32:18'),
(2305,10,151,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-07 20:32:18','2026-05-07 20:32:18'),
(2306,10,151,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.5348217#-64.7487367','text','sent',NULL,'2026-05-07 20:32:34','2026-05-07 20:32:34'),
(2307,10,151,'system',0,'❌ Esa ubicación queda fuera de Santa Cruz 😕\n\nMandame una ubicación dentro del área de cobertura','text','sent',NULL,'2026-05-07 20:32:34','2026-05-07 20:32:34'),
(2308,28,NULL,'customer',75,'❓','text','sent',NULL,'2026-05-07 20:37:14','2026-05-07 20:37:14'),
(2309,28,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-07 20:37:14','2026-05-07 20:37:14'),
(2310,28,NULL,'customer',75,'5','text','sent',NULL,'2026-05-07 20:37:47','2026-05-07 20:37:47'),
(2311,28,152,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-07 20:37:47','2026-05-07 20:37:47'),
(2312,28,152,'customer',75,'#ATTACHMENT:location#Ubicación compartida#-21.5204829#-64.7303513','text','sent',NULL,'2026-05-07 20:40:06','2026-05-07 20:40:06'),
(2313,28,152,'system',0,'❌ Esa ubicación queda fuera de Santa Cruz 😕\n\nMandame una ubicación dentro del área de cobertura','text','sent',NULL,'2026-05-07 20:40:06','2026-05-07 20:40:06'),
(2314,10,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-08 05:37:32','2026-05-08 05:37:32'),
(2315,10,NULL,'customer',40,'5','text','sent',NULL,'2026-05-08 05:37:53','2026-05-08 05:37:53'),
(2316,10,153,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-08 05:37:53','2026-05-08 05:37:53'),
(2317,10,153,'customer',40,'#ATTACHMENT:location#Ubicación compartida#-21.530287#-64.7363001','text','sent',NULL,'2026-05-08 05:38:32','2026-05-08 05:38:32'),
(2318,10,153,'system',0,'❌ Esa ubicación queda fuera de nuestra área de cobertura 😕\n\nMandame una ubicación dentro del área de cobertura de Santa Cruz de la Sierra','text','sent',NULL,'2026-05-08 05:38:32','2026-05-08 05:38:32'),
(2319,10,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-08 05:50:02','2026-05-08 05:50:02'),
(2320,10,NULL,'customer',40,'5','text','sent',NULL,'2026-05-08 05:50:20','2026-05-08 05:50:20'),
(2321,10,154,'system',0,'✅ 🚗 Móvil — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-08 05:50:20','2026-05-08 05:50:20'),
(2322,7,NULL,'customer',37,'Buen día','text','sent',NULL,'2026-05-08 19:58:40','2026-05-08 19:58:40'),
(2323,7,NULL,'system',0,'Casi... pero necesito GPS 📍\n\n📎 → Ubicación → tocá en el mapa\nY mandá nomás','text','sent',NULL,'2026-05-08 19:58:40','2026-05-08 19:58:40'),
(2324,7,NULL,'customer',37,'Un móvil','text','sent',NULL,'2026-05-08 19:58:42','2026-05-08 19:58:42'),
(2325,7,NULL,'system',0,'Casi... pero necesito GPS 📍\n\n📎 → Ubicación → tocá en el mapa\nY mandá nomás','text','sent',NULL,'2026-05-08 19:58:42','2026-05-08 19:58:42'),
(2326,7,NULL,'customer',37,'#ATTACHMENT:location#Ubicación compartida#-21.5348168#-64.7487043','text','sent',NULL,'2026-05-08 19:59:04','2026-05-08 19:59:04'),
(2327,7,NULL,'system',0,'❌ Esa ubicación queda fuera de nuestra área de cobertura 😕\n\nMandame una ubicación dentro del área de cobertura de Santa Cruz de la Sierra','text','sent',NULL,'2026-05-08 19:59:04','2026-05-08 19:59:04'),
(2328,8,131,'customer',38,'Moto','text','sent',NULL,'2026-05-09 07:23:52','2026-05-09 07:23:52'),
(2329,8,131,'system',0,'No me sirve el texto ahí 😅\n\nMandame la ubicación real:\n📎 → Ubicación → mapa','text','sent',NULL,'2026-05-09 07:23:52','2026-05-09 07:23:52'),
(2330,8,131,'customer',38,'Delivery','text','sent',NULL,'2026-05-09 07:24:05','2026-05-09 07:24:05'),
(2331,8,131,'system',0,'Necesito el botón de ubicación 📍\n\n📎 → Ubicación → mapa\nAsí nomás 👍','text','sent',NULL,'2026-05-09 07:24:05','2026-05-09 07:24:05'),
(2332,8,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-09 07:24:24','2026-05-09 07:24:24'),
(2333,3,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-13 00:02:22','2026-05-13 00:02:22'),
(2334,3,NULL,'customer',34,'1','text','sent',NULL,'2026-05-13 00:02:36','2026-05-13 00:02:36'),
(2335,3,155,'system',0,'✅ 🛵 Moto Restaurant — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-13 00:02:36','2026-05-13 00:02:36'),
(2336,3,155,'customer',34,'#ATTACHMENT:location#Ubicación compartida#-17.8042535#-63.1568865','text','sent',NULL,'2026-05-13 00:02:58','2026-05-13 00:02:58'),
(2337,3,155,'system',0,'✅ Recogida guardada\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos?\n\nMandame la ubicación de destino 📎 → *Ubicación*','text','sent',NULL,'2026-05-13 00:02:58','2026-05-13 00:02:58'),
(2338,3,155,'customer',34,'#ATTACHMENT:location#Ubicación compartida#-17.8043383#-63.1567017','text','sent',NULL,'2026-05-13 00:03:27','2026-05-13 00:03:27'),
(2339,3,155,'system',0,'❌ El destino es igual a la recogida 😅\n\nMandame una ubicación *diferente*','text','sent',NULL,'2026-05-13 00:03:27','2026-05-13 00:03:27'),
(2340,3,155,'customer',34,'#ATTACHMENT:location#Ingsecom Bolivia#-17.80425269#-63.15763969','text','sent',NULL,'2026-05-13 00:04:10','2026-05-13 00:04:10'),
(2341,3,155,'system',0,'❌ El destino es igual a la recogida 😅\n\nMandame una ubicación *diferente*','text','sent',NULL,'2026-05-13 00:04:10','2026-05-13 00:04:10'),
(2342,3,155,'customer',34,'#ATTACHMENT:location#Roosquirijillas#-17.80594276#-63.15466818','text','sent',NULL,'2026-05-13 00:04:51','2026-05-13 00:04:51'),
(2343,3,155,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-13 00:04:51','2026-05-13 00:04:51'),
(2344,3,155,'system',0,'📊 *Paso 4 de 4* — Resumen de tu envío\n\n🚗 Vehículo: 🛵 Moto Restaurant\n📍 Distancia: 0.4 km\n💰 Precio: *Bs 7.00*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO* 👍','text','sent',NULL,'2026-05-13 00:04:51','2026-05-13 00:04:51'),
(2345,3,155,'customer',34,'Si','text','sent',NULL,'2026-05-13 00:05:07','2026-05-13 00:05:07'),
(2346,3,155,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEj: *Llamar al llegar*, *Puerta roja*\nEscribila o respondé *No*','text','sent',NULL,'2026-05-13 00:05:07','2026-05-13 00:05:07'),
(2347,3,155,'customer',34,'Llamar al llegar 77357655','text','sent',NULL,'2026-05-13 00:05:35','2026-05-13 00:05:35'),
(2348,3,NULL,'system',0,'❌ No hay mensajeros con 🛵 Moto Restaurant disponibles ahora 😕\n\nEscribí *HOLA* para intentar con otro vehículo','text','sent',NULL,'2026-05-13 00:05:36','2026-05-13 00:05:36'),
(2349,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto Restaurant* — Delivery de comida\n2️⃣ *Moto Veloz* — Envíos rápidos\n3️⃣ *Moto Socorro* — Emergencias\n4️⃣ *Moto Taxi* — Transporte de persona\n5️⃣ *Móvil* — Auto estándar\n6️⃣ *Móvil Vagoneta* — Van / SUV\n7️⃣ *Móvil Ipsum* — Familiar grande\n8️⃣ *Móvil Parrilla* — Pickup / Carga\n\nResponde con el *número* o el *nombre* del vehículo.','text','sent',NULL,'2026-05-17 22:18:48','2026-05-17 22:18:48'),
(2350,5,NULL,'customer',35,'4','text','sent',NULL,'2026-05-17 22:18:57','2026-05-17 22:18:57'),
(2351,5,158,'system',0,'✅ 🚕 Moto Taxi — ¡listo!\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos?\n\nMandame tu ubicación real 📎 → *Ubicación*\nSolo GPS, sin direcciones escritas 👍','text','sent',NULL,'2026-05-17 22:18:57','2026-05-17 22:18:57'),
(2352,5,158,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044233#-63.1567919','text','sent',NULL,'2026-05-17 22:23:52','2026-05-17 22:23:52'),
(2353,5,158,'system',0,'✅ Recogida guardada\n\n📍 *Paso 3 de 4* — ¿A dónde llevamos?\n\nMandame la ubicación de destino 📎 → *Ubicación*','text','sent',NULL,'2026-05-17 22:23:52','2026-05-17 22:23:52'),
(2354,5,158,'customer',35,'#ATTACHMENT:location#Ave Francisco Mora 3240, Santa Cruz de la Sierra, Bolivia#-17.800857504192#-63.156786113977','text','sent',NULL,'2026-05-17 22:24:09','2026-05-17 22:24:09'),
(2355,5,158,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-17 22:24:09','2026-05-17 22:24:09'),
(2356,5,158,'system',0,'📊 *Paso 4 de 4* — Resumen de tu envío\n\n🚗 Vehículo: 🚕 Moto Taxi\n📍 Distancia: 0.6 km\n💰 Precio: *Bs 7.00*\n\n¿Confirmás el envío?\nResponde *SÍ* o *NO* 👍','text','sent',NULL,'2026-05-17 22:24:12','2026-05-17 22:24:12'),
(2357,5,158,'customer',35,'Si','text','sent',NULL,'2026-05-17 22:55:46','2026-05-17 22:55:46'),
(2358,5,158,'system',0,'📝 ¿Alguna instrucción para el mensajero?\n\nEj: *Llamar al llegar*, *Puerta roja*\nEscribila o respondé *No*','text','sent',NULL,'2026-05-17 22:55:46','2026-05-17 22:55:46'),
(2359,5,158,'customer',35,'No','text','sent',NULL,'2026-05-17 22:56:01','2026-05-17 22:56:01'),
(2360,5,158,'system',0,'🔍 Buscando mensajero con 🚕 Moto Taxi...\n\nTiempo: *1-4 minutos*\nEscribí *ESTADO* para ver progreso','text','sent',NULL,'2026-05-17 22:56:01','2026-05-17 22:56:01'),
(2361,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-18 00:28:45','2026-05-18 00:28:45'),
(2362,5,NULL,'customer',35,'2','text','sent',NULL,'2026-05-18 00:29:00','2026-05-18 00:29:00'),
(2363,5,159,'system',0,'✅ 🚗 Auto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-18 00:29:00','2026-05-18 00:29:00'),
(2364,5,159,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044469#-63.1567963','text','sent',NULL,'2026-05-18 00:29:25','2026-05-18 00:29:25'),
(2365,5,159,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-18 00:29:25','2026-05-18 00:29:25'),
(2366,5,159,'customer',35,'#ATTACHMENT:location#Av. Brasil y Calle 1, Santa Cruz de la Sierra, Bolivia#-17.786847139027#-63.156946375966','text','sent',NULL,'2026-05-18 00:30:00','2026-05-18 00:30:00'),
(2367,5,159,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-18 00:30:00','2026-05-18 00:30:00'),
(2368,5,159,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 2.7 km\n💰 Precio: *Bs 7.89*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-18 00:30:01','2026-05-18 00:30:01'),
(2369,5,159,'customer',35,'Si','text','sent',NULL,'2026-05-18 00:30:21','2026-05-18 00:30:21'),
(2370,5,159,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-18 00:30:21','2026-05-18 00:30:21'),
(2371,5,159,'customer',35,'No','text','sent',NULL,'2026-05-18 00:30:38','2026-05-18 00:30:38'),
(2372,5,NULL,'system',0,'❌ No hay mensajeros con 🚗 Auto disponibles ahora 😕\n\nEscribí *HOLA* para intentar con otro vehículo','text','sent',NULL,'2026-05-18 00:30:38','2026-05-18 00:30:38'),
(2373,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-18 20:38:05','2026-05-18 20:38:05'),
(2374,5,NULL,'customer',35,'1','text','sent',NULL,'2026-05-18 20:38:21','2026-05-18 20:38:21'),
(2375,5,161,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-18 20:38:21','2026-05-18 20:38:21'),
(2376,5,161,'customer',35,'Cuanto cuesta???','text','sent',NULL,'2026-05-18 20:38:35','2026-05-18 20:38:35'),
(2377,5,161,'system',0,'Casi... pero necesito GPS 📍\n\n📎 → Ubicación → tocá en el mapa\nY mandá nomás','text','sent',NULL,'2026-05-18 20:38:35','2026-05-18 20:38:35'),
(2378,5,161,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044559#-63.1568032','text','sent',NULL,'2026-05-18 20:38:59','2026-05-18 20:38:59'),
(2379,5,161,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-18 20:38:59','2026-05-18 20:38:59'),
(2380,5,161,'customer',35,'#ATTACHMENT:location#6RCR+C89, Av. Pauserna, Santa Cruz de la Sierra, Bolivia#-17.778987036636#-63.159084096551','text','sent',NULL,'2026-05-18 20:39:15','2026-05-18 20:39:15'),
(2381,5,161,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-18 20:39:15','2026-05-18 20:39:15'),
(2382,5,161,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 4.0 km\n💰 Precio: *Bs 11.46*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-18 20:39:16','2026-05-18 20:39:16'),
(2383,5,161,'customer',35,'#ATTACHMENT:location#Fernando Paticu 2530, Santa Cruz de la Sierra, Bolivia#-17.782890313489#-63.158411197364','text','sent',NULL,'2026-05-18 20:40:57','2026-05-18 20:40:57'),
(2384,5,161,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-18 20:40:57','2026-05-18 20:40:57'),
(2385,5,161,'customer',35,'Si','text','sent',NULL,'2026-05-18 20:41:33','2026-05-18 20:41:33'),
(2386,5,NULL,'system',0,'❌ No hay mensajeros con 🛵 Moto disponibles ahora 😕\n\nEscribí *HOLA* para intentar con otro vehículo','text','sent',NULL,'2026-05-18 20:41:34','2026-05-18 20:41:34'),
(2387,5,NULL,'customer',35,'0','text','sent',NULL,'2026-05-18 20:51:21','2026-05-18 20:51:21'),
(2388,5,NULL,'system',0,'¿Otro envío? 😊\n\nEscribí *HOLA* para empezar','text','sent',NULL,'2026-05-18 20:51:21','2026-05-18 20:51:21'),
(2389,5,NULL,'customer',35,'[image message]','text','sent',NULL,'2026-05-18 20:51:40','2026-05-18 20:51:40'),
(2390,5,NULL,'system',0,'¿Otro envío? 😊\n\nEscribí *HOLA* para empezar','text','sent',NULL,'2026-05-18 20:51:40','2026-05-18 20:51:40'),
(2391,5,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-18 21:07:23','2026-05-18 21:07:23'),
(2392,5,NULL,'customer',35,'1','text','sent',NULL,'2026-05-18 21:26:02','2026-05-18 21:26:02'),
(2393,5,162,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-18 21:26:02','2026-05-18 21:26:02'),
(2394,5,162,'customer',35,'#ATTACHMENT:location#Ubicación compartida#-17.8044471#-63.156796','text','sent',NULL,'2026-05-18 21:26:24','2026-05-18 21:26:24'),
(2395,5,162,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-18 21:26:24','2026-05-18 21:26:24'),
(2396,5,162,'customer',35,'#ATTACHMENT:location#7R5Q+QC6, Santa Cruz de la Sierra, Bolivia#-17.740490531128#-63.160995841026','text','sent',NULL,'2026-05-18 21:28:30','2026-05-18 21:28:30'),
(2397,5,162,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-18 21:28:30','2026-05-18 21:28:30'),
(2398,5,162,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 10.0 km\n💰 Precio: *Bs 28.73*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-18 21:28:30','2026-05-18 21:28:30'),
(2399,18,96,'customer',54,'Movil','text','sent',NULL,'2026-05-19 02:57:45','2026-05-19 02:57:45'),
(2400,18,96,'system',0,'Mandame la ubicación de destino 📍\n\nTocá 📎 → Ubicación\ny elegí el punto','text','sent',NULL,'2026-05-19 02:57:45','2026-05-19 02:57:45'),
(2401,18,96,'customer',54,'#ATTACHMENT:location#Ubicación compartida#-21.5205264#-64.7302754','text','sent',NULL,'2026-05-19 02:58:01','2026-05-19 02:58:01'),
(2402,18,96,'system',0,'❌ El destino es igual a la recogida 😅\n\nMandame una ubicación *diferente*','text','sent',NULL,'2026-05-19 02:58:01','2026-05-19 02:58:01'),
(2403,18,96,'customer',54,'#ATTACHMENT:location#Ubicación compartida#-21.5553271#-64.6953215','text','sent',NULL,'2026-05-19 02:59:04','2026-05-19 02:59:04'),
(2404,18,96,'system',0,'❌ Ese destino queda fuera de nuestra área de cobertura 😕\n\nMandame una ubicación dentro del área de cobertura de Santa Cruz de la Sierra','text','sent',NULL,'2026-05-19 02:59:04','2026-05-19 02:59:04'),
(2405,29,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-19 19:41:29','2026-05-19 19:41:29'),
(2406,29,NULL,'customer',97,'No','text','sent',NULL,'2026-05-19 19:41:31','2026-05-19 19:41:31'),
(2407,29,NULL,'system',0,'¿Qué vehículo querés? 😊\n\n1-4 o escribí el nombre\nMoto, Auto, Minivan o Camión','text','sent',NULL,'2026-05-19 19:41:31','2026-05-19 19:41:31'),
(2408,30,NULL,'customer',99,'Movil','text','sent',NULL,'2026-05-19 19:52:18','2026-05-19 19:52:18'),
(2409,30,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-19 19:52:18','2026-05-19 19:52:18'),
(2410,30,NULL,'customer',99,'2','text','sent',NULL,'2026-05-19 19:53:14','2026-05-19 19:53:14'),
(2411,30,163,'system',0,'✅ 🚗 Auto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-19 19:53:14','2026-05-19 19:53:14'),
(2412,30,163,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.5553271#-64.6953215','text','sent',NULL,'2026-05-19 19:53:50','2026-05-19 19:53:50'),
(2413,30,163,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-19 19:53:50','2026-05-19 19:53:50'),
(2414,30,163,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.5204902#-64.7303562','text','sent',NULL,'2026-05-19 19:54:32','2026-05-19 19:54:32'),
(2415,30,163,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-19 19:54:32','2026-05-19 19:54:32'),
(2416,30,163,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 7.4 km\n💰 Precio: *Bs 21.39*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-19 19:54:33','2026-05-19 19:54:33'),
(2417,30,163,'customer',99,'Si','text','sent',NULL,'2026-05-19 19:54:49','2026-05-19 19:54:49'),
(2418,30,163,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-19 19:54:49','2026-05-19 19:54:49'),
(2419,30,163,'customer',99,'Si','text','sent',NULL,'2026-05-19 19:55:08','2026-05-19 19:55:08'),
(2420,30,163,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-19 19:55:09','2026-05-19 19:55:09'),
(2421,30,163,'customer',99,'Estado','text','sent',NULL,'2026-05-19 19:56:43','2026-05-19 19:56:43'),
(2422,30,163,'system',0,'⏳ Todavía buscando...\n\nEscribí *CANCELAR* para detener','text','sent',NULL,'2026-05-19 19:56:43','2026-05-19 19:56:43'),
(2423,29,NULL,'customer',97,'2','text','sent',NULL,'2026-05-19 20:31:06','2026-05-19 20:31:06'),
(2424,29,164,'system',0,'✅ 🚗 Auto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-19 20:31:06','2026-05-19 20:31:06'),
(2425,29,164,'customer',97,'#ATTACHMENT:location#Ubicación compartida#-17.8044208#-63.1568549','text','sent',NULL,'2026-05-19 20:31:16','2026-05-19 20:31:16'),
(2426,29,164,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-19 20:31:16','2026-05-19 20:31:16'),
(2427,29,164,'customer',97,'#ATTACHMENT:location#C. Ferroviarios 46, Santa Cruz de la Sierra, Bolivia#-17.801220143106#-63.158505409956','text','sent',NULL,'2026-05-19 20:31:38','2026-05-19 20:31:38'),
(2428,29,164,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-19 20:31:38','2026-05-19 20:31:38'),
(2429,29,164,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 0.6 km\n💰 Precio: *Bs 7.00*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-19 20:31:39','2026-05-19 20:31:39'),
(2430,30,163,'customer',99,'Móvil','text','sent',NULL,'2026-05-19 20:32:25','2026-05-19 20:32:25'),
(2431,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-19 20:32:25','2026-05-19 20:32:25'),
(2432,30,163,'customer',99,'Moto','text','sent',NULL,'2026-05-19 21:32:23','2026-05-19 21:32:23'),
(2433,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-19 21:32:23','2026-05-19 21:32:23'),
(2434,30,163,'customer',99,'Movil','text','sent',NULL,'2026-05-20 19:19:00','2026-05-20 19:19:00'),
(2435,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-20 19:19:00','2026-05-20 19:19:00'),
(2436,30,163,'customer',99,'Movil','text','sent',NULL,'2026-05-20 19:44:48','2026-05-20 19:44:48'),
(2437,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-20 19:44:48','2026-05-20 19:44:48'),
(2438,30,163,'customer',99,'Movil','text','sent',NULL,'2026-05-20 19:45:04','2026-05-20 19:45:04'),
(2439,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-20 19:45:04','2026-05-20 19:45:04'),
(2440,30,163,'customer',99,'Apureee','text','sent',NULL,'2026-05-20 19:45:12','2026-05-20 19:45:12'),
(2441,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-20 19:45:12','2026-05-20 19:45:12'),
(2442,30,163,'customer',99,'Movil','text','sent',NULL,'2026-05-20 19:45:43','2026-05-20 19:45:43'),
(2443,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-20 19:45:43','2026-05-20 19:45:43'),
(2444,29,164,'customer',97,'No','text','sent',NULL,'2026-05-20 20:25:21','2026-05-20 20:25:21'),
(2445,29,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-20 20:25:23','2026-05-20 20:25:23'),
(2446,29,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-20 20:25:31','2026-05-20 20:25:31'),
(2447,29,NULL,'customer',97,'2','text','sent',NULL,'2026-05-20 20:25:40','2026-05-20 20:25:40'),
(2448,29,165,'system',0,'✅ 🚗 Auto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-20 20:25:43','2026-05-20 20:25:43'),
(2449,29,165,'customer',97,'#ATTACHMENT:location#F777+JR9, Gral. Trigo, Tarija, Bolivia#-21.536045521223#-64.735199399292','text','sent',NULL,'2026-05-20 20:26:48','2026-05-20 20:26:48'),
(2450,29,165,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-20 20:27:04','2026-05-20 20:27:04'),
(2451,29,165,'customer',97,'#ATTACHMENT:location#F74X+GR8, Héctor Pino, Tarija, Bolivia#-21.543902858913#-64.700591862202','text','sent',NULL,'2026-05-20 20:28:02','2026-05-20 20:28:02'),
(2452,29,165,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-20 20:28:20','2026-05-20 20:28:20'),
(2453,29,165,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 5.2 km\n💰 Precio: *Bs 14.86*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-20 20:28:21','2026-05-20 20:28:21'),
(2454,29,165,'customer',97,'Si','text','sent',NULL,'2026-05-20 20:29:49','2026-05-20 20:29:49'),
(2455,29,165,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-20 20:30:05','2026-05-20 20:30:05'),
(2456,29,165,'customer',97,'No','text','sent',NULL,'2026-05-20 20:30:39','2026-05-20 20:30:39'),
(2457,29,165,'customer',97,'No','text','sent',NULL,'2026-05-20 20:31:04','2026-05-20 20:31:04'),
(2458,29,165,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-20 20:31:13','2026-05-20 20:31:13'),
(2459,29,165,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-20 20:31:20','2026-05-20 20:31:20'),
(2460,29,165,'customer',97,'Estado','text','sent',NULL,'2026-05-20 20:34:03','2026-05-20 20:34:03'),
(2461,29,165,'system',0,'⏳ Todavía buscando...\n\nEscribí *CANCELAR* para detener','text','sent',NULL,'2026-05-20 20:34:08','2026-05-20 20:34:08'),
(2462,29,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-20 20:37:58','2026-05-20 20:37:58'),
(2463,30,163,'customer',99,'Movil','text','sent',NULL,'2026-05-20 20:55:06','2026-05-20 20:55:06'),
(2464,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-20 20:55:06','2026-05-20 20:55:06'),
(2465,30,163,'customer',99,'Moto','text','sent',NULL,'2026-05-20 20:55:33','2026-05-20 20:55:33'),
(2466,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-20 20:55:33','2026-05-20 20:55:33'),
(2467,30,163,'customer',99,'Movil','text','sent',NULL,'2026-05-20 20:59:55','2026-05-20 20:59:55'),
(2468,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-20 20:59:55','2026-05-20 20:59:55'),
(2469,29,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-20 21:00:19','2026-05-20 21:00:19'),
(2470,29,NULL,'customer',97,'2','text','sent',NULL,'2026-05-20 21:00:24','2026-05-20 21:00:24'),
(2471,29,166,'system',0,'✅ 🚗 Auto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-20 21:00:24','2026-05-20 21:00:24'),
(2472,29,166,'customer',97,'#ATTACHMENT:location#Colón 1369, Tarija, Bolivia#-21.527641332437#-64.730102531612','text','sent',NULL,'2026-05-20 21:00:59','2026-05-20 21:00:59'),
(2473,29,166,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-20 21:00:59','2026-05-20 21:00:59'),
(2474,29,166,'customer',97,'#ATTACHMENT:location#F728+FJC, Tarija, Bolivia#-21.549389488971#-64.733978994191','text','sent',NULL,'2026-05-20 21:01:59','2026-05-20 21:01:59'),
(2475,29,166,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-20 21:01:59','2026-05-20 21:01:59'),
(2476,29,166,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 3.4 km\n💰 Precio: *Bs 9.88*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-20 21:02:00','2026-05-20 21:02:00'),
(2477,29,166,'customer',97,'Si','text','sent',NULL,'2026-05-20 21:02:06','2026-05-20 21:02:06'),
(2478,29,166,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-20 21:02:06','2026-05-20 21:02:06'),
(2479,29,166,'customer',97,'No','text','sent',NULL,'2026-05-20 21:02:15','2026-05-20 21:02:15'),
(2480,29,166,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-20 21:02:18','2026-05-20 21:02:18'),
(2481,30,163,'customer',99,'Moto','text','sent',NULL,'2026-05-20 21:33:37','2026-05-20 21:33:37'),
(2482,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-20 21:33:37','2026-05-20 21:33:37'),
(2483,30,163,'customer',99,'Moto','text','sent',NULL,'2026-05-21 00:54:52','2026-05-21 00:54:52'),
(2484,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-21 00:54:52','2026-05-21 00:54:52'),
(2485,30,163,'customer',99,'Moto','text','sent',NULL,'2026-05-21 21:02:35','2026-05-21 21:02:35'),
(2486,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-21 21:02:35','2026-05-21 21:02:35'),
(2487,31,NULL,'customer',114,'Moto','text','sent',NULL,'2026-05-21 21:12:33','2026-05-21 21:12:33'),
(2488,31,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-21 21:12:33','2026-05-21 21:12:33'),
(2489,31,NULL,'customer',114,'1','text','sent',NULL,'2026-05-21 21:13:43','2026-05-21 21:13:43'),
(2490,31,167,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-21 21:13:43','2026-05-21 21:13:43'),
(2491,32,NULL,'customer',115,'Buen día','text','sent',NULL,'2026-05-21 21:16:51','2026-05-21 21:16:51'),
(2492,32,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-21 21:16:51','2026-05-21 21:16:51'),
(2493,32,NULL,'customer',115,'Una moto','text','sent',NULL,'2026-05-21 21:16:53','2026-05-21 21:16:53'),
(2494,32,168,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-21 21:16:53','2026-05-21 21:16:53'),
(2495,32,168,'customer',115,'#ATTACHMENT:location#Ubicación compartida#-21.5245717#-64.7392821','text','sent',NULL,'2026-05-21 21:17:33','2026-05-21 21:17:33'),
(2496,32,168,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-21 21:17:33','2026-05-21 21:17:33'),
(2497,32,168,'customer',115,'#ATTACHMENT:location#Ubicación compartida#-21.5245717#-64.7392821','text','sent',NULL,'2026-05-21 21:17:36','2026-05-21 21:17:36'),
(2498,32,168,'system',0,'❌ El destino es igual a la recogida 😅\n\nMandame una ubicación *diferente*','text','sent',NULL,'2026-05-21 21:17:36','2026-05-21 21:17:36'),
(2499,32,168,'customer',115,'#ATTACHMENT:location#Ubicación compartida#-21.5100458#-64.7222159','text','sent',NULL,'2026-05-21 21:20:49','2026-05-21 21:20:49'),
(2500,32,168,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-21 21:20:49','2026-05-21 21:20:49'),
(2501,32,168,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 3.4 km\n💰 Precio: *Bs 9.65*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-21 21:20:50','2026-05-21 21:20:50'),
(2502,32,168,'customer',115,'No','text','sent',NULL,'2026-05-21 21:22:07','2026-05-21 21:22:07'),
(2503,32,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-21 21:22:07','2026-05-21 21:22:07'),
(2504,32,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-21 21:25:24','2026-05-21 21:25:24'),
(2505,32,NULL,'customer',115,'Una moto','text','sent',NULL,'2026-05-21 21:25:29','2026-05-21 21:25:29'),
(2506,32,169,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-21 21:25:29','2026-05-21 21:25:29'),
(2507,30,163,'customer',99,'Moto','text','sent',NULL,'2026-05-21 21:29:50','2026-05-21 21:29:50'),
(2508,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-21 21:29:50','2026-05-21 21:29:50'),
(2509,31,167,'customer',114,'Moto','text','sent',NULL,'2026-05-21 21:32:53','2026-05-21 21:32:53'),
(2510,31,167,'system',0,'Necesito el botón de ubicación 📍\n\n📎 → Ubicación → elegí en el mapa\nSin direcciones escritas','text','sent',NULL,'2026-05-21 21:32:53','2026-05-21 21:32:53'),
(2511,31,167,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5205583#-64.7300533','text','sent',NULL,'2026-05-21 21:33:19','2026-05-21 21:33:19'),
(2512,31,167,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-21 21:33:19','2026-05-21 21:33:19'),
(2513,31,167,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5100458#-64.7222159','text','sent',NULL,'2026-05-21 21:34:08','2026-05-21 21:34:08'),
(2514,31,167,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-21 21:34:08','2026-05-21 21:34:08'),
(2515,31,167,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 2.0 km\n💰 Precio: *Bs 7.00*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-21 21:34:09','2026-05-21 21:34:09'),
(2516,31,167,'customer',114,'Si','text','sent',NULL,'2026-05-21 21:34:35','2026-05-21 21:34:35'),
(2517,31,167,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-21 21:34:35','2026-05-21 21:34:35'),
(2518,31,167,'customer',114,'Llamar al llegar','text','sent',NULL,'2026-05-21 21:35:02','2026-05-21 21:35:02'),
(2519,31,167,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-21 21:35:03','2026-05-21 21:35:03'),
(2520,31,167,'customer',114,'Móvil','text','sent',NULL,'2026-05-21 21:40:22','2026-05-21 21:40:22'),
(2521,31,167,'system',0,'✅ *¡Entrega completada!*\n\nGracias por usar nuestro servicio 🚚\n\nEscribí *HOLA* para hacer otra entrega.','text','sent',NULL,'2026-05-21 21:40:22','2026-05-21 21:40:22'),
(2522,31,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-21 21:40:34','2026-05-21 21:40:34'),
(2523,31,NULL,'customer',114,'2','text','sent',NULL,'2026-05-21 21:40:41','2026-05-21 21:40:41'),
(2524,31,170,'system',0,'✅ 🚗 Auto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-21 21:40:41','2026-05-21 21:40:41'),
(2525,31,170,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5204833#-64.73045','text','sent',NULL,'2026-05-21 21:41:49','2026-05-21 21:41:49'),
(2526,31,170,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-21 21:41:49','2026-05-21 21:41:49'),
(2527,31,170,'customer',114,'No tengo la dónde me llevara','text','sent',NULL,'2026-05-21 21:46:21','2026-05-21 21:46:21'),
(2528,31,170,'system',0,'El destino tiene que ser GPS 📍\n\nUsá el botón de ubicación\ny tocá en el mapa 👍','text','sent',NULL,'2026-05-21 21:46:21','2026-05-21 21:46:21'),
(2529,31,170,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5310283#-64.7193917','text','sent',NULL,'2026-05-21 22:09:12','2026-05-21 22:09:12'),
(2530,31,170,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-21 22:09:12','2026-05-21 22:09:12'),
(2531,31,170,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 2.3 km\n💰 Precio: *Bs 7.00*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-21 22:09:13','2026-05-21 22:09:13'),
(2532,31,170,'customer',114,'No','text','sent',NULL,'2026-05-21 22:09:38','2026-05-21 22:09:38'),
(2533,31,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-21 22:09:38','2026-05-21 22:09:38'),
(2534,31,NULL,'customer',114,'Moto','text','sent',NULL,'2026-05-21 22:10:32','2026-05-21 22:10:32'),
(2535,31,NULL,'system',0,'¿Otro envío? 😊\n\nEscribí *HOLA* para empezar','text','sent',NULL,'2026-05-21 22:10:32','2026-05-21 22:10:32'),
(2536,31,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-21 22:10:39','2026-05-21 22:10:39'),
(2537,31,NULL,'customer',114,'1','text','sent',NULL,'2026-05-21 22:10:59','2026-05-21 22:10:59'),
(2538,31,171,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-21 22:10:59','2026-05-21 22:10:59'),
(2539,31,171,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5347433#-64.715365','text','sent',NULL,'2026-05-21 22:11:16','2026-05-21 22:11:16'),
(2540,31,171,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-21 22:11:16','2026-05-21 22:11:16'),
(2541,31,171,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5607417#-64.6746117','text','sent',NULL,'2026-05-21 22:25:41','2026-05-21 22:25:41'),
(2542,31,171,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-21 22:25:41','2026-05-21 22:25:41'),
(2543,31,171,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 7.2 km\n💰 Precio: *Bs 20.61*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-21 22:25:42','2026-05-21 22:25:42'),
(2544,31,171,'customer',114,'No','text','sent',NULL,'2026-05-21 22:29:58','2026-05-21 22:29:58'),
(2545,31,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-21 22:29:58','2026-05-21 22:29:58'),
(2546,31,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 00:04:44','2026-05-22 00:04:44'),
(2547,31,NULL,'customer',114,'1','text','sent',NULL,'2026-05-22 00:04:58','2026-05-22 00:04:58'),
(2548,31,172,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 00:04:58','2026-05-22 00:04:58'),
(2549,30,163,'customer',99,'Movil','text','sent',NULL,'2026-05-22 02:03:08','2026-05-22 02:03:08'),
(2550,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-22 02:03:08','2026-05-22 02:03:08'),
(2551,31,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 02:42:47','2026-05-22 02:42:47'),
(2552,30,163,'customer',99,'Movil','text','sent',NULL,'2026-05-22 02:42:52','2026-05-22 02:42:52'),
(2553,30,163,'system',0,'⏳ Seguimos buscando...\n\nUn poco más de paciencia 😊\nO escribí *CANCELAR*','text','sent',NULL,'2026-05-22 02:42:52','2026-05-22 02:42:52'),
(2554,31,NULL,'customer',114,'1','text','sent',NULL,'2026-05-22 02:42:55','2026-05-22 02:42:55'),
(2555,31,173,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 02:42:55','2026-05-22 02:42:55'),
(2556,31,173,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5348123#-64.7487154','text','sent',NULL,'2026-05-22 02:43:05','2026-05-22 02:43:05'),
(2557,31,173,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 02:43:05','2026-05-22 02:43:05'),
(2558,30,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-22 02:43:08','2026-05-22 02:43:08'),
(2559,30,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 02:43:25','2026-05-22 02:43:25'),
(2560,30,NULL,'customer',99,'Moto','text','sent',NULL,'2026-05-22 02:44:18','2026-05-22 02:44:18'),
(2561,30,174,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 02:44:18','2026-05-22 02:44:18'),
(2562,31,173,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.536258#-64.7199694','text','sent',NULL,'2026-05-22 02:44:33','2026-05-22 02:44:33'),
(2563,31,173,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 02:44:33','2026-05-22 02:44:33'),
(2564,31,173,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 4.2 km\n💰 Precio: *Bs 12.01*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 02:44:34','2026-05-22 02:44:34'),
(2565,30,174,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.5204824#-64.730364','text','sent',NULL,'2026-05-22 02:44:43','2026-05-22 02:44:43'),
(2566,30,174,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 02:44:43','2026-05-22 02:44:43'),
(2567,30,174,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.5273791#-64.7374681','text','sent',NULL,'2026-05-22 02:46:10','2026-05-22 02:46:10'),
(2568,30,174,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 02:46:10','2026-05-22 02:46:10'),
(2569,30,174,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 1.5 km\n💰 Precio: *Bs 7.00*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 02:46:10','2026-05-22 02:46:10'),
(2570,30,174,'customer',99,'Si','text','sent',NULL,'2026-05-22 02:46:35','2026-05-22 02:46:35'),
(2571,30,174,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-22 02:46:35','2026-05-22 02:46:35'),
(2572,30,174,'customer',99,'No','text','sent',NULL,'2026-05-22 02:46:50','2026-05-22 02:46:50'),
(2573,30,174,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-22 02:46:51','2026-05-22 02:46:51'),
(2574,30,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-22 02:48:47','2026-05-22 02:48:47'),
(2575,30,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 02:49:11','2026-05-22 02:49:11'),
(2576,30,NULL,'customer',99,'2','text','sent',NULL,'2026-05-22 02:49:20','2026-05-22 02:49:20'),
(2577,30,175,'system',0,'✅ 🚗 Auto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 02:49:20','2026-05-22 02:49:20'),
(2578,30,175,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.5204897#-64.7303617','text','sent',NULL,'2026-05-22 02:49:39','2026-05-22 02:49:39'),
(2579,30,175,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 02:49:39','2026-05-22 02:49:39'),
(2580,30,175,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.5273791#-64.7374681','text','sent',NULL,'2026-05-22 02:49:59','2026-05-22 02:49:59'),
(2581,30,175,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 02:49:59','2026-05-22 02:49:59'),
(2582,30,175,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 1.5 km\n💰 Precio: *Bs 7.00*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 02:50:00','2026-05-22 02:50:00'),
(2583,31,173,'customer',114,'Si','text','sent',NULL,'2026-05-22 02:50:10','2026-05-22 02:50:10'),
(2584,31,173,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-22 02:50:10','2026-05-22 02:50:10'),
(2585,30,175,'customer',99,'Si','text','sent',NULL,'2026-05-22 02:50:14','2026-05-22 02:50:14'),
(2586,30,175,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-22 02:50:14','2026-05-22 02:50:14'),
(2587,30,175,'customer',99,'No','text','sent',NULL,'2026-05-22 02:50:21','2026-05-22 02:50:21'),
(2588,30,175,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-22 02:50:22','2026-05-22 02:50:22'),
(2589,31,173,'customer',114,'Llamar al llegar','text','sent',NULL,'2026-05-22 02:50:36','2026-05-22 02:50:36'),
(2590,31,173,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-22 02:50:37','2026-05-22 02:50:37'),
(2591,31,173,'customer',114,'Estado','text','sent',NULL,'2026-05-22 02:52:24','2026-05-22 02:52:24'),
(2592,31,173,'system',0,'Estado desconocido\n👤 adrian espindola\n📱 59172951104\n🚗 Vehículo no especificado','text','sent',NULL,'2026-05-22 02:52:24','2026-05-22 02:52:24'),
(2593,31,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-22 02:52:49','2026-05-22 02:52:49'),
(2594,31,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 02:53:15','2026-05-22 02:53:15'),
(2595,31,NULL,'customer',114,'1','text','sent',NULL,'2026-05-22 02:53:21','2026-05-22 02:53:21'),
(2596,31,176,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 02:53:21','2026-05-22 02:53:21'),
(2597,31,176,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5348352#-64.7486536','text','sent',NULL,'2026-05-22 02:53:37','2026-05-22 02:53:37'),
(2598,31,176,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 02:53:37','2026-05-22 02:53:37'),
(2599,31,176,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5196493#-64.7275202','text','sent',NULL,'2026-05-22 02:54:06','2026-05-22 02:54:06'),
(2600,31,176,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 02:54:06','2026-05-22 02:54:06'),
(2601,31,176,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 3.9 km\n💰 Precio: *Bs 11.14*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 02:54:07','2026-05-22 02:54:07'),
(2602,31,176,'customer',114,'Si','text','sent',NULL,'2026-05-22 02:54:31','2026-05-22 02:54:31'),
(2603,31,176,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-22 02:54:31','2026-05-22 02:54:31'),
(2604,31,176,'customer',114,'Llamar al llegar','text','sent',NULL,'2026-05-22 02:54:51','2026-05-22 02:54:51'),
(2605,31,176,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-22 02:54:51','2026-05-22 02:54:51'),
(2606,30,175,'customer',99,'Movil','text','sent',NULL,'2026-05-22 02:56:38','2026-05-22 02:56:38'),
(2607,30,175,'system',0,'✅ *¡Entrega completada!*\n\nGracias por usar nuestro servicio 🚚\n\nEscribí *HOLA* para hacer otra entrega.','text','sent',NULL,'2026-05-22 02:56:38','2026-05-22 02:56:38'),
(2608,30,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 02:56:46','2026-05-22 02:56:46'),
(2609,30,NULL,'customer',99,'2','text','sent',NULL,'2026-05-22 02:57:01','2026-05-22 02:57:01'),
(2610,30,177,'system',0,'✅ 🚗 Auto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 02:57:01','2026-05-22 02:57:01'),
(2611,30,177,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.5204885#-64.7303574','text','sent',NULL,'2026-05-22 02:57:28','2026-05-22 02:57:28'),
(2612,30,177,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 02:57:28','2026-05-22 02:57:28'),
(2613,30,177,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.5340183#-64.73616','text','sent',NULL,'2026-05-22 02:58:10','2026-05-22 02:58:10'),
(2614,30,177,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 02:58:10','2026-05-22 02:58:10'),
(2615,30,177,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 2.3 km\n💰 Precio: *Bs 7.00*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 02:58:11','2026-05-22 02:58:11'),
(2616,30,177,'customer',99,'Si','text','sent',NULL,'2026-05-22 02:58:40','2026-05-22 02:58:40'),
(2617,30,177,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-22 02:58:40','2026-05-22 02:58:40'),
(2618,30,177,'customer',99,'No','text','sent',NULL,'2026-05-22 02:58:54','2026-05-22 02:58:54'),
(2619,30,177,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-22 02:58:56','2026-05-22 02:58:56'),
(2620,30,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-22 03:01:38','2026-05-22 03:01:38'),
(2621,30,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 03:02:28','2026-05-22 03:02:28'),
(2622,30,NULL,'customer',99,'Auto','text','sent',NULL,'2026-05-22 03:02:35','2026-05-22 03:02:35'),
(2623,30,178,'system',0,'✅ 🚗 Auto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 03:02:35','2026-05-22 03:02:35'),
(2624,30,178,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.5204856#-64.7303573','text','sent',NULL,'2026-05-22 03:02:52','2026-05-22 03:02:52'),
(2625,30,178,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 03:02:52','2026-05-22 03:02:52'),
(2626,30,178,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.540683746338#-64.716743469238','text','sent',NULL,'2026-05-22 03:03:08','2026-05-22 03:03:08'),
(2627,30,178,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 03:03:08','2026-05-22 03:03:08'),
(2628,30,178,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 3.7 km\n💰 Precio: *Bs 10.69*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 03:03:08','2026-05-22 03:03:08'),
(2629,30,178,'customer',99,'Si','text','sent',NULL,'2026-05-22 03:03:20','2026-05-22 03:03:20'),
(2630,30,178,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-22 03:03:20','2026-05-22 03:03:20'),
(2631,30,178,'customer',99,'No','text','sent',NULL,'2026-05-22 03:03:27','2026-05-22 03:03:27'),
(2632,30,178,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-22 03:03:29','2026-05-22 03:03:29'),
(2633,30,178,'customer',99,'Bueno','text','sent',NULL,'2026-05-22 03:04:36','2026-05-22 03:04:36'),
(2634,30,178,'system',0,'✅ *¡Mensajero asignado!*\n\n👤 *Nombre:* adrian espindola\n🚗 Vehículo no especificado\n📱 *Teléfono:* 59172951104\n\n💰 *Precio:* Bs 10.69\n\n🚚 El mensajero ya va hacia tu ubicación.','text','sent',NULL,'2026-05-22 03:04:36','2026-05-22 03:04:36'),
(2635,30,178,'customer',99,'Ok','text','sent',NULL,'2026-05-22 03:05:43','2026-05-22 03:05:43'),
(2636,30,178,'system',0,'✅ *¡Mensajero asignado!*\n\n👤 *Nombre:* adrian espindola\n🚗 Vehículo no especificado\n📱 *Teléfono:* 59172951104\n\n💰 *Precio:* Bs 10.69\n\n🚚 El mensajero ya va hacia tu ubicación.','text','sent',NULL,'2026-05-22 03:05:43','2026-05-22 03:05:43'),
(2637,30,178,'customer',99,'Moto','text','sent',NULL,'2026-05-22 03:50:53','2026-05-22 03:50:53'),
(2638,30,178,'system',0,'✅ *¡Mensajero asignado!*\n\n👤 *Nombre:* adrian espindola\n🚗 Vehículo no especificado\n📱 *Teléfono:* 59172951104\n\n💰 *Precio:* Bs 10.69\n\n🚚 El mensajero ya va hacia tu ubicación.','text','sent',NULL,'2026-05-22 03:50:53','2026-05-22 03:50:53'),
(2639,30,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-22 03:51:24','2026-05-22 03:51:24'),
(2640,30,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 03:51:42','2026-05-22 03:51:42'),
(2641,30,NULL,'customer',99,'1','text','sent',NULL,'2026-05-22 03:51:53','2026-05-22 03:51:53'),
(2642,30,179,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 03:51:53','2026-05-22 03:51:53'),
(2643,30,179,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.5204828#-64.73036','text','sent',NULL,'2026-05-22 03:52:18','2026-05-22 03:52:18'),
(2644,30,179,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 03:52:18','2026-05-22 03:52:18'),
(2645,30,179,'customer',99,'#ATTACHMENT:location#Ubicación compartida#-21.5347948#-64.7489731','text','sent',NULL,'2026-05-22 03:53:02','2026-05-22 03:53:02'),
(2646,30,179,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 03:53:02','2026-05-22 03:53:02'),
(2647,30,179,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 3.5 km\n💰 Precio: *Bs 10.07*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 03:53:03','2026-05-22 03:53:03'),
(2648,30,179,'customer',99,'Si','text','sent',NULL,'2026-05-22 03:53:40','2026-05-22 03:53:40'),
(2649,30,179,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-22 03:53:40','2026-05-22 03:53:40'),
(2650,30,179,'customer',99,'Llamar al llegar','text','sent',NULL,'2026-05-22 03:53:51','2026-05-22 03:53:51'),
(2651,30,179,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-22 03:53:51','2026-05-22 03:53:51'),
(2652,29,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 04:02:05','2026-05-22 04:02:05'),
(2653,29,NULL,'customer',97,'2','text','sent',NULL,'2026-05-22 04:04:52','2026-05-22 04:04:52'),
(2654,29,180,'system',0,'✅ 🚗 Auto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 04:04:52','2026-05-22 04:04:52'),
(2655,29,180,'customer',97,'#ATTACHMENT:location#F7H5+QC3, Tarija, Bolivia#-21.520800231336#-64.741416089237','text','sent',NULL,'2026-05-22 04:06:12','2026-05-22 04:06:12'),
(2656,29,180,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 04:06:12','2026-05-22 04:06:12'),
(2657,29,180,'customer',97,'#ATTACHMENT:location#Eulógio Ruíz 345, Tarija, Bolivia#-21.538467167165#-64.723761789501','text','sent',NULL,'2026-05-22 04:07:00','2026-05-22 04:07:00'),
(2658,29,180,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 04:07:00','2026-05-22 04:07:00'),
(2659,29,180,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🚗 Auto\n📍 Distancia: 3.8 km\n💰 Precio: *Bs 10.81*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 04:07:01','2026-05-22 04:07:01'),
(2660,29,180,'customer',97,'Si','text','sent',NULL,'2026-05-22 04:07:48','2026-05-22 04:07:48'),
(2661,29,180,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-22 04:07:48','2026-05-22 04:07:48'),
(2662,29,180,'customer',97,'No','text','sent',NULL,'2026-05-22 04:08:13','2026-05-22 04:08:13'),
(2663,29,180,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-22 04:08:14','2026-05-22 04:08:14'),
(2664,33,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 04:18:52','2026-05-22 04:18:52'),
(2665,33,NULL,'customer',116,'1','text','sent',NULL,'2026-05-22 04:18:58','2026-05-22 04:18:58'),
(2666,33,181,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 04:18:58','2026-05-22 04:18:58'),
(2667,33,181,'customer',116,'#ATTACHMENT:location#Ubicación compartida#-21.5204887#-64.7303554','text','sent',NULL,'2026-05-22 04:19:20','2026-05-22 04:19:20'),
(2668,33,181,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 04:19:20','2026-05-22 04:19:20'),
(2669,33,181,'customer',116,'#ATTACHMENT:location#Fcia Diego S#-21.52034394#-64.73019824','text','sent',NULL,'2026-05-22 05:06:38','2026-05-22 05:06:38'),
(2670,33,181,'system',0,'❌ El destino es igual a la recogida 😅\n\nMandame una ubicación *diferente*','text','sent',NULL,'2026-05-22 05:06:38','2026-05-22 05:06:38'),
(2671,31,176,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5204861#-64.7303542','text','sent',NULL,'2026-05-22 05:07:47','2026-05-22 05:07:47'),
(2672,31,176,'system',0,'✅ *¡Entrega completada!*\n\nGracias por usar nuestro servicio 🚚\n\nEscribí *HOLA* para hacer otra entrega.','text','sent',NULL,'2026-05-22 05:07:47','2026-05-22 05:07:47'),
(2673,33,181,'customer',116,'#ATTACHMENT:location#La Bombonera#-21.52145864#-64.73372524','text','sent',NULL,'2026-05-22 05:07:55','2026-05-22 05:07:55'),
(2674,33,181,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 05:07:55','2026-05-22 05:07:55'),
(2675,33,181,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 0.5 km\n💰 Precio: *Bs 7.00*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 05:07:56','2026-05-22 05:07:56'),
(2676,31,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 05:07:58','2026-05-22 05:07:58'),
(2677,31,NULL,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5204898#-64.730377','text','sent',NULL,'2026-05-22 05:08:12','2026-05-22 05:08:12'),
(2678,31,182,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 05:08:12','2026-05-22 05:08:12'),
(2679,33,181,'customer',116,'Si','text','sent',NULL,'2026-05-22 05:08:13','2026-05-22 05:08:13'),
(2680,33,181,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-22 05:08:13','2026-05-22 05:08:13'),
(2681,33,181,'customer',116,'No','text','sent',NULL,'2026-05-22 05:08:19','2026-05-22 05:08:19'),
(2682,33,181,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-22 05:08:20','2026-05-22 05:08:20'),
(2683,31,182,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.502353668213#-64.735260009766','text','sent',NULL,'2026-05-22 05:09:24','2026-05-22 05:09:24'),
(2684,31,182,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 05:09:24','2026-05-22 05:09:24'),
(2685,31,182,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.502353668213#-64.735260009766','text','sent',NULL,'2026-05-22 05:09:44','2026-05-22 05:09:44'),
(2686,31,182,'system',0,'❌ El destino es igual a la recogida 😅\n\nMandame una ubicación *diferente*','text','sent',NULL,'2026-05-22 05:09:44','2026-05-22 05:09:44'),
(2687,31,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-22 05:10:03','2026-05-22 05:10:03'),
(2688,33,181,'customer',116,'Estado','text','sent',NULL,'2026-05-22 05:13:07','2026-05-22 05:13:07'),
(2689,33,181,'system',0,'⏳ Todavía buscando...\n\nEscribí *CANCELAR* para detener','text','sent',NULL,'2026-05-22 05:13:07','2026-05-22 05:13:07'),
(2690,33,NULL,'system',0,'❌ *Pedido cancelado*\n\nEscribí *HOLA* cuando quieras hacer otra entrega','text','sent',NULL,'2026-05-22 05:14:36','2026-05-22 05:14:36'),
(2691,33,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 05:37:39','2026-05-22 05:37:39'),
(2692,33,NULL,'customer',116,'1','text','sent',NULL,'2026-05-22 05:37:57','2026-05-22 05:37:57'),
(2693,33,183,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 05:37:57','2026-05-22 05:37:57'),
(2694,33,183,'customer',116,'#ATTACHMENT:location#Ubicación compartida#-21.5205229#-64.7302993','text','sent',NULL,'2026-05-22 05:38:22','2026-05-22 05:38:22'),
(2695,33,183,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 05:38:22','2026-05-22 05:38:22'),
(2696,33,183,'customer',116,'#ATTACHMENT:location#Ubicación compartida#-21.5382793#-64.7114574','text','sent',NULL,'2026-05-22 05:39:46','2026-05-22 05:39:46'),
(2697,33,183,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 05:39:46','2026-05-22 05:39:46'),
(2698,33,183,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 3.9 km\n💰 Precio: *Bs 11.19*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 05:39:47','2026-05-22 05:39:47'),
(2699,33,183,'customer',116,'Si','text','sent',NULL,'2026-05-22 05:40:11','2026-05-22 05:40:11'),
(2700,33,183,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-22 05:40:11','2026-05-22 05:40:11'),
(2701,33,183,'customer',116,'No','text','sent',NULL,'2026-05-22 05:40:22','2026-05-22 05:40:22'),
(2702,33,183,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-22 05:40:23','2026-05-22 05:40:23'),
(2703,33,183,'customer',116,'Moto','text','sent',NULL,'2026-05-22 05:43:40','2026-05-22 05:43:40'),
(2704,33,183,'system',0,'✅ *¡Entrega completada!*\n\nGracias por usar nuestro servicio 🚚\n\nEscribí *HOLA* para hacer otra entrega.','text','sent',NULL,'2026-05-22 05:43:40','2026-05-22 05:43:40'),
(2705,33,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 05:43:49','2026-05-22 05:43:49'),
(2706,33,NULL,'customer',116,'1','text','sent',NULL,'2026-05-22 05:43:55','2026-05-22 05:43:55'),
(2707,33,184,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 05:43:55','2026-05-22 05:43:55'),
(2708,33,184,'customer',116,'#ATTACHMENT:location#Mercado Campesino#-21.52000127#-64.74186974','text','sent',NULL,'2026-05-22 05:45:05','2026-05-22 05:45:05'),
(2709,33,184,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 05:45:05','2026-05-22 05:45:05'),
(2710,33,184,'customer',116,'#ATTACHMENT:location#Ubicación compartida#-21.5205083#-64.7303226','text','sent',NULL,'2026-05-22 05:45:13','2026-05-22 05:45:13'),
(2711,33,184,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 05:45:13','2026-05-22 05:45:13'),
(2712,33,184,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 1.7 km\n💰 Precio: *Bs 7.00*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 05:45:14','2026-05-22 05:45:14'),
(2713,33,184,'customer',116,'Si','text','sent',NULL,'2026-05-22 05:45:25','2026-05-22 05:45:25'),
(2714,33,184,'system',0,'¿Querés dejar alguna instrucción para el mensajero?\n\nEjemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\nEscribí las instrucciones o respondé *No*.','text','sent',NULL,'2026-05-22 05:45:25','2026-05-22 05:45:25'),
(2715,33,184,'customer',116,'No','text','sent',NULL,'2026-05-22 05:45:36','2026-05-22 05:45:36'),
(2716,33,184,'system',0,'🔍 Buscando mensajero disponible...\n\nTiempo estimado: *1-4 minutos*\n\nEscribí *ESTADO* para ver progreso o *CANCELAR* para detener.','text','sent',NULL,'2026-05-22 05:45:37','2026-05-22 05:45:37'),
(2717,34,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 08:52:28','2026-05-22 08:52:28'),
(2718,34,NULL,'customer',118,'2','text','sent',NULL,'2026-05-22 08:53:52','2026-05-22 08:53:52'),
(2719,34,185,'system',0,'✅ 🚗 Auto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 08:53:52','2026-05-22 08:53:52'),
(2720,35,NULL,'customer',119,'[sticker message]','text','sent',NULL,'2026-05-22 09:20:29','2026-05-22 09:20:29'),
(2721,35,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 09:20:29','2026-05-22 09:20:29'),
(2722,35,NULL,'customer',119,'Buen dia','text','sent',NULL,'2026-05-22 09:20:30','2026-05-22 09:20:30'),
(2723,35,NULL,'system',0,'No te entendí bien 🤔\n\n¿Moto, Auto, Minivan o Camión?\nTambién podés usar 1, 2, 3 o 4','text','sent',NULL,'2026-05-22 09:20:30','2026-05-22 09:20:30'),
(2724,31,NULL,'system',0,'¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n\n1️⃣ *Moto* — Rápida y económica\n2️⃣ *Auto* — Paquetes medianos\n3️⃣ *Minivan* — Varios paquetes\n4️⃣ *Camión* — Mudanzas o cargas grandes\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-22 18:00:52','2026-05-22 18:00:52'),
(2725,31,NULL,'customer',114,'1','text','sent',NULL,'2026-05-22 18:01:00','2026-05-22 18:01:00'),
(2726,31,186,'system',0,'✅ 🛵 Moto seleccionada\n\n📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\nEnvía tu ubicación real usando WhatsApp:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y presioná Enviar\n\n⚠️ No escribas direcciones. Solo ubicaciones GPS reales.','text','sent',NULL,'2026-05-22 18:01:00','2026-05-22 18:01:00'),
(2727,31,186,'customer',114,'#ATTACHMENT:location#Ubicación compartida#-21.5090917#-64.7392','text','sent',NULL,'2026-05-22 18:02:07','2026-05-22 18:02:07'),
(2728,31,186,'system',0,'✅ Recogida registrada\n\n📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\nEnvía la ubicación de entrega usando el mismo método (📎 → Ubicación).','text','sent',NULL,'2026-05-22 18:02:07','2026-05-22 18:02:07'),
(2729,31,186,'customer',114,'#ATTACHMENT:location#G73M+449, Tarija, Bolivia#-21.49641616989#-64.717279225588','text','sent',NULL,'2026-05-22 18:02:27','2026-05-22 18:02:27'),
(2730,31,186,'system',0,'⏳ Calculando... un segundito','text','sent',NULL,'2026-05-22 18:02:27','2026-05-22 18:02:27'),
(2731,31,186,'system',0,'📊 *Resumen de tu envío*\n\n🚗 Vehículo: 🛵 Moto\n📍 Distancia: 3.7 km\n💰 Precio: *Bs 10.77*\n\n¿Confirmás el envío?\n(Responde *SÍ* o *NO*)','text','sent',NULL,'2026-05-22 18:02:28','2026-05-22 18:02:28'),
(2732,36,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 00:06:41','2026-05-26 00:06:41'),
(2733,36,NULL,'customer',122,'6','text','sent',NULL,'2026-05-26 00:07:08','2026-05-26 00:07:08'),
(2734,36,NULL,'system',0,'✅ 🚲 Bicicleta seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *📦 Delivery* — Solo entregas pequeñas\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 00:07:08','2026-05-26 00:07:08'),
(2735,36,NULL,'customer',122,'Me equivoqué','text','sent',NULL,'2026-05-26 00:07:32','2026-05-26 00:07:32'),
(2736,36,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 00:07:32','2026-05-26 00:07:32'),
(2737,36,NULL,'customer',122,'2','text','sent',NULL,'2026-05-26 00:07:51','2026-05-26 00:07:51'),
(2738,36,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 00:07:51','2026-05-26 00:07:51'),
(2739,36,NULL,'customer',122,'1','text','sent',NULL,'2026-05-26 00:08:06','2026-05-26 00:08:06'),
(2740,36,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 00:08:06','2026-05-26 00:08:06'),
(2741,29,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 00:09:26','2026-05-26 00:09:26'),
(2742,29,NULL,'customer',97,'2','text','sent',NULL,'2026-05-26 00:09:32','2026-05-26 00:09:32'),
(2743,29,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 00:09:32','2026-05-26 00:09:32'),
(2744,29,NULL,'customer',97,'1','text','sent',NULL,'2026-05-26 00:09:39','2026-05-26 00:09:39'),
(2745,29,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 00:09:39','2026-05-26 00:09:39'),
(2746,29,NULL,'customer',97,'2','text','sent',NULL,'2026-05-26 00:09:49','2026-05-26 00:09:49'),
(2747,29,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 00:09:49','2026-05-26 00:09:49'),
(2748,30,179,'customer',99,'Movil','text','sent',NULL,'2026-05-26 01:14:27','2026-05-26 01:14:27'),
(2749,30,179,'system',0,'✅ *¡Entrega completada!*\n\nGracias por usar nuestro servicio 🚚\n\nEscribí *HOLA* para hacer otra entrega.','text','sent',NULL,'2026-05-26 01:14:27','2026-05-26 01:14:27'),
(2750,30,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 01:14:35','2026-05-26 01:14:35'),
(2751,30,NULL,'customer',99,'Auto','text','sent',NULL,'2026-05-26 01:15:19','2026-05-26 01:15:19'),
(2752,30,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 01:15:19','2026-05-26 01:15:19'),
(2753,30,NULL,'customer',99,'1','text','sent',NULL,'2026-05-26 01:15:46','2026-05-26 01:15:46'),
(2754,30,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 01:15:46','2026-05-26 01:15:46'),
(2755,30,NULL,'customer',99,'Taxi','text','sent',NULL,'2026-05-26 01:15:59','2026-05-26 01:15:59'),
(2756,30,NULL,'system',0,'Elegí una de estas 6 👇\n\n1️⃣ Moto  2️⃣ Auto  3️⃣ Minivan\n4️⃣ Camión  5️⃣ Torito  6️⃣ Bicicleta','text','sent',NULL,'2026-05-26 01:16:00','2026-05-26 01:16:00'),
(2757,30,NULL,'customer',99,'Auto','text','sent',NULL,'2026-05-26 01:16:17','2026-05-26 01:16:17'),
(2758,30,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 01:16:17','2026-05-26 01:16:17'),
(2759,30,NULL,'customer',99,'Taxi','text','sent',NULL,'2026-05-26 01:16:25','2026-05-26 01:16:25'),
(2760,30,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 01:16:25','2026-05-26 01:16:25'),
(2761,30,NULL,'customer',99,'2','text','sent',NULL,'2026-05-26 01:16:45','2026-05-26 01:16:45'),
(2762,30,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 01:16:45','2026-05-26 01:16:45'),
(2763,30,NULL,'customer',99,'1','text','sent',NULL,'2026-05-26 01:16:53','2026-05-26 01:16:53'),
(2764,30,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 01:16:53','2026-05-26 01:16:53'),
(2765,30,NULL,'customer',99,'2','text','sent',NULL,'2026-05-26 01:17:04','2026-05-26 01:17:04'),
(2766,30,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 01:17:04','2026-05-26 01:17:04'),
(2767,30,NULL,'customer',99,'Taxi','text','sent',NULL,'2026-05-26 01:17:16','2026-05-26 01:17:16'),
(2768,30,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 01:17:16','2026-05-26 01:17:16'),
(2769,30,NULL,'customer',99,'2','text','sent',NULL,'2026-05-26 01:17:25','2026-05-26 01:17:25'),
(2770,30,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 01:17:25','2026-05-26 01:17:25'),
(2771,30,NULL,'customer',99,'1','text','sent',NULL,'2026-05-26 01:17:33','2026-05-26 01:17:33'),
(2772,30,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 01:17:33','2026-05-26 01:17:33'),
(2773,37,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 03:40:52','2026-05-26 03:40:52'),
(2774,37,NULL,'customer',123,'2','text','sent',NULL,'2026-05-26 03:41:47','2026-05-26 03:41:47'),
(2775,37,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 03:41:47','2026-05-26 03:41:47'),
(2776,37,NULL,'customer',123,'1','text','sent',NULL,'2026-05-26 03:42:05','2026-05-26 03:42:05'),
(2777,37,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 03:42:05','2026-05-26 03:42:05'),
(2778,37,NULL,'customer',123,'1','text','sent',NULL,'2026-05-26 03:42:34','2026-05-26 03:42:34'),
(2779,37,NULL,'system',0,'✅ 🛵 Moto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🛵 Mototaxi* — Transporte de personas\n2️⃣ *⚡ Moto Flash* — Entregas rápidas\n3️⃣ *📦 Delivery* — Paquetes y mandados\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 03:42:34','2026-05-26 03:42:34'),
(2780,37,NULL,'customer',123,'2','text','sent',NULL,'2026-05-26 03:43:00','2026-05-26 03:43:00'),
(2781,37,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 03:43:00','2026-05-26 03:43:00'),
(2782,37,NULL,'customer',123,'3','text','sent',NULL,'2026-05-26 03:43:39','2026-05-26 03:43:39'),
(2783,37,NULL,'system',0,'✅ 🚐 Minivan seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 03:43:39','2026-05-26 03:43:39'),
(2784,37,NULL,'customer',123,'1','text','sent',NULL,'2026-05-26 03:43:52','2026-05-26 03:43:52'),
(2785,37,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 03:43:52','2026-05-26 03:43:52'),
(2786,30,NULL,'customer',99,'Movil','text','sent',NULL,'2026-05-26 21:31:21','2026-05-26 21:31:21'),
(2787,30,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 21:31:21','2026-05-26 21:31:21'),
(2788,30,NULL,'customer',99,'Taxi','text','sent',NULL,'2026-05-26 21:31:55','2026-05-26 21:31:55'),
(2789,30,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 21:31:55','2026-05-26 21:31:55'),
(2790,30,NULL,'customer',99,'2','text','sent',NULL,'2026-05-26 21:34:12','2026-05-26 21:34:12'),
(2791,30,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-05-26 21:34:12','2026-05-26 21:34:12'),
(2792,30,NULL,'customer',99,'1','text','sent',NULL,'2026-05-26 21:34:20','2026-05-26 21:34:20'),
(2793,30,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-26 21:34:20','2026-05-26 21:34:20'),
(2794,37,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-27 02:06:07','2026-05-27 02:06:07'),
(2795,37,NULL,'customer',123,'1','text','sent',NULL,'2026-05-27 02:06:38','2026-05-27 02:06:38'),
(2796,37,NULL,'system',0,'✅ 🛵 Moto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🛵 Mototaxi* — Transporte de personas\n2️⃣ *⚡ Moto Flash* — Entregas rápidas\n3️⃣ *📦 Delivery* — Paquetes y mandados\n\nResponde con el *número*','text','sent',NULL,'2026-05-27 02:06:38','2026-05-27 02:06:38'),
(2797,37,NULL,'customer',123,'1','text','sent',NULL,'2026-05-27 02:06:49','2026-05-27 02:06:49'),
(2798,37,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-27 02:06:49','2026-05-27 02:06:49'),
(2799,37,NULL,'customer',123,'6','text','sent',NULL,'2026-05-27 02:07:09','2026-05-27 02:07:09'),
(2800,37,NULL,'system',0,'✅ 🚲 Bicicleta seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *📦 Delivery* — Solo entregas pequeñas\n\nResponde con el *número*','text','sent',NULL,'2026-05-27 02:07:09','2026-05-27 02:07:09'),
(2801,37,NULL,'customer',123,'1','text','sent',NULL,'2026-05-27 02:07:23','2026-05-27 02:07:23'),
(2802,37,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-05-27 02:07:23','2026-05-27 02:07:23'),
(2803,38,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-06-03 06:21:50','2026-06-03 06:21:50'),
(2804,38,NULL,'customer',124,'2','text','sent',NULL,'2026-06-03 06:22:00','2026-06-03 06:22:00'),
(2805,38,NULL,'system',0,'✅ 🚗 Auto seleccionada\n\n¿Qué servicio necesitás?\n\n1️⃣ *🚕 Taxi* — Transporte de personas\n2️⃣ *📦 Delivery* — Paquetes y mandados\n3️⃣ *📦 Carga* — Carga mediana\n\nResponde con el *número*','text','sent',NULL,'2026-06-03 06:22:00','2026-06-03 06:22:00'),
(2806,38,NULL,'system',0,'¡Hola! Bienvenido a *AVAROA* 🚚\n\n¿Qué tipo de vehículo necesitás?\n\n1️⃣ *Moto* — Mototaxi, Moto Flash, Delivery\n2️⃣ *Auto* — Taxi, Delivery, Carga\n3️⃣ *Minivan* — Taxi, Delivery, Carga\n4️⃣ *Camión* — Carga y mudanzas (NO pasajeros)\n5️⃣ *Torito* — Taxi, carga pequeña\n6️⃣ *Bicicleta* — Delivery pequeño\n\nResponde con el *número* 😊','text','sent',NULL,'2026-06-03 06:22:17','2026-06-03 06:22:17');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metas`
--

DROP TABLE IF EXISTS `metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `metas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `meta_title` mediumtext DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `metas_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metas`
--

LOCK TABLES `metas` WRITE;
/*!40000 ALTER TABLE `metas` DISABLE KEYS */;
INSERT INTO `metas` VALUES
(1,'4bcd0b6f-5692-4966-8a4e-8884d72edaa4','home','Home','Home','LMSZai Learning management system','Lmszai, Lms, Learning, Course',NULL,NULL,'2023-07-18 07:44:59'),
(2,'3c3ef58d-d459-441b-9b90-370f840b2da1','course','Course List','Courses','LMSZai Course List','Lmszai, Lms, Learning, Course',NULL,NULL,'2023-07-18 07:44:59'),
(5,'62892323-3220-408d-81ea-8875dc1065f4','blog','Blog List','Blog','LMSZAI Blog','blog, course',NULL,NULL,'2023-07-18 07:44:59'),
(7,'4869c7e6-9635-4203-850a-09a41f4954cc','about_us','About Us','About Us','About Us','about us',NULL,NULL,'2024-06-07 05:23:20'),
(8,'b7b70870-0248-4781-a9a3-a76cffefb534','contact_us','Contact Us','Contact Us','LMSZAI contact us','lmszai, contact us',NULL,NULL,'2023-07-18 07:44:59'),
(9,'07d0a702-7a57-428f-8003-c172679ecbd2','support_faq','Support Page','Support','LMSZAI support ticket','lmszai, support, ticket',NULL,NULL,'2023-07-18 07:44:59'),
(10,'f00f9d36-6b9c-47ee-8649-8f50a2f9fe7a','privacy_policy','Privacy Policy','Privacy Policy','LMSZAI Privacy Policy','lmszai, privacy, policy',NULL,NULL,'2023-07-18 07:44:59'),
(11,'f74400a5-415f-4604-849e-a03e4896ff99','cookie_policy','Cookie Policy','Cookie Policy','LMSZAI Cookie Policy','lmszai, cookie, policy',NULL,NULL,'2023-07-18 07:44:59'),
(12,'2e0f0a6e-c573-475c-8913-95e241504c1a','faq','FAQ','FAQ','LMSZAI FAQ','lmszai, faq',NULL,NULL,'2023-07-18 07:44:59'),
(13,'2e0f0a6e-c573-479c-8913-95e241504c1a','terms_and_condition','Terms & Conditions','Terms & Conditions','LMSZAI Terms & Conditions Policy','Terms,Conditions',NULL,NULL,'2023-07-18 07:44:59'),
(14,'2e0f0a6e-c573-479c-8913-95e24150000a','refund_policy','Refund Policy','Refund Policy','LMSZAI Refund Policy','Refund Policies',NULL,NULL,'2023-07-18 07:44:59'),
(51,'d538d469-265f-44fc-95b9-dc57d10f8c81','default','Default','Demo Title','Demo Description','Demo Keywords','',NULL,NULL),
(52,'a241f1cb-3711-4609-90b2-976cb1ab53f7','auth','Auth Page','Auth Page','Auth Page Meta Description','Auth Page Meta Keywords','',NULL,NULL),
(53,'26092a11-6aea-44ce-8880-41b47c692324','bundle','Bundle List','Bundle List','Bundle List Page Meta Description','Bundle List Page Meta Keywords','',NULL,NULL),
(54,'42c68cfa-028f-4ffd-b4a0-b8da50978854','consultation','Consultation List','Consultation List','Consultation List Page Meta Description','Consultation List Page Meta Keywords','',NULL,NULL),
(55,'857e3c5c-8430-4c5d-b009-e8f7e33dceb0','instructor','Instructor List','Instructor List','Instructor List Page Meta Description','Instructor List Page Meta Keywords','',NULL,NULL),
(56,'2f9557c3-c10e-4b47-bf1c-040b6f0182e3','saas','Saas List','Saas List','Saas List Page Meta Description','Saas List Page Meta Keywords','',NULL,NULL),
(57,'b945d05c-d72b-4d1e-838d-f552c769d28f','subscription','Subscription List','Subscription List','Subscription List Page Meta Description','Subscription List Page Meta Keywords','',NULL,NULL),
(58,'a26d5ab1-1fd5-4eeb-9b32-04469f751cbf','verify_certificate','Verify certificate List','Verify certificate List','Verify certificate List Page Meta Description','Verify certificate List Page Meta Keywords','',NULL,NULL),
(59,'e5089c78-bca2-4d57-9cd4-2f3792d09810','forum','Forum','Forum','Forum Page Meta Description','Forum Page Meta Keywords','',NULL,NULL);
/*!40000 ALTER TABLE `metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_12_17_112209_add_socialite_fields_to_users_table',2),
(6,'2023_12_24_999999_add_active_status_to_users',3),
(7,'2023_12_24_999999_add_avatar_to_users',3),
(8,'2023_12_24_999999_add_dark_mode_to_users',3),
(9,'2023_12_24_999999_add_messenger_color_to_users',3),
(10,'2023_12_24_999999_create_chatify_favorites_table',3),
(11,'2023_12_24_999999_create_chatify_messages_table',3),
(12,'2023_12_25_053745_create_orders_table',4),
(13,'2023_12_25_104906_create_tasks_table',5),
(14,'2023_12_25_133036_create_purchases_table',6),
(15,'2023_12_27_043258_create_balances_table',7),
(16,'2023_12_27_044127_add_balance_to_users_table',8),
(17,'2023_12_27_080751_create_payments_table',9),
(18,'2016_06_01_000001_create_oauth_auth_codes_table',10),
(19,'2016_06_01_000002_create_oauth_access_tokens_table',10),
(20,'2016_06_01_000003_create_oauth_refresh_tokens_table',10),
(21,'2016_06_01_000004_create_oauth_clients_table',10),
(22,'2016_06_01_000005_create_oauth_personal_access_clients_table',10),
(23,'2024_01_10_085202_create_posting_ads_table',11),
(24,'2024_01_10_121310_create_images_table',12),
(25,'2024_01_17_071550_create_banners_table',13),
(26,'2024_01_17_085258_create_ads_table',14),
(27,'2024_01_17_104036_create_calendars_table',15),
(28,'2024_01_17_140951_create_credit_reload_promotions_table',16),
(29,'2024_01_16_172130_create_attentions_table',17),
(30,'2024_06_09_091155_create_permissions_table',18),
(31,'2024_06_24_084835_create_product_variations_table',19),
(32,'2024_11_03_091345_create_courses_table',20),
(33,'2024_11_03_095819_add_uuid_to_courses_table',21),
(34,'2024_11_03_100251_add_video_thumbnail_to_courses_table',22),
(35,'2024_11_05_055606_create_events_table',23),
(36,'2024_11_24_044400_create_audiobooks_table',24),
(37,'2024_11_28_032108_create_sales_table',25),
(38,'2025_01_14_062929_create_mail_templates_table',26),
(39,'2025_01_16_103920_create_folders_table',27),
(40,'2025_01_16_103948_create_files_table',27),
(41,'2025_02_14_014007_create_comments_table',28),
(42,'2025_02_14_015030_create_reactions_table',28),
(43,'2025_04_02_074447_create_products_table',29),
(44,'2025_04_02_074448_create_quotations_table',29),
(45,'2025_05_21_154537_create_orders_table',30),
(46,'2025_06_25_081735_create_chambeador_profiles_table',31),
(47,'2025_06_25_084013_create_background_certificates_table',32),
(48,'2025_06_25_084118_create_identity_cards_table',32),
(49,'2025_10_16_081658_create_clients_table',33),
(50,'2025_10_16_081722_create_equipment_table',33),
(51,'2025_10_16_081938_create_inspection_photos_table',34),
(52,'2025_11_24_121955_create_affiliates_table',35),
(53,'2025_11_24_122242_add_affiliate_fields_to_users_table',35),
(54,'2025_11_29_042601_create_funding_plans_table',36),
(55,'2025_11_29_054809_update_plan_purchases_table_add_fields',37),
(56,'2025_11_29_062227_add_gateway_fields_to_plan_purchases_table',38),
(57,'2025_11_29_080938_add_mt4_credentials_to_plan_purchases_table',39),
(58,'2025_11_29_090721_create_celebrity_endorsements_table',40),
(59,'2025_12_01_022449_create_system_trade_configs_table',41),
(60,'2025_12_01_034040_create_referral_settings_table',42),
(61,'2025_12_01_035805_create_notification_settings_table',43),
(62,'2025_12_05_033849_create_trade_logs_table',44),
(63,'2025_12_05_033917_create_evaluation_accounts_table',44),
(64,'2025_12_05_033940_create_behavioural_metrics_table',44),
(65,'2025_12_05_035141_create_blockchain_hash_records_table',44),
(66,'2025_12_05_035204_create_delayed_feed_assignments_table',44),
(67,'2025_12_05_035249_create_slippage_profiles_table',44),
(68,'2025_12_05_035309_create_hedging_monitors_table',44),
(69,'2025_12_07_025642_create_orders_table',45),
(70,'2025_12_07_025736_create_trades_table',45),
(71,'2025_12_07_030207_create_challenges_table',45),
(72,'2025_12_07_033521_safe_enhance_orders_table',46),
(73,'2025_12_18_021319_create_instruments_table',47),
(74,'2025_12_18_021417_create_contracts_table',47),
(75,'2025_12_18_021520_create_underlying_states_table',48),
(76,'2025_12_18_021555_create_futures_states_table',48),
(77,'2025_12_18_021617_create_options_states_table',48),
(78,'2025_12_18_021638_create_candles_table',48),
(79,'2025_12_18_021704_create_instrument_news_states_table',48),
(80,'2026_01_12_104255_create_simulation_configs_table',49),
(81,'2026_01_14_162807_create_notifications_table',50),
(82,'2026_01_15_091929_create_psychometric_states_table',51),
(83,'2026_01_15_092001_create_psychometric_snapshots_table',51),
(84,'2026_01_15_092027_create_psychometric_explanations_table',51),
(85,'2026_01_15_092054_create_pattern_definitions_table',51),
(86,'2026_01_15_092117_create_pattern_executions_table',51),
(87,'2026_01_15_092141_create_pattern_states_table',51),
(88,'2026_01_15_092206_create_trade_assistance_logs_table',51),
(89,'2026_01_15_094303_create_admin_cycle_forecasts_table',52),
(90,'2026_01_15_105513_create_timeframe_activities_table',53),
(91,'2026_01_15_120715_upgrade_pattern_definitions_full_spec',54),
(92,'2026_01_15_140344_update_pattern_states_table_add_columns',55),
(93,'2026_01_31_110647_create_vehicles_table',56),
(94,'2026_01_31_111020_create_pricing_quotes_table',57),
(95,'2026_01_31_111037_create_proof_of_deliveries_table',57),
(96,'2026_01_31_111325_create_pricing_rules_table',58),
(97,'2026_01_31_121219_make_location_fields_nullable_in_trips',59),
(98,'2026_02_06_212555_create_driver_requests_table',60),
(99,'2026_02_06_220030_fix_pricing_quotes_table',61);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL,
  `type` enum('text','image','audio','video') NOT NULL DEFAULT 'text',
  `thumbnail` varchar(191) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `file_path` varchar(191) DEFAULT NULL,
  `author` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_logs`
--

DROP TABLE IF EXISTS `notification_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification_logs` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT 0,
  `sender` varchar(40) DEFAULT NULL,
  `sent_from` varchar(40) DEFAULT NULL,
  `sent_to` varchar(40) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `notification_type` varchar(40) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_logs`
--

LOCK TABLES `notification_logs` WRITE;
/*!40000 ALTER TABLE `notification_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_settings`
--

DROP TABLE IF EXISTS `notification_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fcm_api_key` varchar(255) DEFAULT NULL,
  `fcm_auth_domain` varchar(255) DEFAULT NULL,
  `fcm_project_id` varchar(255) DEFAULT NULL,
  `fcm_storage_bucket` varchar(255) DEFAULT NULL,
  `fcm_messaging_sender_id` varchar(255) DEFAULT NULL,
  `fcm_app_id` varchar(255) DEFAULT NULL,
  `fcm_measurement_id` varchar(255) DEFAULT NULL,
  `sms_provider` enum('nexmo','twilio','msg91','textlocal') NOT NULL DEFAULT 'nexmo',
  `nexmo_api_key` varchar(255) DEFAULT NULL,
  `nexmo_api_secret` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_settings`
--

LOCK TABLES `notification_settings` WRITE;
/*!40000 ALTER TABLE `notification_settings` DISABLE KEYS */;
INSERT INTO `notification_settings` VALUES
(1,'AIzaSyBsyabUP_yV7PTbsWtV6Be-eWVra9w_QDPg','fstandard-project.firebaseapp.com','fstandard-project','fstandard-project.appspot.com','678649964403','1:678649964403:web:94d6f4bcaf22ad2550706','G-X0Y03EL75D','twilio','cfzsfsdfdsfasdasd',NULL,'2025-11-30 22:31:46','2025-11-30 22:35:22');
/*!40000 ALTER TABLE `notification_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_templates`
--

DROP TABLE IF EXISTS `notification_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification_templates` (
  `id` bigint(20) unsigned NOT NULL,
  `act` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `push_title` varchar(255) DEFAULT NULL,
  `email_body` text DEFAULT NULL,
  `sms_body` text DEFAULT NULL,
  `push_body` text DEFAULT NULL,
  `shortcodes` text DEFAULT NULL,
  `email_status` tinyint(1) NOT NULL DEFAULT 1,
  `email_sent_from_name` varchar(40) DEFAULT NULL,
  `email_sent_from_address` varchar(40) DEFAULT NULL,
  `sms_status` tinyint(1) NOT NULL DEFAULT 1,
  `sms_sent_from` varchar(40) DEFAULT NULL,
  `push_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_templates`
--

LOCK TABLES `notification_templates` WRITE;
/*!40000 ALTER TABLE `notification_templates` DISABLE KEYS */;
INSERT INTO `notification_templates` VALUES
(1,'BAL_ADD','Balance - Added','Your Account has been Credited',NULL,'<div style=\"font-family: Montserrat, sans-serif;\">{{amount}} INR has been credited to your account.</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number: {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Your Current Balance: <b>{{post_balance}} INR</b></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div>Admin Note: {{remark}}</div>','{{amount}} INR credited to your account. Current Balance {{post_balance}} INR. TRX: #{{trx}}',NULL,'{\"trx\":\"Transaction number\",\"amount\":\"Amount added\",\"remark\":\"Admin remark\",\"post_balance\":\"Balance after transaction\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-12-01 00:02:26'),
(2,'BAL_SUB','Balance - Subtracted','Your Account has been Debited',NULL,'<div style=\"font-family: Montserrat, sans-serif;\">{{amount}} INR has been deducted from your account.</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number: {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Your Current Balance: <b>{{post_balance}} INR</b></div><div>Admin Note: {{remark}}</div>','{{amount}} INR debited from your account. Current Balance {{post_balance}} INR. TRX: #{{trx}}',NULL,'{\"trx\":\"Transaction number\",\"amount\":\"Amount deducted\",\"remark\":\"Admin remark\",\"post_balance\":\"Balance after transaction\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(3,'DEPOSIT_COMPLETE','Deposit - Successful','Deposit Completed Successfully',NULL,'<div>Your deposit of <b>{{amount}} INR</b> has been completed successfully.<br><br>Transaction ID: {{trx}}<br><br>Your current balance is <b>{{post_balance}} INR</b></div>','{{amount}} INR deposited successfully. TRX: {{trx}}',NULL,'{\"trx\":\"Transaction ID\",\"amount\":\"Deposited amount\",\"post_balance\":\"Balance after deposit\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(4,'DEPOSIT_APPROVE','Deposit - Approved','Your Deposit is Approved',NULL,'<div>Your deposit of <b>{{amount}} INR</b> has been approved.<br><br>Transaction ID: {{trx}}<br><br>Your current balance is <b>{{post_balance}} INR</b></div>','Your {{amount}} INR deposit approved. TRX: {{trx}}',NULL,'{\"trx\":\"Transaction ID\",\"amount\":\"Deposited amount\",\"post_balance\":\"Balance after deposit\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(5,'DEPOSIT_REJECT','Deposit - Rejected','Your Deposit Request is Rejected',NULL,'<div>Your deposit request of <b>{{amount}} INR</b> has been rejected.<br><br>Transaction ID: {{trx}}<br><br>Reason: {{rejection_message}}</div>','Your {{amount}} INR deposit rejected. Reason: {{rejection_message}}',NULL,'{\"trx\":\"Transaction ID\",\"amount\":\"Requested amount\",\"rejection_message\":\"Rejection reason\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(6,'DEPOSIT_REQUEST','Deposit - Requested','Deposit Request Submitted',NULL,'<div>Your deposit request of <b>{{amount}} INR</b> submitted successfully.<br><br>Transaction ID: {{trx}}</div>','{{amount}} INR deposit request submitted. TRX: {{trx}}',NULL,'{\"trx\":\"Transaction ID\",\"amount\":\"Requested amount\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(7,'PASS_RESET_CODE','Password Reset Code','Password Reset Verification',NULL,'<div style=\"font-family: Montserrat, sans-serif;\">Your password reset code is: <b><font size=\"6\">{{code}}</font></b><br><br>Requested from IP: {{ip}} | {{browser}} on {{operating_system}}</div>','Your password reset code: {{code}}',NULL,'{\"code\":\"Verification code\",\"ip\":\"IP\",\"browser\":\"Browser\",\"operating_system\":\"OS\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(8,'PASS_RESET_DONE','Password Reset Done','Password Changed Successfully',NULL,'<div>You have successfully changed your password from IP: {{ip}} using {{browser}} on {{operating_system}} at {{time}}</div>','Password changed successfully',NULL,'{\"ip\":\"IP\",\"browser\":\"Browser\",\"operating_system\":\"OS\",\"time\":\"Time\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(9,'ADMIN_SUPPORT_REPLY','Support Ticket Reply','New Reply on Your Ticket',NULL,'<div>A support team member replied to your ticket:<br><br><b>Ticket #{{ticket_id}} - {{ticket_subject}}</b><br><br>Reply: {{reply}}<br><br>Click here to view: {{link}}</div>','New reply on Ticket #{{ticket_id}}',NULL,'{\"ticket_id\":\"Ticket ID\",\"ticket_subject\":\"Subject\",\"reply\":\"Admin reply\",\"link\":\"Ticket URL\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(10,'EVER_CODE','Email Verification','Verify Your Email',NULL,'<div>Your email verification code is: <b><font size=\"6\">{{code}}</font></b></div>','Email verification code: {{code}}',NULL,'{\"code\":\"Verification code\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(11,'SVER_CODE','SMS Verification','Verify Your Phone',NULL,'Your phone verification code: {{code}}','Your phone verification code: {{code}}',NULL,'{\"code\":\"SMS code\"}',0,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(12,'WITHDRAW_APPROVE','Withdraw Approved','Withdrawal Processed',NULL,'<div>Your withdrawal of <b>{{amount}} INR</b> has been processed successfully.<br><br>Transaction ID: {{trx}}<br><br>Amount credited to your bank/account: {{amount}} INR (after charges)<br><br>Admin Details: {{admin_details}}</div>','Withdrawal of {{amount}} INR approved. TRX: {{trx}}',NULL,'{\"trx\":\"Transaction ID\",\"amount\":\"Withdrawn amount\",\"admin_details\":\"Admin note\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(13,'WITHDRAW_REJECT','Withdraw Rejected','Withdrawal Rejected',NULL,'<div>Your withdrawal request of <b>{{amount}} INR</b> has been rejected and refunded.<br><br>Transaction ID: {{trx}}<br>Current Balance: <b>{{post_balance}} INR</b><br>Reason: {{admin_details}}</div>','Withdrawal {{amount}} INR rejected & refunded. Balance {{post_balance}} INR',NULL,'{\"trx\":\"Transaction ID\",\"amount\":\"Requested amount\",\"post_balance\":\"Current balance\",\"admin_details\":\"Rejection reason\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(14,'WITHDRAW_REQUEST','Withdraw Requested','Withdrawal Request Submitted',NULL,'<div>Your withdrawal request of <b>{{amount}} INR</b> submitted successfully.<br><br>Transaction ID: {{trx}}<br>Current Balance: {{post_balance}} INR</div>','Withdrawal request {{amount}} INR submitted. TRX: {{trx}}',NULL,'{\"trx\":\"Transaction ID\",\"amount\":\"Requested amount\",\"post_balance\":\"Balance after request\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(15,'DEFAULT','Default Template','{{subject}}',NULL,'{{message}}','{{message}}',NULL,'{\"subject\":\"Subject\",\"message\":\"Message\"}',1,NULL,NULL,1,NULL,0,'2019-09-14 07:44:22','2025-11-28 04:30:00'),
(21,'REFERRAL_COMMISSION','Referral Commission','Referral Bonus Credited',NULL,'<div>You received <b>{{amount}} INR</b> as referral commission.<br><br>Level: {{level}}<br>Transaction: {{trx}}<br>Current Balance: <b>{{post_balance}} INR</b></div>','You earned {{amount}} INR referral bonus!',NULL,'{\"amount\":\"Bonus amount\",\"level\":\"Referral level\",\"trx\":\"Transaction ID\",\"post_balance\":\"Current balance\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(22,'RECEIVED_MONEY','Money Received','You Received Money',NULL,'<div>You received <b>{{amount}} INR</b> from {{from_username}}</div>','Received {{amount}} INR from {{from_username}}',NULL,'{\"amount\":\"Amount\",\"from_username\":\"Sender\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00'),
(23,'TRANSFER_MONEY','Money Transferred','Money Sent Successfully',NULL,'<div>You sent <b>{{amount}} INR</b> to {{to_username}}</div>','Sent {{amount}} INR to {{to_username}}',NULL,'{\"amount\":\"Amount\",\"to_username\":\"Receiver\"}',1,NULL,NULL,1,NULL,0,'2021-11-03 06:30:00','2025-11-28 04:30:00');
/*!40000 ALTER TABLE `notification_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `trip_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `old_notifications`
--

DROP TABLE IF EXISTS `old_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `old_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `sender_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `text` varchar(255) NOT NULL,
  `target_url` varchar(255) DEFAULT NULL,
  `is_seen` varchar(255) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=admin, 2=instructor, 3=student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `notifications_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `old_notifications`
--

LOCK TABLES `old_notifications` WRITE;
/*!40000 ALTER TABLE `old_notifications` DISABLE KEYS */;
INSERT INTO `old_notifications` VALUES
(1,'ed2ca2b7-bdb4-4fd2-b6a9-e69c128cca29',1,1,'A new blog has been posted on the platform.','http://127.0.0.1:8000/blog_details/dsffsdf','no',2,'2025-11-23 00:48:13','2025-11-23 00:48:13'),
(2,'ae2f9e83-575d-4df2-84b5-b34cb9fcf827',9,9,'A new user has registered on the platform.','http://127.0.0.1:8000/admin/users','no',1,'2025-11-24 06:04:54','2025-11-24 06:04:54'),
(3,'c85cfee8-e80b-4a53-a980-11a6d1e77c11',10,10,'A new user has registered on the platform.','http://127.0.0.1:8000/admin/users','no',1,'2025-11-24 06:07:25','2025-11-24 06:07:25'),
(4,'2fdb001a-9517-4c3b-a3b7-1d117e39bf22',11,11,'A new user has registered on the platform.','http://127.0.0.1:8000/admin/users','no',1,'2025-11-24 06:21:06','2025-11-24 06:21:06'),
(5,'583dc31f-4ba2-40a9-8302-bf59ac6df265',13,13,'A new user has registered on the platform.','http://127.0.0.1:8000/admin/users','no',1,'2025-11-24 06:38:35','2025-11-24 06:38:35'),
(6,'bb77fc74-4632-46dc-a57e-6a3cc10811ad',5,5,'Un nuevo ticket ha sido creado con el siguiente asunto','http://127.0.0.1:8000/admin/support-ticket/index','no',1,'2025-12-01 00:51:54','2025-12-01 00:51:54'),
(7,'1330c0b2-62ac-4d74-8064-72570ff45f2b',14,14,'A new user has registered on the platform.','http://127.0.0.1:8000/admin/users','no',1,'2025-12-01 21:41:44','2025-12-01 21:41:44'),
(8,'b8abd9f8-0ca0-4852-8953-09499c81b6b3',14,14,'Un nuevo ticket ha sido creado con el siguiente asunto','http://127.0.0.1:8000/admin/support-ticket/index','no',1,'2025-12-01 21:43:39','2025-12-01 21:43:39');
/*!40000 ALTER TABLE `old_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status_histories`
--

DROP TABLE IF EXISTS `order_status_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_status_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `trip_id` bigint(20) unsigned NOT NULL,
  `status` varchar(255) NOT NULL,
  `changed_by` bigint(20) unsigned DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_status_histories_trip_id_foreign` (`trip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status_histories`
--

LOCK TABLES `order_status_histories` WRITE;
/*!40000 ALTER TABLE `order_status_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_status_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `our_histories`
--

DROP TABLE IF EXISTS `our_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `our_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `our_histories`
--

LOCK TABLES `our_histories` WRITE;
/*!40000 ALTER TABLE `our_histories` DISABLE KEYS */;
INSERT INTO `our_histories` VALUES
(1,'1998','Mere tranquil existence','Possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart am alone',NULL,'2025-01-13 06:33:44'),
(2,'1998','Incapable of drawing','Exquisite sense of mere tranquil existence that I neglect my talents add should be incapable of drawing',NULL,'2025-01-13 06:33:44'),
(3,'1998','Foliage access trees','Serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my',NULL,'2025-01-13 06:33:44'),
(4,'1998','Among grass trickling','Should be incapable of drawing a single stroke at the present moment; and yet I feel that I never',NULL,'2025-01-13 06:33:44'),
(5,'1994','born','aasif','2025-01-13 06:33:44','2025-01-13 06:33:44');
/*!40000 ALTER TABLE `our_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_otps`
--

DROP TABLE IF EXISTS `password_reset_otps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_otps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `password_reset_otps_token_unique` (`token`),
  KEY `password_reset_otps_email_is_used_index` (`email`,`is_used`),
  KEY `password_reset_otps_expires_at_index` (`expires_at`),
  KEY `password_reset_otps_email_index` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_otps`
--

LOCK TABLES `password_reset_otps` WRITE;
/*!40000 ALTER TABLE `password_reset_otps` DISABLE KEYS */;
INSERT INTO `password_reset_otps` VALUES
(1,'saddamahmed3@gmail.com','061559','CGQy7O7N49WeDZFA33JTz6GWfUBzrX4et79c2wWrmp3YjUgD5hDyxJOCyOJRLqzG','2026-04-06 03:23:59',1,'2026-04-06 08:47:50','2026-04-06 08:53:59'),
(2,'saddamahmed3@gmail.com','484640','jqdWRed5WOUTFJQamLUURsZ6hWo2U74SMmH14UNyjT5d0WcskcrASGv4f5bHaYs3','2026-04-06 03:26:03',1,'2026-04-06 08:53:59','2026-04-06 08:56:03'),
(3,'saddamahmed3@gmail.com','461813','P0XgrirfW8wzoB56pPcEdkmxUu0o4sDlPbrtJshzsuGrZfS2sc8RmMm7om7wsfPk','2026-04-06 03:35:30',1,'2026-04-06 08:56:03','2026-04-06 09:05:30'),
(4,'saddamahmed3@gmail.com','906451','SP9XaOeVG7JVU96CMmmuiYVV6SECtYOtOUwJXHQwfldAR3ynzc0M2q07A7igp9Hf','2026-04-06 03:38:17',1,'2026-04-06 09:05:30','2026-04-06 09:08:17'),
(5,'saddamahmed3@gmail.com','412218','UFbThZE70bwJRTPZvPcUH0ITQWDPImcZWn5J3hAjSP5ta16QbgfCoyQQUZPhUqb5','2026-04-06 03:53:43',1,'2026-04-06 09:08:17','2026-04-06 09:23:43'),
(6,'saddamahmed3@gmail.com','700420','nwISwYdlf6dKWQxRgHzSvTsNPfO7T805qju7Pybo13YAVkCzD5u1qMfYOFEdvcG5','2026-04-06 03:58:01',1,'2026-04-06 09:23:43','2026-04-06 09:28:01'),
(7,'saddamahmed3@gmail.com','461232','3d4q0ScuBJEgtAfqFWFyqUmg98tSjmDf6aLDbSiC28KtEtYEtGWoDKsy7Re9fJ2f','2026-04-06 04:09:46',1,'2026-04-06 09:28:01','2026-04-06 09:39:46'),
(8,'saddamahmed3@gmail.com','620397','flhDZa5kuXih19xeizK0qqqw8hOG19cFe3tzVgDDdCJreoCDbnGCB4TLZASHWBxT','2026-04-06 04:56:39',1,'2026-04-06 09:39:46','2026-04-06 10:26:39'),
(9,'saddamahmed3@gmail.com','785221','GYjsNhL0QMHIDdJUH4lfNYmWpbcvijyhRSUV65cBoLQW4wlwt8yFFHj3k3w16Y1v','2026-04-06 05:05:52',1,'2026-04-06 10:26:39','2026-04-06 10:35:52'),
(10,'saddamahmed3@gmail.com','326017','SR3h2ttHd9Ri7CIr150h1Ri0HpVUlJVAiS3c34oN4RoIsaLJzEyjyyQeVXwdm6fM','2026-04-06 05:07:34',1,'2026-04-06 10:35:52','2026-04-06 10:37:34'),
(11,'saddamahmed3@gmail.com','832571','HkgR4IOjCIWmmqvkI4BBkgNnIFYQopoK2UQC6qBEozfEeawEXBIWBVZjGhvCsdqZ','2026-04-06 05:13:27',1,'2026-04-06 10:37:34','2026-04-06 10:43:27'),
(12,'saddamahmed3@gmail.com','290335','TG3tXwsBySz2ZNvXLbgUFfUYZygXF6OWfi6Axk1V9A0kSiOFneYa9j9p7e4fL6WB','2026-04-06 05:16:49',1,'2026-04-06 10:43:27','2026-04-06 10:46:49'),
(13,'saddamahmed3@gmail.com','060824','q3JdvMUQEFFG17BneizKqG5eCiJLAL633QJm4pPo0K4S4hjyngUNQ2NX8R3Gwf61','2026-04-06 05:25:51',1,'2026-04-06 10:46:49','2026-04-06 10:55:51'),
(14,'saddamahmed3@gmail.com','576239','lmgcYtofuIPq8v62Bpquea3zfGm8FtqkbojBZijCOyCbQojjg2mB2IIq9TZWE3L7','2026-04-06 05:29:57',1,'2026-04-06 10:55:51','2026-04-06 10:59:57'),
(15,'saddamahmed3@gmail.com','440568','MPapMTOnpPEq4aH4zlR8N5myFSE2JsGhvJ3RCfmBQ4gKKB9LSQv81h4SVF79Uvus','2026-04-06 05:32:55',1,'2026-04-06 10:59:57','2026-04-06 11:02:55'),
(16,'saddamahmed3@gmail.com','528375','AYYH1TUqLxAjdYK6lPB9uxNs8QsYh2s2RCo09LP9fY9Jae4j0S463qYNhANexLi7','2026-04-06 05:35:39',1,'2026-04-06 11:02:55','2026-04-06 11:05:39'),
(17,'saddamahmed3@gmail.com','869603','JjX3V9yzDTiaqKsbMv1CXwzc3v4r1mzau20V7Xz0BLncsKrN3dS4xqcqB6mD82Md','2026-04-06 11:15:39',0,'2026-04-06 11:05:39','2026-04-06 11:05:39'),
(18,'arstech2a@gmail.com','392600','WcNxdg1vHyIs70pUq2oWSxTfbJJTgsC6E5pca8KZVqiVsmftAyVzh9EwcOvchzKS','2026-04-06 05:51:42',1,'2026-04-06 11:17:00','2026-04-06 11:21:42'),
(19,'arstech2a@gmail.com','843970','ugRIJF1GnMpChvv4NdhHfelCYfRqUNxhEsoy3IXdXaduPwqp0xk06AgV2HZcvLsP','2026-04-06 05:56:18',1,'2026-04-06 11:21:42','2026-04-06 11:26:18'),
(20,'arstech2a@gmail.com','461878','SCoUHEHCyhWAaNpHeOruhIc7pTBTKjJOOfVYiea7OvqyII4AzaocR5nsqzSwufjH','2026-04-07 08:34:39',1,'2026-04-06 11:26:18','2026-04-07 14:04:39'),
(21,'arstech2a@gmail.com','520232','dV20kWke1KdnhDPrWt84KqsG9aEgB5ZDxyR6IiQr2WeNhV9qlOswCJO9AmH77O6R','2026-04-07 09:02:36',1,'2026-04-07 14:04:39','2026-04-07 14:32:36'),
(22,'arstech2a@gmail.com','148097','qzSuvG5zKXEgjE8t9Phw2dErxvLMbMCMamwqm8BaX7shMrdOKHmRSScuiOVE7m4G','2026-04-07 09:03:40',1,'2026-04-07 14:32:36','2026-04-07 14:33:40'),
(23,'arstech2a@gmail.com','002326','SOOLyAIYu68BJHXfFPnrXpKPeHHzSFM6dmPTKVcdxvtmTIZ17BoIH1GseHvpAkHu','2026-04-07 09:06:26',1,'2026-04-07 14:35:29','2026-04-07 14:36:26'),
(24,'ivanescobedo196@gmail.com','157275','TtLzH8gvKqqV7tAXteMCOFil0hQF6LVIM8YhmA4nrEyXA4PeQuAtTTUb5QLCxKcp','2026-04-14 15:49:23',1,'2026-04-14 21:18:40','2026-04-14 21:19:23'),
(25,'ivanescobedo196@gmail.com','129988','3Rq0jhMXraiIZIOk7DcLMor74ZIxxBbWc1s7KyzimgTdb4vY94nOsNyiqQdYDY3t','2026-04-21 13:18:51',1,'2026-04-21 18:44:38','2026-04-21 18:48:51'),
(26,'ivanescobedo196@gmail.com','313957','866Qa6Zhe8gvzsjIGjsOYwi4nHkHe4rnHY3J5JgS8OC3dVPWn1tzVqiKFqZ6nLCv','2026-04-21 14:28:45',1,'2026-04-21 19:49:30','2026-04-21 19:58:45'),
(27,'ivanescobedo196@gmail.com','760619','EHQwMUQEpwyBs4lwHm7aBwcGPM010524K7JvzQ0yXDqM2RZp0s47tKoiWWXtVZKP','2026-04-21 14:29:17',1,'2026-04-21 19:58:45','2026-04-21 19:59:17'),
(28,'ivanescobedo196@gmail.com','765278','mOb9t3e4TlDhqcwAZOgD5C4WnXOl8Rouy8GSaZZjAQuNcbEZlpalw3IncBFpYf9E','2026-04-23 14:17:09',1,'2026-04-23 19:45:53','2026-04-23 19:47:09'),
(29,'hugocardozogarzon754@gmail.com','669810','egEcDxBNNeGFsBdC0EIhvOtohHCkwSiiZQmssvwueFoE1iz6uR3ynVJ7VJLuc0yE','2026-05-04 23:38:20',1,'2026-05-05 05:05:33','2026-05-05 05:08:20'),
(30,'hugocardozogarzon754@gmail.com','557163','gUjxtkU1GmNU5PGYBVo5PJurV5QSXQsUe7d2i38175RzuKbBK4n6faz4QYiDYPvV','2026-05-18 19:30:42',1,'2026-05-08 19:49:41','2026-05-19 01:00:42'),
(31,'laupadilla639@gmail.com','539523','aNjMStlXHZvauFMMsI6ZkCXIgT5hVsAZ8Y4lOkzwmYcdOo3VXsfSvx6BnnMm3D02','2026-05-17 20:23:46',0,'2026-05-17 20:13:46','2026-05-17 20:13:46'),
(32,'jago1410@gmail.com','862331','J951mpp15ilsUluiDU8O1iQxtl3nyUD9c9yxT7E4IoujSqNXDO4vs4oSDdFaVQok','2026-05-17 17:01:12',1,'2026-05-17 22:14:16','2026-05-17 22:31:12'),
(33,'jago1410@gmail.com','642044','keAdAFoYDHlDxmuwchuZWxwJYZlKdhyyzfLJkTqR1TGODceszZ9WCP0N5rwFTfvX','2026-05-17 17:03:14',1,'2026-05-17 22:31:12','2026-05-17 22:33:14'),
(34,'hugocardozogarzon754@gmail.com','734619','sZfD21NE4AQY0flnBK2Z3AdjDKMSnYlVRNneNGQfALzZL36nTgtdwsKATPIp7AGw','2026-05-18 19:36:15',1,'2026-05-19 01:00:42','2026-05-19 01:06:15'),
(35,'hugocardozogarzon754@gmail.com','150917','9uXN70gYYJ4oLVUyeaM4ei6E1B4aGdlimWqEfWgZ82C7J9iZPeFmTgelMU4IWB5N','2026-05-19 01:29:02',0,'2026-05-19 01:19:02','2026-05-19 01:19:02'),
(36,'jago1410@gmail.com','994453','YMZtzg1IaSFyywB9mBaMShuScD36FnDVv4uOVQir8GvyF2UccMKZP7KG20adwxnF','2026-05-18 20:06:14',1,'2026-05-19 01:34:55','2026-05-19 01:36:14'),
(37,'diablito1437@gmail.com','132801','Iyfs429JmBUfMQFSOgFN7Cgfd34zWDkD7pV2GcwCmT0WDXgyPLhE4lgmvN9BgHIz','2026-05-19 01:52:59',1,'2026-05-19 07:21:52','2026-05-19 07:22:59'),
(38,'diablito1437@gmail.com','082546','r2vlLDD9dvz3D7xzPMGgCkOIzhIN2qyII5bCgb2Pz8MXZ6KBk0Ufk7hPMOzEIHiq','2026-05-19 01:53:52',1,'2026-05-19 07:22:59','2026-05-19 07:23:52'),
(39,'jago1410@gmail.com','573474','x5uE5vtgA21dmvgHPgh5C7RmoCJbS5CDwg0tmPCLyXk5BT4teCZDidkN9oR1GnhZ','2026-05-19 14:02:53',1,'2026-05-19 19:30:43','2026-05-19 19:32:53');
/*!40000 ALTER TABLE `password_reset_otps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES
(2,'hugocardozogarzon754@gmail.com','Fh54Sc3PXPknrS1leRkVGU5FS7svr9F2eO3zruXz','2026-05-08 03:01:33');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `trip_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `amount` double(8,2) NOT NULL,
  `method` varchar(255) DEFAULT NULL,
  `status` enum('pending','paid','unpaid','refunded') NOT NULL DEFAULT 'pending',
  `transaction_id` varchar(255) DEFAULT NULL,
  `difference_from_quote` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_trip_id_foreign` (`trip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`),
  KEY `personal_access_tokens_tokenable_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES
(1,'App\\Models\\User',28,'auth_token','63ae9dd7a59cde3aed2e2e43a6bf816d71a67df9c71efc2a8745cfbb8f9ac0ca','[\"*\"]',NULL,NULL,'2025-05-20 07:35:41','2025-05-20 07:35:41'),
(2,'App\\Models\\User',28,'auth_token','2faa03d8207138003526e436c4879c3b4fecc20e913ae7995118fe23e8efabdd','[\"*\"]',NULL,'2025-05-20 07:38:49','2025-05-20 07:37:03','2025-05-20 07:38:49'),
(3,'App\\Models\\User',28,'auth_token','20ddd23e1352b52a68271251cc3d876c22e97e9b2e96aee67dbe506c8ea3b5cb','[\"*\"]',NULL,NULL,'2025-05-21 00:19:16','2025-05-21 00:19:16'),
(7,'App\\Models\\User',28,'auth_token','d1f0ee9b0ef689830b943fa6120fd31031c60cd9f81bb00414bf288b44a379ce','[\"*\"]',NULL,'2025-05-22 03:09:18','2025-05-21 05:51:27','2025-05-22 03:09:18'),
(8,'App\\Models\\User',28,'auth_token','6e645cc7021744226f2d2c0a80b3f2eae8d8c2b8c5ca6a4fe17afedc6c232749','[\"*\"]',NULL,'2025-05-22 09:37:22','2025-05-22 09:36:28','2025-05-22 09:37:22'),
(11,'App\\Models\\User',30,'auth_token','13af640e677f1a313734831af589a9be5223e7d24a5b3c94a7579a45c0b51a5c','[\"*\"]',NULL,'2025-05-22 17:16:48','2025-05-22 09:54:33','2025-05-22 17:16:48'),
(15,'App\\Models\\User',29,'auth_token','18fdd4a05b81f25fa11877a26ba11bf5aa67509a7ea2f526ab5da83c81fafe49','[\"*\"]',NULL,'2025-05-24 14:07:05','2025-05-24 08:42:39','2025-05-24 14:07:05'),
(17,'App\\Models\\User',30,'auth_token','9174bc2570caaab64ec9000629eae4e401a07cbb1e4538809866ac9c449f1c63','[\"*\"]',NULL,'2025-05-25 06:30:50','2025-05-25 06:22:24','2025-05-25 06:30:50'),
(18,'App\\Models\\User',30,'auth_token','e9003e050f3340a076eb532030d3ab28b6b56a958a500e8515e7a19c06d0f765','[\"*\"]',NULL,'2025-05-25 07:00:00','2025-05-25 06:51:53','2025-05-25 07:00:00'),
(19,'App\\Models\\User',30,'auth_token','96391a8a74102945f2c46716e917efc1e6dc4e4821824533fbffb5cff0763947','[\"*\"]',NULL,'2025-05-25 07:02:33','2025-05-25 07:02:02','2025-05-25 07:02:33'),
(20,'App\\Models\\User',30,'auth_token','cc13d79d0bbbbe7e4c45b2e9126eb81a5bf9a1e550444b0d6a494effacac7962','[\"*\"]',NULL,'2025-05-25 07:29:57','2025-05-25 07:11:57','2025-05-25 07:29:57'),
(29,'App\\Models\\User',29,'auth_token','b8898834e39f54fa2f485681bd598ff12a75126fb1a227c2608811daf284fcc5','[\"*\"]',NULL,'2025-05-25 14:32:29','2025-05-25 14:31:04','2025-05-25 14:32:29'),
(31,'App\\Models\\User',29,'auth_token','5b3423374867258a39a4d90ccb05ff4008e5493af9dcd9b8857690f1cb01a6b1','[\"*\"]',NULL,'2025-05-25 15:18:58','2025-05-25 14:46:50','2025-05-25 15:18:58'),
(36,'App\\Models\\User',29,'auth_token','649fe24dce313fe967ada201a26060a509d1ae267c3bd27edcb4ff0c7e359741','[\"*\"]',NULL,NULL,'2025-05-26 04:35:28','2025-05-26 04:35:28'),
(42,'App\\Models\\User',34,'auth_token','d5555fc475478fbc84e3092b371bb6d467bd92df0b3b6f2585fedc1d6bd72553','[\"*\"]',NULL,'2025-05-26 04:56:21','2025-05-26 04:55:56','2025-05-26 04:56:21'),
(43,'App\\Models\\User',35,'auth_token','fb2170e09559613b77102358197bf2b93ef75b63632e297ee7a73eedc8994e1e','[\"*\"]',NULL,'2025-05-26 04:58:06','2025-05-26 04:57:48','2025-05-26 04:58:06'),
(47,'App\\Models\\User',36,'auth_token','62d8082af7585144b05bec3d321f03f82a839d5b8a0e0435310b753bde41848f','[\"*\"]',NULL,'2025-05-26 05:21:36','2025-05-26 05:21:35','2025-05-26 05:21:36'),
(48,'App\\Models\\User',37,'auth_token','9adc837fb8ec54e385525b5d7f7789f8edf4d384b0a9e4aa988b28c4a0950a43','[\"*\"]',NULL,'2025-05-27 19:21:40','2025-05-26 05:39:36','2025-05-27 19:21:40'),
(52,'App\\Models\\User',29,'auth_token','cc34f26f7c2fbab40d97aa26c0be1e03d53b6294447d227936e5431de996a0f9','[\"*\"]',NULL,'2025-06-10 08:29:12','2025-05-29 03:32:55','2025-06-10 08:29:12'),
(53,'App\\Models\\User',29,'auth_token','1586a4655f6098a35b5ecd1fc8f333a278afd6ff62f264a0d5d610285dfaab3f','[\"*\"]',NULL,'2025-05-29 04:58:58','2025-05-29 04:52:15','2025-05-29 04:58:58'),
(54,'App\\Models\\User',29,'auth_token','c0fce24ee5f3e9c42ddb7e6a04f317f19320b4ecff09393e62af5f4503550907','[\"*\"]',NULL,'2025-06-08 12:35:48','2025-05-29 05:07:12','2025-06-08 12:35:48'),
(57,'App\\Models\\User',37,'auth_token','fc97a17e067927a4550fdc89b2905223198f682c98c5ba006c49b04f92aa3e4f','[\"*\"]',NULL,'2025-06-02 19:25:27','2025-06-02 18:44:58','2025-06-02 19:25:27'),
(58,'App\\Models\\User',26,'registration','b1a716b2631f03b3767a35d4b17bf6251ce2aeac8f3861cdb0b867bdd131e2c7','[\"driver:register\"]',NULL,NULL,'2026-04-05 15:50:44','2026-04-05 15:50:44'),
(59,'App\\Models\\User',27,'registration','e18a26725ea9ae93049626e454703d48daed55133275b021824c0a62678a64e2','[\"driver:register\"]',NULL,'2026-04-05 15:59:19','2026-04-05 15:56:57','2026-04-05 15:59:19'),
(60,'App\\Models\\User',28,'registration','f40023efbc985262af312db0e9fc0ec324551fdb4e5a4b41c5c16adc5399c17d','[\"driver:register\"]',NULL,'2026-04-05 16:06:31','2026-04-05 16:05:18','2026-04-05 16:06:31'),
(61,'App\\Models\\User',29,'registration','12e674981164661f79357065a5e70d3235137de2755cf10e5de29e8f4f93053a','[\"driver:register\"]',NULL,'2026-04-05 16:12:28','2026-04-05 16:12:20','2026-04-05 16:12:28'),
(62,'App\\Models\\User',30,'registration','707a224f51eb62f375bccabc2583ef82339a545519b02aea17a161a2d2eb7a6c','[\"driver:register\"]',NULL,'2026-04-05 16:14:50','2026-04-05 16:13:41','2026-04-05 16:14:50'),
(85,'App\\Models\\User',31,'password_reset','8c3dff1b1db5ccbd49a0c152de947372a9f176856dc0c9fe0807007a888b656c','[\"driver:access\"]',NULL,NULL,'2026-04-07 14:36:26','2026-04-07 14:36:26'),
(86,'App\\Models\\User',31,'driver_auth','abd01cc8b5c7854618e93c332cb56536c1d9c75fecbec62c0748ef6ed8146241','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-08 10:48:27','2026-04-07 14:36:57','2026-04-08 10:48:27'),
(88,'App\\Models\\User',31,'driver_auth','b4cbcfe69e31ba7b3d67f2b01a1eb1cdfd082d09422fb477daff0560f62d1031','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-09 22:02:19','2026-04-09 22:01:41','2026-04-09 22:02:19'),
(89,'App\\Models\\User',31,'driver_auth','5cc36706dbddda2e8e39afe3f24a1b0d3166ce3dc08d45018222a2c5ba153c03','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-10 11:34:57','2026-04-10 11:31:30','2026-04-10 11:34:57'),
(90,'App\\Models\\User',31,'driver_auth','d2458014579d16798dc748da91f1062be81b627f508818ea175c093669804622','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-10 12:54:38','2026-04-10 11:41:42','2026-04-10 12:54:38'),
(91,'App\\Models\\User',31,'driver_auth','6c88e4f21f40ced246a5ac5a8171bf12c9ed984df125f779619d4ff1d54d67ab','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-10 13:10:28','2026-04-10 13:04:02','2026-04-10 13:10:28'),
(93,'App\\Models\\User',31,'driver_auth','5b111b7988e6cd398cf0caa2cc2911db5417d7f219957b34501a99b356cf4fb7','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-10 13:46:19','2026-04-10 13:31:44','2026-04-10 13:46:19'),
(94,'App\\Models\\User',31,'driver_auth','6dc64a18e717a53c37d419807f0a9aa79a13a9c17b0b8f478df2b665bd7706a9','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-10 15:37:45','2026-04-10 13:50:49','2026-04-10 15:37:45'),
(95,'App\\Models\\User',31,'driver_auth','0237a4f69cb81c86c6ea7b58847293542686ea6934b59b0143a08bf744f7ae23','[\"driver:access\"]',NULL,'2026-04-11 13:16:51','2026-04-11 11:45:51','2026-04-11 13:16:51'),
(96,'App\\Models\\User',31,'driver_auth','7d020ba0eef56ae839a62d2460c781e7aba5069a0e3e2b178cdad177aac52f0e','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-17 12:38:11','2026-04-11 13:18:34','2026-04-17 12:38:11'),
(100,'App\\Models\\User',33,'auth','64e0211e78ff69a6602b110a9d86a5c821efa8ffb51a94a913280e6162d08369','[\"driver:pending\"]',NULL,NULL,'2026-04-14 19:23:55','2026-04-14 19:23:55'),
(101,'App\\Models\\User',33,'driver_auth','2fa57ba7623478135036681996484274dd0bc11bb5e2df597cfb480012aa64d4','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-14 21:17:16','2026-04-14 19:37:57','2026-04-14 21:17:16'),
(104,'App\\Models\\User',33,'driver_auth','38c427f2379193492bcf3c54046bb281a2997852f06c0cf4643bafc87196df9d','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-15 21:29:54','2026-04-15 17:43:29','2026-04-15 21:29:54'),
(105,'App\\Models\\User',31,'driver_auth','69bf040801690178cf4e3e38cc2a3af5b9f45813924f0e995e6f2e32eca37038','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-18 11:27:43','2026-04-17 13:13:39','2026-04-18 11:27:43'),
(106,'App\\Models\\User',31,'driver_auth','7fd02d70ec69c5ca3556e6e365059ce3385b6120c4075730c271de3b9e67d563','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-19 10:44:08','2026-04-18 11:35:18','2026-04-19 10:44:08'),
(107,'App\\Models\\User',31,'driver_auth','6bfdb9da0442e6790de1d1499e79e3fdfe28b96d832e95e64f2f22e587d70bf6','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-19 09:06:19','2026-04-19 09:05:31','2026-04-19 09:06:19'),
(108,'App\\Models\\User',31,'driver_auth','a73f702834641d617c0de1823dd9b4e2ca6348ac5101de5e67483ed10da7c102','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-19 10:11:58','2026-04-19 10:08:21','2026-04-19 10:11:58'),
(109,'App\\Models\\User',31,'driver_auth','460e5c31e2a4540e4742342e39c0ddf205ca4314393dbae727f399273ec18c68','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-19 12:07:16','2026-04-19 10:40:55','2026-04-19 12:07:16'),
(110,'App\\Models\\User',31,'driver_auth','3b938ac39eb561e4b88a7dc06df097b4f9d2151e230c774199a4f9f22ff60f07','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-19 12:33:20','2026-04-19 10:57:20','2026-04-19 12:33:20'),
(112,'App\\Models\\User',31,'driver_auth','3775ab081b7f6f0e50706d58f3fe254969d4e47ae02d14b1ed22df902d70bbb8','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-19 12:31:50','2026-04-19 12:10:57','2026-04-19 12:31:50'),
(113,'App\\Models\\User',31,'driver_auth','da9162dca3b554fa6744c950ad24f519948b3dc3cc30bbc5975dc6ef07d1c03c','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-23 10:19:06','2026-04-19 13:27:38','2026-04-23 10:19:06'),
(115,'App\\Models\\User',33,'driver_auth','5a259cbaf749aa6e00d5259544946af62a24883021199c4a14fcdda17383cb70','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-21 18:32:18','2026-04-20 23:42:13','2026-04-21 18:32:18'),
(118,'App\\Models\\User',31,'driver_auth','297a8f1c2d5ed75089549edc1bbe3d1cfc2cecf55e03b0dcdca2a014cc3b01ff','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-21 21:11:59','2026-04-21 19:50:22','2026-04-21 21:11:59'),
(122,'App\\Models\\User',32,'password_reset','bda64c535d64433451fed750e6b5b17548ebab1d0c0a47167b0f77ba9c43f75e','[\"driver:access\"]',NULL,NULL,'2026-04-23 19:47:09','2026-04-23 19:47:09'),
(123,'App\\Models\\User',32,'driver_auth','e27ef89bf1aa7a90e7c658e8ed01c6438653716fe6246609d9bec96ca06bf9d3','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-23 20:20:05','2026-04-23 19:47:14','2026-04-23 20:20:05'),
(129,'App\\Models\\User',31,'driver_auth','f105cb5556d046c3db7e6ac4be97f555d0efd6bc3158e1608872bb802e5b0546','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-28 17:19:09','2026-04-27 18:40:04','2026-04-28 17:19:09'),
(131,'App\\Models\\User',42,'registration','1507d5621f7e72b420f0845b316d2d14dc2d2f5f45693757dddb3de1603cc3fd','[\"driver:register\"]',NULL,'2026-04-28 06:03:24','2026-04-28 05:55:47','2026-04-28 06:03:24'),
(136,'App\\Models\\User',47,'auth','869a44dd984ff0ce72948a71aa88cc4df41dc34fa66161a21f10d4b37d8f3d9c','[\"driver:pending\"]',NULL,NULL,'2026-04-28 17:29:24','2026-04-28 17:29:24'),
(138,'App\\Models\\User',48,'auth','da9ca687854b45bb9fa20ea434ad866aafef392aa20c287f717bb0acf57d23a0','[\"driver:pending\"]',NULL,NULL,'2026-04-28 17:38:21','2026-04-28 17:38:21'),
(139,'App\\Models\\User',48,'driver_auth','40ecb6da926bf57f01190f9581676ea66109905bafb328019f0ebfe7d9f5ad59','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-28 17:39:16','2026-04-28 17:38:55','2026-04-28 17:39:16'),
(140,'App\\Models\\User',33,'driver_auth','7604786b429d4d91b396681a23e012bc7a85a345bf0ca76112c7bacdcd3ba6c3','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-28 19:59:57','2026-04-28 19:31:50','2026-04-28 19:59:57'),
(142,'App\\Models\\User',56,'registration','e8d10034ddae3f58ec634995a3a5f43367646f23d6b7ce2de33fa79395dfa25b','[\"driver:register\"]',NULL,'2026-05-06 00:07:03','2026-04-29 21:09:40','2026-05-06 00:07:03'),
(143,'App\\Models\\User',57,'registration','dd04ffab8e6f748d44f79e0df8672481cc46dd16fb06e889f8b607a0d58e5124','[\"driver:register\"]',NULL,'2026-04-30 01:43:21','2026-04-29 21:14:28','2026-04-30 01:43:21'),
(145,'App\\Models\\User',33,'driver_auth','77f818bef7b2924a19a53e748108198ebdbebc266cf482addde3905b5edf7472','[\"driver:access\",\"driver:online\"]',NULL,'2026-04-29 22:11:54','2026-04-29 21:41:12','2026-04-29 22:11:54'),
(147,'App\\Models\\User',63,'registration','82f4cc0327524e51f8b486384fc045ea7450af37baa2223374fb78a30fdcb28f','[\"driver:register\"]',NULL,'2026-05-15 07:28:30','2026-04-30 01:18:49','2026-05-15 07:28:30'),
(148,'App\\Models\\User',64,'registration','f8cd565559fef6b33e2a4ce0b862656d8a497e0e7bdc397e95defef01fb249f3','[\"driver:register\"]',NULL,'2026-04-30 20:59:53','2026-04-30 03:03:22','2026-04-30 20:59:53'),
(150,'App\\Models\\User',31,'driver_auth','a56c02b9255ca9ada36373f74bdbf76a5b779f3d64c96689f54dd61a2f16c27d','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-03 11:44:55','2026-05-03 11:43:02','2026-05-03 11:44:55'),
(152,'App\\Models\\User',69,'registration','fb507d180c0ed36076140acbe428e2ebbc020b2e6f1b9a7632577ead3dcaaf05','[\"driver:register\"]',NULL,'2026-05-05 01:38:02','2026-05-05 01:37:35','2026-05-05 01:38:02'),
(155,'App\\Models\\User',70,'registration','db580d3bf3cd5c5e000498413d3ba69478d28e5a5fc378f9cf4b06ad8c1aaeb1','[\"driver:register\"]',NULL,'2026-05-06 00:04:29','2026-05-05 22:33:33','2026-05-06 00:04:29'),
(159,'App\\Models\\User',33,'driver_auth','cd704a7b96b20a643ea9e70c76773941c657b764185c25a6d7305827c2ccf391','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-06 21:21:42','2026-05-06 21:21:21','2026-05-06 21:21:42'),
(165,'App\\Models\\User',74,'auth','3424578939e839664124ec54c853bc5a20341bb18bec84ebe980c8c312931e94','[\"driver:pending\"]',NULL,NULL,'2026-05-06 22:35:52','2026-05-06 22:35:52'),
(166,'App\\Models\\User',74,'driver_auth','bbd6f5d9e4f5da72862abeee36f41f6d24a620d9964c8079e7b640bc99a39030','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-06 23:38:58','2026-05-06 22:38:34','2026-05-06 23:38:58'),
(167,'App\\Models\\User',72,'auth','fbc691f0c3daa0f91925a6457f8949ede1e13fcb27f684ba0b99a76a8286568d','[\"driver:pending\"]',NULL,'2026-05-08 22:15:26','2026-05-06 22:41:59','2026-05-08 22:15:26'),
(170,'App\\Models\\User',77,'registration','ced9a7e5755ed5d0141a9a1cafe25fe6b4098645ad19d7ff0b4445a9f46ccda7','[\"driver:register\"]',NULL,'2026-05-19 19:21:19','2026-05-08 01:31:49','2026-05-19 19:21:19'),
(172,'App\\Models\\User',78,'auth','9cc99e32421495669cb0f10d3e60f3663402a22c54718de0ce2038cc7771d73c','[\"driver:pending\"]',NULL,NULL,'2026-05-08 02:01:47','2026-05-08 02:01:47'),
(173,'App\\Models\\User',78,'driver_auth','b311c81ab692743832d9530a93f208fae58a5be44f0af9e78c1a364dbb2f8c62','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-18 21:00:38','2026-05-08 02:05:20','2026-05-18 21:00:38'),
(174,'App\\Models\\User',79,'registration','797283dfcd3c829c020170a1bf9c67610296e56a549a29c03ea63d069788b892','[\"driver:register\"]',NULL,'2026-05-09 21:10:02','2026-05-08 02:53:09','2026-05-09 21:10:02'),
(175,'App\\Models\\User',80,'registration','c5cc9bdf581725dae06df37ac14bca1105a9d65316609964b201999a127f21b1','[\"driver:register\"]',NULL,'2026-05-14 19:43:30','2026-05-08 05:54:12','2026-05-14 19:43:30'),
(176,'App\\Models\\User',81,'registration','0332a4e8c6b9b47ca4c2415b22d4ae425f5e03ae4ca56e684e06efedbc48bc38','[\"driver:register\"]',NULL,NULL,'2026-05-08 22:16:11','2026-05-08 22:16:11'),
(177,'App\\Models\\User',82,'registration','d7fbd9cb958ca30872cda076f0f293d0fdf40f8481e087f1c522b942006d34e6','[\"driver:register\"]',NULL,'2026-05-13 07:36:39','2026-05-09 04:43:56','2026-05-13 07:36:39'),
(179,'App\\Models\\User',83,'auth','31d3c0ad81c57637b03343b218a80aad31c30cd6835a22525c414295c48d3751','[\"driver:pending\"]',NULL,NULL,'2026-05-09 09:01:25','2026-05-09 09:01:25'),
(180,'App\\Models\\User',82,'driver_auth','6399578266345df3bd67b321cfbfe5b7fbe244a2f4c9cdbb0b5fb69ead43106e','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-15 03:51:36','2026-05-14 08:45:25','2026-05-15 03:51:36'),
(184,'App\\Models\\User',84,'registration','cc91c45f97f758ee96959ecc379871ea343746b9cd8e1b434b231312f20594d0','[\"driver:register\"]',NULL,NULL,'2026-05-17 20:06:39','2026-05-17 20:06:39'),
(185,'App\\Models\\User',31,'driver_auth','cadcdba4b374035c67aefb4ee941c606b862bbcab741a4867e1e0a3768e926c4','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-17 21:40:49','2026-05-17 21:39:50','2026-05-17 21:40:49'),
(194,'App\\Models\\User',87,'registration','0ef08036d0af34fe1723ed24e6cbb32123db01333ea351da5c5c3276ff78f8de','[\"driver:register\"]',NULL,'2026-05-19 01:38:10','2026-05-18 20:57:34','2026-05-19 01:38:10'),
(195,'App\\Models\\User',88,'registration','5791964cf3fc002837ca5ac4b3e42a3d367c977d6e68f6f097adc76cf1b11bf1','[\"driver:register\"]',NULL,'2026-05-18 21:17:27','2026-05-18 21:06:55','2026-05-18 21:17:27'),
(196,'App\\Models\\User',88,'driver_auth','0b64476831e039babee16bc7bb2574dd0275b11e0a9fd2e0a4d9afa613993643','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-19 02:36:38','2026-05-18 21:17:42','2026-05-19 02:36:38'),
(198,'App\\Models\\User',85,'driver_auth','fd6759459ef747aa6968d8a7ba66716a34f7ac96e41252c208b387017a517701','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-19 18:48:54','2026-05-18 21:50:24','2026-05-19 18:48:54'),
(199,'App\\Models\\User',82,'driver_auth','b0c4144681cc3e6c2a4c17485e19c039d691be4cc80c25850c2b3163a0a72bed','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-19 02:36:01','2026-05-19 00:41:54','2026-05-19 02:36:01'),
(200,'App\\Models\\User',50,'password_reset','6461f62e710576815462a3f1c16b57a52ccdfc5ef21d827889ba217084bfca9e','[\"driver:access\"]',NULL,'2026-05-19 01:10:56','2026-05-19 01:06:16','2026-05-19 01:10:56'),
(203,'App\\Models\\User',82,'driver_auth','1d54db1fb37253c029f9f9a6c0221c89c4ad2aa6d1313ba07540ffb559edf534','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-19 02:49:15','2026-05-19 02:37:53','2026-05-19 02:49:15'),
(204,'App\\Models\\User',90,'registration','be186791b7ac4dd5f9a4d6157f3171b7226607db7e8dea69f78db2bb350d68a5','[\"driver:register\"]',NULL,'2026-05-19 02:43:23','2026-05-19 02:39:27','2026-05-19 02:43:23'),
(206,'App\\Models\\User',91,'auth','f215c9489b99b4b08c850b61b616e45e21b6fc4b5c66a1e305485b1eb066f345','[\"driver:pending\"]',NULL,NULL,'2026-05-19 02:48:19','2026-05-19 02:48:19'),
(207,'App\\Models\\User',91,'driver_auth','aee1e472cc0ff6c1191e64924681db19f324953ec934f6b8616099de1a7099f2','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-22 22:13:43','2026-05-19 02:49:10','2026-05-22 22:13:43'),
(208,'App\\Models\\User',92,'registration','adfcebacf8a7849aae76faecb0d1d0a997f25d07fbe1c4ce5c2309b9f04f9f8e','[\"driver:register\"]',NULL,'2026-05-19 02:56:57','2026-05-19 02:55:57','2026-05-19 02:56:57'),
(209,'App\\Models\\User',93,'registration','1e05928305f5bf1610d5c7dc72f2a3b0b03d449211f80bbcde93db4e17ef9fca','[\"driver:register\"]',NULL,'2026-05-19 03:10:26','2026-05-19 03:06:05','2026-05-19 03:10:26'),
(210,'App\\Models\\User',93,'driver_auth','65bdf4c310f2017714647aab6ac661f332791d8b769cf2e95cc17b66c2e53c4e','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-25 06:41:46','2026-05-19 03:11:38','2026-05-25 06:41:46'),
(212,'App\\Models\\User',94,'auth','68d81c423e15a6b3e1bed49108957397b0ed421d8d7cae9380e3640b6a39c643','[\"driver:pending\"]',NULL,NULL,'2026-05-19 04:54:33','2026-05-19 04:54:33'),
(213,'App\\Models\\User',94,'driver_auth','03e3463bbca998bf6629a72e39c4b1eb083dc1fd8e2612e5c7ef10a563a6a931','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-20 19:03:10','2026-05-19 04:55:12','2026-05-20 19:03:10'),
(214,'App\\Models\\User',95,'registration','de200f1a047e144921e3c0b89849b1dda2899f7db73e3d05680ab0f08decb2fc','[\"driver:register\"]',NULL,'2026-05-26 03:52:35','2026-05-19 05:21:47','2026-05-26 03:52:35'),
(215,'App\\Models\\User',76,'password_reset','f688cdae1bd0bacd2bac15ecb71f6b582bb0137be137e4b4092e5723dbeb71ad','[\"driver:access\"]',NULL,NULL,'2026-05-19 07:23:52','2026-05-19 07:23:52'),
(216,'App\\Models\\User',86,'password_reset','92abedfe828beebb9d4110dc3c0fd2613a0f29c7dcc982fdac48788ef26af180','[\"driver:access\"]',NULL,NULL,'2026-05-19 19:32:54','2026-05-19 19:32:54'),
(217,'App\\Models\\User',96,'registration','e62d6776dde7bfbea3bc233aa8abfe1ec5dbca138a075330561069a48bdc31ed','[\"driver:register\"]',NULL,NULL,'2026-05-19 19:38:11','2026-05-19 19:38:11'),
(219,'App\\Models\\User',98,'auth','8b9604e504e391b6e56a666bf41dffd57737ee92eef33bde078e7c458d7d9980','[\"driver:pending\"]',NULL,NULL,'2026-05-19 19:49:19','2026-05-19 19:49:19'),
(220,'App\\Models\\User',98,'driver_auth','b8188ae9586512bf1dfe79ab3bf5147406c8e4b59557e58af3797a4de6459bef','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-21 05:02:09','2026-05-19 19:50:06','2026-05-21 05:02:09'),
(222,'App\\Models\\User',100,'auth','5471643571099284ea4906eccb9168ccd0aebf9b771b08aad145d5be474737f4','[\"driver:pending\"]',NULL,NULL,'2026-05-19 20:00:38','2026-05-19 20:00:38'),
(223,'App\\Models\\User',100,'driver_auth','c51e80bc17647a26e8b6ea8679ecd0d1bc3e10f76bec336659eff598abc94f45','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-26 20:45:50','2026-05-19 20:01:11','2026-05-26 20:45:50'),
(224,'App\\Models\\User',101,'registration','da6d8c5d6fb918bdc3cac9a27ae1f10330d200802880263e338dc17447d41a41','[\"driver:register\"]',NULL,'2026-05-19 20:07:11','2026-05-19 20:06:19','2026-05-19 20:07:11'),
(226,'App\\Models\\User',102,'auth','c8818f7bfab69e28a3b8c30955a92f11a1a047382bdd3725b5d696eeac59a5bc','[\"driver:pending\"]',NULL,NULL,'2026-05-19 20:13:25','2026-05-19 20:13:25'),
(227,'App\\Models\\User',102,'driver_auth','6bf8ba062acccec228282bce0b1696c7879fc40d09bd7e92982e19ba555d8c61','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-26 05:38:52','2026-05-19 20:14:08','2026-05-26 05:38:52'),
(228,'App\\Models\\User',94,'driver_auth','a2bddc64322f0dfbbc4273d987371b41d361976b0ddcb67314f269c803776736','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-21 03:58:15','2026-05-20 19:29:00','2026-05-21 03:58:15'),
(229,'App\\Models\\User',103,'registration','5af8064676d2433d4fd673cde2b7dce6c2f3615d825824beeace13c23e82b74c','[\"driver:register\"]',NULL,'2026-05-20 19:40:10','2026-05-20 19:30:07','2026-05-20 19:40:10'),
(230,'App\\Models\\User',103,'driver_auth','dcbf8f20e848ae220a38423abee2b4fd8493b3f6e3d2abdce24c555e9ee66ce4','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-20 19:47:44','2026-05-20 19:40:43','2026-05-20 19:47:44'),
(231,'App\\Models\\User',104,'registration','14541dcbb7cce983c20faa0a144b75fcf9e6dacc5806d637145e98410d690604','[\"driver:register\"]',NULL,'2026-05-20 20:34:55','2026-05-20 19:45:44','2026-05-20 20:34:55'),
(233,'App\\Models\\User',105,'auth','fba2ba01d6e781c49900029ea6c1c84d64baa87f8e4abe1e7d9c1cb34649c9ab','[\"driver:pending\"]',NULL,NULL,'2026-05-20 20:47:20','2026-05-20 20:47:20'),
(236,'App\\Models\\User',106,'auth','c0b4ee962435aa6d9bb02359648666270bf1f486f48c3bb72b4b164c458f1421','[\"driver:pending\"]',NULL,NULL,'2026-05-20 20:52:45','2026-05-20 20:52:45'),
(237,'App\\Models\\User',107,'registration','7029bde5337200ab7c31013c136e00b5d8c124035c1416579f75d8caa87d3721','[\"driver:register\"]',NULL,'2026-05-20 20:53:33','2026-05-20 20:53:18','2026-05-20 20:53:33'),
(238,'App\\Models\\User',106,'driver_auth','310de423fc852cc949af7eb3a9dad6658ab7d0029949b928b8d41b470a4a8227','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-26 21:57:09','2026-05-20 20:53:24','2026-05-26 21:57:09'),
(239,'App\\Models\\User',105,'driver_auth','e144d4dd1a717618866cd9568f59ce40dc17f50a423643aedddd55909ad8ac28','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-23 07:43:14','2026-05-20 21:03:07','2026-05-23 07:43:14'),
(241,'App\\Models\\User',108,'auth','65e8317b4ba643c9749e0cb4f64e174338ab1189eb6dd62846205b68f0ecd455','[\"driver:pending\"]',NULL,NULL,'2026-05-20 21:20:14','2026-05-20 21:20:14'),
(243,'App\\Models\\User',109,'auth','808b4940ffff7a2680536720e22fec1da28625e88a9aa92ecb02db9580df6447','[\"driver:pending\"]',NULL,NULL,'2026-05-20 21:24:56','2026-05-20 21:24:56'),
(244,'App\\Models\\User',109,'driver_auth','2e4131c10c2d8ffecd0cfc8112f3d3ec8b82a0ec317dcacd9d57f495c9958438','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-20 23:56:19','2026-05-20 21:34:49','2026-05-20 23:56:19'),
(245,'App\\Models\\User',108,'driver_auth','217c1c626990753e490f9301b7a94dcee3dab47649ccd4a2e4d0f745e5a7ec87','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-22 08:21:07','2026-05-20 21:38:10','2026-05-22 08:21:07'),
(246,'App\\Models\\User',110,'registration','8c4b91f032c953914403802efe35ec67a46ecb868b7c076e0d3ea2b8bbfcff9e','[\"driver:register\"]',NULL,'2026-05-21 20:20:11','2026-05-21 00:52:09','2026-05-21 20:20:11'),
(247,'App\\Models\\User',111,'registration','292c3790bff85f45c18a4832efa11ecaf84aab9933514e9fdc909e71fbc0741b','[\"driver:register\"]',NULL,'2026-05-27 06:25:46','2026-05-21 03:01:43','2026-05-27 06:25:46'),
(248,'App\\Models\\User',94,'driver_auth','150aafcb96cde05eacd6ffa6f54a7ec32eea4ef2e58ab945035b3d9d08ef02f6','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-21 20:57:59','2026-05-21 15:55:48','2026-05-21 20:57:59'),
(250,'App\\Models\\User',112,'auth','76cd485f0faa4185bbb26e438c7babfc087b71b2cc59f07fb9373774604be5fc','[\"driver:pending\"]',NULL,NULL,'2026-05-21 19:50:31','2026-05-21 19:50:31'),
(251,'App\\Models\\User',112,'driver_auth','4035365c1d6f68a793742f2c90bbb753b2ee10503d68157aa7f1832525a69a2b','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-22 07:54:25','2026-05-21 19:51:41','2026-05-22 07:54:25'),
(252,'App\\Models\\User',113,'registration','96b5d4d6835fe33d542298a018c1ca981887f766e3a504f7c766382463f7d88d','[\"driver:register\"]',NULL,'2026-05-21 20:23:34','2026-05-21 20:21:51','2026-05-21 20:23:34'),
(253,'App\\Models\\User',113,'driver_auth','c34857d2c9d0e446068812084fba8c7f4581d64da964ba2ed5f287681b87ab4e','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-26 04:26:26','2026-05-21 20:24:21','2026-05-26 04:26:26'),
(254,'App\\Models\\User',98,'driver_auth','c7dfafc46ddb6afb1093e2227d56d6186e875efa906061cf06282882c5ba7fa5','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-26 23:05:50','2026-05-21 21:02:17','2026-05-26 23:05:50'),
(256,'App\\Models\\User',117,'auth','4bebe9fdbacc15866612f3adb864c23d1b1587513a78df411764438fc85dffbd','[\"driver:pending\"]',NULL,NULL,'2026-05-22 04:52:07','2026-05-22 04:52:07'),
(257,'App\\Models\\User',117,'driver_auth','8d91d163d41da6ecbdd5147c8ff6dbcd4c0943798dcf1602d596323debb663bf','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-22 21:15:45','2026-05-22 04:53:58','2026-05-22 21:15:45'),
(259,'App\\Models\\User',108,'driver_auth','5a3c2ab2d007fcb45af3a649b114578bd5272c101b9289725ae8d5760d249053','[\"driver:access\",\"driver:online\"]',NULL,NULL,'2026-05-22 16:48:32','2026-05-22 16:48:32'),
(260,'App\\Models\\User',108,'driver_auth','80eb8aeedc41b994d2e2d3828ba2a056c4ff5c21954755ecae4df4f3a0b2881d','[\"driver:access\",\"driver:online\"]',NULL,NULL,'2026-05-22 16:52:17','2026-05-22 16:52:17'),
(265,'App\\Models\\User',120,'auth','88af901ad6bbf4401d5a64c48a791f02be103164a60b0ddc2472fc5bfa3f32b5','[\"driver:pending\"]',NULL,NULL,'2026-05-22 20:58:41','2026-05-22 20:58:41'),
(266,'App\\Models\\User',121,'registration','737cc5904a88dc0f05d8c9d03d2e4a511ac6e4243694d6a1f63c3ed839c1bf0c','[\"driver:register\"]',NULL,'2026-05-26 14:34:08','2026-05-22 21:08:58','2026-05-26 14:34:08'),
(267,'App\\Models\\User',108,'driver_auth','581139a8ac5258bd6215755056609d7ac1eb4db3e48894fa5e25ebd144888fe2','[\"driver:access\",\"driver:online\"]',NULL,'2026-05-26 15:25:44','2026-05-25 15:17:49','2026-05-26 15:25:44');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio_items`
--

DROP TABLE IF EXISTS `portfolio_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(191) NOT NULL,
  `project_link` varchar(191) DEFAULT NULL,
  `skills` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio_items`
--

LOCK TABLES `portfolio_items` WRITE;
/*!40000 ALTER TABLE `portfolio_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `portfolio_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pricing_quotes`
--

DROP TABLE IF EXISTS `pricing_quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pricing_quotes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `trip_id` bigint(20) unsigned NOT NULL,
  `distance` double(8,2) DEFAULT NULL,
  `per_minute_rate` decimal(10,2) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `base_fare` decimal(10,2) DEFAULT 0.00,
  `total_fare` double(8,2) NOT NULL,
  `applied_rules` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `inputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `distance_km` decimal(8,2) DEFAULT 5.00,
  `duration_minutes` int(11) DEFAULT 10,
  `per_km_rate` decimal(8,2) DEFAULT 15.00,
  `service_fee` decimal(8,2) DEFAULT 0.00,
  `currency` varchar(3) NOT NULL DEFAULT 'Bs',
  `is_fallback` tinyint(1) NOT NULL DEFAULT 0,
  `calculated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pricing_quotes_trip_id_foreign` (`trip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pricing_quotes`
--

LOCK TABLES `pricing_quotes` WRITE;
/*!40000 ALTER TABLE `pricing_quotes` DISABLE KEYS */;
INSERT INTO `pricing_quotes` VALUES
(1,17,2.23,1.20,13,15.00,15.00,NULL,NULL,'2026-03-24 20:48:29','2026-03-24 20:48:29',5.00,10,15.00,0.00,'Bs',0,NULL),
(2,1,5.00,1.20,13,15.00,15.00,NULL,NULL,'2026-03-27 00:20:39','2026-03-27 00:20:39',5.00,10,15.00,0.00,'Bs',0,NULL),
(3,2,6.48,1.20,16,15.00,18.67,NULL,NULL,'2026-03-27 19:21:26','2026-03-27 19:21:26',5.00,10,15.00,0.00,'Bs',0,NULL),
(4,3,3.70,1.20,13,7.00,15.00,NULL,NULL,'2026-04-01 19:55:28','2026-04-01 19:55:28',5.00,10,15.00,0.00,'Bs',0,NULL),
(5,4,0.73,1.20,13,7.00,15.00,NULL,NULL,'2026-04-02 20:19:05','2026-04-02 20:19:05',5.00,10,15.00,0.00,'Bs',0,NULL),
(6,7,2.03,1.20,13,7.00,15.00,NULL,NULL,'2026-04-09 19:06:38','2026-04-09 19:06:38',5.00,10,15.00,0.00,'Bs',0,NULL),
(7,9,2.56,1.20,13,7.00,15.00,NULL,NULL,'2026-04-09 19:09:50','2026-04-09 19:09:50',5.00,10,15.00,0.00,'Bs',0,NULL),
(8,10,6.99,1.20,17,7.00,20.12,NULL,NULL,'2026-04-14 21:00:14','2026-04-14 21:00:14',5.00,10,15.00,0.00,'Bs',0,NULL),
(9,11,5.00,1.20,13,7.00,15.00,NULL,NULL,'2026-04-14 21:24:23','2026-04-14 21:24:23',5.00,10,15.00,0.00,'Bs',0,NULL),
(10,12,2.97,1.20,13,7.00,15.00,NULL,NULL,'2026-04-14 23:11:03','2026-04-14 23:11:03',5.00,10,15.00,0.00,'Bs',0,NULL),
(11,13,1.68,1.20,13,7.00,15.00,NULL,NULL,'2026-04-15 02:38:33','2026-04-15 02:38:33',5.00,10,15.00,0.00,'Bs',0,NULL),
(12,14,2.69,1.20,13,7.00,15.00,NULL,NULL,'2026-04-15 17:24:54','2026-04-15 17:24:54',5.00,10,15.00,0.00,'Bs',0,NULL),
(13,15,31.32,1.20,75,7.00,90.20,NULL,NULL,'2026-04-15 17:52:22','2026-04-15 17:52:22',5.00,10,15.00,0.00,'Bs',0,NULL),
(14,16,8.18,1.20,20,7.00,23.55,NULL,NULL,'2026-04-15 18:06:39','2026-04-15 18:06:39',5.00,10,15.00,0.00,'Bs',0,NULL),
(15,17,2.45,1.20,13,7.00,15.00,NULL,NULL,'2026-04-15 20:18:20','2026-04-15 20:18:20',5.00,10,15.00,0.00,'Bs',0,NULL),
(16,18,3.42,1.20,13,7.00,15.00,NULL,NULL,'2026-04-15 20:48:38','2026-04-15 20:48:38',5.00,10,15.00,0.00,'Bs',0,NULL),
(17,19,1.00,1.20,13,15.00,15.00,NULL,NULL,'2026-04-15 21:15:03','2026-04-15 21:15:03',5.00,10,15.00,0.00,'Bs',0,NULL),
(18,20,1.33,1.20,13,7.00,15.00,NULL,NULL,'2026-04-15 22:19:11','2026-04-15 22:19:11',5.00,10,15.00,0.00,'Bs',0,NULL),
(19,56,1.00,1.20,13,7.00,15.00,NULL,NULL,'2026-04-20 23:44:14','2026-04-20 23:44:14',5.00,10,15.00,0.00,'Bs',0,NULL),
(20,57,1.00,1.20,13,7.00,15.00,NULL,NULL,'2026-04-20 23:48:13','2026-04-20 23:48:13',5.00,10,15.00,0.00,'Bs',0,NULL),
(21,58,1.00,1.20,13,7.00,15.00,NULL,NULL,'2026-04-21 17:56:54','2026-04-21 17:56:54',5.00,10,15.00,0.00,'Bs',0,NULL),
(22,59,2.99,1.20,13,7.00,15.00,NULL,NULL,'2026-04-21 18:05:40','2026-04-21 18:05:40',5.00,10,15.00,0.00,'Bs',0,NULL),
(23,60,2.23,1.20,13,7.00,15.00,NULL,NULL,'2026-04-21 18:28:28','2026-04-21 18:28:28',5.00,10,15.00,0.00,'Bs',0,NULL),
(24,61,8.09,1.20,19,7.00,23.30,NULL,NULL,'2026-04-21 18:52:01','2026-04-21 18:52:01',5.00,10,15.00,0.00,'Bs',0,NULL),
(25,62,1.21,1.20,13,7.00,15.00,NULL,NULL,'2026-04-21 18:55:57','2026-04-21 18:55:57',5.00,10,15.00,0.00,'Bs',0,NULL),
(26,63,12.10,1.20,29,7.00,34.86,NULL,NULL,'2026-04-21 19:01:51','2026-04-21 19:01:51',5.00,10,15.00,0.00,'Bs',0,NULL),
(27,64,2.36,1.20,13,7.00,15.00,NULL,NULL,'2026-04-21 19:18:56','2026-04-21 19:18:56',5.00,10,15.00,0.00,'Bs',0,NULL),
(28,65,7.27,1.20,17,7.00,20.94,NULL,NULL,'2026-04-21 20:29:58','2026-04-21 20:29:58',5.00,10,15.00,0.00,'Bs',0,NULL),
(29,66,3.32,1.20,13,7.00,15.00,NULL,NULL,'2026-04-21 20:37:33','2026-04-21 20:37:33',5.00,10,15.00,0.00,'Bs',0,NULL),
(30,67,3.05,1.20,13,7.00,15.00,NULL,NULL,'2026-04-21 20:38:35','2026-04-21 20:38:35',5.00,10,15.00,0.00,'Bs',0,NULL),
(31,68,10.23,1.20,25,7.00,29.46,NULL,NULL,'2026-04-21 20:42:39','2026-04-21 20:42:39',5.00,10,15.00,0.00,'Bs',0,NULL),
(32,70,12.80,1.20,31,7.00,36.87,NULL,NULL,'2026-04-23 19:48:24','2026-04-23 19:48:24',5.00,10,15.00,0.00,'Bs',0,NULL),
(33,71,22.49,1.20,54,7.00,64.77,NULL,NULL,'2026-04-23 19:51:14','2026-04-23 19:51:14',5.00,10,15.00,0.00,'Bs',0,NULL),
(34,72,7.50,1.20,18,7.00,21.59,NULL,NULL,'2026-04-23 19:55:04','2026-04-23 19:55:04',5.00,10,15.00,0.00,'Bs',0,NULL),
(35,73,6.53,1.20,16,7.00,18.79,NULL,NULL,'2026-04-23 19:57:22','2026-04-23 19:57:22',5.00,10,15.00,0.00,'Bs',0,NULL),
(36,74,7.14,1.20,17,7.00,20.57,NULL,NULL,'2026-04-23 19:59:33','2026-04-23 19:59:33',5.00,10,15.00,0.00,'Bs',0,NULL),
(37,75,1.38,1.20,3,7.00,7.00,NULL,NULL,'2026-04-23 20:13:34','2026-04-23 20:13:34',5.00,10,15.00,0.00,'Bs',0,NULL),
(38,76,4.82,1.20,12,7.00,13.88,NULL,NULL,'2026-04-23 20:15:21','2026-04-23 20:15:21',5.00,10,15.00,0.00,'Bs',0,NULL),
(39,77,0.98,1.20,2,7.00,7.00,NULL,NULL,'2026-04-27 18:09:37','2026-04-27 18:09:37',5.00,10,15.00,0.00,'Bs',0,NULL),
(40,78,1.10,1.20,3,7.00,7.00,NULL,NULL,'2026-04-27 20:53:01','2026-04-27 20:53:01',5.00,10,15.00,0.00,'Bs',0,NULL),
(41,79,1.23,1.20,3,7.00,7.00,NULL,NULL,'2026-04-27 20:55:31','2026-04-27 20:55:31',5.00,10,15.00,0.00,'Bs',0,NULL),
(42,80,4.34,1.20,10,7.00,12.51,NULL,NULL,'2026-04-28 00:50:04','2026-04-28 00:50:04',5.00,10,15.00,0.00,'Bs',0,NULL),
(43,81,1.55,1.20,4,7.00,7.00,NULL,NULL,'2026-04-28 01:48:01','2026-04-28 01:48:01',5.00,10,15.00,0.00,'Bs',0,NULL),
(44,82,2.90,1.20,7,7.00,8.35,NULL,NULL,'2026-04-28 01:50:14','2026-04-28 01:50:14',5.00,10,15.00,0.00,'Bs',0,NULL),
(45,83,2.56,1.20,6,7.00,7.39,NULL,NULL,'2026-04-28 01:55:10','2026-04-28 01:55:10',5.00,10,15.00,0.00,'Bs',0,NULL),
(46,84,2.79,1.20,7,7.00,8.04,NULL,NULL,'2026-04-28 02:05:13','2026-04-28 02:05:13',5.00,10,15.00,0.00,'Bs',0,NULL),
(47,86,3.47,1.20,8,7.00,10.00,NULL,NULL,'2026-04-28 02:15:49','2026-04-28 02:15:49',5.00,10,15.00,0.00,'Bs',0,NULL),
(48,87,1.72,1.20,4,7.00,7.00,NULL,NULL,'2026-04-28 02:33:54','2026-04-28 02:33:54',5.00,10,15.00,0.00,'Bs',0,NULL),
(49,88,2.11,1.20,5,7.00,7.00,NULL,NULL,'2026-04-28 02:40:41','2026-04-28 02:40:41',5.00,10,15.00,0.00,'Bs',0,NULL),
(50,89,0.40,1.20,1,7.00,7.00,NULL,NULL,'2026-04-28 08:43:17','2026-04-28 08:43:17',5.00,10,15.00,0.00,'Bs',0,NULL),
(51,90,6.25,1.20,15,7.00,18.00,NULL,NULL,'2026-04-28 16:59:49','2026-04-28 16:59:49',5.00,10,15.00,0.00,'Bs',0,NULL),
(52,91,1.77,1.20,4,7.00,7.00,NULL,NULL,'2026-04-28 19:35:30','2026-04-28 19:35:30',5.00,10,15.00,0.00,'Bs',0,NULL),
(53,92,1.47,1.20,4,7.00,7.00,NULL,NULL,'2026-04-28 22:34:56','2026-04-28 22:34:56',5.00,10,15.00,0.00,'Bs',0,NULL),
(54,93,1.56,1.20,4,7.00,7.00,NULL,NULL,'2026-04-29 06:23:41','2026-04-29 06:23:41',5.00,10,15.00,0.00,'Bs',0,NULL),
(55,95,1.36,1.20,3,7.00,7.00,NULL,NULL,'2026-04-29 20:30:12','2026-04-29 20:30:12',5.00,10,15.00,0.00,'Bs',0,NULL),
(56,97,7.02,1.20,17,7.00,20.23,NULL,NULL,'2026-04-29 21:47:02','2026-04-29 21:47:02',5.00,10,15.00,0.00,'Bs',0,NULL),
(57,98,7.54,1.20,18,7.00,21.71,NULL,NULL,'2026-04-29 22:16:23','2026-04-29 22:16:23',5.00,10,15.00,0.00,'Bs',0,NULL),
(58,99,8.05,1.20,19,7.00,23.17,NULL,NULL,'2026-04-29 22:18:05','2026-04-29 22:18:05',5.00,10,15.00,0.00,'Bs',0,NULL),
(59,100,1.43,1.20,3,7.00,7.00,NULL,NULL,'2026-04-29 22:35:45','2026-04-29 22:35:45',5.00,10,15.00,0.00,'Bs',0,NULL),
(60,102,0.37,1.20,1,7.00,7.00,NULL,NULL,'2026-04-29 22:43:13','2026-04-29 22:43:13',5.00,10,15.00,0.00,'Bs',0,NULL),
(61,101,3.70,1.20,9,7.00,10.67,NULL,NULL,'2026-04-29 22:50:02','2026-04-29 22:50:02',5.00,10,15.00,0.00,'Bs',0,NULL),
(62,103,2.53,1.20,6,7.00,7.29,NULL,NULL,'2026-04-29 23:56:16','2026-04-29 23:56:16',5.00,10,15.00,0.00,'Bs',0,NULL),
(63,104,2.56,1.20,6,7.00,7.38,NULL,NULL,'2026-04-30 00:09:13','2026-04-30 00:09:13',5.00,10,15.00,0.00,'Bs',0,NULL),
(64,105,2.02,1.20,5,7.00,7.00,NULL,NULL,'2026-04-30 00:17:22','2026-04-30 00:17:22',5.00,10,15.00,0.00,'Bs',0,NULL),
(65,106,3.82,1.20,9,7.00,11.01,NULL,NULL,'2026-04-30 00:37:10','2026-04-30 00:37:10',5.00,10,15.00,0.00,'Bs',0,NULL),
(66,107,1.45,1.20,3,7.00,7.00,NULL,NULL,'2026-04-30 01:28:02','2026-04-30 01:28:02',5.00,10,15.00,0.00,'Bs',0,NULL),
(67,108,9.64,1.20,23,7.00,27.76,NULL,NULL,'2026-04-30 01:31:27','2026-04-30 01:31:27',5.00,10,15.00,0.00,'Bs',0,NULL),
(68,109,6.17,1.20,15,7.00,17.76,NULL,NULL,'2026-04-30 01:34:55','2026-04-30 01:34:55',5.00,10,15.00,0.00,'Bs',0,NULL),
(69,110,3.21,1.20,8,7.00,9.23,NULL,NULL,'2026-04-30 01:41:40','2026-04-30 01:41:40',5.00,10,15.00,0.00,'Bs',0,NULL),
(70,111,10.82,1.20,26,7.00,31.15,NULL,NULL,'2026-04-30 01:42:20','2026-04-30 01:42:20',5.00,10,15.00,0.00,'Bs',0,NULL),
(71,113,6.00,1.20,14,7.00,17.29,NULL,NULL,'2026-04-30 02:29:35','2026-04-30 02:29:35',5.00,10,15.00,0.00,'Bs',0,NULL),
(72,114,5.03,1.20,12,7.00,14.47,NULL,NULL,'2026-04-30 02:41:32','2026-04-30 02:41:32',5.00,10,15.00,0.00,'Bs',0,NULL),
(73,115,6.73,1.20,16,7.00,19.37,NULL,NULL,'2026-04-30 02:57:29','2026-04-30 02:57:29',5.00,10,15.00,0.00,'Bs',0,NULL),
(74,116,4.84,1.20,12,7.00,13.94,NULL,NULL,'2026-04-30 03:29:52','2026-04-30 03:29:52',5.00,10,15.00,0.00,'Bs',0,NULL),
(75,117,4.39,1.20,11,7.00,12.65,NULL,NULL,'2026-04-30 16:04:19','2026-04-30 16:04:19',5.00,10,15.00,0.00,'Bs',0,NULL),
(76,118,7.00,1.20,17,7.00,20.15,NULL,NULL,'2026-04-30 20:50:45','2026-04-30 20:50:45',5.00,10,15.00,0.00,'Bs',0,NULL),
(77,119,2.92,1.20,7,7.00,8.40,NULL,NULL,'2026-04-30 22:22:32','2026-04-30 22:22:32',5.00,10,15.00,0.00,'Bs',0,NULL),
(78,120,3.95,1.20,9,7.00,11.38,NULL,NULL,'2026-04-30 22:31:31','2026-04-30 22:31:31',5.00,10,15.00,0.00,'Bs',0,NULL),
(79,121,1.49,1.20,4,7.00,7.00,NULL,NULL,'2026-05-04 08:17:02','2026-05-04 08:17:02',5.00,10,15.00,0.00,'Bs',0,NULL),
(80,122,4.05,1.20,10,7.00,11.66,NULL,NULL,'2026-05-04 21:01:17','2026-05-04 21:01:17',5.00,10,15.00,0.00,'Bs',0,NULL),
(81,123,4.88,1.20,12,7.00,14.05,NULL,NULL,'2026-05-04 21:05:23','2026-05-04 21:05:23',5.00,10,15.00,0.00,'Bs',0,NULL),
(82,124,12.35,1.20,30,7.00,35.56,NULL,NULL,'2026-05-05 00:17:42','2026-05-05 00:17:42',5.00,10,15.00,0.00,'Bs',0,NULL),
(83,125,11.66,1.20,28,7.00,33.58,NULL,NULL,'2026-05-05 00:43:35','2026-05-05 00:43:35',5.00,10,15.00,0.00,'Bs',0,NULL),
(84,126,4.66,1.20,11,7.00,13.43,NULL,NULL,'2026-05-05 00:46:00','2026-05-05 00:46:00',5.00,10,15.00,0.00,'Bs',0,NULL),
(85,128,8.38,1.20,20,7.00,24.15,NULL,NULL,'2026-05-05 04:23:18','2026-05-05 04:23:18',5.00,10,15.00,0.00,'Bs',0,NULL),
(86,127,2.54,1.20,6,7.00,7.33,NULL,NULL,'2026-05-05 04:45:00','2026-05-05 04:45:00',5.00,10,15.00,0.00,'Bs',0,NULL),
(87,129,2.09,1.20,5,7.00,7.00,NULL,NULL,'2026-05-05 05:14:26','2026-05-05 05:14:26',5.00,10,15.00,0.00,'Bs',0,NULL),
(88,132,7.96,1.20,19,7.00,22.91,NULL,NULL,'2026-05-05 21:16:09','2026-05-05 21:16:09',5.00,10,15.00,0.00,'Bs',0,NULL),
(89,133,2.62,1.20,6,7.00,7.56,NULL,NULL,'2026-05-05 21:18:37','2026-05-05 21:18:37',5.00,10,15.00,0.00,'Bs',0,NULL),
(90,134,4.51,1.20,11,7.00,13.00,NULL,NULL,'2026-05-05 21:19:58','2026-05-05 21:19:58',5.00,10,15.00,0.00,'Bs',0,NULL),
(91,135,1.96,1.20,5,7.00,7.00,NULL,NULL,'2026-05-05 21:21:09','2026-05-05 21:21:09',5.00,10,15.00,0.00,'Bs',0,NULL),
(92,136,8.35,1.20,20,7.00,24.04,NULL,NULL,'2026-05-06 00:03:03','2026-05-06 00:03:03',5.00,10,15.00,0.00,'Bs',0,NULL),
(93,138,11.56,1.20,28,7.00,33.31,NULL,NULL,'2026-05-06 00:05:51','2026-05-06 00:05:51',5.00,10,15.00,0.00,'Bs',0,NULL),
(94,139,5.18,1.20,12,7.00,14.93,NULL,NULL,'2026-05-06 00:59:35','2026-05-06 00:59:35',5.00,10,15.00,0.00,'Bs',0,NULL),
(95,140,5.21,1.20,13,7.00,15.02,NULL,NULL,'2026-05-06 01:01:44','2026-05-06 01:01:44',5.00,10,15.00,0.00,'Bs',0,NULL),
(96,141,3.44,1.20,8,7.00,9.90,NULL,NULL,'2026-05-06 04:43:53','2026-05-06 04:43:53',5.00,10,15.00,0.00,'Bs',0,NULL),
(97,142,7.03,1.20,17,7.00,20.24,NULL,NULL,'2026-05-06 21:20:24','2026-05-06 21:20:24',5.00,10,15.00,0.00,'Bs',0,NULL),
(98,143,3.70,1.20,9,7.00,10.67,NULL,NULL,'2026-05-06 21:28:46','2026-05-06 21:28:46',5.00,10,15.00,0.00,'Bs',0,NULL),
(99,144,7.55,1.20,18,7.00,21.74,NULL,NULL,'2026-05-06 22:57:07','2026-05-06 22:57:07',5.00,10,15.00,0.00,'Bs',0,NULL),
(100,145,3.68,1.20,9,7.00,10.60,NULL,NULL,'2026-05-06 23:38:04','2026-05-06 23:38:04',5.00,10,15.00,0.00,'Bs',0,NULL),
(101,155,0.42,1.20,1,7.00,7.00,NULL,NULL,'2026-05-13 00:04:51','2026-05-13 00:04:51',5.00,10,15.00,0.00,'Bs',0,NULL),
(102,158,0.56,1.20,1,7.00,7.00,NULL,NULL,'2026-05-17 22:24:12','2026-05-17 22:24:12',5.00,10,15.00,0.00,'Bs',0,NULL),
(103,159,2.74,1.20,7,7.00,7.89,NULL,NULL,'2026-05-18 00:30:01','2026-05-18 00:30:01',5.00,10,15.00,0.00,'Bs',0,NULL),
(104,161,3.98,1.20,10,7.00,11.46,NULL,NULL,'2026-05-18 20:39:16','2026-05-18 20:39:16',5.00,10,15.00,0.00,'Bs',0,NULL),
(105,162,9.98,1.20,24,7.00,28.73,NULL,NULL,'2026-05-18 21:28:30','2026-05-18 21:28:30',5.00,10,15.00,0.00,'Bs',0,NULL),
(106,163,7.43,1.20,18,7.00,21.39,NULL,NULL,'2026-05-19 19:54:33','2026-05-19 19:54:33',5.00,10,15.00,0.00,'Bs',0,NULL),
(107,164,0.56,1.20,1,7.00,7.00,NULL,NULL,'2026-05-19 20:31:39','2026-05-19 20:31:39',5.00,10,15.00,0.00,'Bs',0,NULL),
(108,165,5.16,1.20,12,7.00,14.86,NULL,NULL,'2026-05-20 20:28:21','2026-05-20 20:28:21',5.00,10,15.00,0.00,'Bs',0,NULL),
(109,166,3.43,1.20,8,7.00,9.88,NULL,NULL,'2026-05-20 21:02:00','2026-05-20 21:02:00',5.00,10,15.00,0.00,'Bs',0,NULL),
(110,168,3.35,1.20,8,7.00,9.65,NULL,NULL,'2026-05-21 21:20:50','2026-05-21 21:20:50',5.00,10,15.00,0.00,'Bs',0,NULL),
(111,167,1.99,1.20,5,7.00,7.00,NULL,NULL,'2026-05-21 21:34:09','2026-05-21 21:34:09',5.00,10,15.00,0.00,'Bs',0,NULL),
(112,170,2.29,1.20,6,7.00,7.00,NULL,NULL,'2026-05-21 22:09:13','2026-05-21 22:09:13',5.00,10,15.00,0.00,'Bs',0,NULL),
(113,171,7.16,1.20,17,7.00,20.61,NULL,NULL,'2026-05-21 22:25:42','2026-05-21 22:25:42',5.00,10,15.00,0.00,'Bs',0,NULL),
(114,173,4.17,1.20,10,7.00,12.01,NULL,NULL,'2026-05-22 02:44:34','2026-05-22 02:44:34',5.00,10,15.00,0.00,'Bs',0,NULL),
(115,174,1.49,1.20,4,7.00,7.00,NULL,NULL,'2026-05-22 02:46:10','2026-05-22 02:46:10',5.00,10,15.00,0.00,'Bs',0,NULL),
(116,175,1.49,1.20,4,7.00,7.00,NULL,NULL,'2026-05-22 02:50:00','2026-05-22 02:50:00',5.00,10,15.00,0.00,'Bs',0,NULL),
(117,176,3.87,1.20,9,7.00,11.14,NULL,NULL,'2026-05-22 02:54:07','2026-05-22 02:54:07',5.00,10,15.00,0.00,'Bs',0,NULL),
(118,177,2.27,1.20,5,7.00,7.00,NULL,NULL,'2026-05-22 02:58:11','2026-05-22 02:58:11',5.00,10,15.00,0.00,'Bs',0,NULL),
(119,178,3.71,1.20,9,7.00,10.69,NULL,NULL,'2026-05-22 03:03:08','2026-05-22 03:03:08',5.00,10,15.00,0.00,'Bs',0,NULL),
(120,179,3.50,1.20,8,7.00,10.07,NULL,NULL,'2026-05-22 03:53:03','2026-05-22 03:53:03',5.00,10,15.00,0.00,'Bs',0,NULL),
(121,180,3.75,1.20,9,7.00,10.81,NULL,NULL,'2026-05-22 04:07:01','2026-05-22 04:07:01',5.00,10,15.00,0.00,'Bs',0,NULL),
(122,181,0.51,1.20,1,7.00,7.00,NULL,NULL,'2026-05-22 05:07:56','2026-05-22 05:07:56',5.00,10,15.00,0.00,'Bs',0,NULL),
(123,183,3.88,1.20,9,7.00,11.19,NULL,NULL,'2026-05-22 05:39:47','2026-05-22 05:39:47',5.00,10,15.00,0.00,'Bs',0,NULL),
(124,184,1.67,1.20,4,7.00,7.00,NULL,NULL,'2026-05-22 05:45:14','2026-05-22 05:45:14',5.00,10,15.00,0.00,'Bs',0,NULL),
(125,186,3.74,1.20,9,7.00,10.77,NULL,NULL,'2026-05-22 18:02:28','2026-05-22 18:02:28',5.00,10,15.00,0.00,'Bs',0,NULL);
/*!40000 ALTER TABLE `pricing_quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pricing_rules`
--

DROP TABLE IF EXISTS `pricing_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pricing_rules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `value` double(8,2) NOT NULL,
  `conditions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`conditions`)),
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pricing_rules`
--

LOCK TABLES `pricing_rules` WRITE;
/*!40000 ALTER TABLE `pricing_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `pricing_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proof_of_deliveries`
--

DROP TABLE IF EXISTS `proof_of_deliveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `proof_of_deliveries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `trip_id` bigint(20) unsigned NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `photo_urls` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`photo_urls`)),
  `signature` text DEFAULT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `geolocation_lat` decimal(10,7) DEFAULT NULL,
  `geolocation_long` decimal(10,7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proof_of_deliveries_trip_id_foreign` (`trip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proof_of_deliveries`
--

LOCK TABLES `proof_of_deliveries` WRITE;
/*!40000 ALTER TABLE `proof_of_deliveries` DISABLE KEYS */;
INSERT INTO `proof_of_deliveries` VALUES
(1,9,'https://deliveryavaroa.info/uploads/deliveries/9/photos/1775891863-ei0p6Li6JT.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/9\\/photos\\/1775891863-ei0p6Li6JT.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/9\\/photos\\/1775891863-idKovolDBt.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/9\\/photos\\/1775891863-6nkltmxCQR.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/9/signatures/1775891863-bVBZNQoyNE.png','Aasif Ahmed',NULL,'2026-04-11 12:47:43',21.3148787,76.2236495,'2026-04-11 12:47:43','2026-04-11 12:47:43'),
(2,16,'https://deliveryavaroa.info/uploads/deliveries/16/photos/1776264960-uviaILSbt5.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/16\\/photos\\/1776264960-uviaILSbt5.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/16/signatures/1776264960-X3scPGXX3I.png','ghjj',NULL,'2026-04-15 20:26:00',-17.8045842,-63.1568170,'2026-04-15 20:26:00','2026-04-15 20:26:00'),
(3,15,'https://deliveryavaroa.info/uploads/deliveries/15/photos/1776268089-xTIiHFMnfg.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/15\\/photos\\/1776268089-xTIiHFMnfg.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/15/signatures/1776268089-lIflxJP8Z2.png','jh',NULL,'2026-04-15 21:18:09',-17.8042638,-63.1565940,'2026-04-15 21:18:09','2026-04-15 21:18:09'),
(4,26,'https://deliveryavaroa.info/uploads/deliveries/26/photos/1776428475-ND0Y4wvDRp.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/26\\/photos\\/1776428475-ND0Y4wvDRp.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/26\\/photos\\/1776428475-1rcx3X2IYv.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/26\\/photos\\/1776428475-T507MnRKfb.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/26\\/photos\\/1776428475-1fSmAkC5DE.heic\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/26\\/photos\\/1776428475-ZAalZ506ZX.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/26/signatures/1776428475-QysoIPnncJ.png','Aasif Ahmed',NULL,'2026-04-17 17:51:15',21.3148918,76.2236589,'2026-04-17 17:51:15','2026-04-17 17:51:15'),
(5,39,'https://deliveryavaroa.info/uploads/deliveries/39/photos/1776496591-2sP17EkgPA.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/39\\/photos\\/1776496591-2sP17EkgPA.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/39\\/photos\\/1776496591-6sFAHZqy1u.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/39\\/photos\\/1776496591-wBtYIYT99T.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/39\\/photos\\/1776496591-CKiboXd1Tu.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/39\\/photos\\/1776496591-AwsiT5NHDU.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/39/signatures/1776496591-AKgFvV5BKs.png','Aasif Saifuddin',NULL,'2026-04-18 12:46:31',21.3148839,76.2236591,'2026-04-18 12:46:31','2026-04-18 12:46:31'),
(6,37,'https://deliveryavaroa.info/uploads/deliveries/37/photos/1776498565-46XpK1iX1x.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/37\\/photos\\/1776498565-46XpK1iX1x.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/37/signatures/1776498565-xYoxEmKd6T.png','Aasif Ahmed',NULL,'2026-04-18 13:19:25',21.3157892,76.2226205,'2026-04-18 13:19:25','2026-04-18 13:19:25'),
(7,41,'https://deliveryavaroa.info/uploads/deliveries/41/photos/1776502176-OLXURkPDXi.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/41\\/photos\\/1776502176-OLXURkPDXi.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/41/signatures/1776502176-rmAArCsuQk.png','Aasif Ahmed',NULL,'2026-04-18 14:19:36',21.3148841,76.2236583,'2026-04-18 14:19:36','2026-04-18 14:19:36'),
(8,55,'https://deliveryavaroa.info/uploads/deliveries/55/photos/1776778234-3r9jshv8gg.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/55\\/photos\\/1776778234-3r9jshv8gg.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/55/signatures/1776778234-QhytQB30bH.png','Aasif',NULL,'2026-04-21 19:00:34',21.3148839,76.2236591,'2026-04-21 19:00:34','2026-04-21 19:00:34'),
(9,63,'https://deliveryavaroa.info/uploads/deliveries/63/photos/1776778372-j6Bl0ynXoe.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/63\\/photos\\/1776778372-j6Bl0ynXoe.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/63/signatures/1776778372-Z5yAa5FG9h.png','jj',NULL,'2026-04-21 19:02:52',-17.8044421,-63.1567312,'2026-04-21 19:02:52','2026-04-21 19:02:52'),
(10,54,'https://deliveryavaroa.info/uploads/deliveries/54/photos/1776780929-2ih3y6msT7.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/54\\/photos\\/1776780929-2ih3y6msT7.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/54/signatures/1776780929-vcOU0tJDBr.png','a',NULL,'2026-04-21 19:45:29',21.3148828,76.2236579,'2026-04-21 19:45:29','2026-04-21 19:45:29'),
(11,65,'https://deliveryavaroa.info/uploads/deliveries/65/photos/1776783675-Y2vLWR9ygV.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/65\\/photos\\/1776783675-Y2vLWR9ygV.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/65/signatures/1776783675-bw1FpNafvT.png','hk',NULL,'2026-04-21 20:31:15',-17.8043922,-63.1567818,'2026-04-21 20:31:15','2026-04-21 20:31:15'),
(12,68,'https://deliveryavaroa.info/uploads/deliveries/68/photos/1776784500-5XVVOzFYfW.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/68\\/photos\\/1776784500-5XVVOzFYfW.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/68/signatures/1776784500-91MZISEynC.png','jjjj hhh',NULL,'2026-04-21 20:45:00',-17.8041404,-63.1568718,'2026-04-21 20:45:00','2026-04-21 20:45:00'),
(13,53,'https://deliveryavaroa.info/uploads/deliveries/53/photos/1776832371-RUuozmVtpu.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/53\\/photos\\/1776832371-RUuozmVtpu.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/53/signatures/1776832371-5lFgm4tkVu.png','a',NULL,'2026-04-22 10:02:51',21.3148838,76.2236577,'2026-04-22 10:02:51','2026-04-22 10:02:51'),
(14,52,'https://deliveryavaroa.info/uploads/deliveries/52/photos/1776918812-E12HWlSppW.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/52\\/photos\\/1776918812-E12HWlSppW.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/52\\/photos\\/1776918812-JXicqHNBPY.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/52/signatures/1776918812-xcmNvbCzD7.png','Aasif Ahmed',NULL,'2026-04-23 10:03:32',21.3148741,76.2236583,'2026-04-23 10:03:32','2026-04-23 10:03:32'),
(15,69,'https://deliveryavaroa.info/uploads/deliveries/69/photos/1776919524-ANsJg9eGvt.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/69\\/photos\\/1776919524-ANsJg9eGvt.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/69\\/photos\\/1776919524-EqhbZYoXTn.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/69\\/photos\\/1776919524-O7uKKPNczV.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/69/signatures/1776919524-oR1CCAXKTr.png','Aasif Ahmed',NULL,'2026-04-23 10:15:24',21.3148736,76.2236599,'2026-04-23 10:15:24','2026-04-23 10:15:24'),
(16,74,'https://deliveryavaroa.info/uploads/deliveries/74/photos/1776954850-cJc9I4a6QG.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/74\\/photos\\/1776954850-cJc9I4a6QG.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/74/signatures/1776954850-pAx56f7N4K.png','yoni',NULL,'2026-04-23 20:04:10',-17.8045033,-63.1568491,'2026-04-23 20:04:10','2026-04-23 20:04:10'),
(17,76,'https://deliveryavaroa.info/uploads/deliveries/76/photos/1776955804-UlbIgSehfm.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/76\\/photos\\/1776955804-UlbIgSehfm.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/76/signatures/1776955804-dejgQIYmPY.png','Raúl',NULL,'2026-04-23 20:20:04',-17.8045237,-63.1568392,'2026-04-23 20:20:04','2026-04-23 20:20:04'),
(18,79,'https://deliveryavaroa.info/uploads/deliveries/79/photos/1777303643-LHOjMuNY4J.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/79\\/photos\\/1777303643-LHOjMuNY4J.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/79/signatures/1777303643-6bEecXurmJ.png','ua',NULL,'2026-04-27 20:57:23',-17.8079350,-63.1561116,'2026-04-27 20:57:23','2026-04-27 20:57:23'),
(19,80,'https://deliveryavaroa.info/uploads/deliveries/80/photos/1777317794-sN5WJ1G9g7.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/80\\/photos\\/1777317794-sN5WJ1G9g7.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/80/signatures/1777317794-s6ragwoUVG.png','trdcgbh',NULL,'2026-04-28 00:53:14',-17.7657417,-63.1692517,'2026-04-28 00:53:14','2026-04-28 00:53:14'),
(20,90,'https://deliveryavaroa.info/uploads/deliveries/90/photos/1777376171-P3KLv51Ur3.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/90\\/photos\\/1777376171-P3KLv51Ur3.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/90/signatures/1777376171-M0nvDYJYxy.png','hjj',NULL,'2026-04-28 17:06:11',-17.8041481,-63.1568328,'2026-04-28 17:06:11','2026-04-28 17:06:11'),
(21,91,'https://deliveryavaroa.info/uploads/deliveries/91/photos/1777385274-QbLBEd14z5.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/91\\/photos\\/1777385274-QbLBEd14z5.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/91/signatures/1777385274-GmJRlbPMFG.png','huh',NULL,'2026-04-28 19:37:54',-17.8044978,-63.1568463,'2026-04-28 19:37:54','2026-04-28 19:37:54'),
(29,99,'https://deliveryavaroa.info/uploads/deliveries/99/photos/1777481373-XRCZRCXFk7.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/99\\/photos\\/1777481373-XRCZRCXFk7.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/99/signatures/1777481373-wAC8d8TuGK.png','xxxxxx',NULL,'2026-04-29 22:19:33',-17.8041763,-63.1568227,'2026-04-29 22:19:33','2026-04-29 22:19:33'),
(31,110,'https://deliveryavaroa.info/uploads/deliveries/110/photos/1777493639-GPF2Vrn5Aw.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/110\\/photos\\/1777493639-GPF2Vrn5Aw.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/110/signatures/1777493639-s13k9DGjc6.png','jjhh',NULL,'2026-04-30 01:43:59',-17.8041170,-63.1568303,'2026-04-30 01:43:59','2026-04-30 01:43:59'),
(32,126,'https://deliveryavaroa.info/uploads/deliveries/126/photos/1777922475-7jqIqJDCXe.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/126\\/photos\\/1777922475-7jqIqJDCXe.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/126/signatures/1777922475-lNHkh6V4tl.png','xxcc',NULL,'2026-05-05 00:51:15',-17.8042229,-63.1568271,'2026-05-05 00:51:15','2026-05-05 00:51:15'),
(33,144,'https://deliveryavaroa.info/uploads/deliveries/144/photos/1778088549-aUHbWSZ8ym.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/144\\/photos\\/1778088549-aUHbWSZ8ym.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/144/signatures/1778088549-MXjLQcnl82.png','jhjjs',NULL,'2026-05-06 22:59:09',-17.8044184,-63.1568189,'2026-05-06 22:59:09','2026-05-06 22:59:09'),
(34,145,'https://deliveryavaroa.info/uploads/deliveries/145/photos/1778091072-zHojEysSY5.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/145\\/photos\\/1778091072-zHojEysSY5.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/145/signatures/1778091072-t4rGzVDG2s.png','Raul',NULL,'2026-05-06 23:41:12',-17.8044472,-63.1567985,'2026-05-06 23:41:12','2026-05-06 23:41:12'),
(35,158,'https://deliveryavaroa.info/uploads/deliveries/158/photos/1779039286-ADbayPfiN0.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/158\\/photos\\/1779039286-ADbayPfiN0.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/158/signatures/1779039286-wqxVdjFGxN.png','hhh',NULL,'2026-05-17 23:04:46',-17.8044358,-63.1568069,'2026-05-17 23:04:46','2026-05-17 23:04:46'),
(36,160,'https://deliveryavaroa.info/uploads/deliveries/160/photos/1779092584-oTjKR4FGuF.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/160\\/photos\\/1779092584-oTjKR4FGuF.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/160\\/photos\\/1779092584-0TXF53NuCD.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/160\\/photos\\/1779092584-9npx6uyqI1.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/160/signatures/1779092584-LanhiPwe31.png','aasif',NULL,'2026-05-18 13:53:04',NULL,NULL,'2026-05-18 13:53:04','2026-05-18 13:53:04'),
(37,166,'https://deliveryavaroa.info/uploads/deliveries/166/photos/1779291733-HtBGiqDixg.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/166\\/photos\\/1779291733-HtBGiqDixg.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/166/signatures/1779291733-jZGmeQEEO8.png','adrian espindola',NULL,'2026-05-20 21:12:13',-21.5204808,-64.7303532,'2026-05-20 21:12:13','2026-05-20 21:12:13'),
(38,167,'https://deliveryavaroa.info/uploads/deliveries/167/photos/1779379816-ph8P0lnJ7G.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/167\\/photos\\/1779379816-ph8P0lnJ7G.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/167/signatures/1779379816-DQcyGCPtJE.png','Hugo Cardozo',NULL,'2026-05-21 21:40:16',-21.5204888,-64.7303553,'2026-05-21 21:40:16','2026-05-21 21:40:16'),
(39,175,'https://deliveryavaroa.info/uploads/deliveries/175/photos/1779398721-fnD40Ykdox.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/175\\/photos\\/1779398721-fnD40Ykdox.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/175/signatures/1779398721-qBZxtUgPhO.png','Adrian espindola',NULL,'2026-05-22 02:55:21',-21.5205255,-64.7303308,'2026-05-22 02:55:21','2026-05-22 02:55:21'),
(40,173,'https://deliveryavaroa.info/uploads/deliveries/173/photos/1779399020-pCWfr6MryF.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/173\\/photos\\/1779399020-pCWfr6MryF.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/173/signatures/1779399020-nzpvdRPn7d.png','Adrian espindola',NULL,'2026-05-22 03:00:20',-21.5204886,-64.7303668,'2026-05-22 03:00:20','2026-05-22 03:00:20'),
(41,176,'https://deliveryavaroa.info/uploads/deliveries/176/photos/1779399024-f8vnQLboad.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/176\\/photos\\/1779399024-f8vnQLboad.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/176/signatures/1779399024-TbkGgmhc1T.png','luis',NULL,'2026-05-22 03:00:24',-21.5348041,-64.7487207,'2026-05-22 03:00:24','2026-05-22 03:00:24'),
(42,179,'https://deliveryavaroa.info/uploads/deliveries/179/photos/1779402587-yhAwwkFvFj.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/179\\/photos\\/1779402587-yhAwwkFvFj.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/179/signatures/1779402587-pjjIBdXhk3.png','hugo',NULL,'2026-05-22 03:59:47',-21.5204799,-64.7303521,'2026-05-22 03:59:47','2026-05-22 03:59:47'),
(43,180,'https://deliveryavaroa.info/uploads/deliveries/180/photos/1779403402-CWha8maxbB.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/180\\/photos\\/1779403402-CWha8maxbB.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/180/signatures/1779403402-hwZrLZ1tTW.png','señor José',NULL,'2026-05-22 04:13:22',-17.8044256,-63.1568531,'2026-05-22 04:13:22','2026-05-22 04:13:22'),
(44,183,'https://deliveryavaroa.info/uploads/deliveries/183/photos/1779408754-ZwW82Aa3GD.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/183\\/photos\\/1779408754-ZwW82Aa3GD.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/183/signatures/1779408754-bVUmgRPUFb.png','chelo',NULL,'2026-05-22 05:42:34',-21.5205235,-64.7303671,'2026-05-22 05:42:34','2026-05-22 05:42:34'),
(45,187,'https://deliveryavaroa.info/uploads/deliveries/187/photos/1779704447-KzmKKR3QBg.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/187\\/photos\\/1779704447-KzmKKR3QBg.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/187\\/photos\\/1779704447-ZmEzvMAxLQ.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/187/signatures/1779704447-nsxBsB2Md1.png','aasif',NULL,'2026-05-25 15:50:47',NULL,NULL,'2026-05-25 15:50:47','2026-05-25 15:50:47'),
(46,189,'https://deliveryavaroa.info/uploads/deliveries/189/photos/1779704764-lWYbhij4bS.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/189\\/photos\\/1779704764-lWYbhij4bS.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/189\\/photos\\/1779704764-oE0Ryue5vj.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/189/signatures/1779704764-gfZLdHhHbN.png','asif',NULL,'2026-05-25 15:56:04',NULL,NULL,'2026-05-25 15:56:04','2026-05-25 15:56:04'),
(47,192,'https://deliveryavaroa.info/uploads/deliveries/192/photos/1779789288-dORJzqJP5w.jpg','[\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/192\\/photos\\/1779789288-dORJzqJP5w.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/192\\/photos\\/1779789288-Xq96FFkMUe.jpg\",\"https:\\/\\/deliveryavaroa.info\\/uploads\\/deliveries\\/192\\/photos\\/1779789288-o9vK6Tg2gE.jpg\"]','https://deliveryavaroa.info/uploads/deliveries/192/signatures/1779789288-XazaJGwg1S.png','aasif',NULL,'2026-05-26 15:24:48',NULL,NULL,'2026-05-26 15:24:48','2026-05-26 15:24:48');
/*!40000 ALTER TABLE `proof_of_deliveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referral_settings`
--

DROP TABLE IF EXISTS `referral_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `referral_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `referral_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `referral_bonus_amount` decimal(12,2) NOT NULL DEFAULT 10.00,
  `bonus_currency` varchar(255) NOT NULL DEFAULT 'USD',
  `bonus_type` enum('fixed','percentage') NOT NULL DEFAULT 'fixed',
  `referral_percentage` decimal(5,2) NOT NULL DEFAULT 10.00,
  `minimum_deposit_for_bonus` int(11) NOT NULL DEFAULT 100,
  `bonus_expiry_days` int(11) NOT NULL DEFAULT 30,
  `max_referrals_per_user` int(11) NOT NULL DEFAULT 0,
  `terms_conditions` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referral_settings`
--

LOCK TABLES `referral_settings` WRITE;
/*!40000 ALTER TABLE `referral_settings` DISABLE KEYS */;
INSERT INTO `referral_settings` VALUES
(1,1,500.00,'INR','fixed',10.00,1000,30,0,'Get ₹500 bonus for every friend you refer who deposits minimum ₹1000. Bonus expires in 30 days. Only for Indian users.','2025-11-30 22:15:06','2025-11-30 22:15:06');
/*!40000 ALTER TABLE `referral_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referrals`
--

DROP TABLE IF EXISTS `referrals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `referrals` (
  `id` bigint(20) NOT NULL,
  `commission_type` varchar(40) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `percent` decimal(5,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referrals`
--

LOCK TABLES `referrals` WRITE;
/*!40000 ALTER TABLE `referrals` DISABLE KEYS */;
/*!40000 ALTER TABLE `referrals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
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
INSERT INTO `sessions` VALUES
('06L1gfQsWqojp0TFtUuDSg7YiN9fTY1W9B2Vz1Cp',NULL,'104.23.221.72','http://deliveryavaroa.info/wp-admin/install.php?step=1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjh3cnRmNHM0VmpnOXdwbUY1Z1Z0ejd1eEpKSFl6RG9EZFM1MDFucCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vZGVsaXZlcnlhdmFyb2EuaW5mby93cC1hZG1pbi9pbnN0YWxsLnBocD9zdGVwPTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1780453079),
('4tMabie3vBOgz1nUHJBC0m7faXKG8EIvQ9KNmNe7',1,'181.188.162.18','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiYUhGcnpsV0ZvQ3ZzWEpyVHRhbTJwYkFQQmhDN21JWkFUSWc4MnB1QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vZGVsaXZlcnlhdmFyb2EuaW5mby9hZG1pbi91bmxvY2siO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6ODoiTG9nZ2VkSW4iO2k6MTtzOjE3OiJMb2dnZWRJblRpbWVzdGFtcCI7TzoyNToiSWxsdW1pbmF0ZVxTdXBwb3J0XENhcmJvbiI6Mzp7czo0OiJkYXRlIjtzOjI2OiIyMDI2LTA2LTAzIDA2OjE4OjE2Ljk2NjYwMSI7czoxMzoidGltZXpvbmVfdHlwZSI7aTozO3M6ODoidGltZXpvbmUiO3M6MTI6IkFzaWEvS29sa2F0YSI7fXM6NToibG9jYWwiO3M6MjoiZ2IiO30=',1780458741),
('kg04iOpYHwHnGou7sgBMISF5MH3v34sTwwHOnSeT',NULL,'45.205.1.196','Mozilla/5.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1JGbkhJaHJka0EyMzVwWHhrQ2sxTHlndlVnSERMTjZXZlExYTN5TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vMTg3LjEyNy44Ljc4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1780458617),
('LFnfiEHtqw8ERyTqqop3xFohuMey4Sp2lfeENRUh',NULL,'45.198.224.186','Mozilla/5.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoic2xDMzBWM29wekxPS25iMUpPVzltMUhoQWVMdThtZ0lUQVBDR1haVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vMTg3LjEyNy44Ljc4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1780452670),
('Lx5CkNHxV4EE6nxJSWu7glrpMHTKHxRbCVUXLyLj',NULL,'45.198.224.186','Mozilla/5.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlk3OEJhNTNmUUZJWU5JaWgyVU1oYkpDQ1RxdmNXSEtLMjNtcU10WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vMTg3LjEyNy44Ljc4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1780458183),
('Nkl67IEDKSxCc6qDxd8OEF1hPP9eZEaRB4agUX1q',NULL,'45.205.1.196','Mozilla/5.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUR6MUxnczVmbjE0dmNWdmlObW1hd1k1T1hlWXVjS3dzeVlnR3dHWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vMTg3LjEyNy44Ljc4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1780454184),
('ROW6y5kPhoC9zElbHbSnxRBKB8XnNb2OTNDlsrJm',NULL,'172.71.184.50','http://deliveryavaroa.info/wp-admin/install.php?step=1','YTozOntzOjY6Il90b2tlbiI7czo0MDoid3dQVWtia1NHZ2lhVVNDcUdMS1ZENjQySm5MWmd6dEtMYXdRaFlzRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vZGVsaXZlcnlhdmFyb2EuaW5mby93cC1hZG1pbi9pbnN0YWxsLnBocD9zdGVwPTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1780457599),
('T5wcatx0lkbtj6LVZleNHY3OAW4StPXvsn7RNuA5',NULL,'15.152.153.201','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiV3VHdHV4MVg5Z0FqTWVEM0tTTGo3NWpXNDllRlVsVkdnNE1oVG1XZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vZGVsaXZlcnlhdmFyb2EuaW5mbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1780457517),
('v3SEuVsqJI3sFJGtDe1t1AWlJE3HEsVnX9Zwk7HO',NULL,'147.182.178.201','Mozilla/5.0 zgrab/0.x','YTozOntzOjY6Il90b2tlbiI7czo0MDoid3hSS3hLOGtVbDlEOXBibm9ya0tCMGZtUzYwRE42MEVWMHZIbzlpZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vMTg3LjEyNy44Ljc4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1780457437),
('V4H8MpMT22gtSA64wntCOOFYyg92v5KjqIFLduIz',NULL,'45.198.224.186','Mozilla/5.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDBseGVzRXRyemFicUppMDhNYTJTY0dRcGZIV3NubTRiM2xQSEQwMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vMTg3LjEyNy44Ljc4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1780455874),
('YkKLeukfwwJLEunlpFkYD0SY1JD2L8kH6K3twjR9',NULL,'45.198.224.186','Mozilla/5.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ1FnV0ZnaWV2a08zck91VzY1b0N5ZFh6UGs1NDV0VEgzZ0ZYeTRWVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vMTg3LjEyNy44Ljc4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1780453820);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_key` varchar(255) NOT NULL,
  `option_value` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES
(1,'app_name','AVAROA','2022-12-04 17:05:33','2026-03-05 03:39:55'),
(2,'app_email','admin@AVAROA.com','2022-12-04 17:05:33','2026-03-05 03:39:55'),
(3,'app_contact_number','+591 45626594','2022-12-04 17:05:33','2024-10-27 00:11:55'),
(4,'app_location','Bolivia','2022-12-04 17:05:33','2026-01-30 11:28:11'),
(5,'app_date_format','d F, Y','2022-12-04 17:05:33','2024-10-27 00:11:55'),
(6,'app_timezone','Asia/Dhaka','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(7,'allow_preloader','0','2022-12-04 17:05:33','2026-05-23 11:33:14'),
(8,'app_preloader','uploads/setting/1779516194-ttB9Nhmwu6.png','2022-12-04 17:05:33','2026-05-23 11:33:14'),
(9,'app_logo','uploads/setting/1779516194-w4f7uPTR6U.png','2022-12-04 17:05:33','2026-05-23 11:33:14'),
(10,'app_fav_icon','uploads/setting/1779516194-fBD4F1Eka6.png','2022-12-04 17:05:33','2026-05-23 11:33:14'),
(11,'app_copyright','AVAROA','2022-12-04 17:05:33','2026-03-05 03:39:55'),
(12,'app_developed','AAsif','2022-12-04 17:05:33','2024-10-27 00:11:55'),
(13,'og_title','LMS - Learning Management System','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(14,'og_description','Learning Management System','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(15,'zoom_status','1','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(16,'bbb_status','1','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(17,'jitsi_status','1','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(18,'jitsi_server_base_url','https://meet.jit.si/','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(19,'registration_email_verification','0','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(20,'footer_quote',NULL,'2022-12-04 17:05:33','2024-06-07 01:01:03'),
(21,'paystack_currency','AFA','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(22,'paystack_conversion_rate','1','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(23,'paystack_status',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(24,'PAYSTACK_PUBLIC_KEY',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(25,'PAYSTACK_SECRET_KEY',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(26,'paypal_currency','AFA','2022-12-04 17:05:33','2024-10-27 01:16:43'),
(27,'paypal_conversion_rate','15','2022-12-04 17:05:33','2024-10-27 01:16:43'),
(28,'paypal_status','1','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(29,'PAYPAL_MODE','sandbox','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(30,'PAYPAL_CLIENT_ID',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(31,'PAYPAL_SECRET',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(32,'stripe_currency','AFA','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(33,'stripe_conversion_rate','1','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(34,'stripe_status','1','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(35,'STRIPE_MODE','sandbox','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(36,'STRIPE_SECRET_KEY','','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(37,'STRIPE_PUBLIC_KEY',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(38,'razorpay_currency','AFA','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(39,'razorpay_conversion_rate','1','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(40,'razorpay_status',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(41,'RAZORPAY_KEY',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(42,'RAZORPAY_SECRET',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(43,'mollie_currency','AFA','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(44,'mollie_conversion_rate','1','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(45,'mollie_status',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(46,'MOLLIE_KEY',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(47,'im_currency','AFA','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(48,'im_conversion_rate','1','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(49,'im_status',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(50,'IM_API_KEY',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(51,'IM_AUTH_TOKEN',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(52,'IM_URL','https://test.instamojo.com/api/1.1/payment-requests/','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(53,'sslcommerz_currency','AFA','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(54,'sslcommerz_conversion_rate','1','2022-12-04 17:05:33','2024-06-07 06:34:59'),
(55,'sslcommerz_status',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(56,'sslcommerz_mode',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(57,'SSLCZ_STORE_ID',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(58,'SSLCZ_STORE_PASSWD',NULL,'2022-12-04 17:05:33','2024-06-07 06:34:59'),
(59,'MAIL_DRIVER','smtp','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(60,'MAIL_HOST','smtp.hostinger.com','2022-12-04 17:05:33','2025-01-14 01:39:52'),
(61,'MAIL_PORT','465','2022-12-04 17:05:33','2025-01-14 01:39:52'),
(62,'MAIL_USERNAME','gen@negociosgen.com','2022-12-04 17:05:33','2025-01-14 01:39:52'),
(63,'MAIL_PASSWORD','zJ0O8[W5','2022-12-04 17:05:33','2025-01-14 01:39:52'),
(64,'MAIL_ENCRYPTION','tls','2022-12-04 17:05:33','2024-06-07 06:29:46'),
(65,'MAIL_FROM_ADDRESS','gen@negociosgen.com','2022-12-04 17:05:33','2025-01-14 01:39:52'),
(66,'MAIL_FROM_NAME','Negociosgen','2022-12-04 17:05:33','2025-01-14 01:39:52'),
(67,'MAIL_MAILER','smtp','2022-12-04 17:05:33','2024-10-27 00:59:40'),
(68,'update','Update','2022-12-04 17:05:33','2024-03-07 06:41:34'),
(69,'sign_up_left_text',NULL,'2022-12-04 17:05:33','2024-06-07 01:01:03'),
(70,'sign_up_left_image','uploads_demo/home/hero-img.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(71,'forgot_title',NULL,'2022-12-04 17:05:33','2024-06-07 01:01:03'),
(72,'forgot_subtitle',NULL,'2022-12-04 17:05:33','2024-06-07 01:01:03'),
(73,'forgot_btn_name','Reset','2022-12-04 17:05:33','2025-01-13 01:02:41'),
(74,'facebook_url',NULL,'2022-12-04 17:05:33','2024-06-07 01:01:03'),
(75,'twitter_url',NULL,'2022-12-04 17:05:33','2024-06-07 01:01:03'),
(76,'linkedin_url',NULL,'2022-12-04 17:05:33','2024-06-07 01:01:03'),
(77,'youtube_url','https://www.youtube.com/','2022-12-04 17:05:33','2025-01-13 01:02:06'),
(78,'app_instructor_footer_title','Join One Of The World’s Largest Learning Marketplaces.','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(79,'app_instructor_footer_subtitle','Donald valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my tree','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(80,'get_in_touch_title','get','2022-12-04 17:05:33','2025-01-13 05:31:45'),
(81,'send_us_msg_title',NULL,'2022-12-04 17:05:33','2024-06-07 08:01:53'),
(82,'contact_us_location',NULL,'2022-12-04 17:05:33','2024-06-07 08:01:53'),
(83,'contact_us_email_one',NULL,'2022-12-04 17:05:33','2024-06-07 08:01:53'),
(84,'contact_us_email_two',NULL,'2022-12-04 17:05:33','2024-06-07 08:01:53'),
(85,'contact_us_phone_one',NULL,'2022-12-04 17:05:33','2024-06-07 08:01:53'),
(86,'contact_us_phone_two',NULL,'2022-12-04 17:05:33','2024-06-07 08:01:53'),
(87,'contact_us_map_link',NULL,'2022-12-04 17:05:33','2024-06-07 08:01:53'),
(88,'contact_us_description','desc','2022-12-04 17:05:33','2025-01-13 05:41:10'),
(89,'faq_title','Frequently Ask Questions.','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(90,'faq_subtitle','CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(91,'faq_image_title','Still no luck?','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(92,'faq_image','uploads_demo/setting\\faq-img.jpg','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(93,'faq_tab_first_title','Item Support','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(94,'faq_tab_first_subtitle','Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(95,'faq_tab_sec_title','Licensing','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(96,'faq_tab_sec_subtitle','Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(97,'faq_tab_third_title','Your Account','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(98,'faq_tab_third_subtitle','Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(99,'faq_tab_four_title','Tax & Complications','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(100,'faq_tab_four_subtitle','Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(101,'home_special_feature_first_logo','uploads_demo/setting\\feature-icon1.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(102,'home_special_feature_first_title','Learn From Experts','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(103,'home_special_feature_first_subtitle','Mornings of spring which I enjoy with my whole heart about the gen','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(104,'home_special_feature_second_logo','uploads_demo/setting/feature-icon2.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(105,'home_special_feature_second_title','Earn a Certificate','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(106,'home_special_feature_second_subtitle','Mornings of spring which I enjoy with my whole heart about the gen','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(107,'home_special_feature_third_logo','uploads_demo/setting\\feature-icon3.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(108,'home_special_feature_third_title','5000+ Courses','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(109,'home_special_feature_third_subtitle','Serenity has taken possession of my entire soul, like these sweet spring','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(110,'course_logo','uploads_demo/setting/courses-heading-img.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(111,'course_title','A Broad Selection Of Courses','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(112,'course_subtitle','CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(113,'bundle_course_logo','uploads_demo/setting/bundle-courses-heading-img.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(114,'bundle_course_title','Latest Bundle Courses','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(115,'bundle_course_subtitle','CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(116,'top_category_logo','uploads_demo/setting/categories-heading-img.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(117,'top_category_title','Our Top Categories','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(118,'top_category_subtitle','CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(119,'top_instructor_logo','uploads_demo/setting\\top-instructor-heading-img.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(120,'top_instructor_title','Top Rated Courses From Our Top Instructor.','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(121,'top_instructor_subtitle','CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(122,'become_instructor_video','uploads_demo/setting/test.mp4','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(123,'become_instructor_video_preview_image','uploads_demo/setting/video-poster.jpg','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(124,'become_instructor_video_logo','uploads_demo/setting/top-instructor-heading-img.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(125,'become_instructor_video_title','We Only Accept Professional Courses Form Professional Instructors','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(126,'become_instructor_video_subtitle','Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(127,'customer_say_logo','uploads_demo/setting/customers-say-heading-img.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(128,'customer_say_title','What Our Valuable Customers Say.','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(129,'customer_say_first_name','DANIEL JHON','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(130,'customer_say_first_position','UI/UX DESIGNER','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(131,'customer_say_first_comment_title','Great instructor, great course','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(132,'customer_say_first_comment_description','Wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(133,'customer_say_first_comment_rating_star','5','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(134,'customer_say_second_name','NORTH','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(135,'customer_say_second_position','DEVELOPER','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(136,'customer_say_second_comment_title','Awesome course & good response','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(137,'customer_say_second_comment_description','Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(138,'customer_say_second_comment_rating_star','4.5','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(139,'customer_say_third_name','HIBRUPATH','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(140,'customer_say_third_position','MARKETER','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(141,'customer_say_third_comment_title','Fantastic course','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(142,'customer_say_third_comment_description','Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(143,'customer_say_third_comment_rating_star','5','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(144,'achievement_first_logo','uploads_demo/setting\\1.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(145,'achievement_first_title','Successfully trained','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(146,'achievement_first_subtitle','2000+ students','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(147,'achievement_second_logo','uploads_demo/setting\\2.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(148,'achievement_second_title','Video courses','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(149,'achievement_second_subtitle','2000+ students','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(150,'achievement_third_logo','uploads_demo/setting\\3.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(151,'achievement_third_title','Expert instructor','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(152,'achievement_third_subtitle','2000+ students','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(153,'achievement_four_logo','uploads_demo/setting\\4.png','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(154,'achievement_four_title','Proudly Received','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(155,'achievement_four_title','Proudly Received','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(156,'achievement_four_subtitle','2000+ students','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(157,'support_faq_title','s','2022-12-04 17:05:33','2025-01-13 01:31:35'),
(158,'support_faq_subtitle','g','2022-12-04 17:05:33','2025-01-13 01:31:35'),
(159,'ticket_title','dfgg','2022-12-04 17:05:33','2025-01-13 01:31:35'),
(160,'ticket_subtitle','d','2022-12-04 17:05:33','2025-01-13 01:31:35'),
(161,'cookie_button_name','Allow cookies','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(162,'cookie_msg','Your experience on this site will be improved by allowing cookies','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(163,'COOKIE_CONSENT_STATUS','1','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(164,'platform_charge','3','2022-12-04 17:05:33','2024-10-27 00:11:55'),
(165,'sell_commission','10','2022-12-04 17:05:33','2024-10-27 00:11:55'),
(166,'app_version','21','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(167,'current_version','6.1','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(262,'currency_id','11','2024-03-07 01:46:36','2026-01-30 11:28:11'),
(263,'FORCE_HTTPS','false','2024-03-07 01:46:36','2024-03-07 01:46:36'),
(264,'language_id','4','2024-03-07 01:46:36','2025-01-27 00:14:39'),
(265,'TIMEZONE','UTC','2024-03-07 01:46:36','2025-01-13 01:02:06'),
(266,'pwa_enable','0','2024-03-07 01:46:36','2024-03-07 01:46:36'),
(267,'instagram_url',NULL,'2024-03-07 01:46:36','2024-06-07 01:01:03'),
(268,'tiktok_url',NULL,'2024-03-07 01:46:36','2024-06-07 01:01:03'),
(269,'app_black_logo','uploads/setting/1779516194-xlk5luvfJH.png','2024-03-07 01:46:37','2026-05-23 11:33:14'),
(270,'app_pwa_icon',NULL,'2024-03-07 01:46:37','2024-03-07 01:46:37'),
(271,'theme','1','2024-03-07 06:41:34','2024-03-07 06:43:45'),
(272,'mercado_currency','AFA','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(273,'mercado_conversion_rate','1','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(274,'mercado_status',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(275,'MERCADO_PAGO_CLIENT_ID',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(276,'MERCADO_PAGO_CLIENT_SECRET',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(277,'flutterwave_currency','AFA','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(278,'flutterwave_conversion_rate','1','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(279,'flutterwave_status',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(280,'FLW_PUBLIC_KEY',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(281,'FLW_SECRET_KEY',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(282,'FLW_SECRET_HASH',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(283,'coinbase_currency','AFA','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(284,'coinbase_conversion_rate','1','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(285,'coinbase_status',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(286,'coinbase_mode','sandbox','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(287,'coinbase_key',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(288,'zitopay_currency','AFA','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(289,'zitopay_conversion_rate','1','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(290,'zitopay_status',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(291,'zitopay_username',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(292,'iyzipay_currency','AFA','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(293,'iyzipay_conversion_rate','1','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(294,'iyzipay_status',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(295,'iyzipay_mode','sandbox','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(296,'iyzipay_key',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(297,'iyzipay_secret',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(298,'bitpay_currency','AFA','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(299,'bitpay_conversion_rate','1','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(300,'bitpay_status',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(301,'bitpay_mode','testnet','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(302,'bitpay_key',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(303,'braintree_currency','AFA','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(304,'braintree_conversion_rate','1','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(305,'braintree_status',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(306,'braintree_test_mode','0','2024-06-07 06:34:59','2024-06-07 06:34:59'),
(307,'braintree_merchant_id',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(308,'braintree_public_key',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(309,'braintree_private_key',NULL,'2024-06-07 06:34:59','2024-06-07 06:34:59'),
(310,'app_footer_payment_image','uploads/setting/1779516194-e5O29ulBjb.png','2024-10-27 00:11:55','2026-05-23 11:33:14');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactivated',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES
(1,NULL,'Management','Management',1,'2025-01-13 07:19:36',NULL,'2025-01-13 07:19:36'),
(2,NULL,'Web Development','Web Development',1,NULL,NULL,'2025-01-13 07:10:02'),
(3,NULL,'Mobile Development','Mobile Development',1,NULL,NULL,'2025-01-13 07:10:02'),
(4,'uploads/upgrade_skill/1736772002mqiQKWodZL.jpg','Mobile App','App',1,NULL,'2025-01-13 07:10:02','2025-01-13 07:10:02');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `states` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES
(1,1,'Dhaka',NULL,NULL),
(2,1,'Khulna',NULL,NULL),
(3,1,'Comilla',NULL,NULL),
(4,2,'California',NULL,NULL),
(5,2,'Texas',NULL,NULL),
(6,2,'Florida',NULL,NULL),
(7,3,'Argyll',NULL,NULL),
(8,3,'Belfast',NULL,NULL),
(9,3,'Cambridge',NULL,NULL),
(11,1,'Khulna','2024-06-07 05:59:39','2024-06-07 06:02:22');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subcategories_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` VALUES
(13,'b17f503c-5be6-11f0-8620-9a4383c8618e',1,NULL,'Albañil','albanil',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(14,'b17f5053-5be6-11f0-8620-9a4383c8618e',1,NULL,'Plomero','plomero',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(15,'b17f506a-5be6-11f0-8620-9a4383c8618e',1,NULL,'Pintor','pintor',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(16,'b17f5081-5be6-11f0-8620-9a4383c8618e',1,NULL,'Electricista','electricista',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(17,'b17f5098-5be6-11f0-8620-9a4383c8618e',1,NULL,'Carpintero','carpintero',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(18,'b17f50af-5be6-11f0-8620-9a4383c8618e',1,NULL,'Cerrajero','cerrajero',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(19,'b17f50c6-5be6-11f0-8620-9a4383c8618e',1,NULL,'Vidriero','vidriero',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(20,'b17f50dd-5be6-11f0-8620-9a4383c8618e',4,NULL,'Personal de Limpieza','personal-de-limpieza',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(21,'b17f50f4-5be6-11f0-8620-9a4383c8618e',4,NULL,'Lavandería','lavanderia',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(22,'b17f510b-5be6-11f0-8620-9a4383c8618e',4,NULL,'Jardinería','jardineria',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(23,'b17f5122-5be6-11f0-8620-9a4383c8618e',4,NULL,'Fumigación','fumigacion',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(24,'b17f5139-5be6-11f0-8620-9a4383c8618e',5,NULL,'Churrasquero','churrasquero',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(25,'b17f5150-5be6-11f0-8620-9a4383c8618e',5,NULL,'Chef','chef',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(26,'b17f5167-5be6-11f0-8620-9a4383c8618e',5,NULL,'Cocinero/a','cocinero-a',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(27,'b17f517e-5be6-11f0-8620-9a4383c8618e',5,NULL,'Ayudante de Cocina','ayudante-de-cocina',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(28,'b17f5195-5be6-11f0-8620-9a4383c8618e',5,NULL,'Repostera/o','repostera-o',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(29,'b17f51ac-5be6-11f0-8620-9a4383c8618e',6,NULL,'Niñera','ninera',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(30,'b17f51c3-5be6-11f0-8620-9a4383c8618e',6,NULL,'Enfermería','enfermeria',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(31,'b17f51da-5be6-11f0-8620-9a4383c8618e',6,NULL,'Fisioterapia','fisioterapia',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(32,'b17f51f1-5be6-11f0-8620-9a4383c8618e',6,NULL,'Psicólogo','psicologo',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(33,'b17f5208-5be6-11f0-8620-9a4383c8618e',6,NULL,'Personal Trainer','personal-trainer',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(34,'b17f521f-5be6-11f0-8620-9a4383c8618e',6,NULL,'Nutricionista','nutricionista',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(35,'b17f5236-5be6-11f0-8620-9a4383c8618e',6,NULL,'Cuidado de Adulto mayor','cuidado-de-adulto-mayor',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(36,'b17f524d-5be6-11f0-8620-9a4383c8618e',7,NULL,'Sereno','sereno',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(37,'b17f5264-5be6-11f0-8620-9a4383c8618e',7,NULL,'Guardaespaldas','guardaespaldas',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(38,'b17f527b-5be6-11f0-8620-9a4383c8618e',7,NULL,'Detective Privado','detective-privado',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(39,'b17f5292-5be6-11f0-8620-9a4383c8618e',7,NULL,'Personal de seguridad','personal-de-seguridad',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(40,'b17f52a9-5be6-11f0-8620-9a4383c8618e',8,NULL,'Nivelación Escolar','nivelacion-escolar',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(41,'b17f52c0-5be6-11f0-8620-9a4383c8618e',8,NULL,'Trabajos Escolares','trabajos-escolares',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(42,'b17f52d7-5be6-11f0-8620-9a4383c8618e',8,NULL,'Profesor de idiomas','profesor-de-idiomas',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(43,'b17f52ee-5be6-11f0-8620-9a4383c8618e',8,NULL,'Psicopedagogos','psicopedagogos',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(44,'b17f5305-5be6-11f0-8620-9a4383c8618e',8,NULL,'Ayudantías Universitarias','ayudantias-universitarias',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(45,'b17f531c-5be6-11f0-8620-9a4383c8618e',8,NULL,'Tutor de Tesis','tutor-de-tesis',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(46,'b17f5333-5be6-11f0-8620-9a4383c8618e',9,NULL,'Veterinario','veterinario',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(47,'b17f534a-5be6-11f0-8620-9a4383c8618e',9,NULL,'Cuidado de mascotas','cuidado-de-mascotas',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(48,'b17f5361-5be6-11f0-8620-9a4383c8618e',9,NULL,'Paseo de Mascotas','paseo-de-mascotas',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(49,'b17f5378-5be6-11f0-8620-9a4383c8618e',9,NULL,'Peluquería/spa','peluqueria-spa',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(50,'b17f538f-5be6-11f0-8620-9a4383c8618e',10,NULL,'Barberia/corte','barberia-corte',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(51,'b17f53a6-5be6-11f0-8620-9a4383c8618e',10,NULL,'Manicura/pedicura','manicura-pedicura',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(52,'b17f53bd-5be6-11f0-8620-9a4383c8618e',10,NULL,'Maquillaje facial','maquillaje-facial',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(53,'b17f53d4-5be6-11f0-8620-9a4383c8618e',10,NULL,'Depilación','depilacion',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(54,'b17f53eb-5be6-11f0-8620-9a4383c8618e',10,NULL,'Peinados','peinados',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(55,'b17f5402-5be6-11f0-8620-9a4383c8618e',11,NULL,'Meseros','meseros',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(56,'b17f5419-5be6-11f0-8620-9a4383c8618e',11,NULL,'Barman','barman',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(57,'b17f5430-5be6-11f0-8620-9a4383c8618e',11,NULL,'Filmación','filmacion',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(58,'b17f5447-5be6-11f0-8620-9a4383c8618e',11,NULL,'Fotógrafo','fotografo',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(59,'b17f545e-5be6-11f0-8620-9a4383c8618e',11,NULL,'Animación/Entretenimiento','animacion-entretenimiento',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(60,'b17f5475-5be6-11f0-8620-9a4383c8618e',11,NULL,'Payasos','payasos',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(61,'b17f548c-5be6-11f0-8620-9a4383c8618e',11,NULL,'Amplificación y Sonido','amplificacion-y-sonido',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(62,'b17f54a3-5be6-11f0-8620-9a4383c8618e',11,NULL,'Decoración/escenario','decoracion-escenario',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(63,'b17f54ba-5be6-11f0-8620-9a4383c8618e',11,NULL,'Servicio de DJ','servicio-de-dj',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(64,'b17f54d1-5be6-11f0-8620-9a4383c8618e',11,NULL,'Grupo musical/solista','grupo-musical-solista',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(65,'b17f54e8-5be6-11f0-8620-9a4383c8618e',12,NULL,'Influencer','influencer',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(66,'b17f54ff-5be6-11f0-8620-9a4383c8618e',12,NULL,'Editor de Videos','editor-de-videos',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(67,'b17f5516-5be6-11f0-8620-9a4383c8618e',12,NULL,'Editor de Imágenes','editor-de-imagenes',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(68,'b17f552d-5be6-11f0-8620-9a4383c8618e',12,NULL,'Manejo de Redes Sociales','manejo-de-redes-sociales',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(69,'b17f5544-5be6-11f0-8620-9a4383c8618e',13,NULL,'Mecánica General','mecanica-general',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(70,'b17f555b-5be6-11f0-8620-9a4383c8618e',13,NULL,'Aires Acondicionados','aires-acondicionados',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(71,'b17f5572-5be6-11f0-8620-9a4383c8618e',13,NULL,'Cámaras de Seguridad','camaras-de-seguridad',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(72,'b17f5589-5be6-11f0-8620-9a4383c8618e',13,NULL,'Calefones','calefones',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00'),
(73,'b17f55a0-5be6-11f0-8620-9a4383c8618e',13,NULL,'Sistemas Eléctricos','sistemas-electricos',NULL,NULL,NULL,NULL,'2025-07-15 12:00:00','2025-07-15 12:00:00');
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_ticket_questions`
--

DROP TABLE IF EXISTS `support_ticket_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_ticket_questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_ticket_questions`
--

LOCK TABLES `support_ticket_questions` WRITE;
/*!40000 ALTER TABLE `support_ticket_questions` DISABLE KEYS */;
INSERT INTO `support_ticket_questions` VALUES
(1,'What is the F Standard evaluation process?','The F Standard evaluation process consists of two phases. In Phase 1, you need to reach an 8% profit target without violating our trading rules. In Phase 2, you need to achieve a 5% profit target while continuing to adhere to our risk management rules. Once both phases are completed, you\'ll receive a funded account.','2022-12-04 17:05:33','2025-11-24 23:03:09'),
(2,'How long does the payout process take?','We process payouts within 24 hours of request. In fact, our average payout time is just 5 hours. If we exceed 24 hours, you\'ll receive a $1,000 compensation as part of our guaranteed payout promise.','2022-12-04 17:05:33','2025-11-24 23:03:09'),
(3,'Are there any time limits for completing the challenge?','No, there are no time limits for completing either phase of our evaluation process. You can take as long as you need to reach your profit targets, allowing you to trade at your own pace without pressure.','2022-12-04 17:05:33','2025-11-24 23:03:09'),
(17,'tesst','dfsdfdsf','2025-11-24 22:33:05','2025-11-24 23:03:09'),
(18,'dfdsfdsfdsf','dsfsfdsfdsffsdf','2025-11-24 23:03:09','2025-11-24 23:03:09');
/*!40000 ALTER TABLE `support_ticket_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES
(1,'d45fd1e7-a1e0-4d3f-954d-bd56dc95e48f','Design','design','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(2,'90bfec22-452f-42f4-b9aa-03c053aecc24','Development','development','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(3,'b375ca10-66e9-43c1-8593-a6bdcc8ab3d9','IT','it','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(4,'eecd9f5d-f023-4fe2-afcb-23b9ccc558b9','Programming','programming','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(5,'8f9fbd32-7878-443a-a531-faf1c4428b31','Travel','travel','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(6,'235b8c44-a340-4929-a48c-6238314d6af4','Music','music','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(7,'36ec1ef2-5bca-4d06-9446-a5d8ab6abdab','Digital marketing','digital-marketing','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(8,'d8dc6caa-b578-49f6-aaca-e25783afe34b','Science','science','2022-12-04 17:05:33','2022-12-04 17:05:33'),
(9,'346c01be-ab53-406f-acc4-73c5fddc0b6f','Math','math','2022-12-04 17:05:33','2022-12-04 17:05:33');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_members`
--

LOCK TABLES `team_members` WRITE;
/*!40000 ALTER TABLE `team_members` DISABLE KEYS */;
INSERT INTO `team_members` VALUES
(1,'uploads_demo/team_member/1.jpg','Arnold keens','CREATIVE DIRECTOR','2022-12-04 17:05:33','2025-01-13 06:32:57'),
(2,'uploads_demo/team_member/2.jpg','James Bond','Designer','2022-12-04 17:05:33','2025-01-13 06:32:57'),
(3,'uploads_demo/team_member/3.jpg','Ketty Perry','Customer Support','2022-12-04 17:05:33','2025-01-13 06:32:57'),
(4,'uploads_demo/team_member/4.jpg','Scarlett Johansson','CREATIVE DIRECTOR','2022-12-04 17:05:33','2025-01-13 06:32:57'),
(5,NULL,'arsh','Full','2025-01-13 06:32:57','2025-01-13 06:32:57');
/*!40000 ALTER TABLE `team_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(191) NOT NULL,
  `client_role` varchar(191) NOT NULL,
  `client_image_url` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES
(1,'Ivan Doe','CEO, Proshop','uploads/testimonials/1764044226-pk2e9qFBun.png','Working with Aasif has been exceptional. His expertise in Laravel development is commendable...','2024-12-09 09:33:49','2025-11-24 22:47:06'),
(2,'Mohammed Alqatqat','Marketing Director, Sky Forecasting','uploads/testimonials/1764044236-LpakkhYTRt.png','Aasif showed exceptional proficiency and professionalism in our Laravel project. His outstanding communication ensured all deadlines were met...','2024-12-09 09:34:25','2025-11-24 22:47:16'),
(3,'Nick Dinucci','CTO, Company C','uploads/testimonials/1764044246-spt9m8o0mJ.png','Working with Aasif on Upwork was a truly outstanding experience. Their professionalism, clear communication, and exceptional backend development skills were evident throughout the project...','2024-12-09 09:35:05','2025-11-24 22:47:26'),
(4,'Barra Cuadrada de Aluminio','sdsad','uploads/testimonials/1764045280-NiMtY2qUkQ.png','sdffddasdsadsas','2025-11-24 23:04:40','2025-11-24 23:04:40');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_departments`
--

DROP TABLE IF EXISTS `ticket_departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket_departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ticket_departments_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_departments`
--

LOCK TABLES `ticket_departments` WRITE;
/*!40000 ALTER TABLE `ticket_departments` DISABLE KEYS */;
INSERT INTO `ticket_departments` VALUES
(2,'0697c6e0-dfca-45df-aead-3500fe1cbfe3','it','2024-11-07 02:10:04','2024-11-07 02:10:04'),
(3,'043ebb7e-6573-45f2-a55e-7f6d0e6a249b','Arsh','2025-01-13 01:32:06','2025-01-13 01:32:06');
/*!40000 ALTER TABLE `ticket_departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_messages`
--

DROP TABLE IF EXISTS `ticket_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint(20) unsigned DEFAULT NULL,
  `sender_user_id` bigint(20) unsigned DEFAULT NULL,
  `reply_admin_user_id` bigint(20) unsigned DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_messages`
--

LOCK TABLES `ticket_messages` WRITE;
/*!40000 ALTER TABLE `ticket_messages` DISABLE KEYS */;
INSERT INTO `ticket_messages` VALUES
(5,6,NULL,1,'test',NULL,'2024-11-09 06:34:43','2024-11-09 06:34:43'),
(6,12,NULL,1,'gen is course lareaning platforma nd mlm',NULL,'2024-11-11 00:55:10','2024-11-11 00:55:10'),
(7,12,NULL,5,'how can i earn from it',NULL,'2024-11-11 00:56:38','2024-11-11 00:56:38'),
(8,12,NULL,1,'by refering course',NULL,'2024-11-11 01:27:40','2024-11-11 01:27:40'),
(11,12,NULL,1,'today',NULL,'2025-12-01 21:37:41','2025-12-01 21:37:41'),
(12,15,NULL,14,'please explain',NULL,'2025-12-01 21:44:03','2025-12-01 21:44:03');
/*!40000 ALTER TABLE `ticket_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_priorities`
--

DROP TABLE IF EXISTS `ticket_priorities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket_priorities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ticket_priorities_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_priorities`
--

LOCK TABLES `ticket_priorities` WRITE;
/*!40000 ALTER TABLE `ticket_priorities` DISABLE KEYS */;
INSERT INTO `ticket_priorities` VALUES
(1,'69cbc017-10dd-4d8e-823b-ce097a2dc092','Important','2024-06-07 07:38:48','2024-06-07 07:38:48'),
(2,'3531867a-fcda-4185-bf5d-8fda554cc86e','Important','2024-06-07 07:39:04','2024-06-07 07:39:04'),
(3,'b1ccffbc-01f7-4fbd-bd81-bedb258e3b3f','very important','2024-11-07 02:09:48','2024-11-07 02:09:48'),
(4,'f73327ed-90a8-4229-8ee9-278ff0e03f99','Arsh','2025-01-13 01:32:29','2025-01-13 01:32:29');
/*!40000 ALTER TABLE `ticket_priorities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_related_services`
--

DROP TABLE IF EXISTS `ticket_related_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket_related_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ticket_related_services_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_related_services`
--

LOCK TABLES `ticket_related_services` WRITE;
/*!40000 ALTER TABLE `ticket_related_services` DISABLE KEYS */;
INSERT INTO `ticket_related_services` VALUES
(4,'80e3aa9f-69d7-48d3-a39e-8ca644321269','sad','2024-11-07 02:09:27','2024-11-07 02:09:27'),
(5,'3e0ff5db-5b22-4872-8972-0121ba30b560','Arsh','2025-01-13 01:32:44','2025-01-13 01:32:44');
/*!40000 ALTER TABLE `ticket_related_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=Open, 2=Closed',
  `user_id` bigint(20) unsigned NOT NULL,
  `department_id` bigint(20) unsigned DEFAULT NULL,
  `related_service_id` bigint(20) unsigned DEFAULT NULL,
  `priority_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tickets_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES
(12,'430f9845-4c6f-42c5-92cb-e4725b543f76','TCK-672F59AF68576','aasif','aasifdev5@gmail.com','i need to know abot gen',1,5,2,4,1,'2024-11-09 07:16:39','2024-11-09 07:16:39'),
(13,'ed8262de-f76b-4ca9-b999-5f7327c23fad','TCK-672F5A7FB7BBA','aasif','aasifdev5@gmail.com','Welcome to Sky Forecasting',1,5,2,4,1,'2024-11-09 07:20:07','2024-11-09 07:20:07'),
(15,'0c6a2ba8-0c93-4374-8d4e-7000f964547a','TCK-692E59606D65B','tanzila','arstecht2a@gmail.com','how to purchase a plan',1,14,2,5,1,'2025-12-01 21:43:36','2025-12-01 21:43:36');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `top_up_requests`
--

DROP TABLE IF EXISTS `top_up_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `top_up_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `driver_id` bigint(20) unsigned NOT NULL,
  `wallet_id` bigint(20) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `method` enum('WHATSAPP','BANK_TRANSFER','QR') NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `proof_file_url` varchar(255) DEFAULT NULL,
  `reviewed_by_admin_id` bigint(20) unsigned DEFAULT NULL,
  `review_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `top_up_requests_driver_id_foreign` (`driver_id`),
  KEY `top_up_requests_wallet_id_foreign` (`wallet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `top_up_requests`
--

LOCK TABLES `top_up_requests` WRITE;
/*!40000 ALTER TABLE `top_up_requests` DISABLE KEYS */;
INSERT INTO `top_up_requests` VALUES
(1,7,1,500,'WHATSAPP','approved',NULL,1,NULL,'2026-04-09 12:17:55','2026-05-08 00:42:29'),
(2,7,1,500,'WHATSAPP','approved',NULL,1,'approve test','2026-04-09 12:40:33','2026-04-09 14:14:43'),
(3,7,1,50,'WHATSAPP','pending',NULL,NULL,NULL,'2026-04-14 19:53:57','2026-04-14 19:53:57'),
(4,17,9,50,'WHATSAPP','approved',NULL,1,NULL,'2026-04-29 21:39:38','2026-05-08 00:41:07'),
(5,37,25,100,'WHATSAPP','pending',NULL,NULL,NULL,'2026-05-18 21:06:35','2026-05-18 21:06:35'),
(6,57,40,200,'WHATSAPP','approved',NULL,1,NULL,'2026-05-22 08:55:08','2026-05-25 15:18:43');
/*!40000 ALTER TABLE `top_up_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `trips` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `conversation_id` bigint(20) DEFAULT NULL,
  `driver_id` bigint(20) unsigned DEFAULT NULL,
  `vehicle_id` bigint(20) unsigned DEFAULT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `service_type` enum('Taxi','Delivery') DEFAULT NULL,
  `origin_url` varchar(255) DEFAULT NULL,
  `origin_lat` decimal(10,8) DEFAULT NULL,
  `origin_lng` decimal(11,8) DEFAULT NULL,
  `origin_address` varchar(255) DEFAULT NULL,
  `destination_url` varchar(255) DEFAULT NULL,
  `destination_lat` decimal(10,8) DEFAULT NULL,
  `destination_lng` decimal(11,8) DEFAULT NULL,
  `destination_address` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `estimated_fare` decimal(10,2) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `scheduled_time` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `num_passengers` int(11) NOT NULL DEFAULT 1,
  `trunk_required` tinyint(1) NOT NULL DEFAULT 0,
  `stops` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`stops`)),
  `cargo_type` varchar(255) DEFAULT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `volume` decimal(8,2) DEFAULT NULL,
  `photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`photos`)),
  `notes` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'NEW',
  `accepted_at` timestamp NULL DEFAULT NULL,
  `driver_arrived_at` timestamp NULL DEFAULT NULL,
  `picked_up_at` timestamp NULL DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `eta` int(11) DEFAULT NULL,
  `distance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `actual_time_to_pickup` int(11) DEFAULT NULL,
  `cancellation_reason` varchar(255) DEFAULT NULL,
  `quote_id` bigint(20) unsigned DEFAULT NULL,
  `payment_id` bigint(20) unsigned DEFAULT NULL,
  `pod_id` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `cancelled_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trips`
--

LOCK TABLES `trips` WRITE;
/*!40000 ALTER TABLE `trips` DISABLE KEYS */;
INSERT INTO `trips` VALUES
(1,14,1,NULL,NULL,NULL,'Delivery','en el urubo',NULL,NULL,NULL,'https://www.google.com/maps?q=-17.8043209,-63.1566826',-17.80432090,-63.15668260,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,13,5.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-03-26 20:16:59','2026-04-15 14:08:14',NULL,NULL),
(2,14,1,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8042667,-63.156745',-17.80426670,-63.15674500,NULL,'https://www.google.com/maps?q=-17.780700836614,-63.192831650376',-17.78070084,-63.19283165,NULL,NULL,18.67,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,16,6.48,NULL,NULL,NULL,NULL,NULL,NULL,'2026-03-27 19:18:51','2026-04-15 14:08:14',NULL,NULL),
(3,14,1,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.780446704868,-63.160226047039',-17.78044670,-63.16022605,NULL,'https://www.google.com/maps?q=-17.776331380429,-63.18476356566',-17.77633138,-63.18476357,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,13,3.70,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-01 19:55:04','2026-04-15 14:08:14',NULL,NULL),
(4,14,1,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.789537117371,-63.155191205442',-17.78953712,-63.15519121,NULL,'https://www.google.com/maps?q=-17.785729761319,-63.158027976751',-17.78572976,-63.15802798,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,13,0.73,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-02 20:18:40','2026-04-15 14:08:14',NULL,NULL),
(5,11,2,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-16.5,-68.15',-16.50000000,-68.15000000,NULL,'https://www.google.com/maps?q=-16.7476,-62.0751',-16.74760000,-62.07510000,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-08 10:28:41','2026-04-15 14:08:14',NULL,NULL),
(6,11,2,NULL,2,NULL,'Delivery','https://www.google.com/maps?q=-21.5355,-64.7296',-21.53550000,-64.72960000,NULL,'https://www.google.com/maps?q=-16.5,-68.15',-16.50000000,-68.15000000,NULL,NULL,150.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-08 10:33:31','2026-04-15 14:11:32',NULL,NULL),
(7,14,1,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.77646100342,-63.15452132374',-17.77646100,-63.15452132,NULL,'https://www.google.com/maps?q=-17.764400873755,-63.159758672118',-17.76440087,-63.15975867,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,13,2.03,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-09 19:05:36','2026-04-15 14:08:14',NULL,NULL),
(8,14,1,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.797044962623,-63.157539814711',-17.79704496,-63.15753981,NULL,'https://www.google.com/maps?q=-17.781837401304,-63.164172917604',-17.78183740,-63.16417292,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,13,2.56,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-09 19:09:32','2026-04-15 14:08:14',NULL,NULL),
(9,14,NULL,NULL,NULL,NULL,NULL,'https://maps.google.com/?q=-17.8,-63.1',-17.80000000,-63.10000000,NULL,'https://maps.google.com/?q=-17.78,-63.18',-17.78000000,-63.18000000,NULL,NULL,30.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed',NULL,NULL,NULL,NULL,'2026-04-11 12:47:43',NULL,0.00,NULL,NULL,NULL,NULL,1,NULL,'2026-04-10 09:32:19','2026-04-11 12:47:43',NULL,NULL),
(10,34,3,7,7,NULL,'Delivery','https://www.google.com/maps?q=-17.795135947801,-63.157354742289',-17.79513595,-63.15735474,NULL,'https://www.google.com/maps?q=-17.764427055523,-63.191694393754',-17.76442706,-63.19169439,NULL,NULL,20.12,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed',NULL,NULL,NULL,NULL,'2026-04-15 20:54:11',17,6.99,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-14 20:59:52','2026-04-15 20:54:11',NULL,NULL),
(11,34,3,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.772750747582,-63.161482326686',-17.77275075,-63.16148233,NULL,'https://www.google.com/maps?q=-17.8045465,-63.1568291',-17.80454650,-63.15682910,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,13,5.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-14 21:23:25','2026-04-15 21:14:06',NULL,NULL),
(12,15,4,8,8,NULL,'Delivery','https://www.google.com/maps?q=-17.77504986,-63.1757232',-17.77504986,-63.17572320,NULL,'https://www.google.com/maps?q=-17.7890862,-63.1621833',-17.78908620,-63.16218330,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'assigned',NULL,NULL,NULL,NULL,NULL,13,2.97,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-14 22:50:13','2026-04-15 19:55:00',NULL,NULL),
(13,15,4,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8044461,-63.1566619',-17.80444610,-63.15666190,NULL,'https://www.google.com/maps?q=-17.793713111937,-63.155461773276',-17.79371311,-63.15546177,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,13,1.68,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-15 02:38:14','2026-04-15 14:11:32',NULL,NULL),
(14,15,4,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.777342820387,-63.157872073352',-17.77734282,-63.15787207,NULL,'https://www.google.com/maps?q=-17.794533550425,-63.155872486532',-17.79453355,-63.15587249,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,13,2.69,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-15 17:24:30','2026-04-23 16:33:48',NULL,NULL),
(15,35,5,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.699846068135,-63.167444206774',-17.69984607,-63.16744421,NULL,'https://www.google.com/maps?q=-17.901055339949,-63.167815357447',-17.90105534,-63.16781536,NULL,NULL,90.20,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed',NULL,NULL,NULL,NULL,'2026-04-15 21:18:09',76,31.32,NULL,NULL,NULL,NULL,3,NULL,'2026-04-15 17:51:46','2026-04-15 21:18:09',NULL,NULL),
(16,35,5,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.76345353819,-63.160494267941',-17.76345354,-63.16049427,NULL,'https://www.google.com/maps?q=-17.790055889687,-63.208068609238',-17.79005589,-63.20806861,NULL,NULL,23.55,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed',NULL,NULL,NULL,NULL,'2026-04-15 20:26:00',20,8.18,NULL,NULL,NULL,NULL,2,NULL,'2026-04-15 18:05:26','2026-04-15 20:26:00',NULL,NULL),
(17,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.797188616759,-63.156134001911',-17.79718862,-63.15613400,NULL,'https://www.google.com/maps?q=-17.783019931722,-63.149035535753',-17.78301993,-63.14903554,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,13,2.45,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-15 20:18:10','2026-04-15 20:47:53',NULL,NULL),
(18,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.776520387321,-63.163156360388',-17.77652039,-63.16315636,NULL,'https://www.google.com/maps?q=-17.797926997191,-63.158194944262',-17.79792700,-63.15819494,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,13,3.42,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-15 20:48:19','2026-04-15 20:49:35',NULL,NULL),
(19,34,3,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.794505776888,-63.154383189976',-17.79450578,-63.15438319,NULL,'https://www.google.com/maps?q=-17.788439230557,-63.155042342842',-17.78843923,-63.15504234,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,13,1.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-15 21:14:46','2026-04-15 21:16:56',NULL,NULL),
(20,34,3,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.775488828695,-63.163508400321',-17.77548883,-63.16350840,NULL,'https://www.google.com/maps?q=-17.781383734074,-63.156975544989',-17.78138373,-63.15697554,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,13,1.33,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-15 22:18:17','2026-04-18 18:34:33',NULL,NULL),
(21,14,1,NULL,NULL,NULL,'Delivery',NULL,-17.80432090,-63.15668260,'Cine Center, Santa Cruz',NULL,-17.78070084,-63.19283165,'Ventura Mall, Equipetrol',NULL,42.50,42.50,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-04-18 13:56:17',NULL,NULL,NULL,NULL,NULL,8.50,NULL,'Conductor canceló',NULL,NULL,NULL,NULL,'2026-04-17 16:25:57','2026-04-18 13:56:29','2026-04-18 13:56:28','driver'),
(22,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Plaza 24 de Septiembre, Santa Cruz',NULL,NULL,NULL,'Sambil Shopping, Santa Cruz',NULL,55.00,55.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-17 16:35:46','2026-04-17 16:35:46',NULL,NULL),
(23,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Plaza 24 de Septiembre, Santa Cruz',NULL,NULL,NULL,'Sambil Shopping, Santa Cruz',NULL,55.00,55.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-17 16:36:30','2026-04-17 16:36:30',NULL,NULL),
(24,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Plaza 24 de Septiembre, Santa Cruz',NULL,NULL,NULL,'Sambil Shopping, Santa Cruz',NULL,55.00,55.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-17 16:39:31','2026-04-17 16:39:31',NULL,NULL),
(25,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Plaza 24 de Septiembre, Santa Cruz',NULL,NULL,NULL,'Sambil Shopping, Santa Cruz',NULL,65.00,65.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-17 16:54:35','2026-04-17 16:54:35',NULL,NULL),
(26,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'Plaza 24 de Septiembre, Santa Cruz',NULL,NULL,NULL,'Sambil Shopping, Santa Cruz',NULL,65.00,65.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed',NULL,NULL,NULL,NULL,'2026-04-17 17:51:15',NULL,12.50,NULL,NULL,NULL,NULL,4,NULL,'2026-04-17 16:54:59','2026-04-17 17:51:15',NULL,NULL),
(27,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'Plaza 24 de Septiembre, Santa Cruz',NULL,NULL,NULL,'Sambil Shopping, Santa Cruz',NULL,185.00,165.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-04-18 11:55:04',NULL,NULL,NULL,NULL,NULL,12.50,NULL,'Driver cancelled',NULL,NULL,NULL,NULL,'2026-04-17 17:05:40','2026-04-18 11:55:34','2026-04-18 11:55:34','7'),
(28,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Plaza 24 de Septiembre, Santa Cruz',NULL,NULL,NULL,'Sambil Shopping, Santa Cruz',NULL,175.00,175.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-17 17:24:59','2026-04-17 17:24:59',NULL,NULL),
(29,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'la paz',NULL,NULL,NULL,'Sambil Shopping, Santa Cruz',NULL,145.00,145.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-17 17:38:23','2026-04-17 17:38:23',NULL,NULL),
(30,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Plaza 24 de Septiembre, Santa Cruz',NULL,NULL,NULL,'Sambil Shopping, Santa Cruz',NULL,55.00,55.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-17 19:02:26','2026-04-17 19:02:26',NULL,NULL),
(31,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Plaza 24 de Septiembre, Santa Cruz',NULL,NULL,NULL,'Sambil Shopping, Santa Cruz',NULL,57.00,57.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-17 19:03:28','2026-04-17 19:03:28',NULL,NULL),
(32,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'santa cruz',NULL,NULL,NULL,'la paz',NULL,17.00,17.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-17 19:04:16','2026-04-17 19:04:16',NULL,NULL),
(33,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Mumbai',NULL,NULL,NULL,'la paz',NULL,23.00,23.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-17 19:05:13','2026-04-17 19:05:13',NULL,NULL),
(34,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'El Alto',NULL,NULL,NULL,'la paz',NULL,63.00,63.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-04-18 11:41:41',NULL,NULL,NULL,NULL,NULL,12.50,NULL,'Driver cancelled',NULL,NULL,NULL,NULL,'2026-04-18 11:22:00','2026-04-18 11:47:37','2026-04-18 11:47:37','7'),
(35,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'El Alto',NULL,NULL,NULL,'la paz',NULL,63.00,63.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-04-18 13:25:46',NULL,NULL,NULL,NULL,NULL,12.50,NULL,'Conductor canceló',NULL,NULL,NULL,NULL,'2026-04-18 11:58:26','2026-04-18 13:25:56','2026-04-18 13:25:55','driver'),
(36,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Potosí ',NULL,NULL,NULL,'Tarija',NULL,140.00,140.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-04-18 13:19:58',NULL,NULL,NULL,NULL,NULL,12.50,NULL,'Conductor canceló',NULL,NULL,NULL,NULL,'2026-04-18 11:59:58','2026-04-18 13:20:05','2026-04-18 13:20:04','driver'),
(37,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'Potosí ',NULL,NULL,NULL,'Tarija',NULL,140.00,140.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-18 13:14:11',NULL,'2026-04-18 13:14:22','2026-04-18 13:18:38','2026-04-18 13:19:25',NULL,12.50,NULL,NULL,NULL,NULL,6,NULL,'2026-04-18 12:00:34','2026-04-18 13:19:25',NULL,NULL),
(38,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'Potosí ',NULL,NULL,NULL,'Tarija',NULL,180.00,180.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-04-18 12:47:03',NULL,NULL,NULL,NULL,NULL,12.50,NULL,'Conductor canceló',NULL,NULL,NULL,NULL,'2026-04-18 12:00:38','2026-04-18 12:47:11','2026-04-18 12:47:11','7'),
(39,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'Cobija ',NULL,NULL,NULL,'Yacuiba',NULL,199.00,199.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-18 12:44:59',NULL,'2026-04-18 12:45:09','2026-04-18 12:45:13','2026-04-18 12:46:31',NULL,12.50,NULL,NULL,NULL,NULL,5,NULL,'2026-04-18 12:44:52','2026-04-18 12:46:31',NULL,NULL),
(40,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'hyderabad ',NULL,NULL,NULL,'banglore',NULL,199.00,199.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-04-18 14:05:13',NULL,NULL,NULL,NULL,NULL,12.50,NULL,'Conductor canceló',NULL,NULL,NULL,NULL,'2026-04-18 14:05:07','2026-04-18 14:05:21','2026-04-18 14:05:21','driver'),
(41,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'gao ',NULL,NULL,NULL,'banglore',NULL,203.00,203.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-18 14:18:16',NULL,'2026-04-18 14:18:21','2026-04-18 14:18:26','2026-04-18 14:19:36',NULL,12.50,NULL,NULL,NULL,NULL,7,NULL,'2026-04-18 14:18:08','2026-04-18 14:19:36',NULL,NULL),
(42,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'santA cRUZ ',NULL,NULL,NULL,'banglore',NULL,333.00,333.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-04-18 14:21:12',NULL,NULL,NULL,NULL,NULL,12.50,NULL,'Conductor canceló',NULL,NULL,NULL,NULL,'2026-04-18 14:20:51','2026-04-18 14:21:24','2026-04-18 14:21:24','driver'),
(43,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Santa Cruz de la Sierra',NULL,NULL,NULL,'Oruro',NULL,454.00,454.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-18 14:58:37','2026-04-18 14:58:37',NULL,NULL),
(44,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Cochabamba',NULL,NULL,NULL,'La Paz',NULL,297.00,297.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-18 15:06:29','2026-04-18 15:06:29',NULL,NULL),
(45,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Sucre',NULL,NULL,NULL,'Oruro',NULL,297.00,297.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-19 09:05:46','2026-04-19 09:05:46',NULL,NULL),
(46,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Sucre',NULL,NULL,NULL,'Oruro',NULL,297.00,297.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-19 10:09:13','2026-04-19 10:09:13',NULL,NULL),
(47,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Sucre',NULL,NULL,NULL,'Oruro',NULL,297.00,297.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-19 10:09:32','2026-04-19 10:09:32',NULL,NULL),
(48,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Sucre',NULL,NULL,NULL,'Oruro',NULL,297.00,297.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-19 10:10:02','2026-04-19 10:10:02',NULL,NULL),
(49,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Sucre',NULL,NULL,NULL,'Oruro',NULL,297.00,297.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-19 10:41:10','2026-04-19 10:41:10',NULL,NULL),
(50,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Sucre',NULL,NULL,NULL,'Oruro',NULL,297.00,297.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-19 10:41:37','2026-04-19 10:41:37',NULL,NULL),
(51,15,NULL,NULL,NULL,NULL,'Delivery',NULL,NULL,NULL,'Sucre',NULL,NULL,NULL,'Oruro',NULL,297.00,297.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,12.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-19 10:41:54','2026-04-19 10:41:54',NULL,NULL),
(52,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'Sucre',NULL,NULL,NULL,'Oruro',NULL,297.00,297.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-23 10:02:40',NULL,'2026-04-23 10:02:43','2026-04-23 10:02:49','2026-04-23 10:03:32',NULL,12.50,NULL,NULL,NULL,NULL,14,NULL,'2026-04-19 10:43:49','2026-04-23 10:03:32',NULL,NULL),
(53,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'Potosí',NULL,NULL,NULL,'Tarija',NULL,368.00,368.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-22 10:02:12',NULL,'2026-04-22 10:02:16','2026-04-22 10:02:21','2026-04-22 10:02:51',NULL,12.50,NULL,NULL,NULL,NULL,13,NULL,'2026-04-19 11:44:27','2026-04-22 10:02:51',NULL,NULL),
(54,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'Trinidad',NULL,NULL,NULL,'Cobija',NULL,8.00,8.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-21 19:44:41',NULL,'2026-04-21 19:44:57','2026-04-21 19:45:01','2026-04-21 19:45:29',NULL,12.50,NULL,NULL,NULL,NULL,10,NULL,'2026-04-19 12:11:33','2026-04-21 19:45:29',NULL,NULL),
(55,15,NULL,7,NULL,NULL,'Delivery',NULL,NULL,NULL,'Sucre',NULL,NULL,NULL,'La Paz',NULL,19.00,19.00,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-19 13:28:02',NULL,'2026-04-21 18:45:19','2026-04-21 18:45:22','2026-04-21 19:00:34',NULL,12.50,NULL,NULL,NULL,NULL,8,NULL,'2026-04-19 12:12:28','2026-04-21 19:00:34',NULL,NULL),
(56,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.793284056222,-63.154462650418',-17.79328406,-63.15446265,NULL,'https://www.google.com/maps?q=-17.797157651321,-63.154574632645',-17.79715765,-63.15457463,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,13,1.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-20 23:43:47','2026-04-20 23:46:27',NULL,NULL),
(57,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.7967835118,-63.156120590866',-17.79678351,-63.15612059,NULL,'https://www.google.com/maps?q=-17.79865292465,-63.157456666231',-17.79865292,-63.15745667,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,13,1.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-20 23:47:18','2026-04-20 23:49:59',NULL,NULL),
(58,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.796233154969,-63.156061917543',-17.79623315,-63.15606192,NULL,'https://www.google.com/maps?q=-17.793291398702,-63.156944699585',-17.79329140,-63.15694470,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,13,1.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-21 17:36:59','2026-04-21 18:05:02',NULL,NULL),
(59,35,5,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8045319,-63.1568355',-17.80453190,-63.15683550,NULL,'https://www.google.com/maps?q=-17.7854363687,-63.158756867051',-17.78543637,-63.15875687,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-04-21 18:08:10',NULL,'2026-04-21 18:19:03','2026-04-21 18:19:08',NULL,13,2.99,NULL,'Conductor canceló',NULL,NULL,NULL,NULL,'2026-04-21 18:05:20','2026-04-27 20:53:28','2026-04-27 20:53:28','driver'),
(60,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8045217,-63.1568339',-17.80452170,-63.15683390,NULL,'https://www.google.com/maps?q=-17.790194441546,-63.156868591905',-17.79019444,-63.15686859,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,13,2.23,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-21 18:28:09','2026-04-21 18:50:45',NULL,NULL),
(61,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.796236985765,-63.156471960247',-17.79623699,-63.15647196,NULL,'https://www.google.com/maps?q=-17.745787221555,-63.169578909874',-17.74578722,-63.16957891,NULL,NULL,23.30,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,20,8.09,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-21 18:51:31','2026-04-21 18:52:34',NULL,NULL),
(62,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8044963,-63.1567857',-17.80449630,-63.15678570,NULL,'https://www.google.com/maps?q=-17.796800431095,-63.155897632241',-17.79680043,-63.15589763,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,13,1.21,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-21 18:55:40','2026-04-21 18:56:20',NULL,NULL),
(63,35,5,8,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8045221,-63.1568299',-17.80452210,-63.15682990,NULL,'https://www.google.com/maps?q=-17.726874951756,-63.161152414978',-17.72687495,-63.16115241,NULL,NULL,34.86,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-21 19:02:22',NULL,'2026-04-21 19:02:25','2026-04-21 19:02:30','2026-04-21 19:02:52',30,12.10,NULL,NULL,NULL,NULL,9,NULL,'2026-04-21 19:01:28','2026-04-21 19:02:52',NULL,NULL),
(64,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8045262,-63.1568307',-17.80452620,-63.15683070,NULL,'https://www.google.com/maps?q=-17.78939601104,-63.156811594963',-17.78939601,-63.15681159,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,13,2.36,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-21 19:14:51','2026-04-21 20:05:18',NULL,NULL),
(65,35,5,8,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.7807675621,-63.151852525771',-17.78076756,-63.15185253,NULL,'https://www.google.com/maps?q=-17.736919719126,-63.168746754527',-17.73691972,-63.16874675,NULL,NULL,20.94,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-21 20:30:39',NULL,'2026-04-21 20:30:44','2026-04-21 20:30:46','2026-04-21 20:31:15',18,7.27,NULL,NULL,NULL,NULL,11,NULL,'2026-04-21 20:29:24','2026-04-21 20:31:15',NULL,NULL),
(66,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8043923,-63.1566853',-17.80439230,-63.15668530,NULL,'https://www.google.com/maps?q=-17.783150826886,-63.158770948648',-17.78315083,-63.15877095,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,13,3.32,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-21 20:36:23','2026-04-21 20:37:42',NULL,NULL),
(67,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8041631,-63.1568526',-17.80416310,-63.15685260,NULL,'https://www.google.com/maps?q=-17.784728904209,-63.159233629704',-17.78472890,-63.15923363,NULL,NULL,15.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,13,3.05,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-21 20:38:09','2026-04-21 20:41:33',NULL,NULL),
(68,35,5,8,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8041526,-63.1568536',-17.80415260,-63.15685360,NULL,'https://www.google.com/maps?q=-17.739745526774,-63.170513659716',-17.73974553,-63.17051366,NULL,NULL,29.46,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-21 20:43:31',NULL,'2026-04-21 20:43:45','2026-04-21 20:43:56','2026-04-21 20:45:00',25,10.23,NULL,NULL,NULL,NULL,12,NULL,'2026-04-21 20:41:46','2026-04-21 20:45:00',NULL,NULL),
(69,15,4,7,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8043209,-63.1566826',-17.80432090,-63.15668260,'Cine Center, Santa Cruz','https://www.google.com/maps?q=-17.78070084,-63.19283165',-17.78070084,-63.19283165,'Ventura Mall, Equipetrol',NULL,42.50,42.50,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-23 10:14:27',NULL,'2026-04-23 10:14:32','2026-04-23 10:14:36','2026-04-23 10:15:24',NULL,8.50,NULL,NULL,NULL,NULL,15,NULL,'2026-04-23 10:14:10','2026-04-23 10:15:24',NULL,NULL),
(70,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8045216,-63.1568376',-17.80452160,-63.15683760,NULL,'https://www.google.com/maps?q=-17.722299468443,-63.157790601254',-17.72229947,-63.15779060,NULL,NULL,36.87,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,31,12.80,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-23 19:48:09','2026-04-23 19:50:37',NULL,NULL),
(71,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.730477579645,-63.159196414053',-17.73047758,-63.15919641,NULL,'https://www.google.com/maps?q=-17.874006878107,-63.176473528147',-17.87400688,-63.17647353,NULL,NULL,64.77,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,54,22.49,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-23 19:50:57','2026-04-23 19:52:41',NULL,NULL),
(72,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.788363249772,-63.157499246299',-17.78836325,-63.15749925,NULL,'https://www.google.com/maps?q=-17.832514444393,-63.177719078958',-17.83251444,-63.17771908,NULL,NULL,21.59,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,18,7.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-23 19:53:55','2026-04-23 19:56:48',NULL,NULL),
(73,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.82137832339,-63.165989108384',-17.82137832,-63.16598911,NULL,'https://www.google.com/maps?q=-17.77971399888,-63.161164484918',-17.77971400,-63.16116448,NULL,NULL,18.79,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,16,6.53,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-23 19:57:06','2026-04-23 19:58:50',NULL,NULL),
(74,35,5,8,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.777976244516,-63.159379139543',-17.77797624,-63.15937914,NULL,'https://www.google.com/maps?q=-17.823808923364,-63.161685839295',-17.82380892,-63.16168584,NULL,NULL,20.57,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-23 20:02:56',NULL,'2026-04-23 20:03:06','2026-04-23 20:03:34','2026-04-23 20:04:10',18,7.14,NULL,NULL,NULL,NULL,16,NULL,'2026-04-23 19:59:17','2026-04-23 20:04:10',NULL,NULL),
(75,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8045327,-63.1568403',-17.80453270,-63.15684030,NULL,'https://www.google.com/maps?q=-17.795659492359,-63.156767338514',-17.79565949,-63.15676734,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,4,1.38,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-23 20:13:11','2026-04-23 20:14:44',NULL,NULL),
(76,35,5,8,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.795609691846,-63.157610557973',-17.79560969,-63.15761056,NULL,'https://www.google.com/maps?q=-17.805228594757,-63.188527040184',-17.80522859,-63.18852704,NULL,NULL,13.88,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-23 20:16:33',NULL,'2026-04-23 20:17:02','2026-04-23 20:17:32','2026-04-23 20:20:04',12,4.82,NULL,NULL,NULL,NULL,17,NULL,'2026-04-23 20:15:01','2026-04-23 20:20:04',NULL,NULL),
(77,34,3,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8044085,-63.1567947',-17.80440850,-63.15679470,NULL,'https://www.google.com/maps?q=-17.798222284662,-63.157981038094',-17.79822228,-63.15798104,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Noufery','no_drivers',NULL,NULL,NULL,NULL,NULL,3,0.98,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-27 18:07:46','2026-04-27 18:14:58',NULL,NULL),
(78,34,3,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.80751,-63.156305',-17.80751000,-63.15630500,NULL,'https://www.google.com/maps?q=-17.800501249047,-63.155147619545',-17.80050125,-63.15514762,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,3,1.10,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-27 20:50:24','2026-04-27 20:55:04',NULL,NULL),
(79,34,3,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8075274,-63.1562549',-17.80752740,-63.15625490,NULL,'https://www.google.com/maps?q=-17.79979959033,-63.157999813557',-17.79979959,-63.15799981,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-27 20:55:47',NULL,'2026-04-27 20:56:03','2026-04-27 20:56:41','2026-04-27 20:57:23',3,1.23,NULL,NULL,NULL,NULL,18,NULL,'2026-04-27 20:55:15','2026-04-27 20:57:23',NULL,NULL),
(80,34,3,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.773444530731,-63.165953569114',-17.77344453,-63.16595357,NULL,'https://www.google.com/maps?q=-17.74553527546,-63.165669925511',-17.74553528,-63.16566993,NULL,NULL,12.51,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-28 00:51:11',NULL,'2026-04-28 00:51:30','2026-04-28 00:52:31','2026-04-28 00:53:14',11,4.34,NULL,NULL,NULL,NULL,19,NULL,'2026-04-28 00:49:33','2026-04-28 00:53:14',NULL,NULL),
(81,37,7,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5348176,-64.7487192',-21.53481760,-64.74871920,NULL,'https://www.google.com/maps?q=-21.535064697266,-64.738014221191',-21.53506470,-64.73801422,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,4,1.55,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-28 01:46:59','2026-04-28 01:54:24',NULL,NULL),
(82,38,8,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5348877,-64.7486916',-21.53488770,-64.74869160,NULL,'https://www.google.com/maps?q=-21.5197171,-64.73709',-21.51971710,-64.73709000,NULL,NULL,8.35,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Si','cancelled',NULL,NULL,NULL,NULL,NULL,7,2.90,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-28 01:48:25','2026-04-28 01:56:22',NULL,NULL),
(83,39,9,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.534812927246,-64.748611450195',-21.53481293,-64.74861145,NULL,'https://www.google.com/maps?q=-21.545608520508,-64.761993408203',-21.54560852,-64.76199341,NULL,NULL,7.39,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'priced',NULL,NULL,NULL,NULL,NULL,7,2.56,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-28 01:54:14','2026-04-28 01:55:10',NULL,NULL),
(84,38,8,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5350997,-64.7487816',-21.53509970,-64.74878160,NULL,'https://www.google.com/maps?q=-21.5350332,-64.729502',-21.53503320,-64.72950200,NULL,NULL,8.04,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,7,2.79,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-28 02:00:07','2026-04-28 02:05:42',NULL,NULL),
(85,38,8,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5348211,-64.7487213',-21.53482110,-64.74872130,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-28 02:06:56','2026-04-28 08:21:37',NULL,NULL),
(86,40,10,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5348517,-64.748715',-21.53485170,-64.74871500,NULL,'https://www.google.com/maps?q=-21.5204747,-64.7303725',-21.52047470,-64.73037250,NULL,NULL,10.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Llamar antes de llegar','no_drivers',NULL,NULL,NULL,NULL,NULL,9,3.47,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-28 02:12:07','2026-04-28 02:22:56',NULL,NULL),
(87,41,11,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5375355,-64.7299284',-21.53753550,-64.72992840,NULL,'https://www.google.com/maps?q=-21.548471426869,-64.731815457344',-21.54847143,-64.73181546,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,5,1.72,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-28 02:32:59','2026-04-28 02:35:59',NULL,NULL),
(88,41,11,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5375414,-64.7299977',-21.53754140,-64.72999770,NULL,'https://www.google.com/maps?q=-21.541967800934,-64.743764698505',-21.54196780,-64.74376470,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Pedir factura','cancelled',NULL,NULL,NULL,NULL,NULL,6,2.11,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-28 02:40:26','2026-04-28 02:41:53',NULL,NULL),
(89,44,13,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.51553131,-64.72509871',-21.51553131,-64.72509871,NULL,'https://www.google.com/maps?q=-21.5175189,-64.72685186',-21.51751890,-64.72685186,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Llamar antes de llegar','no_drivers',NULL,NULL,NULL,NULL,NULL,1,0.40,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-28 08:42:32','2026-04-28 08:49:18',NULL,NULL),
(90,35,5,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.795395485631,-63.154398612678',-17.79539549,-63.15439861,NULL,'https://www.google.com/maps?q=-17.755269269556,-63.155525811017',-17.75526927,-63.15552581,NULL,NULL,18.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-28 17:04:01',NULL,'2026-04-28 17:04:18','2026-04-28 17:04:51','2026-04-28 17:06:11',15,6.25,NULL,NULL,NULL,NULL,20,NULL,'2026-04-28 16:55:41','2026-04-28 17:06:11',NULL,NULL),
(91,35,5,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8044415,-63.1568008',-17.80444150,-63.15680080,NULL,'https://www.google.com/maps?q=-17.793495072592,-63.160015493631',-17.79349507,-63.16001549,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-28 19:36:23',NULL,'2026-04-28 19:37:09','2026-04-28 19:37:27','2026-04-28 19:37:54',5,1.77,NULL,NULL,NULL,NULL,21,NULL,'2026-04-28 19:35:08','2026-04-28 19:37:54',NULL,NULL),
(92,38,8,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5242806,-64.7217958',-21.52428060,-64.72179580,NULL,'https://www.google.com/maps?q=-21.5294756,-64.7302966',-21.52947560,-64.73029660,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,4,1.47,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-28 22:33:34','2026-04-28 22:35:39',NULL,NULL),
(93,51,15,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5178085,-64.7287604',-21.51780850,-64.72876040,NULL,'https://www.google.com/maps?q=-21.5078151,-64.7278334',-21.50781510,-64.72783340,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'priced',NULL,NULL,NULL,NULL,NULL,4,1.56,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-29 06:22:14','2026-04-29 06:23:41',NULL,NULL),
(94,53,17,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5347781,-64.7487647',-21.53477810,-64.74876470,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'pickup_set',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-29 15:08:25','2026-04-29 15:08:25',NULL,NULL),
(95,55,19,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.520612778011,-64.730347618461',-21.52061278,-64.73034762,NULL,'https://www.google.com/maps?q=-21.511897646944,-64.730061292648',-21.51189765,-64.73006129,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'priced',NULL,NULL,NULL,NULL,NULL,4,1.36,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-29 20:29:06','2026-04-29 20:30:12',NULL,NULL),
(96,54,18,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.520486,-64.7303743',-21.52048600,-64.73037430,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'pickup_set',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-29 20:30:48','2026-04-29 20:30:48',NULL,NULL),
(97,35,5,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.807907123662,-63.149954527617',-17.80790712,-63.14995453,NULL,'https://www.google.com/maps?q=-17.763286548623,-63.156984597445',-17.76328655,-63.15698460,NULL,NULL,20.23,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-04-29 21:47:58',NULL,'2026-04-29 21:49:30','2026-04-29 21:49:46',NULL,17,7.02,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-29 21:46:46','2026-04-29 22:14:06',NULL,NULL),
(98,35,5,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.794462360776,-63.155606612563',-17.79446236,-63.15560661,NULL,'https://www.google.com/maps?q=-17.747735720444,-63.168904669583',-17.74773572,-63.16890467,NULL,NULL,21.71,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Local h','cancelled',NULL,NULL,NULL,NULL,NULL,19,7.54,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-29 22:16:04','2026-04-29 22:17:34',NULL,NULL),
(99,35,5,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8041457,-63.1568114',-17.80414570,-63.15681140,NULL,'https://www.google.com/maps?q=-17.752681593617,-63.161824308336',-17.75268159,-63.16182431,NULL,NULL,23.17,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Local h','completed','2026-04-29 22:18:53',NULL,'2026-04-29 22:19:00','2026-04-29 22:19:05','2026-04-29 22:19:33',20,8.05,NULL,NULL,NULL,NULL,29,NULL,'2026-04-29 22:17:47','2026-04-29 22:19:33',NULL,NULL),
(100,58,20,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5213174,-64.7308902',-21.52131740,-64.73089020,NULL,'https://www.google.com/maps?q=-21.518635,-64.7403449',-21.51863500,-64.74034490,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Quiero un servicio','no_drivers',NULL,NULL,NULL,NULL,NULL,4,1.43,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-29 22:35:08','2026-04-29 22:41:19',NULL,NULL),
(101,59,21,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5226999,-64.74490356',-21.52269990,-64.74490356,NULL,'https://www.google.com/maps?q=-21.5103587,-64.7230404',-21.51035870,-64.72304040,NULL,NULL,10.67,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'priced',NULL,NULL,NULL,NULL,NULL,9,3.70,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-29 22:36:26','2026-04-29 22:50:02',NULL,NULL),
(102,60,22,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.53047,-64.7363133',-21.53047000,-64.73631330,NULL,'https://www.google.com/maps?q=-21.5290967,-64.7342217',-21.52909670,-64.73422170,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,1,0.37,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-29 22:40:32','2026-04-29 22:49:26',NULL,NULL),
(103,40,10,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5336417,-64.7165617',-21.53364170,-64.71656170,NULL,'https://www.google.com/maps?q=-21.5444196,-64.7034697',-21.54441960,-64.70346970,NULL,NULL,7.29,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,7,2.53,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-29 23:51:05','2026-04-30 00:00:02',NULL,NULL),
(104,40,10,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.540432,-64.7099741',-21.54043200,-64.70997410,NULL,'https://www.google.com/maps?q=-21.5356433,-64.72691',-21.53564330,-64.72691000,NULL,NULL,7.38,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,7,2.56,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 00:00:23','2026-04-30 00:10:53',NULL,NULL),
(105,40,10,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5330117,-64.7270533',-21.53301170,-64.72705330,NULL,'https://www.google.com/maps?q=-21.5204217,-64.7304083',-21.52042170,-64.73040830,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,5,2.02,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 00:11:32','2026-04-30 03:24:04',NULL,NULL),
(106,61,23,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.520569,-64.7305507',-21.52056900,-64.73055070,NULL,'https://www.google.com/maps?q=-21.5447758,-64.7349921',-21.54477580,-64.73499210,NULL,NULL,11.01,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'priced',NULL,NULL,NULL,NULL,NULL,10,3.82,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 00:36:04','2026-04-30 00:37:10',NULL,NULL),
(107,60,22,18,16,NULL,'Delivery','https://www.google.com/maps?q=-21.520476,-64.7303575',-21.52047600,-64.73035750,NULL,'https://www.google.com/maps?q=-21.5290967,-64.7342217',-21.52909670,-64.73422170,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Moto','cancelled',NULL,NULL,NULL,NULL,NULL,4,1.45,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 01:27:47','2026-04-30 01:41:57',NULL,NULL),
(108,35,5,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.797300028442,-63.15579906106',-17.79730003,-63.15579906,NULL,'https://www.google.com/maps?q=-17.735459057036,-63.159173280001',-17.73545906,-63.15917328,NULL,NULL,27.76,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-04-30 01:33:16',NULL,NULL,NULL,NULL,24,9.64,NULL,'Conductor canceló',NULL,NULL,NULL,NULL,'2026-04-30 01:31:02','2026-04-30 01:33:26','2026-04-30 01:33:26','driver'),
(109,35,5,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.795592772437,-63.1583994627',-17.79559277,-63.15839946,NULL,'https://www.google.com/maps?q=-17.755974934807,-63.158812187612',-17.75597493,-63.15881219,NULL,NULL,17.76,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Puerta roja número 16','completed','2026-04-30 01:35:43',NULL,'2026-04-30 01:36:28','2026-04-30 01:36:35','2026-04-30 01:37:22',15,6.17,NULL,NULL,NULL,NULL,30,NULL,'2026-04-30 01:34:40','2026-04-30 01:37:22',NULL,NULL),
(110,34,3,9,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.742858046894,-63.165762126446',-17.74285805,-63.16576213,NULL,'https://www.google.com/maps?q=-17.722299149078,-63.166981190443',-17.72229915,-63.16698119,NULL,NULL,9.23,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-04-30 01:42:01',NULL,'2026-04-30 01:43:30','2026-04-30 01:43:33','2026-04-30 01:43:59',8,3.21,NULL,NULL,NULL,NULL,31,NULL,'2026-04-30 01:41:27','2026-04-30 01:43:59',NULL,NULL),
(111,37,7,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5204758,-64.7303578',-21.52047580,-64.73035780,NULL,'https://www.google.com/maps?q=-21.589479446411,-64.721626281738',-21.58947945,-64.72162628,NULL,NULL,31.15,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,26,10.82,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 01:41:36','2026-04-30 01:43:03',NULL,NULL),
(112,60,22,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5205284,-64.7302822',-21.52052840,-64.73028220,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'pickup_set',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 01:48:46','2026-04-30 01:48:46',NULL,NULL),
(113,37,7,18,16,NULL,'Delivery','https://www.google.com/maps?q=-21.5348092,-64.748756',-21.53480920,-64.74875600,NULL,'https://www.google.com/maps?q=-21.534381,-64.7073072',-21.53438100,-64.70730720,NULL,NULL,17.29,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Llamar antes de llegar','cancelled',NULL,NULL,NULL,NULL,NULL,15,6.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 02:28:53','2026-04-30 02:39:45',NULL,NULL),
(114,37,7,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5348064,-64.748758',-21.53480640,-64.74875800,NULL,'https://www.google.com/maps?q=-21.531531531532,-64.714233702085',-21.53153153,-64.71423370,NULL,NULL,14.47,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,13,5.03,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 02:41:19','2026-04-30 02:42:17',NULL,NULL),
(115,37,7,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5348164,-64.7487592',-21.53481640,-64.74875920,NULL,'https://www.google.com/maps?q=-21.559143066406,-64.71036529541',-21.55914307,-64.71036530,NULL,NULL,19.37,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,17,6.73,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 02:56:35','2026-04-30 02:57:40',NULL,NULL),
(116,65,25,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5251658,-64.7295902',-21.52516580,-64.72959020,NULL,'https://www.google.com/maps?q=-21.5538309,-64.7166384',-21.55383090,-64.71663840,NULL,NULL,13.94,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'priced',NULL,NULL,NULL,NULL,NULL,12,4.84,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 03:26:01','2026-04-30 03:29:52',NULL,NULL),
(117,40,10,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5314617,-64.7520883',-21.53146170,-64.75208830,NULL,'https://www.google.com/maps?q=-21.527815,-64.722005',-21.52781500,-64.72200500,NULL,NULL,12.65,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,11,4.39,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 15:54:14','2026-04-30 21:29:21',NULL,NULL),
(118,41,11,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5420875,-64.7222012',-21.54208750,-64.72220120,NULL,'https://www.google.com/maps?q=-21.50812584595,-64.753830693662',-21.50812585,-64.75383069,NULL,NULL,20.15,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'priced',NULL,NULL,NULL,NULL,NULL,17,7.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 20:49:51','2026-04-30 20:50:45',NULL,NULL),
(119,40,10,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5423237,-64.7469487',-21.54232370,-64.74694870,NULL,'https://www.google.com/maps?q=-21.540435,-64.7269167',-21.54043500,-64.72691670,NULL,NULL,8.40,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,7,2.92,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 22:10:28','2026-04-30 22:23:53',NULL,NULL),
(120,40,10,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.548767089844,-64.732292175293',-21.54876709,-64.73229218,NULL,'https://www.google.com/maps?q=-21.5246067,-64.7238933',-21.52460670,-64.72389330,NULL,NULL,11.38,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,10,3.95,NULL,NULL,NULL,NULL,NULL,NULL,'2026-04-30 22:31:00','2026-04-30 23:09:50',NULL,NULL),
(121,68,27,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-21.5204866,-64.7303455',-21.52048660,-64.73034550,NULL,'https://www.google.com/maps?q=-21.520904406623,-64.740640260279',-21.52090441,-64.74064026,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'priced',NULL,NULL,NULL,NULL,NULL,4,1.49,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-04 08:16:05','2026-05-04 08:17:02',NULL,NULL),
(122,35,5,18,16,'moto_veloz','Delivery','https://www.google.com/maps?q=-17.794981438016,-63.156182952225',-17.79498144,-63.15618295,NULL,'https://www.google.com/maps?q=-17.768974323428,-63.155739717185',-17.76897432,-63.15573972,NULL,NULL,11.66,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'HEY AQUI ESTA EL MENSAJE','cancelled',NULL,NULL,NULL,NULL,NULL,10,4.05,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-04 20:36:02','2026-05-04 21:04:36',NULL,NULL),
(123,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.80431,-63.1566562',-17.80431000,-63.15665620,NULL,'https://www.google.com/maps?q=-17.773000420429,-63.155530169606',-17.77300042,-63.15553017,NULL,NULL,14.05,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,12,4.88,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-04 21:04:50','2026-05-04 21:05:47',NULL,NULL),
(124,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.8044415,-63.1567996',-17.80444150,-63.15679960,NULL,'https://www.google.com/maps?q=-17.725786580466,-63.167534396052',-17.72578658,-63.16753440,NULL,NULL,35.56,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,30,12.35,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-05 00:17:02','2026-05-05 00:18:01',NULL,NULL),
(125,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.8044403,-63.1567979',-17.80444030,-63.15679790,NULL,'https://www.google.com/maps?q=-17.729974921436,-63.165346384048',-17.72997492,-63.16534638,NULL,NULL,33.58,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,28,11.66,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-05 00:43:04','2026-05-05 00:44:04',NULL,NULL),
(126,35,5,9,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.8044416,-63.1567943',-17.80444160,-63.15679430,NULL,'https://www.google.com/maps?q=-17.774496215284,-63.157257847488',-17.77449622,-63.15725785,NULL,NULL,13.43,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'CON PARRILLA','completed','2026-05-05 00:48:25',NULL,'2026-05-05 00:50:15','2026-05-05 00:50:27','2026-05-05 00:51:15',12,4.66,NULL,NULL,NULL,NULL,32,NULL,'2026-05-05 00:44:58','2026-05-05 00:51:15',NULL,NULL),
(127,38,8,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-21.5349784,-64.7488282',-21.53497840,-64.74882820,NULL,'https://www.google.com/maps?q=-21.5324516,-64.7314692',-21.53245160,-64.73146920,NULL,NULL,7.33,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,7,2.54,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-05 03:51:09','2026-05-05 04:53:32',NULL,NULL),
(128,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.792290903213,-63.154530711472',-17.79229090,-63.15453071,NULL,'https://www.google.com/maps?q=-17.739351149019,-63.164949081838',-17.73935115,-63.16494908,NULL,NULL,24.15,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'#ATTACHMENT:location#Ubicación compartida#-17.803901#-63.1562694','cancelled',NULL,NULL,NULL,NULL,NULL,21,8.38,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-05 04:21:51','2026-05-05 05:11:10',NULL,NULL),
(129,38,8,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-21.5204483,-64.7304359',-21.52044830,-64.73043590,NULL,'https://www.google.com/maps?q=-21.5335466,-64.7271885',-21.53354660,-64.72718850,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,6,2.09,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-05 05:10:30','2026-05-05 05:22:06',NULL,NULL),
(130,38,8,NULL,NULL,'movil','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-05 18:24:21','2026-05-05 20:41:13',NULL,NULL),
(131,38,8,NULL,NULL,'movil','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-05 20:41:54','2026-05-09 07:24:24',NULL,NULL),
(132,35,5,NULL,NULL,'moto_veloz','Delivery','https://www.google.com/maps?q=-17.8044444,-63.156812',-17.80444440,-63.15681200,NULL,'https://www.google.com/maps?q=-17.753581728472,-63.16204559058',-17.75358173,-63.16204559,NULL,NULL,22.91,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,20,7.96,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-05 21:15:04','2026-05-05 21:16:40',NULL,NULL),
(133,35,5,NULL,NULL,'moto_veloz','Delivery','https://www.google.com/maps?q=-17.8044481,-63.1568131',-17.80444810,-63.15681310,NULL,'https://www.google.com/maps?q=-17.7876605856,-63.158463165164',-17.78766059,-63.15846317,NULL,NULL,7.56,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,7,2.62,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-05 21:17:32','2026-05-05 21:19:07',NULL,NULL),
(134,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.8044497,-63.1567979',-17.80444970,-63.15679790,NULL,'https://www.google.com/maps?q=-17.77600349131,-63.162689320743',-17.77600349,-63.16268932,NULL,NULL,13.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,11,4.51,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-05 21:19:28','2026-05-05 21:20:23',NULL,NULL),
(135,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.8043934,-63.1567808',-17.80439340,-63.15678080,NULL,'https://www.google.com/maps?q=-17.791829919996,-63.158025629818',-17.79182992,-63.15802563,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,5,1.96,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-05 21:20:41','2026-05-05 21:21:27',NULL,NULL),
(136,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.784146584765,-63.157305791974',-17.78414658,-63.15730579,NULL,'https://www.google.com/maps?q=-17.730535382055,-63.157501593232',-17.73053538,-63.15750159,NULL,NULL,24.04,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,21,8.35,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-06 00:02:11','2026-05-06 00:03:28',NULL,NULL),
(137,35,5,NULL,NULL,'movil','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-06 00:03:54','2026-05-06 00:04:59',NULL,NULL),
(138,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.8044472,-63.1568121',-17.80444720,-63.15681210,NULL,'https://www.google.com/maps?q=-17.730164615996,-63.156116232276',-17.73016462,-63.15611623,NULL,NULL,33.31,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,28,11.56,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-06 00:05:09','2026-05-06 00:06:12',NULL,NULL),
(139,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.805107611511,-63.156792484224',-17.80510761,-63.15679248,NULL,'https://www.google.com/maps?q=-17.77236729794,-63.163126856089',-17.77236730,-63.16312686,NULL,NULL,14.93,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'PARRILLA','no_drivers',NULL,NULL,NULL,NULL,NULL,13,5.18,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-06 00:06:31','2026-05-06 00:59:56',NULL,NULL),
(140,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.8044393,-63.1568007',-17.80443930,-63.15680070,NULL,'https://www.google.com/maps?q=-17.773265737356,-63.169677145779',-17.77326574,-63.16967715,NULL,NULL,15.02,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,13,5.21,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-06 01:00:42','2026-05-06 01:02:01',NULL,NULL),
(141,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.8044481,-63.1567935',-17.80444810,-63.15679350,NULL,'https://www.google.com/maps?q=-17.782400892072,-63.158007189631',-17.78240089,-63.15800719,NULL,NULL,9.90,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'PUERTA ROJA','no_drivers',NULL,NULL,NULL,NULL,NULL,9,3.44,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-06 04:43:16','2026-05-06 04:44:29',NULL,NULL),
(142,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.8043488,-63.156763',-17.80434880,-63.15676300,NULL,'https://www.google.com/maps?q=-17.7593547454,-63.152937814593',-17.75935475,-63.15293781,NULL,NULL,20.24,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,17,7.03,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-06 21:19:42','2026-05-06 21:21:32',NULL,NULL),
(143,35,5,NULL,NULL,'movil','Delivery','https://www.google.com/maps?q=-17.8041443,-63.1567966',-17.80414430,-63.15679660,NULL,'https://www.google.com/maps?q=-17.780379021478,-63.155462108552',-17.78037902,-63.15546211,NULL,NULL,10.67,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,9,3.70,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-06 21:28:06','2026-05-06 21:29:04',NULL,NULL),
(144,35,5,24,NULL,'moto_veloz','Delivery','https://www.google.com/maps?q=-17.8044476,-63.1568022',-17.80444760,-63.15680220,NULL,'https://www.google.com/maps?q=-17.756207707938,-63.151533007622',-17.75620771,-63.15153301,NULL,NULL,21.74,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Fuentes','completed','2026-05-06 22:58:09',NULL,'2026-05-06 22:58:17','2026-05-06 22:58:45','2026-05-06 22:59:09',19,7.55,NULL,NULL,NULL,NULL,33,NULL,'2026-05-06 22:56:38','2026-05-06 22:59:09',NULL,NULL),
(145,35,5,24,NULL,'moto_veloz','Delivery','https://www.google.com/maps?q=-17.8044406,-63.1567889',-17.80444060,-63.15678890,NULL,'https://www.google.com/maps?q=-17.780833649041,-63.158322684467',-17.78083365,-63.15832268,NULL,NULL,10.60,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-05-06 23:40:18',NULL,'2026-05-06 23:40:29','2026-05-06 23:40:47','2026-05-06 23:41:12',9,3.68,NULL,NULL,NULL,NULL,34,NULL,'2026-05-06 23:37:38','2026-05-06 23:41:12',NULL,NULL),
(146,40,10,NULL,NULL,'movil','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-07 04:19:59','2026-05-07 05:32:17',NULL,NULL),
(147,40,10,NULL,NULL,'movil','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-07 05:35:10','2026-05-07 05:37:31',NULL,NULL),
(148,40,10,NULL,NULL,'moto_restaurant','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-07 05:37:52','2026-05-07 05:38:56',NULL,NULL),
(149,40,10,NULL,NULL,'moto_taxi','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-07 05:39:12','2026-05-07 05:49:42',NULL,NULL),
(150,40,10,NULL,NULL,'moto_socorro','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-07 05:49:48','2026-05-07 20:09:47',NULL,NULL),
(151,40,10,NULL,NULL,'movil','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-07 20:32:18','2026-05-08 05:37:32',NULL,NULL),
(152,75,28,NULL,NULL,'movil','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'NEW',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-07 20:37:47','2026-05-07 20:37:47',NULL,NULL),
(153,40,10,NULL,NULL,'movil','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-08 05:37:53','2026-05-08 05:50:02',NULL,NULL),
(154,40,10,NULL,NULL,'movil','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'NEW',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-08 05:50:20','2026-05-08 05:50:20',NULL,NULL),
(155,34,3,NULL,NULL,'moto_restaurant','Delivery','https://www.google.com/maps?q=-17.8042535,-63.1568865',-17.80425350,-63.15688650,NULL,'https://www.google.com/maps?q=-17.80594276,-63.15466818',-17.80594276,-63.15466818,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Llamar al llegar 77357655','no_drivers',NULL,NULL,NULL,NULL,NULL,2,0.42,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-13 00:02:36','2026-05-13 00:05:35',NULL,NULL),
(156,15,4,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8043209,-63.1566826',-17.80432090,-63.15668260,'Cine Center, Santa Cruz','https://www.google.com/maps?q=-17.78070084,-63.19283165',-17.78070084,-63.19283165,'Ventura Mall, Equipetrol',NULL,42.50,42.50,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,8.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-17 11:46:52','2026-05-17 11:46:52',NULL,NULL),
(157,15,4,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8043209,-63.1566826',-17.80432090,-63.15668260,'Cine Center, Santa Cruz','https://www.google.com/maps?q=-17.78070084,-63.19283165',-17.78070084,-63.19283165,'Ventura Mall, Equipetrol',NULL,42.50,42.50,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'searching',NULL,NULL,NULL,NULL,NULL,NULL,8.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-17 11:52:17','2026-05-17 11:52:17',NULL,NULL),
(158,35,5,37,NULL,'moto_taxi','Delivery','https://www.google.com/maps?q=-17.8044233,-63.1567919',-17.80442330,-63.15679190,NULL,'https://www.google.com/maps?q=-17.800857504192,-63.156786113977',-17.80085750,-63.15678611,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-05-17 22:56:07',NULL,'2026-05-17 22:56:56','2026-05-17 22:58:40','2026-05-17 23:04:46',2,0.56,NULL,NULL,NULL,NULL,35,NULL,'2026-05-17 22:18:57','2026-05-17 23:04:46',NULL,NULL),
(159,35,5,NULL,NULL,'automovil','Delivery','https://www.google.com/maps?q=-17.8044469,-63.1567963',-17.80444690,-63.15679630,NULL,'https://www.google.com/maps?q=-17.786847139027,-63.156946375966',-17.78684714,-63.15694638,NULL,NULL,7.89,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'no_drivers',NULL,NULL,NULL,NULL,NULL,7,2.74,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-18 00:29:00','2026-05-18 00:30:38',NULL,NULL),
(160,15,4,7,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8043209,-63.1566826',-17.80432090,-63.15668260,'Cine Center, Santa Cruz','https://www.google.com/maps?q=-17.78070084,-63.19283165',-17.78070084,-63.19283165,'Ventura Mall, Equipetrol',NULL,42.50,42.50,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-05-18 13:51:54',NULL,'2026-05-18 13:52:06','2026-05-18 13:52:16','2026-05-18 13:53:04',NULL,8.50,NULL,NULL,NULL,NULL,36,NULL,'2026-05-18 13:51:39','2026-05-18 13:53:04',NULL,NULL),
(161,35,5,NULL,NULL,'moto','Delivery','https://www.google.com/maps?q=-17.8044559,-63.1568032',-17.80445590,-63.15680320,NULL,'https://www.google.com/maps?q=-17.778987036636,-63.159084096551',-17.77898704,-63.15908410,NULL,NULL,11.46,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Si','no_drivers',NULL,NULL,NULL,NULL,NULL,10,3.98,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-18 20:38:21','2026-05-18 20:41:33',NULL,NULL),
(162,35,5,NULL,NULL,'moto','Delivery','https://www.google.com/maps?q=-17.8044471,-63.156796',-17.80444710,-63.15679600,NULL,'https://www.google.com/maps?q=-17.740490531128,-63.160995841026',-17.74049053,-63.16099584,NULL,NULL,28.73,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'priced',NULL,NULL,NULL,NULL,NULL,24,9.98,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-18 21:26:02','2026-05-18 21:28:30',NULL,NULL),
(163,99,30,NULL,NULL,'automovil','Delivery','https://www.google.com/maps?q=-21.5553271,-64.6953215',-21.55532710,-64.69532150,NULL,'https://www.google.com/maps?q=-21.5204902,-64.7303562',-21.52049020,-64.73035620,NULL,NULL,21.39,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Si','cancelled',NULL,NULL,NULL,NULL,NULL,18,7.43,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-19 19:53:14','2026-05-22 02:43:08',NULL,NULL),
(164,97,29,NULL,NULL,'automovil','Delivery','https://www.google.com/maps?q=-17.8044208,-63.1568549',-17.80442080,-63.15685490,NULL,'https://www.google.com/maps?q=-17.801220143106,-63.158505409956',-17.80122014,-63.15850541,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,2,0.56,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-19 20:31:06','2026-05-20 20:25:23',NULL,NULL),
(165,97,29,NULL,NULL,'automovil','Delivery','https://www.google.com/maps?q=-21.536045521223,-64.735199399292',-21.53604552,-64.73519940,NULL,'https://www.google.com/maps?q=-21.543902858913,-64.700591862202',-21.54390286,-64.70059186,NULL,NULL,14.86,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,13,5.16,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-20 20:25:43','2026-05-20 20:37:58',NULL,NULL),
(166,97,29,55,NULL,'automovil','Delivery','https://www.google.com/maps?q=-21.527641332437,-64.730102531612',-21.52764133,-64.73010253,NULL,'https://www.google.com/maps?q=-21.549389488971,-64.733978994191',-21.54938949,-64.73397899,NULL,NULL,9.88,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-05-20 21:06:01',NULL,'2026-05-20 21:07:41','2026-05-20 21:08:41','2026-05-20 21:12:13',9,3.43,NULL,NULL,NULL,NULL,37,NULL,'2026-05-20 21:00:24','2026-05-20 21:12:13',NULL,NULL),
(167,114,31,62,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.5205583,-64.7300533',-21.52055830,-64.73005330,NULL,'https://www.google.com/maps?q=-21.5100458,-64.7222159',-21.51004580,-64.72221590,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Llamar al llegar','completed','2026-05-21 21:36:39',NULL,'2026-05-21 21:36:41','2026-05-21 21:39:25','2026-05-21 21:40:16',5,1.99,NULL,NULL,NULL,NULL,38,NULL,'2026-05-21 21:13:43','2026-05-21 21:40:16',NULL,NULL),
(168,115,32,NULL,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.5245717,-64.7392821',-21.52457170,-64.73928210,NULL,'https://www.google.com/maps?q=-21.5100458,-64.7222159',-21.51004580,-64.72221590,NULL,NULL,9.65,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,9,3.35,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-21 21:16:53','2026-05-21 21:22:07',NULL,NULL),
(169,115,32,NULL,NULL,'moto','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'NEW',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-21 21:25:29','2026-05-21 21:25:29',NULL,NULL),
(170,114,31,NULL,NULL,'automovil','Delivery','https://www.google.com/maps?q=-21.5204833,-64.73045',-21.52048330,-64.73045000,NULL,'https://www.google.com/maps?q=-21.5310283,-64.7193917',-21.53102830,-64.71939170,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,6,2.29,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-21 21:40:41','2026-05-21 22:09:38',NULL,NULL),
(171,114,31,NULL,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.5347433,-64.715365',-21.53474330,-64.71536500,NULL,'https://www.google.com/maps?q=-21.5607417,-64.6746117',-21.56074170,-64.67461170,NULL,NULL,20.61,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,18,7.16,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-21 22:10:59','2026-05-21 22:29:58',NULL,NULL),
(172,114,31,NULL,NULL,'moto','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-22 00:04:58','2026-05-22 02:42:47',NULL,NULL),
(173,114,31,55,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.5348123,-64.7487154',-21.53481230,-64.74871540,NULL,'https://www.google.com/maps?q=-21.536258,-64.7199694',-21.53625800,-64.71996940,NULL,NULL,12.01,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Llamar al llegar','completed','2026-05-22 02:50:41',NULL,'2026-05-22 02:52:45','2026-05-22 02:53:18','2026-05-22 03:00:20',11,4.17,NULL,NULL,NULL,NULL,40,NULL,'2026-05-22 02:42:55','2026-05-22 03:00:20',NULL,NULL),
(174,99,30,NULL,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.5204824,-64.730364',-21.52048240,-64.73036400,NULL,'https://www.google.com/maps?q=-21.5273791,-64.7374681',-21.52737910,-64.73746810,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,4,1.49,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-22 02:44:18','2026-05-22 02:48:47',NULL,NULL),
(175,99,30,55,NULL,'automovil','Delivery','https://www.google.com/maps?q=-21.5204897,-64.7303617',-21.52048970,-64.73036170,NULL,'https://www.google.com/maps?q=-21.5273791,-64.7374681',-21.52737910,-64.73746810,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-05-22 02:53:50',NULL,'2026-05-22 02:54:17','2026-05-22 02:54:35','2026-05-22 02:55:21',4,1.49,NULL,NULL,NULL,NULL,39,NULL,'2026-05-22 02:49:20','2026-05-22 02:55:21',NULL,NULL),
(176,114,31,62,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.5348352,-64.7486536',-21.53483520,-64.74865360,NULL,'https://www.google.com/maps?q=-21.5196493,-64.7275202',-21.51964930,-64.72752020,NULL,NULL,11.14,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Llamar al llegar','completed','2026-05-22 02:55:11',NULL,'2026-05-22 02:56:46','2026-05-22 02:57:46','2026-05-22 03:00:24',10,3.87,NULL,NULL,NULL,NULL,41,NULL,'2026-05-22 02:53:21','2026-05-22 03:00:24',NULL,NULL),
(177,99,30,NULL,NULL,'automovil','Delivery','https://www.google.com/maps?q=-21.5204885,-64.7303574',-21.52048850,-64.73035740,NULL,'https://www.google.com/maps?q=-21.5340183,-64.73616',-21.53401830,-64.73616000,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,6,2.27,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-22 02:57:01','2026-05-22 03:01:38',NULL,NULL),
(178,99,30,55,NULL,'automovil','Delivery','https://www.google.com/maps?q=-21.5204856,-64.7303573',-21.52048560,-64.73035730,NULL,'https://www.google.com/maps?q=-21.540683746338,-64.716743469238',-21.54068375,-64.71674347,NULL,NULL,10.69,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled','2026-05-22 03:04:13',NULL,NULL,NULL,NULL,9,3.71,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-22 03:02:35','2026-05-22 03:51:23',NULL,NULL),
(179,99,30,62,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.5204828,-64.73036',-21.52048280,-64.73036000,NULL,'https://www.google.com/maps?q=-21.5347948,-64.7489731',-21.53479480,-64.74897310,NULL,NULL,10.07,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,'Llamar al llegar','completed','2026-05-22 03:54:36',NULL,'2026-05-22 03:57:08','2026-05-22 03:57:23','2026-05-22 03:59:47',9,3.50,NULL,NULL,NULL,NULL,42,NULL,'2026-05-22 03:51:53','2026-05-22 03:59:47',NULL,NULL),
(180,97,29,54,NULL,'automovil','Delivery','https://www.google.com/maps?q=-21.520800231336,-64.741416089237',-21.52080023,-64.74141609,NULL,'https://www.google.com/maps?q=-21.538467167165,-64.723761789501',-21.53846717,-64.72376179,NULL,NULL,10.81,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-05-22 04:09:09',NULL,'2026-05-22 04:09:40','2026-05-22 04:09:51','2026-05-22 04:13:22',10,3.75,NULL,NULL,NULL,NULL,43,NULL,'2026-05-22 04:04:52','2026-05-22 04:13:22',NULL,NULL),
(181,116,33,NULL,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.5204887,-64.7303554',-21.52048870,-64.73035540,NULL,'https://www.google.com/maps?q=-21.52145864,-64.73372524',-21.52145864,-64.73372524,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,2,0.51,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-22 04:18:58','2026-05-22 05:14:36',NULL,NULL),
(182,114,31,NULL,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.502353668213,-64.735260009766',-21.50235367,-64.73526001,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'cancelled',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-22 05:08:12','2026-05-22 05:10:03',NULL,NULL),
(183,116,33,61,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.5205229,-64.7302993',-21.52052290,-64.73029930,NULL,'https://www.google.com/maps?q=-21.5382793,-64.7114574',-21.53827930,-64.71145740,NULL,NULL,11.19,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-05-22 05:40:49',NULL,'2026-05-22 05:41:10','2026-05-22 05:41:34','2026-05-22 05:42:34',10,3.88,NULL,NULL,NULL,NULL,44,NULL,'2026-05-22 05:37:57','2026-05-22 05:42:34',NULL,NULL),
(184,116,33,61,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.52000127,-64.74186974',-21.52000127,-64.74186974,NULL,'https://www.google.com/maps?q=-21.5205083,-64.7303226',-21.52050830,-64.73032260,NULL,NULL,7.00,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'picked_up','2026-05-22 05:45:48',NULL,'2026-05-22 05:45:53',NULL,NULL,5,1.67,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-22 05:43:55','2026-05-22 05:45:53',NULL,NULL),
(185,118,34,NULL,NULL,'automovil','Delivery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'NEW',NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-22 08:53:52','2026-05-22 08:53:52',NULL,NULL),
(186,114,31,NULL,NULL,'moto','Delivery','https://www.google.com/maps?q=-21.5090917,-64.7392',-21.50909170,-64.73920000,NULL,'https://www.google.com/maps?q=-21.49641616989,-64.717279225588',-21.49641617,-64.71727923,NULL,NULL,10.77,NULL,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'priced',NULL,NULL,NULL,NULL,NULL,9,3.74,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-22 18:01:00','2026-05-22 18:02:28',NULL,NULL),
(187,15,4,57,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8043209,-63.1566826',-17.80432090,-63.15668260,'Cine Center, Santa Cruz','https://www.google.com/maps?q=-17.78070084,-63.19283165',-17.78070084,-63.19283165,'Ventura Mall, Equipetrol',NULL,42.50,42.50,NULL,NULL,'cash',1,0,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-05-25 15:46:01',NULL,'2026-05-25 15:46:04','2026-05-25 15:46:08','2026-05-25 15:50:47',NULL,8.50,NULL,NULL,NULL,NULL,45,NULL,'2026-05-25 15:44:33','2026-05-25 15:50:47',NULL,NULL),
(188,15,4,57,NULL,NULL,'Taxi','https://www.google.com/maps?q=-17.786934,-63.181237',-17.78693400,-63.18123700,'Plaza 24 de Septiembre, Santa Cruz','https://www.google.com/maps?q=-17.644594,-63.134850',-17.64459400,-63.13485000,'Aeropuerto Internacional Viru Viru',NULL,85.00,85.00,NULL,NULL,'cash',2,1,NULL,NULL,NULL,NULL,NULL,NULL,'completed','2026-05-25 15:45:20',NULL,'2026-05-25 15:45:26','2026-05-25 15:45:30','2026-05-25 15:45:32',NULL,18.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-25 15:44:33','2026-05-25 15:45:32',NULL,NULL),
(189,15,4,57,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.78070084,-63.19283165',-17.78070084,-63.19283165,'Ventura Mall, Equipetrol, Santa Cruz','https://www.google.com/maps?q=-17.794852,-63.191425',-17.79485200,-63.19142500,'Barrio Nuevo, Av. Beni, Santa Cruz',NULL,25.00,25.00,NULL,NULL,'cash',1,1,NULL,'Paquete pequeño',2.50,NULL,NULL,'Llamar al llegar. Timbre #3','completed','2026-05-25 15:55:20',NULL,'2026-05-25 15:55:24','2026-05-25 15:55:28','2026-05-25 15:56:04',NULL,3.20,NULL,NULL,NULL,NULL,46,NULL,'2026-05-25 15:54:25','2026-05-25 15:56:04',NULL,NULL),
(190,15,4,57,NULL,NULL,'Taxi','https://www.google.com/maps?q=-17.786934,-63.181237',-17.78693400,-63.18123700,'Plaza 24 de Septiembre, Centro, Santa Cruz','https://www.google.com/maps?q=-17.644594,-63.134850',-17.64459400,-63.13485000,'Aeropuerto Internacional Viru Viru',NULL,65.00,65.00,NULL,NULL,'cash',3,1,NULL,NULL,NULL,NULL,NULL,'Necesito maletas en el baúl','completed','2026-05-25 15:54:35',NULL,'2026-05-25 15:54:39','2026-05-25 15:54:44','2026-05-25 15:54:47',NULL,18.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-25 15:54:25','2026-05-25 15:54:47',NULL,NULL),
(191,15,4,NULL,NULL,NULL,'Delivery','https://www.google.com/maps?q=-17.8043209,-63.1566826',-17.80432090,-63.15668260,'Cine Center, Av. San Martín, Santa Cruz','https://www.google.com/maps?q=-17.803250,-63.166344',-17.80325000,-63.16634400,'Plaza Del Estudiante, Av. San Martín, Santa Cruz',NULL,18.00,18.00,NULL,NULL,'cash',1,0,NULL,'Documentos',0.50,NULL,NULL,'Entregar en recepción del edificio','searching',NULL,NULL,NULL,NULL,NULL,NULL,1.80,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-25 15:54:25','2026-05-25 15:54:25',NULL,NULL),
(192,15,4,57,NULL,NULL,'Delivery','https://maps.google.com/?q=-17.78070084,-63.19283165',-17.78070084,-63.19283165,'Ventura Mall, Equipetrol, Santa Cruz','https://maps.google.com/?q=-17.794852,-63.191425',-17.79485200,-63.19142500,'Barrio Nuevo, Av. Beni, Santa Cruz',NULL,28.50,28.50,NULL,NULL,'cash',1,1,NULL,'Paquete pequeño',2.50,NULL,NULL,'Llamar al llegar. Timbre #3','completed','2026-05-26 15:23:56',NULL,'2026-05-26 15:24:00','2026-05-26 15:24:04','2026-05-26 15:24:48',NULL,3.20,NULL,NULL,NULL,NULL,47,NULL,'2026-05-26 15:23:13','2026-05-26 15:24:48',NULL,NULL),
(193,15,4,57,NULL,NULL,'Taxi','https://maps.google.com/?q=-17.786934,-63.181237',-17.78693400,-63.18123700,'Plaza 24 de Septiembre, Centro, Santa Cruz','https://maps.google.com/?q=-17.644594,-63.134850',-17.64459400,-63.13485000,'Aeropuerto Internacional Viru Viru',NULL,75.00,75.00,NULL,NULL,'cash',2,1,NULL,NULL,NULL,NULL,NULL,'Necesito espacio para maletas en el baúl','completed','2026-05-26 15:23:35',NULL,'2026-05-26 15:23:40','2026-05-26 15:23:43','2026-05-26 15:23:46',NULL,18.50,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-26 15:23:13','2026-05-26 15:23:46',NULL,NULL);
/*!40000 ALTER TABLE `trips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_balances`
--

DROP TABLE IF EXISTS `user_balances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_balances` (
  `user_id` int(10) unsigned NOT NULL,
  `balance` decimal(18,2) NOT NULL DEFAULT 0.00 COMMENT 'Available INR balance',
  `locked_balance` decimal(18,2) NOT NULL DEFAULT 0.00 COMMENT 'Balance locked in open orders',
  `total_deposited` decimal(18,2) NOT NULL DEFAULT 0.00,
  `total_withdrawn` decimal(18,2) NOT NULL DEFAULT 0.00,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_balances`
--

LOCK TABLES `user_balances` WRITE;
/*!40000 ALTER TABLE `user_balances` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_balances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logins`
--

DROP TABLE IF EXISTS `user_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_logins` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT 0,
  `user_ip` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `country_code` varchar(40) DEFAULT NULL,
  `longitude` varchar(40) DEFAULT NULL,
  `latitude` varchar(40) DEFAULT NULL,
  `browser` varchar(40) DEFAULT NULL,
  `os` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logins`
--

LOCK TABLES `user_logins` WRITE;
/*!40000 ALTER TABLE `user_logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `fcm_token` varchar(255) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `last_activity` timestamp NULL DEFAULT NULL,
  `last_whatsapp_message_at` timestamp NULL DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `mode` varchar(255) NOT NULL DEFAULT 'light',
  `account_type` varchar(255) DEFAULT NULL,
  `account_balance` varchar(255) DEFAULT NULL,
  `is_subscribed` tinyint(1) DEFAULT NULL,
  `refer` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT '0',
  `is_online` tinyint(4) DEFAULT 0,
  `last_seen` timestamp NULL DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `role` varchar(255) DEFAULT 'Trabajador',
  `permissions` varchar(255) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `custom_password` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(191) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `is_system` tinyint(4) DEFAULT 0,
  `country` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `language` varchar(191) NOT NULL DEFAULT '''en''',
  `is_super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_affiliate` tinyint(1) NOT NULL DEFAULT 0,
  `referral_code` varchar(255) DEFAULT NULL,
  `affiliate_earnings` decimal(12,2) NOT NULL DEFAULT 0.00,
  `commission_rate` decimal(5,2) NOT NULL DEFAULT 18.00,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_referral_code_unique` (`referral_code`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,NULL,NULL,NULL,NULL,1,NULL,NULL,'1777533671_WhatsApp Image 2026-03-02 at 09.51.52.jpeg','dark','admin',NULL,0,NULL,NULL,1,'2026-06-03 06:18:16',NULL,'1',NULL,'SUPER ADMINISTRADOR','admin@avaroa.com',NULL,'2023-03-23 07:45:02','$2y$12$/cMaB9VtW3FNj1Gt1YBNuOxXW0uPZSZ6PhW4KJpSw2DN8YFo51RcS','987654321','8878326803',NULL,'bolivia',NULL,NULL,NULL,NULL,'sdfafa',1,NULL,'127.0.0.1',1,'1',NULL,NULL,'es',1,'2023-03-23 07:45:02','2026-06-03 06:18:16',0,NULL,0.00,18.00),
(91,NULL,NULL,NULL,NULL,1,'2026-05-19 02:49:10',NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Marcelo vidaurre','vidaurremarcelo87@gmail.com',NULL,NULL,'$2y$10$9TpMuDGeN/mrYOyZu8HNPOvnCk7pTBWmnuK4yV0fTECcMkOD8Z.lW',NULL,'59167796539',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 02:44:47','2026-05-19 02:50:29',0,NULL,0.00,18.00),
(92,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Carlos villca','carlos_villc@hotmail.com',NULL,NULL,'$2y$10$HSa9HUh0x5nKk1/7tCfEiuKSxFTY5mLHVXv/9PCvk2UBKOa2S0HxS',NULL,'59178224888',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 02:55:57','2026-05-19 02:55:57',0,NULL,0.00,18.00),
(93,NULL,NULL,NULL,NULL,1,'2026-05-19 03:11:38',NULL,'uploads/drivers/44/profile/1779140686-T7Y2Omagc5.jpg','light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Reyder vallejos cartillo','reydervallejos412@gmail.com',NULL,NULL,'$2y$10$U.maQoG1ZpeXjhhhMRQ.3.yhvlCkl.zWnInhf2EhqU.4.2YEVKYkG',NULL,'59163792820',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 03:06:05','2026-05-19 19:03:42',0,NULL,0.00,18.00),
(94,NULL,NULL,NULL,NULL,1,'2026-05-21 15:55:48',NULL,'uploads/drivers/45/profile/1779314009-edxJOl7Wze.jpg','light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Manuel Cardozo','manuelcarlo946@gmail.com',NULL,NULL,'$2y$10$81hKkh/BZP1kOKGpRlwhFeSAdgfOrFFA511e0IATMxgyvD9QGrDUu',NULL,'59173458917',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 03:13:13','2026-05-21 15:55:48',0,NULL,0.00,18.00),
(95,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Alvaro Quiroga Aguirre','alvaritoquiroga1999@gmail.com',NULL,NULL,'$2y$10$fik2KOLhznh2ERDaV5sbp.d0ERNCaEESzb6jMQRkhXl1MF//WycOm',NULL,'59178249038',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 05:21:47','2026-05-19 19:05:34',0,NULL,0.00,18.00),
(96,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'No Borrar','andreaach@gmail.com',NULL,NULL,'$2y$10$ilK39xWIjzLR3o8jblgzDOmOABOXevGe3HFJYgYQ2NQhKd3DgnuFe',NULL,'59162095358',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 19:38:10','2026-05-19 19:38:10',0,NULL,0.00,18.00),
(97,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','customer',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Grafi',NULL,NULL,NULL,NULL,NULL,'59175971880',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 19:41:29','2026-05-19 19:41:29',0,NULL,0.00,18.00),
(98,NULL,NULL,NULL,NULL,1,'2026-05-21 21:02:17',NULL,'uploads/drivers/48/profile/1779201652-jflIYzT14m.jpg','light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'marco Antonio Tejerina Vallejos','for.ing.tejerina@gmail.com',NULL,NULL,'$2y$10$aABNiQNZvnAiNmBz9GIfy.3UlyblRGf0as046sfCjS7.l3if5PgIG',NULL,'59173492177',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 19:42:27','2026-05-21 21:02:17',0,NULL,0.00,18.00),
(99,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','customer',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'móvil avaroa',NULL,NULL,NULL,NULL,NULL,'59169301223',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 19:52:18','2026-05-19 19:52:18',0,NULL,0.00,18.00),
(100,NULL,NULL,NULL,NULL,1,'2026-05-19 20:01:11',NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'José Luis Almazán laime','diablito1437@gmail.com',NULL,NULL,'$2y$10$aBi.MAgfveK/r0fq4Gqwl.fIQmcSu3KWiBovVXN8Lla8MXUQ89OE6',NULL,'59176186626',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 19:53:26','2026-05-19 20:01:32',0,NULL,0.00,18.00),
(101,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Juan José Pacheco Flores','jjpacheco2015@gmail.com',NULL,NULL,'$2y$10$ns8c2x5N9YVOXHEaRfJRYOdlZiSdLJtQD/wCV/e05.llJs.jD/DRq',NULL,'59160278785',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 20:06:19','2026-05-19 20:06:19',0,NULL,0.00,18.00),
(102,NULL,NULL,NULL,NULL,1,'2026-05-19 20:14:08',NULL,'uploads/drivers/51/profile/1779204696-LrMA917Yoi.jpg','light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'CARLOS VILLCA','carlos3.villc@gmail.com',NULL,NULL,'$2y$10$me/oAFO1hDbqT8W.Lak5s.uw./s0lI28qL7DptsPXto4/SATKUz66',NULL,'59174533287',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-19 20:06:50','2026-05-19 21:01:36',0,NULL,0.00,18.00),
(103,NULL,NULL,NULL,NULL,1,'2026-05-20 19:40:43',NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Felipe Díaz','felipediaz123@gmail.com',NULL,NULL,'$2y$10$/2MyB2wfZNgvytI5gt10mOSnnafQ.bQVilj9PsHwgPpVQglfPEAI2',NULL,'59172951104',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-20 19:30:07','2026-05-20 19:41:21',0,NULL,0.00,18.00),
(104,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'yopo','sjdhdj@ajs.bne',NULL,NULL,'$2y$10$z2ozX/npFTzTEq5yL0pOeuKyXRF7mGB61McpYPMY2YXd7w4YnRo0e',NULL,'59169522553',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-20 19:45:44','2026-05-20 19:45:44',0,NULL,0.00,18.00),
(105,NULL,NULL,NULL,NULL,0,'2026-05-20 21:03:07',NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Prueba Cond','jago1410@hotmail.com',NULL,NULL,'$2y$10$j0jHKtOmP3TdU0kbLQrkqeYz4BvxXl8u.uFWBO5JIAD882TH2aEYm',NULL,'59136699552',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-20 20:44:13','2026-05-20 21:03:07',0,NULL,0.00,18.00),
(106,NULL,NULL,NULL,NULL,1,'2026-05-20 20:53:24',NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'adrian espindola','Adrianespindola123@gmail.com',NULL,NULL,'$2y$10$gwngY9u51iQGC89bNap7ne/dtDj9kAA7ahzjSoiiKUBUW/XElWWFS',NULL,'59172951104',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-20 20:47:48','2026-05-20 20:53:47',0,NULL,0.00,18.00),
(107,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'otrc','ksdk@ddflglg.cck',NULL,NULL,'$2y$10$0cO50jPrA9JtkyOMU8wcSuha3zce.lxReW2fjN39667V3Xtd2a/1y',NULL,'59136599852',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-20 20:53:18','2026-05-20 20:53:18',0,NULL,0.00,18.00),
(108,NULL,NULL,NULL,NULL,1,'2026-05-25 15:17:49',NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'tanzila','arstech2a@gmail.com',NULL,NULL,'$2y$10$UU5hRidYBG.eQ4pelTQRcumM/C7kNCoU2h76BACOeKftn9J1Co5.u',NULL,'5912548979707',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-20 21:18:51','2026-05-25 15:17:49',0,NULL,0.00,18.00),
(109,NULL,NULL,NULL,NULL,1,'2026-05-20 21:34:49',NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Drei','ghllhf@kghi.com',NULL,NULL,'$2y$10$nG7S6NJS5.WNwbbsuj0z6eMaYxt055wfhOrpLm04HEY81Oc7Dp1xe',NULL,'59169522555',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-20 21:23:15','2026-05-20 21:34:49',0,NULL,0.00,18.00),
(110,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Hugo Cardozo garzon','hugocaardozogarzon1979@gmail.com',NULL,NULL,'$2y$10$Akgk9wTUp55BnmgZDpl.wexR31oV68S2hN.hmSintLUisnruxRmYe',NULL,'59164339980',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-21 00:52:09','2026-05-21 00:52:09',0,NULL,0.00,18.00),
(111,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Omar fernandez','omar.fernandez.paredes@gmail.com',NULL,NULL,'$2y$10$EH1lDR9tVfj75xiY8RctKuyHJ9V9mUXeq3ae8C5LPP61ZJq.QU6OK',NULL,'59160265930',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-21 03:01:43','2026-05-21 03:01:43',0,NULL,0.00,18.00),
(112,NULL,NULL,NULL,NULL,1,'2026-05-21 19:51:41',NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Hugo Cardozo garzón','hugocardozogarzon1979@gmail.com',NULL,NULL,'$2y$10$O/LTqpS6sNA8eKGUnb9V6.V35BnbdD89Nw/NAtZ7.mDFx9u/OLELe',NULL,'59160256200',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-21 17:56:26','2026-05-21 19:51:41',0,NULL,0.00,18.00),
(113,NULL,NULL,NULL,NULL,1,'2026-05-21 20:24:21',NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Hugo Cardozo garzon','hugocardozogarzon754@gmail.com',NULL,NULL,'$2y$10$BnY.2LRJOSYwBpI4iyB06uHgzlUHWE5eDmdzc3J3XmG0mFHPTM4na',NULL,'59164339980',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-21 20:21:51','2026-05-21 20:55:47',0,NULL,0.00,18.00),
(114,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','customer',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Taxi Servicom',NULL,NULL,NULL,NULL,NULL,'59178258259',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-21 21:12:33','2026-05-21 21:12:33',0,NULL,0.00,18.00),
(115,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','customer',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'carmenjuliajuradoaramayo',NULL,NULL,NULL,NULL,NULL,'59160272052',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-21 21:16:51','2026-05-21 21:16:51',0,NULL,0.00,18.00),
(116,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','customer',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Chelo',NULL,NULL,NULL,NULL,NULL,'59177874429',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-22 04:18:52','2026-05-22 04:18:52',0,NULL,0.00,18.00),
(117,NULL,NULL,NULL,NULL,0,'2026-05-22 04:53:58',NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Paola salazar','hugocardozogarzon123@gmail.com',NULL,NULL,'$2y$10$tszAV8CFcZLol9ENtL4HAuVJNsTq2qHR69PUwYNu55iO.YDNkNO1W',NULL,'59169301223',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-22 04:48:19','2026-05-22 04:53:58',0,NULL,0.00,18.00),
(118,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','customer',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Invitado',NULL,NULL,NULL,NULL,NULL,'59164586770',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-22 08:52:28','2026-05-22 08:52:28',0,NULL,0.00,18.00),
(119,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','customer',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Radio Movil Avaroa',NULL,NULL,NULL,NULL,NULL,'59175112122',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-22 09:20:29','2026-05-22 09:20:29',0,NULL,0.00,18.00),
(120,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'efrain refigo torrez','erenfigo470@gmail.com',NULL,NULL,'$2y$10$MxOouJO7B1BsC/9CJ3mm/u3xSSsZ.fwT.uKwHL0RZprvn5iTIPZua',NULL,'59172994729',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-22 20:55:01','2026-05-22 20:59:24',0,NULL,0.00,18.00),
(121,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'light','driver',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'efrain renfigo torrez','erengifo470@gmail.com',NULL,NULL,'$2y$10$KnvVZTN.64PeSNdFJ3Dl..Rlb86M9sUKNIuj8ySkbmtSdjuru6v.q',NULL,'59172994729',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-22 21:08:58','2026-05-22 21:08:58',0,NULL,0.00,18.00),
(122,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','customer',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'PROSHOP',NULL,NULL,NULL,NULL,NULL,'59162095357',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-26 00:06:41','2026-05-26 00:06:41',0,NULL,0.00,18.00),
(123,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','customer',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'Moto Taxi Tarija bolivia',NULL,NULL,NULL,NULL,NULL,'59160264084',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-26 03:40:52','2026-05-26 03:40:52',0,NULL,0.00,18.00),
(124,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'light','customer',NULL,NULL,NULL,'0',0,NULL,NULL,'Trabajador',NULL,'⏱️',NULL,NULL,NULL,NULL,NULL,'59169548449',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0,NULL,NULL,NULL,'\'en\'',0,'2026-05-26 09:08:00','2026-05-26 09:08:00',0,NULL,0.00,18.00);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `driver_id` bigint(20) unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `plate_number` varchar(255) NOT NULL,
  `registration_number` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `fuel_type` enum('petrol','diesel','electric','cng') DEFAULT NULL,
  `current_status` enum('idle','on_trip','maintenance','inactive') NOT NULL DEFAULT 'idle',
  `capacity_weight` double(8,2) DEFAULT NULL,
  `capacity_volume` double(8,2) DEFAULT NULL,
  `documents` text DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES
(30,42,1,0,'ACL925',NULL,'Blanco','movil',NULL,'idle',300.00,2.00,'[68,69,70,71,72,73,74]',NULL,NULL,'2026-05-19 02:45:18','2026-05-19 02:48:19','Toyota Corolla','2020'),
(31,43,1,0,'1578EFC',NULL,'Guindo','movil',NULL,'idle',300.00,2.00,NULL,NULL,NULL,'2026-05-19 02:56:57','2026-05-19 02:56:57','Mitsubishi grandis','1998'),
(32,45,1,0,'1426KSL',NULL,'Plomo','movil',NULL,'idle',300.00,2.00,'[76,77,78,79,80,81,82]',NULL,NULL,'2026-05-19 03:15:15','2026-05-19 04:54:33','Starlet','2020'),
(33,48,1,0,'RAA2172',NULL,'Azul','movil',NULL,'idle',300.00,2.00,'[83,84,85,86,87,88,89]',NULL,NULL,'2026-05-19 19:44:29','2026-05-19 19:49:19','Toyota ipsum','2020'),
(34,49,1,0,'1618DLD',NULL,'Blanco','movil',NULL,'idle',300.00,2.00,'[90,91,92,93,94,95,96]',NULL,NULL,'2026-05-19 19:55:21','2026-05-19 20:00:38','2013','2013'),
(35,50,1,0,'706FLD',NULL,'Blanco','movil',NULL,'idle',300.00,2.00,NULL,NULL,NULL,'2026-05-19 20:07:11','2026-05-19 20:07:11','Nissan sunny','2020'),
(36,51,1,0,'1578 EFC',NULL,'Guindo.','movil',NULL,'idle',300.00,2.00,'[97,98,99,100,101,102,103]',NULL,NULL,'2026-05-19 20:09:53','2026-05-19 20:13:25','ipsum','1998'),
(37,54,1,0,'ABC887',NULL,'Rojo','automovil',NULL,'idle',300.00,2.00,'[104,105,106,107,108,109,110]',NULL,NULL,'2026-05-20 20:45:08','2026-05-20 20:47:20','Toyota Corolla','2020'),
(38,55,1,0,'632DBI',NULL,'Rojo','automovil',NULL,'idle',300.00,2.00,'[111,112,113,114,115,116,117]',NULL,NULL,'2026-05-20 20:51:08','2026-05-20 20:52:45','toyota','2020'),
(40,57,1,0,'DSCD',NULL,'Rojo','minivan',NULL,'idle',600.00,4.00,'[118,119,120,121,122,123,124]',NULL,NULL,'2026-05-20 21:19:16','2026-05-20 21:20:14','Toyota Camry','2021'),
(41,58,1,0,'QOWK777',NULL,'Rojo','automovil',NULL,'idle',300.00,2.00,'[125,126,127,128,129,130,131]',NULL,NULL,'2026-05-20 21:23:46','2026-05-20 21:24:56','yaris','2020'),
(42,61,1,0,'3105 IKA',NULL,'Blanco','moto',NULL,'idle',50.00,0.20,'[132,133,134,135,136,137,138]',NULL,NULL,'2026-05-21 18:04:19','2026-05-21 19:50:31','moto','2013'),
(44,64,1,0,'964GBE',NULL,'Blanco','automovil',NULL,'idle',300.00,2.00,'[146,147,148,149,150,151,152]',NULL,NULL,'2026-05-22 20:56:11','2026-05-22 20:58:41','toyota','2020');
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallet_transactions`
--

DROP TABLE IF EXISTS `wallet_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallet_transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `wallet_id` bigint(20) unsigned NOT NULL,
  `type` enum('topup','adjustment','commission') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `direction` enum('CREDIT','DEBIT') NOT NULL,
  `reference_type` varchar(255) DEFAULT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `created_by_admin_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallet_transactions_wallet_id_foreign` (`wallet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallet_transactions`
--

LOCK TABLES `wallet_transactions` WRITE;
/*!40000 ALTER TABLE `wallet_transactions` DISABLE KEYS */;
INSERT INTO `wallet_transactions` VALUES
(1,1,'topup',500.00,'CREDIT','topup','2',1,'2026-04-09 14:14:43','2026-04-09 14:14:43'),
(2,3,'adjustment',100.00,'CREDIT','adjustment','ajuste',1,'2026-04-14 21:08:55','2026-04-14 21:08:55'),
(3,2,'adjustment',100.00,'CREDIT','adjustment','carga de prueba',1,'2026-04-14 21:20:43','2026-04-14 21:20:43'),
(7,3,'commission',3.01,'DEBIT','trip','99',NULL,'2026-04-29 22:19:33','2026-04-29 22:19:33'),
(8,11,'adjustment',100.00,'CREDIT','adjustment','ok',1,'2026-04-30 01:25:51','2026-04-30 01:25:51'),
(9,3,'commission',2.31,'DEBIT','trip','109',NULL,'2026-04-30 01:37:22','2026-04-30 01:37:22'),
(10,3,'commission',1.20,'DEBIT','trip','110',NULL,'2026-04-30 01:43:59','2026-04-30 01:43:59'),
(11,8,'adjustment',100.00,'CREDIT','adjustment','recarga',1,'2026-04-30 01:47:32','2026-04-30 01:47:32'),
(12,3,'commission',1.75,'DEBIT','trip','126',NULL,'2026-05-05 00:51:15','2026-05-05 00:51:15'),
(13,17,'adjustment',100.00,'CREDIT','adjustment','gdhs',1,'2026-05-06 22:54:19','2026-05-06 22:54:19'),
(14,17,'commission',2.83,'DEBIT','trip','144',NULL,'2026-05-06 22:59:09','2026-05-06 22:59:09'),
(15,17,'commission',1.38,'DEBIT','trip','145',NULL,'2026-05-06 23:41:12','2026-05-06 23:41:12'),
(16,9,'topup',50.00,'CREDIT','topup','4',1,'2026-05-08 00:41:07','2026-05-08 00:41:07'),
(17,1,'topup',500.00,'CREDIT','topup','1',1,'2026-05-08 00:42:29','2026-05-08 00:42:29'),
(18,9,'adjustment',100.00,'CREDIT','adjustment','prueba',1,'2026-05-08 00:43:02','2026-05-08 00:43:02'),
(19,19,'adjustment',100.00,'CREDIT','adjustment','pago',1,'2026-05-08 02:32:27','2026-05-08 02:32:27'),
(20,18,'adjustment',50.00,'CREDIT','adjustment','pago',1,'2026-05-08 02:33:39','2026-05-08 02:33:39'),
(21,20,'adjustment',100.00,'CREDIT','adjustment','pago',1,'2026-05-08 21:05:59','2026-05-08 21:05:59'),
(22,22,'adjustment',50.00,'CREDIT','adjustment','pago',1,'2026-05-09 01:20:53','2026-05-09 01:20:53'),
(23,23,'adjustment',50.00,'CREDIT','adjustment','pago',1,'2026-05-11 20:41:42','2026-05-11 20:41:42'),
(24,25,'adjustment',100.00,'CREDIT','adjustment','ok',1,'2026-05-17 22:54:49','2026-05-17 22:54:49'),
(25,25,'commission',0.91,'DEBIT','trip','158',NULL,'2026-05-17 23:04:46','2026-05-17 23:04:46'),
(26,25,'adjustment',100.00,'CREDIT','adjustment','ok',1,'2026-05-18 00:42:53','2026-05-18 00:42:53'),
(27,1,'commission',5.53,'DEBIT','trip','160',NULL,'2026-05-18 13:53:04','2026-05-18 13:53:04'),
(28,21,'adjustment',50.00,'CREDIT','adjustment','PAGO DE CREDITO',1,'2026-05-18 20:45:34','2026-05-18 20:45:34'),
(29,25,'adjustment',100.00,'CREDIT','adjustment','qr ok',1,'2026-05-18 21:13:06','2026-05-18 21:13:06'),
(30,25,'adjustment',100.00,'DEBIT','adjustment','ok',1,'2026-05-18 21:14:01','2026-05-18 21:14:01'),
(31,25,'adjustment',78.00,'CREDIT','adjustment','qr ok',1,'2026-05-18 21:14:42','2026-05-18 21:14:42'),
(32,29,'adjustment',100.00,'CREDIT','adjustment','PAGO DE CREDITO',1,'2026-05-19 02:51:15','2026-05-19 02:51:15'),
(33,32,'adjustment',85.00,'CREDIT','adjustment','pago de credito',1,'2026-05-19 19:16:02','2026-05-19 19:16:02'),
(34,31,'adjustment',85.00,'CREDIT','adjustment','pago de credito',1,'2026-05-19 19:16:27','2026-05-19 19:16:27'),
(35,30,'adjustment',85.00,'CREDIT','adjustment','pago de credito',1,'2026-05-19 19:16:49','2026-05-19 19:16:49'),
(36,29,'adjustment',85.00,'CREDIT','adjustment','recarga de credito',1,'2026-05-19 19:17:22','2026-05-19 19:17:22'),
(37,29,'adjustment',100.00,'DEBIT','adjustment','me equivoque',1,'2026-05-19 19:19:12','2026-05-19 19:19:12'),
(38,33,'adjustment',85.00,'CREDIT','adjustment','pago de credito',1,'2026-05-19 19:51:24','2026-05-19 19:51:24'),
(39,34,'adjustment',85.00,'CREDIT','adjustment','pago de credito',1,'2026-05-19 20:04:33','2026-05-19 20:04:33'),
(40,35,'adjustment',85.00,'CREDIT','adjustment','pago de credito',1,'2026-05-19 20:17:02','2026-05-19 20:17:02'),
(41,36,'adjustment',85.00,'CREDIT','adjustment','credito',1,'2026-05-20 19:42:37','2026-05-20 19:42:37'),
(42,37,'adjustment',10.00,'CREDIT','adjustment','ok',1,'2026-05-20 20:51:56','2026-05-20 20:51:56'),
(43,38,'adjustment',85.00,'CREDIT','adjustment','credito',1,'2026-05-20 20:54:14','2026-05-20 20:54:14'),
(44,38,'commission',1.28,'DEBIT','trip','166',NULL,'2026-05-20 21:12:13','2026-05-20 21:12:13'),
(45,41,'adjustment',160.00,'CREDIT','adjustment','pago de credito',1,'2026-05-21 19:50:31','2026-05-21 19:50:31'),
(46,44,'adjustment',100.00,'CREDIT','adjustment','CREDITO',1,'2026-05-21 20:56:39','2026-05-21 20:56:39'),
(47,43,'adjustment',160.00,'CREDIT','adjustment','CREDITO',1,'2026-05-21 21:27:40','2026-05-21 21:27:40'),
(48,44,'commission',0.91,'DEBIT','trip','167',NULL,'2026-05-21 21:40:16','2026-05-21 21:40:16'),
(49,38,'commission',0.91,'DEBIT','trip','175',NULL,'2026-05-22 02:55:21','2026-05-22 02:55:21'),
(50,38,'commission',1.56,'DEBIT','trip','173',NULL,'2026-05-22 03:00:20','2026-05-22 03:00:20'),
(51,44,'commission',1.45,'DEBIT','trip','176',NULL,'2026-05-22 03:00:24','2026-05-22 03:00:24'),
(52,44,'commission',1.31,'DEBIT','trip','179',NULL,'2026-05-22 03:59:47','2026-05-22 03:59:47'),
(53,37,'commission',1.41,'DEBIT','trip','180',NULL,'2026-05-22 04:13:22','2026-05-22 04:13:22'),
(54,43,'commission',1.45,'DEBIT','trip','183',NULL,'2026-05-22 05:42:34','2026-05-22 05:42:34'),
(55,45,'adjustment',85.00,'CREDIT','adjustment','pago',1,'2026-05-22 21:14:33','2026-05-22 21:14:33'),
(56,46,'adjustment',100.00,'CREDIT','adjustment','pago',1,'2026-05-22 21:17:33','2026-05-22 21:17:33'),
(57,40,'topup',200.00,'CREDIT','topup','6',1,'2026-05-25 15:18:43','2026-05-25 15:18:43'),
(58,40,'commission',11.05,'DEBIT','trip','188',NULL,'2026-05-25 15:45:32','2026-05-25 15:45:32'),
(59,40,'commission',5.53,'DEBIT','trip','187',NULL,'2026-05-25 15:50:47','2026-05-25 15:50:47'),
(60,40,'commission',8.45,'DEBIT','trip','190',NULL,'2026-05-25 15:54:47','2026-05-25 15:54:47'),
(61,40,'commission',3.25,'DEBIT','trip','189',NULL,'2026-05-25 15:56:04','2026-05-25 15:56:04'),
(62,40,'commission',9.75,'DEBIT','trip','193',NULL,'2026-05-26 15:23:46','2026-05-26 15:23:46'),
(63,40,'commission',3.71,'DEBIT','trip','192',NULL,'2026-05-26 15:24:48','2026-05-26 15:24:48');
/*!40000 ALTER TABLE `wallet_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `driver_id` bigint(20) unsigned NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `currency` varchar(255) NOT NULL DEFAULT 'Bs',
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `blocked_reason` varchar(255) DEFAULT NULL,
  `blocked_at` timestamp NULL DEFAULT NULL,
  `last_recharge_date` timestamp NULL DEFAULT NULL,
  `balance_expiration_date` timestamp NULL DEFAULT NULL,
  `wallet_status` varchar(255) DEFAULT 'active',
  `expired_balance_amount` decimal(10,2) DEFAULT NULL,
  `expiration_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallets_driver_id_foreign` (`driver_id`),
  CONSTRAINT `wallets_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallets`
--

LOCK TABLES `wallets` WRITE;
/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;
INSERT INTO `wallets` VALUES
(29,42,85,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-19 02:49:11','2026-05-19 19:19:12'),
(30,44,85,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-19 03:11:40','2026-05-19 19:16:49'),
(31,45,85,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-19 04:55:13','2026-05-19 19:16:27'),
(32,46,85,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-19 11:21:13','2026-05-19 19:16:02'),
(33,48,85,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-19 19:50:08','2026-05-19 19:51:24'),
(34,49,85,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-19 20:01:12','2026-05-19 20:04:33'),
(35,51,85,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-19 20:14:11','2026-05-19 20:17:02'),
(37,54,9,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-20 20:47:56','2026-05-22 04:13:22'),
(38,55,81,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-20 20:53:26','2026-05-22 03:00:20'),
(39,58,0,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-20 21:34:51','2026-05-20 21:34:51'),
(40,57,158,'Bs',0,NULL,NULL,'2026-05-25 15:18:43','2026-06-24 15:18:43','active',NULL,NULL,'2026-05-20 21:38:12','2026-05-26 15:24:48'),
(41,59,160,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-21 02:59:26','2026-05-21 19:50:31'),
(42,60,0,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-21 03:05:24','2026-05-21 03:05:24'),
(43,61,159,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-21 19:51:43','2026-05-22 05:42:34'),
(44,62,97,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-21 20:24:23','2026-05-22 03:59:47'),
(46,65,100,'Bs',0,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2026-05-22 21:16:42','2026-05-22 21:17:33');
/*!40000 ALTER TABLE `wallets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdrawals`
--

DROP TABLE IF EXISTS `withdrawals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdrawals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `challenge_id` int(11) DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00 COMMENT 'Requested amount in INR',
  `charge` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'Our withdrawal fee',
  `final_amount` decimal(15,2) NOT NULL DEFAULT 0.00 COMMENT 'Amount sent to bank',
  `sent_amount` decimal(10,2) DEFAULT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_holder` varchar(150) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `ifsc_code` varchar(20) NOT NULL,
  `trx` varchar(50) NOT NULL,
  `utr` varchar(100) DEFAULT NULL COMMENT 'Bank UTR after payout',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved, 2=Rejected, 3=Processed',
  `admin_feedback` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_by` bigint(20) unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint(20) unsigned DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `processed_by` bigint(20) unsigned DEFAULT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_trx` (`trx`),
  KEY `idx_user` (`user_id`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdrawals`
--

LOCK TABLES `withdrawals` WRITE;
/*!40000 ALTER TABLE `withdrawals` DISABLE KEYS */;
INSERT INTO `withdrawals` VALUES
(1,15,3,500.00,10.00,490.00,490.00,'ICICI','demo','10009588','SBIN000006','WD-DXVEK6ZP8R','fdgfdgdfd fge345324324',2,'dfsffsdfs','2026-01-14 08:15:14','2026-01-15 03:30:01',1,'2026-01-14 11:45:38',1,'2026-01-15 03:30:01',1,'2026-01-14 11:45:50'),
(2,15,3,3000.00,60.00,2940.00,2940.00,'SBI','demo','10009588','SBIN000006','WD-FWQPVYRX5O','fdgdfgdsf5454ds56fd',3,NULL,'2026-01-15 03:28:08','2026-01-15 03:30:34',1,'2026-01-15 03:30:14',NULL,NULL,1,'2026-01-15 03:30:34');
/*!40000 ALTER TABLE `withdrawals` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-03  3:53:04
