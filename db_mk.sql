-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 11:21 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_dosen`
--

CREATE TABLE `data_dosen` (
  `nid` char(10) NOT NULL,
  `id` int(11) NOT NULL,
  `kode_jur` char(5) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `agama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_dosen`
--

INSERT INTO `data_dosen` (`nid`, `id`, `kode_jur`, `nama_dosen`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
('1111111123', 2, 'JS002', 'Nenza Ibnu Kresna Laksono', 'Bandung', '2018-05-18', 'Laki-Laki', 'Islam', 'Cimahi', '082133333333', '2018-05-19 09:19:33', '2018-05-19 09:19:33'),
('1112223334', 2, 'JS001', 'Bono', 'Jakarta', '1994-06-08', 'Laki-Laki', 'Islam', 'Bandung', '082111111111', '2018-05-19 09:18:02', '2018-05-19 09:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `data_fk`
--

CREATE TABLE `data_fk` (
  `kode_fk` char(5) NOT NULL,
  `nama_fk` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_fk`
--

INSERT INTO `data_fk` (`kode_fk`, `nama_fk`, `keterangan`, `created_at`, `updated_at`) VALUES
('FK001', 'FSI', 'Fakultas Saints dan Informatika', '2018-05-19 05:13:19', '2018-05-19 05:13:19'),
('FK002', 'Fakultas Ekonomi', '-', '2018-05-19 05:13:41', '2018-05-19 05:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `kode_jur` char(5) NOT NULL,
  `nama_jur` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kode_fk` char(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jurusan`
--

INSERT INTO `data_jurusan` (`kode_jur`, `nama_jur`, `keterangan`, `kode_fk`, `created_at`, `updated_at`) VALUES
('JS001', 'Informatika', 'Jurusan Informatika', 'FK001', '2018-05-19 05:29:21', '2018-05-19 05:29:21'),
('JS002', 'Farmasi', 'Jurusan Farmasi', 'FK001', '2018-05-19 05:29:51', '2018-05-19 05:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `nim` char(10) NOT NULL,
  `id` int(11) NOT NULL,
  `kode_jur` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `agama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nim`, `id`, `kode_jur`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
('3411102982', 2, 'JS002', 'Kresna Dwi Fitriani', 'Cililin', '2018-04-30', 'Perempuan', 'Islam', 'Cimahi', '089211111111', '2018-05-19 09:34:58', '2018-05-19 09:34:58'),
('3411151021', 6, 'JS001', 'Cecep Saefudin', 'Bandung', '1997-06-10', 'Laki-Laki', 'Islam', 'Cimareme', '082199996666', '2018-05-20 16:43:59', '2018-05-19 09:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `data_master_perwalian`
--

CREATE TABLE `data_master_perwalian` (
  `kode_perwalian` char(10) NOT NULL,
  `kode_wali` char(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_master_perwalian`
--

INSERT INTO `data_master_perwalian` (`kode_perwalian`, `kode_wali`, `created_at`, `updated_at`) VALUES
('PW00001', 'WL001', '2018-05-20 03:35:48', '2018-05-20 03:35:48'),
('PW00002', 'WL002', '2018-05-20 03:36:57', '2018-05-20 03:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `data_mk`
--

CREATE TABLE `data_mk` (
  `kode_mk` char(5) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `nid` char(10) NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mk`
--

INSERT INTO `data_mk` (`kode_mk`, `nama_mk`, `nid`, `jumlah_sks`, `created_at`, `updated_at`) VALUES
('MK001', 'PHP Dasar 2', '1112223334', 2, '2018-05-21 09:37:31', '2018-05-21 02:37:31'),
('MK002', 'SKI', '1111111123', 4, '2018-05-19 09:26:25', '2018-05-19 09:26:25'),
('MK004', 'Tekweb', '1111111123', 2, '2018-05-21 19:44:18', '2018-05-21 19:44:18'),
('MK005', 'Tekweb', '1112223334', 2, '2018-05-21 19:45:25', '2018-05-21 19:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `data_nilai`
--

CREATE TABLE `data_nilai` (
  `kode_nilai` char(10) NOT NULL,
  `nim` char(10) NOT NULL,
  `kode_mk` char(5) NOT NULL,
  `nilai` varchar(2) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_perwalian`
--

CREATE TABLE `data_perwalian` (
  `no` int(11) NOT NULL,
  `kode_perwalian` char(10) NOT NULL,
  `kode_mk` char(5) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Waiting',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_perwalian`
--

INSERT INTO `data_perwalian` (`no`, `kode_perwalian`, `kode_mk`, `status`, `created_at`, `updated_at`) VALUES
(13, 'PW00001', 'MK001', 'Setujui', '2018-05-21 10:20:22', '2018-05-21 03:20:22'),
(14, 'PW00001', 'MK002', 'Setujui', '2018-05-20 16:41:35', '2018-05-20 09:41:35'),
(15, 'PW0002', 'MK001', 'Waiting', '2018-05-21 02:02:53', '2018-05-21 02:02:53'),
(16, 'PW0002', 'MK002', 'Waiting', '2018-05-21 02:02:54', '2018-05-21 02:02:54'),
(17, 'PW00001', 'MK001', 'Setujui', '2018-05-21 10:20:32', '2018-05-21 03:20:32'),
(18, 'PW00001', 'MK002', 'Setujui', '2018-05-21 10:20:36', '2018-05-21 03:20:36'),
(20, 'PW00001', 'MK002', 'Setujui', '2018-05-22 02:46:25', '2018-05-21 19:46:25'),
(21, 'PW00001', 'MK001', 'Setujui', '2018-05-22 02:05:54', '2018-05-21 19:05:54'),
(22, 'PW00001', 'MK002', 'Setujui', '2018-05-22 02:18:45', '2018-05-21 19:18:45'),
(23, 'PW00001', 'MK002', 'Waiting', '2018-05-21 19:49:42', '2018-05-21 19:49:42'),
(24, 'PW00001', 'MK004', 'Waiting', '2018-05-21 19:49:42', '2018-05-21 19:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `data_wali_mhsw`
--

CREATE TABLE `data_wali_mhsw` (
  `kode_wali` char(10) NOT NULL,
  `nid` char(10) NOT NULL,
  `nim` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_wali_mhsw`
--

INSERT INTO `data_wali_mhsw` (`kode_wali`, `nid`, `nim`) VALUES
('WL001', '1112223334', '3411102982'),
('WL002', '1111111123', '3411102982');

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` int(1) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `hak_akses`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Mahasiswa', 'mahasiswa@admin.com', 2, '$2y$10$K9gSsJ4gO3W2gVkyT7A..u0oEWzSlGKmPAKGc7Glq5WkJTxZEIM6.', 'fRHLQcEsmzuy5hyMGqgTGENZtcLMihLRRa6snsKH84RJQBShvSgYGkaTbZ9a', '2018-05-15 17:48:44', '2018-05-15 17:48:44'),
(4, 'Dosen', 'dosen@admin.com', 1, '$2y$10$gQHjDcB.Er2AMciBv/jHGOXXKuaqM7igMzHdTGXwQx7LTWkQYpEXm', 'BZwa3Z5Ve8b1c2ZZvraEhIZ3WMendmASuRt8QQOYF0WlQcUagSFklapxSOj2', '2018-05-20 07:11:04', '2018-05-20 07:11:04'),
(5, 'Admin', 'admin@admin.com', 0, '$2y$10$UZkNNQVpnTqID8Gq3OCboeS7lky0GzqRWuurXILHInjzHZu51u.c2', 'ou08ki6vQJAkaK1XRGMNwvn4P4C49JNcAoaqu5QVbaKg4kOP4Uc7K7zjd4Sx', '2018-05-20 07:13:18', '2018-05-20 07:13:18'),
(6, 'Mahasiswa2', 'mahasiswa2@admin.com', 2, '$2y$10$iQ2M5zhhAznowMmEqSOvq.LEbsj/bWs2Wf.JQjGdqhXy76UsXocFO', 'i9nf6N77u763eaGaQUrbV7UyHblhohGFucUC1qLfwYvkkU4NNvd9BCpUCQ3Q', '2018-05-20 09:42:57', '2018-05-20 09:42:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dosen`
--
ALTER TABLE `data_dosen`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `data_fk`
--
ALTER TABLE `data_fk`
  ADD PRIMARY KEY (`kode_fk`);

--
-- Indexes for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`kode_jur`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `data_master_perwalian`
--
ALTER TABLE `data_master_perwalian`
  ADD PRIMARY KEY (`kode_perwalian`);

--
-- Indexes for table `data_mk`
--
ALTER TABLE `data_mk`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD PRIMARY KEY (`kode_nilai`);

--
-- Indexes for table `data_perwalian`
--
ALTER TABLE `data_perwalian`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `data_wali_mhsw`
--
ALTER TABLE `data_wali_mhsw`
  ADD PRIMARY KEY (`kode_wali`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_perwalian`
--
ALTER TABLE `data_perwalian`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
