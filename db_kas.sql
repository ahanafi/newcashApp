-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 02:26 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_registrasi`
--

CREATE TABLE `tb_registrasi` (
  `id` int(11) NOT NULL,
  `nopol` varchar(30) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `type` enum('Truk tronton','Peti kemas','Truk Box','Truk tangki','Trailer','Dump truk','Truk Gandeng','Truk engkel','Losbak','Kontainer') NOT NULL,
  `barang` varchar(100) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_registrasi`
--

INSERT INTO `tb_registrasi` (`id`, `nopol`, `nama_lengkap`, `type`, `barang`, `jam_masuk`, `jam_keluar`, `tanggal`) VALUES
(1, 'E 9876 KY', 'Ahmad Hanafi', 'Losbak', 'Sayuran', '07:00:00', '11:00:00', '2017-11-09'),
(2, 'C 3456 ZE', 'Budi Ashari', 'Peti kemas', 'Kurma', '12:00:00', '15:00:00', '2017-11-09'),
(3, 'E 3412 XY', 'Muhammad Romdon', 'Truk Box', 'Beras', '07:35:00', '07:00:00', '2017-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sopir`
--

CREATE TABLE `tb_sopir` (
  `id` int(25) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sopir`
--

INSERT INTO `tb_sopir` (`id`, `nama_lengkap`, `alamat`, `jk`) VALUES
(123, 'Budi', 'Bandar Lampung', 'L'),
(124, 'Ahmad Hanafi', 'Cirebon', 'L'),
(125, 'Siti Jubaedah', 'Bandung', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `tb_truk`
--

CREATE TABLE `tb_truk` (
  `id` int(11) NOT NULL,
  `nopol` text NOT NULL,
  `transporter` varchar(100) NOT NULL,
  `type` enum('Truk tronton','Peti kemas','Truk Box','Truk tangki','Trailer','Dump truk','Truk Gandeng','Truk engkel','Losbak','Kontainer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_truk`
--

INSERT INTO `tb_truk` (`id`, `nopol`, `transporter`, `type`) VALUES
(1, ' W 1 MF', 'Meikarta', 'Losbak'),
(2, 'W 2 MF', '', 'Truk Box'),
(3, 'W 3 MF', '', 'Kontainer'),
(4, 'W 4 MF', '', 'Trailer'),
(5, 'E 3458 Z', 'JNE', 'Truk tronton'),
(6, 'E 2232 KY', 'JandT', 'Truk tangki');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama_lengkap`, `jk`, `alamat`, `level`) VALUES
(1, 'admin', '$2y$10$N79xfcNhsWjrsTSJE5EsGuut1H6NmJmTP0W7uA5CckjMWmclzM96G', 'Wijaya Kusuma Wardana', 'L', 'Tangerang', 'admin'),
(2, 'manager', '$2y$10$qhz4rjHM4YvxxQ0tVq1b6OoE4iPGSLD24fZR2RXMpmzni3sRjFHRS', 'Manager', 'L', 'Surabaya', 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `truk_keluar`
--

CREATE TABLE `truk_keluar` (
  `id_keluar` int(20) NOT NULL,
  `no_identitas` int(25) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `barang` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truk_keluar`
--

INSERT INTO `truk_keluar` (`id_keluar`, `no_identitas`, `nopol`, `tgl_keluar`, `barang`) VALUES
(3, 123, 'TM32', '2017-11-06', 'Empty');

-- --------------------------------------------------------

--
-- Table structure for table `truk_masuk`
--

CREATE TABLE `truk_masuk` (
  `id_masuk` int(20) NOT NULL,
  `no_identitas` int(25) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `barang` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truk_masuk`
--

INSERT INTO `truk_masuk` (`id_masuk`, `no_identitas`, `nopol`, `tgl_masuk`, `barang`) VALUES
(2, 123, 'TM32', '2017-11-28', 'Makanan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sopir`
--
ALTER TABLE `tb_sopir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_truk`
--
ALTER TABLE `tb_truk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truk_keluar`
--
ALTER TABLE `truk_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `truk_masuk`
--
ALTER TABLE `truk_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_sopir`
--
ALTER TABLE `tb_sopir`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `tb_truk`
--
ALTER TABLE `tb_truk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `truk_keluar`
--
ALTER TABLE `truk_keluar`
  MODIFY `id_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `truk_masuk`
--
ALTER TABLE `truk_masuk`
  MODIFY `id_masuk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
