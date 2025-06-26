<?php
include '../config.php';
session_start();

$id_transaksi = $_POST['id_transaksi'];

$upload_dir = '../uploads/';
$nama_file = basename($_FILES["bukti"]["name"]);
$target_file = $upload_dir . $nama_file;

if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
    $query = "UPDATE transaksi SET bukti_pembayaran = '$nama_file' WHERE id = $id_transaksi";
    if (mysqli_query($conn, $query)) {
        echo "Bukti pembayaran berhasil diupload.";
        header("Location: riwayat_transaksi_pengepul.php");
    } else {
        echo "Gagal update transaksi.";
    }
} else {
    echo "Gagal mengunggah file.";
}
