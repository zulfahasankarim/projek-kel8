<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $tmp = $_POST['tmp_lahir'];
    $tgl = $_POST['tgl_lahir'];
    $keahlian = $_POST['keahlian'];

    $conn->query("INSERT INTO pembina (nama, gender, tmp_lahir, tgl_lahir, keahlian)
                  VALUES ('$nama', '$gender', '$tmp', '$tgl', '$keahlian')");
    header("Location: list_pembina.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembina UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #dff9fb, #f1f2f6);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 100%;
        }

        .form-container h2 {
            margin-bottom: 25px;
            text-align: center;
            color: #2c3e50;
        }

        .btn-primary {
            width: 100%;
            border-radius: 30px;
        }

        label {
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Tambah Pembina</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tmp_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" name="tmp_lahir" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="keahlian" class="form-label">Keahlian</label>
            <textarea name="keahlian" rows="4" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

</body>
</html>
