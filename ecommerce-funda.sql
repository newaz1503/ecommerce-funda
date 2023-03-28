-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 03:11 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce-funda`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Fashion', 'fashion', 1, '2022-11-22 03:48:39', '2022-11-22 03:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(39, 1, 4, 1, '2023-01-13 21:13:41', '2023-01-13 21:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>visible, 0=>hidden',
  `popular` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>popular, 0=>not popular',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `popular`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 'fashion', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', '1667930212.jpg', 1, 1, 'fashion', 'fashion', 'fashion', '2022-11-08 11:56:52', '2022-11-08 11:56:52'),
(2, 'Computer', 'computer', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', '1667930361.jpg', 1, 1, 'computer', 'computer', 'computer', '2022-11-08 11:59:21', '2022-11-08 11:59:21'),
(3, 'Camera', 'camera', 'Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', '1667930412.jpg', 1, 1, 'camera', 'camera', 'camera', '2022-11-08 12:00:12', '2022-11-08 12:00:12'),
(4, 'Accessories', 'accessories', 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.', '1667930459.jpeg', 1, 1, 'accessories', 'accessories', 'accessories', '2022-11-08 12:00:59', '2022-11-08 12:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Black', '#000', 1, '2022-11-25 04:03:08', '2022-11-25 04:03:08'),
(2, 'gray', '#ebebeb', 1, '2022-12-02 10:12:08', '2022-12-02 10:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_29_034523_create_categories_table', 1),
(14, '2022_11_02_160006_create_brands_table', 2),
(15, '2022_11_03_154250_create_products_table', 2),
(16, '2022_11_03_173254_create_product_images_table', 2),
(17, '2022_11_06_172439_create_colors_table', 2),
(18, '2022_11_07_181553_create_product_colors_table', 2),
(19, '2022_11_15_191740_create_sliders_table', 2),
(20, '2022_12_09_033756_create_wishlists_table', 3),
(21, '2022_12_17_080049_create_carts_table', 4),
(22, '2022_12_23_173449_create_orders_table', 5),
(23, '2022_12_23_173644_create_order_details_table', 5),
(25, '2023_01_02_170507_create_settings_table', 6),
(26, '2023_01_11_170844_create_ratings_table', 7),
(27, '2023_01_14_033723_create_reviews_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pin_code`, `total_price`, `payment_method`, `payment_id`, `message`, `status`, `tracking_no`, `created_at`, `updated_at`) VALUES
(4, 1, 'Newaz Sharif', 'saikotkhan44@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'completed', 'newaz9ImRSpaIMx', '2023-01-03 09:26:02', '2022-12-31 04:08:08'),
(5, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newazMf9epEqo94', '2022-12-24 09:38:37', '2022-12-24 09:38:37'),
(6, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newaz5wyLIif0LP', '2023-02-03 09:39:22', '2022-12-24 09:39:22'),
(7, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newazbiN3K4YkHO', '2022-12-24 09:43:37', '2022-12-24 09:43:37'),
(8, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newaz7HEinXZ6cO', '2022-12-24 09:44:05', '2022-12-24 09:44:05'),
(9, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newazundwlVxnQw', '2022-12-24 09:44:19', '2022-12-24 09:44:19'),
(10, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newazory8MtBn4W', '2022-12-24 09:44:41', '2022-12-24 09:44:41'),
(11, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newaz5FU94tWbx5', '2022-12-24 09:45:42', '2022-12-24 09:45:42'),
(12, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newazUUKiqb5fLf', '2022-12-24 09:49:58', '2022-12-24 09:49:58'),
(13, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newaz5TkMmNpC9t', '2022-12-24 09:54:53', '2022-12-24 09:54:53'),
(14, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newazGnjsE2vCQh', '2022-12-24 09:55:58', '2022-12-24 09:55:58'),
(15, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newazy5CWOm0CMk', '2022-12-24 10:04:53', '2022-12-24 10:04:53'),
(16, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newazK1cIQVd8kB', '2022-12-25 10:05:01', '2022-12-25 10:05:01'),
(17, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newazuTtV5LL1OC', '2022-12-25 13:19:56', '2022-12-25 13:19:56'),
(18, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newaz5lJFXqfw25', '2022-12-25 13:40:06', '2022-12-25 13:40:06'),
(19, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newaz4PgKRhFo1V', '2022-12-25 13:41:16', '2022-12-25 13:41:16'),
(20, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newazd4eaLmtf3U', '2022-12-25 13:47:56', '2022-12-25 13:47:56'),
(21, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 21, 'Cash on Delivery', NULL, NULL, 'pending', 'newazClnzteO2ZB', '2022-12-25 13:58:03', '2022-12-25 13:58:03'),
(22, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 21, 'Cash on Delivery', NULL, NULL, 'pending', 'newazl5jievMplh', '2022-12-25 13:58:33', '2022-12-25 13:58:33'),
(23, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 21, 'Cash on Delivery', NULL, NULL, 'pending', 'newazruNtZdAtpT', '2022-12-25 13:58:49', '2022-12-25 13:58:49'),
(24, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 21, 'Cash on Delivery', NULL, NULL, 'pending', 'newazPS0LuCgZvV', '2022-12-25 13:59:35', '2022-12-25 13:59:35'),
(25, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 22, 'Cash on Delivery', NULL, NULL, 'in progress', 'newazKQzN7AJ2EI', '2022-12-25 14:00:34', '2022-12-25 14:00:34'),
(26, 2, 'Raju Ahemd', 'raju@gmail.com', '0174138754432', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 15, 'Cash on Delivery', NULL, NULL, 'out of delivery', 'newazb2UA52btWY', '2022-12-26 12:11:34', '2022-12-31 05:15:19'),
(27, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 23, 'Cash on Delivery', NULL, NULL, 'out of delivery', 'newaz61a0Dbm6Tv', '2022-12-28 12:08:31', '2022-12-29 12:54:35'),
(28, 1, 'Admin', 'admin@gmail.com', '+8801741387544', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 22, 'Cash on Delivery', NULL, NULL, 'pending', 'newazHmAIkerFC1', '2022-12-31 22:47:32', '2022-12-31 22:47:32'),
(29, 1, 'Admin', 'admin@gmail.com', '+8801741387541', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 18200, 'Cash on Delivery', NULL, NULL, 'pending', 'newazXNBFQy3JPU', '2023-01-06 12:11:14', '2023-01-06 12:11:14'),
(30, 1, 'Admin', 'admin@gmail.com', '+8801741387541', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 14, 'Cash on Delivery', NULL, NULL, 'pending', 'newazfR2Pvzq1g0', '2023-01-13 10:50:56', '2023-01-13 10:50:56'),
(31, 1, 'Admin', 'admin@gmail.com', '+8801741387541', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 0, 'Cash on Delivery', NULL, NULL, 'pending', 'newazePw6UDlcfg', '2023-01-13 10:51:03', '2023-01-13 10:51:03'),
(32, 2, 'Raju Ahemd', 'raju@gmail.com', '0174138754432', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 14, 'Cash on Delivery', NULL, NULL, 'pending', 'newazh3cn90cvDN', '2023-01-14 09:11:30', '2023-01-14 09:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(27, 30, 3, 1, 14, '2023-01-13 10:50:57', '2023-01-13 10:50:57'),
(28, 32, 3, 1, 14, '2023-01-14 09:11:30', '2023-01-14 09:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=trending, 0=not trending',
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `status`, `trending`, `featured`, `tax`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Fashion', 'fashion', 'fbdfdf', 'dddfd', 10, 7, 10, 1, 1, 1, '242', 'fashion', 'Fashion', 'Fashion', '2022-11-25 04:04:30', '2022-12-26 12:11:34'),
(2, 2, 1, 'Smart Watch', 'smart-watch', 'fwfew wfwf eww', 'fewf wfwefew wefew', 20, 8, 9, 1, 1, 1, '15', 'watch', 'watch', 'watch', '2022-11-26 06:57:22', '2022-12-31 22:47:32'),
(3, 3, 1, 'Adidas', 'adidas', 'efrewfr  rferre', 'fwfw wwew wefeww', 20, 14, 3, 1, 1, 1, '21', 'adidas', 'adidas', 'adidas', '2022-11-26 06:59:06', '2023-01-14 09:11:30'),
(4, 2, 1, 'Hp Laptop', 'hp-laptop', 'feewf wefewf', 'wfewfw wefwfew', 4, 2, 8, 1, 1, 1, '21', 'hp laptop', 'hp laptop', 'hp laptop', '2022-11-26 07:01:26', '2022-12-24 09:23:35'),
(5, 3, 1, 'Canon Dslr Camera', 'canon-dslr-camera', 'gergre ergreg egre', 'wre ere errt rterer', 20000, 18000, 8, 1, 0, 1, '48', 'Canon', 'Canon', 'Canon', '2022-11-26 07:03:14', '2023-01-06 12:11:15'),
(6, 4, 1, 'Demo Product', 'demo-product', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.', 20, 15, 5, 1, 0, 1, '11', 'dummy meta', 'dummy keyword', 'dummy meta description', '2022-12-02 10:31:27', '2022-12-28 12:08:31'),
(7, 1, 1, 'multiple images product', 'multiple-images-product', 'lorem ipsum', 'lorem ipsum', 220, 200, 8, 1, 1, 1, '4', 'fashion', 'women, fashion', 'fashion', '2023-01-01 03:17:44', '2023-01-06 12:11:15'),
(8, 1, 1, 'demo product name', 'demo-product-name', 'kbkbbkb jgyhb jn', 'fui hjjlnf iygjn', 120, 100, 5, 1, 1, 1, '4', 'weew', 'weew', 'sdsds', '2023-01-01 04:07:13', '2023-01-01 04:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 22, '2022-11-26 06:59:07', '2022-11-26 06:59:07'),
(4, 4, 1, 2, '2022-11-26 07:01:26', '2022-11-26 07:01:26'),
(5, 5, 1, 2, '2022-11-26 07:03:14', '2022-11-26 07:03:14'),
(6, 6, 1, 2, '2022-12-02 10:31:28', '2022-12-02 10:31:28'),
(7, 6, 2, 3, '2022-12-02 10:31:28', '2022-12-02 10:31:28'),
(8, 7, 1, 4, '2023-01-01 03:17:44', '2023-01-01 03:17:44'),
(9, 7, 2, 7, '2023-01-01 03:17:45', '2023-01-01 03:17:45'),
(10, 8, 1, 8, '2023-01-01 04:07:14', '2023-01-01 04:07:14'),
(11, 8, 2, 9, '2023-01-01 04:07:14', '2023-01-01 04:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '16693706701.jpg', '2022-11-25 04:04:30', '2022-11-25 04:04:30'),
(2, 2, '16694674421.jpg', '2022-11-26 06:57:22', '2022-11-26 06:57:22'),
(3, 3, '16694675471.jpg', '2022-11-26 06:59:07', '2022-11-26 06:59:07'),
(4, 4, '16694676861.jpg', '2022-11-26 07:01:26', '2022-11-26 07:01:26'),
(5, 5, '16694677941.jpg', '2022-11-26 07:03:14', '2022-11-26 07:03:14'),
(6, 6, '16699986871.jpg', '2022-12-02 10:31:27', '2022-12-02 10:31:27'),
(7, 6, '16699986872.jpeg', '2022-12-02 10:31:27', '2022-12-02 10:31:27'),
(8, 6, '16699986883.jpg', '2022-12-02 10:31:28', '2022-12-02 10:31:28'),
(9, 7, '16725646641.jpg', '2023-01-01 03:17:44', '2023-01-01 03:17:44'),
(10, 7, '16725646642.jpg', '2023-01-01 03:17:44', '2023-01-01 03:17:44'),
(11, 7, '16725646643.jpg', '2023-01-01 03:17:44', '2023-01-01 03:17:44'),
(12, 7, '16725646644.png', '2023-01-01 03:17:44', '2023-01-01 03:17:44'),
(13, 7, '16725646645.jpg', '2023-01-01 03:17:44', '2023-01-01 03:17:44'),
(14, 7, '16725646646.jpg', '2023-01-01 03:17:44', '2023-01-01 03:17:44'),
(15, 7, '16725646647.jpg', '2023-01-01 03:17:44', '2023-01-01 03:17:44'),
(16, 8, '16725676331.jpg', '2023-01-01 04:07:13', '2023-01-01 04:07:13'),
(17, 8, '16725676342.jpg', '2023-01-01 04:07:14', '2023-01-01 04:07:14'),
(18, 8, '16725676343.jpg', '2023-01-01 04:07:14', '2023-01-01 04:07:14'),
(19, 8, '16725676344.jpg', '2023-01-01 04:07:14', '2023-01-01 04:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `star_rated` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `star_rated`, `created_at`, `updated_at`) VALUES
(4, 1, 3, 2, '2023-01-13 11:03:21', '2023-01-13 11:43:51'),
(5, 2, 3, 3, '2023-01-14 09:12:07', '2023-01-14 09:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Small Description: efrewfr rferre Small Description: efrewfr rferre Small Description: efrewfr rferre Small Description: efrewfr rferre Small Description: efrewfr rferre', '2023-01-14 03:37:08', '2023-01-14 03:37:08'),
(2, 2, 3, 'lorem lorem ipsum', '2023-01-14 09:12:26', '2023-01-14 09:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `page_title`, `meta_keyword`, `meta_description`, `address`, `phone1`, `phone2`, `email1`, `email2`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'eCom', 'http//www.ecommerce.com', 'Ecommerce', 'eCommerce', 'eCommerce', 'MIrpur-1216, Dhaka', '+88 01741387547', '+88 01743387547', 'saikotkhan44@gmail.com', 'newazcse1503@gmail.com', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', 'https://www.youtube.com', '2023-01-02 12:39:31', '2023-01-02 12:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'slider one', 'ewfewf', '1671525082.jpg', 1, '2022-12-20 02:31:22', '2022-12-20 02:31:22'),
(2, 'Slider Two', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '1671558625.jpg', 1, '2022-12-20 11:50:25', '2022-12-20 11:50:25'),
(3, 'Slider Three', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '1671558659.jpg', 1, '2022-12-20 11:50:59', '2022-12-20 11:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_as`, `name`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pin_code`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', '+8801741387541', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 'admin@gmail.com', NULL, '$2y$10$cU0PbUrguboxxu4BvaBn/.1gBot4dCxwmj1f.LA8EDk4xekdLBGAG', NULL, '2022-11-08 10:42:58', '2023-01-04 12:12:26'),
(2, 0, 'Raju Ahemd', '0174138754432', 'mirpur', 'Dhaka', 'Dhaka', 'Dhaka Division', 'Bangladesh', '1216', 'raju@gmail.com', NULL, '$2y$10$sKevvi7q2bXy5j/dXPMnFe5jgpz9l4b9XMenTZn7cdK03s4nJIa8S', NULL, '2022-11-18 13:10:53', '2022-12-26 12:11:34'),
(9, 0, 'md maw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maw@gmail.com', NULL, '$2y$10$2GXLQRDhiti65bilmxAfhunjj5NTl6Rw/jwMUHF9dl27Ri4Qi4OV2', NULL, '2023-01-08 12:20:07', '2023-01-08 12:47:20'),
(10, 0, 'jangir ttrtr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jangir@gmail.com', NULL, '$2y$10$/5kqsMLNnRKng5kDgxgbBuMq.Yzvo.vLRVFDWrdUspqwHQIDmY/ZK', NULL, '2023-01-08 12:33:02', '2023-01-08 12:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(17, 1, 3, '2023-01-09 10:54:18', '2023-01-09 10:54:18'),
(18, 1, 1, '2023-01-09 10:54:36', '2023-01-09 10:54:36'),
(19, 1, 5, '2023-01-09 11:09:00', '2023-01-09 11:09:00'),
(20, 2, 3, '2023-01-14 09:11:11', '2023-01-14 09:11:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD KEY `brands_category_id_foreign` (`category_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
