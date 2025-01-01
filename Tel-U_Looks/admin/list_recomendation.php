<?php
// Memasukkan Header
include '../Layouts/sidebar-admin.php';

// Koneksi ke database
include '../db.php'; // Pastikan path ini benar

// Query untuk mendapatkan semua data pengguna
$query = "SELECT id_rekomendasi, nama_fashion, deskripsi_fashion, harga, kategori, link_affiliate_shopee, link_affiliate_tokopedia, link_affiliate_lazada FROM rekomendasi";
$result = $conn->query($query);
?>

<!-- Konten Utama untuk Menampilkan Daftar Pengguna -->
<div class="content-wrapper">
    <div class="container-fluid mt-5">
        <h2>Daftar Rekomendasi</h2>

        <!-- Tabel Menampilkan Data Pengguna -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
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
                                        <a href='update.php?id_rekomendasi=" . $row['id_rekomendasi'] . "' class='btn btn-warning btn-sm'>Update</a>
                                        <a href='delete.php?id_rekomendasi=" . $row['id_rekomendasi'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>Tidak ada rekomendasi yang ditemukan.</td></tr>";
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

<?php
// Menutup koneksi database
$conn->close();
?>
