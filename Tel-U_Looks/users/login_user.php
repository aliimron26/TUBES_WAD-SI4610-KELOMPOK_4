<?php
session_start();
include '../db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Email dan password harus diisi.";
    } else {
        $stmt = $conn->prepare("SELECT id_user, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['email'] = $user['email'];

                $stmt_details = $conn->prepare("SELECT * FROM users WHERE id_user = ?");
                $stmt_details->bind_param("i", $user['id_user']);
                $stmt_details->execute();
                $user_details = $stmt_details->get_result()->fetch_assoc();

                $_SESSION['name'] = $user_details['name'];
                $_SESSION['bio'] = $user_details['bio'];
                $_SESSION['interest'] = $user_details['interest'];

                // Redirect ke halaman sebelumnya atau ke index.php
                if (isset($_SERVER['HTTP_REFERER']) && 
                    !str_contains($_SERVER['HTTP_REFERER'], 'register.php') && 
                    !str_contains($_SERVER['HTTP_REFERER'], 'ResetPassword/step3.php') &&
                    !str_contains($_SERVER['HTTP_REFERER'], 'login_user.php')) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } else {
                    header("Location: ../Layouts/app.php");
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
                <a href="ResetPassword/step1.php">Forgot Password?</a>
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
    <script>
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.textContent = message;
            
            notification.className = `alert alert-${type}`;
            
            if (type === 'success') {
            notification.style.backgroundColor = '#28a745';  
            notification.style.color = '#fff'; 
            } else if (type === 'danger') {
            notification.style.backgroundColor = '#dc3545';  
            notification.style.color = '#fff';  
            } else {
            notification.style.backgroundColor = '#f9f9f9'; 
            notification.style.color = '#333';  
            }
            
            // Style untuk penempatan dan animasi
            notification.style.position = 'fixed';
            notification.style.top = '50%';
            notification.style.left = '50%';
            notification.style.transform = 'translate(-50%, -50%)';
            notification.style.zIndex = '1050';
            notification.style.padding = '20px 40px';
            notification.style.textAlign = 'center';
            notification.style.borderRadius = '8px';
            notification.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
            notification.style.transition = 'opacity 0.5s ease-in-out';
            
            document.body.appendChild(notification);

            // Menghapus notifikasi setelah 3 detik
            setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 500);
            }, 3000);
        }

        // Menangkap parameter URL
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        // Menampilkan notifikasi berdasarkan status
        if (status === 'password_reset_success') {
            showNotification('Password berhasil diperbaru!', 'success');
        } else if (status === 'terhapus') {
            showNotification('Data berhasil dihapus!', 'success');
        } else if (status === 'error') {
            showNotification('Terjadi kesalahan, Data gagal diperbaru.', 'danger');
        }
        </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>
