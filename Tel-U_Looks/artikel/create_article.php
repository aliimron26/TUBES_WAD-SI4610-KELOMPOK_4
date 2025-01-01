<?php
include '../Layouts/sidebar-admin.php';
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
        // Mengupload gambar
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "<script>alert('Artikel berhasil ditambahkan.'); window.location.href='manage_articles.php';</script>";
        } else {
            echo "<script>alert('Gagal mengupload gambar.');</script>";
        }
    } else {
        echo "<script>alert('Gagal menambahkan artikel.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Artikel Baru</title>
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
        <h2>Buat Artikel Baru</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-container">
                <label for="title">Judul Artikel:</label>
                <input type="text" id="title" name="title" placeholder="Masukkan judul artikel" required>
            </div>
            <div class="input-container">
                <label for="content">Isi Konten:</label>
                <textarea id="content" name="content" placeholder="Masukkan isi artikel" required></textarea>
            </div>
            <div class="input-container">
                <label for="image">Gambar:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit">Buat Artikel</button>
        </form>
        <a href="manage_articles.php" class="btn-secondary">Kembali ke Kelola Artikel</a>
    </div>
</body>
</html>