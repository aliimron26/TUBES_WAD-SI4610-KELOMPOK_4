<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Mengambil nama gambar dari database untuk dihapus
    $sql = "SELECT image FROM articles WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image = $row['image'];

        // Menghapus artikel dari database
        $sql = "DELETE FROM articles WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            // Menghapus file gambar jika ada
            if (file_exists("uploads/" . $image)) {
                unlink("uploads/" . $image);
            }
            header("Location: artikel.php"); // Mengarahkan ke artikel.php
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Artikel tidak ditemukan.";
    }
} else {
    echo "ID artikel tidak ditentukan.";
}
?>
