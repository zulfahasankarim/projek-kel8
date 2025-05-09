<?php
require_once '../dbkoneksi.php';

$sql = "SELECT * FROM periksa";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemeriksaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <style>
        .mx-auto {
            width: 1250px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="mx-auto">
        <div class="card">
            <div class="card-header text-white bg-primary">
                Data Pemeriksaan
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Berat</th>
                            <th>Tinggi</th>
                            <th>Tensi</th>
                            <th>Keterangan</th>
                            <th>Pasien ID</th>
                            <th>Paramedik ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($rs as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($row['tanggal']); ?></td>
                                <td><?= htmlspecialchars($row['berat']); ?></td>
                                <td><?= htmlspecialchars($row['tinggi']); ?></td>
                                <td><?= htmlspecialchars($row['tensi']); ?></td>
                                <td><?= htmlspecialchars($row['keterangan']); ?></td>
                                <td><?= htmlspecialchars($row['pasien_id']); ?></td>
                                <td><?= htmlspecialchars($row['paramedik_id']); ?></td>
                                <td>
                                    <a href="form_periksa.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                                    |
                                    <a href="proses_periksa.php?idx=<?= $row['id']; ?>&proses=Hapus"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</body>

</html>