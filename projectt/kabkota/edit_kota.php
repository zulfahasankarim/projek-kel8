<?php
include '../config/koneksi.php';

$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM provinsi WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $ibukota = $_POST['ibukota'];
    $lat = $_POST['latitude'];
    $lng = $_POST['longitude'];

    $stmt = $conn->prepare("UPDATE provinsi SET nama = ?, ibukota = ?, latitude = ?, longitude = ? WHERE id = ?");
    $stmt->bind_param("ssddi", $nama, $ibukota, $lat, $lng, $id);
    $stmt->execute();

    header("Location: list_provinsi.php");
    exit;
}
?>

