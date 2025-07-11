
<!-- koneksi untuk ke database -->
<?php
session_start();
include "config.php";

// User masuk dengan username dan password yang sudah ada di database rapor_online
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Ambil data dari tabel users dengan username dan password 
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    // User masuk sebagai role guru, siswa, wali kelas 
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $user["role"];

        // Jika masuk sebagai guru, maka id nya yang diambil 
        if ($user["role"] == "guru") {
            $_SESSION["guru_id"] = $user["id"];
        }
        // Jika masuk sebagai siswa, maka id nya yang diambil 
        if ($user["role"] == "siswa") {
            $_SESSION["siswa_id"] = $user["id"];
        }

        // User-user yang ada dan bisa login 
        switch ($user["role"]) {
            case "guru":
                header("Location: dashboard/guru.php");
                break;
            case "wali_kelas":
                header("Location: dashboard/wali_kelas.php");
                break;
            case "kepala_sekolah":
                header("Location: dashboard/kepala_sekolah.php");
                break;
            case "siswa":
                header("Location: dashboard/siswa.php");
                break;
        }
    } else {
        $error = "Nama Lengkap atau Password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Rapor Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('background.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .wrapper {
            display: flex;
            width: 900px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(8px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .login-form {
            width: 45%;
            background-color: white;
            padding: 40px;
        }

        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        .login-form button {
            width: 100%;
            background-color: #e74c3c;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #c0392b;
        }

        .login-form .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .welcome-panel {
            width: 55%;
            padding: 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: linear-gradient(135deg, #e74c3c, #f1948a);
        }

        .welcome-panel h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .welcome-panel p {
            font-size: 16px;
            max-width: 400px;
        }

        .footer {
            font-size: 12px;
            color: #777;
            margin-top: 30px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
                width: 90%;
            }

            .login-form,
            .welcome-panel {
                width: 100%;
            }

            .welcome-panel {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- class wrapper = nama class untuk css -->
<div class="wrapper">
    <!-- class login-form = nama class untuk css -->
    <div class="login-form">
        <h2>Login Rapor Online</h2>
        <!-- Method post = mengirim data dari formulir HTML -->
        <form method="post">
            <!-- Input = user bisa memasukkan jawaban -->
             <!-- Name = nama buat identitas -->
              <!-- placeholder = keterangan tambahan pada inputan -->
               <!-- required = wajib diisi -->
            <input type="text" name="username" placeholder="Nama Lengkap" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <div class="footer">
            &copy; 2025 Rapor Online | SDN Ibu Dewi 4 Cianjur
        </div>
    </div>
    <div class="welcome-panel">
        <h1>Welcome</h1>
        <p>Selamat datang di sistem Rapor Online.<br>Silakan login untuk melanjutkan.</p>
    </div>
</div>
</body>
</html>
