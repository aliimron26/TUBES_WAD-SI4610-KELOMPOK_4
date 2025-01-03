<?php
session_start();
include '../db.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID artikel tidak ditemukan.'); window.location.href='manage_articles.php';</script>";
    exit();
}

$id = $_GET['id'];

$query = "DELETE FROM articles WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('Artikel berhasil dihapus.'); window.location.href='manage_articles.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus artikel.'); window.location.href='manage_articles.php';</script>";
}

$conn->close();
?>