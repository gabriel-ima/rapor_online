<?php
session_start();
include '../koneksi.php'; // Pastikan file koneksi benar

// Cek login dan role
if (!isset($_SESSION["siswa_id"]) || $_SESSION["role"] != "siswa") {
    header("Location: ../index.php");
    exit();
}

$siswa_id = $_SESSION["siswa_id"];

// Redirect jika tombol kembali ditekan
if (isset($_POST['kembali'])) {
    header("Location: wali_kelas.php");
    exit();
}

// Ambil filter dari form (default: Ganjil, 2025)
$semester = $_GET['semester'] ?? 'Ganjil';
$tahun_ajaran = $_GET['tahun_ajaran'] ?? '2025';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Nilai</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f9fc;
            padding: 30px;
        }
        .container {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        form select, form button {
            padding: 8px;
            margin-right: 10px;
            font-size: 14px;
        }
        table {
            width: 100%;
            background-color: #f0f4f8;
            text-align: center;
            margin-top: 10px;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 10px;
        }
        .nilai-box {
            border: 1px solid #ddd;
            padding: 15px;
            margin-top: 15px;
            border-radius: 10px;
        }
        .nilai-box h3 {
            margin-bottom: 10px;
        }
        .predikat-badge {
            background-color: #6c5ce7;
            color: #fff;
            padding: 4px 10px;
            border-radius: 8px;
            float: right;
            font-size: 13px;
        }
        .btn-kembali {
            background-color: #ccc;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .btn-kembali:hover {
            background-color: #aaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" style="margin-bottom: 10px;">
            <button type="submit" name="kembali" class="btn-kembali">← Kembali ke Dashboard</button>
        </form>

        <h2>Dashboard Nilai Anda</h2>

        <!-- Filter Form -->
        <form method="GET">
            <select name="semester">
                <option value="Ganjil" <?= $semester == 'Ganjil' ? 'selected' : '' ?>>Semester Ganjil</option>
                <option value="Genap" <?= $semester == 'Genap' ? 'selected' : '' ?>>Semester Genap</option>
            </select>

            <select name="tahun_ajaran">
                <?php
                for ($i = 2020; $i <= 2030; $i++) {
                    $selected = $tahun_ajaran == $i ? 'selected' : '';
                    echo "<option value='$i' $selected>Tahun Ajaran $i</option>";
                }
                ?>
            </select>

            <button type="submit">Tampilkan</button>
        </form>

        <br>

        <?php
        // Ambil data nilai berdasarkan semester & tahun ajaran
        $query = mysqli_query($conn, "SELECT * FROM nilai 
            WHERE siswa_id = '$siswa_id' 
            AND semester = '$semester' 
            AND tahun_ajaran = '$tahun_ajaran'");

        if (mysqli_num_rows($query) > 0) {
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
                <div class='nilai-box'>
                    <h3>$mapel <span class='predikat-badge'>$predikat</span></h3>
                    <table>
                        <tr>
                            <th>Latihan</th>
                            <th>UH</th>
                            <th>PR</th>
                            <th>UTS</th>
                            <th>UAS</th>
                        </tr>
                        <tr>
                            <td>$nilai_latihan</td>
                            <td>$nilai_ulangan</td>
                            <td>$nilai_pr</td>
                            <td>$nilai_uts</td>
                            <td>$nilai_uas</td>
                        </tr>
                    </table>
                    <p><b>Rata-rata:</b> $nilai_rata2 | <b>Predikat:</b> $predikat</p>
                </div>";
            }
        } else {
            echo "<p>Tidak ada data nilai untuk Semester <b>$semester</b> Tahun Ajaran <b>$tahun_ajaran</b>.</p>";
        }
        ?>
    </div>
</body>
</html>
