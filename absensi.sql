-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2025 pada 06.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapor_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `minggu` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `id_siswa`, `minggu`, `hari`, `mapel`, `status`, `updated_at`) VALUES
(259, 18, 1, 'Senin', '', 'H', '2025-06-24 01:56:48'),
(260, 19, 1, 'Senin', '', 'H', '2025-06-24 01:56:48'),
(261, 20, 1, 'Senin', '', 'H', '2025-06-24 01:56:48'),
(262, 21, 1, 'Senin', '', 'H', '2025-06-24 01:56:48'),
(263, 22, 1, 'Senin', '', 'H', '2025-06-24 01:56:48'),
(264, 18, 2, 'Selasa', '', 'H', '2025-06-24 01:57:22'),
(265, 19, 2, 'Selasa', '', 'S', '2025-06-24 01:57:22'),
(266, 20, 2, 'Selasa', '', 'S', '2025-06-24 01:57:22'),
(267, 21, 2, 'Selasa', '', 'H', '2025-06-24 01:57:22'),
(268, 22, 2, 'Selasa', '', 'S', '2025-06-24 01:57:22'),
(269, 18, 3, 'Senin', '', 'H', '2025-06-24 03:30:38'),
(270, 19, 3, 'Senin', '', 'H', '2025-06-24 03:30:38'),
(271, 20, 3, 'Senin', '', 'H', '2025-06-24 03:30:38'),
(272, 21, 3, 'Senin', '', 'H', '2025-06-24 03:30:38'),
(273, 22, 3, 'Senin', '', 'H', '2025-06-24 03:30:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`,`minggu`,`mapel`),
  ADD UNIQUE KEY `unique_absensi` (`id_siswa`,`minggu`,`hari`),
  ADD UNIQUE KEY `absensi_unique` (`id_siswa`,`minggu`,`hari`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
