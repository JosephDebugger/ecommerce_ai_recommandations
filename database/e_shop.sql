-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 12:05 PM
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
-- Database: `e_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bands`
--

CREATE TABLE `bands` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(50) DEFAULT NULL,
  `band_logo` varchar(255) DEFAULT NULL,
  `band_cover` varchar(400) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bands`
--

INSERT INTO `bands` (`id`, `name`, `details`, `contact_email`, `contact_phone`, `band_logo`, `band_cover`, `status`, `created_at`, `updated_at`) VALUES
(3, 'test', NULL, NULL, '01829786918', NULL, NULL, 'Active', '2024-08-19 19:07:33', '2024-08-19 19:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(550) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', NULL, 'Active', '2024-08-13 03:33:43', '2024-08-13 03:33:43'),
(2, 'test2', NULL, 'Active', '2024-08-13 03:38:02', '2024-08-13 03:38:02'),
(3, 'test2334', 'hey', 'Active', '2024-08-13 16:43:17', '2024-08-13 16:48:45'),
(4, 'test44', 'test', 'Inactive', '2024-08-13 16:44:47', '2024-08-13 17:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('abc@gmail.com|127.0.0.1', 'i:2;', 1724097017),
('abc@gmail.com|127.0.0.1:timer', 'i:1724097017;', 1724097017);

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test 1', 'test', 'Active', '2024-08-13 12:08:29', '2024-08-13 12:13:42'),
(2, 'test 2', NULL, 'Active', '2024-08-13 12:12:51', '2024-08-13 12:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `alternative_phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logo` varchar(550) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `description`, `address`, `phone`, `alternative_phone`, `email`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Eshop', '', 'Agrabadh, Chittagong, Bangladesh', '01822828282', '', 'unfo@gmail.com', NULL, 'Active', '2024-08-20 23:42:36', '2024-08-20 23:42:36');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `type` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `name`, `details`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 14, 'uploads/products/1723604127.jpg', NULL, 'Active', NULL, '2024-08-14 02:55:27', '2024-08-14 02:55:27'),
(2, 15, 'uploads/products/1724418617.jpg', NULL, 'Active', NULL, '2024-08-23 13:10:18', '2024-08-23 13:10:18'),
(3, 16, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:57:29', '2024-08-23 16:57:29'),
(4, 17, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:57:57', '2024-08-23 16:57:57'),
(5, 18, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:58:26', '2024-08-23 16:58:26'),
(6, 19, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:58:33', '2024-08-23 16:58:33'),
(7, 20, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:03', '2024-08-23 16:59:03'),
(8, 21, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:05', '2024-08-23 16:59:05'),
(9, 22, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:07', '2024-08-23 16:59:07'),
(10, 23, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:09', '2024-08-23 16:59:09'),
(11, 24, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:11', '2024-08-23 16:59:11'),
(12, 25, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:12', '2024-08-23 16:59:12'),
(13, 26, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:13', '2024-08-23 16:59:13'),
(14, 27, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:13', '2024-08-23 16:59:13'),
(15, 28, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:14', '2024-08-23 16:59:14'),
(16, 29, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:14', '2024-08-23 16:59:14'),
(17, 30, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:15', '2024-08-23 16:59:15'),
(18, 31, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:16', '2024-08-23 16:59:16'),
(19, 32, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:16', '2024-08-23 16:59:16'),
(20, 33, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:17', '2024-08-23 16:59:17'),
(21, 34, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:18', '2024-08-23 16:59:18'),
(22, 35, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:18', '2024-08-23 16:59:18'),
(23, 36, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:19', '2024-08-23 16:59:19'),
(24, 37, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:20', '2024-08-23 16:59:20'),
(25, 38, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:20', '2024-08-23 16:59:20'),
(26, 39, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:21', '2024-08-23 16:59:21'),
(27, 40, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:22', '2024-08-23 16:59:22'),
(28, 41, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:22', '2024-08-23 16:59:22'),
(29, 42, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:23', '2024-08-23 16:59:23'),
(30, 43, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:24', '2024-08-23 16:59:24'),
(31, 44, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:24', '2024-08-23 16:59:24'),
(32, 45, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:25', '2024-08-23 16:59:25'),
(33, 46, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:26', '2024-08-23 16:59:26'),
(34, 47, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:26', '2024-08-23 16:59:26'),
(35, 48, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:27', '2024-08-23 16:59:27'),
(36, 49, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:28', '2024-08-23 16:59:28'),
(37, 50, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:29', '2024-08-23 16:59:29'),
(38, 51, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:29', '2024-08-23 16:59:29'),
(39, 52, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:30', '2024-08-23 16:59:30'),
(40, 53, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:31', '2024-08-23 16:59:31'),
(41, 54, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:31', '2024-08-23 16:59:31'),
(42, 55, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:32', '2024-08-23 16:59:32'),
(43, 56, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:32', '2024-08-23 16:59:32'),
(44, 57, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:33', '2024-08-23 16:59:33'),
(45, 58, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:34', '2024-08-23 16:59:34'),
(46, 59, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:34', '2024-08-23 16:59:34'),
(47, 60, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:35', '2024-08-23 16:59:35'),
(48, 61, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:35', '2024-08-23 16:59:35'),
(49, 62, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:36', '2024-08-23 16:59:36'),
(50, 63, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:37', '2024-08-23 16:59:37'),
(51, 64, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:37', '2024-08-23 16:59:37'),
(52, 65, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:38', '2024-08-23 16:59:38'),
(53, 66, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:38', '2024-08-23 16:59:38'),
(54, 67, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:39', '2024-08-23 16:59:39'),
(55, 68, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:40', '2024-08-23 16:59:40'),
(56, 69, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:40', '2024-08-23 16:59:40'),
(57, 70, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:41', '2024-08-23 16:59:41'),
(58, 71, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:41', '2024-08-23 16:59:41'),
(59, 72, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:43', '2024-08-23 16:59:43'),
(60, 73, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:44', '2024-08-23 16:59:44'),
(61, 74, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:44', '2024-08-23 16:59:44');

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
(4, '2024_08_13_165151_create_categories_table', 2);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `cloth_for` enum('male','female') DEFAULT NULL,
  `brand_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(20) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `discount` int(20) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `additional_info` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cloth_for`, `brand_id`, `category_id`, `unit`, `name`, `price`, `status`, `image`, `discount`, `description`, `additional_info`, `created_at`, `updated_at`) VALUES
(12, NULL, NULL, NULL, NULL, 'test', 300, 'Inactive', NULL, 100, NULL, NULL, '2024-08-03 11:57:48', '2024-08-28 20:16:58'),
(14, NULL, NULL, NULL, NULL, 'T-shirt', 1000, 'Active', NULL, 100, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever si.', NULL, '2024-08-13 20:55:27', '2024-08-14 02:55:27'),
(15, NULL, NULL, NULL, NULL, 'test', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 07:10:17', '2024-08-23 13:10:17'),
(16, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:57:29', '2024-08-23 16:57:29'),
(17, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:57:57', '2024-08-23 16:57:57'),
(18, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:58:26', '2024-08-23 16:58:26'),
(19, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:58:33', '2024-08-23 16:58:33'),
(20, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:03', '2024-08-23 16:59:03'),
(21, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:05', '2024-08-23 16:59:05'),
(22, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:07', '2024-08-23 16:59:07'),
(23, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:09', '2024-08-23 16:59:09'),
(24, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:11', '2024-08-23 16:59:11'),
(25, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:11', '2024-08-23 16:59:11'),
(26, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:12', '2024-08-23 16:59:12'),
(27, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:13', '2024-08-23 16:59:13'),
(28, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:14', '2024-08-23 16:59:14'),
(29, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:14', '2024-08-23 16:59:14'),
(30, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:15', '2024-08-23 16:59:15'),
(31, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:16', '2024-08-23 16:59:16'),
(32, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:16', '2024-08-23 16:59:16'),
(33, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:17', '2024-08-23 16:59:17'),
(34, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:17', '2024-08-23 16:59:17'),
(35, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:18', '2024-08-23 16:59:18'),
(36, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:19', '2024-08-23 16:59:19'),
(37, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:20', '2024-08-23 16:59:20'),
(38, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:20', '2024-08-23 16:59:20'),
(39, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:21', '2024-08-23 16:59:21'),
(40, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:21', '2024-08-23 16:59:21'),
(41, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:22', '2024-08-23 16:59:22'),
(42, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:23', '2024-08-23 16:59:23'),
(43, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:24', '2024-08-23 16:59:24'),
(44, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:24', '2024-08-23 16:59:24'),
(45, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:25', '2024-08-23 16:59:25'),
(46, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:25', '2024-08-23 16:59:25'),
(47, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:26', '2024-08-23 16:59:26'),
(48, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:27', '2024-08-23 16:59:27'),
(49, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:28', '2024-08-23 16:59:28'),
(50, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:29', '2024-08-23 16:59:29'),
(51, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:29', '2024-08-23 16:59:29'),
(52, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:30', '2024-08-23 16:59:30'),
(53, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:31', '2024-08-23 16:59:31'),
(54, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:31', '2024-08-23 16:59:31'),
(55, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:32', '2024-08-23 16:59:32'),
(56, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:32', '2024-08-23 16:59:32'),
(57, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:33', '2024-08-23 16:59:33'),
(58, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:34', '2024-08-23 16:59:34'),
(59, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:34', '2024-08-23 16:59:34'),
(60, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:35', '2024-08-23 16:59:35'),
(61, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:35', '2024-08-23 16:59:35'),
(62, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:36', '2024-08-23 16:59:36'),
(63, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:37', '2024-08-23 16:59:37'),
(64, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:37', '2024-08-23 16:59:37'),
(65, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:38', '2024-08-23 16:59:38'),
(66, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:38', '2024-08-23 16:59:38'),
(67, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:39', '2024-08-23 16:59:39'),
(68, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:39', '2024-08-23 16:59:39'),
(69, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:40', '2024-08-23 16:59:40'),
(70, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:41', '2024-08-23 16:59:41'),
(71, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:41', '2024-08-23 16:59:41'),
(72, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:43', '2024-08-23 16:59:43'),
(73, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:43', '2024-08-23 16:59:43'),
(74, NULL, NULL, NULL, NULL, 'test 3', 300, 'Active', NULL, 100, 'test', 'test', '2024-08-23 10:59:44', '2024-08-23 16:59:44');

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
('D3MoZsGAgUmcI0QCtkYN2DdczzmEPohIUVgQLGB4', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib1BmUkx3UVk2RzBUenBXdEVMWU03SVYyVkRmeE5YZTlDQXdjMERxcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC92aWV3LWFkZFByb2R1Y3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1726567458),
('RixK1UwDgZgNTVlrXkhy5gVikIIiKwiiztLK1tgd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFhENTAwMVBMZzhON0QxWnFYbnlWUEV0Zk9TNTRjTkVUUUowT3VXQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1726565376);

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
(1, 'User 1', 'example@gmail.com', NULL, '123456', NULL, NULL, NULL),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$12$p6yFy6sx4vFcRW9l/gE1v.4.rMl0R2Cqt61fHzf.rx5F3tQwYJbwW', NULL, '2024-08-19 10:45:37', '2024-08-19 10:45:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `bands`
--
ALTER TABLE `bands`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
