-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2025 pada 20.20
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
(15, 18, 'kelas_1', 'Kurikulum_Merdeka', 'Pendidikan_Kewarganegaraan', 90, 90, 90, 87, 88, 89, 'B', 'bagus', 'Ganjil', '2025', 'Elis Suryani, S.Pd', '2025-06-19 13:47:53'),
(16, 18, 'kelas_1', 'Kurikulum_Merdeka', 'Bahasa_Indonesia', 80, 70, 75, 88, 90, 80.6, 'C', 'tingkatkan', 'Ganjil', '2025', 'Elis Suryani, S.Pd', '2025-06-19 16:46:39'),
(17, 19, 'kelas_1', 'Kurikulum_Merdeka', 'Bahasa_Sunda', 80, 90, 88, 78, 85, 84.2, 'B', 'tingkatkan, jangan sampai hilang fokus!', 'Ganjil', '2025', 'Elis Suryani, S.Pd', '2025-06-20 07:23:24'),
(18, 20, 'kelas_1', 'Kurikulum_Merdeka', 'Bahasa_Sunda', 90, 70, 87, 98, 88, 86.6, 'B', 'bagus', 'Ganjil', '2025', 'Elis Suryani, S.Pd', '2025-06-20 15:12:19'),
(19, 20, 'kelas_1', 'Kurikulum_Merdeka', 'Seni_Budaya_dan_Prakarya', 90, 90, 88, 97, 87, 90.4, 'B', 'bagus', 'Ganjil', '2025', 'Elis Suryani, S.Pd', '2025-06-20 15:16:15'),
(20, 23, 'kelas_2', 'Kurikulum_Merdeka', 'Pendidikan_Kewarganegaraan', 90, 90, 90, 80, 90, 88, 'B', 'bagus', 'Ganjil', '2025', 'Imas Komariah, S.Pd', '2025-06-21 16:13:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_ibfk_1` (`siswa_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
