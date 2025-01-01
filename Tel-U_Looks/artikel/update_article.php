<?php
session_start();
include '../db.php'; // Koneksi database
include '../Layouts/main-navbar.php'; // Memasukkan Header

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit();
}

// Cek apakah ID artikel diterima
if (!isset($_GET['id'])) {
    echo "ID artikel tidak ditentukan.";
    exit();
}

$id = $_GET['id'];

// Mengambil data artikel dari database
$sql = "SELECT * FROM articles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Artikel tidak ditemukan.";
    exit();
}

$article = $result->fetch_assoc();

// Proses pembaruan artikel
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image'];

    // Validasi dan sanitasi data
    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);

    // Proses upload gambar jika ada
    if ($image['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image["name"]);
        move_uploaded_file($image["tmp_name"], $target_file);

        // Update artikel ke database dengan gambar baru
        $sql = "UPDATE articles SET title = ?, content = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $title, $content, $image['name'], $id);
    } else {
        // Update artikel ke database tanpa mengubah gambar
        $sql = "UPDATE articles SET title = ?, content = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $content, $id);
    }

    if ($stmt->execute()) {
        header("Location: view_article.php?id=" . $id); // Redirect ke halaman detail artikel setelah berhasil
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Article - Tel-U Looks</title>
    <link href="../assets/css/login_register.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Update Article</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" required>
            <textarea name="content" required><?php echo htmlspecialchars($article['content']); ?></textarea>
            <input type="file" name="image">
            <p>Current Image: <img src="uploads/<?php echo htmlspecialchars($article['image']); ?>" width="100"></p>
            <button type="submit">Update Article</button>
        </form>
        <button onclick="location.href='view_article.php?id=<?php echo $article['id']; ?>'">Kembali</button>
    </div>
</body>
</html>

<?php include '../Layouts/footer.php'; // Memasukkan Footer ?>
