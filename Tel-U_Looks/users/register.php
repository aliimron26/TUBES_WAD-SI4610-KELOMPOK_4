<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Tel-U Looks</title>
    <link href="../assets/css/login_register.css" rel="stylesheet">
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
            <div class="input-container">
                <input type="email" id="email" name="email" placeholder="Email" class="input-field">
                <input type="tel" id="phone" name="phone" placeholder="No Telp" class="input-field">
                <input type="text" id="username" name="username" placeholder="Username" class="input-field">
                <input type="password" id="password" name="password" placeholder="Password" class="input-field">
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" class="input-field">
            </div>
            <button type="submit">Daftar</button>
            <p>Already have an account? <a href="login_user.php">Login here</a></p>
        </div>
        <div class="container-right">
            <img src="../Assets/Logo-P.png" alt="Tel-U Looks Logo">>
            <h2>Tel-U Looks: Explore, Inspire, Express</h2>
        </div>
    </div>
</body>
</html>
