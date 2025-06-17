<?php
session_start();
include "../koneksi.php";

// Akses hanya untuk guru
if ($_SESSION['role'] != 'guru') {
    header("Location: index.php");
    exit();
}

$guru_username = $_SESSION['username'] ?? '';

$siswa_query = mysqli_query($conn, "SELECT * FROM users WHERE role='siswa'");
$guru_username = $_SESSION['username'] ?? '';

$mapel_per_guru = [
    'Imas Komariah, S.Pd' => [
        'Pendidikan_Kewarganegaraan' => 'Pendidikan Kewarganegaraan',
        'Bahasa_Indonesia' => 'Bahasa Indonesia',
        'Matematika' => 'Matematika',
        'Seni_Budaya_dan_Prakarya' => 'Seni Budaya dan Prakarya',
        'Bahasa_Sunda' => 'Bahasa Sunda'
    ],
    'Elis Suryani, S.Pd' => [
        'Pendidikan_Kewarganegaraan' => 'Pendidikan Kewarganegaraan',
        'Bahasa_Indonesia' => 'Bahasa Indonesia',
        'Matematika' => 'Matematika',
        'Seni_Budaya_dan_Prakarya' => 'Seni Budaya dan Prakarya',
        'Bahasa_Sunda' => 'Bahasa Sunda'
    ],
    'Eka Ellyawati, S.Pd.M.M' => [
        'Pendidikan_Kewarganegaraan' => 'Pendidikan Kewarganegaraan',
        'Bahasa_Indonesia' => 'Bahasa Indonesia',
        'Matematika' => 'Matematika',
        'Ilmu_Pengetahuan_Alam_Sosial' => 'IPAS',
        'Seni_Budaya_dan_Prakarya' => 'Seni Budaya dan Prakarya',
        'Bahasa_Sunda' => 'Bahasa Sunda'
    ],
    'Eka Merdekasari, S.Pd' => [
        'Pendidikan_Kewarganegaraan' => 'Pendidikan Kewarganegaraan',
        'Bahasa_Indonesia' => 'Bahasa Indonesia',
        'Matematika' => 'Matematika',
        'Ilmu_Pengetahuan_Alam_Sosial' => 'IPAS',
        'Seni_Budaya_dan_Prakarya' => 'Seni Budaya dan Prakarya',
        'Bahasa_Sunda' => 'Bahasa Sunda'
    ],
    'Ucu Siti Meilani, S.Pd' => [
        'Pendidikan_Kewarganegaraan' => 'Pendidikan Kewarganegaraan',
        'Bahasa_Indonesia' => 'Bahasa Indonesia',
        'Matematika' => 'Matematika',
        'Ilmu_Pengetahuan_Alam_Sosial' => 'IPAS',
        'Seni_Budaya_dan_Prakarya' => 'Seni Budaya dan Prakarya',
        'Bahasa_Sunda' => 'Bahasa Sunda'
    ],
    'Hasanudin, S.Pd.I' => [
        'Pendidikan_Agama_Islam' => 'Pendidikan Agama Islam'
    ],
    'Febi Febriani, S.Pd' => [
        'Pendidikan_Jasmani_Olahraga_Kesehatan' => 'Pendidikan Jasmani, Olahraga, dan Kesehatan'
    ],
    'Ayuni Maulidia, S.Pd' => [
        'Pendidikan_Kewarganegaraan' => 'Pendidikan Kewarganegaraan',
        'Bahasa_Indonesia' => 'Bahasa Indonesia',
        'Matematika' => 'Matematika',
        'Ilmu_Pengetahuan_Alam_Sosial' => 'IPAS',
        'Seni_Budaya_dan_Prakarya' => 'Seni Budaya dan Prakarya',
        'Bahasa_Sunda' => 'Bahasa Sunda'
    ],
    'Ratih, S.Pd' => [
        'Bahasa_Inggris' => 'Bahasa Inggris'
    ],
    'Koh Roo Ye Amelia' => [
        'Pramuka' => 'Pramuka'
    ],
];

