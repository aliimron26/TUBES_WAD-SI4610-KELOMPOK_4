<?php
// Memasukkan Header
include '../Layouts/sidebar-admin.php';

// Koneksi ke database
include '../db.php'; // Pastikan path ini benar

// Cek apakah parameter 'id_rekomendasi' ada di URL
if (isset($_GET['id_rekomendasi'])) {
    $id_rekomendasi = $_GET['id_rekomendasi'];

    // Query untuk menghapus rekomendasi berdasarkan id
    $query = "DELETE FROM rekomendasi WHERE id_rekomendasi = ?";

    // Persiapkan dan bind parameter
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $id_rekomendasi); // 'i' untuk integer

        // Eksekusi query
        if ($stmt->execute()) {
            // Jika berhasil, redirect dengan status sukses
            header("Location: list_recomendation.php?status=terhapus");
        } else {
            // Jika gagal, redirect dengan status gagal
            header("Location: list_recomendation.php?status=error");
        }

        // Tutup statement
        $stmt->close();
    } else {
        // Jika gagal menyiapkan query
        header("Location: list_recomendation.php?status=error");
    }
} else {
    // Jika id_rekomendasi tidak ada di URL
    header("Location: list_recomendation.php?status=error");
}

// Menutup koneksi database
$conn->close();
?>
