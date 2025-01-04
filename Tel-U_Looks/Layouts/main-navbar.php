<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/navbar.css">
</head>
<body>
  <!-- Header Section -->
  <header>
    <nav class="navbar navbar-expand-lg custom-navbar">
      <div class="container">
        <a class="navbar-brand text-white">TEL-U LOOKS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link text-white" href="../Layouts/app.php" data-sound="home">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" id="filterDropdown" role="button" data-bs-toggle="dropdown" data-sound="filter">Filter</a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown">
                <li><a class="dropdown-item" href="#" data-sound="mahasiswa">Mahasiswa</a></li>
                <li><a class="dropdown-item" href="#" data-sound="dosen">Dosen</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link text-white" href="../artikel/artikel.php" data-sound="artikel">Artikel</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#" data-sound="rekomendasi">Rekomendasi</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="../rekomendasi/wishlist.php" data-sound="wishlist">Wishlist</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" id="profileDropdown" role="button" data-bs-toggle="dropdown" data-sound="profile">
                <i class="fas fa-user"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="#" data-sound="profil">Profil</a></li>
                <li><a class="dropdown-item" href="#" data-sound="pengaturan">Pengaturan</a></li>
                <li><a class="dropdown-item" href="../index.php" data-sound="keluar">Keluar</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Audio Elements -->
  <audio id="home-sound" src="../assets/audio/home.mp3"></audio>
  <audio id="filter-sound" src="../assets/audio/filter.mp3"></audio>
  <audio id="mahasiswa-sound" src="../assets/audio/mahasiswa.mp3"></audio>
  <audio id="dosen-sound" src="../assets/audio/dosen.mp3"></audio>
  <audio id="artikel-sound" src="../assets/audio/artikel.mp3"></audio>
  <audio id="rekomendasi-sound" src="../assets/audio/rekomendasi.mp3"></audio>
  <audio id="wishlist-sound" src="../assets/audio/wishlist.mp3"></audio>
  <audio id="profile-sound" src="../assets/audio/profile.mp3"></audio>
  <audio id="profil-sound" src="../assets/audio/profil.mp3"></audio>
  <audio id="pengaturan-sound" src="../assets/audio/pengaturan.mp3"></audio>
  <audio id="keluar-sound" src="../assets/audio/keluar.mp3"></audio>

  <!-- Bootstrap and JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script>
    // Add sound effect on hover
    document.querySelectorAll('[data-sound]').forEach(item => {
      item.addEventListener('mouseover', () => {
        const soundId = item.getAttribute('data-sound') + '-sound';
        const audio = document.getElementById(soundId);
        if (audio) {
          audio.currentTime = 0; // Reset audio playback to the beginning
          audio.play();
        }
      });
    });
  </script>
</body>
</html>
