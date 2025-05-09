<?php
require_once '../dbkoneksi.php';

$sql = "SELECT * FROM paramedik";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Paramedik</title>
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
                Data Paramedik
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Spesialis</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Unit Kerja ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($rs as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($row['nama']); ?></td>
                                <td><?= htmlspecialchars($row['gender']); ?></td>
                                <td><?= htmlspecialchars($row['tmp_lahir']); ?></td>
                                <td><?= htmlspecialchars($row['tgl_lahir']); ?></td>
                                <td><?= htmlspecialchars($row['spesialis']); ?></td>
                                <td><?= htmlspecialchars($row['telpon']); ?></td>
                                <td><?= htmlspecialchars($row['alamat']); ?></td>
                                <td><?= htmlspecialchars($row['unit_kerja_id']); ?></td>
                                <td>
                                    <a href="form_paramedik.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                                    |
                                    <a href="proses_paramedik.php?idx=<?= $row['id']; ?>&proses=Hapus"
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