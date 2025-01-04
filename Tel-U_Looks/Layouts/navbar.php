<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/navbar.css">
</head>
<body>
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
              <a class="nav-link text-white" href="../index.php" data-sound="home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../index.php" data-sound="about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../index.php" data-sound="rekomendasi">Rekomendasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../index.php" data-sound="kontak">Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../users/login_user.php" data-sound="login">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <audio id="home-sound" src="../assets/audio/home.mp3"></audio>
  <audio id="about-sound" src="../assets/audio/about.mp3"></audio>
  <audio id="rekomendasi-sound" src="../assets/audio/rekomendasi.mp3"></audio>
  <audio id="kontak-sound" src="../assets/audio/kontak.mp3"></audio>
  <audio id="login-sound" src="../assets/audio/login.mp3"></audio>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script>
    document.querySelectorAll('[data-sound]').forEach(item => {
      item.addEventListener('mouseover', () => {
        const soundId = item.getAttribute('data-sound') + '-sound';
        const audio = document.getElementById(soundId);
        if (audio) {
          audio.currentTime = 0; 
          audio.play();
        }
      });
    });
  </script>
</body>
</html>
