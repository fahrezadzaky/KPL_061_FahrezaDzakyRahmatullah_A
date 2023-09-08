<?php
session_start();

// Simpan informasi pengguna di sini (Anda perlu menggantinya dengan database)
$users = [
    "user1@example.com" => "password1",
    "user2@example.com" => "password2",
    // Tambahkan pengguna lain di sini
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Periksa apakah email dan password sesuai dengan yang ada dalam database
    if (isset($users[$email]) && $users[$email] === $password) {
        // Login berhasil
        $_SESSION["user"] = $email;
        header("Location: dashboard.php"); // Redirect ke halaman dashboard
        exit;
    } else {
        // Login gagal
        if (!isset($_SESSION["login_attempts"])) {
            $_SESSION["login_attempts"] = 1;
        } else {
            $_SESSION["login_attempts"]++;
        }

        if ($_SESSION["login_attempts"] >= 4) {
            // Tunggu 30 menit sebelum mencoba login lagi
            sleep(1800); // 1800 detik = 30 menit
            $_SESSION["login_attempts"] = 0; // Reset percobaan login
        }

        header("Location: login.php"); // Redirect kembali ke halaman login
        exit;
    }
}
?>
