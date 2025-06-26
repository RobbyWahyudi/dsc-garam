<?php
session_start();
if ($_SESSION['role'] != 'pengepul') {
    header("Location: login.php");
    exit;
}
include '../config.php';

$id_pengepul = $_SESSION['user_id'];
$query = "SELECT t.*, p.tanggal_panen, p.jumlah_kg, p.kualitas
          FROM transaksi t
          JOIN panen p ON t.id_panen = p.id
          WHERE t.id_pengepul = $id_pengepul";
$result = mysqli_query($conn, $query);
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar_pengepul.php'; ?>

<div class="main-content">
    <h2>Riwayat Transaksi Pengepul</h2>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px;">
        <tr style="background: #f0f0f0;">
            <th>Tanggal Panen</th>
            <th>Jumlah</th>
            <th>Kualitas</th>
            <th>Harga Satuan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['tanggal_panen'] ?></td>
                <td><?= $row['jumlah_kg'] ?> kg</td>
                <td><?= $row['kualitas'] ?></td>
                <td>Rp <?= number_format($row['harga_satuan']) ?></td>
                <td><?= $row['status'] ?></td>

                <td>
                    <?php if (!$row['bukti_pembayaran']): ?>
                        <a href="upload_bukti.php?id=<?= $row['id'] ?>">Upload Bukti</a>
                    <?php else: ?>
                        <a href="../uploads/<?= $row['bukti_pembayaran'] ?>" target="_blank">Lihat Bukti</a>
                    <?php endif; ?>
                </td>

            </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include '../includes/footer.php'; ?>