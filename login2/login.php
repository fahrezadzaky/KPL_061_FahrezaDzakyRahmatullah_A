<?php
session_start();
include("koneksi.php");

// Mengecek apakah ada blokir login
if (isset($_SESSION["login_blocked"]) && $_SESSION["login_blocked"] > time()) {
    $remainingTime = $_SESSION["login_blocked"] - time();
    $error = "Anda telah mencapai batas maksimum percobaan login. Silakan coba lagi setelah " . gmdate("i:s", $remainingTime) . ".";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST['password']);

    // Query untuk memeriksa data login
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION["username"] = $username;
        header("location: dashboard.php");
        exit();
    } else {
        $_SESSION["login_attempts"] = ($_SESSION["login_attempts"] ?? 0) + 1;
        if ($_SESSION["login_attempts"] >= 3) {
            $_SESSION["login_blocked"] = time() + 1800; // Blokir login selama 30 menit (1800 detik)
            $error = "Anda telah mencapai batas maksimum percobaan login. Silakan coba lagi setelah 30 menit.";
        } else {
            $error = "Username atau password salah.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .login-container h2 {
            color: #333;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .login-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: #ff0000;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required autocomplete="off"><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
        <?php if (isset($error)) { echo '<p class="error-message">' . $error . '</p>'; } ?>
    </div>
</body>
</html>
