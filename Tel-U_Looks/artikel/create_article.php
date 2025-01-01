<?php
include '../Layouts/main-navbar.php';
include '../db.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $target = "assets/img/articles/" . basename($image);

    // Menyimpan artikel ke database
    $query = "INSERT INTO articles (title, content, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $title, $content, $image);
    if ($stmt->execute()) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        echo "<script>alert('Artikel berhasil ditambahkan.'); window.location.href='artikel.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan artikel.');</script>";
    }
}
?>

<main class="main">
    <section class="create-article section">
        <div class="container">
            <h2>Buat Artikel Baru</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Judul Artikel" required>
                <textarea name="content" placeholder="Isi Artikel" required></textarea>
                <input type="file" name="image" required>
                <button type="submit">Buat Artikel</button>
            </form>
        </div>
    </section>
</main>

<?php include '../Layouts/footer.php'; ?>