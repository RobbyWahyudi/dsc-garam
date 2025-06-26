<?php
session_start();
if ($_SESSION['role'] != 'petani') {
    header("Location: ../login.php");
    exit;
}
include '../config.php';
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar_petani.php'; ?>

<div class="main-content">
    <h2>Dashboard Petani</h2>
    <p>Selamat datang, <strong><?= $_SESSION['username'] ?></strong>!</p>

    <div class="dashboard-cards">
        <div class="card">Total Panen Bulan Ini: 350kg</div>
        <div class="card">Penawaran Aktif: 2</div>
        <div class="card"><a href="input_panen.php">+ Input Panen Baru</a></div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>