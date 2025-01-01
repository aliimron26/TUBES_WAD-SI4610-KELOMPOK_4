<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Step 1</title>
    <link href="../../assets/css/reset_password.css" rel="stylesheet">
    <style>
        .notification {
            color: red;
            font-size: 0.9em;
            margin-top: 10px;
            display: none;
        }
        .loading {
            display: none;
            font-size: 1.2em;
            margin-top: 10px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container-left">
        <h1>Reset Password</h1>
        <p>Enter your registered email to receive a verification code.</p>
        <form id="resetForm" action="send_code.php" method="post" onsubmit="showLoading(event)">
            <div class="input-container">
                <input type="email" id="email" name="email" placeholder="Enter your email" class="input-field" required>
            </div>
            <div id="loading" class="loading">Sending email, please wait...</div>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
        <p><a href="../login_user.php">Back to Login</a></p>
    </div>
    <div class="container-right">
        <img src="../../Assets/Logo-P.png" alt="Tel-U Looks Logo">
        <h2>Tel-U Looks: Explore, Inspire, Express</h2>
    </div>

    <script>
        function showLoading(event) {
            document.getElementById('loading').style.display = 'block';
            document.getElementById('notification').style.display = 'none';
        }
    </script>
    <script>
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.textContent = message;
            
            notification.className = `alert alert-${type}`;
            
            if (type === 'success') {
            notification.style.backgroundColor = '#28a745';  
            notification.style.color = '#fff';  
            } else if (type === 'danger') {
            notification.style.backgroundColor = '#dc3545';  
            notification.style.color = '#fff';  
            } else {
            notification.style.backgroundColor = '#f9f9f9'; 
            notification.style.color = '#333'; 
            }
            
            // Style untuk penempatan dan animasi
            notification.style.position = 'fixed';
            notification.style.top = '50%';
            notification.style.left = '50%';
            notification.style.transform = 'translate(-50%, -50%)';
            notification.style.zIndex = '1050';
            notification.style.padding = '20px 40px';
            notification.style.textAlign = 'center';
            notification.style.borderRadius = '8px';
            notification.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
            notification.style.transition = 'opacity 0.5s ease-in-out';
            
            document.body.appendChild(notification);

            // Menghapus notifikasi setelah 3 detik
            setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 500);
            }, 3000);
        }

        // Menangkap parameter URL
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        // Menampilkan notifikasi berdasarkan status
        if (status === 'not_registered') {
            showNotification('Email is not registered. Please try again.', 'danger');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
