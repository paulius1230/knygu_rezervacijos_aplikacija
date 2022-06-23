-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 12:55 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorijos`
--

CREATE TABLE `kategorijos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pavadinimas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorijos`
--

INSERT INTO `kategorijos` (`id`, `pavadinimas`, `created_at`, `updated_at`) VALUES
(9, 'Komedija', '2022-06-23 05:03:26', '2022-06-23 05:21:35'),
(11, 'Iliustracijos', '2022-06-23 06:12:16', '2022-06-23 06:12:16'),
(12, 'Biografijos', '2022-06-23 06:12:31', '2022-06-23 06:12:31'),
(13, 'Fantastika', '2022-06-23 06:12:42', '2022-06-23 06:12:42'),
(14, 'Keliones', '2022-06-23 06:13:12', '2022-06-23 06:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `knygos`
--

CREATE TABLE `knygos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pavadinimas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `santrauka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nuotrauka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puslapiu_skaicius` int(11) NOT NULL,
  `kategorijos_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knygos`
--

INSERT INTO `knygos` (`id`, `pavadinimas`, `santrauka`, `isbn`, `nuotrauka`, `puslapiu_skaicius`, `kategorijos_id`, `created_at`, `updated_at`) VALUES
(3, 'asd', 'wdwdadawdaa', 'fghfgh', '1655974397.jpg', 50, 9, '2022-06-23 05:08:23', '2022-06-23 05:54:39'),
(4, 'adsd', 'asdadsd', 'asdda5460', '1655976706.jpg', 480, 9, '2022-06-23 06:31:46', '2022-06-23 06:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `megstamos`
--

CREATE TABLE `megstamos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `knygos_id` bigint(20) UNSIGNED NOT NULL,
  `vartotojo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `megstamos`
--

INSERT INTO `megstamos` (`id`, `knygos_id`, `vartotojo_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2022-06-23 07:18:45', '2022-06-23 07:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2022_06_23_061858_create_kategorijos_table', 1),
(17, '2022_06_23_061946_create_knygos_table', 1),
(18, '2022_06_23_094431_create_rezervacijos_table', 2),
(19, '2022_06_23_101103_create_megstamos_table', 3);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacijos`
--

CREATE TABLE `rezervacijos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `knygos_id` bigint(20) UNSIGNED NOT NULL,
  `vartotojo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rezervacijos`
--

INSERT INTO `rezervacijos` (`id`, `knygos_id`, `vartotojo_id`, `created_at`, `updated_at`) VALUES
(2, 3, 2, '2022-06-23 07:07:58', '2022-06-23 07:07:58'),
(3, 4, 2, '2022-06-23 07:07:59', '2022-06-23 07:07:59'),
(4, 4, 2, '2022-06-23 07:37:43', '2022-06-23 07:37:43'),
(5, 4, 2, '2022-06-23 07:43:52', '2022-06-23 07:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'skaitytojas',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kestas', 'kestas@gmail.com', NULL, '$2y$10$7czHjHRvr77.EMP/eZA36eUCAFlcJGKmn5vEuvoisRBk9yos5W4By', 'administratorius', NULL, '2022-06-23 03:56:53', '2022-06-23 03:56:53'),
(2, 'jolanta', 'jolanta@gmail.com', NULL, '$2y$10$sKACAzPCUAM6KMLDUghPG.mA.0tkX.SwcrK56ItulBUnb.jVO89EC', 'skaitytojas', NULL, '2022-06-23 06:02:42', '2022-06-23 06:02:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategorijos`
--
ALTER TABLE `kategorijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knygos`
--
ALTER TABLE `knygos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `knygos_kategorijos_id_foreign` (`kategorijos_id`);

--
-- Indexes for table `megstamos`
--
ALTER TABLE `megstamos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `megstamos_knygos_id_foreign` (`knygos_id`),
  ADD KEY `megstamos_vartotojo_id_foreign` (`vartotojo_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rezervacijos`
--
ALTER TABLE `rezervacijos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rezervacijos_knygos_id_foreign` (`knygos_id`),
  ADD KEY `rezervacijos_vartotojo_id_foreign` (`vartotojo_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorijos`
--
ALTER TABLE `kategorijos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `knygos`
--
ALTER TABLE `knygos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `megstamos`
--
ALTER TABLE `megstamos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rezervacijos`
--
ALTER TABLE `rezervacijos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `knygos`
--
ALTER TABLE `knygos`
  ADD CONSTRAINT `knygos_kategorijos_id_foreign` FOREIGN KEY (`kategorijos_id`) REFERENCES `kategorijos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `megstamos`
--
ALTER TABLE `megstamos`
  ADD CONSTRAINT `megstamos_knygos_id_foreign` FOREIGN KEY (`knygos_id`) REFERENCES `knygos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `megstamos_vartotojo_id_foreign` FOREIGN KEY (`vartotojo_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rezervacijos`
--
ALTER TABLE `rezervacijos`
  ADD CONSTRAINT `rezervacijos_knygos_id_foreign` FOREIGN KEY (`knygos_id`) REFERENCES `knygos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rezervacijos_vartotojo_id_foreign` FOREIGN KEY (`vartotojo_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
