-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2023 at 12:18 PM
-- Server version: 8.0.33-0ubuntu0.20.04.1
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocarts`
--

CREATE TABLE `addtocarts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addtocarts`
--

INSERT INTO `addtocarts` (`id`, `user_id`, `product_id`, `quantity`, `product_price`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 11, '1', '55', '2', NULL, NULL, '2023-05-11 07:03:32', '2023-05-12 01:02:52'),
(2, 2, 8, '1', '27', '2', NULL, NULL, '2023-05-11 07:03:39', '2023-05-12 01:03:02'),
(3, 2, 9, '2', '13', '2', NULL, NULL, '2023-05-11 07:03:43', '2023-05-11 23:14:47'),
(4, 2, 10, '1', '110', '2', NULL, NULL, '2023-05-12 01:07:40', '2023-05-12 01:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'shoes', 0, '1', NULL, '2023-04-20 01:35:39', '2023-04-14 02:20:02', '2023-04-20 01:35:39'),
(2, 'Book', 0, '1', NULL, '2023-04-20 01:35:36', '2023-04-14 02:32:34', '2023-04-20 01:35:36'),
(3, 'Electronics', 0, '1', NULL, '2023-04-20 01:35:32', '2023-04-14 02:32:52', '2023-04-20 01:35:32'),
(4, 'watchhhhhh', 0, '1', NULL, '2023-04-19 00:55:59', '2023-04-14 06:57:06', '2023-04-19 00:55:59'),
(5, 'book', 0, '1', NULL, '2023-04-19 00:57:07', '2023-04-19 00:55:55', '2023-04-19 00:57:07'),
(6, 'Women', 0, '1', NULL, NULL, '2023-04-20 01:35:58', '2023-04-20 01:35:58'),
(7, 'Men', 0, '1', NULL, NULL, '2023-04-20 01:36:10', '2023-04-20 01:36:10'),
(8, 'Watches', 0, '1', NULL, NULL, '2023-04-20 01:36:47', '2023-04-20 01:36:47'),
(9, 'Shoes', 0, '1', NULL, NULL, '2023-04-20 01:37:09', '2023-04-20 01:37:09'),
(10, 'test demo', 0, '1', NULL, '2023-04-27 06:48:32', '2023-04-27 06:48:07', '2023-04-27 06:48:32'),
(11, 'test demo', 0, '1', NULL, '2023-04-27 06:50:06', '2023-04-27 06:49:34', '2023-04-27 06:50:06'),
(12, 'test demo', 0, '1', NULL, '2023-04-27 07:09:39', '2023-04-27 07:07:29', '2023-04-27 07:09:39'),
(13, 'test demosdd', 0, '1', NULL, '2023-05-04 04:06:36', '2023-05-04 04:06:26', '2023-05-04 04:06:36'),
(14, 'Mendas', 0, '1', NULL, '2023-05-04 04:35:25', '2023-05-04 04:35:01', '2023-05-04 04:35:25'),
(15, 'test demo', 1, '2', NULL, NULL, '2023-05-04 05:50:26', '2023-05-04 05:50:39'),
(16, 'Mobile', 1, '6', NULL, NULL, '2023-05-08 06:00:42', '2023-05-08 06:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_13_111348_create_users_table', 2),
(6, '2023_04_13_111407_create_products_table', 2),
(7, '2023_04_13_111433_create_categorys_table', 2),
(8, '2023_04_13_111449_create_orders_table', 2),
(9, '2014_10_12_100000_create_password_resets_table', 3),
(10, '2023_04_13_130552_create_categories_table', 4),
(11, '2023_04_14_051027_create_categories_table', 5),
(12, '2023_04_14_100506_create_products_table', 6),
(13, '2023_04_18_054824_add_newdata_to_users_table', 7),
(14, '2023_04_28_095553_create_addtocarts_table', 8),
(15, '2023_04_28_053047_create_productwishlists_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` bigint DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `sku`, `image`, `price`, `qty`, `category_id`, `discount`, `color`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'chnitan', 'test', 'SM', '1681973978.jpg', '100', '10', 1, '1', 'blue', 0, 1, NULL, '2023-04-20 03:28:27', '2023-04-14 06:43:26', '2023-04-20 03:28:27'),
(3, 'tejas', 'asasasasa', '452136', '1681477514.png', '100', '10', 2, '10', 'white', 0, 1, NULL, '2023-04-19 00:43:13', '2023-04-14 07:35:14', '2023-04-19 00:43:13'),
(4, 'Tejas', 'good', '45454121', '1681885888.png', '500', '20', 6, '10', 'black', 0, 1, NULL, '2023-04-20 01:28:28', '2023-04-19 01:01:28', '2023-04-20 01:28:28'),
(5, 'watch', 'best', '452178', '1681981283.jpg', '120', '10', 8, '10', 'black', 0, 1, NULL, NULL, '2023-04-19 06:21:44', '2023-04-20 03:31:23'),
(6, 'Shirt', 'Best Quality', '451278', '1681981198.jpg', '25', '10', 7, '10', 'White', 0, 1, NULL, NULL, '2023-04-20 03:29:58', '2023-04-21 06:50:05'),
(7, 'T-Shirt', 'Best One', '45127896', '1681982743.jpg', '32', '12', 6, '10', 'White', 0, 1, NULL, NULL, '2023-04-20 03:55:43', '2023-04-20 03:55:43'),
(8, 'Shoes', 'Good Quality And Best Rate', '1235241', '1681982841.jpg', '27', '15', 9, '15', 'Blue', 0, 1, NULL, NULL, '2023-04-20 03:57:21', '2023-04-20 03:57:21'),
(9, 'Belt', 'Nice Color', '415263', '1681983012.jpg', '13', '14', 7, '15', 'Brown', 0, 1, NULL, NULL, '2023-04-20 04:00:12', '2023-04-20 04:00:12'),
(10, 'Shirt', 'Women Shirt Best', '41528596', '1682162758.jpg', '110', '15', 6, '10', 'White', 0, 1, NULL, NULL, '2023-04-21 02:00:03', '2023-04-22 05:55:58'),
(11, 'Shirt', 'Best Quality', '748596', '1682162709.jpg', '55', '12', 7, '15', 'Blue', 0, 1, NULL, NULL, '2023-04-21 06:49:15', '2023-04-22 05:55:09'),
(12, 'test', 'demo', '7854', '1683193309.jpg', '75', '10', 6, '10', 'Grey', 1, 2, NULL, NULL, '2023-05-04 04:11:49', '2023-05-04 06:03:01'),
(13, 'Product 4', 'Good', 'assff', '1683193967.jpg', '2', '2', 6, '3', 'bb', 0, 6, NULL, '2023-05-08 05:56:28', '2023-05-04 04:22:47', '2023-05-08 05:56:28'),
(14, 'nbn', 'bnm', 'nmnm', '1683194313.jpg', '152', 'nasm', 6, 'nbnmas', '545', 0, 1, NULL, '2023-05-04 04:29:25', '2023-05-04 04:28:33', '2023-05-04 04:29:25'),
(15, 'Titan', 'demo', '123456', '1683545402.jpg', '33', '3', 8, '10', 'red', 1, 6, NULL, NULL, '2023-05-08 05:57:56', '2023-05-08 23:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `productwishlists`
--

CREATE TABLE `productwishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productwishlists`
--

INSERT INTO `productwishlists` (`id`, `product_id`, `user_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 15, 2, '2', NULL, '2023-05-09 01:13:56', '2023-05-09 01:13:56'),
(2, 12, 2, '2', NULL, '2023-05-09 06:26:19', '2023-05-09 06:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` timestamp NULL DEFAULT NULL,
  `updated_by` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `contact`, `address`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`, `dob`, `gender`, `active`, `roles`) VALUES
(1, 'Tejas', 'Prajapati', 'admin123@gmail.com', '$2y$10$CKh.H65fqSk1XxRgZHxrUehtGuIkUbccU2d4LYQr8KpX7IGxpSD.2', '8401431323', 'Dholka', NULL, NULL, NULL, NULL, '2023-05-02 02:07:07', '1998-01-02', 'male', 1, '0'),
(2, 'user', 'user123', 'user123@gmail.com', '$2y$10$jtoGVML4h9BuXvCQBfHHm.dGctbA4QjKGz1LiBAE3PFNV5Jj8.7Du', '8401431323', 'Dholka', NULL, NULL, NULL, '2023-04-19 00:53:08', '2023-04-19 00:53:08', '2000-01-02', 'male', 0, '1'),
(5, 'dilip', 'parmar', 'dilip@gmail.com', '$2y$10$QHwinKUaJ4e6zE8vwwOQzuYToJy.60iVR2xCxrBVfWelN4jlonmpG', '9514875326', 'deesa', NULL, NULL, NULL, '2023-05-04 04:32:45', '2023-05-04 04:32:45', '2000-07-02', 'male', 1, '1'),
(6, 'Prajapati', 'Tejas', 'tejas12345@gmail.com', '$2y$10$lphoDN7MwOc0Tug6h2y/gu128ya/7pux/Wb8O9HW5U8HVcjFbt3sC', '8401435244', 'Bopal', NULL, NULL, NULL, NULL, NULL, '05/01/2000', 'male', 0, '0'),
(7, 'Karavya', 'Solutions', 'ks@gmail.com', '$2y$10$VbLc2tfjN9Nk5DuzXsJeFeEwk7.gDHGsl96BQIhW7nbcfyxxX/i/q', '9994444447', '2323', NULL, NULL, NULL, '2023-05-08 06:06:03', '2023-05-08 06:06:44', '1991-07-03', 'female', 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtocarts`
--
ALTER TABLE `addtocarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addtocarts_user_id_foreign` (`user_id`),
  ADD KEY `addtocarts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `productwishlists`
--
ALTER TABLE `productwishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productwishlists_product_id_foreign` (`product_id`),
  ADD KEY `productwishlists_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `addtocarts`
--
ALTER TABLE `addtocarts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `productwishlists`
--
ALTER TABLE `productwishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addtocarts`
--
ALTER TABLE `addtocarts`
  ADD CONSTRAINT `addtocarts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addtocarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `productwishlists`
--
ALTER TABLE `productwishlists`
  ADD CONSTRAINT `productwishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productwishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
