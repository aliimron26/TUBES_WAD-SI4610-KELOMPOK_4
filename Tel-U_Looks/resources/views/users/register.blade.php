<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tel-U Looks</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: space-between;
        }
        
        .container-left {
            width: 30%;
            padding: 20px;
        }

        .container-right {
            width: 70%;
            background-color: #29313e;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .toggle-buttons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .toggle-btn {
            text-decoration: none;
            padding: 10px 20px;
            font-size: 1rem;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .toggle-btn.active {
            background-color: #007bff;
            color: #fff;
        }

        .toggle-btn:hover {
            background-color: #0056b3;
            color: #fff;
            border-color: #0056b3;
        }

        h1 {
            font-size: 2.5rem;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .input-container {
            display: flex;
            flex-direction: column;
            width: 300px;
        }

        .input-field {
            border: none;
            border-bottom: 1px solid #ccc;
            background: none;
            padding: 10px 0;
            font-size: 14px;
            color: #333;
            outline: none;
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
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        .container-right img {
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="container-left">
        <div class="toggle-buttons">
            <a href="#" class="toggle-btn">Login</a>
            <a href="/register" class="toggle-btn active">Register</a>
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
        <p>Already have an account? <a href="#">Login here</a></p>
    </div>
    <div class="container-right">
        <img src="logo.png" alt="Tel-U Looks Logo">
        <h2>Tel-U Looks: Explore, Inspire, Express</h2>
    </div>
</body>
</html>