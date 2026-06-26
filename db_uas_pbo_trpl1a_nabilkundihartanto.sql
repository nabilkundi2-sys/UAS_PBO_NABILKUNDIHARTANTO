-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2026 at 02:25 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_trpl1a_nabilkundihartanto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `semester` int NOT NULL,
  `tarif_ukt_nominal` decimal(10,2) NOT NULL,
  `jenis_pembiayaan` enum('mandiri','bidikmisi','prestasi') NOT NULL,
  `golongan_ukt` varchar(10) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `nomor_kip_kuliah` varchar(50) DEFAULT NULL,
  `dana_saku_subsidi` decimal(10,2) DEFAULT NULL,
  `nama_instansi_beasiswa` varchar(100) DEFAULT NULL,
  `minimal_ipk_syarat` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `semester`, `tarif_ukt_nominal`, `jenis_pembiayaan`, `golongan_ukt`, `nama_wali`, `nomor_kip_kuliah`, `dana_saku_subsidi`, `nama_instansi_beasiswa`, `minimal_ipk_syarat`) VALUES
(1, 'Ahmad Fauzi', '230101001', 3, 5000000.00, 'mandiri', 'Golongan 4', 'Budi Santoso', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', '230101002', 3, 6500000.00, 'mandiri', 'Golongan 5', 'Hendro Utomo', NULL, NULL, NULL, NULL),
(3, 'Rian Hidayat', '230101003', 5, 5000000.00, 'mandiri', 'Golongan 4', 'Agus Susanto', NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', '230101004', 1, 7500000.00, 'mandiri', 'Golongan 6', 'Iwan Wijaya', NULL, NULL, NULL, NULL),
(5, 'Fajar Nugroho', '230101005', 7, 4000000.00, 'mandiri', 'Golongan 3', 'Slamet Riyadi', NULL, NULL, NULL, NULL),
(6, 'Citra Kirana', '230101006', 3, 6500000.00, 'mandiri', 'Golongan 5', 'Dedi Kurniawan', NULL, NULL, NULL, NULL),
(7, 'Bagus Pratama', '230101007', 5, 5000000.00, 'mandiri', 'Golongan 4', 'Surono', NULL, NULL, NULL, NULL),
(8, 'Eko Prasetyo', '230102001', 3, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2023-9901', 1200000.00, NULL, NULL),
(9, 'Fitriani', '230102002', 3, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2023-9902', 1200000.00, NULL, NULL),
(10, 'Guntur Wibowo', '230102003', 5, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2021-8801', 1250000.00, NULL, NULL),
(11, 'Hany Handayani', '230102004', 1, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2025-1104', 1300000.00, NULL, NULL),
(12, 'Indra Wijaya', '230102005', 7, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2020-7705', 1100000.00, NULL, NULL),
(13, 'Joko Susilo', '230102006', 3, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2023-9906', 1200000.00, NULL, NULL),
(14, 'Kartika Sari', '230102007', 5, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2021-8807', 1250000.00, NULL, NULL),
(15, 'Lutfi Hakim', '230103001', 3, 1500000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', 3.50),
(16, 'Mega Utami', '230103002', 5, 2000000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Bank Indonesia', 3.40),
(17, 'Naufal Abdi', '230103003', 3, 0.00, 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Full Tanoto', 3.60),
(18, 'Olivia Putri', '230103004', 1, 1000000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Yayasan Toyota', 3.30),
(19, 'Putra Perdana', '230103005', 7, 2000000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Bank Indonesia', 3.40),
(20, 'Qori Sandria', '230103006', 3, 1500000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', 3.50),
(21, 'Rendra Kusuma', '230103007', 5, 0.00, 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Full Tanoto', 3.60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
