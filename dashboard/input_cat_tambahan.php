<?php
session_start();
include "../koneksi.php";

// Akses hanya untuk guru bidang per-mata pelajaran
if ($_SESSION['role'] != 'wali_kelas') {
    header("Location: index.php");
    exit();
}

// $siswa_query = mysqli_query($conn, "SELECT * FROM users WHERE role='siswa'");
$siswa_query = mysqli_query($conn, "SELECT id, nama FROM data_siswa ORDER BY nama");


?>
<!DOCTYPE html>
<html lang="id">
<head>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function() {
    $('#siswa_id').change(function() {
        var siswa_id = $(this).val();
        if (siswa_id !== '') {
            $.ajax({
                url: 'get_data_siswa.php',
                type: 'GET',
                data: { id: siswa_id },
                dataType: 'json',
                success: function(data) {
                    $('#nis').val(data.nis);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#tempat_lahir').val(data.tempat_lahir);
                    $('#tanggal_lahir').val(data.tanggal_lahir);
                    $('#gender').val(data.gender);
                    $('#agama').val(data.agama);
                    $('#pendidikan_sebelumnya').val(data.pendidikan_sebelumnya);
                    $('#alamat_siswa').val(data.alamat_siswa);
                    $('#ayah').val(data.ayah);
                    $('#ibu').val(data.ibu);
                    $('#jalan').val(data.jalan);
                    $('#kel_desa').val(data.kel_desa);
                    $('#kecamatan').val(data.kecamatan);
                    $('#kabupaten_kota').val(data.kabupaten_kota);
                    $('#provinsi').val(data.provinsi);
                    $('#nama_wali').val(data.nama_wali);
                    $('#pekerjaan_wali').val(data.pekerjaan_wali);
                    $('#alamat_wali').val(data.alamat_wali);
                }
            });
        }
    });
});
</script>


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
    <form method="POST" action="simpan_nilai.php" enctype="multipart/form-data">
        
        <label for="siswa">Pilih Siswa:</label>
        <select name="siswa_id" id="siswa_id" required>
            <option value="">-- Pilih Siswa --</option>
            <?php while ($row = mysqli_fetch_assoc($siswa_query)) {
                echo "<option value='{$row['id']}'>{$row['nama']}</option>";
                } ?>
                </select>

        <label>NIS:</label>
        <input type="text" name="nis" id="nis" readonly>

       <label>Tempat Lahir:</label>
       <input type="text" name="tempat_lahir" id="tempat_lahir" readonly>

        <label>Jenis Kelamin:</label>
        <input type="text" name="gender" id="gender" readonly>

        <label>Agama:</label>
        <input type="text" name="agama" id="agama" readonly>

        <label>Pendidikan sebelumnya:</label>
        <input type="text" name="pendidikan_sebelumnya" id="pendidikan_sebelumnya" readonly>

        <label>Alamat Peserta Didik:</label>
        <input type="text" name="alamat_siswa" id="alamat_siswa" readonly>
        
        <label>Nama Orang tua:</label>
        <br>
        <br>
        <label>Ayah:</label>
        <input type="text" name="ayah" id="ayah" readonly>
        <label>Ibu:</label>
        <input type="text" name="ibu" id="ibu" readonly>

        <label>Jalan:</label>
        <input type="text" name="jalan" id="jalan" readonly>

        <label>Kelurahan/Desa:</label>
        <input type="text" name="kel_desa" id="kel_desa" readonly>

        <label>Kecamatan:</label>
        <input type="text" name="kecamatan"id="kecamatan" readonly>

        <label>Kabupaten/Kota:</label>
        <input type="text" name="kabupaten_kota" id="kabupaten_kota" readonly>

        <label>Provinsi:</label>
        <input type="text" name="provinsi" id="provinsi" readonly>

        <label>Wali Peserta Didik:</label>
        <br>
        <br>
        <label>Nama:</label>
        <input type="text" name="nama_wali" id="nama_wali" readonly>

        <label>Pekerjaan:</label>
        <input type="text" name="pekerjaan_wali" id="pekerjaan_wali" readonly>

        <label>Alamat:</label>
        <input type="text" name="alamat_wali" id="alamat_wali" readonly>

        <label>A. Kompetensi Sikap</label>
        <br>
        <br>
        <label>Sikap Spiritual:</label>
        <textarea name="sikap_spiritual" rows="2" required></textarea>

        <label>Sikap Sosial:</label>
        <textarea name="sikap_sosial" rows="2" required></textarea> 
        

        <label>B. Kompetensi Keterampilan</label>
        <br>
        <br>
        <label>Nilai:</label>
        <input type="number" name="nilai_keterampilan" id="nilai_keterampilan" required oninput="hitungPredikatKeterampilan()">

        <label>Predikat:</label>
        <input type="text" name="predikat_keterampilan" id="predikat_keterampilan" readonly required>

        <label>Deskripsi:</label>
        <textarea name="deskripsi_keterampilan" placeholder="Deskripsi" rows="3" required></textarea>


        <label>C. Ekstrakurikuler</label>
        <br><br>

        <table class="ekstra-table">
            <tr>
                <th>Kegiatan Ekstrakurikuler</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <td><input type="text" name="ekstrakurikuler" id="ekstrakurikuler"></td>
                <td><textarea name="keterangan_ekstrakurikuler" id="keterangan_ekstrakurikuler"></textarea></td>
            </tr>
            <tr>
                <td><input type="text" name="ekstrakurikuler_2" id="ekstrakurikuler_2"></td>
                <td><textarea name="keterangan_ekstrakurikuler2" id="keterangan_ekstrakurikuler2"></textarea></td>
            </tr>
            <tr>
                <td><input type="text" name="ekstrakurikuler_3" id="ekstrakurikuler_3"></td>
                <td><textarea name="keterangan_ekstrakurikuler3" id="keterangan_ekstrakurikuler3"></textarea></td>
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

        <label for="semester">H. Semester</label>
        <br><br>
        <select name="semester" id="semester" required>
            <option value="">-- Pilih Semester --</option>
            <option value="Ganjil">Ganjil</option>
            <option value="Genap">Genap</option>
        </select>

        <br><br>

        <label for="tahun_ajaran">I. Tahun Ajaran</label>
        <br><br>
        <select name="tahun_ajaran" id="tahun_ajaran" required>
            <option value="">--Tahun Ajaran--</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
        </select>

        <br><br>

        <label>I. Ketidakhadiran</label><br><br>

        <label>Sakit:</label>
        <input type="number" name="ketidakhadiran_sakit" id="ketidakhadiran_sakit" value="<?= $sakit ?>" readonly>

        <label>Izin:</label>
        <input type="number" name="ketidakhadiran_izin" id="ketidakhadiran_izin" value="<?= $izin ?>" readonly>

        <label>Tanpa Keterangan:</label>
        <input type="number" name="ketidakhadiran_tanpa_keterangan" id="ketidakhadiran_tanpa_keterangan" value="<?= $alpa ?>" readonly>


        <br>
        <br>

        <!-- Input Tanda Tangan Wali Kelas -->
        <label>Tanda Tangan Wali Kelas:</label>
        <input type="file" name="foto_catatan_tambahan" accept="image/">
        
        <br>
        <br>

        <button type="submit">Simpan Nilai</button>
    </form>

    <div style="text-align: center;">
    <a href="wali_kelas.php">
        <button class="back-btn">Kembali ke Dashboard</button>
    </a>
</div>
</div>

<script>
function hitungPredikatKeterampilan() {
    const nilai = parseFloat(document.getElementById("nilai_keterampilan").value);
    const predikatField = document.getElementById("predikat_keterampilan");

    let predikat = "";
    if (!isNaN(nilai)) {
        if (nilai >= 93 && nilai <= 100) {
            predikat = "A";
        } else if (nilai >= 84) {
            predikat = "B";
        } else if (nilai >= 75) {
            predikat = "C";
        } else {
            predikat = "D";
        }
    }

    predikatField.value = predikat;
}


$(document).ready(function() {
    $('#siswa_id').change(function() {
        var siswa_id = $(this).val();
        if (siswa_id !== '') {
            $.get('get_data_siswa.php', { id: siswa_id }, function(data) {
                $('#nis').val(data.nis);
            }, 'json');

            $.get('get_absensi.php', { id: siswa_id }, function(data) {
                $('#ketidakhadiran_sakit').val(data.sakit);
                $('#ketidakhadiran_izin').val(data.izin);
                $('#ketidakhadiran_tanpa_keterangan').val(data.alpa);
            }, 'json');
        }
    });
});

</script>


</body>
</html>
