<?php
session_start(); // Memulai session

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php"); // Redirect ke halaman login jika belum login
    exit();
}

include '../db.php'; // Pastikan untuk menyertakan koneksi database

// Proses penghapusan artikel
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus artikel dari database
    $sql = "DELETE FROM articles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: artikel.php"); // Redirect ke halaman artikel setelah berhasil
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "ID artikel tidak ditentukan.";
}
?>
