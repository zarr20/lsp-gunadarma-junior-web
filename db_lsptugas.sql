-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 07:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lsptugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `nama` text NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `gambar`, `nama`, `harga`, `deskripsi`) VALUES
(16, '121987_1.webp', 'Whiskas Makanan Kucing Tuna 1.2kg', 70000, 'Whiskas Dry Food Tuna merupakan makanan kering untuk kucing yang terbuat dari bahan-bahan berkualitas, termasuk ikan tuna. Makanan ini mengandung ragam nutrisi dan vitamin yang baik untuk sistem kekebalan tubuh hewan, serta melembutkan kulit dan bulu. Tekstur yang mudah dicerna dan rasa lezat menjadikan produk Whiskas sebagai salah satu pilihan favorit untuk pangan kucing peliharaan.'),
(17, '10068119_1.webp', 'Royal Canin Persian Adult Dry Makanan Kucing Dewasa 2 Kg', 349900, 'Royal Canin Persia secara khusus dibuat dalam bentuk pelet eksklusif yang diadaptasi dari bentuk rahang yang pendek dan rata dari kucing persia. Makanan Kucing ini snagat cocok untuk kucing persia usia diatas 12 bulan. Diformulasikan khusus untuk membantu meningkatkan sistem pencernaan, meningkatkan kesehatan bulu yang panjang serta meminimalisir hairball. Dengan nutrisi lengkap dan seimbang seperti asam lemak omega 3 dan omega 6 yang membantu meningkatkan kesehatan kulit dan bulu panjangnya. Makanan Kucing ini dibuat dalam bentuk '),
(18, '10158100_1.webp', 'Royal Canin Persian Adult Dry Makanan Kucing Dewasa 2 Kg', 25000, 'Beri makan kucing peliharaan Anda dengan Sheba Camilan Makanan Kucing. Makanan kucing ini memiliki nutrisi yang dibutuhkan untuk kesehatan kucing yang optimal dengan tekstur yang mudah dicerna. Makanan ini juga memiliki komposisi seimbang yang dapat membantu menjaga kesehatan giginya. Hadir dengan kemasan 12 gr, yang dapat Anda sajikan di mangkuk, di atas makanan kucing, atau diberikan langsung dari kemasan. Salah satu produk berkualitas di ruparupa.com untuk menunjang kebutuhan Anda.'),
(19, '10390597_3.jpg', 'Iris 93x63x121 Cm Kandang Kucing Pec902 - Pink', 1500000, 'Berikan keceriaan untuk kucing peliharaan Anda dengan menghadirkan kandang kucing dua tingkat persembahan dari Iris ini. Kandang kucing berwarna pink ini dapat membuat kucing kesayangan Anda dapat bermain-main di dalamnya karena memiliki ukuran yang cukup besar. Sehingga, kucing pun bisa tetap semangat dan tidak mudah stress.');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `tanggal`, `penerima`, `alamat`, `status`) VALUES
(240938194, 1, '2022-07-02 18:20:35', 'Dzarr al ghifari', '-', 'Belum dibayar'),
(495670519, 3, '2022-07-02 18:21:37', 'Dzarr', '-', 'Belum dibayar'),
(998573393, 1, '2022-07-02 18:21:01', 'Dzarr al ghifari', '-', 'Belum dibayar'),
(1455778352, 3, '2022-07-02 18:21:48', 'Dzarr', '-', 'Belum dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_items`
--

CREATE TABLE `transaksi_items` (
  `id_transaksi` int(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_items`
--

INSERT INTO `transaksi_items` (`id_transaksi`, `id_produk`, `nama`, `harga`, `jumlah`) VALUES
(240938194, 16, 'Whiskas Makanan Kucing Tuna 1.2kg', 70000, 1),
(998573393, 19, 'Iris 93x63x121 Cm Kandang Kucing Pec902 - Pink', 1500000, 2),
(495670519, 19, 'Iris 93x63x121 Cm Kandang Kucing Pec902 - Pink', 1500000, 2),
(1455778352, 17, 'Royal Canin Persian Adult Dry Makanan Kucing Dewasa 2 Kg', 349900, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'dzarr', 'admin', 'admin', 'admin'),
(3, 'dzarr', 'dzarr@gmail.com', '123456', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_user_3` (`id_user`);

--
-- Indexes for table `transaksi_items`
--
ALTER TABLE `transaksi_items`
  ADD KEY `id_transaksi` (`id_transaksi`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_items`
--
ALTER TABLE `transaksi_items`
  ADD CONSTRAINT `transaksi_items_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_items_ibfk_4` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
