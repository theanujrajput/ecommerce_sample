-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2014 at 03:18 PM
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
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `line1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `landmark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `addresses_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attribute_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `is_comparable` tinyint(1) NOT NULL,
  `is_filterable` tinyint(1) NOT NULL,
  `attribute_value_type` enum('string','integer','decimal','options') COLLATE utf8_unicode_ci NOT NULL,
  `options` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `sequence` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `attributes_code_unique` (`code`),
  KEY `attributes_category_id_foreign` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `code`, `attribute_category`, `description`, `category_id`, `is_comparable`, `is_filterable`, `attribute_value_type`, `options`, `active`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 'size', '1230', 'tech specs', 'this is the size', 1, 1, 1, 'integer', NULL, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'weight', '8795', 'tech specs', 'this is the weight', 2, 1, 1, 'integer', NULL, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'air_flow', '5469', 'tech specs', 'this is the air flow', 1, 1, 1, 'integer', NULL, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'price', 'PRICE', 'price', 'this is price attribute', 1, 1, 1, 'integer', NULL, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `shortcode`, `description`, `description_secondary`, `sequence`, `parent_category_id`, `active`, `is_delivered`, `is_ltw`, `is_cod`, `warranty`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'island chimney', 'IS_CHM', 'this is island chimney category', 'this is secondary desc', 1, NULL, 1, 1, 1, 1, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'designer chimney', 'DES_CHM', 'this is designer chimney category', 'this is secondary desc', 3, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'fixed chimeny', 'FIX_CHM', 'this is fixed chimeny', 'this is fixed chimeny secondary desc', 2, 2, 1, 1, 1, 1, 2, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categorydocuments`
--

CREATE TABLE IF NOT EXISTS `categorydocuments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `categorydocuments_category_id_foreign` (`category_id`),
  KEY `categorydocuments_document_id_foreign` (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categoryvideos`
--

