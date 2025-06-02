<?php
session_start();
if ($_SESSION["role"] != "wali_kelas") {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Wali Kelas</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #c2e9fb, #a1c4fd);
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

        a {
            text-decoration: none;
            background-color: #4faaff;
            color: white;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: bold;
        }

        a:hover {
            background-color: #3399ff;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Halo Wali Kelas <?php echo $_SESSION["username"]; ?>!</h2>
        <p>Anda dapat mengonfirmasi nilai dari guru.</p>
        <a href="../index.php">Logout</a>
    </div>
</body>
</html>
