<?php
session_start();
include "../koneksi.php";

// Akses hanya untuk guru
if ($_SESSION['role'] != 'guru') {
    header("Location: index.php");
    exit();
}

$guru_username = $_SESSION['username'];
$siswa_query = mysqli_query($conn, "SELECT * FROM users WHERE role='siswa'");
$mapel_list = [];
if ($guru_username == 'Imas Komariah, S.Pd') {
    $mapel_list = [
        'pkn' => 'Pendidikan Kewarganegaraan',
        'indo' => 'Bahasa Indonesia',
        'mat' => 'Matematika',
        'sbdp' => 'Seni Budaya dan Prakarya'
    ];
} else {
    $mapel_list = [
        'pai' => 'Pendidikan Agama Islam',
        'pkn' => 'Pendidikan Kewarganegaraan',
        'indo' => 'Bahasa Indonesia',
        'mat' => 'Matematika',
        'sbdp' => 'Seni Budaya dan Prakarya',
        'pjok' => 'Pendidikan Jasmani, Olahraga, dan Kesehatan',
        'sunda' => 'Bahasa Sunda',
        'sunmul' => 'Bahasa Sunda (Mulog)',
        'inggris' => 'Bahasa Inggris',
        'ipas' => 'IPAS',
        'IPS' => 'IPS'
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Nilai</title>
    <style>
        body { font-family: Arial; background-color: #f0f4f8; }
        .container {
            max-width: 700px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px #aaa;
        }
        h2 { text-align: center; }
        label { font-weight: bold; }
        input, textarea, select {
            width: 100%; padding: 7px; margin-bottom: 15px;
        }
        button {
            padding: 10px; background: #0288d1; color: white;
            border: none; border-radius: 5px;
        }
        button:hover { background: #0277bd; }
    </style>
</head>
<body>
<div class="container">
    <h2>Input Nilai Siswa</h2>
    <form method="POST" action="simpan_nilai.php">
        <label for="siswa">Pilih Siswa:</label>
        <select name="siswa_id" required>
            <?php while ($row = mysqli_fetch_assoc($siswa_query)) {
                echo "<option value='{$row['id']}'>{$row['username']}</option>";
            } ?>
        </select>

        <label>Kelas:</label>
        <!-- <input type="text" name="mapel" required> -->
         <select name="kelas" id="kelas" required>
            <option value="">-- Pilih Kelas --</option>
            <option value="k1">Kelas 1</option>
            <option value="k2">Kelas 2</option>
            <option value="k3">Kelas 3</option>
            <option value="k4">Kelas 4</option>
            <option value="k5">Kelas 5</option>
            <option value="k6">Kelas 6</option>
        </select>

        <label>Kurikulum:</label>
        <!-- <input type="text" name="mapel" required> -->
         <select name="kurikulum" id="kurikulum" required>
            <option value="">-- Pilih Kurikulum --</option>
            <option value="K13">K13</option>
            <option value="KurikulumMerdeka">Kurikulum Merdeka</option>
        </select>

        <label>Mata Pelajaran:</label>
        <!-- <input type="text" name="mapel" required> -->
         <select name="mapel" id="mapel" required>
            <option value="">-- Pilih Mata Pelajaran --</option>
            <option value="pai">Pendidikan Agama Islam</option>
            <option value="pkn">Pendidikan Kewarganegaraan</option>
            <option value="indo">Bahasa Indonesia</option>
            <option value="mat">Matematika</option>
            <option value="sbdp">Seni Budaya dan Prakarya</option>
            <option value="pjok">Pendidikan Jasmani, Olahraga, dan Kesehatan</option>
            <option value="sunda">Bahasa Sunda</option>
            <option value="sunmul">Bahasa Sunda (Mulog)</option>
            <option value="inggris">Bahasa Inggris</option>
            <option value="ipas">IPAS</option>
            <option value="IPS">IPS</option>
        </select>

        <label>Nilai Intrakurikuler:</label>
        <input type="number" name="nilai_intra" required>

        <!-- <label>Nilai Ekstrakurikuler:</label>
        <input type="number" name="nilai_ekstra" required> -->

        <label>Deskripsi Capaian:</label>
        <textarea name="deskripsi" rows="3" required></textarea>

        <!-- <label>Sikap Spiritual:</label>
        <textarea name="sikap_spiritual" rows="2" required></textarea> -->

        <!-- <label>Sikap Sosial:</label>
        <textarea name="sikap_sosial" rows="2" required></textarea> -->

        <label>Semester:</label>
        <select name="semester" required>
            <option value="Ganjil">Ganjil</option>
            <option value="Genap">Genap</option>
        </select>

        <label>Tahun Ajaran:</label>
        <input type="text" name="tahun_ajaran" placeholder="2024/2025" required>

        <button type="submit">Simpan Nilai</button>
    </form>
</div>
</body>
</html>
