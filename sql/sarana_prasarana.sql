-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 17 Des 2019 pada 14.44
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarana_prasarana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_gambar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengajuan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `link_gambar`, `quantity`, `harga_satuan`, `jumlah`, `status`, `pengajuan_id`, `created_at`, `updated_at`) VALUES
(23, 'apa aja', 'iya.com', '2 pcs', 424, 848, NULL, 22, NULL, NULL),
(24, 'test', 'fb.com', '10 lusin', 100, 1000, NULL, 23, NULL, NULL),
(25, 'lagu', 'ini.com', '7 pcs', 88, 616, NULL, 24, NULL, NULL),
(26, 'tulis', 'utknya.com', '3 paket', 87, 261, NULL, 25, NULL, NULL),
(27, 'inibudi', 'yes.com', '9 paket', 100, 900, NULL, 26, NULL, NULL),
(28, 'apaya', 'gatau.com', '2 pcs', 10, 20, NULL, 27, NULL, NULL),
(29, 'sofel', 'autan.com', '5 pcs', 1500, 7500, NULL, 28, NULL, NULL),
(30, 'nah', 'kan.com', '4 pcs', 2324, 9296, NULL, 29, NULL, NULL),
(31, 'kain', 'kain.net', '100 pcs', 10000, 1000000, NULL, 30, NULL, NULL),
(32, 'Baju', 'baju.bet', '100 pcs', 1000, 100000, NULL, 31, NULL, '2019-12-08 07:32:34'),
(33, 'Pensil', 'pensil.net', '100 pcs', 1000, 100000, 'Disetujui', 32, NULL, '2019-12-08 07:31:30'),
(34, 'Pulpen', 'pulpen.net', '100 pcs', 2000, 200000, 'Tidak Disetujui', 32, NULL, '2019-12-08 07:31:30'),
(35, 'Penghapus', 'peng.id', '50 pcs', 500, 25000, 'Disetujui', 32, NULL, '2019-12-08 07:31:30'),
(36, 'Tas', 'tas.com', '1 pcs', 1000, 1000, 'Tidak Disetujui', 32, NULL, '2019-12-08 07:31:30'),
(37, 'yeyeee', 'la.com', '12 pcs', 1000, 1000, NULL, 32, NULL, NULL),
(38, 'aaaa', 'aaa', 'aa', 111, 1111, NULL, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_10_29_155041_create-pengajuan-table', 2),
(10, '2019_11_15_181502_create_barang_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pengajuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waket_satker` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `nama_pengajuan`, `unit`, `waket_satker`, `perihal`, `tanggal`, `catatan`, `total_harga`, `created_at`, `updated_at`) VALUES
(22, 'Zul', 'NF Komputer', 'WAKET 1 (LPMI)', 'Pencetakan', '05-12-2019', NULL, 848, '2019-12-05 07:30:58', '2019-12-05 07:30:58'),
(23, 'Kifli', 'NF Komputer', 'WAKET 1 (LPPMI)', 'Pencetakan', '05-12-2019', NULL, 1000, '2019-12-05 07:31:33', '2019-12-05 07:31:33'),
(24, 'Ummi', 'NF Komputer', 'WAKET 1 (PRODI)', 'Pencetakan', '05-12-2019', NULL, 616, '2019-12-05 07:33:22', '2019-12-05 07:33:22'),
(25, 'Kalsum', 'NF Komputer', 'WAKET 1 (PRODI)', 'Pencetakan', '05-12-2019', NULL, 261, '2019-12-05 07:33:54', '2019-12-05 07:33:54'),
(26, 'Muhammad', 'NF Komputer', 'WAKET 3', 'Pencetakan', '05-12-2019', NULL, 900, '2019-12-05 07:35:40', '2019-12-05 07:35:40'),
(27, 'Fakhri', 'NF Komputer', 'WAKET 1 (LPPMI)', 'Pencetakan', '05-12-2019', NULL, 20, '2019-12-05 07:36:17', '2019-12-05 07:36:17'),
(28, 'Wiwi', 'NF Komputer', 'WAKET 1 (LLC)', 'Pencetakan', '05-12-2019', NULL, 7500, '2019-12-05 07:36:54', '2019-12-05 07:36:54'),
(29, 'Ariyanti', 'NF Komputer', 'WAKET 1 (LPMI)', 'Hardware', '05-12-2019', NULL, 9296, '2019-12-05 07:37:32', '2019-12-05 07:37:32'),
(30, 'Arief', 'NF Komputer', 'WAKET 1 (LPMI)', 'Pencetakan', '05-12-2019', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit..', 1000000, '2019-12-05 07:54:07', '2019-12-17 00:56:09'),
(31, 'Aisyah', 'STT NF', 'WAKET 1 (LPMI)', 'Hardware', '05-12-2019', NULL, 100000, '2019-12-05 08:36:26', '2019-12-05 08:36:26'),
(32, 'Jufri', 'STT NF', 'WAKET 1 (LLC)', 'ATK (Alat Tulis Kantor)', '05-12-2019', 'Lorem ipsum dolor sit amet, consectetur adipisicing', 325000, '2019-12-05 08:39:42', '2019-12-08 07:32:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', NULL, '$2y$10$pYM2z2igguGDgkgkvXR0zuNq61FHjIU8FL2vjf2Ba7d8ksATH3CkK', 'AQWl1qqW7G6WDdIlqC8hlIW6iJN7fjdpCWYktpSNJpTUvrfYl6XE3o2gcz8G', '2019-11-18 06:50:57', '2019-11-18 06:50:57'),
(2, 'atasan', 'Atasan', 'atasan@gmail.com', NULL, '$2y$10$PsYVbvjRRDpC5VCnOW03x.ufiJI3gHv7CNvXopHxO4p9.MFvflA0G', 'SSNWWzZ1Azb5JYajbDnU4lA9VXIzQoCqLiGQpQOyYk8njeNqyx6WNFiLBEGe', '2019-11-19 10:40:33', '2019-11-19 10:40:33'),
(3, 'pengajuan', 'Pengajuan', 'pengajuan@gmail.com', NULL, '$2y$10$SSfUZJ20JS.VOe6jINynIe621TxHpjqY7ouWsrsPM7iL5F1s/1DqW', 'AN0HG4iORms4lgPTwrusLWe7gvsE45bATwIJflvg3beGZFJQ0VvGCEwRJgrw', '2019-11-19 10:42:26', '2019-11-19 10:42:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_pengajuan_id_foreign` (`pengajuan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
