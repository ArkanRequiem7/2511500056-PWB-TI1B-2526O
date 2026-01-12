-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Jan 2026 pada 03.15
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
(1, '11112112222', 'REnnn', 'vdxvxdvvdxvxdv', 'vxdvdxvzvdszvdszvv', 'dvszvxzvzsvzvzxv', 'vvzvdxvdzvdszvz', 'vvdzvzdvdzsv', 'vzvzxvxzvxzdvz', 'vzdvzvzvzd', 'vvxdzvzvzv', '2026-01-12 02:14:38');

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
(20, 'Tyrannosaurus', 'dada@gmail.com', 'Rawrrrrrrrrrr', '2026-01-08 12:19:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblbiodata_mhs`
--
ALTER TABLE `tblbiodata_mhs`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
