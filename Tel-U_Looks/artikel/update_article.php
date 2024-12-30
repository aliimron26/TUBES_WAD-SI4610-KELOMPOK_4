<?php
include 'db.php';

// Cek apakah ID artikel disediakan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data artikel dari database
    $sql = "SELECT * FROM articles WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $article = $result->fetch_assoc();
    } else {
        echo "Artikel tidak ditemukan.";
        exit();
    }
} else {
    echo "ID artikel tidak ditentukan.";
    exit();
}

// Proses pembaruan artikel
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image'];

    // Validasi dan sanitasi data
    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);

    // Proses upload gambar jika ada gambar baru
    if ($image['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file gambar adalah gambar sebenarnya
        $check = getimagesize($image["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
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
                // Update data artikel dengan gambar baru
                $sql = "UPDATE articles SET title='$title', content='$content', image='$image[name]' WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    header("Location: artikel.php"); // Mengarahkan ke artikel.php
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Maaf, terjadi kesalahan saat mengupload file.";
            }
        }
    } else {
        // Jika tidak ada gambar baru, hanya update judul dan konten
        $sql = "UPDATE articles SET title='$title', content='$content' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: artikel.php"); // Mengarahkan ke artikel.php
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            flex: 1;
            width: 100%;
            padding: 20px;
        }

        .container-left {
            width: 35%;
            background-color: #f9f9f9;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container-right {
            width: 65%;
            background-color: #29313e;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #007bff;
        }

        .input-container {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .input-field {
            border: none;
            border-bottom: 1px solid #ccc;
            background: none;
            padding: 10px 0;
            font-size: 14px;
            margin-bottom: 15px;
            color: white; /* Mengubah warna tulisan menjadi putih */
            outline: none;
        }

        .input-field::placeholder {
            color: #bbb;
        }

        .editor {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            min-height: 150px; /* Tinggi minimum untuk editor */
            background-color: #fff;
            color: #333;
            margin-bottom: 15px;
            overflow-y: auto; /* Scroll jika konten lebih dari tinggi */
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            max-width: 300px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-kembali {
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .container-left, .container-right {
                width: 100%;
            }
        }
    </style>
    <script>
        function confirmUpdate() {
            return confirm("Apakah Anda ingin mengubah artikel?");
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="container-left">
            <h1>Edit Artikel</h1>
            <a href="artikel.php" class="btn-kembali" onclick="return confirm('Apakah Anda yakin ingin keluar dari edit artikel?');">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="container-right">
            <form action="update_article.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirmUpdate();">
                <div class="input-container">
                    <input type="text" id="title" name="title" class="input-field" placeholder="Judul" value="<?php echo htmlspecialchars($article['title']); ?>" required>
                    
                    <div id="editor" class="editor" contenteditable="true" placeholder="Tulis konten di sini..."><?php echo htmlspecialchars($article['content']); ?></div>
                    <input type="hidden" name="content" id="content">
                    <input type="file" id="image" name="image" accept="image/*">
                    <button type="submit" onclick="document.getElementById('content').value = document.getElementById('editor').innerHTML;">Perbarui Artikel</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>