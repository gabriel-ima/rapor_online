<?php
session_start();
include '../koneksi.php';
if (!$conn) die("Koneksi gagal.");

// Akses hanya untuk siswa
if ($_SESSION['role'] != 'siswa') {
    header("Location: ../index.php");
    exit();
}
$siswa_id = $_SESSION['siswa_id'] ?? 0;

$tahun_dipilih = $_GET['tahun_ajaran'] ?? '';

// Ambil data siswa dari tabel users pada database
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$siswa_id'");
$user = mysqli_fetch_assoc($user_query);
$kelas_lama = $user['kelas'] ?? '';

// Ambil angka dari kelas (misal: "Kelas_3" → 3)
preg_match('/\d+/', $kelas_lama, $matches);
$angka_kelas_lama = isset($matches[0]) ? (int)$matches[0] : null;

// Siapkan variabel yang akan dipakai untuk tampilan
$kelas_berikutnya = $angka_kelas_lama + 1;
$kelas_baru = "Kelas_" . $kelas_berikutnya;
$tahun_ajaran = date('Y') . '/' . (date('Y') + 1);

    // Cek apakah sudah pernah naik sebelumnya
   // Cek apakah sudah ada di riwayat kelas
$cek_query = mysqli_query($conn, "SELECT * FROM riwayat_kelas WHERE siswa_id='$siswa_id' AND kelas_sekarang='$kelas_baru'");
if ($angka_kelas_lama && $angka_kelas_lama < 6 && mysqli_num_rows($cek_query) === 0) {
    // Update users & simpan riwayat
    mysqli_query($conn, "UPDATE users SET kelas = '$kelas_baru' WHERE id = '$siswa_id'");
    mysqli_query($conn, "INSERT INTO riwayat_kelas (siswa_id, kelas_sebelumnya, kelas_sekarang, tahun_ajaran, tanggal_naik)
        VALUES ('$siswa_id', '$kelas_lama', '$kelas_baru', '$tahun_ajaran', NOW())");
}


// Mengecek apakah siswa belum pernah naik kelas tertentu ($kelas_baru) sebelumnya. Jika belum ada di tabel riwayat_kelas, maka lanjut proses update dan insert data kelas baru
$cek_query = mysqli_query($conn, "SELECT * FROM riwayat_kelas WHERE siswa_id='$siswa_id' AND kelas_sekarang='$kelas_baru'");
if (mysqli_num_rows($cek_query) === 0) {
    // Update dan insert...
}


// Mengambil data siswa lengkap dari tabel data_siswa, berdasarkan nama siswa yang sedang login
$username = $_SESSION['username'];
$siswa_query = mysqli_query($conn, "SELECT * FROM data_siswa WHERE nama = '$username'");

$siswa = mysqli_fetch_assoc($siswa_query);

// Mengambil nilai pelajaran siswa
$siswa_id = $_SESSION['siswa_id'];
// $nilai_query = mysqli_query($conn, "SELECT * FROM nilai WHERE siswa_id = '$siswa_id' AND semester = 'Genap'");
$nilai_query = mysqli_query($conn, "SELECT * FROM nilai 
    WHERE siswa_id = '$siswa_id' 
    AND semester = 'Genap' 
    AND tahun_ajaran = '$tahun_dipilih'");;
$nilai_data = [];
while ($row = mysqli_fetch_assoc($nilai_query)) {
    $nilai_data[] = $row;
}

// Ambil data rapor lain (kompetensi, absensi, dll)
// $rapor_query = mysqli_query($conn, "SELECT * FROM rapor WHERE siswa_id = '$siswa_id' AND semester = 'Genap'");
$rapor_query = mysqli_query($conn, "SELECT * FROM rapor 
    WHERE siswa_id = '$siswa_id' 
    AND semester = 'Genap' 
    AND tahun_ajaran = '$tahun_dipilih'");
$rapor = mysqli_fetch_assoc($rapor_query);

// menghitung total ketidakhadiran yaitu sakit, izin, dan alpa
$query_sakit = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM absensi 
     WHERE id_siswa='$siswa_id' AND status='S'"
);
$sakit = (int)mysqli_fetch_assoc($query_sakit)['total'];

$query_izin = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM absensi 
     WHERE id_siswa='$siswa_id' AND status='I'"
);
$izin = (int)mysqli_fetch_assoc($query_izin)['total'];

$query_alpa = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM absensi 
     WHERE id_siswa='$siswa_id' AND status='A'"
);
$alpa = (int)mysqli_fetch_assoc($query_alpa)['total'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rapor Siswa</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f0f0;
            padding: 20px;
        }
        .page {
            background: white;
            padding: 40px;
            margin: 20px auto;
            max-width: 800px;
            border: 2px solid #000;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info label {
            display: inline-block;
            width: 200px;
            font-weight: bold;
        }
        hr {
            margin: 30px 0;
        }
    </style>
