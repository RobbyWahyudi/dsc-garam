<?php
include '../config.php';
session_start();

$id_petani = $_SESSION['user_id'];  // pastikan session login menyimpan user id
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];
$kualitas = $_POST['kualitas'];

$nama_file = null;
if ($_FILES['dokumen']['name']) {
    $target_dir = "../uploads/";
    $nama_file = basename($_FILES["dokumen"]["name"]);
    $target_file = $target_dir . $nama_file;
    move_uploaded_file($_FILES["dokumen"]["tmp_name"], $target_file);
}

$query = "INSERT INTO panen (id_petani, tanggal_panen, jumlah_kg, kualitas, dokumen)
          VALUES ('$id_petani', '$tanggal', '$jumlah', '$kualitas', '$nama_file')";

if (mysqli_query($conn, $query)) {
    header("Location: dashboard_petani.php?status=sukses");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}
