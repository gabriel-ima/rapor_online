<?php
session_start();
include "../koneksi.php";

if ($_SESSION['role'] != 'guru') {
    header("Location: ../index.php");
    exit();
}

$guru_username = $_SESSION['username'] ?? '';

$kelas_per_guru = [
    'Imas Komariah, S.Pd' => ['kelas_2'],
    'Elis Suryani, S.Pd' => ['kelas_1'],
    'Eka Ellyawati, S.Pd.M.M' => ['kelas_6'],
    'Eka Merdekasari, S.Pd' => ['kelas_4'],
    'Ucu Siti Meilani, S.Pd' => ['kelas_3'],
    'Hasanudin, S.Pd.I' => ['kelas_1', 'kelas_2', 'kelas_3', 'kelas_4', 'kelas_5', 'kelas_6'],
    'Febi Febriani, S.Pd' => ['kelas_1', 'kelas_2', 'kelas_3', 'kelas_4', 'kelas_5', 'kelas_6'],
    'Ayuni Maulidia, S.Pd' => ['kelas_5'],
    'Ratih, S.Pd' => ['kelas_1', 'kelas_2', 'kelas_3', 'kelas_4', 'kelas_5', 'kelas_6'],
    'Koh Roo Ye Amelia' => ['kelas_1', 'kelas_2', 'kelas_3']
];

$kelas_diampu = $kelas_per_guru[$guru_username] ?? [];

if (empty($kelas_diampu)) {
    echo "<p>Data tidak ditemukan karena guru tidak terdaftar dalam mapping kelas.</p>";
    exit;
}

$kelas_filter = "'" . implode("','", $kelas_diampu) . "'";

$result = mysqli_query($conn, "
    SELECT n.*, u.username AS nama_siswa
    FROM nilai n
    JOIN users u ON n.siswa_id = u.id
    WHERE n.kelas IN ($kelas_filter)
");


?>


<!DOCTYPE html>
<html>
<head>
    <title>Data Nilai Siswa</title>
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
    <table border="1" cellpadding="8">
        <tr>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Mapel</th>
            <th>Nilai Latihan</th>
            <th>Nilai Ulangan Harian</th>
            <th>Nilai PR (Pekerjaan Rumah)</th>
            <th>Nilai UTS (UJian Tengah Semester)</th> 
            <th>Nilai UAS (Ujian Akhir Semester)</th>
            <th>Nilai Rata-rata</th>
            <th>Predikat</th>
            <th>Deskripsi</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['nama_siswa'] ?></td>
                <td><?= $row['kelas'] ?></td>
                <td><?= $row['mapel'] ?></td>
                <td><?= $row['nilai_latihan'] ?></td>
                <td><?= $row['nilai_ulangan'] ?></td>
                <td><?= $row['nilai_pr'] ?></td>
                <td><?= $row['nilai_uts'] ?></td>
                <td><?= $row['nilai_uas'] ?></td>
                <td><?= $row['nilai_rata2'] ?></td>
                <td><?= $row['predikat'] ?></td>
                <td><?= $row['deskripsi'] ?></td>
                <td><?= $row['semester'] ?></td>
                <td><?= $row['tahun_ajaran'] ?></td>
            </tr>
        <?php } ?>
    </table>
     <a href="guru.php">Kembali ke Dashboard</a>
</body>
</html>
