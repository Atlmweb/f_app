# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: first_flight
# Generation Time: 2020-07-10 02:34:05 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ff_churches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ff_churches`;

CREATE TABLE `ff_churches` (
  `church_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(7) unsigned NOT NULL,
  `cp_user_id` int(11) unsigned NOT NULL,
  `ca_user_id` int(11) unsigned NOT NULL,
  `church_name` varchar(150) NOT NULL,
  `church_parent` varchar(150) DEFAULT NULL,
  `church_type` enum('ce','other_ministry') NOT NULL DEFAULT 'ce',
  `church_address` varchar(255) NOT NULL,
  `church_country` int(3) NOT NULL,
  `church_longitude` varchar(50) NOT NULL,
  `church_latitude` varchar(50) NOT NULL,
  `church_phone` varchar(50) NOT NULL,
  `church_email` varchar(150) NOT NULL,
  `church_extra_info` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`church_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ff_customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ff_customers`;

CREATE TABLE `ff_customers` (
  `cust_id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `account_type` enum('free','subscription') NOT NULL DEFAULT 'free',
  `account_key` varchar(100) DEFAULT NULL,
  `account_expiry` datetime DEFAULT NULL,
  `deployment_type` enum('single','multiple') NOT NULL DEFAULT 'single',
  `customer_name` varchar(100) NOT NULL,
  `cust_phone_primary` varchar(20) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `customer_logo` varchar(255) DEFAULT NULL,
  `cust_ip_address` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ff_flutterwave
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ff_flutterwave`;

CREATE TABLE `ff_flutterwave` (
  `account_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(9) NOT NULL,
  `flw_public` varchar(50) NOT NULL,
  `flw_secret` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ff_giving_cat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ff_giving_cat`;

CREATE TABLE `ff_giving_cat` (
  `cat_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `church_id` int(8) unsigned NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_code` varchar(50) DEFAULT NULL,
  `cat_desc` text NOT NULL,
  `is_enabled` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_code` (`cat_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ff_service_comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ff_service_comment`;

CREATE TABLE `ff_service_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `msg` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;



# Dump of table ff_services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ff_services`;

CREATE TABLE `ff_services` (
  `service_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `church_id` int(9) unsigned NOT NULL DEFAULT '237',
  `service_date` datetime NOT NULL,
  `service_title` varchar(100) NOT NULL,
  `stream_platform` enum('youtube','imm','vimeo','facebook') NOT NULL,
  `stream_url` varchar(200) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `video_platform` enum('youtube','vimeo','facebook') NOT NULL,
  `service_notes` text,
  `visibility` enum('public','logged_in','admin_only') NOT NULL DEFAULT 'public',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ff_transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ff_transactions`;

CREATE TABLE `ff_transactions` (
  `txn_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `church_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `payment_date` date NOT NULL,
  `cat_id` int(6) unsigned NOT NULL,
  `payment_mode` enum('cash','cheque','pos','bank_transfer','kingspay','kind','online') NOT NULL DEFAULT 'online',
  `currency` varchar(3) NOT NULL,
  `amount` double(12,2) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `citation` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`txn_id`),
  UNIQUE KEY `reference` (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ff_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ff_users`;

CREATE TABLE `ff_users` (
  `user_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `church_id` int(8) unsigned NOT NULL,
  `customer_id` int(8) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` enum('MEMBER','ADMIN','CLIENTS') NOT NULL DEFAULT 'MEMBER',
  `random_key` varchar(255) DEFAULT NULL,
  `random_key_expiry` datetime DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '0',
  `location_address` varchar(255) NOT NULL,
  `country_id` int(3) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `is_saved` enum('yes','no') DEFAULT NULL,
  `is_baptised` enum('yes','no') DEFAULT NULL,
  `marital_status` int(3) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
