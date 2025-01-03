<?php

$error_message = "";

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../db.php'; 

    // Validasi input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM admin WHERE username = ? LIMIT 1";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $admin = $result->fetch_assoc();
                if ($password == $admin['password']) {
                    $_SESSION['admin_id'] = $admin['id_admin'];
                    $_SESSION['admin_name'] = $admin['nama'];
                    header("Location: list_recomendation.php");
                    exit();
                } else {
                    $error_message = "Password salah.";
                }
            } else {
                $error_message = "Username tidak ditemukan.";
            }
            $stmt->close();
        } else {
            $error_message = "Terjadi kesalahan pada sistem. Coba lagi nanti.";
        }
    } else {
        $error_message = "Harap isi username dan password.";
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
            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></div>
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
