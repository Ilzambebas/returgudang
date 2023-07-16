-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 04:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_returngudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `id_barang` int(20) NOT NULL,
  `id_jenis` int(20) DEFAULT NULL,
  `id_satuan` int(20) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_barang`
--

INSERT INTO `tabel_barang` (`id_barang`, `id_jenis`, `id_satuan`, `nama_barang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, NULL, 1, NULL, '2023-07-01 03:47:50', '2023-07-01 03:47:50', '2023-07-01 03:47:50'),
(3, NULL, 1, NULL, '2023-07-01 03:49:26', '2023-07-01 03:49:26', '2023-07-01 03:49:26'),
(4, NULL, 1, NULL, '2023-07-01 03:50:08', '2023-07-01 03:50:08', '2023-07-01 03:50:08'),
(5, 1, 1, 'test', '2023-07-01 03:51:16', '2023-07-01 03:51:16', '2023-07-01 03:51:16'),
(6, 1, 1, 'qwtq', '2023-07-01 03:53:28', '2023-07-01 03:53:28', '2023-07-01 03:53:28'),
(7, 7, 3, 'Test kedua', '2023-07-01 04:30:47', '2023-07-01 04:30:47', '2023-07-01 04:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_bidang`
--

CREATE TABLE `tabel_bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(50) DEFAULT NULL,
  `status` enum('Ya','Tidak') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_bidang`
--

INSERT INTO `tabel_bidang` (`id_bidang`, `nama_bidang`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Listrik', 'Ya', NULL, NULL, NULL),
(2, 'test', 'Ya', '2023-07-01 01:53:54', '2023-07-01 01:53:54', '2023-07-01 01:53:54'),
(4, NULL, 'Ya', '2023-07-01 02:44:17', '2023-07-01 02:44:17', '2023-07-01 02:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_detail_return`
--

CREATE TABLE `tabel_detail_return` (
  `id_detail_return` int(20) NOT NULL,
  `id_return` int(20) DEFAULT NULL,
  `id_bidang` int(20) DEFAULT NULL,
  `no_po` varchar(50) DEFAULT NULL,
  `jumlah` varchar(20) DEFAULT NULL,
  `keperluan` varchar(50) DEFAULT NULL,
  `no_bon` varchar(50) DEFAULT NULL,
  `tgl_bon` date DEFAULT NULL,
  `lokasi_penyimpanan` varchar(50) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `berat` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `status_return` enum('layak pakai','rusak','layak repair') DEFAULT NULL,
  `status_penerimaan` enum('Y','T') DEFAULT NULL,
  `nama_pic` varchar(255) DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  `satuan` int(20) DEFAULT NULL,
  `no_pekerjaan` varchar(255) DEFAULT NULL,
  `deskripsi_ket` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_detail_return`
--

INSERT INTO `tabel_detail_return` (`id_detail_return`, `id_return`, `id_bidang`, `no_po`, `jumlah`, `keperluan`, `no_bon`, `tgl_bon`, `lokasi_penyimpanan`, `lokasi`, `berat`, `keterangan`, `status_return`, `status_penerimaan`, `nama_pic`, `jenis`, `satuan`, `no_pekerjaan`, `deskripsi_ket`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 12, 1, 'AL0143', '32', 'qwrqr', '07/05/2023', '2023-05-07', 'qwrq', '173404.jpg', 'qwr', 'qwrqr', 'rusak', 'Y', 'IWAN/ INDRA YUDHA', 7, 1, 'WO 151485', NULL, '2023-07-13 08:47:42', '2023-07-14 15:37:44', NULL),
(3, 13, 1, 'DE1351610', '1', 'qwtq', '07/05/2023', '2023-05-07', 'qwtq', '174031.jpg', '12', 'PCV MANUAL VALVE', 'layak repair', 'Y', 'IWAN.P', 1, 1, 'WO128860', 'qwqtq', '2023-07-14 09:54:41', '2023-07-14 10:40:31', NULL),
(4, 14, 1, '12124', '12', 'qwrq', '07/06/2023', '2023-06-07', 'qwr', '081721.jpg', '12', 'qwrqwt', 'layak repair', 'Y', 'ahmad', 7, 1, '1241', 'qwr', '2023-07-14 14:20:00', '2023-07-15 01:17:21', NULL),
(5, 15, 1, 'qwrq', '12', 'qwrqr', '07/12/2023', '2023-12-07', 'qwrq', '212406.jpg', '12', 'qwr', 'layak pakai', 'Y', 'qwrq', 1, 1, 'qwqr', NULL, '2023-07-14 14:20:40', '2023-07-14 14:24:06', NULL),
(6, 16, 2, '12412', '12', 'qwtq', '07/03/2023', '2023-03-07', 'GUDANG RETURN', '174103.jpg', '12', 'qwtqwt', 'rusak', 'Y', 'IWAN/ INDRA YUDHA', 7, 1, 'WO 151485', NULL, '2023-07-15 10:40:09', '2023-07-15 10:41:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenis`
--

CREATE TABLE `tabel_jenis` (
  `id_jenis` int(20) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL,
  `status` enum('Ya','Tidak') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_jenis`
--

INSERT INTO `tabel_jenis` (`id_jenis`, `nama_jenis`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Besi', 'Ya', NULL, NULL, NULL),
(7, 'qw', 'Ya', '2023-07-01 04:29:58', '2023-07-01 04:29:58', '2023-07-01 04:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_return`
--

CREATE TABLE `tabel_return` (
  `id_return` int(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_return`
--

INSERT INTO `tabel_return` (`id_return`, `id_user`, `tgl_pengembalian`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 10, '2023-07-13', '2023-07-13 06:24:53', '2023-07-13 06:24:53', NULL),
(9, 10, '2023-07-13', '2023-07-13 06:25:19', '2023-07-13 06:25:19', NULL),
(10, 10, '2023-07-13', '2023-07-13 06:26:16', '2023-07-13 06:26:16', NULL),
(12, 12, '2023-07-13', '2023-07-13 08:47:42', '2023-07-13 08:47:42', NULL),
(13, NULL, '2023-07-14', '2023-07-14 09:54:41', '2023-07-14 09:54:41', NULL),
(14, NULL, '2023-07-14', '2023-07-14 14:20:00', '2023-07-14 14:20:00', NULL),
(15, NULL, '2023-07-14', '2023-07-14 14:20:40', '2023-07-14 14:20:40', NULL),
(16, NULL, '2023-07-15', '2023-07-15 10:40:09', '2023-07-15 10:40:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_satuan`
--

CREATE TABLE `tabel_satuan` (
  `id_satuan` int(20) NOT NULL,
  `nama_satuan` varchar(50) DEFAULT NULL,
  `status` enum('Ya','Tidak') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_satuan`
--

INSERT INTO `tabel_satuan` (`id_satuan`, `nama_satuan`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SET', 'Ya', NULL, NULL, NULL),
(3, 'Kilogram', 'Tidak', '2023-07-01 04:31:58', '2023-07-01 04:31:58', '2023-07-01 04:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `level` enum('admin','user') NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `no_hp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Rifjan', 'rifjan', '$2y$10$PinEfbxWuy0ZgYsrNHiKKOkwh7d99Hz3pc.msQfQC5STQLz0fHFMO', 'admin', '', '2023-06-29 07:52:47', '2023-06-29 07:52:47', NULL),
(12, 'admin', 'admin', 'admin', 'user', '1251', '2023-07-13 04:06:54', '2023-07-13 04:06:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis_x` (`id_jenis`),
  ADD KEY `id_satuan_x` (`id_satuan`);

--
-- Indexes for table `tabel_bidang`
--
ALTER TABLE `tabel_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `tabel_detail_return`
--
ALTER TABLE `tabel_detail_return`
  ADD PRIMARY KEY (`id_detail_return`),
  ADD KEY `id_return_x` (`id_return`),
  ADD KEY `id_bidang_x` (`id_bidang`);

--
-- Indexes for table `tabel_jenis`
--
ALTER TABLE `tabel_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tabel_return`
--
ALTER TABLE `tabel_return`
  ADD PRIMARY KEY (`id_return`),
  ADD KEY `id_user_x` (`id_user`);

--
-- Indexes for table `tabel_satuan`
--
ALTER TABLE `tabel_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabel_bidang`
--
ALTER TABLE `tabel_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_detail_return`
--
ALTER TABLE `tabel_detail_return`
  MODIFY `id_detail_return` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_jenis`
--
ALTER TABLE `tabel_jenis`
  MODIFY `id_jenis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabel_return`
--
ALTER TABLE `tabel_return`
  MODIFY `id_return` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tabel_satuan`
--
ALTER TABLE `tabel_satuan`
  MODIFY `id_satuan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD CONSTRAINT `id_jenis_x` FOREIGN KEY (`id_jenis`) REFERENCES `tabel_jenis` (`id_jenis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_satuan_x` FOREIGN KEY (`id_satuan`) REFERENCES `tabel_satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tabel_detail_return`
--
ALTER TABLE `tabel_detail_return`
  ADD CONSTRAINT `id_bidang_x` FOREIGN KEY (`id_bidang`) REFERENCES `tabel_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_return_x` FOREIGN KEY (`id_return`) REFERENCES `tabel_return` (`id_return`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_return`
--
ALTER TABLE `tabel_return`
  ADD CONSTRAINT `id_user_x` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
