<?php
include '../Layouts/sidebar-admin.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Rekomendasi Fashion</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="../assets/css/add_rekomendasi.css" rel="stylesheet">
  <link href="../assets/css/sidebar.css" rel="stylesheet">
  
</head>
<body>
  <!-- Konten Utama -->
  <div class="content-wrapper">
    <div class="container mt-5">
      <h2 class="mb-4">Tambah Rekomendasi Fashion</h2>
      <div class="card p-4">
        <form action="proses_tambah_rekomendasi_admin.php" method="POST" enctype="multipart/form-data" id="fashionForm">
          <!-- Informasi Produk -->
          <div class="section-header mb-3">Informasi Produk</div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Fashion</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: Seragam Mahasiswa Teknik" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Fashion</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Tuliskan deskripsi singkat mengenai produk" required></textarea>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga Fashion (Rp)</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga produk" required>
          </div>

          <!-- Kategori -->
          <div class="section-header mb-3">Kategori Pengguna</div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="dosen" name="kategori[]" value="Dosen">
              <label class="form-check-label" for="dosen">Rekomendasi untuk Dosen</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="mahasiswa" name="kategori[]" value="Mahasiswa">
              <label class="form-check-label" for="mahasiswa">Rekomendasi untuk Mahasiswa</label>
            </div>
          </div>

          <!-- Link Afiliasi -->
          <div class="section-header mb-3">Link Afiliasi</div>
          <div class="mb-3">
            <label for="link_shopee" class="form-label">Link Afiliasi Shopee</label>
            <input type="url" class="form-control" id="link_shopee" name="link_shopee" placeholder="Masukkan URL afiliasi Shopee">
          </div>
          <div class="mb-3">
            <label for="link_tokopedia" class="form-label">Link Afiliasi Tokopedia</label>
            <input type="url" class="form-control" id="link_tokopedia" name="link_tokopedia" placeholder="Masukkan URL afiliasi Tokopedia">
          </div>
          <div class="mb-3">
            <label for="link_lazada" class="form-label">Link Afiliasi Lazada</label>
            <input type="url" class="form-control" id="link_lazada" name="link_lazada" placeholder="Masukkan URL afiliasi Lazada">
          </div>

          <!-- Unggah Foto -->
          <div class="section-header mb-3">Unggah Foto</div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Unggah Foto Fashion</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
          </div>

          <!-- Tombol -->
          <div class="form-buttons mt-4">
            <button type="submit" class="btn btn-primary px-4 py-2">Simpan Rekomendasi</button>
            <a href="list_recomendation.php" class="btn btn-secondary px-4 py-2">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Notifikasi -->
  <script>
    function showNotification(message, type) {
      const notification = document.createElement('div');
      notification.textContent = message;
      notification.className = `alert alert-${type}`;
      notification.style.position = 'fixed';
      notification.style.top = '35%';
      notification.style.right = '30%';
      notification.style.zIndex = '1050';
      notification.style.padding = '15px 20px';
      notification.style.borderRadius = '8px';
      notification.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
      notification.style.transition = 'opacity 0.5s ease-in-out';

      document.body.appendChild(notification);

      // Menghapus notifikasi setelah 3 detik
      setTimeout(() => {
        notification.style.opacity = '0';
        setTimeout(() => notification.remove(), 500);
      }, 3000);
    }

    // Menangkap parameter URL
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    // Menampilkan notifikasi berdasarkan status
    if (status === 'success') {
      showNotification('Data berhasil disimpan!', 'success');
    } else if (status === 'error') {
      showNotification('Terjadi kesalahan, data gagal disimpan.', 'danger');
    }
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
