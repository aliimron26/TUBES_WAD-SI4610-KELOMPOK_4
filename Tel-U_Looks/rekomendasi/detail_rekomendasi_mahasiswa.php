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
            <button class="btn mt-3" style="background-color:white; color:#059ea3; border-color:#059ea3" onclick="addToWishlist(productId)">Tambah ke Wishlist</button>
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
    function addToWishlist(productId) {
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
    }
  </script>

<div class="container mt-5">
    <h4>Komentar</h4>
    
    <div id="commentForm" class="form-floating mb-4">
        <textarea class="form-control" placeholder="Tulis Komentar..." id="floatingTextarea" style="height: 100px;"></textarea>
        <label for="floatingTextarea">Tuliskan komentar anda disini...</label>
        <button class="btn btn-primary mt-2" id="submitComment">Kirim</button>
    </div>
    
    <div id="commentSection">
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const userId = "Arya Nugraha";
    let editingComment = null; 

    document.getElementById("floatingTextarea").addEventListener("keydown", function(event) {
        if (event.key === "Enter" && !event.shiftKey) {
            event.preventDefault();
            document.getElementById("submitComment").click();
        }
    });

    document.getElementById("submitComment").addEventListener("click", function () {
        const commentText = document.getElementById("floatingTextarea").value.trim();

        if (!commentText) {
            Swal.fire({
                title: 'Gagal!',
                text: 'Komentar tidak boleh kosong!',
                icon: 'warning',
                timer: 1000,
                showConfirmButton: false,
                position: 'center'
            });
            return;
        }

        if (editingComment) {
            updateComment(commentText);
        } else {
            addComment(commentText, userId);
        }
    });

    function addComment(text, userId) {
        const commentSection = document.getElementById("commentSection");
        const newComment = document.createElement("div");
        newComment.classList.add("comment", "mb-4");
        newComment.innerHTML = `
            <div class="d-flex align-items-center mb-2">
                <img src="https://i.imgur.com/bDLhJiP.jpg" class="rounded-circle me-3 img-fluid" alt="Avatar" style="width: 40px; height: 40px; object-fit: cover;">
                <div>
                    <strong class="user-name">${userId}</strong> <small class="text-muted">${new Date().toLocaleString()}</small>
                </div>
            </div>
            <p>${text}</p>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-warning" onclick="editComment(this, '${userId}')">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteComment(this)">Hapus</button>
            </div>
            <hr>
        `;
        commentSection.appendChild(newComment);
        document.getElementById("floatingTextarea").value = "";

        Swal.fire({
            title: 'Berhasil!',
            text: 'Komentar Anda berhasil ditambahkan.',
            icon: 'success',
            timer: 1500,
            showConfirmButton: false,
            position: 'center'
        });
    }

    function editComment(button, commentOwner) {
        if (userId !== commentOwner) {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Anda hanya bisa mengedit komentar Anda sendiri!',
                icon: 'warning',
                timer: 1500,
                showConfirmButton: false,
                position: 'center'
            });
            return;
        }

        editingComment = button.closest(".comment");
        const commentText = editingComment.querySelector("p").textContent;
        const userName = editingComment.querySelector(".user-name").textContent;
        const avatar = editingComment.querySelector("img").src;

        editingComment.innerHTML = `
            <div class="d-flex align-items-center mb-2">
                <img src="${avatar}" class="rounded-circle me-3 img-fluid" alt="Avatar" style="width: 40px; height: 40px; object-fit: cover;">
                <div>
                    <strong class="user-name">${userName}</strong>
                </div>
            </div>
            <textarea class="form-control mb-2" style="height: 100px;">${commentText}</textarea>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary" onclick="saveEdit(this, '${userName}', '${avatar}')">Simpan</button>
                <button class="btn btn-sm btn-secondary" onclick="cancelEdit(this, '${userName}', '${avatar}')">Batal</button>
            </div>
        `;
    }

    function saveEdit(button, userName, avatar) {
        const editedText = button.closest(".comment").querySelector("textarea").value.trim();

        if (!editedText) {
            Swal.fire({
                title: 'Gagal!',
                text: 'Komentar tidak boleh kosong!',
                icon: 'warning',
                timer: 1000,
                showConfirmButton: false,
                position: 'center'
            });
            return;
        }

        editingComment.innerHTML = `
            <div class="d-flex align-items-center mb-2">
                <img src="${avatar}" class="rounded-circle me-3 img-fluid" alt="Avatar" style="width: 40px; height: 40px; object-fit: cover;">
                <div>
                    <strong class="user-name">${userName}</strong> <small class="text-muted">edited ${new Date().toLocaleString()}</small>
                </div>
            </div>
            <p>${editedText}</p>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-warning" onclick="editComment(this, '${userId}')">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteComment(this)">Hapus</button>
            </div>
            <hr>
        `;
        editingComment = null;
    }

    function cancelEdit(button, userName, avatar) {
        const originalText = button.closest(".comment").querySelector("textarea").value;

        editingComment.innerHTML = `
            <div class="d-flex align-items-center mb-2">
                <img src="${avatar}" class="rounded-circle me-3 img-fluid" alt="Avatar" style="width: 40px; height: 40px; object-fit: cover;">
                <div>
                    <strong class="user-name">${userName}</strong> <small class="text-muted">${new Date().toLocaleString()}</small>
                </div>
            </div>
            <p>${originalText}</p>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-warning" onclick="editComment(this, '${userId}')">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteComment(this)">Hapus</button>
            </div>
            <hr>
        `;
        editingComment = null;
    }

    function deleteComment(button) {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menghapus komentar ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest(".comment").remove();
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Komentar Anda berhasil dihapus.',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false,
                    position: 'center'
                });
            }
        });
    }
</script>
</body>

</html>

<?php
include '../Layouts/footer.php';
?>