<?php
require_once '../vendor/autoload.php'; // jika pakai Composer

use Dompdf\Dompdf;

// Ambil HTML dari lihat_rapor_siswa.php
ob_start();
include 'lihat_rapor_siswa.php';
$html = ob_get_clean();

// Inisialisasi Dompdf
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Atur ukuran dan orientasi halaman
$dompdf->setPaper('A4', 'portrait');

// Render HTML ke PDF
$dompdf->render();

// Download file PDF
$dompdf->stream("rapor_siswa.pdf", ["Attachment" => false]); // false = tampil di browser
exit;
?>
