<?php
session_start();
include '../config.php';

$id = $_GET['id'];
$query = "SELECT * FROM panen WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<h2>Detail Penawaran Garam</h2>
<p><strong>Tanggal Panen:</strong> <?= $data['tanggal_panen'] ?></p>
<p><strong>Jumlah:</strong> <?= $data['jumlah_kg'] ?> kg</p>
<p><strong>Kualitas:</strong> <?= $data['kualitas'] ?></p>

<form action="konfirmasi_transaksi.php" method="POST">
    <input type="hidden" name="id_panen" value="<?= $data['id'] ?>">
    <label>Harga Kesepakatan (Rp/kg):</label>
    <input type="number" name="harga" required><br>
    <button type="submit">Konfirmasi Transaksi</button>
</form>