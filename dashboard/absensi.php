<?php
session_start();
include '../koneksi.php';

// Cek apakah yang login wali_kelas
if ($_SESSION["role"] != "wali_kelas") {
    header("Location: ../index.php");
    exit();
}

$username = $_SESSION['username'] ?? '';

// Daftar semua mata pelajaran
$all_mapel = [
    'Pendidikan Agama Islam (PAI)',
    'Pendidikan Kewarganegaraan',
    'Bahasa Indonesia',
    'Matematika',
    'IPAS',
    'Pendidikan Jasmani dan Kesehatan (PJOK)',
    'Seni Budaya dan Prakarya (SBDP)',
    'Bahasa Sunda',
    'Bahasa Inggris',
    'Pramuka'
];

// Kelas yang diajar per wali kelas
$kelas_per_wali = [
    'Imas Komariah' => ['kelas_2'],
    'Elis Suryani' => ['kelas_1'],
    'Eka Ellyawati' => ['kelas_6'],
    'Eka Merdekasari' => ['kelas_4'],
    'Ucu Siti Meilani' => ['kelas_3'],
    'Ayuni Maulidia' => ['kelas_5'],
];

$kelas_diampu = $kelas_per_wali[$username] ?? [];
$kelas_filter = "'" . implode("','", $kelas_diampu) . "'";

// Ambil mapel dari dropdown
$selected_mapel = $_GET['mapel'] ?? '';

// Ambil siswa dari kelas yang diajar wali kelas
$siswa_query = mysqli_query($conn, "SELECT * FROM users WHERE role='siswa' AND kelas IN ($kelas_filter)");

// Proses simpan absensi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["absensi"])) {
    $absensi_data = $_POST["absensi"];
    $mapel = $_POST["mapel"];

    foreach ($absensi_data as $siswa_id => $mingguan) {
        foreach ($mingguan as $minggu => $status) {
            $minggu_num = (int) str_replace('minggu_', '', $minggu);

            // Cek apakah sudah ada data sebelumnya
            $check = mysqli_query($conn, "SELECT * FROM absensi WHERE id_siswa='$siswa_id' AND minggu='$minggu_num' AND mapel='$mapel'");
            if (mysqli_num_rows($check) > 0) {
                mysqli_query($conn, "UPDATE absensi SET status='$status' WHERE id_siswa='$siswa_id' AND minggu='$minggu_num' AND mapel='$mapel'");
            } else {
                mysqli_query($conn, "INSERT INTO absensi (id_siswa, minggu, mapel, status) VALUES ('$siswa_id', '$minggu_num', '$mapel', '$status')");
            }
        }
    }

    echo "<script>alert('Absensi berhasil disimpan.'); window.location='absensi.php?mapel=$mapel';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Absensi Per Mapel</title>
    <style>
        body { font-family: 'Poppins', sans-serif; padding: 30px; background: #f0f4f8; }
        h2, h3 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #bbb; padding: 8px; text-align: center; }
        select, .mapel-select { padding: 5px; }
        .submit-btn { padding: 10px 30px; font-weight: bold; background-color: #3498db; color: white; border: none; border-radius: 8px; display: block; margin: 20px auto; }
        .submit-btn:hover { background-color: #2980b9; }
        .mapel-form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>

<h2>Input Absensi Siswa per Mata Pelajaran</h2>

<div class="mapel-form">
    <form method="get">
        <label for="mapel">Pilih Mata Pelajaran: </label>
        <select name="mapel" class="mapel-select" onchange="this.form.submit()">
            <option value="">-- Pilih Mapel --</option>
            <?php foreach ($all_mapel as $mapel): ?>
                <option value="<?= $mapel ?>" <?= ($selected_mapel == $mapel) ? 'selected' : '' ?>><?= $mapel ?></option>
            <?php endforeach; ?>
        </select>
    </form>
</div>

<?php if ($selected_mapel): ?>
    <form method="post">
        <input type="hidden" name="mapel" value="<?= $selected_mapel ?>">

        <?php while ($row = mysqli_fetch_assoc($siswa_query)) : ?>
            <h3><?= $row['username'] ?></h3>
            <table>
                <tr>
                    <?php for ($i = 1; $i <= 14; $i++) echo "<th>Minggu $i</th>"; ?>
                </tr>
                <tr>
                    <?php
                    for ($i = 1; $i <= 14; $i++) {
                        $res = mysqli_query($conn, "SELECT status FROM absensi WHERE id_siswa={$row['id']} AND minggu=$i AND mapel='$selected_mapel'");
                        $absen = mysqli_fetch_assoc($res);
                        $val = $absen['status'] ?? '';
                        echo "<td>
                                <select name='absensi[{$row['id']}][minggu_$i]' required>
                                    <option value=''>-</option>
                                    <option value='Hadir' ".($val=='H'?'selected':'').">Hadir</option>
                                    <option value='Sakit' ".($val=='S'?'selected':'').">Sakit</option>
                                    <option value='Izin' ".($val=='I'?'selected':'').">Izin</option>
                                    <option value='Alpa' ".($val=='A'?'selected':'').">Alpa</option>
                                </select>
                              </td>";
                    }
                    ?>
                </tr>
            </table>
        <?php endwhile; ?>

        <button type="submit" class="submit-btn">Simpan Absensi</button>
    </form>
<?php endif; ?>

<div style="text-align: center;">
    <a href="wali_kelas.php"><button class="submit-btn" style="background:#777;">Kembali ke Dashboard</button></a>
</div>

</body>
</html>
