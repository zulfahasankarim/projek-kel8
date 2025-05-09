<?php
require_once "../dbkoneksi.php";

try {
    // Pastikan data POST tersedia
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tanggal = $_POST['tanggal'] ?? null;
        $berat = $_POST['berat'] ?? null;
        $tinggi = $_POST['tinggi'] ?? null;
        $tensi = $_POST['tensi'] ?? null;
        $keterangan = $_POST['keterangan'] ?? null;
        $pasien_id = $_POST['pasien_id'] ?? null;
        $paramedik_id = $_POST['paramedik_id'] ?? null;
        $proses = $_POST['proses'] ?? null;

        // Validasi input tidak boleh kosong
        if (!$tanggal || !$berat || !$tinggi || !$tensi || !$keterangan || !$pasien_id || !$paramedik_id) {
            die("Semua field harus diisi!");
        }

        if ($proses == "Tambah") {
            $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, paramedik_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$tanggal, $berat, $tinggi, $tensi, $keterangan, $pasien_id, $paramedik_id]);

        } else if ($proses == "Ubah") {
            $_idx = $_POST['idx'] ?? null;
            if (!$_idx) {
                die("ID pasien tidak ditemukan!");
            }

            $sql = "UPDATE periksa
                    SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, paramedik_id=?
                    WHERE id=?";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$tanggal, $berat, $tinggi, $tensi, $keterangan, $pasien_id, $paramedik_id, $_idx]);

        } else {
            die("Proses tidak valid!");
        }
    }

    // Proses Hapus Data
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['idx']) && isset($_GET['proses']) && $_GET['proses'] == "Hapus") {
        $_idx = $_GET['idx'];
        $sql = "DELETE FROM periksa WHERE id=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$_idx]);
    }

    // Redirect kembali ke halaman daftar pasien
    header("Location: list_periksa.php");
    exit();

} catch (PDOException $e) {
    die("Terjadi kesalahan: " . $e->getMessage());
}
