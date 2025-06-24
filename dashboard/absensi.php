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

$minggu = isset($_GET['minggu']) ? (int)$_GET['minggu'] : null;

// Ambil siswa dari kelas wali kelas
$siswa_query = mysqli_query(
    $conn,
    "SELECT id, username FROM users WHERE role='siswa' AND kelas IN ($kelas_filter)"
);

// Simpan absensi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["absensi"])) {
    $absensi_data = $_POST["absensi"];
    $minggu_num = $_POST["minggu"];

    foreach ($absensi_data as $siswa_id => $hari_data) {
        foreach ($hari_data as $hari => $status) {
            if (empty($hari) || empty($status)) {
                continue; // ⬅️ SKIP kalau kosong
            }

            $hari_safe = mysqli_real_escape_string($conn, $hari);
            $status_safe = mysqli_real_escape_string($conn, $status);

            $check = mysqli_query(
                $conn,
                "SELECT 1 FROM absensi WHERE id_siswa='$siswa_id' AND minggu='$minggu_num' AND hari='$hari_safe'"
            );

            if (mysqli_num_rows($check) > 0) {
                mysqli_query(
                    $conn,
                    "UPDATE absensi SET status='$status_safe' WHERE id_siswa='$siswa_id' AND minggu='$minggu_num' AND hari='$hari_safe'"
                );
            } else {
                mysqli_query(
                    $conn,
                    "INSERT INTO absensi (id_siswa, minggu, hari, status) VALUES ('$siswa_id', '$minggu_num', '$hari_safe', '$status_safe')"
                );
            }
        }
    }

    echo "<script>alert('Absensi berhasil disimpan!'); window.location='absensi.php';</script>";
    exit();
}


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit;

?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Input Absensi Siswa</title>
<style>
    td label {
    display: inline-block;
    margin-right: 10px;
    margin-bottom: 20px;
}
.minggu-wrapper {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 20px;
}
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

<?php if (!$minggu): ?>
    <h3>Pilih Minggu</h3>
    <div class="minggu-wrapper">
    <?php for ($i = 1; $i <= 7; $i++): ?>
        <form method="get" style="display:inline;">
            <input type="hidden" name="minggu" value="<?= $i ?>">
            <button type="submit" class="submit-btn">Minggu <?= $i ?></button>
        </form>
        <?php endfor; ?>
    </div>
    <div style="text-align:center; margin-top:20px;">
        <a href="wali_kelas.php">
            <button class="submit-btn" style="background:#777;">Kembali ke Dashboard</button>
        </a>
    </div>
<?php else: ?>
    <h3>Absensi Minggu <?= $minggu ?></h3>

    <form method="post">
        <input type="hidden" name="minggu" value="<?= $minggu ?>">
        <table>
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($siswa_query)) : ?>
<tr>
  <td><?= htmlspecialchars($row['username']) ?></td>
  <?php
  $hari_list = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
  foreach ($hari_list as $hari) {
      $res = mysqli_query(
          $conn,
          "SELECT status FROM absensi WHERE id_siswa={$row['id']} AND minggu=$minggu AND hari='$hari'"
      );
      $absen = mysqli_fetch_assoc($res);
      $val = $absen['status'] ?? '';
  ?>
  <td>
    <input type="hidden" name="absensi[<?= $row['id'] ?>][<?= $hari ?>]" value="">
    <label><input type="radio" name="absensi[<?= $row['id'] ?>][<?= $hari ?>]" value="H" <?= ($val == 'H') ? 'checked' : '' ?>> H</label>
    <label><input type="radio" name="absensi[<?= $row['id'] ?>][<?= $hari ?>]" value="S" <?= ($val == 'S') ? 'checked' : '' ?>> S</label>
    <label><input type="radio" name="absensi[<?= $row['id'] ?>][<?= $hari ?>]" value="I" <?= ($val == 'I') ? 'checked' : '' ?>> I</label>
    <label><input type="radio" name="absensi[<?= $row['id'] ?>][<?= $hari ?>]" value="A" <?= ($val == 'A') ? 'checked' : '' ?>> A</label>
  </td>
  <?php } ?>
</tr>
<?php endwhile; ?>

            </tbody>
        </table>
        <button type="submit" class="submit-btn">Simpan Absensi Minggu <?= $minggu ?></button>
    </form>

    <div style="text-align:center; margin-top:20px;">
        <a href="absensi.php"><button class="submit-btn" style="background:#777;">Kembali Pilih Minggu</button></a>
    </div>
    <div style="text-align: center; margin-top: 20px;">
    <a href="wali_kelas.php">
        <button type="button" class="submit-btn" style="background: #777;">Kembali ke Dashboard</button>
    </a>
</div>
<?php endif; ?>

</body>
</html>
