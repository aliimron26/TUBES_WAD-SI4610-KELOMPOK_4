<?php
// Memulai sesi
session_start();

// Memasukkan Header
include '../Layouts/navbar.php';

// Data produk
$produk = [
    [
        'id' => 1,
        'nama' => 'A Line Skirt',
        'gambar' => '../assets/img/gallery/produk 1.jpg',
        'deskripsi' => 'Salah satu fashion items penolong yang bisa kamu ambil dari lemari saat hari pertama semester baru perkuliahan adalah a-line midi skirt. 
        Padukan rok dengan atasan sesuai keinginan. Pakailah flat shoes atau sepatu kets yang sesuai dengan keinginan, dan tara! Kamu siap pergi ke kampus.',
        'harga' => 'Rp 150.000',
        'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 2,
      'nama' => 'Jeans Kulot dan Outer Sederhana',
      'gambar' => '../assets/img/gallery/produk 2.jpg',
      'deskripsi' => 'Outer tampaknya selalu menjadi pakaian yang selalu menarik bagi para hijabers. Sebab, outer memang dirancang secara khusus agar bisa sesuai dengan berbagai macam tampilan outfit yang dipakai oleh banyak orang. 
      Gunakan celana jeans kulot untuk bisa mengantongi kakimu yang jenjang. Kenakan juga inner pakaian warna terang yang dikombinasikan dengan outer dengan gaya casual seperti ini. Dijamin, cantik banget!',
      'harga' => 'Rp 200.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 3,
      'nama' => 'Sweater',
      'gambar' => '../assets/img/gallery/produk 3.jpg',
      'deskripsi' => 'Outfit yang satu ini bisa menjadi andalan kamu saat cuaca dingin atau hujan tiba. Selain membuat tubuh lebih hangat, memadukan sweater menggunakan celana jeans atau bahan juga cukup stylish untuk dikenakan saat kuliah, lho. 
      Kamu juga bisa menambahkan kemeja di dalam sweater agar terlihat semi-formal.',
      'harga' => 'Rp 250.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 4,
      'nama' => 'Denim Vest',
      'gambar' => '../assets/img/gallery/produk 4.jpeg',
      'deskripsi' => 'Denim vest memiliki model yang sama dengan sweater vest. Hanya saja, yang satu ini berbahan denim atau serat katun kokoh berwarna biru.
      Karena bahan dasar yang berbeda itu pula, kesan yang ditimbulkan saat memakainya pun berbeda. Orang yang memakai denim vest akan terlihat lebih boyish dan cool.
      Memakai denim vest juga bisa jadi alternatif bagi kamu yang ingin memakai setelan berkerah tapi tidak ingin terlihat terlalu kaku dan formal.',
      'harga' => 'Rp 300.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 5,
      'nama' => 'Kemeja Batik',
      'gambar' => '../assets/img/gallery/produk 5.jpg',
      'deskripsi' => 'Meskipun terlihat formal dan kaku, sebenarnya baju batik bisa menjadi keren dengan jenis celana dan sepatu yang sesuai, lho. 
      Dengan memilih kemeja yang dari bahan katun premium dan dilapisi oleh furing, kemeja batik yang kamu gunakan akan menjadi kemeja yang sangat nyaman dan tidak akan bikin kepanasan saat mengikuti perkuliahan.',
      'harga' => 'Rp 350.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 6,
      'nama' => 'Blazer',
      'gambar' => '../assets/img/gallery/produk 6.jpg',
      'deskripsi' => 'Blazer adalah salah satu penyelamat di kala kamu tidak tahu lagi haru mengenakan outfit apa ke kampus. 
      Padukan blazer dengan kaos atau kemeja polos, juga celana favorit. Jangan lupa kenakan sepatu yang nyaman, ya! Tambahkan totebag untuk membawa peralatan perkuliahanmu.',
      'harga' => 'Rp 400.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 7,
      'nama' => 'Kaos dan Celana Jeans',
      'gambar' => '../assets/img/gallery/produk 7.jpeg',
      'deskripsi' => 'Rekomendasi outfit kuliah yang simple tapi stylish adalah perpaduan antara kaos dan celana jeans. 
      Dua fashion items ini seakan jadi andalan bagi mahasiswa yang ingin tampil minimalis. 
      Untuk menghasilkan look yang stylish, kamu bisa memilih kaos berkerah crew neck atau kerah berbentuk O. 
      Pemilihan kerah ini akan membuat look kamu jadi lebih rapi meskipun mengenakan kaos yang santai. 
      Berikutnya, kamu bisa memaksimalkan penampilan dengan memasukkan kaos ke dalam celana jeans. 
      Trik ini membuat look kamu akan semakin elegan sekaligus kasual.',
      'harga' => 'Rp450.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 8,
      'nama' => 'Perpaduan Kaos/Kemeja dengan Celana Jeans',
      'gambar' => '../assets/img/gallery/produk 8.jpg',
      'deskripsi' => 'Tentunya perpaduan kaos/kemeja dengan celana jeans adalah hal yang sangat sering digunakan oleh para mahasiswa.',
      'harga' => 'Rp 500.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
];

// Ambil ID produk dari URL dan validasi
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Cari produk berdasarkan ID
$detail = array_filter($produk, function ($item) use ($id) {
    return $item['id'] === $id;
});

// Ambil data produk pertama (jika ditemukan)
$detail = !empty($detail) ? array_values($detail)[0] : null;

// Periksa apakah produk ditemukan
if (!$detail) {
    echo "<div class='container mt-5'><h3>Produk tidak ditemukan!</h3></div>";
    include '../Layouts/footer.php';
    exit;
}

// Cek status login pengguna
$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
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
        <div class="row">
            <div class="col-md-5">
                <img src="<?php echo htmlspecialchars($detail['gambar']); ?>" alt="<?php echo htmlspecialchars($detail['nama']); ?>" class="img-fluid">
            </div>
            <div class="col-md-7">
                <h2><?php echo htmlspecialchars($detail['nama']); ?></h2>
                <p><?php echo htmlspecialchars($detail['deskripsi']); ?></p>
                <p><strong>Harga:</strong> <?php echo htmlspecialchars($detail['harga']); ?></p>

                <!-- Tombol Affiliate -->
                <button id="buyProductBtn" class="btn mt-3" style="background-color:#059ea3; color:white">Beli Produk</button>

                <!-- Tombol Wishlist -->
                <button id="wishlistBtn" class="btn btn-danger mt-3">Tambah ke Wishlist</button>
            </div>
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
                        <a href="<?php echo htmlspecialchars($detail['link_affiliate']['shopee']); ?>" target="_blank" class="btn btn-warning">Shopee</a>
                        <a href="<?php echo htmlspecialchars($detail['link_affiliate']['tokopedia']); ?>" target="_blank" class="btn btn-success">Tokopedia</a>
                        <a href="<?php echo htmlspecialchars($detail['link_affiliate']['lazada']); ?>" target="_blank" class="btn btn-primary">Lazada</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Tombol Beli Produk
        const buyProductBtn = document.getElementById("buyProductBtn");

        buyProductBtn.addEventListener("click", function () {
            const platformModal = new bootstrap.Modal(document.getElementById("platformModal"));
            platformModal.show();
        });

        // Tombol Wishlist
        const wishlistBtn = document.getElementById("wishlistBtn");

        wishlistBtn.addEventListener("click", function () {
            <?php if ($isLoggedIn): ?>
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Wishlist Anda telah tersimpan!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });

                // Kirim data wishlist ke server (Opsional)
                fetch("wishlist.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ productId: <?php echo $detail['id']; ?> }),
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        Swal.fire({
                            title: 'Error!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menyimpan wishlist.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            <?php else: ?>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Silakan login terlebih dahulu untuk menambahkan ke wishlist.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            <?php endif; ?>
        });
    });
    </script>
</body>
</html>

<?php
// Memasukkan Footer
include '../Layouts/footer.php';
?>