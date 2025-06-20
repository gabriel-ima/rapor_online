<?php
session_start();
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $siswa_id = $_POST['siswa_id'];
    $nis = $_POST['nis'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $gender = $_POST['gender'];
    $agama = $_POST['agama'];
    $pendidikan_sebelumnya = $_POST['pendidikan_sebelumnya'];
    $alamat_siswa = $_POST['alamat_siswa'];
    $ayah = $_POST['ayah'];
    $ibu = $_POST['ibu'];
    $jalan = $_POST['jalan'];
    $kel_desa = $_POST['kel_desa'] ?? '';
    $kecamatan = $_POST['kecamatan'];
    $kabupaten_kota = $_POST['kabupaten_kota'] ?? '';
    $provinsi = $_POST['provinsi'];
    $nama_wali = $_POST['nama_wali'];
    $pekerjaan_wali = $_POST['pekerjaan_wali'];
    $alamat_wali = $_POST['alamat_wali'];
    
    $sikap_spiritual = $_POST['sikap_spiritual'];
    $sikap_sosial = $_POST['sikap_sosial'];

    $mapel = $_POST['mapel'];
    $nilai_mapel = $_POST['nilai_mapel'];
    $predikat_mapel = $_POST['predikat_mapel'] ?? '';
    $deskripsi_mapel = $_POST['deskripsi_mapel'];

    $nilai_keterampilan = $_POST['nilai_keterampilan'];
    $predikat_keterampilan = $_POST['predikat_keterampilan'] ?? '';
    $deskripsi_keterampilan = $_POST['deskripsi_keterampilan'];

    $ekstrakurikuler = $_POST['ekstrakurikuler'];
    $keterangan_ekstrakurikuler = $_POST['keterangan_ekstrakurikuler'];
    $ekstrakurikuler_2 = $_POST['ekstrakurikuler_2'];
    $keterangan_ekstrakurikuler2 = $_POST['keterangan_ekstrakurikuler2'];
    $ekstrakurikuler_3 = $_POST['keterangan_ekstrakurikuler3'];

    $saran_saran = $_POST['saran_saran'];
    $tinggi_semester_1 = $_POST['tinggi_semester_1'];
    $tinggi_semester_2 = $_POST['tinggi_semester_2'];
    $berat_semester_1 = $_POST['berat_semester_1'];
    $berat_semester_2 = $_POST['berat_semester_2'];

    $kondisi_kesehatan_pendengaran = $_POST['kondisi_kesehatan_pendengaran'];
    $kondisi_kesehatan_penglihatan = $_POST['kondisi_kesehatan_penglihatan'];
    $kondisi_kesehatan_gigi = $_POST['kondisi_kesehatan_gigi'];
    $tambahan_aspek_fisik = $_POST['tambahan_aspek_fisik'];
    $keterangan_tambahan_aspek_fisik = $_POST['keterangan_tambahan_aspek_fisik'];

    $prestasi_kesenian = $_POST['prestasi_kesenian'];
    $prestasi_olahraga = $_POST['prestasi_olahraga'];
    $tambahan_prestasi = $_POST['tambahan_prestasi'];
    $keterangan_tambahan_prestasi = $_POST['keterangan_tambahan_prestasi'];

    $ketidakhadiran_hadir = $_POST['ketidakhadiran_hadir'];
    $ketidakhadiran_sakit = $_POST['ketidakhadiran_sakit'];
    $ketidakhadiran_izin = $_POST['ketidakhadiran_izin'];
    $ketidakhadiran_tanpa_keterangan = $_POST['ketidakhadiran_tanpa_keterangan'];
    $foto = $_POST['foto_catatan_tambahan'];


    // Insert ke database
    $query = "INSERT INTO rapor (
        siswa_id, nis, tempat_lahir, gender, agama, pendidikan_sebelumnya, alamat_siswa,
        ayah, ibu, jalan, kel_desa, kecamatan, kabupaten_kota, provinsi,
        nama_wali, pekerjaan_wali, alamat_wali,
        sikap_spiritual, sikap_sosial,
        mapel, nilai_mapel, predikat_mapel, deskripsi_mapel,
        nilai_keterampilan, predikat_keterampilan, deskripsi_keterampilan,
        ekstrakurikuler, keterangan_ekstrakurikuler, ekstrakurikuler_2, keterangan_ekstrakurikuler2, ekstrakurikuler_3, keterangan_ekstrakurikuler3,
        saran_saran,
        tinggi_semester_1, tinggi_semester_2, berat_semester_1, berat_semester_2,
        kondisi_kesehatan_pendengaran, kondisi_kesehatan_penglihatan, kondisi_kesehatan_gigi, tambahan_aspek_fisik, keterangan_tambahan_aspek_fisik,
        prestasi_kesenian, prestasi_olahraga, tambahan_prestasi, keterangan_tambahan_prestasi,
        ketidakhadiran_hadir, ketidakhadiran_sakit, ketidakhadiran_izin, ketidakhadiran_tanpa_keterangan, foto_catatan_tambahan
    ) VALUES (
        '$siswa_id', '$nis', '$tempat_lahir', '$gender', '$agama', '$pendidikan_sebelumnya', '$alamat_siswa',
        '$ayah', '$ibu', '$jalan', '$kel_desa', '$kecamatan', '$kabupaten_kota', '$provinsi',
        '$nama_wali', '$pekerjaan_wali', '$alamat_wali',
        '$sikap_spiritual', '$sikap_sosial',
        '$mapel', '$nilai_mapel', '$predikat_mapel', '$deskripsi_mapel',
        '$nilai_keterampilan', '$predikat_keterampilan', '$deskripsi_keterampilan',
        '$ekstrakurikuler', '$keterangan_ekstrakurikuler', '$ekstrakurikuler_2', '$keterangan_ekstrakurikuler2', '$ekstrakurikuler_3', '$keterangan_ekstrakurikuler3', 
        '$saran_saran',
        '$tinggi_semester_1', '$tinggi_semester_2', '$berat_semester_1', '$berat_semester_2',
        '$kondisi_kesehatan_pendengaran', '$kondisi_kesehatan_penglihatan', '$kondisi_kesehatan_gigi', '$tambahan_aspek_fisik', '$keterangan_tambahan_aspek_fisik',
        '$prestasi_kesenian', '$prestasi_olahraga', '$tambahan_prestasi', '$keterangan_tambahan_prestasi',
        '$ketidakhadiran_hadir', '$ketidakhadiran_sakit', '$ketidakhadiran_izin', '$ketidakhadiran_tanpa_keterangan', '$foto'
    )";

    $result = mysqli_query($conn, $query);

    // Ekstrakurikuler: simpan multiple baris
    // for ($i = 0; $i < count($ekstrakurikuler); $i++) {
    //     $kegiatan = $ekstrakurikuler[$i];
    //     $keterangan = $keterangan_ekstrakurikuler[$i];
    //     if (!empty($kegiatan) && !empty($keterangan)) {
    //         mysqli_query($conn, "INSERT INTO ekstrakurikuler (nama_kegiatan, keterangan) VALUES ('$kegiatan', '$keterangan')");
    //     }
    // }

    if ($result) {
        echo "<script>alert('Data berhasil disimpan'); window.location.href = 'wali_kelas.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
