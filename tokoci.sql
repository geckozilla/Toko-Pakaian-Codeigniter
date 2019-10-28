-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 08:30 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoci`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama`, `email`, `password`, `level`) VALUES
(1, 'Rahma Purnama', 'purwantiibuku@gmail.com', '$2y$10$LmFWCdzCXFrzzz5WJeKFMOatmrEBiEU9QoIpv/h4T9xNWKfi7l37.', 'Admin'),
(42, 'Sito Karuniawan', 'tes@tes.tes', '$2y$10$yI66WdVEUQnV5RcR5ewoR.VPlHW6MOiJokbL0kdMFxdcjfJA2zilS', 'Member'),
(43, 'Sito Karuniawan', 'tes@tes.tes', '$2y$10$yI66WdVEUQnV5RcR5ewoR.VPlHW6MOiJokbL0kdMFxdcjfJA2zilS', 'Member'),
(44, 'Sito Karuniawan', 'tes@tes.tes', '$2y$10$yI66WdVEUQnV5RcR5ewoR.VPlHW6MOiJokbL0kdMFxdcjfJA2zilS', 'Member');

--
-- Triggers `data_user`
--
DELIMITER $$
CREATE TRIGGER `after_insert_data_user` AFTER INSERT ON `data_user` FOR EACH ROW BEGIN
    INSERT INTO detail_user
    SET id_user = NEW.id_user;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_data_user` BEFORE DELETE ON `data_user` FOR EACH ROW BEGIN
	DELETE FROM detail_user WHERE id_user = OLD.id_user;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id_detail` int(10) NOT NULL,
  `id_orders` int(10) NOT NULL,
  `alamat_tujuan` varchar(255) NOT NULL,
  `pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id_detail` int(10) NOT NULL,
  `gambar_dll` varchar(200) DEFAULT NULL,
  `stok` int(20) DEFAULT 0,
  `diskon` int(10) DEFAULT 0,
  `ukuran` varchar(50) DEFAULT NULL,
  `aktif` int(1) NOT NULL DEFAULT 0,
  `id_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail`, `gambar_dll`, `stok`, `diskon`, `ukuran`, `aktif`, `id_produk`) VALUES
(1, '1568668620240.png,1568668620246.png,1568668620253.png', 10, 10, 'L, M', 1, 15),
(2, '1568668620240.png,1568668620246.png,1568668620253.png', 10, 0, 'L', 1, 16),
(3, '1568668620240.png,1568668620246.png,1568668620253.png', 0, 0, 'XS, S, L, ', 1, 17),
(5, '1568668620240.png,1568668620246.png,1568668620253.png', 10, 0, 'XS, S, L, ', 0, 19),
(6, '1568668620240.png,1568668620246.png,1568668620253.png', 10, 0, 'XS, S, L, ', 1, 20),
(10, '1568668620240.png,1568668620246.png,1568668620253.png', 10, 0, 'tidak ada, ', 1, 24),
(12, '1568668620240.png,1568668620246.png,1568668620253.png', 100, 0, 'XS, S, ', 1, 26),
(13, '1568668840261.jpg,1568668840264.png,1568668840267.jpg', 100, 30, 'XS, S, L, ', 0, 27),
(14, '1568669096410.png,1568669096413.jpg,1568669096417.jpg', 99, 20, 'tidak ada, ', 1, 28),
(15, '1571086303025.png,1571086303028.jpg,1571086303032.jpg', 100, 0, 'XS, ', 1, 29),
(16, '1572202773768.png,1572202773774.png,1572202773780.png', 100, 12, 'XS, S, ', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id_detail` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT 'default.png',
  `is_active` int(1) DEFAULT 1,
  `create_date` int(11) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL,
  `last_login` int(11) DEFAULT 0,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id_detail`, `foto`, `is_active`, `create_date`, `delete_at`, `last_login`, `id_user`) VALUES
(1, 'admin.png', 1, 1566678130, NULL, 1572194461, 1),
(42, 'default.png', 1, NULL, NULL, 0, 42),
(43, 'default.png', 1, NULL, NULL, 0, 43),
(44, 'default.png', 1, NULL, NULL, 0, 44);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_cat` int(10) NOT NULL,
  `nama_cat` varchar(50) NOT NULL,
  `ket_cat` varchar(50) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_cat`, `nama_cat`, `ket_cat`, `active`) VALUES
(1, 'Baju', 'Pakaian berbentuk baju', 1),
(3, 'Kaos', 'Pakaian berbentuk baju', 1),
(4, 'Celana', 'Jenis - jenis celana', 1),
(5, 'Topi', 'Tutup kepala', 1),
(7, 'Sepatu', 'Alas kaki bernama sepatu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(10) NOT NULL,
  `id_orders` int(10) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `service` varchar(10) NOT NULL,
  `estimasi` varchar(50) NOT NULL,
  `total_ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status_order` varchar(50) NOT NULL,
  `tanggal_order` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders_produk`
--

CREATE TABLE `orders_produk` (
  `id_orders_produk` int(10) NOT NULL,
  `id_orders` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `unik_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `ket_produk` text NOT NULL,
  `id_cat` int(10) DEFAULT NULL,
  `harga_produk` int(12) NOT NULL,
  `gambar_produk` varchar(50) NOT NULL,
  `create_date` int(11) NOT NULL,
  `delete_at` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `unik_produk`, `nama_produk`, `ket_produk`, `id_cat`, `harga_produk`, `gambar_produk`, `create_date`, `delete_at`) VALUES
