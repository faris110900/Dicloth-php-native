-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 07:45 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `losuit`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SUITS', '2019-01-07 21:57:35', '2019-01-07 21:57:35', '2019-01-07 21:57:35'),
(2, 'JACKET', '2019-01-07 21:57:35', '2019-01-07 21:57:35', '2019-01-07 21:57:35'),
(3, 'PANTS', '2019-01-12 21:39:28', '2019-01-12 21:39:28', '2019-01-12 21:39:28'),
(5, 'SHOES', '2019-01-12 22:31:40', '2019-01-12 22:31:40', '2019-01-12 22:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `pengiriman_id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `keterangan` longtext NOT NULL,
  `total` int(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `user_id`, `produk_id`, `pengiriman_id`, `nama`, `email`, `kota`, `alamat`, `keterangan`, `total`, `jumlah`, `created_at`) VALUES
(6, 3, 2, 2, 'Faris Rizqilail', 'faris.riskilail@gmail.com', 'Surabaya', 'Jl.Bronggalan Sawah 4F no 41', 'Ukuran L', 2299000, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 1, 1),
(3, 2, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `kurir` varchar(200) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `kurir`, `tarif`) VALUES
(1, 'JNE', 17000),
(2, 'TIKI', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `kategori_id` int(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` int(20) NOT NULL,
  `warna` varchar(200) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `user_id`, `kategori_id`, `nama`, `harga`, `warna`, `deskripsi`, `ukuran`, `image`, `created_at`, `update_at`, `delete_at`) VALUES
(3, 1, 2, 'DOUBLE-SIDED FAUX LEATHER THREE-QUARTER LENGTH COAT', 2299000, 'Black- 3548/351', 'Coat with a lapel collar, long turn-up sleeves, front welt pockets and button fastening in the front. Featuring a contrast faux shearling textured interior.', 'HEIGHT OF MODEL: 189 cm. / 6â€² 2â€³ SIZE L', '61Ku5Pg8N5L._UX679_.jpg', '2019-01-07 22:46:50', '2019-01-13 15:29:10', '2019-01-07 22:46:50'),
(4, 1, 1, 'TEXTURED WEAVE BLAZER', 1000000, 'Maroon- 0706/476', 'Long sleeve blazer with a lapel collar, chest pockets, jetted pockets at the hip, an inside pocket, two back vents and button fastening in the front.', 'HEIGHT OF MODEL: 189 cm. / 6â€² 2â€³ SIZE 50', '61utO0PtA4L._UX679_.jpg', '2019-01-08 10:23:23', '2019-01-13 15:29:26', '2019-01-08 10:23:23'),
(5, 1, 1, 'PERFORATED FAUX LEATHER JACKET', 1500000, 'Silver- 8281/464', 'Stand-up collar jacket with long sleeves and buttoned cuffs. Featuring zip pockets at the hip and a zip-up front.', 'HEIGHT OF MODEL: 189 cm. / 6â€² 2â€³ SIZE L', '91IJxXfqRFL._UX569_.jpg', '2019-01-08 21:51:39', '2019-01-13 15:29:38', '2019-01-08 21:51:39'),
(6, 1, 1, 'CONTRASTING BIKER JACKET', 1899000, 'BROWN - 8178/305', 'Faux leather biker jacket with a contrast faux shearling textured interior. Featuring a lapel collar, long turn-up sleeves, front zip pockets and a turn-up hem. Fastens in the front with an asymmetric zip', 'HEIGHT OF MODEL: 189 cm. / 6â€² 2â€³ SIZE L', '81s7vx6bM4L._UX569_.jpg', '2019-01-08 22:22:07', '2019-01-13 15:29:47', '2019-01-08 22:22:07'),
(7, 1, 1, 'Unlisted by Kenneth Cole Men\'s Corduroy Blazer', 2499000, 'Brown-0706/476', 'Long sleeve blazer with a lapel collar, chest pockets, jetted pockets at the hip, an inside pocket, two back vents and button fastening in the front.', 'HEIGHT OF MODEL: 189 CM / 6â€² 2â€³ SIZE: L,XL,XXL', '910eL79TriL._UX569_.jpg', '2019-01-12 12:58:44', '2019-01-13 15:29:58', '2019-01-12 12:58:44'),
(8, 1, 1, 'U.S. Polo Assn. Men\'s Corduroy Sport Coat', 915000, 'Red-0706/476', 'Long sleeve blazer with a lapel collar, chest pockets, jetted pockets at the hip, an inside pocket, two back vents and button fastening in the front.', 'HEIGHT OF MODEL: 189 CM / 6â€² 2â€³ SIZE: L,XL,XXL', '91NNV54LFdL._UX569_.jpg', '2019-01-12 13:03:12', '2019-01-13 15:30:03', '2019-01-12 13:03:12'),
(9, 1, 2, ' Corduroy Men\'s Coat Suit Autumn Winter Casual Slim Long Sleeve Jacket Blazer Top', 188000, 'Blue-Dark-0706/476', 'Coat with a lapel collar, long turn-up sleeves, front welt pockets and button fastening in the front. Featuring a contrast faux shearling textured interior.', 'HEIGHT OF MODEL: 189 CM / 6â€² 2â€³ SIZE: L,XL,XXL', '51BsYDpfRDL._UX679_.jpg', '2019-01-12 13:07:49', '2019-01-13 15:30:07', '2019-01-12 13:07:49'),
(10, 1, 2, 'GEEK LIGHTING Slim Fit Single One Button Blazer Jackets for Men', 492000, 'Black-3548/351', 'Coat with a lapel collar, long turn-up sleeves, front welt pockets and button fastening in the front. Featuring a contrast faux shearling textured interior.', 'HEIGHT OF MODEL: 189 CM / 6â€² 2â€³ SIZE: L,Xl,XXL', '61fTYcwZNRL._UX679_.jpg', '2019-01-12 13:14:09', '2019-01-13 15:30:11', '2019-01-12 13:14:09'),
(11, 1, 2, 'COOFANDY Men\'s Casual Double-Breasted Jacket Slim Fit Blazer', 816000, 'Dark-Red- 3548/351', 'Coat with a lapel collar, long turn-up sleeves, front welt pockets and button fastening in the front. Featuring a contrast faux shearling textured interior.', 'HEIGHT OF MODEL: 189 CM / 6â€² 2â€³ SIZE: L', '71Mq94vludL._UY741_.jpg', '2019-01-12 13:35:20', '2019-01-13 15:30:15', '2019-01-12 13:35:20'),
(12, 1, 3, 'Essentials Men\'s Slim-Fit Flat-Front Dress Pants', 352000, 'Black', 'Work made better: we listen to customer feedback and fine-tune every detail to ensure quality, fit, and comfort', 'HEIGHT OF MODEL: 189 CM / 6â€² 2â€³ SIZE EUR 4', '71MCy+psZJL._UX569_.jpg', '2019-01-12 22:23:13', '2019-01-13 15:30:21', '2019-01-12 22:23:13'),
(13, 1, 3, 'Van Heusen Men\'s Traveler Slim Fit Flat Front Pant', 1299000, 'Blue', 'Temperature-activated cooling technology wicks moisture away from skin,Anti-microbial technology helps eliminates odor-causing bacteria', 'HEIGHT OF MODEL: 189 CM / 6â€² 2â€³ SIZE EUR 40', '81Tzcsw16DL._UX569_.jpg', '2019-01-12 22:27:37', '2019-01-13 15:30:26', '2019-01-12 22:27:37'),
(14, 1, 5, 'Jivana Men\'s Sneaker Flat Casual Shoes Black/Brown', 450000, 'Brown', 'FASHION- Good looking and go with a variety of clothing, good for men\'s casual wear', '38 - 45 ', '61C-IWVh2pL._UY575_.jpg', '2019-01-12 22:34:28', '2019-01-13 15:30:31', '2019-01-12 22:34:28'),
(15, 1, 5, 'Polo Ralph Lauren Men\'s Faxon Low Sneaker', 2399000, 'Black', 'Shaft measures approximately low-top from arch\r\nLace-up sneaker with metal eyelets featuring stripe at midsole and embroidered logo at quarterpanel', '38 - 44', '81I84MMZR9L._UX575_.jpg', '2019-01-12 22:36:24', '2019-01-13 15:30:37', '2019-01-12 22:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` bit(1) NOT NULL DEFAULT b'0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `kota`, `alamat`, `password`, `role`, `created_at`, `update_at`) VALUES
(1, 'admin', 'admin@gmail.com', '', '', 'a25e0c1c1b202c784901433d0ec02e3c', b'1', '2019-01-06 22:52:00', '2019-01-06 22:52:18'),
(3, 'Faris Rizqilail', 'faris.riskilail@gmail.com', 'Surabaya', 'Jl.Bronggalan Swah 4F no 41', 'a25e0c1c1b202c784901433d0ec02e3c', b'0', '2019-01-12 22:42:42', '2019-01-18 21:48:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `produk_id` (`produk_id`),
  ADD UNIQUE KEY `pengiriman_id` (`pengiriman_id`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
