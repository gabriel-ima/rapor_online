<?php
session_start();
include '../koneksi.php';

if ($_SESSION['role'] != 'kepala_sekolah') {
    header("Location: ../index.php");
    exit();
}

$siswa_id = $_GET['siswa_id'] ?? 0;
$siswa = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM data_siswa WHERE id='$siswa_id'"));
$nilai = mysqli_query($conn, "SELECT * FROM nilai WHERE siswa_id='$siswa_id'");
$rapor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM rapor WHERE siswa_id='$siswa_id'"));
?>

<!-- Tampilkan data rapor secara singkat -->
<h2>Preview Rapor - <?= $siswa['nama'] ?></h2>


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
            <?php while ($row = mysqli_fetch_assoc($nilai)) : ?>
                <tr>
                    <td><?= $row['mapel'] ?></td>
                    <td><?= $row['nilai_latihan'] ?? '-' ?></td>
                    <td><?= $row['nilai_ulangan'] ?? '-' ?></td>
                    <td><?= $row['nilai_pr'] ?? '-' ?></td>
                    <td><?= $row['nilai_uts'] ?? '-' ?></td>
                    <td><?= $row['nilai_uas'] ?? '-' ?></td>
                    <td><?= $row['nilai_rata2'] ?? '-' ?></td>
                    <td><?= $row['predikat'] ?? '-' ?></td>
                </tr>
                <?php endwhile; ?>
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

<!-- Halaman 5 -->
<div class="page">
    <h2>Rekap Kehadiran</h2>
    <div class="info">
        <p><label>Hadir:</label> <?= $rapor['ketidakhadiran_hadir'] ?? '-' ?> hari</p>
        <p><label>Sakit:</label> <?= $rapor['ketidakhadiran_sakit'] ?? '-' ?> hari</p>
        <p><label>Izin:</label> <?= $rapor['ketidakhadiran_izin'] ?? '-' ?> hari</p>
        <p><label>Tanpa Keterangan:</label> <?= $rapor['ketidakhadiran_tanpa_keterangan'] ?? '-' ?> hari</p>
    </div>
</div>

<!-- Verifikasi -->
<form method="POST" action="verifikasi_rapor.php" enctype="multipart/form-data">
    <input type="hidden" name="siswa_id" value="<?= $siswa_id ?>">
    <label>Upload Tanda Tangan Kepala Sekolah:</label>
    <input type="file" name="ttd_kepsek" accept="image/*" required>
    <button type="submit">Verifikasi dan Simpan</button>
</form>
