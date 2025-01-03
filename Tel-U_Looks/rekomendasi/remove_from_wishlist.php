<?php
session_start();
include '../db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['productId'])) {
    $productId = $data['productId'];

    // Menghapus produk dari wishlist
    $query = "DELETE FROM wishlist WHERE rekomendasi_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $productId);
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true, 'message' => 'Produk berhasil dihapus dari wishlist.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus produk dari wishlist.']);
    }
    mysqli_stmt_close($stmt);
} else {
    echo json_encode(['success' => false, 'message' => 'Produk tidak valid.']);
}

?>