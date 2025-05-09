<?php
include '../config/koneksi.php';

// Validasi ID dari URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Gunakan prepared statement
    $stmt = $conn->prepare("DELETE FROM provinsi WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirect setelah berhasil
    header("Location: list_provinsi.php");
    exit;
} else {
    echo "ID tidak valid.";
}
?>
