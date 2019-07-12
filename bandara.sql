-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2019 at 05:36 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bandara`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_mangkir`
--

CREATE TABLE `absen_mangkir` (
  `id_absensi` int(10) NOT NULL,
  `tgl_absensi` date NOT NULL,
  `id_karyawan` int(3) NOT NULL,
  `status` char(5) NOT NULL DEFAULT 'tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id_area` int(5) NOT NULL,
  `nama_area` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id_area`, `nama_area`) VALUES
(1, 'CheckinHall'),
(3, 'Dropzone'),
(4, 'departure'),
(5, 'arrival');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id_complain` int(10) NOT NULL,
  `tgl_complain` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` longtext NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id_karyawan` int(5) NOT NULL,
  `id_penilaian` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `gambar` varchar(50) NOT NULL DEFAULT 'bandara.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `username`, `password`, `level`, `gambar`) VALUES
(3, 'aa', 'admin', 'admin', 'admin', 'bandara.jpeg'),
(5, 'adam', 'adam', '123456', 'supervisor', '56.jpg'),
(6, 'arifina', 'arifin', '123456', 'attendant', 'bandara.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id_kerusakan` int(10) NOT NULL,
  `tgl_kerusakan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar` blob NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kodeqr`
--

CREATE TABLE `kodeqr` (
  `id_kodeqr` int(5) NOT NULL,
  `id_area` int(5) NOT NULL,
  `id_subarea` int(10) NOT NULL,
  `qr_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kodeqr`
--

INSERT INTO `kodeqr` (`id_kodeqr`, `id_area`, `id_subarea`, `qr_code`) VALUES
(29, 1, 30, '1-30.png'),
(33, 3, 30, '3-30.png'),
(35, 5, 2, '5-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_penilaian` int(5) NOT NULL,
  `id_material` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lost_found`
--

CREATE TABLE `lost_found` (
  `id_laf` int(10) NOT NULL,
  `tgl_laf` date NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost_found`
--

INSERT INTO `lost_found` (`id_laf`, `tgl_laf`, `keterangan`) VALUES
(1, '2019-07-02', 'Dompet hilang');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` int(5) NOT NULL,
  `nama_material` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id_material`, `nama_material`) VALUES
(1, 'lantai'),
(2, 'kaca'),
(3, 'tangga'),
(4, 'Pilar'),
(11, 'Dinding'),
(12, 'kursi');

-- --------------------------------------------------------

--
-- Table structure for table `memiliki`
--

CREATE TABLE `memiliki` (
  `id_standard` int(11) NOT NULL,
  `id_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memiliki`
--

INSERT INTO `memiliki` (`id_standard`, `id_material`) VALUES
(3, 2),
(2, 1),
(4, 1),
(17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(5) NOT NULL,
  `id_subarea` int(11) NOT NULL,
  `id_area` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_tinjauan` int(5) DEFAULT NULL,
  `penjelasan` varchar(200) DEFAULT NULL,
  `tindak_lanjut` varchar(200) DEFAULT NULL,
  `oleh` varchar(20) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hasil` int(200) DEFAULT NULL,
  `skor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_subarea`, `id_area`, `tanggal`, `kode_tinjauan`, `penjelasan`, `tindak_lanjut`, `oleh`, `waktu`, `hasil`, `skor`) VALUES
(10, 2, 1, '2019-07-06', NULL, NULL, NULL, NULL, '2019-07-08 11:50:45', NULL, 80),
(12, 2, 4, '2019-07-04', NULL, NULL, NULL, NULL, '2019-07-08 11:51:52', NULL, 25),
(13, 1, 1, '2019-07-09', NULL, NULL, NULL, NULL, '2019-07-09 00:55:25', NULL, 75);

-- --------------------------------------------------------

--
-- Table structure for table `ruang_lingkup`
--

CREATE TABLE `ruang_lingkup` (
  `id_material` int(5) NOT NULL,
  `id_subarea` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang_lingkup`
--

INSERT INTO `ruang_lingkup` (`id_material`, `id_subarea`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `standard`
--

CREATE TABLE `standard` (
  `id_standard` int(5) NOT NULL,
  `nama_standard` varchar(20) NOT NULL,
  `pertanyaan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standard`
--

INSERT INTO `standard` (`id_standard`, `nama_standard`, `pertanyaan`) VALUES
(1, 'ada', 'asdadsas'),
(2, 'lantai bebas debu', 'Apakah lantai bebas dari debu ?'),
(3, 'kaca bebas noda', 'Apakah kaca bebas dari noda ?'),
(4, 'lantai tidak lembab', 'Apakah lantai tidak lembab ?'),
(8, 'pilar bersih', 'Apakah pilar tidak berdebu?'),
(17, 'tembok bersih', 'Apakah tembok bersih tak berdebu');

-- --------------------------------------------------------

--
-- Table structure for table `subarea`
--

CREATE TABLE `subarea` (
  `id_subarea` int(11) NOT NULL,
  `nama_subarea` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subarea`
--

INSERT INTO `subarea` (`id_subarea`, `nama_subarea`) VALUES
(1, 'Toilet'),
(2, 'Parkir'),
(30, 'Kamar'),
(32, 'wwwg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_mangkir`
--
ALTER TABLE `absen_mangkir`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id_complain`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_laporansca` (`id_penilaian`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indexes for table `kodeqr`
--
ALTER TABLE `kodeqr`
  ADD PRIMARY KEY (`id_kodeqr`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_subarea` (`id_subarea`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD KEY `laporan_penilaian` (`id_penilaian`),
  ADD KEY `laporan_material` (`id_material`);

--
-- Indexes for table `lost_found`
--
ALTER TABLE `lost_found`
  ADD PRIMARY KEY (`id_laf`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `memiliki`
--
ALTER TABLE `memiliki`
  ADD KEY `id_standard` (`id_standard`),
  ADD KEY `id_material` (`id_material`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_subarea` (`id_subarea`),
  ADD KEY `id_area` (`id_area`);

--
-- Indexes for table `ruang_lingkup`
--
ALTER TABLE `ruang_lingkup`
  ADD PRIMARY KEY (`id_material`,`id_subarea`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_subarea` (`id_subarea`);

--
-- Indexes for table `standard`
--
ALTER TABLE `standard`
  ADD PRIMARY KEY (`id_standard`);

--
-- Indexes for table `subarea`
--
ALTER TABLE `subarea`
  ADD PRIMARY KEY (`id_subarea`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_mangkir`
--
ALTER TABLE `absen_mangkir`
  MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id_complain` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `id_kerusakan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kodeqr`
--
ALTER TABLE `kodeqr`
  MODIFY `id_kodeqr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `lost_found`
--
ALTER TABLE `lost_found`
  MODIFY `id_laf` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `standard`
--
ALTER TABLE `standard`
  MODIFY `id_standard` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subarea`
--
ALTER TABLE `subarea`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporansca` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kodeqr`
--
ALTER TABLE `kodeqr`
  ADD CONSTRAINT `area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subarea` FOREIGN KEY (`id_subarea`) REFERENCES `subarea` (`id_subarea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_penilaian` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `memiliki`
--
ALTER TABLE `memiliki`
  ADD CONSTRAINT `material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `standard` FOREIGN KEY (`id_standard`) REFERENCES `standard` (`id_standard`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `area1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subarea1` FOREIGN KEY (`id_subarea`) REFERENCES `subarea` (`id_subarea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ruang_lingkup`
--
ALTER TABLE `ruang_lingkup`
  ADD CONSTRAINT `rl_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rl_subarea` FOREIGN KEY (`id_subarea`) REFERENCES `subarea` (`id_subarea`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
