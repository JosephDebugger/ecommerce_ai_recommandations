-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 07:42 PM
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
  `current_balance` decimal(10,2) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bands`
--

INSERT INTO `bands` (`id`, `name`, `details`, `contact_email`, `contact_phone`, `band_logo`, `band_cover`, `current_balance`, `status`, `created_at`, `updated_at`) VALUES
(3, 'test1', NULL, NULL, '01829786918', NULL, NULL, 360.00, 'Active', '2024-08-19 19:07:33', '2024-12-06 17:50:25'),
(4, 'Warfaze', NULL, NULL, '01829786918', 'uploads/bands/1733058606.png', 'uploads/bands/1733058606.jpg', NULL, 'Active', '2024-12-01 13:10:06', '2024-12-01 13:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(550) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `file_name`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/banners/banner1.jpg', 'The Biggest Sale', 'Special for today', 'Active', '2024-12-01 15:48:30', '2024-12-01 15:48:30'),
(2, 'uploads/banners/banner2.jpg', 'Summer Collection', 'New Arrivals On Sale', 'Active', '2024-12-01 15:48:30', '2024-12-01 15:48:30'),
(3, 'uploads/banners/banner3.jpg', 'The Biggest Sale', 'Special for today', 'Active', '2024-12-01 15:49:14', '2024-12-01 15:49:14'),
(4, 'uploads/banners/banner4.jpg', 'Summer Collection', 'New Arrivals On Sale', 'Active', '2024-12-01 15:49:14', '2024-12-01 15:49:14');

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
(4, 'test44', 'test', 'Active', '2024-08-13 16:44:47', '2024-08-13 17:24:27'),
(5, 'Gucci', NULL, 'Active', '2024-11-28 07:36:33', '2024-11-28 07:36:33'),
(6, 'Nike', NULL, 'Active', '2024-11-28 07:36:42', '2024-11-28 07:36:42');

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
('admin@gmail.com|127.0.0.1', 'i:1;', 1734627340),
('admin@gmail.com|127.0.0.1:timer', 'i:1734627340;', 1734627340);

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
  `type` enum('male','female') DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test 1', 'male', 'test', 'Active', '2024-08-13 12:08:29', '2024-08-13 12:13:42'),
(4, 'category 1', 'male', NULL, 'Active', '2024-10-23 13:55:45', '2024-10-23 13:55:45'),
(5, 'category 2', 'male', NULL, 'Active', '2024-10-23 13:55:54', '2024-10-23 13:55:54'),
(6, 'category 3', 'male', NULL, 'Active', '2024-10-23 13:56:02', '2024-10-23 13:56:02'),
(7, 'category 4', 'male', NULL, 'Active', '2024-10-23 13:56:11', '2024-10-23 13:56:11'),
(8, 'category 5', 'male', NULL, 'Active', '2024-10-23 13:56:22', '2024-10-23 13:56:22'),
(9, 'category 6', 'male', NULL, 'Active', '2024-10-23 13:56:31', '2024-10-23 13:56:31'),
(10, 'category 7', 'male', NULL, 'Active', '2024-10-23 13:56:40', '2024-10-23 13:56:40'),
(11, 'category 8', 'male', NULL, 'Active', '2024-10-23 13:57:12', '2024-10-23 13:57:12'),
(12, 'female category 1', 'female', NULL, 'Active', '2024-12-01 07:07:14', '2024-12-01 07:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `user_id` int(20) NOT NULL,
  `admin_id` int(20) DEFAULT NULL,
  `type` enum('admin','user') DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `message`, `user_id`, `admin_id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 1, NULL, 'user', 'Active', '2024-12-08 12:02:28', '2024-12-08 12:02:28'),
