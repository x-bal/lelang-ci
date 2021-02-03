-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2021 pada 15.07
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lelang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_awal` bigint(20) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id_barang`, `nama_barang`, `harga_awal`, `deskripsi`, `created_at`, `updated_at`, `images`) VALUES
(1, 'Jam Tangan Rolex', 1200000, 'Jam tangan rolex pemakaian selama 1 bulan', NULL, NULL, 'c521b4c71429ab74702cabe672ec5184.jpeg'),
(2, 'Kursi Gaming Zeus', 1000000, 'Pemakaian selama 3 minggu.\r\nalasan dilelang karena sudah beli yang baru.', NULL, NULL, 'ef1e8981bf9bdf077dfe3fa9f7591efd.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `lelang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penawaran_harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lelangs`
--

CREATE TABLE `lelangs` (
  `id_lelang` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_lelang` date NOT NULL,
  `harga_akhir` bigint(20) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lelangs`
--

INSERT INTO `lelangs` (`id_lelang`, `barang_id`, `user_id`, `tanggal_lelang`, `harga_akhir`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2021-02-02', NULL, 'dibuka', NULL, NULL),
(2, 2, 8, '2021-02-03', 1500000, 'ditutup', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id_level` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`id_level`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-01-27 02:56:58', '2021-01-27 02:56:58'),
(2, 'petugas', '2021-01-27 02:58:16', '2021-01-27 02:58:16'),
(3, 'masyarakat', '2021-01-27 02:58:21', '2021-01-27 02:58:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakats`
--

CREATE TABLE `masyarakats` (
  `id_masyarakat` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masyarakats`
--

INSERT INTO `masyarakats` (`id_masyarakat`, `user_id`, `nama`, `telp`, `created_at`, `updated_at`) VALUES
(1, 7, 'Rahma Yantini', '085323986896', NULL, NULL),
(2, 8, 'Esa', '089236784624', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `user_id`, `nama`, `telp`, `created_at`, `updated_at`) VALUES
(1, 4, 'Gustopa Muhamad', '085323986775', NULL, NULL),
(2, 6, 'Marliya', '085323986776', NULL, NULL),
(3, 1, 'Muhammad Iqbal', '082114823280', '2021-02-03 00:48:35', '2021-02-03 00:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(126) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(126) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `level_id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', NULL, '$2y$10$GjWpyOLdr61BHeQOuOD2TezYsub7B72yehFyRGezu.qfb.qcKJx0O', NULL, '2021-01-31 02:35:13', '2021-01-31 02:35:13'),
(4, 2, 'petugas', 'gustopa123@gmail.com', NULL, '$2y$10$2AU03/7WmKCYgoSRm5xS8.dj0psWnInAn6AXC6idF1wloNIV21TYG', NULL, NULL, NULL),
(6, 2, 'imagin', 'marliyarahayu170305@gmail.com', NULL, '$2y$10$XyZi8obL7VUo4XhoPVYak.w8jEZF4YiIBxsEDGmOLmghkZXD.sRmu', NULL, NULL, NULL),
(7, 3, 'developer', 'rahmawati2778@gmail.com', NULL, '$2y$10$yBg1gb8O/oX0q87fUjmwxeGGzjuBH.XPsra7bW1Pw9cSJ.XG4VyDK', NULL, NULL, NULL),
(8, 3, 'esanuraida', 'esanuraida@gmail.com', NULL, '$2y$10$EMPYvlREZdMMi2HAXJFjN.CE/Rq4AxHBbjam0iF5ww.h6BEQZEy3e', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `lelangs`
--
ALTER TABLE `lelangs`
  ADD PRIMARY KEY (`id_lelang`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `masyarakats`
--
ALTER TABLE `masyarakats`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lelangs`
--
ALTER TABLE `lelangs`
  MODIFY `id_lelang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id_level` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `masyarakats`
--
ALTER TABLE `masyarakats`
  MODIFY `id_masyarakat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
