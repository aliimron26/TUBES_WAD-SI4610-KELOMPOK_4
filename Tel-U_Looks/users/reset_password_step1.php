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
        <form action="kirim_kode.php" method="post">
            <div class="input-container">
                <input type="email" id="email" name="email" placeholder="Enter your email" class="input-field">
            </div>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
            <p><a href="/login">Back to Login</a></p>
    </div>
    <div class="container-right">
        <img src="../Assets/Logo-P.png" alt="Tel-U Looks Logo">
        <h2>Tel-U Looks: Explore, Inspire, Express</h2>
    </div>

    <script>
        function handleSendCode() {
            alert('Verification code sent to your email!');
            window.location.href = "reset_password_step2.php";
        }
    </script>
    <?php
    if (isset($_GET['alert'])) {
        if ($_GET['alert'] == "berhasil") {
            echo "
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Email berhasil dikirim.',
                    icon: 'success',
                    confirmButtonText: 'Lanjut'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'reset_password_step2.php';
                    }
                });
            </script>
            ";
        } elseif ($_GET['alert'] == "gagal") {
            echo "
            <script>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Email gagal dikirim.',
                    icon: 'error',
                    confirmButtonText: 'Coba Lagi'
                });
            </script>
            ";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>
