<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
include '../config.php';
include '../includes/header.php';
include '../includes/sidebar_admin.php';

$query = "SELECT t.*, u1.username AS petani, u2.username AS pengepul, p.tanggal_panen, p.jumlah_kg, p.kualitas
          FROM transaksi t
          JOIN panen p ON t.id_panen = p.id
          JOIN users u1 ON p.id_petani = u1.id
          JOIN users u2 ON t.id_pengepul = u2.id
          ORDER BY t.id DESC";

$result = mysqli_query($conn, $query);
?>

<div style="padding: 20px;">
    <h2>Monitoring Transaksi Garam</h2>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr style="background: #f9f9f9;">
                <th>No</th>
                <th>Petani</th>
                <th>Pengepul</th>
                <th>Tgl Panen</th>
                <th>Jumlah</th>
                <th>Kualitas</th>
                <th>Harga/Kg</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): $no = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['petani'] ?></td>
                        <td><?= $row['pengepul'] ?></td>
                        <td><?= $row['tanggal_panen'] ?></td>
                        <td><?= $row['jumlah_kg'] ?> kg</td>
                        <td><?= $row['kualitas'] ?></td>
                        <td>Rp <?= number_format($row['harga_satuan']) ?></td>
                        <td>Rp <?= number_format($row['jumlah_kg'] * $row['harga_satuan']) ?></td>
                        <td><?= ucfirst($row['status']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" align="center">Belum ada transaksi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>