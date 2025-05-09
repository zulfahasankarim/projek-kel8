<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang | UMKM STT NF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #a1c4fd, #c2e9fb);
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar-custom {
            background-color: #ffffffdd;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #2c3e50;
            font-weight: 600;
        }

        .navbar-custom .nav-link:hover {
            color: #2980b9;
        }

        .hero {
            text-align: center;
            padding: 80px 20px;
            color: #2c3e50;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .btn-custom {
            margin-top: 30px;
            padding: 12px 30px;
            font-size: 1rem;
            border-radius: 30px;
            background-color: #3498db;
            color: white;
            border: none;
            transition: background 0.3s;
        }

        .btn-custom:hover {
            background-color: #2980b9;
        }

        .features {
            padding: 50px 20px;
        }

        .feature-box {
            padding: 30px;
            border-radius: 15px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(235, 25, 25, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .feature-box i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #3498db;
        }

        .menu-links {
            text-align: center;
            margin-top: 40px;
        }

        .menu-links a {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            border-radius: 8px;
            background-color: #2ecc71;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
        }

        .menu-links a:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">UMKM STT NF</a>
            <div class="d-flex ms-auto">
                <?php if (isset($_SESSION['username'])): ?>
                    <span class="navbar-text me-3">
                        <i class="fa fa-user-circle"></i> <?= htmlspecialchars($_SESSION['username']) ?>
                    </span>
                <?php endif; ?>
                <a href="logout.php" class="btn btn-outline-danger btn-sm ms-3">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <h1>Selamat Datang di Sistem Informasi UMKM</h1>
            <p>Platform untuk pengelolaan data UMKM STT Nurul Fikri secara efektif dan efisien.</p>
        </div>

        <!-- Menu Akses Cepat -->
        <div class="menu-links">
            <a href="umkm/list.php"><i class="fa fa-store"></i> UMKM</a>
            <a href="pembina/list_pembina.php"><i class="fa fa-user-tie"></i> Pembina</a>
            <a href="kabkota/list_kota.php"><i class="fa fa-city"></i> Kabupaten/Kota</a>
            <a href="provinsi/list_provinsi.php"><i class="fa fa-flag"></i> Provinsi</a>
            <a href="kategori_umkm/list_kat.php"><i class="fa fa-tags"></i> Kategori UMKM</a>
        </div>

        <!-- Fitur Singkat -->
        <div class="row features">
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-store"></i>
                    <h5>Data UMKM</h5>
                    <p>Kelola informasi UMKM secara akurat dan terpusat.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-map-marked-alt"></i>
                    <h5>Wilayah</h5>
                    <p>Pemetaan provinsi, kota/kabupaten terkait UMKM.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-users"></i>
                    <h5>Pembinaan</h5>
                    <p>Data pembina UMKM dan kategori pembinaan tersedia.</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
