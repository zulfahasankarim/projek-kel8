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
        <h2>Daftar Kategori UMKM</h2>
        <div class="text-center">
            <a href="tambah_kat.php" class="btn-add">+ Tambah Kategori</a>
        </div>

        <table>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Nama Toko</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../config/koneksi.php';

            // Mengambil data kategori dan nama toko dengan JOIN
            $data = $conn->query("SELECT k.id, k.nama as kategori_nama, u.nama as toko_nama 
                                FROM kategori_umkm k
                                LEFT JOIN umkm u ON u.kategori_umkm_id = k.id");
            $no = 1;
            while ($row = $data->fetch_assoc()):
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['kategori_nama']) ?></td>
                <td><?= htmlspecialchars($row['toko_nama']) ?></td>
                <td class="actions">
                    <a href="edit_kat.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="hapus_kat.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus kategori ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
