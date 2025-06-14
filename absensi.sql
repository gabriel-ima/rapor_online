-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2025 pada 20.05
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
  `minggu` int(2) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `status` enum('S','I','A') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `id_siswa`, `minggu`, `mapel`, `status`) VALUES
(1, 1, 1, 'Pendidikan Kewarganegaraan', 'A'),
(2, 1, 2, 'Pendidikan Kewarganegaraan', 'I'),
(3, 1, 3, 'Pendidikan Kewarganegaraan', 'S'),
(4, 1, 4, 'Pendidikan Kewarganegaraan', 'A'),
(5, 1, 5, 'Pendidikan Kewarganegaraan', 'A'),
(6, 1, 6, 'Pendidikan Kewarganegaraan', 'I'),
(7, 1, 7, 'Pendidikan Kewarganegaraan', 'A'),
(8, 1, 8, 'Pendidikan Kewarganegaraan', 'I'),
(9, 1, 9, 'Pendidikan Kewarganegaraan', 'I'),
(10, 1, 10, 'Pendidikan Kewarganegaraan', 'I'),
(11, 1, 11, 'Pendidikan Kewarganegaraan', 'A'),
(12, 1, 12, 'Pendidikan Kewarganegaraan', 'I'),
(13, 1, 13, 'Pendidikan Kewarganegaraan', 'A'),
(14, 1, 14, 'Pendidikan Kewarganegaraan', 'I');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