(2, 'hello', 1, NULL, 'user', 'Active', '2024-12-08 12:09:32', '2024-12-08 12:09:32'),
(3, 'hi', 1, NULL, 'user', 'Active', '2024-12-08 12:10:52', '2024-12-08 12:10:52'),
(4, 'hi', 1, NULL, 'user', 'Active', '2024-12-08 12:11:34', '2024-12-08 12:11:34'),
(5, 'how are you?', 1, NULL, 'user', 'Active', '2024-12-08 12:14:25', '2024-12-08 12:14:25'),
(6, 'Need A help. about updating my profile', 2, NULL, 'user', 'Active', '2024-12-10 11:59:39', '2024-12-10 11:59:39'),
(7, 'What can I do for you about your profile?', 2, 2, 'admin', 'Active', '2024-12-10 13:13:26', '2024-12-10 13:13:26'),
(9, 'What About You?', 1, 2, 'admin', 'Active', '2024-12-10 13:45:36', '2024-12-10 13:45:36'),
(10, 'I didn\'t Received my product', 1, NULL, 'user', 'Active', '2024-12-11 11:25:55', '2024-12-11 11:25:55'),
(11, 'I already delevered Your product', 1, 2, 'admin', 'Active', '2024-12-11 11:28:08', '2024-12-11 11:28:08'),
(12, 'Please receive your product from given location', 1, 2, 'admin', 'Active', '2024-12-11 11:29:24', '2024-12-11 11:29:24');

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
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Joseph dias', 'name@gmail.com', 'subject', 'Mail goes to spam', '2024-12-01 06:02:20', '2024-12-01 06:02:20'),
(2, 'test', 'alitech@gmail.com', 'suject', 'hdhg', '2024-12-09 14:02:21', '2024-12-09 14:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` enum('general','band') NOT NULL DEFAULT 'general',
  `band_id` int(20) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `name_on_card` varchar(50) DEFAULT NULL,
  `cc_number` varchar(20) DEFAULT NULL,
  `exp` varchar(50) DEFAULT NULL,
  `exp_year` year(4) DEFAULT NULL,
  `cvv` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `user_name`, `image`, `email`, `email_verified_at`, `type`, `band_id`, `state`, `city`, `name_on_card`, `cc_number`, `exp`, `exp_year`, `cvv`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test1', 'uploads/users/1733510829_logo.jpg', 'test@gmail.com', NULL, 'band', 3, 'chattagram', 'Chittagong', '12123123', NULL, '2024-12', '2024', '123123', 'OR Nizam', '$2y$12$V/eFqfIveKY82rCicGM2nug38ep9DipRqUdpuc4u9TiMXI1Z7Wzte', NULL, '2024-10-25 11:09:44', '2024-12-06 12:47:09'),
(2, 'Md Tousif', 'md-tousif', NULL, 'tousif@gmail.com', NULL, 'general', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$.BEXwfhByZnQU.kxXruvuehsKOvtHAb4aLNIQXXU81vSHkgxxQ0w6', NULL, '2024-12-01 01:58:16', '2024-12-01 01:58:16');

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
(61, 74, 'uploads/images.png', NULL, 'Active', NULL, '2024-08-23 16:59:44', '2024-08-23 16:59:44'),
(62, 75, 'uploads/images.png', NULL, 'Active', NULL, '2024-10-22 16:34:30', '2024-10-22 16:34:30'),
(63, 1, 'uploads/products/1733050966.jpg', NULL, 'Active', NULL, '2024-11-14 16:51:52', '2024-12-01 11:02:46'),
(64, 2, 'uploads/products/1731721471.jpg', NULL, 'Active', NULL, '2024-11-16 01:44:31', '2024-11-16 01:44:31'),
(65, 3, 'uploads/products/1731776537.jpg', NULL, 'Active', NULL, '2024-11-16 17:02:17', '2024-11-16 17:02:17');

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
(4, '2024_08_13_165151_create_categories_table', 2),
(5, '2024_10_24_174517_create_customers_table', 3);

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
  `band_id` int(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `sub_category_id` bigint(20) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `featured` enum('Yes','No') NOT NULL DEFAULT 'No',
  `Tranding` enum('Yes','No') NOT NULL DEFAULT 'No',
  `name` varchar(100) NOT NULL,
  `price` int(20) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT 0.00,
  `description` varchar(400) DEFAULT NULL,
  `additional_info` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cloth_for`, `brand_id`, `band_id`, `category_id`, `sub_category_id`, `unit`, `featured`, `Tranding`, `name`, `price`, `status`, `image`, `discount`, `description`, `additional_info`, `created_at`, `updated_at`) VALUES
(1, 'male', 1, 3, 4, NULL, NULL, 'No', 'Yes', 'Polo Tshirt', 1000, 'Active', NULL, 100.00, NULL, NULL, '2024-11-14 10:51:52', '2024-12-01 11:02:46'),
(2, 'male', 1, NULL, 10, NULL, NULL, 'Yes', 'No', 'Cargo Pants Mens', 600, 'Active', NULL, NULL, NULL, NULL, '2024-11-15 19:44:31', '2024-12-01 10:41:04'),
(3, 'female', 2, NULL, 4, NULL, NULL, 'Yes', 'No', 'Black And Red Embroidered Linen Kurti', 1100, 'Active', NULL, NULL, NULL, 'Embrace the elegance and enhance your style with Women\'s Screen Printed with Hand Embroidered Linen Kurti by Grameen Check.', '2024-11-16 11:02:17', '2024-11-16 17:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_log`
--

CREATE TABLE `purchase_log` (
  `id` int(11) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `product_id` int(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 0,
  `rating` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `user_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '4', '2024-11-26 05:07:10', '2024-11-26 05:07:10'),
(2, 1, 1, '3', '2024-11-26 05:54:28', '2024-11-26 05:54:28'),
(3, 1, 1, '4', '2024-12-11 12:01:59', '2024-12-11 12:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `predicted_score` float NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `product_id` int(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `name`, `email`, `comment`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, 'Joseph', 'josephdias@gmail.com', 'testing review', '2024-12-07 00:52:05', '2024-12-07 00:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `sale_date` datetime NOT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `customer_id` bigint(20) NOT NULL,
  `payment_method` enum('Cash','Card','Online') DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `deleted` enum('No','Yes') NOT NULL DEFAULT 'No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `total_amount`, `customer_id`, `payment_method`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, '2024-11-19 00:00:00', 0.00, 1, 'Card', 'Received', 'No', '2024-11-19 11:50:34', '2024-12-11 11:23:16'),
(2, '2024-11-19 00:00:00', 0.00, 1, 'Card', 'Delivered', 'No', '2024-11-19 11:50:47', '2024-12-11 11:19:36'),
(3, '2024-11-19 00:00:00', 0.00, 1, 'Card', 'Received', 'No', '2024-11-19 11:50:50', '2024-12-11 11:21:10'),
(9, '2024-11-20 00:00:00', 0.00, 1, 'Card', 'Received', 'No', '2024-11-19 20:46:17', '2024-12-11 11:22:06'),
(10, '2024-11-20 00:00:00', 2400.00, 1, 'Card', 'Pending', 'No', '2024-11-19 21:01:55', '2024-11-19 21:01:55'),
(11, '2024-11-23 13:24:45', 600.00, 1, 'Card', 'Pending', 'No', '2024-11-23 07:24:45', '2024-11-23 07:24:45'),
(12, '2024-12-06 17:50:25', 3600.00, 1, 'Card', 'Pending', 'No', '2024-12-06 11:50:25', '2024-12-06 11:50:25'),
(13, '2024-12-09 19:51:36', 1700.00, 1, 'Card', 'Delivered', 'No', '2024-12-09 13:51:36', '2024-12-11 11:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL,
  `sales_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_unit` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `deleted` enum('Yes','No') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sales_id`, `product_id`, `quantity`, `price_per_unit`, `total_price`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 1, 1000.00, 1000.00, 'Yes', '2024-11-19 20:46:17', '2024-11-19 20:46:17'),
(2, 9, 2, 1, 600.00, 600.00, 'Yes', '2024-11-19 20:46:17', '2024-11-19 20:46:17'),
(3, 10, 1, 2, 900.00, 1800.00, 'Yes', '2024-11-20 03:01:55', '2024-11-20 03:01:55'),
(4, 10, 2, 1, 600.00, 600.00, 'Yes', '2024-11-20 03:01:55', '2024-11-20 03:01:55'),
(5, 11, 2, 1, 600.00, 600.00, 'Yes', '2024-11-23 13:24:45', '2024-11-23 13:24:45'),
(6, 12, 1, 4, 900.00, 3600.00, 'Yes', '2024-12-06 17:50:25', '2024-12-06 17:50:25'),
(7, 13, 2, 1, 600.00, 600.00, 'Yes', '2024-12-09 19:51:36', '2024-12-09 19:51:36'),
(8, 13, 3, 1, 1100.00, 1100.00, 'Yes', '2024-12-09 19:51:36', '2024-12-09 19:51:36');

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
('9vrjsA1PdclbMHzkNELty9HT9G59BcM6lneXKv9d', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYW5CQ3NiUWZPbVQxRGFSN1E5bTJBWEN0RVR0MUUwUkRWYU45UFNzRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NTU6ImxvZ2luX2N1c3RvbWVyXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1734627915);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `sub_cetegory_name` varchar(100) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `sub_cetegory_name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'sub_category_1', 2, '2024-10-22 22:57:36', '2024-10-22 22:57:36'),
(2, 'sub_category_2', 1, '2024-10-22 22:57:36', '2024-10-22 22:57:36'),
(3, 'sub_category_3', 2, '2024-10-22 22:57:52', '2024-10-22 22:57:52'),
(4, 'sub_category_4', 1, '2024-10-22 22:57:52', '2024-10-22 22:57:52');

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
(3, 'admin', 'admin@gmail.com', NULL, '$2y$12$FXifwjRJq4TBWei8Z7ZT1.6psItE9G6RuVcNcfAPKBVSxyXIYCbJu', NULL, '2024-12-19 11:01:19', '2024-12-19 11:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `product_id` int(20) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

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
-- Indexes for table `purchase_log`
--
ALTER TABLE `purchase_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recommendations_user_id_foreign` (`user_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bands`
--
ALTER TABLE `bands`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_log`
--
ALTER TABLE `purchase_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `recommendations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
