<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Step 3</title>
    <link href="../assets/css/login_dll.css" rel="stylesheet">
</head>
<body>
    <div class="container-left">
        <h1>Set New Password</h1>
        <p>Enter your new password and confirm it below.</p>
        <div class="input-container">
            <input type="password" id="new-password" name="new-password" placeholder="New Password" class="input-field">
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" class="input-field">
        </div>
        <button type="submit" onclick="handleResetPassword()">Reset Password</button>
        <p><a href="/login">Back to Login</a></p>
    </div>
    <div class="container-right">
        <img src="../Asset/Logo.png" alt="Tel-U Looks Logo">
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
