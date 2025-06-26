<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
include '../config.php';
include '../includes/header.php';
include '../includes/sidebar_admin.php';
?>

<div class="main-content">
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, <strong><?= $_SESSION['username'] ?></strong>!</p>

    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px;">

        <div style="flex: 1; min-width: 200px; padding: 20px; background: #ecf0f1; border-radius: 10px;">
            <h3>Verifikasi Transaksi</h3>
            <p>Proses bukti pembayaran yang diajukan pengepul.</p>
            <a href="verifikasi_transaksi.php">➜ Kelola Verifikasi</a>
        </div>

        <div style="flex: 1; min-width: 200px; padding: 20px; background: #ecf0f1; border-radius: 10px;">
            <h3>Kelola Pengguna</h3>
            <p>Tambah/edit akun petani, pengepul, dan admin.</p>
            <a href="kelola_pengguna.php">➜ Kelola Pengguna</a>
        </div>

        <!-- <div style="flex: 1; min-width: 200px; padding: 20px; background: #ecf0f1; border-radius: 10px;">
            <h3>Data Master</h3>
            <p>Data lokasi, jenis garam, dan lainnya.</p>
            <a href="kelola_master.php">➜ Kelola Master Data</a>
        </div> -->

        <div style="flex: 1; min-width: 200px; padding: 20px; background: #ecf0f1; border-radius: 10px;">
            <h3>Monitoring Transaksi</h3>
            <p>Laporan dan statistik transaksi sistem.</p>
            <a href="monitoring.php">➜ Lihat Monitoring</a>
        </div>

    </div>
</div>

<?php include '../includes/footer.php'; ?>