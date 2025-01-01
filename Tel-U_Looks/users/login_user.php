<?php
session_start();
include '../db.php'; // Koneksi ke database

// Logika backend untuk menangani login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Email dan password harus diisi.";
    } else {
        // Query untuk mendapatkan data pengguna berdasarkan email
        $stmt = $conn->prepare("SELECT id_user, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Login berhasil, set session
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['email'] = $user['email'];

                // Redirect ke halaman sebelumnya atau ke index.php
                if (isset($_SERVER['HTTP_REFERER']) && 
                    !str_contains($_SERVER['HTTP_REFERER'], 'register.php') && 
                    !str_contains($_SERVER['HTTP_REFERER'], 'ResetPassword/step3.php') &&
                    !str_contains($_SERVER['HTTP_REFERER'], 'login_user.php')) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } else {
                    header("Location: ../index.php");
                }
                exit;
            } else {
                $error = "Password salah.";
            }
        } else {
            $error = "Pengguna tidak ditemukan.";
        }
        $stmt->close();
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
            <div class="toggle-buttons">
                <a href="#" class="toggle-btn active">Login</a>
                <a href="register.php" class="toggle-btn">Register</a>
            </div>
            <h1>Welcome Back</h1>
            <p>Please login to your account</p>
            
            <!-- Menampilkan pesan error jika ada -->
            <?php if (!empty($error)): ?>
                <div style="color: red; margin-bottom: 10px;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="login_user.php" method="POST">
                <div class="input-container">
                    <input type="email" id="email" name="email" placeholder="Email" class="input-field" required>
                    <input type="password" id="password" name="password" placeholder="Password" class="input-field" required>
                </div>
                <button type="submit">Login</button>
            </form>

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
