<?php
include '../db.php';

$notification = '';
$notification_class = '';
$redirect_script = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ($password !== $confirm_password) {
        $notification = 'Passwords do not match!';
        $notification_class = 'notification-error';  
    } else {
        $check_query = "SELECT * FROM users WHERE email = ? OR username = ?";
        if ($stmt = $conn->prepare($check_query)) {
            $stmt->bind_param("ss", $email, $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $existing_user = $result->fetch_assoc();
                if ($existing_user['email'] === $email) {
                    $notification = 'Email is already used!';
                } elseif ($existing_user['username'] === $username) {
                    $notification = 'Username is already taken!';
                }
                $notification_class = 'notification-error';  
            } else {
                $id_query = "SELECT id_user FROM users ORDER BY id_user DESC LIMIT 1";
                $result = $conn->query($id_query);

                if ($result->num_rows > 0) {
                    $last_id = $result->fetch_assoc()['id_user'];
                    $id_number = (int)substr($last_id, 2) + 1;
                    $new_id = 'us' . str_pad($id_number, 3, '0', STR_PAD_LEFT);
                } else {
                    $new_id = 'us001';
                }

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (id_user, nama, username, email, password) VALUES (?, ?, ?, ?, ?)";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("sssss", $new_id, $nama, $username, $email, $hashed_password);

                    // Execute the query
                    if ($stmt->execute()) {
                        $notification = 'Registration successful! You will be redirected to the login page.';
                        $notification_class = 'notification-success'; 
                        $redirect_script = "<script>
                                                setTimeout(function(){
                                                    window.location.href = 'login_user.php';
                                                }, 2000); // Redirect after 2 seconds
                                           </script>";
                    } else {
                        $notification = 'Error: ' . $stmt->error;
                        $notification_class = 'notification-error';  
                    }
                }
            }
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Tel-U Looks</title>
    <link href="../assets/css/login_register.css" rel="stylesheet">
    <style>
        .notification {
            padding: 10px;
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
            width: 100%;
        }

        .notification-success {
            color: green;
        }

        .notification-error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container-left">
            <div class="toggle-buttons">
                <a href="login_user.php" class="toggle-btn">Login</a>
                <a href="#" class="toggle-btn active">Register</a>
            </div>
            <h1>Welcome</h1>
            <p>Please register to your account</p>

            <?php if (!empty($notification)): ?>
                <div class="notification <?php echo $notification_class; ?>">
                    <?php echo $notification; ?>
                </div>
            <?php endif; ?>

            <div class="input-container">
                <form action="register.php" method="POST">
                    <input type="text" id="name" name="name" placeholder="Nama" class="input-field" required>
                    <input type="text" id="username" name="username" placeholder="Username" class="input-field" required>
                    <input type="email" id="email" name="email" placeholder="Email" class="input-field" required>
                    <input type="password" id="password" name="password" placeholder="Password" class="input-field" required>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" class="input-field" required>
                    <button type="submit">Daftar</button>
                </form>
            </div>

            <p>Already have an account? <a href="login_user.php">Login here</a></p>
        </div>
        <div class="container-right">
            <img src="../Assets/Logo-P.png" alt="Tel-U Looks Logo">
            <h2>Tel-U Looks: Explore, Inspire, Express</h2>
        </div>
    </div>

    <?php echo $redirect_script; ?>
</body>
</html>
