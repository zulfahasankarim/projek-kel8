<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$conn->query("DELETE FROM provinsi WHERE id=$id");
header("Location: list_provinsi.php");
?>
