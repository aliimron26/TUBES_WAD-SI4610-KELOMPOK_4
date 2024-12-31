<?php
session_start(); // Memulai session

// Ambil kode dari form dan session
$inputCode = htmlspecialchars($_POST['code']);
$storedCode = isset($_SESSION['verification_code']) ? $_SESSION['verification_code'] : null;

if ($storedCode && $inputCode === $storedCode) {
    // Kode cocok, redirect ke halaman reset password
    unset($_SESSION['verification_code']); // Hapus kode dari session untuk keamanan
    header("Location: step3.php?alert=verified");
    exit();
} else {
    // Kode tidak cocok, kembali ke halaman sebelumnya dengan pesan error
    header("Location: step2.php?alert=invalid");
    exit();
}
?>