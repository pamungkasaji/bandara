-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2019 pada 10.00
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

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
-- Struktur dari tabel `absen_mangkir`
--

CREATE TABLE `absen_mangkir` (
  `id_absensi` int(10) NOT NULL,
  `tgl_absensi` date NOT NULL,
  `id_karyawan` int(3) NOT NULL,
  `status` char(5) NOT NULL DEFAULT 'tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `area`
--

CREATE TABLE `area` (
  `id_area` int(5) NOT NULL,
  `nama_area` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `area`
--

INSERT INTO `area` (`id_area`, `nama_area`) VALUES
(1, 'CheckinHall');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cust_complain`
--

CREATE TABLE `cust_complain` (
  `id_complain` int(10) NOT NULL,
  `tgl_complain` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` longtext NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job`
--

CREATE TABLE `job` (
  `id_karyawan` int(5) NOT NULL,
  `id_penilaian` int(5) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `job`
--

INSERT INTO `job` (`id_karyawan`, `id_penilaian`, `tanggal`) VALUES
(1, 21, '2019-07-05 01:42:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `username`, `password`, `level`) VALUES
(1, '', 'admin', 'admin', 'ADM'),
(2, 'Ria Mari', 'Rial', '1', 'Perempuan'),
(3, 'ajii', '123', '1', 'Laki-Laki'),
(4, 'arifin', 'ipin', '123456', 'attendant'),
(5, 'adam', 'adam', '123456', 'SPV');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id_kerusakan` int(10) NOT NULL,
  `tgl_kerusakan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar` blob NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_penilaian` int(5) NOT NULL,
  `id_material` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lost_found`
--

CREATE TABLE `lost_found` (
  `id_laf` int(10) NOT NULL,
  `tgl_laf` date NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `id_material` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id_material`, `nama`) VALUES
(1, 'lantai'),
(2, 'kaca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `memiliki`
--

CREATE TABLE `memiliki` (
  `id_standard` int(11) NOT NULL,
  `id_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `memiliki`
--

INSERT INTO `memiliki` (`id_standard`, `id_material`) VALUES
(3, 2),
(2, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
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
  `hasil` varchar(200) DEFAULT NULL,
  `skor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_subarea`, `id_area`, `tanggal`, `kode_tinjauan`, `penjelasan`, `tindak_lanjut`, `oleh`, `waktu`, `hasil`, `skor`) VALUES
(21, 1, 1, '2019-07-05', 0, NULL, '', '', '2019-07-05 01:42:52', '0', 67);

-- --------------------------------------------------------

--
-- Struktur dari tabel `qrcode`
--

CREATE TABLE `qrcode` (
  `id_qrcode` int(5) NOT NULL,
  `id_area` int(5) NOT NULL,
  `id_subarea` int(10) NOT NULL,
  `qr_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_lingkup`
--

CREATE TABLE `ruang_lingkup` (
  `id_material` int(5) NOT NULL,
  `id_subarea` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang_lingkup`
--

INSERT INTO `ruang_lingkup` (`id_material`, `id_subarea`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `standard_area`
--

CREATE TABLE `standard_area` (
  `id_standard` int(5) NOT NULL,
  `nama_standard` varchar(20) NOT NULL,
  `pertanyaan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `standard_area`
--

INSERT INTO `standard_area` (`id_standard`, `nama_standard`, `pertanyaan`) VALUES
(1, 'ada', 'asdadsas'),
(2, 'lantai bebas debu', 'Apakah lantai bebas dari debu ?'),
(3, 'kaca bebas noda', 'Apakah kaca bebas dari noda ?'),
(4, 'lantai tidak lembab', 'Apakah lantai tidak lembab ?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subarea`
--

CREATE TABLE `subarea` (
  `id_subarea` int(11) NOT NULL,
  `nama_subarea` varchar(25) NOT NULL,
  `id_area` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subarea`
--

INSERT INTO `subarea` (`id_subarea`, `nama_subarea`, `id_area`) VALUES
(1, 'Toilet', 1),
(2, 'Parkir', 1),
(3, 'aaa', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_mangkir`
--
ALTER TABLE `absen_mangkir`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indeks untuk tabel `cust_complain`
--
ALTER TABLE `cust_complain`
  ADD PRIMARY KEY (`id_complain`);

--
-- Indeks untuk tabel `job`
--
ALTER TABLE `job`
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_laporansca` (`id_penilaian`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD KEY `laporan_penilaian` (`id_penilaian`),
  ADD KEY `laporan_material` (`id_material`);

--
-- Indeks untuk tabel `lost_found`
--
ALTER TABLE `lost_found`
  ADD PRIMARY KEY (`id_laf`);

--
-- Indeks untuk tabel `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indeks untuk tabel `memiliki`
--
ALTER TABLE `memiliki`
  ADD KEY `id_standard` (`id_standard`),
  ADD KEY `id_material` (`id_material`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD UNIQUE KEY `tanggal` (`tanggal`),
  ADD UNIQUE KEY `tanggal_2` (`tanggal`),
  ADD UNIQUE KEY `id_subarea_2` (`id_subarea`,`tanggal`),
  ADD KEY `id_subarea` (`id_subarea`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_subarea_3` (`id_subarea`);

--
-- Indeks untuk tabel `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id_qrcode`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_subarea` (`id_subarea`);

--
-- Indeks untuk tabel `ruang_lingkup`
--
ALTER TABLE `ruang_lingkup`
  ADD PRIMARY KEY (`id_material`,`id_subarea`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_subarea` (`id_subarea`);

--
-- Indeks untuk tabel `standard_area`
--
ALTER TABLE `standard_area`
  ADD PRIMARY KEY (`id_standard`);

--
-- Indeks untuk tabel `subarea`
--
ALTER TABLE `subarea`
  ADD PRIMARY KEY (`id_subarea`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_mangkir`
--
ALTER TABLE `absen_mangkir`
  MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cust_complain`
--
ALTER TABLE `cust_complain`
  MODIFY `id_complain` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `id_kerusakan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lost_found`
--
ALTER TABLE `lost_found`
  MODIFY `id_laf` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id_qrcode` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `standard_area`
--
ALTER TABLE `standard_area`
  MODIFY `id_standard` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `subarea`
--
ALTER TABLE `subarea`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporansca` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_penilaian` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `memiliki`
--
ALTER TABLE `memiliki`
  ADD CONSTRAINT `material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `standard` FOREIGN KEY (`id_standard`) REFERENCES `standard_area` (`id_standard`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `area1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subarea1` FOREIGN KEY (`id_subarea`) REFERENCES `subarea` (`id_subarea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `qrcode`
--
ALTER TABLE `qrcode`
  ADD CONSTRAINT `area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subarea` FOREIGN KEY (`id_subarea`) REFERENCES `subarea` (`id_subarea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ruang_lingkup`
--
ALTER TABLE `ruang_lingkup`
  ADD CONSTRAINT `rl_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rl_subarea` FOREIGN KEY (`id_subarea`) REFERENCES `subarea` (`id_subarea`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
