<?php 
include '../Layouts/navbar.php'; 
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #005f73;
            margin: 20px 0;
        }

        .article-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 800px;
            margin: auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .article-container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .article-content {
            margin-top: 20px;
            color: #333;
        }

        .article-content p {
            font-size: 16px;
            line-height: 1.5;
        }

        .article-footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .btn-back, .edit-button, .delete-button {
            text-decoration: none;
            color: white;
            background-color: #005f73;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-back:hover, .edit-button:hover, .delete-button:hover {
            background-color: #0a9396;
        }

        .delete-button {
            background-color: red;
        }

        .delete-button:hover {
            background-color: darkred;
        }

        .btn-share {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .btn-share i {
            font-size: 28px;
            margin: 0 10px;
            color: #1F1E1E;
            transition: transform 0.3s;
        }

        .btn-share i:hover {
            transform: scale(1.2);
        }
    </style>
    <title><?php echo htmlspecialchars($article['title']); ?></title>
</head>
<body>

    <div class="article-container">
        <h1><?php echo htmlspecialchars($article['title']); ?></h1>
        <img src="uploads/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
        
        <div class="article-content">
            <p><?php echo $article['content']; ?></p>
        </div>
        
        <p><small><?php echo htmlspecialchars($article['created_at']); ?></small></p>

        <div class="article-footer">
            <a href="update_article.php?id=<?php echo $article['id']; ?>" class="edit-button">
                <i class="fas fa-pencil-alt"></i> Edit
            </a>

            <form action="delete_article.php" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                <button type="submit" class="delete-button">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </form>
        </div>

        <div class="btn-share">
            <a href="javascript:void(0);" onclick="shareArticle('<?php echo htmlspecialchars($article['title']); ?>')">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-github"></i>
            </a>
        </div>

        <a href="artikel.php" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <script>
        function shareArticle(title) {
            alert("Bagikan artikel: " + title);
        }
    </script>

</body>
</html>

<?php include '../Layouts/footer.php'; ?>