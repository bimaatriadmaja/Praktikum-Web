-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 01:58 AM
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
-- Database: `service_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_perusahaan`
--

CREATE TABLE `admin_perusahaan` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_perusahaan`
--

INSERT INTO `admin_perusahaan` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `posisi_karyawan` varchar(50) NOT NULL,
  `gaji_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `posisi_karyawan`, `gaji_karyawan`) VALUES
(1, 'Amin', 'Mekanik - ringan', 500000),
(2, 'Joko', 'Mekanik - sedang', 750000),
(3, 'Iwan', 'Mekanik - berat', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `service_list`
--

CREATE TABLE `service_list` (
  `id_service` int(11) NOT NULL,
  `service` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_list`
--

INSERT INTO `service_list` (`id_service`, `service`, `status`, `harga`) VALUES
(1, 'Service Rutin', 1, 50000),
(2, 'Perbaikan Mesin', 1, 250000),
(3, 'Ganti Oli', 1, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `user_nomor_plat` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` enum('Belum Bayar','Sudah Bayar') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `user_nomor_plat`, `tanggal`, `keterangan`, `status`) VALUES
(1, 'AD 8548 XC', '2023-07-07', 'Kendaraan hanya membutuhkan ganti oli saja dan lainnya cukup aman', 'Belum Bayar'),
(2, 'AD 8741 ZX', '2023-07-07', 'Kendaraan hanya membutuhkan ganti oli saja dan lainnya cukup aman', 'Sudah Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama_pemilik` varchar(20) NOT NULL,
  `nomor_plat` varchar(10) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama_pemilik`, `nomor_plat`, `jenis_layanan`, `alamat`) VALUES
('Alif', 'AD 8548 XC', 'Ganti Oli', 'Jl. Magetan no 31, Surakarta, Jawa Tengah'),
('Julian', 'AD 8741 ZX', 'Ganti Oli', 'Jl. Surakarta no 20, Purowdadi, Jawa Tengah'),
('Bima', 'AE 7542 CO', 'Service Rutin', 'Jl. Karanganyar no 1, Karanganyar, Jawa Tengah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_perusahaan`
--
ALTER TABLE `admin_perusahaan`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `user_nomor_plat` (`user_nomor_plat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nomor_plat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_nomor_plat`) REFERENCES `user` (`nomor_plat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
