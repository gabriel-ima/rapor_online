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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('guru','wali_kelas','kepala_sekolah','siswa') NOT NULL,
  `kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `kelas`) VALUES
(1, 'Imas Komariah, S.Pd', '19690727', 'guru', NULL),
(2, 'Elis Suryani, S.Pd', '19670216', 'guru', NULL),
(3, 'Eka Ellyawati, S.Pd.M.M', '19810727', 'guru', NULL),
(4, 'Eka Merdekasari, S.Pd', '19850810', 'guru', NULL),
(5, 'Ucu Siti Meilani, S.Pd', '68377716', 'guru', NULL),
(6, 'Hasanudin, S.Pd.I', '19851012', 'guru', NULL),
(7, 'Febi Febriani, S.Pd', '19910228', 'guru', NULL),
(8, 'Ayuni Maulidia, S.Pd', '68377715', 'guru', NULL),
(9, 'Ratih, S.Pd', '68377717', 'guru', NULL),
(10, 'Koh Roo Ye Amelia', '19851013', 'guru', NULL),
(11, 'Imas Komariah', '19000001', 'wali_kelas', NULL),
(12, 'Elis Suryani', '19000002', 'wali_kelas', NULL),
(13, 'Eka Ellyawati', '19000003', 'wali_kelas', NULL),
(14, 'Eka Merdekasari', '19000004', 'wali_kelas', NULL),
(15, 'Ucu Siti Meilani', '19000005', 'wali_kelas', NULL),
(16, 'Ayuni Maulidia', '19000006', 'wali_kelas', NULL),
(17, 'Sri Isyana Kusuma Dewi, S.Pd', '19690001', 'kepala_sekolah', NULL),
(18, 'Ahmad Ramadhan', '010101', 'siswa', 'Kelas_1'),
(19, 'Bagus Pratama', '010105', 'siswa', 'Kelas_1'),
(20, 'Dewi Sartika', '010102', 'siswa', 'Kelas_1'),
(21, 'Intan Permata', '010104', 'siswa', 'Kelas_1'),
(22, 'Joko Setiawan', '010103', 'siswa', 'Kelas_1'),
(23, 'Andi Nugroho', '020202', 'siswa', 'Kelas_2'),
(24, 'Lina Anggraini', '020201', 'siswa', 'Kelas_2'),
(25, 'Melati Ayu', '020205', 'siswa', 'Kelas_2'),
(26, 'Rian Firmansyah', '020204', 'siswa', 'Kelas_2'),
(27, 'Siti Aminah', '020203', 'siswa', 'Kelas_2'),
(28, 'Ali Akbar', '030305', 'siswa', 'Kelas_3'),
(29, 'Hendra Saputra', '030303', 'siswa', 'Kelas_3'),
(30, 'Putri Ayu', '030304', 'siswa', 'Kelas_3'),
(31, 'Taufik Hidayat', '030301', 'siswa', 'Kelas_3'),
(32, 'Wulan Dwi', '030302', 'siswa', 'Kelas_3'),
(33, 'Dina Rahmawati', '040401', 'siswa', 'Kelas_4'),
(34, 'Fajar Sidiq', '040402', 'siswa', 'Kelas_4'),
(35, 'Haris Maulana', '040404', 'siswa', 'Kelas_4'),
(36, 'Nina Kusuma', '040403', 'siswa', 'Kelas_4'),
(37, 'Yulia Fitria', '040405', 'siswa', 'Kelas_4'),
(38, 'Ayu Larasati', '050504', 'siswa', 'Kelas_5'),
(39, 'Bayu Seto', '050501', 'siswa', 'Kelas_5'),
(40, 'Rian Hidayah', '050505', 'siswa', 'Kelas_5'),
(41, 'Rizky Putra', '050503', 'siswa', 'Kelas_5'),
(42, 'Sari Indah', '050502', 'siswa', 'Kelas_5'),
(43, 'Ahmad Syakir', '060603', 'siswa', 'Kelas_6'),
(44, 'Bella Kurnia', '060604', 'siswa', 'Kelas_6'),
(45, 'Della Nurhaliza', '060602', 'siswa', 'Kelas_6'),
(46, 'Gilang Mahesa', '060605', 'siswa', 'Kelas_6'),
(47, 'Zaki Ananda', '060601', 'siswa', 'Kelas_6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
