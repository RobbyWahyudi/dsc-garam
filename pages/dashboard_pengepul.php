<?php
session_start();
if ($_SESSION['role'] != 'pengepul') {
    header("Location: ../login.php");
    exit;
}
include '../config.php';
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar_pengepul.php'; ?>

<div class="main-content">
    <h2>Dashboard Pengepul</h2>
    <p>Selamat datang, <strong><?= $_SESSION['username'] ?></strong>!</p>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr style="background: #f0f0f0;">
                <th>Petani</th>
                <th>Tanggal Panen</th>
                <th>Jumlah</th>
                <th>Kualitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT p.*, u.username AS petani FROM panen p 
              JOIN users u ON p.id_petani = u.id 
              WHERE p.status_penawaran = 'menunggu'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
          <td>{$row['petani']}</td>
          <td>{$row['tanggal_panen']}</td>
          <td>{$row['jumlah_kg']} kg</td>
          <td>{$row['kualitas']}</td>
          <td><a href='detail_penawaran.php?id={$row['id']}'>Lihat Detail</a></td>
        </tr>";
                }
            } else {
                echo "<tr>
                    <td colspan='8' align='center'>Belum ada penawaran.</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>