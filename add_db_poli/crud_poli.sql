-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 07:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_poli`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_polis`
--

CREATE TABLE `daftar_polis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `keluhan` text NOT NULL,
  `no_antrian` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_polis`
--

INSERT INTO `daftar_polis` (`id`, `id_pasien`, `id_jadwal`, `keluhan`, `no_antrian`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'pusing', 1, '2024-01-02 03:24:48', '2024-01-02 03:24:48'),
(2, 1, 1, 'Batuk', 2, '2024-01-02 05:13:12', '2024-01-02 05:13:12'),
(3, 3, 1, 'Pusing', 1, '2024-01-05 03:28:16', '2024-01-05 03:28:16'),
(4, 5, 1, 'demam', 2, '2024-01-05 10:22:48', '2024-01-05 10:22:48'),
(5, 6, 1, 'Batuk', 3, '2024-01-05 10:26:20', '2024-01-05 10:26:20'),
(36, 12, 4, 'Sakit Kepala', 4, '2024-01-05 11:20:15', '2024-01-05 11:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksas`
--

CREATE TABLE `detail_periksas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_periksa` bigint(20) UNSIGNED NOT NULL,
  `id_obat` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` bigint(20) NOT NULL,
  `id_poli` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `nama`, `alamat`, `no_hp`, `id_poli`, `created_at`, `updated_at`) VALUES
(1, 'Bambang', 'Jln Imam Bonjol', 8213865743, 2, '2023-12-26 21:39:39', '2023-12-30 08:44:42'),
(2, 'Joko', 'Salatiga', 89765432456, 2, '2023-12-27 00:57:58', '2023-12-27 00:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_periksas`
--

CREATE TABLE `jadwal_periksas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dokter` bigint(20) UNSIGNED NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_periksas`
--

INSERT INTO `jadwal_periksas` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`) VALUES
(1, 2, 'senin', '13:00:00', '20:00:00', '2023-12-27 01:12:21', '2023-12-27 01:12:21'),
(4, 1, 'selasa', '12:00:00', '20:00:00', '2024-01-05 11:18:00', '2024-01-05 11:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_27_040858_create_obats_table', 2),
(6, '2023_12_27_041733_create_polis_table', 3),
(7, '2023_12_27_042649_create_dokters_table', 4),
(8, '2023_12_27_071358_create_jadwal_periksas_table', 5),
(9, '2023_12_30_154559_create_pasiens_table', 6),
(10, '2024_01_01_122709_create_pasiens_table', 7),
(11, '2024_01_01_141117_create_daftar_polis_table', 8),
(12, '2024_01_02_105217_create_periksas_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `obats`
--

CREATE TABLE `obats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `kemasan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obats`
--

INSERT INTO `obats` (`id`, `nama_obat`, `kemasan`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'paracetamol', 'tablet', 20000, '2023-12-26 21:16:42', '2023-12-27 00:57:15'),
(2, 'bodrexin', 'tablet', 5000, '2023-12-27 00:56:55', '2023-12-27 00:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `no_rm` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `nama`, `alamat`, `no_ktp`, `no_hp`, `no_rm`, `created_at`, `updated_at`) VALUES
(1, 'Herlambang', 'Jln Imam Bonjol', '332211145678900023', '082134567871', '202401-001', '2024-01-01 07:04:18', '2024-01-01 07:04:18'),
(3, 'Bagus Maulana', 'Jalan Soekarno Hatta', '333222111705689008', '082138544567', '202401-002', '2024-01-05 02:45:36', '2024-01-05 02:45:36'),
(4, 'Dika', 'Jalan Soekarno Hatta', '3322111705678888421', '082138547898', '202401-003', '2024-01-05 06:09:50', '2024-01-05 06:09:50'),
(5, 'Raka', 'Jalan Maguwoharjo', '3332221117056890890', '082138547887', '202401-004', '2024-01-05 09:35:27', '2024-01-05 09:35:27'),
(6, 'Danang', 'Kota Salatiga', '3322111705000890', '0821385445431', '202401-005', '2024-01-05 10:26:06', '2024-01-05 10:26:06'),
(12, 'Ahmad', 'Kabupaten Bandung', '3322111705000005234', '082138547843', '202401-006', '2024-01-05 11:19:56', '2024-01-05 11:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periksas`
--

CREATE TABLE `periksas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_daftar_poli` bigint(20) UNSIGNED NOT NULL,
  `tgl_periksa` date NOT NULL,
  `catatan` text NOT NULL,
  `biaya_periksa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periksas`
--

INSERT INTO `periksas` (`id`, `id_daftar_poli`, `tgl_periksa`, `catatan`, `biaya_periksa`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-01-05', 'DB', 155000, '2024-01-05 05:08:03', '2024-01-05 05:08:03'),
(2, 2, '2024-01-05', 'Obat Pusing Kepala', 155000, '2024-01-05 06:27:46', '2024-01-05 06:27:46'),
(5, 3, '2024-01-05', 'Obat Pusing', 155000, '2024-01-05 11:18:56', '2024-01-05 11:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polis`
--

CREATE TABLE `polis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_poli` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polis`
--

INSERT INTO `polis` (`id`, `nama_poli`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Anak', 'Dokter pengecekan anak', '2023-12-26 12:30:26', '2023-12-26 12:30:26'),
(2, 'Poliklinik Udinus', 'Universitas Dian Nuswantoro', '2023-12-27 00:55:52', '2023-12-27 00:55:52'),
(3, 'Jantung', 'Spesialis penyakit jantung', '2024-01-04 20:49:26', '2024-01-04 20:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_dokter` int(1) NOT NULL,
  `is_pasien` int(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `is_dokter`, `is_pasien`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'admin@gmail.com', NULL, '$2y$12$5oKxhomgShOIKeh2cykxFe0j8qhaaSKAwwl6LUsZ5fWLDXX2ua14y', 1, 0, 0, NULL, '2023-12-26 21:04:58', '2023-12-26 21:04:58'),
(2, 'Dr. Angga', 'angga@gmail.com', NULL, '$2y$12$5oKxhomgShOIKeh2cykxFe0j8qhaaSKAwwl6LUsZ5fWLDXX2ua14y', 0, 1, 0, NULL, '2023-12-26 21:04:58', '2024-01-05 06:34:06'),
(3, 'Joko', 'joko@gmail.com', NULL, '$2y$12$5oKxhomgShOIKeh2cykxFe0j8qhaaSKAwwl6LUsZ5fWLDXX2ua14y', 0, 0, 3, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_polis`
--
ALTER TABLE `daftar_polis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_polis_id_pasien_foreign` (`id_pasien`),
  ADD KEY `daftar_polis_id_jadwal_foreign` (`id_jadwal`);

--
-- Indexes for table `detail_periksas`
--
ALTER TABLE `detail_periksas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_periksas_id_periksa_foreign` (`id_periksa`),
  ADD KEY `detail_periksas_id_obat_foreign` (`id_obat`);

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokters_id_poli_foreign` (`id_poli`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal_periksas`
--
ALTER TABLE `jadwal_periksas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_periksas_id_dokter_foreign` (`id_dokter`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pasiens_no_rm_unique` (`no_rm`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `periksas`
--
ALTER TABLE `periksas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periksas_id_daftar_poli_foreign` (`id_daftar_poli`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polis`
--
ALTER TABLE `polis`
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
-- AUTO_INCREMENT for table `daftar_polis`
--
ALTER TABLE `daftar_polis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `detail_periksas`
--
ALTER TABLE `detail_periksas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_periksas`
--
ALTER TABLE `jadwal_periksas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `obats`
--
ALTER TABLE `obats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `periksas`
--
ALTER TABLE `periksas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polis`
--
ALTER TABLE `polis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_polis`
--
ALTER TABLE `daftar_polis`
  ADD CONSTRAINT `daftar_polis_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daftar_polis_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dokters`
--
ALTER TABLE `dokters`
  ADD CONSTRAINT `dokters_id_poli_foreign` FOREIGN KEY (`id_poli`) REFERENCES `polis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_periksas`
--
ALTER TABLE `jadwal_periksas`
  ADD CONSTRAINT `jadwal_periksas_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `periksas`
--
ALTER TABLE `periksas`
  ADD CONSTRAINT `periksas_id_daftar_poli_foreign` FOREIGN KEY (`id_daftar_poli`) REFERENCES `daftar_polis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
