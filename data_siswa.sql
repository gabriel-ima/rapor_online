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
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `pendidikan_sebelumnya` varchar(100) DEFAULT NULL,
  `alamat_siswa` text DEFAULT NULL,
  `ayah` varchar(100) DEFAULT NULL,
  `ibu` varchar(100) DEFAULT NULL,
  `jalan` varchar(100) DEFAULT NULL,
  `kel_desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `alamat_wali` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nama`, `nis`, `tempat_lahir`, `gender`, `agama`, `pendidikan_sebelumnya`, `alamat_siswa`, `ayah`, `ibu`, `jalan`, `kel_desa`, `kecamatan`, `kabupaten_kota`, `provinsi`, `nama_wali`, `pekerjaan_wali`, `alamat_wali`) VALUES
(18, 'Ahmad Ramadhan', '100001', 'Bandung, 12 Januari 2013', 'L', 'Islam', 'TK Bintang Ceria', 'Jl. Melati No. 10', 'Budi Santoso', 'Siti Aminah', 'Jl. Melati No.10', 'Sukamaju', 'Coblong', 'Bandung', 'Jawa Barat', 'Toni Prasetyo', 'Wiraswasta', 'Jl. Kenanga No.12'),
(19, 'Bagus Pratama', '100002', 'Jakarta, 5 Februari 2012', 'L', 'Kristen Protestan', 'TK Kasih Ibu', 'Jl. Kenanga No. 5', 'Andi Prasetyo', 'Rina Marlina', 'l. Kenanga No. 5', 'Mekarwangi', 'Beji', 'Depok', 'Jawa Barat', 'Wulan Lina', 'Guru', 'Jl. Bojongkokosan No.32'),
(20, 'Dewi Sartika', '100003', 'Surabaya, 23 Maret 2013', 'P', 'Kong Hu Cu', 'TK Tunas Bangsa', 'Jl. Anggrek No. 12', 'Joko Susanto', 'Dewi Lestari', 'Jl. Anggrek No. 12', 'Tegallega', 'Tandes', 'Surabaya', 'Jawa Timur', 'Agus Suryana', 'PNS', 'Jl. Noto No.5'),
(21, 'Intan Permata', '100004', 'Yogyakarta, 17 April 2012', 'P', 'Budha', 'TK Harapan Bunda', 'Jl. Mawar No. 8', 'Agus Haryanto', 'Tati Nurhayanti', 'Jl. Mawar No. 8', 'Cibaduyut', 'Margacinta', 'Bandung', 'Jawa Barat', 'Erna Kurniawati', 'Pegawai Pabrik', 'Jl. Nataindo No.1'),
(22, 'Joko Setiawan', '100005', 'Bekasi, 9 Mei 2013', 'L', 'Hindu', 'TK Pelita Hati', 'Jl. Dahlia No. 22', 'Bambang Setiawan', 'Winda Ayu', 'Jl. Dahlia No. 22', 'Cikutra', 'Paseh', 'Bandung', 'Jawa Barat', 'Nurul Hidayat', 'Dosen', 'Jl. Ir. Juanda No.34'),
(23, 'Andi Nugroho', '100006', 'Depok, 28 Juni 2012', 'L', 'Kristen Katolik', 'TK Cahaya Mulia', 'Jl. Flamboyan No. 14', 'Dedi Permana', 'Nani Rahmawati', 'Jl. Flamboyan No. 14', 'Cipedes', 'Kejasan', 'Cirebon', 'Kalimantan Barat', 'Rahmah Syahputro', 'Montir', 'Jl. Pisang No.678'),
(24, 'Lina Anggraini', '100007', 'Tangerang, 4 Juli 2013', 'P', 'Islam', 'TK Aisyiyah 1', 'Jl. Sawo No. 6', 'Budi Prasetyo', 'Sari Wulandari', 'Jl. Sawo No. 6', 'Sukamaju', 'Babakan', 'Bandung', 'Jawa Barat', 'Asmarandana', 'Masinis', 'Jl. Shadow No. 9'),
(25, 'Melati Ayu', '100008', 'Bogor, 15 Agustus 2012', 'P', 'Kristen Katolik', 'TK Kristen Gloria', 'Jl. Jeruk No. 11', 'Rudi Hartono', 'Yuni Safitri', 'Jl. Jeruk No. 11', 'Cibeunying', 'Tikala', 'Manado', 'Sulawesi Utara', 'Michelle Wijaksono', 'Pilot', 'Jl. Goa No. 6'),
(26, 'Rian Firmansyah', '100009', 'Cimahi, 30 September 2013', 'L', 'Kristen Protestan', 'TK Pertiwi', 'Jl. Apel No. 17', 'Anton Wijaya', 'Nur Aisyah', 'Jl. Apel No. 17', 'Margahayu', 'Pontianak Kota', 'Pontianak', 'Kalimantan Barat', 'Greysia Sijabat', 'Tentara', 'Jl. Salak No. 9'),
(27, 'Siti Aminah', '100010', 'Garut, 10 Oktober 2012', 'P', 'Hindu', 'TK Bhayangkari 2', 'Jl. Mangga No. 4', 'Wahyu Hidayat', 'Evi Lestari', 'Jl. Mangga No. 4', 'Cicaheum', 'Curug', 'Serang', 'Banten', 'Eka Poli', 'Polisi', 'Jl. Kubis No. 1'),
(28, 'Ali Akbar', '100011', 'Cirebon, 6 November 2013', 'L', 'Islam', 'TK Al-Hikmah', 'Jl. Salak No. 19', 'Dimas Saputra', 'Rani Amelia', 'Jl. Salak No. 19', 'Kiaracondong', 'Denpasar Barat', 'Denpasar', 'Bali', 'Hendra Gustiawana', 'Karyawan Swasta', 'Jl. Meja No. 45'),
(29, 'Hendra Saputra', '100012', 'Tasikmalaya, 25 Desember 2012', 'L', 'Islam', 'TK Islam Terpadu An-Nur', 'Jl. Teratai No. 7', 'Arief Nugroho', 'Desi Marlina', 'Jl. Teratai No. 7', 'Cisaranten', 'Padang Barat', 'Padang', 'Sumatera Barat', 'Bambang Susilo', 'Penyiar Radio', 'Jl. Bukit No. 12'),
(30, 'Putri Ayu', '100013', 'Semarang, 18 Januari 2013', 'P', 'Budha', 'TK Bhayangkari 2', 'Jl. Cemara No. 9', 'Fajar Kurniawan', 'Mira Astuti', 'Jl. Cemara No. 9', 'Antapani', 'Panakkukang', 'Makassar', 'Sulawesi Selatan', 'Rina Kartikasari', 'Supir', 'Jl. Menawan No. 90'),
(31, 'Taufik Hidayat', '100014', 'Malang, 21 Februari 2012', 'L', 'Islam', 'TK Al-Kautsar', 'Jl. Kamboja No. 13', 'Yudi Pranata', 'Nia Ramadani', 'Jl. Kamboja No. 13', 'Pasirlayung', 'Balikpapan Selatan', 'Balikpapan', 'Kalimantan Timur', 'Tini Wahyuno', 'Montir', 'Jl. Manis No. 45'),
(32, 'Wulan Dwi', '100015', 'Denpasar, 3 Maret 2013', 'P', 'Kristen Protestan', 'TK Santo Yosef', 'Jl. Rambutan No, 15', 'Aldi Ramadhan', 'Fitriani', 'Jl. Rambutan No, 15', 'Cigondewah', 'Banjarmasih Tengah', 'Banjarmasin', 'Kalimantan Selatan', 'Ade Sunandar', 'Wirausaha', 'Jl. Mekar No. 90'),
(33, 'Dina Rahmawati', '100016', 'Medan, 8 April 2012', 'P', 'Kong Hu Cu', 'TK Kristen Eben Haezer', 'Jl. Durian No. 18', 'Heri Santika', 'Lilis Suryani', 'Jl. Durian No. 18', 'Pasirkaliki', 'Coblong', 'Bandung', 'Jawa Barat', 'Dedi Mulyana', 'Aktor', 'Jl. Kursi No. 21'),
(34, 'Fajar Sidiq', '100017', 'Palembang, 12 Mei 2013', 'L', 'Kong Hu Cu', 'TK Permata Hati', 'Jl. Nangka No. 21', 'Tono Kurnia', 'Susi Wahyuni', 'Jl. Nangka No. 21', 'Sadang Serang', 'Curug', 'Bandung', 'Jawa Barat', 'Elis Komari', 'Penyanyi', 'Jl. Nyomplong No 56'),
(35, 'Haris Maulana', '100018', 'Padang, 27 Juni 2012', 'L', 'Islam', 'TK Negeri Pembina', 'Jl.Pisang No. 25', 'Irfan Maulana', 'Eka Fitri', 'Jl. Pisang No. 25', 'Jatihandap', 'Hilir Barat I', 'Bandung', 'Jawa Barat', 'Dian Pratiwi', 'Teller Bank', 'Jl. Pajagalan No. 78'),
(36, 'Nina Kusuma', '100019', 'Makassar, 13 Juli 2013', 'P', 'Budha', 'TK Mawar Putih', 'Jl. Melinjo No. 28', 'Bayu Setiawan', 'Novi Andriani', 'Jl. Melinjo No. 28', 'Ujungberung', 'Subang', 'Bandung', 'Jawa Barat', 'Endang Sukbeti', 'Guru', 'Jl. Sibaling No 67'),
(37, 'Yulia Fitria', '100020', 'Manado, 16 Agustus 2012', 'P', 'Islam', 'TK Al-Furqan', 'Jl. Bayam No. 3', 'Iwan Firmansyah', 'Sri Wahyuningsih', 'Jl.  Bayam No. 3', 'Sukasari', 'Coblong', 'Bandung', 'Jawa Barat', 'Nani Mulyani', 'Guru', 'Jl. Soepomo No. 90'),
(38, 'Ayu Larasati', '100021', 'Pontianak, 1 September 2013', 'P', 'Budha', 'TK Mutiara Bunda', 'Jl. Brokoli No. 10', 'Toni Saputra', 'Lela Kuniasih', 'Jl. Brokoli No. 10', 'Sukagalih', 'Coblong', 'Bandung', 'Jawa Barat', 'Rahmat Syahputro', 'Guru', 'Jl. Tebing No. 89'),
(39, 'Bayu Seto', '100022', 'Balikpapan, 5 Oktober 2012', 'L', 'Kong Hu Cu ', 'TK Santa Maria', 'Jl. Kolonel Masturi No. 5', 'Rio Aditya', 'Melani Putri', 'Jl. Kolonel Masturi No. 5', 'Cisitu', 'Warudoyong', 'Bandung', 'Jawa Barat', 'Rudi Kurnialas', 'Karyawan Swasta', 'Jl. Kenangan No. 76'),
(40, 'Rian Hidayah', '100023', 'Banjarmasin, 29 November 2013', 'L', 'Hindu', 'TK Al-Azhar', 'Jl. Pahlawan No. 20', 'Rangga Permadi', 'Weni Astari', 'Jl. Pahlawan No. 20', 'Cidadap', 'Purwakarta', 'Bandung', 'Jawa Barat', 'Cecep Maulana', 'Engineer IOT', 'Jl. Ciwatuga No. 32'),
(41, 'Rizky Putra', '100024', 'Serang, 7 Desember 2012', 'L', 'Kristen Katolik', 'TK Bina Anak Bangsa', 'Jl. Siliwangi No. 16', 'Galih Nugraha', 'Diah Rahma', 'Jl. Siliwangi No. 16', 'Gegerkalong', 'Coblong', 'Bandung', 'Jawa Barat', 'Nurdin Kusnaidi', 'IT Consultant', 'Jl. Motor No. 90'),
(42, 'Sari Indah', '100025', 'Sukabumi 14 Januari 2013', 'P', 'Islam', 'TK Tunas Harapan', 'Jl. Sudirman No. 7', 'Reza Pahlevi', 'Yulia Ningsih', 'Jl. Sudirman No. 7', 'Sukamulya', 'Coblong', 'Bandung', 'Jawa Barat', 'Jajang Abdullah', 'PNS', 'Jl. Cihapit No. 78'),
(43, 'Ahmad Syakir', '100026', 'Purwakarta, 22 Februari 2012', 'L', 'Budha', 'TK Nurul Ilmi', 'Jl. Ahmad Yani No. 9', 'Wawan Hermawan', 'Intan Amelia', 'Jl. Ahmad Yani No. 9', 'Cibiru', 'Tawang', 'Bandung', 'Jawa Barat', 'Yeni Purwatni', 'Ahli Agama', 'Jl. Ambatu No. 56'),
(44, 'Bella Kunia', '100027', 'Karawang, 19 Maret 2013', 'P', 'Hindu', 'TK Bhakti Luhur', 'Jl. Juanda No. 23', 'Hendra Wijaya', 'Rika Handayani', 'Jl. Juanda No. 23', 'Bojongloa', 'Klojen', 'Bandung', 'Jawa Tengah', 'Sari Kumalasari', 'Pemadam Kebakaran', 'Jl. Cisereuh No. 44'),
(45, 'Della Nurhaliza', '100028', 'Majalengka, 11 April 2012', 'P', 'Hindu', 'TK Melati Indah', 'Jl. Cagak No. 11', 'Aldi Yulianto', 'Putri Tanjung', 'Jl. Cagak No. 11', 'Sukaraja', 'Karawang Barat', 'Bandung', 'Banten', 'Gibran Joko', 'Dokter', 'Jl. Babakan No. 45'),
(46, 'Gilang Mahesa', '100029', 'Subang, 6 Mei 2013', 'L', 'Kristen Protestan', 'TK Bintang Kejora', 'Jl. Rancabango No. 6', 'Iqbal Ramadhan', 'Nita Sari', 'Jl. Rancabango No. 6', 'Cikeruh', 'Banyumanik', 'Jawa Timur', 'Budi Hartanta', '', 'Perawat', 'Jl. Rumah Sakit No.88'),
(47, 'Zaki Ananda', '100030', 'Sumedang, 31 Juli 2012', 'L', 'Kristen Katolik', 'TK Harapan', 'Jl. Rancabolang No. 10', 'Zaki Maulana', 'Elly Rosdiana', 'Jl. Rancabolang No. 10', 'Cilengkrang', 'Baleendah', 'Bandung', 'Jawa Barat', 'Ahmad Rifal', 'Pegawai Kantor', 'Jl. Ukur No. 74');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
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
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `pendidikan_sebelumnya` varchar(100) DEFAULT NULL,
  `alamat_siswa` text DEFAULT NULL,
  `ayah` varchar(100) DEFAULT NULL,
  `ibu` varchar(100) DEFAULT NULL,
  `jalan` varchar(100) DEFAULT NULL,
  `kel_desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `alamat_wali` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nama`, `nis`, `tempat_lahir`, `gender`, `agama`, `pendidikan_sebelumnya`, `alamat_siswa`, `ayah`, `ibu`, `jalan`, `kel_desa`, `kecamatan`, `kabupaten_kota`, `provinsi`, `nama_wali`, `pekerjaan_wali`, `alamat_wali`) VALUES
