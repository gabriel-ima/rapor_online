<?php
session_start();
include "../koneksi.php";

// Akses hanya untuk guru
if ($_SESSION['role'] != 'guru') {
    header("Location: index.php");
    exit();
}

// $siswa_query = mysqli_query($conn, "SELECT * FROM users WHERE role='siswa'");
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
$kelas_filter = "'" . implode("','", $kelas_diampu) . "'";

// Query siswa sesuai kelas
$siswa_query = mysqli_query($conn, "SELECT * FROM users WHERE role='siswa' AND kelas IN ($kelas_filter)");

// Kode untuk mengunci tahun sebelum tahun 2025
// $tahun_ajaran = $_POST['tahun_ajaran'] ?? $_GET['tahun_ajaran'] ?? null;
// $semester = $_POST['semester'] ?? $_GET['semester'] ?? null;
// if ($tahun_ajaran < 2025) {
//     die("Rapor tahun ini sudah dikunci dan tidak bisa diubah.");
// }



?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Input Nilai Siswa</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f6f8;
      margin: 0;
      padding: 20px;
    }
    .container {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .header h2 {
      margin: 0;
    }
    .filters {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 15px;
    }
    .filters select, .filters input[type="text"] {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      min-width: 150px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th {
      background: #1976d2;
      color: #fff;
      padding: 10px;
    }
    td {
      padding: 8px;
      border-bottom: 1px solid #eee;
      text-align: center;
    }
    tr:hover {
      background: #f1f1f1;
    }
    input[type="number"] {
      width: 60px;
      padding: 4px;
      border-radius: 4px;
      border: 1px solid #ccc;
      text-align: center;
    }
    textarea {
      width: 120px;
      height: 30px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    .btn-primary {
      background: #1976d2;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }
    .btn-primary:hover {
      background: #125a9c;
    }
    .footer-button {
  text-align: center;
  margin-top: 20px;
}
.footer-button button {
  background: #1976d2;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}
.footer-button button:hover {
  background: #125a9c;
}
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h2>Input Nilai Siswa</h2>
    </div>

    <form method="POST" action="simpan_nilai_nilai.php" id="form-nilai">
      <div class="filters">
        <select name="mapel" required>
          <option value="">--Pilih Mapel--</option>
          <?php foreach ($mapel_list as $kode => $nama): ?>
            <option value="<?= $kode ?>"><?= $nama ?></option>
          <?php endforeach; ?>
        </select>

        <select name="semester" required>
          <option value="">--Semester--</option>
          <option value="Ganjil">Ganjil</option>
          <option value="Genap">Genap</option>
        </select>

        <select name="tahun_ajaran" required>
          <option value="">--Tahun Ajaran--</option>
          <?php
          // Mapping kelas ke tahun awal
          $kelas_tahun_awal = [
            'kelas_1' => 2025,
            'kelas_2' => 2024,
            'kelas_3' => 2023,
            'kelas_4' => 2022,
            'kelas_5' => 2021,
            'kelas_6' => 2020
          ];
          
          $tahun_awal = 2020;
          $tahun_akhir = 2030;

          // Jika guru hanya mengajar 1 kelas
          if (count($kelas_diampu) === 1) {
            $kelas = strtolower($kelas_diampu[0]);
            if (isset($kelas_tahun_awal[$kelas])) {
              $tahun_awal = $kelas_tahun_awal[$kelas];
              $tahun_akhir = $tahun_awal + 5;
            }
          }
          
          // Jika mengajar lebih dari satu kelas, tampilkan semua tahun
          for ($th = $tahun_awal; $th <= $tahun_akhir; $th++) {
            echo "<option value='$th'>$th</option>";
          }
          ?>
          </select>
      </div>

      <table>
        <tr>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Latihan</th>
          <th>Ulangan</th>
          <th>PR</th>
          <th>UTS</th>
          <th>UAS</th>
          <th>Rata-rata</th>
          <th>Predikat</th>
          <th>Deskripsi</th>
        </tr>
        <?php while ($siswa = mysqli_fetch_assoc($siswa_query)): ?>
          <tr>
            <td><?= htmlspecialchars($siswa['username']) ?></td>
            <td><?= htmlspecialchars($siswa['kelas']) ?></td>
            <td><input type="number" name="latihan[<?= $siswa['id'] ?>]" id="lat_<?= $siswa['id'] ?>" oninput="hitung(<?= $siswa['id'] ?>)" required></td>
            <td><input type="number" name="ulangan[<?= $siswa['id'] ?>]" id="ul_<?= $siswa['id'] ?>" oninput="hitung(<?= $siswa['id'] ?>)" required></td>
            <td><input type="number" name="pr[<?= $siswa['id'] ?>]" id="pr_<?= $siswa['id'] ?>" oninput="hitung(<?= $siswa['id'] ?>)" required></td>
            <td><input type="number" name="uts[<?= $siswa['id'] ?>]" id="uts_<?= $siswa['id'] ?>" oninput="hitung(<?= $siswa['id'] ?>)" required></td>
            <td><input type="number" name="uas[<?= $siswa['id'] ?>]" id="uas_<?= $siswa['id'] ?>" oninput="hitung(<?= $siswa['id'] ?>)" required></td>
            <td>
              <span id="rata2_<?= $siswa['id'] ?>">-</span>
              <input type="hidden" name="rata2[<?= $siswa['id'] ?>]" id="rata2val_<?= $siswa['id'] ?>">
            </td>
            <td>
              <span id="predikat_<?= $siswa['id'] ?>">-</span>
              <input type="hidden" name="predikat[<?= $siswa['id'] ?>]" id="predikatval_<?= $siswa['id'] ?>">
            </td>
            <td><textarea name="deskripsi[<?= $siswa['id'] ?>]" required></textarea></td>
          </tr>
        <?php endwhile; ?>
      </table>

      <!-- button bisa isi semua tahun ajaran -->
      <!-- <button type="submit" class="btn-primary">Simpan Semua Nilai</button> -->

      <!-- button isi tahun ajaran 2025-2030 -->
       <button type="submit" class="btn-primary" id="submit-btn">Simpan Semua Nilai</button>
       <div id="peringatan" style="color: red; margin-top: 10px; font-weight: bold;"></div>

    </form>
    <div class="footer-button">
  <button onclick="window.location.href='guru.php'">Kembali ke Dashboard</button>
</div>
  </div>

  <script>
    function hitung(id) {
      let lat = parseFloat(document.getElementById('lat_' + id).value) || 0;
      let ul = parseFloat(document.getElementById('ul_' + id).value) || 0;
      let pr = parseFloat(document.getElementById('pr_' + id).value) || 0;
      let uts = parseFloat(document.getElementById('uts_' + id).value) || 0;
      let uas = parseFloat(document.getElementById('uas_' + id).value) || 0;

      let rata = (lat + ul + pr + uts + uas) / 5;
      let predikat = "-";
      if (rata >= 93) predikat = "A";
      else if (rata >= 84) predikat = "B";
      else if (rata >= 75) predikat = "C";
      else predikat = "D";

      document.getElementById('rata2_' + id).innerText = rata.toFixed(2);
      document.getElementById('predikat_' + id).innerText = predikat;
      document.getElementById('rata2val_' + id).value = rata.toFixed(2);
      document.getElementById('predikatval_' + id).value = predikat;
    }
    // Js untuk tahun ajaran
    document.getElementById("form-nilai").addEventListener("submit", function(e) {
    const tahunSelect = document.querySelector("select[name='tahun_ajaran']");
    const tahunDipilih = parseInt(tahunSelect.value);
    const peringatan = document.getElementById("peringatan");

    if (tahunDipilih < 2025) {
      e.preventDefault(); // cegah kirim form
      peringatan.innerText = "⚠️ Data rapor sudah tidak bisa diupdate karena tahun ajaran sudah berganti.";
    } else {
      peringatan.innerText = ""; // bersihkan jika valid
    }
  });
  </script>
</body>
</html>
