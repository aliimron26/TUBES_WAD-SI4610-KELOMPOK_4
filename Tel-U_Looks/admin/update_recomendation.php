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
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Rekomendasi Fashion</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="../assets/css/add_rekomendasi.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Update Rekomendasi Fashion</h2>
    <div class="card">
      <form action="update_proses.php" method="POST" enctype="multipart/form-data" id="fashionForm">
        <!-- Form Fields -->
        <div class="section-header">Informasi Produk</div>
        <input type="hidden" name="id_rekomendasi" value="<?php echo $row['id_rekomendasi']; ?>">
        
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Fashion</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama_fashion']; ?>" placeholder="Contoh: Seragam Mahasiswa Teknik">
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi Fashion</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Tuliskan deskripsi singkat mengenai produk"><?php echo $row['deskripsi_fashion']; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga Fashion (Rp)</label>
          <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" placeholder="Masukkan harga produk">
        </div>

        <!-- Kategori -->
        <div class="section-header">Kategori Pengguna</div>
        <div class="mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="dosen" name="kategori[]" value="Dosen" <?php echo (strpos($row['kategori'], 'Dosen') !== false) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="dosen">Rekomendasi untuk Dosen</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="mahasiswa" name="kategori[]" value="Mahasiswa" <?php echo (strpos($row['kategori'], 'Mahasiswa') !== false) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="mahasiswa">Rekomendasi untuk Mahasiswa</label>
          </div>
        </div>

        <!-- Link Afiliasi -->
        <div class="section-header">Link Afiliasi</div>
        <div class="mb-3">
          <label for="link_shopee" class="form-label">Link Afiliasi Shopee</label>
          <input type="url" class="form-control" id="link_shopee" name="link_shopee" value="<?php echo $row['link_affiliate_shopee']; ?>" placeholder="Masukkan URL afiliasi Shopee">
        </div>
        <div class="mb-3">
          <label for="link_tokopedia" class="form-label">Link Afiliasi Tokopedia</label>
          <input type="url" class="form-control" id="link_tokopedia" name="link_tokopedia" value="<?php echo $row['link_affiliate_tokopedia']; ?>" placeholder="Masukkan URL afiliasi Tokopedia">
        </div>
        <div class="mb-3">
          <label for="link_lazada" class="form-label">Link Afiliasi Lazada</label>
          <input type="url" class="form-control" id="link_lazada" name="link_lazada" value="<?php echo $row['link_affiliate_lazada']; ?>" placeholder="Masukkan URL afiliasi Lazada">
        </div>

        <!-- Unggah Foto -->
        <div class="section-header">Unggah Foto</div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Unggah Foto Fashion</label>
          <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
          <p>Foto saat ini: <?php echo $row['image'] ? '<img src="../assets/rekomendasi/'.$row['image'].'" width="400">' : 'Tidak ada gambar'; ?></p>
        </div>

        <!-- Tombol -->
        <div class="form-buttons">
          <button type="submit" class="btn btn-primary px-4 py-2">Update Rekomendasi</button>
          <button type="button" class="btn btn-cancel px-4 py-2" id="cancelButton">Batal</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
