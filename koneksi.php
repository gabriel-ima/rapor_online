<?php
$host = "localhost";      // Nama host, biasanya 'localhost'
$user = "root";           // Username MySQL default di XAMPP adalah 'root'
$password = "";           // Password MySQL default biasanya kosong di XAMPP
$database = "rapor_online";   // Ganti dengan nama database kita

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
