-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 04:24 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ali', 'ali@mail.com', '$2y$10$HvVPkidHKBCbxR/ycUg1BOT61hudSdVNMYuB3ZiCXJ0afGAPUnKiq', 'AKjPkGUMwpcQOOT46hFiUK10BXAFgJu8QH2AzJqVCbhNZnrMI282scYEFmzu', '2018-06-12 22:00:00', '2018-06-22 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `name`, `email`, `address`, `mobile`, `image`, `created_at`, `updated_at`) VALUES
(1, 'agency_one', 'saamspi@mail.com', 'ahmedarabi cairo-giza', '10120355', 'public/agency_images/P1zu8PkrBkFBcYCLAw2i8oo42tkhKaOJKfITqNIq.jpeg', '2018-06-22 11:44:52', '2018-06-22 11:44:52'),
(2, 'agency_two', 'sadmpi@mail.com', 'ahmedarabi cairo-giza', '10120355', 'public/agency_images/mdCz64iYnZ67KQMJdBR4IYONg5EbOeaXzYxujUrV.jpeg', '2018-06-22 11:45:09', '2018-06-22 11:45:09'),
(3, 'agency_three', 'wasel@mail.com', 'ahmedarabi cairo-giza', '10120355', 'public/agency_images/mQluMzLrjo1hOEC3b61jCg4XDcnyOIfykuiZa4lB.jpeg', '2018-06-22 11:45:23', '2018-06-22 11:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `agency_cars`
--

CREATE TABLE `agency_cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `agency_id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agency_cars`
--

INSERT INTO `agency_cars` (`id`, `agency_id`, `car_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, NULL, NULL),
(5, 2, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 3, 8, NULL, NULL),
(9, 3, 9, NULL, NULL),
(10, 3, 10, NULL, NULL),
(11, 3, 11, NULL, NULL),
(12, 3, 12, NULL, NULL),
(13, 2, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `agency_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hired` tinyint(1) NOT NULL DEFAULT '0',
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `agency_id`, `name`, `model`, `rent_price`, `hired`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 1, 'toyta', 'loi708', '55', 0, 'image_car/pexels-photo-104401.jpeg|image_car/pexels-photo-170811.jpeg|image_car/pexels-photo-205737.jpeg|image_car/pexels-photo-207268.jpeg|image_car/pexels-photo-210019.jpeg|image_car/pexels-photo-210143.jpeg', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpos', '2018-06-22 11:46:55', '2018-06-23 13:01:14'),
(5, 2, 'lumeson', 'loi708kkfkld', '50', 0, 'public/image_car/ZjuLoz5Gj0N0jugVMaRiJvem3YNG2KSOxvNLeTy1.jpeg|public/image_car/iAOsa4e0INa9uZ1vympoZywKewE5SdcKOS7XiQHA.jpeg|public/image_car/Szner5kjtaGgtsuPxqChwqy7SeqjsvAuYPT6Qy1a.jpeg', 'dkfmvmvfjjvfjf', '2018-06-23 12:39:03', '2018-06-23 12:39:03'),
(6, 1, 'Bentley', 'loi708', '500', 0, 'public/image_car/ro4TA9U26ey6PULKSjtCMvtsracO65biZnZUUHdT.jpeg|public/image_car/Xaxad1TIBBnI7PNpuGYSEdcmg8KnGouRfwCemPYg.jpeg|public/image_car/E8QwD7279u1dzb8242OHkzzIS0zK4XPVtUMl7Ia7.jpeg|public/image_car/mYBuAJ6uqsUWjxDsSCNznqXMbAadvSJQPDXNJOW7.jpeg|public/image_car/EVSAR7f8IfuSdcctjbW0ZySVaDr3RbL5LlUfasbB.jpeg|public/image_car/qZhKtTG8mbznnmgWxp93QsGTOdU29DpvYVdrDgGI.jpeg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose&nbsp;', '2018-06-23 20:51:53', '2018-06-23 20:51:53'),
(7, 1, 'Bugatti', 'lop2165', '360', 0, 'public/image_car/ibcoVEQ6h2WAuUD0ddmZvosHUFYWBP8tlu0sIwrH.jpeg|public/image_car/9ubRLYwaP9UCAYwXZa4bhkOhQK2Wo5sYq0Oe8jPA.jpeg|public/image_car/LNm61OwzNohgJleVgaoqDoZjYu6b19fQJ3PNJKKj.jpeg|public/image_car/OuVayoqE083KfHNeEUm1Wbhgxs8GfTRF55CAVsao.jpeg|public/image_car/R42UKReohI5YEplCJTcpqkpCey7aeI7aZ1JQAleC.jpeg|public/image_car/p6YnHAlDoVEqDwl7lFReeFm2hhfwxLykDi2gwKyM.jpeg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', '2018-06-23 20:52:48', '2018-06-23 20:52:48'),
(8, 3, 'Buick', 'loi708', '99', 0, 'image_car/pexels-photo-205737.jpeg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', '2018-06-23 20:58:48', '2018-06-23 21:15:31'),
(9, 3, 'Mini', 'loi708kkfkld', '105', 0, 'image_car/pexels-photo-170811.jpeg|image_car/pexels-photo-205737.jpeg|image_car/pexels-photo-207268.jpeg|image_car/pexels-photo-210019.jpeg|image_car/pexels-photo-210143.jpeg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', '2018-06-23 20:59:54', '2018-06-23 21:00:24'),
(10, 3, 'Land Rover', 'loi708', '705', 0, 'public/image_car/alelmbdPSo6UXxsZeaKohlTKLnpCBcJ83zGEbsQA.jpeg|public/image_car/oOB0YIMfMzxKqC4EK3gfcqJSmCCIzXFE8kKnblj7.jpeg|public/image_car/JkcJFCKzP99sHIufluYCX1C4fptJSsa2JDcLac1f.jpeg|public/image_car/RLfnGtIPv01BNmqeHxIaeM5YQo4SWHoQ03tM52q0.jpeg|public/image_car/1OLAcmJbZw1p66SfAKEsM8BRpOD8TmNKAmq1DFOZ.jpeg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', '2018-06-23 21:01:18', '2018-06-23 21:01:18'),
(11, 3, 'Maserati', 'lop2165', '99', 0, 'public/image_car/xU2bridZDuwR8X8aCC1aSNfeS1n3YDJttQLUp2e0.jpeg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', '2018-06-23 21:02:45', '2018-06-23 21:49:51'),
(12, 3, 'Porsche', 'loi708kkfkld', '300', 0, 'public/image_car/0Gq4YsMeoGZXSzd3erQiYawABNcgIjYrNOczPjYF.jpeg|public/image_car/CRvGZGchUg4meIHjYhVysOBe9DEc12VKExEXd2k3.jpeg|public/image_car/USI7ZUDyEK2yxpyZs3Z8WbA9jBa4Z5Gz78Ny8Vzv.jpeg|public/image_car/8gP50t4lab7Q6QPkVe2bkHqkCxeuVGqJ9RAG1dtK.jpeg|public/image_car/WTC1orIUsMCHyxh8VB5yQigYonZHxUamcJK37Mn0.jpeg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', '2018-06-23 21:04:00', '2018-06-23 21:04:00'),
(13, 2, 'Nissan', 'lop2165', '25', 0, 'public/image_car/gEnGR0hGCvc9kKWjAJn4abg4o9U5yCnR5zGJQuLe.jpeg|public/image_car/R9MkEkRWCkQGJJLwqAoYFwIb4WCFhM5if5sRHvv1.jpeg|public/image_car/XUUiMKfa3AHdYLbwQdAIUEajROxOLauT5FOcRdF4.jpeg|public/image_car/XOMQ2ISQHd0wIXp53HYWUPkQRCrHcz5EFkNi59Af.jpeg|public/image_car/QzVIJqcScpd3JAkvvjOScNKlfqGztH0zEVxrhQGE.jpeg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', '2018-06-23 21:19:39', '2018-06-23 21:48:12');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_06_18_223859_create_admins_table', 1),
(3, '2018_06_19_025946_create_agencies_table', 1),
(4, '2018_06_19_030227_create_cars_table', 1),
(5, '2018_06_19_030251_create_users_table', 1),
(6, '2018_06_20_172654_create_agency_cars_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agency_cars`
--
ALTER TABLE `agency_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agency_cars_agency_id_foreign` (`agency_id`),
  ADD KEY `agency_cars_car_id_foreign` (`car_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_car_id_foreign` (`car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agency_cars`
--
ALTER TABLE `agency_cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agency_cars`
--
ALTER TABLE `agency_cars`
  ADD CONSTRAINT `agency_cars_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agency_cars_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
