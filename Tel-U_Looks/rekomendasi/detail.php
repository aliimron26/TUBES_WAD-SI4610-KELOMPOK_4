<?php
// Memulai sesi
session_start();

// Memasukkan Header
include '../Layouts/navbar.php';
include '../db.php';

$sql = "SELECT * FROM rekomendasi";
$result = $conn->query($sql);

// Cek status login pengguna
$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
//$userId = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Tambahkan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
        <h2 class="mb-4">Produk Rekomendasi</h2>
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['nama']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['nama_fashion']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($row['deskripsi_fashion']); ?></p>
                                <p class="card-text"><strong>Harga:</strong> <?php echo htmlspecialchars($row['harga']); ?></p>
                                <button class="btn btn-primary" onclick="addToWishlist(<?php echo $row['id_rekomendasi']; ?>)">Tambah ke Wishlist</button>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">Tidak ada produk yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>

<!-- Contoh kode HTML -->
<div class="container mt-5">
    <h4 id="commentCount">Komentar</h4>
    
    <!-- Form komentar -->
    <div id="commentForm" class="form-floating mb-4">
        <textarea class="form-control" placeholder="Tulis Komentar..." id="floatingTextarea" style="height: 100px;"></textarea>
        <label for="floatingTextarea">Tuliskan komentar anda disini...</label>
        <button class="btn btn-primary mt-2" id="submitComment">Submit</button>
    </div>
    
    <!-- Area komentar -->
    <div id="commentSection">
        <!-- Komentar akan dirender secara dinamis di sini -->
    </div>
</div>

<!-- Modal Notifikasi -->
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

<!-- Bootstrap & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let isLoggedIn = false; // Ubah ini menjadi 'true' jika pengguna sudah login
    const userId = "user123"; // Ganti dengan ID pengguna yang sedang login

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

    <!-- Modal Pilihan Platform -->
    <div class="modal fade" id="platformModal" tabindex="-1" aria-labelledby="platformModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="platformModalLabel">Pilih Platform untuk Membeli Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Silakan pilih platform tempat Anda ingin membeli produk ini:</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="<?php echo htmlspecialchars($detail['link_affiliate_shopee']); ?>" target="_blank" class="btn btn-warning">Shopee</a>
                        <a href="<?php echo htmlspecialchars($detail['link_affiliate_tokopedia']); ?>" target="_blank" class="btn btn-success">Tokopedia</a>
                        <a href="<?php echo htmlspecialchars($detail['link_affiliate_lazada']); ?>" target="_blank" class="btn btn-primary">Lazada</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addToWishlist(productId) {
        const isLoggedIn = <?= json_encode($isLoggedIn) ?>;

        if (!isLoggedIn) {
            Swal.fire({
                title: 'Gagal',
                text: 'Silakan login terlebih dahulu untuk menambahkan produk ke wishlist.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Login',
                cancelButtonText: 'Nanti Saja'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../users/login_user.php';
                }
            });
        } else {
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
    }
    </script>
</body>
</html>

<?php
// Memasukkan Footer
include '../Layouts/footer.php';
?>