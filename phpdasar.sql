-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 11:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `jdl` varchar(50) NOT NULL,
  `tgl` char(4) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `jdl`, `tgl`, `pengarang`, `penerbit`, `gambar`) VALUES
(3, 'Hantu Digoel; Politik Pengamanan Politik Zaman Kol', '2001', 'Takashi Shiraishi', 'LKiS', '616bd7c46e5a0.jfif'),
(17, 'Cedera Kepala', '2013', 'M. Z. Arifin', 'Sagung Seto', '4.jfif'),
(19, 'Kuasa Wanita Jawa', '2011', 'Christina S Handayani', 'LKiS', '6156ecf97c233.jpg'),
(20, 'Teknik Pengerjaan Listrik', '2016', 'Daryanto', 'LKiS', '6167f4a5c30ed.jpg'),
(24, 'PPKN', '2016', 'Dr.Mardenis,S.H.,M.S.I.', 'Gramedia', '6169301e128cb.jpg'),
(28, 'Kesehjateraan Sosial', '2015', 'Isbandi Rukminto Adi', 'Isbandi Rukminto Adi', '616bd79655693.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `username`, `password`) VALUES
(1, 'erick', '$2y$10$qz7cxHo9bdfCpXTNS.K3v.MW7pzffZ3yY7HbgMLGafWSQUs5Ln7Ui'),
(9, 'erik', '$2y$10$R7TupOm/1qLdDN/MHlk5r.7SJblo3R4QoBYzWuNeX.ketHRmiB2G6'),
(13, 'aku', '$2y$10$KxJ6RLrIjB4yt01PfIlhY.I2mf3tZh1/Ddt6ya0PdxNeSTQ3UJyS6'),
(14, 'aquaaa', '$2y$10$.dREgeMBt0qmyOQpzqrRE.ggOXevKRVknOICQ5Zv3hnxPTFFEisv.'),
(15, 'erikcowok112@gmail.c', '$2y$10$8JAxQz2oayxcaZOb40qun.Qlbe8F9DNcb3wse7.v.oFBSwijST.yK'),
(16, 'erikcowok121@gmail.c', '$2y$10$fnBgDTRa483dF8xezKtXnebU3wNpQzODUo0e87W1l.JfwHIiI811W'),
(17, 'saya', '$2y$10$8b45m0yLr0mMog42LWwedeOs2kGX8uoxwNX39ot..Gf6kqPadBbt.'),
(18, 'eriksss', '$2y$10$SCg35tgR4FXTc5PuYk9fEepMN6bqxZw4q5vF23LoDMI5TUqMHOEdi'),
(19, '', '$2y$10$qc6ZtG21.AjDADE13tIhqeupvoXu6ShmKB3sFnmX4xc3cEQet6lxy'),
(20, 'erikcc', '$2y$10$mVa7FH3tpQBspcgGvboKOO4XoSfOSXO/rpAB.Y/UlTTKS3je3oXBK'),
(21, '123', '$2y$10$OOhXAkUhSdmsU0vuL9cZce0DU6zerryjKoo/N4uDoo4sSxFsPxgHW'),
(22, '12334', '$2y$10$X7qgydV2PQRLyQaUjL5xQumIwh4dvC9BpNZOWFh4Yu4lP35jl2Rgy'),
(23, 'eriksssss', '$2y$10$HGK6w6oebjGsqyjQinBA/ec/mUA8Y0BZFROv6W4psfA84nC10pPQe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
