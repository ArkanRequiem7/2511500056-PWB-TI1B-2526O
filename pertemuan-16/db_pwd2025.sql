-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Jan 2026 pada 04.33
-- Versi server: 8.0.44
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbiodata_mhs`
--

CREATE TABLE `tblbiodata_mhs` (
  `id` int NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `hobi` varchar(100) NOT NULL,
  `pasangan` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `nama_kakak` varchar(100) NOT NULL,
  `nama_adik` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tblbiodata_mhs`
--

INSERT INTO `tblbiodata_mhs` (`id`, `nim`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `hobi`, `pasangan`, `pekerjaan`, `nama_ortu`, `nama_kakak`, `nama_adik`, `created_at`) VALUES
(1, '11112112222', 'REnnn', 'vdxvxdvvdxvxdv', 'vxdvdxvzvdszvdszvv', 'dvszvxzvzsvzvzxv', 'vvzvdxvdzvdszvz', 'vvdzvzdvdzsv', 'vzvzxvxzvxzdvz', 'vzdvzvzvzd', 'vvxdzvzvzv', '2026-01-12 02:14:38'),
(4, '11112112222', 'feaffafffaa', 'madjbabhdabd', 'jndkjnakdnadn', 'mkfknnfefns', 'jefbhfabajf', 'nlknfakjefna', 'kjbbhdhjasbdha', 'nfoafnalkfnn', 'nkfajfnakwfakjfnbw', '2026-01-12 07:43:17'),
(5, 'ultraman X', 'dawdawdadaw', 'kjankfjbabjkfafjbak', 'dkwjfbeakbfjhksf', 'ugfuesyfgujgefs', 'vghhaegvdajfb', 'gefyuegafsehfhh', 'jfsbjkbfsjfbesjbfeshjfb', 'jfsbhfjbsehfjbeshfbjshj', 'jfehfsajsjfkesfse', '2026-01-12 07:45:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biodata`
--

CREATE TABLE `tbl_biodata` (
  `id_biodata` int NOT NULL,
  `kodepen` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `tanggal` varchar(50) DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `slta` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `ortu` varchar(100) DEFAULT NULL,
  `pacar` varchar(100) DEFAULT NULL,
  `mantan` varchar(100) DEFAULT NULL,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_biodata`
--

INSERT INTO `tbl_biodata` (`id_biodata`, `kodepen`, `nama`, `alamat`, `tanggal`, `hobi`, `slta`, `pekerjaan`, `ortu`, `pacar`, `mantan`, `dcreated_at`) VALUES
(2, 'ultra', 'ddddddddd', 'ddddddddd', 'ddddddd', 'ddddddd', 'ddddddd', 'ddddddddd', 'dddddddd', 'dddddd', 'dddddddd', '2026-01-22 11:07:55'),
(4, '2005', 'arkan kece', 'mentok', '22/11/1990', 'makan', 'Pt timah cuy', 'pegawai', 'adalah pokoknya', 'inisial Q', 'buat apa njir', '2026-01-22 11:21:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `cid` int NOT NULL,
  `cnama` varchar(100) DEFAULT NULL,
  `cemail` varchar(100) DEFAULT NULL,
  `cpesan` text,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`cid`, `cnama`, `cemail`, `cpesan`, `dcreated_at`) VALUES
(16, 'Kaisar Penakluk Karbit', 'kinkkarbit@gmail.com', 'Aku akan membasmi para karbit', '2026-01-08 12:10:53'),
(19, 'Muhammad Arkan Ramadhan', 'arkan@gmail.com', 'hahahahahhhaha', '2026-01-08 12:19:01'),
(20, 'Tyrannosaurus', 'dada@gmail.com', 'Rawrrrrrrrrrr', '2026-01-08 12:19:18'),
(21, 'Ultraman', 'mitsu@gmail.com', 'tsahhhhhhhhh', '2026-01-12 14:43:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblbiodata_mhs`
--
ALTER TABLE `tblbiodata_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD PRIMARY KEY (`id_biodata`);

--
-- Indeks untuk tabel `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblbiodata_mhs`
--
ALTER TABLE `tblbiodata_mhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  MODIFY `id_biodata` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
