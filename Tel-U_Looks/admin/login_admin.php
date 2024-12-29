<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tel-U Looks - Login</title>
    <link href="../assets/css/login_dll.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="container-left">
            <h1>Welcome Back</h1>
            <p>Please login to your account</p>
            <div class="input-container">
                <input type="text" id="username" name="username" placeholder="Username" class="input-field">
                <input type="password" id="password" name="password" placeholder="Password" class="input-field">
            </div>
            <button type="submit">Login</button>
            <hr style="width: 100%; max-width: 300px; margin: 20px 0;">
            <button onclick="location.href='../users/login_user.php'" style="background-color: #ff4d4d;">Login as User</button>
        </div>
        <div class="container-right">
            <img src="../Assets/Logo-P.png" alt="Tel-U Looks Logo">
            <h2>Tel-U Looks: Explore, Inspire, Express</h2>
        </div>
    </div>
</body>
</html>
