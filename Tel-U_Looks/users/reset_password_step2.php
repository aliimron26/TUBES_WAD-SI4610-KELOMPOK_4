<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Step 2</title>
    <link href="../assets/css/login_dll.css" rel="stylesheet">
</head>
<body>
    <div class="container-left">
        <h1>Verify Code</h1>
        <p>Enter the code sent to your email to verify.</p>
        <div class="input-container">
            <input type="text" id="code" name="code" placeholder="Enter verification code" class="input-field">
        </div>
        <button type="submit" onclick="handleVerifyCode()">Verify Code</button>
        <p><a href="/reset-password">Resend Code</a></p>
    </div>
    <div class="container-right">
        <img src="../Asset/Logo.png" alt="Tel-U Looks Logo">
        <h2>Tel-U Looks: Explore, Inspire, Express</h2>
    </div>

    <script>
        function handleVerifyCode() {
            alert('Code verified successfully!');
            window.location.href = "reset_password_step3.php";
        }
    </script>
</body>
</html>
