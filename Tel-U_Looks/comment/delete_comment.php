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

$id_komentar = $_GET['id_komentar']; // ID komentar yang ingin dihapus

// Ambil komentar yang akan dihapus berdasarkan id_komentar
$sql = "SELECT * FROM komentar WHERE id_komentar = '$id_komentar'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $komentar = mysqli_fetch_assoc($result);

    // Cek apakah komentar tersebut milik pengguna yang sedang login
    if ($komentar['id_user'] != $_SESSION['id_user']) {
        echo "Anda tidak memiliki izin untuk menghapus komentar ini.";
        exit();
    }

    // Jika komentar milik pengguna, hapus komentar
    $sql_delete = "DELETE FROM komentar WHERE id_komentar = '$id_komentar'";

    if (mysqli_query($conn, $sql_delete)) {
        echo "<p>Komentar berhasil dihapus!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
} else {
    echo "Komentar tidak ditemukan.";
    exit();
}
?>

<a href="view_reviews.php?id_rekomendasi=<?php echo $komentar['id_rekomendasi']; ?>">Kembali ke halaman rekomendasi</a>