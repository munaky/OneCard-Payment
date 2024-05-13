-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2024 at 03:29 AM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onecard`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` tinyint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `name`) VALUES
(1, 'TKJ 1'),
(2, 'TKJ 2');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` tinyint NOT NULL,
  `name` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt2` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `name`, `alt`, `alt2`) VALUES
(1, 'X', '10', '1'),
(2, 'XI', '11', '2'),
(3, 'XII', '12', '3'),
(4, 'XIII', '13', '4');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id` int NOT NULL,
  `card_id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` tinyint NOT NULL,
  `jurusan_id` tinyint NOT NULL,
  `nisn` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id`, `card_id`, `name`, `kelas_id`, `jurusan_id`, `nisn`, `nis`) VALUES
(4, '2222', 'Murid2', 1, 1, '1723658135', '222153'),
(5, '3333', 'Murid3', 1, 1, '1723658135', '222153');

-- --------------------------------------------------------

--
-- Table structure for table `payment_admin_settings`
--

CREATE TABLE `payment_admin_settings` (
  `id` int NOT NULL,
  `payment_api_id` int NOT NULL,
  `payment_users_id` int NOT NULL,
  `spent` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_admin_settings`
--

INSERT INTO `payment_admin_settings` (`id`, `payment_api_id`, `payment_users_id`, `spent`) VALUES
(1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_api`
--

CREATE TABLE `payment_api` (
  `id` smallint NOT NULL,
  `mode` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `command` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_api`
--

INSERT INTO `payment_api` (`id`, `mode`, `name`, `token`, `value`, `value2`, `command`) VALUES
(1, 'topup', 'Operator', 'topup', '0', '', ''),
(3, 'payment', 'Kantin', 'payment', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int NOT NULL,
  `payment_users_id` int NOT NULL,
  `murid_id` int NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_kasir_settings`
--

CREATE TABLE `payment_kasir_settings` (
  `id` int NOT NULL,
  `payment_api_id` int NOT NULL,
  `payment_users_id` int NOT NULL,
  `balance` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_kasir_settings`
--

INSERT INTO `payment_kasir_settings` (`id`, `payment_api_id`, `payment_users_id`, `balance`) VALUES
(1, 3, 3, 304000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_murid_settings`
--

CREATE TABLE `payment_murid_settings` (
  `id` int NOT NULL,
  `payment_users_id` int NOT NULL,
  `murid_id` int NOT NULL,
  `balance` int NOT NULL DEFAULT '0',
  `spent` int NOT NULL DEFAULT '0',
  `daily_limit` int NOT NULL DEFAULT '20000',
  `pin` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_payment` date NOT NULL DEFAULT '2000-01-01',
  `disable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_murid_settings`
--

INSERT INTO `payment_murid_settings` (`id`, `payment_users_id`, `murid_id`, `balance`, `spent`, `daily_limit`, `pin`, `last_payment`, `disable`) VALUES
(5, 7, 4, 90000, 0, 20000, '111111', '2000-01-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_users`
--

CREATE TABLE `payment_users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` tinyint NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_users`
--

INSERT INTO `payment_users` (`id`, `name`, `role_id`, `username`, `password`) VALUES
(2, 'Admin', 1, 'admin', 'admin'),
(3, 'Kasir', 2, 'kasir', 'admin'),
(7, 'Murid2', 3, 'murid2', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` tinyint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `access`) VALUES
(1, 'Admin', 'admin'),
(2, 'Kasir', 'kasir'),
(3, 'Murid', 'murid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_id_2` (`card_id`),
  ADD KEY `card_id` (`card_id`,`nisn`) USING BTREE;

--
-- Indexes for table `payment_admin_settings`
--
ALTER TABLE `payment_admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_api`
--
ALTER TABLE `payment_api`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `token_2` (`token`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_kasir_settings`
--
ALTER TABLE `payment_kasir_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_murid_settings`
--
ALTER TABLE `payment_murid_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_users`
--
ALTER TABLE `payment_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_admin_settings`
--
ALTER TABLE `payment_admin_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_api`
--
ALTER TABLE `payment_api`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payment_kasir_settings`
--
ALTER TABLE `payment_kasir_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_murid_settings`
--
ALTER TABLE `payment_murid_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_users`
--
ALTER TABLE `payment_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
