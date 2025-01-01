<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Tel-U Looks Main App</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a class="logo d-flex align-items-center">
        <h1 class="sitename">Tel-U Looks</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="../artikel/artikel.php">Artikel</a></li>
          <li><a href="#product">Rekomendasi</a></li>
          <li><a href="../rekomendasi/wishlist.php">Wishlist</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" id="profileDropdown" role="button" data-bs-toggle="dropdown">
                <i class="fas fa-user"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                <li><a class="dropdown-item" href="../index.php">Keluar</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>


  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <div class="carousel-item active">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">Selamat Datang di <span>Halaman Utama Tel-U Looks</span></h2>
            <p class="animate__animated animate__fadeInUp">Anda bisa membaca artikel, lalu melihat rekomendasi fashion terkini</p>
          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- Rekomendasi Section -->
    <section id="product" class="product section ">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Rekomendasi Fashion Mahasiswa</h2>
        <p>Koleksi fashion terkini, lagi trending, dan lainnya ada disini</p>
      </div><!-- End Section Title -->

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=1">
                <img src="assets/img/gallery/produk 1.jpg" alt="Produk 1" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=2">
                <img src="assets/img/gallery/produk 2.jpg" alt="Produk 2" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=3">
                <img src="assets/img/gallery/produk 3.jpg" alt="Produk 3" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=4">
                <img src="assets/img/gallery/produk 4.jpeg" alt="Produk 4" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=5">
                <img src="assets/img/gallery/produk 5.jpg" alt="Produk 5" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=6">
                <img src="assets/img/gallery/produk 6.jpg" alt="Produk 6" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=7">
                <img src="assets/img/gallery/produk 7.jpeg" alt="Produk 7" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=8">
                <img src="assets/img/gallery/produk 8.jpg" alt="Produk 8" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->
          <!--section id="call-to-action" class="call-to-action section dark-background" style="margin-bottom: 50px;">
          <div class="container">
            <div class="row justify-content-center aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
              <div class="col-xl-10">
                <div class="text-center">
                  <a href="#" class="cta-btn">More Recommendations</a>
                </div>
              </div>
            </div>
          </div>
          </section-->
          
        </div>

      </div>

    </section><!-- /Rekomendasi Section -->
    
    <!-- Rekomendasi Section -->
    <section id="product" class="product section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Rekomendasi Fashion Dosen</h2>
        <p>Koleksi fashion terkini, lagi trending, dan lainnya ada disini</p>
      </div><!-- End Section Title -->

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=1">
                <img src="assets/img/gallery/produk 1.jpg" alt="Produk 1" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=2">
                <img src="assets/img/gallery/produk 2.jpg" alt="Produk 2" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=3">
                <img src="assets/img/gallery/produk 3.jpg" alt="Produk 3" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=4">
                <img src="assets/img/gallery/produk 4.jpeg" alt="Produk 4" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=5">
                <img src="assets/img/gallery/produk 5.jpg" alt="Produk 5" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=6">
                <img src="assets/img/gallery/produk 6.jpg" alt="Produk 6" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=7">
                <img src="assets/img/gallery/produk 7.jpeg" alt="Produk 7" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="rekomendasi/detail_after_login.php?id=8">
                <img src="assets/img/gallery/produk 8.jpg" alt="Produk 8" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->
          <!--section id="call-to-action" class="call-to-action section dark-background" style="margin-bottom: 50px;">
          <div class="container">
            <div class="row justify-content-center aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
              <div class="col-xl-10">
                <div class="text-center">
                  <a href="#" class="cta-btn">More Recommendations</a>
                </div>
              </div>
            </div>
          </div>
          </section-->
          
        </div>

      </div>

    </section><!-- /Rekomendasi Section -->
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
      <div class="container">
        <div class="copyright">
          <span>Copyright</span> <strong class="px-1 sitename">Tel-U Looks</strong> <span>All Rights Reserved</span>
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
          Designed by <a href="https://bootstrapmade.com/">Kelompok 4</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>