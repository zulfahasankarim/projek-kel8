<?php
include '../config/koneksi.php';

// Mengambil id provinsi yang ingin diedit
$id = $_GET['id'];

// Ambil data provinsi berdasarkan id
$data = $conn->query("SELECT * FROM provinsi WHERE id=$id")->fetch_assoc();

// Cek apakah form sudah disubmit
if ($_POST) {
    // Ambil data dari form
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $ibukota = mysqli_real_escape_string($conn, $_POST['ibukota']);
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);

    // Query untuk memperbarui data provinsi
    $sql = "UPDATE provinsi 
            SET nama='$nama', ibukota='$ibukota', latitude='$latitude', longitude='$longitude' 
            WHERE id=$id";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman list jika berhasil
        header("Location: list_provinsi.php");
        exit;
    } else {
        // Jika query gagal, tampilkan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Provinsi</title>
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

        input {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Edit Provinsi</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama Provinsi</label>
                <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
            </div>
            <div class="form-group">
                <label for="ibukota">Ibukota</label>
                <input type="text" name="ibukota" id="ibukota" value="<?= htmlspecialchars($data['ibukota']) ?>" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" id="latitude" value="<?= htmlspecialchars($data['latitude']) ?>" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" name="longitude" id="longitude" value="<?= htmlspecialchars($data['longitude']) ?>" required>
            </div>
            <div class="form-group text-center">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>

</body>
</html>
