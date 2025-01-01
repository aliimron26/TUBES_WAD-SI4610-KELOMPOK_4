<?php
include '../db.php'; // Menghubungkan ke database

$id = $_GET['id'];
$query = "DELETE FROM articles WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo "<script>alert('Artikel berhasil dihapus.'); window.location.href='artikel.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus artikel.'); window.location.href='artikel.php';</script>";
}
?>