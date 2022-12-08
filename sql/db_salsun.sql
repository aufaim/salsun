-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 05:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_salsun`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membeli`
--

CREATE TABLE `membeli` (
  `Metode_Pembayaran` varchar(10) NOT NULL,
  `Bukti_Pembayaran` blob NOT NULL,
  `Total_Pembayaran` int(11) NOT NULL,
  `Tgl_Pembayaran` date NOT NULL,
  `kode_produk` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `alamat_pembeli` text NOT NULL,
  `email_pembeli` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `alamat_pembeli`, `email_pembeli`, `username`, `password`, `no_hp`, `type`) VALUES
(2, 'Restu Hikmal', 'Perumahan Pantai Indah Blok E no.7', 'restuh@gmail.com', 'restu', '827ccb0eea8a706c4c34a16891f84e7b', '08938902323', 'user'),
(3, 'Restu Hikmal', 'Perumahan Pantai Indah Blok E no.7', 'restuh@gmail.com', 'rstuhkml', '827ccb0eea8a706c4c34a16891f84e7b', '08238734244', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_penjual` varchar(100) NOT NULL,
  `telp_penjual` varchar(20) NOT NULL,
  `email_penjual` varchar(50) NOT NULL,
  `alamat_penjual` text NOT NULL,
  `pp_penjual` varchar(200) DEFAULT NULL,
  `type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `username`, `password`, `nama_penjual`, `telp_penjual`, `email_penjual`, `alamat_penjual`, `pp_penjual`, `type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Restu Hikmal', '082387551308', 'salsun.premium@gmail.com', 'Perumahan Pantai Indah Blok E No.7', 'photoprofil1668585354.jpg', 'admin'),
(2, 'admin2', '827ccb0eea8a706c4c34a16891f84e7b', 'Aisyah Beningsari Mahadi', '085354789087', 'aisyahmahadi@gmail.com', 'Botania 2', 'photoprofil1668585834.jpeg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama_produk`, `harga_produk`, `stok_produk`, `deskripsi_produk`, `gambar_produk`) VALUES
(25, 'Salad Strawberry Cheesecake', 50000, 25, '<p>Produk salad strawberry dengan kualitas <strong>premium </strong>dan rasanya yang enak. Produk ini dapat mengsehatkan tubuh karena terdapat <strong>vitamin C</strong> dan <strong>antioksidan&nbsp;</strong>yang mana dapat meningkatkan kesehatan jantung, mata, dan imunitas tubuh. Selain itu,&nbsp;kandungan vitamin C dan antioksidan pada buah&nbsp;<strong>strawberry</strong>&nbsp;juga efektif untuk mengurangi risiko pertumbuhan sel kanker pada tubuh.</p>\r\n\r\n<p>Ukuran : 550 ml</p>\r\n\r\n<p>Bahan Utama : Strawberry &amp; Keju</p>\r\n\r\n<p>&nbsp;</p>\r\n', '0ba861a6267eda710ff836d29e2a51551f4eb48272a2a3cd0fe96c293ed0c57bGambar7.jpeg'),
(26, 'Salad Oranye', 25000, 30, '<p>Salad rasa jeruk dengan kualitas <strong>P</strong><strong>remium</strong></p>\r\n', 'f459dcd993a52eedb73def99f0595eef517a539d234425c3d492d51cd8f24080Gambar1.jpeg'),
(27, 'Salad Coklat', 30000, 15, '<p>Salad rasa coklat <strong>belgia</strong></p>\r\n', '9dcf93ee6d307342f9826be2ac1c9be4255b8c1f695f65a9425e0d1ec87fa1faGambar2.jpeg'),
(28, 'Salad Straw', 25000, 10, '<p>Salad campuran antara strawberry dan jeruk</p>\r\n', 'a3046f31d5ad8c1e0af681456890926d31281cebf9a9d57b66517ce4c2396fc6Gambar8.jpeg'),
(29, 'Salad Strawberry Kiwi Premium', 50000, 12, '<p>Salad strawberry dan kiwi&nbsp;<strong>premium</strong> dengan versi jumbo</p>\r\n', '5b26134684c661732580ecf77f9d79cb5f32c76d9a24c8f5cd75d66a42d046a7Gambar6.jpeg'),
(30, 'Susu Coklat', 15000, 25, '<p>Susu rasa coklat <strong>premium</strong></p>\r\n', 'bd71dedc007ee06a4b342f6e7c941bbd46a1b0d0931db03bc1b73014626d8593gambar9.jpeg'),
(31, 'Susu Putih', 20000, 10, '<p>Susu rasa vanilla <strong>premium</strong></p>\r\n', 'b3de0cc4f7080ccd88ffd6775a697275bd902406845b05a506c33157a2d92b0aGambar3.jpeg'),
(32, 'Salad Strawberry Cup', 30000, 10, '<p>Salad Strawberry&nbsp;<strong>Premium</strong>&nbsp;<em>Cup Vers</em></p>\r\n', '0fca9c54367087e528b25175034238a252ee33376618ace9734566e9dd666b51Gambar10.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `membeli`
--
ALTER TABLE `membeli`
  ADD KEY `membeli_ibfk_1` (`kode_produk`),
  ADD KEY `membeli_ibfk_2` (`id_pembeli`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kode_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `membeli`
--
ALTER TABLE `membeli`
  ADD CONSTRAINT `membeli_ibfk_1` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `membeli_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
