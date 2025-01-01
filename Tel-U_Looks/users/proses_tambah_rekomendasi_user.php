<?php
// Koneksi ke database
include '../db.php'; // Pastikan path ini benar

if (!$conn) {
    die("Koneksi database gagal.");
}

// Pastikan form telah di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $harga = $_POST['harga'] ?? 0;
    $kategori = isset($_POST['kategori']) ? implode(', ', $_POST['kategori']) : ''; // Kategori mahasiswa/dosen
    $link_shopee = $_POST['link_shopee'] ?? '';
    $link_tokopedia = $_POST['link_tokopedia'] ?? '';
    $link_lazada = $_POST['link_lazada'] ?? '';
    $status = 'Pending'; // Status awal adalah Pending

    // Target directory untuk menyimpan gambar
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
            echo "File bukan gambar yang valid atau ukuran terlalu besar.";
        }
    }

    // Jika gambar valid, lanjutkan proses upload
    if ($uploadOk && move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        // Simpan data ke database
        $query = "INSERT INTO rekomendasi (nama_fashion, deskripsi_fashion, harga, link_affiliate_shopee, link_affiliate_tokopedia, link_affiliate_lazada, image, status, kategori)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            die('Query prepare failed: ' . $conn->error);
        }

        // Bind data ke query
        $stmt->bind_param('ssissssss', $nama, $deskripsi, $harga, $link_shopee, $link_tokopedia, $link_lazada, $image_name, $status, $kategori);

        // Eksekusi query
        if ($stmt->execute()) {
            header("Location: ../users/Add_recomendation_user.php?status=success"); // Redirect ke halaman utama setelah berhasil
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }

        // Menutup statement dan koneksi
        $stmt->close();
    } else {
        echo "Gagal mengunggah gambar.";
    }
} else {
    echo "Form tidak di-submit dengan benar.";
}

// Menutup koneksi database
$conn->close();
?>
