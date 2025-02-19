-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 01:13 PM
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
-- Database: `ternaknesia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ahli_konsultasi`
--

CREATE TABLE `ahli_konsultasi` (
  `id_ahlikonsultasi` char(6) NOT NULL,
  `nama_ahli` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `lisensi` varchar(20) NOT NULL,
  `catatan` text NOT NULL,
  `id_admin` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_pesan` int(6) NOT NULL,
  `isi_pesan` text NOT NULL,
  `waktu_terkirim` datetime NOT NULL,
  `id_pengguna` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id_pesan`, `isi_pesan`, `waktu_terkirim`, `id_pengguna`) VALUES
(1, 'tes', '2024-12-17 07:29:31', 4),
(2, 'halo', '2024-12-17 07:32:40', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pakan`
--

CREATE TABLE `jadwal_pakan` (
  `id_pakan` int(6) NOT NULL,
  `jenis_ternak` varchar(50) NOT NULL,
  `jenis_pakan` varchar(50) NOT NULL,
  `waktu_pemberian1` time NOT NULL,
  `waktu_pemberian2` time DEFAULT NULL,
  `waktu_pemberian3` time DEFAULT NULL,
  `banyaknya_pakan` float NOT NULL,
  `id_ternak` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_pakan`
--

INSERT INTO `jadwal_pakan` (`id_pakan`, `jenis_ternak`, `jenis_pakan`, `waktu_pemberian1`, `waktu_pemberian2`, `waktu_pemberian3`, `banyaknya_pakan`, `id_ternak`) VALUES
(2, 'sapo', ' agus', '22:52:00', '22:52:00', '22:53:00', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kesehatan`
--

CREATE TABLE `kesehatan` (
  `id_pemeriksaan` int(6) UNSIGNED NOT NULL,
  `nama_pemeriksa` varchar(50) NOT NULL,
  `gejala` text NOT NULL,
  `waktu_pemeriksaan` datetime NOT NULL,
  `kondisi_fisik` text NOT NULL,
  `diagnosa` varchar(50) NOT NULL,
  `id_ternak` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kesehatan`
--

INSERT INTO `kesehatan` (`id_pemeriksaan`, `nama_pemeriksa`, `gejala`, `waktu_pemeriksaan`, `kondisi_fisik`, `diagnosa`, `id_ternak`) VALUES
(1, 'juliansa', 'batuk', '2024-12-16 16:04:00', 'baik', 'Pusing demam  flu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `alamat`, `no_hp`, `password`, `email`, `username`) VALUES
(1, 'juliansa', '', '0851541108991', '$2y$10$iKpi3Un5pCoYe', 'juliansa837@gmail.com', 'juliansa'),
(2, 'tes', '', '082176980052', '$2y$10$rwWFMF/UA3y0X', 'test@example.com', 'tes'),
(3, 'teslogin', '', '851541108991', '$2y$10$p7.3vtXT3Ujt9', 'teslogin@gmail.com', 'teslogin'),
(4, 'pengguna', '', '082176980052', '$2y$10$UHUWG1v6sD71CgaTbGA0YugFqaqsaNgRexSb9k.cTDfkiFLQ597Y6', 'pengguna@gmail.com', 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `pengobatan`
--

CREATE TABLE `pengobatan` (
  `id_pengobatan` int(6) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `waktu_pengobatan` datetime NOT NULL,
  `dosis` varchar(20) NOT NULL,
  `durasi_pengobatan` int(11) DEFAULT NULL,
  `id_pemeriksaan` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengobatan`
--

INSERT INTO `pengobatan` (`id_pengobatan`, `nama_obat`, `waktu_pengobatan`, `dosis`, `durasi_pengobatan`, `id_pemeriksaan`) VALUES
(1, 'obataguskalam', '2024-12-16 20:00:00', '10', 10, 1),
(2, 'obatagus', '2024-12-16 20:59:00', '10', 10, 1),
(4, 'tes durasi', '2024-12-16 20:59:00', '10', 10, 1),
(5, 'tesobataguy', '2024-12-16 20:56:00', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(11) NOT NULL,
  `id_ternak` int(11) NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `jenis_produksi` enum('Susu','Telur') NOT NULL,
  `jumlah_produksi` decimal(10,2) NOT NULL,
  `gambar_produksi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `id_ternak`, `tanggal_produksi`, `jenis_produksi`, `jumlah_produksi`, `gambar_produksi`, `created_at`, `updated_at`) VALUES
(2, 3, '2024-12-17', 'Telur', 1.00, '1734419161_aec4150cf23e56e50012.png', '2024-12-17 00:06:01', '2024-12-17 00:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `ternak`
--

CREATE TABLE `ternak` (
  `id_ternak` int(6) NOT NULL,
  `jenis_ternak` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `usia` int(11) NOT NULL,
  `berat` decimal(10,0) NOT NULL,
  `id_pengguna` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ternak`
--

INSERT INTO `ternak` (`id_ternak`, `jenis_ternak`, `jumlah`, `usia`, `berat`, `id_pengguna`) VALUES
(1, 'sapo', 100, 10, 10, 4),
(3, 'ikan', 10, 10, 20, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ternak_keluar`
--

CREATE TABLE `ternak_keluar` (
  `id_ternakkeluar` char(6) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu_keluar` datetime NOT NULL,
  `usia` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_ternak` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id_tips` char(6) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `link_video` varchar(255) NOT NULL,
  `id_admin` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaksinasi`
--

CREATE TABLE `vaksinasi` (
  `id_vaksinasi` int(6) NOT NULL,
  `nama_vaksin` varchar(20) NOT NULL,
  `waktu_vaksinasi` datetime NOT NULL,
  `dosis` decimal(10,0) NOT NULL,
  `nama_tenaga_medis` varchar(50) NOT NULL,
  `id_ternak` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaksinasi`
--

INSERT INTO `vaksinasi` (`id_vaksinasi`, `nama_vaksin`, `waktu_vaksinasi`, `dosis`, `nama_tenaga_medis`, `id_ternak`) VALUES
(2, 'vaksinagus', '2024-12-16 19:43:00', 10, 'user1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ahli_konsultasi`
--
ALTER TABLE `ahli_konsultasi`
  ADD PRIMARY KEY (`id_ahlikonsultasi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `jadwal_pakan`
--
ALTER TABLE `jadwal_pakan`
  ADD PRIMARY KEY (`id_pakan`),
  ADD KEY `id_ternak` (`id_ternak`);

--
-- Indexes for table `kesehatan`
--
ALTER TABLE `kesehatan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `id_ternak` (`id_ternak`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pengobatan`
--
ALTER TABLE `pengobatan`
  ADD PRIMARY KEY (`id_pengobatan`),
  ADD KEY `id_kesehatan` (`id_pemeriksaan`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `id_ternak` (`id_ternak`);

--
-- Indexes for table `ternak`
--
ALTER TABLE `ternak`
  ADD PRIMARY KEY (`id_ternak`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `ternak_keluar`
--
ALTER TABLE `ternak_keluar`
  ADD PRIMARY KEY (`id_ternakkeluar`),
  ADD KEY `id_ternak` (`id_ternak`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id_tips`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `vaksinasi`
--
ALTER TABLE `vaksinasi`
  ADD PRIMARY KEY (`id_vaksinasi`),
  ADD KEY `id_ternak` (`id_ternak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_pesan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_pakan`
--
ALTER TABLE `jadwal_pakan`
  MODIFY `id_pakan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kesehatan`
--
ALTER TABLE `kesehatan`
  MODIFY `id_pemeriksaan` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengobatan`
--
ALTER TABLE `pengobatan`
  MODIFY `id_pengobatan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ternak`
--
ALTER TABLE `ternak`
  MODIFY `id_ternak` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaksinasi`
--
ALTER TABLE `vaksinasi`
  MODIFY `id_vaksinasi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_pakan`
--
ALTER TABLE `jadwal_pakan`
  ADD CONSTRAINT `jadwal_pakan_ibfk_1` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`) ON DELETE CASCADE;

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`);

--
-- Constraints for table `ternak`
--
ALTER TABLE `ternak`
  ADD CONSTRAINT `ternak_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
