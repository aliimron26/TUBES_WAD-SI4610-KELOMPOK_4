<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Step 1</title>
    <link href="../assets/css/login_dll.css" rel="stylesheet">
</head>
<body>
    <div class="container-left">
        <h1>Reset Password</h1>
        <p>Enter your registered email to receive a verification code.</p>
        <div class="input-container">
            <input type="email" id="email" name="email" placeholder="Enter your email" class="input-field">
        </div>
        <button type="submit" onclick="handleSendCode()">Send Verification Code</button>
        <p><a href="/login">Back to Login</a></p>
    </div>
    <div class="container-right">
        <img src="../Asset/Logo.png" alt="Tel-U Looks Logo">
        <h2>Tel-U Looks: Explore, Inspire, Express</h2>
    </div>

    <script>
        function handleSendCode() {
            alert('Verification code sent to your email!');
            window.location.href = "reset_password_step2.php";
        }
    </script>
</body>
</html>
