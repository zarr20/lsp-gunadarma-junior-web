-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 06:38 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lsp_dzarr`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kursus`
--

CREATE TABLE `jadwal_kursus` (
  `id` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_kursus`
--

INSERT INTO `jadwal_kursus` (`id`, `id_kursus`, `mulai`, `selesai`) VALUES
(7, 13, '2022-07-01', '2022-07-02'),
(8, 13, '2022-07-12', '2022-07-13'),
(9, 15, '2022-07-12', '2022-07-13'),
(10, 14, '2022-07-13', '2022-07-14'),
(11, 11, '2022-07-20', '2022-07-22'),
(12, 12, '2022-07-26', '2022-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(11) NOT NULL,
  `nama_kursus` varchar(25) NOT NULL,
  `lama_kursus` int(11) NOT NULL,
  `keterangan_kursus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id`, `nama_kursus`, `lama_kursus`, `keterangan_kursus`) VALUES
(11, 'Programing', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat nibh sit amet maximus suscipit. Fusce at quam odio. Phasellus bibendum facilisis fermentum. Sed turpis nibh, pharetra sed odio at, tempus suscipit est. Cras eget eleifend lectus. Aenean malesuada enim non diam vestibulum, nec semper nisl porta. Nulla massa ipsum, porta nec lobortis vel, euismod a magna. Aenean lorem ex, varius sit amet laoreet nec, suscipit et nisi.'),
(12, 'Web Programming', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat nibh sit amet maximus suscipit. Fusce at quam odio. Phasellus bibendum facilisis fermentum. Sed turpis nibh, pharetra sed odio at, tempus suscipit est. Cras eget eleifend lectus. Aenean malesuada enim non diam vestibulum, nec semper nisl porta. Nulla massa ipsum, porta nec lobortis vel, euismod a magna. Aenean lorem ex, varius sit amet laoreet nec, suscipit et nisi.'),
(13, 'Designer muda', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat nibh sit amet maximus suscipit. Fusce at quam odio. Phasellus bibendum facilisis fermentum. Sed turpis nibh, pharetra sed odio at, tempus suscipit est. Cras eget eleifend lectus. Aenean malesuada enim non diam vestibulum, nec semper nisl porta. Nulla massa ipsum, porta nec lobortis vel, euismod a magna. Aenean lorem ex, varius sit amet laoreet nec, suscipit et nisi.'),
(14, 'MLTI', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat nibh sit amet maximus suscipit. Fusce at quam odio. Phasellus bibendum facilisis fermentum. Sed turpis nibh, pharetra sed odio at, tempus suscipit est. Cras eget eleifend lectus. Aenean malesuada enim non diam vestibulum, nec semper nisl porta. Nulla massa ipsum, porta nec lobortis vel, euismod a magna. Aenean lorem ex, varius sit amet laoreet nec, suscipit et nisi.'),
(15, 'Jaringan', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat nibh sit amet maximus suscipit. Fusce at quam odio. Phasellus bibendum facilisis fermentum. Sed turpis nibh, pharetra sed odio at, tempus suscipit est. Cras eget eleifend lectus. Aenean malesuada enim non diam vestibulum, nec semper nisl porta. Nulla massa ipsum, porta nec lobortis vel, euismod a magna. Aenean lorem ex, varius sit amet laoreet nec, suscipit et nisi.');

-- --------------------------------------------------------

--
-- Table structure for table `kursus_daftar`
--

CREATE TABLE `kursus_daftar` (
  `id` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `krs` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus_daftar`
--

INSERT INTO `kursus_daftar` (`id`, `id_mhs`, `id_user`, `id_jadwal`, `krs`, `status`) VALUES
(33, 12, 33, 6, '/uploads/krs/0b25ab969ffb7d317187cb3956667c57.docx', 'menunggu persetujuan'),
(34, 11, 32, 3, '/uploads/krs/395d404427fc673820563a53b3166fb8.docx', 'menunggu persetujuan'),
(35, 14, 35, 3, '/uploads/krs/0b25ab969ffb7d317187cb3956667c57.docx', 'menunggu persetujuan'),
(36, 11, 32, 7, '/uploads/krs/e0de86784dbf2ff371cc3a68c1f560e0.png', 'menunggu persetujuan'),
(37, 11, 32, 7, '/uploads/krs/e0de86784dbf2ff371cc3a68c1f560e0.png', 'menunggu persetujuan'),
(38, 11, 32, 7, '/uploads/krs/e0de86784dbf2ff371cc3a68c1f560e0.png', 'menunggu persetujuan'),
(39, 11, 32, 7, '/uploads/krs/e0de86784dbf2ff371cc3a68c1f560e0.png', 'menunggu persetujuan');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `npm` varchar(25) NOT NULL,
  `file_krs` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `tanggal_permintaan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `id_user`, `nama`, `kelas`, `npm`, `file_krs`, `status`, `tanggal_permintaan`) VALUES
(11, 32, 'Dzarr al ghifari', '4ka10', '12118136', '', 'menunggu', '2022-07-19'),
(12, 33, 'Budi', 'A', '1234', '', 'menunggu', '2022-07-19'),
(13, 34, 'Andi', '4321', '4321', '', 'menunggu', '2022-07-19'),
(14, 35, 'Tono', '8', '8765', '', 'menunggu', '2022-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `jenis_user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `jenis_user`) VALUES
(32, '12118136', '12118136', 'mhs'),
(33, '1234', '1234', 'mhs'),
(34, '4321', '4321', 'mhs'),
(35, '8765', '8765', 'mhs'),
(36, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_kursus`
--
ALTER TABLE `jadwal_kursus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kursus` (`id_kursus`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursus_daftar`
--
ALTER TABLE `kursus_daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_kursus`
--
ALTER TABLE `jadwal_kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kursus_daftar`
--
ALTER TABLE `kursus_daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_kursus`
--
ALTER TABLE `jadwal_kursus`
  ADD CONSTRAINT `jadwal_kursus_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
