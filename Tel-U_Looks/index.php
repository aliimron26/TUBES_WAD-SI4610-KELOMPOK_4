<?php
// Include file koneksi database
include 'db.php';

// Query untuk mendapatkan data rekomendasi
$query = "SELECT id_rekomendasi, nama_fashion, image FROM rekomendasi";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Welcome to Tel-U Looks</title>
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
            <li><a href="#hero" class="active" data-sound="home">Home</a></li>
            <li><a href="#about" data-sound="about">Tentang</a></li>
            <li><a href="#product" data-sound="rekomendasi">Rekomendasi</a></li>
            <li><a href="#contact" data-sound="kontak">Kontak</a></li>
            <li><a href="users/login_user.php" data-sound="login">Login</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>
  </header>

  <!-- Audio Elements -->
  <audio id="home-sound" src="assets/audio/home.mp3"></audio>
  <audio id="about-sound" src="assets/audio/about.mp3"></audio>
  <audio id="rekomendasi-sound" src="assets/audio/rekomendasi.mp3"></audio>
  <audio id="kontak-sound" src="assets/audio/kontak.mp3"></audio>
  <audio id="login-sound" src="assets/audio/login.mp3"></audio>

<!-- JavaScript for Sound Effect -->
<script>
  // Add sound effect on hover
  document.querySelectorAll('[data-sound]').forEach(item => {
    item.addEventListener('mouseover', () => {
      const soundId = item.getAttribute('data-sound');
      const sound = document.getElementById(soundId + '-sound');
      if (sound) {
        sound.play();
      }
    });
  });
</script>



  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <div class="carousel-item active">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Our Tel-U Looks</span></h2>
            <p class="animate__animated animate__fadeInUp">Tel-U Looks: Explore, Inspire, Express</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>

      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row position-relative">

          <div class="col-lg-6 about-img" data-aos="zoom-in" data-aos-delay="200">
            <img src="assets/Logo-B.png">
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <h2 class="inner-title">Tel-U Looks</h2>
            <div class="our-story">
              <h4>Est 2024</h4>
              <h3>Our Story</h3>
              <p>Tel-U Looks adalah sebuah platform berbasis web yang dirancang untuk memenuhi kebutuhan informasi dan inspirasi fashion bagi mahasiswa dan dosen di lingkungan akademik. Website ini berfungsi sebagai:</p>
              <ul>
                <li><i class="bi bi-check-circle"></i> <span>Pusat informasi gaya busana terkini</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Menampilkan berita-berita terkait fashion baik di skala nasional maupun internasional</span></li>
              </ul>
              <p>Dengan fitur-fitur yang interaktif, Tel-U Looks bertujuan untuk memberikan pengalaman yang personal dan informatif bagi penggunanya, baik mereka yang hanya sekedar melihat-lihat rekomendasi maupun yang ingin lebih berkontribusi, seperti membuat review atau menyimpan rekomendasi di wishlist.</p>

            </div>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <section id="product" class="product section">
      <div class="container section-title">
        <h2>Rekomendasi Fashion</h2>
        <p>Koleksi fashion terkini, lagi trending, dan lainnya ada disini</p>
      </div>

      <div class="container-fluid">
        <div class="row g-0">
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="rekomendasi/detail.php?id=<?= $row['id_rekomendasi']; ?>">
                  <img src="assets/rekomendasi/<?= $row['image']; ?>" alt="<?= $row['nama_fashion']; ?>" class="img-fluid">
                </a>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section" style="margin-top: 50px;">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Ingin mengetahui lebih lanjut seputar fashion? Isi data diri dibawah ini</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Alamat</h3>
                <p>Jl. Telekomunikasi No. 1, Bandung Terusan Buahbatu - Bojongsoang, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Hubungi Kami</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Kami</h3>
                <p>Looks@mail.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="contact/send_message.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

              <div class="col-md-12">
                  <input type="text" class="form-control" name="Nama" placeholder="Nama" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

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