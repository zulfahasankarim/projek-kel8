<?php
include '../config/koneksi.php';

// Ambil data provinsi untuk dropdown
$provinsi = $conn->query("SELECT * FROM provinsi ORDER BY nama");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $lat = $_POST['latitude'];
    $lng = $_POST['longitude'];
    $provinsi_id = $_POST['provinsi_id'];

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO kabkota (nama, latitude, longitude, provinsi_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sddi", $nama, $lat, $lng, $provinsi_id);
    $stmt->execute();

    header("Location: list_kota.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kabupaten/Kota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4>Tambah Kabupaten / Kota</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kabupaten/Kota</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="number" step="any" class="form-control" name="latitude" id="latitude" required>
                </div>
                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="number" step="any" class="form-control" name="longitude" id="longitude" required>
                </div>
                <div class="mb-3">
                    <label for="provinsi_id" class="form-label">Provinsi</label>
                    <select class="form-select" name="provinsi_id" id="provinsi_id" required>
                        <option value="" disabled selected>-- Pilih Provinsi --</option>
                        <?php while($p = $provinsi->fetch_assoc()): ?>
                            <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nama']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="list_kota.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
