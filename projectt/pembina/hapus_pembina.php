
<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$conn->query("DELETE FROM pembina WHERE id=$id");
header("Location: list_pembina.php");
?>