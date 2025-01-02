<?php
// Memasukkan Header
include '../Layouts/sidebar-admin.php';

// Koneksi ke database
include '../db.php';

// Cek jika ada id_rekomendasi yang dikirim melalui URL
if (isset($_GET['id_rekomendasi'])) {
    $id_rekomendasi = $_GET['id_rekomendasi'];

    // Query untuk mengambil data berdasarkan id_rekomendasi
    $query = "SELECT * FROM rekomendasi WHERE id_rekomendasi = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_rekomendasi);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Rekomendasi tidak ditemukan.";
    exit;
}

// Proses saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debugging: untuk memastikan form dikirim dengan benar
    var_dump($_POST); // Ini akan menampilkan semua data yang dikirimkan melalui form
    exit;

    if (isset($_POST['accept'])) {
        // Jika tombol Terima ditekan, update status menjadi "Upload"
        $query_update = "UPDATE rekomendasi SET status = 'Upload' WHERE id_rekomendasi = ?";
        $stmt_update = $conn->prepare($query_update);
        $stmt_update->bind_param("i", $id_rekomendasi);
        $stmt_update->execute();

        // Cek apakah query update berhasil
        if ($stmt_update->affected_rows > 0) {
            echo "Data berhasil diupdate"; // Debugging
        } else {
            echo "Update gagal"; // Debugging
        }
        $stmt_update->close();
        
        header('Location: verify_recomendation_user.php?status=success');
        exit();
    } elseif (isset($_POST['reject'])) {
        // Jika tombol Tolak ditekan, hapus data dari database
        $query_delete = "DELETE FROM rekomendasi WHERE id_rekomendasi = ?";
        $stmt_delete = $conn->prepare($query_delete);
        $stmt_delete->bind_param("i", $id_rekomendasi);
        $stmt_delete->execute();

        // Cek apakah query delete berhasil
        if ($stmt_delete->affected_rows > 0) {
            echo "Data berhasil dihapus"; // Debugging
        } else {
            echo "Delete gagal"; // Debugging
        }
        $stmt_delete->close();
        
        header('Location: verify_recomendation_user.php?status=deleted');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review Rekomendasi Pending</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="../assets/css/add_rekomendasi.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Review Rekomendasi Pending</h2>
    <div class="card">
      <form action="verify_recomendation_user.php" method="POST" enctype="multipart/form-data" id="fashionForm">
        <!-- Form Fields -->
        <div class="section-header">Informasi Produk</div>
        <input type="hidden" name="id_rekomendasi" value="<?php echo $row['id_rekomendasi']; ?>">
        
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Fashion</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama_fashion']; ?>" placeholder="Contoh: Seragam Mahasiswa Teknik" disabled>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi Fashion</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" disabled><?php echo $row['deskripsi_fashion']; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga Fashion (Rp)</label>
          <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" placeholder="Masukkan harga produk" disabled>
        </div>

        <!-- Kategori -->
        <div class="section-header">Kategori Pengguna</div>
        <div class="mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="dosen" name="kategori[]" value="Dosen" <?php echo (strpos($row['kategori'], 'Dosen') !== false) ? 'checked' : ''; ?> disabled>
            <label class="form-check-label" for="dosen">Rekomendasi untuk Dosen</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="mahasiswa" name="kategori[]" value="Mahasiswa" <?php echo (strpos($row['kategori'], 'Mahasiswa') !== false) ? 'checked' : ''; ?> disabled>
            <label class="form-check-label" for="mahasiswa">Rekomendasi untuk Mahasiswa</label>
          </div>
        </div>

        <!-- Link Afiliasi -->
        <div class="section-header">Link Afiliasi</div>
        <div class="mb-3">
          <label for="link_shopee" class="form-label">Link Afiliasi Shopee</label>
          <input type="url" class="form-control" id="link_shopee" name="link_shopee" value="<?php echo $row['link_affiliate_shopee']; ?>" placeholder="Masukkan URL afiliasi Shopee" disabled>
        </div>
        <div class="mb-3">
          <label for="link_tokopedia" class="form-label">Link Afiliasi Tokopedia</label>
          <input type="url" class="form-control" id="link_tokopedia" name="link_tokopedia" value="<?php echo $row['link_affiliate_tokopedia']; ?>" placeholder="Masukkan URL afiliasi Tokopedia" disabled>
        </div>
        <div class="mb-3">
          <label for="link_lazada" class="form-label">Link Afiliasi Lazada</label>
          <input type="url" class="form-control" id="link_lazada" name="link_lazada" value="<?php echo $row['link_affiliate_lazada']; ?>" placeholder="Masukkan URL afiliasi Lazada" disabled>
        </div>

        <!-- Unggah Foto -->
        <div class="section-header">Unggah Foto</div>
        <div class="mb-3">
          <p>Foto: <?php echo $row['image'] ? '<img src="../assets/rekomendasi/'.$row['image'].'" width="400">' : 'Tidak ada gambar'; ?></p>
        </div>

        <!-- Tombol -->
        <div class="form-buttons">
          <button type="submit" name="accept" class="btn btn-primary px-4 py-2">Terima</button>
          <button type="submit" name="reject" class="btn btn-cancel px-4 py-2">Tolak</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
