<?php
session_start(); // Memulai session

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php"); // Redirect ke halaman login jika belum login
    exit();
}

include '../db.php'; // Pastikan untuk menyertakan koneksi database

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
                // Update artikel ke database dengan gambar baru
                $sql = "UPDATE articles SET title = ?, content = ?, image = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssi", $title, $content, $image['name'], $id);
            } else {
                echo "Maaf, terjadi kesalahan saat mengupload file.";
            }
        }
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        .input-container {
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Article</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="input-container">
                <input type="text" id="title" name="title" placeholder="Article Title" class="input-field" value="<?php echo htmlspecialchars($article['title']); ?>" required>
                <textarea id="content" name="content" placeholder="Article Content" class="input-field" required><?php echo htmlspecialchars($article['content']); ?></textarea>
                <input type="file" id="image" name="image" class="input-field">
                <p>Current Image: <img src="uploads/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" width="100"></p>
            </div>
            <button type="submit">Update Article</button>
        </form>
        <button onclick="location.href='view_article.php?id=<?php echo $article['id']; ?>'">Kembali ke Artikel</button>
    </div>
</body>
</html>