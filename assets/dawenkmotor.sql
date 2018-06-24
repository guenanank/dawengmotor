-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `dawenkmotor`;
CREATE DATABASE `dawenkmotor` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dawenkmotor`;

DROP TABLE IF EXISTS `applicants`;
CREATE TABLE `applicants` (
  `id` int(31) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(127) NOT NULL,
  `phone` int(15) unsigned NOT NULL,
  `domicile` text NOT NULL,
  `home_status` char(15) NOT NULL,
  `work` varchar(63) NOT NULL,
  `work_experience` varchar(63) NOT NULL,
  `income` decimal(15,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `sub_from` int(7) DEFAULT NULL,
  `type` char(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `sub_from` (`sub_from`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

INSERT INTO `brands` (`id`, `name`, `sub_from`, `type`, `created_at`, `updated_at`) VALUES
(1,	'Honda',	NULL,	'motor',	'2018-06-12 19:50:01',	'2018-06-13 19:33:19'),
(3,	'Suzuki',	NULL,	'motor',	'2018-06-12 19:50:21',	'2018-06-12 19:50:21'),
(4,	'Kawasaki',	NULL,	'motor',	'2018-06-12 19:50:36',	'2018-06-12 19:50:36'),
(16,	'Vario',	1,	'motor',	'2018-06-21 11:46:35',	'2018-06-21 11:46:35'),
(17,	'BeAT FI',	1,	'motor',	'2018-06-21 07:50:27',	'2018-06-22 13:58:10'),
(18,	'Satria FU',	3,	'motor',	'2018-06-21 07:51:58',	'2018-06-21 15:09:28'),
(19,	'Mio Sporty',	28,	'motor',	'2018-06-21 15:10:25',	'2018-06-22 05:38:29'),
(20,	'Nouvo Z',	28,	'motor',	'2018-06-21 15:10:37',	'2018-06-22 05:38:16'),
(21,	'Fino Grande FI',	28,	'motor',	'2018-06-21 15:10:59',	'2018-06-22 05:38:44'),
(22,	'KLX DTracker',	4,	'motor',	'2018-06-21 15:11:29',	'2018-06-22 13:58:16'),
(23,	'Supra 125',	1,	'motor',	'2018-06-21 15:11:49',	'2018-06-22 13:58:24'),
(24,	'All New PCX 150',	1,	'motor',	'2018-06-21 15:12:42',	'0000-00-00 00:00:00'),
(26,	'Ninja 250 FI',	4,	'motor',	'2018-06-21 15:13:46',	'0000-00-00 00:00:00'),
(27,	'Skywave',	3,	'motor',	'2018-06-21 15:13:58',	'0000-00-00 00:00:00'),
(28,	'Yamaha',	NULL,	'motor',	'2018-06-22 05:37:48',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(225) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `configs` (`id`, `key`, `value`) VALUES
(1,	'SITE_NAME',	'Dawenk Motor'),
(2,	'SITE_DESC',	'Dawenk Motor, Jual Beli Motor Baru Dan Bekas'),
(3,	'SITE_KEYWORDS',	'jual motor, beli motor, beli motor bekas'),
(4,	'CREDENTIAL',	'{\'username\':\'dawenkmotor\',\'password\':\'babacoi\',\'name\': \'Dawenk\'}');

DROP TABLE IF EXISTS `credits`;
CREATE TABLE `credits` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `lease_id` int(3) unsigned NOT NULL,
  `down_payment` decimal(7,2) NOT NULL,
  `tenor` int(3) NOT NULL,
  `percentage` decimal(7,2) NOT NULL,
  `insurance` decimal(7,2) NOT NULL,
  `tax` decimal(7,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lease_id` (`lease_id`),
  CONSTRAINT `credits_ibfk_2` FOREIGN KEY (`lease_id`) REFERENCES `leases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `credits` (`id`, `lease_id`, `down_payment`, `tenor`, `percentage`, `insurance`, `tax`, `created_at`, `updated_at`) VALUES
(1,	1,	10.00,	11,	20.00,	0.00,	2.50,	'2018-06-13 20:00:11',	'2018-06-13 20:00:11'),
(2,	1,	11.60,	11,	20.00,	0.00,	2.50,	'2018-06-15 16:10:55',	'0000-00-00 00:00:00'),
(3,	1,	12.90,	11,	20.00,	0.00,	2.50,	'2018-06-15 16:11:21',	'0000-00-00 00:00:00'),
(4,	1,	14.30,	11,	20.00,	0.00,	2.50,	'2018-06-15 16:12:24',	'0000-00-00 00:00:00'),
(5,	1,	15.60,	11,	20.00,	0.00,	2.50,	'2018-06-15 16:12:46',	'0000-00-00 00:00:00'),
(6,	1,	17.00,	11,	20.00,	0.00,	2.50,	'2018-06-15 16:13:40',	'0000-00-00 00:00:00'),
(7,	1,	18.40,	11,	20.00,	0.00,	2.50,	'2018-06-15 16:14:04',	'0000-00-00 00:00:00'),
(8,	1,	19.70,	11,	20.00,	0.00,	2.50,	'2018-06-15 16:14:30',	'0000-00-00 00:00:00'),
(9,	1,	21.10,	11,	20.00,	0.00,	2.50,	'2018-06-15 16:14:53',	'0000-00-00 00:00:00'),
(10,	1,	22.40,	11,	20.00,	0.00,	2.50,	'2018-06-15 16:15:15',	'0000-00-00 00:00:00'),
(11,	1,	23.80,	11,	20.00,	0.00,	2.50,	'2018-06-15 16:15:36',	'0000-00-00 00:00:00'),
(12,	1,	25.20,	11,	20.00,	0.00,	2.50,	'2018-06-15 16:16:03',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `leases`;
CREATE TABLE `leases` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(127) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `leases` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1,	'PT. Mandiri Utama Finance',	'',	'2018-06-13 19:56:15',	'2018-06-24 22:37:57'),
(3,	'Adira Finance',	'',	'2018-06-14 00:40:13',	'2018-06-24 22:37:44');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(127) NOT NULL,
  `content` text NOT NULL,
  `tags` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(31) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` int(7) unsigned NOT NULL,
  `description` text NOT NULL,
  `condition` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(15,2) unsigned NOT NULL,
  `down_payment` decimal(15,2) unsigned NOT NULL,
  `negotiable` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sold` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `photos` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `products` (`id`, `brand_id`, `description`, `condition`, `price`, `down_payment`, `negotiable`, `sold`, `photos`, `created_at`, `updated_at`) VALUES
(1,	18,	'<span itemprop=\"description\">stnk bpkb lengkap<br>\r\nplat b-dki jakpus<br>\r\npajak hidup<br>\r\nkaleng panjang 2020<br>\r\nmesin halus terawat<br>\r\nstater hidup halus<br>\r\nkelistrikan normal<br>\r\nkm 14rban<br>\r\nbodi  cat lis orisinil kinclong<br>\r\nban tebal<br>\r\njarang pakai gan</span>',	0,	7600000.00,	0.00,	1,	0,	'[\"359aabd475b00a1d7d30a1fa9b84634c.jpg\",\"c3ffa85b9f769a340dc8d98a2fc727df.jpg\"]',	'2018-06-14 19:10:26',	'2018-06-22 12:48:19'),
(2,	19,	'Lorem Ipsum Dolor Sit Amet<br>',	1,	4500000.00,	0.00,	1,	0,	'[\"996406bcd2c3959fe563ef9336f82e7c.jpg\",\"2e2dea7ad4a9818b04d2416301eae436.jpg\"]',	'2018-06-22 12:59:20',	'0000-00-00 00:00:00'),
(3,	23,	'$data',	1,	7800000.00,	0.00,	1,	0,	'[\"6eb84abdd122a88cb5dcabaf7804000a.jpg\",\"bafbe0addbee6d8f30323558c224bf4f.jpg\",\"d14ea9e0bcfaf5277cb530104cd7c3e3.jpg\"]',	'2018-06-22 13:04:46',	'2018-06-22 13:29:28');

DROP TABLE IF EXISTS `product_credits`;
CREATE TABLE `product_credits` (
  `product_id` int(31) unsigned NOT NULL,
  `credit_id` int(15) unsigned NOT NULL,
  KEY `product_id` (`product_id`),
  KEY `credit_id` (`credit_id`),
  CONSTRAINT `product_credits_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_credits_ibfk_2` FOREIGN KEY (`credit_id`) REFERENCES `credits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `submissions`;
CREATE TABLE `submissions` (
  `applicant_id` int(31) unsigned NOT NULL,
  `product_id` int(31) unsigned NOT NULL,
  `survey_schedule` varchar(127) NOT NULL,
  `reference` varchar(63) NOT NULL,
  `notes` text NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  KEY `applicant_id` (`applicant_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `submissions_ibfk_3` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `submissions_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2018-06-24 16:52:43
