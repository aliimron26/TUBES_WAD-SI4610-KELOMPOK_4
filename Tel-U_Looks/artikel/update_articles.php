<?php
session_start(); 

include '../Layouts/sidebar-admin.php';
include '../db.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID artikel tidak ditemukan.'); window.location.href='manage_articles.php';</script>";
    exit();
}

$id = $_GET['id'];

$query = "SELECT * FROM articles WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Artikel tidak ditemukan.'); window.location.href='manage_articles.php';</script>";
    exit();
}

$article = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $target = "assets/img/articles/" . basename($image);

    if ($image) {
        // mengupdate kalau ada gambar baru
        $query = "UPDATE articles SET title = ?, content = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $title, $content, $image, $id);
        if ($stmt->execute()) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            echo "<script>alert('Artikel berhasil diperbarui.'); window.location.href='manage_articles.php?status=success';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui artikel.');</script>";
        }
    } else {
        // mengupdate kalo ga ada gambar
        $query = "UPDATE articles SET title = ?, content = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $title, $content, $id);
        if ($stmt->execute()) {
            echo "<script>alert('Artikel berhasil diperbarui.'); window.location.href='manage_articles.php?status=success';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui artikel.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Artikel</title>
    <link href="../assets/css/style.css" rel="stylesheet"> <!-- Ganti dengan CSS Anda -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .input-container {
            margin-bottom: 15px;
        }
        .input-container label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .input-container input[type="text"],
        .input-container textarea,
        .input-container input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .input-container textarea {
            resize: vertical;
            height: 150px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .btn-secondary {
            display: inline-block;
            margin-top: 10px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }
        .btn-secondary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Artikel</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-container">
                <label for="title">Judul Artikel:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" required>
            </div>
            <div class="input-container">
                <label for="content">Isi Konten:</label>
                <textarea id="content" name="content" required><?php echo htmlspecialchars($article['content']); ?></textarea>
            </div>
            <div class="input-container">
                <label for="image">Gambar (Kosongkan jika tidak ingin mengganti):</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <button type="submit">Perbarui Artikel</button>
        </form>
        <a href="manage_articles.php" class="btn-secondary">Kembali ke Daftar Artikel</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>