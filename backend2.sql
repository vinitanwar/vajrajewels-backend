-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2025 at 07:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backend2`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `order_notes` text DEFAULT NULL,
  `selectAddress` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `first_name`, `last_name`, `gender`, `email`, `phone`, `country`, `state`, `address`, `landmark`, `house_no`, `postcode`, `city`, `order_notes`, `selectAddress`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'jonty', 'pundir', 'male', 'jonty@mail.com', '+91 98888 19410', 'India', 'Punjab', 'booth no 7, pocket c, Wave Estate,sector 85', 'al', '11', '140306', 'Mohali', 'fast delevery', 1, 10, '2025-09-08 11:28:33', '2025-09-08 11:28:33'),
(5, 'aman', 'pundir', 'male', 'shikebwarsi@gmail.com', '+91 98888 19410', 'India', 'Punjab', 'booth no 7, pocket c, Wave Estate,sector 85', 'al', '11', '140306', 'Mohali', 'done fast', 1, 11, '2025-09-08 12:41:07', '2025-09-18 13:14:59'),
(7, 'jonty', 'thakur', 'male', 'jonty@mail.com', '98765433211', 'India', 'Punjab', 'booth no 7, pocket c, Wave Estate,sector 85', NULL, NULL, '140306', 'Mohali', NULL, 0, 11, '2025-09-18 12:32:54', '2025-09-18 13:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `count`, `banner`, `created_at`, `updated_at`) VALUES
(5, 2, 'rlpvJafe9DJBEfd38VL40GjqQo0ImEDLk7tHu5TG.webp', '2025-09-03 14:02:10', '2025-09-03 14:02:10'),
(8, 3, 'RDVGBZKBk13E3lhkwH9dBtlCRAKURPPNpZsV08VV.webp', '2025-09-03 15:56:06', '2025-09-03 15:56:06'),
(10, 1, 'nzUiYOGRHgClCcQrkSELqc6vyJu5J7KD3s7kh3cn.webp', '2025-09-16 15:46:02', '2025-09-16 15:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_des` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `reading_time` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tags`)),
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `title`, `slug`, `short_des`, `author`, `reading_time`, `description`, `tags`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'blogs/UxpXbixhA84RsKIatbQB7XN2Efp0fipO3aUPEtee.webp', 'The Beauty of Natural Diamonds', 'the-beauty-of-natural-diamonds', 'Discover why natural diamonds are treasured for their timeless beauty and brilliance.', 'John Doe', '8', 'Experience the allure of natural diamonds at Vajra Jewels, celebrated for their authentic sparkle and rarity. This article examines the mystique and natural origins of these precious stones.\r\n\r\nAt Vajra Jewels, we cherish the unique brilliance of natural diamonds. This comprehensive guide details the natural formation process, the artisanal craftsmanship behind each stone, and why these timeless gems continue to captivate collectors worldwide. Discover the legacy and beauty that make each diamond a true masterpiece.', '[\"natural\",\"diamond\",\"luxury\",\"jewelry\",\"Vajra Jewels\"]', 6, '2025-09-18 17:09:43', '2025-09-18 17:09:43'),
(3, 'blogs/lSgI1g98T6FIbwCxarUmodzvFSfmcWf6olMqRpff.webp', 'How to Choose the Perfect Diamond', 'how-to-choose-the-perfect-diamond', 'A guide to selecting the perfect diamond for any occasion.', 'Jane Smith', '10', 'Discover Vajra Jewels\' expert advice on selecting the ideal diamond. Learn the critical factors that ensure a perfect purchase for every occasion.\r\n\r\nChoosing the right diamond is an art, and Vajra Jewels is here to help. This guide walks you through the essential aspects—cut, clarity, carat, and color—while highlighting ethical sourcing and certification. Our expert tips empower you to make a confident decision that combines beauty with long-term value.', '[\"guide\",\"diamond selection\",\"engagement\",\"jewelry\",\"Vajra Jewels\"]', 14, '2025-09-18 17:19:39', '2025-09-18 17:19:39'),
(4, 'blogs/RfpjKrjmqdWDK6ZQ0XSSO70vBmTb6YNp3DCMXkUF.webp', 'Diamond Jewelry Trends 2024', 'diamond-jewelry-trends-2024', 'Explore the latest trends in diamond jewelry this year. and best', 'Emily Johnson', '12', 'Stay ahead with Vajra Jewels\' take on 2024\'s diamond jewelry trends. Uncover the designs and innovations set to redefine luxury.\r\n\r\nIn 2024, diamond jewelry is evolving with contemporary aesthetics and sustainable practices. Vajra Jewels presents an insightful look at emerging trends—from streamlined designs to bold artistic statements. Discover how traditional craftsmanship is merged with modern innovation to create pieces that are both timeless and cutting-edge.', '[\"trends\",\"jewelry\",\"innovation\",\"diamond\",\"Vajra Jewels\"]', 14, '2025-09-18 17:21:27', '2025-09-18 17:21:27'),
(5, 'blogs/3rqUnBHCFDbycX2pPDRguDyBFVFxzyBDWKJDovIz.webp', 'Diamond Jewelry Trends 2025', 'diamond-jewelry-trends-2025', 'Discover an alternative perspective on 2024\'s diamond jewelry trends at Vajra Jewels. Dive into the nuances that make each trend unique and influential.', 'Emily Johnson', '16', 'Stay ahead with Vajra Jewels\' take on 2024\'s diamond jewelry trends. Uncover the designs and innovations set to redefine luxury.\r\n\r\nIn 2024, diamond jewelry is evolving with contemporary aesthetics and sustainable practices. Vajra Jewels presents an insightful look at emerging trends—from streamlined designs to bold artistic statements. Discover how traditional craftsmanship is merged with modern innovation to create pieces that are both timeless and cutting-edge.', '[\"Vajra Jewels\"]', 10, '2025-09-18 17:24:42', '2025-09-18 17:24:42'),
(6, 'blogs/RWmAenPEp7AQp1bNE9lgV2y4WYO1ZNh5hQOCs7GA.webp', 'Diamond Jewely Trends 2024', 'diamond-jewely-trends-2024', 'Experience another facet of 2024\'s diamond jewelry trends, uniquely curated by Vajra Jewels to inspire your personal style.', 'Emily Johnson', '7', 'Stay ahead with Vajra Jewels\' take on 2024\'s diamond jewelry trends. Uncover the designs and innovations set to redefine luxury.\r\n\r\nIn 2024, diamond jewelry is evolving with contemporary aesthetics and sustainable practices. Vajra Jewels presents an insightful look at emerging trends—from streamlined designs to bold artistic statements. Discover how traditional craftsmanship is merged with modern innovation to create pieces that are both timeless and cutting-edge.', '[\"jewelry\",\"innovation\",\"diamond\",\"Vajra Jewels\"]', 13, '2025-09-18 17:26:42', '2025-09-18 17:26:42'),
(7, 'blogs/itXQxBzdLuudadey8yoknvGyhOSxoSlX87vb81yJ.webp', 'Diamond Jewelry Trend 2025', 'diamond-jewelry-trend-2025', 'Delve into an in-depth analysis of 2024\'s diamond jewelry trends as interpreted by the experts at Vajra Jewels, offering a comprehensive overview of market evolution.', 'Emily Johnson', '12', 'Stay ahead with Vajra Jewels\' take on 2024\'s diamond jewelry trends. Uncover the designs and innovations set to redefine luxury.\r\n\r\nIn 2024, diamond jewelry is evolving with contemporary aesthetics and sustainable practices. Vajra Jewels presents an insightful look at emerging trends—from streamlined designs to bold artistic statements. Discover how traditional craftsmanship is merged with modern innovation to create pieces that are both timeless and cutting-edge.', '[\"innovation\",\"jewelry\",\"trends\"]', 13, '2025-09-18 17:28:49', '2025-09-18 17:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `amount` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `has_in_nav` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `title`, `created_at`, `updated_at`, `has_in_nav`) VALUES
(6, 'categories/wDWvzwNckEaaXgMkwoKtKMN8Z7JhTt2N87SYEbnZ.webp', 'bracelets', '2025-09-05 13:13:06', '2025-09-15 13:32:27', 1),
(10, 'categories/Rns07WuWCldcOaZQwgrdD2JtYhnCjV6JJO26g5Zw.webp', 'bangles', '2025-09-16 15:40:03', '2025-09-18 12:12:37', 1),
(11, 'categories/fS3kj3S9L22XsE5Yls0d8LgNwgsmT8Tlr0DLSMa7.webp', 'rings', '2025-09-16 15:41:19', '2025-09-18 12:12:47', 1),
(12, 'categories/h9xB17Zd0sWjoZEtM1PHNe5VxHl9nziZDinY6nSw.webp', 'necklaces', '2025-09-16 15:41:58', '2025-09-18 12:12:51', 1),
(13, 'categories/9Le9kq0g5PVF7tqwh1e2R32XHpobQ3Wo6dB2p9pI.webp', 'earrings', '2025-09-16 15:42:45', '2025-09-16 15:42:45', 0),
(14, 'categories/NnSIobZwRAKgLNhFTf3RhpfyFZdPNjtyrTW0J6Rz.webp', 'pendant', '2025-09-16 15:43:25', '2025-09-16 15:43:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE `layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `yt_link` varchar(255) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `insta_link` varchar(255) DEFAULT NULL,
  `x_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `thread_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layouts`
--

INSERT INTO `layouts` (`id`, `number`, `email`, `address`, `logo`, `created_at`, `updated_at`, `yt_link`, `fb_link`, `insta_link`, `x_link`, `linkedin_link`, `thread_link`) VALUES
(1, '+91 94483 87231', 'info@vajrajewels.com', '#144 KGA Road Domlur layout,Banglore,560071 India', 'logos/CtIBLBEQiHaK3E1euYXirmiulYRislGhcU0tgdAi.png', NULL, '2025-09-18 13:51:28', 'https://www.youtube.com/', 'https://www.facebook.com/help/668969529866328/', 'https://www.instagram.com/', 'https://x.com/login?lang=sr', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_28_175017_create_personal_access_tokens_table', 2),
(5, '2025_08_28_195258_create_categories_table', 3),
(6, '2025_08_28_210528_create_products_table', 4),
(7, '2025_09_01_222645_create_siteusers_table', 5),
(8, '2025_09_02_163450_create_addresses_table', 6),
(9, '2025_09_03_164809_create_banners_table', 7),
(10, '2025_09_03_212659_create_blogs_table', 8),
(11, '2025_09_05_193153_create_testimonials_table', 9),
(12, '2025_09_05_212021_create_carts_table', 10),
(15, '2025_09_06_174608_create_addresses_table', 11),
(16, '2025_09_08_170047_create_oders_table', 12),
(17, '2025_09_08_172101_create_order_items_table', 13),
(18, '2025_09_11_222623_create_layouts_table', 14),
(19, '2025_09_15_184432_addtags', 15),
(20, '2025_09_15_184847_addin_jew', 16),
(23, '2025_09_18_190924_addlinks', 17),
(24, '2025_09_19_171423_returnorder', 18);

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE `oders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `final_amount` decimal(10,2) NOT NULL,
  `payment_method` enum('cod','razorpay') NOT NULL DEFAULT 'cod',
  `payment_status` enum('pending','paid','failed','refunded') NOT NULL DEFAULT 'pending',
  `status` enum('pending','processing','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleverd_date` datetime DEFAULT NULL,
  `isreturn` tinyint(1) DEFAULT NULL,
  `whyreturn` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`id`, `user_id`, `total_amount`, `discount`, `final_amount`, `payment_method`, `payment_status`, `status`, `address_id`, `tracking_number`, `created_at`, `updated_at`, `deleverd_date`, `isreturn`, `whyreturn`) VALUES
