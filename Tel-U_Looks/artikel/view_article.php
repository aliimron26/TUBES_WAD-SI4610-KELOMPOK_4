<?php
include '../Layouts/main-navbar.php';
include '../db.php'; // Menghubungkan ke database

// Cek apakah ID artikel ada di URL
if (!isset($_GET['id'])) {
    echo "<script>alert('ID artikel tidak ditemukan.'); window.location.href='artikel.php';</script>";
    exit();
}

$id = $_GET['id'];

// Mengambil data artikel dari database
$query = "SELECT * FROM articles WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

// Cek apakah artikel ditemukan
if (!$article) {
    echo "<script>alert('Artikel tidak ditemukan.'); window.location.href='artikel.php';</script>";
    exit();
}
?>

<main class="main">
    <section class="article-detail section">
        <div class="container">
            <h2><?php echo htmlspecialchars($article['title']); ?></h2>
            <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="img-fluid">
            <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
            <p><strong>Diterbitkan pada:</strong> <?php echo htmlspecialchars($article['created_at']); ?></p>
            <?php if (isset($_SESSION['admin_id'])): ?>
                <a href="update_articles.php?id=<?php echo $article['id']; ?>" class="btn btn-warning">Edit Artikel</a>
                <a href="delete_articles.php?id=<?php echo $article['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">Hapus Artikel</a>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include '../Layouts/footer.php'; ?>