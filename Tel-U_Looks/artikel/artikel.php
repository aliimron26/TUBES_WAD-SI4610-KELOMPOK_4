<?php
include 'db.php';

$sql = "SELECT * FROM articles ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Artikel</title>
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

        .articles {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            width: 100%;
            justify-content: center;
        }

        .article {
            background-color: #fff;
            color: #333;
            border-radius: 5px;
            padding: 15px;
            width: 300px; /* Menetapkan lebar kotak */
            height: 300px; /* Menetapkan tinggi kotak */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            overflow: hidden; /* Mencegah konten keluar dari kotak */
            cursor: pointer; /* Menunjukkan bahwa kotak dapat diklik */
            display: flex;
            flex-direction: column; /* Mengatur konten dalam kolom */
            justify-content: flex-start; /* Menjaga elemen di atas */
        }

        .article:hover {
            transform: scale(1.02);
        }

        .article h2 {
            font-size: 1.2rem; /* Ukuran font judul */
            white-space: nowrap; /* Mencegah teks melampaui batas */
            overflow: hidden; /* Mencegah teks melampaui batas */
            text-overflow: ellipsis; /* Menambahkan elipsis jika teks terlalu panjang */
            margin-top: 10px; /* Menambahkan margin atas untuk jarak dari gambar */
        }

        img {
            width: 100%; /* Mengatur lebar gambar menjadi 100% dari kontainer */
            height: 150px; /* Menetapkan tinggi gambar */
            object-fit: cover; /* Memastikan gambar tetap dalam proporsi dan terpotong jika perlu */
            border-radius: 5px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-create {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-create:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .container-left, .container-right {
                width: 100%;
            }

            .article {
                width: 100%; /* Mengubah lebar menjadi 100% pada layar kecil */
                height: auto; /* Mengubah tinggi menjadi otomatis pada layar kecil */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container-left">
            <h1>Dashboard Artikel</h1>
            <a href="create_article.php" class="btn-create">Buat Artikel Baru</a>
        </div>
        <div class="container-right">
            <div class="articles">
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <a href="view_article.php?id=<?php echo $row['id']; ?>" class="article"> <!-- Membuat seluruh kotak dapat diklik -->
                            <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                            <h2><?php echo htmlspecialchars($row['title']); ?></h2> <!-- Judul di bawah gambar -->
                        </a>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Tidak ada artikel yang tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
