<?php
// Memasukkan Header
include '../Layouts/sidebar-admin.php';

// Koneksi ke database
include '../db.php'; 

if (isset($_GET['id_rekomendasi'])) {
    $id_rekomendasi = $_GET['id_rekomendasi'];

    $query = "DELETE FROM rekomendasi WHERE id_rekomendasi = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $id_rekomendasi); // 'i' untuk integer

        if ($stmt->execute()) {
            header("Location: list_recomendation.php?status=terhapus");
        } else {
            header("Location: list_recomendation.php?status=error");
        }

        $stmt->close();
    } else {
        header("Location: list_recomendation.php?status=error");
    }
} else {
    header("Location: list_recomendation.php?status=error");
}

$conn->close();
?>
