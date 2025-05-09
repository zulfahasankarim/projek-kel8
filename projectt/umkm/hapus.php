<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$conn->query("DELETE FROM umkm WHERE id=$id");
header("Location: list.php");
?>
