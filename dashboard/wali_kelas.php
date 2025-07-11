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
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #fdf0ef;
        }

        .top-banner {
            background: linear-gradient(135deg, #e74c3c, #f1948a);
            color: white;
            padding: 40px 30px 60px;
            text-align: left;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            position: relative;
        }

        .top-banner h2 {
            font-size: 28px;
            margin: 0;
        }

        .top-banner p {
            margin-top: 8px;
            font-size: 16px;
            color: #fceae8;
        }

        .logout-float {
            position: absolute;
            top: 20px;
            right: 30px;
        }

        .logout-button {
            background-color: #ffffff22;
            color: #fff;
            border: none;
            padding: 10px 16px;
            font-size: 14px;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 500;
            backdrop-filter: blur(6px);
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #ffffff44;
            transform: translateY(-2px);
        }

        .logout-button i {
            font-size: 16px;
        }

        .dashboard {
            max-width: 1000px;
            margin: -20px auto 70px;
            padding: 0 20px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-top: 50px;
        }

        .menu-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            padding: 30px 20px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: #1e293b;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        }

        .menu-card h3 {
            margin: 10px 0 5px;
            font-size: 18px;
        }

        .menu-card p {
            font-size: 13px;
            color: #64748b;
        }

        .menu-card .icon {
            font-size: 40px;
            margin-bottom: 10px;
            color: #e74c3c;
        }

        @media (max-width: 500px) {
            .top-banner h2 {
                font-size: 22px;
            }

            .logout-float {
                top: 16px;
                right: 20px;
            }

            .logout-button {
                font-size: 13px;
                padding: 8px 14px;
            }
        }
    </style>
</head>
<body>

    <div class="top-banner">
        <div class="logout-float">
            <a href="../index.php" class="logout-button">
                <i>🚪</i> <span>Logout</span>
            </a>
        </div>
        <h2>Halo, Wali Kelas <?php echo htmlspecialchars($_SESSION["username"]); ?> 👋</h2>
        <p>Selamat datang di Dashboard Wali Kelas. Silakan pilih menu pengelolaan data.</p>
    </div>

    <div class="dashboard">
        <div class="menu-grid">
            <a href="input_cat_tambahan.php" class="menu-card">
                <div class="icon">📝</div>
                <h3>Input Data Rapor</h3>
                <p>Catatan tambahan siswa</p>
            </a>

            <a href="absensi.php" class="menu-card">
                <div class="icon">📆</div>
                <h3>Input Absensi</h3>
                <p>Presensi siswa per semester</p>
            </a>
        </div>
    </div>

</body>
</html>
