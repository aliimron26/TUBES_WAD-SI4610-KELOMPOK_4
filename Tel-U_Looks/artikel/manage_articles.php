<?php
session_start(); // Memulai session

include '../Layouts/sidebar-admin.php';
include '../db.php'; // Menghubungkan ke database

// Proses penghapusan artikel
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $query = "DELETE FROM articles WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Artikel berhasil dihapus.'); window.location.href='manage_articles.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus artikel.');</script>";
    }
}

// Proses pembaruan artikel
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $target = "assets/img/articles/" . basename($image);

    if ($image) {
        // Update dengan gambar baru
        $query = "UPDATE articles SET title = ?, content = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $title, $content, $image, $id);
        if ($stmt->execute()) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            echo "<script>alert('Artikel berhasil diperbarui.'); window.location.href='manage_articles.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui artikel.');</script>";
        }
    } else {
        // Update tanpa mengganti gambar
        $query = "UPDATE articles SET title = ?, content = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $title, $content, $id);
        if ($stmt->execute()) {
            echo "<script>alert('Artikel berhasil diperbarui.'); window.location.href='manage_articles.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui artikel.');</script>";
        }
    }
}

// Mengambil artikel dari database
$query = "SELECT * FROM articles ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Artikel</title>
    <link href="../assets/css/style.css" rel="stylesheet"> <!-- Ganti dengan CSS Anda -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-edit {
            background-color: #007bff;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kelola Artikel</h2>
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($article = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $article['title']; ?></td>
                        <td><?php echo substr($article['content'], 0, 50) . '...'; ?></td>
                        <td><img src="<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>" style="width: 100px;"></td>
                        <td>
                            <button class="btn btn-edit" onclick="openEditModal(<?php echo $article['id']; ?>, '<?php echo $article['title']; ?>', '<?php echo $article['content']; ?>', '<?php echo $article['image']; ?>')">Edit</button>
                            <a href="?action=delete&id=<?php echo $article['id']; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal untuk Edit Artikel -->
    <div id="editModal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit Artikel</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="edit-id" name="id">
                <div class="input-container">
                    <label for="edit-title">Judul Artikel:</label>
                    <input type="text" id="edit-title" name="title" required>
                </div>
                <div class="input-container">
                    <label for="edit-content">Isi Konten:</label>
                    <textarea id="edit-content" name="content" required></textarea>
                </div>
                <div class="input-container">
                    <label for="edit-image">Gambar:</label>
                    <input type="file" id="edit-image" name="image" accept="image/*">
                </div>
                <button type="submit" name="update">Perbarui Artikel</button>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, title, content, image) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-title').value = title;
            document.getElementById('edit-content').value = content;
            document.getElementById('editModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
</body>
</html>