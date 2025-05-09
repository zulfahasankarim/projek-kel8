<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard UMKM</title>
    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to bottom right, #ecf0f1, rgb(200, 251, 255));
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #fff;
            padding: 15px 20px;
            box-shadow: 0 2px 6px rgba(3, 85, 100, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: start;
            flex-wrap: wrap;
        }

        .user-info {
            text-align: right;
        }

        .btn-logout {
            background-color: #e74c3c;
            color: white;
            font-weight: bold;
            padding: 6px 15px;
            border-radius: 8px;
            font-size: 0.9rem;
            margin-top: 5px;
            text-decoration: none;
        }

        .btn-logout:hover {
            background-color: #c0392b;
        }

        .main {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background-color: white;
            padding: 20px;
            box-shadow: 2px 0 8px rgba(0, 122, 138, 0.05);
            transition: all 0.3s;
        }

        .sidebar.collapsed {
            width: 0;
            padding: 0;
            overflow: hidden;
        }

        .sidebar a {
            display: block;
            padding: 10px 15px;
            margin-bottom: 10px;
            background-color: #3498db;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        .sidebar a:hover {
            background-color: #2980b9;
        }

        .content {
            flex: 1;
            padding: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .photo-box {
            background-color: white;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            max-width: 800px;
            text-align: center;
        }

        . img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 50%;
            border: 10px solid #3498db;
            margin-bottom: 30px;
        }

        .toggle-sidebar-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            margin-top: 10px;
            font-size: 0.9rem;
        }

        .toggle-sidebar-btn:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .main {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .sidebar.collapsed {
                display: none;
            }
        }
    </style>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("collapsed");
        }
    </script>
</head>
<body>
    <div class="wrapper">

        <!-- Navbar -->
        <div class="navbar">
            <div>
                <h4 class="mb-0">Dashboard UMKM</h4>
                <h1>STT NURUL FIKRI UMKM</h1>
                <button class="toggle-sidebar-btn" onclick="toggleSidebar()">
                    <i class="fa fa-bars"></i> Toggle Menu
                </button>
            </div>
            <div class="user-info">
                <div>👋 Hai, <?= htmlspecialchars($user) ?></div>
                <a href="logout.php" class="btn-logout mt-1"><i class="fa fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>

        <!-- Main layout -->
        <div class="main">
            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <a href="umkm/list.php"><i class="fa fa-store"></i> Data UMKM</a>
                <a href="provinsi/list_provinsi.php"><i class="fa fa-map"></i> Data Provinsi</a>
                <a href="kabkota/list_kota.php"><i class="fa fa-city"></i> Kabupaten/Kota</a>
                <a href="kategori_umkm/list_kat.php"><i class="fa fa-tags"></i> Kategori UMKM</a>
                <a href="pembina/list_pembina.php"><i class="fa fa-user-tie"></i> Pembina UMKM</a>
            </div>

            <!-- Main Content -->
            <div class="content">
                <div class="photo-box">
                    <img src="img/images.jpg" alt="Foto UMKM">
                    <h5>Selamat Datang di Sistem Informasi UMKM STT Nurul Fikri</h5>
                    <p>Silakan gunakan menu di sebelah kiri untuk mengelola data UMKM, pembina, dan wilayah.</p>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
