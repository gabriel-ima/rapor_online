<?php
session_start();
include '../koneksi.php';

if ($_SESSION["role"] != "kepala_sekolah") {
    header("Location: ../index.php");
    exit();
}

$siswa_query = mysqli_query($conn, "SELECT * FROM data_siswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Rapor</title>
    <style>
        body { font-family: 'Poppins', sans-serif; padding: 20px; background: #f9f9f9; }
        .container { background: white; padding: 20px; border-radius: 10px; max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        select, button { padding: 10px; width: 100%; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Verifikasi Rapor Siswa</h2>
        <form method="GET" action="kepsek_preview_rapor.php">
            <label for="siswa_id">Pilih Siswa:</label>
            <select name="siswa_id" required>
                <option value="">-- Pilih Nama Siswa --</option>
                <?php while($row = mysqli_fetch_assoc($siswa_query)): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nama'] ?> (<?= $row['nis'] ?>)</option>
                <?php endwhile; ?>
            </select>
            <button type="submit">Lihat Rapor</button>
        </form>
    </div>
</body>
</html>
