<?php
session_start();
include '../koneksi.php';

if ($_SESSION['role'] != 'kepala_sekolah') {
    header("Location: ../index.php");
    exit();
}

$siswa_id = $_POST['siswa_id'];

// Upload file tanda tangan
$upload_dir = '../uploads/';
$ttd_name = $_FILES['ttd_kepsek']['name'];
$tmp_path = $_FILES['ttd_kepsek']['tmp_name'];

move_uploaded_file($tmp_path, $upload_dir . $ttd_name);

// Update status di database
mysqli_query($conn, "UPDATE rapor SET verifikasi_kepsek='1', ttd_kepsek='$ttd_name' WHERE siswa_id='$siswa_id'");

echo "<script>alert('Rapor berhasil diverifikasi!'); window.location='kepsek_verifikasi_rapor.php';</script>";
