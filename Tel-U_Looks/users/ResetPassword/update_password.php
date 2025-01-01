<?php
session_start();
include '../../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan input dari pengguna
    $newPassword = htmlspecialchars($_POST['new-password']);
    $confirmPassword = htmlspecialchars($_POST['confirm-password']);
    $email = $_SESSION['reset_email']; // Pastikan email disimpan pada langkah sebelumnya

    // Validasi input
    if (empty($newPassword) || empty($confirmPassword)) {
        header("Location: step3.php?alert=empty_fields");
        exit();
    }

    if ($newPassword !== $confirmPassword) {
        header("Location: step3.php?alert=password_mismatch");
        exit();
    }

    // Enkripsi password baru
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update password di database
    $sql = "UPDATE users SET password = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashedPassword, $email);

    if ($stmt->execute()) {
        // Password berhasil diperbarui
        session_destroy(); // Hapus sesi setelah reset password selesai
        header("Location: ../login_user.php?status=password_reset_success");
    } else {
        // Gagal memperbarui password
        header("Location: step3.php?alert=update_failed");
    }

    $stmt->close();
    $conn->close();
}
?>
