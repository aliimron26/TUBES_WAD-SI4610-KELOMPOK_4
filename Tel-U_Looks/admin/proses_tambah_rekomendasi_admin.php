<?php
// Koneksi ke database
include '../db.php'; // Pastikan file ini berisi script koneksi ke database

// Pastikan form telah di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $harga = $_POST['harga'] ?? 0;
    $kategori = isset($_POST['kategori']) ? implode(', ', $_POST['kategori']) : '';
    $link_shopee = $_POST['link_shopee'] ?? '';
    $link_tokopedia = $_POST['link_tokopedia'] ?? '';
    $link_lazada = $_POST['link_lazada'] ?? '';
    $status = 'Pending';

    $target_dir = "../assets/rekomendasi/";
    $image_name = basename($_FILES['gambar']['name']);
    $target_file = $target_dir . $image_name;
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi gambar
    if (!empty($_FILES['gambar']['tmp_name'])) {
        $check = getimagesize($_FILES['gambar']['tmp_name']);
        if ($check === false || $_FILES['gambar']['size'] > 2000000 || !in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $uploadOk = false;
        }
    }

    if ($uploadOk && move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        // Simpan data ke database
        $query = "INSERT INTO rekomendasi (nama_fashion, deskripsi_fashion, harga, link_affiliate_shopee, link_affiliate_tokopedia, link_affiliate_lazada, image, status, kategori)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssissssss', $nama, $deskripsi, $harga, $link_shopee, $link_tokopedia, $link_lazada, $image_name, $status, $kategori);

        if ($stmt->execute()) {
            header("Location: ../index.php");
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }
    } else {
        echo "Gagal mengunggah gambar.";
    }
} else {
    echo "Form tidak di-submit dengan benar.";
}
?>
