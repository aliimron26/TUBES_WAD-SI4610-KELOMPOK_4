<?php
// Memasukkan koneksi ke database
include '../db.php';

// Mengambil data dari form
$id_rekomendasi = $_POST['id_rekomendasi'];
$nama_fashion = $_POST['nama'];
$deskripsi_fashion = $_POST['deskripsi'];
$harga = $_POST['harga'];
$kategori = isset($_POST['kategori']) ? implode(',', $_POST['kategori']) : ''; 
$link_shopee = $_POST['link_shopee'];
$link_tokopedia = $_POST['link_tokopedia'];
$link_lazada = $_POST['link_lazada'];

// Mendapatkan nama gambar lama dari database
$query_old_image = "SELECT image FROM rekomendasi WHERE id_rekomendasi = ?";
$stmt_old_image = $conn->prepare($query_old_image);
$stmt_old_image->bind_param("i", $id_rekomendasi);
$stmt_old_image->execute();
$result_old_image = $stmt_old_image->get_result();
$old_image = '';
if ($result_old_image->num_rows > 0) {
    $row = $result_old_image->fetch_assoc();
    $old_image = $row['image']; // Nama gambar lama
}
$stmt_old_image->close();

// Menangani upload gambar jika ada
$upload_dir = '../assets/rekomendasi/';
$new_image = '';

if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $new_image = basename($_FILES['gambar']['name']);
    $upload_path = $upload_dir . $new_image;

    // Mengunggah gambar baru
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $upload_path)) {
        if (!empty($old_image) && file_exists($upload_dir . $old_image)) {
            unlink($upload_dir . $old_image); 
        }
    } else {
        $new_image = ''; 
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

if ($new_image !== '') {
    $query .= ", image = ?";
}

$query .= " WHERE id_rekomendasi = ?";

// Menyiapkan statement
$stmt = $conn->prepare($query);

// Jika ada gambar baru, tambahkan parameter untuk gambar
if ($new_image !== '') {
    $stmt->bind_param("ssisssssi", $nama_fashion, $deskripsi_fashion, $harga, $kategori, $link_shopee, $link_tokopedia, $link_lazada, $new_image, $id_rekomendasi);
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
