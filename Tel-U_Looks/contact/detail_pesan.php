<?php
// Memasukkan Header
include '../Layouts/sidebar-admin.php';

// Koneksi ke database
include '../db.php';

// Cek jika ada id_pesan yang dikirim melalui URL
if (isset($_GET['id_pesan'])) {
    $id_pesan = $_GET['id_pesan'];

    // Query untuk mengambil data berdasarkan id_pesan
    $query = "SELECT * FROM contact WHERE id_pesan = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_pesan);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID pesan tidak ditemukan.";
    exit();
}

// Proses saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_pesan'])) {
        $id_pesan = $_POST['id_pesan']; // Ambil nilai dari input hidden

        if (isset($_POST['delete'])) {
            // Query untuk menghapus data
            $query_delete = "DELETE FROM contact WHERE id_pesan = ?";
            $stmt_delete = $conn->prepare($query_delete);
            $stmt_delete->bind_param("i", $id_pesan);
            $stmt_delete->execute();

            if ($stmt_delete->affected_rows > 0) {
                header('Location: list_pesan.php?status=deleted');
                exit();
            } else {
                echo "Delete gagal. Data mungkin telah dihapus sebelumnya.";
            }
            $stmt_delete->close();
        } elseif (isset($_POST['status'])) {
            // Update status
            $status = $_POST['status'];
            $query_update = "UPDATE contact SET status = ? WHERE id_pesan = ?";
            $stmt_update = $conn->prepare($query_update);
            $stmt_update->bind_param("si", $status, $id_pesan);
            $stmt_update->execute();

            if ($stmt_update->affected_rows > 0) {
                header('Location: list_pesan.php?status=updated');
                exit();
            } else {
                echo "Update status gagal.";
            }
            $stmt_update->close();
        }
    } else {
        echo "ID pesan tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review Pesan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="../assets/css/add_rekomendasi.css" rel="stylesheet">
  <script>
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus data ini?");
    }
  </script>
</head>
<body>
  <div class="container mt-5">
    <h2>Review Pesan</h2>
    <div class="card p-4">
      <form action="" method="POST">
        <!-- Input hidden untuk id_pesan -->
        <input type="hidden" name="id_pesan" value="<?php echo $row['id_pesan']; ?>">

        <div class="mb-3">
          <label for="nama" class="form-label">Nama Pengirim</label>
          <input type="text" class="form-control" id="nama" value="<?php echo htmlspecialchars($row['nama_pengirim']); ?>" disabled>
        </div>

        <div class="mb-3">
          <label for="subjek" class="form-label">Subjek</label>
          <textarea class="form-control" id="subjek" rows="4" disabled><?php echo htmlspecialchars($row['subjek']); ?></textarea>
        </div>

        <div class="mb-3">
          <label for="isi_pesan" class="form-label">Isi Pesan</label>
          <textarea class="form-control" id="isi_pesan" rows="4" disabled><?php echo htmlspecialchars($row['isi_pesan']); ?></textarea>
        </div>

        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-select" id="status" name="status">
            <option value="Pending" <?php echo $row['status'] === 'Pending' ? 'selected' : ''; ?>>Pending</option>
            <option value="Proses" <?php echo $row['status'] === 'Proses' ? 'selected' : ''; ?>>Proses</option>
            <option value="Selesai" <?php echo $row['status'] === 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
          </select>
        </div>

        <div class="form-buttons d-flex justify-content-end gap-2">
          <button type="submit" class="btn btn-primary px-4 py-2">Update</button>
          <button type="submit" name="delete" class="btn btn-danger px-4 py-2" onclick="return confirmDelete();">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
