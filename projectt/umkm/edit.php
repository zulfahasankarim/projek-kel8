<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM umkm WHERE id=$id")->fetch_assoc();
$kategori = $conn->query("SELECT * FROM kategori_umkm");
$pembina = $conn->query("SELECT * FROM pembina");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $pemilik = $_POST['pemilik'];
    $modal = $_POST['modal'];
    $email = $_POST['email'];
    $kategori_id = $_POST['kategori_umkm_id'];
    $pembina_id = $_POST['pembina_id'];

    $sql = "UPDATE umkm SET 
            nama='$nama', pemilik='$pemilik', modal=$modal, email='$email', 
            kategori_umkm_id=$kategori_id, pembina_id=$pembina_id 
            WHERE id=$id";
    $conn->query($sql);
    header("Location: list.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 600px;
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

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        button {
            background-color: #3498db;
            color: white;
            font-size: 1rem;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
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
        <h2>Edit UMKM</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" required>
            </div>

            <div class="form-group">
                <label for="pemilik">Pemilik:</label>
                <input type="text" id="pemilik" name="pemilik" value="<?= $data['pemilik'] ?>" required>
            </div>

            <div class="form-group">
                <label for="modal">Modal:</label>
                <input type="number" id="modal" name="modal" value="<?= $data['modal'] ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $data['email'] ?>" required>
            </div>

            <div class="form-group">
                <label for="kategori_umkm_id">Kategori:</label>
                <select name="kategori_umkm_id" id="kategori_umkm_id" required>
                    <?php while($k = $kategori->fetch_assoc()): ?>
                        <option value="<?= $k['id'] ?>" <?= $k['id'] == $data['kategori_umkm_id'] ? 'selected' : '' ?>>
                            <?= $k['nama'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="pembina_id">Pembina:</label>
                <select name="pembina_id" id="pembina_id" required>
                    <?php while($p = $pembina->fetch_assoc()): ?>
                        <option value="<?= $p['id'] ?>" <?= $p['id'] == $data['pembina_id'] ? 'selected' : '' ?>>
                            <?= $p['nama'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <button type="submit">Update</button>
        </form>

        <div class="back-link">
            <a href="list.php">Kembali ke Daftar UMKM</a>
        </div>
    </div>
</body>
</html>
