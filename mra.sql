-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 08:42 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mra`
--

-- --------------------------------------------------------

--
-- Table structure for table `concernpersons`
--

CREATE TABLE `concernpersons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concernpersons`
--

INSERT INTO `concernpersons` (`id`, `name`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'RAISA SIGMA HIMA', 'BOD', 'ACTIVE', '1', NULL, '2023-04-02 09:57:51', '2023-04-02 09:57:51'),
(2, 'MONJORUL ALAM OVEE', 'BOD', 'INACTIVE', '1', '1', '2023-04-02 09:58:09', '2023-04-02 09:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `expenselists`
--

CREATE TABLE `expenselists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenselists`
--

INSERT INTO `expenselists` (`id`, `name`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Administrative Head', 'test', 'ACTIVE', '1', NULL, '2023-04-02 07:41:44', '2023-04-02 07:41:44'),
(2, 'WALTON HITECH  INDUSTRIES LTD', 'company', 'ACTIVE', '1', '1', '2023-04-02 07:48:53', '2023-04-03 01:05:32'),
(3, 'MISCELLANEOUS EXPESE', 'expens', 'ACTIVE', '1', '1', '2023-04-02 08:48:03', '2023-04-03 01:05:01'),
(4, 'Circus', 'fadsfa', 'ACTIVE', '1', '1', '2023-04-03 02:14:12', '2023-04-03 02:15:07');

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
(1, '2023_04_02_100550_create_expenselists_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2019_08_19_000000_create_failed_jobs_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2023_04_02_150458_create_paymentlists_table', 3),
(7, '2023_04_02_154123_create_concernpersons_table', 4),
(8, '2023_04_02_161748_create_mraforms_table', 5),
(9, '2023_04_03_075937_create_peoplelists_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mraforms`
--

CREATE TABLE `mraforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concern_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `received_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `varified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mraforms`
--

