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
$nilai_latihan = $_POST['nilai_latihan']; 
$nilai_ulangan = $_POST['nilai_ulangan']; 
$nilai_pr = $_POST['nilai_pr']; 
$nilai_uts = $_POST['nilai_uts']; 
$nilai_uas = $_POST['nilai_uas']; 
$nilai_rata2 = $_POST['nilai_rata2'] ?? '';
$predikat = $_POST['predikat'] ?? 0;
$deskripsi = $_POST['deskripsi'] ?? null;
$semester = $_POST['semester'] ?? null;
$tahun_ajaran = $_POST['tahun_ajaran'] ?? null;
$guru = $_SESSION['username'] ?? null;

$nilai_rata2 = ($nilai_latihan + $nilai_ulangan + $nilai_pr + $nilai_uts + $nilai_uas) / 5;

// Tentukan predikat
if ($nilai_rata2 >= 93 && $nilai_rata2 <= 100) {
    $predikat = 'A';
} elseif ($nilai_rata2 >= 84) {
    $predikat = 'B';
} elseif ($nilai_rata2 >= 75) {
    $predikat = 'C';
} else {
    $predikat = 'D';
}

// Validasi sederhana
if (!$siswa_id || !$mapel || !$nilai_latihan || !$nilai_ulangan || !$nilai_pr || !$nilai_uts || !$nilai_uas || !$semester || !$tahun_ajaran) {
    die("Data tidak lengkap.");
}

// Simpan ke database
$query = "INSERT INTO nilai (siswa_id, kelas, kurikulum, mapel, nilai_latihan, nilai_ulangan, nilai_pr, nilai_uts, nilai_uas, nilai_rata2, predikat, deskripsi, semester, tahun_ajaran, guru_username)
          VALUES ('$siswa_id', '$kelas', '$kurikulum', '$mapel', '$nilai_latihan', '$nilai_ulangan', '$nilai_pr', '$nilai_uts', '$nilai_uas', '$nilai_rata2', '$predikat', '$deskripsi', '$semester', '$tahun_ajaran', '$guru')";

if (mysqli_query($conn, $query)) {
    echo "Nilai berhasil disimpan. <a href='tampil_nilai.php'>Lihat Nilai</a>";
} else {
    echo "Gagal menyimpan nilai: " . mysqli_error($conn);
}
?>
