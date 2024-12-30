<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        .delete-button {
            background-color: red; 
            color: white; 
            border: none; 
            padding: 10px 15px; 
            border-radius: 5px; 
            cursor: pointer;
            font-size: 20px; 
            transition: background-color 0.3s; 
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px; /* Menambahkan margin bawah untuk jarak */
        }
        .delete-button:hover {
            background-color: darkred; 
        }
        .btn-back {
            display: inline-block;
            text-decoration: none; 
            background-color: #29313e;
            color: white;
            padding: 10px; /* Padding disesuaikan untuk tombol kotak */
            border-radius: 5px; 
            transition: background-color 0.3s; 
            margin-bottom: 10px; /* Menambahkan margin bawah untuk jarak */
        }
        .btn-back:hover {
            background-color: blue; 
        }
        .edit-button {
            background-color: #007bff; /* Warna tombol edit */
            color: white; 
            border: none; 
            padding: 5px; /* Padding lebih kecil untuk tombol kotak */
            border-radius: 5px; 
            cursor: pointer;
            font-size: 16px; /* Ukuran font lebih kecil */
            transition: background-color 0.3s; 
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 5px; /* Menambahkan margin bawah untuk jarak */
            width: 40px; /* Lebar tombol edit */
            height: 40px; /* Tinggi tombol edit */
            text-align: center; /* Menyelaraskan teks di tengah */
        }
        .edit-button:hover {
            background-color: #0056b3; /* Warna saat hover */
        }
        .edit-button i {
            font-size: 16px; /* Ukuran ikon */
        }
        .btn-back i {
            font-size: 20px; /* Ukuran ikon panah */
        }
    </style>
</head>
<body>
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <img src="uploads/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
    
    <!-- Menampilkan konten dengan format HTML -->
    <div>
        <?php echo $article['content']; ?>
    </div>
    
    <p><small><?php echo htmlspecialchars($article['created_at']); ?></small></p>

    <!-- Tombol Edit hanya dengan ikon pensil -->
    <a href="update_article.php?id=<?php echo $article['id']; ?>" class="edit-button">
        <i class="fas fa-pencil-alt"></i>
    </a>

    <!-- Tombol Hapus -->
    <form action="delete_article.php" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
        <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
        <button type="submit" class="delete-button">
            <i class="fas fa-trash"></i>
        </button>
    </form>

    <!-- Tombol Kembali ke Dashboard dengan ikon panah -->
    <a href="artikel.php" class="btn-back">
        <i class="fas fa-arrow-left"></i>
    </a>

</body>
</html>