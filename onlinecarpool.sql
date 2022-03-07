-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2021 at 01:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecarpool`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `To` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psn_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psn_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `title`, `date`, `time`, `price`, `from`, `To`, `driver_name`, `psn_name`, `driver_id`, `psn_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lahore to Murree', '2021-12-26', '08:08:00', '5000', 'Lahore', 'Murree', 'Driver hamza', 'passenger uzair', '1', '3', 1, '2021-12-25 06:15:13', '2021-12-25 06:15:48'),
(2, 'Karachi - Islamabad', '2021-12-26', '18:31:00', '3500', 'karachi', 'Islamabad', 'hasan driver', 'passenger uzair', '4', '3', 0, '2021-12-25 06:31:54', '2021-12-25 06:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `drivreports`
--

CREATE TABLE `drivreports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psn_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psn_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivreports`
--

INSERT INTO `drivreports` (`id`, `title`, `driver_name`, `driver_id`, `psn_name`, `psn_id`, `eventid`, `date`, `status`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'adas', '1', '1', 'passenger uzair', '3', '1', '2021-12-26', '', 'dsdsds', '2021-12-25 06:16:16', '2021-12-25 06:16:16'),
(2, 'Complain Title', '1', '1', 'passenger uzair', '3', '1', '2021-12-26', '', 'Description', '2021-12-25 06:20:10', '2021-12-25 06:20:10'),
(3, 'wew', 'hasan driver', '4', 'passenger uzair', '3', '2', '2021-12-26', '', 'wererer', '2021-12-25 06:32:13', '2021-12-25 06:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `To` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DriverName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DriverId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `from`, `To`, `date`, `time`, `place`, `price`, `vehicle_type`, `DriverName`, `DriverId`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lahore to Murree', 'Lahore', 'Murree', '2021-12-26', '08:08:00', '', '5000', 'b', 'Driver hamza', '1', 1, '2021-12-25 06:08:58', '2021-12-25 06:11:54'),
(2, 'Lahore to ISB', 'Lahore', 'Islamabad', '2021-12-26', '08:08:00', '', '5050', 'a', 'Driver hamza', '1', 1, '2021-12-25 06:09:37', '2021-12-25 06:11:55'),
(4, 'Karachi - Islamabad', 'karachi', 'Islamabad', '2021-12-26', '18:31:00', '', '3500', 'c', 'hasan driver', '4', 1, '2021-12-25 06:31:22', '2021-12-25 06:31:22');

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
(1, '2021_12_24_234213_create_drivreports_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_08_19_000000_create_failed_jobs_table', 2),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(7, '2021_12_12_205133_create_sessions_table', 2),
(8, '2021_12_13_214542_create_events_table', 2),
(9, '2021_12_13_220321_create_vehicle_types_table', 2),
(10, '2021_12_19_232854_create_bookings_table', 2),
(11, '2021_12_25_000122_create_psnreports_table', 2);

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
-- Table structure for table `psnreports`
--

CREATE TABLE `psnreports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psn_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psn_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `psnreports`
--

INSERT INTO `psnreports` (`id`, `title`, `driver_name`, `driver_id`, `psn_name`, `psn_id`, `eventid`, `date`, `status`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'rwerw', 'Driver hamza', '1', 'Driver hamza', '1', '1', '2021-12-26', '0', 'werwe rwer', '2021-12-25 06:50:08', '2021-12-25 06:50:08'),
(2, 'rwerw', 'Driver hamza', '1', 'Driver hamza', '1', '1', '2021-12-26', '0', 'werwe rwer', '2021-12-25 06:56:54', '2021-12-25 06:56:54'),
(3, 'Title', 'Driver hamza', '1', 'passenger uzair', '3', '1', '2021-12-26', '0', 'Description', '2021-12-25 07:04:02', '2021-12-25 07:04:02'),
(4, 'Title', 'Driver hamza', '1', 'passenger uzair', '3', '1', '2021-12-26', '0', 'Description', '2021-12-25 07:04:33', '2021-12-25 07:04:33'),
(5, 'ewr', 'Driver hamza', '1', 'passenger uzair', '3', '1', '2021-12-26', '0', 'rew rwerew', '2021-12-25 07:04:49', '2021-12-25 07:04:49'),
(6, 'ewr', 'Driver hamza', '1', 'passenger uzair', '3', '1', '2021-12-26', '0', 'rew rwerew', '2021-12-25 07:05:16', '2021-12-25 07:05:16'),
(7, 'ewr', 'Driver hamza', '1', 'passenger uzair', '3', '1', '2021-12-26', '0', 'rew rwerew', '2021-12-25 07:05:41', '2021-12-25 07:05:41'),
(8, 'ewr', 'Driver hamza', '1', 'passenger uzair', '3', '1', '2021-12-26', '0', 'rew rwerew', '2021-12-25 07:06:11', '2021-12-25 07:06:11'),
(9, 'werwe', 'Driver hamza', '1', 'passenger uzair', '3', '1', '2021-12-26', '0', 'werwerwer', '2021-12-25 07:06:55', '2021-12-25 07:06:55'),
(10, 'werwe', 'Driver hamza', '1', 'passenger uzair', '3', '1', '2021-12-26', '0', 'werwerwer', '2021-12-25 07:07:23', '2021-12-25 07:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1OygSSHLY0PvMlYuzpereV1bfeTfDV9RG8T50EQv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo1OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dvdXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiM1FQT1dBazlBb1l4a2dHTElkUm43bkZ1c0IzNXMxelJpOWNKMlk0diI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR6endiQjh5OUpjQWNieDZkRkN0eDhlU09YTkJrN3QuMmN5YVZUbnc0cktETDkyMlZYNEVOSyI7fQ==', 1640434053),
('dmyX8Pmipq9pQUU2iVBSkBywoZFOhFOqz2v6Z2hG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo1OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teWRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJwMEMyVWc5SXBNTHBFcXRwWWkybnN3N2x5ZjRnVDV5NXVNeW9EMzFYIjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHp6d2JCOHk5SmNBY2J4NmRGQ3R4OGVTT1hOQms3dC4yY3lhVlRudzRyS0RMOTIyVlg0RU5LIjt9', 1640430398),
('x6kCrT3QjVTAYxp2QLIZiEVLxgwzIni08knJUnCd', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36 Edg/96.0.1054.62', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teWRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJ5MVFza0dkUVVSMzY2U1FhYVg4cWh0dmFHWGxuZEJMV0V0T0FCT3ZqIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkdnFIZ2VJbi5OblZTdlFVYU9INHFKZUlEcVo2VFpHN21BQkJvbmtxSmpraXZRRDFrR3BuSUciO30=', 1640434078);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loginauth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `loginauth`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `created_at`, `updated_at`) VALUES
(1, 'Driver hamza', 'driver@gmail.com', 'Driver', '1', NULL, '$2y$10$zzwbB8y9JcAcbx6dFCtx8eSOXNBk7t.2cyaVTnw4rKDL922VX4ENK', NULL, NULL, '2021-12-25 06:04:10', '2021-12-25 06:04:10'),
(2, 'admin', 'admin@gmail.com', 'Admin', '1', NULL, '$2y$10$vqHgeIn.NnVSvQUaOH4qJeIDqZ6TZG7mABBonkqJjkivQD1kGpnIG', NULL, NULL, '2021-12-25 06:04:38', '2021-12-25 06:04:38'),
(3, 'passenger uzair', 'psn@gmail.com', 'Passenger', '1', NULL, '$2y$10$uBDUNN4WSiHfnBGPCMh1te4I3YXEmdnpLJfuuVpki2JUCqh7rXn.m', NULL, NULL, '2021-12-25 06:06:02', '2021-12-25 06:06:02'),
(4, 'hasan driver', 'hasan@gmail.com', 'Driver', '1', NULL, '$2y$10$g7woUJ.fSsv6iPsZSSTPRuE.ZD4Ku5b.6AN1cwaXRqvwE4F66sEfu', NULL, NULL, '2021-12-25 06:30:14', '2021-12-25 06:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivreports`
--
ALTER TABLE `drivreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- Indexes for table `psnreports`
--
ALTER TABLE `psnreports`
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
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drivreports`
--
ALTER TABLE `drivreports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `psnreports`
--
ALTER TABLE `psnreports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
