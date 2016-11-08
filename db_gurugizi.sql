-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Nov 2016 pada 15.22
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gurugizi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `nutritionist`
--

CREATE TABLE `nutritionist` (
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `domisili` varchar(100) NOT NULL,
  `foto_profil` varchar(100) NOT NULL,
  `file_cv` varchar(100) NOT NULL,
  `file_transkrip_nilai` varchar(100) NOT NULL,
  `file_ijazah` varchar(100) NOT NULL,
  `file_str` varchar(100) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `domisili` varchar(100) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `foto_profil` varchar(100) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`email`, `password`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `notelp`, `domisili`, `berat_badan`, `tinggi_badan`, `foto_profil`, `keterangan`) VALUES
('danielsugiarto89@gmail.com', '123456', 'Daniel Sugiarto Setyabudi', '1996-07-12', 'L', '', 'Surabaya', 100, 165, '', 'Saya seorang staff IT berbadan gemuk.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nutritionist`
--
ALTER TABLE `nutritionist`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
