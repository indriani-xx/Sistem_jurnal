-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2025 at 03:04 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisri`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int NOT NULL,
  `id_siswa` int NOT NULL,
  `tgl_absensi` date NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_siswa`, `tgl_absensi`, `keterangan`) VALUES
(3, 17, '2025-09-23', 'sakit'),
(5, 20, '2025-10-04', '');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `tgl_lahir`, `alamat`, `telp`, `username`, `password`) VALUES
(1, 'pakyos', '2009-05-04', 'jalan kanan kiri', '0984746353', 'yoo', '6852396414255aafd1518078c3688d04'),
(2, 'subak', '2009-05-04', 'jalan kanan kiri', '0984746353', 'markeu', '6b2a5b7e6dbf84cd341242944b3d35ec'),
(3, 'manusia', '2009-05-04', 'jalan kanan kiri', '0984746353', 'tottoo', 'e9ab7341fa1ca17acdc7c60c14dd0083'),
(4, 'marina', '2025-09-04', 'indri45', '98763', 'Indri', 'd41d8cd98f00b204e9800998ecf8427e'),
(5, 'dududud', '2025-09-05', 'mimi21', '098876654321', 'mimi12', 'd41d8cd98f00b204e9800998ecf8427e'),
(6, 'adudu', '2025-09-01', 'kanan kiri', '0987', 'adudubaik', '43f3e8c8f2fa74783015be40f64c91f6'),
(7, 'dududud', '2025-09-24', 'msndjsduhdfbc', '9876544444', 'dudu22', '43f3e8c8f2fa74783015be40f64c91f6'),
(8, 'mamari', '2025-10-13', 'kejawen', '0987654321', 'metaksu', '6ab328ae6825d4645628a7305024a8f6');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int NOT NULL,
  `id_guru` int NOT NULL,
  `tgl_mengajar` date NOT NULL,
  `id_kelas` int NOT NULL,
  `materi` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_guru`, `tgl_mengajar`, `id_kelas`, `materi`, `keterangan`) VALUES
(1, 1, '2025-10-11', 5, 'apakah kamu lelah dengan sekolah?', 'mengajarkan kita tata cara dan langkah - langkah untuk membakar sekolah'),
(2, 3, '2025-10-11', 2, 'perjalanan hidup', 'mengajarkan kita untuk lebih lapang dalam menjalani hidup'),
(3, 5, '2025-10-11', 4, 'perjalanan hidup', 'mengajarkan kita untuk lebih lapang dalam menjalani hidup'),
(4, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(5, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(6, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(7, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(8, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(9, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(10, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(11, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(12, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(13, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(14, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(15, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(16, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(17, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(18, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(19, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(20, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(21, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(22, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(23, 4, '2025-06-07', 2, 'mendaki gunung', 'dakilah gunung setinggi mungkin'),
(25, 1, '2025-10-21', 4, 'apakah kamu lelah dengan sekolah?', 'mengajarkan kita tata cara dan langkah - langkah untuk membakar sekolah'),
(26, 1, '2025-10-21', 2, 'apakah kamu lelah dengan sekolah?', 'mengajarkan kita tata cara dan langkah - langkah untuk membakar sekolah'),
(27, 1, '2025-10-21', 2, 'perjalanan hidup', 'mengajarkan kita tata cara dan langkah - langkah untuk membakar sekolah'),
(28, 1, '2025-11-27', 4, 'perjalanan hidup', 'mengajarkan kita untuk lebih lapang dalam menjalani hidup'),
(118, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(119, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(120, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(121, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(122, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(123, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(124, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(125, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(126, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(127, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(128, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(129, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(130, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(131, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(132, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(133, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd'),
(134, 1, '2025-04-05', 2, 'jdjdslksjddjdc', 'ururyyghcncmd');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `singkatan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `singkatan`) VALUES
(1, 'Rekayasa Perangkat Lunak', 'RPL'),
(2, 'Seni Rupa', 'SR'),
(4, 'Animasi', 'AN'),
(6, 'jddfnfj', 'nsjdj'),
(7, 'Desain Komunikasi Visual', 'DKV'),
(8, 'Animas', 'AN'),
(9, 'Desain Interior dan Teknik Furnitur', 'DITF'),
(10, 'yooo bakar sekolah', 'YBS'),
(11, 'yooo bakar sekolah', 'YBS');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `nama_kelas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_guru` int NOT NULL,
  `id_jurusan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_guru`, `id_jurusan`) VALUES
(2, '11 RPL', 1, 1),
(4, '10 DKV', 4, 7),
(5, 'teknik membakar sekolah lain', 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `mpk`
--

CREATE TABLE `mpk` (
  `id_mpk` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_kelas` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mpk`
--

INSERT INTO `mpk` (`id_mpk`, `id_siswa`, `id_kelas`, `username`, `password`) VALUES
(2, 18, 4, 'Indri', 'baik12');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `tgl_lahir`, `alamat`, `telp`, `username`, `password`) VALUES
(1, 'pak dudung', '2009-06-06', 'jalan abc 123', '08786859473', 'dudunganakku12', '12345'),
(2, 'bu tia', '2025-09-28', 'kejawen', '9987654320', 'ucup_semeleketew', '783708c568edc3fdd7d65fdbc7fb3671'),
(3, 'bang ucup', '2025-10-04', 'msndjsduhdfbc', '90987465', 'tiaw33', '357e10f1077a5a0e1069f695626bc3d9');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_siswa` int NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `bulan` int NOT NULL,
  `nominal` int NOT NULL,
  `metode` varchar(10) NOT NULL,
  `id_pegawai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_siswa`, `tgl_pembayaran`, `bulan`, `nominal`, `metode`, `id_pegawai`) VALUES
(1, 17, '2025-10-11', 1, 900000, 'cod', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `no_absen` int NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `nis` int NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `id_kelas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `no_absen`, `tgl_lahir`, `alamat`, `telp`, `nis`, `nisn`, `id_kelas`) VALUES
(17, 'Aksa', 20, '2009-05-04', 'br.mengkaje kangin', '0987643145', 12345, '0927645', 2),
(18, 'Sangkara', 17, '2008-03-04', 'br.mengkaje kangin', '0987643145', 12345, '0927645', 2),
(20, 'warsa', 2, '3009-05-04', 'br.mengkaje kangin', '0987643145', 12345, '0927645', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_kelas` (`id_kelas`,`id_guru`),
  ADD KEY `id_kelas_2` (`id_kelas`,`id_jurusan`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas_3` (`id_kelas`);

--
-- Indexes for table `mpk`
--
ALTER TABLE `mpk`
  ADD PRIMARY KEY (`id_mpk`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mpk`
--
ALTER TABLE `mpk`
  MODIFY `id_mpk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jurnal_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mpk`
--
ALTER TABLE `mpk`
  ADD CONSTRAINT `mpk_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mpk_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
