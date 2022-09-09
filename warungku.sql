-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 03:31 PM
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
-- Database: `warungku`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nm_barang` text NOT NULL,
  `merk` varchar(200) NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_edit` date DEFAULT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `nm_barang`, `merk`, `hrg_beli`, `hrg_jual`, `id_satuan`, `stok`, `tgl_masuk`, `tgl_edit`, `foto`) VALUES
(61, 8, 'Pensil 2B', 'Faber Castel', 2000, 4000, 4, 90, '2022-07-17', '0000-00-00', '62d4146de543d.png'),
(62, 8, 'Buku Tulis', 'Campus', 3000, 6000, 4, 110, '2022-07-17', '0000-00-00', '62d43345dc1de.jpg'),
(63, 8, 'Bulpen', 'Standart', 1500, 3000, 4, 99, '2022-07-17', '0000-00-00', '62d433767e425.jpg'),
(64, 8, 'Penghapus', 'Staedtler', 1000, 2000, 4, 98, '2022-07-17', '0000-00-00', '62d433a865efa.jpg'),
(65, 8, 'Tipex', 'Kenko', 2500, 3500, 4, 100, '2022-07-17', '0000-00-00', '62d433d68beb3.jpg'),
(66, 9, 'Beras', 'Beras', 6000, 9000, 2, 94, '2022-07-17', '2022-07-18', '62d43bd2b94b0.jpg'),
(67, 9, 'Minyak', 'Bimoli', 30000, 40000, 9, 95, '2022-07-17', '0000-00-00', '62d43490d8caa.jpg'),
(68, 9, 'Telur', 'Telur', 8000, 12000, 2, 113, '2022-07-17', '0000-00-00', '62d434ca8c2d0.jpg'),
(69, 9, 'Tepung', 'Segitiga Biru', 6000, 9000, 4, 100, '2022-07-17', '0000-00-00', '62d4350cd42e6.jpg'),
(70, 9, 'Mie Goreng', 'Indomie', 2000, 3000, 4, 95, '2022-07-17', '0000-00-00', '62d435343bdb0.jpg'),
(71, 9, 'Mie Kuah', 'Indomie', 2000, 3000, 4, 100, '2022-07-17', '0000-00-00', '62d4355110167.jpg'),
(72, 19, 'Detergen', 'Daia', 4000, 7000, 4, 100, '2022-07-17', '0000-00-00', '62d4358c42774.jpg'),
(73, 19, 'Soklin Lantai', 'Soklin', 10000, 15000, 9, 98, '2022-07-17', '2022-07-17', '62d435c360bb3.jpg'),
(74, 18, 'Bumbu Racik', 'Indofood', 1000, 2000, 4, 100, '2022-07-17', '0000-00-00', '62d435fd51529.jpg'),
(75, 18, 'Garam', 'Cap kapal', 2000, 3000, 4, 100, '2022-07-17', '0000-00-00', '62d4362ce66d7.jpg'),
(76, 18, 'Kunyit Bubuk', 'Desaku', 1500, 2500, 4, 99, '2022-07-17', '0000-00-00', '62d43692b7e7e.jpg'),
(77, 18, 'Merica Bubuk', 'Ladaku', 500, 1500, 4, 100, '2022-07-17', '0000-00-00', '62d436b8688e4.jpg'),
(78, 18, 'Masako', 'Ajinomoto', 1500, 2000, 4, 90, '2022-07-17', '0000-00-00', '62d436e31b83e.png'),
(79, 18, 'Micin', 'Ajinomoto', 2000, 4000, 4, 100, '2022-07-17', '0000-00-00', '62d43700dcf65.jpg'),
(80, 18, 'Royco', 'Royco', 2000, 3500, 4, 100, '2022-07-17', '0000-00-00', '62d437218838e.jpg'),
(81, 22, 'Biskuit Kelapa', 'Roma', 8000, 10000, 4, 100, '2022-07-17', '0000-00-00', '62d4374ed44e6.jpg'),
(82, 22, 'Kripik Kentang', 'Chitato', 4000, 8000, 4, 100, '2022-07-17', '2022-07-17', '62d4377e85290.jpg'),
(83, 22, 'Cokelat', 'Silverqueen', 8000, 14000, 4, 98, '2022-07-17', '0000-00-00', '62d437b0abd3b.jpg'),
(84, 22, 'Es Krim', 'Walls', 1000, 4000, 4, 100, '2022-07-17', '0000-00-00', '62d43816b1130.jpg'),
(85, 22, 'Kripik kentang', 'Lays', 7000, 9000, 4, 100, '2022-07-17', '0000-00-00', '62d4384678195.jpg'),
(86, 22, 'Permen', 'Lolipop', 2000, 5000, 4, 100, '2022-07-17', '0000-00-00', '62d4387d2e936.jpg'),
(87, 22, 'Roti', 'Sari Roti', 2000, 4500, 4, 100, '2022-07-17', '0000-00-00', '62d438aaec5af.jpg'),
(88, 20, 'Boneka', 'Boneka', 20000, 30000, 4, 95, '2022-07-17', '0000-00-00', '62d438ce607e8.jpg'),
(89, 20, 'Mobil-mobilan', 'Car toys', 15000, 25000, 4, 100, '2022-07-17', '0000-00-00', '62d438fad52e3.jpg'),
(90, 20, 'Rubik', 'Rubik', 15000, 35000, 4, 100, '2022-07-17', '0000-00-00', '62d4393117f76.jpg'),
(92, 10, 'Air Mineral', 'Aqua', 2000, 3000, 4, 90, '2022-07-17', '0000-00-00', '62d439b8f345d.jpg'),
(93, 10, 'Minuman Soda', 'Coca cola', 4000, 6000, 4, 100, '2022-07-17', '0000-00-00', '62d43a0c2a755.jpg'),
(94, 10, 'Minuman Soda', 'Fanta', 4000, 6000, 4, 100, '2022-07-17', '0000-00-00', '62d43a2e89071.jpg'),
(95, 10, 'Minuman Jeruk', 'Floridina', 2000, 4000, 4, 99, '2022-07-17', '0000-00-00', '62d43a5d91ac1.jpg'),
(96, 10, 'Kopi Hitam', 'Kapal Api', 1000, 3000, 8, 100, '2022-07-17', '0000-00-00', '62d43aa105afe.jpg'),
(97, 13, 'Antimo', 'Antimo', 2000, 6000, 4, 100, '2022-07-17', '0000-00-00', '62d43ac7940e2.jpg'),
(98, 21, 'Sapu', 'Sapu', 8000, 12000, 4, 98, '2022-07-17', '0000-00-00', '62d43aee6a400.jpg'),
(99, 11, 'Pasta gigi', 'Pepsodent', 2000, 4000, 4, 100, '2022-07-17', '0000-00-00', '62d43b5465273.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `id_jual` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `totalAll` double NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `id_jual`, `pembayaran`, `totalAll`, `kembalian`) VALUES
(47437, 435, 15000, 12000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(200) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`, `tgl_input`) VALUES
(8, 'Alat Tulis Kantor', '2022-07-07'),
(9, 'Bahan mentah', '2022-07-07'),
(10, 'Minuman', '2022-07-07'),
(11, 'Perlengkapan Mandi', '2022-07-07'),
(13, 'Obat', '2022-07-07'),
(18, 'Bumbu dapur', '2022-07-15'),
(19, 'Bahan Pembersih', '2022-07-15'),
(20, 'Mainan', '2022-07-15'),
(21, 'Perabotan Rumah Tangga', '2022-07-16'),
(22, 'Cemilan', '2022-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `lappembelian`
--

CREATE TABLE `lappembelian` (
  `no_ref` varchar(200) NOT NULL,
  `id_Brg` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL,
  `penerima` varchar(200) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lappembelian`
--

INSERT INTO `lappembelian` (`no_ref`, `id_Brg`, `jumlah`, `total`, `penerima`, `tgl_masuk`) VALUES
('REF1000', 68, 20, 160000, 'Gina Fikria Sofha', '2022-07-17'),
('REF1001', 62, 10, 30000, 'Fajar Febrianto', '2022-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `lappenjualan`
--

CREATE TABLE `lappenjualan` (
  `id_lapPenjualan` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `modal` double NOT NULL,
  `total` double NOT NULL,
  `id_profil` int(11) NOT NULL,
  `tgl_jual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lappenjualan`
--

INSERT INTO `lappenjualan` (`id_lapPenjualan`, `id_brg`, `jumlah`, `modal`, `total`, `id_profil`, `tgl_jual`) VALUES
(47378, 67, 5, 150000, 200000, 34, '2022-07-17'),
(47379, 66, 5, 30000, 45000, 34, '2022-07-17'),
(47380, 88, 5, 100000, 150000, 34, '2022-07-17'),
(47381, 70, 5, 10000, 15000, 34, '2022-07-17'),
(47382, 92, 1, 2000, 3000, 36, '2022-07-17'),
(47383, 92, 1, 2000, 3000, 36, '2022-07-17'),
(47384, 92, 1, 2000, 3000, 36, '2022-07-17'),
(47385, 95, 1, 2000, 4000, 36, '2022-07-17'),
(47386, 83, 2, 16000, 28000, 36, '2022-07-17'),
(47387, 61, 10, 20000, 40000, 33, '2022-07-18'),
(47388, 92, 1, 2000, 3000, 33, '2022-07-18'),
(47389, 92, 5, 10000, 15000, 34, '2022-07-18'),
(47390, 66, 1, 6000, 9000, 34, '2022-07-18'),
(47391, 68, 5, 40000, 60000, 33, '2022-07-18'),
(47392, 92, 1, 2000, 3000, 33, '2022-07-19'),
(47393, 68, 1, 8000, 12000, 33, '2022-07-19'),
(47394, 63, 1, 1500, 3000, 33, '2022-07-19'),
(47395, 68, 1, 8000, 12000, 33, '2022-07-19'),
(47396, 64, 1, 1000, 2000, 33, '2022-07-19'),
(47397, 64, 1, 1000, 2000, 33, '2022-07-19'),
(47398, 76, 1, 1500, 2500, 33, '2022-07-19'),
(47399, 98, 1, 8000, 12000, 33, '2022-07-19'),
(47400, 78, 10, 15000, 20000, 33, '2022-07-19'),
(47401, 73, 2, 20000, 30000, 33, '2022-07-20'),
(47402, 98, 1, 8000, 12000, 33, '2022-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(16) NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `level`) VALUES
(12, 'ega', '123', 'Admin'),
(13, 'gina', '123', 'User'),
(14, 'fajar', '123', 'User'),
(15, 'bilqis', '123', 'User'),
(16, 'dika', '123', 'User'),
(17, 'ini', 'apa', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_jual` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL,
  `tanggal_terjual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_jual`, `idBarang`, `id_profil`, `jumlah`, `total`, `tanggal_terjual`) VALUES
(435, 98, 33, 1, 12000, '2022-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `noHp` varchar(200) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` varchar(200) NOT NULL,
  `jns_kelamin` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `id_login`, `nama`, `nik`, `email`, `noHp`, `tempat_lahir`, `tanggal_lahir`, `umur`, `jns_kelamin`, `status`, `alamat`, `foto`) VALUES
(33, 12, 'Ega Permana', '3209212408030006', 'permanaega677@gmail.com', '085794912280', 'Cirebon', '2003-08-24', '18', ' Laki-laki', ' Belum Menikah', 'Ds. Cipeujeuh Kulon                        ', '62d40877cf602.jpg'),
(34, 13, 'Gina Fikria Sofha', '3209212908020007', 'ginasofha29@gmail.com', '085721452354', 'Cirebon', '2002-08-29', '19', 'Perempuan', 'Menikah', 'Ds. Pajaten    ', '62d43d7c2a4da.jpg'),
(35, 14, 'Fajar Febrianto', '3209212002020001', 'fajarfebrianto@gmail.com', '0987654321', 'Cirebon', '2002-02-20', '20', ' Laki-laki', ' Belum Menikah', 'Ds. Wanakaya                        ', '62d40f542a98c.jpg'),
(36, 15, 'Bilqis Feby Faizah', '12345678910', 'bilqis@gmail.co.id', '1234567891011', 'Cirebon', '2016-02-27', '6', 'Perempuan', ' Belum Menikah', 'Ds. Cipeujeuh Kulon                        ', '62d43e2ae0760.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nm_satuan` varchar(200) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nm_satuan`, `tgl_input`) VALUES
(2, 'Kg', '2022-07-07'),
(4, 'PCS', '2022-07-07'),
(7, 'Box', '2022-07-17'),
(8, 'Renteng', '2022-07-17'),
(9, 'Liter', '2022-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `struk`
--

CREATE TABLE `struk` (
  `id_struk` int(11) NOT NULL,
  `id_Barang` varchar(200) NOT NULL,
  `id_Profil` int(11) NOT NULL,
  `id_Kasir` int(11) NOT NULL,
  `jumlah` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `tanggal_input` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `struk`
--

INSERT INTO `struk` (`id_struk`, `id_Barang`, `id_Profil`, `id_Kasir`, `jumlah`, `total`, `tanggal_input`) VALUES
(47539, '98', 33, 47437, '1', '12000', '2022-08-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lappembelian`
--
ALTER TABLE `lappembelian`
  ADD PRIMARY KEY (`no_ref`);

--
-- Indexes for table `lappenjualan`
--
ALTER TABLE `lappenjualan`
  ADD PRIMARY KEY (`id_lapPenjualan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `struk`
--
ALTER TABLE `struk`
  ADD PRIMARY KEY (`id_struk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47438;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lappenjualan`
--
ALTER TABLE `lappenjualan`
  MODIFY `id_lapPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47403;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=436;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `struk`
--
ALTER TABLE `struk`
  MODIFY `id_struk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47540;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
