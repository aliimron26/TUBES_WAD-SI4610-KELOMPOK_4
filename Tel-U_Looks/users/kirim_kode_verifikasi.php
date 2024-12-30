<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email = htmlspecialchars($_POST['email']);

$mail = new PHPMailer(true);

try {                       
    $mail->SMTPDebug = 2;  
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'telu.looks@gmail.com';
    $mail->Password   = 'lfuwrjelmpnsrncz';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;  

    $mail->setFrom('telu.looks@gmail.com', 'tutorial malasngoding');
        $mail->addAddress($email); 
        $mail->isHTML(true);
        $mail->Subject = "Kode Verifikasi Ganti Password";    
        $mail->Body = "Kode verifikasi Anda untuk mengganti password adalah: 
            <b>031265</b>. 
            Silakan gunakan kode ini untuk melanjutkan proses reset password. Jika Anda tidak meminta perubahan ini, abaikan email ini.";
        $mail->send();
        header("location:reset_password_step2.php?alert=berhasil");

    }catch (Exception $e) {
    	header("location:reset_password_step2.php?alert=berhasil");

    }



?>