<?php
include '../Layouts/sidebar-admin.php';

$status = isset($_GET['status']) ? $_GET['status'] : '';

include '../db.php';

$query = "SELECT * FROM articles";
$result = $conn->query($query);
?>

<div class="content-wrapper">
    <div class="container-fluid mt-5">
        <h2>Manage Articles</h2>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Judul Artikel</th>
                            <th>Isi Konten</th>
                            <th>Gambar</th>
                            <th>Aksi</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // cek apakah ada hasil query
                        if ($result->num_rows > 0) {
                            // menampilkan baris artikel
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                echo "<td>" . htmlspecialchars(substr($row['content'], 0, 50)) . "...</td>";
                                echo "<td><img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['title']) . "' style='width: 100px;'></td>";
                                echo "<td>
                                        <a href='update_articles.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Update</a>
                                        <a href='delete_articles.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>       
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Tidak ada artikel yang ditemukan.</td></tr>";
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
        showNotification('Data berhasil diperbarui!', 'success');
    } else if (status === 'terhapus') {
        showNotification('Data berhasil dihapus!', 'success');
    } else if (status === 'error') {
        showNotification('Terjadi kesalahan, Data gagal diperbarui.', 'danger');
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<?php
$conn->close();
?>