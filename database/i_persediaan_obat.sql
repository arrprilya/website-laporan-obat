-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 02:02 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_persediaan_obat`
--

-- --------------------------------------------------------

--
-- Table structure for table `is_obat`
--

CREATE TABLE `is_obat` (
  `kode_obat` varchar(7) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_obat`
--

INSERT INTO `is_obat` (`kode_obat`, `nama_obat`,`satuan`, `stok`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('B000001', 'Zoralin', 'Box', 50, 3, '2017-03-31 17:00:00', 3, '2017-03-31 17:00:00'),
('B000002', 'Zinc', 'Box', 100, 3, '2017-04-01 17:00:00', 3, '2017-04-01 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `is_supplier`
--
CREATE TABLE `is_supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Dumping data for table `is_supplier`
--

INSERT INTO `is_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `kota`, `no_telepon`, `created_user`, `created_date`, `updated_user`, `updated_date`)
VALUES
(1, 'PT KIMIA FARMA', 'Jl. Sei Jang', 'Tanjung Pinang', '081234567890', 1, '2024-07-12 10:00:00', 1, '2024-07-12 10:00:00'),
(2, 'PT KALISTA PRIMA', 'Jl. Pulau Raja 7', 'Tanjung Pinang', '082345678901', 2, '2024-07-12 10:00:00', 2, '2024-07-12 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `is_obat_masuk`
--

CREATE TABLE `is_obat_masuk` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode_transaksi`),
  KEY `kode_obat` (`kode_obat`),
  KEY `created_user` (`created_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_obat_masuk`
--

INSERT INTO `is_obat_masuk` (`kode_transaksi`, `tanggal_masuk`, `kode_obat`, `jumlah_masuk`, `created_user`, `created_date`) VALUES
('TM-2017-0000001', '2017-04-01', 'B000001', 100, 3, '2017-04-01 11:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `is_obat_keluar`
--

CREATE TABLE `is_obat_keluar` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode_transaksi`),
  KEY `kode_obat` (`kode_obat`),
  KEY `created_user` (`created_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_obat_keluar`
--

INSERT INTO `is_obat_keluar` (`kode_transaksi`, `tanggal_keluar`, `kode_obat`, `jumlah_keluar`, `created_user`, `created_date`) VALUES
('TK-2017-0000001', '2024-07-12', 'B000001', 50, 3, '2024-07-12 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `is_users`
--

CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `level` (`hak_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'indrasatya', 'Indra Setyawantoro', '41504508b3cec65b1313905001118579', 'indra.styawantoro@gmail.com', '085669919769', 'indrasatya.jpg', 'Super Admin', 'aktif', '2017-04-01 08:15:15', '2017-04-01 08:15:15'),
(2, 'kadina', 'Kadina Putri', '202cb962ac59075b964b07152d234b70', 'kadinaputri@gmail.com', '085680892909', 'kadina.png', 'Manajer', 'aktif', '2017-04-01 08:15:15', '2017-04-01 08:15:15'),
(3, 'danang', 'Danang Kesuma', '202cb962ac59075b964b07152d234b70', 'danang@gmail.com', '085758858855', '', 'Gudang', 'aktif', '2017-04-01 08:15:15', '2017-04-01 08:15:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `is_obat`
--
ALTER TABLE `is_obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `is_supplier`
--
ALTER TABLE `is_supplier`
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

  

--
-- Indexes for table `is_obat_masuk`
--
ALTER TABLE `is_obat_masuk`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `created_user` (`created_user`);

--
-- Indexes for table `is_obat_keluar`
--
ALTER TABLE `is_obat_keluar`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `created_user` (`created_user`);

--
-- Indexes for table `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `is_obat`
--
ALTER TABLE `is_obat`
  ADD CONSTRAINT `is_obat_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_obat_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_supplier`
--
ALTER TABLE `is_supplier`
  ADD CONSTRAINT `fk_supplier_created_user` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_supplier_updated_user` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_obat_masuk`
--
ALTER TABLE `is_obat_masuk`
  ADD CONSTRAINT `is_obat_masuk_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `is_obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_obat_masuk_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_obat_keluar`
--
ALTER TABLE `is_obat_keluar`
  ADD CONSTRAINT `is_obat_keluar_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `is_obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_obat_keluar_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
