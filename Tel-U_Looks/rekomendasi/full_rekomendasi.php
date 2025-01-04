<?php
include '../Layouts/main-navbar.php';
include '../db.php'; 

// Cek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data rekomendasi tanpa urutan berdasarkan created_at
$query = "SELECT * FROM rekomendasi"; // Hapus ORDER BY created_at DESC
$result = $conn->query($query);
?>

<main class="main">
    <section id="rekomendasi" class="rekomendasi section">
        <div class="container">
            <!-- Tombol +Recommendation di kanan atas -->
            <div class="d-flex justify-content-end mb-4">
                <a href="../users/Add_recomendation_user.php" class="btn btn-primary">+Recommendation</a>
            </div>

            <h2>Daftar Rekomendasi Fashion</h2>
            <div class="row">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($rekomendasi = $result->fetch_assoc()): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="rekomendasi-item">
                                <?php if (!empty($rekomendasi['image'])): ?>
                                    <img src="<?php echo '../assets/rekomendasi/' . htmlspecialchars($rekomendasi['image']); ?>" alt="<?php echo htmlspecialchars($rekomendasi['nama_fashion']); ?>" class="img-fluid">
                                <?php else: ?>
                                    <img src="../assets/img/default-image.png" alt="Default Image" class="img-fluid">
                                <?php endif; ?>
                                <h3><?php echo htmlspecialchars($rekomendasi['nama_fashion']); ?></h3>
                                <p><?php echo htmlspecialchars(substr($rekomendasi['deskripsi_fashion'], 0, 100)) . '...'; ?></p>
                                <p><strong>Harga: </strong>Rp <?php echo number_format($rekomendasi['harga'], 0, ',', '.'); ?></p>
                                
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="badge badge-primary"><?php echo htmlspecialchars($rekomendasi['kategori']); ?></span>
                                    <span class="badge badge-secondary"><?php echo htmlspecialchars($rekomendasi['status']); ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="detail_rekomendasi_mahasiswa.php?id=<?php echo $rekomendasi['id_rekomendasi']; ?>" class="btn btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Rekomendasi tidak ditemukan.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php
include '../Layouts/footer.php';
?>
