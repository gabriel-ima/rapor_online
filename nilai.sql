-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2025 pada 06.51
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
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `kurikulum` varchar(50) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `nilai_latihan` int(11) DEFAULT NULL,
  `nilai_ulangan` int(11) DEFAULT NULL,
  `nilai_pr` int(11) DEFAULT NULL,
  `nilai_uts` int(11) DEFAULT NULL,
  `nilai_uas` int(11) DEFAULT NULL,
  `nilai_rata2` float DEFAULT NULL,
  `predikat` char(1) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `guru_username` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `siswa_id`, `kelas`, `kurikulum`, `mapel`, `nilai_latihan`, `nilai_ulangan`, `nilai_pr`, `nilai_uts`, `nilai_uas`, `nilai_rata2`, `predikat`, `deskripsi`, `semester`, `tahun_ajaran`, `guru_username`, `created_at`) VALUES
(5, 20, 'kelas_1', 'Kurikulum_Merdeka', 'Matematika', 80, 90, 70, 90, 60, NULL, NULL, 'bagus', 'Ganjil', '2025', 'Imas Komariah, S.Pd', '2025-06-17 02:30:52'),
(6, 18, 'kelas_1', 'Kurikulum_Merdeka', 'Matematika', 80, 90, 70, 90, 60, NULL, NULL, 'tingkatkan', 'Ganjil', '2025', 'Imas Komariah, S.Pd', '2025-06-17 02:39:26'),
(7, 18, 'kelas_1', 'Kurikulum_Merdeka', 'Matematika', 80, 90, 70, 90, 60, 78, 'C', 'tingkatkan', 'Ganjil', '2025', 'Imas Komariah, S.Pd', '2025-06-17 02:40:26'),
(8, 18, 'kelas_1', 'Kurikulum_Merdeka', 'Matematika', 80, 90, 70, 90, 60, 78, 'C', 'tingkatkan', 'Ganjil', '2025', 'Imas Komariah, S.Pd', '2025-06-17 02:40:29'),
(9, 21, 'kelas_3', 'Kurikulum_Merdeka', 'Bahasa_Indonesia', 90, 90, 90, 90, 90, 90, 'B', 'keren\r\n\r\n', 'Ganjil', '2025', 'Imas Komariah, S.Pd', '2025-06-17 02:44:39'),
(10, 21, 'kelas_3', 'Kurikulum_Merdeka', 'Bahasa_Indonesia', 90, 90, 90, 90, 90, 90, 'B', 'keren\r\n\r\n', 'Ganjil', '2025', 'Imas Komariah, S.Pd', '2025-06-17 02:48:25'),
(11, 21, 'kelas_3', 'Kurikulum_Merdeka', 'Pendidikan_Kewarganegaraan', 80, 80, 80, 80, 80, 80, 'C', 'bagus', 'Ganjil', '2025', 'Imas Komariah, S.Pd', '2025-06-17 02:59:03'),
(12, 21, 'kelas_3', 'Kurikulum_Merdeka', 'Pendidikan_Kewarganegaraan', 80, 80, 80, 80, 80, 80, 'C', 'bagus', 'Ganjil', '2025', 'Imas Komariah, S.Pd', '2025-06-17 02:59:13'),
(13, 18, 'kelas_3', 'Kurikulum_Merdeka', 'Bahasa_Indonesia', 90, 90, 90, 90, 90, 90, 'B', 'keren', 'Ganjil', '2025', 'Imas Komariah, S.Pd', '2025-06-17 03:19:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
