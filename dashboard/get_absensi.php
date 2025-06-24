<?php
session_start();
include "../koneksi.php";

$siswa_id = (int)$_GET['id'];
$data = ['sakit' => 0, 'izin' => 0, 'alpa' => 0];

if ($siswa_id > 0) {
    // Hitung sakit 
    $query_sakit = mysqli_query($conn, "SELECT COUNT(*) AS total FROM absensi WHERE id_siswa='$siswa_id' AND status='S'");
    $data['sakit'] = (int)mysqli_fetch_assoc($query_sakit)['total'];

    // Hitung izin 
    $query_izin = mysqli_query($conn, "SELECT COUNT(*) AS total FROM absensi WHERE id_siswa='$siswa_id' AND status='I'");
    $data['izin'] = (int)mysqli_fetch_assoc($query_izin)['total'];

    // Hitung alpa
    $query_alpa = mysqli_query($conn, "SELECT COUNT(*) AS total FROM absensi WHERE id_siswa='$siswa_id' AND status='A'");
    $data['alpa'] = (int)mysqli_fetch_assoc($query_alpa)['total'];
}
header('Content-Type: application/json');
echo json_encode($data);

?>
