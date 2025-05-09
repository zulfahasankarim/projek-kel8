<?php
require_once "../dbkoneksi.php";

try {
    // Pastikan data POST tersedia
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'] ?? null;
        $gender = $_POST['gender'] ?? null;
        $tmp_lahir = $_POST['tmp_lahir'] ?? null;
        $tgl_lahir = $_POST['tgl_lahir'] ?? null;
        $spesialis = $_POST['spesialis'] ?? null;
        $telpon = $_POST['telpon'] ?? null;
        $alamat = $_POST['alamat'] ?? null;
        $unit_kerja_id = $_POST['unit_kerja_id'] ?? null;
        $proses = $_POST['proses'] ?? null;

        // Validasi input tidak boleh kosong
        if (!$nama || !$gender || !$tmp_lahir || !$tgl_lahir || !$spesialis || !$telpon || !$alamat || !$unit_kerja_id) {
            die("Semua field harus diisi!");
        }

        if ($proses == "Tambah") {
            $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, spesialis, telpon, alamat, unit_kerja_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$nama, $gender, $tmp_lahir, $tgl_lahir, $spesialis, $telpon, $alamat, $unit_kerja_id]);

        } else if ($proses == "Ubah") {
            $_idx = $_POST['idx'] ?? null;
            if (!$_idx) {
                die("ID paramedik tidak ditemukan!");
            }

            $sql = "UPDATE paramedik 
                    SET nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, spesialis=?, telpon=?, alamat=?, unit_kerja_id=?
                    WHERE id=?";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$nama, $gender, $tmp_lahir, $tgl_lahir, $spesialis, $telpon, $alamat, $unit_kerja_id, $_idx]);

        } else {
            die("Proses tidak valid!");
        }
    }

    // Proses Hapus Data
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['idx']) && isset($_GET['proses']) && $_GET['proses'] == "Hapus") {
        $_idx = $_GET['idx'];
        $sql = "DELETE FROM paramedik WHERE id=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$_idx]);
    }

    // Redirect kembali ke halaman daftar pasien
    header("Location: list_paramedik.php");
    exit();

} catch (PDOException $e) {
    die("Terjadi kesalahan: " . $e->getMessage());
}
