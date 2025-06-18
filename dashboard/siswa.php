<?php
session_start();
if ($_SESSION["role"] != "siswa") {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #fbc2eb, #a6c1ee);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .dashboard {
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            margin-bottom: 30px;
        }

        .menu a {
            display: inline-block;
            text-decoration: none;
            background-color: #a65fc1;
            color: white;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: bold;
            margin: 5px 10px;
        }

        .menu a:hover {
            background-color:  #a65fc1;
        }

        .logout {
            display: block;
            margin-top: 30px;
            background-color: #e74c3c;
        }

        .logout:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Selamat datang Siswa, <?php echo $_SESSION["username"]; ?>!</h2>
        <p>Anda dapat melihat dan mengunduh rapor di sini.</p>

        <div class="menu">
            <a href="tabel_nilai_siswa.php">Lihat Nilai Siswa</a>
            <a href="lihat_rapor_siswa.php">Lihat Rapor Siswa</a>
            <a href="../index.php" class="logout">Logout</a>
        </div>
    </div>
</body>
</html>
