-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2014 at 10:50 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `glensite`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shortcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `description_secondary` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `base_product_id` int(10) unsigned DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `is_delivered` tinyint(1) DEFAULT NULL,
  `is_ltw` tinyint(1) DEFAULT NULL,
  `is_cod` tinyint(1) DEFAULT NULL,
  `warranty` int(11) DEFAULT NULL,
  `list_price` decimal(8,2) NOT NULL,
  `offer_price` decimal(8,2) NOT NULL,
  `weight` decimal(8,2) NOT NULL,
  `sequence` int(11) NOT NULL,
  `base_diff_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `popularity` int(11) NOT NULL DEFAULT '0',
  `sap_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_shortcode_unique` (`shortcode`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_base_product_id_foreign` (`base_product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `shortcode`, `description`, `description_secondary`, `category_id`, `base_product_id`, `active`, `is_delivered`, `is_ltw`, `is_cod`, `warranty`, `list_price`, `offer_price`, `weight`, `sequence`, `base_diff_text`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`, `popularity`, `sap_code`) VALUES
(1, 'chimney', 'asdf', 'CHM1234', '<ul><li>A new look island hood for contemporary kitchen.</li><li>An elegant fusion of Glass &amp; stainless steel</li><li>Electronic control with timer</li></ul>', '<ul><li>A new look island hood for contemporary kitchen.</li><li>An elegant fusion of Glass &amp; stainless steel</li><li>Electronic control with timer</li><li>Baffle filter</li><li>Powerful Suction - Airflow 12503/hr</li><li>Italian motor with TOP</li><li>Pressure die cast aluminium housing(PDCA)</li><li>4 energy saving 1.5W led lamps for optimum illumination.</li><li>Size 90 cms</li></ul>', 3, 1, 1, 1, 1, 1, 1, 100.00, 10.00, 11.00, 10, '', '', '', '', '0000-00-00 00:00:00', '2014-03-19 01:48:40', 0, NULL),
(2, 'chimney_beauty', 'qwerty', 'CHM987', 'this is test chimeny 2', 'secondary description', 1, 2, 1, 1, 1, 1, 1, 500.00, 10.00, 100.00, 170, 'this chimney is beautiful', NULL, NULL, NULL, '0000-00-00 00:00:00', '2014-03-19 01:48:40', 2, NULL),
(3, 'chimney_natural', 'zxcvb', 'CHM456', 'this is test chimeny 3', '', 3, NULL, 1, 1, 1, 1, 1, 250.00, 200.00, 11.00, 210, '', '', '', '', '0000-00-00 00:00:00', '2014-03-19 01:48:40', 0, NULL),
(6, 'mixer', 'MIX123', 'MIX', 'this is mixer', 'mixer secondary desc', 2, NULL, 1, 1, 1, 1, 1, 100.00, 50.00, 505.00, 190, 'nothing', NULL, NULL, NULL, '2014-01-15 06:42:17', '2014-03-19 01:48:40', 7, NULL),
(7, 'Induction Cooker/GL 3070', 'GL 3070', 'GL 3070', 'Buy Glen Induction Cooker get a SS 3 pack gift set free', '', 3, 7, 1, 1, 1, 1, 1, 200.00, 150.00, 50.00, 41, '', '', '', '', '2014-01-16 01:20:26', '2014-03-19 01:48:40', 0, NULL),
(8, 'Induction Cooker/GL 3074', 'GL 3074', 'GL 3074', 'Buy Touch Control Induction Cooker get a 6 pack gift set free', '', 3, 8, 1, 1, 1, 1, 0, 2450.50, 200.00, 50.00, 51, '', '', '', '', '2014-02-18 01:09:48', '2014-03-19 01:48:40', 0, NULL),
(9, 'toaster', 'TOAST56', 'xzczd', 'this is toaster', 'this is secondary description', 5, NULL, 1, NULL, NULL, NULL, NULL, 650.00, 500.00, 11.00, 51, '', NULL, NULL, NULL, '0000-00-00 00:00:00', '2014-03-19 01:48:40', 0, NULL),
(10, 'OFR heater', 'GL7011', 'dsff', 'this is ofr heater', 'this is secondary description', 7, NULL, 1, NULL, NULL, NULL, NULL, 1000.00, 900.00, 500.00, 52, '', NULL, NULL, NULL, '0000-00-00 00:00:00', '2014-03-19 01:48:40', 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_base_product_id_foreign` FOREIGN KEY (`base_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
