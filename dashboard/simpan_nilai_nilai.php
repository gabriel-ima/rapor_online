<?php
session_start();
include "../koneksi.php";

if ($_SESSION['role'] != 'guru') {
    header("Location: ../index.php");
    exit();
}

$siswa_id = $_POST['siswa_id'] ?? null;
$kelas = $_POST['kelas'] ?? null;
$kurikulum = $_POST['kurikulum'] ?? null;
$mapel = $_POST['mapel'] ?? null;
$nilai_intra = $_POST['nilai_intra'] ?? null;
$deskripsi = $_POST['deskripsi'] ?? null;
$semester = $_POST['semester'] ?? null;
$tahun_ajaran = $_POST['tahun_ajaran'] ?? null;
$guru = $_SESSION['username'] ?? null;

// Validasi sederhana
if (!$siswa_id || !$mapel || !$nilai_intra || !$semester || !$tahun_ajaran) {
    die("Data tidak lengkap.");
}

// Simpan ke database
$query = "INSERT INTO nilai (siswa_id, kelas, kurikulum, mapel, nilai_intra, deskripsi, semester, tahun_ajaran, guru_username)
          VALUES ('$siswa_id', '$kelas', '$kurikulum', '$mapel', '$nilai_intra', '$deskripsi', '$semester', '$tahun_ajaran', '$guru')";

if (mysqli_query($conn, $query)) {
    echo "Nilai berhasil disimpan. <a href='tampil_nilai.php'>Lihat Nilai</a>";
} else {
    echo "Gagal menyimpan nilai: " . mysqli_error($conn);
}
?>
