<?php
session_start();
if ($_SESSION["role"] != "wali_kelas") {
    header("Location: ../index.php");
    exit();
}

include('../koneksi.php');

// Daftar mapel
$mapel_list = ['Pendidikan Agama Islam (PAI)', 'Pendidikan Kewarganegaraan', 
                'Bahasa Indonesia', 'Matematika', 
                'IPAS', 'Pendidikan Jasmani dan Kesehatan (PJOK)', 
                'Seni Budaya dan Prakarya (SBDP)', 'Bahasa Sunda',  
                'Bahasa Inggris', 'Pramuka'];
$selected_mapel = $_GET['mapel'] ?? '';

$siswa = mysqli_query($conn, "SELECT * FROM data_siswa");

// Simpan absensi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_siswa"]) && isset($_POST["mapel"])) {
    $id_siswa = $_POST["id_siswa"];
    $mapel = $_POST["mapel"];

    for ($i = 1; $i <= 14; $i++) {
        $minggu = "minggu_" . $i;
        $status = $_POST[$minggu] ?? '';

        $check = mysqli_query($conn, "SELECT * FROM absensi WHERE id_siswa='$id_siswa' AND minggu=$i AND mapel='$mapel'");
        if (mysqli_num_rows($check) > 0) {
            mysqli_query($conn, "UPDATE absensi SET status='$status' WHERE id_siswa='$id_siswa' AND minggu=$i AND mapel='$mapel'");
        } else {
            mysqli_query($conn, "INSERT INTO absensi (id_siswa, minggu, mapel, status) VALUES ('$id_siswa', '$i', '$mapel', '$status')");
        }
    }

    echo "<script>alert('Absensi berhasil disimpan untuk $mapel!'); window.location='absensi.php?mapel=$mapel';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Absensi Per Mapel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f7f7f7;
        }
        h2, h3 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #bbb;
            padding: 8px;
            text-align: center;
        }
        select, .mapel-select {
            padding: 5px;
        }
        .submit-btn {
            padding: 10px 20px;
            font-weight: bold;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .submit-btn:hover {
            background-color: #2980b9;
        }
        hr {
            border: 1px solid #ccc;
        }
        .mapel-form {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h2>Input Absensi Siswa per Mata Pelajaran</h2>

<div class="mapel-form">
    <form method="get">
        <label for="mapel">Pilih Mata Pelajaran: </label>
        <select name="mapel" class="mapel-select" onchange="this.form.submit()">
            <option value="">-- Pilih Mapel --</option>
            <?php foreach ($mapel_list as $mapel) : ?>
                <option value="<?php echo $mapel; ?>" <?php if ($selected_mapel == $mapel) echo 'selected'; ?>>
                    <?php echo $mapel; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
</div>

<?php if ($selected_mapel) : ?>
    <?php while ($row = mysqli_fetch_assoc($siswa)) : ?>
        <form method="post">
            <h3><?php echo $row['nama']; ?></h3>
            <input type="hidden" name="id_siswa" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="mapel" value="<?php echo $selected_mapel; ?>">
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
                            <select name='minggu_$i'>
                                <option value='S' " . ($val == 'S' ? 'selected' : '') . ">S</option>
                                <option value='I' " . ($val == 'I' ? 'selected' : '') . ">I</option>
                                <option value='A' " . ($val == 'A' ? 'selected' : '') . ">A</option>
                            </select>
                        </td>";
                    }
                    ?>
                </tr>
            </table>
            <button type="submit" class="submit-btn">Simpan Absensi</button>
        </form>
        <hr>
    <?php endwhile; ?>
<?php endif; ?>

</body>
</html>
