<?php
require_once '../dbkoneksi.php';

$_idx = $_GET['id'] ?? null;
$pasien = null;
$tombol = "Tambah";

if ($_idx) {
    $sql = "SELECT * FROM pasien WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_idx]);
    $pasien = $stmt->fetch(PDO::FETCH_ASSOC);
    $tombol = "Ubah";
}

// Ambil data kelurahan
$query = "SELECT id, nama FROM kelurahan";
$stmt = $dbh->prepare($query);
$stmt->execute();
$kelurahans = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Form Pasien</h2>
        <form action="proses_pasien.php" method="POST">
            <!-- Input hidden untuk ID jika sedang mengedit -->
            <?php if ($_idx): ?>
                <input type="hidden" name="idx" value="<?= htmlspecialchars($_idx); ?>">
            <?php endif; ?>

            <div class="form-group row">
                <label for="kode" class="col-4 col-form-label">Kode</label>
                <div class="col-8">
                    <input id="kode" name="kode" type="text" class="form-control"
                        value="<?= htmlspecialchars($pasien->kode ?? ''); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                    <input id="nama" name="nama" type="text" class="form-control"
                        value="<?= htmlspecialchars($pasien->nama ?? ''); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                <div class="col-8">
                    <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control"
                        value="<?= htmlspecialchars($pasien->tmp_lahir ?? ''); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                <div class="col-8">
                    <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control"
                        value="<?= htmlspecialchars($pasien->tgl_lahir ?? ''); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-4 col-form-label">Jenis Kelamin</label>
                <div class="col-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="gender_l" name="gender" value="L"
                            <?= (isset($pasien->gender) && $pasien->gender == "L") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gender_l">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="gender_p" name="gender" value="P"
                            <?= (isset($pasien->gender) && $pasien->gender == "P") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gender_p">Perempuan</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input id="email" name="email" type="email" class="form-control"
                        value="<?= htmlspecialchars($pasien->email ?? ''); ?>">
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
    <label for="kelurahan_id" class="col-4 col-form-label">Kelurahan</label>
    <div class="col-8">
        <select id="kelurahan_id" name="kelurahan_id" class="custom-select">
            <option value="">-- Pilih Kelurahan --</option>
            <?php foreach ($kelurahans as $kelurahan): ?>
                            <option value="<?= htmlspecialchars($kelurahan['id']); ?>" <?= (isset($pasien['kelurahan_id']) && $pasien['kelurahan_id'] == $kelurahan['id']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($kelurahan['nama']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="proses" value="<?= $tombol; ?>" type="submit"
                        class="btn btn-primary"><?= $tombol; ?></button>
                    <a href="list_pasien.php" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>