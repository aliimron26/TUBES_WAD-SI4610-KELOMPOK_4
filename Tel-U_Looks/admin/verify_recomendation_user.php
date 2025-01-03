<?php
include '../Layouts/sidebar-admin.php';

$status = isset($_GET['status']) ? $_GET['status'] : '';

include '../db.php';

$query = "SELECT id_rekomendasi, nama_fashion, deskripsi_fashion, harga, kategori, link_affiliate_shopee, link_affiliate_tokopedia, link_affiliate_lazada FROM rekomendasi WHERE status = 'Pending'";

$result = $conn->query($query);
?>

<div class="content-wrapper">
    <div class="container-fluid mt-5">
        <h2>>Daftar Rekomendasi Pending</h2>

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
                            <th>Aksi</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
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
                                        <a href='review_recomendation_pending.php?id_rekomendasi=" . $row['id_rekomendasi'] . "' class='btn btn-warning btn-sm'>Review</a>   
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>Tidak ada rekomendasi penting yang ditemukan.</td></tr>";
                        }

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

      setTimeout(() => {
        notification.style.opacity = '0';
        setTimeout(() => notification.remove(), 500);
      }, 3000);
    }

    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status === 'success') {
      showNotification('Data berhasil diperbaru!', 'success');
    } else if (status === 'error') {
      showNotification('Terjadi kesalahan, Data gagal diperbaru.', 'danger');
    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<?php
$conn->close();
?>
