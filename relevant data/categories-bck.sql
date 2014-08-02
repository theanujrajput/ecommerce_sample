-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2014 at 07:29 AM
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
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shortcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `description_secondary` text COLLATE utf8_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `parent_category_id` int(10) unsigned DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delivered` tinyint(1) NOT NULL,
  `is_ltw` tinyint(1) NOT NULL,
  `is_cod` tinyint(1) NOT NULL,
  `warranty` int(11) NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_shortcode_unique` (`shortcode`),
  KEY `categories_parent_category_id_foreign` (`parent_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `shortcode`, `description`, `description_secondary`, `sequence`, `parent_category_id`, `active`, `is_delivered`, `is_ltw`, `is_cod`, `warranty`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'island chimney', 'IS_CHM', 'this is island chimney category', '', 10, NULL, 1, 1, 1, 1, 1, '', '', '', '0000-00-00 00:00:00', '2014-02-19 06:48:11'),
(2, 'designer chimney', 'DES_CHM', 'this is designer chimney category', 'this is secondary desc', 3, 1, 1, 1, 1, 1, 2, NULL, 'designer', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'fixed chimeny', 'FIX_CHM', 'this is fixed chimeny', 'this is fixed chimeny secondary desc', 2, 2, 1, 1, 1, 1, 2, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'small appliance', 'SMALL_APP', 'this is small appliance desc', 'this is small app secondary desc', 4, NULL, 1, 1, 1, 1, 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'toaster', 'TOAST', 'this is toaster desc', 'secobadry desc', 5, 4, 1, 1, 1, 1, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'mixer', 'MIX', 'this is mixer', 'seconday desc', 6, 4, 1, 1, 1, 1, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Heater', 'HEAT', 'this is heater', '', 20, 4, 1, 1, 1, 1, 1, '', 'heater desc', '', '2014-02-17 07:30:09', '2014-02-19 06:48:11');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
