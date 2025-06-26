<?php
include '../config.php';
session_start();

$id = $_POST['id_transaksi'];
$aksi = $_POST['aksi'];

$status = ($aksi == 'setujui') ? 'disetujui' : 'ditolak';

$query = "UPDATE transaksi SET status = '$status' WHERE id = $id";
if (mysqli_query($conn, $query)) {
    header("Location: verifikasi_transaksi.php?status=berhasil");
} else {
    echo "Gagal memverifikasi transaksi.";
}
