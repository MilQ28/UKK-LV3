<?php
include 'koneksi.php';
$id = $_GET['id'];

// Hapus data sesuai ID
mysqli_query($conn, "DELETE FROM alumni WHERE id=$id");

// Cek apakah tabel sudah kosong
$result = mysqli_query($conn, "SELECT COUNT(*) as total FROM alumni");
$data = mysqli_fetch_assoc($result);

if ($data['total'] == 0) {
    // Reset ID kalau tabel kosong
    mysqli_query($conn, "ALTER TABLE alumni AUTO_INCREMENT = 1");
}

header("Location: index.php");
exit;
