<?php
session_start();
include "koneksi.php";

$guru_id = $_SESSION['user_id']; // ID guru dari sesi login
$siswa_id = $_POST['siswa_id'];
$mapel = $_POST['mapel'];
$nilai_intra = $_POST['nilai_intra'];
$nilai_ekstra = $_POST['nilai_ekstra'];
$rata = ($nilai_intra + $nilai_ekstra) / 2;
$predikat = ($rata >= 90) ? 'A' : (($rata >= 75) ? 'B' : 'C');
$deskripsi = $_POST['deskripsi'];
$sikap_spiritual = $_POST['sikap_spiritual'];
$sikap_sosial = $_POST['sikap_sosial'];
$semester = $_POST['semester'];
$tahun_ajaran = $_POST['tahun_ajaran'];

$sql = "INSERT INTO nilai 
    (siswa_id, guru_id, mapel, nilai_intra, nilai_ekstra, rata_rata, predikat, deskripsi, sikap_spiritual, sikap_sosial, semester, tahun_ajaran) 
    VALUES 
    ('$siswa_id', '$guru_id', '$mapel', '$nilai_intra', '$nilai_ekstra', '$rata', '$predikat', '$deskripsi', '$sikap_spiritual', '$sikap_sosial', '$semester', '$tahun_ajaran')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Nilai berhasil disimpan'); window.location='input_nilai.php';</script>";
} else {
    echo "Gagal menyimpan: " . mysqli_error($conn);
}
?>
