<?php
session_start();
include '../config.php';


$id = $_GET['id'];
$query = "SELECT * FROM transaksi WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar_pengepul.php'; ?>

<div class="main-content">
    <h2>Upload Bukti Pembayaran</h2>

    <div style="width: 300px;">
        <form method="POST" action="proses_upload_bukti.php" enctype="multipart/form-data">
            <input type="hidden" name="id_transaksi" value="<?= $data['id'] ?>">

            <label>Unggah Bukti (Gambar / PDF):</label>
            <input type="file" name="bukti" required><br><br>

            <button type="submit">Upload</button>
        </form>
    </div>
</div>