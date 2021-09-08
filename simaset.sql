-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 06:29 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simaset`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `idAset` int(11) NOT NULL,
  `kodeAset` varchar(100) NOT NULL,
  `namaAset` varchar(150) NOT NULL,
  `jenisAset` varchar(100) NOT NULL,
  `kategoriAset` varchar(100) NOT NULL,
  `nilaiAset` bigint(20) NOT NULL,
  `lokasiAset` varchar(200) NOT NULL,
  `tanggalTerimaAset` date NOT NULL,
  `kondisiAset` varchar(100) NOT NULL,
  `deskripsiTambahanAset` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`idAset`, `kodeAset`, `namaAset`, `jenisAset`, `kategoriAset`, `nilaiAset`, `lokasiAset`, `tanggalTerimaAset`, `kondisiAset`, `deskripsiTambahanAset`) VALUES
(1, 'PC00001', 'Komputer 1', '--Jenis Aset--', '--Kategori Aset--', 10000, '-', '2019-09-09', 'Bagus', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenisaset`
--

CREATE TABLE `jenisaset` (
  `idJenisAset` int(11) NOT NULL,
  `namaJenisAset` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisaset`
--

INSERT INTO `jenisaset` (`idJenisAset`, `namaJenisAset`) VALUES
(1, 'Aset Tetap'),
(2, 'Aset Tak Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriaset`
--

CREATE TABLE `kategoriaset` (
  `idKategoriAset` int(11) NOT NULL,
  `namaKategoriAset` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriaset`
--

INSERT INTO `kategoriaset` (`idKategoriAset`, `namaKategoriAset`) VALUES
(1, 'Alat Elektronik'),
(2, 'Alat Tulis Kantor');

-- --------------------------------------------------------

--
-- Table structure for table `kondisiaset`
--

CREATE TABLE `kondisiaset` (
  `idKondisiAset` int(11) NOT NULL,
  `namaKondisiAset` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisiaset`
--

INSERT INTO `kondisiaset` (`idKondisiAset`, `namaKondisiAset`) VALUES
(2, 'Bagus'),
(3, 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `username`, `password`, `level`) VALUES
(11, 'admin', '123', 'Admin'),
(12, 'ondri', '1234', 'Pimpinan'),
(13, 'riyono', '123', 'Kasubag');

-- --------------------------------------------------------

--
-- Table structure for table `riwayataset`
--

CREATE TABLE `riwayataset` (
  `idRiwayat` int(11) NOT NULL,
  `idAsetRiwayat` int(11) NOT NULL,
  `kondisiAsetRiwayat` varchar(11) NOT NULL,
  `solusiAsetRiwayat` varchar(50) NOT NULL,
  `tanggalPerubahanKondisiRiwayat` datetime NOT NULL,
  `catatanAsetRiwayat` text NOT NULL,
  `persetujuanAsetRiwayat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayataset`
--

INSERT INTO `riwayataset` (`idRiwayat`, `idAsetRiwayat`, `kondisiAsetRiwayat`, `solusiAsetRiwayat`, `tanggalPerubahanKondisiRiwayat`, `catatanAsetRiwayat`, `persetujuanAsetRiwayat`) VALUES
(1, 1, 'Baik', 'Tetap Gunakan', '2019-05-10 00:00:00', 'pppp', 'Ditolak'),
(2, 1, 'Baik', 'Tetap Gunakan', '2019-05-10 00:00:00', '-', 'Diterima'),
(3, 1, 'Rusak', 'Ganti', '2019-05-10 00:00:00', '-', 'Diterima'),
(4, 1, 'Baik', 'Tetap Gunakan', '2019-05-10 11:26:30', '', 'Ditolak'),
(5, 1, 'Baik', 'Perbaiki', '2019-05-11 07:37:31', '---\r\n', 'Ditolak'),
(6, 1, 'Rusak', 'Ganti', '2019-05-11 09:24:36', '', 'Ditolak'),
(7, 1, 'Bagus', 'Ganti', '2019-05-13 05:25:19', '---', 'Diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`idAset`);

--
-- Indexes for table `jenisaset`
--
ALTER TABLE `jenisaset`
  ADD PRIMARY KEY (`idJenisAset`);

--
-- Indexes for table `kategoriaset`
--
ALTER TABLE `kategoriaset`
  ADD PRIMARY KEY (`idKategoriAset`);

--
-- Indexes for table `kondisiaset`
--
ALTER TABLE `kondisiaset`
  ADD PRIMARY KEY (`idKondisiAset`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `riwayataset`
--
ALTER TABLE `riwayataset`
  ADD PRIMARY KEY (`idRiwayat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `idAset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenisaset`
--
ALTER TABLE `jenisaset`
  MODIFY `idJenisAset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategoriaset`
--
ALTER TABLE `kategoriaset`
  MODIFY `idKategoriAset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kondisiaset`
--
ALTER TABLE `kondisiaset`
  MODIFY `idKondisiAset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `riwayataset`
--
ALTER TABLE `riwayataset`
  MODIFY `idRiwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
