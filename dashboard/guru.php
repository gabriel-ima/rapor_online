<?php
session_start();
if ($_SESSION["role"] != "guru") {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Guru</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #fceabb, #f8b500);
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
            background-color: #f8b500;
            color: white;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: bold;
            margin: 5px 10px;
        }

        .menu a:hover {
            background-color: #f39c12;
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
        <h2>Selamat Datang, Guru <?php echo $_SESSION["username"]; ?>!</h2>
        <p>Anda dapat mengisi nilai siswa di sini.</p>

        <div class="menu">
            <a href="input_nilai.php">Input Nilai Siswa</a>
            <a href="tampil_nilai.php">Lihat Data Nilai</a>
            <a href="../index.php" class="logout">Logout</a>
        </div>
    </div>
</body>
</html>
