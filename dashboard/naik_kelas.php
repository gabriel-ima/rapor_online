<?php
include "../koneksi.php";
session_start();

if ($_SESSION['role'] != 'kepala_sekolah' && $_SESSION['role'] != 'wali_kelas') {
    die("❌ Akses ditolak.");
}

$siswa_id = $_POST['siswa_id'] ?? '';
$kelas_lama = $_POST['kelas_lama'] ?? '';

if (!$siswa_id || !$kelas_lama) {
    die("❌ Data tidak lengkap.");
}

// Ambil angka dari kelas lama (contoh: Kelas_1 → 1)
preg_match('/\d+/', $kelas_lama, $matches);
$angka_kelas = isset($matches[0]) ? (int)$matches[0] : null;

if (!$angka_kelas || $angka_kelas >= 6) {
    die("❌ Siswa tidak bisa dinaikkan kelas.");
}

$kelas_baru = 'Kelas_' . ($angka_kelas + 1);
$tahun_ajaran = date('Y') . '/' . (date('Y') + 1);

// Update ke tabel users
mysqli_query($conn, "UPDATE users SET kelas = '$kelas_baru' WHERE id = '$siswa_id'");

// Simpan riwayat
mysqli_query($conn, "INSERT INTO riwayat_kelas (siswa_id, kelas_sebelumnya, kelas_sekarang, tahun_ajaran)
    VALUES ('$siswa_id', '$kelas_lama', '$kelas_baru', '$tahun_ajaran')");

// Redirect atau tampilkan pesan
echo "<script>alert('✅ Siswa berhasil dinaikkan ke $kelas_baru.'); window.history.back();</script>";
?>