</head>
<body>

<form method="GET">
    <label for="tahun_ajaran">Pilih Tahun Ajaran:</label>
    <select name="tahun_ajaran" onchange="this.form.submit()" required>
        <option value="">-- Pilih Tahun Ajaran --</option>
        <?php
        for ($tahun = 2020; $tahun <= 2030; $tahun++) {
            $selected = ($tahun_dipilih == $tahun) ? 'selected' : '';
            echo "<option value='$tahun' $selected>$tahun</option>";
        }
        ?>
    </select>
</form>

<!-- Halaman Cover -->
<div class="page">
    <h2>RAPOR PESERTA DIDIK SEKOLAH DASAR</h2>
    <h2>SDN IBU DEWI 4 CIANJUR</h2>
    <div class="info" style="text-align: center;">
    <br>
    <h2> <?= $siswa['nama'] ?></h2>
    <h2> <?= $siswa['nis'] ?></h2>
    <br>
    <h2>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br>REPUBLIK INDONESIA</h2>
</div>
</div>

<!-- Halaman 1 -->
<div class="page">
    <h2>RAPOR PESERTA DIDIK SEKOLAH DASAR</h2>
    <div class="info">
        <br>
        <p><label>Nama Sekolah:</label> SDN Ibu Dewi 4 Cianjur</p>
        <p><label>NPSN:</label> 20254483</p>
        <p><label>NIS:</label> <?= $siswa['nis'] ?></p>
        <p><label>Alamat Sekolah:</label> Jl. Siliwangi No. 25, Cianjur, Jawa Barat</p>
        <p><label>Kelurahan/Desa:</label> Sawah Gede </p>
        <p><label>Kecamatan:</label> Cianjur </p>
        <p><label>Kabupaten/Kota:</label> Cianjur </p>
        <p><label>Provinsi:</label> Jawa Barat </p>
        <p><label>Website:</label> - </p>
        <p><label>E-mail:</label> sdnegeri@email.com </p>
    </div>
</div>

<!-- Halaman 2 -->
<div class="page">
    <h2>IDENTITAS PESERTA DIDIK</h2>
    <div class="info">
        <br>
        <p><label>Nama Siswa:</label> <?= $siswa['nama'] ?></p>
        <p><label>NIS:</label> <?= $siswa['nis'] ?></p>
        <p><label>Tempat, Tanggal Lahir:</label> <?= $siswa['tempat_lahir'] ?></p>
        <p><label>Jenis Kelamin:</label> <?= $siswa['gender'] ?></p>
        <p><label>Agama:</label> <?= $siswa['agama'] ?> </p> 
        <p><label>Pendidikan Sebelumnya:</label> <?= $siswa['pendidikan_sebelumnya'] ?> </p> 
        <p><label>Alamat Peserta Didik:</label> <?= $siswa['alamat_siswa'] ?></p>
        <p><label>Nama Orang Tua</label></p>
        <p><label>Ayah:</label> <?= $siswa['ayah'] ?></p>
        <p><label>Ibu:</label> <?= $siswa['ibu'] ?></p>
        <p><label>Alamat Orang Tua</label> </p>
        <p><label>Jalan:</label> <?= $siswa['jalan'] ?></p>
        <p><label>Kelurahan/Desa:</label> <?= $siswa['kel_desa'] ?></p>
        <p><label>Kecamatan:</label> <?= $siswa['kecamatan'] ?></p>
        <p><label>Kabupaten/Kota:</label> <?= $siswa['kabupaten_kota'] ?></p>
        <p><label>Provinsi:</label> <?= $siswa['provinsi'] ?></p>
        <p><label>Wali Peserta Didik</label> </p>
        <p><label>Nama:</label> <?= $siswa['nama_wali'] ?></p>
        <p><label>Pekerjaan:</label> <?= $siswa['pekerjaan_wali'] ?></p>
        <p><label>Alamat:</label> <?= $siswa['alamat_wali'] ?></p>
    </div>
</div>

<!-- Halaman 3 -->
<div class="page">
    <h2>RAPOR PESERTA DIDIK DAN PROFIL PESERTA DIDIK</h2>
        <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr>
                <br>
                <th>Sikap Spiritual</th>
                <th>Sikap Sosial</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $rapor['sikap_spiritual'] ?? '-' ?></td>
                <td><?= $rapor['sikap_sosial'] ?? '-' ?></td>
            </tr>
        </tbody>
    </table>
    </div>
