<?php
session_start();
include '../koneksi.php';

if ($_SESSION["role"] != "kepala_sekolah") {
    header("Location: ../index.php");
    exit();
}

// $siswa_query = mysqli_query($conn, "SELECT * FROM data_siswa");
$siswa_query = mysqli_query($conn, "SELECT id, nama, nis, kelas FROM data_siswa");
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
        <?php
        mysqli_data_seek($siswa_query, 0); // reset ulang pointer query
        while ($row = mysqli_fetch_assoc($siswa_query)) :
        ?>
            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?> (<?= $row['nis'] ?>)</option>
        <?php endwhile; ?>
    </select>

    <label for="semester">Semester:</label>
    <select name="semester" required>
        <option value="">-- Pilih Semester --</option>
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>
    </select>

    <label for="tahun_ajaran">Tahun Ajaran:</label>
    <select name="tahun_ajaran" id="tahun_ajaran" required>
        <option value="">-- Pilih Tahun Ajaran --</option>
    </select>

    <button type="submit">Lihat Rapor</button>
</form>

        <!-- JS akan isi berdasarkan kelas -->
        <script>
    const siswaData = {
        <?php
        mysqli_data_seek($siswa_query, 0); // reset ulang hasil query
        while($s = mysqli_fetch_assoc($siswa_query)) {
            echo $s['id'] . ": '" . $s['kelas'] . "',";
        }
        ?>
    };

    const tahunAjaranOptions = {
        kelas_1: ["2030", "2029", "2028", "2027", "2026", "2025"],
        kelas_2: ["2029", "2028", "2027", "2026", "2025", "2024"],
        kelas_3: ["2028", "2027", "2026", "2025", "2024", "2023"],
        kelas_4: ["2027", "2026", "2025", "2024", "2023", "2022"],
        kelas_5: ["2026", "2025", "2024", "2023", "2022", "2021"],
        kelas_6: ["2025", "2024", "2023", "2022", "2021", "2020"]
    };

    document.querySelector("select[name='siswa_id']").addEventListener("change", function() {
        const siswaId = this.value;
        const kelas = siswaData[siswaId];
        const tahunDropdown = document.getElementById("tahun_ajaran");

        tahunDropdown.innerHTML = '<option value="">-- Pilih Tahun Ajaran --</option>';

        if (kelas && tahunAjaranOptions[kelas]) {
            tahunAjaranOptions[kelas].forEach(tahun => {
                tahunDropdown.innerHTML += `<option value="${tahun}">${tahun}</option>`;
            });
        }
    });
</script>

    </div>
</body>
</html>