(18, 'Ahmad Ramadhan', '100001', 'Bandung, 12 Januari 2013', 'L', 'Islam', 'TK Bintang Ceria', 'Jl. Melati No. 10', 'Budi Santoso', 'Siti Aminah', 'Jl. Melati No.10', 'Sukamaju', 'Coblong', 'Bandung', 'Jawa Barat', 'Toni Prasetyo', 'Wiraswasta', 'Jl. Kenanga No.12'),
(19, 'Bagus Pratama', '100002', 'Jakarta, 5 Februari 2012', 'L', 'Kristen Protestan', 'TK Kasih Ibu', 'Jl. Kenanga No. 5', 'Andi Prasetyo', 'Rina Marlina', 'l. Kenanga No. 5', 'Mekarwangi', 'Beji', 'Depok', 'Jawa Barat', 'Wulan Lina', 'Guru', 'Jl. Bojongkokosan No.32'),
(20, 'Dewi Sartika', '100003', 'Surabaya, 23 Maret 2013', 'P', 'Kong Hu Cu', 'TK Tunas Bangsa', 'Jl. Anggrek No. 12', 'Joko Susanto', 'Dewi Lestari', 'Jl. Anggrek No. 12', 'Tegallega', 'Tandes', 'Surabaya', 'Jawa Timur', 'Agus Suryana', 'PNS', 'Jl. Noto No.5'),
(21, 'Intan Permata', '100004', 'Yogyakarta, 17 April 2012', 'P', 'Budha', 'TK Harapan Bunda', 'Jl. Mawar No. 8', 'Agus Haryanto', 'Tati Nurhayanti', 'Jl. Mawar No. 8', 'Cibaduyut', 'Margacinta', 'Bandung', 'Jawa Barat', 'Erna Kurniawati', 'Pegawai Pabrik', 'Jl. Nataindo No.1'),
(22, 'Joko Setiawan', '100005', 'Bekasi, 9 Mei 2013', 'L', 'Hindu', 'TK Pelita Hati', 'Jl. Dahlia No. 22', 'Bambang Setiawan', 'Winda Ayu', 'Jl. Dahlia No. 22', 'Cikutra', 'Paseh', 'Bandung', 'Jawa Barat', 'Nurul Hidayat', 'Dosen', 'Jl. Ir. Juanda No.34'),
(23, 'Andi Nugroho', '100006', 'Depok, 28 Juni 2012', 'L', 'Kristen Katolik', 'TK Cahaya Mulia', 'Jl. Flamboyan No. 14', 'Dedi Permana', 'Nani Rahmawati', 'Jl. Flamboyan No. 14', 'Cipedes', 'Kejasan', 'Cirebon', 'Kalimantan Barat', 'Rahmah Syahputro', 'Montir', 'Jl. Pisang No.678'),
(24, 'Lina Anggraini', '100007', 'Tangerang, 4 Juli 2013', 'P', 'Islam', 'TK Aisyiyah 1', 'Jl. Sawo No. 6', 'Budi Prasetyo', 'Sari Wulandari', 'Jl. Sawo No. 6', 'Sukamaju', 'Babakan', 'Bandung', 'Jawa Barat', 'Asmarandana', 'Masinis', 'Jl. Shadow No. 9'),
(25, 'Melati Ayu', '100008', 'Bogor, 15 Agustus 2012', 'P', 'Kristen Katolik', 'TK Kristen Gloria', 'Jl. Jeruk No. 11', 'Rudi Hartono', 'Yuni Safitri', 'Jl. Jeruk No. 11', 'Cibeunying', 'Tikala', 'Manado', 'Sulawesi Utara', 'Michelle Wijaksono', 'Pilot', 'Jl. Goa No. 6'),
(26, 'Rian Firmansyah', '100009', 'Cimahi, 30 September 2013', 'L', 'Kristen Protestan', 'TK Pertiwi', 'Jl. Apel No. 17', 'Anton Wijaya', 'Nur Aisyah', 'Jl. Apel No. 17', 'Margahayu', 'Pontianak Kota', 'Pontianak', 'Kalimantan Barat', 'Greysia Sijabat', 'Tentara', 'Jl. Salak No. 9'),
(27, 'Siti Aminah', '100010', 'Garut, 10 Oktober 2012', 'P', 'Hindu', 'TK Bhayangkari 2', 'Jl. Mangga No. 4', 'Wahyu Hidayat', 'Evi Lestari', 'Jl. Mangga No. 4', 'Cicaheum', 'Curug', 'Serang', 'Banten', 'Eka Poli', 'Polisi', 'Jl. Kubis No. 1'),
(28, 'Ali Akbar', '100011', 'Cirebon, 6 November 2013', 'L', 'Islam', 'TK Al-Hikmah', 'Jl. Salak No. 19', 'Dimas Saputra', 'Rani Amelia', 'Jl. Salak No. 19', 'Kiaracondong', 'Denpasar Barat', 'Denpasar', 'Bali', 'Hendra Gustiawana', 'Karyawan Swasta', 'Jl. Meja No. 45'),
(29, 'Hendra Saputra', '100012', 'Tasikmalaya, 25 Desember 2012', 'L', 'Islam', 'TK Islam Terpadu An-Nur', 'Jl. Teratai No. 7', 'Arief Nugroho', 'Desi Marlina', 'Jl. Teratai No. 7', 'Cisaranten', 'Padang Barat', 'Padang', 'Sumatera Barat', 'Bambang Susilo', 'Penyiar Radio', 'Jl. Bukit No. 12'),
(30, 'Putri Ayu', '100013', 'Semarang, 18 Januari 2013', 'P', 'Budha', 'TK Bhayangkari 2', 'Jl. Cemara No. 9', 'Fajar Kurniawan', 'Mira Astuti', 'Jl. Cemara No. 9', 'Antapani', 'Panakkukang', 'Makassar', 'Sulawesi Selatan', 'Rina Kartikasari', 'Supir', 'Jl. Menawan No. 90'),
(31, 'Taufik Hidayat', '100014', 'Malang, 21 Februari 2012', 'L', 'Islam', 'TK Al-Kautsar', 'Jl. Kamboja No. 13', 'Yudi Pranata', 'Nia Ramadani', 'Jl. Kamboja No. 13', 'Pasirlayung', 'Balikpapan Selatan', 'Balikpapan', 'Kalimantan Timur', 'Tini Wahyuno', 'Montir', 'Jl. Manis No. 45'),
(32, 'Wulan Dwi', '100015', 'Denpasar, 3 Maret 2013', 'P', 'Kristen Protestan', 'TK Santo Yosef', 'Jl. Rambutan No, 15', 'Aldi Ramadhan', 'Fitriani', 'Jl. Rambutan No, 15', 'Cigondewah', 'Banjarmasih Tengah', 'Banjarmasin', 'Kalimantan Selatan', 'Ade Sunandar', 'Wirausaha', 'Jl. Mekar No. 90'),
(33, 'Dina Rahmawati', '100016', 'Medan, 8 April 2012', 'P', 'Kong Hu Cu', 'TK Kristen Eben Haezer', 'Jl. Durian No. 18', 'Heri Santika', 'Lilis Suryani', 'Jl. Durian No. 18', 'Pasirkaliki', 'Coblong', 'Bandung', 'Jawa Barat', 'Dedi Mulyana', 'Aktor', 'Jl. Kursi No. 21'),
(34, 'Fajar Sidiq', '100017', 'Palembang, 12 Mei 2013', 'L', 'Kong Hu Cu', 'TK Permata Hati', 'Jl. Nangka No. 21', 'Tono Kurnia', 'Susi Wahyuni', 'Jl. Nangka No. 21', 'Sadang Serang', 'Curug', 'Bandung', 'Jawa Barat', 'Elis Komari', 'Penyanyi', 'Jl. Nyomplong No 56'),
(35, 'Haris Maulana', '100018', 'Padang, 27 Juni 2012', 'L', 'Islam', 'TK Negeri Pembina', 'Jl.Pisang No. 25', 'Irfan Maulana', 'Eka Fitri', 'Jl. Pisang No. 25', 'Jatihandap', 'Hilir Barat I', 'Bandung', 'Jawa Barat', 'Dian Pratiwi', 'Teller Bank', 'Jl. Pajagalan No. 78'),
(36, 'Nina Kusuma', '100019', 'Makassar, 13 Juli 2013', 'P', 'Budha', 'TK Mawar Putih', 'Jl. Melinjo No. 28', 'Bayu Setiawan', 'Novi Andriani', 'Jl. Melinjo No. 28', 'Ujungberung', 'Subang', 'Bandung', 'Jawa Barat', 'Endang Sukbeti', 'Guru', 'Jl. Sibaling No 67'),
(37, 'Yulia Fitria', '100020', 'Manado, 16 Agustus 2012', 'P', 'Islam', 'TK Al-Furqan', 'Jl. Bayam No. 3', 'Iwan Firmansyah', 'Sri Wahyuningsih', 'Jl.  Bayam No. 3', 'Sukasari', 'Coblong', 'Bandung', 'Jawa Barat', 'Nani Mulyani', 'Guru', 'Jl. Soepomo No. 90'),
(38, 'Ayu Larasati', '100021', 'Pontianak, 1 September 2013', 'P', 'Budha', 'TK Mutiara Bunda', 'Jl. Brokoli No. 10', 'Toni Saputra', 'Lela Kuniasih', 'Jl. Brokoli No. 10', 'Sukagalih', 'Coblong', 'Bandung', 'Jawa Barat', 'Rahmat Syahputro', 'Guru', 'Jl. Tebing No. 89'),
(39, 'Bayu Seto', '100022', 'Balikpapan, 5 Oktober 2012', 'L', 'Kong Hu Cu ', 'TK Santa Maria', 'Jl. Kolonel Masturi No. 5', 'Rio Aditya', 'Melani Putri', 'Jl. Kolonel Masturi No. 5', 'Cisitu', 'Warudoyong', 'Bandung', 'Jawa Barat', 'Rudi Kurnialas', 'Karyawan Swasta', 'Jl. Kenangan No. 76'),
(40, 'Rian Hidayah', '100023', 'Banjarmasin, 29 November 2013', 'L', 'Hindu', 'TK Al-Azhar', 'Jl. Pahlawan No. 20', 'Rangga Permadi', 'Weni Astari', 'Jl. Pahlawan No. 20', 'Cidadap', 'Purwakarta', 'Bandung', 'Jawa Barat', 'Cecep Maulana', 'Engineer IOT', 'Jl. Ciwatuga No. 32'),
(41, 'Rizky Putra', '100024', 'Serang, 7 Desember 2012', 'L', 'Kristen Katolik', 'TK Bina Anak Bangsa', 'Jl. Siliwangi No. 16', 'Galih Nugraha', 'Diah Rahma', 'Jl. Siliwangi No. 16', 'Gegerkalong', 'Coblong', 'Bandung', 'Jawa Barat', 'Nurdin Kusnaidi', 'IT Consultant', 'Jl. Motor No. 90'),
(42, 'Sari Indah', '100025', 'Sukabumi 14 Januari 2013', 'P', 'Islam', 'TK Tunas Harapan', 'Jl. Sudirman No. 7', 'Reza Pahlevi', 'Yulia Ningsih', 'Jl. Sudirman No. 7', 'Sukamulya', 'Coblong', 'Bandung', 'Jawa Barat', 'Jajang Abdullah', 'PNS', 'Jl. Cihapit No. 78'),
(43, 'Ahmad Syakir', '100026', 'Purwakarta, 22 Februari 2012', 'L', 'Budha', 'TK Nurul Ilmi', 'Jl. Ahmad Yani No. 9', 'Wawan Hermawan', 'Intan Amelia', 'Jl. Ahmad Yani No. 9', 'Cibiru', 'Tawang', 'Bandung', 'Jawa Barat', 'Yeni Purwatni', 'Ahli Agama', 'Jl. Ambatu No. 56'),
(44, 'Bella Kunia', '100027', 'Karawang, 19 Maret 2013', 'P', 'Hindu', 'TK Bhakti Luhur', 'Jl. Juanda No. 23', 'Hendra Wijaya', 'Rika Handayani', 'Jl. Juanda No. 23', 'Bojongloa', 'Klojen', 'Bandung', 'Jawa Tengah', 'Sari Kumalasari', 'Pemadam Kebakaran', 'Jl. Cisereuh No. 44'),
(45, 'Della Nurhaliza', '100028', 'Majalengka, 11 April 2012', 'P', 'Hindu', 'TK Melati Indah', 'Jl. Cagak No. 11', 'Aldi Yulianto', 'Putri Tanjung', 'Jl. Cagak No. 11', 'Sukaraja', 'Karawang Barat', 'Bandung', 'Banten', 'Gibran Joko', 'Dokter', 'Jl. Babakan No. 45'),
(46, 'Gilang Mahesa', '100029', 'Subang, 6 Mei 2013', 'L', 'Kristen Protestan', 'TK Bintang Kejora', 'Jl. Rancabango No. 6', 'Iqbal Ramadhan', 'Nita Sari', 'Jl. Rancabango No. 6', 'Cikeruh', 'Banyumanik', 'Jawa Timur', 'Budi Hartanta', '', 'Perawat', 'Jl. Rumah Sakit No.88'),
(47, 'Zaki Ananda', '100030', 'Sumedang, 31 Juli 2012', 'L', 'Kristen Katolik', 'TK Harapan', 'Jl. Rancabolang No. 10', 'Zaki Maulana', 'Elly Rosdiana', 'Jl. Rancabolang No. 10', 'Cilengkrang', 'Baleendah', 'Bandung', 'Jawa Barat', 'Ahmad Rifal', 'Pegawai Kantor', 'Jl. Ukur No. 74');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
