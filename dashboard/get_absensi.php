<?php
session_start();
// get_absensi.php
include "../koneksi.php";
$siswa_id = (int)$_GET['id'];
$data = ['sakit' => 0, 'izin' => 0, 'alpa' => 0];

if ($siswa_id > 0) {
    $query_sakit = mysqli_query($conn, "SELECT COUNT(*) AS total FROM absensi WHERE id_siswa='$siswa_id' AND status='S' AND minggu BETWEEN 1 AND 7");
    $data['sakit'] = (int)mysqli_fetch_assoc($query_sakit)['total'];
    $query_izin = mysqli_query($conn, "SELECT COUNT(*) AS total FROM absensi WHERE id_siswa='$siswa_id' AND status='I' AND minggu BETWEEN 1 AND 7");
    $data['izin'] = (int)mysqli_fetch_assoc($query_izin)['total'];
    $query_alpa = mysqli_query($conn, "SELECT COUNT(*) AS total FROM absensi WHERE id_siswa='$siswa_id' AND status='A' AND minggu BETWEEN 1 AND 7");
    $data['alpa'] = (int)mysqli_fetch_assoc($query_alpa)['total'];
}
header('Content-Type: application/json');
echo json_encode($data);

?>
