<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Beranda | Sistem Garam Madura</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 80px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #2c3e50;
        }

        p {
            color: #555;
        }

        .login-buttons {
            margin-top: 30px;
        }

        .login-buttons a {
            display: inline-block;
            margin: 10px;
            padding: 12px 24px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .login-buttons a:hover {
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

    <div class="container">
        <h1>Selamat Datang di Sistem Garam Madura</h1>
        <p>Sistem ini membantu <strong>Petani</strong>, <strong>Pengepul</strong>, dan <strong>Admin</strong> dalam mengelola dan memasarkan hasil garam secara efisien.</p>

        <div class="login-buttons">
            <a href="pages/login.php?role=petani">Login Petani</a>
            <a href="pages/login.php?role=pengepul">Login Pengepul</a>
            <a href="pages/login.php?role=admin">Login Admin</a>
        </div>


    </div>
    <?php include 'includes/footer.php'; ?>

</body>

</html>