// Default semua mapel jika guru tidak terdaftar
$mapel_list = $mapel_per_guru[$guru_username] ?? [
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


$guru_username = $_SESSION['username'];

// $mapel_imas = ['pkn', 'indo', 'mat', 'sbdp'];

// if ($guru_username == 'imaskomariah' && !in_array($_POST['mapel'], $mapel_imas)) {
//     die("Anda tidak memiliki izin untuk mengisi mata pelajaran ini.");
// }

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
    <form method="POST" action="simpan_nilai_nilai.php">
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
            <option value="kelas_1">Kelas 1</option>
            <option value="kelas_2">Kelas 2</option>
            <option value="kelas_3">Kelas 3</option>
            <option value="kelas_4">Kelas 4</option>
            <option value="kelas_5">Kelas 5</option>
            <option value="kelas_6">Kelas 6</option>
        </select>

        <label>Kurikulum:</label>
        <!-- <input type="text" name="mapel" required> -->
         <select name="kurikulum" id="kurikulum" required>
            <option value="">-- Pilih Kurikulum --</option>
            <option value="Kurikulum_Merdeka">Kurikulum Merdeka</option>
        </select>

        <label>Mata Pelajaran:</label>
        <!-- <input type="text" name="mapel" required> -->
         <select name="mapel" id="mapel" required>
            <option value="">-- Pilih Mata Pelajaran --</option>
            <?php foreach ($mapel_list as $kode => $nama_mapel) : ?>
                <option value="<?php echo $kode; ?>"><?php echo $nama_mapel; ?>
            </option>
            <?php endforeach; ?>
        </select>

        <label>Nilai Latihan:</label>
        <input type="number" name="nilai_latihan" id="nilai_latihan" required oninput="hitungRataRata()">

        <label>Nilai Ulangan Harian:</label>
        <input type="number" name="nilai_ulangan" id="nilai_ulangan" required oninput="hitungRataRata()">

        <label>Nilai PR:</label>
        <input type="number" name="nilai_pr" id="nilai_pr" required oninput="hitungRataRata()">

        <label>Nilai UTS:</label>
        <input type="number" name="nilai_uts" id="nilai_uts" required oninput="hitungRataRata()">

        <label>Nilai UAS:</label>
        <input type="number" name="nilai_uas" id="nilai_uas" required oninput="hitungRataRata()">

        <!-- Menampilkan hasil -->
        <p><strong>Nilai Rata-rata:</strong> <span id="hasil_rata2">-</span></p>
        <p><strong>Predikat:</strong> <span id="hasil_predikat">-</span></p>

        <!-- Hidden input untuk dikirim ke PHP -->
        <input type="hidden" name="nilai_rata2" id="nilai_rata2">
        <input type="hidden" name="predikat" id="predikat">


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

<div style="text-align: center;">
    <a href="wali_kelas.php">
        <button class="back-btn">Kembali ke Dashboard</button>
    </a>
</div>

<script>
function hitungRataRata() {
    const latihan = parseFloat(document.getElementById("nilai_latihan").value) || 0;
    const ulangan = parseFloat(document.getElementById("nilai_ulangan").value) || 0;
    const pr = parseFloat(document.getElementById("nilai_pr").value) || 0;
    const uts = parseFloat(document.getElementById("nilai_uts").value) || 0;
    const uas = parseFloat(document.getElementById("nilai_uas").value) || 0;

    const total = latihan + ulangan + pr + uts + uas;
    const rata2 = total / 5;
    
    let predikat = "-";
    if (rata2 >= 93 && $nilai_rata2 <= 100) {
        predikat = "A";
    } else if (rata2 >= 84) {
        predikat = "B";
    } else if (rata2 >= 75) {
        predikat = "C";
    } else {
        predikat = "D";
    }

    // Tampilkan hasil ke user
    document.getElementById("hasil_rata2").innerText = rata2.toFixed(2);
    document.getElementById("hasil_predikat").innerText = predikat;

    // Simpan ke input tersembunyi agar bisa dikirim ke PHP
    document.getElementById("nilai_rata2").value = rata2.toFixed(2);
    document.getElementById("predikat").value = predikat;
}
</script>


</body>
</html>
