<?php
session_start();
include('db.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['id_user'])) {
    echo json_encode(['status' => 'error', 'message' => 'Anda harus login untuk menghapus komentar.']);
    exit();
}

// Pastikan metode adalah POST dan ID komentar diberikan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_komentar'])) {
    $id_user = $_SESSION['id_user'];
    $id_komentar = mysqli_real_escape_string($conn, $_POST['id_komentar']);

    // Periksa apakah komentar milik pengguna yang sedang login
    $sql_check = "SELECT id_user FROM komentar WHERE id_komentar = '$id_komentar'";
    $result_check = mysqli_query($conn, $sql_check);

    if ($result_check && mysqli_num_rows($result_check) > 0) {
        $komentar = mysqli_fetch_assoc($result_check);

        if ($komentar['id_user'] != $id_user) {
            echo json_encode(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk menghapus komentar ini.']);
            exit();
        }

        // Hapus komentar
        $sql_delete = "DELETE FROM komentar WHERE id_komentar = '$id_komentar'";
        if (mysqli_query($conn, $sql_delete)) {
            echo json_encode(['status' => 'success', 'message' => 'Komentar berhasil dihapus.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan saat menghapus komentar.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Komentar tidak ditemukan.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Permintaan tidak valid.']);
}
?>