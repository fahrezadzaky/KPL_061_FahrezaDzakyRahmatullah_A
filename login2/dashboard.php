<?php
session_start();

// Memeriksa apakah pengguna telah masuk atau belum
if (!isset($_SESSION["username"])) {
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard-container {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .dashboard-container h2 {
            color: #333;
        }

        .logout-button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-top: 15px;
        }

        .logout-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<div class="dashboard-container">
        <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
        <p>You are now logged in.</p>
        <img src="https://www.pngall.com/wp-content/uploads/5/Green-Checklist.png" alt="check" style="max-width: 100%; height: auto;">
        <form method="post" action="logout.php">
            <input type="submit" class="logout-button" value="Logout">
        </form>
    </div>
</body>
</html>
