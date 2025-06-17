<?php
session_start();
include "../koneksi.php";

// Akses hanya untuk guru
if ($_SESSION['role'] != 'wali_kelas') {
    header("Location: index.php");
    exit();
}

$siswa_query = mysqli_query($conn, "SELECT * FROM users WHERE role='siswa'");

// Upload foto jika ada
$foto = null;
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $uploadDir = "uploads/"; // Buat folder ini jika belum ada
    $fotoName = uniqid() . "_" . basename($_FILES['foto']['name']);
    $targetPath = $uploadDir . $fotoName;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetPath)) {
        $foto = $fotoName;
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rapor Lengkap Siswa</title>
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

        table.ekstra-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    table.ekstra-table th, table.ekstra-table td {
        border: 1px solid #ccc;
        padding: 10px;
        vertical-align: top;
    }
    table.ekstra-table th {
        background-color: #f2f2f2;
        text-align: center;
    }
    table.ekstra-table input[type="text"],
    table.ekstra-table textarea {
        width: 100%;
        box-sizing: border-box;
        padding: 6px;
        font-size: 14px;
    }
    .table-fisik {
        width: 100%;
        max-width: 600px;
        border-collapse: collapse;
        margin-top: 10px;
        margin-bottom: 30px;
        font-family: Arial, sans-serif;
    }

    .table-fisik th,
    .table-fisik td {
        border: 1px solid #ccc;
        padding: 12px;
        text-align: center;
        vertical-align: middle;
    }

    .table-fisik th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .table-fisik input[type="number"] {
        width: 100%;
        max-width: 120px;
        padding: 6px;
        font-size: 14px;
        text-align: center;
        box-sizing: border-box;
        border: 1px solid #aaa;
        border-radius: 4px;
    }

    .section-label {
        font-weight: bold;
        font-size: 18px;
        margin-top: 30px;
        margin-bottom: 10px;
        display: block;
    }
    </style>
</head>
<body>
<div class="container">
    <h2>Rapor Lengkap Siswa SDN Ibu Dewi 4 Cianjur</h2>
    <br>
    <form method="POST" action="simpan_nilai.php">
        <label for="siswa">Pilih Siswa:</label>
        <select name="siswa_id" required>
            <?php while ($row = mysqli_fetch_assoc($siswa_query)) {
                echo "<option value='{$row['id']}'>{$row['username']}</option>";
            } ?>
        </select>

        <label>NISN/NIS:</label>
        <input type="text" name="nis" required>

        <label>Tempat, Tanggal Lahir:</label>
        <input type="text" name="tempat_lahir" required>

        <label>Jenis Kelamin:</label>
        <select name="gender" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="laki_laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>

        <label>Agama:</label>
        <select name="agama" required>
            <option value="">-- Pilih Agama --</option>
            <option value="islam">Islam</option>
            <option value="katolik">Kristen Katolik</option>
            <option value="kristen">Kristen Protestan</option>
            <option value="budha">Budha</option>
            <option value="hindu">Hindu</option>
            <option value="kong_hu_cu">Kong Hu Cu</option>
        </select>

        <label>Pendidikan sebelumnya:</label>
        <input type="text" name="pendidikan_sebelumnya" required>

        <label>Alamat Peserta Didik:</label>
        <input type="text" name="alamat_siswa" required>
        
        <label>Nama Orang tua:</label>
        <br>
        <br>
        <label>Ayah:</label>
        <input type="text" name="ayah" required>
        <label>Ibu:</label>
        <input type="text" name="ibu" required>

        <label>Jalan:</label>
        <input type="text" name="jalan" required>

        <label>Kelurahan/Desa:</label>
        <input type="text" name="kel_desa" required>

        <label>Kecamatan:</label>
        <input type="text" name="kecamatan" required>

        <label>Kabupaten/Kota:</label>
        <input type="text" name="kabupaten_kota" required>

        <label>Provinsi:</label>
        <input type="text" name="provinsi" required>

        <label>Wali Peserta Didik:</label>
        <br>
        <br>
        <label>Nama:</label>
        <input type="text" name="nama_wali" required>

        <label>Pekerjaan:</label>
        <input type="text" name="pekerjaan_wali" required>

        <label>Alamat:</label>
        <input type="text" name="alamat_wali" required>

        <label>A. Kompetensi Sikap</label>
        <br>
        <br>
        <label>Sikap Spiritual:</label>
        <textarea name="sikap_spiritual" rows="2" required></textarea>

        <label>Sikap Sosial:</label>
        <textarea name="sikap_sosial" rows="2" required></textarea>

        <label>B. Kompetensi Pengetahuan dan Keterampilan</label>
        <br>
        <br>
        <label>Muatan Pembelajaran</label>
        <select name="mapel" required>
            <option value="">-- Pilih Muatan Pembelajaran --</option>
            <option value="pendidikan_agama">Pendidikan Agama dan Budi Pekerti</option>
            <option value="pendidikan_kewarganegaraan">Pendidikan Pancasila dan Kewarganegaraan</option>
            <option value="bahasa_indonesia">Bahasa Indonesia</option>
            <option value="matematika">Matematika</option>
            <option value="ilmu_pengetahuan_alam">Ilmu Pengetahuan Alam</option>
            <option value="ilmu_pengetahuan_sosial">Ilmu Pengetahuan Sosial</option>
            <option value="seni_budaya_prakarya">Seni Budaya dan Prakarya</option>
            <option value="pendidikan_jasmani_olahraga_kesehatan">Pendidikan Jasmani, Olahraga dan Kesehatan</option>
            <label>Muatan Lokal</label>
            <option value="bahasa_sunda">Bahasa Sunda</option>
            <option value="bahasa_inggris">Bahasa Inggris</option>
        </select>

        <label>Nilai:</label>
        <input type="number" name="nilai_mapel" required>

        <label>Predikat:</label>
        <input type="text" name="predikat_mapel" required>

        <label>Deskripsi:</label>
        <textarea name="deskripsi_mapel" placeholder="Deskripsi" rows="3" required></textarea>

        <label>Keterampilan</label>
        <br>
        <br>
        <label>Nilai:</label>
        <input type="number" name="nilai_keterampilan" required>

        <label>Predikat:</label>
        <input type="text" name="predikat_keterampilan" required>

        <label>Deskripsi:</label>
        <textarea name="deskripsi_keterampilan" placeholder="Deskripsi" rows="3" required></textarea>

        <!-- <label>C. Extrakurikuler</label>
        <br>
        <br>
        <label>Kegiatan Ekstrakurikuler:</label>
        <input type="text" name="ekstrakurikuler" required>

        <label>Keterangan:</label>
        <textarea name="keterangan_ekstrakurikuler" rows="3" required></textarea> -->

        <label>C. Ekstrakurikuler</label>
        <br><br>

        <table class="ekstra-table">
            <tr>
                <th>Kegiatan Ekstrakurikuler</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <td><input type="text" name="ekstrakurikuler[]" id="ekstrakurikuler1" required></td>
                <td><textarea name="keterangan_ekstrakurikuler[]" id="keterangan1" rows="2" required></textarea></td>
            </tr>
            <tr>
                <td><input type="text" name="ekstrakurikuler[]" id="ekstrakurikuler2"></td>
                <td><textarea name="keterangan_ekstrakurikuler[]" id="keterangan2" rows="2"></textarea></td>
            </tr>
            <tr>
                <td><input type="text" name="ekstrakurikuler[]" id="ekstrakurikuler3"></td>
                <td><textarea name="keterangan_ekstrakurikuler[]" id="keterangan3" rows="2"></textarea></td>
            </tr>
            <tr>
                <td><input type="text" name="ekstrakurikuler[]" id="ekstrakurikuler4"></td>
                <td><textarea name="keterangan_ekstrakurikuler[]" id="keterangan4" rows="2"></textarea></td>
            </tr>
        </table>

        <br>

        <label>D. Saran-saran</label>
        <br>
        <br>
        <textarea name="saran_saran" rows="3" required></textarea>

        <label>E. Tinggi dan Berat Badan</label>
        <br>
        <br> 
        <table class="table-fisik" align="center">
            <tr>
                <th rowspan="2">Aspek yang Dinilai</th>
                <th colspan="2">Semester</th>
            </tr>
            <tr>
                <th>1</th>
                <th>2</th>
            </tr>
            <tr>
                <td class="aspek">Tinggi Badan</td>
                <td><input type="number" name="tinggi_semester_1" required></td>
                <td><input type="number" name="tinggi_semester_2" required></td>
            </tr>
            <tr>
                <td class="aspek">Berat Badan</td>
                <td><input type="number" name="berat_semester_1" required></td>
                <td><input type="number" name="berat_semester_2" required></td>
            </tr>
        </table>

        <br> 

        <label>F. Kondisi Kesehatan</label>
        <br><br>

        <table class="ekstra-table">
            <tr>
                <th>Aspek Fisik</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <td>Pendengaran</td>
                <td><textarea name="kondisi_kesehatan_pendengaran" id="pendengaran" rows="2" required></textarea></td>
            </tr>
            <tr>
                <td>Penglihatan</td>
                <td><textarea name="kondisi_kesehatan_penglihatan" id="penglihatan" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>Gigi</td>
                <td><textarea name="kondisi_kesehatan_gigi" id="gigi" rows="2"></textarea></td>
            </tr>
            <tr>
                <td><input type="text" name="tambahan_aspek_fisik" id="tambahan_aspek"></td>
                <td><textarea name="keterangan_tambahan_aspek_fisik" id="keterangan_tambahan_aspek" rows="2"></textarea></td>
            </tr>
        </table>

        <br> 

        <label>G. Prestasi</label>
        <br><br>

        <table class="ekstra-table">
            <tr>
                <th>Jenis Prestasi</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <td>Kesenian</td>
                <td><textarea name="prestasi_kesenian" id="kesenian" rows="2" required></textarea></td>
            </tr>
            <tr>
                <td>Olahraga</td>
                <td><textarea name="prestasi_olahraga" id="olahraga" rows="2"></textarea></td>
            </tr>
            <tr>
                <td><input type="text" name="tambahan_prestasi" id="tambahan_prestasi"></td>
                <td><textarea name="keterangan_tambahan_prestasi" id="keterangan_tambahan_prestasi" rows="2"></textarea></td>
            </tr>
        </table>

        <br> 

        <label>H. Ketidakhadiran</label>
        <br>
        <br>
        <label>Sakit:</label>
        <input type="number" name="ketidakhadiran_sakit" required>

        <label>Izin:</label>
        <input type="number" name="ketidakhadiran_izin" required>

        <label>Tanpa Keterangan:</label>
        <input type="number" name="ketidakhadiran_tanpa_keterangan" required>

        <br>
        <br>

        <label>Tanda Tangan Wali Kelas:</label>
        <form action="simpan_cat_tambahan.php" method="post" enctype="multipart/form-data">
        <!-- input lainnya -->
        
        <input type="file" name="foto" accept="image/*" style="margin-top: 20px;">
    
        <br>
        <br>

        <button type="submit">Simpan Nilai</button>
    </form>

    <?php if ($data['foto_catatan_tambahan']): ?>
        <img src="uploads/<?php echo $data['foto_catatan_tambahan']; ?>" style="max-width: 300px; margin-top: 20px;">
    <?php endif; ?>

    <div style="text-align: center;">
    <a href="wali_kelas.php">
        <button class="back-btn">Kembali ke Dashboard</button>
    </a>
</div>
</div>
</body>
</html>
