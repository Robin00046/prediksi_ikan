-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2023 at 11:14 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prediksi_ikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_produk`
--

CREATE TABLE `data_produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(45) DEFAULT NULL,
  `jenis_produk` varchar(45) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `satuan` varchar(45) DEFAULT NULL,
  `total_stok` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_produk`
--

INSERT INTO `data_produk` (`id_produk`, `nama_produk`, `jenis_produk`, `harga`, `satuan`, `total_stok`) VALUES
(1, 'Cupang', 'Ikan', 50000, 'pcs', 41),
(2, 'pari 1', 'ikan', 50000, 'pcs', 150),
(3, 'ppp', 'pdk', 3000, 'pcs', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prediksi`
--

CREATE TABLE `prediksi` (
  `id` int NOT NULL,
  `data_produk_fk` int NOT NULL,
  `jumlah_penjualan` int NOT NULL,
  `bulan_prediksi` date NOT NULL,
  `hasil_prediksi` int NOT NULL,
  `mape` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prediksi`
--

INSERT INTO `prediksi` (`id`, `data_produk_fk`, `jumlah_penjualan`, `bulan_prediksi`, `hasil_prediksi`, `mape`) VALUES
(3, 3, 15, '2022-12-21', 15, '0'),
(10, 1, 11, '2022-12-01', 12, '-6'),
(11, 1, 12, '2022-11-02', 9, '25'),
(12, 1, 12, '2022-10-01', 9, '25'),
(13, 1, 3, '2022-09-30', 8, '-150'),
(14, 1, 12, '2022-08-01', 12, '0');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `total_harga` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_user` int NOT NULL,
  `jumlah_barang` int NOT NULL,
  `id_produk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `total_harga`, `tanggal`, `id_user`, `jumlah_barang`, `id_produk`) VALUES
(2, 45000, '2022-12-21', 1, 15, 3),
(3, 150000, '2022-09-30', 1, 3, 1),
(5, 600000, '2022-08-01', 1, 12, 1),
(6, 600000, '2022-11-02', 1, 12, 1),
(7, 600000, '2022-10-01', 1, 12, 1),
(11, 550000, '2022-12-01', 1, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'supardi', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `prediksi`
--
ALTER TABLE `prediksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_produk_fk` (`data_produk_fk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_user1_idx` (`id_user`),
  ADD KEY `fk_transaksi_data_produk1_idx` (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prediksi`
--
ALTER TABLE `prediksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prediksi`
--
ALTER TABLE `prediksi`
  ADD CONSTRAINT `prediksi_ibfk_1` FOREIGN KEY (`data_produk_fk`) REFERENCES `data_produk` (`id_produk`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_data_produk1` FOREIGN KEY (`id_produk`) REFERENCES `data_produk` (`id_produk`),
  ADD CONSTRAINT `fk_transaksi_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