</div>

<!-- Halaman 4 -->
<div class="page">
    <h2>KOMPETENSI PENGETAHUAN</h2>
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr>
                <br>
                <th>Mata Pelajaran</th>
                <th>Nilai 1</th>
                <th>Nilai 2</th>
                <th>Nilai 3</th>
                <th>Nilai 4</th>
                <th>Nilai 5</th>
                <th>Rata-rata</th>
                <th>Predikat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nilai_data as $nilai) : ?>
            <tr>
                <td><?= $nilai['mapel'] ?></td>
                <td><?= $nilai['nilai_latihan'] ?? '-' ?></td>
                <td><?= $nilai['nilai_ulangan'] ?? '-' ?></td>
                <td><?= $nilai['nilai_pr'] ?? '-' ?></td>
                <td><?= $nilai['nilai_uts'] ?? '-' ?></td>
                <td><?= $nilai['nilai_uas'] ?? '-' ?></td>
                <td><?= $nilai['nilai_rata2'] ?? '-' ?></td>
                <td><?= $nilai['predikat'] ?? '-' ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Halaman 5 -->
<div class="page">
    <h2>KOMPETENSI KETERAMPILAN</h2>
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr>
                <br>
                <th>Nilai</th>
                <th>Predikat</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $rapor['nilai_keterampilan'] ?? '-' ?></td>
                <td><?= $rapor['predikat_keterampilan'] ?? '-' ?></td>
                <td><?= $rapor['deskripsi_keterampilan'] ?? '-' ?></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Halaman 6 -->
<div class="page">
    <h2>EKSTRAKURIKULER</h2>
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr>
                <br>
                <th>Kegiatan Ekstrakurikuler</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $rapor['ekstrakurikuler'] ?? '-' ?></td>
                <td><?= $rapor['keterangan_ekstrakurikuler'] ?? '-' ?></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Halaman 7 -->
<div class="page">
    <h2>SARAN-SARAN</h2>
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr>
                <br>
                <th>Deskripsi Saran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $rapor['saran_saran'] ?? '-' ?></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Halaman 8 -->
<div class="page">
    <h2 style="text-align: center;">TINGGI DAN BERAT BADAN</h2>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead style="background-color: #f0f0f0;">
            <tr>
                <th rowspan="2">Aspek yang Dinilai</th>
                <th colspan="2">Semester</th>
            </tr>
            <tr>
                <th>1</th>
                <th>2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tinggi Badan (cm)</td>
                <td><?= $rapor['tinggi_semester_1'] ?? '-' ?></td>
                <td><?= $rapor['tinggi_semester_2'] ?? '-' ?></td>
            </tr>
            <tr>
                <td>Berat Badan (kg)</td>
                <td><?= $rapor['berat_semester_1'] ?? '-' ?></td>
                <td><?= $rapor['berat_semester_2'] ?? '-' ?></td>
            </tr>
        </tbody>
    </table>
</div>


<!-- Halaman 8 -->
<div class="page">
    <h2 style="text-align: center;">KONDISI KESEHATAN</h2>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead style="background-color: #f0f0f0;">
            <tr>
                <th style="width: 30%;">Aspek Fisik</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Pendengaran</td>
                <td><?= $rapor['kondisi_kesehatan_pendengaran'] ?? '-' ?></td>
            </tr>
            <tr>
                <td>Penglihatan</td>
                <td><?= $rapor['kondisi_kesehatan_penglihatan'] ?? '-' ?></td>
            </tr>
            <tr>
                <td>Gigi</td>
                <td><?= $rapor['kondisi_kesehatan_gigi'] ?? '-' ?></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="tambahan_aspek_fisik" id="tambahan_aspek" placeholder="Tambahan Aspek Fisik" style="width: 100%;">
                </td>
                <td>
                    <textarea name="keterangan_tambahan_aspek_fisik" id="keterangan_tambahan_aspek" rows="2" placeholder="Keterangan Tambahan" style="width: 100%;"></textarea>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<!-- Halaman 9 -->
    <div class="page">
    <h2 style="text-align: center;">PRESTASI</h2>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead style="background-color: #f0f0f0;">
            <tr>
                <th style="width: 30%;">Jenis Prestasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kesenian</td>
                <td>
                    <?= $rapor['prestasi_kesenian'] ?? '-' ?>
                </td>
            </tr>
            <tr>
                <td>Olahraga</td>
                <td>
                    <?= $rapor['prestasi_olahraga'] ?? '-' ?>
                </td>
            </tr> 
            <tr>
                <td>
                    <input type="text" name="tambahan_prestasi" id="tambahan_prestasi" placeholder="Prestasi Tambahan" style="width: 100%;">
                </td>
                <td>
                    <textarea name="keterangan_tambahan_prestasi" id="keterangan_tambahan_prestasi" rows="2" placeholder="Keterangan Tambahan" style="width: 100%;"></textarea>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</div>

