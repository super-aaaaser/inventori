-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2025 at 06:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_cadangan`
--

CREATE TABLE `barang_cadangan` (
  `id_barang_cadangan` int(11) NOT NULL,
  `barang_inventaris_id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT 0,
  `kondisi` VARCHAR(100) DEFAULT 'Baik',
  `lokasi` text DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang_inventaris`
--

CREATE TABLE `barang_inventaris` (
  `id_barang_inventaris` int(11) NOT NULL,
  `kode_barang_inventaris` VARCHAR(100) NOT NULL,
  `nama_barang_inventaris` text NOT NULL,
  `barang_jenis_id` text DEFAULT NULL,
  `kondisi` VARCHAR(100) DEFAULT 'Baik',
  `ruangan_id` int(11) DEFAULT NULL,
  `tahun_perolehan` int(11) DEFAULT NULL,
  `sumber` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT current_timestamp(),
  `diperbarui_pada` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_inventaris`
--

INSERT INTO `barang_inventaris` (`id_barang_inventaris`, `kode_barang_inventaris`, `nama_barang_inventaris`, `barang_jenis_id`, `kondisi`, `ruangan_id`, `tahun_perolehan`, `sumber`, `keterangan`, `dibuat_pada`, `diperbarui_pada`) VALUES
(1, 'RPL-BR-001-001', 'Komputer Client 001', '3', 'baik', 3, 2016, 'BOS', 'Core i5', '2025-09-12 17:51:54', '2025-09-12 17:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `barang_jenis`
--

CREATE TABLE `barang_jenis` (
  `id_barang_jenis` int(11) NOT NULL,
  `kode_barang_jenis` varchar(20) NOT NULL,
  `nama_barang_jenis` varchar(100) NOT NULL,
  `jurusan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_jenis`
--

INSERT INTO `barang_jenis` (`id_barang_jenis`, `kode_barang_jenis`, `nama_barang_jenis`, `jurusan_id`) VALUES
(2, 'ATPH-BR-001', 'Pacul', 2),
(3, 'RPL-BR-001', 'Komputer Client', 6);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` text NOT NULL,
  `nama_jurusan` text NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`, `keterangan`) VALUES
(1, 'TBSM', 'Teknik Bisnis Sepeda Motor', NULL),
(2, 'ATPH', 'Agribisnis Tanaman Pangan dan Hortikultura', NULL),
(6, 'RPL', 'Rekayasa Perangkat Lunak', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `pengajuan_id` int(11) DEFAULT NULL,
  `nama_barang` text NOT NULL,
  `kategori` text DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `pemasok` text DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `diterima_oleh` int(11) DEFAULT NULL,
  `status` VARCHAR(100) DEFAULT 'dipesan' CHECK (`status` in ('dipesan','diterima','dibatalkan'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `barang_inventaris_id` int(11) NOT NULL,
  `nama_peminjam` text NOT NULL,
  `tipe_peminjam` VARCHAR(100) DEFAULT NULL CHECK (`tipe_peminjam` in ('siswa','guru','lainnya')),
  `jumlah` int(11) NOT NULL CHECK (`jumlah` > 0),
  `tanggal_pinjam` datetime DEFAULT current_timestamp(),
  `batas_kembali` datetime DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `status` VARCHAR(100) DEFAULT 'dipinjam' CHECK (`status` in ('dipinjam','dikembalikan','hilang','rusak')),
  `pengguna_id` int(11) NOT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `nama_barang` text NOT NULL,
  `kategori` text DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `alasan` text DEFAULT NULL,
  `status` VARCHAR(100) DEFAULT 'pending' CHECK (`status` in ('pending','disetujui','ditolak')),
  `disetujui_oleh` int(11) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT current_timestamp(),
  `diperbarui_pada` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama_pengguna` VARCHAR(100) NOT NULL,
  `password_hash` text NOT NULL,
  `nama_lengkap` text NOT NULL,
  `role` enum('kepala_lab','kakom','wakasek_sarpras','kepala_sekolah','admin') NOT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `password_hash`, `nama_lengkap`, `role`, `jurusan_id`, `dibuat_pada`) VALUES
(7, 'admin', '$2y$10$GF0oOYgOeMiiabhDSJgwBODSfJRF1egHaw9tbeLckY55A93lYI.c6', 'Admin Web', 'admin', NULL, '2025-09-12 12:32:28'),
(8, 'hendra', '$2y$10$N4F25S1gCwiZ5YqFo4.wluW300M96sLGXb0FSYdvT8QmmrLMKbXUi', 'Hendra', 'kakom', 2, '2025-09-12 12:35:50'),
(9, 'nasir', '$2y$10$kiSPewvaK56XC8yQi7z2UO3n8SVdLDLqCQtQZxdBI7lUn6gIf.Dky', 'Khairul M Nasir', 'kepala_lab', 6, '2025-09-12 17:34:05'),
(10, 'ramdani', '$2y$10$SIpENkLWYX8SpoFLzb8yHuZFQjJxeypnXWJiO1y4v8NUlJfNS3Ppa', 'Ramdani', 'kepala_lab', 1, '2025-09-12 18:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_barang`
--

CREATE TABLE `riwayat_barang` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `aksi` text NOT NULL,
  `perubahan_jumlah` int(11) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `waktu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` text NOT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `jurusan_id`, `keterangan`, `dibuat_pada`) VALUES
(3, 'LAB 1', 6, NULL, '2025-09-12 17:38:24'),
(4, 'LAB 2', 6, NULL, '2025-09-12 17:38:24'),
(5, 'LAB 3', 6, NULL, '2025-09-12 18:57:01'),
(6, 'LAB TEFA', 6, NULL, '2025-09-12 18:57:01'),
(7, 'LAB Informatika', 6, NULL, '2025-09-12 18:57:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_cadangan`
--
ALTER TABLE `barang_cadangan`
  ADD PRIMARY KEY (`id_barang_cadangan`);

--
-- Indexes for table `barang_inventaris`
--
ALTER TABLE `barang_inventaris`
  ADD PRIMARY KEY (`id_barang_inventaris`),
  ADD UNIQUE KEY `kode` (`kode_barang_inventaris`),
  ADD KEY `ruangan_id` (`ruangan_id`);

--
-- Indexes for table `barang_jenis`
--
ALTER TABLE `barang_jenis`
  ADD PRIMARY KEY (`id_barang_jenis`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `pengajuan_id` (`pengajuan_id`),
  ADD KEY `diterima_oleh` (`diterima_oleh`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_id` (`pengguna_id`),
  ADD KEY `ruangan_id` (`ruangan_id`),
  ADD KEY `disetujui_oleh` (`disetujui_oleh`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_pengguna` (`nama_pengguna`),
  ADD KEY `pengguna_ibfk_1` (`jurusan_id`);

--
-- Indexes for table `riwayat_barang`
--
ALTER TABLE `riwayat_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `ruangan_ibfk_1` (`jurusan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_cadangan`
--
ALTER TABLE `barang_cadangan`
  MODIFY `id_barang_cadangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_inventaris`
--
ALTER TABLE `barang_inventaris`
  MODIFY `id_barang_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang_jenis`
--
ALTER TABLE `barang_jenis`
  MODIFY `id_barang_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `riwayat_barang`
--
ALTER TABLE `riwayat_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_inventaris`
--
ALTER TABLE `barang_inventaris`
  ADD CONSTRAINT `barang_inventaris_ibfk_1` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id_ruangan`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`diterima_oleh`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `pengajuan_ibfk_3` FOREIGN KEY (`disetujui_oleh`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `riwayat_barang`
--
ALTER TABLE `riwayat_barang`
  ADD CONSTRAINT `riwayat_barang_ibfk_2` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
