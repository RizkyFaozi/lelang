-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2023 at 03:43 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES
(1, 1, 9, 3, 200000),
(2, 1, 7, 1, 1200000),
(3, 1, 7, 1, 1300000),
(4, 1, 7, 1, 1400000),
(5, 3, 14, 1, 3000000),
(6, 3, 14, 1, 2333333);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `tgl` date NOT NULL,
  `harga_awal` int(20) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` enum('belum_mulai','berlangsung','selesai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `tgl`, `harga_awal`, `deskripsi`, `image`, `status`) VALUES
(7, 'pintu', '2023-03-13', 1000000, 'awfawfawf', 'frame1.jpeg', 'berlangsung'),
(8, 'baju', '2023-03-13', 20000, 'keren ko', 'baju.jpeg', 'selesai'),
(9, 'buku', '2023-03-13', 200000, 'nulis', 'buku.jpg', 'selesai'),
(10, 'kasur', '2023-03-13', 90000, 'ssss', 'kasur.jpeg', 'berlangsung'),
(11, 'awann', '2023-03-14', 20000, 'terbang', 'k.jpg', 'berlangsung'),
(13, 'fawe', '2023-03-15', 23432, 'awfwafaw', 'th.jpeg', 'berlangsung'),
(14, 'kacamata', '2023-03-16', 2000000, 'hitam', 'kacamata.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lelang`
--

CREATE TABLE `tb_lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `harga_ahkir` int(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` enum('dibuka','ditutup','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lelang`
--

INSERT INTO `tb_lelang` (`id_lelang`, `id_barang`, `tgl_mulai`, `tgl_selesai`, `harga_ahkir`, `id_user`, `id_petugas`, `status`) VALUES
(1, 7, '2023-03-16', '2023-03-16', 1200000, 1, 2, 'selesai'),
(3, 14, '2023-03-16', '2023-03-17', NULL, NULL, 2, 'dibuka'),
(4, 9, '2023-03-16', '2023-03-16', NULL, NULL, 2, 'ditutup'),
(5, 14, '2023-03-16', '2023-03-16', NULL, NULL, 2, 'ditutup'),
(6, 8, '2023-03-16', '2023-03-16', NULL, NULL, 2, 'dibuka');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'petugas'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`) VALUES
(1, 'jiji', 'oji', '$2y$10$e9vyhjVGiCEko8vyl0tj2eFbNrpXE3F/HnUorZ/XEZlFiApwOdpyK', '0891289812'),
(3, 'muhammad', 'fauzi', '$2y$10$anSBbzNJrcYfdG3NiUFTsu1ZIZqUMqvYZTB29WD14.7dTohZ/yTDK', '085718557564');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `level`, `id_level`) VALUES
(1, 'fauzii', 'admin', '$2y$10$e9vyhjVGiCEko8vyl0tj2eFbNrpXE3F/HnUorZ/XEZlFiApwOdpyK', 'admin', 2),
(2, 'ji', 'petugas', '$2y$10$e9vyhjVGiCEko8vyl0tj2eFbNrpXE3F/HnUorZ/XEZlFiApwOdpyK', 'petugas', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_lelang` (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_lelang`) REFERENCES `tb_lelang` (`id_lelang`),
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`);

--
-- Constraints for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD CONSTRAINT `tb_lelang_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`),
  ADD CONSTRAINT `tb_lelang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_lelang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`);

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
