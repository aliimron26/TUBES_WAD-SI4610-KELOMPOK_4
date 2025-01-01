<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/sidebar.css">
</head>
<body>
  <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
  <div class="sidebar" id="sidebar">
    <div>
      <h4>TEL-U LOOKS</h4>
      <hr>
      <a href="../admin/list_recomendation.php"><i class="bi bi-list-ul"></i> <span>Daftar Rekomendasi</span></a>
      <a href="../admin/Add_recomendation_admin.php"><i class="bi bi-plus-square"></i> <span>Tambah Rekomendasi</span></a>
      <a href="../admin/verify_recomendation_user.php"><i class="bi bi-hourglass-split"></i> <span>Rekomendasi Pending</span></a>
      <a href="../admin/list_users.php" class="active"><i class="bi bi-people"></i> <span>Daftar Pengguna</span></a>
      <a href="../artikel/create_article.php"><i class="bi bi-file-earmark-plus"></i> <span>Tambah Artikel</span></a>
      <a href="../artikel/manage_articles.php"><i class="bi bi-folder"></i> <span>Kelola Artikel</span></a>
    </div>
    <a href="../admin/login_admin.php" class="logout"><i class="bi bi-box-arrow-right"></i> <span>Keluar</span></a>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('collapsed');
    }
  </script>
</body>
</html>
