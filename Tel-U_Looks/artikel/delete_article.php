<?php
session_start();
include '../db.php'; // Koneksi database

// Cek apakah admin sudah login
if (!isset($_SESSION['id_admin'])) {
    header("Location: login_admin.php");
    exit();
}

// Cek apakah ID artikel diterima
if (!isset($_GET['id'])) {
    echo "ID artikel tidak ditentukan.";
    exit();
}

$id = $_GET['id'];

// Hapus artikel dari database
$sql = "DELETE FROM articles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php"); // Redirect ke halaman index setelah berhasil
    exit();
} else {
    echo "Error: " . $stmt->error;
}
?>
