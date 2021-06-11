-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2021 pada 07.01
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengadilancilacap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_sidang`
--

CREATE TABLE `detail_sidang` (
  `id` int(8) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `perkara` varchar(80) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `jam` varchar(4) NOT NULL,
  `ruang` varchar(80) NOT NULL,
  `hakim` varchar(80) NOT NULL,
  `terdakwa` varchar(80) NOT NULL,
  `penggugat` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_sidang`
--

INSERT INTO `detail_sidang` (`id`, `jenis`, `perkara`, `tgl`, `jam`, `ruang`, `hakim`, `terdakwa`, `penggugat`) VALUES
(10, 'GEGER GEDEN', 'GELUD', '2021-04-21', '21:2', 'RCTI', 'ROY', 'BOSDO', 'ENDA'),
(12, 'gelud', 'HATI', '1222-02-21', '21:2', '222', '1212', 'BEBY', '13'),
(13, 'PENCURIAN KUNCI', 'PIDANA', '2121-02-28', '21:2', 'ICU', 'SUNANDAR', 'IJAN', 'PARDI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `person`
--

CREATE TABLE `person` (
  `ID` int(11) UNSIGNED NOT NULL,
  `Name` varchar(85) NOT NULL,
  `Signature` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `person`
--

INSERT INTO `person` (`ID`, `Name`, `Signature`) VALUES
(49, 'lope', '{\"lines\":[[[48.5,5],[45.5,5],[43.5,9],[43.5,17],[43.5,24],[48.5,31],[55.5,39],[71.5,47],[108.5,60],[205.5,84],[249.5,90],[259.5,91],[261.5,91],[263.5,91],[263.5,96],[257.5,117],[254.5,128],[251.5,133],[251.5,134],[251.5,133],[253.5,127],[256.5,121],[259.5,115],[264.5,110],[267.5,107],[268.5,108],[269.5,110],[269.5,113],[269.5,117],[269.5,118],[271.5,119],[274.5,116],[283.5,104],[293.5,93],[297.5,89],[299.5,89],[300.5,91],[301.5,96],[303.5,106],[304.5,112],[305.5,118],[307.5,120],[310.5,114],[316.5,103],[318.5,100],[319.5,100],[319.5,102],[321.5,114],[321.5,129],[321.5,126],[326.5,117],[329.5,110],[331.5,104]]]}'),
(47, 'loper', '{\"lines\":[[[178.5,121],[179.5,117],[182.5,111],[193.5,93],[204.5,71],[212.5,56],[214.5,49],[215.5,46],[215.5,44],[213.5,43],[211.5,43],[199.5,43],[189.5,43],[182.5,46],[178.5,53],[178.5,59],[178.5,66],[182.5,74],[196.5,83],[221.5,87],[256.5,87],[299.5,72],[307.5,63],[309.5,59],[309.5,61],[309.5,62],[310.5,65],[310.5,66],[314.5,69],[315.5,71],[318.5,72],[325.5,74],[342.5,75],[360.5,72],[375.5,62],[382.5,52],[382.5,51]]]}'),
(48, 'alvin', '{\"lines\":[[[80.5,27],[80.5,32],[80.5,42],[78.5,52],[78.5,58],[78.5,64],[82.5,68],[84.5,69],[90.5,64],[102.5,49],[112.5,32],[115.5,26],[117.5,24],[118.5,24],[119.5,24],[119.5,27],[123.5,37],[126.5,48],[130.5,58],[131.5,58],[133.5,58],[136.5,56],[137.5,54],[138.5,54],[139.5,57],[141.5,61],[144.5,67],[150.5,79],[152.5,80],[153.5,81],[156.5,82],[160.5,78],[165.5,72],[169.5,67],[175.5,64],[176.5,63],[177.5,63],[181.5,66],[188.5,74],[201.5,93],[213.5,104],[223.5,116],[228.5,119]]]}'),
(50, 'Suryono', '{\"lines\":[[[131,81],[130,82],[130,84],[130,85],[130,88],[130,95],[133,102],[137,105],[148,108],[169,111],[207,103],[248,78],[253,69],[254,66],[255,67],[255,77],[254,88],[254,96],[255,95],[258,93],[268,89],[289,88],[306,92],[316,103],[320,114],[321,124],[322,127],[323,127],[323,125],[326,119],[328,114],[329,112],[329,111]]]}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(50) NOT NULL,
  `namatamu` varchar(100) NOT NULL,
  `id` int(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `sebagai` varchar(10) NOT NULL,
  `signature` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `namatamu`, `id`, `nik`, `alamat`, `sebagai`, `signature`) VALUES
(13, 'alvin', 7, '3301022', 'kesugihan', 'jaksa', ''),
(14, 'Roy', 8, '123141', 'kesugihan', 'gagah', ''),
(15, 'Roy 12', 5, '123141', 'kesugihan', 'gagah', ''),
(17, 'Kiki', 7, '3301022', 'w', 'gagah', ''),
(18, 'bowo', 5, '3301022', 'kesugihan', 'gagah', ''),
(19, 'bowo', 5, '3301022', 'kesugihan', 'gagah', ''),
(24, 'SURYA', 10, '9891021', 'WUNGKAL', 'JOWO', ''),
(25, 'RENDY', 10, '7878', 'MAOS', 'TAMU', ''),
(26, 'SIMAS', 10, '787821', 'JOGJA', 'LEWAT', ''),
(27, 'RESI', 5, '41412', 'kesugihan', 'OLP', ''),
(28, 'alvin', 10, '12', 'kesugihan', 'gagah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Mohammad Nur Fawaiq', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_sidang`
--
ALTER TABLE `detail_sidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_sidang`
--
ALTER TABLE `detail_sidang`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `person`
--
ALTER TABLE `person`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
