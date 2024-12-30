<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tel-U Looks - Login</title>
    <link href="../assets/css/login_register.css" rel="stylesheet">
    <script>
        function goBack() {
            // Memeriksa apakah ada halaman sebelumnya dan apakah halaman tersebut bukan ../users/register.php
            if (document.referrer && !document.referrer.includes("register.php")) {
                window.location.href = document.referrer;
            } else {
                // Jika tidak ada halaman sebelumnya atau halaman sebelumnya adalah ../users/register.php, arahkan ke index.php
                window.location.href = "../index.php";
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="container-left">
            <div class="toggle-buttons">
                <a href="#" class="toggle-btn active">Login</a>
                <a href="register.php" class="toggle-btn">Register</a>
            </div>
            <h1>Welcome Back</h1>
            <p>Please login to your account</p>
            <div class="input-container">
                <input type="email" id="email" name="email" placeholder="Email" class="input-field">
                <input type="password" id="password" name="password" placeholder="Password" class="input-field">
            </div>
            <!-- Tombol Login menggunakan fungsi goBack() -->
            <button type="button" onclick="goBack()">Login</button>
            <p class="forgot-password">
                <a href="reset_password_step1.php">Forgot Password?</a>
            </p>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
            <hr style="width: 100%; max-width: 300px; margin: 20px 0;">
            <button onclick="location.href='../admin/login_admin.php'" style="background-color: #ff4d4d;">Login as Admin</button>
        </div>
        <div class="container-right">
            <img src="../Assets/Logo-P.png" alt="Tel-U Looks Logo">
            <h2>Tel-U Looks: Explore, Inspire, Express</h2>
        </div>
    </div>
</body>
</html>
