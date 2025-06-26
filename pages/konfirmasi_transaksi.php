<?php
session_start();
include '../config.php';

$id_panen = $_POST['id_panen'];
$harga = $_POST['harga'];
$id_pengepul = $_SESSION['user_id'];

$query = "INSERT INTO transaksi (id_panen, id_pengepul, harga_satuan, status)
          VALUES ($id_panen, $id_pengepul, $harga, 'dikirim')";
mysqli_query($conn, $query);

// Update status penawaran
mysqli_query($conn, "UPDATE panen SET status_penawaran = 'disetujui' WHERE id = $id_panen");

header("Location: dashboard_pengepul.php?transaksi=sukses");
