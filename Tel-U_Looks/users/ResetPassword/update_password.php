<?php
session_start(); // Memulai session
include '../../db.php'; // Tambahkan koneksi database

// Ambil password baru dari form
$newPassword = htmlspecialchars($_POST['new-password']);
$confirmPassword = htmlspecialchars($_POST['confirm-password']);

if ($newPassword === $confirmPassword) {
    // Hash password baru
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Ambil email dari session
    $email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;

    if ($email) {
        // Update password di database
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashedPassword, $email);
        
        if ($stmt->execute()) {
            // Berhasil mengupdate password
            unset($_SESSION['user_email']); // Hapus email dari session
            header("Location: ../login_user.php?status=success");
            exit();
        } else {
            // Gagal mengupdate password
            header("Location: step3.php?alert=update_failed");
            exit();
        }
    } else {
        // Email tidak ditemukan di session
        header("Location: step3.php?alert=session_error");
        exit();
    }
} else {
    // Password tidak cocok
    header("Location: step3.php?alert=password_mismatch");
    exit();
}
?>
