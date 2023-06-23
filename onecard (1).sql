-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2023 at 01:48 PM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.2.4

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
(1, '1111', 'Muhamad Najibuzzaky', 1, 1, '1723658135', '222153');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int NOT NULL,
  `murid_id` int NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `murid_id`, `image`, `title`, `body`, `price`) VALUES
(1, 1, 'assets/murid_history.jpeg', 'Pembelian', 'Anda telah melakukan pembelian di Kantin 1', '9000'),
(2, 1, 'assets/murid_history.jpeg', 'Pembelian', 'Anda telah melakukan pembelian di Kantin 1', '2000'),
(3, 1, 'assets/murid_history.jpeg', 'Pembelian', 'Anda telah melakukan pembelian di Kantin 4', '3500'),
(4, 1, 'assets/murid_history.jpeg', 'Pembelian', 'Anda telah melakukan pembelian di Kantin 4', '1000'),
(5, 1, 'assets/murid_history.jpeg', 'Pembelian', 'Anda telah melakukan pembelian di Kantin 1', '7000');

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
  `pin` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_murid_settings`
--

INSERT INTO `payment_murid_settings` (`id`, `payment_users_id`, `murid_id`, `balance`, `spent`, `daily_limit`, `pin`) VALUES
(1, 1, 1, 50000, 0, 20000, '111111');

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
(1, 'Muhamad Najibuzzaky', 3, 'najib', 'admin'),
(2, 'Admin', 1, 'admin', 'admin');

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
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_murid_settings`
--
ALTER TABLE `payment_murid_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_users`
--
ALTER TABLE `payment_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
