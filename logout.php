<?php
session_start();
session_unset();   // Menghapus semua variabel session
session_destroy(); // Menghancurkan session aktif

// Arahkan kembali ke halaman login atau index
header("Location: index.php");
exit;
