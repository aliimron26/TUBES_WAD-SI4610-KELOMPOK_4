<?php
session_start();
include '../db.php'; // Ganti dengan file koneksi database Anda

// Periksa apakah parameter ID valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_rekomendasi = $_GET['id'];

    // Cek apakah ID rekomendasi valid di database
    $query = "SELECT id_rekomendasi FROM rekomendasi WHERE id_rekomendasi = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_rekomendasi);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Cek apakah item sudah ada di tabel wishlist
        $query_check = "SELECT id_wishlist FROM wishlist WHERE id_rekomendasi = ?";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->bind_param("i", $id_rekomendasi);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            $_SESSION['message'] = "Produk sudah ada di wishlist!";
            $_SESSION['message_type'] = "warning";
        } else {
            // Tambahkan item ke wishlist
            $query_insert = "INSERT INTO wishlist (id_rekomendasi) VALUES (?)";
            $stmt_insert = $conn->prepare($query_insert);
            $stmt_insert->bind_param("i", $id_rekomendasi);
            if ($stmt_insert->execute()) {
                $_SESSION['message'] = "Berhasil menambahkan ke wishlist!";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Gagal menambahkan ke wishlist!";
                $_SESSION['message_type'] = "danger";
            }
        }
    } else {
        $_SESSION['message'] = "ID rekomendasi tidak valid!";
        $_SESSION['message_type'] = "danger";
    }
} else {
    $_SESSION['message'] = "ID tidak valid!";
    $_SESSION['message_type'] = "danger";
}

// Redirect ke halaman detail_rekomendasi_mahasiswa.php
header("Location: detail_rekomendasi_mahasiswa.php?id=" . $id_rekomendasi);
exit();
?>
