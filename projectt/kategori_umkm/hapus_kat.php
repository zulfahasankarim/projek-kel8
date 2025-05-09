<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$conn->query("DELETE FROM kategori_umkm WHERE id=$id");
header("Location: list_kat.php");
exit;
