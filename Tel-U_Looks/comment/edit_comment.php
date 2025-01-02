<?php
session_start();
include('db.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php"); // Jika belum login, arahkan ke halaman login
    exit();
}

// Pastikan ada id_komentar yang dikirim melalui URL
if (!isset($_GET['id_komentar'])) {
    echo "ID komentar tidak ditemukan.";
    exit();
}

$id_komentar = $_GET['id_komentar']; // ID komentar yang ingin diupdate

// Ambil komentar yang akan diedit berdasarkan id_komentar
$sql = "SELECT * FROM komentar WHERE id_komentar = '$id_komentar'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $komentar = mysqli_fetch_assoc($result);

    // Cek apakah komentar tersebut milik pengguna yang sedang login
    if ($komentar['id_user'] != $_SESSION['id_user']) {
        echo "Anda tidak memiliki izin untuk mengedit komentar ini.";
        exit();
    }

    // Jika komentar milik pengguna, tampilkan formulir untuk mengedit
    $isi_komentar = $komentar['isi_komentar'];
} else {
    echo "Komentar tidak ditemukan.";
    exit();
}

// Proses update ketika formulir disubmit
if (isset($_POST['update_review'])) {
    $new_isi_komentar = mysqli_real_escape_string($conn, $_POST['isi_komentar']);  // Komentar yang diperbarui

    // Update komentar di database
    $sql_update = "UPDATE komentar SET isi_komentar = '$new_isi_komentar' WHERE id_komentar = '$id_komentar'";

    if (mysqli_query($conn, $sql_update)) {
        echo "<p>Komentar berhasil diperbarui!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Komentar</title>
</head>
<body>
    <h2>Update Review</h2>

    <!-- Formulir untuk mengedit komentar -->
    <form action="update_review.php?id_komentar=<?php echo $id_komentar; ?>" method="POST">
        <label for="isi_komentar">Komentar Lama:</label><br>
        <textarea id="isi_komentar" name="isi_komentar" rows="4" cols="50" required><?php echo $isi_komentar; ?></textarea><br><br>
        
        <button type="submit" name="update_review">Update Komentar</button>
    </form>

    <br>
    <a href="view_reviews.php?id_rekomendasi=<?php echo $komentar['id_rekomendasi']; ?>">Kembali ke halaman rekomendasi</a>
</body>
</html>