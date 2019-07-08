-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2019 at 11:46 AM
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
(3, 'bag'),
(4, 'depart'),
(5, 'arrival');

-- --------------------------------------------------------

--
-- Table structure for table `cust_complain`
--

CREATE TABLE `cust_complain` (
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
  `id_penilaian` int(5) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `username`, `password`, `level`) VALUES
(3, 'aa', 'admin', 'admin', 'ADM'),
(5, 'adam', 'adam', '123456', 'SPV');

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
(25, 1, 8, '1-8.png'),
(27, 4, 1, '4-1.png'),
(28, 3, 3, '3-3.png');

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

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id_material`, `nama`) VALUES
(1, 'lantai'),
(2, 'kaca');

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
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(5) NOT NULL,
  `id_subarea` int(11) NOT NULL,
  `id_area` int(5) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
(2, 1, 1, '2019-07-04 02:07:42', 0, NULL, '', '', '2019-07-04 02:07:42', 0, 3),
(3, 1, 1, '2019-07-04 02:27:25', 0, NULL, '', '', '2019-07-04 02:27:25', 0, 3),
(4, 1, 1, '2019-07-04 02:32:27', 0, NULL, '', '', '2019-07-04 02:32:27', 0, 3),
(5, 1, 1, '2019-07-04 02:33:44', 0, NULL, '', '', '2019-07-04 02:33:44', 0, 3);

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
-- Table structure for table `standard_area`
--

CREATE TABLE `standard_area` (
  `id_standard` int(5) NOT NULL,
  `nama_standard` varchar(20) NOT NULL,
  `pertanyaan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standard_area`
--

INSERT INTO `standard_area` (`id_standard`, `nama_standard`, `pertanyaan`) VALUES
(1, 'ada', 'asdadsas'),
(2, 'lantai bebas debu', 'Apakah lantai bebas dari debu ?'),
(3, 'kaca bebas noda', 'Apakah kaca bebas dari noda ?'),
(4, 'lantai tidak lembab', 'Apakah lantai tidak lembab ?');

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
(3, 'lifta'),
(8, 'baru');

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
-- Indexes for table `cust_complain`
--
ALTER TABLE `cust_complain`
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
-- Indexes for table `standard_area`
--
ALTER TABLE `standard_area`
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
-- AUTO_INCREMENT for table `cust_complain`
--
ALTER TABLE `cust_complain`
  MODIFY `id_complain` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `id_kerusakan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kodeqr`
--
ALTER TABLE `kodeqr`
  MODIFY `id_kodeqr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `lost_found`
--
ALTER TABLE `lost_found`
  MODIFY `id_laf` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `standard_area`
--
ALTER TABLE `standard_area`
  MODIFY `id_standard` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subarea`
--
ALTER TABLE `subarea`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `standard` FOREIGN KEY (`id_standard`) REFERENCES `standard_area` (`id_standard`) ON DELETE CASCADE ON UPDATE CASCADE;

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
