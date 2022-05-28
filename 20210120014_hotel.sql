-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2022 at 11:43 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20210120014_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kamar`
--

CREATE TABLE `data_kamar` (
  `kd_kamar` int(11) NOT NULL,
  `tipe` varchar(40) NOT NULL,
  `bed` varchar(40) NOT NULL,
  `kapasitas` varchar(40) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kamar`
--

INSERT INTO `data_kamar` (`kd_kamar`, `tipe`, `bed`, `kapasitas`, `harga`, `foto`) VALUES
(1224, 'Suite', 'Double Bed', '2 orang', 500000, 'prima.jpeg'),
(1225, 'Superior', '1 Queen Bed', '2 orang', 600000, 'prima2.jpeg'),
(1226, 'Deluxe', 'Double Bed', '2 orang', 650000, 'prima3.jpeg\r\n'),
(1227, 'Executive', '1 King Bed', '2 orang', 700000, 'prima4.jpeg'),
(1228, 'Family Suite', '2 Queen Bed', '4 Orang', 1200000, 'prima5.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengunjung`
--

CREATE TABLE `data_pengunjung` (
  `nik` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `no_hp` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pengunjung`
--

INSERT INTO `data_pengunjung` (`nik`, `nama`, `no_hp`, `email`, `foto`) VALUES
('3274046103030001', 'Keyla Bintang', '08612631213', 'keyla@gmail.com', '8331-pengunjung-image_2022-05-28_184020884.png');

-- --------------------------------------------------------

--
-- Table structure for table `data_reservasi`
--

CREATE TABLE `data_reservasi` (
  `id_reservasi` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tipe` varchar(40) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah_hari` int(15) NOT NULL,
  `jumlah_bayar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_reservasi`
--

INSERT INTO `data_reservasi` (`id_reservasi`, `nama`, `tipe`, `tgl_masuk`, `tgl_keluar`, `jumlah_hari`, `jumlah_bayar`) VALUES
('PRM12148', 'Keyla Bintang', 'Suite', '2022-05-28', '2022-05-31', 3, '1500000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kamar`
--
ALTER TABLE `data_kamar`
  ADD PRIMARY KEY (`kd_kamar`);

--
-- Indexes for table `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `data_reservasi`
--
ALTER TABLE `data_reservasi`
  ADD PRIMARY KEY (`id_reservasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
