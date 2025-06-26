<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
include '../config.php';
include '../includes/header.php';
include '../includes/sidebar_admin.php';

// Proses hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    header("Location: kelola_pengguna.php");
    exit;
}

// Ambil data semua pengguna
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY role");
?>

<div style="padding: 20px;">
    <h2>Kelola Pengguna</h2>

    <a href="tambah_pengguna.php" style="display: inline-block; margin: 10px 0; background: #2ecc71; color: white; padding: 10px 16px; border-radius: 5px; text-decoration: none;">+ Tambah Pengguna</a>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 10px;">
        <thead>
            <tr style="background: #f0f0f0;">
                <th>No</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= ucfirst($row['role']) ?></td>
                    <td>
                        <a href="edit_pengguna.php?id=<?= $row['id'] ?>">Edit</a> |
                        <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>