<?php
include '../Layouts/main-navbar.php';
include '../db.php'; // Menghubungkan ke database

// Mengambil artikel dari database
$query = "SELECT * FROM articles ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<main class="main">
    <section id="articles" class="articles section">
        <div class="container">
            <h2>Daftar Artikel</h2>
            <div class="row">
                <?php while ($article = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="article-item">
                            <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="img-fluid">
                            <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                            <p><?php echo htmlspecialchars(substr($article['content'], 0, 100)) . '...'; ?></p>
                            <div class="d-flex justify-content-between">
                                <a href="view_article.php?id=<?php echo $article['id']; ?>" class="btn btn-primary">Baca Selengkapnya</a>
                                <!-- Tombol Edit dan Hapus dihilangkan -->
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- Tombol Buat Artikel Baru dihilangkan -->
        </div>
    </section>
</main>

<?php
include '../Layouts/footer.php'; // Pastikan footer diinclude
?>