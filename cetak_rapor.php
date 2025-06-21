<?php
session_start();
include '../koneksi.php';
require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// $options = new Options();
// $options->set('isRemoteEnabled', true);
// $dompdf = new Dompdf($options);

$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('isHtml5ParserEnabled', true);
// $dompdf = new Dompdf\Dompdf($options);



// Cek akses
if ($_SESSION['role'] != 'siswa') {
    header("Location: ../index.php");
    exit();
}

// Ambil data
$username = $_SESSION['username'];
$siswa_query = mysqli_query($conn, "SELECT * FROM data_siswa WHERE nama = '$username'");
$siswa = mysqli_fetch_assoc($siswa_query);
$siswa_id = $_SESSION['siswa_id'];

// Nilai
$nilai_query = mysqli_query($conn, "SELECT * FROM nilai WHERE siswa_id = '$siswa_id'");
$nilai_data = [];
while ($row = mysqli_fetch_assoc($nilai_query)) {
    $nilai_data[] = $row;
}

// Rapor
$rapor_query = mysqli_query($conn, "SELECT * FROM rapor WHERE siswa_id = '$siswa_id'");
$rapor = mysqli_fetch_assoc($rapor_query);

// Load Dompdf
require_once '../dompdf/autoload.inc.php';

$dompdf = new Dompdf();

// Absensi
$sakit = (int)mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM absensi WHERE id_siswa='$siswa_id' AND status='S'"))['total'];
$izin = (int)mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM absensi WHERE id_siswa='$siswa_id' AND status='I'"))['total'];
$alpa = (int)mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM absensi WHERE id_siswa='$siswa_id' AND status='A'"))['total'];

// Tanda tangan 
// $html = '
// <div style="text-align: center; margin-bottom: 50px;">
//     <h2>Tanda Tangan Wali Kelas</h2>
//     <img src="http://127.0.0.1/rapor_online/uploads/' . htmlspecialchars($rapor['foto_catatan_tambahan']) . '" style="width:200px;">
// </div>

// <div style="text-align: center;">
//     <h2>Tanda Tangan Kepala Sekolah</h2>
//     <img src="http://127.0.0.1/rapor_online/uploads/" . htmlspecialchars($rapor['foto_kepsek']) . '" style="width:200px;">
// </div>
// ';



// Siapkan HTML
ob_start();
include 'lihat_rapor_siswa_template.php'; // Pisahkan template HTML ke file ini
$html = ob_get_clean();

// Generate PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Rapor_{$siswa['nama']}.pdf", ["Attachment" => false]);
exit();