INSERT INTO `mraforms` (`id`, `invoice`, `expense_type`, `payment_type`, `concern_person`, `purpose`, `amount`, `grand_total`, `word`, `received_by`, `remarks`, `prepared_by`, `varified_by`, `approved_by`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'INV-0000001', '2', '1', '1', 'house expense', '5000', '5000', 'Five Thousand', '2', 'good job', '2', '2', '2', '1', '1', '2023-04-03 04:00:49', '2023-04-03 15:52:47'),
(2, 'INV-000002', '2', '1', '1', 'House expense', '4556677', '4556677', 'Forty Five Lakh Fifty Six Thousand Six Hundred Seventy Seven', '2', 'asd', '2', '2', '2', '1', NULL, '2023-04-03 21:56:07', '2023-04-03 21:56:07'),
(3, 'INV-000003', '3', '2', '1', 'fdsfds', '222344', '222344', 'Two Lakh Twenty Two Thousand Three Hundred Forty Four', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-03 22:17:24', '2023-04-03 22:17:24'),
(4, 'INV-000004', '4', '2', '1', 'fsdfsd', '23432', '23432', 'Twenty Three Thousand Four Hundred Thirty Two', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-03 22:21:36', '2023-04-03 22:21:36'),
(5, 'INV-000005', '2', '1', '1', 'wasdasd', '223444', '223444', 'Two Lakh Twenty Three Thousand Four Hundred Forty Four', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-03 23:54:39', '2023-04-03 23:54:39'),
(6, 'INV-000006', '2', '2', '1', 'dasdsa', '3333', '3333', 'Three Thousand Three Hundred Thirty Three', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 14:31:10', '2023-04-04 14:31:10'),
(7, 'INV-000007', '2', '2', '1', 'sdfdasfa', '5555', '5555', 'Five Thousand Five Hundred Fifty Five', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 14:31:25', '2023-04-04 14:31:25'),
(8, 'INV-000008', '1', '1', '1', 'sfdasfa', '2222', '2222', 'Two Thousand Two Hundred Twenty Two', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 14:31:43', '2023-04-04 14:31:43'),
(9, 'INV-000009', '3', '2', '1', 'dsfasaff', '66666', '66666', 'Sixty Six Thousand Six Hundred Sixty Six', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 14:31:59', '2023-04-04 14:31:59'),
(10, 'INV-000010', '3', '1', '1', 'sdfsafsafsaa', '12567890', '12567890', 'One Crore Twenty Five Lakh Sixty Seven Thousand Eight Hundred Ninety', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 14:32:20', '2023-04-04 14:32:20'),
(11, 'INV-000011', '3', '1', '1', 'sfdasfdas', '1244', '1244', 'One Thousand Two Hundred Forty Four', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 14:32:52', '2023-04-04 14:32:52'),
(12, 'INV-000012', '1', '1', '1', 'jhjkhkhkj', '767676', '767676', 'Seven Lakh Sixty Seven Thousand Six Hundred Seventy Six', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 18:13:44', '2023-04-04 18:13:44'),
(13, 'INV-000013', '2', '2', '1', 'hjkh jkhjkhk hkjh k', '555555', '555555', 'Five Lakh Fifty Five Thousand Five Hundred Fifty Five', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 18:14:07', '2023-04-04 18:14:07'),
(14, 'INV-000014', '3', '2', '1', 'jghghjfh', '6555', '6555', 'Six Thousand Five Hundred Fifty Five', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 18:35:53', '2023-04-04 18:35:53'),
(15, 'INV-000015', '1', '2', '1', 'hhkhkjh', '70000', '70000', 'Seventy Thousand', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 18:36:40', '2023-04-04 18:36:40'),
(16, 'INV-000016', '2', '2', '1', 'hkhkggjkg', '80000', '80000', 'Eighty Thousand', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 18:37:07', '2023-04-04 18:37:07'),
(17, 'INV-000017', '3', '2', '1', 'jkhgjkhkg', '7777', '7777', 'Seven Thousand Seven Hundred Seventy Seven', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-04-04 18:37:31', '2023-04-04 18:37:31');

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
-- Table structure for table `paymentlists`
--

CREATE TABLE `paymentlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentlists`
--

INSERT INTO `paymentlists` (`id`, `name`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'OVEE SIR FUND', 'Testing', 'ACTIVE', '1', NULL, '2023-04-02 09:33:23', '2023-04-02 09:33:23'),
(2, 'KHALID SIR FUND', 'testing', 'ACTIVE', '1', '1', '2023-04-02 09:33:43', '2023-04-02 09:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `peoplelists`
--

CREATE TABLE `peoplelists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peoplelists`
--

INSERT INTO `peoplelists` (`id`, `office_id`, `name`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '13035', 'Md Hasan ali', 'ACTIVE', '1', '1', '2023-04-03 02:17:19', '2023-04-03 02:31:58'),
(2, '1234', 'Mawlana sazzad kabir', 'ACTIVE', '1', NULL, '2023-04-03 03:59:23', '2023-04-03 03:59:23'),
(3, '33445', 'Rasel Molla', 'ACTIVE', '1', NULL, '2023-04-03 22:00:21', '2023-04-03 22:00:21');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hasan', 'hasan@gmail.com', NULL, '$2y$10$YxHma3o/JCHizS5fkP6nVut7W0veJilQ.K8W3ZgsFf8KY.Wb4ygJ6', NULL, '2023-04-02 07:47:29', '2023-04-02 07:47:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concernpersons`
--
ALTER TABLE `concernpersons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenselists`
--
ALTER TABLE `expenselists`
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
-- Indexes for table `mraforms`
--
ALTER TABLE `mraforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentlists`
--
ALTER TABLE `paymentlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peoplelists`
--
ALTER TABLE `peoplelists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `concernpersons`
--
ALTER TABLE `concernpersons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenselists`
--
ALTER TABLE `expenselists`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mraforms`
--
ALTER TABLE `mraforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paymentlists`
--
ALTER TABLE `paymentlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peoplelists`
--
ALTER TABLE `peoplelists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
