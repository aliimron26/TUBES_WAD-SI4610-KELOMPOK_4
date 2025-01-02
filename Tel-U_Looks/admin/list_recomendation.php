<?php
// Memasukkan Header
include '../Layouts/sidebar-admin.php';

// Menangani notifikasi status
$status = isset($_GET['status']) ? $_GET['status'] : '';

// Koneksi ke database
include '../db.php';

// Query untuk mendapatkan semua data rekomendasi
$query = "SELECT * FROM rekomendasi WHERE status = 'Upload'";
$result = $conn->query($query);
?>

<!-- Konten Utama untuk Menampilkan Daftar Rekomendasi -->
<div class="content-wrapper">
    <div class="container-fluid mt-5">
        <h2>Daftar Rekomendasi Fashion</h2>

        <!-- Tabel Menampilkan Data Rekomendasi -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Fashion</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Shopee</th>
                            <th>Tokopedia</th>
                            <th>Lazada</th>
                            <th>Aksi</th> <!-- Kolom Aksi untuk tombol Update dan Delete -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Cek apakah ada hasil query
                        if ($result->num_rows > 0) {
                            // Menampilkan data setiap baris
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['nama_fashion'] . "</td>";
                                echo "<td>" . $row['deskripsi_fashion'] . "</td>";
                                echo "<td>" . $row['harga'] . "</td>";
                                echo "<td>" . $row['kategori'] . "</td>";
                                echo "<td><a href='" . $row['link_affiliate_shopee'] . "' target='_blank'>Shopee</a></td>";
                                echo "<td><a href='" . $row['link_affiliate_tokopedia'] . "' target='_blank'>Tokopedia</a></td>";
                                echo "<td><a href='" . $row['link_affiliate_lazada'] . "' target='_blank'>Lazada</a></td>";
                                echo "<td>
                                        <a href='update_recomendation.php?id_rekomendasi=" . $row['id_rekomendasi'] . "' class='btn btn-warning btn-sm'>Update</a>
                                        <a href='delete_recomendation.php?id_rekomendasi=" . $row['id_rekomendasi'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>       
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>Tidak ada rekomendasi yang ditemukan.</td></tr>";
                        }

                        // Menutup koneksi database
                        $result->free();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function showNotification(message, type) {
      const notification = document.createElement('div');
      notification.textContent = message;
      notification.className = `alert alert-${type}`;
      notification.style.position = 'fixed';
      notification.style.top = '50%';
      notification.style.left = '50%';
      notification.style.transform = 'translate(-50%, -50%)';
      notification.style.zIndex = '1050';
      notification.style.padding = '20px 40px';
      notification.style.textAlign = 'center';
      notification.style.borderRadius = '8px';
      notification.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
      notification.style.transition = 'opacity 0.5s ease-in-out';

      document.body.appendChild(notification);

      // Menghapus notifikasi setelah 2 detik
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
      showNotification('Data berhasil diperbaru!', 'success');
    } else if (status === 'terhapus') {
        showNotification('Data berhasil dihapus!', 'success');
    } else if (status === 'error') {
      showNotification('Terjadi kesalahan, Data gagal diperbaru.', 'danger');
    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<?php
// Menutup koneksi database
$conn->close();
?>
