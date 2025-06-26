<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
include '../config.php';
include '../includes/header.php';
include '../includes/sidebar_admin.php';

$query = "SELECT t.*, u.username AS pengepul, p.tanggal_panen, p.jumlah_kg, p.kualitas 
          FROM transaksi t
          JOIN users u ON t.id_pengepul = u.id
          JOIN panen p ON t.id_panen = p.id
          WHERE t.bukti_pembayaran IS NOT NULL AND t.status = 'dikirim'";
$result = mysqli_query($conn, $query);
?>


<div class="main-content">
    <h2>Verifikasi Transaksi</h2>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Pengepul</th>
                <th>Tanggal Panen</th>
                <th>Jumlah</th>
                <th>Kualitas</th>
                <th>Bukti Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): $no = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['pengepul'] ?></td>
                        <td><?= $row['tanggal_panen'] ?></td>
                        <td><?= $row['jumlah_kg'] ?> kg</td>
                        <td><?= $row['kualitas'] ?></td>
                        <td>
                            <a href="../uploads/<?= $row['bukti_pembayaran'] ?>" target="_blank">Lihat Bukti</a>
                        </td>
                        <td>
                            <form method="POST" action="proses_verifikasi.php" style="display:inline;">
                                <input type="hidden" name="id_transaksi" value="<?= $row['id'] ?>">
                                <button type="submit" name="aksi" value="setujui">Setujui</button>
                                <button type="submit" name="aksi" value="tolak">Tolak</button>
                            </form>
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