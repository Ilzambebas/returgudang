-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2023 pada 16.19
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `returngudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_barang`
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
-- Dumping data untuk tabel `tabel_barang`
--

INSERT INTO `tabel_barang` (`id_barang`, `id_jenis`, `id_satuan`, `nama_barang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Motor TWS', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_bidang`
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
-- Dumping data untuk tabel `tabel_bidang`
--

INSERT INTO `tabel_bidang` (`id_bidang`, `nama_bidang`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Listrik', 'Ya', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_detail_return`
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
  `berat` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `status_return` enum('layak pakai','rusak','layak repair') DEFAULT NULL,
  `status_penerimaan` enum('Y','T') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jenis`
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
-- Dumping data untuk tabel `tabel_jenis`
--

INSERT INTO `tabel_jenis` (`id_jenis`, `nama_jenis`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Besi', 'Ya', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_return`
--

CREATE TABLE `tabel_return` (
  `id_return` int(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_satuan`
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
-- Dumping data untuk tabel `tabel_satuan`
--

INSERT INTO `tabel_satuan` (`id_satuan`, `nama_satuan`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SET', 'Ya', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `level` enum('admin','user') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'ilzam m', 'admin', '$2y$10$Ood8F9duNsirDYt27ixVMuUn0/1iYCRqNzYpMncMpDd62v0B/4FSO', 'admin', '2023-06-20 00:54:45', '2023-06-20 00:54:45', '2023-06-20 00:54:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis_x` (`id_jenis`),
  ADD KEY `id_satuan_x` (`id_satuan`);

--
-- Indeks untuk tabel `tabel_bidang`
--
ALTER TABLE `tabel_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `tabel_detail_return`
--
ALTER TABLE `tabel_detail_return`
  ADD PRIMARY KEY (`id_detail_return`),
  ADD KEY `id_return_x` (`id_return`),
  ADD KEY `id_bidang_x` (`id_bidang`);

--
-- Indeks untuk tabel `tabel_jenis`
--
ALTER TABLE `tabel_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tabel_return`
--
ALTER TABLE `tabel_return`
  ADD PRIMARY KEY (`id_return`),
  ADD KEY `id_user_x` (`id_user`);

--
-- Indeks untuk tabel `tabel_satuan`
--
ALTER TABLE `tabel_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_bidang`
--
ALTER TABLE `tabel_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_detail_return`
--
ALTER TABLE `tabel_detail_return`
  MODIFY `id_detail_return` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_jenis`
--
ALTER TABLE `tabel_jenis`
  MODIFY `id_jenis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_return`
--
ALTER TABLE `tabel_return`
  MODIFY `id_return` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_satuan`
--
ALTER TABLE `tabel_satuan`
  MODIFY `id_satuan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD CONSTRAINT `id_jenis_x` FOREIGN KEY (`id_jenis`) REFERENCES `tabel_jenis` (`id_jenis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_satuan_x` FOREIGN KEY (`id_satuan`) REFERENCES `tabel_satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tabel_detail_return`
--
ALTER TABLE `tabel_detail_return`
  ADD CONSTRAINT `id_bidang_x` FOREIGN KEY (`id_bidang`) REFERENCES `tabel_bidang` (`id_bidang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_return_x` FOREIGN KEY (`id_return`) REFERENCES `tabel_return` (`id_return`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tabel_return`
--
ALTER TABLE `tabel_return`
  ADD CONSTRAINT `id_user_x` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
