<?php
session_start(); // Memulai session

// Ambil kode dari form dan session
$inputCode = htmlspecialchars($_POST['code']);
$storedCode = isset($_SESSION['verification_code']) ? $_SESSION['verification_code'] : null;

if ($storedCode && $inputCode === $storedCode) {
    // Kode cocok
    $email = $_SESSION['email']; // Ambil email dari session (simpan sebelumnya)
    $_SESSION['user_email'] = $email; // Simpan email ke session untuk langkah berikutnya
    
    // Hapus kode verifikasi untuk keamanan
    unset($_SESSION['verification_code']);
    
    // Redirect ke halaman reset password
    header("Location: step3.php?alert=verified");
    exit();
} else {
    // Kode tidak cocok
    header("Location: step2.php?alert=invalid");
    exit();
}
?>
