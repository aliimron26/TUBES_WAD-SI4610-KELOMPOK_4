<?php
session_start(); // Memulai session

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?> - Tel-U Looks</title>
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

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        p {
            margin: 15px 0;
        }

        .admin-actions {
            margin-top: 20px;
        }

        .edit-button, .delete-button {
            text-decoration: none;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            margin-right: 10px;
        }

        .edit-button {
            background-color: #007bff; /* Biru untuk edit */
        }

        .edit-button:hover {
            background-color: #0056b3;
        }

        .delete-button {
            background-color: red; /* Merah untuk hapus */
        }

        .delete-button:hover {
            background-color: darkred;
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
        <h1><?php echo htmlspecialchars($article['title']); ?></h1>
        <img src="uploads/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
        <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>

        <?php if (isset($_SESSION['admin_id'])): // Jika admin ?>
            <div class="admin-actions">
                <a href="edit_article.php?id=<?php echo $article['id']; ?>" class="edit-button">Edit</a>
                <a href="delete_article.php?id=<?php echo $article['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');" class="delete-button">Hapus</a>
            </div>
        <?php endif; ?>

        <button onclick="location.href='artikel.php'">Kembali ke Daftar Artikel</button>
    </div>
</body>
</html>