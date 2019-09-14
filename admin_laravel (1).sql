-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 04:24 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics_pages`
--

CREATE TABLE `analytics_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `query` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `load_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `analytics_visitors`
--

CREATE TABLE `analytics_visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_cor1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_cor2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resolution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `analytics_visitors`
--

INSERT INTO `analytics_visitors` (`id`, `ip`, `city`, `country_code`, `country`, `region`, `full_address`, `location_cor1`, `location_cor2`, `os`, `browser`, `resolution`, `referrer`, `hostname`, `org`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, '321321323', 'cairo', '123', 'egypt', '231', 'wqdsdfsf', '432', '2342', '2', '32', 'fds', NULL, NULL, NULL, '0000-00-00', '00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attach_files`
--

CREATE TABLE `attach_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci,
  `details_en` text COLLATE utf8mb4_unicode_ci,
  `code` text COLLATE utf8mb4_unicode_ci,
  `file_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` tinyint(4) DEFAULT NULL,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `visits` int(11) NOT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `section_id`, `title_ar`, `title_en`, `details_ar`, `details_en`, `code`, `file_ar`, `file_en`, `video_type`, `youtube_link`, `link_url`, `icon`, `status`, `visits`, `row_no`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(12, 3, 'Banner ll', 'Round11', NULL, NULL, NULL, '15650999067950.png', '15670843152040.png', NULL, NULL, 'https://web.whatsapp.com/', NULL, 1, 0, 9, 1, 1, '2019-07-16 15:03:02', '2019-08-29 18:11:55'),
(19, 1, 'Banner 111', 'Reddd', 'dad', 'dada', NULL, '', '15675951886761.png', NULL, NULL, 'dadas', NULL, 1, 0, 10, 1, NULL, '2019-09-04 16:06:28', '2019-09-04 16:06:28'),
(20, 2, 'fdasf', 'dadas', 'dada', 'dad', NULL, '', '', NULL, NULL, 'http://www.emarketingbakers.com/frontEnd/assets/images/logo.png', 'fa-android', 1, 0, 11, 1, NULL, '2019-09-04 16:07:05', '2019-09-04 16:07:05'),
(21, 1, 'באנר 151', 'Banner 151', NULL, NULL, NULL, '', '15675961775863.png', NULL, NULL, 'http://www.emarketingbakers.com/frontEnd/assets/images/logo.png', NULL, 1, 0, 12, 1, NULL, '2019-09-04 16:22:57', '2019-09-04 16:22:57'),
(22, 1, 'באנר 154', 'Banner 154', NULL, NULL, NULL, '', '15675962348438.png', NULL, NULL, 'http://www.emarketingbakers.com/frontEnd/assets/images/logo.png', NULL, 1, 0, 13, 1, NULL, '2019-09-04 16:23:54', '2019-09-04 16:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `best_diamond`
--

CREATE TABLE `best_diamond` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `best_diamond`
--

INSERT INTO `best_diamond` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 52, 4, '2019-08-02 15:35:23', '2019-08-02 20:26:16'),
(28, 47, 4, '2019-08-05 16:12:40', '2019-08-05 16:12:40'),
(36, 49, 14, '2019-08-05 16:52:17', '2019-08-05 16:52:17'),
(41, 44, 14, '2019-08-05 17:24:45', '2019-08-05 17:24:45'),
(47, 47, 4, '2019-08-05 16:12:40', '2019-08-05 16:12:40'),
(48, 47, 4, '2019-08-05 16:12:40', '2019-08-05 16:12:40'),
(49, 44, 4, '2019-08-05 20:16:48', '2019-08-05 20:16:48'),
(50, 47, 4, '2019-08-05 20:16:48', '2019-08-05 20:16:48'),
(51, 42, 14, '2019-08-05 20:19:02', '2019-08-05 20:19:02'),
(52, 43, 14, '2019-08-05 20:19:02', '2019-08-05 20:19:02'),
(53, 42, 14, '2019-08-05 21:43:27', '2019-08-05 21:43:27'),
(54, 44, 14, '2019-08-05 21:43:27', '2019-08-05 21:43:27'),
(55, 42, 14, '2019-08-05 22:24:21', '2019-08-05 22:24:21'),
(56, 42, 14, '2019-08-05 22:26:27', '2019-08-05 22:26:27'),
(57, 52, 14, '2019-08-05 22:39:37', '2019-08-05 22:39:37'),
(58, 42, 14, '2019-08-05 22:56:31', '2019-08-05 22:56:31'),
(59, 44, 14, '2019-08-05 22:56:31', '2019-08-05 22:56:31'),
(60, 47, 4, '2019-08-06 01:21:45', '2019-08-06 01:21:45'),
(61, 47, 4, '2019-08-06 01:31:57', '2019-08-06 01:31:57'),
(62, 47, 4, '2019-08-06 01:34:24', '2019-08-06 01:34:24'),
(63, 47, 4, '2019-08-06 01:34:24', '2019-08-06 01:34:24'),
(64, 47, 4, '2019-08-06 01:34:24', '2019-08-06 01:34:24'),
(65, 47, 4, '2019-08-06 02:18:58', '2019-08-06 02:18:58'),
(66, 47, 4, '2019-08-06 02:18:58', '2019-08-06 02:18:58'),
(67, 47, 4, '2019-08-06 02:18:58', '2019-08-06 02:18:58'),
(68, 42, 14, '2019-08-06 14:30:28', '2019-08-06 14:30:28'),
(69, 42, 21, '2019-08-06 14:50:28', '2019-08-06 14:50:28'),
(70, 43, 21, '2019-08-06 14:50:28', '2019-08-06 14:50:28'),
(71, 44, 21, '2019-08-06 14:50:28', '2019-08-06 14:50:28'),
(72, 52, 21, '2019-08-06 20:17:16', '2019-08-06 20:17:16'),
(73, 47, 4, '2019-08-07 00:36:39', '2019-08-07 00:36:39'),
(74, 52, 4, '2019-08-07 00:38:35', '2019-08-07 00:38:35'),
(75, 52, 4, '2019-08-07 00:38:35', '2019-08-07 00:38:35'),
(76, 52, 30, '2019-08-08 19:06:10', '2019-08-08 19:06:10'),
(77, 52, 30, '2019-08-08 20:43:07', '2019-08-08 20:43:07'),
(78, 52, 30, '2019-08-17 15:31:07', '2019-08-17 15:31:07'),
(79, 47, 30, '2019-08-17 15:31:07', '2019-08-17 15:31:07'),
(80, 49, 30, '2019-08-17 15:31:07', '2019-08-17 15:31:07'),
(81, 52, 30, '2019-08-17 15:39:42', '2019-08-17 15:39:42'),
(82, 46, 1, '2019-08-22 11:38:55', '2019-08-22 11:38:55'),
(83, 46, 1, '2019-08-22 11:39:59', '2019-08-22 11:39:59'),
(84, 40, 1, '2019-08-22 11:46:30', '2019-08-22 11:46:30'),
(85, 45, 32, '2019-08-25 06:59:18', '2019-08-25 06:59:18'),
(86, 52, 32, '2019-08-25 06:59:18', '2019-08-25 06:59:18'),
(87, 56, 32, '2019-08-25 06:59:18', '2019-08-25 06:59:18'),
(88, 40, 32, '2019-08-25 06:59:18', '2019-08-25 06:59:18'),
(89, 54, 32, '2019-08-25 06:59:18', '2019-08-25 06:59:18'),
(90, 53, 32, '2019-08-25 06:59:19', '2019-08-25 06:59:19'),
(91, 47, 32, '2019-08-25 06:59:19', '2019-08-25 06:59:19'),
(92, 43, 1, '2019-08-26 02:54:32', '2019-08-26 02:54:32'),
(93, 43, 1, '2019-08-26 02:59:48', '2019-08-26 02:59:48'),
(94, 43, 1, '2019-08-26 03:02:17', '2019-08-26 03:02:17'),
(95, 43, 1, '2019-08-26 03:04:06', '2019-08-26 03:04:06'),
(96, 43, 1, '2019-08-26 03:53:47', '2019-08-26 03:53:47'),
(97, 46, 1, '2019-08-26 03:53:47', '2019-08-26 03:53:47'),
(98, 52, 1, '2019-08-26 03:53:48', '2019-08-26 03:53:48'),
(99, 43, 1, '2019-08-26 04:12:37', '2019-08-26 04:12:37'),
(100, 40, 1, '2019-08-26 04:12:37', '2019-08-26 04:12:37'),
(101, 56, 1, '2019-08-26 04:12:37', '2019-08-26 04:12:37'),
(102, 43, 1, '2019-08-26 04:31:21', '2019-08-26 04:31:21'),
(103, 49, 1, '2019-08-26 04:31:21', '2019-08-26 04:31:21'),
(104, 40, 1, '2019-08-26 04:31:21', '2019-08-26 04:31:21'),
(105, 43, 1, '2019-08-26 04:36:11', '2019-08-26 04:36:11'),
(106, 49, 1, '2019-08-26 04:36:11', '2019-08-26 04:36:11'),
(107, 56, 1, '2019-08-26 04:36:11', '2019-08-26 04:36:11'),
(108, 40, 1, '2019-08-26 04:44:01', '2019-08-26 04:44:01'),
(109, 43, 1, '2019-08-26 04:44:01', '2019-08-26 04:44:01'),
(110, 43, 1, '2019-08-26 04:46:29', '2019-08-26 04:46:29'),
(111, 49, 1, '2019-08-26 04:46:29', '2019-08-26 04:46:29'),
(112, 43, 1, '2019-08-26 04:49:13', '2019-08-26 04:49:13'),
(113, 49, 1, '2019-08-26 04:49:13', '2019-08-26 04:49:13'),
(114, 43, 1, '2019-08-26 04:50:18', '2019-08-26 04:50:18'),
(115, 49, 1, '2019-08-26 04:50:18', '2019-08-26 04:50:18'),
(116, 56, 1, '2019-08-26 05:42:20', '2019-08-26 05:42:20'),
(117, 43, 1, '2019-09-01 13:45:14', '2019-09-01 13:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price_sp` decimal(10,2) NOT NULL,
  `standard_gold_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `status_promo_code` int(11) NOT NULL DEFAULT '0',
  `amount_code` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `qty`, `price_sp`, `standard_gold_id`, `size_id`, `color_id`, `status_promo_code`, `amount_code`, `created_at`, `updated_at`) VALUES
(171, 43, 1, 1, '230.00', 127, 17, NULL, 0, '0.00', '2019-09-08 12:57:27', '2019-09-08 12:57:27'),
(172, 42, 1, 1, '230.00', 127, 119, NULL, 0, '0.00', '2019-09-08 13:15:33', '2019-09-08 13:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_en` varchar(225) NOT NULL,
  `name_heb` varchar(225) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `icon` varchar(225) DEFAULT NULL,
  `photo` varchar(225) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_heb`, `status`, `icon`, `photo`, `type_id`, `created_at`, `updated_at`) VALUES
(20, 'Test category', 'תכנן את טבעת ההתחייבות שלך', 1, NULL, '15675951367005.png', 13, '2019-09-04 11:05:36', '2019-09-04 16:05:36'),
(23, 'Test category 1', 'מבחן קטגוריה 1', 1, NULL, '15675951004676.png', 14, '2019-09-04 11:05:00', '2019-09-04 16:05:00'),
(24, 'Test category 4', 'קטגוריית מבחן 4', 1, NULL, '15675950837732.png', 38, '2019-09-04 11:04:43', '2019-09-04 16:04:43'),
(25, 'Test category 5', 'קטגוריית מבחן 5', 1, NULL, '15675950591481.png', 59, '2019-09-04 11:04:19', '2019-09-04 16:04:19'),
(26, 'Test category', 'קטגוריית מבחן', 1, NULL, '15671828156488.png', 11, '2019-08-30 16:33:35', '2019-08-30 21:33:35'),
(37, 'Test category 2', 'מבחן קטגוריה 2', 1, NULL, '15671835554916.png', 11, '2019-08-30 16:45:55', '2019-08-30 21:45:55'),
(38, 'Test category 3', 'קטגוריית מבחן 3', 1, NULL, '15675950266379.png', 11, '2019-09-04 11:03:46', '2019-09-04 16:03:46'),
(40, 'Test category 10', 'קטגוריית מבחן 10', 1, NULL, '15671825965009.png', 13, '2019-08-30 16:29:56', '2019-08-30 21:29:56'),
(41, 'Test category 30', 'קטגוריית מבחן 30', 1, NULL, '15671825647008.png', 59, '2019-08-30 16:29:24', '2019-08-30 21:29:24'),
(43, 'Bracelets', 'צמידים', 1, NULL, '15671826146503.png', 13, '2019-08-30 16:30:14', '2019-08-30 21:30:14'),
(44, 'Rings', 'esalm elshenawy', 1, NULL, '15673375105892.jpg', 11, '2019-09-01 11:34:40', '2019-09-01 16:34:40'),
(47, 'Test category 55', 'קטגוריית מבחן 55', 1, NULL, '15675098289156.png', 14, '2019-09-03 11:23:48', '2019-09-03 16:23:48'),
(48, 'Test category sad', 'קטגוריית מבחןsad', 1, NULL, '15673516193987.jpg', 59, '2019-09-01 20:26:59', '2019-09-01 20:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `group_id`, `first_name`, `last_name`, `company`, `email`, `password`, `phone`, `country_id`, `city`, `address`, `photo`, `notes`, `last_login`, `last_login_ip`, `facebook_id`, `twitter_id`, `google_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'esalm', 'elshenawy', 'elshenawy', 'islam.elshenawy@trioconceptme.com', NULL, '1009739491', 59, 'cairo', NULL, '', 'terte', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2019-07-10 06:43:06', '2019-07-10 06:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_groups`
--

CREATE TABLE `contacts_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts_groups`
--

INSERT INTO `contacts_groups` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Newsletter Emails', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `phone` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `phone`, `message`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'eslam', 1009239491, 'asddasdasdasdasd', 4, 0, '2019-08-02 18:39:53', '2019-08-02 18:39:53'),
(2, 'ahmed', 1313, 'ahmed', 5, 0, '2019-08-04 14:07:01', '2019-08-04 14:07:01'),
(3, 'jsjsjjs', 56566565, '5665656', 14, 0, '2019-08-04 16:07:53', '2019-08-04 16:07:53'),
(4, 'bdhdhd', 566565, '46565695', 14, 0, '2019-08-04 16:11:01', '2019-08-04 16:11:01'),
(5, 'ahmed', 112757984, 'goood', 14, 0, '2019-08-06 14:31:13', '2019-08-06 14:31:13'),
(6, 'ahmed', 1127579849, 'goood', 21, 0, '2019-08-06 14:51:55', '2019-08-06 14:51:55'),
(7, 'majd', 4497, 'shss', 30, 0, '2019-08-08 20:52:58', '2019-08-08 20:52:58'),
(8, 'majd', 4497, 'shss', 30, 0, '2019-08-08 21:23:09', '2019-08-08 21:23:09'),
(9, 'masdj', 1153353333, 'snsssk', 30, 0, '2019-08-17 18:48:08', '2019-08-17 18:48:08'),
(10, 'masdj', 1153353333, 'snsssk', 30, 0, '2019-08-17 18:48:23', '2019-08-17 18:48:23'),
(11, 'masdj', 1153353333, 'snsssk', 30, 0, '2019-08-17 18:49:28', '2019-08-17 18:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `title_ar`, `title_en`, `tel`, `created_at`, `updated_at`) VALUES
(1, 'AL', 'ألبانيا', 'Albania', '355', '2019-06-27 09:14:09', '2019-06-27 09:14:09'),
(2, 'DZ', 'الجزائر', 'Algeria', '213', '2019-06-27 09:14:09', '2019-06-27 09:14:09'),
(3, 'AS', 'ساموا الأمريكية', 'American Samoa', '1-684', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(4, 'AD', 'أندورا', 'Andorra', '376', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(5, 'AO', 'أنغولا', 'Angola', '244', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(6, 'AI', 'أنغيلا', 'Anguilla', '1-264', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(7, 'AR', 'الأرجنتين', 'Argentina', '54', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(8, 'AM', 'أرمينيا', 'Armenia', '374', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(9, 'AW', 'أروبا', 'Aruba', '297', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(10, 'AU', 'أستراليا', 'Australia', '61', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(11, 'AT', 'النمسا', 'Austria', '43', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(12, 'AZ', 'أذربيجان', 'Azerbaijan', '994', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(13, 'BS', 'جزر البهاما', 'Bahamas', '1-242', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(14, 'BH', 'البحرين', 'Bahrain', '973', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(15, 'BD', 'بنغلاديش', 'Bangladesh', '880', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(16, 'BB', 'بربادوس', 'Barbados', '1-246', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(17, 'BY', 'روسيا البيضاء', 'Belarus', '375', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(18, 'BE', 'بلجيكا', 'Belgium', '32', '2019-06-27 09:14:10', '2019-06-27 09:14:10'),
(19, 'BZ', 'بليز', 'Belize', '501', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(20, 'BJ', 'بنين', 'Benin', '229', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(21, 'BM', 'برمودا', 'Bermuda', '1-441', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(22, 'BT', 'بوتان', 'Bhutan', '975', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(23, 'BO', 'بوليفيا', 'Bolivia', '591', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(24, 'BA', 'البوسنة والهرسك', 'Bosnia and Herzegovina', '387', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(25, 'BW', 'بوتسوانا', 'Botswana', '267', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(26, 'BR', 'البرازيل', 'Brazil', '55', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(27, 'VG', 'جزر فيرجن البريطانية', 'British Virgin Islands', '1-284', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(28, 'IO', 'إقليم المحيط الهندي البريطاني', 'British Indian Ocean Territory', '246', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(29, 'BN', 'بروناي دار السلام', 'Brunei Darussalam', '673', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(30, 'BG', 'بلغاريا', 'Bulgaria', '359', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(31, 'BF', 'بوركينا فاسو', 'Burkina Faso', '226', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(32, 'BI', 'بوروندي', 'Burundi', '257', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(33, 'KH', 'كمبوديا', 'Cambodia', '855', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(34, 'CM', 'الكاميرون', 'Cameroon', '237', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(35, 'CA', 'كندا', 'Canada', '1', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(36, 'CV', 'الرأس الأخضر', 'Cape Verde', '238', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(37, 'KY', 'جزر كايمان', 'Cayman Islands', '1-345', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(38, 'CF', 'افريقيا الوسطى', 'Central African Republic', '236', '2019-06-27 09:14:11', '2019-06-27 09:14:11'),
(39, 'TD', 'تشاد', 'Chad', '235', '2019-06-27 09:14:12', '2019-06-27 09:14:12'),
(40, 'CL', 'تشيلي', 'Chile', '56', '2019-06-27 09:14:12', '2019-06-27 09:14:12'),
(41, 'CN', 'الصين', 'China', '86', '2019-06-27 09:14:12', '2019-06-27 09:14:12'),
(42, 'HK', 'هونغ كونغ', 'Hong Kong', '852', '2019-06-27 09:14:12', '2019-06-27 09:14:12'),
(43, 'MO', 'ماكاو', 'Macao', '853', '2019-06-27 09:14:12', '2019-06-27 09:14:12'),
(44, 'CX', 'جزيرة الكريسماس', 'Christmas Island', '61', '2019-06-27 09:14:12', '2019-06-27 09:14:12'),
(45, 'CC', 'جزر كوكوس (كيلينغ)', 'Cocos (Keeling) Islands', '61', '2019-06-27 09:14:12', '2019-06-27 09:14:12'),
(46, 'CO', 'كولومبيا', 'Colombia', '57', '2019-06-27 09:14:13', '2019-06-27 09:14:13'),
(47, 'KM', 'جزر القمر', 'Comoros', '269', '2019-06-27 09:14:13', '2019-06-27 09:14:13'),
(48, 'CK', 'جزر كوك', 'Cook Islands', '682', '2019-06-27 09:14:13', '2019-06-27 09:14:13'),
(49, 'CR', 'كوستا ريكا', 'Costa Rica', '506', '2019-06-27 09:14:13', '2019-06-27 09:14:13'),
(50, 'HR', 'كرواتيا', 'Croatia', '385', '2019-06-27 09:14:13', '2019-06-27 09:14:13'),
(51, 'CU', 'كوبا', 'Cuba', '53', '2019-06-27 09:14:13', '2019-06-27 09:14:13'),
(52, 'CY', 'قبرص', 'Cyprus', '357', '2019-06-27 09:14:13', '2019-06-27 09:14:13'),
(53, 'CZ', 'الجمهورية التشيكية', 'Czech Republic', '420', '2019-06-27 09:14:13', '2019-06-27 09:14:13'),
(54, 'DK', 'الدنمارك', 'Denmark', '45', '2019-06-27 09:14:13', '2019-06-27 09:14:13'),
(55, 'DJ', 'جيبوتي', 'Djibouti', '253', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(56, 'DM', 'دومينيكا', 'Dominica', '1-767', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(57, 'DO', 'جمهورية الدومينيكان', 'Dominican Republic', '1-809', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(58, 'EC', 'الاكوادور', 'Ecuador', '593', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(59, 'EG', 'مصر', 'Egypt', '20', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(60, 'SV', 'السلفادور', 'El Salvador', '503', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(61, 'GQ', 'غينيا الاستوائية', 'Equatorial Guinea', '240', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(62, 'ER', 'إريتريا', 'Eritrea', '291', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(63, 'EE', 'استونيا', 'Estonia', '372', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(64, 'ET', 'أثيوبيا', 'Ethiopia', '251', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(65, 'FO', 'جزر فارو', 'Faroe Islands', '298', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(66, 'FJ', 'فيجي', 'Fiji', '679', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(67, 'FI', 'فنلندا', 'Finland', '358', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(68, 'FR', 'فرنسا', 'France', '33', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(69, 'GF', 'جيانا الفرنسية', 'French Guiana', '689', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(70, 'GA', 'الغابون', 'Gabon', '241', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(71, 'GM', 'غامبيا', 'Gambia', '220', '2019-06-27 09:14:14', '2019-06-27 09:14:14'),
(72, 'GE', 'جورجيا', 'Georgia', '995', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(73, 'DE', 'ألمانيا', 'Germany', '49', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(74, 'GH', 'غانا', 'Ghana', '233', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(75, 'GI', 'جبل طارق', 'Gibraltar', '350', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(76, 'GR', 'يونان', 'Greece', '30', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(77, 'GL', 'غرينلاند', 'Greenland', '299', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(78, 'GD', 'غرينادا', 'Grenada', '1-473', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(79, 'GU', 'غوام', 'Guam', '1-671', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(80, 'GT', 'غواتيمالا', 'Guatemala', '502', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(81, 'GN', 'غينيا', 'Guinea', '224', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(82, 'GW', 'غينيا-بيساو', 'Guinea-Bissau', '245', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(83, 'GY', 'غيانا', 'Guyana', '592', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(84, 'HT', 'هايتي', 'Haiti', '509', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(85, 'HN', 'هندوراس', 'Honduras', '504', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(86, 'HU', 'هنغاريا', 'Hungary', '36', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(87, 'IS', 'أيسلندا', 'Iceland', '354', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(88, 'IN', 'الهند', 'India', '91', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(89, 'ID', 'أندونيسيا', 'Indonesia', '62', '2019-06-27 09:14:15', '2019-06-27 09:14:15'),
(90, 'IR', 'جمهورية إيران الإسلامية', 'Iran, Islamic Republic of', '98', '2019-06-27 09:14:16', '2019-06-27 09:14:16'),
(91, 'IQ', 'العراق', 'Iraq', '964', '2019-06-27 09:14:16', '2019-06-27 09:14:16'),
(92, 'IE', 'أيرلندا', 'Ireland', '353', '2019-06-27 09:14:16', '2019-06-27 09:14:16'),
(93, 'IM', 'جزيرة مان', 'Isle of Man', '44-1624', '2019-06-27 09:14:16', '2019-06-27 09:14:16'),
(94, 'IL', 'إسرائيل', 'Israel', '972', '2019-06-27 09:14:16', '2019-06-27 09:14:16'),
(95, 'IT', 'إيطاليا', 'Italy', '39', '2019-06-27 09:14:16', '2019-06-27 09:14:16'),
(96, 'JM', 'جامايكا', 'Jamaica', '1-876', '2019-06-27 09:14:16', '2019-06-27 09:14:16'),
(97, 'JP', 'اليابان', 'Japan', '81', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(98, 'JE', 'جيرسي', 'Jersey', '44-1534', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(99, 'JO', 'الأردن', 'Jordan', '962', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(100, 'KZ', 'كازاخستان', 'Kazakhstan', '7', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(101, 'KE', 'كينيا', 'Kenya', '254', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(102, 'KI', 'كيريباس', 'Kiribati', '686', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(103, 'KW', 'الكويت', 'Kuwait', '965', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(104, 'KG', 'قيرغيزستان', 'Kyrgyzstan', '996', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(105, 'LV', 'لاتفيا', 'Latvia', '371', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(106, 'LB', 'لبنان', 'Lebanon', '961', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(107, 'LS', 'ليسوتو', 'Lesotho', '266', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(108, 'LR', 'ليبيريا', 'Liberia', '231', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(109, 'LY', 'ليبيا', 'Libya', '218', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(110, 'LI', 'ليشتنشتاين', 'Liechtenstein', '423', '2019-06-27 09:14:17', '2019-06-27 09:14:17'),
(111, 'LT', 'ليتوانيا', 'Lithuania', '370', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(112, 'LU', 'لوكسمبورغ', 'Luxembourg', '352', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(113, 'MK', 'مقدونيا، جمهورية', 'Macedonia', '389', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(114, 'MG', 'مدغشقر', 'Madagascar', '261', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(115, 'MW', 'ملاوي', 'Malawi', '265', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(116, 'MY', 'ماليزيا', 'Malaysia', '60', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(117, 'MV', 'جزر المالديف', 'Maldives', '960', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(118, 'ML', 'مالي', 'Mali', '223', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(119, 'MT', 'مالطا', 'Malta', '356', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(120, 'MH', 'جزر مارشال', 'Marshall Islands', '692', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(121, 'MR', 'موريتانيا', 'Mauritania', '222', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(122, 'MU', 'موريشيوس', 'Mauritius', '230', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(123, 'YT', 'مايوت', 'Mayotte', '262', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(124, 'MX', 'المكسيك', 'Mexico', '52', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(125, 'FM', 'ولايات ميكرونيزيا الموحدة', 'Micronesia', '691', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(126, 'MD', 'مولدوفا', 'Moldova', '373', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(127, 'MC', 'موناكو', 'Monaco', '377', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(128, 'MN', 'منغوليا', 'Mongolia', '976', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(129, 'ME', 'الجبل الأسود', 'Montenegro', '382', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(130, 'MS', 'مونتسيرات', 'Montserrat', '1-664', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(131, 'MA', 'المغرب', 'Morocco', '212', '2019-06-27 09:14:18', '2019-06-27 09:14:18'),
(132, 'MZ', 'موزمبيق', 'Mozambique', '258', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(133, 'MM', 'ميانمار', 'Myanmar', '95', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(134, 'NA', 'ناميبيا', 'Namibia', '264', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(135, 'NR', 'ناورو', 'Nauru', '674', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(136, 'NP', 'نيبال', 'Nepal', '977', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(137, 'NL', 'هولندا', 'Netherlands', '31', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(138, 'AN', 'جزر الأنتيل الهولندية', 'Netherlands Antilles', '599', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(139, 'NC', 'كاليدونيا الجديدة', 'New Caledonia', '687', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(140, 'NZ', 'نيوزيلندا', 'New Zealand', '64', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(141, 'NI', 'نيكاراغوا', 'Nicaragua', '505', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(142, 'NE', 'النيجر', 'Niger', '227', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(143, 'NG', 'نيجيريا', 'Nigeria', '234', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(144, 'NU', 'نيوي', 'Niue', '683', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(145, 'NO', 'النرويج', 'Norway', '47', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(146, 'OM', 'عمان', 'Oman', '968', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(147, 'PK', 'باكستان', 'Pakistan', '92', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(148, 'PW', 'بالاو', 'Palau', '680', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(149, 'PS', 'فلسطين', 'Palestinian', '972', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(150, 'PA', 'بناما', 'Panama', '507', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(151, 'PY', 'باراغواي', 'Paraguay', '595', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(152, 'PE', 'بيرو', 'Peru', '51', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(153, 'PH', 'الفلبين', 'Philippines', '63', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(154, 'PN', 'بيتكيرن', 'Pitcairn', '870', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(155, 'PL', 'بولندا', 'Poland', '48', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(156, 'PT', 'البرتغال', 'Portugal', '351', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(157, 'PR', 'بويرتو ريكو', 'Puerto Rico', '1-787', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(158, 'QA', 'قطر', 'Qatar', '974', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(159, 'RO', 'رومانيا', 'Romania', '40', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(160, 'RU', 'الفيدرالية الروسية', 'Russian Federation', '7', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(161, 'RW', 'رواندا', 'Rwanda', '250', '2019-06-27 09:14:19', '2019-06-27 09:14:19'),
(162, 'SH', 'سانت هيلينا', 'Saint Helena', '290', '2019-06-27 09:14:20', '2019-06-27 09:14:20'),
(163, 'KN', 'سانت كيتس ونيفيس', 'Saint Kitts and Nevis', '1-869', '2019-06-27 09:14:20', '2019-06-27 09:14:20'),
(164, 'LC', 'سانت لوسيا', 'Saint Lucia', '1-758', '2019-06-27 09:14:20', '2019-06-27 09:14:20'),
(165, 'PM', 'سان بيار وميكلون', 'Saint Pierre and Miquelon', '508', '2019-06-27 09:14:20', '2019-06-27 09:14:20'),
(166, 'VC', 'سانت فنسنت وجزر غرينادين', 'Saint Vincent and Grenadines', '1-784', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(167, 'WS', 'ساموا', 'Samoa', '685', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(168, 'SM', 'سان مارينو', 'San Marino', '378', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(169, 'ST', 'ساو تومي وبرينسيبي', 'Sao Tome and Principe', '239', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(170, 'SA', 'المملكة العربية السعودية', 'Saudi Arabia', '966', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(171, 'SN', 'السنغال', 'Senegal', '221', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(172, 'RS', 'صربيا', 'Serbia', '381', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(173, 'SC', 'سيشيل', 'Seychelles', '248', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(174, 'SL', 'سيرا ليون', 'Sierra Leone', '232', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(175, 'SG', 'سنغافورة', 'Singapore', '65', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(176, 'SK', 'سلوفاكيا', 'Slovakia', '421', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(177, 'SI', 'سلوفينيا', 'Slovenia', '386', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(178, 'SB', 'جزر سليمان', 'Solomon Islands', '677', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(179, 'SO', 'الصومال', 'Somalia', '252', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(180, 'ZA', 'جنوب أفريقيا', 'South Africa', '27', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(181, 'ES', 'إسبانيا', 'Spain', '34', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(182, 'LK', 'سيريلانكا', 'Sri Lanka', '94', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(183, 'SD', 'السودان', 'Sudan', '249', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(184, 'SR', 'سورينام', 'Suriname', '597', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(185, 'SJ', 'جزر سفالبارد وجان ماين', 'Svalbard and Jan Mayen Islands', '47', '2019-06-27 09:14:21', '2019-06-27 09:14:21'),
(186, 'SZ', 'سوازيلاند', 'Swaziland', '268', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(187, 'SE', 'السويد', 'Sweden', '46', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(188, 'CH', 'سويسرا', 'Switzerland', '41', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(189, 'SY', 'سوريا', 'Syrian Arab Republic', '963', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(190, 'TW', 'تايوان، جمهورية الصين', 'Taiwan, Republic of China', '886', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(191, 'TJ', 'طاجيكستان', 'Tajikistan', '992', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(192, 'TZ', 'تنزانيا', 'Tanzania', '255', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(193, 'TH', 'تايلاند', 'Thailand', '66', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(194, 'TG', 'توغو', 'Togo', '228', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(195, 'TK', 'توكيلاو', 'Tokelau', '690', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(196, 'TO', 'تونغا', 'Tonga', '676', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(197, 'TT', 'ترينداد وتوباغو', 'Trinidad and Tobago', '1-868', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(198, 'TN', 'تونس', 'Tunisia', '216', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(199, 'TR', 'تركيا', 'Turkey', '90', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(200, 'TM', 'تركمانستان', 'Turkmenistan', '993', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(201, 'TC', 'جزر تركس وكايكوس', 'Turks and Caicos Islands', '1-649', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(202, 'TV', 'توفالو', 'Tuvalu', '688', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(203, 'UG', 'أوغندا', 'Uganda', '256', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(204, 'UA', 'أوكرانيا', 'Ukraine', '380', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(205, 'AE', 'الإمارات العربية المتحدة', 'United Arab Emirates', '971', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(206, 'GB', 'المملكة المتحدة', 'United Kingdom', '44', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(207, 'US', 'الولايات المتحدة الأمريكية', 'United States of America', '1', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(208, 'UY', 'أوروغواي', 'Uruguay', '598', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(209, 'UZ', 'أوزبكستان', 'Uzbekistan', '998', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(210, 'VU', 'فانواتو', 'Vanuatu', '678', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(211, 'VE', 'فنزويلا', 'Venezuela', '58', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(212, 'VN', 'فيتنام', 'Viet Nam', '84', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(213, 'WF', 'واليس وفوتونا', 'Wallis and Futuna Islands', '681', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(214, 'YE', 'اليمن', 'Yemen', '967', '2019-06-27 09:14:22', '2019-06-27 09:14:22'),
(215, 'ZM', 'زامبيا', 'Zambia', '260', '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(216, 'ZW', 'زيمبابوي', 'Zimbabwe', '263', '2019-06-27 09:14:23', '2019-06-27 09:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_products`
--

CREATE TABLE `favourite_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourite_products`
--

INSERT INTO `favourite_products` (`id`, `product_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(38, 52, 3, 1, '2019-08-05 15:31:55', '2019-07-31 15:09:56'),
(46, 51, 4, 0, '2019-08-04 11:23:42', '2019-08-04 16:23:42'),
(47, 52, 14, 0, '2019-08-04 09:17:32', '2019-08-04 14:17:32'),
(48, 42, 14, 0, '2019-08-05 15:44:49', '2019-08-05 20:44:49'),
(49, 44, 14, 0, '2019-08-08 11:25:07', '2019-08-08 16:25:07'),
(50, 49, 14, 0, '2019-08-04 11:20:27', '2019-08-04 16:20:27'),
(51, 43, 14, 1, '2019-08-06 12:00:17', '2019-08-05 20:44:51'),
(52, 45, 32, 1, '2019-08-18 16:04:59', '2019-08-05 20:45:14'),
(53, 43, 32, 0, '2019-08-19 11:57:11', '2019-08-19 09:57:11'),
(54, 42, 21, 1, '2019-09-04 08:31:17', '2019-09-04 13:31:17'),
(55, 45, 21, 0, '2019-08-06 09:51:06', '2019-08-06 14:51:06'),
(56, 47, 21, 1, '2019-08-08 15:00:28', '2019-08-08 20:00:28'),
(57, 52, 21, 1, '2019-08-08 15:00:26', '2019-08-08 20:00:26'),
(58, 49, 21, 0, '2019-08-08 14:37:24', '2019-08-08 19:37:24'),
(59, 40, 32, 1, '2019-08-20 13:14:24', '2019-08-20 11:14:24'),
(60, 44, 21, 1, '2019-09-04 08:31:16', '2019-09-04 13:31:16'),
(61, 52, 19, 1, '2019-08-08 12:23:17', '2019-08-08 17:23:17'),
(62, 47, 19, 0, '2019-08-08 11:54:15', '2019-08-08 16:54:15'),
(63, 42, 30, 0, '2019-08-08 14:17:36', '2019-08-08 19:17:36'),
(64, 47, 30, 0, '2019-08-17 10:11:40', '2019-08-17 15:11:40'),
(65, 52, 30, 1, '2019-08-17 13:46:38', '2019-08-17 18:46:38'),
(66, 49, 30, 0, '2019-08-08 15:49:50', '2019-08-08 20:49:50'),
(67, 44, 30, 0, '2019-08-08 14:17:34', '2019-08-08 19:17:34'),
(68, 43, 30, 0, '2019-08-08 14:17:33', '2019-08-08 19:17:33'),
(69, 42, 19, 1, '2019-08-08 20:01:03', '2019-08-08 20:01:03'),
(70, 43, 19, 1, '2019-08-08 20:02:14', '2019-08-08 20:02:14'),
(71, 45, 30, 0, '2019-08-17 13:45:07', '2019-08-17 18:45:07'),
(72, 44, 32, 1, '2019-08-19 11:31:04', '2019-08-19 09:31:04'),
(73, 47, 32, 0, '2019-08-20 14:56:56', '2019-08-20 12:56:56'),
(74, 46, 32, 1, '2019-08-19 11:29:51', '2019-08-19 11:29:51'),
(75, 52, 32, 0, '2019-08-20 08:55:19', '2019-08-20 06:55:19'),
(76, 56, 32, 0, '2019-08-20 14:49:18', '2019-08-20 12:49:18'),
(77, 55, 32, 0, '2019-08-20 14:40:33', '2019-08-20 12:40:33'),
(78, 54, 32, 0, '2019-08-20 14:46:11', '2019-08-20 12:46:11'),
(79, 47, 1, 0, '2019-08-22 08:49:58', '2019-08-22 06:49:58'),
(80, 43, 1, 0, '2019-08-22 14:13:11', '2019-08-22 12:13:11'),
(81, 49, 32, 0, '2019-08-25 10:56:23', '2019-08-25 08:56:23'),
(82, 52, 38, 1, '2019-08-30 23:11:59', '2019-08-30 23:11:59'),
(83, 46, 21, 1, '2019-09-04 13:31:14', '2019-09-04 13:31:14'),
(84, 40, 1, 1, '2019-09-07 08:58:58', '2019-09-07 13:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci,
  `details_en` text COLLATE utf8mb4_unicode_ci,
  `icon` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `row_no` int(11) NOT NULL,
  `father_id` int(11) NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `row_no`, `father_id`, `title_ar`, `title_en`, `status`, `type`, `cat_id`, `link`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'القائمة الرئيسية', 'Main Menu', 1, 0, 0, '', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(2, 2, 0, 'روابط سريعة', 'Quick Links', 1, 0, 0, '', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(3, 1, 1, 'الرئيسية', 'Home', 1, 1, 0, 'home', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(4, 2, 1, 'من نحن', 'About', 1, 1, 0, 'topic/about', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(5, 3, 1, 'خدماتنا', 'Services', 1, 3, 2, '', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(6, 4, 1, 'أخبارنا', 'News', 1, 2, 3, '', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(7, 5, 1, 'الصور', 'Photos', 1, 2, 4, '', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(8, 6, 1, 'الفيديو', 'Videos', 1, 3, 5, '', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(9, 7, 1, 'الصوتيات', 'Audio', 1, 3, 6, '', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(10, 8, 1, 'المنتجات', 'Products', 1, 3, 8, '', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(11, 9, 1, 'المدونة', 'Blog', 1, 2, 7, '', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(12, 10, 1, 'اتصل بنا', 'Contact', 1, 1, 0, 'contact', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(13, 1, 2, 'الرئيسية', 'Home', 1, 1, 0, 'home', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(14, 2, 2, 'من نحن', 'About Us', 1, 1, 0, 'topic/about', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(15, 3, 2, 'المدونة', 'Blog', 1, 2, 7, '', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(16, 4, 2, 'الخصوصية', 'Privacy', 1, 1, 0, 'topic/privacy', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(17, 5, 2, 'الشروط والأحكام', 'Terms & Conditions', 1, 1, 0, 'topic/terms', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23'),
(18, 6, 2, 'اتصل بنا', 'Contact Us', 1, 1, 0, 'contact', 1, NULL, '2019-06-27 09:14:23', '2019-06-27 09:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_04_02_193005_create_translations_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2017_09_14_194216_create_webmaster_settings_table', 1),
(5, '2017_09_14_194251_create_webmaster_sections_table', 1),
(6, '2017_09_14_194259_create_webmaster_banners_table', 1),
(7, '2017_09_14_194307_create_webmails_groups_table', 1),
(8, '2017_09_14_194314_create_webmails_files_table', 1),
(9, '2017_09_14_194321_create_webmails_table', 1),
(10, '2017_09_14_194328_create_topics_table', 1),
(11, '2017_09_14_194334_create_settings_table', 1),
(12, '2017_09_14_194342_create_sections_table', 1),
(13, '2017_09_14_194349_create_photos_table', 1),
(14, '2017_09_14_194356_create_permissions_table', 1),
(15, '2017_09_14_194403_create_menus_table', 1),
(16, '2017_09_14_194409_create_maps_table', 1),
(17, '2017_09_14_194417_create_events_table', 1),
(18, '2017_09_14_194424_create_countries_table', 1),
(19, '2017_09_14_194431_create_contacts_groups_table', 1),
(20, '2017_09_14_194438_create_contacts_table', 1),
(21, '2017_09_14_194444_create_comments_table', 1),
(22, '2017_09_14_194452_create_banners_table', 1),
(23, '2017_09_14_194506_create_attach_files_table', 1),
(24, '2017_09_14_194514_create_analytics_visitors_table', 1),
(25, '2017_09_14_194521_create_analytics_pages_table', 1),
(26, '2017_10_06_113629_create_related_topics_table', 1),
(27, '2017_10_07_184011_create_topic_categories_table', 1),
(28, '2017_10_24_194251_create_webmaster_section_fields_table', 1),
(29, '2017_10_24_194304_create_topic_fields_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('042d3c9822bc143c72bef2760c90339cedb100061291a984f8951d9f198f10aebf6a12663b88baa6', 5, 1, 'MyApp', '[]', 0, '2019-09-04 13:35:52', '2019-09-04 13:35:52', '2020-09-04 08:35:52'),
('065a34cfb966d1fe64239e806d14b7cf42f982b3968ae3805a95fb4e3344eeb9866a9818dcb6da1a', 21, 1, 'MyApp', '[]', 0, '2019-08-17 17:58:51', '2019-08-17 17:58:51', '2020-08-17 12:58:51'),
('0a51336f1e900289321a6d55931b68c939e42ca2fd17588bbf291154cc49156494b50d5f59ce2f7b', 21, 1, 'MyApp', '[]', 0, '2019-08-06 14:48:49', '2019-08-06 14:48:49', '2020-08-06 09:48:49'),
('0a78d266ec1fa603592a7a9e39596693f79af7f629366a578054b44eb69f911ef70c0aa6283a5a78', 6, 1, 'MyApp', '[]', 0, '2019-07-15 09:12:27', '2019-07-15 09:12:27', '2020-07-15 11:12:27'),
('0bb0fab45022cbbbd48db05e695b5e319cb0401c324f6ed9caac8e5ea2a61012ab0d5843d129d367', 6, 1, 'MyApp', '[]', 0, '2019-07-15 09:13:33', '2019-07-15 09:13:33', '2020-07-15 11:13:33'),
('0fb86b1819ca07dfb41911ad61bb926470814f7024d40b08c79bc02f94321b817a705a8ebfce5cda', 5, 1, 'MyApp', '[]', 0, '2019-07-15 09:00:24', '2019-07-15 09:00:24', '2020-07-15 11:00:24'),
('12e22a75a546969b5dec7ef884ceb2331197dc7b05fddfa01bfd9acf60b1ec8941efe2680eb54cc4', 5, 1, 'MyApp', '[]', 0, '2019-07-15 19:10:11', '2019-07-15 19:10:11', '2020-07-15 14:10:11'),
('15148e736ec045472a233d61c7e4dbfb2c09f3847f04dd1d41479e69d2ceeb05433ee18856f39687', 5, 1, 'MyApp', '[]', 0, '2019-07-15 20:53:15', '2019-07-15 20:53:15', '2020-07-15 15:53:15'),
('15e0f3250be55d11ab7867731fd3140b7b017348e48fc155d021a50e9b13bd5eaa57f34ae344fccc', 4, 1, 'MyApp', '[]', 0, '2019-07-15 16:37:00', '2019-07-15 16:37:00', '2020-07-15 11:37:00'),
('1ca506ccc0d5d0025c41cea09538b19992e382470a6058137cdb26bead6845cbbd94c7febd8192bd', 4, 1, 'MyApp', '[]', 0, '2019-07-24 16:47:06', '2019-07-24 16:47:06', '2020-07-24 11:47:06'),
('1dd92e9046eee4d537806caacf965af01e83216d5040f58bb421e10cac791358b38ca32cc0300ee2', 30, 1, 'MyApp', '[]', 0, '2019-08-08 20:40:50', '2019-08-08 20:40:50', '2020-08-08 15:40:50'),
('1f35e0fbca25d69f352f2c5db0fb45ec4235eed0a4203c19a3ee24ca4492b124f61286cf65d6157a', 16, 1, 'MyApp', '[]', 0, '2019-08-04 20:20:09', '2019-08-04 20:20:09', '2020-08-04 15:20:09'),
('1f385754cb0c16185aac8fe5c44e96c2cc0254c78eef5de1acb6662daa53bf7f3de902cac67466f7', 4, 1, 'MyApp', '[]', 0, '2019-07-22 13:47:50', '2019-07-22 13:47:50', '2020-07-22 08:47:50'),
('222c912f67813032156e44a67439bf26a3ba4367d259da1d787c9d2e396723b4ac3578092f84d6ec', 6, 1, 'MyApp', '[]', 0, '2019-07-15 09:12:21', '2019-07-15 09:12:21', '2020-07-15 11:12:21'),
('27336128a3db5db189ca8f62824c44dc37077ceb126b802d58838ba3306464a10084f5bba9cf8c65', 19, 1, 'MyApp', '[]', 0, '2019-08-06 20:39:33', '2019-08-06 20:39:33', '2020-08-06 15:39:33'),
('2902b4609acb7121f3f0c131be92d0adca20bc0ebfce395a66a1f5b387330be9b9f5d46fb4029f84', 4, 1, 'MyApp', '[]', 0, '2019-07-16 19:47:32', '2019-07-16 19:47:32', '2020-07-16 14:47:32'),
('2a4b790ef9940052c73998a8d2096bf2259a4e1fc934395ec4ddeb5d174d339e92348d8103fec53a', 6, 1, 'MyApp', '[]', 0, '2019-07-15 09:11:47', '2019-07-15 09:11:47', '2020-07-15 11:11:47'),
('3476a6d6ae590d2b090d72efd5ea602fa632d95e906e3429813837a5ddff4d3547678f8580842bef', 19, 1, 'MyApp', '[]', 0, '2019-08-06 23:03:22', '2019-08-06 23:03:22', '2020-08-06 18:03:22'),
('38633cd1e34e131bd8d1af92ff91a9cc266bacf70ecf3a43d5f74901a82b9f7b53314ee6ee0b760e', 39, 1, 'MyApp', '[]', 0, '2019-09-01 13:36:44', '2019-09-01 13:36:44', '2020-09-01 08:36:44'),
('3c5fab5585509fabb2944e40ee6b1d1a1058b1a781b064566a008e41c1accd9f10b4a7690c899e27', 17, 1, 'MyApp', '[]', 0, '2019-08-04 19:25:59', '2019-08-04 19:25:59', '2020-08-04 14:25:59'),
('3de3f0ae5f3cb34ce14babd3be7e64ca064266647ab61a3906e733906fa8481f2668ed4f524103fd', 5, 1, 'MyApp', '[]', 0, '2019-07-22 16:54:18', '2019-07-22 16:54:18', '2020-07-22 11:54:18'),
('40dde68cb154a22b8e3f5c32cb4c1d44bc16a3b294f35c3e10870cd87139e20c809eb475e7a9aea1', 30, 1, 'MyApp', '[]', 0, '2019-08-08 17:27:16', '2019-08-08 17:27:16', '2020-08-08 12:27:16'),
('41032c992b751d352eee601ff7ede09a5d2601dde5fe82430f21bacc36c344d81622ce12f63407f4', 6, 1, 'MyApp', '[]', 0, '2019-07-15 09:13:45', '2019-07-15 09:13:45', '2020-07-15 11:13:45'),
('422ab145e6023dfb9a32a3fc775368ed91d8777da2b7df0864fb2b87fffeb8d3272a0595604c8e88', 5, 1, 'MyApp', '[]', 0, '2019-07-16 16:40:40', '2019-07-16 16:40:40', '2020-07-16 11:40:40'),
('42df42ab6839b5fe7183c3709162277db27a12ebeeee511465a0fa459e2cf77c151ea2566295e6d3', 4, 1, 'MyApp', '[]', 0, '2019-08-28 17:02:18', '2019-08-28 17:02:18', '2020-08-28 12:02:18'),
('44f513db61968056939bc3f11a86f914ff37f9f74c8738b94d6d2e7dd28eb4e70303f765cbba5a40', 4, 1, 'MyApp', '[]', 0, '2019-07-15 16:36:41', '2019-07-15 16:36:41', '2020-07-15 11:36:41'),
('464ad2b4a3e3b5daca7c1494de8b6cf386bce12ca4659a7857663c06673caf5903451a12dcfa86fa', 5, 1, 'MyApp', '[]', 0, '2019-07-16 14:35:48', '2019-07-16 14:35:48', '2020-07-16 09:35:48'),
('4b2a04404b0d8321ac9352088a00b34c34879af2f3dd38f37e43cead60018ae6cee961fb01cdb4fb', 21, 1, 'MyApp', '[]', 0, '2019-08-06 14:48:19', '2019-08-06 14:48:19', '2020-08-06 09:48:19'),
('4c9f98c077cfb8f6f92c48074966984379549e2ca5abbf6ec44ffd1b80a21edb277ebbe927a794d4', 4, 1, 'MyApp', '[]', 0, '2019-07-15 08:59:04', '2019-07-15 08:59:04', '2020-07-15 10:59:04'),
('4f1cd5c840dae872cb1b0043b69ff5dc2cc082fd7513ba72d1ef5a0b68c53de1b6d156d10b25af0c', 4, 1, 'MyApp', '[]', 0, '2019-07-31 17:52:52', '2019-07-31 17:52:52', '2020-07-31 12:52:52'),
('58272e81e56985bccedc0516fa1e296322b1151d78740b7ee61ff1d406175776441a9db157d51764', 14, 1, 'MyApp', '[]', 0, '2019-07-31 15:35:03', '2019-07-31 15:35:03', '2020-07-31 10:35:03'),
('58c4cc0f3d862b8e3d4e24cf79f258bceebdec80fe726e2bb14dd5718ffe1c1b6517b96e76468907', 4, 1, 'MyApp', '[]', 0, '2019-08-30 00:45:10', '2019-08-30 00:45:10', '2020-08-29 19:45:10'),
('5ddc3522e1388d28f7c3bbc640569093c90cd2464b2ec65058733b9716d914868d7c8a3ccc70a333', 4, 1, 'MyApp', '[]', 0, '2019-07-15 17:21:43', '2019-07-15 17:21:43', '2020-07-15 12:21:43'),
('606b0029b21009f68c213a304f4b3ce6f9ccbc7213b6528f7f979cbaeeb312f608725e020f159820', 4, 1, 'MyApp', '[]', 0, '2019-08-28 17:37:56', '2019-08-28 17:37:56', '2020-08-28 12:37:56'),
('624ea93d3ace9c06a301d6e9fb54fc71ff8f7456ac46fdbaf2d2aaa0e6babf1a2b6be2cdc5a7abc9', 14, 1, 'MyApp', '[]', 0, '2019-08-01 15:14:29', '2019-08-01 15:14:29', '2020-08-01 10:14:29'),
('64bffa788222b9c0e12774a8da004913d9ae917093da562ba20b173cee590e29a5298b674fd0e84c', 4, 1, 'MyApp', '[]', 0, '2019-07-15 16:32:08', '2019-07-15 16:32:08', '2020-07-15 11:32:08'),
('64f386c1fde8a1d0113195175f4bca03b4a3a5e9be8ab2fb8a1f46d5dc39583b72a464b3c9d300ab', 21, 1, 'MyApp', '[]', 0, '2019-08-06 14:46:24', '2019-08-06 14:46:24', '2020-08-06 09:46:24'),
('6599a6b93103a205347d6b1a1bcdc805c4b7b759c53ecb7628c904ae66e974ab770d61260cf801f5', 30, 1, 'MyApp', '[]', 0, '2019-08-08 21:58:38', '2019-08-08 21:58:38', '2020-08-08 16:58:38'),
('66746302ba92d6e928954667c853b383c1da35665ee773f28c778762f313dbbb84af4ed0db9490c0', 4, 1, 'MyApp', '[]', 0, '2019-07-15 16:55:00', '2019-07-15 16:55:00', '2020-07-15 11:55:00'),
('679c152282d85c3535fed491fbef6042aa5e9753a2dade03c99df6869cb615765651be82c7524858', 6, 1, 'MyApp', '[]', 0, '2019-07-15 17:04:50', '2019-07-15 17:04:50', '2020-07-15 12:04:50'),
('727e9a29f9f7e422019ec987f3179deaa015c28d6f556e6a0a6e67b89d4abb6a879feca877dd485a', 7, 1, 'MyApp', '[]', 0, '2019-07-15 17:27:08', '2019-07-15 17:27:08', '2020-07-15 12:27:08'),
('736e47df292f003215257cc5b7ee5aba5a05560b8caef018ea35bb239ddd7c3ba91fca1e10d70498', 4, 1, 'MyApp', '[]', 0, '2019-07-15 16:43:08', '2019-07-15 16:43:08', '2020-07-15 11:43:08'),
('783f540d7986d6f28775fee6098b2a23ea9cc820df480e762f2fedd5eda46bb8ed2e81c6f1bf8349', 5, 1, 'MyApp', '[]', 0, '2019-07-15 17:00:10', '2019-07-15 17:00:10', '2020-07-15 12:00:10'),
('7bcdc6a27eea5c54aeb26487d3682ad2ac408dd81e2ea9c6d4734dd86ac42aa2c20143809af3e643', 4, 1, 'MyApp', '[]', 0, '2019-07-29 13:40:32', '2019-07-29 13:40:32', '2020-07-29 08:40:32'),
('86f2e6a83010fb32964045c9e556e9dd5183261239032af349e627e994efb105c14f64db5d1ba2d1', 21, 1, 'MyApp', '[]', 0, '2019-08-08 17:47:24', '2019-08-08 17:47:24', '2020-08-08 12:47:24'),
('87eb3afb020428eadcfa39cc455cd3a8858eca4536a8a552208c781f8f43ead541510ea5b454c987', 19, 1, 'MyApp', '[]', 0, '2019-09-01 13:58:00', '2019-09-01 13:58:00', '2020-09-01 08:58:00'),
('8ab638bace2c6fa45d1b4e55b40b51be7e04241d922a51fcde511a6561e80961d780f58adde90810', 4, 1, 'MyApp', '[]', 0, '2019-07-16 14:33:05', '2019-07-16 14:33:05', '2020-07-16 09:33:05'),
('8caccf8d378e566f7e4c8c1d9de539eab0b8337172fa027e20a1fdebb67c9f200c4a57cc2cdd4583', 4, 1, 'MyApp', '[]', 0, '2019-07-15 16:59:59', '2019-07-15 16:59:59', '2020-07-15 11:59:59'),
('92a57d5a8fd202ecdfef0d666216eb644c476c1fcef1654e279eea47f8555855075ac18b06fc724c', 4, 1, 'MyApp', '[]', 0, '2019-08-28 17:03:56', '2019-08-28 17:03:56', '2020-08-28 12:03:56'),
('945b16c12167fa9adfb5b86435ebbd31bbb239c8c1e2cd040c45e442a235a60c5490459f0ebe648c', 19, 1, 'MyApp', '[]', 0, '2019-08-06 13:52:51', '2019-08-06 13:52:51', '2020-08-06 08:52:51'),
('9ab9e415a7137a171b3394f148bb50cbcab24ef1714b8c0d90826ca405e414ce4843a08eb54064a6', 8, 1, 'MyApp', '[]', 0, '2019-07-15 20:13:56', '2019-07-15 20:13:56', '2020-07-15 15:13:56'),
('9efe33a057228f0defafb365813a325dd41a99aa92d56d991223ef0b611130f7067c8d0abf621fa1', 19, 1, 'MyApp', '[]', 0, '2019-08-08 19:50:41', '2019-08-08 19:50:41', '2020-08-08 14:50:41'),
('a105b18e03f72ad152e3fc01ec9ec5339b079eb25f767ba2077eb1e7ff53b08e79344f6862d5e07e', 30, 1, 'MyApp', '[]', 0, '2019-08-17 15:35:13', '2019-08-17 15:35:13', '2020-08-17 10:35:13'),
('a31ba66a98e6f12ef023fab04ac5ab293a3d8d04a35b653a7fbbcae92b1f0da42a5d7cf7401b970f', 4, 1, 'MyApp', '[]', 0, '2019-07-22 13:45:57', '2019-07-22 13:45:57', '2020-07-22 08:45:57'),
('aa6bba4ebe4a7571b1076d7bb0d75d58819b71a04b969a637a9569ef138d005e59cf9e00cd6cd2a7', 5, 1, 'MyApp', '[]', 0, '2019-07-29 19:05:12', '2019-07-29 19:05:12', '2020-07-29 14:05:12'),
('ac4941a2ed7d070eb1fbecf835aecd25bb087ea7df2364fa9e62bb1cc55a5ab024d58ce2ec1df9d8', 6, 1, 'MyApp', '[]', 0, '2019-07-15 09:02:16', '2019-07-15 09:02:16', '2020-07-15 11:02:16'),
('bcf9f0130e9d7a6cf2b2b998558321e659b07517ec90b9fae8ee19680861835260768fdbaccefc82', 9, 1, 'MyApp', '[]', 0, '2019-07-15 20:18:53', '2019-07-15 20:18:53', '2020-07-15 15:18:53'),
('bd1d45979cf9eb1712eae9e4209337deff30784efc57314ab23aff4d2344e84ee9a5f0ea4c9750f5', 4, 1, 'MyApp', '[]', 0, '2019-08-28 19:47:06', '2019-08-28 19:47:06', '2020-08-28 14:47:06'),
('bf30b140cccdbdc0f34288715ec90db15844d6fc3cdf0e08b27d8dc5d8831dddd0c6afca6f5476d1', 16, 1, 'MyApp', '[]', 0, '2019-08-04 18:04:06', '2019-08-04 18:04:06', '2020-08-04 13:04:06'),
('c778fbfe85adbd45bb94bb7411efbfbf9a15db464a34ca4fd5138ab7b16555109f5be878b3943b7d', 14, 1, 'MyApp', '[]', 0, '2019-07-31 15:03:52', '2019-07-31 15:03:52', '2020-07-31 10:03:52'),
('c8d5ba39856dfee70514f1d2bcd10f5cd9cbe09b5acd74cecb1181e8266abe22bd72ae0b4f688196', 30, 1, 'MyApp', '[]', 0, '2019-08-17 13:22:57', '2019-08-17 13:22:57', '2020-08-17 08:22:57'),
('d9cd260087a7cf4fb58db8c82968e0998ff78a2b2667b8c47fbeeda4365a50e66a5cf4f1919622aa', 15, 1, 'MyApp', '[]', 0, '2019-07-31 17:52:53', '2019-07-31 17:52:53', '2020-07-31 12:52:53'),
('da0119acd489dc47e61d92ab3e0fea9e608e21fd0120d60f79ab8aa34418530b1e4afa2e16fe0985', 5, 1, 'MyApp', '[]', 0, '2019-07-15 20:50:49', '2019-07-15 20:50:49', '2020-07-15 15:50:49'),
('e101f3bcf8e4235518c7a7e98c8603c8aa5b8b1cb7c300deb26e0055d6161bf54272240524666fd7', 6, 1, 'MyApp', '[]', 0, '2019-07-15 09:10:59', '2019-07-15 09:10:59', '2020-07-15 11:10:59'),
('e313b6144011bf30b238c5fa085a6e9451f071ca4bc1c28071ff86df7cd9f55801c2b0c56f657873', 14, 1, 'MyApp', '[]', 0, '2019-07-31 15:34:07', '2019-07-31 15:34:07', '2020-07-31 10:34:07'),
('e71bf220e73e2044fd79f1e537b63b58b252a85f5b9eebed6ab9ec769942c3be903b6cf90e4c1b31', 6, 1, 'MyApp', '[]', 0, '2019-07-15 09:12:08', '2019-07-15 09:12:08', '2020-07-15 11:12:08'),
('e765f9113baea846b17f7079c096d3cd7985b8e98274b6ed55931c4df3fd7ad323866dbc902cbab4', 16, 1, 'MyApp', '[]', 0, '2019-08-04 19:29:53', '2019-08-04 19:29:53', '2020-08-04 14:29:53'),
('e9257be7ce3ba21569726432469ac32af306bf7f5c8f34e5da9f9d92cce17732c1ad642216ca4919', 4, 1, 'MyApp', '[]', 0, '2019-09-01 17:42:21', '2019-09-01 17:42:21', '2020-09-01 12:42:21'),
('ee129a2a671c180ed351beb19f4b0595660cb89824cca8fbae9a98ca76c28b8573bf9bd05c0b9b31', 16, 1, 'MyApp', '[]', 0, '2019-08-04 20:12:53', '2019-08-04 20:12:53', '2020-08-04 15:12:53'),
('f254908804ef99165afd97fe40eb88c4e3a1fc9468919c6af9fbb1f5f44dbd12f01c2c0a9e95a007', 5, 1, 'MyApp', '[]', 0, '2019-07-15 17:47:28', '2019-07-15 17:47:28', '2020-07-15 12:47:28'),
('f5b3ed10b41b58f1e4012fd3833501a0f1e6345372900f5bbef3b0fa8116f3fe131a89ed119c58d2', 14, 1, 'MyApp', '[]', 0, '2019-08-01 15:16:37', '2019-08-01 15:16:37', '2020-08-01 10:16:37'),
('f822974a9ca3355c1f740811b7ebe1100dd6e3dfb5da815725993367be1099551848908664e293ad', 20, 1, 'MyApp', '[]', 0, '2019-08-06 14:32:10', '2019-08-06 14:32:10', '2020-08-06 09:32:10'),
('f8db2e59e77d5935c991b36455c1a24d36104d82d7917b93931c4b38e48992e731df7f7353a02d5a', 4, 1, 'MyApp', '[]', 0, '2019-08-28 17:04:27', '2019-08-28 17:04:27', '2020-08-28 12:04:27'),
('f9fe47fa0e62809c978c6b178d095a2412e8e01fcda49a723107a32ff25fa34ee2810327b66b6283', 5, 1, 'MyApp', '[]', 0, '2019-07-15 19:10:20', '2019-07-15 19:10:20', '2020-07-15 14:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'tWPZjPJru1ZFEiYaXm68v1quEGjGKurENMqjpDDk', 'http://localhost', 1, 0, 0, '2019-07-15 08:57:57', '2019-07-15 08:57:57'),
(2, NULL, 'Laravel Password Grant Client', 'jtpVoJ1qCe8pcIwIRzl7j7bZ0Z61Gl9W7gS9Ai4A', 'http://localhost', 0, 1, 0, '2019-07-15 08:57:57', '2019-07-15 08:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-07-15 08:57:57', '2019-07-15 08:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `order_date` date NOT NULL,
  `status` enum('pending','complete','cancel','delivery') DEFAULT 'pending',
  `user_id` int(11) NOT NULL,
  `payment_type` enum('card','cash','wallet') NOT NULL,
  `total_price_b_ch_vat` decimal(10,0) DEFAULT NULL,
  `city` varchar(225) DEFAULT NULL,
  `address` text,
  `taxes` decimal(10,0) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `delivery_fees` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `order_date`, `status`, `user_id`, `payment_type`, `total_price_b_ch_vat`, `city`, `address`, `taxes`, `phone`, `delivery_fees`, `created_at`, `updated_at`) VALUES
(95, '346', '2019-08-26', 'delivery', 1, 'cash', '216', NULL, NULL, '22', NULL, '108', '2019-08-26 07:42:35', '2019-08-26 04:50:18'),
(96, '37', '2019-08-26', 'pending', 1, 'cash', '23', NULL, NULL, '2', NULL, '12', '2019-08-26 05:42:20', '2019-08-26 05:42:20'),
(97, '293', '2019-09-01', 'pending', 1, 'cash', '213', NULL, NULL, '30', NULL, '50', '2019-09-01 13:45:14', '2019-09-01 13:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(14,2) DEFAULT NULL,
  `price_sp` decimal(10,2) NOT NULL,
  `standard_gold_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `qty` bigint(20) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `price`, `price_sp`, `standard_gold_id`, `size_id`, `qty`, `product_id`, `created_at`, `updated_at`) VALUES
(120, 95, NULL, '0.00', 0, 0, 1, 43, '2019-08-26 04:50:18', '2019-08-26 04:50:18'),
(121, 95, NULL, '0.00', 0, 0, 1, 49, '2019-08-26 04:50:18', '2019-08-26 04:50:18'),
(122, 96, NULL, '0.00', 0, 0, 1, 56, '2019-08-26 05:42:20', '2019-08-26 05:42:20'),
(123, 97, NULL, '0.00', 0, 0, 1, 43, '2019-09-01 13:45:14', '2019-09-01 13:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`, `updated_at`) VALUES
('test@gmail.com', 'VrOxXeHIPenJjfy6p20DDypfSFJByiIs', '2019-07-26 01:22:41', '2019-07-26 01:22:41'),
('test@gmail.com', 'DqMbppmLUkHeT6gWUsCHKnuf84A0H4WB', '2019-07-31 17:53:05', '2019-07-31 17:53:05'),
('hy@yahoo.com', 'yTMUhjrqLZmin3EfRREwpipRYAgayOPe', '2019-08-07 17:44:15', '2019-08-07 17:44:15'),
('mouse.fcis@gmail.com', 'miDTvp1Gh8J5aeSLaE2vQeFllP62aacx', '2019-08-17 13:09:38', '2019-08-17 13:09:38'),
('mouse.fcis@gmail.com', 'A0Ihvd8YqtLPWWbjUQKtKfz4iwLHrWgh', '2019-08-17 13:12:56', '2019-08-17 13:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_status` tinyint(4) NOT NULL DEFAULT '0',
  `add_status` tinyint(4) NOT NULL DEFAULT '0',
  `edit_status` tinyint(4) NOT NULL DEFAULT '0',
  `delete_status` tinyint(4) NOT NULL DEFAULT '0',
  `analytics_status` tinyint(4) NOT NULL DEFAULT '0',
  `inbox_status` tinyint(4) NOT NULL DEFAULT '0',
  `newsletter_status` tinyint(4) NOT NULL DEFAULT '0',
  `calendar_status` tinyint(4) NOT NULL DEFAULT '0',
  `banners_status` tinyint(4) NOT NULL DEFAULT '0',
  `settings_status` tinyint(4) NOT NULL DEFAULT '0',
  `webmaster_status` tinyint(4) NOT NULL DEFAULT '0',
  `data_sections` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_status` int(11) NOT NULL,
  `orders_status` int(11) NOT NULL,
  `filters_status` int(11) NOT NULL,
  `categories_status` int(11) NOT NULL,
  `promocode_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `view_status`, `add_status`, `edit_status`, `delete_status`, `analytics_status`, `inbox_status`, `newsletter_status`, `calendar_status`, `banners_status`, `settings_status`, `webmaster_status`, `data_sections`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `users_status`, `orders_status`, `filters_status`, `categories_status`, `promocode_status`) VALUES
(1, 'Webmaster', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26', 1, 1, NULL, '2019-06-27 09:14:08', '2019-09-08 14:08:21', 1, 1, 1, 1, 1),
(2, 'Website Manager', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '1,2,3,4,5,6,7,8,9', 1, 1, NULL, '2019-06-27 09:14:08', '2019-06-27 09:14:08', 0, 0, 0, 0, 0),
(3, 'Limited User', 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, '1,2,3,4,5,6,7,8,9', 1, 1, NULL, '2019-06-27 09:14:08', '2019-06-27 09:14:08', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `product_id`, `file`, `title`, `row_no`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(15, 8, '15620718743617.jpg', '62382316_896206480717163_6110480230063800320_n', 1, 1, NULL, '2019-07-02 10:51:14', '2019-07-02 10:51:14'),
(16, 14, '15620721229327.PNG', 'Capture', 1, 1, NULL, '2019-07-02 10:55:22', '2019-07-02 10:55:22'),
(17, 14, '15620722585853.jpg', '18011_W_RND_Tmb_90X70', 2, 1, NULL, '2019-07-02 10:57:38', '2019-07-02 10:57:38'),
(18, 14, '15620722731559.jpg', '62382316_896206480717163_6110480230063800320_n', 3, 1, NULL, '2019-07-02 10:57:53', '2019-07-02 10:57:53'),
(19, 14, '15620724315231.jpg', '65672579_2258979050854222_467740978124423168_n', 4, 1, NULL, '2019-07-02 11:00:31', '2019-07-02 11:00:31'),
(26, 31, '15630457831622.PNG', '1', 1, 1, NULL, '2019-07-14 00:23:03', '2019-07-14 00:23:03'),
(28, 31, '15630457869473.PNG', 'Shama1', 3, 1, NULL, '2019-07-14 00:23:06', '2019-07-14 00:23:06'),
(29, 31, '15630457876864.PNG', 'Shama2', 4, 1, NULL, '2019-07-14 00:23:07', '2019-07-14 00:23:07'),
(37, 34, '15637958215713.jpg', '66c2f5ef-008f-4855-99c0-15e8defe37c6', 1, 1, NULL, '2019-07-22 16:43:41', '2019-07-22 16:43:41'),
(38, 34, '15637958312436.jpg', '66c2f5ef-008f-4855-99c0-15e8defe37c6', 2, 1, NULL, '2019-07-22 16:43:51', '2019-07-22 16:43:51'),
(39, 34, '15637958441684.jpg', '9170453f-7834-48b4-9aa1-15456b97101f', 3, 1, NULL, '2019-07-22 16:44:04', '2019-07-22 16:44:04'),
(56, 40, '15663057481251.png', '2', 2, 32, NULL, '2019-08-20 10:55:48', '2019-08-20 10:55:48'),
(57, 40, '15663057495082.png', '2-rings', 3, 32, NULL, '2019-08-20 10:55:49', '2019-08-20 10:55:49'),
(58, 40, '15663058178599.png', '1', 4, 32, NULL, '2019-08-20 10:56:57', '2019-08-20 10:56:57'),
(59, 40, '15663058219422.png', '2', 5, 32, NULL, '2019-08-20 10:57:01', '2019-08-20 10:57:01'),
(60, 40, '15663058216588.png', '1', 6, 32, NULL, '2019-08-20 10:57:01', '2019-08-20 10:57:01'),
(61, 40, '15663058221726.png', '2-rings', 7, 32, NULL, '2019-08-20 10:57:02', '2019-08-20 10:57:02'),
(74, 54, '15663804873378.png', '2', 1, 1, NULL, '2019-08-21 07:41:27', '2019-08-21 07:41:27'),
(75, 54, '15663804871562.png', '1', 2, 1, NULL, '2019-08-21 07:41:27', '2019-08-21 07:41:27'),
(76, 54, '15663804888035.png', '2-rings', 3, 1, NULL, '2019-08-21 07:41:28', '2019-08-21 07:41:28'),
(77, 54, '15663804915481.png', '1', 4, 1, NULL, '2019-08-21 07:41:31', '2019-08-21 07:41:31'),
(78, 54, '15663804913916.png', '2', 5, 1, NULL, '2019-08-21 07:41:31', '2019-08-21 07:41:31'),
(79, 54, '15663804916518.png', '2-rings', 6, 1, NULL, '2019-08-21 07:41:31', '2019-08-21 07:41:31'),
(98, 49, '15663805532953.png', '2', 1, 1, NULL, '2019-08-21 07:42:33', '2019-08-21 07:42:33'),
(99, 49, '15663805546971.png', '1', 2, 1, NULL, '2019-08-21 07:42:34', '2019-08-21 07:42:34'),
(100, 49, '15663805547384.png', '2-rings', 3, 1, NULL, '2019-08-21 07:42:34', '2019-08-21 07:42:34'),
(104, 46, '15663805664891.png', '1', 1, 1, NULL, '2019-08-21 07:42:46', '2019-08-21 07:42:46'),
(106, 46, '15663805662689.png', '2-rings', 3, 1, NULL, '2019-08-21 07:42:46', '2019-08-21 07:42:46'),
(113, 45, '15663805812591.png', '1', 4, 1, NULL, '2019-08-21 07:43:01', '2019-08-21 07:43:01'),
(114, 45, '15663805819158.png', '2', 5, 1, NULL, '2019-08-21 07:43:01', '2019-08-21 07:43:01'),
(115, 45, '15663805815199.png', '2-rings', 6, 1, NULL, '2019-08-21 07:43:01', '2019-08-21 07:43:01'),
(116, 44, '15663805993406.png', '1', 1, 1, NULL, '2019-08-21 07:43:19', '2019-08-21 07:43:19'),
(117, 44, '15663805994808.png', '2', 2, 1, NULL, '2019-08-21 07:43:19', '2019-08-21 07:43:19'),
(118, 44, '15663805998245.png', '2-rings', 3, 1, NULL, '2019-08-21 07:43:19', '2019-08-21 07:43:19'),
(119, 44, '15663806029748.png', '1', 4, 1, NULL, '2019-08-21 07:43:22', '2019-08-21 07:43:22'),
(120, 44, '15663806032198.png', '2', 5, 1, NULL, '2019-08-21 07:43:23', '2019-08-21 07:43:23'),
(127, 43, '15663806277168.png', '2-rings', 6, 1, NULL, '2019-08-21 07:43:47', '2019-08-21 07:43:47'),
(134, 40, '15663806678817.png', '1', 8, 1, NULL, '2019-08-21 07:44:27', '2019-08-21 07:44:27'),
(135, 40, '15663806676044.png', '2', 9, 1, NULL, '2019-08-21 07:44:27', '2019-08-21 07:44:27'),
(136, 40, '15663806676835.png', '2-rings', 10, 1, NULL, '2019-08-21 07:44:27', '2019-08-21 07:44:27'),
(137, 22, '15667358838932.png', '1', 1, 32, NULL, '2019-08-25 10:24:43', '2019-08-25 10:24:43'),
(138, 22, '15667358841381.png', '1 (1)', 2, 32, NULL, '2019-08-25 10:24:44', '2019-08-25 10:24:44'),
(139, 22, '15667358842524.png', '2', 3, 32, NULL, '2019-08-25 10:24:44', '2019-08-25 10:24:44'),
(140, 22, '15667358842277.png', '3', 4, 32, NULL, '2019-08-25 10:24:44', '2019-08-25 10:24:44'),
(141, 52, '15671902547699.png', '15670819895619', 14, 38, NULL, '2019-08-30 23:37:34', '2019-08-30 23:37:34'),
(142, 52, '15671909958243.png', '15670819895619', 15, 38, NULL, '2019-08-30 23:49:55', '2019-08-30 23:49:55'),
(144, 52, '15671910667252.jpg', '44177307_2407301322830788_3964335409269309440_n', 17, 38, NULL, '2019-08-30 23:51:06', '2019-08-30 23:51:06'),
(145, 52, '15671911068374.jpg', '44186021_2407301329497454_6221822369539817472_n', 18, 38, NULL, '2019-08-30 23:51:46', '2019-08-30 23:51:46'),
(146, 52, '15671911065705.jpg', '44262529_2407301309497456_4320270674917588992_n', 19, 38, NULL, '2019-08-30 23:51:46', '2019-08-30 23:51:46'),
(147, 52, '15671911075757.jpg', '44380811_2407301392830781_1726543721614278656_n', 20, 38, NULL, '2019-08-30 23:51:47', '2019-08-30 23:51:47'),
(148, 47, '15675252919838.png', '1', 1, 1, NULL, '2019-09-03 20:41:31', '2019-09-03 20:41:31'),
(149, 47, '15675252917572.png', '2', 2, 1, NULL, '2019-09-03 20:41:31', '2019-09-03 20:41:31'),
(150, 47, '15675252933993.png', '2-rings', 3, 1, NULL, '2019-09-03 20:41:33', '2019-09-03 20:41:33'),
(151, 56, '15679265136105.png', '2', 1, 1, NULL, '2019-09-08 12:08:33', '2019-09-08 12:08:33'),
(152, 56, '15679265138780.png', '1', 2, 1, NULL, '2019-09-08 12:08:33', '2019-09-08 12:08:33'),
(153, 56, '15679265144323.png', '2-rings', 3, 1, NULL, '2019-09-08 12:08:34', '2019-09-08 12:08:34'),
(154, 56, '15679265228440.png', '1', 4, 1, NULL, '2019-09-08 12:08:42', '2019-09-08 12:08:42'),
(155, 56, '15679265227406.png', '2', 5, 1, NULL, '2019-09-08 12:08:42', '2019-09-08 12:08:42'),
(156, 56, '15679265252785.png', '2-rings', 6, 1, NULL, '2019-09-08 12:08:45', '2019-09-08 12:08:45'),
(157, 46, '15679266234017.png', '1', 4, 1, NULL, '2019-09-08 12:10:23', '2019-09-08 12:10:23'),
(158, 46, '15679266233608.png', '2', 5, 1, NULL, '2019-09-08 12:10:23', '2019-09-08 12:10:23'),
(159, 46, '15679266244975.png', '2-rings', 6, 1, NULL, '2019-09-08 12:10:24', '2019-09-08 12:10:24'),
(160, 46, '15679266291955.png', '1', 7, 1, NULL, '2019-09-08 12:10:29', '2019-09-08 12:10:29'),
(161, 46, '15679266303986.png', '2-rings', 8, 1, NULL, '2019-09-08 12:10:30', '2019-09-08 12:10:30'),
(162, 46, '15679266316890.png', '2', 9, 1, NULL, '2019-09-08 12:10:31', '2019-09-08 12:10:31'),
(163, 45, '15679266671647.png', '2', 7, 1, NULL, '2019-09-08 12:11:07', '2019-09-08 12:11:07'),
(164, 45, '15679266681257.png', '2-rings', 8, 1, NULL, '2019-09-08 12:11:08', '2019-09-08 12:11:08'),
(165, 45, '15679266683728.png', '1', 9, 1, NULL, '2019-09-08 12:11:08', '2019-09-08 12:11:08'),
(166, 45, '15679266732407.png', '2', 10, 1, NULL, '2019-09-08 12:11:13', '2019-09-08 12:11:13'),
(167, 45, '15679266749183.png', '1', 11, 1, NULL, '2019-09-08 12:11:14', '2019-09-08 12:11:14'),
(168, 45, '15679266742814.png', '2-rings', 12, 1, NULL, '2019-09-08 12:11:14', '2019-09-08 12:11:14'),
(169, 44, '15679267036294.png', '1', 6, 1, NULL, '2019-09-08 12:11:43', '2019-09-08 12:11:43'),
(170, 44, '15679267038068.png', '2', 7, 1, NULL, '2019-09-08 12:11:43', '2019-09-08 12:11:43'),
(171, 44, '15679267043262.png', '2-rings', 8, 1, NULL, '2019-09-08 12:11:44', '2019-09-08 12:11:44'),
(172, 44, '15679267099818.png', '1', 9, 1, NULL, '2019-09-08 12:11:49', '2019-09-08 12:11:49'),
(173, 44, '15679267104334.png', '2-rings', 10, 1, NULL, '2019-09-08 12:11:50', '2019-09-08 12:11:50'),
(174, 44, '15679267117404.png', '2', 11, 1, NULL, '2019-09-08 12:11:51', '2019-09-08 12:11:51'),
(175, 43, '15679267464413.png', '2', 7, 1, NULL, '2019-09-08 12:12:26', '2019-09-08 12:12:26'),
(176, 43, '15679267467907.png', '1', 8, 1, NULL, '2019-09-08 12:12:26', '2019-09-08 12:12:26'),
(177, 43, '15679267475085.png', '2-rings', 9, 1, NULL, '2019-09-08 12:12:27', '2019-09-08 12:12:27'),
(178, 43, '15679267527552.png', '1', 10, 1, NULL, '2019-09-08 12:12:32', '2019-09-08 12:12:32'),
(179, 43, '15679267536377.png', '2-rings', 11, 1, NULL, '2019-09-08 12:12:33', '2019-09-08 12:12:33'),
(180, 43, '15679267544514.png', '2', 12, 1, NULL, '2019-09-08 12:12:34', '2019-09-08 12:12:34'),
(181, 42, '15679268036187.png', '2', 1, 1, NULL, '2019-09-08 12:13:23', '2019-09-08 12:13:23'),
(182, 42, '15679268053755.png', '2-rings', 2, 1, NULL, '2019-09-08 12:13:25', '2019-09-08 12:13:25'),
(183, 42, '15679268055818.png', '1', 3, 1, NULL, '2019-09-08 12:13:25', '2019-09-08 12:13:25'),
(184, 42, '15679268109830.png', '1', 4, 1, NULL, '2019-09-08 12:13:30', '2019-09-08 12:13:30'),
(185, 42, '15679268113739.png', '2-rings', 5, 1, NULL, '2019-09-08 12:13:31', '2019-09-08 12:13:31'),
(186, 42, '15679268119404.png', '2', 6, 1, NULL, '2019-09-08 12:13:31', '2019-09-08 12:13:31'),
(187, 40, '15679268678945.png', '2', 11, 1, NULL, '2019-09-08 12:14:27', '2019-09-08 12:14:27'),
(188, 40, '15679268671338.png', '1', 12, 1, NULL, '2019-09-08 12:14:27', '2019-09-08 12:14:27'),
(189, 40, '15679268684717.png', '2-rings', 13, 1, NULL, '2019-09-08 12:14:28', '2019-09-08 12:14:28'),
(190, 40, '15679268754935.png', '2', 14, 1, NULL, '2019-09-08 12:14:35', '2019-09-08 12:14:35'),
(191, 40, '15679268767542.png', '1', 15, 1, NULL, '2019-09-08 12:14:36', '2019-09-08 12:14:36'),
(192, 40, '15679268772094.png', '2-rings', 16, 1, NULL, '2019-09-08 12:14:37', '2019-09-08 12:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `standard_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `special_price` decimal(10,2) NOT NULL,
  `date_end_price` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `name_en` varchar(225) NOT NULL,
  `name_heb` varchar(225) NOT NULL,
  `details_il` text,
  `details_en` text,
  `status` int(11) NOT NULL,
  `icon` varchar(225) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `taxes` decimal(14,2) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `style_id` int(11) NOT NULL,
  `standard_gold` int(11) DEFAULT NULL,
  `date_end_price` date DEFAULT NULL,
  `type_men` int(11) DEFAULT NULL,
  `seller` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `natural` int(11) DEFAULT NULL,
  `delivery_fees` decimal(14,2) NOT NULL,
  `special_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name_en`, `name_heb`, `details_il`, `details_en`, `status`, `icon`, `brand_id`, `photo`, `taxes`, `price`, `style_id`, `standard_gold`, `date_end_price`, `type_men`, `seller`, `size_id`, `natural`, `delivery_fees`, `special_price`, `created_at`, `updated_at`) VALUES
(40, 23, 84, 'Traditional jewelry designs', 'עיצובים תכשיטים מסורתיים', '<div dir=\"ltr\">עיצובים תכשיטים מסורתיים: הם אינם עיצובים של תכשיטים מזהב, יהלומים או אבנים יקרות והם עשויים מינרלים ואבנים מסורתיות ולעיתים מחקים את התכשיטים למעשה במטרה למכור במחירים זולים</div>', '<div dir=\"ltr\">Traditional jewelry designs: They are not designs for gold or diamond jewelry or precious stones and are made of minerals and traditional stones and sometimes imitate the jewelry of fact with the aim of selling at cheap prices د</div>', 1, NULL, 11, '15679268993337.png', '0.00', 332, 0, 26, '2019-08-22', 1, NULL, 40, 4, '0.00', '23.00', '2019-09-08 07:14:59', '2019-09-08 12:14:59'),
(42, 20, 67, 'Sven Eriksson', 'סוון אריקסון', '<div dir=\"ltr\">עיצובים תכשיטים מסורתיים: הם אינם עיצובים של תכשיטים מזהב, יהלומים או אבנים יקרות והם עשויים מינרלים ואבנים מסורתיות ולעיתים מחקים את התכשיטים למעשה במטרה למכור במחירים זולים</div>', '<div dir=\"ltr\">Traditional jewelry designs: They are not designs for gold or diamond jewelry or precious stones and are made of minerals and traditional stones and sometimes imitate the jewelry of fact with the aim of selling at cheap prices د</div>', 1, NULL, 11, '15679268375597.png', '0.00', 200, 0, 26, '2019-08-21', 1, NULL, 40, 4, '0.00', '100.00', '2019-09-08 07:13:57', '2019-09-08 12:13:57'),
(43, 20, 65, 'Thomas Carlsson', 'dfsfs', '<div dir=\"ltr\">עיצובים תכשיטים מסורתיים: הם אינם עיצובים של תכשיטים מזהב, יהלומים או אבנים יקרות והם עשויים מינרלים ואבנים מסורתיות ולעיתים מחקים את התכשיטים למעשה במטרה למכור במחירים זולים</div>', '<div dir=\"ltr\">Traditional jewelry designs: They are not designs for gold or diamond jewelry or precious stones and are made of minerals and traditional stones and sometimes imitate the jewelry of fact with the aim of selling at cheap prices د</div>', 1, NULL, 11, '15679267836959.png', '0.00', 280, 0, 27, '2019-08-21', 1, NULL, 40, 4, '0.00', '213.00', '2019-09-08 07:13:03', '2019-09-08 12:13:03'),
(44, 23, 61, 'Istanbul Residences Project (3) IMT-95', 'dfsfs', '<div dir=\"ltr\">עיצובים תכשיטים מסורתיים: הם אינם עיצובים של תכשיטים מזהב, יהלומים או אבנים יקרות והם עשויים מינרלים ואבנים מסורתיות ולעיתים מחקים את התכשיטים למעשה במטרה למכור במחירים זולים</div>', '<div dir=\"ltr\">Traditional jewelry designs: They are not designs for gold or diamond jewelry or precious stones and are made of minerals and traditional stones and sometimes imitate the jewelry of fact with the aim of selling at cheap prices د</div>', 1, NULL, 11, '15679267268461.png', '0.00', 280, 0, 127, '2019-09-04', 1, NULL, 0, 4, '0.00', '123.00', '2019-09-08 07:12:06', '2019-09-08 12:12:06'),
(45, 23, 61, 'Thomas Carlsson', 'תומאס קרלסון', '<div dir=\"ltr\">עיצובים תכשיטים מסורתיים: הם אינם עיצובים של תכשיטים מזהב, יהלומים או אבנים יקרות והם עשויים מינרלים ואבנים מסורתיות ולעיתים מחקים את התכשיטים למעשה במטרה למכור במחירים זולים</div>', '<div dir=\"ltr\">Traditional jewelry designs: They are not designs for gold or diamond jewelry or precious stones and are made of minerals and traditional stones and sometimes imitate the jewelry of fact with the aim of selling at cheap prices د</div>', 1, NULL, 13, '15679267955490.png', '0.00', 280, 0, 55, '2019-08-21', 1, NULL, 40, 4, '0.00', '200.00', '2019-09-08 07:13:15', '2019-09-08 12:13:15'),
(46, 23, 84, 'Traditional jewelry designs', 'עיצובים תכשיטים מסורתיים', '<div dir=\"ltr\">עיצובים תכשיטים מסורתיים: הם אינם עיצובים של תכשיטים מזהב, יהלומים או אבנים יקרות והם עשויים מינרלים ואבנים מסורתיות ולעיתים מחקים את התכשיטים למעשה במטרה למכור במחירים זולים</div>', '<div dir=\"ltr\">Traditional jewelry designs: They are not designs for gold or diamond jewelry or precious stones and are made of minerals and traditional stones and sometimes imitate the jewelry of fact with the aim of selling at cheap prices د</div>', 1, NULL, 11, '15679267362657.png', '0.00', 332, 0, 27, '2019-08-22', 1, NULL, 40, 4, '0.00', '23.00', '2019-09-08 07:12:16', '2019-09-08 12:12:16'),
(47, 23, 84, 'Diamond', 'Diamond', '<div dir=\"ltr\">עיצובים תכשיטים מסורתיים: הם אינם עיצובים של תכשיטים מזהב, יהלומים או אבנים יקרות והם עשויים מינרלים ואבנים מסורתיות ולעיתים מחקים את התכשיטים למעשה במטרה למכור במחירים זולים</div>', '<div dir=\"ltr\">Traditional jewelry designs: They are not designs for gold or diamond jewelry or precious stones and are made of minerals and traditional stones and sometimes imitate the jewelry of fact with the aim of selling at cheap prices د</div>', 1, NULL, 11, '15675271279994.png', '0.00', 5000, 0, 127, '2019-09-04', 1, NULL, 0, NULL, '0.00', '3000.00', '2019-09-03 16:12:07', '2019-09-03 21:12:07'),
(52, 20, 56, 'Bracelets', 'צמידיםצמידים', '<div dir=\"ltr\">עיצובים תכשיטים מסורתיים: הם אינם עיצובים של תכשיטים מזהב, יהלומים או אבנים יקרות והם עשויים מינרלים ואבנים מסורתיות ולעיתים מחקים את התכשיטים למעשה במטרה למכור במחירים זולים<br></div>', '<div dir=\"ltr\">Traditional jewelry designs: They are not designs for gold or diamond jewelry or precious stones and are made of minerals and traditional stones and sometimes imitate the jewelry of fact with the aim of selling at cheap prices د<br></div>', 1, NULL, 11, '15675266713384.png', '0.00', 100, 0, 127, '2019-09-05', 1, NULL, 0, 5, '0.00', '26.00', '2019-09-03 16:04:31', '2019-09-03 21:04:31'),
(56, 37, 66, 'Traditional jewelry designs', 'עיצובים תכשיטים מסורתיים', '<div dir=\"ltr\">עיצובים תכשיטים מסורתיים: הם אינם עיצובים של תכשיטים מזהב, יהלומים או אבנים יקרות והם עשויים מינרלים ואבנים מסורתיות ולעיתים מחקים את התכשיטים למעשה במטרה למכור במחירים זולים</div>', '<div dir=\"ltr\">Traditional jewelry designs: They are not designs for gold or diamond jewelry or precious stones and are made of minerals and traditional stones and sometimes imitate the jewelry of fact with the aim of selling at cheap prices د</div>', 1, NULL, 11, '15673386101432.png', '0.00', 332, 117, 127, '2019-09-19', 2, NULL, 119, 4, '0.00', '23.00', '2019-09-04 14:52:57', '2019-09-04 19:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` int(11) NOT NULL,
  `details` text,
  `code` varchar(225) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `details`, `code`, `category_id`, `subcategory_id`, `product_id`, `start_date`, `amount`, `status`, `end_date`, `created_at`, `updated_at`) VALUES
(12, '<p>sdffd</p>', 'WSA7Uy', NULL, NULL, NULL, '2019-09-11', 12, 1, '2019-09-13', '2019-09-01 11:20:01', '2019-09-01 16:20:01'),
(13, '<p>rerwrw</p>', 'giSHi1', NULL, NULL, NULL, '2019-09-18', 123, 1, '2019-09-27', '2019-09-01 11:20:17', '2019-09-01 16:20:17'),
(14, '<p>cxzzczxc</p>', '7kxoxS', NULL, NULL, 0, '2019-09-04', 231, 1, '2019-09-05', '2019-09-01 16:12:07', '2019-09-01 16:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `product_id`, `order_id`, `stars`, `comment`, `created_at`, `updated_at`) VALUES
(1, 18, 43, 0, 3, 'dsadasdas', '2019-07-30 13:06:37', '0000-00-00 00:00:00'),
(2, 18, 52, 0, 4, 'sdasdasdas', '2019-08-02 15:41:34', '0000-00-00 00:00:00'),
(3, 18, 42, 0, 4, 'sdasdasdas', '2019-07-30 13:05:31', '0000-00-00 00:00:00'),
(5, 18, 40, 0, 4, 'sdasdasdas', '2019-08-20 12:18:48', '0000-00-00 00:00:00'),
(9, 1, NULL, 96, 4, NULL, '2019-09-08 12:04:59', '2019-09-08 12:04:59'),
(7, 1, NULL, 77, 3, NULL, '2019-08-26 01:53:24', '2019-08-26 01:53:24'),
(8, 1, NULL, 95, 4, NULL, '2019-09-01 10:45:57', '2019-09-01 15:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `related_topics`
--

CREATE TABLE `related_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `topic2_id` int(11) NOT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `visits` int(11) NOT NULL,
  `webmaster_id` int(11) NOT NULL,
  `father_id` int(11) NOT NULL,
  `row_no` int(11) NOT NULL,
  `seo_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title_ar`, `title_en`, `photo`, `icon`, `status`, `visits`, `webmaster_id`, `father_id`, `row_no`, `seo_title_ar`, `seo_title_en`, `seo_description_ar`, `seo_description_en`, `seo_keywords_ar`, `seo_keywords_en`, `seo_url_slug_ar`, `seo_url_slug_en`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'hgfh', 'يسي', '15619826267497.jpg', 'fa-american-sign-language-interpreting', 1, 0, 8, 0, 1, 'hgfh', 'يسي', NULL, NULL, NULL, NULL, '', '', 1, NULL, '2019-07-01 10:03:46', '2019-07-01 10:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_webmails` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify_messages_status` tinyint(4) DEFAULT NULL,
  `notify_comments_status` tinyint(4) DEFAULT NULL,
  `notify_orders_status` tinyint(4) DEFAULT NULL,
  `site_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_status` tinyint(4) NOT NULL,
  `close_msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link5` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link6` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link7` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link8` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link9` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link10` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t1_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t1_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t5` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t6` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t7_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t7_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `style_logo_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_logo_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_fav` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_apple` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_color1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_color2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_type` tinyint(4) DEFAULT NULL,
  `style_bg_type` tinyint(4) DEFAULT NULL,
  `style_bg_pattern` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_bg_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_bg_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_subscribe` tinyint(4) DEFAULT NULL,
  `style_footer` tinyint(4) DEFAULT NULL,
  `style_footer_bg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_preload` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title_ar`, `site_title_en`, `site_desc_ar`, `site_desc_en`, `site_keywords_ar`, `site_keywords_en`, `site_webmails`, `notify_messages_status`, `notify_comments_status`, `notify_orders_status`, `site_url`, `site_status`, `close_msg`, `social_link1`, `social_link2`, `social_link3`, `social_link4`, `social_link5`, `social_link6`, `social_link7`, `social_link8`, `social_link9`, `social_link10`, `contact_t1_ar`, `contact_t1_en`, `contact_t3`, `contact_t4`, `contact_t5`, `contact_t6`, `contact_t7_ar`, `contact_t7_en`, `style_logo_ar`, `style_logo_en`, `style_fav`, `style_apple`, `style_color1`, `style_color2`, `style_type`, `style_bg_type`, `style_bg_pattern`, `style_bg_color`, `style_bg_image`, `style_subscribe`, `style_footer`, `style_footer_bg`, `style_preload`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'אתר שאמא', 'Shama website', 'תיאור אתר אינטרנט ומעט מידע עליו', 'Website description and some little information about it', 'תכשיטים - טבעות נישואין - שרשראות - יהלום - אבני חן', 'Jewelry - Wedding Rings - Chains - Diamond - Gemstones', NULL, NULL, NULL, NULL, 'http://www.emarketingbakers.com/en', 1, 'Website under maintenance \n<h1>Comming SOON</h1>', 'https://facebook.com', 'https://twitter.com/login', '#', 'https://linkedin.com', 'https://www.youtube.com', 'http://instagram.com', '#', '#', '#', 'https://web.whatsapp.com/', 'المبني - اسم الشارع - المدينة - الدولة', 'Building, Street name, City, Country', '01153353918', '01153353918', '01153353918', 'info@sitename.com', 'من الأحد إلى الخميس 08:00 ص - 05:00 م', 'Sunday to Thursday 08:00 AM to 05:00 PM', '15671845282463.png', '15671845286883.png', '15671845286647.png', '15671845288275.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-06-27 09:14:09', '2019-09-03 20:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `setting_filters`
--

CREATE TABLE `setting_filters` (
  `id` int(11) NOT NULL,
  `color` int(11) NOT NULL DEFAULT '0',
  `filters_standard` int(11) NOT NULL DEFAULT '0',
  `style` int(11) NOT NULL DEFAULT '0',
  `natural` int(11) NOT NULL DEFAULT '0',
  `seller` int(11) NOT NULL DEFAULT '0',
  `men_women` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_filters`
--

INSERT INTO `setting_filters` (`id`, `color`, `filters_standard`, `style`, `natural`, `seller`, `men_women`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, '2019-07-15 14:26:57', '2019-07-15 19:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 56, 119, '2019-09-08 12:09:27', '2019-09-08 12:09:27'),
(2, 52, 116, '2019-09-08 12:09:50', '2019-09-08 12:09:50'),
(3, 47, 119, '2019-09-08 12:10:12', '2019-09-08 12:10:12'),
(4, 46, 119, '2019-09-08 12:10:54', '2019-09-08 12:10:54'),
(5, 45, 116, '2019-09-08 12:11:31', '2019-09-08 12:11:31'),
(6, 44, 119, '2019-09-08 12:12:06', '2019-09-08 12:12:06'),
(7, 43, 116, '2019-09-08 12:13:03', '2019-09-08 12:13:03'),
(8, 43, 119, '2019-09-08 12:13:03', '2019-09-08 12:13:03'),
(9, 42, 119, '2019-09-08 12:13:57', '2019-09-08 12:13:57'),
(10, 40, 119, '2019-09-08 12:14:59', '2019-09-08 12:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `standard_golds`
--

CREATE TABLE `standard_golds` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `standard_gold_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `standard_golds`
--

INSERT INTO `standard_golds` (`id`, `product_id`, `standard_gold_id`, `created_at`, `updated_at`) VALUES
(30, 33, 26, '2019-08-05 12:44:09', '2019-08-03 22:23:13'),
(31, 43, 26, '2019-08-05 12:23:26', '2019-08-03 22:24:05'),
(32, 49, 26, '2019-07-30 20:56:47', '2019-07-30 20:56:47'),
(33, 52, 26, '2019-08-02 13:13:40', '2019-07-30 20:59:26'),
(34, 56, 26, '2019-08-20 13:42:11', '2019-08-03 22:13:53'),
(35, 47, 26, '2019-08-05 10:55:26', '2019-08-03 22:26:41'),
(36, 46, 26, '2019-08-03 22:21:26', '2019-08-03 22:21:26'),
(37, 45, 26, '2019-08-04 16:47:54', '2019-08-04 21:47:54'),
(38, 40, 26, '2019-08-20 12:02:57', '2019-08-03 22:24:52'),
(39, 44, 55, '2019-08-05 19:16:17', '2019-08-05 19:16:17'),
(40, 56, 127, '2019-09-08 12:09:27', '2019-09-08 12:09:27'),
(41, 52, 127, '2019-09-08 12:09:50', '2019-09-08 12:09:50'),
(42, 47, 127, '2019-09-08 12:10:12', '2019-09-08 12:10:12'),
(43, 46, 127, '2019-09-08 12:10:54', '2019-09-08 12:10:54'),
(44, 45, 127, '2019-09-08 12:11:31', '2019-09-08 12:11:31'),
(45, 44, 127, '2019-09-08 12:12:06', '2019-09-08 12:12:06'),
(46, 43, 127, '2019-09-08 12:13:03', '2019-09-08 12:13:03'),
(47, 42, 127, '2019-09-08 12:13:57', '2019-09-08 12:13:57'),
(48, 40, 127, '2019-09-08 12:14:59', '2019-09-08 12:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name_en` varchar(225) NOT NULL,
  `name_heb` varchar(225) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `icon` varchar(225) DEFAULT NULL,
  `photo` varchar(225) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name_en`, `name_heb`, `status`, `icon`, `photo`, `type_id`, `created_at`, `updated_at`) VALUES
(56, 38, 'Thomas Carlss', 'תומאס קרלסון', 1, NULL, '15675957368234.png', 11, '2019-09-04 11:15:36', '2019-09-04 16:15:36'),
(61, 24, 'Sub Category', 'צמידיםצמידים', 1, NULL, '15675959782814.png', 38, '2019-09-04 11:19:38', '2019-09-04 16:19:38'),
(64, 26, 'يسشيس', 'esalm elshenawydasdsa', 1, NULL, '15675960704330.png', 11, '2019-09-04 11:21:10', '2019-09-04 16:21:10'),
(65, 20, 'Test subcategory 4', 'מבחן תת קטגוריה adas', 1, NULL, '15662945685644.png', 13, '2019-08-20 09:49:28', '2019-08-20 07:49:28'),
(66, 35, 'Test category 42', 'קטגוריית מבחן 42', 1, NULL, '15662945733238.png', 11, '2019-08-20 09:49:33', '2019-08-20 07:49:33'),
(67, 20, 'Thomas Carlss', 'תומאס קרלסון', 1, NULL, '15675959993018.png', 13, '2019-09-04 11:19:59', '2019-09-04 16:19:59'),
(68, 21, 'test', 'תומאס קרלסון', 1, NULL, '15662945861805.png', 11, '2019-08-20 09:49:46', '2019-08-20 07:49:46'),
(69, 25, 'test2', 'תומאס קרלסון', 1, NULL, '15662945334941.png', 59, '2019-08-20 09:48:53', '2019-08-20 07:48:53'),
(70, 21, 'test3', 'תומאס קרלסון', 1, NULL, '15662945255233.png', 11, '2019-08-20 09:48:45', '2019-08-20 07:48:45'),
(71, 37, 'test4', 'תומאס קרלסון', 1, NULL, '15675957899946.png', 11, '2019-09-04 11:16:29', '2019-09-04 16:16:29'),
(72, 23, 'test5', 'תומאס קרלסון', 1, NULL, '15675960852354.png', 14, '2019-09-04 11:21:25', '2019-09-04 16:21:25'),
(73, 21, 'test6', 'תומאס קרלסון', 1, NULL, '15662945022813.png', 11, '2019-08-20 09:48:22', '2019-08-20 07:48:22'),
(74, 38, 'test7', 'תומאס קרלסון', 1, NULL, '15675957107752.png', 11, '2019-09-04 11:15:10', '2019-09-04 16:15:10'),
(75, 21, 'test8', 'תומאס קרלסון', 1, NULL, '15662944888646.png', 11, '2019-08-20 09:48:08', '2019-08-20 07:48:08'),
(76, 38, 'test9', 'תומאס קרלסון', 1, NULL, '15675956501225.png', 11, '2019-09-04 11:14:10', '2019-09-04 16:14:10'),
(77, 37, 'test10', 'תומאס קרלסון', 1, NULL, '15675956224440.png', 11, '2019-09-04 11:13:42', '2019-09-04 16:13:42'),
(78, 38, 'test11', 'תומאס קרלסון', 1, NULL, '15662944534409.png', 11, '2019-09-04 11:13:34', '2019-09-04 16:13:34'),
(79, 26, 'test12', 'תומאס קרלסון', 1, NULL, '15675955833071.png', 11, '2019-09-04 11:13:03', '2019-09-04 16:13:03'),
(80, 26, 'test13', 'תומאס קרלסון', 1, NULL, '15675955744695.png', 11, '2019-09-04 11:12:54', '2019-09-04 16:12:54'),
(81, 26, 'test14', 'תומאס קרלסון', 1, NULL, '15675955549955.png', 11, '2019-09-04 11:12:34', '2019-09-04 16:12:34'),
(82, 20, 'testtewetwjkkj', 'תומאס קרלסון', 1, NULL, '15675955292283.png', 13, '2019-09-04 11:12:09', '2019-09-04 16:12:09'),
(83, 20, 'testtewetwj2', 'תומאס קרלסון', 1, NULL, '15675954606300.png', 13, '2019-09-04 11:11:00', '2019-09-04 16:11:00'),
(84, 23, 'testtewetwj3', 'תומאס קרלסון', 1, NULL, '15675955238074.png', 14, '2019-09-04 11:12:03', '2019-09-04 16:12:03'),
(87, 20, 'testtewetwj321', 'תומאס קרלסון', 1, NULL, '15675955093740.png', 13, '2019-09-04 11:11:49', '2019-09-04 16:11:49'),
(88, 23, 'test576', 'תומאס קרלסון', 1, NULL, '15632885159235.jpg', 14, '2019-08-20 09:45:16', '2019-08-20 07:45:16'),
(92, 20, 'Rings', 'Bracelets', 1, NULL, '15675955003962.png', 13, '2019-09-04 11:11:40', '2019-09-04 16:11:40'),
(94, 20, 'Ringzzz', 'היום', 1, NULL, '15675954894826.png', 13, '2019-09-04 11:11:29', '2019-09-04 16:11:29'),
(95, 41, 'new12', 'new', 1, NULL, '15675954755123.png', 59, '2019-09-04 11:11:15', '2019-09-04 16:11:15'),
(97, 47, 'subcategory 33', 'קטגוריית מבחן 33', 1, NULL, '15673517379944.jpg', 14, '2019-09-01 20:28:57', '2019-09-01 20:28:57'),
(98, 47, 'test subcategory 500', 'מבחן תת קטגוריה 500', 1, NULL, '15675137459957.png', 14, '2019-09-03 17:29:05', '2019-09-03 17:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'islam.elshenawy@trioconceptme.com', '2019-08-22 12:45:40', '2019-08-22 12:45:40'),
(2, 'islam.elshenawy@trioconceeptme.com', '2019-08-22 12:46:12', '2019-08-22 12:46:12'),
(3, 'eslamelshenawy9316as@gmail.com', '2019-08-22 12:48:43', '2019-08-22 12:48:43'),
(4, 'eslamelshenawy9316@gmail.com', '2019-08-22 12:48:50', '2019-08-22 12:48:50'),
(5, 'admin@admin.com', '2019-08-25 06:35:12', '2019-08-25 06:35:12'),
(6, 'we45@gmail.com', '2019-08-25 06:38:32', '2019-08-25 06:38:32'),
(7, 'we43@gmail.com', '2019-08-25 06:39:21', '2019-08-25 06:39:21'),
(8, 'adminerw@admin.com', '2019-08-25 06:39:59', '2019-08-25 06:39:59'),
(9, 'islam.elshreewenawy@trioconceptme.com', '2019-08-25 06:40:53', '2019-08-25 06:40:53'),
(10, 'Mostafa@admin.com', '2019-08-30 22:03:23', '2019-08-30 22:03:23'),
(11, 'islam.elshenawy@triocondasdceptme.com', '2019-09-01 17:32:14', '2019-09-01 17:32:14'),
(12, 'islam.elshenawy@triosassacondasdceptme.com', '2019-09-01 17:37:31', '2019-09-01 17:37:31'),
(13, 'islam.elshenawy@triosdsassacondasdceptme.com', '2019-09-01 17:40:35', '2019-09-01 17:40:35'),
(14, 'islam.elshenawy@triosdsassassacondasdceptme.com', '2019-09-01 17:53:18', '2019-09-01 17:53:18'),
(15, 'admin@site.com', '2019-09-02 00:57:08', '2019-09-02 00:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_il` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` longtext COLLATE utf8mb4_unicode_ci,
  `details_en` longtext COLLATE utf8mb4_unicode_ci,
  `color_stand` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `video_type` tinyint(4) DEFAULT NULL,
  `photo_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attach_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_file` text COLLATE utf8mb4_unicode_ci,
  `audio_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_org` int(11) DEFAULT NULL,
  `percent_delivery` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `visits` int(11) NOT NULL,
  `color` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webmaster_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL DEFAULT '0',
  `row_no` int(11) NOT NULL,
  `seo_title_il` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name_taxes` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_tax` int(11) DEFAULT NULL,
  `seo_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title_il`, `title_en`, `details_ar`, `details_en`, `color_stand`, `date`, `expire_date`, `video_type`, `photo_file`, `attach_file`, `video_file`, `audio_file`, `icon`, `percent_org`, `percent_delivery`, `status`, `visits`, `color`, `webmaster_id`, `section_id`, `row_no`, `seo_title_il`, `size`, `name_taxes`, `number_tax`, `seo_title_en`, `seo_description_ar`, `seo_description_en`, `seo_keywords_ar`, `seo_keywords_en`, `seo_url_slug_ar`, `seo_url_slug_en`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'من نحن', 'About Us', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.', 'It is a long established fact that a reader will be distracted by the readable content of a page.', '', '2019-06-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 11, '0', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-27 09:14:23', '2019-09-04 18:02:49'),
(2, 'اتصل بنا', 'Contact Us', '', '', '', '2019-06-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 12, '0', 1, 0, 2, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-27 09:14:23', '2019-09-03 14:42:18'),
(3, 'الخصوصية', 'Privacy', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.', 'It is a long established fact that a reader will be distracted by the readable content of a page.', '', '2019-06-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '0', 1, 0, 3, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-27 09:14:23', '2019-07-17 17:05:03'),
(4, 'الشروط والأحكام', 'Terms & Conditions', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.', 'It is a long established fact that a reader will be distracted by the readable content of a page.', '', '2019-06-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '0', 1, 0, 4, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-27 09:14:23', '2019-07-17 17:05:58'),
(5, 'fdd', 'fdsfdsf', '<div dir=\"rtl\">ffsdf</div>', '<div dir=\"ltr\">dfsfsf</div>', '', '2019-06-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '0', 1, 0, 5, 'fdd', 0, NULL, NULL, 'fdsfdsf', 'ffsdf', 'dfsfsf', NULL, NULL, 'fdd', 'fdsfdsf', 1, NULL, '2019-06-27 10:32:14', '2019-06-27 10:32:14'),
(6, 'Start With A Setting', 'Start With A Setting', NULL, NULL, '', '2019-07-01', NULL, NULL, NULL, NULL, NULL, NULL, 'fa-connectdevelop', 0, 0, 1, 0, '0', 12, 0, 1, 'Start With A Setting', 0, NULL, NULL, 'Start With A Setting', '', '', NULL, NULL, 'start-with-a-setting', 'start-with-a-setting', 1, NULL, '2019-07-01 07:48:56', '2019-07-01 07:48:56'),
(7, 'hgfh', 'يسي', NULL, NULL, '', '2019-07-01', NULL, NULL, '15619816317815.PNG', NULL, NULL, NULL, NULL, 0, 0, 1, 0, '0', 4, 0, 1, 'hgfh', 0, NULL, NULL, 'يسي', '', '', NULL, NULL, '', 'ysy', 1, 1, '2019-07-01 09:47:02', '2019-07-01 09:47:11'),
(8, 'المعرض السويدى', 'gfhfghfg', '<div dir=\"rtl\"><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; line-height: 24px; font-family: DauphinPlain; font-size: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><div><br></div></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"></div></div>', '<div dir=\"ltr\"><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; line-height: 24px; font-family: DauphinPlain; font-size: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><div><br></div></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"></div></div>', '', '2019-07-01', NULL, NULL, '15619826741352.jpg', NULL, NULL, NULL, NULL, 0, 0, 1, 0, '0', 8, 0, 1, 'المعرض السويدى', 0, NULL, NULL, 'gfhfghfg', 'What is Lorem Ipsum?Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever sinc', 'What is Lorem Ipsum?Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever sinc', NULL, NULL, 'almaard-alsoyd', 'gfhfghfg', 1, NULL, '2019-07-01 10:04:34', '2019-07-01 10:04:34'),
(9, 'ي', 'يسي', '<div dir=\"rtl\">يشسس</div>', '<div dir=ltr><br></div>', '', '2019-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '0', 2, 0, 1, 'ي', 0, NULL, NULL, 'يسي', 'يشسس', '', NULL, NULL, 'y', '', 1, NULL, '2019-07-01 12:17:49', '2019-07-01 12:17:49'),
(11, 'תכשיט', 'Jewelry', NULL, NULL, '', '2019-07-02', NULL, NULL, '15675214386004.png', NULL, NULL, NULL, 'fa-american-sign-language-interpreting', 0, 0, 1, 0, NULL, 13, 0, 2, 'WEDDING RINGS', NULL, NULL, NULL, 'WEDDING RINGS', '', '', NULL, NULL, 'wedding-rings', 'wedding-rings', 1, 1, '2019-07-02 06:42:59', '2019-09-03 19:37:18'),
(13, 'יהלום', 'Diamond', NULL, NULL, '', '2019-07-02', NULL, NULL, '15670806277467.png', NULL, NULL, NULL, 'fa-500px', 0, 0, 1, 0, NULL, 13, 0, 4, 'GEMSTONES', NULL, NULL, NULL, 'GEMSTONES', '', '', NULL, NULL, 'gemstones', 'gemstones', 1, 1, '2019-07-02 06:43:29', '2019-08-30 21:09:07'),
(14, 'אבני חן', 'Gemstones', NULL, NULL, '', '2019-07-02', NULL, NULL, '15670807392737.png', NULL, NULL, NULL, 'fa-chain-broken', 0, 0, 1, 0, NULL, 13, 0, 3, 'FINE JEWELRY', NULL, NULL, NULL, 'FINE JEWELRY', '', '', NULL, NULL, 'fine-jewelry', 'fine-jewelry', 1, 1, '2019-07-02 06:43:42', '2019-08-30 21:08:04'),
(37, 'עלינו', 'About Us', '<p class=\"speakable-paragraph\" times=\"\" new=\"\" roman\",=\"\" times,=\"\" serif;=\"\" font-size:=\"\" 18px;=\"\" font-variant-ligatures:=\"\" common-ligatures;=\"\" background-color:=\"\" rgb(252,=\"\" 252,=\"\" 252);\"=\"\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 1.2rem; margin-left: 0px;\"><font color=\"#333333\">הוא פשוט טקסט דמה של ענף ההדפס והקליעה. לורם איפסום היה הטקסט המקובל בתעשייה מאז שנות ה- 1500, אז מדפסת לא ידועה לקחה מטען מסוג זה וערבלה אותו כדי להכין ספר דגימה. הוא שרד לא רק חמש מאות שנים, אלא גם את הקפיצה לסידור אלקטרוני האלקטרוני, שנשאר ללא שינוי. זה פופולרי בשנות השישים עם שחרור גיליונות הכוללים קטעי לורם איפסום, ולאחרונה עם תוכנת פרסום שולחניים כמו כולל גרסאות לורם איפסום.</font><br></p>', '<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>', '', '2019-07-15', NULL, NULL, '15670808366390.png', NULL, NULL, NULL, NULL, 0, 0, 1, 0, NULL, 17, 0, 2, 'עגול', NULL, NULL, NULL, 'Round', '', 'lklldadka', NULL, NULL, '', '', 1, 1, '2019-07-15 19:06:58', '2019-08-29 17:19:44'),
(38, 'מתנות', 'Gifts', NULL, NULL, '', '2019-07-15', NULL, NULL, '15670807777330.png', NULL, NULL, NULL, 'fa-amazon', 0, 0, 1, 0, NULL, 13, 0, 5, 'זהב 24 קראט', NULL, NULL, NULL, 'Round', '', '', NULL, NULL, '', '', 1, 1, '2019-07-15 19:16:16', '2019-08-30 21:09:34'),
(49, 'כחול', 'blue', NULL, NULL, '', '2019-08-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '0E149C', 14, 0, 3, 'כחול', NULL, NULL, NULL, 'blue', '', '', NULL, NULL, '', 'blue', 1, 1, '2019-08-05 18:25:12', '2019-08-05 18:25:27'),
(50, 'השב', 'Red', NULL, NULL, '', '2019-08-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'FF0000', 14, 0, 4, 'השב', NULL, NULL, NULL, 'Red', '', '', NULL, NULL, '', 'red', 1, 1, '2019-08-05 18:25:49', '2019-08-05 18:26:47'),
(51, 'ירוק', 'green', NULL, NULL, '', '2019-08-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '007D0F', 14, 0, 5, 'ירוק', NULL, NULL, NULL, 'green', '', '', NULL, NULL, '', 'green', 1, 1, '2019-08-05 18:28:10', '2019-08-05 18:29:10'),
(59, 'אהבה ומעורבות', 'Love and engagement', NULL, NULL, '', '2019-07-02', NULL, NULL, '15670805937377.png', NULL, NULL, NULL, 'fa-american-sign-language-interpreting', 0, 0, 1, 0, NULL, 13, 0, 2, 'WEDDING RINGS', NULL, NULL, NULL, 'WEDDING RINGS', '', '', NULL, NULL, 'wedding-rings', 'wedding-rings', 1, 1, '2019-07-02 06:42:59', '2019-08-30 21:07:37'),
(61, 'vfg', 'fggf', NULL, NULL, '', '2019-08-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 'FFFFFF', 14, 0, 8, 'vfg', NULL, NULL, NULL, 'fggf', '', '', NULL, NULL, 'vfg', 'fggf', 1, NULL, '2019-08-07 18:46:14', '2019-08-07 18:46:14'),
(63, 'Baby Blue', 'Baby Blue', NULL, NULL, '', '2019-08-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '4095FF', 14, 0, 10, 'dsad', NULL, NULL, NULL, 'dad', '', '', NULL, NULL, 'dsad', 'dad', 1, 1, '2019-08-07 21:01:50', '2019-08-28 21:38:11'),
(64, NULL, NULL, NULL, NULL, '', '2019-08-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, NULL, 19, 0, 1, NULL, NULL, 'Taxes', 14, NULL, '', '', NULL, NULL, '', '', 32, 1, '2019-08-19 13:34:18', '2019-08-30 21:11:00'),
(65, NULL, NULL, NULL, NULL, '', '2019-08-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 20, 1, 0, NULL, 20, 0, 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, 1, '2019-08-20 05:47:28', '2019-08-29 17:32:56'),
(70, 'אוסף אבני חן', 'GEMSTONE COLLECTION', '<p>לורם, לורם dolor sit החזרי . מעולם לא שנאתי את העונג קטן מאוד חשוב כי מי יידחה בגלל זה חכם לא לברוח הבחירה הנכונה אבל לעקוב כאב פציעה כתוצאה? להוט עבור כאב עונג גדול. להאשים או אם יש הם לא יודעים כל אחד בונה מאסטר תהא, אפוא, להיות מקובל על כאבים של המדד, כבר מסונוור דברים נרכשים לחינם הוא זה! שיטות הסתנוורו הצרכן, אך לא מספיק. אדם חייב לחפש להאשים את עצמנו, על ידי מתנות אלה, וכדי לעשות זאת, זכותו של תקלות שמכוח הדברים, לעומת זאת, חייבת לברוח, הוא גדל עקב שהוא בעל חנופת הכאב שלה היה לפחות של הצער כי דחה. ברגע שהיא רוצה מעקב עם הכאב אבל עם כל החוכמה הנולדת של כאב, משהו שאנחנו יכולים לעבוד מחופשת!<br></p>', '<span style=\"font-size: 13.92px;\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non quia, fugiat debitis sequi pariatur ducimus dolorum eligendi at? Cupiditate magni aliquam voluptate dolorum. Accusamus vel sint nesciunt, eius itaque placeat dolores quisquam architecto modi, nihil quae obcaecati pariatur iste! Modi earum obcaecati dolor nihil sed explicabo. Quaerat accusamus, atque praesentium facere, culpa ratione tenetur fugiat iure rerum autem, minima doloremque hic maiores dicta a blanditiis illo dolores repudiandae. Sequi quaerat dolore cum sunt beatae rerum sapiente omnis sed natus, dolorum, aliquid possimus laborum, ab deserunt!</span>', '', '2019-08-25', NULL, NULL, '15670819895619.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 21, 0, 1, 'GEMSTONE COLLECTION', NULL, NULL, NULL, 'GEMSTONE COLLECTION', '', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non qui', NULL, NULL, 'gemstone-collection', 'gemstone-collection', 32, 1, '2019-08-25 09:26:26', '2019-09-03 21:01:44'),
(71, 'אוסף אבני חן 2', 'GEMSTONE COLLECTION 2', '<p>לורם, לורם dolor sit amet החזרי consectetur. מעולם לא שנאתי את העונג קטן מאוד חשוב כי מי יידחה בגלל זה חכם לא לברוח הבחירה הנכונה אבל לעקוב כאב פציעה כתוצאה? להוט עבור כאב עונג גדול. להאשים או אם יש הם לא יודעים כל אחד בונה מאסטר תהא, אפוא, להיות מקובל על כאבים של המדד, כבר מסונוור דברים נרכשים לחינם הוא זה! שיטות הסתנוורו הצרכן, אך לא מספיק. אדם חייב לחפש להאשים את עצמנו, על ידי מתנות אלה, וכדי לעשות זאת, זכותו של תקלות שמכוח הדברים, לעומת זאת, חייבת לברוח, הוא גדל עקב שהוא בעל חנופת הכאב שלה היה לפחות של הצער כי דחה. ברגע שהיא רוצה מעקב עם הכאב אבל עם כל החוכמה הנולדת של כאב, משהו שאנחנו יכולים לעבוד מחופשת!</p><div><br></div>', '<span style=\"font-size: 13.92px;\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non quia, fugiat debitis sequi pariatur ducimus dolorum eligendi at? Cupiditate magni aliquam voluptate dolorum. Accusamus vel sint nesciunt, eius itaque placeat dolores quisquam architecto modi, nihil quae obcaecati pariatur iste! Modi earum obcaecati dolor nihil sed explicabo. Quaerat accusamus, atque praesentium facere, culpa ratione tenetur fugiat iure rerum autem, minima doloremque hic maiores dicta a blanditiis illo dolores repudiandae. Sequi quaerat dolore cum sunt beatae rerum sapiente omnis sed natus, dolorum, aliquid possimus laborum, ab deserunt!</span>', '', '2019-08-25', NULL, NULL, '15675265928068.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 21, 0, 1, 'GEMSTONE COLLECTION', NULL, NULL, NULL, 'GEMSTONE COLLECTION', '', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non qui', NULL, NULL, 'gemstone-collection', 'gemstone-collection', 32, 1, '2019-08-25 09:26:26', '2019-09-03 21:03:12'),
(72, 'אוסף אבני חן 3', 'GEMSTONE COLLECTION 3', '<p>לורם, לורם dolor sit amet החזרי consectetur. מעולם לא שנאתי את העונג קטן מאוד חשוב כי מי יידחה בגלל זה חכם לא לברוח הבחירה הנכונה אבל לעקוב כאב פציעה כתוצאה? להוט עבור כאב עונג גדול. להאשים או אם יש הם לא יודעים כל אחד בונה מאסטר תהא, אפוא, להיות מקובל על כאבים של המדד, כבר מסונוור דברים נרכשים לחינם הוא זה! שיטות הסתנוורו הצרכן, אך לא מספיק. אדם חייב לחפש להאשים את עצמנו, על ידי מתנות אלה, וכדי לעשות זאת, זכותו של תקלות שמכוח הדברים, לעומת זאת, חייבת לברוח, הוא גדל עקב שהוא בעל חנופת הכאב שלה היה לפחות של הצער כי דחה. ברגע שהיא רוצה מעקב עם הכאב אבל עם כל החוכמה הנולדת של כאב, משהו שאנחנו יכולים לעבוד מחופשת</p>', '<span style=\"font-size: 13.92px;\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non quia, fugiat debitis sequi pariatur ducimus dolorum eligendi at? Cupiditate magni aliquam voluptate dolorum. Accusamus vel sint nesciunt, eius itaque placeat dolores quisquam architecto modi, nihil quae obcaecati pariatur iste! Modi earum obcaecati dolor nihil sed explicabo. Quaerat accusamus, atque praesentium facere, culpa ratione tenetur fugiat iure rerum autem, minima doloremque hic maiores dicta a blanditiis illo dolores repudiandae. Sequi quaerat dolore cum sunt beatae rerum sapiente omnis sed natus, dolorum, aliquid possimus laborum, ab deserunt!</span>', '', '2019-08-25', NULL, NULL, '15670821232228.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 21, 0, 1, 'GEMSTONE COLLECTION', NULL, NULL, NULL, 'GEMSTONE COLLECTION', '', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non qui', NULL, NULL, 'gemstone-collection', 'gemstone-collection', 32, 1, '2019-08-25 09:26:26', '2019-09-03 21:02:40'),
(74, 'פשוט טקסט דמה של ענף ההדפסה וההגדרה.', 'simply dummy tedsxt of the printing and typesetting industry.', '<p><span style=\"font-size: 13.92px;\">הוא פשוט טקסט דמה של ענף ההדפס והקליעה. לורם איפסום היה הטקסט המקובל בתעשייה מאז שנות ה- 1500, אז מדפסת לא ידועה לקחה מטען מסוג זה וערבלה אותו כדי להכין ספר דגימה. הוא שרד לא רק חמש מאות שנים, אלא גם את הקפיצה לסידור אלקטרוני האלקטרוני, שנשאר ללא שינוי. זה פופולרי בשנות השישים עם שחרור גיליונות הכוללים קטעי לורם איפסום, ולאחרונה עם תוכנת פרסום שולחניים כמו כולל גרסאות לורם איפסום</span><br></p>', '<div dir=\"ltr\"><span style=\"font-size: 13.92px; color: rgb(0, 0, 0);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></div>', '', '2019-08-25', NULL, NULL, '15670832755062.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 22, 0, 2, 'simply dummy dsof the printing and typesetting industry.', NULL, NULL, NULL, 'simply dummy tedsxt of the printing and typesetting industry.', '', '', NULL, NULL, 'simply-dummy-dsof-the-printing-and-typesetting-industry', 'simply-dummy-tedsxt-of-the-printing-and-typesetting-industry', 32, 1, '2019-08-25 10:28:32', '2019-08-29 17:54:35'),
(75, 'פשוט טקסט מצומצם של ענף הדפוס וההגדרה.', 'simply dummy tex3t of the printing and typesetting industry.', NULL, '<div dir=ltr><br></div>', '', '2019-08-25', NULL, NULL, '15670833164857.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 22, 0, 3, 'simply dummy te3xt of the printing and typesetting industry.', NULL, NULL, NULL, 'simply dummy tex3t of the printing and typesetting industry.', '', '', NULL, NULL, 'simply-dummy-te3xt-of-the-printing-and-typesetting-industry', 'simply-dummy-tex3t-of-the-printing-and-typesetting-industry', 32, 1, '2019-08-25 10:29:05', '2019-08-29 17:55:16'),
(76, 'פשוט טמסקסט דמה של ענף הדפוס וההגדרה 1', 'simply dummy tedsxt of the printing and typesetting industry1', NULL, '<div dir=ltr><br></div>', '', '2019-08-25', NULL, NULL, '15670833649035.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 22, 0, 4, 'simply dummy tedsxt of the printing and typesetting industry1', NULL, NULL, NULL, 'simply dummy tedsxt of the printing and typesetting industry1', '', '', NULL, NULL, 'simply-dummy-tedsxt-of-the-printing-and-typesetting-industry1', 'simply-dummy-tedsxt-of-the-printing-and-typesetting-industry1', 32, 1, '2019-08-25 10:34:43', '2019-08-29 17:56:04'),
(78, 'שחור', 'Black', NULL, NULL, '', '2019-08-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '404040', 14, 0, 11, 'שחור', NULL, NULL, NULL, 'Black', '', '', NULL, NULL, '', 'black', 1, 1, '2019-08-28 21:36:52', '2019-08-28 21:37:23'),
(79, 'פשוט טקסט דמה של ענף הדפוס וההגדרה 2', 'simply dummy tedsxt of the printing and typesetting industry2', NULL, '<div dir=ltr><br></div>', '', '2019-08-29', NULL, NULL, '15670835152516.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 22, 0, 5, 'פשוט טקסט דמה של ענף הדפוס וההגדרה 2', NULL, NULL, NULL, 'simply dummy tedsxt of the printing and typesetting industry2', '', '', NULL, NULL, '2', 'simply-dummy-tedsxt-of-the-printing-and-typesetting-industry2', 1, NULL, '2019-08-29 17:58:35', '2019-08-29 17:58:35'),
(80, 'פשוט טקסט דמה של ענף הדפוס וההגדרה 4', 'simply dummy tedsxt of the printing and typesetting industry4', NULL, '<div dir=ltr><br></div>', '', '2019-08-29', NULL, NULL, '15670836095418.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 22, 0, 6, 'פשוט טקסט דמה של ענף הדפוס וההגדרה 4', NULL, NULL, NULL, 'simply dummy tedsxt of the printing and typesetting industry4', '', '', NULL, NULL, '4', 'simply-dummy-tedsxt-of-the-printing-and-typesetting-industry4', 1, NULL, '2019-08-29 18:00:09', '2019-08-29 18:00:09'),
(83, 'אוסף אבני חן', 'Thomas Carlsson', NULL, '<div dir=\"ltr\">asdasdas</div>', NULL, '2019-09-01', NULL, NULL, '15675284496979.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 22, 0, 7, 'dasd', NULL, NULL, NULL, 'Thomas Carlsson', '', 'asdasdas', NULL, NULL, '', '', 1, 1, '2019-09-01 14:12:28', '2019-09-03 21:34:09'),
(85, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, '15673301558408.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 23, 0, 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 14:29:15', '2019-09-01 14:29:15'),
(86, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, '15673301625006.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 23, 0, 2, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 14:29:22', '2019-09-01 14:29:22'),
(87, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, '15673301685706.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 23, 0, 3, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 14:29:28', '2019-09-01 14:29:28'),
(88, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, '15673301742211.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 23, 0, 4, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 14:29:34', '2019-09-01 14:29:34'),
(89, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, '15673301804963.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 23, 0, 5, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 14:29:40', '2019-09-01 14:29:40'),
(90, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, '15673301858969.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 23, 0, 6, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 14:29:45', '2019-09-01 14:29:45'),
(91, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, '15673301927313.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 23, 0, 7, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 14:29:52', '2019-09-01 14:29:52'),
(92, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, '15673304364070.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 23, 0, 8, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 14:33:56', '2019-09-01 14:33:56'),
(93, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, '15673304418952.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 23, 0, 9, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 14:34:01', '2019-09-01 14:34:01'),
(94, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, '15673304507739.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 23, 0, 10, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 14:34:10', '2019-09-01 14:34:10'),
(95, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, '15673304562143.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 23, 0, 11, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 14:34:16', '2019-09-01 14:34:16'),
(116, NULL, NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 18, 0, 4, NULL, 17, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-01 20:22:20', '2019-09-01 20:22:20'),
(117, 'סיבוב', 'Round', NULL, NULL, NULL, '2019-09-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 16, 0, 8, 'סיבוב 12', NULL, NULL, NULL, 'Round 12', '', '', NULL, NULL, '12', 'round-12', 1, 1, '2019-09-03 16:09:41', '2019-09-03 16:10:13'),
(118, 'טבעות', 'Rings', NULL, NULL, NULL, '2019-09-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 16, 0, 9, 'טבעות', NULL, NULL, NULL, 'Rings', '', '', NULL, NULL, '', 'rings', 1, NULL, '2019-09-03 16:10:37', '2019-09-03 16:10:37'),
(119, NULL, NULL, NULL, NULL, NULL, '2019-09-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 18, 0, 5, NULL, 18, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-03 16:12:53', '2019-09-03 16:12:53'),
(120, NULL, NULL, NULL, NULL, NULL, '2019-09-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 18, 0, 6, NULL, 19, NULL, NULL, NULL, '', '', NULL, NULL, '', '', 1, NULL, '2019-09-03 16:13:03', '2019-09-03 16:13:03'),
(127, 'זהב 24 קראט', '24K Gold', NULL, NULL, '#b76e79', '2019-09-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 15, 0, 1, 'זהב 24 קראט', NULL, NULL, NULL, '24K Gold', '', '', NULL, NULL, '24', '24k-gold', 1, NULL, '2019-09-03 18:25:19', '2019-09-03 18:25:19'),
(128, 'אוסף אבני חן', 'Test', NULL, '<div dir=ltr><br></div>', NULL, '2019-09-03', NULL, NULL, '15675284841680.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 22, 0, 8, 'يشس', NULL, NULL, NULL, 'يشي', '', '', NULL, NULL, 'yshs', 'yshy', 1, 1, '2019-09-03 21:34:44', '2019-09-03 21:36:39'),
(130, 'תנאים', 'TERMS & CONDITIONS', NULL, '<div dir=\"ltr\"><div dir=\"ltr\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non quia, fugiat debitis sequi pariatur ducimus dolorum eligendi at? Cupiditate magni aliquam voluptate dolorum. Accusamus vel sint nesciunt, eius itaque placeat dolores quisquam architecto modi, nihil quae obcaecati pariatur iste! Modi earum obcaecati dolor nihil sed explicabo. Quaerat accusamus, atque praesentium facere, culpa ratione tenetur fugiat iure rerum autem, minima doloremque hic maiores dicta a blanditiis illo dolores repudiandae. Sequi quaerat dolore cum sunt beatae rerum sapiente omnis sed natus, dolorum, aliquid possimus laborum, ab deserunt!</div><div dir=\"ltr\"><br></div><div dir=\"ltr\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique iure ducimus, velit dignissimos eligendi asperiores nemo rem atque quas impedit cupiditate earum eius unde ipsa quis voluptate, corrupti dolorum mollitia necessitatibus! Deleniti voluptate dolor nisi suscipit excepturi tempora quas tenetur, itaque magni ullam a! Iste, quia accusantium, molestias eveniet sed perspiciatis quas dicta pariatur excepturi ducimus doloribus neque, incidunt quae ratione non adipisci expedita perferendis quasi alias eius tempora quos!</div><div dir=\"ltr\"><br></div><div dir=\"ltr\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique iure ducimus, velit dignissimos eligendi asperiores nemo rem atque quas impedit cupiditate earum eius unde ipsa quis voluptate, corrupti dolorum mollitia necessitatibus! Deleniti voluptate dolor nisi suscipit excepturi tempora quas tenetur, itaque magni ullam a! Iste, quia accusantium, molestias eveniet sed perspiciatis quas dicta pariatur excepturi ducimus doloribus neque, incidunt quae ratione non adipisci expedita perferendis quasi alias eius tempora quos!</div><div dir=\"ltr\"><br style=\"font-size: 13.92px;\"></div></div>', NULL, '2019-09-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 24, 0, 1, 'תנאים', NULL, NULL, NULL, 'TERMS & CONDITIONS', '', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non qui', NULL, NULL, '', '', 1, NULL, '2019-09-08 14:15:37', '2019-09-08 14:15:37'),
(131, 'זהב קראט', 'Policyd', NULL, '<div dir=\"ltr\"><div dir=\"ltr\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non quia, fugiat debitis sequi pariatur ducimus dolorum eligendi at? Cupiditate magni aliquam voluptate dolorum. Accusamus vel sint nesciunt, eius itaque placeat dolores quisquam architecto modi, nihil quae obcaecati pariatur iste! Modi earum obcaecati dolor nihil sed explicabo. Quaerat accusamus, atque praesentium facere, culpa ratione tenetur fugiat iure rerum autem, minima doloremque hic maiores dicta a blanditiis illo dolores repudiandae. Sequi quaerat dolore cum sunt beatae rerum sapiente omnis sed natus, dolorum, aliquid possimus laborum, ab deserunt!</div><div dir=\"ltr\"><br></div><div dir=\"ltr\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique iure ducimus, velit dignissimos eligendi asperiores nemo rem atque quas impedit cupiditate earum eius unde ipsa quis voluptate, corrupti dolorum mollitia necessitatibus! Deleniti voluptate dolor nisi suscipit excepturi tempora quas tenetur, itaque magni ullam a! Iste, quia accusantium, molestias eveniet sed perspiciatis quas dicta pariatur excepturi ducimus doloribus neque, incidunt quae ratione non adipisci expedita perferendis quasi alias eius tempora quos!</div><div dir=\"ltr\"><br></div><div dir=\"ltr\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique iure ducimus, velit dignissimos eligendi asperiores nemo rem atque quas impedit cupiditate earum eius unde ipsa quis voluptate, corrupti dolorum mollitia necessitatibus! Deleniti voluptate dolor nisi suscipit excepturi tempora quas tenetur, itaque magni ullam a! Iste, quia accusantium, molestias eveniet sed perspiciatis quas dicta pariatur excepturi ducimus doloribus neque, incidunt quae ratione non adipisci expedita perferendis quasi alias eius tempora quos!</div><div dir=\"ltr\"><br style=\"font-size: 13.92px;\"></div></div>', NULL, '2019-09-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 25, 0, 1, 'זהב קראט', NULL, NULL, NULL, 'Policyd', '', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non qui', NULL, NULL, '', 'policyd', 1, NULL, '2019-09-08 14:16:07', '2019-09-08 14:16:07'),
(132, 'זהב קראט', 'Accessibility', NULL, '<div dir=\"ltr\"><div dir=\"ltr\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non quia, fugiat debitis sequi pariatur ducimus dolorum eligendi at? Cupiditate magni aliquam voluptate dolorum. Accusamus vel sint nesciunt, eius itaque placeat dolores quisquam architecto modi, nihil quae obcaecati pariatur iste! Modi earum obcaecati dolor nihil sed explicabo. Quaerat accusamus, atque praesentium facere, culpa ratione tenetur fugiat iure rerum autem, minima doloremque hic maiores dicta a blanditiis illo dolores repudiandae. Sequi quaerat dolore cum sunt beatae rerum sapiente omnis sed natus, dolorum, aliquid possimus laborum, ab deserunt!</div><div dir=\"ltr\"><br></div><div dir=\"ltr\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique iure ducimus, velit dignissimos eligendi asperiores nemo rem atque quas impedit cupiditate earum eius unde ipsa quis voluptate, corrupti dolorum mollitia necessitatibus! Deleniti voluptate dolor nisi suscipit excepturi tempora quas tenetur, itaque magni ullam a! Iste, quia accusantium, molestias eveniet sed perspiciatis quas dicta pariatur excepturi ducimus doloribus neque, incidunt quae ratione non adipisci expedita perferendis quasi alias eius tempora quos!</div><div dir=\"ltr\"><br></div><div dir=\"ltr\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique iure ducimus, velit dignissimos eligendi asperiores nemo rem atque quas impedit cupiditate earum eius unde ipsa quis voluptate, corrupti dolorum mollitia necessitatibus! Deleniti voluptate dolor nisi suscipit excepturi tempora quas tenetur, itaque magni ullam a! Iste, quia accusantium, molestias eveniet sed perspiciatis quas dicta pariatur excepturi ducimus doloribus neque, incidunt quae ratione non adipisci expedita perferendis quasi alias eius tempora quos!</div><div dir=\"ltr\"><br style=\"font-size: 13.92px;\"></div></div>', NULL, '2019-09-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 26, 0, 1, 'זהב קראט', NULL, NULL, NULL, 'Accessibility', '', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatem quo architecto numquam odio illo quos quod esse amet quis est reiciendis sapiente non qui', NULL, NULL, '', '', 1, NULL, '2019-09-08 14:16:12', '2019-09-08 14:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `topic_categories`
--

CREATE TABLE `topic_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_categories`
--

INSERT INTO `topic_categories` (`id`, `topic_id`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 6, 4, '2019-07-01 07:48:56', '2019-07-01 07:48:56'),
(2, 8, 5, '2019-07-01 10:04:34', '2019-07-01 10:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `topic_fields`
--

CREATE TABLE `topic_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `field_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` text COLLATE utf8mb4_unicode_ci,
  `permissions_id` int(11) DEFAULT '1',
  `status` tinyint(4) DEFAULT NULL,
  `gender` int(11) NOT NULL DEFAULT '0',
  `staus_dashboard` int(11) NOT NULL DEFAULT '0',
  `connect_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connect_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `phone`, `address`, `api_token`, `permissions_id`, `status`, `gender`, `staus_dashboard`, `connect_email`, `connect_password`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@site.com', '$2y$10$HtxE53dPU9V4bswYLz/JquEJSF4UDTDqNMNmauoszrGvJLxCLmIPC', '15671818946353.jpg', 1153353918, '7 Gamal Al Din Abou Al Mahasen, Qasr an Nile, Cairo Governorate, Egypt', '', 1, 1, 0, 1, NULL, NULL, 'eZThdLJnzlRc6mOhRYvYEltcwW9sI3owQHXXzxa3KQKiUhbNGouFeKG0MwiL', 1, 1, '2019-06-27 09:14:08', '2019-09-01 15:34:41'),
(2, 'manager', 'manager@site.com', '$2y$10$/3P9eN6HrzWC7x8eKS6vFuhprQc4Ln7WAsvnRIgCgeyBQoEoXQXu.', NULL, 0, '', '', 2, 1, 0, 1, NULL, NULL, NULL, 1, 1, '2019-06-27 09:14:08', '2019-06-27 09:14:08'),
(4, 'eslam', 'test@gmail.com', '$2y$10$y4sbuH//Q/B7uA9Q4wB6OeAklMqoeAYej5gKdEW31kfvm.BE21Z/C', NULL, 1009739091, 'ewrfdsfsdfsdfsdfsdfsdfsdfsdf', '', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, '2019-07-15 16:32:08', '2019-07-15 16:32:08'),
(5, 'ahmed', 'a@yahoo.com', '$2y$10$/aWU.Z7IMIB54qUSsEq7gOo.a1Q6HhTYDieV0bdMaxEjUdhoqcxE6', NULL, 1223233, 'ainshams', '', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, '2019-07-15 17:00:10', '2019-07-15 17:00:10'),
(10, 'esalm elshenawy', 'islam.elshenawy@trioconceptme.com', '$2y$10$hajKX2exvh6If7ZCwooGwOFuyjoPz2C7hw1eTRk3QnqEf1jsi6ura', '', 0, '', '', 1, 1, 0, 0, NULL, NULL, NULL, 1, 1, '2019-07-17 16:30:39', '2019-07-29 20:08:38'),
(12, 'esalm elshenawy', 'islam.elshenasaswy@trioconceptme.com', '$2y$10$nhiqcyjFdvinAt.vveZ.BuM2245sXZCrJiUkDwn4107Fc2fQdjPLK', '15644111173538.jpg', 0, '', '', 1, 1, 0, 0, NULL, NULL, NULL, 1, 1, '2019-07-29 19:38:37', '2019-07-29 19:38:37'),
(13, 'esalm elshenawy', 'islam.elshesaSAnawy@trioconceptme.com', '$2y$10$okw/N910ke.d6uTAEg.D0OHpRRmM6dMKUbXSZAPztBJtqRh12tGJK', '', 0, '', '', 1, 1, 0, 0, NULL, NULL, NULL, 1, NULL, '2019-07-29 20:07:23', '2019-07-29 20:07:23'),
(14, 'ahmeed', 'ahh@yahoo.com', '123456789', NULL, 8585958, 'ainshams', '', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, '2019-07-31 15:03:52', '2019-08-07 16:13:24'),
(15, 'eslam', 'test1@gmail.com', '$2y$10$fZ96ggsQ8P8EBwPDsKeEzeBNJBz8nWa2sYk54k7p7aaSfSnTbQ096', NULL, 1009730091, 'ewrfdsfsdfsdfsdfsdfsdfsdfsdf', '', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-07-31 17:52:53', '2019-07-31 17:52:53'),
(16, 'ahmed', 'x@gmail.com', '$2y$10$.wOAg1zpWrNluWXb1LwwWu8yLo7yuv8H3SFVbYa9BenUJjkjFN.lm', NULL, 1010101, 'sdsdadfasdasda', '', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-04 18:04:06', '2019-08-04 18:04:06'),
(17, 'ahmed', 'farid@gmail.com', '$2y$10$BCSyGC7rQ49PW711PqN/W.VA/TMG8tBHDPeWn0zdkIOLVoRlMtJ3C', NULL, 1011754436, 'fffff', '', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-04 19:25:59', '2019-08-04 19:25:59'),
(19, 'ahmed', 'eng@gmail.com', '$2y$10$qgw4fVnD6N.lUTMhJUMZZuNWMjMfNQ54M/9o/oHAGCtp4RtJwvHta', NULL, 101175443, '21 cairo', '', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-06 13:52:51', '2019-08-06 13:52:51'),
(20, 'ahmed mansour', 'ahy@yahoo.com', '$2y$10$opbNKleEJHcE/VrEx4E1vutBS9lZq.ZHKT9INbmPvAmtIJK979SyK', NULL, 112757594, 'a', '', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-06 14:32:10', '2019-08-06 14:32:10'),
(21, 'ahmed manss', 'hy@yahoo.com', '$2y$10$TGKhXI.zKQ2PvHodid5grOmWCaEzF5YEBMIxR3IlF9S2UXO2rHxeS', NULL, 1127578978, 'a', '', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-06 14:46:24', '2019-08-06 14:46:24'),
(22, 'Mostafa Elgohary', 'admin@gohary.com', '$2y$10$j3q1NYLJw/hKTuBHuyKF4eN6fe3ht4YxiC3SM7ZWukEkUNjVjAB1G', '15651751443346.png', 0, '', NULL, 1, 1, 0, 0, NULL, NULL, NULL, 1, NULL, '2019-08-07 15:52:24', '2019-08-07 15:52:24'),
(23, 'Mahmoud Dief', 'Mahmoud@dief.com', '$2y$10$YUYyFtK1OKd0z2Eie21tmOvor5cY1VxuLAxs2TgOMGSZ/N.mgQe2.', '15651752666310.png', 0, '', NULL, 1, 1, 0, 0, NULL, NULL, NULL, 1, NULL, '2019-08-07 15:54:26', '2019-08-07 15:54:26'),
(24, 'esalm elshenawy', 'islam.elshenawy@triwqocwqonceptme.com', '$2y$10$ZRE6xcKU.D.0WqQekTEkuOhGQMuPtYdYbnuG6anA7fpje9hEikXaK', '15651754862703.PNG', 0, '', NULL, 1, 1, 0, 0, NULL, NULL, NULL, 1, NULL, '2019-08-07 15:58:06', '2019-08-07 15:58:06'),
(26, 'Mostafa Elgohary', 'admin@email.com', '$2y$10$Yn3SwhYrZI3LB6FtK4CZIe8z4NiOJ/AMVyrHZWWz3GKxmx5kE9Cw6', '15651840343294.png', 0, '', NULL, 1, 1, 0, 0, NULL, NULL, NULL, 1, NULL, '2019-08-07 18:20:34', '2019-08-07 18:20:34'),
(27, 'esalm elshenawy', 'islam.elshenawyasdasd@trioconceptme.com', '$2y$10$28MHnbJsFklEGN9Gx8xG0uI7hKByclGD0Gn2oSfw4NzYDZLwGXG9S', '15651898898505.jpg', 0, '', NULL, 1, 1, 0, 0, NULL, NULL, NULL, 1, NULL, '2019-08-07 19:58:09', '2019-08-07 19:58:09'),
(28, 'fsdf', 'fasdsdasd@gmail.com', '$2y$10$EvAAszSw.pR3lIMPTaH7w.1GE1jGCKugDeUkJ3zqprRHBqBOpzF7a', '15651961848514.png', 0, '', NULL, 1, 1, 0, 0, NULL, NULL, NULL, 1, NULL, '2019-08-07 21:43:04', '2019-08-07 21:43:04'),
(29, 'esalm elshenawy', 'islam.elshenawy@trsasaioconceptme.com', '$2y$10$Ql3Aw2.XYtWHmXG1xXA.geR/yjazftr4fz2YavaVHyhddMwqBNXQ6', '15652609006837.jpg', 0, '', NULL, 1, 1, 0, 1, NULL, NULL, NULL, 1, NULL, '2019-08-08 15:41:40', '2019-08-08 15:41:40'),
(30, 'Mostafa Mohamed', 'mouse.fcis@gmail.com', '$2y$10$kVqyttctsnnNuFSu/DE4pedW3C3.DFICS8JNuIbNfw1U/2WJBNSBq', NULL, 1153353918, 'a', NULL, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-08 17:27:16', '2019-08-08 17:27:16'),
(31, 'esalm elshenewawy', 'islam.elshenaewwy@trioconceptme.com', '$2y$10$49xStUJqJRW/tlQO3X7cGuIMbNDQDzvsdBuApgoUlNQsPRJlujwkO', '', 0, '0', NULL, 1, 1, 0, 1, NULL, NULL, NULL, 1, 1, '2019-08-18 06:49:51', '2019-08-30 21:14:43'),
(32, 'admin', 'admin@admin.com', '$2y$10$HtxE53dPU9V4bswYLz/JquEJSF4UDTDqNMNmauoszrGvJLxCLmIPC', NULL, 1009739491, 'test test', 'phOn2B76MlGKMv7cCAiTvtXUXAYZ4p7bk4XKqvUyue2egTOVZu3yC6xcymBu', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-18 12:45:48', '2019-08-25 12:40:04'),
(33, 'dasdas', 'islam.elshenaw1232y@trioconceptme.com', '$2y$10$n0PKRv5qGlhOylpKqwhIW.ngO.pxGrWAo98FlDRZ1xOwYv1Kf/Srm', NULL, 1009739441, '0', '7EMhbEk5Xgk35R5fPUs6a9ZADGrlThy28YlHpjyOmGxVSyS1rtxdVngnuPMl', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-18 12:59:19', '2019-08-18 12:59:19'),
(34, 'dasdas', 'islam.elshenaw123212y@trioconceptme.com', '$2y$10$B2juFclRTsuq.r4k.SMX..w4czCdOvzmc0y659NcRPYQbNabzBz.G', NULL, 1009739321, '0', 'TBSQwxRrgAvTTTVh5GtqII9yqE5SmMSemvsi0RzoxWPkXUNvEgZjKrqDdppo', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-18 13:01:31', '2019-08-18 13:01:31'),
(35, 'dasdas', 'eslamelshenawy9asd316@gmail.com', '$2y$10$F2NqHpKQbeh6M40mLcyxAObLnbOWjQ8iMNMNjzuzJupmERgGD6N5u', NULL, 1009723342, '0', 'CU7pVQl2YxlbdfnjwKVcpia1uZ0GFuIw15XOaPb6moHLwW9bhl1ASJwExCws', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-18 13:02:15', '2019-08-18 13:02:15'),
(36, 'dasdas', 'we@gmail.com', '$2y$10$UEczPCn1Gq.8YWJzEPGMWOP8xRy2pyAAjQ1gYhkWBVWa26/./3ZdG', NULL, 1009739490, '0', 'fjkG3c2FK6Bk2gCNU1Fg1OPn3kXZF35xEJRWagSGExOU1ZXLIkb3yc0Bhydi', 1, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-18 13:07:25', '2019-08-18 13:07:25'),
(37, 'dasdasde3', 'islam.elshenawwqeqweqweqwy@trioconceptme.com', '$2y$10$ZoibEjZRaJuNNULt0aR4reH9vUOxtRevltQ7vkp01Q4bH13R/g6J.', NULL, 1009739493, '0', 'ZWFmSwvslUlgkvaI74YtOc01wQwyPAW0zpDp0BJlulJHa0jsox02BJPbDwVJ', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-18 13:09:26', '2019-08-18 13:09:26'),
(38, 'Elgohary', 'aa@yahoo.com', '$2y$10$iYp.YTThqNrg7QTiI.A6CO10OrMWB7stFmOToyy0xezNt2y/si17G', NULL, 1153353915, NULL, 'Lb8eoI0JWeRGmSUVsFxPBaPLfNgZJB4cDD7zm98eKz5PC1wbKO39W0penxoJ', 1, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '2019-08-30 22:25:03', '2019-08-30 22:25:03'),
(39, 'ahmed farid', 's@gmail.com', '$2y$10$8XqQ5lZUFM643Md6NCTZg.fbL/Wk5i9aXi5lqdpkr/uDUZr/9A4ku', NULL, 101, 'shahah', NULL, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-09-01 13:36:44', '2019-09-01 13:36:44'),
(40, 'Mostafa Elgohary', 'admin@panel.com', '$2y$10$ewO1YSoS6Zip1vQ4HiKwduNemHLmorY8e6wCttpu8IAJEjDvdR3mG', '15676024656224.png', 0, NULL, NULL, 1, 1, 0, 1, NULL, NULL, NULL, 1, NULL, '2019-09-04 18:07:45', '2019-09-04 18:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `webmails`
--

CREATE TABLE `webmails` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `father_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `date` datetime NOT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_cc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_bcc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `flag` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webmails`
--

INSERT INTO `webmails` (`id`, `cat_id`, `group_id`, `contact_id`, `father_id`, `title`, `details`, `date`, `from_email`, `from_name`, `from_phone`, `to_email`, `to_name`, `to_cc`, `to_bcc`, `status`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, 'fdsfds', '<p>dfsfsdfsdfsfsfsd</p>', '2019-07-10 08:44:43', 'info@sitename.com', 'Site Title', NULL, 'eslamelshenawy9316@gmail.com', NULL, NULL, NULL, 1, 0, 1, NULL, '2019-07-10 06:44:43', '2019-07-10 06:44:43'),
(4, 1, NULL, NULL, NULL, 'dsada', '<p>dadsa</p>', '2019-09-04 15:49:10', NULL, 'Shama website', NULL, 'mouse.fcis@gmail.com', NULL, NULL, NULL, 1, 0, 1, NULL, '2019-09-04 20:49:10', '2019-09-04 20:49:10'),
(5, 0, NULL, NULL, NULL, NULL, 'SsaSasaS', '2019-09-08 07:34:52', 'islam.elshenawy@trioconceptme.com', 'esalm elshenawy', NULL, NULL, 'Shama website', NULL, NULL, 0, 0, NULL, NULL, '2019-09-08 12:34:52', '2019-09-08 12:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `webmails_files`
--

CREATE TABLE `webmails_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `webmail_id` int(11) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webmails_files`
--

INSERT INTO `webmails_files` (`id`, `webmail_id`, `file`, `title`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Penguins.jpg', NULL, NULL, NULL, '2019-07-10 06:44:43', '2019-07-10 06:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `webmails_groups`
--

CREATE TABLE `webmails_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webmaster_banners`
--

CREATE TABLE `webmaster_banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `row_no` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `desc_status` tinyint(4) NOT NULL,
  `link_status` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `icon_status` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webmaster_banners`
--

INSERT INTO `webmaster_banners` (`id`, `row_no`, `name`, `width`, `height`, `desc_status`, `link_status`, `type`, `icon_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Home Banners', 1600, 500, 1, 1, 1, 0, 1, 1, 1, '2019-06-27 09:14:09', '2019-08-29 22:20:26'),
(2, 2, 'Text Banner', 330, 330, 1, 1, 0, 1, 1, 1, 1, '2019-06-27 09:14:09', '2019-08-29 22:22:25'),
(3, 3, 'sideBanners', 330, 330, 0, 1, 1, 0, 1, 1, NULL, '2019-06-27 09:14:09', '2019-06-27 09:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `webmaster_sections`
--

CREATE TABLE `webmaster_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `row_no` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status_create` int(11) NOT NULL DEFAULT '0',
  `taxes` int(11) NOT NULL DEFAULT '0',
  `partner` int(11) NOT NULL DEFAULT '0',
  `percent` int(11) NOT NULL DEFAULT '0',
  `sections_status` tinyint(4) NOT NULL,
  `comments_status` tinyint(4) NOT NULL,
  `date_status` tinyint(4) NOT NULL,
  `expire_date_status` tinyint(4) NOT NULL,
  `longtext_status` tinyint(4) NOT NULL,
  `editor_status` tinyint(4) NOT NULL,
  `attach_file_status` tinyint(4) NOT NULL,
  `extra_attach_file_status` tinyint(4) NOT NULL,
  `multi_images_status` tinyint(4) NOT NULL,
  `section_icon_status` tinyint(4) NOT NULL,
  `icon_status` tinyint(4) NOT NULL,
  `maps_status` tinyint(4) NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `related_status` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `images_status` int(11) DEFAULT '0',
  `status_color` int(11) NOT NULL DEFAULT '0',
  `status_color_stan` int(11) NOT NULL DEFAULT '0',
  `size` int(11) NOT NULL DEFAULT '0',
  `status_delete` int(11) NOT NULL DEFAULT '0',
  `status_type` int(11) NOT NULL DEFAULT '0',
  `style_gold` int(11) NOT NULL DEFAULT '0',
  `seo_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webmaster_sections`
--

INSERT INTO `webmaster_sections` (`id`, `row_no`, `name`, `type`, `status_create`, `taxes`, `partner`, `percent`, `sections_status`, `comments_status`, `date_status`, `expire_date_status`, `longtext_status`, `editor_status`, `attach_file_status`, `extra_attach_file_status`, `multi_images_status`, `section_icon_status`, `icon_status`, `maps_status`, `order_status`, `related_status`, `status`, `images_status`, `status_color`, `status_color_stan`, `size`, `status_delete`, `status_type`, `style_gold`, `seo_title_ar`, `seo_title_en`, `seo_description_ar`, `seo_description_en`, `seo_keywords_ar`, `seo_keywords_en`, `seo_url_slug_ar`, `seo_url_slug_en`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'sitePages', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-06-27 09:14:09', '2019-07-01 07:28:16'),
(2, 2, 'services', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-06-27 09:14:09', '2019-07-01 12:19:06'),
(3, 3, 'news', 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-06-27 09:14:09', '2019-07-01 07:28:00'),
(4, 4, 'photos', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-06-27 09:14:09', '2019-07-01 10:01:37'),
(5, 5, 'videos', 2, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-06-27 09:14:09', '2019-07-01 07:27:51'),
(6, 6, 'sounds', 3, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-06-27 09:14:09', '2019-07-01 07:27:47'),
(7, 7, 'blog', 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-06-27 09:14:09', '2019-07-09 06:35:01'),
(8, 8, 'products', 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 32, '2019-06-27 09:14:09', '2019-08-19 10:53:48'),
(9, 9, 'partners', 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-06-27 09:14:09', '2019-07-03 10:23:56'),
(12, 10, 'filters', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'filters', 'filters', 1, 1, '2019-07-01 07:33:44', '2019-07-01 09:46:14'),
(13, 11, 'typies', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'typies', 'typies', 1, 1, '2019-07-02 06:20:35', '2019-07-08 10:19:12'),
(14, 12, 'color', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'color', 'color', 1, 1, '2019-07-09 06:47:05', '2019-08-08 20:37:17'),
(15, 13, 'filters_standard', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'filters-standard', 'filters-standard', 1, NULL, '2019-07-10 10:20:57', '2019-07-10 10:20:57'),
(16, 14, 'style', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'style', 'style', 1, 1, '2019-07-10 13:26:48', '2019-07-10 13:28:35'),
(17, 15, 'about', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, NULL, '2019-07-10 13:47:05', '2019-07-10 13:47:05'),
(18, 16, 'size', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'size', 'size', 1, 1, '2019-07-17 20:52:57', '2019-07-17 20:59:37'),
(19, 17, 'Taxes', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'taxes', 'taxes', 32, NULL, '2019-08-19 13:12:44', '2019-08-19 13:12:44'),
(20, 18, 'percentOrD', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'percentord', 'percentord', 1, NULL, '2019-08-20 05:17:33', '2019-08-20 05:17:33'),
(21, 19, 'collection', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'collection', 'collection', 32, 32, '2019-08-25 09:23:15', '2019-08-25 09:25:25'),
(22, 20, 'Gallery', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'gallery', 'gallery', 32, 32, '2019-08-25 10:22:48', '2019-08-25 10:26:47'),
(23, 21, 'partner', 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'partner', 'partner', 1, NULL, '2019-09-01 14:17:08', '2019-09-01 14:17:08'),
(24, 22, 'terms_conditions', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'terms-conditions', 'terms-conditions', 1, NULL, '2019-09-08 14:07:27', '2019-09-08 14:07:27'),
(25, 23, 'policy', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'policy', 'policy', 1, NULL, '2019-09-08 14:07:51', '2019-09-08 14:07:51'),
(26, 24, 'Accessibility', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'accessibility', 'accessibility', 1, NULL, '2019-09-08 14:08:21', '2019-09-08 14:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `webmaster_section_fields`
--

CREATE TABLE `webmaster_section_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `webmaster_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci,
  `details_en` text COLLATE utf8mb4_unicode_ci,
  `row_no` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `required` tinyint(4) NOT NULL,
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webmaster_settings`
--

CREATE TABLE `webmaster_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `ar_box_status` tinyint(4) NOT NULL,
  `en_box_status` tinyint(4) NOT NULL,
  `seo_status` tinyint(4) NOT NULL,
  `analytics_status` tinyint(4) DEFAULT NULL,
  `banners_status` tinyint(4) NOT NULL,
  `inbox_status` tinyint(4) NOT NULL,
  `calendar_status` tinyint(4) DEFAULT NULL,
  `settings_status` tinyint(4) NOT NULL,
  `newsletter_status` tinyint(4) DEFAULT NULL,
  `members_status` tinyint(4) NOT NULL,
  `orders_status` tinyint(4) NOT NULL,
  `shop_status` tinyint(4) NOT NULL,
  `shop_settings_status` tinyint(4) NOT NULL,
  `default_currency_id` int(11) NOT NULL,
  `languages_count` int(11) NOT NULL,
  `latest_news_section_id` int(11) NOT NULL,
  `header_menu_id` int(11) NOT NULL,
  `footer_menu_id` int(11) NOT NULL,
  `home_banners_section_id` int(11) NOT NULL,
  `home_text_banners_section_id` int(11) NOT NULL,
  `side_banners_section_id` int(11) NOT NULL,
  `contact_page_id` int(11) NOT NULL,
  `newsletter_contacts_group` int(11) NOT NULL,
  `new_comments_status` tinyint(4) NOT NULL,
  `links_status` tinyint(4) NOT NULL,
  `register_status` tinyint(4) NOT NULL,
  `permission_group` int(11) NOT NULL,
  `api_status` tinyint(4) NOT NULL,
  `api_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_content1_section_id` int(11) NOT NULL,
  `home_content2_section_id` int(11) NOT NULL,
  `home_content3_section_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webmaster_settings`
--

INSERT INTO `webmaster_settings` (`id`, `ar_box_status`, `en_box_status`, `seo_status`, `analytics_status`, `banners_status`, `inbox_status`, `calendar_status`, `settings_status`, `newsletter_status`, `members_status`, `orders_status`, `shop_status`, `shop_settings_status`, `default_currency_id`, `languages_count`, `latest_news_section_id`, `header_menu_id`, `footer_menu_id`, `home_banners_section_id`, `home_text_banners_section_id`, `side_banners_section_id`, `contact_page_id`, `newsletter_contacts_group`, `new_comments_status`, `links_status`, `register_status`, `permission_group`, `api_status`, `api_key`, `home_content1_section_id`, `home_content2_section_id`, `home_content3_section_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, NULL, 1, 1, NULL, 1, NULL, 0, 0, 0, 0, 0, 2, 0, 1, 2, 1, 2, 3, 2, 1, 1, 0, 0, 3, 1, '264252408315856', 0, 0, 0, 1, 1, '2019-06-27 09:14:08', '2019-08-22 12:28:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analytics_pages`
--
ALTER TABLE `analytics_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analytics_visitors`
--
ALTER TABLE `analytics_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attach_files`
--
ALTER TABLE `attach_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `best_diamond`
--
ALTER TABLE `best_diamond`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts_groups`
--
ALTER TABLE `contacts_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_products`
--
ALTER TABLE `favourite_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_topics`
--
ALTER TABLE `related_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_filters`
--
ALTER TABLE `setting_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_golds`
--
ALTER TABLE `standard_golds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic_categories`
--
ALTER TABLE `topic_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic_fields`
--
ALTER TABLE `topic_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `webmails`
--
ALTER TABLE `webmails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webmails_files`
--
ALTER TABLE `webmails_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webmails_groups`
--
ALTER TABLE `webmails_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webmaster_banners`
--
ALTER TABLE `webmaster_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webmaster_sections`
--
ALTER TABLE `webmaster_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webmaster_section_fields`
--
ALTER TABLE `webmaster_section_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webmaster_settings`
--
ALTER TABLE `webmaster_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analytics_pages`
--
ALTER TABLE `analytics_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `analytics_visitors`
--
ALTER TABLE `analytics_visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attach_files`
--
ALTER TABLE `attach_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `best_diamond`
--
ALTER TABLE `best_diamond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts_groups`
--
ALTER TABLE `contacts_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_products`
--
ALTER TABLE `favourite_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `related_topics`
--
ALTER TABLE `related_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_filters`
--
ALTER TABLE `setting_filters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `standard_golds`
--
ALTER TABLE `standard_golds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `topic_categories`
--
ALTER TABLE `topic_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topic_fields`
--
ALTER TABLE `topic_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `webmails`
--
ALTER TABLE `webmails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `webmails_files`
--
ALTER TABLE `webmails_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `webmails_groups`
--
ALTER TABLE `webmails_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webmaster_banners`
--
ALTER TABLE `webmaster_banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webmaster_sections`
--
ALTER TABLE `webmaster_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `webmaster_section_fields`
--
ALTER TABLE `webmaster_section_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webmaster_settings`
--
ALTER TABLE `webmaster_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
