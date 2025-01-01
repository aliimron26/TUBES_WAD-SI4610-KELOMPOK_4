<?php
include '../Layouts/main-navbar.php';
include '../db.php'; // Menghubungkan ke database

$id = $_GET['id'];
$query = "SELECT * FROM articles WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

if (!$article) {
    echo "<script>alert('Artikel tidak ditemukan.'); window.location.href='artikel.php';</script>";
    exit();
}
?>

<main class="main">
    <section class="article-detail section">
        <div class="container">
            <h2><?php echo $article['title']; ?></h2>
            <img src="<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>" class="img-fluid">
            <p><?php echo $article['content']; ?></p>
            <p><strong>Diterbitkan pada:</strong> <?php echo $article['created_at']; ?></p>
            <a href="update_article.php?id=<?php echo $article['id']; ?>" class="btn btn-warning">Edit Artikel</a>
            <a href="delete_article.php?id=<?php echo $article['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">Hapus Artikel</a>
        </div>
    </section>
</main>

<?php include '../Layouts/footer.php'; ?>