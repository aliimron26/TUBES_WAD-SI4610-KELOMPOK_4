<?php
// Memasukkan Header
include '../Layouts/sidebar-admin.php';
?>

<!-- Konten Utama untuk Tambah Rekomendasi -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Rekomendasi Fashion</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="../assets/css/add_rekomendasi.css" rel="stylesheet">
  
</head>
<body>
  <div class="container mt-5">
    <h2>Tambah Rekomendasi Fashion</h2>
    <div class="card">
      <form action="proses_tambah_rekomendasi.php" method="POST" enctype="multipart/form-data" id="fashionForm">
        <!-- Informasi Produk -->
        <div class="section-header">Informasi Produk</div>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama Fashion</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: Seragam Mahasiswa Teknik">
        </div>

        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi Fashion</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Tuliskan deskripsi singkat mengenai produk"></textarea>
        </div>

        <div class="mb-3">
          <label for="harga" class="form-label">Harga Fashion (Rp)</label>
          <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga produk">
        </div>

        <!-- Kategori Pengguna -->
        <div class="section-header">Kategori Pengguna</div>

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
        <div class="section-header">Link Afiliasi</div>

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

        <!-- Unggah Foto Fashion -->
        <div class="section-header">Unggah Foto</div>

        <div class="mb-3">
          <label for="gambar" class="form-label">Unggah Foto Fashion</label>
          <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
        </div>

        <!-- Tombol Submit dan Cancel -->
        <div class="form-buttons">
          <button type="submit" class="btn btn-primary px-4 py-2">Simpan Rekomendasi</button>
          <button type="button" class="btn btn-cancel px-4 py-2" id="cancelButton" data-bs-toggle="modal" data-bs-target="#cancelModal">Batal</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Popup Konfirmasi -->
  <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cancelModalLabel">Konfirmasi Pembatalan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin membatalkan? Semua data yang diisi akan hilang.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button type="button" class="btn btn-danger" id="confirmCancel">Ya, Batalkan</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  <script>
    // Get form fields
    const formFields = document.querySelectorAll('input, textarea');
    
    // Get cancel button and modal
    const cancelButton = document.getElementById('cancelButton');
    const cancelModal = new bootstrap.Modal(document.getElementById('cancelModal'));

    // Get confirm cancel button in the modal
    const confirmCancelButton = document.getElementById('confirmCancel');

    // Function to check if any form fields are filled
    function isFormFilled() {
      let filled = false;
      formFields.forEach(function(field) {
        if (field.value.trim() !== "") {
          filled = true;
        }
      });
      return filled;
    }

    // Cancel button behavior - show modal if form is filled
    cancelButton.addEventListener('click', function() {
      if (isFormFilled()) {
        cancelModal.show();  // Show modal popup
      } else {
        window.location.href = '../index.php';  // Redirect to ../index.php if no fields are filled
      }
    });

    // Confirm cancel action
    confirmCancelButton.addEventListener('click', function() {
      window.location.href = '../index.php';  // Redirect to ../index.php
    });
  </script>
</body>
</html>

