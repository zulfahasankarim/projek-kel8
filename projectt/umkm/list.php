<?php
include '../config/koneksi.php';

$sql = "SELECT u.id, u.nama, u.pemilik, u.modal, u.email, k.nama AS kategori, p.nama AS pembina
        FROM umkm u
        LEFT JOIN kategori_umkm k ON u.kategori_umkm_id = k.id
        LEFT JOIN pembina p ON u.pembina_id = p.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
            padding: 40px;
        }
        .container {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .table th {
            background-color: #3498db;
            color: white;
        }
        .btn-edit {
            background-color: #f39c12;
            color: white;
        }
        .btn-edit:hover {
            background-color: #e67e22;
        }
        .btn-delete {
            background-color: #e74c3c;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">📋 Daftar UMKM</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah UMKM</a>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Pemilik</th>
                        <th>Modal</th>
                        <th>Email</th>
                        <th>Kategori</th>
                        <th>Pembina</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['pemilik']) ?></td>
                        <td>Rp<?= number_format($row['modal'], 0, ',', '.') ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['kategori']) ?></td>
                        <td><?= htmlspecialchars($row['pembina']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-edit">Edit</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    <?php if ($result->num_rows == 0): ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data UMKM.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
