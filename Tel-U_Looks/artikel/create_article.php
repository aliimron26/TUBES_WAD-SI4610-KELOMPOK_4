<?php
session_start(); // Memulai session

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php"); // Redirect ke halaman login jika belum login
    exit();
}

include '../db.php'; // Pastikan untuk menyertakan koneksi database

// Proses penyimpanan artikel
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image'];

    // Validasi dan sanitasi data
    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);

    // Proses upload gambar
    if ($image['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file gambar adalah gambar sebenarnya
        $check = getimagesize($image["tmp_name"]);
        if ($check === false) {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Batasi format file
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Cek jika $uploadOk adalah 0 karena error
        if ($uploadOk == 0) {
            echo "Maaf, file Anda tidak terupload.";
        } else {
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                // Simpan artikel ke database
                $sql = "INSERT INTO articles (title, content, image) VALUES ('$title', '$content', '$image[name]')";
                if ($conn->query($sql) === TRUE) {
                    header("Location: artikel.php"); // Redirect ke halaman artikel setelah berhasil
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Maaf, terjadi kesalahan saat mengupload file.";
            }
        }
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
        <div class="container-left">
            <h1>Create New Article</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="input-container">
                    <input type="text" id="title" name="title" placeholder="Article Title" class="input-field" required>
                    <textarea id="content" name="content" placeholder="Article Content" class="input-field" required></textarea>
                    <input type="file" id="image" name="image" class="input-field" required>
                </div>
                <button type="submit">Create Article</button>
            </form>
            <hr style="width: 100%; max-width: 300px; margin: 20px 0;">
            <button onclick="location.href='artikel.php'" style="background-color: #ff4d4d;">Back to Articles</button>
        </div>
        <div class="container-right">
            <img src="../assets/Logo-P.png" alt="Tel-U Looks Logo">
            <h2>Tel-U Looks: Explore, Inspire, Express</h2>
        </div>
    </div>
</body>
</html>