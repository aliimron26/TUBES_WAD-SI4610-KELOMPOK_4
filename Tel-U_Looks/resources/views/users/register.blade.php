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

        h1 {
            font-size: 2.5rem;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
        <h1>Welcome</h1>
        <p>Please register to your account</p>
        <form>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
            </div>
             <div class="form-group">
                <label for="phone">No Telp</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Choose a username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <button type="submit">Register</button>
            <p>Already have an account? <a href="#">Login here</a></p>
            <p><a href="#">Forgot Password?</a></p>
        </form>
    </div>
    <div class="container-right">
        <img src="logo.png" alt="Tel-U Looks Logo">
        <h2>Tel-U Looks: Explore, Inspire, Express</h2>
    </div>
</body>
</html>