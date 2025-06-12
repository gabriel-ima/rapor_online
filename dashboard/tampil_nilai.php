<?php
session_start();
include "../config.php"; // pastikan file ini menyambung ke database

// Cek role guru (opsional)
if ($_SESSION["role"] != "guru") {
    header("Location: ../index.php");
    exit();
}

// Query JOIN
$query = "SELECT 
            nilai.*,
            siswa.nama AS nama_siswa,
            users.username AS nama_guru
          FROM nilai
          JOIN siswa ON nilai.siswa_id = siswa.id
          JOIN users ON nilai.guru_id = users.id
          ORDER BY nilai.id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Nilai Siswa</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #f8b500;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        h2 {
            color: #333;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            padding: 10px 20px;
            background: #f8b500;
            color: white;
            border-radius: 8px;
        }
        a:hover {
            background: #f39c12;
        }
    </style>
</head>
<body>
    <h2>Data Nilai Siswa</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Nama Guru</th>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
                <th>Deskripsi</th>
                <th>Semester</th>
                <th>Tahun Ajaran</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama_siswa']}</td>
                        <td>{$row['nama_guru']}</td>
                        <td>{$row['mapel']}</td>
                        <td>{$row['nilai_intra']}</td>
                        <td>{$row['predikat']}</td>
                        <td>{$row['semester']}</td>
                        <td>{$row['tahun_ajaran']}</td>
                    </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
    <a href="guru.php">Kembali ke Dashboard</a>
</body>
</html>
