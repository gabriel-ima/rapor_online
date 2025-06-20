<?php
session_start();
include '../koneksi.php';

// Pastikan hanya wali_kelas
if ($_SESSION['role'] != 'wali_kelas') {
    header('Location: ../index.php');
    exit;
}

// Pastikan siswa_id dan file dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $siswa_id = $_POST['siswa_id'] ?? '';
    if (empty($siswa_id)) {
        die('Error: siswa_id kosong. Pastikan Anda memilih siswa terlebih dahulu.');
    }

    // Proses file
    if (isset($_FILES['foto_ttd']) && $_FILES['foto_ttd']['error'] === 0) {
        $folder = '../uploads/'; // sesuaikan path foldernya
        if (!is_dir($folder)) {
            mkdir($folder, 0755, true); // buat folder kalau belum ada
        }

        $file_name = basename($_FILES['foto_ttd']['name']);
        $file_tmp = $_FILES['foto_ttd']['tmp_name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        // Nama file sesuai username wali kelas agar unik
        $username = $_SESSION['username'];
        $safe_filename = str_replace(' ', '_', strtolower($username)) . '_ttd.' . $ext;
        $destination = $folder . $safe_filename;

        // Pindahkan file ke folder uploads
        if (move_uploaded_file($file_tmp, $destination)) {
            // Simpan nama file di database
            $query = "UPDATE rapor SET foto_catatan_tambahan='$safe_filename' WHERE siswa_id='$siswa_id'";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Tanda tangan berhasil diupload!'); window.location='input_cat_tambahan.php';</script>";
            } else {
                echo "Error query: " . mysqli_error($conn);
            }
        } else {
            echo "Gagal memindahkan file ke folder tujuan.";
        }
    } else {
        echo "File belum dipilih atau terjadi error.";
    }
} else {
    echo "Metode request tidak sesuai.";
}
?>
