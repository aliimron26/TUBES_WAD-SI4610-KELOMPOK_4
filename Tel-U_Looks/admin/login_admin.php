<?php
session_start(); // Memulai session

// Cek apakah admin sudah login
if (isset($_SESSION['admin_id'])) {
    header("Location: app.php"); // Redirect ke app.php jika sudah login
    exit();
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../db.php'; // Pastikan untuk menyertakan koneksi database

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa kredensial admin
    $sql = "SELECT * FROM admin WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $admin['password'])) {
            // Set session dan redirect ke app.php
            $_SESSION['admin_id'] = $admin['id_admin'];
            $_SESSION['admin_name'] = $admin['nama'];
            header("Location: app.php"); // Ganti dengan halaman app.php
            exit();
        } else {
            $error_message = "Username atau password salah.";
        }
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tel-U Looks - Login</title>
    <link href="../assets/css/login_register.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="container-left">
            <h1>Welcome Back</h1>
            <p>Please login to your account</p>
            <?php if (isset($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="input-container">
                    <input type="text" id="username" name="username" placeholder="Username" class="input-field" required>
                    <input type="password" id="password" name="password" placeholder="Password" class="input-field" required>
                </div>
                <button type="submit">Login</button>
            </form>
            <hr style="width: 100%; max-width: 300px; margin: 20px 0;">
            <button onclick="location.href='../users/login_user.php'" style="background-color: #ff4d4d;">Login as User</button>
        </div>
        <div class="container-right">
            <img src="../assets/Logo-P.png" alt="Tel-U Looks Logo">
            <h2>Tel-U Looks: Explore, Inspire, Express</h2>
        </div>
    </div>
</body>
</html>