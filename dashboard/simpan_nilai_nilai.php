<?php
session_start();
include "../koneksi.php";

if ($_SESSION['role'] != 'guru') {
    header("Location: ../index.php");
    exit();
}

$mapel = $_POST['mapel'];
$semester = $_POST['semester'];
$tahun_ajaran = $_POST['tahun_ajaran'];
$guru = $_SESSION['username'];

foreach ($_POST['latihan'] as $id => $latihan) {
    $ulangan = $_POST['ulangan'][$id];
    $pr = $_POST['pr'][$id];
    $uts = $_POST['uts'][$id];
    $uas = $_POST['uas'][$id];
    $rata2 = $_POST['rata2'][$id];
    $predikat = $_POST['predikat'][$id];
    $deskripsi = $_POST['deskripsi'][$id];

    // Get kelas siswa
    $siswa_q = mysqli_query($conn, "SELECT kelas FROM users WHERE id='$id'");
    $siswa = mysqli_fetch_assoc($siswa_q);
    $kelas = $siswa['kelas'];

    $query = "INSERT INTO nilai (siswa_id, kelas, mapel, nilai_latihan, nilai_ulangan, nilai_pr, nilai_uts, nilai_uas, nilai_rata2, predikat, deskripsi, semester, tahun_ajaran, guru_username)
              VALUES ('$id', '$kelas', '$mapel', '$latihan', '$ulangan', '$pr', '$uts', '$uas', '$rata2', '$predikat', '$deskripsi', '$semester', '$tahun_ajaran', '$guru')";

    mysqli_query($conn, $query) or die("Gagal: " . mysqli_error($conn));
}
echo "Nilai berhasil disimpan. <a href='tampil_nilai.php'>Lihat Nilai</a>";
?>
