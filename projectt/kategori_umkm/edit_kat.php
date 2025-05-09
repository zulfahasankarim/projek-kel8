<?php
include '../config/koneksi.php';

// Ambil ID kategori dari URL
$id = $_GET['id'];

// Ambil data kategori dan nama toko berdasarkan ID kategori
$data = $conn->query("SELECT k.id, k.nama AS kategori_nama, u.nama AS toko_nama 
                      FROM kategori_umkm k
                      LEFT JOIN umkm u ON u.kategori_umkm_id = k.id
                      WHERE k.id = $id")->fetch_assoc();

if ($_POST) {
    // Ambil data dari form
    $kategori_nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $toko_nama = mysqli_real_escape_string($conn, $_POST['toko_nama']);

    // Update data kategori
    $conn->query("UPDATE kategori_umkm SET nama='$kategori_nama' WHERE id=$id");

    // Update data toko
    $conn->query("UPDATE umkm SET nama='$toko_nama' WHERE kategori_umkm_id=$id");

    // Redirect ke list kategori
    header("Location: list_kat.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #3498db;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        button {
            width: 100%;
            background-color: #3498db;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Kategori UMKM</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama Kategori:</label>
                <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['kategori_nama']) ?>" required>
            </div>

            <div class="form-group">
                <label for="toko_nama">Nama Toko:</label>
                <input type="text" id="toko_nama" name="toko_nama" value="<?= htmlspecialchars($data['toko_nama']) ?>" required>
            </div>

            <button type="submit">Update</button>
        </form>

        <div class="back-link">
            <a href="list_kat.php">Kembali ke Daftar Kategori</a>
        </div>
    </div>
</body>
</html>
