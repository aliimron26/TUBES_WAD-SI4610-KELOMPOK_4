<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Anda harus login untuk menambahkan ke wishlist.']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$productId = $data['productId'] ?? null;

if ($productId && isset($_SESSION['wishlist'])) {
    $index = array_search($productId, $_SESSION['wishlist']);
    if ($index !== false) {
        unset($_SESSION['wishlist'][$index]);
        $_SESSION['wishlist'] = array_values($_SESSION['wishlist']); // Reset array index
        echo json_encode(['success' => true, 'message' => 'Produk berhasil dihapus dari wishlist.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Produk tidak ditemukan di wishlist.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Permintaan tidak valid.']);
}