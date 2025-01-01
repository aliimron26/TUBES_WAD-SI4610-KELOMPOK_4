<?php
session_start();
include '../db.php'; // Koneksi database
include '../Layouts/main-navbar.php'; // Memasukkan Header

// Cek apakah ID artikel diterima
if (!isset($_GET['id'])) {
    echo "ID artikel tidak ditentukan.";
    exit();
}

$id = $_GET['id'];

// Mengambil data artikel dari database
$sql = "SELECT a.*, ad.nama AS admin_name FROM articles a LEFT JOIN admin ad ON a.id_admin = ad.id_admin WHERE a.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Artikel tidak ditemukan.";
    exit();
}

$article = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?> - Tel-U Looks</title>
    <link href="../assets/css/login_register.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($article['title']); ?></h1>
        <img src="uploads/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
        <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
        <p>Published on: <?php echo $article['created_at']; ?> by <?php echo htmlspecialchars($article['admin_name']); ?></p>

        <?php if (isset($_SESSION['admin_id'])): // Jika admin ?>
            <div class="admin-actions">
                <a href="update_article.php?id=<?php echo $article['id']; ?>" class="edit-button">✏️ Edit</a>
                <a href="delete_article.php?id=<?php echo $article['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');" class="delete-button">🗑️ Hapus</a>
            </div>
        <?php endif; ?>

        <button onclick="location.href='index.php'">Kembali ke Daftar Artikel</button>
    </div>
</body>
</html>

<?php include '../Layouts/footer.php'; // Memasukkan Footer ?>
