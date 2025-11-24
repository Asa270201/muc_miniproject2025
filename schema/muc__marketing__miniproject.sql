-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2025 at 08:02 AM
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
-- Database: `muc__marketing__miniproject`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_11_24_031928_add_employee_id_to_serviceused', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `number` text NOT NULL,
  `description` text NOT NULL,
  `year` int(11) NOT NULL,
  `status` enum('pending','agreed','rejected') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `number`, `description`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PR-2025-001', 'Penyusunan laporan keuangan tahunan PT Arwana Jaya', 2025, 'pending', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(2, 'PR-2025-002', 'Pengembangan sistem manajemen dokumen internal', 2025, 'agreed', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(3, 'PR-2025-003', 'Audit operasional cabang Jakarta Selatan', 2025, 'pending', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(4, 'PR-2025-004', 'Penilaian risiko dan compliance untuk divisi finance', 2025, 'pending', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(5, 'PR-2025-005', 'Implementasi aplikasi absensi berbasis web', 2025, 'rejected', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(6, 'PR-2024-006', 'Revisi kontrak layanan dan kebutuhan legal support', 2024, 'agreed', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(7, 'PR-2024-007', 'Maintenance dan peningkatan server internal', 2024, 'agreed', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(8, 'PR-2023-008', 'Pengadaan perangkat IT untuk kantor pusat', 2023, 'rejected', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(9, 'PR-2023-009', 'Pendampingan persiapan ISO 9001:2015', 2023, 'agreed', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(10, 'PR-2022-010', 'Layanan pelatihan akuntansi berbasis SAK EMKM', 2022, 'pending', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(11, 'PR-2022-011', 'Bismillah Lulus', 2025, 'agreed', '2025-11-20 01:23:49', '2025-11-20 01:23:49'),
(12, 'PR-2022-012', 'Bismillah Ya Allah', 2025, 'pending', '2025-11-20 01:24:11', '2025-11-20 01:24:11'),
(13, 'PR-2022-013', 'Lulus Ya Allah', 2025, 'agreed', '2025-11-20 04:15:21', '2025-11-20 04:15:21'),
(14, 'PR-2022-014', 'Ya Alllah Semoga Lulus', 2025, 'agreed', '2025-11-20 04:32:06', '2025-11-20 04:32:06'),
(15, 'PR-2022-015', 'Lulus Ya Allah Aamiin', 2025, 'agreed', '2025-11-20 05:37:18', '2025-11-20 05:37:18'),
(16, 'PR-2022-016', 'Alhamdulillah', 2025, 'agreed', '2025-11-20 06:18:24', '2025-11-20 06:18:24'),
(17, 'PR-2022-017', 'Bismillah Ya Allah', 2025, 'pending', '2025-11-20 09:42:11', '2025-11-20 09:42:11'),
(18, 'PR-2022-018', 'Bismillah', 2025, 'pending', '2025-11-24 01:23:21', '2025-11-24 01:23:21'),
(19, 'PR-2022-019', 'Test', 2025, 'pending', '2025-11-24 02:15:14', '2025-11-24 02:15:14'),
(20, '0004/MUC/BA/ITM/X/2025', 'Test', 2025, 'pending', '2025-11-24 02:18:04', '2025-11-24 02:18:04'),
(21, '0005/MUC/BA/ITM/X/2025', 'Test', 2025, 'pending', '2025-11-24 05:53:26', '2025-11-24 05:53:26'),
(22, '0006/MUC/BA/ITM/X/2025', 'Test', 2025, 'pending', '2025-11-24 06:30:58', '2025-11-24 06:30:58'),
(23, '0007/MUC/BA/ITM/X/2025', 'Test', 2025, 'pending', '2025-11-24 06:35:30', '2025-11-24 06:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `serviceused`
--

CREATE TABLE `serviceused` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `service_name` text NOT NULL,
  `status` enum('pending','ongoing','done') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serviceused`
--

INSERT INTO `serviceused` (`id`, `proposal_id`, `service_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Penyusunan SPT Tahunan Badan', 'pending', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(2, 2, 'Konsultasi Pajak Bulanan', 'ongoing', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(3, 3, 'Pemeriksaan & Review Kepatuhan Pajak', 'done', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(4, 4, 'Penyusunan SPT Masa PPN', 'pending', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(5, 5, 'Pendampingan Pemeriksaan Pajak (Tax Audit Assistance)', 'ongoing', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(6, 6, 'Perencanaan Pajak (Tax Planning)', 'done', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(7, 7, 'Pembuatan Bukti Potong & Laporan PPh', 'pending', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(8, 8, 'Pengurusan Restitusi PPN / PPh', 'ongoing', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(9, 9, 'Penyusunan SPT Tahunan Badan', 'done', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(10, 10, 'Pendampingan Sengketa Pajak (Tax Dispute Assistance)', 'pending', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(24, 11, 'Bismillah Lulus', 'ongoing', '2025-11-24 06:23:48', '2025-11-24 06:28:46'),
(25, 15, 'Lulus Ya Allah Aamiin', 'ongoing', '2025-11-24 06:31:16', '2025-11-24 06:31:16'),
(26, 22, 'Test', 'done', '2025-11-24 06:35:46', '2025-11-24 06:47:32');

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
-- Indexes for dumped tables
--

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
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceused`
--
ALTER TABLE `serviceused`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `serviceused`
--
ALTER TABLE `serviceused`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
