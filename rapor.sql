-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2025 pada 18.16
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
  `ketidakhadiran_sakit` int(11) DEFAULT NULL,
  `ketidakhadiran_izin` int(11) DEFAULT NULL,
  `ketidakhadiran_tanpa_keterangan` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rapor`
--

INSERT INTO `rapor` (`id`, `siswa_id`, `nis`, `tempat_lahir`, `gender`, `agama`, `pendidikan_sebelumnya`, `alamat_siswa`, `ayah`, `ibu`, `jalan`, `kel_desa`, `kecamatan`, `kabupaten_kota`, `provinsi`, `nama_wali`, `pekerjaan_wali`, `alamat_wali`, `sikap_spiritual`, `sikap_sosial`, `mapel`, `nilai_mapel`, `predikat_mapel`, `deskripsi_mapel`, `nilai_keterampilan`, `predikat_keterampilan`, `deskripsi_keterampilan`, `saran_saran`, `tinggi_semester_1`, `tinggi_semester_2`, `berat_semester_1`, `berat_semester_2`, `kondisi_kesehatan_pendengaran`, `kondisi_kesehatan_penglihatan`, `kondisi_kesehatan_gigi`, `tambahan_aspek_fisik`, `keterangan_tambahan_aspek_fisik`, `prestasi_kesenian`, `prestasi_olahraga`, `tambahan_prestasi`, `keterangan_tambahan_prestasi`, `ketidakhadiran_sakit`, `ketidakhadiran_izin`, `ketidakhadiran_tanpa_keterangan`, `created_at`) VALUES
(1, 18, '12345', 'Sukabumi, 5 September 2025', 'laki_laki', 'katolik', 'TK BPK PENABUR', 'Jl. Sekeoa', 'Sura', 'Ram', 'Jl. Pajagalan', '', 'Warudoyong', '', 'Jawa Barat', '-', '-', '-', 'keren', 'bagus', 'matematika', 90, '', 'keren', 87, '', 'tingkatkan', '-', 160, 165, 54, 50, 'bagus', 'bagus', 'bagus', '', '', 'keren', 'keren', '', '', 4, 8, 2, '2025-06-14 15:59:12');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
