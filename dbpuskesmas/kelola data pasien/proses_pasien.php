<?php
require_once "../dbkoneksi.php";

try {
    // Pastikan data POST tersedia
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kode = $_POST['kode'] ?? null;
        $nama = $_POST['nama'] ?? null;
        $alamat = $_POST['alamat'] ?? null;
        $tmp_lahir = $_POST['tmp_lahir'] ?? null;
        $tgl_lahir = $_POST['tgl_lahir'] ?? null;
        $gender = $_POST['gender'] ?? null;
        $email = $_POST['email'] ?? null;
        $kelurahan_id = $_POST['kelurahan_id'] ?? null;
        $proses = $_POST['proses'] ?? null;

        // Validasi input tidak boleh kosong
        if (!$kode || !$nama || !$alamat || !$tmp_lahir || !$tgl_lahir || !$gender || !$email || !$kelurahan_id) {
            die("Semua field harus diisi!");
        }

        if ($proses == "Tambah") {
            $sql = "INSERT INTO pasien (kode, nama, alamat, tmp_lahir, tgl_lahir, gender, email, kelurahan_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$kode, $nama, $alamat, $tmp_lahir, $tgl_lahir, $gender, $email, $kelurahan_id]);

        } else if ($proses == "Ubah") {
            $_idx = $_POST['idx'] ?? null;
            if (!$_idx) {
                die("ID pasien tidak ditemukan!");
            }

            $sql = "UPDATE pasien 
                    SET kode=?, nama=?, alamat=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, kelurahan_id=? 
                    WHERE id=?";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$kode, $nama, $alamat, $tmp_lahir, $tgl_lahir, $gender, $email, $kelurahan_id, $_idx]);

        } else {
            die("Proses tidak valid!");
        }
    }

    // Proses Hapus Data
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['idx']) && isset($_GET['proses']) && $_GET['proses'] == "Hapus") {
        $_idx = $_GET['idx'];
        $sql = "DELETE FROM pasien WHERE id=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$_idx]);
    }

    // Redirect kembali ke halaman daftar pasien
    header("Location: list_pasien.php");
    exit();

} catch (PDOException $e) {
    die("Terjadi kesalahan: " . $e->getMessage());
}
