<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include '../../db.php';

// Fungsi untuk membuat kode verifikasi random
function generateVerificationCode($length = 6) {
    return str_pad(random_int(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
}

$email = htmlspecialchars($_POST['email']);


$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Email ditemukan
    $verificationCode = generateVerificationCode(); 

    // Simpan kode ke database (atau session, jika perlu)
    session_start();
    $_SESSION['verification_code'] = $verificationCode;

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'telu.looks@gmail.com';
        $mail->Password = 'zprjiwjugpichieo';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('telu.looks@gmail.com', 'Tel-U Looks');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "Kode Verifikasi";
        $mail->Body = "
            <p>Halo,</p>
            <p>Kode verifikasi Anda untuk mengganti password adalah:</p>
            <h2 style='color: #2c3e50;'>$verificationCode</h2>
            <p>Silakan masukkan kode ini pada halaman verifikasi untuk melanjutkan proses reset password Anda.</p>
            <p>Jika Anda tidak meminta perubahan ini, abaikan email ini. Untuk informasi lebih lanjut, Anda dapat menghubungi layanan dukungan kami.</p>
            <p>Salam,</p>
            <p><b>Tel-U Looks</b></p>
        ";
        $mail->send();
        header("location:step2.php?status=berhasil");
    } catch (Exception $e) {
        header("location:step1.php?status=gagal");
    }
} else {
    // Email tidak ditemukan
    header("location:step1.php?status=not_registered");
}

$stmt->close();
$conn->close();
?>

