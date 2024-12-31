<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Step 3</title>
    <link href="../../assets/css/reset_password.css" rel="stylesheet">
</head>
<body>
    <div class="container-left">
        <h1>Set New Password</h1>
        <p>Enter your new password and confirm it below.</p>
        <form action="update_password.php" method="POST" id="passwordForm">
            <div class="input-container">
                <input type="password" id="new-password" name="new-password" placeholder="New Password" class="input-field" required>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" class="input-field" required>
            </div>
            <button type="submit" onclick="handleResetPassword()">Reset Password</button>
        </form>
        <p><a href="login_user.php">Back to Login</a></p>
    </div>
    <div class="container-right">
        <img src="../../Assets/Logo-P.png" alt="Tel-U Looks Logo">
        <h2>Tel-U Looks: Explore, Inspire, Express</h2>
    </div>

    <script>
        function handleResetPassword() {
            alert('Password reset successfully!');
            window.location.href = "login_user.php";
        }
    </script>
</body>
</html>
