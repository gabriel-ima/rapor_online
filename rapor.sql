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
-- Struktur dari tabel `rapor`
--

CREATE TABLE `rapor` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `pendidikan_sebelumnya` varchar(100) DEFAULT NULL,
  `alamat_siswa` varchar(200) DEFAULT NULL,
  `ayah` varchar(100) DEFAULT NULL,
  `ibu` varchar(100) DEFAULT NULL,
  `jalan` varchar(100) DEFAULT NULL,
  `kel_desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `alamat_wali` varchar(200) DEFAULT NULL,
  `sikap_spiritual` text DEFAULT NULL,
  `sikap_sosial` text DEFAULT NULL,
  `mapel` varchar(100) DEFAULT NULL,
  `nilai_mapel` int(11) DEFAULT NULL,
  `predikat_mapel` varchar(10) DEFAULT NULL,
  `deskripsi_mapel` text DEFAULT NULL,
  `nilai_keterampilan` int(11) DEFAULT NULL,
  `predikat_keterampilan` varchar(10) DEFAULT NULL,
  `deskripsi_keterampilan` text DEFAULT NULL,
  `ekstrakurikuler` varchar(100) DEFAULT NULL,
  `keterangan_ekstrakurikuler3` varchar(100) DEFAULT NULL,
  `ekstrakurikuler_2` varchar(100) DEFAULT NULL,
  `keterangan_ekstrakurikuler2` varchar(100) DEFAULT NULL,
  `ekstrakurikuler_3` varchar(100) DEFAULT NULL,
  `keterangan_ekstrakurikuler` varchar(1000) DEFAULT NULL,
  `saran_saran` text DEFAULT NULL,
  `tinggi_semester_1` int(11) DEFAULT NULL,
  `tinggi_semester_2` int(11) DEFAULT NULL,
  `berat_semester_1` int(11) DEFAULT NULL,
  `berat_semester_2` int(11) DEFAULT NULL,
  `kondisi_kesehatan_pendengaran` text DEFAULT NULL,
  `kondisi_kesehatan_penglihatan` text DEFAULT NULL,
  `kondisi_kesehatan_gigi` text DEFAULT NULL,
  `tambahan_aspek_fisik` varchar(100) DEFAULT NULL,
  `keterangan_tambahan_aspek_fisik` text DEFAULT NULL,
  `prestasi_kesenian` text DEFAULT NULL,
  `prestasi_olahraga` text DEFAULT NULL,
  `tambahan_prestasi` varchar(100) DEFAULT NULL,
  `keterangan_tambahan_prestasi` text DEFAULT NULL,
  `ketidakhadiran_hadir` int(11) DEFAULT NULL,
  `ketidakhadiran_sakit` int(11) DEFAULT NULL,
  `ketidakhadiran_izin` int(11) DEFAULT NULL,
  `ketidakhadiran_tanpa_keterangan` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto_catatan_tambahan` varchar(255) DEFAULT NULL,
  `foto_kepsek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rapor`
--

