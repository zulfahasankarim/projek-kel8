<?php
require_once '../dbkoneksi.php';

$_idx = $_GET['id'] ?? null;
$paramedik = null;
$tombol = "Tambah";

if ($_idx) {
    $sql = "SELECT * FROM paramedik WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_idx]);
    $paramedik = $stmt->fetch(PDO::FETCH_ASSOC);
    $tombol = "Ubah";
}

// Ambil data unit kerja
$query = "SELECT id, nama FROM unit_kerja";
$stmt = $dbh->prepare($query);
$stmt->execute();
$unit_kerja = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Paramedik</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Form Paramedik</h2>
        <form action="proses_paramedik.php" method="POST">
            <!-- Input hidden untuk ID jika sedang mengedit -->
            <?php if ($_idx): ?>
                <input type="hidden" name="idx" value="<?= htmlspecialchars($_idx); ?>">
            <?php endif; ?>

            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                    <input id="nama" name="nama" type="text" class="form-control"
                        value="<?= htmlspecialchars($paramedik->nama ?? ''); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-4 col-form-label">Jenis Kelamin</label>
                <div class="col-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="gender_l" name="gender" value="L"
                            <?= (isset($paramedik->gender) && $paramedik->gender == "L") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gender_l">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="gender_p" name="gender" value="P"
                            <?= (isset($paramedik->gender) && $paramedik->gender == "P") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gender_p">Perempuan</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                <div class="col-8">
                    <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control"
                        value="<?= htmlspecialchars($paramedik->tmp_lahir ?? ''); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                <div class="col-8">
                    <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control"
                        value="<?= htmlspecialchars($paramedik->tgl_lahir ?? ''); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="spesialis" class="col-4 col-form-label">Specialist</label>
                <div class="col-8">
                    <input id="spesialis" name="spesialis" type="text" class="form-control"
                        value="<?= htmlspecialchars($paramedik->spesialis ?? ''); ?>">
                </div>
            </div>

             <div class="form-group row">
                <label for="telpon" class="col-4 col-form-label">No Hp</label>
                <div class="col-8">
                    <input id="telpon" name="telpon" type="text" class="form-control"
                        value="<?= htmlspecialchars($paramedik->telpon ?? ''); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">Alamat</label>
                <div class="col-8">
                    <textarea id="alamat" name="alamat" class="form-control"
                        rows="3"><?= htmlspecialchars($pasien->alamat ?? ''); ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="unit_kerja_id" class="col-4 col-form-label">Unit Kerja</label>
                <div class="col-8">
                    <select id="unit_kerja_id" name="unit_kerja_id" class="custom-select">
                        <option value="">-- Pilih Unit Kerja --</option>
                        <?php foreach ($unit_kerja as $unit): ?>
                            <option value="<?= htmlspecialchars($unit['id']); ?>" <?= (isset($paramedik['unit_kerja_id']) && $paramedik['unit_kerja_id'] == $unit['id']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($unit['nama']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="proses" value="<?= $tombol; ?>" type="submit"
                        class="btn btn-primary"><?= $tombol; ?></button>
                    <a href="list_paramedik.php" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>