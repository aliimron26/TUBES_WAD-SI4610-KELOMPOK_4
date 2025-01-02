<?php
session_start();
include('db.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php"); // Jika belum login, arahkan ke halaman login
    exit();
}

if (isset($_POST['submit_review'])) {
    // Ambil data dari form
    $id_user = $_SESSION['id_user'];  // ID pengguna yang login
    $id_rekomendasi = $_POST['id_rekomendasi'];  // ID rekomendasi yang diberikan oleh pengguna
    $isi_komentar = mysqli_real_escape_string($conn, $_POST['isi_komentar']);  // Isi komentar yang dimasukkan

    // Insert komentar ke dalam tabel komentar
    $sql = "INSERT INTO komentar (id_user, isi_komentar) 
            VALUES ('$id_user', '$isi_komentar')";

    if (mysqli_query($conn, $sql)) {
        // Jika komentar berhasil disubmit
        echo "<p>Komentar berhasil disubmit!</p>";
    } else {
        // Jika terjadi error
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Review</title>
</head>
<body>
    <h2>Tambah Review untuk Rekomendasi</h2>

    <!-- Formulir untuk menambah komentar -->
    <form action="add_review.php" method="POST">
        <label for="id_rekomendasi">ID Rekomendasi:</label>
        <input type="text" id="id_rekomendasi" name="id_rekomendasi" required><br><br>
        
        <label for="isi_komentar">Komentar:</label><br>
        <textarea id="isi_komentar" name="isi_komentar" rows="4" cols="50" required></textarea><br><br>
        
        <button type="submit" name="submit_review">Submit Review</button>
    </form>

</body>
</html>