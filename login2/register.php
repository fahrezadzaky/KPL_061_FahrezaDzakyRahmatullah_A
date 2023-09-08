<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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

        .register-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .register-container h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .register-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .register-form input[type="submit"] {
            background-color: #17a2b8;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .register-form input[type="submit"]:hover {
            background-color: #138496;
        }

        .login-link {
            margin-top: 10px;
            color: #17a2b8;
        }

        .login-link:hover {
            color: #138496;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <p>Create an account</p>
        <form class="register-form" method="post" action="process_registration.php">
            <input type="text" name="username" placeholder="Username" required autocomplete="off"><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
            <input type="submit" value="Register">
        </form>
        <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
