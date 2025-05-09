<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #ecf0f1, #dff9fb);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #3498db;
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

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-add {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block;
        }

        .btn-add:hover {
            background-color: #2980b9;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions a {
            color: #e74c3c;
        }

        .actions a:hover {
            color: #c0392b;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="text-center">
           
        </div>

        <table>
            
<?php
include '../config/koneksi.php';
$sql = "SELECT k.*, p.nama as provinsi FROM kabkota k
        LEFT JOIN provinsi p ON k.provinsi_id = p.id";
$result = $conn->query($sql);
?>
<h2>Data Kab/Kota</h2>
<a href="tambah_kota.php">+ Tambah Kab/Kota</a>
<table border="1">
<tr><th>Nama</th><th>Provinsi</th><th>Lat</th><th>Lng</th><th>Aksi</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['provinsi'] ?></td>
    <td><?= $row['latitude'] ?></td>
    <td><?= $row['longitude'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="hapus.php?id=<?= $row['id'] ?>">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