(15, 'BATIK000015', 'Sarung Kabayan', 'Sarung Asli Kalimantan, cocok untuk bermain sepakbola.', 1, 90000, '1567444807932.jpg', 1567531071, 0),
(16, 'BATIK000016', 'Batik Jogja', 'Batik buatan jogja ini sudah terbukti kualitas nya dan motif nya yang modern.', 1, 130000, '1567452909288.jpg', 1567532171, 0),
(17, 'KAOS000017', 'Jilbab Seyegan', 'The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.', 3, 60000, '1567529295289.jpg', 1567532771, 0),
(19, 'BAJU000019', 'Baju Koko', 'The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.', 3, 110000, '1567534770778.jpg', 1567534771, 1570906173),
(20, 'BAJU000020', 'Nimco Saber', 'The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.', 4, 50000, '1567708394996.jpg', 1567708395, 0),
(24, 'TOPI000022', 'Topi Converse', 'The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.\r\n', 5, 9000, '1568567806775.jpg', 1568567806, 0),
(26, '1000025', 'Rahma Andita', 'Tambahkan gambar produk lainnya, yang akan ditampilkan di halaman produk itu sendiri.', 1, 10000, '1568668619947.jpg', 1568668620, 0),
(27, '3000027', 'Sito Karuniawan', '\r\nThe example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.', 3, 1000, '1568668840005.png', 1568668840, 0),
(28, 'KAOS000028', 'Rahma Purnama', '\r\nThe example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.', 3, 19000, '1568669096278.png', 1568669096, 0),
(29, 'KAOS000029', 'Rahma PurnamaT', 'ffffffffffffffffffffffffffffffff', 3, 34355, '1571086302839.jpg', 1571086303, 0),
(31, 'KAOS000030', 'Baju Tidur Terus', 'Keterangan ProdukJelaskan sejelas mungkin Keterangan ProdukJelaskan sejelas mungkin', 3, 85000, '1572202773630.png', 1572202773, 0);

--
-- Triggers `produk`
--
DELIMITER $$
CREATE TRIGGER `before_delete_produk` BEFORE DELETE ON `produk` FOR EACH ROW BEGIN
	DELETE FROM detail_produk WHERE id_produk = OLD.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id_tags` int(10) NOT NULL,
  `nama_tag` varchar(50) NOT NULL,
  `ket_tag` varchar(50) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id_tags`, `nama_tag`, `ket_tag`, `active`) VALUES
(1, 'Casual', 'Dipakai untuk kegiatan santai, seperti hangout.', 1),
(3, 'Sport', 'Cocok dipakai untuk kegiatan olahraga', 1),
(4, 'Holiday', 'Untuk digunakan berlibur', 0),
(5, 'Pria', 'Produk untuk pria', 1),
(6, 'Dsadasds', 'dsdsdsdscxssssssssssss', 1),
(7, 'Saru', 'cxzcxzcxzc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags_produk`
--

CREATE TABLE `tags_produk` (
  `id_tags_produk` int(11) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `id_tags` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags_produk`
--

INSERT INTO `tags_produk` (`id_tags_produk`, `id_produk`, `id_tags`) VALUES
(1, 15, 1),
(2, 15, 3),
(4, 24, 1),
(5, 24, 3),
(6, 24, 4),
(9, 19, 1),
(10, 20, 5),
(12, 16, 4),
(13, 17, 5),
(14, 17, 3),
(15, 26, 3),
(16, 27, 3),
(17, 27, 4),
(18, 27, 5),
(19, 28, 1),
(20, 28, 4),
(21, 29, 3),
(22, 29, 5),
(23, 31, 1),
(24, 31, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id_detail`),
  ADD UNIQUE KEY `id_orders` (`id_orders`);

--
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_detail`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `detail_user_ibfk_1` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`),
  ADD UNIQUE KEY `id_orders` (`id_orders`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `orders_produk`
--
ALTER TABLE `orders_produk`
  ADD PRIMARY KEY (`id_orders_produk`),
  ADD KEY `id_orders` (`id_orders`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tags`);

--
-- Indexes for table `tags_produk`
--
ALTER TABLE `tags_produk`
  ADD PRIMARY KEY (`id_tags_produk`),
  ADD KEY `produk` (`id_produk`),
  ADD KEY `id_tag` (`id_tags`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_cat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_produk`
--
ALTER TABLE `orders_produk`
  MODIFY `id_orders_produk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tags` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags_produk`
--
ALTER TABLE `tags_produk`
  MODIFY `id_tags_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD CONSTRAINT `detail_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `detail_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD CONSTRAINT `ongkir_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `detail_orders` (`id_orders`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `orders_produk`
--
ALTER TABLE `orders_produk`
  ADD CONSTRAINT `orders_produk_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_produk_ibfk_2` FOREIGN KEY (`id_orders`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `kategori` (`id_cat`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tags_produk`
--
ALTER TABLE `tags_produk`
  ADD CONSTRAINT `tags_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tags_produk_ibfk_2` FOREIGN KEY (`id_tags`) REFERENCES `tags` (`id_tags`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
