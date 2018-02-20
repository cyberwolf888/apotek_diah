-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Feb 2018 pada 06.38
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `pembelian_id`, `item_id`, `harga`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 500000, 34, '2018-01-27 16:11:38', '2018-01-27 16:11:38'),
(2, 1, 1, 500000, 1, '2018-01-27 16:11:38', '2018-01-27 16:11:38'),
(3, 2, 1, 15000, 200, '2018-02-08 08:04:42', '2018-02-08 08:04:42'),
(4, 2, 2, 20000, 200, '2018-02-08 08:04:42', '2018-02-08 08:04:42'),
(5, 2, 3, 2500, 100, '2018-02-08 08:04:42', '2018-02-08 08:04:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `penjualan_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `penjualan_id`, `item_id`, `qty`, `harga`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 500000, 1000000, '2018-01-27 17:28:49', '2018-01-27 17:28:49'),
(2, 2, 2, 3, 15000, 45000, '2018-01-27 17:35:34', '2018-01-27 17:35:34'),
(3, 2, 1, 1, 500000, 500000, '2018-01-27 17:35:34', '2018-01-27 17:35:34'),
(4, 3, 2, 3, 15000, 45000, '2018-02-07 15:08:10', '2018-02-07 15:08:10'),
(5, 4, 4, 1, 45000, 45000, '2018-02-08 07:59:47', '2018-02-08 07:59:47'),
(6, 5, 1, 1, 20000, 20000, '2018-02-08 08:00:35', '2018-02-08 08:00:35'),
(7, 5, 3, 1, 5000, 5000, '2018-02-08 08:00:35', '2018-02-08 08:00:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jenis` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id`, `satuan_id`, `user_id`, `nama`, `stock`, `harga`, `gambar`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Betadine Luka 15ml', 399, 20000, 'b86e5e6bece15beb468c42f59b96d9ba.jpg', 1, '2018-01-25 05:53:21', '2018-02-08 08:04:42'),
(2, 3, 1, 'Betadine Luka 30ml', 400, 25000, '850621f534fa76b909a3a74b15ecbf30.jpg', 1, '2018-01-27 17:35:09', '2018-02-08 08:04:42'),
(3, 5, 1, 'OBH Komix', 349, 5000, '55aa8a8566a581d2550785e403478211.jpg', 1, '2018-02-08 07:47:00', '2018-02-08 08:04:42'),
(4, 3, 1, 'panadol anak 6+ 60ml', 149, 45000, '69b508fd55260d5ddd5bfc896eeabafb.jpg', 1, '2018-02-08 07:48:13', '2018-02-08 07:59:47'),
(5, 3, 1, 'Betadine Kumur 190ml', 50, 50000, '6dd885e705cbbc2e3f8ef3e1f68f018f.jpg', 1, '2018-02-08 07:49:18', '2018-02-08 07:49:18'),
(6, 3, 1, 'Betadine Kumur 100ml', 50, 40000, 'c004e4cb5909492707f64b8f7653fc0f.jpg', 1, '2018-02-08 07:50:09', '2018-02-08 07:50:09'),
(7, 2, 1, 'Entrostop 2x12', 200, 30000, 'a1c5ce872301e83fdf7c681c6a7509ac.jpg', 1, '2018-02-08 07:51:45', '2018-02-08 07:51:45'),
(8, 3, 1, 'insto 7.5 ml', 200, 35000, '1fd312ec8860a9cafe2c3e615f26d592.jpg', 1, '2018-02-08 07:53:35', '2018-02-08 07:53:35'),
(9, 1, 1, 'Panadol Hijau', 500, 5000, '02711b8782191ce6460e5ffe0dab8c9f.jpg', 1, '2018-02-08 07:57:49', '2018-02-08 07:57:49'),
(10, 1, 1, 'Panadol Biru', 500, 5000, '0f24e30222751a12ddbaadab9162f7d1.jpg', 1, '2018-02-08 07:58:18', '2018-02-08 07:58:18'),
(11, 1, 1, 'Panadol Merah', 500, 5000, '722795a170b64cb56315a2f649f38a1a.jpg', 1, '2018-02-08 07:58:46', '2018-02-08 07:58:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `suplier_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `faktur` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `suplier_id`, `user_id`, `tgl`, `faktur`, `keterangan`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-01-10', '123123123', NULL, 300000, '2018-01-27 16:11:38', '2018-01-27 16:11:38'),
(2, 2, 1, '2018-02-06', '23454657687', 'pembelian obat', 1500000, '2018-02-08 08:04:42', '2018-02-08 08:04:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `user_id`, `tgl`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-01-28', 1000000, NULL, '2018-01-27 17:28:49', '2018-01-27 17:28:49'),
(2, 1, '2018-01-28', 545000, 'pasien sakit', '2018-01-27 17:35:34', '2018-01-27 17:35:34'),
(3, 1, '2018-02-07', 45000, 'asdad', '2018-02-07 15:08:10', '2018-02-07 15:08:10'),
(4, 1, '2018-02-08', 45000, 'saran dokter', '2018-02-08 07:59:47', '2018-02-08 07:59:47'),
(5, 1, '2018-02-08', 25000, 'untuk pasien sakit', '2018-02-08 08:00:35', '2018-02-08 08:00:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tablet', 1, '2018-01-25 05:05:00', '2018-01-25 05:07:41'),
(2, 'Box', 1, '2018-01-25 05:28:00', '2018-02-08 07:18:05'),
(3, 'Botol', 1, '2018-02-08 07:18:28', '2018-02-08 07:18:28'),
(4, 'Kapsul', 1, '2018-02-08 07:19:00', '2018-02-08 07:19:00'),
(5, 'Sachet', 1, '2018-02-08 07:19:16', '2018-02-08 07:19:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(15) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id`, `nama`, `alamat`, `telp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PT. ANGKASA PUTRA', 'Jl. Antasura  No. 88', '0847373738', 1, '2018-01-25 05:25:46', '2018-02-08 07:20:23'),
(2, 'PT. FARMASI', 'Jl. Malboro No. 35', '03618888835', 1, '2018-02-08 07:21:33', '2018-02-08 07:21:33'),
(3, 'PT. INDRAJAYA', 'Jl. Ayani Utara No.10', '0857373689876', 1, '2018-02-08 07:23:01', '2018-02-08 07:23:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(1) NOT NULL,
  `isActive` int(1) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telp`, `address`, `type`, `isActive`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aditya Hermawan Martikadinata', 'admin@mail.com', '0857373753569', 'Jalan Raya Denpasar', 1, 1, '$2y$10$DlDzkbYLgFYXncJ1XNDtcOulR8zOJZXfceXzfTzl.wgWI16Xlj8jG', '3Ew1nkyC2aslAlUKmV0z8qOhbrCim6Yo5W4e9HNVQb6pLe3w4PzASighXv2J', '2018-01-23 15:02:23', '2018-02-15 04:41:49'),
(2, 'Ayu Diah Yuliastini', 'owner@mail.com', '02993039', 'Jalan Merdeka', 2, 1, '$2y$10$.wc1SWkeeFd5EMr6xtEdbelLT1f7Gv8hQmCqllxPFcZGCRAuAMLMK', 'MEA1h49XjpBI1FBDznX4Pv5YBx9WUbTgaB33dnocyvFzht62CJ5oPGA238pJ', '2018-02-06 13:43:50', '2018-02-15 04:41:31'),
(3, 'Admin 2', 'admin2@mail.com', '9383483', 'Jalan Wisnu Marga Belayu No 19', 1, 0, '$2y$10$ctaTmKeVIK7Zukn/XTPFYOvxrlby.jBXGMurbCN/rfpfLarSvtJe6', NULL, '2018-02-06 14:05:39', '2018-02-15 03:53:32'),
(4, 'Ni Luh Putu Niastuti', 'karyawan@mail.com', '0348943838', 'Jl. Gitasura', 3, 1, '$2y$10$07eZH5sgtzM77vXfIjyRmuWm8WwUXB7RmaRmOFi3Tdpxycotxp2Xi', 'rz8pACIKVriRyOdquWs8kEBLuxTnff3o5GCr4GAawR4E4oS6SQxGTDPG8yrQ', '2018-02-06 14:08:35', '2018-02-15 03:56:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
