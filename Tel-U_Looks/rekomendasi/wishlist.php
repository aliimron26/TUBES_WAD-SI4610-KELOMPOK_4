<?php 
session_start();
include '../db.php';
include '../Layouts/main-navbar.php';

$query = "SELECT r.id_rekomendasi, r.nama_fashion, r.harga, r.image, r.deskripsi_fashion 
          FROM wishlist w
          JOIN rekomendasi r ON w.id_rekomendasi = r.id_rekomendasi";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>
        /* CSS untuk btn-share */
        .btn-share * {
            margin: 0;
            padding: 0;
        }

        .btn-share {
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto; /* Pastikan tinggi penuh */
        }

        .btn-share i {
            opacity: 0;
            font-size: 28px;
            color: #1F1E1E;
            will-change: transform;
            transform: scale(.1);
            transition: all .3s ease;
        }

        .btn-share i.fa-facebook-f {
            color: #3b5998; /* Biru khas Facebook */
        }
        
        .btn-share i.fa-twitter {
            color: #1da1f2; /* Biru khas Twitter */
        }
        
        .btn-share i.fa-instagram {
            color: #e1306c; /* Gradasi merah Instagram */
        }
        
        .btn-share i.fa-github {
            color: #333; /* Hitam khas GitHub */
        }

        .btn-share .btn_wrap {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            cursor: pointer;
            width: 240px;
            height: 72px;
            background-color:rgb(250, 250, 201);
            border-radius: 80px;
            padding: 0 18px;
            transition: all .2s ease-in-out;
        }

        .btn-share .btn_wrap:hover {
            transform: scale(1.1);
        }

        .btn-share span {
            position: absolute;
            z-index: 99;
            width: 240px;
            height: 72px;
            border-radius: 80px;
            font-family: 'Raleway', sans-serif;
            font-size: 20px;
            text-align: center;
            line-height: 70px;
            letter-spacing: 2px;
            color: #FFFFFF;
            background-color: #0a9396;
            padding: 0 18px;
            transition: all 1.2s ease;
        }

        .btn-share .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 240px;
            height: 64px;
            border-radius: 80px;
        }

        .btn-share .container i {
            transition-delay: 1.1s;
        }

        .btn-share .btn_wrap:hover span {
            transition-delay: .25s;
            transform: translateX(-280px);
        }

        .btn-share .btn_wrap:hover i {
            opacity: 1;
            transform: scale(1);
        }

        /* CSS untuk wishlist */
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

        .wishlist-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
            margin-bottom: 30px;
        }

        .wishlist-item {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .wishlist-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .wishlist-item .content {
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .wishlist-item h3 {
            font-size: 18px;
            margin: 0;
            color: #005f73;
        }

        .wishlist-item p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

        .wishlist-item .price {
            font-weight: bold;
            color: #0a9396;
        }

        .wishlist-item .actions {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .wishlist-item .actions a {
            text-decoration: none;
            color: white;
            background-color: #005f73;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .wishlist-item .actions a:hover {
            background-color: #0a9396;
        }

        .wishlist-item .stock {
            font-size: 14px;
            color: red;
        }

        .filter-sorting-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px; /* Jarak antara filter dan urutkan */
            margin-bottom: 20px;
        }

        .filters, .sorting {
            margin: 0;
        }

        .filters label, .sorting label {
            font-weight: bold;
        }
    </style>
    <title>Wishlist Rekomendasi</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Wishlist</h2>
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="Produk">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['nama_fashion']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($row['deskripsi_fashion']); ?></p>
                                <p class="card-text"><strong>Harga:</strong> Rp <?php echo htmlspecialchars($row['harga']); ?></p>
                                <button class="btn btn-danger" onclick="removeFromWishlist(<?php echo $row['id_rekomendasi']; ?>)">Hapus</button>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">Tidak ada produk dalam wishlist.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="btn-share">
        <div class="btn_wrap">
            <span>Bagikan Wishlist</span>
            <div class="container">
                <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://github.com/" target="_blank"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </div>
    <script>
        function removeFromWishlist(productId) {
            fetch('../rekomendasi/remove_from_wishlist.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ productId: productId }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Produk berhasil dihapus dari wishlist.');
                    location.reload();
                } else {
                    alert('Gagal menghapus produk.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan.');
            });
        }
    </script>
</body>
</html>

<?php include '../Layouts/footer.php';?>