<?php
require_once '../dbkoneksi.php';

$_idx = $_GET['id'] ?? null;
$periksa = null;
$tombol = "Tambah";

if ($_idx) {
    $sql = "SELECT * FROM periksa WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_idx]);
    $periksa = $stmt->fetch(PDO::FETCH_ASSOC);
    $tombol = "Ubah";
}

// Ambil data pasien
$query = "SELECT id, nama FROM pasien";
$stmt = $dbh->prepare($query);
$stmt->execute();
$pasiens = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ambil data paramedik
$query = "SELECT id, nama FROM paramedik";
$stmt = $dbh->prepare($query);
$stmt->execute();
$paramediks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Pemeriksaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Form Pemeriksaan</h2>
        <form action="proses_periksa.php" method="POST">
            <!-- Input hidden untuk ID jika sedang mengedit -->
            <?php if ($_idx): ?>
                <input type="hidden" name="idx" value="<?= htmlspecialchars($_idx); ?>">
            <?php endif; ?>

            <div class="form-group row">
                <label for="tanggal" class="col-4 col-form-label">Tanggal Pemeriksaan</label>
                <div class="col-8">
                    <input id="tanggal" name="tanggal" type="date" class="form-control"
                        value="<?= htmlspecialchars($periksa->tanggal ?? ''); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="berat" class="col-4 col-form-label">Berat Badan</label>
                <div class="col-8">
                    <input id="berat" name="berat" type="number" step="0.01" class="form-control"
                        value="<?= htmlspecialchars(floatval($periksa->berat ?? 0.00)); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="tinggi" class="col-4 col-form-label">Tinggi Badan</label>
                <div class="col-8">
                    <input id="tinggi" name="tinggi" type="number" step="0.01" class="form-control"
                        value="<?= htmlspecialchars(floatval($periksa->tinggi ?? 0.00)); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="tensi" class="col-4 col-form-label">Tensi</label>
                <div class="col-8">
                    <input id="tensi" name="tensi" type="text" class="form-control"
                        value="<?= htmlspecialchars($periksa->tensi ?? ''); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="keterangan" class="col-4 col-form-label">Keterangan</label>
                <div class="col-8">
                    <textarea id="keterangan" name="keterangan" class="form-control"
                        rows="3"><?= htmlspecialchars($periksa->keterangan ?? ''); ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="pasien_id" class="col-4 col-form-label">Pasien</label>
                <div class="col-8">
                    <select id="pasien_id" name="pasien_id" class="custom-select">
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach ($pasiens as $pasien): ?>
                            <option value="<?= htmlspecialchars($pasien['id']); ?>" <?= (isset($periksa['pasien_id']) && $periksa['pasien_id'] == $pasien['id']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($pasien['nama']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="paramedik_id" class="col-4 col-form-label">Paramedik</label>
                <div class="col-8">
                    <select id="paramedik_id" name="paramedik_id" class="custom-select">
                        <option value="">-- Pilih Paramedik --</option>
                        <?php foreach ($paramediks as $paramedik): ?>
                            <option value="<?= htmlspecialchars($paramedik['id']); ?>" <?= (isset($periksa['paramedik_id']) && $periksa['paramedik_id'] == $paramedik['id']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($paramedik['nama']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="proses" value="<?= $tombol; ?>" type="submit"
                        class="btn btn-primary"><?= $tombol; ?></button>
                    <a href="list_periksa.php" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>