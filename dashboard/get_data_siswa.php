<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($conn, "SELECT * FROM data_siswa WHERE id = $id");
    $data = mysqli_fetch_assoc($query);
    echo json_encode($data);
}
?>
