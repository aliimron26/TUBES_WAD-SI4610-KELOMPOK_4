<?php
session_start();
include '../Layouts/main-navbar.php';
include '../db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_rekomendasi = $_GET['id'];

    $query = "SELECT id_rekomendasi, nama_fashion, deskripsi_fashion, harga, link_affiliate_shopee, 
              link_affiliate_tokopedia, link_affiliate_lazada, image, kategori 
              FROM rekomendasi WHERE id_rekomendasi = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_rekomendasi);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama_fashion = htmlspecialchars($row['nama_fashion']);
        $deskripsi_fashion = htmlspecialchars($row['deskripsi_fashion']);
        $harga = number_format($row['harga'], 0, ',', '.');
        $link_shopee = htmlspecialchars($row['link_affiliate_shopee']);
        $link_tokopedia = htmlspecialchars($row['link_affiliate_tokopedia']);
        $link_lazada = htmlspecialchars($row['link_affiliate_lazada']);
        $image = htmlspecialchars($row['image']);
        $kategori = htmlspecialchars($row['kategori']);
    } else {
        echo "Data tidak ditemukan!";
        exit();
    }

    mysqli_stmt_close($stmt);
} else {
    echo "ID tidak valid!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Detail - <?= $nama_fashion; ?> | Tel-U Looks</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <main class="main">
    <section class="detail section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="../assets/rekomendasi/<?= $image; ?>" alt="<?= $nama_fashion; ?>" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2><?= $nama_fashion; ?></h2>
            <p><strong>Deskripsi:</strong> <?= $deskripsi_fashion; ?></p>
            <p><strong>Harga:</strong> Rp <?= $harga; ?></p>
            <p><strong>Kategori:</strong> <?= $kategori; ?></p>
            <button class="btn mt-3" style="background-color:white; color:#059ea3; border-color:#059ea3" onclick="addToWishlist(<?php echo $id_rekomendasi; ?>)">Tambah ke Wishlist</button>
            <button class="btn mt-3" style="background-color:#059ea3; color:white" data-bs-toggle="modal" data-bs-target="#platformModal">Beli Sekarang</button>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="platformModal" tabindex="-1" aria-labelledby="platformModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="platformModalLabel">Pilih Platform untuk Membeli Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <?php if ($link_shopee === '#' && $link_tokopedia === '#' && $link_lazada === '#'): ?>
                        <p class="text-danger">Link pembelian tidak tersedia.</p>
                    <?php else: ?>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="<?= $link_shopee ?>" target="_blank" class="btn btn-warning">Shopee</a>
                            <a href="<?= $link_tokopedia ?>" target="_blank" class="btn btn-success">Tokopedia</a>
                            <a href="<?= $link_lazada ?>" target="_blank" class="btn btn-primary">Lazada</a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

  </main>

  <script>
    function addToWishlist() {
        const productId = <?= json_encode($id_rekomendasi) ?>;

        fetch('../rekomendasi/wishlist.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ productId: productId }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Berhasil',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            } else {
                Swal.fire({
                    title: 'Gagal',
                    text: data.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'Error',
                text: 'Terjadi kesalahan saat menambahkan ke wishlist.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    }
  </script>

<div class="container mt-5">
    <h4 id="commentCount">Komentar</h4>
    
    <div id="commentForm" class="form-floating mb-4">
        <textarea class="form-control" placeholder="Tulis Komentar..." id="floatingTextarea" style="height: 100px;"></textarea>
        <label for="floatingTextarea">Tuliskan komentar anda disini...</label>
        <button class="btn btn-primary mt-2" id="submitComment">Submit</button>
    </div>
    
    <div id="commentSection">
    </div>
</div>

<div class="modal" tabindex="-1" id="alertModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Peringatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalMessage">Anda harus login untuk mengirim komentar!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let isLoggedIn = false;
    const userId = "user123"; 

    document.getElementById("submitComment").addEventListener("click", function() {
        if (!isLoggedIn) {
            Swal.fire({
                title: 'Gagal!',
                text: 'Silakan login terlebih dahulu untuk mengirimkan komentar.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        } else {
            const commentText = document.getElementById("floatingTextarea").value.trim();
            if (commentText) {
                addComment(commentText, userId);
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Komentar Anda berhasil dikirim.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            } else {
                showAlert("Komentar tidak boleh kosong!");
            }
        }
    });

    function addComment(text, userId) {
        const commentSection = document.getElementById("commentSection");
        const newComment = document.createElement("div");
        newComment.classList.add("comment", "mb-4");
        newComment.innerHTML = `
            <div class="d-flex align-items-center mb-2">
                <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="Avatar">
                <div>
                    <strong>User ${userId}</strong> <small class="text-muted">${new Date().toLocaleString()}</small>
                </div>
            </div>
            <p>${text}</p>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-warning" onclick="editComment(this, '${userId}')">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteComment(this, '${userId}')">Hapus</button>
                <button class="btn btn-sm btn-light d-flex align-items-center">
                    <i class="bi bi-heart-fill text-danger me-1"></i> (0)
                </button>
            </div>
            <hr>
        `;
        commentSection.appendChild(newComment);
        document.getElementById("floatingTextarea").value = "";
        updateCommentCount();
    }

    function editComment(button, commentOwner) {
        if (userId !== commentOwner) {
            showAlert("Anda hanya bisa mengedit komentar Anda sendiri!");
        } else {
            const commentText = prompt("Edit komentar Anda:", button.parentElement.previousElementSibling.textContent);
            if (commentText) {
                button.parentElement.previousElementSibling.textContent = commentText;
            }
        }
    }

    function deleteComment(button, commentOwner) {
        if (userId !== commentOwner) {
            showAlert("Anda hanya bisa menghapus komentar Anda sendiri!");
        } else {
            if (confirm("Apakah Anda yakin ingin menghapus komentar ini?")) {
                button.closest(".comment").remove();
                updateCommentCount();
            }
        }
    }

    function showAlert(message) {
        document.getElementById("modalMessage").textContent = message;
        const alertModal = new bootstrap.Modal(document.getElementById("alertModal"));
        alertModal.show();
    }

    function updateCommentCount() {
        const count = document.querySelectorAll(".comment").length;
        document.getElementById("commentCount").textContent = `(${count}) Comments`;
    }
</script>
</body>

</html>

<?php
include '../Layouts/footer.php';
?>