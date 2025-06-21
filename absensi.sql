<?php
session_start();
include '../koneksi.php';

// Cek apakah yang login wali_kelas
if ($_SESSION["role"] != "wali_kelas") {
    header("Location: ../index.php");
    exit();
}

$username = $_SESSION['username'] ?? '';

// Daftar kelas per wali kelas
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

// Ambil siswa dari kelas wali kelas
$siswa_query = mysqli_query(
    $conn,
    "SELECT id, username FROM users WHERE role='siswa' AND kelas IN ($kelas_filter)"
);

// Simpan absensi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["absensi"])) {
    $absensi_data = $_POST["absensi"];
    foreach ($absensi_data as $siswa_id => $mingguan) {
        foreach ($mingguan as $minggu => $status) {
            $minggu_num = (int) str_replace('minggu_', '', $minggu);

            $check = mysqli_query(
                $conn,
                "SELECT * FROM absensi WHERE id_siswa='$siswa_id' AND minggu='$minggu_num'"
            );

            if (mysqli_num_rows($check) > 0) {
                mysqli_query(
                    $conn,
                    "UPDATE absensi SET status='$status' WHERE id_siswa='$siswa_id' AND minggu='$minggu_num'"
                );
            } else {
                mysqli_query(
                    $conn,
                    "INSERT INTO absensi (id_siswa, minggu, status) VALUES ('$siswa_id', '$minggu_num', '$status')"
                );
            }
        }
    }

    echo "<script>alert('Absensi berhasil disimpan!'); window.location='absensi.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Input Absensi Siswa</title>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f0f4f8; }
    h2, h3 { text-align: center; color: #333; }
    table { width: 100%; border-collapse: collapse; margin: 20px 0; background: #fff; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
    select { padding: 5px; width: 100%; }
    .submit-btn {
        padding: 10px 20px; background-color: #3498db; color: white;
        border: none; border-radius: 8px; cursor: pointer; margin-top: 20px;
    }
    .submit-btn:hover { background-color: #2980b9; }
</style>
</head>
<body>

<h2>Input Absensi Siswa</h2>

<form method="post">
    <?php while ($row = mysqli_fetch_assoc($siswa_query)) : ?>
        <h3><?= htmlspecialchars($row['username']) ?></h3>
        <table>
            <tr>
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <th>Minggu <?= $i ?></th>
                <?php endfor; ?>
            </tr>
            <tr>
                <?php
                for ($i = 1; $i <= 7; $i++) {
                    $res = mysqli_query(
                        $conn,
                        "SELECT status FROM absensi WHERE id_siswa={$row['id']} AND minggu=$i"
                    );
                    $absen = mysqli_fetch_assoc($res);
                    $val = $absen['status'] ?? '';
                    ?>
                    <td>
                        <select name="absensi[<?= $row['id'] ?>][minggu_<?= $i ?>]" required>
                            <option value="">-</option>
                            <option value="H" <?= ($val=='H'?'selected':'') ?>>Hadir</option>
                            <option value="S" <?= ($val=='S'?'selected':'') ?>>Sakit</option>
                            <option value="I" <?= ($val=='I'?'selected':'') ?>>Izin</option>
                            <option value="A" <?= ($val=='A'?'selected':'') ?>>Alpa</option>
                        </select>
                    </td>
                <?php } ?>
            </tr>
        </table>
    <?php endwhile; ?>
    <button type="submit" class="submit-btn">Simpan Semua Absensi</button>
</form>

<div style="text-align:center; margin-top:20px;">
    <a href="wali_kelas.php"><button class="submit-btn" style="background:#777;">Kembali ke Dashboard</button></a>
</div>

</body>
</html>
