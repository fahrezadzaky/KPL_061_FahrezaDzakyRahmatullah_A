<?php
session_start();
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirm_password']);

    if ($password !== $confirmPassword) {
        $error = "Password confirmation does not match.";
    } else {
        // Query untuk memeriksa apakah username sudah ada
        $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($checkUsernameQuery);

        if ($result->num_rows > 0) {
            $error = "Username already exists. Please choose a different username.";
        } else {
            // Query untuk menyimpan data pendaftaran
            $registerQuery = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            if ($conn->query($registerQuery) === TRUE) {
                header("location: login.php"); // Arahkan kembali ke halaman login
                exit();
            } else {
                $error = "An error occurred while registering. Please try again later.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Error</title>
    <!-- Gaya CSS seperti sebelumnya -->
</head>
<body>
    <div class="register-container">
        <h2>Registration Error</h2>
        <p><?php echo $error; ?></p>
        <a href="register.php">Back to Registration</a>
    </div>
</body>
</html>
