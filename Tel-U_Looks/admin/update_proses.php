<?php
// Memasukkan koneksi ke database
include '../db.php';

// Mengambil data dari form
$id_rekomendasi = $_POST['id_rekomendasi'];
$nama_fashion = $_POST['nama'];
$deskripsi_fashion = $_POST['deskripsi'];
$harga = $_POST['harga'];
$kategori = isset($_POST['kategori']) ? implode(',', $_POST['kategori']) : ''; // Menyimpan kategori sebagai string terpisah dengan koma
$link_shopee = $_POST['link_shopee'];
$link_tokopedia = $_POST['link_tokopedia'];
$link_lazada = $_POST['link_lazada'];

// Menangani upload gambar jika ada
$gambar = '';
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = '../uploads/';
    $gambar = $upload_dir . basename($_FILES['gambar']['name']);
    
    if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar)) {
        // Jika upload gagal
        $gambar = '';
    }
}

// Query untuk mengupdate data rekomendasi
$query = "UPDATE rekomendasi SET 
          nama_fashion = ?, 
          deskripsi_fashion = ?, 
          harga = ?, 
          kategori = ?, 
          link_affiliate_shopee = ?, 
          link_affiliate_tokopedia = ?, 
          link_affiliate_lazada = ?";

if ($gambar !== '') {
    $query .= ", image = ?";
}

$query .= " WHERE id_rekomendasi = ?";

// Menyiapkan statement
$stmt = $conn->prepare($query);

// Jika ada gambar yang diupload, tambahkan parameter untuk gambar
if ($gambar !== '') {
    $stmt->bind_param("ssisssssi", $nama_fashion, $deskripsi_fashion, $harga, $kategori, $link_shopee, $link_tokopedia, $link_lazada, $gambar, $id_rekomendasi);
} else {
    $stmt->bind_param("ssissssi", $nama_fashion, $deskripsi_fashion, $harga, $kategori, $link_shopee, $link_tokopedia, $link_lazada, $id_rekomendasi);
}

// Eksekusi query
if ($stmt->execute()) {
    // Jika update berhasil
    header('Location: list_recomendation.php?status=success');
} else {
    // Jika update gagal
    header('Location: list_recomendation.php?status=error');
}

// Menutup statement dan koneksi
$stmt->close();
$conn->close();
?>


