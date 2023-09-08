<?php
session_start();
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi
header("location: login.php"); // Ganti dengan halaman login
exit();
?>
