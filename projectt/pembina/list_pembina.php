<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];

include '../config/koneksi.php'; // pastikan path sesuai dengan struktur folder Anda
$result = $conn->query("SELECT * FROM pembina");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pembina UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #ecf0f1, #dff9fb);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .navbar {
            background-color: #fff;
            padding: 15px 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .sidebar {
            width: 250px;
            background-color: white;
            padding: 20px;
            box-shadow: 2px 0 8px rgba(0,0,0,0.05);
            min-height: 100vh;
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
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #3498db;
            color: white;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <!-- Navbar -->
    <div class="navbar d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Dashboard UMKM</h4>
        <div class="d-flex align-items-center gap-3">
            <span>👋 Hai, <?= htmlspecialchars($user) ?></span>
            <a href="../logout.php" class="btn btn-danger btn-sm">
                <i class="fa fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>

    <div class="main d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="../umkm/list.php"><i class="fa fa-store"></i> Data UMKM</a>
            <a href="../provinsi/list_provinsi.php"><i class="fa fa-map"></i> Data Provinsi</a>
            <a href="../kabkota/list_kota.php"><i class="fa fa-city"></i> Kabupaten/Kota</a>
            <a href="../kategori_umkm/list_kat.php"><i class="fa fa-tags"></i> Kategori UMKM</a>
            <a href="list_pembina.php"><i class="fa fa-user-tie"></i> Pembina UMKM</a>
        </div>

        <!-- Main Content -->
        <div class="content">
            <h2>Data Pembina UMKM</h2>
            <a href="tambah_pembina.php" class="btn btn-primary mb-3">+ Tambah Pembina</a>

            <table>
                <tr>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Tempat, Tgl Lahir</th>
                    <th>Keahlian</th>
                    <th>Aksi</th>
                </tr>
                <?php while($r = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($r['nama']) ?></td>
                    <td><?= htmlspecialchars($r['gender']) ?></td>
                    <td><?= htmlspecialchars($r['tmp_lahir']) ?>, <?= htmlspecialchars($r['tgl_lahir']) ?></td>
                    <td><?= htmlspecialchars($r['keahlian']) ?></td>
                    <td>
                        <a href="edit_pembina.php?id=<?= $r['id'] ?>">Edit</a> | 
                        <a href="hapus_pembina.php?id=<?= $r['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
