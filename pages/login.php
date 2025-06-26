<?php
session_start();
$role = isset($_GET['role']) ? $_GET['role'] : '';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login <?= ucfirst($role) ?> | Sistem Garam</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f7f7f7;
        }

        .login-box {
            width: 360px;
            margin: 80px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
        }

        button:hover {
            background: #2980b9;
        }

        footer {
            margin-top: 50px;
            font-size: 14px;
            color: #aaa;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h2>Login <?= $role ? ucfirst($role) : '' ?></h2>

        <form action="proses_login.php" method="POST">
            <?php if (!$role): ?>
                <label for="role">Masuk sebagai:</label>
                <select name="role" required>
                    <option value="">-- Pilih Peran --</option>
                    <option value="petani">Petani</option>
                    <option value="pengepul">Pengepul</option>
                    <option value="admin">Admin</option>
                </select>
            <?php else: ?>
                <input type="hidden" name="role" value="<?= $role ?>">
            <?php endif; ?>

            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

    <?php include '../includes/footer.php'; ?>