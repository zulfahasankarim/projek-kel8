<?php

// 1) Mendefinisikan variabel koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db = "dbpuskesmas";
$charset = "utf8mb4";

// 2) Membuat DSN dan opsi akses database
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Mode error: Lempar exception jika ada kesalahan
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // Hasil query sebagai objek
    PDO::ATTR_EMULATE_PREPARES => false, // Gunakan prepared statement asli untuk keamanan
];

// 3) Membuat koneksi PDO (Database)
try {
    $dbh = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage()); // Tampilkan pesan error jika koneksi gagal
}

?>