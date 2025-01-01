<?php
session_start();
include '../db.php'; // Koneksi database
include '../Layouts/navbar.php'; // Memasukkan Header

// Cek apakah admin sudah login
if (!isset($_SESSION['id_admin'])) {
    header("Location: login_admin.php");
    exit();
}

// Proses pembuatan artikel
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image'];

    // Validasi dan sanitasi data
    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);

    // Proses upload gambar
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image["name"]);
    move_uploaded_file($image["tmp_name"], $target_file);

    // Simpan artikel ke database
    $sql = "INSERT INTO articles (title, content, image, id_admin) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $title, $content, $image['name'], $_SESSION['admin_id']);

    if ($stmt->execute()) {
        header("Location: index.php"); // Redirect ke halaman index setelah berhasil
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
    <title>Create Article - Tel-U Looks</title>
    <link href="../assets/css/login_register.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Create Article</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Article Title" required>
            <textarea name="content" placeholder="Article Content" required></textarea>
            <input type="file" name="image" required>
            <button type="submit">Create Article</button>
        </form>
        <button onclick="location.href='index.php'">Kembali</button>
    </div>
</body>
</html>

<?php include '../Layouts/footer.php'; // Memasukkan Footer ?>