INSERT INTO `rapor` (`id`, `siswa_id`, `nis`, `tempat_lahir`, `gender`, `agama`, `pendidikan_sebelumnya`, `alamat_siswa`, `ayah`, `ibu`, `jalan`, `kel_desa`, `kecamatan`, `kabupaten_kota`, `provinsi`, `nama_wali`, `pekerjaan_wali`, `alamat_wali`, `sikap_spiritual`, `sikap_sosial`, `mapel`, `nilai_mapel`, `predikat_mapel`, `deskripsi_mapel`, `nilai_keterampilan`, `predikat_keterampilan`, `deskripsi_keterampilan`, `ekstrakurikuler`, `keterangan_ekstrakurikuler3`, `ekstrakurikuler_2`, `keterangan_ekstrakurikuler2`, `ekstrakurikuler_3`, `keterangan_ekstrakurikuler`, `saran_saran`, `tinggi_semester_1`, `tinggi_semester_2`, `berat_semester_1`, `berat_semester_2`, `kondisi_kesehatan_pendengaran`, `kondisi_kesehatan_penglihatan`, `kondisi_kesehatan_gigi`, `tambahan_aspek_fisik`, `keterangan_tambahan_aspek_fisik`, `prestasi_kesenian`, `prestasi_olahraga`, `tambahan_prestasi`, `keterangan_tambahan_prestasi`, `ketidakhadiran_hadir`, `ketidakhadiran_sakit`, `ketidakhadiran_izin`, `ketidakhadiran_tanpa_keterangan`, `created_at`, `foto_catatan_tambahan`, `foto_kepsek`) VALUES
(44, 20, '100003', 'Surabaya, 23 Maret 2013', 'P', 'Kong Hu Cu', 'TK Tunas Bangsa', 'Jl. Anggrek No. 12', 'Joko Susanto', 'Dewi Lestari', 'Jl. Anggrek No. 12', 'Tegallega', 'Tandes', 'Surabaya', 'Jawa Timur', 'Agus Suryana', 'PNS', 'Jl. Noto No.5', 'baik', 'baik', '', 0, '', '', 80, 'C', 'tingkatkan!', 'Berenang', '', '', '', '', 'bagus', 'tingkatkan belajar', 100, 123, 40, 45, 'baik', 'baik', 'baik', '', '', 'keren', 'keren', '', '', 0, 1, 1, 0, '2025-06-20 15:17:51', 'Pramuka.jpg', NULL),
(46, 21, '100004', 'Yogyakarta, 17 April 2012', 'P', 'Budha', 'TK Harapan Bunda', 'Jl. Mawar No. 8', 'Agus Haryanto', 'Tati Nurhayanti', 'Jl. Mawar No. 8', 'Cibaduyut', 'Margacinta', 'Bandung', 'Jawa Barat', 'Erna Kurniawati', 'Pegawai Pabrik', 'Jl. Nataindo No.1', 'y', 'y', '', 0, '', '', 90, 'B', 'y', '-', '', '', '', '', '-', '-', 123, 1, 2, 3, '-', '-', '-', '', '', '-', '-', '', '', 0, 0, 0, 0, '2025-06-20 15:48:44', 'Pertukaran Pelajar1.jpg', NULL),
(52, 22, '100005', 'Bekasi, 9 Mei 2013', 'L', 'Hindu', 'TK Pelita Hati', 'Jl. Dahlia No. 22', 'Bambang Setiawan', 'Winda Ayu', 'Jl. Dahlia No. 22', 'Cikutra', 'Paseh', 'Bandung', 'Jawa Barat', 'Nurul Hidayat', 'Dosen', 'Jl. Ir. Juanda No.34', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '2025-06-21 13:25:27', 'ttd_1750512327.jpeg', 'kepsek_22_1750519625.png'),
(53, 18, '100001', 'Bandung, 12 Januari 2013', 'L', 'Islam', 'TK Bintang Ceria', 'Jl. Melati No. 10', 'Budi Santoso', 'Siti Aminah', 'Jl. Melati No.10', 'Sukamaju', 'Coblong', 'Bandung', 'Jawa Barat', 'Toni Prasetyo', 'Wiraswasta', 'Jl. Kenanga No.12', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '2025-06-21 13:26:48', 'ttd_1750512408.jpeg', NULL),
(58, 23, '100006', 'Depok, 28 Juni 2012', 'L', 'Kristen Katolik', 'TK Cahaya Mulia', 'Jl. Flamboyan No. 14', 'Dedi Permana', 'Nani Rahmawati', 'Jl. Flamboyan No. 14', 'Cipedes', 'Kejasan', 'Cirebon', 'Kalimantan Barat', 'Rahmah Syahputro', 'Montir', 'Jl. Pisang No.678', 'bagus', 'keren', '', 0, '', '', 90, 'B', 'bagus', 'Berenang', '', '', '', '', 'tingkatkan', 'keren', 150, 170, 50, 55, 'baik', 'baik', 'baik', '', '', 'bagus', 'bagus', '', '', 0, 4, 2, 0, '2025-06-21 16:16:22', 'ttd_1750522582.png', 'kepsek_23_1750523203.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rapor`
--
ALTER TABLE `rapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
