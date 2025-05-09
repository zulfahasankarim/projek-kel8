<?php
include '../config/koneksi.php';

$kategori = $conn->query("SELECT * FROM kategori_umkm");
$pembina = $conn->query("SELECT * FROM pembina");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $pemilik = mysqli_real_escape_string($conn, $_POST['pemilik']);
    $modal = (float)$_POST['modal'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $kategori_id = (int)$_POST['kategori_umkm_id'];
    $pembina_id = (int)$_POST['pembina_id'];

    if ($nama && $pemilik && $email) {
        $sql = "INSERT INTO umkm (nama, pemilik, modal, email, kategori_umkm_id, pembina_id) 
                VALUES ('$nama', '$pemilik', $modal, '$email', $kategori_id, $pembina_id)";
        if ($conn->query($sql)) {
            header("Location: list.php");
            exit;
        } else {
            $error = "Gagal menyimpan data: " . $conn->error;
        }
    } else {
        $error = "Semua field harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #f9f9f9, #dff9fb);
            font-family: 'Segoe UI', sans-serif;
            padding: 50px 20px;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }
        .form-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .btn-save {
            background-color: #3498db;
            color: white;
        }
        .btn-save:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-title">📝 Tambah Data UMKM</div>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama UMKM</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Pemilik</label>
                <input type="text" name="pemilik" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Modal (Rp)</label>
                <input type="number" name="modal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori UMKM</label>
                <select name="kategori_umkm_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php while($k = $kategori->fetch_assoc()): ?>
                        <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Pembina</label>
                <select name="pembina_id" class="form-select" required>
                    <option value="">-- Pilih Pembina --</option>
                    <?php while($p = $pembina->fetch_assoc()): ?>
                        <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-save">💾 Simpan Data</button>
            <a href="list.php" class="btn btn-secondary">⬅ Kembali</a>
        </form>
    </div>
</body>
</html>
