-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2022 pada 07.49
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bunisa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `modulsub`
--

CREATE TABLE `modulsub` (
  `id_modulsub` int(11) NOT NULL,
  `id_modulutama` int(11) NOT NULL,
  `nama_modulsub` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subheading` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `path` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level_user` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `level_admin` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `aktif_modulsub` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `modulutama`
--

CREATE TABLE `modulutama` (
  `id_modulutama` int(11) NOT NULL,
  `nama_modulutama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `posisi_modulutama` enum('navbar','header') COLLATE latin1_general_ci NOT NULL,
  `icon` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `subheading` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `path` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `urutan` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `level_user` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `level_admin` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `aktif_modulutama` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `modulutama`
--

INSERT INTO `modulutama` (`id_modulutama`, `nama_modulutama`, `posisi_modulutama`, `icon`, `subheading`, `link`, `path`, `urutan`, `level_user`, `level_admin`, `aktif_modulutama`) VALUES
(1, 'Beranda', 'navbar', 'home', 'Selamat Datang', '', '', '1', 'Y', 'Y', 'Y'),
(2, 'Manajemen Akun', 'navbar', 'users', 'Menu ini untuk mengelola akun', '', '', '2', 'Y', 'Y', 'Y'),
(3, 'Inbox', 'navbar', 'airplay', 'Menu ini untuk mengelola pesan masuk', '', '', '3', 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('user','admin','superadmin') NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `level`, `blokir`) VALUES
('admin', '$2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a', 'admin', 'N'),
('user', '$2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a', 'user', 'N');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `modulsub`
--
ALTER TABLE `modulsub`
  ADD PRIMARY KEY (`id_modulsub`);

--
-- Indeks untuk tabel `modulutama`
--
ALTER TABLE `modulutama`
  ADD PRIMARY KEY (`id_modulutama`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
