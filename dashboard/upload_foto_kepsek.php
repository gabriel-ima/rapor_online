<?php
session_start();
include '../koneksi.php';

if (!in_array($_SESSION['role'], ['kepala_sekolah'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto_kepsek'])) {
    $siswa_id = $_POST['siswa_id'];

    $upload_dir = '../uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $ext = pathinfo($_FILES['foto_kepsek']['name'], PATHINFO_EXTENSION);
    $ttd_kepsek = 'kepsek_' . $siswa_id . '_' . time() . '.' . $ext;
    $target_file = $upload_dir . $ttd_kepsek;

    if (move_uploaded_file($_FILES['foto_kepsek']['tmp_name'], $target_file)) {
        mysqli_query($conn, "UPDATE rapor SET foto_kepsek = '$ttd_kepsek' WHERE siswa_id = '$siswa_id'");
        echo "<script>alert('Foto berhasil diunggah'); window.location.href='kepsek_preview_rapor.php?siswa_id=$siswa_id';</script>";
    } else {
        echo "<script>alert('Gagal mengunggah foto'); window.history.back();</script>";
    }
}
