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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $target = "assets/img/articles/" . basename($image);

    if ($image) {
        // Update dengan gambar baru
        $query = "UPDATE articles SET title = ?, content = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $title, $content, $image, $id);
        if ($stmt->execute()) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            echo "<script>alert('Artikel berhasil diperbarui.'); window.location.href='artikel.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui artikel.');</script>";
        }
    } else {
        // Update tanpa mengganti gambar
        $query = "UPDATE articles SET title = ?, content = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $title, $content, $id);
        if ($stmt->execute()) {
            echo "<script>alert('Artikel berhasil diperbarui.'); window.location.href='artikel.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui artikel.');</script>";
        }
    }
}
?>

<main class="main">
    <section class="update-article section">
        <div class="container">
            <h2>Perbarui Artikel</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" value="<?php echo $article['title']; ?>" required>
                <textarea name="content" required><?php echo $article['content']; ?></textarea>
                <input type="file" name="image">
                <button type="submit">Perbarui Artikel</button>
            </form>
        </div>
    </section>
</main>

<?php include '../Layouts/footer.php'; ?>