<?php
include '../config/koneksi.php';
$data = $conn->query("SELECT * FROM provinsi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Provinsi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 1000px;
            margin-top: 50px;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #3498db;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-links {
            text-align: center;
        }

        .action-links a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        .add-link {
            text-align: center;
            margin-bottom: 20px;
        }

        .add-link a {
            background-color: #3498db;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
        }

        .add-link a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="add-link">
            <a href="tambah_provinsi.php">+ Tambah Provinsi</a>
        </div>

        <h2>Daftar Provinsi</h2>

        <table>
            <tr>
                <th>No</th>
                <th>Nama Provinsi</th>
                <th>Ibukota</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['ibukota']) ?></td>
                <td><?= htmlspecialchars($row['latitude']) ?></td>
                <td><?= htmlspecialchars($row['longitude']) ?></td>
                <td class="action-links">
                    <a href="edit_provinsi.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="hapus_provinsi.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus provinsi ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
