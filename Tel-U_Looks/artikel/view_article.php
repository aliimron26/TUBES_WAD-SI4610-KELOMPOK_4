<?php
session_start(); 
include '../Layouts/main-navbar.php';
include '../db.php'; 

if (!isset($_GET['id'])) {
    echo "<script>alert('ID artikel tidak ditemukan.'); window.location.href='artikel.php';</script>";
    exit();
}

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<main class="main">
    <section class="article-detail section">
        <div class="container">
            <h2><?php echo htmlspecialchars($article['title']); ?></h2>
            <?php if (!empty($article['image'])): ?>
                <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="img-fluid">
            <?php endif; ?>
            <div class="article-content">
                <?php echo $article['content'];?>
            </div>
            <p><strong>Diterbitkan pada:</strong> <?php echo htmlspecialchars($article['created_at']); ?></p>
        </div>
    </section>
</main>

<?php include '../Layouts/footer.php'; ?>

</body>
</html>

<?php
$conn->close();
?>