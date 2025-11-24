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
-- Database: `muc__hrd__miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fullname`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dani Pratama', 'inactive', '2025-11-19 11:13:12', '2025-11-19 11:13:12'),
(2, 'Rina Maulidya', 'inactive', '2025-11-19 11:13:12', '2025-11-19 11:13:12'),
(3, 'Farhan Rizky', 'active', '2025-11-19 11:13:12', '2025-11-19 11:13:12'),
(4, 'Siti Nurhaliza', 'inactive', '2025-11-19 11:13:12', '2025-11-19 11:13:12'),
(5, 'Bagas Prasetyo', 'active', '2025-11-19 11:13:12', '2025-11-19 11:13:12'),
(6, 'Wulan Safitri', 'inactive', '2025-11-19 11:13:12', '2025-11-19 11:13:12'),
(7, 'Agung Saputra', 'inactive', '2025-11-19 11:13:12', '2025-11-19 11:13:12'),
(8, 'Nadia Kusuma', 'active', '2025-11-19 11:13:12', '2025-11-19 11:13:12'),
(9, 'Reza Mahendra', 'active', '2025-11-19 11:13:12', '2025-11-19 11:13:12'),
(10, 'Ayu Lestari', 'active', '2025-11-19 11:13:12', '2025-11-19 11:13:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
