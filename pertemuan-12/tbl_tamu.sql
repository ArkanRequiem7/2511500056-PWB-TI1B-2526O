-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Des 2025 pada 09.48
-- Versi server: 5.7.33
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
-- Struktur dari tabel `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `cid` int(11) NOT NULL,
  `cnama` varchar(100) DEFAULT NULL,
  `cemail` varchar(100) DEFAULT NULL,
  `cpesan` text,
  `dcreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`cid`, `cnama`, `cemail`, `cpesan`, `dcreated`) VALUES
(1, 'Muhammad Arkan Ramadhan', 'siarkan22@gmail.com', 'Aku suka banget makan mie ayam', '2025-12-11 16:39:56'),
(2, 'Renn Rama', 'ramarenn@gmail.com', 'Aku Renn salam kenal', '2025-12-11 16:39:56'),
(3, 'Ramadhan Arkan', 'shdhvdaj@gmail.com', 'Aku suka extra joss susu', '2025-12-11 16:39:56'),
(4, 'Nabila Cion', 'Nabila@ghotic.com', 'Adit ganteng banget', '2025-12-11 16:39:56'),
(5, 'dadadadad', 'rnandahdha@gmail.com', 'dawdwadwadwada', '2025-12-11 16:39:56'),
(6, 'aku sdakjbdwjbhdbjjwa', 'dwdnjawndajknd@gmail.com', 'sadajhdwbdhwavbdhja', '2025-12-11 16:39:56'),
(7, 'sheshhhh', 'izziipisis@gmail.com', 'mampos kau hahhahha', '2025-12-11 16:39:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
