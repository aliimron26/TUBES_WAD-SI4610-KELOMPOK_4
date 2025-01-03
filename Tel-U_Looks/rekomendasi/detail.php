<?php
// Include file koneksi database
include '../db.php';

// Cek apakah ada ID yang diberikan di URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Ambil ID dari URL
    $id_rekomendasi = $_GET['id'];

    // Persiapkan query untuk mengambil data berdasarkan ID
    $query = "SELECT id_rekomendasi, nama_fashion, deskripsi_fashion, harga, link_affiliate_shopee, 
              link_affiliate_tokopedia, link_affiliate_lazada, image, status, kategori 
              FROM rekomendasi WHERE id_rekomendasi = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameter dan eksekusi query
    mysqli_stmt_bind_param($stmt, 'i', $id_rekomendasi);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Jika data ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Ambil data dan sanitasi untuk output HTML
        $nama_fashion = htmlspecialchars($row['nama_fashion']);
        $deskripsi_fashion = htmlspecialchars($row['deskripsi_fashion']);
        $harga = number_format($row['harga'], 0, ',', '.');
        $link_shopee = htmlspecialchars($row['link_affiliate_shopee']);
        $link_tokopedia = htmlspecialchars($row['link_affiliate_tokopedia']);
        $link_lazada = htmlspecialchars($row['link_affiliate_lazada']);
        $image = htmlspecialchars($row['image']);
        $status = htmlspecialchars($row['status']);
        $kategori = htmlspecialchars($row['kategori']);
    } else {
        echo "Data tidak ditemukan!";
        exit();
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    echo "ID tidak valid!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Detail - <?= $nama_fashion; ?> | Tel-U Looks</title>

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a class="logo d-flex align-items-center">
        <h1 class="sitename">Tel-U Looks</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="../index.php">Home</a></li>
          <li><a href="../index.php#about">Tentang</a></li>
          <li><a href="../index.php#product">Rekomendasi</a></li>
          <li><a href="../index.php#contact">Kontak</a></li>
          <li><a href="../users/login_user.php">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Detail Section -->
    <section class="detail section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="../assets/rekomendasi/<?= $image; ?>" alt="<?= $nama_fashion; ?>" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2><?= $nama_fashion; ?></h2>
            <p><strong>Deskripsi:</strong> <?= $deskripsi_fashion; ?></p>
            <p><strong>Harga:</strong> Rp <?= $harga; ?></p>
            <p><strong>Kategori:</strong> <?= $kategori; ?></p>
            <p><strong>Status:</strong> <?= $status; ?></p>
            
            <!-- Links ke Affiliate -->
            <p><strong>Beli Sekarang:</strong></p>
            <?php if ($link_shopee) : ?>
              <a href="<?= $link_shopee; ?>" target="_blank" class="btn btn-success">Shopee</a>
            <?php endif; ?>
            <?php if ($link_tokopedia) : ?>
              <a href="<?= $link_tokopedia; ?>" target="_blank" class="btn btn-warning">Tokopedia</a>
            <?php endif; ?>
            <?php if ($link_lazada) : ?>
              <a href="<?= $link_lazada; ?>" target="_blank" class="btn btn-danger">Lazada</a>
            <?php endif; ?>
            
            <a href="../index.php#product" class="btn btn-primary">Kembali ke Rekomendasi</a>
          </div>
        </div>
      </div>
    </section><!-- /Detail Section -->

  </main>

  <footer id="footer" class="footer light-background">
    <div class="container">
      <h3 class="sitename">Tel-U Looks</h3>
      <p>Explore, Inspire, Express</p>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-skype"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
