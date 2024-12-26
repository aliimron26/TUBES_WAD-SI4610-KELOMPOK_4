<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Tel-U Looks</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            flex: 1;
            width: 100%;
        }

        .container-left, .container-right {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container-left {
            width: 35%;
            background-color: #f9f9f9;
        }

        .container-right {
            width: 65%;
            background-color: #29313e;
            color: white;
            text-align: center;
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
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 20px;
            color: #555;
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
            width: 100%;
            max-width: 300px;
            margin-top: 10px;
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

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .container-left, .container-right {
                width: 100%;
            }

            .container-right img {
                width: 150px;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container-left">
            <div class="toggle-buttons">
                <a href="/login_user" class="toggle-btn">Login</a>
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
            <img src="Tel-U_Looks\resources\views\Asset\Logo.png" alt="Tel-U Looks Logo">
            <h2>Tel-U Looks: Explore, Inspire, Express</h2>
        </div>
    </div>
</body>
</html>
