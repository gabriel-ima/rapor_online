<?php
session_start();
include '../koneksi.php'; // ganti ke koneksi kamu, misal ../koneksi.php

// Cek apakah sudah login sebagai siswa
if (!isset($_SESSION["siswa_id"]) || $_SESSION["role"] != "siswa") {
    header("Location: ../index.php");
    exit();
}

$siswa_id = $_SESSION["siswa_id"];

// Ambil data nilai dari database berdasarkan username
$query = mysqli_query($conn, "SELECT * FROM nilai WHERE siswa_id = '$siswa_id'");

echo "<h2>Dashboard Nilai Anda</h2>";

while ($row = mysqli_fetch_assoc($query)) {
    $mapel = $row['mapel'];
    $nilai_latihan = $row['nilai_latihan'] ?? '-';
    $nilai_ulangan = $row['nilai_ulangan'] ?? '-';
    $nilai_pr = $row['nilai_pr'] ?? '-';
    $nilai_uts = $row['nilai_uts'] ?? '-';
    $nilai_uas = $row['nilai_uas'] ?? '-';
    $nilai_rata2 = $row['nilai_rata2'] ?? '-';
    $predikat = $row['predikat'] ?? '-';

    echo "
    <div style='border:1px solid #ccc; margin:10px; padding:10px; border-radius:10px;'>
        <h3>$mapel <span style='color:blue; float:right;'>$predikat</span></h3>
        <table width='100%' style='background:#eee; text-align:center; margin-top:10px;'>
            <tr>
                <th>Latihan</th><th>UH</th><th>PR</th><th>UTS</th><th>UAS</th>
            </tr>
            <tr>
                <td>$nilai_latihan</td>
                <td>$nilai_ulangan</td>
                <td>$nilai_pr</td>
                <td>$nilai_uts</td>
                <td>$nilai_uas</td>
            </tr>
        </table>
        <p><b>Rata-rata:</b> $nilai_rata2</p>
        <p><b>Rata-rata:</b> $predikat</p>
    </div>";
}
?>