<!-- Halaman 10 -->
<div class="page">
    <h2>Rekap Kehadiran</h2>
    <div class="info">
        <p><label>Sakit:</label> <?= $sakit ?> hari</p>
        <p><label>Izin:</label> <?= $izin ?> hari</p>
        <p><label>Tanpa Keterangan:</label> <?= $alpa ?> hari</p>
    </div>
</div>


<!-- Halaman 11 -->
 <!-- Menampilkan tanda tangan wali kelas dari file gambar yang sebelumnya diungga dan disimpan dalam database yang bernama filef foto_catatan_tambahan -->
<div class="page">
    <h2>Tanda Tangan Wali Kelas</h2>
    <?php if (!empty($rapor['foto_catatan_tambahan'])): ?>
        <img src="../uploads/<?= htmlspecialchars($rapor['foto_catatan_tambahan']) ?>" alt="Tanda Tangan" style="width:200px;">
    <?php else: ?>
        <p><i>Belum ada tanda tangan.</i></p>
    <?php endif; ?>
    <pre>Foto pada Database: <?= $rapor['foto_catatan_tambahan'] ?></pre>
</div>

<!-- Halaman 12 -->
 <!-- Kode ini digunakan untuk menampilkan tanda tangan kepala sekolah dalam bentuk gambar jika tersedia, dan teks penanda jika belum ada -->
<div class="page">
    <h2>Tanda Tangan kepala Sekolah</h2>
    <?php if (!empty($rapor['foto_kepsek'])): ?>
        <img src="../uploads/<?= htmlspecialchars($rapor['foto_kepsek']) ?>" alt="Tanda Tangan" style="width:200px;">
    <?php else: ?>
        <p><i>Belum ada tanda tangan.</i></p>
    <?php endif; ?>
    <pre>Foto pada Database: <?= $rapor['foto_kepsek'] ?></pre>

<?php
// Ambil nama dari data_siswa untuk pemberitahuan rapor semester genap
$nama_siswa = $siswa['nama'] ?? '';

    // Cek tanda tangan wali & kepsek
    $ttd_wali = $rapor['foto_catatan_tambahan'] ?? '';
    $ttd_kepsek = $rapor['foto_kepsek'] ?? '';

    if (!empty($ttd_wali) && !empty($ttd_kepsek)) {
        if (!is_null($angka_kelas_lama)) {
            if ($angka_kelas_lama < 6) {
                echo "<div style='background-color: #e0ffe0; padding: 20px; margin-top: 30px; text-align: center; border: 2px solid green; font-size: 18px; font-weight: bold;'>
                    ✅ Selamat! Kamu dinyatakan naik ke kelas $kelas_berikutnya.
                </div>";
            } else {
                echo "<div style='background-color: #fff3cd; padding: 20px; margin-top: 30px; text-align: center; border: 2px solid orange; font-size: 18px; font-weight: bold;'>
                    🎓 Selamat! Kamu telah menyelesaikan pendidikan di kelas 6 dan dinyatakan lulus.
                </div>";
            }
        } else {
            echo "<div style='color: red; font-weight: bold;'>⚠️ Data kelas siswa belum tersedia. Silakan lengkapi data siswa di tabel users.</div>";
        }
    }

?>
</div>



<!-- Menampilkan tombol "Cetak Rapor (PDF)" jika tanda tangan kepala sekolah sudah ada. Jika belum ada, maka akan muncul pesan peringatan berwarna merah -->
<?php if (!empty($rapor['foto_kepsek']) && file_exists(__DIR__ . "/../uploads/" . $rapor['foto_kepsek'])): ?>
    <a href="cetak_rapor.php?siswa_id=<?= $siswa['id'] ?>" target="_blank">
        <button>Cetak Rapor (PDF)</button>
    </a>
<?php else: ?>
    <div style="color: red; font-weight: bold; margin-top: 10px;">
        Rapor belum bisa diunduh karena Kepala Sekolah belum verifikasi rapor.
    </div>
<?php endif; ?>

<br>

<div style="text-align: center;">
    <a href="siswa.php">
        <button class="back-btn">Kembali ke Dashboard</button>
    </a>
</div>

</body>
</html>
