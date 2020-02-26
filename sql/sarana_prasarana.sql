-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 18 Feb 2020 pada 15.45
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
  `quantity` int(11) NOT NULL,
  `satuan_barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` varchar(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengajuan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `link_gambar`, `quantity`, `satuan_barang`, `harga_satuan`, `jumlah`, `status`, `pengajuan_id`, `created_at`, `updated_at`) VALUES
(1, 'Contrary', 'Contrary', 1, 'pcs', 1000, 1.000, NULL, 1, NULL, NULL),
(2, 'Contrary', 'Contrary', 1, 'pcs', 2000, 2.000, NULL, 1, NULL, NULL),
(3, 'Contrary', 'Contrary', 1, 'pcs', 1000, 1.000, NULL, 2, NULL, NULL),
(4, 'Contrary', 'Contrary', 1, 'pcs', 2000, 2.000, NULL, 2, NULL, NULL),
(5, 'Contrary', 'Contrary', 1, 'pcs', 1000, 1.000, NULL, 3, NULL, NULL),
(6, 'Contrary', 'Contrary', 2, 'pcs', 1000, 2.000, NULL, 3, NULL, NULL),
(7, 'Contrary', 'Contrary', 1, 'pcs', 1000, 1.000, NULL, 4, NULL, NULL),
(8, 'Contrary', 'Contrary', 2, 'pcs', 1000, 2.000, NULL, 4, NULL, NULL),
(9, 'Contrary', 'Contrary', 1, 'pcs', 1000, 1.000, NULL, 5, NULL, NULL),
(10, 'Contrary', 'Contrary', 2, 'pcs', 1000, 2.000, NULL, 5, NULL, NULL);

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_10_29_155041_create_pengajuan_table', 1),
(12, '2019_11_15_181502_create_barang_table', 1);

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
  `proses` enum('Belum','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum',
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `total_harga` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `nama_pengajuan`, `unit`, `waket_satker`, `perihal`, `tanggal`, `proses`, `catatan`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 'Zulkifli Jufri', 'STT NF', 'WAKET 1 (BAAK)', 'ATK (Alat Tulis Kantor)', '18-February-2020', 'Belum', NULL, 3.000, '2020-02-18 14:40:41', '2020-02-18 14:40:41'),
(2, 'Ummi Kalsum', 'NF Komputer', 'WAKET 1 (LLC)', 'Hardware', '19-February-2020', 'Belum', NULL, 3.000, '2020-02-18 14:41:37', '2020-02-18 14:41:37'),
(3, 'Fakhri', 'NF Komputer', 'WAKET 1 (LPMI)', 'Pencetakan', '18-February-2020', 'Belum', NULL, 3.000, '2020-02-18 14:42:21', '2020-02-18 14:42:21'),
(4, 'Yunita', 'NF Komputer', 'WAKET 1 (UPT KOMPUTER)', 'Hardware', '18-February-2020', 'Belum', NULL, 3.000, '2020-02-18 14:43:17', '2020-02-18 14:43:17'),
(5, 'Arief', 'STT NF', 'WAKET 1 (LPMI)', 'Pencetakan', '18-February-2020', 'Belum', NULL, 3.000, '2020-02-18 14:44:12', '2020-02-18 14:44:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$UroaJxv9lIKDYfsyKZDMa.mK2LIDLWSShkONXtLD/yqEzE9.qLrd6', 'IpmgH27LJv1rFZ6ZRADIpQszdi0SsB9YsM4ytCXDGIjTSmqiof3Axkvqrkxo', '2020-02-16 22:13:01', '2020-02-16 22:13:01'),
(2, 'Pengajuan', 'pengajuan', 'pengajuan@gmail.com', NULL, '$2y$10$hljVMAwffmSoIDD3XNOVW.PorrpjU99jWqjFFM/aBmiAHQ4JWgBUK', 'oXWdQHDdnU5EckMEKkZDjGYtL1gPouFKOY75omShKALYDzsg3UrtMMlvBqzznRlQn3mtxlHJXBSWR3RyQRYfSu3WpJ', '2020-02-16 22:40:49', '2020-02-16 22:41:35'),
(3, 'Atasan', 'atasan', 'atasan@gmail.com', NULL, '$2y$10$O65lwpUAZr62ouLvFXvovubK2oilIWiA7Stgz3HmGLIFr0YCINZny', '9gpyNKkFVYwf32gcMnG8U1CUDmgb82tiWNy5uj94tVXkRo7Tx5s1sj0f2SojqWZ8lqS9KFuoLANQZN9WTOxhCqpFDb', '2020-02-16 22:56:31', '2020-02-16 22:56:31');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
