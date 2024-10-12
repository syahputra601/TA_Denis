-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2017 at 07:56 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpemesanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbarang`
--

CREATE TABLE `tbarang` (
  `idbarang` varchar(10) NOT NULL,
  `namabarang` varchar(20) NOT NULL,
  `typebarang` varchar(20) NOT NULL,
  `kategoribarang` varchar(50) NOT NULL,
  `keteranganbarang` varchar(100) NOT NULL,
  `beratbarang` int(11) NOT NULL,
  `stokbarang` int(11) NOT NULL,
  `hargabarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbarang`
--

INSERT INTO `tbarang` (`idbarang`, `namabarang`, `typebarang`, `kategoribarang`, `keteranganbarang`, `beratbarang`, `stokbarang`, `hargabarang`) VALUES
('BRG-001', 'Vertu', 'Roll', 'Amplas', 'P60-P400', 5000, 39, 350000),
('BRG-002', 'Neon', 'Lampu', 'Aksesoris Mobil', 'Hijau-Merah-Biru', 500, 30, 250000),
('BRG-003', 'Diamond Weel', 'Batu Potong', 'Gurinda', 'P80-P150', 200, 60, 4000),
('BRG-004', 'Europlas', 'Lembar', 'Amplas', 'P60-P400', 100, 1000, 2000),
('BRG-005', 'Paint', 'Roll', 'Kuas', 'Putih', 300, 70, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `tpelanggan`
--

CREATE TABLE `tpelanggan` (
  `idpel` varchar(10) NOT NULL,
  `namapel` varchar(30) NOT NULL,
  `tgllahirpel` date NOT NULL,
  `jeniskelpel` varchar(15) NOT NULL,
  `alamatpel` varchar(200) NOT NULL,
  `emailpel` varchar(50) NOT NULL,
  `telppel` varchar(15) NOT NULL,
  `statuspel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpelanggan`
--

INSERT INTO `tpelanggan` (`idpel`, `namapel`, `tgllahirpel`, `jeniskelpel`, `alamatpel`, `emailpel`, `telppel`, `statuspel`) VALUES
('PLG-001', 'Jiny', '1990-10-10', 'Perempuan', 'jl.jelambar baru', 'jiny@gmail.com', '0821-9982-7711', 'Belum Menikah'),
('PLG-002', 'Jono', '1992-07-10', 'Laki-Laki', 'jl.jelambar utama', 'jono@gmail.com', '0899-1889-2981', 'Menikah'),
('PLG-003', 'Jena', '1980-01-22', 'Perempuan', 'jl.jelambar madya', 'jena@gmail.com', '0856-2001-0312', 'Menikah'),
('PLG-004', 'uki', '2017-05-01', 'Perempuan', 'jl.asem', 'uki@gmail.com', '0988-7786-6575', 'Belum Menikah');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` varchar(15) NOT NULL,
  `idpel` varchar(10) NOT NULL,
  `tglpesan` date NOT NULL,
  `idsales` varchar(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idpel`, `tglpesan`, `idsales`, `total`) VALUES
('TRS-000000', 'PLG-003', '2017-08-12', 'SLS-003', 4000),
('TRS-00000011', 'PLG-003', '2017-08-12', 'SLS-001', 350000),
('TRS-00000012', 'PLG-002', '2017-08-12', 'SLS-002', 3500000),
('TRS-000001', 'PLG-002', '2017-07-21', ' SLS-001', 120000),
('TRS-000002', 'PLG-001', '2017-08-04', 'SLS-001', 700000),
('TRS-000003', 'PLG-002', '2017-08-04', 'SLS-002', 1000000),
('TRS-000004', 'PLG-003', '2017-08-04', 'SLS-003', 40000),
('TRS-000005', 'PLG-003', '2017-08-07', 'SLS-003', 1050000),
('TRS-000006', 'PLG-004', '2017-08-12', 'SLS-003', 24500000),
('TRS-000007', 'PLG-002', '2017-08-12', 'SLS-002', 830000),
('TRS-000008', 'PLG-001', '2017-08-12', 'SLS-002', 4000),
('TRS-000009', 'PLG-002', '2017-08-12', 'SLS-002', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `idpesan` int(15) NOT NULL,
  `idtransaksi` varchar(12) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `jumlahbeli` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`idpesan`, `idtransaksi`, `idbarang`, `jumlahbeli`) VALUES
(1, 'TRS-000001', 'P001', 1),
(2, 'TRS-000001', 'P001', 2),
(3, 'TRS-000002', 'BRG-001', 2),
(4, 'TRS-000003', 'BRG-002', 4),
(5, 'TRS-000004', 'BRG-003', 10),
(6, 'TRS-000005', 'BRG-002', 4),
(7, 'TRS-000005', 'BRG-005', 2),
(8, 'TRS-000006', 'BRG-001', 70),
(9, 'TRS-000007', 'BRG-003', 20),
(10, 'TRS-000007', 'BRG-005', 30),
(11, 'TRS-00000011', 'BRG-001', 1),
(12, 'TRS-00000012', 'BRG-001', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tsales`
--

CREATE TABLE `tsales` (
  `idsales` varchar(10) NOT NULL,
  `namasales` varchar(30) NOT NULL,
  `tgllahirsales` date NOT NULL,
  `jeniskelsales` varchar(10) NOT NULL,
  `alamatsales` varchar(200) NOT NULL,
  `emailsales` varchar(50) NOT NULL,
  `telpsales` varchar(15) NOT NULL,
  `statussales` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsales`
--

INSERT INTO `tsales` (`idsales`, `namasales`, `tgllahirsales`, `jeniskelsales`, `alamatsales`, `emailsales`, `telpsales`, `statussales`) VALUES
('SLS-001', 'Mei Dwi Handayani', '1997-04-20', 'Perempuan', 'jl.kayu besar', 'meidwi@gmail.com', '0896-3772-8109', 'Belum Menikah'),
('SLS-002', 'Rostiana', '1975-10-09', 'Perempuan', 'jl.cengkareng dalam', 'rostiana@gmail.com', '0821-9937-7882', 'Belum Menikah'),
('SLS-003', 'Rendy', '1995-09-09', 'Laki-Laki', 'jl.pasar kapuk', 'rendy@gmail.com', '0821-1112-4244', 'Belum Menikah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `status`) VALUES
(1, 'admin', 'admin123', 'admin@gmail.com', '1'),
(2, 'pimpinan', 'pimpinan123', 'pimpinan@gmail.com', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbarang`
--
ALTER TABLE `tbarang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `namabarang` (`namabarang`);

--
-- Indexes for table `tpelanggan`
--
ALTER TABLE `tpelanggan`
  ADD PRIMARY KEY (`idpel`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`idpesan`);

--
-- Indexes for table `tsales`
--
ALTER TABLE `tsales`
  ADD PRIMARY KEY (`idsales`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `idpesan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
