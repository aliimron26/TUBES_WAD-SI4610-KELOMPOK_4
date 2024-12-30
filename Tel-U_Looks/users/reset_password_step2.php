<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Step 2</title>
    <link href="../assets/css/reset_password.css" rel="stylesheet">
</head>
<body>
    <div class="container-left">
        <h1>Verify Code</h1>
        <p>Enter the code sent to your email to verify.</p>
        <form id="verificationForm" action="reset_password_step3.php" method="POST">
            <div class="input-container">
                <input type="text" id="code" name="code" placeholder="Enter verification code" class="input-field" required>
                <span class="error-message" id="errorMessage">Please enter a valid code.</span>
            </div>
            <button type="submit">Verify Code</button>
        </form>
        <p><a href="resend_code.php">Resend Code</a></p>
    </div>
    <div class="container-right">
        <img src="../Assets/Logo-P.png" alt="Tel-U Looks Logo">
        <h2>Tel-U Looks: Explore, Inspire, Express</h2>
    </div>
    
    <script>
        document.getElementById('verificationForm').addEventListener('submit', function (e) {
            const codeInput = document.getElementById('code');
            const errorMessage = document.getElementById('errorMessage');

            // Validasi kode (hanya angka, minimal 6 digit)
            if (!/^\d{6}$/.test(codeInput.value)) {
                e.preventDefault();
                errorMessage.style.display = 'block';
                codeInput.focus();
            } else {
                errorMessage.style.display = 'none';
            }
        });
    </script>
</body>
</html>
