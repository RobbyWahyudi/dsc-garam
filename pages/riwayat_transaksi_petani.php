<?php
session_start();
if ($_SESSION['role'] != 'petani') {
    header("Location: login.php");
    exit;
}
include '../config.php';
include '../includes/header.php';
include '../includes/sidebar_petani.php';

$id_petani = $_SESSION['user_id'];

$query = "SELECT t.*, u.username AS pengepul, p.tanggal_panen, p.jumlah_kg, p.kualitas
          FROM transaksi t
          JOIN users u ON t.id_pengepul = u.id
          JOIN panen p ON t.id_panen = p.id
          WHERE p.id_petani = $id_petani
          ORDER BY t.id DESC";

$result = mysqli_query($conn, $query);
?>

<div class="main-content">
    <h2>Riwayat Transaksi Saya</h2>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr style="background: #f0f0f0;">
                <th>No</th>
                <th>Tanggal Panen</th>
                <th>Jumlah</th>
                <th>Kualitas</th>
                <th>Pengepul</th>
                <th>Harga Satuan</th>
                <th>Status</th>
                <th>Bukti Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): $no = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['tanggal_panen'] ?></td>
                        <td><?= $row['jumlah_kg'] ?> kg</td>
                        <td><?= $row['kualitas'] ?></td>
                        <td><?= $row['pengepul'] ?></td>
                        <td>Rp <?= number_format($row['harga_satuan']) ?></td>
                        <td><?= ucfirst($row['status']) ?></td>
                        <td>
                            <?php if ($row['bukti_pembayaran']): ?>
                                <a href="../uploads/<?= $row['bukti_pembayaran'] ?>" target="_blank">Lihat Bukti</a>
                            <?php else: ?>
                                <em>Belum Ada</em>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" align="center">Belum ada transaksi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>