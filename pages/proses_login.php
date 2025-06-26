<?php
session_start();
include '../config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    $_SESSION['user_id']  = $user['id'];
    $_SESSION['role']     = $user['role'];
    $_SESSION['username'] = $user['username'];

    // Arahkan ke dashboard sesuai peran
    if ($role == 'petani') {
        header("Location: dashboard_petani.php");
    } elseif ($role == 'pengepul') {
        header("Location: dashboard_pengepul.php");
    } elseif ($role == 'admin') {
        header("Location: dashboard_admin.php");
    }
} else {
    echo "Login gagal! Cek username, password, dan peran.";
}
