<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Step 3</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            display: flex;
            height: 100vh;
        }

        .container-left {
            width: 35%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container-right {
            width: 65%;
            background-color: #29313e;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            margin-bottom: 20px;
        }

        .input-container {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 300px;
        }

        .input-field {
            border: none;
            border-bottom: 1px solid #ccc;
            background: none;
            padding: 10px 0;
            font-size: 14px;
            margin-bottom: 15px;
            outline: none;
            color: #333;
        }

        .input-field::placeholder {
            color: #bbb;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            max-width: 300px;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .container-right img {
            width: 200px;
            margin-bottom: 20px;
        }
    </style>
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
        <img src="logo.png" alt="Tel-U Looks Logo">
        <h2>Tel-U Looks: Explore, Inspire, Express</h2>
    </div>

    <script>
        function handleResetPassword() {
            alert('Password reset successfully!');
            window.location.href = "/login";
        }
    </script>
</body>
</html>