(13, 10, 110000.00, 0.00, 110000.00, 'cod', 'paid', 'pending', 4, NULL, '2025-09-17 12:12:00', '2025-09-17 12:15:13', NULL, NULL, NULL),
(14, 11, 110000.00, 0.00, 110000.00, 'cod', 'paid', 'pending', 5, 'sdfsdf', '2025-09-18 12:33:08', '2025-09-19 11:54:00', NULL, NULL, NULL),
(15, 11, 76000.00, 0.00, 76000.00, 'cod', 'pending', 'pending', 5, NULL, '2025-09-18 12:56:27', '2025-09-18 12:56:27', NULL, NULL, NULL),
(16, 11, 220000.00, 0.00, 220000.00, 'cod', 'pending', 'pending', 7, NULL, '2025-09-18 12:58:36', '2025-09-18 12:58:36', NULL, NULL, NULL),
(17, 11, 30000.00, 0.00, 30000.00, 'cod', 'pending', 'pending', 5, NULL, '2025-09-18 13:15:02', '2025-09-18 13:15:02', NULL, NULL, NULL),
(18, 11, 110000.00, 0.00, 110000.00, 'cod', 'pending', 'delivered', 5, NULL, '2025-09-19 11:33:52', '2025-09-19 17:26:40', '2025-09-19 23:56:40', NULL, NULL),
(19, 11, 110000.00, 0.00, 110000.00, 'cod', 'pending', 'processing', 5, 'kerj04384743', '2025-09-21 16:13:25', '2025-09-21 16:14:26', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total`, `created_at`, `updated_at`) VALUES
(14, 13, 13, 2, 55000.00, 110000.00, '2025-09-17 12:12:00', '2025-09-17 12:12:00'),
(15, 14, 13, 2, 55000.00, 110000.00, '2025-09-18 12:33:08', '2025-09-18 12:33:08'),
(16, 15, 14, 2, 38000.00, 76000.00, '2025-09-18 12:56:27', '2025-09-18 12:56:27'),
(17, 16, 13, 4, 55000.00, 220000.00, '2025-09-18 12:58:36', '2025-09-18 12:58:36'),
(18, 17, 11, 2, 15000.00, 30000.00, '2025-09-18 13:15:02', '2025-09-18 13:15:02'),
(19, 18, 13, 2, 55000.00, 110000.00, '2025-09-19 11:33:52', '2025-09-19 11:33:52'),
(20, 19, 13, 2, 55000.00, 110000.00, '2025-09-21 16:13:25', '2025-09-21 16:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Siteuser', 3, 'auth_token', '94e0a21f5dc4fcb5c2573d1add2fdeb451e7407762787fbcb51cb724f612d69d', '[\"*\"]', NULL, NULL, '2025-09-02 12:01:29', '2025-09-02 12:01:29'),
(2, 'App\\Models\\Siteuser', 4, 'auth_token', '08bad04d1c7138759c930668bbc06d2d643dc7550db775da37b6e98ec438e328', '[\"*\"]', NULL, NULL, '2025-09-02 12:08:55', '2025-09-02 12:08:55'),
(3, 'App\\Models\\Siteuser', 5, 'auth_token', '295109231c2557ed8a197cccd7e69f76a20275bdad8008fbc11b4ed9bcc5f664', '[\"*\"]', NULL, NULL, '2025-09-02 12:18:49', '2025-09-02 12:18:49'),
(4, 'App\\Models\\Siteuser', 6, 'auth_token', '1d5240d0460b91000a96cef65797ef4f46e4d48cd7842c39b6b1508e935a3683', '[\"*\"]', NULL, NULL, '2025-09-02 12:39:03', '2025-09-02 12:39:03'),
(5, 'App\\Models\\Siteuser', 7, 'auth_token', '122a7fab06111603bb6c142e1467c529b3db7a042a88d6a439d427a4f68ebf2f', '[\"*\"]', NULL, NULL, '2025-09-02 12:40:19', '2025-09-02 12:40:19'),
(6, 'App\\Models\\Siteuser', 8, 'auth_token', '4ea11a11d27e238234b3d77434b7eb7698630d418b27d37127f38ccf1d7310d5', '[\"*\"]', NULL, NULL, '2025-09-02 12:42:09', '2025-09-02 12:42:09'),
(7, 'App\\Models\\Siteuser', 8, 'auth_token', '8d67932721926ae3dd0b1bd9d4de3129a9f319eed4eb58421408e38bf9079043', '[\"*\"]', NULL, NULL, '2025-09-02 12:56:59', '2025-09-02 12:56:59'),
(8, 'App\\Models\\Siteuser', 8, 'auth_token', '3ddcb743968258e8c4afeaeaba68e8b087ff4790129a70275b4425f7cdd5d78e', '[\"*\"]', NULL, NULL, '2025-09-02 12:57:22', '2025-09-02 12:57:22'),
(9, 'App\\Models\\Siteuser', 8, 'auth_token', '5a3cce092221260587c6ffd6ab4bb906f10384ffee6a27bfdefc56c0b99dc2ee', '[\"*\"]', NULL, NULL, '2025-09-02 12:57:45', '2025-09-02 12:57:45'),
(10, 'App\\Models\\Siteuser', 8, 'auth_token', 'd8bafcea8fdb0f340bbbf9c81a0c4d7d077e760bbebadee9a3287674cec009ce', '[\"*\"]', NULL, NULL, '2025-09-02 12:59:13', '2025-09-02 12:59:13'),
(11, 'App\\Models\\Siteuser', 9, 'auth_token', '725d8773085e1cfd40b9982410d6ee370acc35f94c63b72d64e66591cf6dcf11', '[\"*\"]', NULL, NULL, '2025-09-02 16:13:27', '2025-09-02 16:13:27'),
(12, 'App\\Models\\Siteuser', 10, 'auth_token', 'e8d24f33b01e95904547e776bcf386c8387e73f189aec8162a40e86db17a564a', '[\"*\"]', NULL, NULL, '2025-09-02 16:17:04', '2025-09-02 16:17:04'),
(13, 'App\\Models\\Siteuser', 11, 'auth_token', '3f43fa7b4337826a09bce360870f112f19db5c92ca20d34efdd8dbd68232ac2b', '[\"*\"]', NULL, NULL, '2025-09-08 12:28:41', '2025-09-08 12:28:41'),
(14, 'App\\Models\\Siteuser', 11, 'auth_token', 'bcb032018b253d4f62d59eb217a4d5e0d838061cf2ac084c92fa0e3e65959f08', '[\"*\"]', NULL, NULL, '2025-09-11 11:12:46', '2025-09-11 11:12:46'),
(15, 'App\\Models\\Siteuser', 11, 'auth_token', '9debb7fecd76fd4cee6a53cfe1ff082ce1ffa90c9b4faf7f299281e252b14cf1', '[\"*\"]', NULL, NULL, '2025-09-12 12:06:58', '2025-09-12 12:06:58'),
(16, 'App\\Models\\Siteuser', 11, 'auth_token', '67cf8eec6dec46a1967b73c8e4788dce7c5e18baad87c57f010361ea27a2b1ba', '[\"*\"]', NULL, NULL, '2025-09-12 12:48:58', '2025-09-12 12:48:58'),
(17, 'App\\Models\\Siteuser', 10, 'auth_token', '4cc8273e50f70af6c7ea00fe532851a0fafe0adef17faf490ac5e72dbd22ee62', '[\"*\"]', NULL, NULL, '2025-09-16 15:31:58', '2025-09-16 15:31:58'),
(18, 'App\\Models\\Siteuser', 11, 'auth_token', '1fc34413b13ab3dc177483d65e2fb3011c8783726087b7e11e43e93f58939e6a', '[\"*\"]', NULL, NULL, '2025-09-18 12:28:37', '2025-09-18 12:28:37'),
(19, 'App\\Models\\Siteuser', 11, 'auth_token', 'e71b1655fb3f3029ab9584e2e2c31f9c0dc49b606a4d525fc30c48634bf88297', '[\"*\"]', NULL, NULL, '2025-09-18 12:31:34', '2025-09-18 12:31:34'),
(20, 'App\\Models\\Siteuser', 11, 'auth_token', '4bae3b32f79fbabb9007026b0d357d82727f7cebad8785f4a69cff880d145457', '[\"*\"]', NULL, NULL, '2025-09-18 12:55:27', '2025-09-18 12:55:27'),
(21, 'App\\Models\\Siteuser', 11, 'auth_token', '71760ff93a1f8b5c98757c64e1c2a770a4cd58b5b27b483532cc1e346445fcf6', '[\"*\"]', NULL, NULL, '2025-09-19 11:32:56', '2025-09-19 11:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `old_price` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `innerimages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`innerimages`)),
  `description` text NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`details`)),
  `return_policy` text DEFAULT NULL,
  `shipping` text DEFAULT NULL,
  `total_sale_count` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `type` enum('all','male','female','kids','baby') NOT NULL DEFAULT 'all',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_des` varchar(255) DEFAULT NULL,
  `produty_nav_type` enum('jewellery','engagement','gifting') DEFAULT NULL,
  `product_for` enum('him','her') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `img1`, `img2`, `old_price`, `price`, `innerimages`, `description`, `details`, `return_policy`, `shipping`, `total_sale_count`, `status`, `type`, `category_id`, `created_at`, `updated_at`, `meta_title`, `meta_des`, `produty_nav_type`, `product_for`) VALUES
(5, 'Elegant Gold Ring with a Stunning Design, Perfect for Special Occasions', 'elegant-gold-ring-with-a-stunning-design-perfect-for-special-occasions', 'products/bEyPpTJq4fgHEoLbTYgnY18nnbOpkUlrOgZU3jfk.webp', 'products/gWvZUYEXaPDLxkZYA7ugdlQc9NyChJq4HBp5JZCP.webp', '45624', '45224', '[\"products\\/gallery\\/RbOFYvttr1YYBxvSMT2dxtjwBsL2zxDg3q9rjF4a.webp\",\"products\\/gallery\\/vfQzmIfHFxTUP2upeTdoAoJq2P01eVq1WYMkLwKC.webp\",\"products\\/gallery\\/UMksgNqKgqX8KYZ4SnwOQtdYUzmYN8S1fuMPhtKZ.webp\",\"products\\/gallery\\/zO4Zo87ZtvNOLAPTORVIAQJzRgoAB24ilDh0t8D7.webp\"]', '<p>The gold ornaments have a sentimental value from many generations. Wearing gold ornaments is a matter of pride and comfort. The ornament is finely handcrafted by expert goldsmiths with a diamond setting on gold.</p>', '[\"Item Width: 6.37 cm\",\"Model No: AJYP1830690096\",\"Gross Weight: 12.108 grams\",\"Total Metal Weight: 10.66 grams\",\"Jewelry Size: 2.6\",\"Gender: Women\",\"Certificate: BIS Certified\",\"Metal Purity: 916\",\"Metal: Yellow Gold\",\"Item Height: 10.12 cm\"]', 'You may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error.\r\n\r\nYou may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.).\r\n\r\n\r\nYou should expect to receive your refund within four weeks of giving your package to the return shipper, however, in many cases you will receive a refund more quickly. This time period includes the transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to process our refund request (5 to 10 business days).\r\n\r\n\r\nIf you need to return an item, simply login to your account, view the order using the \'Complete Orders\' link under the My Account menu and click the Return Item(s) button. We\'ll notify you via e-mail of your refund once we\'ve received and processed the returned item.', 'We can ship to virtually any address worldwide, though some restrictions apply. Shipping and delivery estimates are provided at checkout based on item availability and your selected shipping option.', 0, 1, 'female', 11, '2025-09-16 15:50:49', '2025-09-16 15:52:33', 'Elegant Gold Ring with a Stunning Design, Perfect for Special Occasions', 'The gold ornaments have a sentimental value from many generations. Wearing gold ornaments is a matter of pride and comfort. The ornament is finely handcrafted by expert goldsmiths with a diamond setting on gold.', 'jewellery', 'her'),
(6, 'Diamond Ring Crafted with Precision, Offering a Luxurious Look', 'diamond-ring-crafted-with-precision-offering-a-luxurious-look', 'products/d4r6eg0h8XuO7SbbCK5WMwaUH2SEtKKzeCphmWk5.webp', 'products/OJokcmI8uXwzil68b6yBf2MKSt7ogIFXKD9YzrqK.webp', '38900', '38500', '[\"products\\/gallery\\/r2CQAFcXyrXXY23Gnd0N6x2OZw5WhYw5o7ne1fWE.webp\",\"products\\/gallery\\/yUOYxkyy2DYJqU3sJX3OEuW00HfgLBATPTrBfHwG.webp\",\"products\\/gallery\\/eX0io4kkQvV00ukxTwNuXVrVXsKC42ulSh4GdbNS.webp\",\"products\\/gallery\\/3E5VEWZRrTJilNj6rrRb3aVNohZlzqulUynh9jSg.webp\"]', '<p>The gold ornaments have a sentimental value from many generations. Wearing gold ornaments is a matter of pride and comfort. The ornament is finely handcrafted by expert goldsmiths with a diamond setting on gold.</p>', '[\"Item Width: 6.37 cm\",\"Model No: AJYP1830690096\",\"Gross Weight: 12.108 grams\",\"Total Metal Weight: 10.66 grams\",\"Jewelry Size: 2.6\",\"Gender: Women\",\"Certificate: BIS Certified\",\"Metal Purity: 916\",\"Metal: Yellow Gold\",\"Item Height: 10.12 cm\"]', 'You may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error.\n\nYou may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.).\n\n\nYou should expect to receive your refund within four weeks of giving your package to the return shipper, however, in many cases you will receive a refund more quickly. This time period includes the transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to process our refund request (5 to 10 business days).\n\n\nIf you need to return an item, simply login to your account, view the order using the \'Complete Orders\' link under the My Account menu and click the Return Item(s) button. We\'ll notify you via e-mail of your refund once we\'ve received and processed the returned item.', 'We can ship to virtually any address worldwide, though some restrictions apply. Shipping and delivery estimates are provided at checkout based on item availability and your selected shipping option.', 0, 1, 'all', 11, '2025-09-16 15:56:52', '2025-09-16 16:03:54', 'Diamond Ring Crafted with Precision, Offering a Luxurious Look', 'The gold ornaments have a sentimental value from many generations. Wearing gold ornaments is a matter of pride and comfort. The ornament is finely handcrafted by expert goldsmiths with a diamond setting on gold.', 'engagement', 'her'),
(11, 'Silver Band Ring with a Minimalist Yet Classy Appeal for Everyday Wear', 'silver-band-ring-with-a-minimalist-yet-classy-appeal-for-everyday-wear', 'products/hbdbbHy8hKwdCq8iAyfuk3X6P5h7TjaD6yXpdBGy.webp', 'products/JtjRt90ebwtWIRHzFEQFaPmOjKDPohutO329tNBa.webp', '15400', '15000', '[\"products\\/gallery\\/i9oh6XrkaS8xIyQHA1KDSwvKxFiQMIq09z2gHTb4.webp\",\"products\\/gallery\\/D3SgFwUr8489mdHPEhUQINqMDZPG8ub7XuaWC6JV.webp\",\"products\\/gallery\\/gVKPbfIBzvPP2lFagPAilHRJXDdCgvfXJu3Nmvwe.webp\",\"products\\/gallery\\/WRlNTzq9OENkP8wMaCi8aEF75J8Lv4kOWhbszgJc.webp\"]', '<p>The gold ornaments have a sentimental value from many generations. Wearing gold ornaments is a matter of pride and comfort. The ornament is finely handcrafted by expert goldsmiths with a diamond setting on gold.</p>', '[\"Item Width: 6.37 cm\",\"Model No: AJYP1830690096\",\"Gross Weight: 12.108 grams\",\"Total Metal Weight: 10.66 grams\",\"Jewelry Size: 2.6\",\"Gender: Women\",\"Certificate: BIS Certified\",\"Metal Purity: 916\",\"Metal: Yellow Gold\",\"Item Height: 10.12 cm\"]', 'You may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error.\n\nYou may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.).\n\n\nYou should expect to receive your refund within four weeks of giving your package to the return shipper, however, in many cases you will receive a refund more quickly. This time period includes the transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to process our refund request (5 to 10 business days).\n\n\nIf you need to return an item, simply login to your account, view the order using the \'Complete Orders\' link under the My Account menu and click the Return Item(s) button. We\'ll notify you via e-mail of your refund once we\'ve received and processed the returned item.', 'We can ship to virtually any address worldwide, though some restrictions apply. Shipping and delivery estimates are provided at checkout based on item availability and your selected shipping option.', 1, 1, 'all', 11, '2025-09-16 16:50:55', '2025-09-18 13:15:02', 'Silver Band Ring with a Minimalist Yet Classy Appeal for Everyday Wear', 'Silver Band Ring with a Minimalist Yet Classy Appeal for Everyday Wear', 'jewellery', 'him'),
(12, 'Gold Plated Ring with a Unique and Timeless Design', 'gold-plated-ring-with-a-unique-and-timeless-design', 'products/TDAYSsCodFKbMqsxcV0yvIHiDn9UR9IgHIsDGjci.webp', 'products/sgMniG3yNkrdhOMgWZ3INEpLetAbycwhjdr8v8HW.webp', '32400', '32000', '[\"products\\/gallery\\/iGvWTZ8hfe8yRH7qxc8uwh0dD8b7dOZSPG7FSmPm.webp\",\"products\\/gallery\\/rtiuupmgzrgtOn8badkIubBob6tMj4YS4vVqO0eu.webp\",\"products\\/gallery\\/3L6gSEHaBY9vkV0gsTtBMEwXQzGN3p4yovHyFJ4Z.webp\"]', '<p>The gold ornaments have a sentimental value from many generations. Wearing gold ornaments is a matter of pride and comfort. The ornament is finely handcrafted by expert goldsmiths with a diamond setting on gold.</p>', '[\"Item Width: 6.37 cm\",\"Model No: AJYP1830690096\",\"Gross Weight: 12.108 grams\",\"Total Metal Weight: 10.66 grams\",\"Jewelry Size: 2.6\",\"Gender: Women\",\"Certificate: BIS Certified\",\"Metal Purity: 916\",\"Metal: Yellow Gold\",\"Item Height: 10.12 cm\"]', 'You may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error.\n\nYou may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.).\n\n\nYou should expect to receive your refund within four weeks of giving your package to the return shipper, however, in many cases you will receive a refund more quickly. This time period includes the transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to process our refund request (5 to 10 business days).\n\n\nIf you need to return an item, simply login to your account, view the order using the \'Complete Orders\' link under the My Account menu and click the Return Item(s) button. We\'ll notify you via e-mail of your refund once we\'ve received and processed the returned item.', 'We can ship to virtually any address worldwide, though some restrictions apply. Shipping and delivery estimates are provided at checkout based on item availability and your selected shipping option.', 0, 1, 'kids', 11, '2025-09-16 16:52:56', '2025-09-16 16:52:56', 'Gold Plated Ring with a Unique and Timeless Design', 'Gold Plated Ring with a Unique and Timeless Design', 'jewellery', 'him'),
(13, 'Diamond Bracelet with Exquisite Detailing for an Elegant Look', 'diamond-bracelet-with-exquisite-detailing-for-an-elegant-look', 'products/W8huudTc8Ofghyb54wMRx9f2CIBqmQ2L54ddlbhu.webp', 'products/FB2SSY7eaZiN925AelsPwZrjoingBOjajJtBeTPf.webp', '55400', '55000', '[\"products\\/gallery\\/GhqeNVvcLs1QEnAC3cd89eP16X6T7ns6QQrbAgU1.webp\",\"products\\/gallery\\/rB6uOcU58IHbYmS1mIkfNmMt0U7W1PxorzEPFqfj.webp\",\"products\\/gallery\\/Jw0Y9DsT0LGEUwYCJJjReMAoZZNp5nI94PXgvaE8.webp\",\"products\\/gallery\\/l1XdKjZ0tWHpBx6QEvCB54eAfUmEyBuTK9ZURKGF.webp\"]', '<p>The gold ornaments have a sentimental value from many generations. Wearing gold ornaments is a matter of pride and comfort. The ornament is finely handcrafted by expert goldsmiths with a diamond setting on gold.</p>', '[\"Item Width: 6.37 cm\",\"Model No: AJYP1830690096\",\"Gross Weight: 12.108 grams\",\"Total Metal Weight: 10.66 grams\",\"Jewelry Size: 2.6\",\"Gender: Women\",\"Certificate: BIS Certified\",\"Metal Purity: 916\",\"Metal: Yellow Gold\",\"Item Height: 10.12 cm\"]', 'You may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error.\n\nYou may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.).\n\n\nYou should expect to receive your refund within four weeks of giving your package to the return shipper, however, in many cases you will receive a refund more quickly. This time period includes the transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to process our refund request (5 to 10 business days).\n\n\nIf you need to return an item, simply login to your account, view the order using the \'Complete Orders\' link under the My Account menu and click the Return Item(s) button. We\'ll notify you via e-mail of your refund once we\'ve received and processed the returned item.', 'We can ship to virtually any address worldwide, though some restrictions apply. Shipping and delivery estimates are provided at checkout based on item availability and your selected shipping option.', 2, 0, 'all', 6, '2025-09-16 16:55:53', '2025-09-21 16:13:25', 'Diamond Bracelet with Exquisite Detailing for an Elegant Look', 'Diamond Bracelet with Exquisite Detailing for an Elegant Look', 'jewellery', 'him'),
(14, 'Diamond Ring Crafted with Precision, Offering a Luxurious Looks', 'diamond-ring-crafted-with-precision-offering-a-luxurious-looks', 'products/TKtTEJNyOEqTb3BHU44QgXZ7s5Xd8efIBZIzhpdY.webp', 'products/coup7dH1Hwsyij5Y2HkqJwx2nh9CZaTc4Wc8jKFY.webp', '38900', '38000', '[\"products\\/gallery\\/IUTgEp5BxEhMeIkPLmvLcXrv01GdWwU81wdVGigw.webp\",\"products\\/gallery\\/3TtM7lkfq7Dqvpa4VmNVHH00zgr4UxjSRh6LTLG2.webp\",\"products\\/gallery\\/q5stnCFUQrvCFW3rPvos9hRLTkg97oI0dpHegkDu.webp\"]', '<p>The gold ornaments have a sentimental value from many generations. Wearing gold ornaments is a matter of pride and comfort. The ornament is finely handcrafted by expert goldsmiths with a diamond setting on gold.</p>', '[\"Item Width: 6.37 cm\",\"Model No: AJYP1830690096\",\"Gross Weight: 12.108 grams\",\"Total Metal Weight: 10.66 grams\",\"Jewelry Size: 2.6\",\"Gender: Women\",\"Certificate: BIS Certified\",\"Metal Purity: 916\",\"Metal: Yellow Gold\",\"Item Height: 10.12 cm\"]', 'You may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error.\r\n\r\nYou may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.).\r\n\r\n\r\nYou should expect to receive your refund within four weeks of giving your package to the return shipper, however, in many cases you will receive a refund more quickly. This time period includes the transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to process our refund request (5 to 10 business days).\r\n\r\n\r\nIf you need to return an item, simply login to your account, view the order using the \'Complete Orders\' link under the My Account menu and click the Return Item(s) button. We\'ll notify you via e-mail of your refund once we\'ve received and processed the returned item.', 'We can ship to virtually any address worldwide, though some restrictions apply. Shipping and delivery estimates are provided at checkout based on item availability and your selected shipping option.', 0, 1, 'male', 6, '2025-09-16 16:58:17', '2025-09-18 12:40:00', 'Diamond Ring Crafted with Precision, Offering a Luxurious Look', 'Diamond Ring Crafted with Precision, Offering a Luxurious Look', 'gifting', 'him'),
(15, 'Silver Band Ring with a Minimalist Yet Classy Appeal for Everyday Wear2', 'silver-band-ring-with-a-minimalist-yet-classy-appeal-for-everyday-wear2', 'products/Uh3QsSHv34Ys94qMPtBJ4unpPkERAZJea0bbEJkN.webp', 'products/THZ65UgDrh9aFNL5lgD0SCR9eyP3M4rWjkAX3Gst.webp', '15400', '15000', '[\"products\\/gallery\\/zUsBxHmEk4pXGX26P7VRGcOKM6GxcdvJigR85v5q.webp\",\"products\\/gallery\\/Yjyn8pwbaHPa7ZLAXsaYKe71ztQBgemTXKCh5LkP.webp\",\"products\\/gallery\\/muxOLdf6kZ4gDDul7OoT3A7guJPMoS7D4qN6kt2i.webp\",\"products\\/gallery\\/gfW1glSpC0WKJKT1c82qeXVEWgbPFlkXBlwRgibC.webp\"]', '<p>The gold ornaments have a sentimental value from many generations. Wearing gold ornaments is a matter of pride and comfort. The ornament is finely handcrafted by expert goldsmiths with a diamond setting on gold.</p>', '[\"Item Width: 6.37 cm\",\"Model No: AJYP1830690096\",\"Gross Weight: 12.108 grams\",\"Total Metal Weight: 10.66 grams\",\"Jewelry Size: 2.6\",\"Gender: Women\",\"Certificate: BIS Certified\",\"Metal Purity: 916\",\"Metal: Yellow Gold\",\"Item Height: 10.12 cm\"]', 'You may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error.\r\n\r\nYou may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.).\r\n\r\n\r\nYou should expect to receive your refund within four weeks of giving your package to the return shipper, however, in many cases you will receive a refund more quickly. This time period includes the transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to process our refund request (5 to 10 business days).\r\n\r\n\r\nIf you need to return an item, simply login to your account, view the order using the \'Complete Orders\' link under the My Account menu and click the Return Item(s) button. We\'ll notify you via e-mail of your refund once we\'ve received and processed the returned item.', 'We can ship to virtually any address worldwide, though some restrictions apply. Shipping and delivery estimates are provided at checkout based on item availability and your selected shipping option.', 0, 1, 'all', 6, '2025-09-16 17:00:14', '2025-09-18 12:39:26', 'Silver Band Ring with a Minimalist Yet Classy Appeal for Everyday Wear', 'Silver Band Ring with a Minimalist Yet Classy Appeal for Everyday Wear', 'gifting', 'her'),
(16, 'Gold Plated Ring with a Unique and Timeless Design2', 'gold-plated-ring-with-a-unique-and-timeless-design2', 'products/hnpmfQxJUqSem6694z5jL4rBS0n696uWrAyxZAna.webp', 'products/RXr9ylUNIxlNRlw43KQckRkxSe8gulIP5xBMdVVE.webp', '32400', '32000', '[\"products\\/gallery\\/gO4oFQb1OFLfNIQzFIVC0gJ5BQojJKkbcqP6TmWl.webp\",\"products\\/gallery\\/jbCRI2eiVufar3c7LsrAh1t8kp8ClP7gbqKRUY92.webp\",\"products\\/gallery\\/RAVjkShXpLnTgdlGWpSz1WBQ6PXgS4524cSJWwiz.webp\",\"products\\/gallery\\/wWXJPCqHDoiDYro0kcaxTeRaBCivqUelmTewIkz3.webp\"]', '<p>The gold ornaments have a sentimental value from many generations. Wearing gold ornaments is a matter of pride and comfort. The ornament is finely handcrafted by expert goldsmiths with a diamond setting on gold.</p>', '[\"Item Width: 6.37 cm\",\"Model No: AJYP1830690096\",\"Gross Weight: 12.108 grams\",\"Total Metal Weight: 10.66 grams\",\"Jewelry Size: 2.6\",\"Gender: Women\",\"Certificate: BIS Certified\",\"Metal Purity: 916\",\"Metal: Yellow Gold\",\"Item Height: 10.12 cm\"]', 'You may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error.\r\n\r\nYou may return most new, unopened items within 30 days of delivery for a full refund. We\'ll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.).\r\n\r\n\r\nYou should expect to receive your refund within four weeks of giving your package to the return shipper, however, in many cases you will receive a refund more quickly. This time period includes the transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to process our refund request (5 to 10 business days).\r\n\r\n\r\nIf you need to return an item, simply login to your account, view the order using the \'Complete Orders\' link under the My Account menu and click the Return Item(s) button. We\'ll notify you via e-mail of your refund once we\'ve received and processed the returned item.', 'We can ship to virtually any address worldwide, though some restrictions apply. Shipping and delivery estimates are provided at checkout based on item availability and your selected shipping option.', 0, 0, 'all', 6, '2025-09-16 17:02:20', '2025-09-18 12:38:40', 'Gold Plated Ring with a Unique and Timeless Design2', 'Gold Plated Ring with a Unique and Timeless Design2', 'engagement', 'her');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jtI22SXuZeUPopoLzsztMKgzKktSsVB6VsnLRvY5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNXZhSGZlVXg5cjFpYWQ0Nmx2YU9uQ3FNTmxaVENqZTk2eXBFa1AxOSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvb3JkZXJzLzIwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1758471267);

-- --------------------------------------------------------

--
-- Table structure for table `siteusers`
--

CREATE TABLE `siteusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siteusers`
--

INSERT INTO `siteusers` (`id`, `name`, `email`, `password`, `number`, `status`, `created_at`, `updated_at`) VALUES
(8, 'jonty', 'jonty@mail.com', '$2y$12$c7veKRYVXl3sxM28/wws7e/CvweDT5QLIG9ihp1nQGTGJmU0n8ZmW', NULL, 1, '2025-09-02 12:42:09', '2025-09-02 12:42:09'),
(9, 'jonty', 'jonty1@mail.com', '$2y$12$o3ZjpI9fFXe6M5J/9VlSF.BCvTX6IDdg1yXhrNeZp1Q2CSU5MEnO.', NULL, 0, '2025-09-02 16:13:27', '2025-09-02 16:13:27'),
(10, 'vivek', 'vivek@mail.com', '$2y$12$GBeuNlj.k01wCo6rGF74feuljx0dbE.wppWxV6B3u.x2Zvlh3sCWy', NULL, 0, '2025-09-02 16:17:04', '2025-09-02 16:17:04'),
(11, 'jonty', 'jontythakur68@gmail.com', '$2y$12$u.J1Jq.CjctvjSb9CokRqe5CLMAg/zntny0Nn9lhyZmhJRp4Y1q6C', NULL, 0, '2025-09-08 12:28:41', '2025-09-08 12:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `position`, `message`, `created_at`, `updated_at`) VALUES
(1, 'priya', 'testimonials/BNS3YHJAGdUDC1YOFKNIl25XSGmXnmBowEVr159i.webp', 'developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2025-09-05 14:12:47', '2025-09-05 14:12:47'),
(2, 'jonty', 'testimonials/OrCcejGlTgBYMvwOqWU0opKvcVk6UlG34dm6goTd.webp', 'Science Faculty', 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2025-09-05 14:20:03', '2025-09-05 14:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$12$6cmYR6rNj204oSEk9xm18.FtNLOSEqaujFpSNam2jmr.mD6jxwTs2', NULL, '2025-09-15 15:53:01', '2025-09-15 15:53:01'),
(2, 'jonty', 'admin1@mail.com', NULL, '$2y$12$xJRwPh/ke.LWM.l7OPA6D.GqprpWt9qYNWgAvmbaGyQNhnD26sd76', NULL, '2025-09-15 16:02:18', '2025-09-15 16:02:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_count_unique` (`count`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_title_unique` (`title`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_title_unique` (`title`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oders`
--
ALTER TABLE `oders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oders_user_id_foreign` (`user_id`),
  ADD KEY `oders_address_id_foreign` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_title_unique` (`title`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siteusers`
--
ALTER TABLE `siteusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siteusers_email_unique` (`email`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `oders`
--
ALTER TABLE `oders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `siteusers`
--
ALTER TABLE `siteusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `siteusers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `siteusers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `oders`
--
ALTER TABLE `oders`
  ADD CONSTRAINT `oders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `oders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `siteusers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `oders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