CREATE TABLE IF NOT EXISTS `categoryvideos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `video_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `categoryvideos_category_id_foreign` (`category_id`),
  KEY `categoryvideos_video_id_foreign` (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `combos`
--

CREATE TABLE IF NOT EXISTS `combos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `combo_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `combos`
--

INSERT INTO `combos` (`id`, `name`, `description`, `type`, `start_date`, `end_date`, `combo_price`, `created_at`, `updated_at`) VALUES
(2, 'free pen', 'this combo has pen', 'best', '2014-01-01', '2014-01-14', 100.00, '2014-01-14 03:49:52', '2014-01-14 03:49:52'),
(3, 'mixer', 'this combo has mixer', 'cool offer', '2013-02-05', '2013-02-20', 10.00, '2014-01-14 07:12:56', '2014-01-14 07:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `combo_products`
--

CREATE TABLE IF NOT EXISTS `combo_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `combo_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `combo_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `combo_products_combo_id_foreign` (`combo_id`),
  KEY `combo_products_product_id_foreign` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `combo_products`
--

INSERT INTO `combo_products` (`id`, `combo_id`, `product_id`, `combo_price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0.00, '2014-01-14 03:49:52', '2014-01-14 03:49:52'),
(2, 2, 2, 0.00, '2014-01-14 03:49:52', '2014-01-14 03:49:52'),
(4, 3, 1, 0.00, '2014-01-14 07:12:56', '2014-01-14 07:12:56'),
(5, 3, 2, 0.00, '2014-01-14 07:12:56', '2014-01-14 07:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE IF NOT EXISTS `dealers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_small_appliance` tinyint(1) NOT NULL DEFAULT '1',
  `is_large_appliance` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `type`, `path`, `hash`, `active`, `created_at`, `updated_at`) VALUES
(1, 'doc', '/test_document.docx', '78965', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `created_at`, `updated_at`) VALUES
(3, 'http://placehold.it/300x300', '2014-01-17 06:31:48', '2014-01-17 06:31:48'),
(4, 'http://placehold.it/300x300', '2014-01-17 06:31:48', '2014-01-17 06:31:48'),
(5, 'http://placehold.it/300x300', '2014-01-23 04:29:10', '2014-01-23 04:29:10'),
(6, 'http://placehold.it/300x300', '2014-01-23 04:29:10', '2014-01-23 04:29:10'),
(7, 'http://placehold.it/300x300', '2014-01-23 04:29:10', '2014-01-23 04:29:10'),
(8, 'http://placehold.it/300x300', '2014-01-23 04:29:10', '2014-01-23 04:29:10'),
(9, 'http://placehold.it/300x300', '2014-01-23 04:29:10', '2014-01-23 04:29:10'),
(10, 'http://placehold.it/300x300', '2014-01-23 04:29:10', '2014-01-23 04:29:10'),
(11, 'http://placehold.it/300x300', '2014-01-23 04:29:10', '2014-01-23 04:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_12_24_083532_create_categories_table', 1),
('2013_12_24_090254_create_products_table', 1),
('2013_12_24_090600_create_attributes_table', 1),
('2013_12_24_123157_create_productattributes_table', 1),
('2013_12_26_073117_create_images_table', 1),
('2013_12_26_073343_create_productimages_table', 1),
('2013_12_26_100209_create_session_table', 1),
('2013_12_26_100730_create_documents_table', 1),
('2013_12_26_100913_create_productdocuments_table', 1),
('2013_12_26_142059_create_categorydocuments_table', 1),
('2013_12_26_142408_create_videos_table', 1),
('2013_12_26_142517_create_categoryvideos_table', 1),
('2013_12_26_142608_create_productvideos_table', 1),
('2013_12_27_110334_create_tags_table', 1),
('2013_12_27_110523_create_producttags_table', 1),
('2014_01_08_063713_create_pagedata_table', 1),
('2014_01_08_064518_create_product_specific_attributes', 1),
('2014_01_13_065945_create_users_table', 2),
('2014_01_13_071441_create_addresses_table', 2),
('2014_01_13_072307_create_roles_table', 2),
('2014_01_13_072525_create_user_roles_table', 2),
('2014_01_14_072109_create_combos_table', 3),
('2014_01_14_072220_create_combo_products_table', 3),
('2014_01_16_051547_add_popularity_field_in_products_table', 4),
('2014_01_22_130240_create_dealers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pagedata`
--

CREATE TABLE IF NOT EXISTS `pagedata` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pagedata_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productattributes`
--

CREATE TABLE IF NOT EXISTS `productattributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `productattributes_product_id_foreign` (`product_id`),
  KEY `productattributes_attribute_id_foreign` (`attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `productattributes`
--

INSERT INTO `productattributes` (`id`, `product_id`, `attribute_id`, `notes`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'the size is 123cm', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 2, 'the weight is 50kg', '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 3, 'the air flow is 800', '800', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 3, 'this is air flow', '200', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 2, 'weight is 50kg', '50', '2014-01-21 03:51:31', '2014-01-21 03:51:31'),
(14, 2, 2, 'weight is 90kg', '90', '2014-01-21 03:58:47', '2014-01-21 03:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `productdocuments`
--

CREATE TABLE IF NOT EXISTS `productdocuments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `productdocuments_product_id_foreign` (`product_id`),
  KEY `productdocuments_document_id_foreign` (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE IF NOT EXISTS `productimages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `image_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_primary` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `productimages_product_id_foreign` (`product_id`),
  KEY `productimages_image_id_foreign` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `product_id`, `image_id`, `name`, `title`, `caption`, `notes`, `is_primary`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'prodcut name 1', 'product title 1', 'product caption 1', 'this is notes', 1, '2014-01-17 06:31:48', '2014-01-17 06:31:48'),
(2, 2, 4, 'prodcut name 2', 'product title 2', 'product caption 1', 'this is notes', 1, '2014-01-17 06:31:48', '2014-01-17 06:31:48'),
(3, 1, 4, 'product 1 second image', 'product 1 second title', 'product 1 second capption', 'notes', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_shortcode_unique` (`shortcode`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_base_product_id_foreign` (`base_product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `shortcode`, `description`, `description_secondary`, `category_id`, `base_product_id`, `active`, `is_delivered`, `is_ltw`, `is_cod`, `warranty`, `list_price`, `offer_price`, `weight`, `sequence`, `base_diff_text`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`, `popularity`) VALUES
(1, 'chimney', 'asdf', 'CHM1234', 'this is test chimeny 1', 'this is secondary description', 1, NULL, 1, NULL, NULL, NULL, NULL, 100.00, 10.00, 11.00, 30, 'none', NULL, NULL, NULL, '0000-00-00 00:00:00', '2014-01-16 03:36:45', 1),
(2, 'chimney_beauty', 'qwerty', 'CHM987', 'this is test chimeny 2', 'secondary description', 1, 2, 1, 1, 1, 1, 1, 500.00, 10.00, 100.00, 60, 'this chimney is beautiful', NULL, NULL, NULL, '0000-00-00 00:00:00', '2014-01-16 03:39:38', 2),
(3, 'chimney_natural', 'zxcvb', 'CHM456', 'this is test chimeny 3', 'this is secondary description', 1, 2, 1, NULL, NULL, NULL, NULL, 250.00, 200.00, 11.00, 50, 'this chimney is natural', NULL, NULL, NULL, '0000-00-00 00:00:00', '2014-01-16 03:36:45', 3),
(6, 'mixer', 'MIX123', 'MIX', 'this is mixer', 'mixer secondary desc', 2, NULL, 1, 1, 1, 1, 1, 100.00, 50.00, 505.00, 80, 'nothing', NULL, NULL, NULL, '2014-01-15 06:42:17', '2014-01-16 03:39:38', 7),
(7, 'grinder', 'GRIND895', 'GRID', 'this is grinder', 'grinder secondary desc', 1, NULL, 1, 1, 1, 1, 1, 200.00, 150.00, 50.00, 70, 'it grinds', NULL, NULL, NULL, '2014-01-16 01:20:26', '2014-01-16 03:39:38', 5);

-- --------------------------------------------------------

--
-- Table structure for table `producttags`
--

CREATE TABLE IF NOT EXISTS `producttags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `offer_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `producttags_tag_id_foreign` (`tag_id`),
  KEY `producttags_product_id_foreign` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `producttags`
--

INSERT INTO `producttags` (`id`, `product_id`, `tag_id`, `offer_price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 100.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 4, 200.00, '2014-01-10 01:39:16', '2014-01-15 04:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `productvideos`
--

CREATE TABLE IF NOT EXISTS `productvideos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `video_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `productvideos_product_id_foreign` (`product_id`),
  KEY `productvideos_video_id_foreign` (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_specific_attributes`
--

CREATE TABLE IF NOT EXISTS `product_specific_attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_specific_attributes_product_id_foreign` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_specific_attributes`
--

INSERT INTO `product_specific_attributes` (`id`, `product_id`, `name`, `value`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'speciality', '100', 'it is made of glass', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'color', 'any colour', 'is can be painted', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'collapse', 'yes', 'it can be collapsed', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'members', 'General User', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `payload`, `last_activity`) VALUES
('023c81ddbad15aaeeb6375b44e6c1c7936f452ff', '', 1390397245),
('0b1d722777e94c476a322f5b78447c659b683e85', '', 1390285746),
('1133bac849f1f0b5063932a2cda49495bad9d0e0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia29KbXRiYXBocmFJRERYVnU0WmFseklYOFNuTkZXbzExOXgzTEJkTCI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjEzOTAzODc0NDI7czoxOiJjIjtpOjEzOTAzODc0NDI7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1390387443),
('19287b3d2909aa9f7461e9149bbe3d394a7582a1', '', 1390375912),
('23b4ac197e957f1aed29bacfb756df51028985fb', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZm9pZXl6aG1PczNPOEZWYWlGZGxHQjczbGEyTWQyWXhNb1N2T0Q5WSI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjEzOTAyODU4MzE7czoxOiJjIjtpOjEzOTAyODU4MzE7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1390285831),
('26ee013a8a756efb640d1584a5cafa319583bf84', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiREVhUE5YOHlpdGNiRndHSGY3RGYwYjR5QVFwTWFGOHhGeTRUbG14WiI7czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTM5MDU1MTM2OTtzOjE6ImMiO2k6MTM5MDU0NDMzNjtzOjE6ImwiO3M6MToiMCI7fX0=', 1390551369),
('29e153dce70c57e4ca109eb484c7b3c58ff46874', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDlDS004N1ZSUHhsZXJPQ3cxQXFrbVZUeXo1YUJYSUJycGFNa2RSWCI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjEzOTAyODU3OTM7czoxOiJjIjtpOjEzOTAyODU3OTM7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1390285793),
('2a8587c2b2ec50368e9b0ed52be450200ea9c376', '', 1390285000),
('30becb166d033dcda75775a942888b62dd07ac43', '', 1390375418),
('349c15e058b8e45126ae2facf70012a6e7e1383e', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaW1nQmxoTzZ1NTJmaEJCUUlBZmh2M3FrU3RrWEQ4NFNyRUlsR1NCQyI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjEzOTAzNzU5MTE7czoxOiJjIjtpOjEzOTAzNzU5MTE7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1390375911),
('366d6f7cef6d39bc1fed7eebb4c99b6a79a63ef8', '', 1390284752),
('381565df2a77b8dc01b4042b547ad9d3aa351a70', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGQ1ZHpQTkxyOUk0amdQbUhDYVhZcGhJSFZ2eUpnb2Q3MEZHWEVScCI7czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTM5MDQ2MzQ5NztzOjE6ImMiO2k6MTM5MDQ2MDk5MDtzOjE6ImwiO3M6MToiMCI7fX0=', 1390463497),
('3a6da3b930406361f0386626311684e11937ea81', '', 1390282159),
('3bbafecee41bdd3ea3a8f8f0664503231c7c5f5d', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczlrVkhPRkpzMHZqZjZLRUlqUjZZQUxKOUw4Q1p2ZDJEdVZHN0hLVSI7czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTM5MDQ3MzYzMDtzOjE6ImMiO2k6MTM5MDQ3MTE0OTtzOjE6ImwiO3M6MToiMCI7fX0=', 1390473630),
('3e9168fba38bd43ef2b45a44a6cc6d443ff73a7a', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGF1RzF1eUFONFFmdmgyMnJVRzNKUWpKYmkzTjBNOGRDek5HU0ZoRCI7czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTM5MDMwMjMyNDtzOjE6ImMiO2k6MTM5MDI4MTgxNTtzOjE6ImwiO3M6MToiMCI7fX0=', 1390302324),
('476b8041abb8671c36bfe4920b64712813886a4f', '', 1390284593),
('5134b3ba9bf6c39cddd756193e53c0098e222aff', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXJ0NnBGdEJIaGVzNVYzMDlMcHJ2WGlvWUF1YWxDU2w2ZmQ2b2diOSI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjEzOTAzOTc4ODc7czoxOiJjIjtpOjEzOTAzOTc4ODc7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1390397887),
('55f84991b56582a5e6d93551c86497db2afe00bf', '', 1390397098),
('5882963ef832661f283c03f3f715818601a1822c', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidFZKbWVpT09Sd2ZWYm4zTUpZZVdCQ3RWY3JLV0l0emQ1OVVxN0pacyI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjEzOTA1NDY2MzA7czoxOiJjIjtpOjEzOTA1NDY2MzA7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1390546630),
('5eeaa331a0f95e51411284703fd1e8ca45291bdc', '', 1390286135),
('649abaaa46ada6cf9c58c3bec24ea493a1ff2107', '', 1390368102),
('79112de1ebff59572a3e14590188900469db70a6', '', 1390285725),
('8134e74e5c4b2944a5e039e7be5d04400c58268d', '', 1390397119),
('85b4ad21c0790f5420e7c461fdd95666721d880d', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmVuRWdUVDZNVGxCY0hlNnRXVEx3Y1NvQUt5eWRQZGljNFlVUXRFSyI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjEzOTAyODYwMDQ7czoxOiJjIjtpOjEzOTAyODYwMDQ7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1390286005),
('87596bd6e4ff3e97afa34dc7e37de4b32d2ea99d', '', 1390397230),
('8ba8442d9ddb8a0972d100d924aba1b0beb0fff7', '', 1390368156),
('90ddd7f737bc86ab5c7cbaff9f5f54390336ad8d', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmRnUFV6YW1IS1MwUkx0Z2FBQThtSEZYSVlaOWN5b0wzdllzbkVDOCI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjEzOTAyODYxMTM7czoxOiJjIjtpOjEzOTAyODYxMTM7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1390286113),
('9d2de0c9b9e20f9cf0cc39ee5d25852cbb663cea', '', 1390397153),
('a303d2cc3e26e29ca444452f1bb6d491f7c96473', '', 1390397853),
('a9739696baf1aef6a82bd302e3e51ae07cb759c5', '', 1390284976),
('ab64003e3d4f7ddd39d53affeca1897ba0bce501', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOE1tamh3dXNmd21MaGVxOTh0aGtiUE1vc2hDZjFJRHlHdFZtMVF6VCI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjEzOTA1NDQyNTM7czoxOiJjIjtpOjEzOTA1NDQyNTM7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1390544253),
('bf7b4c29e640e1680363f611bd2f6a96b38adf01', '', 1390284566),
('c410606a364c6718a65493506d605980e8fd2137', '', 1390397827),
('d52e3e84ac2df30ccfa8728d609ef2f7440376a9', '', 1390397195),
('d602a62c30b2a1df5f7ca8738a2b4800a51a20ab', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicU9YMjRYTU94RHhTWTdyYzAzYTZjbkd5SU9XY25Tek5Md3NVNEc3VCI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjEzOTA1NDQyODc7czoxOiJjIjtpOjEzOTA1NDQyODc7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1390544288),
('dc4a7d38fa91287b6e42ec38e437a7ea8cc22fa2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzJ3M2h6S0xIb1RteE55b05GZ21ma3RhRDF1Sms1WnR4a1ZTaE94eiI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjEzOTAyODU4MDM7czoxOiJjIjtpOjEzOTAyODU4MDM7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1390285803),
('e2afc630d35bc85d0ff26b28766f3bdd79a7179e', '', 1390284572);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `code`, `description`, `created_at`, `updated_at`) VALUES
(3, 'best price', 'BST', 'this is best price tag', '2014-01-10 01:36:06', '2014-01-10 01:36:06'),
(4, 'cool offer', 'COOL', 'this is cool offer', '2014-01-10 01:39:16', '2014-01-15 04:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '1234567890', '$2y$10$YotbseM6xofKbuv206dupedxCDNVi.5cslkVe.0wMNdICznoITnti', '2014-01-13 07:25:42', '2014-01-13 07:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_roles_user_id_foreign` (`user_id`),
  KEY `user_roles_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2014-01-13 07:25:42', '2014-01-13 07:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `type`, `path`, `active`, `created_at`, `updated_at`) VALUES
(1, 'flv', 'fake_path1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'mkv', 'fake_path2', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categorydocuments`
--
ALTER TABLE `categorydocuments`
  ADD CONSTRAINT `categorydocuments_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categorydocuments_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categoryvideos`
--
ALTER TABLE `categoryvideos`
  ADD CONSTRAINT `categoryvideos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categoryvideos_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `combo_products`
--
ALTER TABLE `combo_products`
  ADD CONSTRAINT `combo_products_combo_id_foreign` FOREIGN KEY (`combo_id`) REFERENCES `combos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `combo_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productattributes`
--
ALTER TABLE `productattributes`
  ADD CONSTRAINT `productattributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productattributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productdocuments`
--
ALTER TABLE `productdocuments`
  ADD CONSTRAINT `productdocuments_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productdocuments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productimages`
--
ALTER TABLE `productimages`
  ADD CONSTRAINT `productimages_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productimages_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_base_product_id_foreign` FOREIGN KEY (`base_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `producttags`
--
ALTER TABLE `producttags`
  ADD CONSTRAINT `producttags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producttags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productvideos`
--
ALTER TABLE `productvideos`
  ADD CONSTRAINT `productvideos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productvideos_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_specific_attributes`
--
ALTER TABLE `product_specific_attributes`
  ADD CONSTRAINT `product_specific_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
